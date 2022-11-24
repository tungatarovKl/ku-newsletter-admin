<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

use App\Events\MessageSentSuccessful;
use App\Events\ApiConnectionError;
use App\Events\ApiResponseError;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Only for authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    Отправляет полученный текст из формы на сервис messenger
    **/
    public function sendMessage(Request $request){
        $message = $request->input('messageText');
        $token = env("API_MESSENGER_TOKEN");

        try {
            $response = Http::withOptions(['verify'=>false])->post(
                'http://'.env("API_MESSENGER_HOSTNAME").':'.env('API_MESSENGER_PORT').env('API_MESSENGER_URI'),
            [
                'message' => $message,
                'token' => $token
            ]);

        } catch (\Throwable $e) {
            ApiConnectionError::dispatch($e->getMessage());

            return redirect('/newsletter')->with('error','Ошибка соединения с сервером');
        }

        if($response->successful()){
            MessageSentSuccessful::dispatch($message, auth()->user()->username);

            return redirect('/newsletter')->with('success', $response->body());
        }

        ApiResponseError::dispatch($response);
        return redirect('/newsletter')->with('error', $response->body());
    }

    /**
     * newsletter GET request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newsletterGET()
    {
        return view('newsletter');
    }

    /**
     * history get request
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function history(Request $request)
    {
        $messages = Message::all('sender', 'message_text', 'created_at');
        return view('history')->with(array('messages' => $messages));
    }
}
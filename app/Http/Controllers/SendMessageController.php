<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use App\Events\MessageSentSuccessful;
use App\Events\ApiConnectionError;
use App\Events\ApiResponseError;
use Illuminate\Http\Request;

class SendMessageController extends Controller
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
            MessageSentSuccessful::dispatch($message);

            return redirect('/newsletter')->with('success', $response->body());
        }

        ApiResponseError::dispatch($response);
        return redirect('/newsletter')->with('error', $response->body());
    }

    public function renderForm(){
        return view('newsletter');
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SendMessageController extends Controller
{
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
            Log::channel('stderr')->error($e->getMessage());
            return redirect('/newsletter')->with('error','Ошибка соединения с сервером');
        }

        if($response->successful()){
            return redirect('/newsletter')->with('success','Сообщение отправлено!');
        }
        Log::channel('stderr')->error([
            'api_request_url' => $response->effectiveUri(),
            'api_response_status_code' => $response->status(),
            'api_response_body' => $response->body()]);
        return redirect('/newsletter')->with('error','Ошибка отправки сообщения');
    }

    public function renderForm(){
        return view('newsletter');
    }
}
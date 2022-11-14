<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    /**
    Отправляет полученный текст из формы на сервис messenger
    **/
    public function sendMessage(Request $request){
        $message = $request->input('messageText');
        $token = env("API_MESSENGER_TOKEN");

        try {
            $response = Http::withOptions(['verify'=>false])->post('http://'.env("API_MESSENGER_HOSTNAME").':8080/newsletter', [
                'message' => $message,
                'token' => $token
            ]);
        } catch (\Throwable $e) {
            return redirect('/newsletter')->with('error','Ошибка соединения с сервером');
        }

        if($response->successful()){
            return redirect('/newsletter')->with('success','Сообщение отправлено!');
        }

        return redirect('/newsletter')->with('error','Ошибка отправки сообщения');
    }

    public function renderForm(){
        return view('newsletter');
    }
}
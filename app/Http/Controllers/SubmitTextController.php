<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 
use Illuminate\Http\Request;

class SubmitTextController extends Controller
{
    /*
    Отправляет полученное текст из формы на сервис messenger
    */
    public function submitText(Request $request){
        $text = $request->input('userInfo');
        
        $response = Http::withOptions(['verify'=>false])->post('https://localhost::8080/newsletter/', [
            'userText' => $text,
        ]);
        if($response->status()===200){
            return redirect('/newsletter')->with('success','Your data was sent successfully');
        }

        return redirect('/newsletter')->with('error','Error with sending the informaton to the site');
    }

    public function renderForm(){
        return view('newsletter');
    }
}
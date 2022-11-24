<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Only for authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $imgUrl;
    public function index(Request $request)
    {
        try {$client = new Client([
            'base_uri' => 'https://api.thecatapi.com/v1/images/search?mime_types=gif',
            'timeout'  => 2.0,
            ]);

            $response = $client->request('GET');
            $this->imgUrl = json_decode($response->getBody(), false);

        } catch (\Throwable $e) {
            return view('index');
        }

        return view('index')->with(['imgUrl' => $this->imgUrl[0]->url]);
    }
}

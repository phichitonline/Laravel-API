<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetuserController extends Controller
{
    public function getuser(Request $request) {

        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->post('http://127.0.0.1:9800/api/userlist?tel='.$request->tel);

        return view('welcome',[
            'message' => $response['message'],
            'userlist' => $response['data'],
            'token' => ""
        ]);

    }

    public function useradd(Request $request) {

        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->post('http://127.0.0.1:9800/api/register', [
            'fullname' => 'Nathaphong 004',
            'username' => 'ghost004',
            'email' => $request->email,
            'password' => '123456',
            'password_confirmation' => '123456',
            'tel' => '0619921666'
        ]);

        // dd($response->body());

        return redirect()->route('getuser')->with('success',$response->body());

    }
}

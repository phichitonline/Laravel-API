<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->get('http://127.0.0.1:9800/api/user');

        return view('users.index',[
            'message' => $response['message'],
            'userlist' => $response['data']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->post('http://127.0.0.1:9800/api/register', [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'tel' => $request->tel,
            'role' => $request->role,
        ]);

        // dd($response->body());

        return redirect()->route('user.index')->with('success',$response->body());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->get('http://127.0.0.1:9800/api/user/'.$id);

        return view('users.edit',[
            'message' => $response['message'],
            'user' => $response['data']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->patch('http://127.0.0.1:9800/api/user/'.$id, [
            'fullname' => $request->fullname,
            'username' => $request->username,
            // 'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'tel' => $request->tel,
            'role' => $request->role,
        ]);

        // dd($response->body());

        return redirect()->route('user.index')->with('success',$response->body());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $api_token_11456 = env('API_TOKEN_11456');

        $response = Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> 'Bearer '.$api_token_11456,
        ])
        ->delete('http://127.0.0.1:9800/api/user/'.$id);

        // dd($response->body());

        return redirect()->route('user.index')->with('success',$response->body());
    }
}

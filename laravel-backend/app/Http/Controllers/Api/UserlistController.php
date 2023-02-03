<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserlistController extends Controller
{
    public function userlist(Request $request)
    {

        $userlist = DB::connection('mysql_hos')->select('

        SELECT id,fullname,username,email,tel FROM users WHERE tel = "'.$request->tel.'"

        ');

        return response()->json([
            'message' => 'Successfully',
            'data' => $userlist,
            'token' => ""
        ]);

    }
}

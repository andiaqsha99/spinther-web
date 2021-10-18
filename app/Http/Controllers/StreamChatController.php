<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GetStream\StreamChat\Client as StreamClient;

class StreamChatController extends Controller
{
    public function generateToken(Request $request){
        $client = new StreamClient(env("MIX_STREAM_API_KEY"), env("MIX_STREAM_API_SECRET"));

        return response()->json([
            'token' => $client->createToken($request->user_id)
        ]);
    }
}

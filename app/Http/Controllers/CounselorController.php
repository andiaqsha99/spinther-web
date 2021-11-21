<?php

namespace App\Http\Controllers;

use App\Models\Counselor;
use Illuminate\Http\Request;
use GetStream\StreamChat\Client as StreamClient;

class CounselorController extends Controller
{
    public function createCounselor(Request $request) {
        $counselor = Counselor::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $client = new StreamClient(env("MIX_STREAM_API_KEY"), env("MIX_STREAM_API_SECRET"));
        $newUser = [
            'id' => strval($counselor->id),
            'role' => 'user',
            'name' => $counselor->username,
        ];
        $client->updateUser($newUser);

        if($counselor) {
            return response(
                [
                    'message' => 'Counselor berhasil di buat'
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'Counselor gagal di buat'
                ],200
            );
        }
    }

    public function loginCounselor(Request $request) {
        $counselor = Counselor::where('email', $request->email)
            ->where('password', $request->password)->first();
        if($counselor) {
            return response(
                [
                    'data' => $counselor
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'Email atau password salah'
                ],200
            );
        }
    }

    public function getAllCounselor() {
        $counselor = Counselor::all();

        if($counselor) {
            return response([
                'data' => $counselor
            ], 200);
        }
    }
}

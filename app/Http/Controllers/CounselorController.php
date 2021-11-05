<?php

namespace App\Http\Controllers;

use App\Models\Counselor;
use Illuminate\Http\Request;

class CounselorController extends Controller
{
    public function createCounselor(Request $request) {
        $counselor = Counselor::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

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
}

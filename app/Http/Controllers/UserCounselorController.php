<?php

namespace App\Http\Controllers;

use App\Models\UserCounselor;
use Illuminate\Http\Request;

class UserCounselorController extends Controller
{
    public function createCounselorUser(Request $request) {
        $counselor = UserCounselor::create([
            'counselor_id' => $request->counselor_id,
            'user_id' => $request->user_id,
            'user_username' => $request->user_username,
            'diagnosis' => $request->diagnosis
        ]);

        if($counselor) {
            return response(
                [
                    'message' => 'User & Counselor berhasil di buat'
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'User & Counselor gagal di buat'
                ],200
            );
        }
    }

    public function getCounselorUser($counselor_id) {
        $counselor = UserCounselor::where('counselor_id', $counselor_id)->get();

        if($counselor) {
            return response(
                [
                    'data' => $counselor
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'User & Counselor tidak ditemukan'
                ],200
            );
        }
    }

    public function getDiagnosisUser($user_id) {
        $counselor = UserCounselor::where('user_id', $user_id)->first();

        if($counselor) {
            return response(
                [
                    'data' => $counselor
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'User & Counselor tidak ditemukan'
                ],200
            );
        }
    }

    public function createDiagnosisUser(Request $request) {
        $counselor = UserCounselor::find($request->id)->update([
            'diagnosis' => $request->diagnosis
        ]);

        if($counselor) {
            return response(
                [
                    'message' => 'Diagnosis berhasil di buat'
                ],200
            );
        } else {
            return response(
                [
                    'message' => 'Diagnosis gagal di buat'
                ],200
            );
        }
    }

    public function checkCounselorUser($user_id) {
        $counselor = UserCounselor::where('user_id', $user_id)->first();

        if($counselor) {
            return response(
                [
                    'data' => true
                ],200
            );
        } else {
            return response(
                [
                    'data' => false
                ],200
            );
        }
    }
}

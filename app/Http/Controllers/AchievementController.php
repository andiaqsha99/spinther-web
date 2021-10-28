<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    private function createAchievement(Request $request){
        return Achievement::create([
            'id_user' => $request->id_user,
            'mission_name' => $request->mission_name,
            'mission_played' => 1,
        ]);
    }

    private function updateAchievement($data) {
        return Achievement::find($data->id)->update([
            'mission_played' => $data->mission_played,
        ]);
    }

    private function getUserMissionAchievement($data){
        return Achievement::where('id_user', $data->id_user)
            ->where('mission_name', $data->mission_name)->first();
    }

    private function getAllUserAchievement($id_user) {
        return Achievement::where('id_user', $id_user)->get();
    }

    public function store(Request $request) {
        $achievement = $this->getUserMissionAchievement($request);

        if($achievement) {
            $achievement->mission_played = $achievement->mission_played + 1;
            $this->updateAchievement($achievement);
            return response(
                [
                    'message' => 'Achievement berhasil di update'
                ],200
            );
        } else {
            $this->createAchievement($request);
            return response(
                [
                    'message' => 'Achievement berhasil di buat'
                ],200
            );
        }
    }

    public function index($id_user) {
        $achievement = $this->getAllUserAchievement($id_user);

        return response(
            [
                'success' => true,
                'message' => 'User '. $id_user . ' achievement',
                'data' => $achievement
            ],200
        );
    }
}

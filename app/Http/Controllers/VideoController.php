<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideoByMissions($missions) {
        $data = Video::join('missions', 'videos.mission_type', '=','missions.id')->
            select('videos.id', 'videos.title', 'videos.link', 'missions.title as mission')->
            where('missions.title', $missions)->get();

        return response($data, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artmission;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index() {
        $arts = Artmission::all();
        return response(
            [
                'data' => $arts
            ],200
        );
    }
}

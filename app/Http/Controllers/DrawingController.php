<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    public function index() {
        $drawings = Drawing::all();
        return response(
            [
                'data' => $drawings
            ],200
        );
    }
}

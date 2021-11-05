<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CounselorController;
use App\Http\Controllers\UserCounselorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('question',[QuestionController::class, 'index']);
Route::get('video/{mission}', [VideoController::class, 'getVideoByMissions']);
Route::get('articles',[ArticleController::class, 'index']);
Route::post('/generate-token', 'ChatController@generateToken');
Route::post('achievement/store', [AchievementController::class, 'store']);
Route::get('achievement/{id_user}', [AchievementController::class, 'index']);

Route::post('counselor/create',[CounselorController::class, 'createCounselor']);
Route::post('counselor/login',[CounselorController::class, 'loginCounselor']);

Route::post('counselor/user/create',[UserCounselorController::class, 'createCounselorUser']);
Route::get('counselor/{counselor_id?}/user',[UserCounselorController::class, 'getCounselorUser']);
Route::get('counselor/{user_id?}/user/diagnosis',[UserCounselorController::class, 'getDiagnosisUser']);
Route::post('counselor/user/diagnosis/create',[UserCounselorController::class, 'createDiagnosisUser']);

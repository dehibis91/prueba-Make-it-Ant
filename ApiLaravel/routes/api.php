<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\API\ApiUserController;

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

Route::post("post-create", [ApiPostController::class, "postCreate"]);
Route::delete("post-delete", [ApiPostController::class, "postDelete"]);
Route::get("post-get", [ApiPostController::class, "postGet"]);

Route::post("user-create", [ApiUserController::class, "store"]);
Route::delete("user-delete", [ApiUserController::class, "destroy"]);
Route::get("user-get", [ApiUserController::class, "index"]);
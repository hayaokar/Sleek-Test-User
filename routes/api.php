<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Public Endpoints
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class,'register']);

//Protected Endpoints
Route::group(['middleware'=>['auth:sanctum']],function (){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/authenticate',[AuthController::class,'validateToken']);
});

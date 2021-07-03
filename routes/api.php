<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


////API  Documentes
Route::get('alldoc',[DocumentController::class,'alldocuments']);
Route::post('adddoc',[DocumentController::class,'store']);
Route::delete('delete/{id}',[DocumentController::class,'destroy']);
Route::post('update/{id}',[DocumentController::class,'update']);


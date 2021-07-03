<?php

use App\Http\Controllers\DocumentViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::group(['middleware'=>'auth'],function(){

Route::get('/', [DocumentViewController::class , 'alldocuments'])->name('/');
Route::get('add',[DocumentViewController::class,'add'])->name('add');
Route::post('save',[DocumentViewController::class,'store'])->name('save');
Route::delete('delete/{id}',[DocumentViewController::class,'destroy'])->name('delete');
Route::get('update/{id}', [DocumentViewController::class, 'edit'])->name('update');
Route::post('edited/{id}', [DocumentViewController::class, 'update'])->name('edited');

});
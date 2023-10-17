<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebApiController;
use App\Http\Controllers\S3Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'App\Http\Controllers\WebApiController@sendSqs');

Route::view('upload', 'upload');
Route::post('s3', [\App\Http\Controllers\S3Controller::class, 'uploadS3'])->name('s3');
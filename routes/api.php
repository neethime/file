<?php

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

Route::group(['prefix' => 'v1'], function () {

    Route::post('/upload', 'FilesController@upload');
    Route::get('/download', 'FilesController@download');

});

Route::group(['prefix' => 'v2'], function () {

    Route::post('/upload', 'FilesController@upload2');
    Route::get('/download', 'FilesController@download2');

});

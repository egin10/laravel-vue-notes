<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Notes'], function () {
    Route::group(['prefix' => 'notes'], function () {
        Route::post('create-new-note', 'NoteController@store');
    });

    Route::group(['prefix' => 'subjects'], function () {
        Route::get('', 'SubjectController@index');
    });
});

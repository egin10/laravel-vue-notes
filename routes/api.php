<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Notes'], function () {
    Route::group(['prefix' => 'notes'], function () {
        Route::get('', 'NoteController@index');
        Route::get('{note:slug}', 'NoteController@show')->name('notes.show');
        Route::patch('{note:slug}/edit', 'NoteController@update');
        Route::post('create-new-note', 'NoteController@store');
        Route::delete('{note:slug}/delete', 'NoteController@destroy');
    });

    Route::group(['prefix' => 'subjects'], function () {
        Route::get('', 'SubjectController@index');
    });
});

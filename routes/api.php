<?php

Route::post('/login', 'AuthController@login');

Route::group(['middleware' => ['api.jwt']], function() {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

    Route::get('/users/me', 'HomeController@index');
});

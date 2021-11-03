<?php
    use Illuminate\Support\Facades\Route;
    Route::get('/', 'customer\dashboardController@index');
    Route::get('/users', 'customer\userController@index');
    Route::get('/events', 'customer\eventController@index');
    Route::get('/activities', 'customer\activityController@index');
<?php
    use Illuminate\Support\Facades\Route;
    Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
    Route::match(['get', 'post'], '/register', 'AuthController@register')->name('register');
    Route::get('/logout', 'AuthController@logout');

    Route::middleware('auth')->group(function (){
        Route::get('/', 'customer\dashboardController@index');

        Route::get('/users', 'customer\UserController@index');
        Route::post('/users/save-create', 'customer\UserController@saveCreate');

        Route::get('/events', 'customer\eventController@index');
        Route::get('/activities', 'customer\activityController@index');
    });

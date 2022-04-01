<?php

    Route::prefix('authenticate')->group(function() {
        Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
        Route::get('/logout', 'AuthController@logout');
    });

    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix' => 'article'], function(){
        Route::get('/', 'ArticleController@index')->name('management.get.article.list-articles');
        Route::get('/create', 'ArticleController@create')->name('management.get.article.create');
        Route::post('/save-create', 'ArticleController@saveCreate')->name('management.post.article.save-create');
        Route::get('/{id}/edit/', 'ArticleController@edit')->name('management.get.article.edit');
        Route::post('/{id}/save-edit/', 'ArticleController@saveEdit')->name('management.post.article.save-edit');
        Route::post('/{id}/toggle-visiable', 'ArticleController@toggleVisiable')->name('management.delete.article.toggle-visiable');
        Route::delete('/{id}/', 'ArticleController@delete')->name('management.delete.article.delete');
    });
<?php

    Route::prefix('authenticate')->group(function() {
        Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
        Route::get('/logout', 'AuthController@logout');
    });

    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix' => 'article'], function(){
        Route::get('/', 'ArticleController@index')->name('master.get.article.list-articles');
        Route::get('/create', 'ArticleController@create')->name('master.get.article.create');
        Route::post('/save-create', 'ArticleController@saveCreate')->name('master.post.article.save-create');
        Route::get('/{id}/edit/', 'ArticleController@edit')->name('master.get.article.edit');
        Route::post('/{id}/save-edit/', 'ArticleController@saveEdit')->name('master.post.article.save-edit');
        Route::post('/{id}/toggle-visiable', 'ArticleController@toggleVisiable')->name('master.post.article.toggle-visiable');
        Route::delete('/{id}/', 'ArticleController@delete')->name('master.delete.article.delete');
    });

    Route::group(['prefix' => 'contact'], function(){
        Route::get('/', 'ContactController@index')->name('master.get.contact.list-contacts');
        Route::post('/{id}/toggle-visiable', 'ContactController@toggleVisiable')->name('master.delete.contact.toggle-visiable');
        Route::delete('/{id}/', 'ContactController@delete')->name('master.delete.contact.delete');
        Route::get('/{id}/', 'ContactController@detail')->name('master.get.contact.contact-detail');
    });

<?php
    use Illuminate\Support\Facades\Route;

    Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');
    Route::get('/logout', 'AuthController@logout');
    
    Route::middleware('auth')->group(function (){
        Route::get('/', 'AdminController@index')->name('master.home');
        Route::post('storage/upload', 'StorageController@upload');
        
        Route::group(['prefix' => 'articles'], function(){
            Route::get('/', 'ArticleController@index')->name('master.get.article.list-articles');
            Route::get('/create', 'ArticleController@create')->name('master.get.article.create');
            Route::post('/save-create', 'ArticleController@saveCreate')->name('master.post.article.save-create');
            Route::get('/{id}/edit/', 'ArticleController@edit')->name('master.get.article.edit');
            Route::post('/{id}/save-edit/', 'ArticleController@saveEdit')->name('master.post.article.save-edit');
            Route::post('/{id}/toggle-visiable', 'ArticleController@toggleVisiable')->name('master.post.article.toggle-visiable');
            Route::delete('/{id}/', 'ArticleController@delete')->name('master.delete.article.delete');
        });
        Route::group(['prefix' => 'users'], function(){
            Route::get('/', 'UserController@index')->name('master.get.user.list-users');
            Route::get('/guest', 'UserController@guest')->name('master.get.user.list-guest');
            Route::get('/create', 'UserController@create')->name('master.get.user.create');
            Route::post('/save-create', 'UserController@saveCreate')->name('master.post.user.save-create');
            Route::get('/{id}/edit/', 'UserController@edit')->name('master.get.user.edit');
            Route::post('/{id}/save-edit/', 'UserController@saveEdit')->name('master.post.user.save-edit');
            Route::post('/{id}/send-email-verify/', 'UserController@sendEmailVerify')->name('master.post.user.send-email-verify');
            Route::post('/{id}/toggle-visiable', 'UserController@toggleVisiable')->name('master.post.user.toggle-visiable');
            Route::delete('/{id}/', 'UserController@delete')->name('master.delete.user.delete');
        });

        Route::group(['prefix' => 'managerment'], function(){
            Route::get('/', 'ManagerController@index')->name('master.get.manager.list-managers');
            // Route::get('/guest', 'ManagerController@guest')->name('master.get.user.list-guest');
            // Route::get('/create', 'ManagerController@create')->name('master.get.user.create');
            // Route::post('/save-create', 'ManagerController@saveCreate')->name('master.post.user.save-create');
            // Route::get('/{id}/edit/', 'ManagerController@edit')->name('master.get.user.edit');
            // Route::post('/{id}/save-edit/', 'ManagerController@saveEdit')->name('master.post.user.save-edit');
            // Route::post('/{id}/send-email-verify/', 'ManagerController@sendEmailVerify')->name('master.post.user.send-email-verify');
            // Route::post('/{id}/toggle-visiable', 'ManagerController@toggleVisiable')->name('master.post.user.toggle-visiable');
            // Route::delete('/{id}/', 'ManagerController@delete')->name('master.delete.user.delete');
        });

        Route::group(['prefix' => 'contact'], function(){
            Route::get('/', 'ContactController@index')->name('master.get.contact.list-contacts');
            Route::post('/{id}/toggle-visiable', 'ContactController@toggleVisiable')->name('master.delete.contact.toggle-visiable');
            Route::delete('/{id}/', 'ContactController@delete')->name('master.delete.contact.delete');
            Route::get('/{id}/', 'ContactController@detail')->name('master.get.contact.contact-detail');
        });

        Route::group(['prefix' => 'setting'], function(){
            Route::get('/', 'SettingController@index')->name('master.get.setting');
            Route::post('/save-videoIntro', 'ProfileController@saveVideoIntro');
            Route::post('/delete-videoIntro', 'ProfileController@deleteVideoIntro');
        });

        Route::group(['prefix' => 'galary'], function(){
            Route::get('/', 'GallaryController@index')->name('master.get.galary-popular.list-galary-popular');
            // Route::get('/guest', 'ManagerController@guest')->name('master.get.user.list-guest');
            // Route::get('/create', 'ManagerController@create')->name('master.get.user.create');
            // Route::post('/save-create', 'ManagerController@saveCreate')->name('master.post.user.save-create');
            // Route::get('/{id}/edit/', 'ManagerController@edit')->name('master.get.user.edit');
            // Route::post('/{id}/save-edit/', 'ManagerController@saveEdit')->name('master.post.user.save-edit');
            // Route::post('/{id}/send-email-verify/', 'ManagerController@sendEmailVerify')->name('master.post.user.send-email-verify');
            // Route::post('/{id}/toggle-visiable', 'ManagerController@toggleVisiable')->name('master.post.user.toggle-visiable');
            // Route::delete('/{id}/', 'ManagerController@delete')->name('master.delete.user.delete');
        });
    });
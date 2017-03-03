<?php

Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin/login', 'AdminAuth\LoginController@login');
Route::post('admin/logout', 'AdminAuth\LoginController@logout');
Route::post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
Route::get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\RegisterController@register');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.user'], function () {

    // HOME
    Route::get('/home', ['as' => 'home.index', 'uses' => 'Admin\HomeController@index']);

    //USERS
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\UsersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Admin\UsersController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Admin\UsersController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Admin\UsersController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Admin\UsersController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\UsersController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'Admin\UsersController@active']);
        Route::get('destroyImage/{id}', ['as' => 'destroyImage', 'uses' => 'Admin\UsersController@destroyImage']);
    });

    //NEWSLETTER
    Route::group(['prefix' => 'newsletters', 'as' => 'newsletters.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\NewslettersController@index']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\NewslettersController@destroy']);
        Route::get('export', ['as' => 'export', 'uses' => 'Admin\NewslettersController@export']);
    });

    //CONTACTS
    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\ContactsController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'Admin\ContactsController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Admin\ContactsController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\ContactsController@destroy']);
        Route::get('export', ['as' => 'export', 'uses' => 'Admin\ContactsController@export']);
    });

    //BANNERS
    Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\BannersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Admin\BannersController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Admin\BannersController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Admin\BannersController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Admin\BannersController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\BannersController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'Admin\BannersController@active']);
        Route::get('destroyImage/{id}', ['as' => 'destroyImage', 'uses' => 'Admin\BannersController@destroyImage']);
    });


    //BLOG
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\BlogController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Admin\BlogController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Admin\BlogController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Admin\BlogController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Admin\BlogController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\BlogController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'Admin\BlogController@active']);

        //TAGS
        Route::get('tags/{id}', ['as' => 'tags.index', 'uses' => 'Admin\BlogTagsController@index']);
        Route::post('tags/store', ['as' => 'tags.store', 'uses' => 'Admin\BlogTagsController@store']);
        Route::get('tags/destroy/{id}', ['as' => 'tags.destroy', 'uses' => 'Admin\BlogTagsController@destroy']);

        //GALERY
        Route::get('galery/{id}', ['as' => 'galery.index', 'uses' => 'Admin\BlogImagesController@index']);
        Route::get('galery/destroy/{id}', ['as' => 'galery.destroy', 'uses' => 'Admin\BlogImagesController@destroy']);
        Route::post('galery/upload/{id}', ['as' => 'galery.upload', 'uses' => 'Admin\BlogImagesController@upload']);
        Route::post('galery/updateLabel/{id}', ['as' => 'galery.updateLabel', 'uses' => 'Admin\BlogImagesController@updateLabel']);
        Route::post('galery/cover/{id}', ['as' => 'galery.cover', 'uses' => 'Admin\BlogImagesController@cover']);
        Route::post('galery/order/{id}', ['as' => 'galery.order', 'uses' => 'Admin\BlogImagesController@order']);
        Route::post('galery/store', ['as' => 'galery.store', 'uses' => 'Admin\BlogImagesController@store']);
    });

    //TAGS
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Admin\TagsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Admin\TagsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Admin\TagsController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Admin\TagsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Admin\TagsController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Admin\TagsController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'Admin\TagsController@active']);
    });


});
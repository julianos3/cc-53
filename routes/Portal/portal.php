<?php

Auth::routes();

//REGISTER CONDOMINIUM
Route::group(['prefix' => 'portal', 'as' => 'portal.', 'middleware' => 'auth'], function () {
    Route::get('/home', ['as' => 'home.index', 'uses' => 'Portal\Home\HomeController@index']);

    Route::get('city/list/{id}', ['as' => 'city.list', 'uses' => 'Portal\CityController@getCity']);
    Route::get('state/getUfId/{uf}', ['as' => 'city.list', 'uses' => 'Portal\StateController@getUfId']);


    include_once('condominium.php');
    include_once('manage.php');
    include_once('communication.php');
    include_once('subscription.php');
    //Route::get('/opa', ['as' => 'opa', 'uses' => 'Portal\TesteController@index']);


    Route::get('/teste', ['as' => 'teste', 'uses' => 'Portal\TesteController@index']);

});

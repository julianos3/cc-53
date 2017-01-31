<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//REGISTER CONDOMINIUM
Route::group(['prefix' => 'portal', 'as' => 'portal.', 'middleware' => 'auth'], function () {
    Route::get('/home', ['as' => 'home.index', 'uses' => 'Portal\Home\HomeController@index']);

    Route::get('city/list/{id}', ['as' => 'city.list', 'uses' => 'Portal\CityController@getCity']);
    Route::get('state/getUfId/{uf}', ['as' => 'city.list', 'uses' => 'Portal\StateController@getUfId']);

    include_once('Portal/condominium.php');
    include_once('Portal/manage.php');
    include_once('Portal/communication.php');
    
});

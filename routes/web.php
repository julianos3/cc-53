<?php

Route::get('/', function () {
    return view('site/home');
});

Route::get('/home', 'Site\HomeController@index');
Route::get('/funcionalidades', 'Site\FuncionalidadesController@index');
Route::get('/beneficios', 'Site\BeneficiosController@index');
Route::get('/blog', 'Site\BlogController@index');
Route::get('/contato', 'Site\ContatoController@index');



include_once('Portal/portal.php');
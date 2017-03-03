<?php

Route::get('/', ['as' => 'site.index', 'uses' => 'Site\HomeController@index']);
Route::get('/home', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

Route::get('/funcionalidades', ['as' => 'site.funcionalidades', 'uses' => 'Site\FuncionalidadesController@index']);
Route::get('/beneficios', ['as' => 'site.beneficios', 'uses' => 'Site\BeneficiosController@index']);
Route::get('/blog', ['as' => 'site.blog', 'uses' => 'Site\BlogController@index']);
Route::get('/blog/{id}/{seoLink}', ['as' => 'site.blog.show', 'uses' => 'Site\BlogController@show']);
Route::get('/blog/{tag}', ['as' => 'site.blog.tag', 'uses' => 'Site\BlogController@tag']);

Route::get('/contato', ['as' => 'site.contato', 'uses' => 'Site\ContatoController@index']);
Route::post('/contato/store', ['as' => 'site.contato.store', 'uses' => 'Site\ContatoController@store']);

Route::post('/newsletter/store', ['as' => 'site.newsletter.store', 'uses' => 'Site\NewslettersController@store']);


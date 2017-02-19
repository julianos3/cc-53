<?php

Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'Portal\Subscription\SubscriptionsController@index']);

});
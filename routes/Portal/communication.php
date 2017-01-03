<?php
//COMUNICATION
Route::group(['prefix' => 'communication', 'as' => 'communication.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'Portal\Communication\Communication\CommunicationController@index']);

    Route::group(['prefix' => 'notification', 'as' => 'notification.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Notification\NotificationController@index']);
        Route::get('show', ['as' => 'show', 'uses' => 'Portal\Communication\Notification\NotificationController@show']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Communication\Notification\NotificationController@destroy']);
        Route::get('click', ['as' => 'click', 'uses' => 'Portal\Communication\Notification\NotificationController@click']);
    });

    //MESSAGE
    Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
        //PUBLIC
        Route::group(['prefix' => 'public', 'as' => 'public.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Message\MessagePublicController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'Portal\Communication\Message\MessagePublicController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'Portal\Communication\Message\MessagePublicController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Communication\Message\MessagePublicController@destroy']);

            Route::post('reply.store', ['as' => 'reply.store', 'uses' => 'Portal\Communication\Message\MessageReplyController@store']);
            Route::get('reply.destroy/{id}', ['as' => 'reply.destroy', 'uses' => 'Portal\Communication\Message\MessageReplyController@destroy']);
        });

        //private
        Route::group(['prefix' => 'private', 'as' => 'private.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Message\MessagePrivateController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'Portal\Communication\Message\MessagePrivateController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'Portal\Communication\Message\MessagePrivateController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Communication\Message\MessagePrivateController@destroy']);

            Route::get('reply/{id}', ['as' => 'reply', 'uses' => 'Portal\Communication\Message\MessageReplyController@index']);
            Route::post('reply.store', ['as' => 'reply.store', 'uses' => 'Portal\Communication\Message\MessageReplyController@store']);
            Route::get('reply.destroy/{id}', ['as' => 'reply.destroy', 'uses' => 'Portal\Communication\Message\MessageReplyController@destroy']);
        });
    });

    //MESSAGE RESPOSTA
    Route::get('message/{messageId}/reply/', ['as' => 'message.reply.index', 'uses' => 'Portal\MessageReplyController@index']);
    Route::get('message/{messageId}/reply/create', ['as' => 'message.reply.create', 'uses' => 'Portal\MessageReplyController@create']);
    Route::post('message/{messageId}/reply/store', ['as' => 'message.reply.store', 'uses' => 'Portal\MessageReplyController@store']);
    Route::get('message/{messageId}/reply/edit/{id}', ['as' => 'message.reply.edit', 'uses' => 'Portal\MessageReplyController@edit']);
    Route::post('message/{messageId}/reply/update/{id}', ['as' => 'message.reply.update', 'uses' => 'Portal\MessageReplyController@update']);
    Route::get('message/{messageId}/reply/destroy/{id}', ['as' => 'message.reply.destroy', 'uses' => 'Portal\MessageReplyController@destroy']);


    //CALLED
    Route::group(['prefix' => 'called', 'as' => 'called.'], function () {

        Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Called\CalledController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Communication\Called\CalledController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Communication\Called\CalledController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Communication\Called\CalledController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Communication\Called\CalledController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Communication\Called\CalledController@destroy']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'Portal\Communication\Called\CalledController@show']);
        Route::get('view/{id}', ['as' => 'view', 'uses' => 'Portal\Communication\Called\CalledController@view']);

        //CALLED HISTORIC
        Route::get('{calledId}/historic/', ['as' => 'historic.index', 'uses' => 'Portal\Communication\Called\CalledHistoricController@index']);

        //CALLED CATEGORY
        Route::get('category', ['as' => 'category.index', 'uses' => 'Portal\Communication\Called\CalledCategoryController@index']);
        Route::get('category/create', ['as' => 'category.create', 'uses' => 'Portal\Communication\Called\CalledCategoryController@create']);
        Route::post('category/store', ['as' => 'category.store', 'uses' => 'Portal\Communication\Called\CalledCategoryController@store']);
        Route::get('category/edit/{id}', ['as' => 'category.edit', 'uses' => 'Portal\Communication\Called\CalledCategoryController@edit']);
        Route::post('category/update/{id}', ['as' => 'category.update', 'uses' => 'Portal\Communication\Called\CalledCategoryController@update']);
        Route::get('category/destroy/{id}', ['as' => 'category.destroy', 'uses' => 'Portal\Communication\Called\CalledCategoryController@destroy']);

        //status
        Route::get('status', ['as' => 'status.index', 'uses' => 'Portal\Communication\Called\CalledStatusController@index']);
        Route::get('status/create', ['as' => 'status.create', 'uses' => 'Portal\Communication\Called\CalledStatusController@create']);
        Route::post('status/store', ['as' => 'status.store', 'uses' => 'Portal\Communication\Called\CalledStatusController@store']);
        Route::get('status/edit/{id}', ['as' => 'status.edit', 'uses' => 'Portal\Communication\Called\CalledStatusController@edit']);
        Route::post('status/update/{id}', ['as' => 'status.update', 'uses' => 'Portal\Communication\Called\CalledStatusController@update']);
        Route::get('status/destroy/{id}', ['as' => 'status.destroy', 'uses' => 'Portal\Communication\Called\CalledStatusController@destroy']);

    });

    //COMUNICADOS
    Route::group(['prefix' => 'communication', 'as' => 'communication.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Communication\CommunicationController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'Portal\Communication\Communication\CommunicationController@show']);
    });

    Route::group(['prefix' => 'communication-condominium', 'as' => 'communication-condominium.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@edit']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Communication\Communication\CommunicationCondominiumController@destroy']);

        //COMUNICADOS GROUP
        Route::get('/{communicationId}/group/', ['as' => 'group.index', 'uses' => 'Portal\Communication\Communication\CommunicationGroupController@index']);
    });


});
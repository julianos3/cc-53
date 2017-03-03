<?php
//MANAGE
Route::group(['prefix' => 'manage', 'as' => 'manage.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'Portal\Condominium\CondominiumController@index']);

    //reserve_areas
    Route::get('reserve-areas', ['as' => 'reserve-areas.index', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@index']);
    Route::get('reserve-areas/create', ['as' => 'reserve-areas.create', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@create']);
    Route::post('reserve-areas/store', ['as' => 'reserve-areas.store', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@store']);
    Route::get('reserve-areas/edit/{id}', ['as' => 'reserve-areas.edit', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@edit']);
    Route::post('reserve-areas/update/{id}', ['as' => 'reserve-areas.update', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@update']);
    Route::get('reserve-areas/destroy/{id}', ['as' => 'reserve-areas.destroy', 'uses' => 'Portal\Manage\ReserveArea\ReserveAreasController@destroy']);

    //contract
    Route::get('contract', ['as' => 'contract.index', 'uses' => 'Portal\Manage\Contract\ContractController@index']);
    Route::get('contract/create', ['as' => 'contract.create', 'uses' => 'Portal\Manage\Contract\ContractController@create']);
    Route::post('contract/store', ['as' => 'contract.store', 'uses' => 'Portal\Manage\Contract\ContractController@store']);
    Route::get('contract/edit/{id}', ['as' => 'contract.edit', 'uses' => 'Portal\Manage\Contract\ContractController@edit']);
    Route::post('contract/update/{id}', ['as' => 'contract.update', 'uses' => 'Portal\Manage\Contract\ContractController@update']);
    Route::get('contract/destroy/{id}', ['as' => 'contract.destroy', 'uses' => 'Portal\Manage\Contract\ContractController@destroy']);
    Route::get('contract/show/{id}', ['as' => 'contract.show', 'uses' => 'Portal\Manage\Contract\ContractController@show']);

    Route::get('contract/file/destroy/{id}', ['as' => 'contract.file.destroy', 'uses' => 'Portal\Manage\Contract\ContractFileController@destroy']);
    Route::get('contract/file/show/{id}', ['as' => 'contract.file.show', 'uses' => 'Portal\Manage\Contract\ContractFileController@show']);

    //Maintenance
    Route::group(['prefix' => 'maintenance', 'as' => 'maintenance.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Manage\Maintenance\MaintenanceController@destroy']);

        Route::group(['prefix' => 'completed', 'as' => 'completed.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@index']);
            Route::get('{id}/create', ['as' => 'create', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Manage\Maintenance\MaintenanceCompletedController@destroy']);
        });
    });

});

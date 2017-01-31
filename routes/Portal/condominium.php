<?php
Route::group(['prefix' => 'condominium', 'as' => 'condominium.'], function () {
    //CONDOMINIUM
    Route::get('/', ['as' => 'index', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@create']);
    Route::get('/create/info', ['as' => 'create.info', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@createInfo']);
    Route::get('/create/config', ['as' => 'create.config', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@createConfig']);
    Route::get('/create/finish', ['as' => 'create.finish', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@finish']);
    Route::post('/create/unit', ['as' => 'create.unit', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@createUnit']);
    Route::post('/create/finish', ['as' => 'create.finish', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@finishStore']);
    Route::post('/store', ['as' => 'store', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@store']);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@edit']);
    Route::get('/accessGet/{id}', ['as' => 'accessGet', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@access']);
    Route::post('/access', ['as' => 'access', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@accessStore']);
    Route::post('/update', ['as' => 'update', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@update']);
    Route::post('/update/info', ['as' => 'update.info', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@updateInfo']);
    Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@destroy']);
    Route::get('/unitBlockClear', ['as' => 'unitBlockClear', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@clearUnitBlock']);
    Route::get('/image/{id}/{image}', ['as' => 'image', 'uses' => 'Portal\Condominium\Condominium\CondominiumController@showImage']);

    //USER
    Route::get('user', ['as' => 'user.index', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@index']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@create']);
    Route::post('user/store', ['as' => 'user.store', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@edit']);
    Route::post('user/update/{id}', ['as' => 'user.update', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@update']);
    Route::post('user/password/update', ['as' => 'user.password.update', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@updatePassword']);
    Route::get('user/password', ['as' => 'user.password', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@password']);
    Route::get('user/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@destroy']);
    Route::get('user/destroy-active/{id}', ['as' => 'user.destroy-active', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@destroyActive']);
    Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@show']);
    Route::get('user/unit/{id}', ['as' => 'user.unit', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@unit']);
    Route::post('user/unit/create', ['as' => 'user.unit.create', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@userUnitCreate']);
    Route::get('user/image/{id}/{image}', ['as' => 'user.image', 'uses' => 'Portal\User\UsersController@showImage']);
    Route::get('user/approval/{id}', ['as' => 'user.approval', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@showUserNotActive']);
    Route::get('user/approval/{id}', ['as' => 'user.approval.show', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@showUserNotActive']);
    Route::get('user/approval/confirm/{id}', ['as' => 'user.approval.confirm', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@confirmNotActive']);
    Route::get('user/approval', ['as' => 'user.approval.all', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@approvalAll']);
    Route::get('user/config/{id}', ['as' => 'user.config', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@config']);
    Route::post('user/config/update/{id}', ['as' => 'user.config.update', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@configUpdate']);
    Route::get('user/newPassword/{id}/{userId}', ['as' => 'user.newPassword', 'uses' => 'Portal\Condominium\Condominium\UserCondominiumController@newPassword']);


    //UNIT
    Route::group(['prefix' => 'unit', 'as' => 'unit.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\Unit\UnitController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\Unit\UnitController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\Unit\UnitController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Unit\UnitController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\Unit\UnitController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Unit\UnitController@destroy']);

        //GARAGE
        Route::get('garage', ['as' => 'garage.index', 'uses' => 'Portal\Condominium\Unit\UnitController@garage']);
        Route::get('garage/create', ['as' => 'garage.create', 'uses' => 'Portal\Condominium\Unit\UnitController@garageCreate']);
        Route::post('garage/store', ['as' => 'garage.store', 'uses' => 'Portal\Condominium\Unit\UnitController@garageStore']);
        Route::get('garage/edit/{id}', ['as' => 'garage.edit', 'uses' => 'Portal\Condominium\Unit\UnitController@garageEdit']);
        Route::post('garage/update/{id}', ['as' => 'garage.update', 'uses' => 'Portal\Condominium\Unit\UnitController@garageUpdate']);

        Route::get('block/{blockId}', ['as' => 'block', 'uses' => 'Portal\Condominium\Unit\UnitController@block']);

        //USER UNIT
        Route::get('user', ['as' => 'user.index', 'uses' => 'Portal\Condominium\Unit\UserUnitController@index']);
        Route::get('user/create', ['as' => 'user.create', 'uses' => 'Portal\Condominium\Unit\UserUnitController@create']);
        Route::post('user/storeJson', ['as' => 'user.storeJon', 'uses' => 'Portal\Condominium\Unit\UserUnitController@storeJson']);
        Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Portal\Condominium\Unit\UserUnitController@edit']);
        Route::post('user/listAll', ['as' => 'user.listAll', 'uses' => 'Portal\Condominium\Unit\UserUnitController@listAll']);
        Route::post('user/update/{id}', ['as' => 'user.update', 'uses' => 'Portal\Condominium\Unit\UserUnitController@update']);
        Route::get('user/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'Portal\Condominium\Unit\UserUnitController@destroy']);

    });

    //BLOCK
    Route::group(['prefix' => 'block', 'as' => 'block.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\Block\BlockController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\Block\BlockController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\Block\BlockController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Block\BlockController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\Block\BlockController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Block\BlockController@destroy']);
    });

    //SECURITY CAM
    Route::group(['prefix' => 'security-cam', 'as' => 'security-cam.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@index']);
        Route::get('list', ['as' => 'list', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@listAll']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@edit']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@show']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\SecurityCam\SecurityCamController@destroy']);
    });

    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Group\GroupCondominiumController@destroy']);

        //USERS GROUP CONDOMINIUM
        Route::get('/{idGroup}/user/', ['as' => 'user.index', 'uses' => 'Portal\Condominium\Group\UserGroupCondominiumController@index']);
        Route::get('/{idGroup}/user/create', ['as' => 'user.create', 'uses' => 'Portal\Condominium\Group\UserGroupCondominiumController@create']);
        Route::post('/user/store', ['as' => 'user.store', 'uses' => 'Portal\Condominium\Group\UserGroupCondominiumController@store']);
        Route::get('/{idGroup}/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'Portal\Condominium\Group\UserGroupCondominiumController@destroy']);
    });
    //PROVIDERS
    Route::group(['prefix' => 'provider', 'as' => 'provider.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\Provider\ProviderController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\Provider\ProviderController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\Provider\ProviderController@store']);
        Route::get('createAjax', ['as' => 'createAjax', 'uses' => 'Portal\Condominium\Provider\ProviderController@createAjax']);
        Route::post('storeAjax', ['as' => 'storeAjax', 'uses' => 'Portal\Condominium\Provider\ProviderController@storeAjax']);
        Route::get('listAllSelect', ['as' => 'listAllSelect', 'uses' => 'Portal\Condominium\Provider\ProviderController@listAllSelect']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Provider\ProviderController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\Provider\ProviderController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Provider\ProviderController@destroy']);
    });

    //DIARY
    Route::group(['prefix' => 'diary', 'as' => 'diary.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'Portal\Condominium\Diary\DiaryController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'Portal\Condominium\Diary\DiaryController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'Portal\Condominium\Diary\DiaryController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Portal\Condominium\Diary\DiaryController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'Portal\Condominium\Diary\DiaryController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Portal\Condominium\Diary\DiaryController@destroy']);
    });



});
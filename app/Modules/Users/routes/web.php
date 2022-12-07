<?php

Route::group(['module' => 'Users', 'middleware' => ['web'], 'namespace' => 'App\Modules\Users\Controllers'], function() {

    Route::resource('Users', 'UsersController');

});

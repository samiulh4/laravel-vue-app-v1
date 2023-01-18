<?php

Route::group(['module' => 'Settings', 'middleware' => ['web'], 'namespace' => 'App\Modules\Settings\Controllers'], function() {

    Route::resource('Settings', 'SettingsController');

});

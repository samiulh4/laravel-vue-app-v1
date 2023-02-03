<?php

Route::group(['module' => 'Authentication', 'middleware' => ['web'], 'namespace' => 'App\Modules\Authentication\Controllers'], function() {

    Route::resource('Authentication', 'AuthenticationController');

});

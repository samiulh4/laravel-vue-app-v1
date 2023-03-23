<?php

Route::group(['module' => 'JobSearch', 'middleware' => ['api'], 'namespace' => 'App\Modules\JobSearch\Controllers'], function() {

    Route::resource('JobSearch', 'JobSearchController');

});

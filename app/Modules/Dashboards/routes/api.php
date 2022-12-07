<?php

Route::group(['module' => 'Dashboards', 'middleware' => ['api'], 'namespace' => 'App\Modules\Dashboards\Controllers'], function() {

    Route::resource('Dashboards', 'DashboardsController');

});

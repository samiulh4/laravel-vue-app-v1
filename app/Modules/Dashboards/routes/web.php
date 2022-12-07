<?php

Route::group(['module' => 'Dashboards', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Dashboards\Controllers'], function() {
    Route::get('web/dashboard', 'DashboardController@webDashboard');
    Route::get('admin/dashboard', 'DashboardController@adminDashboard');
});

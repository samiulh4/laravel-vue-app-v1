<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Dashboards', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Dashboards\Controllers'], function() {
    Route::get('web/dashboard', 'DashboardController@webDashboard');
    Route::get('admin/dashboard', 'DashboardController@adminDashboard');
    Route::get('admin/v2/dashboard', 'DashboardController@niceAdminDashboard');
});

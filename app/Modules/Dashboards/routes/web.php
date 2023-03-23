<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Dashboards', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Dashboards\Controllers'], function() {
    Route::get('web/dashboard', 'DashboardController@webDashboard');
    Route::get('admin/v2/dashboard', 'DashboardController@adminDashboard')->name('admin.v1.dashboard');
    Route::get('admin/v2/dashboard', 'DashboardController@niceAdminDashboard')->name('admin.v2.dashboard');

    Route::get('/admin/v1/home', 'AdminHomeController@adminV1Home')->name('admin.v1.home');
    Route::get('/admin/v2/home', 'AdminHomeController@adminV2Home')->name('admin.v2.home');
});


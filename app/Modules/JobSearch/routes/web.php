<?php
use Illuminate\Support\Facades\Route;

# With Auth [Admin]
Route::group(['module' => 'JobSearch', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\JobSearch\Controllers'], function() {
    Route::get('/admin/v2/job/index', 'AdminJobSearchController@index')->name('admin.v2.job.index');
});
# Without Auth [Web]
Route::group(['module' => 'JobSearch', 'middleware' => ['web'], 'namespace' => 'App\Modules\JobSearch\Controllers'], function() {
    Route::get('/job', 'WebJobSearchController@index')->name('job.index');
    Route::get('/job/scrap', 'JobScrapController@jobScrap')->name('job.scrap');
    Route::get('/job/scrap/url', 'JobScrapController@jobScrapUrl')->name('job.scrap.url');
});

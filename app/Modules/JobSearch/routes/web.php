<?php
use Illuminate\Support\Facades\Route;

# With Auth
Route::group(['module' => 'JobSearch', 'middleware' => ['web'], 'namespace' => 'App\Modules\JobSearch\Controllers'], function() {

});




# Without Auth
Route::group(['module' => 'JobSearch', 'prefix' => '/job', 'middleware' => ['web'], 'namespace' => 'App\Modules\JobSearch\Controllers'], function() {
    Route::get('/', 'JobSearchController@index')->name('job.index');
});

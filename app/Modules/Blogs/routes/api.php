<?php

Route::group(['module' => 'Blogs', 'middleware' => ['api'], 'prefix' => '/api', 'namespace' => 'App\Modules\Blogs\Controllers'], function() {

    Route::get('/blog/index/{page}', 'BlogApiController@index');
    Route::post('/blog/store', 'BlogApiController@store');
    Route::get('/blog/details/{id}', 'BlogApiController@details');
});

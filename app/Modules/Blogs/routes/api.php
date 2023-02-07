<?php

Route::group(['module' => 'Blogs', 'middleware' => ['api'], 'prefix' => '/api', 'namespace' => 'App\Modules\Blogs\Controllers'], function() {

    Route::get('/blog/index', 'BlogApiController@index');

});

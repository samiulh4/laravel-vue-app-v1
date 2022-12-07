<?php

Route::group(['module' => 'Blogs', 'middleware' => ['api'], 'namespace' => 'App\Modules\Blogs\Controllers'], function() {

    Route::resource('Blogs', 'BlogsController');

});

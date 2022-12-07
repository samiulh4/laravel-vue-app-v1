<?php

Route::group(['module' => 'Blogs', 'middleware' => ['web'], 'namespace' => 'App\Modules\Blogs\Controllers'], function() {

    Route::resource('Blogs', 'BlogsController');

});

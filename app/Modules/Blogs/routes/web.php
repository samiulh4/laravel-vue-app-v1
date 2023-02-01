<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Blogs', 'middleware' => ['web'], 'namespace' => 'App\Modules\Blogs\Controllers'], function() {
    Route::resource('Blogs', 'BlogsController');
});

# With out Auth
Route::group(['module' => 'Blogs', 'middleware' => ['web'], 'namespace' => 'App\Modules\Blogs\Controllers'], function() {
    Route::post('/blog/article/ajax/store', 'ArticleController@ajaxStore');
});

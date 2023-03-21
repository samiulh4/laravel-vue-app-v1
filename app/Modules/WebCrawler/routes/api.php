<?php

Route::group(['module' => 'WebCrawler', 'middleware' => ['api'], 'namespace' => 'App\Modules\WebCrawler\Controllers'], function() {

    Route::resource('WebCrawler', 'WebCrawlerController');

});

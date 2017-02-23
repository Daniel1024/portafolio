<?php

Route::get('/', 'IndexController@index')->name('home');

Route::post('/portfolio', 'IndexController@store')->name('portfolio.store');

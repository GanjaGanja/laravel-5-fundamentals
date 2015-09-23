<?php

Route::get('about', 'PagesController@about');
Route::get('about2', 'PagesController@about2');
Route::get('about3', 'PagesController@about3');
Route::get('about4', 'PagesController@about4');

Route::get('contact', 'PagesController@contact');

Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
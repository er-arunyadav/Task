<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){


		Route::get('/home', [
			'uses' => 'HomeController@index',
			'as' => 'home'
		]);

		Route::get('/article', [
			'uses' => 'ArticleController@index',
			'as' => 'article'
		]);

		Route::post('/article/store', [
			'uses' => 'ArticleController@store',
			'as' => 'article.store'
		]);

		Route::post('/article/update/{id}', [
			'uses' => 'ArticleController@update',
			'as' => 'article.update'
		]);
		Route::get('/article/edit/{id}', [
			'uses' => 'ArticleController@edit',
			'as' => 'article.edit'
		]);
	Route::get('/article/delete/{id}', [
			'uses' => 'ArticleController@destroy',
			'as' => 'article.delete'
		]);


// Category Route Start


	Route::get('/category', [
			'uses' => 'CategoriesController@index',
			'as' => 'categories'
		]);

Route::post('/category/list', [
			'uses' => 'CategoriesController@listcategories',
			'as' => 'category.list'
		]);
		Route::post('/category/store', [
			'uses' => 'CategoriesController@store',
			'as' => 'category.store'
		]);

		Route::post('/category/update/{id}', [
			'uses' => 'CategoriesController@update',
			'as' => 'category.update'
		]);
		Route::get('/category/edit/{id}', [
			'uses' => 'CategoriesController@edit',
			'as' => 'category.edit'
		]);
	Route::get('/category/delete/{id}', [
			'uses' => 'CategoriesController@destroy',
			'as' => 'category.delete'
		]);






});


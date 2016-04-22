<?php

Route::group(['middleware' => ['web']], function () {

	Route::group(['prefix' => 'kanepe'], function() {

		// Authentication Routes...
		Route::get('login', 'Auth\AuthController@showLoginForm');
		Route::post('login', 'Auth\AuthController@login');
		Route::get('logout', 'Auth\AuthController@logout');

		// Registration Routes...
		if(App\User::count() <= 0) {
			Route::get('register', 'Auth\AuthController@showRegistrationForm');
			Route::post('register', 'Auth\AuthController@register');
		}

		// Password Reset Routes...
		Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
		Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
		Route::post('password/reset', 'Auth\PasswordController@reset');

		Route::group(['middleware' => 'auth'], function() {

			Route::get('/', 'DashboardController@index');

			Route::group(['prefix' => 'pages'], function() {
				Route::get('/create', 'PagesController@edit');
				Route::post('/save', 'PagesController@save');
				Route::get('/page/{id}', 'PagesController@edit');
				Route::get('/{sayfa?}', 'PagesController@index');
				Route::get('/delete/{id}', 'PagesController@delete');
			});

			Route::group(['prefix' => 'posts'], function() {
				Route::get('/create', 'PostController@edit');
				Route::post('/save', 'PostController@save');
				Route::get('/post/{id}', 'PostController@edit');
				Route::get('/{sayfa?}', 'PostController@index');
				Route::get('/delete/{id}', 'PostController@delete');
			});

			Route::get('/about', 'PagesController@editAbout');
			Route::post('/about', 'PagesController@saveAbout');
			Route::post('/profile', 'PagesController@saveProfile');

		});
	});

	Route::get('/', 'ContentController@index');

	Route::group(['prefix' => 'blog'], function() {
		Route::get('/', 'ContentController@blogIndex');
		Route::get('/page/{page}', 'ContentController@blogIndex');
		Route::get('/{permalink}', 'ContentController@blogPost');

	});

	Route::get('/{page}', 'ContentController@page');
});

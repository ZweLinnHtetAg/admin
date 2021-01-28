<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	
	Route::get('profile',[ProfileController::class,'edit'])->name('profile.edit');
	Route::post('update-profile/{name}/{email}',[ProfileController::class,'changeNameEmail'])->name('update-profile');
	Route::get('check-password/{password}',[ProfileController::class,'checkPassword'])->name('check-password');
	Route::post('change-password/{password}',[ProfileController::class,'changePassword'])->name('change-password');

	
});


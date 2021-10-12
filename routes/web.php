<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::group([
        'middleware' => 'auth',
        'prefix' => '/users'
    ], function () {
        Route::get('', function () {
            return view('admin.users.index');
        })->name('users.index');
        Route::get('/profile', function () {
            return view('admin.users.show');
        })->name('users.show');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





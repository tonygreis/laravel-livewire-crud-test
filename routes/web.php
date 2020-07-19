<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::view('password/reset', 'auth.passwords.email')->name('password.request');
Route::get('password/reset/{token}', 'Auth\PasswordResetController')->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')->name('logout');

    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});

Route::view('categories/create', 'categories.create')->name('categories.create');
Route::view('categories', 'categories.index')->name('categories.index');
Route::livewire('/categories/{category}', 'categories.view')->name('categories.view')->layout('layouts.app');
Route::livewire('/categories/{category}/edit', 'categories.edit')->name('categories.edit')->layout('layouts.app');
Route::livewire('/categories/{category}/add-sub', 'categories.add-sub')->name('categories.add-sub')->layout('layouts.app');
Route::livewire('/categories/{category}/add-field', 'categories.add-field')->name('categories.add-field')->layout('layouts.app');
Route::resource('fields', 'Admin\FieldController')->only('index', 'create', 'show', 'edit');
Route::resource('fields/{field}/options', 'Admin\OptionController')->only('create', 'edit');
Route::resource('posts', 'Admin\PostController');

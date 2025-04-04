<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('home');
Route::get('/users', function () {
    return view('layouts.users');
})->name('users.index');


require __DIR__.'/auth.php';

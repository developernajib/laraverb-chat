<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Chat\Pages\RoomShow;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::get('/chat/{room:slug}', RoomShow::class)
    ->middleware(['auth', 'verified'])
    ->name('chat.show');
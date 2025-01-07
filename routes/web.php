<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Chat\Pages\RoomShow;
use App\Livewire\Room\Index as Room;
use App\Livewire\Room\Store as RoomStore;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/chat/{room:slug}', RoomShow::class)->name('chat.show');
    Route::get('/room', Room::class)->name('room.index');
});

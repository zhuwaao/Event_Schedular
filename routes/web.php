<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'index']);

Route::get('/fetch-events', 'HomeController@fetchEvents')->name('events.fetch');

Route::post('calendar', [HomeController::class, 'store'])->name('calendar.store');

Route::patch('calendar/update/{id}', [HomeController::class, 'update'])->name ('calendar.update');

Route::delete('calendar/destroy/{id}', [HomeController::class, 'destroy'])->name ('calendar.destroy');



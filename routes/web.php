<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ScheduleController;



//use App\Http\Controllers\TimeBlockController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking', function (){
    return view('booking.index');
    })->name('booking.index');

Route::get('/schedule/{id}/{date?}', [ScheduleController::class, 'showSchedule'])->name('schedule.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');

    Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');

    
});



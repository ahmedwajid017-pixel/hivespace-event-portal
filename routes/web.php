<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\RegistrationController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::resource('admin/events', EventController::class)
    ->names('admin.events')
    ->except(['show']);

Route::get('/events/{event}', [RegistrationController::class, 'show'])
    ->name('events.show');

Route::post('/events/{event}/register', [RegistrationController::class, 'store'])
    ->name('events.register');

Route::get('/', function () {
    $events = Event::all();

    return view('home', compact('events'));
});
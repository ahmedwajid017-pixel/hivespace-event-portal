<?php

use App\Http\Controllers\Admin\EventController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::resource('admin/events', EventController::class)
    ->names('admin.events')
    ->except(['show']);

Route::get('/', function () {
    $events = Event::all();

    return view('home', compact('events'));
});
<?php

use App\Models\Event;

Route::get('/', function () {
    $events = Event::all();

    return view('home', compact('events'));
});

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Event;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function store(StoreRegistrationRequest $request, Event $event)
    {
        $registration = Registration::create([
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return view('events.thank-you', compact('event', 'registration'));
    }
}
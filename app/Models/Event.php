<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'title',
    'description',
    'event_date',
];
    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
    public function registrations()
{
    return $this->hasMany(Registration::class);
}
}
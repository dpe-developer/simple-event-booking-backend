<?php

namespace App\Repositories;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingRepository
{
    public function create($event)
    {
        return Booking::create([
            'event_id' => $event->id,
            'user_id' => Auth::user()->id
        ]);
    }

    public function getUserBookings($userId)
    {
        return Booking::where('user_id', $userId)
        ->join('events', 'bookings.event_id', '=', 'events.id')
        ->select('bookings.*')
        ->with('event')
        ->orderBy('events.date', 'ASC')
        ->paginate(12);
    }

    public function delete(Booking $event)
    {
        return $event->delete();
    }
}
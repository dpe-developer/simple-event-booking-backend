<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function create($data)
    {
        return Booking::create($data);
    }

    public function getUserBookings($userId)
    {
        return Booking::where('user_id', $userId)->with('event')->paginate(10);
    }

    public function delete(Booking $event)
    {
        return $event->delete();
    }
}
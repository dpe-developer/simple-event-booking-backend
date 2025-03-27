<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function bookEvent($data)
    {
        return $this->bookingRepository->create($data);
    }

    public function getUserBookings($userId)
    {
        return $this->bookingRepository->getUserBookings($userId);
    }

    public function deleteBooking($booking)
    {
        return $this->bookingRepository->delete($booking);
    }
}
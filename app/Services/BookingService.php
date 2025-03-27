<?php

namespace App\Services;

use App\Mail\EventBooked as MailEventBooked;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Mail;

class BookingService
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function bookEvent($event)
    {
        if ($event->bookings()->count() >= $event->capacity) {
            return response()->json([
                'error' => 'Event is fully booked'
            ], 400);
        }

        // Create the booking
        $booking = $this->bookingRepository->create($event);

        // Send notification to the user
        if(config('app.booking_email_notification', false)){
            try{
                $user = $booking->user;
                $event = $booking->event;
                Mail::to($user)->send(new MailEventBooked($event, $user));
            } catch (\Exception $e) {
                report($e);
            }
        }

        return response()->json([
            'booking' => $booking,
            'message' => 'Booking successful'
        ], 201);
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
<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Booking;
use App\Services\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function book(Event $event, Request $request)
    {
        /* if ($event->bookings()->count() >= $event->capacity) {
            return response()->json(['error' => 'Event is fully booked'], 400);
        }

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'event_id' => $event->id
        ]);

        return response()->json(['message' => 'Booking successful', 'booking' => $booking], 201); */

        return $this->bookingService->bookEvent($event);
    }

    public function userBookings(Request $request)
    {
        // return response()->json(BookingResource::collection($this->bookingService->getUserBookings($request->user()->id)));
        return new BookingCollection($this->bookingService->getUserBookings($request->user()->id));
        // return response()->json($request->user()->bookings);
    }

    public function cancelBooking(Booking $booking)
    {
        $this->bookingService->deleteBooking($booking);
        return response()->json(['message' => 'Booking deleted successfully'], 200);
    }
}

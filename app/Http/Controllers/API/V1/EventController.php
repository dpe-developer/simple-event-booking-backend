<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\EventRequest;
use App\Services\EventService;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return response()->json(EventResource::collection($this->eventService->getAllEvents()));
        return new EventCollection($this->eventService->getAllEvents($request->search));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): JsonResponse
    {
        return response()->json(new EventResource($this->eventService->createEvent($request->validated())), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // return new EventResource($event);
        return response()->json([
            'event' => new EventResource($event),
            'bookings' => new BookingCollection($event->bookings)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        return response()->json(new EventResource($this->eventService->updateEvent($event, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->eventService->deleteEvent($event);
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }

    /**
     * Retrive upcoming events.
     */
    public function upcomingEvents(Request $request)
    {
        return new EventCollection($this->eventService->getAllUpcomingEvents($request->search));

    }
}

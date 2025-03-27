<?php

namespace App\Services;

use App\Repositories\EventRepository;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents($search)
    {
        return $this->eventRepository->getAll($search);
    }

    public function getAllUpcomingEvents($search)
    {
        return $this->eventRepository->getAllUpcoming($search);
    }

    public function createEvent($data)
    {
        return $this->eventRepository->create($data);
    }

    public function updateEvent($event, $data)
    {
        return $this->eventRepository->update($event, $data);
    }

    public function deleteEvent($event)
    {
        return $this->eventRepository->delete($event);
    }
}

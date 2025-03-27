<?php

namespace App\Repositories;

use App\Models\Event;
use Carbon\Carbon;

class EventRepository
{
    public function getAll($search)
    {
        $query = Event::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        return $query->orderBy('date', 'ASC')->paginate(12);
    }

    public function getAllUpcoming($search)
    {
        $query = Event::query();
        $query->where('date', '>=', Carbon::now());
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        return $query->orderBy('date', 'ASC')->paginate(12);
    }

    public function create($data)
    {
        return Event::create($data);
    }

    public function update(Event $event, $data)
    {
        $event->update($data);
        return $event;
    }

    public function delete(Event $event)
    {
        return $event->delete();
    }
}
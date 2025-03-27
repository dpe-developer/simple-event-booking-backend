<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'location' => $this->location,
            'capacity' => $this->capacity,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'total_bookings' => $this->bookings()->count(),
            'available_slots' => $this->capacity - $this->bookings()->count(),
        ];
    }
}

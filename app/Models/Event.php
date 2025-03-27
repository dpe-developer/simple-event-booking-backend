<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'date',
        'location',
        'capacity',
        'description',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'event_id');
    }

    public function availableSlots(): int
    {
        return $this->capacity - $this->bookings->count();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Event::truncate();
        Booking::truncate();
        Event::factory()->count(50)->create();
        
        foreach(Event::limit(50)->get() as $event) {
            $remainingCapacity = $event->availableSlots();
            if ($remainingCapacity > 0) {
                $bookingCount = rand(1, $remainingCapacity);
                for ($i=0; $i < $bookingCount; $i++) { 
                    Booking::create([
                        'user_id' => rand(2, 1000),
                        'event_id' => $event->id,
                        'created_at' => Carbon::createFromTimestamp(
                            rand(
                                strtotime('-1 month'),
                                strtotime($event->date)
                            )
                        ),
                    ]);
                }
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}

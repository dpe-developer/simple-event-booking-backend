<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'David Paul Eligio',
            'email' => 'dpe.developer@gmail.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Sam Sepiol',
            'email' => 'asd@asd.com',
        ]);
        User::factory(1000)->create();

        $this->call([
            TestDataSeeder::class,
        ]);
    }
}

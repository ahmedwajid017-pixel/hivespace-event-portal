<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 3; $i++) {
            Event::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'event_date' => $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            ]);
        }
    }
}
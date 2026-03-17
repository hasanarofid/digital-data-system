<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Coach Alex "The Beast"',
                'specialty' => 'Bodybuilding',
                'bio' => '10+ years experience in muscle optimization and strength training.',
                'image_url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80&w=400',
            ],
            [
                'name' => 'Sarah "Zen" Miller',
                'specialty' => 'Yoga & Pilates',
                'bio' => 'Certified yoga instructor focusing on flexibility and mental clarity.',
                'image_url' => 'https://images.unsplash.com/photo-1518611012118-296032bb917a?auto=format&fit=crop&q=80&w=400',
            ],
        ];

        foreach ($trainers as $t) {
            $trainer = \App\Models\Trainer::create($t);
            
            // Create some classes for each trainer
            if ($t['specialty'] == 'Bodybuilding') {
                \App\Models\GymClass::create([
                    'name' => 'Strength Mastery',
                    'description' => 'Advanced weightlifting class.',
                    'trainer_id' => $trainer->id,
                    'day_of_week' => 'Monday',
                    'start_time' => '18:00',
                    'end_time' => '19:30',
                    'capacity' => 15,
                ]);
                \App\Models\GymClass::create([
                    'name' => 'Power HIIT',
                    'description' => 'High intensity interval training.',
                    'trainer_id' => $trainer->id,
                    'day_of_week' => 'Wednesday',
                    'start_time' => '07:00',
                    'end_time' => '08:00',
                    'capacity' => 20,
                ]);
            } else {
                \App\Models\GymClass::create([
                    'name' => 'Sunrise Yoga',
                    'description' => 'Gentle morning yoga.',
                    'trainer_id' => $trainer->id,
                    'day_of_week' => 'Tuesday',
                    'start_time' => '06:30',
                    'end_time' => '07:30',
                    'capacity' => 25,
                ]);
            }
        }
    }
}

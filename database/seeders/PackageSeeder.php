<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Starter Pack',
                'price' => 29.99,
                'duration_days' => 30,
                'features' => ['Gym Access', 'Locker Room', 'Water Station']
            ],
            [
                'name' => 'Pro Titan',
                'price' => 59.99,
                'duration_days' => 30,
                'features' => ['All Starter Features', 'Free Classes', 'Personal Trainer (1x/week)', 'Nutrition Plan']
            ],
            [
                'name' => 'Elite Yearly',
                'price' => 499.99,
                'duration_days' => 365,
                'features' => ['All Pro Features', 'Unlimited Personal Training', 'Spa Access', 'Guest Passes']
            ],
        ];

        foreach ($packages as $package) {
            \App\Models\Package::create($package);
        }
    }
}

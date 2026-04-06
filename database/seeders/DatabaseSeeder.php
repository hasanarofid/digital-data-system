<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Package;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin
        User::create([
            'name' => 'Admin System',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => true,
        ]);

        // 2. Seed Field User
        User::create([
            'name' => 'Field User',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'status' => true,
        ]);

        // 3. Seed Programs & Dummy Data
        $this->call([
            ProgramSeeder::class,
            DigitalDataSeeder::class,
        ]);
    }
}

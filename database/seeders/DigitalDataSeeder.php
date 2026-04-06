<?php

namespace Database\Seeders;

use App\Models\DigitalData;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DigitalDataSeeder extends Seeder
{
    public function run(): void
    {
        $fieldUser = User::where('role', 'member')->first();
        $adminUser = User::where('role', 'admin')->first();
        $programs = Program::all();
        
        $names = [
            'Budi Santoso', 'Siti Aminah', 'Agus Prayitno', 'Dewi Lestari', 
            'Eko Prasetyo', 'Rina Wijayanti', 'Fajar Ramadhan', 'Maya Indah',
            'Hendra Kurniawan', 'Lusi Puspita', 'Doni Hermawan', 'Yanti Susanti',
            'Rizky Saputra', 'Anita Sari', 'Bayu Nugroho', 'Diana Putri'
        ];

        $regions = ['Surabaya', 'Sidoarjo', 'Gresik', 'Malang', 'Mojokerto', 'Pasuruan'];
        $occupations = ['PNS', 'Karyawan Swasta', 'Wiraswasta', 'Buruh', 'Mahasiswa', 'Ibu Rumah Tangga'];
        $photos = ['ktp_photos/dummy1.png', 'ktp_photos/dummy2.png', 'ktp_photos/dummy3.png'];

        foreach ($names as $index => $name) {
            DigitalData::create([
                'user_id' => $fieldUser->id,
                'program_id' => $programs->random()->id,
                'name' => $name,
                'phone_number' => '08' . mt_rand(1000000000, 9999999999),
                'region' => Arr::random($regions),
                'occupation' => Arr::random($occupations),
                'activity' => 'Pengisian data lapangan untuk ' . $programs->random()->name,
                'ktp_photo' => Arr::random($photos),
                'status' => Arr::random(['pending', 'verified']),
                'created_at' => now()->subDays(mt_rand(0, 30))->subHours(mt_rand(0, 23)),
            ]);
        }
    }
}

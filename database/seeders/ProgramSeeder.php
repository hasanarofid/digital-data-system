<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['name' => 'Program Bantuan Sosial', 'description' => 'Program penyaluran bantuan sosial kepada masyarakat.'],
            ['name' => 'Event Kesehatan Masyarakat', 'description' => 'Kegiatan pemeriksaan kesehatan gratis.'],
            ['name' => 'Pendataan Ekonomi Kreatif', 'description' => 'Pendataan pelaku usaha ekonomi kreatif di tingkat sub-distributor.'],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
    }
}

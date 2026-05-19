<?php

namespace Database\Seeders;

use App\Models\campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Donasi Untuk Korban Banjir',
            'target_donation' => 999000,
            'collected_donation' => 250890,
            'deadline' => '2026-12-29'
        ]);
        Campaign::create([
            'title' => 'Bantu Korban Kebakaran',
            'description' => 'Donasi Untuk Korban Kebakaran',
            'target_donation' => 999000,
            'collected_donation' => 250890,
            'deadline' => '2026-12-29'
        ]);
    }
}

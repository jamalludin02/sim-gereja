<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {
            Pengumuman::create([
                'judul' => $faker->sentence,
                'isi' => $faker->paragraph,
            ]);
        }
    }
}

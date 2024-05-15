<?php

namespace Database\Seeders;

use App\Models\JadwalSidi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JadwalSidiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $users = User::pluck('id')->toArray();

        for ($i = 1; $i <= 15; $i++) {
            JadwalSidi::create([
                'id_user' => $faker->randomElement($users),
                'tanggal' => $faker->date(),
                'waktu' => $faker->time(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Sidi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SidiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $users = User::where('role', 'UMAT')->pluck('id'); // Mengambil ID pengguna dengan peran 'UMAT'

        for ($i = 1; $i <= 15; $i++) {
            Sidi::create([
                'id_user' => $faker->randomElement($users),
                'surat_baptis' => $faker->word,
                'status' => $faker->randomElement(['PROSES', 'DITERIMA', 'DITOLAK']),
            ]);
        }
    }
}

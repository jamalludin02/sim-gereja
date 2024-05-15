<?php

namespace Database\Seeders;

use App\Models\IbadahSyukur;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IbadahSyukurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $users = User::where('role', 'UMAT')->pluck('id'); // Mengambil ID pengguna dengan peran 'UMAT'
        $pendeta = User::where('role', 'PENDETA')->pluck('id'); // Mengambil ID pendeta dengan peran 'PENDETA'

        for ($i = 1; $i <= 15; $i++) {
            IbadahSyukur::create([
                'id_user' => $faker->randomElement($users),
                'tanggal' => $faker->date(),
                'waktu' => $faker->time(),
                'id_pendeta' => $faker->randomElement($pendeta),
                'status' => $faker->randomElement(['PROSES', 'DITERIMA', 'DITOLAK']),
            ]);
        }

    }
}

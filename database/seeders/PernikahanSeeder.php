<?php

namespace Database\Seeders;

use App\Models\Pernikahan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $users = User::where('role', 'UMAT')->pluck('id'); // Mengambil ID pengguna dengan peran 'UMAT'
        $pendeta = User::where('role', 'PENDETA')->pluck('id'); // Mengambil ID pendeta dengan peran 'PENDETA'

        for ($i = 1; $i <= 15; $i++) {
            Pernikahan::create([
                'id_user_laki' => $faker->randomElement($users),
                'id_user_perempuan' => $faker->randomElement($users),
                'tanggal' => $faker->date(),
                'waktu' => $faker->time(),
                'ktp_laki' => $faker->word,
                'ktp_perempuan' => $faker->word,
                'id_pendeta' => $faker->randomElement($pendeta),
                'status' => $faker->randomElement(['PROSES', 'DITERIMA', 'DITOLAK']),
            ]);
        }
    }
}

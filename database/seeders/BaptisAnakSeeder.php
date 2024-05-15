<?php

namespace Database\Seeders;

use App\Models\BaptisAnak;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BaptisAnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $users = User::pluck('id')->toArray();

        for ($i = 1; $i <= 15; $i++) {
            BaptisAnak::create([
                'id_user' => $faker->randomElement($users),
                'nama_anak' => $faker->firstName,
                'gender' => $faker->randomElement(['L', 'P']),
                'tgl_lahir' => $faker->date(),
                'tgl_pelaksanaan' => $faker->date(),
                'waktu_pelaksanaan' => $faker->time(),
                'akta_kelahiran' => $faker->word,
                'kartu_keluarga' => $faker->word,
                'status' => $faker->randomElement(['PROSES', 'DITERIMA', 'DITOLAK']),
            ]);
        }
    }
}

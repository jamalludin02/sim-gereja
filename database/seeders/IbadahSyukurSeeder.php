<?php

namespace Database\Seeders;

use App\Models\IbadahSyukur;
use App\Models\User;
use Carbon\Carbon;
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
        $faker = Faker::create('id_ID');
        $count = 10;

        $users = User::where('role', 'UMAT')->pluck('id'); // Mengambil ID pengguna dengan peran 'UMAT'
        $pendeta = User::where('role', 'PENDETA')->pluck('id'); // Mengambil ID pendeta dengan peran 'PENDETA'
        // Loop untuk membuat data
        for ($i = 0; $i < $count; $i++) {
            IbadahSyukur::create([
                'id_user' => $faker->randomElement($users), // Sesuaikan dengan user ID yang ada
                'tanggal' => Carbon::now()->startOfMonth()->addDays(rand(0, Carbon::now()->daysInMonth - 1)),
                'waktu' => Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59)),
                'keterangan' => "",
                'status' => 'PROSES',
                'id_pendeta' => $faker->randomElement($pendeta), // Sesuaikan dengan pendeta ID yang ada
            ]);
        }

    }
}

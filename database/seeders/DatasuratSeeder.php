<?php

namespace Database\Seeders;

use App\Models\Datasurat;
use App\Models\IbadahSyukur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatasuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $users = User::where('role', 'PENDETA')->pluck('id')->toArray();
        $pendeta = User::pluck('id')->where('role', 'PENDETA')->toArray();
        $ibadahSyukurs = IbadahSyukur::pluck('id')->toArray();

        for ($i = 1; $i <= 15; $i++) {
            Datasurat::create([
                'id_user' => $faker->randomElement($users),
                'id_ibadah' => $faker->randomElement($ibadahSyukurs),
                'id_pendeta' => $faker->randomElement($pendeta),
                'surat_link' => $faker->url,
            ]);
        }

    }
}

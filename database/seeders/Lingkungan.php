<?php

namespace Database\Seeders;

use App\Models\Lingkungan as ModelsLingkungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class Lingkungan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {
            ModelsLingkungan::create([
                'nama' => 'lingkungan' . $i,
                'alamat' => $faker->address,
            ]);
        }
    }
}

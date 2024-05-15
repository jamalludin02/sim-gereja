<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Buat admin
        User::create([
            'name' => $faker->unique()->name,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'alamat' => $faker->address,
            'gender' => $faker->randomElement(['L', 'P']),
            'role' => 'KETLING',
        ]);

        // Buat 5 pendeta
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'alamat' => $faker->address,
                'gender' => 'L',
                'role' => 'PENDETA',
            ]);
        }

        // Buat 15 umat
        for ($i = 1; $i <= 15; $i++) {
            $fullName = $faker->unique()->name;
            $firstName = explode(' ', $fullName)[0]; // Mengambil nama depan
            User::create([
                'name' => $fullName,
                'email' => $firstName . '@gmail.com',
                'password' => Hash::make('12345678'),
                'alamat' => $faker->address,
                'gender' => $faker->randomElement(['L', 'P']),
                'role' => 'UMAT',
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Lingkungan;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

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
        $lingkungan = Lingkungan::pluck('id')->toArray();

        // Buat admin
        User::create([
            'id' => $this->getAndCheckId(),
            'nama' => $faker->unique()->name,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'alamat' => $faker->address,
            'gender' => $faker->randomElement(['L', 'P']),
            'id_lingkungan'=> $faker->randomElement($lingkungan),
            'role' => 'ADMIN',
        ]);

        // Buat 5 pendeta
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'id' => $this->getAndCheckId(),
                'nama' => $faker->unique()->name,
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
                'id' => $this->getAndCheckId(),
                'nama' => $fullName,
                'email' => $firstName . '@gmail.com',
                'password' => Hash::make('12345678'),
                'alamat' => $faker->address,
                'gender' => $faker->randomElement(['L', 'P']),
                'id_lingkungan'=> $faker->randomElement($lingkungan),
                'role' => 'UMAT',
            ]);
        }
    }

    public function getAndCheckId()
    {
        $id = Str::random(10);
        if (User::where('id', $id)->exists()) {
            return $this->getAndCheckId();
        } else {
            return $id;
        }
    }

    public function getAndCheckEmail()
    {
        $faker = Faker::create('id_ID');
        $email = $faker->unique()->safeEmail;
        if (User::where('email', $email)->exists()) {
            return $this->getAndCheckEmail();
        } else {
            return $email;
        }
    }
}

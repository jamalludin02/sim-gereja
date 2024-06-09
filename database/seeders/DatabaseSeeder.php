<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Lingkungan::class);
        sleep(1);
        $this->call(UserSeeder::class);
        sleep(1);
        $this->call(PengumumanSeeder::class);
        sleep(1);
        $this->call(IbadahSyukurSeeder::class);
        sleep(1);
        $this->call(BaptisAnakSeeder::class);
        sleep(1);
        $this->call(SidiSeeder::class);
        sleep(1);
        $this->call(PernikahanSeeder::class);
        sleep(1);
        $this->call(DatasuratSeeder::class);
    }
}

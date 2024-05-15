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
        $this->call(JadwalSidiSeeder::class);
        sleep(1);
        $this->call(PernikahanSeeder::class);
        sleep(1);
        $this->call(DatasuratSeeder::class);
        // $this->call([
        //     UserSeeder::class,
        //     sleep(3),
        //     PengumumanSeeder::class,
        //     sleep(3),
        //     IbadahSyukurSeeder::class,
        //     sleep(3),
        //     BaptisAnakSeeder::class,
        //     sleep(3),
        //     SidiSeeder::class,
        //     sleep(3),
        //     JadwalSidiSeeder::class,
        //     sleep(3),
        //     PernikahanSeeder::class,
        //     sleep(3),
        //     DatasuratSeeder::class,
        //     sleep(3)
        // ]);
    }
}

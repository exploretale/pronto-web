<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            MerchantsSeeder::class
        ];
        // $this->call(UsersTableSeeder::class);

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}

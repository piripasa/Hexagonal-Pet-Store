<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(InsurancesTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

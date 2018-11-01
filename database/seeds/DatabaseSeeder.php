<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
      $this->call([
        RolesTableSeeder::class,
        DiscountSeeder::class,
        UserTableSeeder::class
      ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('discount')->insert([
        [
          'name' => "Tidak Ada Diskon",
          'discount' => 0,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
       ]);
    }
}

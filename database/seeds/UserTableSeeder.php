<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'name' => "Administrator",
          'email' => 'official@wapydesign.com',
          'password' => '$2b$10$HTdPZtBFlDV.V8Rc6XHdYOdMfnBrlNSDFEy49kC0ZHMKMXsWs2jsa',
          'role_id' => 1,
          'discount_id' => 1,
          'remember_token' => str_random(40),
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
       ]);

    }
}

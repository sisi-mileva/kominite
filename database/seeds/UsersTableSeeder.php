<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'email'    => 'sisi_ivko1@yahoo.com',
          'password'   =>  Hash::make('123456a'),
          'remember_token' =>  str_random(10),
        ]);
    }
}

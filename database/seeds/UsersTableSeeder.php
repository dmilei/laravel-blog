<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'daniel.milei@gmail.com')->first();

        if(!$user){
          User::create([
            'name' => 'Daniel Milei',
            'email' => 'daniel.milei@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
          ]);
        }
    }
}

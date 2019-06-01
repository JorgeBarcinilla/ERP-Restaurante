<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Jorge";
        $user->email = "user@cuc.edu.co";
        $user->password = "12345678";
        $user->save();
    }
}

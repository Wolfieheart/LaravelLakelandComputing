<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        App\User::create(array(
            'FirstName' => 'Power',
            'LastName' => 'Amelia',
            'Address' => '',
            'Town' => '',
            'Postcode' => '',
            'Email' => 'webmaster@wolfstorm.me',
            'Password' => Hash::make('mypass'),
            'Admin' => 1,
        ));
    }

}
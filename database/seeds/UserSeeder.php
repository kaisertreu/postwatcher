<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = Hash::make('secret123');
        $date_start = date('2022-06-23'); //YYYY/MM/DD

        $users = [
            [
                'firstname' => 'Gaddiel',
                'lastname' => 'Conde',
                'contact_number' => '09350124876',
                'birthday' => '1999-11-28',
                'gender' => 'Male',
                'email' => 'gaddiel.conde@gmail.com',
                'password' => $pass,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => $date_start,
            ],
            /* [
                'firstname' => 'Vincent',
                'lastname' => 'Duag',
                'contact_number' => '09558820920',
                'birthday' => '1999-04-27',
                'gender' => 'Male',
                'email' => 'estrelladuag@gmail.com',
                'password' => $pass,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => $date_start,
            ], */
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

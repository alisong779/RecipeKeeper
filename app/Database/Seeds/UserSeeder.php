<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        $user = new User;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user->save(
                [
                    'first_name' => $faker->name,
                    'last_name' => $faker->name,
                    'email' => $faker->email,
                    'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                    'register_date' =>  Time::now()
                ]
            );
        }
    }
}

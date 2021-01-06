<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->firstName,
                'lastname'=>$faker->lastName,
                'document'=>$faker->fileExtension,
            ]);
        }
    }
}

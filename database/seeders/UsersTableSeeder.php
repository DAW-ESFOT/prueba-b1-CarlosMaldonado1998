<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
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

        for ($i = 0; $i < 10; $i++) {
            $user =User::create([
                'name' => $faker->firstName,
                'lastname'=>$faker->lastName,
                'document'=>$faker->fileExtension,
            ]);
            $user->genres()->saveMany(
                $faker->randomElements(
                    array(
                        Genre::find(1),
                        Genre::find(2),
                        Genre::find(3),
                        Genre::find(4),
                        Genre::find(5),
                        Genre::find(6),
                        Genre::find(7),
                        Genre::find(8),
                        Genre::find(9),
                        Genre::find(10),
                    ), $faker->numberBetween(1, 10), false
                )
            );
        }
    }
}

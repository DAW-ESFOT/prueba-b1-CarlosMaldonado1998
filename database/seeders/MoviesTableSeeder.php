<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::truncate();
        $faker = \Faker\Factory::create();

        $genres = Genre::all();
        foreach ($genres as $genre) {
            $num_movies = 5;
            for ($i = 0; $i < $num_movies; $i++) {
                Movie::create([
                    'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                    'code'=>$faker->uuid,
                    'year'=>$faker->year($max = 'now'),
                    'available'=>true,
                    'genre_id'=>$genre->id,
                ]);
            }
        }


    }
}

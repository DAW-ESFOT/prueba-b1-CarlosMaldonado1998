<?php

namespace Database\Seeders;

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

        for ($i = 0; $i < 3; $i++) {
            Movie::create([
                'name' => $faker->word,
                'code'=>$faker->uuid,
                'year'=>$faker->year($max = 'now'),
                'available'=>true,
            ]);
        }
    }
}

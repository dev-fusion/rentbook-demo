<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Book::create([
                "title" => $faker->words(3, true),
                "author_id" => $faker->numberBetween(1, 10),
                "is_borrowed" => $faker->boolean(),
            ]);
        }
    }
}

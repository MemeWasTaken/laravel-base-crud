<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            $comic = new Comic();
            $comic->title = $faker->words(3, true);
            $comic->author = $faker->words(3, true);
            $comic->price = $faker->randomFloat(2, 5, 250);
            $comic->genre = $faker->words(3, true);
            $comic->photo = $faker->imageUrl(640, 480, 'comics', true);
            $comic->description = $faker->paragraph(5, false);
            $comic->save();
            
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 19;

        for ($i = 0; $i < $limit; $i++) {
            $post = \App\Models\Post::create([
                'user_id' => $i + 1,
                'title' => $faker->unique()->sentence($nbWords = 15),
                'slug' => $faker->unique()->slug(10),
                'description' => $faker->unique()->sentence($nbWords = 50),
                'content' => $faker->unique()->sentence($nbWords = 500),
                'image' => 'http://lorempixel.com/1000/300/cats/',
                'status' => 1,
                'view' => 0,
            ]);

            $post->tags()->sync($faker->numberBetween(1,10));
            $post->topics()->sync($faker->numberBetween(1,10));
        }
    }
}

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

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->unique()->sentence($nbWords = 15),
                'slug' => $faker->unique()->slug,
                'description' => $faker->unique()->sentence($nbWords = 50),
                'content' => $faker->unique()->sentence($nbWords = 500),
                'image' => 'a.jpg',
                'status' => 0,
                'view' => 0,
            ]);
        }
    }
}

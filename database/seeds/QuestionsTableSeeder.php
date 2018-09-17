<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
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
            DB::table('questions')->insert([
                'user_id' => $i + 1,
                'topic_id' => $faker->randomElement([1,2,3,4]),
                'title' => $faker->unique()->sentence($nbWords = 15),
                'slug' => $faker->unique()->slug(10),
                'content' => $faker->unique()->sentence($nbWords = 30),
                'status' => config('blog.question.status.active'),
                'view' => config('blog.question.view'),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\Tag::query()->truncate();
//        \App\Models\Topic::query()->truncate();
//        \App\Models\User::query()->truncate();
//        \App\Models\Post::query()->truncate();

         $this->call(UsersTableSeeder::class);
         $this->call(TopicsTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(TagsTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
    }
}

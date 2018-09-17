<?php

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
        $faker = Faker\Factory::create();

        $limit = 20;

        DB::table('users')->insert([
            'name' => $faker->unique()->name,
            'email' => 'thanh@gmail.com',
            'role' => config('blog.user.role.admin'),
            'birthday' => '2000-09-07',
            'avatar' => '128.jpg',
            'password' => bcrypt('123456'),
        ]);

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'role' => config('blog.user.role.member'),
                'birthday' => '2000-09-07',
                'avatar' => 'heyimjuani/128.jpg',
                'password' => bcrypt('123456')
            ]);
        }
    }
}

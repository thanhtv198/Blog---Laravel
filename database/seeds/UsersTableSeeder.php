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

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'birthday' => '2000-09-07',
                'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/heyimjuani/128.jpg',
                'password' => bcrypt('123456')
            ]);
        }
    }
}

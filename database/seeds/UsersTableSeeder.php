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

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'birthday' => '2000-09-07',
                'password' => bcrypt('123456'),
            ]);
        }

//        DB::table('users')->insert([
//            'name' => 'Thanh Trần',
//            'email' => 'thanh@gmail.com',
//            'phone' => '0982682632',
//            'birthday' => '1994-12-12',
//            'address' => 'nam ha',
//            'status' => 1,
//            'password' => bcrypt('123456'),
//        ]);
//
//        DB::table('users')->insert([
//            'name' => 'Duong Hang',
//            'email' => 'hang@gmail.com',
//            'phone' => '0982682632',
//            'birthday' => '1994-12-12',
//            'address' => 'nam ha',
//            'status' => 1,
//            'password' => bcrypt('123456'),
//        ]);

    }
}

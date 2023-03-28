<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,100) as $index) {
            DB::table('users')->insert([
                'username' => $faker->username,
                'email' => $faker->unique()->safeEmail,
                'role_id' => 2,
                'activated' => 0,
                'status' => 1,
                'password' => bcrypt('password'),
            ]);
        }
    }
}

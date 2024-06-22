<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use Faker to generate fake data
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'username' => 'developer',
            'password' => bcrypt('Test@Password123#'),
        ]);
    }
}

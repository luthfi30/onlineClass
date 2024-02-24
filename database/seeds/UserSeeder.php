<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create('id_ID');
        for($i=2; $i <= 10; $i++){
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'profession' => $faker->jobTitle,
            'role'    => 'admin',
            'password' => Hash::make('admin'),
        ]);
        }
    }
}

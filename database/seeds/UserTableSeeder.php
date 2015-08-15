<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\LaravelProject\Entities\User::class)->create([
        'name' => 'Alfredo',
        'email' => 'alfredudu_007@hotmail.com',
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
        ]);
    }
}

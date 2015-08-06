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
        \LaravelProject\Entities\User::truncate();
        factory(\LaravelProject\Entities\User::class, 10)->create();
    }
}

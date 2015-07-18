<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \LaravelProject\Client::truncate();
        factory(\LaravelProject\Client::class, 10)->create();
    }
}

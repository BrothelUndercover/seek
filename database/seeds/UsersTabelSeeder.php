<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->times(30)->create();
    }
}

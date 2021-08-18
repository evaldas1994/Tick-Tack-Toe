<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(2)->create();
         Box::factory(9)->create();
    }
}

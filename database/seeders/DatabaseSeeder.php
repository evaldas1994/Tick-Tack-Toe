<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\Log;
use App\Models\User;
use App\Models\Game;
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
        Box::factory(1)->create();
        Game::factory(1)->create();
        Log::factory(3)->create();
    }
}

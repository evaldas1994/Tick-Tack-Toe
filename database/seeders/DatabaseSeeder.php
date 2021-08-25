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
        Game::factory(1)->create();
        Log::factory(3)->create();

        $signs = ['X', 'O', null];

        $locations = [
            [
                'game_id' => 1,
                'location' => 1,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 2,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 3,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 4,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 5,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 6,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 7,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 8,
                'value' => $signs[rand(0, 2)]
            ],
            [
                'game_id' => 1,
                'location' => 9,
                'value' => $signs[rand(0, 2)]
            ]
        ];
        foreach ($locations as $location) {
            Box::create($location);
        }
    }
}

<?php

namespace App\Service;

use App\Models\Box;
use App\Models\Game;
use App\Models\User;

class GameService
{
    public function create($request): array
    {
        if ($this->isUsersNotExists($request->user1_name, $request->user2_name)) {
            $userService = new UserService();

            $user1_sign = $this->getRandomSign();
            $user2_sign = $this->getRandomSign($user1_sign);

            $user1 = $userService->create($request, 'user1_name', $user1_sign);
            $user2 = $userService->create($request, 'user2_name', $user2_sign);

            $game = Game::create([
                'user1_id' => $user1->id,
                'user2_id' => $user2->id
            ]);

            for ($i = 0; $i < 9; $i++) {
                Box::create([
                    'game_id' => $game->id,
                    'location' => $i+1,
                    'value' => null
                ]);
            }

            $game['boxes'] = $game->boxes;

            return ['success' => true, 'message' => 'game created successfully', 'game' => $game];
        } else {
            return ['success' => false, 'message' => 'game not created'];

        }

    }

    private function isUsersNotExists($name1, $name2): bool
    {
        $user1 = User::where('name', '=', $name1)->first();
        $user2 = User::where('name', '=', $name2)->first();

        if (!$user1 && !$user2) {
            return true;
        }

        return false;
    }

    private function getRandomSign($reserved=null): string
    {
        $signs = ['X', 'O'];

        if (!$reserved) {
            return $signs[rand(0, count($signs)-1)];
        } else {
            if ($reserved == $signs[0]) {
                return $signs[1];
            } else {
                return $signs[0];
            }
        }
    }

}

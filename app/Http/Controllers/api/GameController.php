<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Service\GameService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function MongoDB\BSON\toJSON;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Game
     */
    public function store(Request $request): string
    {
        $gameService = new GameService();

        return json_encode($gameService->create($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Game
     */
    public function show(Game $game): string
    {
        return json_encode(['success' => true, 'message' => 'game found successfully', 'game' => $game]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return JsonResponse
     */
    public function destroy(Game $game): string
    {
        $game->logs()->delete();
        $game->user1()->delete();
        $game->user2()->delete();
        $game->boxes()->delete();
        $game->delete();

        return json_encode(['success' => true, 'message' => 'game deleted successfully']);
    }

    public function getUsersByGame(Game $game) {
        return json_encode(['success' => true, 'message' => 'users found successfully', 'users' => [$game->user1, $game->user2]]);
    }

    public function getBoxesByGame(Game $game) {
        return json_encode(['success' => true, 'message' => 'boxes found successfully', 'boxes' => $game->boxes]);
    }

    public function reset(Game $game) {
        $game->boxes()->update(['value' => null]);
        $game->logs()->delete();
        return json_encode(['success' => true, 'message' => 'boxes updated successfully', 'boxes' => $game->boxes]);
    }
}

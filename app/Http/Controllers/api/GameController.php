<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Service\GameService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(Request $request): ?Game
    {
        $gameService = new GameService();

        return $gameService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Game
     */
    public function show(Game $game): Game
    {
        return $game;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return JsonResponse
     */
    public function destroy(Game $game): JsonResponse
    {
        $game->logs()->delete();
        $game->user1()->delete();
        $game->user2()->delete();
        $game->box()->delete();
        $game->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}

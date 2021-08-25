<?php

namespace App\Http\Controllers\api;

use App\Models\Game;
use App\Models\Log;
use App\Service\LogService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Log::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Log
     */
    public function store(Request $request): string
    {
        $logService = new LogService();

        $log = $logService->create($request);
        return json_encode(['success' => true, 'message' => 'log created successfully', 'log' => $log]);
    }

    /**
     * Display the specified resource.
     *
     * @param Log $log
     * @return Log
     */
    public function show(Log $log): Log
    {
        return $log;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Log $log
     * @return JsonResponse
     */
    public function destroy(Log $log): JsonResponse
    {
        $log->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $game
     * @return Collection|null
     */
    public function getLogsByGameId($game): string
    {
        $game = Game::find($game);
        if ($game) {
            return json_encode(['success' => true, 'message' => 'logs got successfully', 'logs' => $game->logs]);
        }

        return json_encode(['success' => false, 'message' => 'something wrong']);
    }


}

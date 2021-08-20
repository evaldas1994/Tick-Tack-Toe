<?php

namespace App\Service;

use App\Models\Log;

class LogService
{
    public function create($request): Log
    {
//        dd($request->message);
        $request->validate([
            'game_id' => ['required', 'exists:games,id'],
            'message' => ['required', 'min:3', 'max:255']
        ]);

        return Log::create([
            'game_id' => $request->game_id,
            'message' => $request->message
        ]);
    }
}

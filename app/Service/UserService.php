<?php

namespace App\Service;

use App\Models\User;

class UserService
{
    public function create($request): User
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'unique:users']
        ]);


        return User::create([
            'name' => $request->name
        ]);
    }

}

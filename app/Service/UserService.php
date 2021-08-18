<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserService
{
    public function create($request): User
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'unique:users'],
            'sign' => ['regex:(X|O|NULL)']
        ]);


        return User::create([
            'name' => $request->name,
            'sign' => $request->sign,
        ]);
    }

    public function update($request, $user): User
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50'], Rule::unique('users')->ignore($user->id),
            'sign' => ['regex:(X|O|NULL)']
        ]);


        $user->update(
            $request->only('name', 'sign')
        );

        return $user;
    }

}

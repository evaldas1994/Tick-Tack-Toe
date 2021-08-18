<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index():Collection
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return User
     */
    public function store(Request $request):User
    {
        $userService = new UserService();

        return $userService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return User
     */
    public function show(User $user): User
    {
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}

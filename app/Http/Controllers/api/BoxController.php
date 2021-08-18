<?php

namespace App\Http\Controllers\api;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Box::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Box $box
     * @return Box
     */
    public function update(Request $request, Box $box): Box
    {
            $box->update(
            $request->only('values')
        );

        return $box;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Box $box
     * @return JsonResponse
     */
    public function destroy(Box $box): JsonResponse
    {
        $box->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}

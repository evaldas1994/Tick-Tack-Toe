<?php

namespace App\Http\Controllers\api;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

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
            $request->only('value')
        );

        return $box;
    }
}

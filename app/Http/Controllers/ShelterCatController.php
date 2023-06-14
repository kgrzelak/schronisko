<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelterCatRequest;
use App\Http\Resources\ShelterCatResource;
use App\Models\Shelter;
use App\Models\ShelterCat;

class ShelterCatController extends Controller
{
    public function index(Shelter $shelter)
    {
        return ShelterCatResource::collection($shelter->cats()->paginate(15));
    }

    public function show(Shelter $shelter, ShelterCat $cat): ShelterCatResource
    {
        return new ShelterCatResource($cat);
    }

    public function store(ShelterCatRequest $request, Shelter $shelter): ShelterCatResource
    {
        return new ShelterCatResource($shelter->cats()->create($request->validated()));
    }

    public function update(ShelterCatRequest $request, Shelter $shelter, ShelterCat $cat): ShelterCatResource
    {
        $cat->update($request->validated());

        return new ShelterCatResource($cat);
    }

    public function destroy(Shelter $shelter, ShelterCat $cat)
    {
        $cat->delete();

        return response()->json(status: 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelterRequest;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;

class ShelterController extends Controller
{
    public function index()
    {
        return ShelterResource::collection(Shelter::paginate(15));
    }

    public function store(ShelterRequest $request)
    {
        return new ShelterResource(Shelter::create($request->validated()));
    }

    public function show(Shelter $shelter)
    {
        return new ShelterResource($shelter);
    }

    public function update(ShelterRequest $request, Shelter $shelter)
    {
        $shelter->update($request->validated());

        return new ShelterResource($shelter);
    }

    public function destroy(Shelter $shelter)
    {
        $shelter->delete();

        return response()->json(status: 204);
    }
}

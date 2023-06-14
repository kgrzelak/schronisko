<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelterCatRequest;
use App\Http\Requests\ShelterEmployeeRequest;
use App\Http\Resources\ShelterEmployeeResource;
use App\Models\Shelter;
use App\Models\ShelterEmployee;

class ShelterEmployeeController extends Controller
{
    public function index(Shelter $shelter)
    {
        return ShelterEmployeeResource::collection($shelter->employees()->paginate(15));
    }

    public function show(Shelter $shelter, ShelterEmployee $employee): ShelterEmployeeResource
    {
        return new ShelterEmployeeResource($employee);
    }

    public function store(ShelterEmployeeRequest $request, Shelter $shelter): ShelterEmployeeResource
    {
        return new ShelterEmployeeResource($shelter->employees()->create($request->validated()));
    }

    public function update(ShelterCatRequest $request, Shelter $shelter, ShelterEmployee $employee): ShelterEmployeeResource
    {
        $employee->update($request->validated());

        return new ShelterEmployeeResource($employee);
    }

    public function destroy(Shelter $shelter, ShelterEmployee $employee)
    {
        $employee->delete();

        return response()->json(status: 204);
    }
}

<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Club;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Club\StoreRequest as StoreClubRequest;
use App\Http\Requests\Backoffice\Club\UpdateRequest as UpdateClubRequest;
use Illuminate\Http\JsonResponse;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Club::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClubRequest $request
     * @return JsonResponse
     */
    public function store(StoreClubRequest $request)
    {
        Club::create($request->validated());

        return response()->json(['message' => 'Data stored successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param Club $club
     * @return JsonResponse
     */
    public function show(Club $club)
    {
        return response()->json($club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClubRequest $request
     * @param Club              $club
     * @return JsonResponse
     */
    public function update(UpdateClubRequest $request, Club $club)
    {
        $club->update($request->validated());
        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Club $club
     * @return JsonResponse
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return response()->json(null, 204);
    }
}

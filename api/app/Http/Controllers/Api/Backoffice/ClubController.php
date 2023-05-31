<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Club;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Club\UpdateClubRequest;
use Illuminate\Http\JsonResponse;

class ClubController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Club::class, 'club');
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
}

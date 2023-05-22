<?php

namespace App\Http\Controllers\Api;

use App\Club;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Club::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClubRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClubRequest $request)
    {
        Club::create($request->validated());

        return response()->json(['message' => 'Data stored successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::findOrFail($id);
        return response()->json($club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClubRequest $request
     * @param int               $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClubRequest $request, $id)
    {
        $club = Club::find($id);

        if (! $club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $club->update($request->validated());

        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::findOrFail($id);
        $club->delete();
        return response()->json(null, 204);
    }
}

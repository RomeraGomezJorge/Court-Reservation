<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Court;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Court\StoreRequest as StoreCourtRequest;
use App\Http\Requests\Backoffice\Court\UpdateRequest as UpdateCourtRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourtController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Court::class, 'court');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);

        $courts = Court::where('created_by_id', Auth::id())->paginate(10, ['*'], 'page', $page);

        return response()->json($courts);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCourtRequest $request
     * @return JsonResponse
     */
    public function store(StoreCourtRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by_id'] = Auth::id();

        Court::create($validated);
        return response()->json(['message' => 'Data stored successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Court $court
     * @return JsonResponse
     */
    public function show(Court $court)
    {
        return response()->json($court);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourtRequest $request
     * @param Court              $court
     * @return JsonResponse
     */
    public function update(UpdateCourtRequest $request, Court $court)
    {
        $court->update($request->validated());
        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Court $court
     * @return JsonResponse
     */
    public function destroy(Court $court)
    {
        $court->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Requests\Backoffice\Reserve\StoreRequest as StoreReserveRequest;
use App\Http\Requests\Backoffice\Reserve\UpdateRequest as UpdateReserveRequest;
use App\Reserve;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Reserve::class, 'reserve');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Reserve::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReserveRequest $request
     * @return JsonResponse
     */
    public function store(StoreReserveRequest $request)
    {
        Reserve::create($request->validated());
        return response()->json(['message' => 'Data stored successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Reserve $reserve
     * @return JsonResponse
     */
    public function show(Reserve $reserve)
    {
        return response()->json($reserve, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReserveRequest $request
     * @param Reserve              $reserve
     * @return JsonResponse
     */
    public function update(UpdateReserveRequest $request, Reserve $reserve)
    {
        $reserve->update($request->validated());
        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reserve $reserve
     * @return JsonResponse
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return response()->json([], 204);
    }
}

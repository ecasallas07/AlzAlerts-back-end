<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Galery;
use App\Http\Requests\StoreGaleryRequest;
use App\Http\Requests\UpdateGaleryRequest;
use App\Filters\GaleryFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GaleryResource;
use Illuminate\Http\JsonResponse;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $galery = Galery::all();
        return response()->json([
            'success' => true,
            'message' => 'Successful operation',
            'data' => new GaleryResource($galery)
        ],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaleryRequest $request)
    {
        $galery = Galery::create($request->all());
        return response()->json([
            'success' => true,
            'created' => new GaleryResource($galery)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filter = new GaleryFilter();
        $queryItems = $filter->transform($request);
        $galery = Galery::where($queryItems)->get();

        if($galery->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);

        }
        return response()->json(['data' => new GaleryResource($galery)],200);

    }

    public function showId($id)
    {
        $galery = Galery::find($id);
        return response()->json([
            'success' => true,
            'data' => $galery
        ],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleryRequest $request, $id)
    {
        $galery = Galery::find($id);
        $galery->galarie_title = $request->galarie_title;
        $galery->galarie_description = $request->galarie_description;
        $galery->galarie_tag = $request->galarie_tag;
        $galery->galarie_photo =$request->galarie_photo;
        $galery->save();

        return response()->json([
            'success' => true,
            'updated' =>  new GaleryResource($galery)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galery = Galery::find($id)->delete();
        return response()->json([
            'eliminated' => new GaleryResource($galery),
            'success' => true
        ],200);
    }
}

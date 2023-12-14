<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Http\Requests\StoreGaleryRequest;
use App\Http\Requests\UpdateGaleryRequest;
use App\Filters\GaleryFilter;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaleryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filter = new GaleryFilter();
        $queryItems = $filter->trasnform($request);
        $galery = Galery::where($queryItems)->get();

        if($galary->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);

        }
        return reponse()->json(['data' => GaleryCollection::collection($galary)],200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleryRequest $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        //
    }
}

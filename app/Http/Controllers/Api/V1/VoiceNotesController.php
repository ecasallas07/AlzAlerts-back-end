<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VoiceNotes;
use App\Http\Requests\StoreVoiceNotesRequest;
use App\Http\Requests\UpdateVoiceNotesRequest;
use App\Http\Controllers\Controller;

class VoiceNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreVoiceNotesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VoiceNotes $voiceNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoiceNotes $voiceNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoiceNotesRequest $request, VoiceNotes $voiceNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoiceNotes $voiceNotes)
    {
        //
    }
}

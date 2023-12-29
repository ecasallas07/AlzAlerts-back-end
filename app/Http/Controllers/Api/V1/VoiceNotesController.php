<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VoiceNotes;
use App\Http\Requests\StoreVoiceNotesRequest;
use App\Http\Requests\UpdateVoiceNotesRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\VoiceNotesResource;
use App\Filters\VoiceNotesFilter;
use Illuminate\Http\Request;

class VoiceNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vocieNotes = VoiceNotes::all();
        return response()->json([
            'success' => true,
            'message' => 'Successful operation',
            'data' => new VoiceNotesResource($vocieNotes)
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoiceNotesRequest $request)
    {
        $voiceNotes = VoiceNotes::create($request->all());
        return response()->json([
            'success' => true,
            'created' => new VoiceNotesResource($voiceNotes)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filter = new VoiceNotesFilter();
        $queryItems = $filter->transform($request);
        $galery = VoiceNotes::where($queryItems)->get();

        if($galery->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);

        }
        return response()->json(['data' => new VoiceNotesResource($galery)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoiceNotesRequest $request, $id)
    {
        $voiceNotes=VoiceNotes::find($id);
        $voiceNotes->voice_note_title = $request->voice_note_title;
        $voiceNotes->voice_note_description = $request->voice_note_description;
        $voiceNotes->voice_note_audio = $request->voice_note_audio;
        $voiceNotes->user_id =$request->user_id;
        $voiceNotes->save();

        return response()->json([
            'success' => true,
            'updated' =>  new VoiceNotesResource($voiceNotes)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $voiceNotes = VoiceNotes::find($id)->delete();
        return response()->json([
            'eliminated' => new VoiceNotesResource($id),
            'success' => true
        ],200);
    }
}

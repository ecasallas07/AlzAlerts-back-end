<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VoiceNotesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->voice_note_title,
            "description" => $this->voice_note_description,
            "audio" => $this->voice_note_audio,
            "user" => $this->user
        ];
    }
}

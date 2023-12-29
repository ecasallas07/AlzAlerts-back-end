<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoiceNotesResource extends JsonResource
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

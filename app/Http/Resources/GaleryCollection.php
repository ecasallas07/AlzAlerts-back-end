<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GaleryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->galarie_title,
            "description" => $this->galarie_description,
            "tag" => $this->galarie_tag,
            "photo" => $this->galarie_photo,
            "user" => $this->user
        ];
    }
}

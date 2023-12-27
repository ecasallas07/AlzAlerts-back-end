<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->status == 1)
        {
            $status = 'activo';
        }else{
            $status = 'inactivo';
        }

        return [
            "name" => $this->user_name,
            "telephone" => $this->user_telephone,
            "email" => $this->user_email,
            "birth_date" => $this-> user_date,
            "status" =>$status,
            "photo" => $this->photo

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Account;

class AccountResource extends JsonResource
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
            "name" => $this->account_name,
            "email" => $this->account_email,
            "user_id" => $this->whenLoaded('user' , fn() => $this->getUsersRelation());
        ];
    }

    public function getUsersRelation() : array
    {
        $users = UserResource::collection($this->user()->paginate(6)->appends(request()->query))
        ->response()
        ->getData(true);

        return [
            'data' => $users['data'],
            'pages' => ['links' => $users['links'], 'meta' => $users['meta']]
        ];
    }



}

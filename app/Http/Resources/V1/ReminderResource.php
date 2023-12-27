<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->reminder_title,
            "subject" => $this->reminder_subject,
            "date" => $this->reminder_date,
            "time" => $this->reminder_time,
            "user" => $this->user
        ];
    }
}

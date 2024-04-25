<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'position' => $this->position,
            'user' => $this->user->name,
            'personal_record' => $this->value,
            'date' => $this->date->format('Y-m-d H:i:s'),
        ];
    }
}

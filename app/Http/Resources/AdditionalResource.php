<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'media' => $this->media,
            'lesson_id' => $this->lessaon_id,
            'created_at' => date($this->created_at),
            'updated_at' => date($this->updated_at)
        ];
    }
}

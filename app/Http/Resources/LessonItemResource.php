<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonItemResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'video' => $this->video,
            'assignments' => AssignmentResource::collection($this->assignments),
            'additionals' => AdditionalResource::collection($this->additionals)
        ];
    }
}

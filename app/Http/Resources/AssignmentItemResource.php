<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentItemResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'due_date' => $this->due_date,
            'file' => $this->file,
            'lesson_id' => $this->lesson_id,
            'responses' => ResponseResource::collection($this->response)
        ];
    }
}

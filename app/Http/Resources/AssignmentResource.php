<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'due_date' => $this->due_date,
            'file' => $this->file,
            'lesson_id' => $this->lesson_id,
            'created_at' => date($this->created_at),
            'updated_at' => date($this->updated_at)
        ];
    }
}

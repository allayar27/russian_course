<?php

namespace App\Http\Resources;

use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'video' => $this->video,
            'category_id' => $this->category_id,
            'created_at' => date($this->created_at),
            'updated_at' => date($this->updated_at)
        ];
    }
}

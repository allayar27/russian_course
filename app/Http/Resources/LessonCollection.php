<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LessonCollection extends ResourceCollection
{
    public $collects = LessonItemResource::class;
    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'all lessons',
            'data' => $this->collection
        ];
    }
}

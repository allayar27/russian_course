<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AssignmentCollection extends ResourceCollection
{
    public $collects = AssignmentItemResource::class;

    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'All assignments',
            'data' => $this->collection
        ];
    }
}

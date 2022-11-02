<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
   public $collects = CommentItemResource::class;

    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'All comments',
            'data' => $this->collection
        ];
    }
}

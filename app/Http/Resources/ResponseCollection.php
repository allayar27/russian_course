<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResponseCollection extends ResourceCollection
{
    public $collects = ResponseItemResource::class;

    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'All responses',
            'data' => $this->collection
        ];
    }
}

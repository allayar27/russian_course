<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdditionalCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'All additionals',
            'data' => $this->collection
        ];
    }
}

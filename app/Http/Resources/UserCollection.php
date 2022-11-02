<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $collects = UserItemResource::class;
    public function toArray($request)
    {
        return [
            'code' => 200,
            'message' => 'All users',
            'data' => $this->collection
        ];
    }
}

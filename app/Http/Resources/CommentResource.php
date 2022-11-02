<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\This;

class CommentResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'message' => $this->message,
            'user_id' => $this->user_id,
            'response_id' => $this->response_id,
            'created_at' => date($this->created_at),
            'updated_at' => date($this->updated_at)
        ];
    }
}

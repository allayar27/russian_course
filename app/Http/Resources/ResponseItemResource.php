<?php

namespace App\Http\Resources;

use App\Models\Assignment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ResponseItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'file' => $this->file,
            'title' => $this->title,
            'assignment_id' => $this->assignment_id,
            'user_id' => $this->user_id,
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}

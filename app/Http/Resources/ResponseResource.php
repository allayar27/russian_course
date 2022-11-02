<?php

namespace App\Http\Resources;

use App\Models\Response;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ResponseResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'file' => $this->file,
            'title' => $this->title,
            'assignment_id' => $this->assignment_id,
            'user_id' => $this->user_id,
            'created_at' => date($this->created_at),
            'updated_at' => date($this->updated_at)
        ];
    }
}

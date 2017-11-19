<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Resources\Json\Resource;

class ContentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'content' => $this->content,
            'details' => $this->details,
        ];
    }
}

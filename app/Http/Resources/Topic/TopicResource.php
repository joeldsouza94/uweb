<?php

namespace App\Http\Resources\Topic;

use Illuminate\Http\Resources\Json\Resource;

class TopicResource extends Resource
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
            'topic' => $this->topic,
            'description' => $this->description,
        ];
    }
}

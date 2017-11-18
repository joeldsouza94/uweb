<?php

namespace App\Http\Resources\Topic;

use Illuminate\Http\Resources\Json\Resource;

class TopicCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'topic' => $this->topic,
            'href' => [
                'link' => route('topics.show', $this->id)
            ]
        ];
    }
}

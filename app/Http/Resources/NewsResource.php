<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'category'      => NewsCategoryResource::make($this->category),
            'cover'         => $this->cover->getUrl(),
            'title'         => $this->title,
            'content'       => $this->flexible,
            'publish_at'    => $this->publish_at,
        ];
    }
}

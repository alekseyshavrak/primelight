<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'id'        => $this->id,
            'country'   => CountryResource::make($this->country),
            'avatar'    => $this->avatar->getUrl(),
            'name'      => $this->name,
            'surname'   => $this->surname,
            'position'  => $this->position,
            'position_description' => $this->position_description,
        ];
    }
}

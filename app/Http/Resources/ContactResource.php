<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'country'   => CountryResource::make($this->country),
            'title' => $this->title,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }
}

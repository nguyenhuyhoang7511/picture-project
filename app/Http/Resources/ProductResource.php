<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'title' => $this->title,   
            'price' => $this->price,   
            'sale' => $this->sale,
            'quantity' => $this->quantity,
            'description' => $this->description,
        ];
    }
}

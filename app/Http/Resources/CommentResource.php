<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
                'content' => $this->content,   
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'note' => "User_id & product_id will be change"
            ];
        
    }
}

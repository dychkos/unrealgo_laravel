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
        return [
            "id" => $this->id,
            "title" => $this->title,
            "type" =>  new TypeResource($this->type),
            "price" => $this->currentPrice(),
            "offer" => $this->offer,
            "description" => $this->description,
            "link" => route("store.show", [$this->type->slug, $this->id]),
        ];
    }
}

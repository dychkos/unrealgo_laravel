<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            "slug" => $this->slug,
            "user" =>  new UserResource($this->user),
            "category" =>  new CategoryResource($this->user),
            "description" => $this->description,
            "short_description" => $this->description,
            "image" => new ImageResource($this->image),
            "views" => (int)$this->views,
        ];
    }
}

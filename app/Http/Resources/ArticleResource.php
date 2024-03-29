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
            "category" =>  new CategoryResource($this->category),
            "description" => $this->description,
            "body" => $this->body,
            "image" => new ImageResource($this->image),
            "link" => route("articles.show", [$this->category->slug, $this->slug]),
            "views" => (int)$this->views,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'image');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\morphMany
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}

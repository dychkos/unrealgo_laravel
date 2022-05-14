<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "price",
        "offer"
    ];

    public static $SORTS = [
        "price-high-low" => "зменшенням",
        "price-low-high" => "збільшенням",
    ];



    public function currentPrice() {
        return isset($this->offer) ? (int)($this->price / $this->offer) : $this->price;

    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

    public function likedBy(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "product_user");
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class,'products_sizes',
            'product_id',
            'size_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\morphMany
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public static function getSorts() {
        return self::$SORTS;
    }

}

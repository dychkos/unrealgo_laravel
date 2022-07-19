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
        "offer",
        "type_id"
    ];

    public static $SORTS = [
        "price-high-low" => "зменшенням",
        "price-low-high" => "збільшенням",
    ];

    public function currentPrice() {
        return isset($this->offer) ? (int)($this->price - $this->price * ($this->offer / 100)) : $this->price;

    }

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function likedBy(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "product_user");
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class,'products_sizes',
            'product_id',
            'size_id')->withPivot('count');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\morphMany
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public static function getSorts() {
        return self::$SORTS;
    }

    public function hasSize($size_id): bool
    {
        return in_array($size_id, $this->sizes->pluck('id')->toArray());
    }

    public function isSizeAvailable($size_id): bool
    {
        return $this->sizes()->find($size_id)->pivot->count > 0;
    }

    public function firstAvailableSize(): int
    {
        foreach ($this->sizes as $size) {
            if($size->pivot->count > 0) {
                return $size->id;
            }
        }
        return 0;
    }

    public function isAvailable(): bool
    {
        $status = false;

        foreach ($this->sizes as $size) {
            if ($size->pivot->count > 0) {
                $status = true;
            }
        }

        return $status;
    }


}

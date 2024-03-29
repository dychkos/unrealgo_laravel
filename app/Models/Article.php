<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'category_id',
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'title',
        'created_at',
        'views'
    ];

    public static $SORTS = [
      "date-new" => "спочатку нові",
      "date-old" => "спочатку давні",
      "popular" => "популярністю",
    ];


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

    public static function getSorts() {
        unset(self::$SORTS['date-new']);
        return self::$SORTS;
    }


}

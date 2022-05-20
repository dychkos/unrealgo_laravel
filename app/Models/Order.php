<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "data_name",
        "email",
        "phone",
        "city",
        "department",
        "total_price",
        "user_id",
        "status_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(BasketItem::class);
    }

    public function status() {
        return $this->belongsTo(OrderStatus::class,"order_status_id", "id");
    }

}

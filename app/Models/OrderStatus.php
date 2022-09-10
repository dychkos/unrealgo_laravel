<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public function getStatusId($slug) {
        return $this->where("value", $slug)->get()->first()->id;
    }

//    protected const STATUSES = [
//        "waiting"    => 1,
//        "sent"       => 2,
//        "delivered"  => 3,
//        "done"       => 4,
//        "canceled"   => 5
//    ];

}

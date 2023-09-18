<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    const STATUS_ACTIVE = "active";
    const STATUS_REFUNDED = "refunded";

    protected $fillable = [
        "card_id",
        "amount",
        "status",
        "price",
        "total_price",
    ];
}

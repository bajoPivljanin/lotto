<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCards extends Model
{
    protected $fillable = [
        "card_number",
        "cvv",
        "expiry",
        "user_id",
    ];
    protected $table = "credit_cards";
}

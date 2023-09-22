<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tickets extends Model
{
    protected $table = "tickets";
    protected $fillable = [
        "user_id",
        "numbers",
        "price"
    ];

    public static function getAllTicketsForPast7Day(): ?Collection
    {
        return self::whereDate(
            'created_at','>',Carbon::now()->subDays(7)
        )->get();
    }
    public static function getTotalPriceForPast7Days(): ?int
    {
        return self::whereDate(
            'created_at','>',Carbon::now()->subDays(7)
        )->get()->sum('price');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

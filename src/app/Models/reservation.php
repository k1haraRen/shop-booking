<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'headcount',
        'check',
    ];

    public function reservationUser()
    {
        return $this->belongsTo(User::class);
    }

    public function reservationShop()
    {
        return $this->belongsTo(Shop::class);
    }
}

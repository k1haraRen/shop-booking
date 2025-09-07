<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reservationShop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}

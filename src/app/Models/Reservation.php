<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'qr_token',
        'qr_used_at',
    ];
    protected $data = ['qr_used_at'];

    public static function booted()
    {
        static::creating(function ($r) {
            if (empty($r->qr_token)) {
                $r->qr_token = Str::random(40);
            }
        });
    }

    public function reservationUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reservationShop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function isQrUsed(): bool
    {
        return !is_null($this->qr_used_at);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

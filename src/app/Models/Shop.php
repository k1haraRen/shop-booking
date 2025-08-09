<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'genre_id',
        'shop_name',
        'pic_url',
        'introduction',
    ];

    public function shopUser()
    {
        return $this->belongsTo(User::class);
    }

    public function shopReservation()
    {
        return $this->hasMany(reservation::class);
    }

    public function shopFavorite()
    {
        return $this->belongsToMany(User::class);
    }

    public function shopArea()
    {
        return $this->hasOne(Area::class);
    }

    public function shopGenre()
    {
        return $this->hasOne(Genre::class);
    }
}

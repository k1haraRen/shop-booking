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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shopReservation()
    {
        return $this->hasMany(reservation::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'shop_id', 'user_id');
    }

    public function shopArea()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function shopGenre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}

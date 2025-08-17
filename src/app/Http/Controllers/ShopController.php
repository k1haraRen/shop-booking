<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function home(Request $request)
    {
        $shops = Shop::with(['shopArea', 'shopGenre'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('shop.admin', compact('shops', 'areas', 'genres'));
    }
    public function shopList(Request $request)
    {
        $query = Shop::with(['shopArea', 'shopGenre']);

        if ($request->filled('name')) {
            $query->where('shop_name', 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('area')) {
            $query->where('area_id', $request->area);
        }

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
        }

        $shops = $query->get();

        return view('shop.shop_list', compact('shops'));
    }
    public function toggle(Shop $shop)
    {
        $user = Auth::user();

        if ($user->favorites()->where('shop_id', $shop->id)->exists()) {
            $user->favorites()->detach($shop->id);
            $favorited = false;
        } else {
            $user->favorites()->attach($shop->id);
            $favorited = true;
        }

        return response()->json([
            'favorited' => $favorited,
        ]);
    }

    public function shopDetail($id)
    {
        $user = auth()->user();
        $shop = Shop::with(['shopArea', 'shopGenre'])->findOrFail($id);

        return view('shop.detail', compact('shop'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'date' => 'required|date',
            'time' => 'required',
            'headcount' => 'required|integer|min:1',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'shop_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'headcount' => $request->headcount,
        ]);

        return redirect('/reservation/done');
    }
    public function done()
    {
        return view('shop.booking');
    }

    public function mypage()
    {
        $user = Auth::user();

        $favorites = $user->favorites()->with(['shopArea', 'shopGenre'])->get();
        $reservations = $user->userReservation()->with('reservationShop')->get();

        return view('shop.mypage', compact('user', 'favorites', 'reservations'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
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
    public function store(ReservationRequest $request)
    {
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
    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $reservation->update($request->validated());

        return redirect()->route('mypage');
    }
    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $reservation->delete();

        return redirect()->route('mypage');
    }

    public function edit($id)
    {
        $shop = Shop::with(['shopArea', 'shopGenre'])->findOrFail($id);
        $areas = Area::all();
        $genres = Genre::all();

        $reservations = $shop->shopReservation()
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('shop.edit', compact('shop', 'areas', 'genres', 'reservations'));
    }

    public function shopUpdate(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'area_id' => 'required|integer|exists:areas,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'introduction' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        $data = $validated;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);

            if ($shop->pic_url) {
                $old = 'public/img/' . $shop->pic_url;
                if (Storage::exists($old))
                    Storage::delete($old);
            }

            $data['pic_url'] = $filename;
        }

        $shop->update($data);

        return redirect()->route('shop.edit', $shop->id);
    }

    public function createView()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('shop.create', compact('areas', 'genres'));
    }

    public function create(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $data['pic_url'] = $filename;
        }

        $data['user_id'] = auth()->id();

        $shop = Shop::create($data);

        return redirect()->route('shop_detail', $shop->id);
    }
}

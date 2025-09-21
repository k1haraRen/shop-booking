<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'reservation_id' => 'nullable|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ]);

        $data['user_id'] = Auth::id();

        $existing = Rating::where('shop_id', $data['shop_id'])
            ->where('user_id', $data['user_id'])
            ->where('reservation_id', $data['reservation_id'])
            ->first();

        if ($existing) {
            $existing->update([
                'rating' => $data['rating'],
                'comment' => $data['comment'],
            ]);
        } else {
            Rating::create($data);
        }

        return redirect()->back()->with('success', '評価を保存しました。ありがとうございます！');
    }
}

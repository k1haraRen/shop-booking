<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function verify($id, Request $request)
    {
        $token = $request->query('token');
        if (!$token) {
            abort(404);
        }

        $updated = DB::table('reservations')
            ->where('id', $id)
            ->where('qr_token', $token)
            ->whereNull('qr_used_at')
            ->update(['qr_used_at' => now()]);

        $reservation = Reservation::with(['shop', 'user'])->findOrFail($id);

        $justUsed = $updated ? true : false;
        return view('shop.verify', compact('reservation', 'justUsed'));
    }
}

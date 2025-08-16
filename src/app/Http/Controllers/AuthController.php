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

class AuthController extends Controller
{

    public function registerShow()
    {
        return view('auth.register');
    }

    public function thanks()
    {
        return view('auth.thanks');
    }

    public function loginShow()
    {
        return view('auth.login');
    }


}

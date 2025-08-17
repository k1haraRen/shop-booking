@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
    <div class="login-container">
        <div class="login-card">
            <div class="login-card-header">
                Login
            </div>
            <div class="login-card-body">
                <form method="post" action="/login">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-input" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="text" class="form-input" placeholder="Password" name="password">
                    </div>
                    <button class="login-button">ログイン</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/represent.css') }}" />
@endsection

@section('content')
    <div class="register-container">
        <div class="register-card">
            <div class="register-card-header">
                RepresentCreate
            </div>
            <div class="register-card-body">
                <form method="post" action="/represent">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-input" placeholder="Username" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-input" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="text" class="form-input" placeholder="Password" name="password">
                    </div>
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul style="margin-top: 10px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="register-button">登録</button>
                </form>
            </div>
        </div>
    </div>
@endsection
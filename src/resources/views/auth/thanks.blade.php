@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
    <div class="complete-container">
        <div class="complete-card">
            <div class="complete-message">会員登録ありがとうございます</div>
            <a href="{{ route('login_show') }}">
                <button class="login-link-button">ログインする</button>
            </a>
        </div>
    </div>
@endsection
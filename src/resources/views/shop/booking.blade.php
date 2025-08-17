@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}" />
@endsection

@section('content')
    <div class="main">
        <div class="card">
            <div class="message">ご予約ありがとうございます</div>
            <a href="{{ route('shop_home') }}" class="back-button">戻る</a>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
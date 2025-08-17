@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="left-column">
            <div class="section-title">予約状況</div>
            @foreach ($reservations as $reservation)
                <div class="reservation-card">
                    <div class="reservation-header">
                        <div><i class="fas fa-clock"></i>予約 {{ $loop->iteration }}</div>
                        <button class="close-button"><i class="fas fa-times-circle"></i></button>
                    </div>
                    <p>Shop　　{{ $reservation->reservationShop->shop_name }}</p>
                    <p>Date　　{{ $reservation->date }}</p>
                    <p>Time　　{{ $reservation->time }}</p>
                    <p>Number　{{ $reservation->headcount }}人</p>
                </div>
            @endforeach
        </div>

        <div class="right-column">
            <div class="user-name">{{ $user->name }}さん</div>
            <div class="favorite-title">お気に入り店舗</div>
            <div class="favorite-cards">
                @foreach ($favorites as $shop)
                    <div class="shop-card">
                        <img src="{{ asset('storage/img/' . $shop->pic_url) }}" alt="{{ $shop->name }}">
                        <div class="shop-info">
                            <p><strong>{{ $shop->name }}</strong></p>
                            <p>#{{ $shop->shopArea->area }} #{{ $shop->shopGenre->genre }}</p>
                        </div>
                        <div class="shop-buttons">
                            <a href="{{ route('shop_detail', $shop->id) }}" class="detail-button">詳しくみる</a>
                            <i class="fas fa-heart heart active"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
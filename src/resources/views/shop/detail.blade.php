@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
    <div class="main">
        <div class="shop-info">
            <a href="{{ route('shop_home') }}" class="back-button">&lt;</a>
            <div class="shop-name">{{ $shop->shop_name }}</div>
            <img src="{{ asset('storage/img/' . $shop->pic_url) }}" class="shop-image" alt="shop">
            <div class="shop-tags">#{{ $shop->shopArea->area }} #{{ $shop->shopGenre->genre }}</div>
            <div class="shop-description">
                {{ $shop->introduction }}
            </div>
        </div>

        <div class="reservation-form">
            <h2>予約</h2>
            <form action="{{ route('reservation.store') }}" method="post">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="date" name="date" id="date" required>
                <input type="time" name="time" id="time" required>
                <input type="number" name="headcount" id="headcount" min="1" placeholder="人数" required>

                <div class="reservation-summary">
                    <div><strong>Shop</strong>　{{ $shop->shop_name }}</div>
                    <div><strong>Date</strong>　<span id="summary-date">----</span></div>
                    <div><strong>Time</strong>　<span id="summary-time">----</span></div>
                    <div><strong>Number</strong>　<span id="summary-headcount">----</span></div>
                </div>

                <button class="submit-button" type="submit">予約する</button>
            </form>
        </div>
    </div>

    <script>
        const dateInput = document.getElementById('date');
        const timeInput = document.getElementById('time');
        const headcountInput = document.getElementById('headcount');

        const summaryDate = document.getElementById('summary-date');
        const summaryTime = document.getElementById('summary-time');
        const summaryHeadcount = document.getElementById('summary-headcount');

        dateInput.addEventListener('input', function () {
            summaryDate.textContent = this.value || '----';
        });

        timeInput.addEventListener('input', function () {
            summaryTime.textContent = this.value || '----';
        });

        headcountInput.addEventListener('input', function () {
            summaryHeadcount.textContent = this.value ? this.value + '人' : '----';
        });
    </script>
@endsection
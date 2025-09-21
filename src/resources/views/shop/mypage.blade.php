@extends('layouts.app')

@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="left-column">
            @foreach ($reservations as $reservation)
                <div class="reservation-card">
                    <div>Shop {{ $reservation->shop->shop_name }}</div>
                    <div>Date {{ $reservation->date }}</div>
                    <div>Time {{ $reservation->time }}</div>

                    @if (!$reservation->isQrUsed())
                        <div class="qr-block" style="margin-top:10px;">
                            {!! QrCode::size(200)->generate(route('reservation.verify', ['id' => $reservation->id, 'token' => $reservation->qr_token])) !!}
                            <div class="meta">※ 受付で読み取られるとこのQRは無効になります</div>
                        </div>
                    @else
                        <div class="meta">このQRは使用済み（{{ optional($reservation->qr_used_at)->format('Y-m-d H:i') }}）</div>
                    @endif
                </div>
            @endforeach
            <div class="section-title">予約状況</div>
            @foreach ($reservations as $reservation)
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <div><i class="fas fa-clock"></i>予約 {{ $loop->iteration }}</div>
                            <button class="close-button" data-target="reservation-modal-{{ $reservation->id }}">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <p>Shop　　{{ $reservation->reservationShop->shop_name }}</p>
                        <p>Date　　{{ $reservation->date }}</p>
                        <p>Time　　{{ $reservation->time }}</p>
                        <p>Number　{{ $reservation->headcount }}人</p>
                    </div>

                    <!-- 予約編集モーダル -->
                    <div id="reservation-modal-{{ $reservation->id }}" class="reservation-modal">
                        <div class="reservation-modal-content">
                            <h3>予約内容を編集</h3>
                            <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="date-{{ $reservation->id }}">日付</label>
                                <input type="date" id="date-{{ $reservation->id }}" name="date" value="{{ $reservation->date }}">

                                <label for="time-{{ $reservation->id }}">時間</label>
                                <input type="time" id="time-{{ $reservation->id }}" name="time" value="{{ $reservation->time }}">

                                <label for="headcount-{{ $reservation->id }}">人数</label>
                                <input type="number" id="headcount-{{ $reservation->id }}" name="headcount"
                                    value="{{ $reservation->headcount }}" min="1">

                                    @if ($errors->any())
                                        <div style="color: red;">
                                            <ul style="margin-top: 10px;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <div class="modal-actions">
                                    <button type="submit" class="save-btn">保存</button>
                            </form>
                            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">削除</button>
                            </form>
                            <button type="button" class="cancel-btn modal-close"
                                data-target="reservation-modal-{{ $reservation->id }}">キャンセル</button>
                        </div>
                    </div>
            @endforeach
        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openButtons = document.querySelectorAll('.close-button');
            const closeButtons = document.querySelectorAll('.modal-close');

            openButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = document.getElementById(btn.dataset.target);
                    if (target) target.classList.add('active');
                });
            });

            closeButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = document.getElementById(btn.dataset.target);
                    if (target) target.classList.remove('active');
                });
            });

            document.querySelectorAll('.reservation-modal').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                    }
                });
            });
        });
    </script>
@endsection
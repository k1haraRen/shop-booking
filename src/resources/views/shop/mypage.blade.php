<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <title>マイページ - Rese</title>
    <style>
        .header {
            display: flex;
            align-items: center;
            padding: 20px 40px;
        }

        .menu-button {
            background: #3366ff;
            border: none;
            color: white;
            padding: 10px;
            font-size: 18px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            margin-right: 10px;
        }

        .logo-text {
            font-size: 26px;
            font-weight: bold;
            color: #3366ff;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>
    </div>

    <div class="container">
        <div class="left-column">
            <div class="section-title">予約状況</div>

            @foreach ([1] as $reservation)
                <div class="reservation-card">
                    <div class="reservation-header">
                        <div><i class="fas fa-clock"></i>予約{{ $reservation }}</div>
                        <button class="close-button"><i class="fas fa-times-circle"></i></button>
                    </div>
                    <p>Shop　　仮店舗名</p>
                    <p>Date　　2021-04-01</p>
                    <p>Time　　17:00</p>
                    <p>Number　1人</p>
                </div>
            @endforeach

        </div>

        <div class="right-column">
            <div class="user-name">testさん</div>
            <div class="favorite-title">お気に入り店舗</div>
            <div class="favorite-cards">
                <div class="shop-card">
                    <img src="https://via.placeholder.com/200x140" alt="shop">
                    <div class="shop-info">
                        <p><strong>仙人</strong></p>
                        <p>#東京都 #寿司</p>
                    </div>
                    <div class="shop-buttons">
                        <button class="detail-button">詳しくみる</button>
                        <i class="fas fa-heart heart"></i>
                    </div>
                </div>
                <div class="shop-card">
                    <img src="https://via.placeholder.com/200x140" alt="shop">
                    <div class="shop-info">
                        <p><strong>牛助</strong></p>
                        <p>#大阪府 #焼肉</p>
                    </div>
                    <div class="shop-buttons">
                        <button class="detail-button">詳しくみる</button>
                        <i class="fas fa-heart heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
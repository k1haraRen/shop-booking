<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ - Rese</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #eeeeee;
        }

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

        .container {
            display: flex;
            justify-content: space-between;
            padding: 40px 80px;
        }

        .left-column {
            width: 45%;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .reservation-card {
            background-color: #3366ff;
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .reservation-card i {
            margin-right: 10px;
        }

        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .close-button {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .right-column {
            width: 50%;
        }

        .user-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .favorite-title {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .favorite-cards {
            display: flex;
            gap: 20px;
        }

        .shop-card {
            width: 200px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .shop-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .shop-info {
            padding: 10px 15px;
        }

        .shop-info p {
            margin: 4px 0;
            font-size: 14px;
        }

        .shop-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px 15px;
        }

        .detail-button {
            background-color: #3366ff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .heart {
            color: red;
            font-size: 18px;
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
        <!-- Left side - reservations -->
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

        <!-- Right side - favorites -->
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
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>店舗詳細 - Rese</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eeeeee;
            font-family: 'Arial', sans-serif;
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

        .main {
            display: flex;
            justify-content: space-between;
            padding: 40px;
        }

        .shop-info {
            width: 50%;
            padding-right: 30px;
        }

        .back-button {
            font-size: 20px;
            margin-bottom: 10px;
            display: inline-block;
            text-decoration: none;
            color: #000;
        }

        .shop-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .shop-image {
            width: 100%;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .shop-tags {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .shop-description {
            line-height: 1.8;
            font-size: 15px;
        }

        .reservation-form {
            width: 40%;
            background-color: #3366ff;
            border-radius: 8px;
            padding: 30px;
            color: white;
        }

        .reservation-form h2 {
            margin-bottom: 20px;
        }

        .reservation-form input,
        .reservation-form select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: none;
            margin-bottom: 15px;
        }

        .reservation-summary {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .reservation-summary div {
            margin-bottom: 5px;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background-color: #0047ff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 0 0 8px 8px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0033cc;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>
    </div>

    <div class="main">
        <div class="shop-info">
            <a href="#" class="back-button">&lt;</a>
            <div class="shop-name">仙人</div>
            <img src="https://via.placeholder.com/600x400.png?text=Shop+Image" class="shop-image" alt="shop">
            <div class="shop-tags">#東京都 #寿司</div>
            <div class="shop-description">
                料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。<br>
                食材・味・価格、お客様の満足度を徹底的に追及したお店です。<br>
                特別な日のお食事、ビジネス接待まで気軽に使用することができます。
            </div>
        </div>

        <div class="reservation-form">
            <h2>予約</h2>
            <input type="date" value="2021-04-01">
            <select>
                <option>17:00</option>
            </select>
            <select>
                <option>1人</option>
            </select>

            <div class="reservation-summary">
                <div><strong>Shop</strong>　仙人</div>
                <div><strong>Date</strong>　2021-04-01</div>
                <div><strong>Time</strong>　17:00</div>
                <div><strong>Number</strong>　1人</div>
            </div>

            <button class="submit-button">予約する</button>
        </div>
    </div>

</body>

</html>
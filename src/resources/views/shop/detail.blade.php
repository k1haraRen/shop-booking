<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <title>店舗詳細 - Rese</title>
    <style>
        body {
            margin: 0;
            padding: 0px 80px;
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

</body>

</html>
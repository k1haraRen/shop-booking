<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>予約照会</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 480px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .star {
            font-size: 28px;
            cursor: pointer;
            color: #ddd;
        }

        .star.active {
            color: #ffb400;
        }

        .close-btn {
            float: right;
            cursor: pointer;
            background: none;
            border: 0;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container" style="padding:20px;">
        <h2>予約情報</h2>
        <p><strong>Shop:</strong> {{ $reservation->shop->shop_name }}</p>
        <p><strong>Date:</strong> {{ $reservation->date }}</p>
        <p><strong>Time:</strong> {{ $reservation->time }}</p>
        <p><strong>人数:</strong> {{ $reservation->headcount }}人</p>
        @if($reservation->isQrUsed())
            <p class="meta">このQRは{{ $reservation->qr_used_at->format('Y-m-d H:i') }}に使用されました。</p>
        @endif
    </div>

    {{-- モーダル --}}
    <div id="rating-backdrop" class="modal-backdrop" aria-hidden="true">
        <div class="modal">
            <button id="modal-close" class="close-btn">×</button>
            <h3>このお店の評価をお願いします</h3>

            @auth
                <form id="rating-form" method="POST" action="{{ route('ratings.store') }}">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

                    <div id="star-wrapper" style="margin:12px 0;">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                        <input type="hidden" name="rating" id="rating-input" value="">
                    </div>

                    <div>
                        <textarea name="comment" rows="4" style="width:100%;" placeholder="コメント（任意）"></textarea>
                    </div>

                    <div style="margin-top:12px;">
                        <button type="submit">送信する</button>
                    </div>
                </form>
            @else
                <p>評価するにはログインが必要です。</p>
                <a href="{{ route('login_show') }}?redirect={{ urlencode(url()->current()) }}">ログイン</a>
            @endauth
        </div>
    </div>

    <script>
        (function () {
            const backdrop = document.getElementById('rating-backdrop');
            const closeBtn = document.getElementById('modal-close');

            // 自動オープン（QR読み取りでアクセスしてきたら常にモーダルを出す）
            // ただし既に評価済みを判定したい場合は、バックエンド側でフラグを渡して条件付きにできます。
            function openModal() { backdrop.style.display = 'flex'; backdrop.setAttribute('aria-hidden', 'false'); }
            function closeModal() { backdrop.style.display = 'none'; backdrop.setAttribute('aria-hidden', 'true'); }

            // open on load if QR was just used OR we want always to prompt
            // we open when page loaded: you can refine with server-side flag if necessary
            document.addEventListener('DOMContentLoaded', function () {
                // only open if QR was just used OR not used but this is verify page — adjust as wanted
                @if($justUsed)
                    openModal();
                @else
                    // Optionally still open when already used, if you want rating every time:
                    // openModal();
                @endif
    });

            if (closeBtn) closeBtn.addEventListener('click', closeModal);

            // star rating logic
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating-input');
            stars.forEach(s => {
                s.addEventListener('click', function () {
                    const v = parseInt(this.dataset.value, 10);
                    ratingInput.value = v;
                    stars.forEach(st => {
                        st.classList.toggle('active', parseInt(st.dataset.value, 10) <= v);
                    });
                });
            });

            // simple validation on submit
            const form = document.getElementById('rating-form');
            if (form) {
                form.addEventListener('submit', function (e) {
                    if (!ratingInput.value) {
                        e.preventDefault();
                        alert('評価を選んでください（1〜5）');
                    }
                });
            }
        })();
    </script>
</body>

</html>
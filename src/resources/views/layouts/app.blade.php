<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <title>店舗一覧 - Rese</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <button id="menu-toggle" class="logo logo-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>

        @if (Route::currentRouteName() === 'shop_home')
            <div class="search-box">
                <select name="area" id="search-area">
                    <option value="">ALL area</option>
                    @foreach ($areas ?? [] as $area)
                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                    @endforeach
                </select>
                <select name="genre" id="search-genre">
                    <option value="">ALL genre</option>
                    @foreach ($genres ?? [] as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
                <input type="text" placeholder="Search ..." name="name" id="search-name">
            </div>
        @endif
    </div>

    {{-- モーダル --}}
    <div id="menu-modal" class="modal hidden" aria-hidden="true" role="dialog">
        <div class="modal-content">
            <button id="close-modal" class="close-btn" aria-label="閉じる">×</button>
            <ul class="menu-list">
                <li><a class="menu-link" href="{{ route('shop_home') }}">Home</a></li>
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="menu-form">
                            @csrf
                            <button type="submit" class="menu-link">Logout</button>
                        </form>
                    </li>
                    <li><a class="menu-link" href="{{ route('mypage') }}">Mypage</a></li>
                @else
                    <li><a class="menu-link" href="{{ route('register_show') }}">Registration</a></li>
                    <li><a class="menu-link" href="{{ route('login_show') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>

    @yield('content')

<script>
    document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('menu-toggle');
            const modal = document.getElementById('menu-modal');
            const closeBtn = document.getElementById('close-modal');

            if (toggleBtn && modal && closeBtn) {
                toggleBtn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                    toggleBtn.classList.add('hidden');
                });
                closeBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    toggleBtn.classList.remove('hidden');
                });
            }

            @if (Route::currentRouteName() === 'shop_home')
                const nameEl = document.getElementById('search-name');
                const areaEl = document.getElementById('search-area');
                const genreEl = document.getElementById('search-genre');
                const results = document.getElementById('search-results');

                function searchShops() {
                    const params = new URLSearchParams({
                        name: nameEl?.value || '',
                        area: areaEl?.value || '',
                        genre: genreEl?.value || ''
                    });

                    fetch(`/shop/shop_list?${params.toString()}`)
                        .then(r => r.text())
                        .then(html => { results && (results.innerHTML = html); });
                }

                nameEl && nameEl.addEventListener('input', searchShops);
                areaEl && areaEl.addEventListener('change', searchShops);
                genreEl && genreEl.addEventListener('change', searchShops);
            @endif
    });
</script>

</body>

</html>
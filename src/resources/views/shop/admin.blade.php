<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>店舗一覧 - Rese</title>
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

        <div class="search-box">
            <select name="area" id="search-area">
                    <option value="">ALL area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                @endforeach
            </select>
            <select name="genre" id="search-genre">
                    <option value="">ALL genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="Search ..." name="name" id="search-name">
        </div>
    </div>

    <div id="search-results">
        @include('shop.shop_list', ['shops' => $shops])
    </div>

    <script>
        let inputs = ['search-name', 'search-area', 'search-genre'];

            inputs.forEach(id => {
                document.getElementById('search-name').addEventListener('input', searchShops);
                document.getElementById('search-area').addEventListener('change', searchShops);
                document.getElementById('search-genre').addEventListener('change', searchShops);
            });

            function searchShops() {
                let name = document.getElementById('search-name').value;
                let area = document.getElementById('search-area').value;
                let genre = document.getElementById('search-genre').value;

                let params = new URLSearchParams({
                    name: name,
                    area: area,
                    genre: genre
                });

                fetch(`/shop/shop_list?${params.toString()}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('search-results').innerHTML = data;
                    });
            }

        document.querySelectorAll('.heart__mark-input').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    let shopId = this.id.replace('favorite-', '');

                    fetch(`/favorite/toggle/${shopId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({})
                    })
                        .then(response => response.json())
                        .then(data => {});
                });
            });
    </script>

</body>

</html>
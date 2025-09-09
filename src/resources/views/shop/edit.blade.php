@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="shop-container">
        <div class="shop-left">

            <form action="{{ route('shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>店舗名</label>
                <input type="text" name="shop_name" class="form-input" value="{{ old('shop_name', $shop->shop_name) }}">
                @error('shop_name') <div style="color:red;">{{ $message }}</div> @enderror

                <label>エリア</label>
                <select name="area_id" class="form-input" required>
                    <option value="">選択してください</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ (old('area_id', $shop->area_id) == $area->id) ? 'selected' : '' }}>
                            {{ $area->area }}
                        </option>
                    @endforeach
                </select>
                @error('area_id') <div style="color:red;">{{ $message }}</div> @enderror

                <label>ジャンル</label>
                <select name="genre_id" class="form-input" required>
                    <option value="">選択してください</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ (old('genre_id', $shop->genre_id) == $genre->id) ? 'selected' : '' }}>
                            {{ $genre->genre }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id') <div style="color:red;">{{ $message }}</div> @enderror

                <label>紹介文</label>
                <textarea name="introduction" class="form-input"
                    rows="6">{{ old('introduction', $shop->introduction) }}</textarea>
                @error('introduction') <div style="color:red;">{{ $message }}</div> @enderror

                <label>現在の画像</label>
                <div>
                    @if($shop->pic_url)
                        <img id="current-img" src="{{ asset('storage/img/' . $shop->pic_url) }}" alt="店舗画像" class="img-preview">
                    @else
                        <p class="meta">画像が登録されていません。</p>
                    @endif
                </div>

                <label>新しい画像を選択（任意）</label>
                <input type="file" name="image" id="image-input" accept="image/*" class="form-input">
                @error('image') <div style="color:red;">{{ $message }}</div> @enderror

                <div id="preview" style="margin-bottom:12px;"></div>

                <button class="submit-button" type="submit">保存</button>
            </form>
        </div>

        <div class="shop-right">
            <h2 style="margin-top:0;">予約一覧</h2>
            <p class="meta" style="margin-bottom:12px;">日付・時間が近い順に並んでいます</p>

            @forelse($reservations as $reservation)
                <div class="reservation-card">
                    <p><strong>Date</strong> {{ $reservation->date }}</p>
                    <p><strong>Time</strong> {{ $reservation->time }}</p>
                    <p><strong>人数</strong> {{ $reservation->headcount }}人</p>
                </div>
            @empty
                <p class="meta">予約はまだありません。</p>
            @endforelse
        </div>
    </div>

    <script>
        document.getElementById('image-input')?.addEventListener('change', function (e) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            const file = e.target.files[0];
            if (!file) return;
            const img = document.createElement('img');
            img.style.maxWidth = '100%';
            img.style.height = 'auto';
            img.src = URL.createObjectURL(file);
            preview.appendChild(img);
        });
    </script>

    <style>
        @media (max-width: 900px) {
            .shop-container {
                flex-direction: column;
                padding: 16px;
            }

            .shop-right {
                width: 100%;
                max-height: 50vh;
                margin-top: 16px;
            }
        }
    </style>
@endsection
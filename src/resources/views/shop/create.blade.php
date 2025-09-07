@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="create-container">
        <h1>新規店舗作成</h1>

        @if ($errors->any())
            <div style="color:red; margin-bottom:12px;">
                <ul style="margin:0; padding-left: 16px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('shop.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>店舗名</label>
            <input type="text" name="shop_name" class="form-input" value="{{ old('shop_name') }}">
            @error('shop_name') <div style="color:red;">{{ $message }}</div> @enderror

            <label>エリア</label>
            <select name="area_id" class="form-input" required>
                <option value="">選択してください</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                        {{ $area->area }}
                    </option>
                @endforeach
            </select>
            @error('area_id') <div style="color:red;">{{ $message }}</div> @enderror

            <label>ジャンル</label>
            <select name="genre_id" class="form-input" required>
                <option value="">選択してください</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    </option>
                @endforeach
            </select>
            @error('genre_id') <div style="color:red;">{{ $message }}</div> @enderror

            <label>紹介文</label>
            <textarea name="description" class="form-input" rows="6">{{ old('description') }}</textarea>
            @error('description') <div style="color:red;">{{ $message }}</div> @enderror

            <label>店舗画像（任意）</label>
            <input type="file" name="image" id="image-input" accept="image/*" class="form-input">
            @error('image') <div style="color:red;">{{ $message }}</div> @enderror

            <div id="preview" style="margin-bottom:12px;"></div>

            <button class="submit-button" type="submit">作成する</button>
        </form>
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
@endsection
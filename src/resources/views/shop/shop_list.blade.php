<div class="container">
    @foreach ($shops as $shop)

        <div class="shop-card">
            <img src="{{ asset('storage/img/' . $shop->pic_url) }}" class="shop-image" alt="店舗画像">
            <div class="shop-content">
                <div class="shop-name">{{ $shop['shop_name'] }}</div>
                <div class="shop-tags">#{{ $shop->shopArea->area }} #{{ $shop->shopGenre->genre }}</div>
                <a href="{{ route('shop_detail', ['id' => $shop->id]) }}">
                    <button class="detail-button">詳しくみる</button>
                </a>
                <div class="heart__mark">
                    <input type="checkbox" id="favorite-{{ $shop->id }}" class="heart__mark-input" {{ $shop->favoritedBy->contains(auth()->user()) ? 'checked' : '' }}>
                    <label for="favorite-{{ $shop->id }}" class="heart__mark-button fas fa-heart"></label>
                </div>
            </div>
        </div>

    @endforeach
</div>
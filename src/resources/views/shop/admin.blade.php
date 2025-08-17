@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
    <div id="search-results">
        @include('shop.shop_list', ['shops' => $shops])
    </div>

    <script>
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

@endsection
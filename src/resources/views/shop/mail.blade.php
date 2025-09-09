@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>全ユーザーへメール送信</h2>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.mail.send') }}" method="POST">
            @csrf
            <textarea name="content" rows="10" style="width:100%;"
                placeholder="ここに本文を入力してください">{{ old('content') }}</textarea>
            @error('content')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <button type="submit">送信</button>
        </form>
    </div>
@endsection
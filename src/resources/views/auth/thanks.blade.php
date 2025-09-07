@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
    <div class="complete-container">
        <div class="complete-card">
            <div class="complete-message">
                会員登録ありがとうございます！<br />
                ご入力いただいたメールアドレスへ認証リンクを送信しましたので、クリックして認証を完了させてください。<br />
                もし、認証メールが届かない場合は再送させていただきます。</div>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="resend__url">認証メールを再送する</button>
                </form>

            <a href="{{ route('login_show') }}">
                <button class="login-link-button">ログインする</button>
            </a>
        </div>
    </div>
@endsection
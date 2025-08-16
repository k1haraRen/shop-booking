<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    <title>登録完了 - Rese</title>
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

        .menu-button:focus {
            outline: none;
        }

        .logo-text {
            font-size: 26px;
            font-weight: bold;
            color: #3366ff;
        }
    </style>
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>
    </div>

    <div class="complete-container">
        <div class="complete-card">
            <div class="complete-message">会員登録ありがとうございます</div>
            <a href="{{ route('login_show') }}">
                <button class="login-link-button">ログインする</button>
            </a>
        </div>
    </div>

</body>

</html>
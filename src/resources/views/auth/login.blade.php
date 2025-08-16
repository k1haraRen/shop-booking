<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login - Rese</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-card-header">
                Login
            </div>
            <div class="login-card-body">
                <form method="post" action="/login">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-input" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="text" class="form-input" placeholder="Password" name="password">
                    </div>
                    <button class="login-button">ログイン</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
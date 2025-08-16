<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registration - Rese</title>
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

    <div class="register-container">
        <div class="register-card">
            <div class="register-card-header">
                Registration
            </div>
            <div class="register-card-body">
                <form method="post" action="/register">
                    @csrf

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-input" placeholder="Username" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-input" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="text" class="form-input" placeholder="Password" name="password">
                    </div>
                    <button class="register-button">登録</button>
                </form>
            </div>
            @if ($errors->any())
                <div style="color: red;">
                    <ul style="margin-top: 10px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login - Rese</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eeeeee;
            font-family: 'Arial', sans-serif;
        }

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

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
        }

        .login-card {
            width: 360px;
            background: white;
            border-radius: 6px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            overflow: hidden;
        }

        .login-card-header {
            background-color: #3366ff;
            color: white;
            padding: 16px;
            font-size: 18px;
        }

        .login-card-body {
            padding: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group i {
            font-size: 18px;
            margin-right: 10px;
            color: #333;
        }

        .form-input {
            border: none;
            border-bottom: 1px solid #333;
            width: 100%;
            font-size: 16px;
            padding: 6px 0;
            outline: none;
        }

        .login-button {
            background-color: #3366ff;
            color: white;
            border: none;
            padding: 8px 16px;
            float: right;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #274fc3;
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
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-input" placeholder="Email">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-input" placeholder="Password">
                </div>
                <button class="login-button">ログイン</button>
            </div>
        </div>
    </div>

</body>

</html>
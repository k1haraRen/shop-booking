<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録完了 - Rese</title>
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

        .complete-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
        }

        .complete-card {
            background-color: #ffffff;
            padding: 40px 60px;
            border-radius: 6px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            text-align: center;
        }

        .complete-message {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .login-link-button {
            background-color: #3366ff;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-link-button:hover {
            background-color: #274fc3;
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
            <button class="login-link-button">ログインする</button>
        </div>
    </div>

</body>

</html>
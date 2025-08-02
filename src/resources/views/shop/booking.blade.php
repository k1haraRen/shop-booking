<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>予約完了 - Rese</title>
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

        .logo-text {
            font-size: 26px;
            font-weight: bold;
            color: #3366ff;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        .card {
            background-color: white;
            padding: 40px 60px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .message {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .back-button {
            background-color: #3366ff;
            color: white;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #0047cc;
        }
    </style>
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>
    </div>

    <div class="main">
        <div class="card">
            <div class="message">ご予約ありがとうございます</div>
            <a href="" class="back-button">戻る</a>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>店舗一覧 - Rese</title>
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

        .search-box {
            margin-left: auto;
            margin-right: 40px;
            background-color: white;
            padding: 10px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box select,
        .search-box input {
            padding: 6px 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            padding: 40px;
        }

        .shop-card {
            width: 300px;
            background-color: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .shop-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .shop-content {
            padding: 15px;
            position: relative;
        }

        .shop-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .shop-tags {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .detail-button {
            background-color: #3366ff;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .heart-icon {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 20px;
            color: #e0e0e0;
            cursor: pointer;
        }

        .heart-icon.active {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <button class="menu-button"><i class="fas fa-bars"></i></button>
        <span class="logo-text">Rese</span>

        <div class="search-box">
            <select>
                <option>All area</option>
            </select>
            <select>
                <option>All genre</option>
            </select>
            <input type="text" placeholder="Search ...">
        </div>
    </div>

    <div class="container">
        <div class="shop-card">
            <img src="https://via.placeholder.com/300x200.png?text=Sample+Image" class="shop-image" alt="店舗画像">
            <div class="shop-content">
                <div class="shop-name">店舗名</div>
                <div class="shop-tags">#都道府県 #ジャンル</div>
                <button class="detail-button">詳しくみる</button>
                <i class="fas fa-heart heart-icon"></i>
            </div>
        </div>
    </div>

</body>

</html>
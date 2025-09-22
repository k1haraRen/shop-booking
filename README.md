# shop-booking

## 主な機能

- ユーザー登録、ログイン、ログアウト(Laravel Fortify)
- マイページ機能(予約の確認、変更)
- 店舗一覧、詳細表示
- 店舗検索(キーワード、エリア、ジャンル)
- お気に入り登録、解除
- 店舗評価
- 店舗作成、更新
- 予約のQRコード照会
- ユーザーへのメール送信

---

## 技術スタック

- OS : Linux(docker)
- バックエンド : php 8.0 / laravel 8
- フロントエンド : Blade, JavaScript (fetch API)
- データベース : MySQL 8.0
- メール送信 : MailHog
- Webサーバー : nginx 1.21

---

## セットアップ手順(ローカル環境)

### 1. リポジトリのクローン

```bash
git clone https://github.com/k1haraRen/shop-booking.git
cd shop-booking
```

2. Docker 起動
```bash
docker-compose up -d --build
```

3. PHP コンテナに入る
```bash
docker=compose exec php bash
```

4. Composer インストール
```bash
composer install
```
5. .env 設定
```bash
cp .env.example .env
```
.env に以下の環境変数を記述

```env
DB_HOST=mysql
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

Mail_MATLER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=example@example.com
MAIL_FROM_NAME="${APP_NAMW}"
```
6. Laravel のセットアップ
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Fortify セットアップ手順
```bash
composer require laravel/fortify
```
config/app.php に以下を追加：

```php
App\Providers\FortifyServiceProvider::class,
```
以下のコマンドを実行：

```bash
php artisan vendor:publish --provider="laravel\Fortify\FortifyServiceProvider"
php artisan migrate
```

Simple QR セットアップ手順
```bash
composer require simplesoftwareio/simple-qrcode
```

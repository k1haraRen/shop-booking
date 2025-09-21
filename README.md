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

# Rese
飲食店予約サービス

## ページ一覧

内容 | パス 
--- | --- 
飲食店一覧ページ　|/
会員登録ページ　|/register
ログインページ 　|/login
飲食店詳細ページ　|/detail
マイページ　|/my_page
メニューページ　|/menu
予約情報変更ページ　|/reservation/{id}/edit
登録完了ページ　|/register_thanks
予約完了ページ　|/reservation_thanks

## 機能一覧

|機能 | 詳細 |
|--- | --- |
|会員登録| Laravelの認証機能（Fortify）を利用|
|ログイン |〃|
|ログアウト |〃|
|ユーザー情報取得　||
|ユーザー飲食店お気に入り一覧取得||
|ユーザー飲食店予約情報取得 ||
|飲食店一覧取得 ||
|飲食店お気に入り追加 ||
|飲食店お気に入り削除 ||
|飲食店予約情報追加 ||
|飲食店予約情報削除 ||
|飲食店予約情報変更 ||
|エリアで検索する ||
|ジャンルで検索する ||
|店名で検索する ||
|評価機能 ||
|バリデーション ||
|メール認証 ||

## テーブル設計
![table]()

## ER図
![ER]()

## 環境構築

- Dockerビルド  
1.git@github.com:seed9103/laravel_Rese.git  
2.`docker-compose up -d --build`

- Laravel環境構築  
1.docker-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し、環境変数を変更  
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
4.アプリケーションキー
``` bash
php artisan key:generate
```
5.マイグレーション
``` bash
php artisan migrate
```
6.シーディング
``` bash
php artisan db:seed
```

## 使用技術
- PHP 7.4.9
- Laravel8.83.27
- MySQL8.0.26

## URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/# laravel_Rese
# laravel_Rese
# laravel_Rese

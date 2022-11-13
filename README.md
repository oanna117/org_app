# ピリカスクプオリジナルアプリ

## 公用車の予約を管理するアプリです

<br>

## データベースとユーザーの作成
-- DBの作成
CREATE DATABASE IF NOT EXISTS org_app_db;

-- 作業ユーザーの作成とパスワードの設定
CREATE USER IF NOT EXISTS org_app_admin IDENTIFIED BY '1234';

GRANT ALL ON org_app_db.* TO org_app_admin;



$ docker-compose exec app php db/db_setup.php

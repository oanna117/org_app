<?php
// 接続に必要な情報を定数として定義 設定ファイル( config.php )
define('DSN', 'mysql:host=db;dbname=org_app_db;charset=utf8');
define('USER', 'org_app_admin');
define('PASSWORD', '1234');

define('MSG_NAME_REQUIRED', 'アカウント名が未入力です');
define('MSG_PASSWORD_REQUIRED', 'パスワードが未入力です');
define('MSG_NAME_DUPLICATE', 'そのアカウント名は既に登録されています');
define('MSG_ACCOUNT_PASSWORD_NOT_MATCH', 'アカウント名かパスワードが間違っています');

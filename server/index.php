<?php

// セッション開始
session_start();

$current_user = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公用車予約システム</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=IBM+Plex+Sans+JP:wght@100;200;300;400;500;600;700&family=Kiwi+Maru:wght@300;400;500&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon.ico">
</head>
<body>
    <header id="menu" class="page_header" wrapper>
        <h1 class="site_title">
            <img src="images/logo_white.gif" alt="IKEGAMIのロゴ" class="logo">
            <span>池上学園 公用車予約システム</span>
        </h1>
        <nav class="menu_content">
            <ul class="menu_nav">
                <li class="request_btn"><a href="request.php">新規予約</a></li>
                <li class="index_btn"><a href="index.php"><i class="fa-solid fa-house-chimney"></i> TOP</a></li>
                <li class="right_content">
        <div class="login_info">
            <!-- <?php if (!empty($current_user)) : ?>
                <p>
                    <?= $current_user['id'] ?>さん -->
                </p>
                <a class="header_logout_button" href="/logout.php" class="nav-link">ログアウト</a>
            <!-- <?php else : ?>
                <a class="header_login_button" href="/login.php" class="nav-link">ログイン</a>
            <?php endif; ?> -->
            </li>
            </ul>
        </nav>
    </header>

    <div id="main" class="main_content">
        <h2 class="content_title">
        <i class="fa-regular fa-clock"></i> カレンダー<br>
        <span>
        <?php
        echo date('Y-m-d H:i:s')."\n"; //現在日時 20xx-12-31 23:59:59 ?> 現在の予約状況</span>
        </h2>
        <!-- <ul class="switch_btn">
            <li class="return_btn"><a href="request.php"><i class="fa-thin fa-caret-left"></i>前の週</a></li>
            <li class="next_btn"><a href="request.php">次の週<i class="fa-thin fa-caret-right"></i></a></li>
        </ul> -->
    
    <?php include_once __DIR__ . '/common/calender.html' ?>
    </div>

    <div class="admin_menu">
        <h2 class="content_title"><i class="fa-solid fa-user-lock"></i> 管理者メニュー</h2>
        <ul class="admin_content">
            <li class="admin_btn"><a href="permit.php">予約承認</a></li>
            <li class="admin_btn"><a href="carinfo.php">公用車情報</a></li>
            <li class="admin_btn"><a href="setting.php">管理者設定</a></li>
        </ul>
    </div>

    <?php include_once __DIR__ . '/common/_footer.html' ?>


</body>
</html>

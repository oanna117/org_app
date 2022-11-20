<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/common/functions.php';

// セッション開始
session_start();

$account_name = '';
$password = '';
$errors = [];

//ログイン判定
if (isset($_SESSION['current_user'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');

    $errors = login_validate($account_name, $password);

    if (empty($errors)) {
        $user = find_user_by_account($account_name);
        if (!empty($user) && password_verify($password, $user['password'])) {
            user_login($user);
        } else {
            $errors[] = MSG_ACCOUNT_PASSWORD_NOT_MATCH;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/common/_head.html' ?>
<body>
    <?php include_once __DIR__ . '/common/_header.php' ?>
    <main class="content_center wrapper">
        <div class="login_content">
            <h1 class="login_title">ログイン</h1>
            <?php include_once __DIR__ . '/common/_errors.php' ?>
            <form class="login_form" action="" method="post">
                <label class="email_label" for="email">アカウント名</label>
                <input type="text" name="name" id="name" placeholder="AccountName" value="<?= h($account_name) ?>">
                <label class="password_label" for="password">パスワード</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="button_area">
                    <input type="submit" value="ログイン" class="login_button">
                    <a href="signup.php" class="signup_page_button">新規ユーザー登録</a>
                </div>
            </form>
        </div>
    </main>
    <?php include_once __DIR__ . '/common/_footer.html' ?>
</body>
</html>

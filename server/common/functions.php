<?php
// 関数ファイル( functions.php ) 
require_once __DIR__ . '/config.php';
// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function signup_validate($account_name, $password)
{
    $errors = [];

    if (empty($account_name)) {
        $errors[] = MSG_NAME_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    if (empty($errors) &&
        check_exist_user($account_name)) {
        $errors[] = MSG_NAME_DUPLICATE;
    }

    return $errors;
}

function insert_user($account_name, $password)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        INSERT INTO
            accounts
            (account, password)
        VALUES
            (:account, :password);
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':account', $account_name, PDO::PARAM_STR);
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $pw_hash, PDO::PARAM_STR);

        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function check_exist_user($account_name) 
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT 
        * 
    FROM 
        accounts 
    WHERE 
        account = :account;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account', $account_name, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user)) {
        return true;
    } else {
        return false;
    }
}

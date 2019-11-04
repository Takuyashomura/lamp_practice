<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
//ログインチェックのためのセッションスタート
session_start();
//ログインチェック用関数でログインチェック
if(is_logined() === false){
  //ログインしていない場合はログイン画面へリダイレクト
  redirect_to(LOGIN_URL);
}
//PDOを取得
$db = get_db_connect();
//PDOを使ってログインユーザーのデータを取得
$user = get_login_user($db);

if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}
//アイテム一覧用のアイテム情報を取得
$items = get_all_items($db);

include_once '../view/admin_view.php';

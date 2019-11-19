<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();
//セッションIDが取得されていなければログイン画面へ移動
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベース接続
$db = get_db_connect();
//ユーザIDを取得
$user = get_login_user($db);
//ユーザIDが存在していなければログイン画面へ移動
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}
//アイテムidを取得
$item_id = get_post('item_id');
$stock = get_post('stock');

if(update_item_stock($db, $item_id, $stock)){
  set_message('在庫数を変更しました。');
} else {
  set_error('在庫数の変更に失敗しました。');
}

redirect_to(ADMIN_URL);
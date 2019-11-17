<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);

if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}
//item_id取得
$item_id = get_post('item_id');
//アップデートステータスの値を取得
$changes_to = get_post('changes_to');

//アップデートステータスがopenの場合は「公開」に変更
if($changes_to === 'open'){
  //ステータスアップデート関数を実行
  update_item_status($db, $item_id, ITEM_STATUS_OPEN);
  set_message('ステータスを変更しました。');
  //closeの場合は「非公開」に変更
}else if($changes_to === 'close'){
  //ステータスアップデート関数の実行
  update_item_status($db, $item_id, ITEM_STATUS_CLOSE);
  set_message('ステータスを変更しました。');
}else {
  //不正な操作がされた場合
  set_error('不正なリクエストです。');
}


redirect_to(ADMIN_URL);
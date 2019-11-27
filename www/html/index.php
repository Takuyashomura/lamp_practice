<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$items = get_open_items($db);

$total_items = count($items);
$max_page = ceil($total_items / MAX_ITEMS);

if(!isset($_GET['page']) || is_numeric($_GET['page']) === false || $_GET['page'] <= 0 || $_GET['page'] > $max_page ){
  $now_page = '1';
} else {
  $now_page = $_GET['page'];
}
$start_items = ($now_page - 1) * MAX_ITEMS;

$max_items = MAX_ITEMS;

$item_list = get_item_pagenation($db,true,$start_items,$max_items);
$item_list= entity_assoc_array($item_list);
$get_items = count($item_list);


include_once '../view/index_view.php';
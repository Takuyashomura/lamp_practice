<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);

$now_date = date('Y-m-d H:i:s');
$total_price = sum_carts($carts);

$user_purchase = get_user_purchase($db, $user['user_id']);
$order_id = $user_purchase['order_id'];
$item_id  = $user_purchase['item_id'];
$purchase_item_price = $user_purchase['price'];
$prurchase_item_amount = $user_purchase['amount'];
dd($user_purchase);
if(purchase_carts($db, $carts) === false || regist_purchase_transaction($db, $user['user_id'], $now_date, $total_price) === false){
  set_error('商品が購入できませんでした。');
  redirect_to(CART_URL);
}

include_once '../view/finish_view.php';
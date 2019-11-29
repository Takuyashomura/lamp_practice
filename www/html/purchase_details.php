<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
    redirect_to(LOGIN_URL);
}

$db =   get_db_connect();
$user = get_login_user($db);

$order= get_post('order_id');
$now_date = get_post('date');
$total_price = get_post('total');
$purchase_data = get_user_details($db,$order);

include_once '../view/purchase_details_view.php';
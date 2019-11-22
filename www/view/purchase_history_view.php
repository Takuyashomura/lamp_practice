<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH .'templates/head.php'; ?>
        <title>購入履歴</title>
    </head>
<body>
    <?php include VIEW_PATH .'templates/header_logined.php'; ?>
<h1>購入履歴</h1>
<?php if(count($purchase_data) > 0){?>
<table class="table table-bordered">
    <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>購入金額<th>
    </tr>
    <?php foreach ($purchase_data as $value){ ?>
        <tr>
            <td><?php print $value['order_id'];?></td>
            <td><?php print $value['purchase_datetime'];?></td>
            <td><?php print $value['purchase_total_price'];?>円</td>
            <td>
            <form method="post" action="<?php print (DETAILS_URL)?>">
            <input type="hidden" name="order_id" value="<?php print $value['order_id']; ?>">
            <input type="hidden" name="date" value="<?php print $value['purchase_datetime'];?>">
            <input type="hidden" name="total" value="<?php print $value['purchase_total_price'];?>">
            <input type="submit" value="購入明細">
            </form>
            </td>
        </tr>
    <?php } ?>
<?php } else {?>
    <p>※購入履歴がありません。</p>
<?php } ?>
</table>
</body>
</html>
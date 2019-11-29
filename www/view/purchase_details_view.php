<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'templates/head.php';?>
        <title>購入明細</title>
    </head>
    <body>
        <?php include VIEW_PATH . 'templates/header_logined.php';?>
        <h1>購入明細</h1>
        <table class="table table-bordered">
            <tr>
                <th>注文番号</th>
                <th>購入日時</th>
                <th>合計金額</th>
            </tr>
            <tr>
                <td><?php print $order;?></td>
                <td><?php print $now_date;?></td>
                <td><?php print $total_price;?></td>
            </tr>
            <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>購入個数</th>
            </tr>
            <?php foreach ($purchase_data as $value){?>
                <tr>
                    <td><?php print $value['name'];?></td>
                    <td><?php print $value['purchase_item_price'];?>円</td>
                    <td><?php print $value['purchase_item_amount'];?>個</td>
                </tr>
            <?php }?>
        </table>
    </body>
</html>
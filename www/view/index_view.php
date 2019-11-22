<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($item_list as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . $item['image']); ?>" height="300px">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print($item['item_id']); ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    </div>
    <div class="text-center">
      <div>
      <?php echo $total_items. '件中' .$get_items. '件表示';?>
      </div>
      <div>
      <?php if($now_page > 1){
        echo '<a href=\'/index.php?page=1\')>最初のページへ</a>';
      } else {
        echo ' ';
      }?>
      <?php if($now_page > 1){
        echo '<a href=\'/index.php?page='.($now_page - 1).'\')>前のページへ</a>';
      } else {
        echo ' ';
      } ?>
      <?php for($i = 1;$i <= $max_page; $i++){
    if($i === (int)$now_page){
    echo $now_page. '';
  } else {
    echo '<a href=\'/index.php?page='. $i.'\')>'. $i.'</a>'. ' ';
  } 
  }?>
  <?php if($now_page < $max_page){
    echo '<a href=\'/index.php?page='.($now_page + 1).'\')>次のページへ</a>';
  } else {
    echo ' ';
  } ?>
  <?php if($now_page < $max_page){
    echo '<a href=\'/index.php?page='.$max_page.'\')>最後のページへ</a>';
  } else {
    echo ' ';
  } ?>
  </div>
  </div>
</body>
</html>
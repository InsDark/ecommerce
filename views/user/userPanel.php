<section>
    <?php if(($_GET['subAction'] == 'panel')) :?>    
        <h1>What's up, <?= $_SESSION['identity']['user_name'] ?>?</h1>
        <p>Next it's the list of things you can do, choose one!!!</p>
    <?php endif; ?>
    <?php if(($_GET['subAction'] == 'orders')) :?>    
        <h1>What's up, <?= $_SESSION['identity']['user_name'] ?>?</h1>
        <p>Next it's the list of things you can do, choose one!!!</p>
    <?php endif; ?>
    <?php if(($_GET['subAction'] == 'cart'))   {
        if(count($_SESSION['cart']) > 0) {
            echo '<h1>Your Products on the Cart</h1>';
            $products = array_unique($_SESSION['cart']);
            foreach($products as $product) {
                $res = $this->db->query("SELECT * from products where product_id = $product")->fetch();?>
                <div class='cart-product'>
                    <h2><?=$res['product_model']?></h2>
                    <img src='<?=BASE_URL . 'src/pictures/products/' . $res['product_image']?>'>
                    <div class='product-details'>
                        <h3>$<?=$res['product_price']?></h3>
                        <p><?=$res['product_description']?></p>
                        <a href="<?=BASE_URL . 'order/make/' . $res['product_id'] ?>">Make Order</a>
                    </div>
                </div>
            <?php }
        } else {
            echo '<h1>You dont have products on your cart</h1>';
        }
    }?>
</section>
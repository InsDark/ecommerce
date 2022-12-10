<aside>
    <?php if(isset($_SESSION['identity']['user_rol']) && $_SESSION['identity']['user_rol'] == 1): ?>
        <a href="<?=BASE_URL . 'user/products/' ?>">List Products</a>
        <a href="<?=BASE_URL . 'user/brands/' ?>">List Brands</a>
        <a href="<?=BASE_URL . 'user/close/' ?>">Log Out</a>

    <?php endif; ?>
    <?php if(isset($_SESSION['identity']['user_rol']) && $_SESSION['identity']['user_rol'] == 2): ?>
        <a href="user/cart/">Cart</a>
        <a href="<?=BASE_URL?>user/close/">Log Out</a>
    <?php endif; ?>
    <?php if(!isset($_SESSION['identity']['user_rol'])) {
        require_once 'controllers/brandsController.php';
            $brand = new brandsController();
            $res =  $brand->getBrands();
        foreach ($res as $brand) : ?>
        <a href="brand/view/<?= $brand->brand_name ?>"><?= $brand->brand_name ?></a>
        <?php endforeach;
     }?>
</aside>
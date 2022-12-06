<aside>
    <h2>Brands Available</h2>
    <?php 
        foreach($brands as $brand) :?> 
            <a href="brand/<?= $brand->brand_name?>"><?=$brand->brand_name; ?></a>
        <?php endforeach; ?>
</aside>
<section>
    <?php if(($_GET['subAction'] == 'panel')) :?>    
        <h1>What's up, <?= $_SESSION['identity']['user_name'] ?>?</h1>
        <p>Next it's the list of things you can do, choose one!!!</p>
    <?php endif; ?>
    <?php if(($_GET['subAction'] == 'products')) :?>    
        <form action="<?=BASE_URL . 'products/addProduct/'?>" method='post' enctype='multipart/form-data'>
            <h2>Add a new Product</h2>

            <label for="product-brand"></label>
            <select name="product-brand">
                <option value="0">----Choose a brand-----</option>
                <?php foreach ($brands as $brand): ?>
                    <option value="<?=$brand->brand_id?>"><?=$brand->brand_name?></option>
                <?php endforeach; ?>  
            </select>

            <label for="product-model">Product Name:</label>
            <input type="text" name="product-model">

            <label for="product-image">Product Image:</label>
            <input type="file" name="product-image">

            <label for="product-price">Product Price:</label>
            <input type="number" min='0' name="product-price">

            <label for="product-stock">Product Stock:</label>
            <input type="number" min="0" name="product-stock">

            <label for="product-description">Product Description:</label>
            <textarea name="product-description"></textarea>

            <button>Add Product</button>
            
        </form>
        <div class="products-container">
            <h2>Products Available</h2>
            <div class='products-list'>
                <?php 
                function render($products) {
                    foreach ($products as $product) : ?>
                        <div class='product'>
                            <h3><?= $product['product_model']?></h3>
                            <img src="<?= BASE_URL ?>src/pictures/products/<?= $product['product_image']?>" alt="phone-img">
                            <div class='product-details'>
                                <h4>$ <?= $product['product_price']?></h4>
                                <h4> <?= $product['product_stock']?> Units</h4>
                                <p> <?= $product['product_description']?> Units</p>
                            </div>
                            <a href='<?=BASE_URL?>products/delete/<?= $product['product_id']?>'>Delete Product</a>
                        </div>
                <?php endforeach;}
                $res == false ? '<p>There is no available product</p>' : render($res);
                
                ?>
                
            </div>
        </div>
    <?php endif; ?>
        
    <?php if(($_GET['subAction'] == 'brands')) :?>
        <div class='brand-form'>
            <h2>Add a new Brand</h2>
            <form action="<?=BASE_URL . 'brands/addBrand/' ?>" method='post'>
                <label for='brand-name' for="">Brand Name:</label>
                <input type="text" name='brand-name'>
                <button type='submit'>Add Brand</button>
            </form>   
        </div>
        <div class='brands-list'>
            <h2>Current Brands</h2>
        <?php 
            foreach($brands as $brand) :?> 
            <h3 href="brand/<?= $brand->brand_name?>"><?=$brand->brand_name; ?><a href='<?php echo BASE_URL . 'brands/deleteBrand/' . $brand->brand_name; ?>'>Delete</a></h3>
        <?php endforeach; ?>
        </div> 
    <?php endif; ?>
</section>
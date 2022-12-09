<section>
    <?php if(($_GET['subAction'] == 'panel')) :?>    
        <h1>What's up, <?= $_SESSION['identity']['user_name'] ?>?</h1>
        <p>Next it's the list of things you can do, choose one!!!</p>
    <?php endif; ?>
        
    <?php if(($_GET['subAction'] == 'brands')) :?>
        <div class='brand-form'>
            <h2>Add a new Brand</h2>
            <form action="">
                <label for='brand-name' for="">Brand Name:</label>
                <input type="text" name='brand-name'>
                <button type='submit'>Add Brand</button>
            </form>   
        </div>
        <div class='brands-list'>
            <h2>Current Brands</h2>
        <?php 
            foreach($brands as $brand) :?> 
            <h3 href="brand/<?= $brand->brand_name?>"><?=$brand->brand_name; ?><button type="" =''>Delete</button></h3>
        <?php endforeach; ?>
        </div> 
    <?php endif; ?>
</section>
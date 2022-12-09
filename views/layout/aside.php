<aside>
    
    <?php if($_SESSION['identity']['user_rol'] == 1): ?>
        <a href="products">List Products</a>
        <a href="brands">List Brands</a>
        <a href="profile">Edit Profile</a>
        <a href="close">Log Out</a>

    <?php endif; ?>
    <?php if($_SESSION['identity']['user_rol'] == 2): ?>
        <a href="panel?act=products">List Products</a>
        <a href="panel?act=brands">List Brands</a>
        <a href="">Log Out</a>
    <?php endif; ?>
</aside>
<header>
        <img src="src/img/logo.png" alt="market-logo">
        <form action='product/'>
            <input name='product-name' type="text" placeholder="Find a product ...">
            <button type="submit"class="fa-solid fa-magnifying-glass"></button>
        </form>
        <div class='user-details'>
            <?php if(isset($_SESSION['user-identity'])) : ?>
                <img src="src/img/10-106881_icons-symbol-handset-iphone-transprent-png-free-phone.png" alt="user-img">
                <img src="src/img/10-106881_icons-symbol-handset-iphone-transprent-png-free-phone.png" alt="user-img">
            <?php endif; ?> 
            <?php if(!isset($_SESSION['user-identity'])) : ?>
                <a href="user/login"><i class='fa fa-user'></i>Login</a>
            <?php endif; ?> 
            
        </div>
    </header>
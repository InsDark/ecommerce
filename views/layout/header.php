<?php 
if(!isset($_SESSION)){
    session_start();
} ?>
<header>
        <img src="src/pictures/site/logo.png" alt="market-logo">
        <form action='product/'>
            <input name='product-name' type="text" placeholder="Find a product ...">
            <button type="submit"class="fa-solid fa-magnifying-glass"></button>
        </form>
        <div class='user-details'>
            <?php if(isset($_SESSION['identity'])) : ?>
                <img src="src\pictures\users\<?= $_SESSION['identity']['user_image']?>.jpg" alt="user-image">
                <a href='user/panel'>What's up, <?= $_SESSION['identity']['user_name']?>?</a>
            <?php endif; ?> 
            <?php if(!isset($_SESSION['identity'])) : ?>
                <a href="user/login"><i class='fa fa-user'></i>Login</a>
            <?php endif; ?> 
        </div>
    </header>
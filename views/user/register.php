<?php require_once 'views/layout/head.php' ?>
<?php require_once 'config/parameters.php' ?>
<?php if(!isset($_SESSION)) {
    session_start();
} ?>

<body>
    <main>
        <h1>Register</h1>
        <form method="post" enctype='multipart/form-data' action='<?php echo BASE_URL?>models/userModel.php?action=saveUser'>
            <label for="user-name" action='models/userModel.php'>Name: <span>
                <?php 
                    if(isset($_SESSION['errors']['user-error'])) {
                        echo($_SESSION['errors']['user-error']);
                    }
                    ?>
            </span></label>
            <input name="user-name" type="text"  value="<?php 
            if(isset($_POST['user-name'])){
                echo $_POST['user-name'];
            }?>">

            <label for="user-last-name">Last Name: <span>
                <?php 
                if(isset($_SESSION['errors']['last-name-error'])) {
                    echo($_SESSION['errors']['last-name-error']);
                    }?>
            </span></label>
            <input name="user-last-name" type="text" value="<?php 
            if(isset($_POST['user-last-name'])){
                echo $_POST['user-last-name'];
            }?>">

            <label for="user-image">Profile Image:<span>
                <?php 
                if(isset($_SESSION['errors']['image-error'])) {
                    echo($_SESSION['errors']['image-error']);
                }?>
            </span></label>
            <input name="user-image" type="file">

            <label for="user-email">Email: <span>
                <?php 
                if(isset($_SESSION['errors']['email-error'])) {
                    echo($_SESSION['errors']['email-error']);
                }?>
            </span></label>
            <input name='user-email' type="email"  value="<?php 
                if(isset($_POST['user-email'])){
                    echo $_POST['user-email'];
                }?>">

            <label for="user-password">Password: <span>
                <?php 
                if(isset($_SESSION['errors']['password-error'])) {
                    echo($_SESSION['errors']['password-error']);
                }?></label>
            <input name='user-password' type="password">
            <button>Register</button>
        </form>
    </main>
</body>
<?php require_once 'views/layout/head.php'?>
<?php if(!isset($_SESSION)) {session_start();} ?>
<body>
    <main>
        <h1>Login</h1>
        <form method="post" action='<?php echo BASE_URL?>models/userModel.php?action=loginUser'>             
            <label for="user-email">Email: 
                <?= 
                    isset($_SESSION['errors']['email-error']) ?  $_SESSION['errors']['email-error'] : null;
                ?>
            </label>
            <input name="user-email" type="email">

            <label for="user-password">Password: 
                <?= 
                    isset($_SESSION['errors']['password-error']) ?  $_SESSION['errors']['password-error'] : null;
                ?>
                </label>
            <input name='user-password' type="password">
            <button>Login</button>
        </form>
    </main>
</body>
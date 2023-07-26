<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='./styles/styles.css'> 
        <title>Login Page</title>
    </head>
    <body>
        <div class="title">
            <h2>Login</h2>
        </div>
        
        <form method="post" action="login.php" class="login">
            <?php include('errors.php'); ?>
            <div class="inputBox">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="inputBox">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div class="inputBox">
                <button type="submit" class="btn" name="login_usr">Login</button>
            </div>
            <p class="inputBox">Register <a href="./registration.php">Register</a></p>
        </form>
    </body>
</html>
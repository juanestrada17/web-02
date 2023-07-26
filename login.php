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
        <div>
            <h2>Login</h2>
        </div>
        
        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <button type="submit" class="btn" name="login_usr">Login</button>
            </div>
            <p>Register <a href="./registration.php">Register</a></p>
        </form>
    </body>
</html>
<!-- Executes the contents of server.php in the registration.php -->
<?php include('server.php') ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='./styles/styles.css'> 
        <title>Sign up</title>
    </head>
    <body>
        <div>
            <h1>Registration</h1>
        </div>
        <!--Sends the information from he form to the php using the action and the post method -->
        <form method="post" action="registration.php"> 

            <!-- Executes the contents of errors.php in the registration.php-->
            <?php include('errors.php'); ?>
            <div>
                <label for="username">Username</label>
                <!-- The value is set to the $username variable initialized from server.php, this allows it to
                    have a prefilled username-->
                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
            </div>

            <div>
                <lab for="email">Email</lab>
                <!-- The value is set to the $email variable initialized from server.php, this allows it to
                    have a prefilled email-->
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"> 
            </div>

            <div>
                <!--Submit button with a name to be used in the server.php--> 
                <button type="submit" class="sign" name='reg_user'>Sign up</button>
            </div>

            <p>Login <a href="./login.php">Login</a></p>

        </form>
    </body>
</html>
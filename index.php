<?php 
    // Starts the session 
    session_start(); 

// If a user is not logged in, sends a message
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

// If the logout is clicked, destroyed the session and unsets the username. Redirects to login 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href='./styles/styles.css'> 
    </head>
    <body>
        <div class="header">
            <h2>Home</h2>
        </div>
        Web dev assi two content
        <div class="content">
            <!-- notification message if the user is logged i-->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);?>
                </h3>
            </div>
            <?php endif ?>

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
            <?php endif ?>
        </div>
    </body>
</html>
<?php
// Starts the session
    session_start();

// Initialize the variables in the registration.php, we don't initialize the password for security concerns
$username = ""; 
$email = "";
$errors = array();

// Connect to the MySql database. 
// 1. the hostname-Ip address: In this case Localhost
// 2. the mysql username used to authenticate the connection: set to root. 
// 3. the mysql password
// 4. The name of the schema we try to access: music_schema is the name of the on created. 

$db = mysqli_connect('localhost', 'root', '', 'music_schema');

// Check if the email follows the correct pattern 
function validateUsername($username){
    $usernamePattern = '/^\S{1,20}$/';
    return preg_match($usernamePattern, $username);
}


function validatePassword($password){
    $passwordPattern = '/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{6,}/';
    return preg_match($passwordPattern, $password);
}

// If the submit button in the registration.php is clicked ('reg_user' is part of it)
if(isset($_POST['reg_user'])){
    // mysqli_real_escape_string takes two parameters. The db we are working on and the input. It makes it safe from sql injections
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_confirmation = mysqli_real_escape_string($db, $_POST['password_confirmation']);

    // if the username/email/password are empty, then push them into an array
    // username error
    if(!validateUsername($username)){
        array_push($errors, "User name should be non-empty, and within 20 characters long.");
    }

    // validate email 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Email address should be non-empty with the format xyz@xyz.xyz.');
    }

    // validate the password 
    if(!validatePassword($password)){
        array_push($errors, 'Password should be at least 6 characters: 1 uppercase, 1 lowercase.');
    }
    // if the password and the confirmation are not equal, push it into the array
    if($password != $password_confirmation){
        array_push($errors, "Passwords don't match");
    }

    // Validate the inputs from the user    
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    // Executes the query user_check_query against the server
    $result = mysqli_query($db, $user_check_query);
    // fetches a row of data from the result of the query  
    $user = mysqli_fetch_assoc($result);

    if($user) {
        // If it already exists, insert error into the array
        if($user['username'] === $username){
            array_push($errors, 'Username already exists');
        }

        if($user['email'] === $email){
            array_push($errors, 'Email already exists');
        } 
    }


    // INSERTS ONLY IF THE ERRORS ARE 0 

    if(count($errors) == 0){
        // the md5 hashes the password
        $password = md5($password);

        // Inserts a user if there are no errors
        $query = "INSERT INTO users (username, password, email) VALUES('$username', '$password', '$email')";
        mysqli_query($db, $query);
        //Current session login, connected to session_start
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        // The header redirects to the index.php
        header('location: index.php');
    }  
}

if(isset($_POST['login_usr'])){
    // RECIEVE input 
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)){
        array_push($errors, "Username is empty");
    }

    if (empty($password)){
        array_push($errors, "Password is empty");
    }

    if (count($errors) == 0){
        $password = md5($password);
        // SELECT username with specific password
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] ="You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

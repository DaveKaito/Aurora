<?php
//checks if user exists and password is correct
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 0) {
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: ../../private/shared/error.php");
} else {
    $user = $result->fetch_assoc();

    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
       

        //if user is logged in
        $_SESSION['logged_in'] = true;
        header("location: profile.php");
    } else {
        $_SESSION['message'] = "This is the wrong password!";
        header("location: ../../private/shared/error.php");
    }
}
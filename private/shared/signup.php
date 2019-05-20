<?php
//regestration process: insert user info in db > send email

//set session to be used on profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];

//escape all post variables against sql injections
$username = $mysqli->escape_string($_POST['username']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0, 1000)));

//check if user with email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

//if email exists row > 0
if ($result->num_rows > 0) {
    $_SESSION['message'] = $message = 'User with this email already exists!';
    
} else {
    //insert into db
    $sql = "INSERT INTO users (username, email, password, hash)" . "VALUES ('$username','$email','$password','$hash')";

    //add user
    if ($mysqli->query($sql)) {

        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] =
            "The conformation has been sent to $email, please verify by clicking on the link in the message";
            header("location: ../../public/pages/landing.php");

//send verifiation
        
}
}
<?php
session_start();
include_once "../../private/functions/db.php";
if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultset);
    $pw_verify = password_verify($password, $row['password']);
    if (($pw_verify) && ($row['is_admin'] === '1')) {
        echo "admin";
    } elseif ($pw_verify) {
        echo "ok";
        $_SESSION['user_session'] = $row['id'];
    } else {
        echo "nope";
    }
}

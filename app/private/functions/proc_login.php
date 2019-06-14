<?php
session_start();
require_once '../../init.php';
if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultset);
    $pw_verify = password_verify($password, $row['password']);
    if (($pw_verify) && ($row['is_admin'] === '1')) {
        echo "admin";
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        $_SESSION['is_admin'] = $row['is_admin'];
    } elseif ($pw_verify) {
        echo "ok";
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
    } else {
        echo "nope";
    }
}

<?php
session_start();
require_once '../../init.php';
if (isset($_POST['btn-save'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $hash_pw = password_hash($password, PASSWORD_BCRYPT);
    $sql = "SELECT email FROM users WHERE email='$email'";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultset);
    if (!$row['email']) {
        $sql = "INSERT INTO users(`id`, `username`, `password`, `email`,`is_user`) VALUES (NULL, '$username', '$hash_pw', '$email', '1')";
        mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn) . "qqq" . $sql);
        echo "registered";
    } else {
        echo "err";
    }
}
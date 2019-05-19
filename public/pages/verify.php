<?php require_once '../../private/initialize.php';

include PUBLIC_PATH . '/shared/pub_header.php';

session_start();

if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ($result->num_rows == 0) {
        $_SESSION['message'] = "Account has already been activated!";
        header("location: error.php");
    } else {
        $_SESSION['message'] = "Your account has been activated!";

        //set user status to active
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;

        header("location: success.php");
    }
} else {
    $_SESSION['message'] = "Sorry something went wrong";
    header("location: error.php");
}

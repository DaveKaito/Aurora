<?php
require_once '../../init.php';
//delete content based on the id they parse to the url from dashboard.php
$did = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "SELECT title FROM blog WHERE id = '$did'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $delBlog = '../articles/' . $title . '.txt';
    if (file_exists($delBlog)) {
        unlink($delBlog);
    }

}
if (isset($_GET['id'])) {
    $sql = " DELETE FROM blog WHERE id = '$did' ";
    mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}

header('location:' . PRIV_ROOT . '/dashboard.php');
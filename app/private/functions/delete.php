<?php
require_once '../../init.php';
/*delete blogcontent based on the id that is parsed to the url from dashboard.php
i know its not really safe but let's be honest none of this is ^^ PDO ftw

did = deleteid
in the first step i delete the corresponding stuff from the blogfolder
and in the second step i delete the db stuff
 */
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
exit();
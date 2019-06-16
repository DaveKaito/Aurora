<?php
// definition of urls
define('BASE_URL', 'http://localhost/Aurora'); // base url
define('APP_ROOT', __DIR__); //aurora root
define('SHARED_ROOT', APP_ROOT . '/public/shared'); //root to shared folder
define('PAGES_ROOT', BASE_URL . '/app/public/pages'); // root to pages folder
define('FUNC_ROOT', BASE_URL . '/app/private/functions'); // root to functions
define('PRIV_ROOT', BASE_URL . '/app/private'); // root to functions
define('MDB_ROOT', BASE_URL . '/assets/mdb'); // root to MDB Assets
define('ASSETS_ROOT', BASE_URL . '/assets'); // root to my Assets
define('HOME_PATH', '/Aurora/app/public/pages'); // root for the logout

//Database connection start
$servername = "localhost";
$username = "Marc";
$password = "123";
$dbname = "aurora";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//escape
function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
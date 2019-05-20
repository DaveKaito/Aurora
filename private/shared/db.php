<?php

$host = 'localhost';
$user = 'marc';
$pass = 'test123';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
<?php

$host = 'localhost';
$user = 'Marc';
$pass = 'test_test';
$db = 'aurora';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
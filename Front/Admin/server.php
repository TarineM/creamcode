<?php

$host = "localhost"; /* Host name */
$user = "tarine"; /* User */
$password = "tarinecreamcode"; /* Password */
$dbname = "creamcode"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$con->set_charset("utf8");
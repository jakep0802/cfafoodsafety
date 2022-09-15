<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ecosure2022!');
define('DB_NAME', 'cfa_foodsafety');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false) {
    die("ERROR: Could not connect to database. (" . mysqli_connect_error() . ")");
}
?>
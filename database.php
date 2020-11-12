<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'admin');
define('DB_PASS', 'Option123');
define('DB_NAME', 'subscribers');

$conn = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);


if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>
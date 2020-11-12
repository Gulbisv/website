<?php
include_once "Model/Database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$db = new Database();

$email = mysqli_real_escape_string($db->getConnection(), $_POST['email']);

$result = $db->query("SELECT * FROM subscribers WHERE email = '$email'");

$num = mysqli_num_rows($result);

$exists = $msg  = '';

if ($num == 1) {
    $exists = 'Email address already subscribed';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'Please provide a valid e-mail address';
} else if (substr($email,strlen($email)-3,strlen($email))=='.co') {
    $msg = 'We are not accepting subscriptions from Columbia email';
} else if ($_POST['terms']!=1) {
    $msg = 'You must accept the terms and conditions';
} else {
    $db->query( "INSERT INTO subscribers (email) VALUES ('$email')");
    header("Location: ../website/subscribed.php");
}



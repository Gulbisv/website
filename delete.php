<?php
include_once 'Model/Database.php';
$id = $_GET['id'];
$db = new Database();

if ($db->query("DELETE FROM subscribers WHERE id = $id")) {
    header('Location: db_display.php');
    exit;
} else {
    echo "Error deleting record";
}
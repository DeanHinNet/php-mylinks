<?php
session_start();
require('new-connection.php');

$query = "SELECT * FROM links";
$all_entries = fetch_all($query);
$_SESSION['entries'] = $all_entries;

$query = "SELECT * FROM categories";
$all_categories = fetch_all($query);
$_SESSION['categories'] = $all_categories;

header('location: index.php');
exit();

?>
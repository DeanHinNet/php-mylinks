<?php
session_start();

require('new-connection.php');

$query ="DELETE FROM links WHERE id = {$_GET['id']}";

run_mysql_query($query);

$query = "SELECT * FROM links";

$all_entries = fetch_all($query);
$_SESSION['entries'] = $all_entries;
header('location: index.php');
exit();
		
header('location: index.php');
exit();

?>
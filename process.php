<?php
session_start();
require('new-connection.php');

//$query returns the id number. Add id to categories.
//categories is an array of categories
//Add multiple exsting catogeries. Add multiple new categories.

//[] Validate it's a proper submission with hidden
//[] Validate the entries
//[] If errors, return to user for corrections
//[] If no errors, [] Add to database

//sanitize each $_POST entry
foreach($_POST as $key => $value)
{
	$value = escape_this_string($value);e
}

//Check for proper form submission.
if(isset($_POST['action']) && $_POST['action'] == 'add_entry')
{
	//Check each field for correct criteria.
	foreach($_POST as $name => $value)
	{
		if(empty($value))
		{
			$_SESSION['errors'][$name] = $name . ' cannot be blank!';
			//$_SESSION['entry_kickback'][$name] = "";
		}

	}

	//If no errors were recorded.
	if(isset($_SESSION['errors']))
	{
		header('location: index.php');
		exit();
	}
	else
	{
		$query = "INSERT INTO links (description, url, created_at, updated_at, notes) 
VALUES ('{$_POST['description']}', '{$_POST['url']}', NOW(), NOW(), '{$_POST['notes']}')
";
		$query_id = run_mysql_query($query);

		$query = "SELECT * FROM links";

		$all_entries = fetch_all($query);
		$_SESSION['entries'] = $all_entries;
		header('location: index.php');
		exit();
	}
}

?>
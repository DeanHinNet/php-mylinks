<?php
session_start();

?>
<html>
<head>
	<title>Welcome to Shortcuts! Leave a link! Take a link!</title>
</head>
<body>
	<h1>Welcome to Shortcuts!</h1>
	<form action='process.php' method='post'>
		<section>
			<label for='url'>Url</label>
			<input type='text' name='url' id='url' placeholder='Please enter your link!'>
		</section>
		<section>
			<input type='hidden' name='action' value='add_url'>
			<input type='submit' value='Add Your Link!'>
		</section>
	</form>
	<div id='all_links'>
		<?php
		?>
	</div>
</body>
</html>
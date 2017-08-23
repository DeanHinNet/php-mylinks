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
			<label for='description'>Description</label>
			<input type='text' name='description' id='description' placeholder='What is this link ALL about?'>
		</section>
		<section>
			<label for='url'>Url</label>
			<input type='text' name='url' id='url' placeholder='Please enter your link!'>
		</section>
		<section>
			<label for='category'>Categories {checkbox}</label>
			<input type='text' name='category' id='category' placeholder="What's this related to?">
		</section>
		<section>
			<label for='notes'>Notes</label>
			<input type='text' name='notes' id='notes' placeholder='Something about this...'>
		</section>
		<section>
			<input type='hidden' name='action' value='add_entry'>
			<input type='submit' value='Add Your Link!'>
		</section>
	</form>
	<div id='all_links'>
		<table>
			<thead>
				<tr>
					<th>Description</th>
					<th>Link</th>
					<th>Date Added</th>
					<th>Categories</th>
					<th>Notes</th>
					<th>Actions</th>
				</tr>
			</thead>
		<?php
			if(isset($_SESSION['entries']))
			{
				foreach($_SESSION['entries'] as $entry)
				{
					echo '<tr>';
						echo '<td>' . $entry['description'] . '</td>';
						echo "<td><a href='" . $entry['url'] . "' target='_blank'>" . $entry['url'] . "</a></td>";
						echo '<td>' . $entry['created_at'] . '</td>';
						echo '<td>coming soon...</td>';
						echo '<td>' . $entry['notes'] . '</td>';
						echo "<td><a href='delete.php?id=" . $entry['id']."'>Delete</a></td>";
					echo '</tr>';
				}
			}
		?>
		</table>
	</div>
</body>
</html>
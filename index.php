<?php
session_start();

?>
<html>
<head>
	<title>Welcome to Shortcuts! Leave a link! Take a link!</title>
	<style>
		.category {
			text-transform: capitalize;
		}
		label {
			display: block;
		}
		section {
			display: inline-block;
			vertical-align: top;
			padding-right: 5px;
		}
		#link_info {
		}
		#submit {
			vertical-align: 80%;
		}
	</style>
</head>
<body>
	<h1>Welcome to Shortcuts!</h1>
	<form action='process.php' method='post' id='link_info'>
		<section>
			<label for='description'>Description</label>
			<input type='text' name='description' id='description' placeholder='What is this link ALL about?'>
		</section>
		<section>
			<label for='url'>Url</label>
			<input type='text' name='url' id='url' placeholder='Please enter your link!'>
		</section>
		<section>
			<label for='category'>Categories</label>
			<input type='text' name='category[]' id='category' placeholder="New Categories, separated by commas.">
			<div class='current_categories'>
				<?php
					if(isset($_SESSION['categories']))
					{
						foreach($_SESSION['categories'] as $category)
						{
							echo "<input class='category' type='checkbox' name='category_id[]' value='" . $category['id'] . 
							"'>".$category['category']."";

						}
					}
				?>
			</div>
		</section>

		<section>
			<label for='notes'>Notes</label>
			<input type='text' name='notes' id='notes' placeholder='Something about this...'>
		</section>
		<section id='submit'>
			<input type='hidden' name='action' value='add_entry'>
			<input type='submit' value='Add Your Link!'>
		</section>
	</form>

	<form action='display.php' method='post'>
		<input type='hidden' name='action' value='show_entries'>
		<input type='submit' value='Show Links!'>
	</form>

	<a href='logoff.php'>Log Off</a>

	<div id='all_links'>
		<table>
			<thead>
				<tr>
					<th>Description</th>
					<th>Link</th>
					<th>Date Added</th>
					<th>Categories</th>
					<th>Notes</th>
					<?php
						if(isset($_SESSION['user']) && $_SESSION['user'] == 'admin'){
							echo "<th>Actions</th>";
						}
					?>
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
						if(isset($_SESSION['user']) && $_SESSION['user'] == 'admin'){
							echo "<td><a href='delete.php?id=" . $entry['id']."'>Delete</a></td>";
						}
					echo '</tr>';
				}
			}
		?>
		</table>
	</div>
</body>
</html>
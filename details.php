<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>House Rental</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
	    <?php include 'Header.php'; ?>
		<?php include 'login_form.php'; ?>

		<main>
			<section id="new-post">
				<h2>Add a Property</h2>
				<form id="post-form">
					<input type="text" id="title" placeholder="Title" required />
					<textarea
						id="description"
						placeholder="Description"
						required
					></textarea>
					<input type="url" id="image" placeholder="Image URL" required />
					<button type="submit">Post</button>
				</form>
			</section>
		</main>

		<script src="script.js"></script>
	</body>
</html>

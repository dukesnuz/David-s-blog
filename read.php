<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		require ('./includes/config.inc.php');
		?>
		<title>Read the stories | <?php echo TITLE; ?></title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="David Petringa">

		<?php
		include ('./includes/head.inc.html');
		?>
	</head>
	<body>
		<div class = "wrapper">
			<header>
				<?php
				include ('./includes/header.inc.php');
				?>
			</header>
			<?php
			require (MYSQL);

			$location = "read_aside";
			include (BLOG);

			$location = "read";
			include (BLOG);
			?>

			<footer>
				<?php
				include ('./includes/footer.inc.php');
				?>
			</footer>
		</div>
		<?php
		include ('./includes/statcounter.inc.html');
		?>
	</body>
</html>
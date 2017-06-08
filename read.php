<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		require ('./includes/config.inc.php');
		?>
		<title>Read the stories | <?php echo TITLE; ?></title>
		<meta charset="UTF-8">
		<meta name="description" content="I wanted to code a website and practice using PHP and MySQL for the backend. This is the end result.">
		<meta name="keywords" content="David Petringa, MySQL, PHP, Front end, Back end, HTML, CSS, website development.">
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
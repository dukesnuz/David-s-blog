<?php
//Grab all the catagories

$qm = "SELECT title, date_created, blog_id, DATE_FORMAT(date_created, '%M') AS month, DATE_FORMAT(date_created, '%Y') AS year from blog
	   WHERE status ='true'
	   AND
	   html_type = 'Plain_text'
	   Group BY MONTH(date_created)
	   HAVING COUNT(*) > 0
	   ORDER BY date_created DESC";
$r = mysqli_query($dbc, $qm);

//get list of posts filtered by month and year in list form on home page
if ($location === "aside_home") {

	if (mysqli_num_rows($r) > 0) {
		$display_string = "<aside>";

		$display_string .= "<ul>";
		$display_string .= "<li><a href='./read.php?title=welcome-to-my-blog'>ABOUT</a></li>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			//$display_string2 .= "<li>$row[month_year]</li>";
			$month = strtolower(trim(str_replace(" ", "", $row['month'])));
			$year = trim(str_replace(" ", "", $row['year']));
			$display_string .= "<li><a href='./index.php?month=$month&year=$year'> $row[month] $row[year]</a>";
			//$display_string2 .= "<br>$row[date_created]</li>";
		}
		$display_string .= "</ul>";

		$display_string .= "</aside>";

		echo $display_string;
	} else {
		$display_string = "<section class ='blogs'>";
		$display_string .= "<header>";
		$display_string .= "</header>";
		$display_string .= "<h3 class='error'>OOOpppsss! System error. Something has gone haywire. We apologize.</h3>";
		$display_string .= "</section>";

		echo $display_string;
	}
}
//get list of post filtered by month and year posted
if (isset($_GET['month']) && isset($_GET['year'])) {
	$month = $_GET['month'];
	$year = $_GET['year'];
	$q1 = "SELECT title, DATE_FORMAT(date_created, '%M %d, %Y') AS date, blog_id FROM blog 
		WHERE DATE_FORMAT(date_created, '%M') = '$month'
		AND
		DATE_FORMAT(date_created, '%Y') = '$year'
		AND 
		html_type = 'Plain_text'";

	$r1 = mysqli_query($dbc, $q1);

	if ($location === "content") {

		if (mysqli_num_rows($r1) > 0) {
			$display_string1 = "<aside class='content_list'>";
			$display_string1 .= "<header>";
			$display_string1 .= "<h3>$month&nbsp;$year</h3>";
			$display_string1 .= "</header>";
			$display_string1 .= "<ul>";
			while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
				$title = strtolower(trim(str_replace(" ", "-", $row['title'])));
				$display_string1 .= "<li><a href='./read.php?title=$title' target='read'>$row[title]</a>";
				$display_string1 .= "<br><span class='posted_date'>Posted: $row[date]</span></li>";

			}
			$display_string1 .= "</ul>";
			$display_string1 .= "</aside>";

			echo $display_string1;

		} else {
			$display_string1 = "<section class ='blogs'>";
			$display_string1 .= "<header>";
			$display_string1 .= "</header>";
			$display_string1 .= "<h3 class='error'>OOOpppsss! System error. Something has gone haywire. We apologize.</h3>";
			$display_string1 .= "</section>";

			echo $display_string1;
		}

	}

}
//get entire post
if (isset($_GET['title'])) {
	$title = $_GET['title'];

	$q1 = "SELECT title, html, DATE_FORMAT(date_created, '%M %d, %Y') AS date 
	     FROM blog
		  WHERE
		  REPLACE(TRIM(title),' ' , '-') = '$title'
		  AND 
		  html_type = 'Plain_text' ";

	$r2 = mysqli_query($dbc, $q1);

	if ($location === "read") {

		if (mysqli_num_rows($r2) > 0) {
			$row = mysqli_fetch_assoc($r2);
			$display_string2 = "<section class ='blogs'>";
			$display_string2 .= "<header>";
			$display_string2 .= "<h3>$row[title]</h3>";
			$display_string2 .= "</header>";
			$display_string2 .= "<p>$row[html]</p>";
		    $display_string2 .= "<p class='posted_date'>Posted: $row[date]</p>";
			$display_string2 .= "</section>";

			echo $display_string2;

		} else {
			$display_string2 = "<section class ='blogs'>";
			$display_string2 .= "<header>";
			$display_string2 .= "</header>";
			$display_string2 .= "<h3 class='error'>OOOpppsss! System error. Something has gone haywire. We apologize.</h3>";
			$display_string2 .= "</section>";

			echo $display_string2;
		}
	}

}

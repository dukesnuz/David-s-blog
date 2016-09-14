<ul>
	<li>
		<?php echo CODER; ?>
	</li>
	<li>
		<?php echo VIEW_CODE; ?>
	</li>
	<li>
		<a href='./read.php?title=welcome-to-my-blog'>ABOUT</a>
	</li>
	<li>
		<?php echo CONTACT; ?>
	</li>
</ul>
<?php
//get currebt year
$now = new DateTime();
echo '
<p>
&copy;' . $now -> format('Y') . ' &nbsp; &#124; &nbsp; Made in USA
</p>';
?>
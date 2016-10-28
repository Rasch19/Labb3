<?php

	
	if($_POST['password'] != 'hemlis') {
		print("<script type='text/javascript'>alert('Wrong password, try again!'); window.location.href= 'createpost.html';</script>");
	}
	else {
		$blogfile = fopen("blog.txt", "r+");
		
		$author = $_POST['author'];
		$heading = $_POST['heading'];
		$entry = $_POST['entry'];
		
		$timestamp = '<i class="timestamp">' . date("Y-m-d H:i:s") . '</i>';
		$authorstring = '<i class="author">' . $author . '</i>';
		$headingstring = '<h3 class="heading">' . $heading . '</h3>';
		$entrystring = '<p class="entry">' . $entry . '</p>';
		
		$metastring = '<div class="metadata">' . $authorstring . $timestamp . '</div>';
		
		$newstring = '<div class="content">' . $headingstring . $metastring . $entrystring . '</div>';
		
		$readstring = fread($blogfile, filesize("blog.txt"));
		fclose($blogfile);
		$string = $newstring . $readstring;
		
		$blogwrite = fopen("blog.txt", w);
		fwrite($blogwrite, $string);
		fclose($blogwrite);
		
		print("<script type='text/javascript'>alert('Post saved!'); window.location.href= 'blog.php';</script>");
		
	}	
?>
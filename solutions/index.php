<?php 
	
	$path = "Location:http://";

	$path .= $_SERVER['SERVER_NAME'];

	if ($_SERVER['SERVER_PORT'] != "80") {
		$path .= ":";
		$path .= $_SERVER['SERVER_PORT'];
	}

	$path .= "/solutions/attract-better-candidates";

	header($path);

?>

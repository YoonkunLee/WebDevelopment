<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Perfect Palindrome functions</title>
</head>
<body>
	<h1>Web Development - Lab 3</h1>
	<?php
		$input = $_POST["input"];
		$revInput = strrev($_POST["input"]);
		
		echo $input, "<br>";
		
		echo $revInput;
		
		if(strcmp($input, $revInput)){
			echo "<p>Your input ", $input, " is not palindrome</p>";
		}
		else{
			echo "<p>Your input ", $input, " is perfect palindrome</p>";
		}
	?>
</body>
</html>
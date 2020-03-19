<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Stand Palindrome functions</title>
</head>
<body>
	<h1>Web Development - Lab 3</h1>
	<?php
	if(isset($_POST["input"])){
		$str=$_POST["input"];
		$reverse="";
		if(!is_numeric($str)){
			$str=preg_replace('/[^A-Za-z0-9]+/i',"",$str);
			echo "<p>String without punctuation is: ", $str,"</p>";
			$reverse=strrev($str);
			if($str==$reverse){
				echo "<p>A standard palindrome!</p>";
			}
			else{
				echo "<p>Not a standard palindrome.</p>";
			}
		}
	}
?>
</body>
</html>
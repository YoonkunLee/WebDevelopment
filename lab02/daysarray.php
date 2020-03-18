<html>
<head>
<title>Array</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	$days = array (
		"Sunday",
		"Monday",
		"Tuesday",
		"Wednesday",
		"Thursday",
		"Friday",
		"Saturday"
	);
	
	echo "The Days of the week in English are : "	
	foreach($days as $x){
		echo $x ,  ",";
	}
?>
</body>
</html>
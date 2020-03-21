<html>
<head>
	<title>Index page</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
</head>
<body>
	<h1> Status Posting System</h1>	
	<form action ="poststatusprocess.php"  method = "post" >
		<label>Status Code (required): <input type="text" name="statusCode"></label><br>
		<label>Status (required): <input type="text" name="status"></label><br>
		<label>Share: 
			<input type="radio" name="share" id="public" value="1">
			<label for="public">Public</label>
			<input type="radio" name="share" id="freinds" value="2">
			<label for="freiends">Freiends</label>
			<input type="radio" name="share" id="onlyme" value="3">
			<label for="onlyme">Only Me</label>
		</label><br>
		<label>Date: <input type="date" name="date" value="<?php echo date('Y-m-d');?>"></label><br>
		<label>Permission Type: 
			<input type="checkbox" name="permissiontype" id="allowLike" value="1">
			<label for="allowLike">Allow Like</label>
			<input type="checkbox" name="permissiontype" id="allowComment" value="2">
			<label for="allowComment">Allow Comment</label>
			<input type="checkbox" name="permissiontype" id="allowShare" value="3">
			<label for="allowShare">Allow Share</label>
		</label><br><br>
		<input type="submit" value="Post">
		<input type="reset" value="Reset"><br>
		<a href="./index.html">Return to Home Page</a>
	</form>
<?php
	
?>
</body>
</html>
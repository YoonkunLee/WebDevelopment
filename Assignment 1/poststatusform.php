<html>
<head>
	<title>Index page</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
</head>
<body>
	<h1> Status Posting System</h1>	
	<form action ="poststatusprocess.php"  method = "post" >
		<div class="form-group">
			<label>Status Code (required): <input type="text" name="statusCode"></label><br>
			<label>Status (required): <input type="text" name="status"></label><br>
			<label>Share: 
				<label class="radio-inline"><input type="radio" name="share" id="public" value="Public" checked>Public</label>
				<label class="radio-inline"><input type="radio" name="share" id="freinds" value="Freinds">Freiends</label>
				<label class="radio-inline"><input type="radio" name="share" id="onlyme" value="Only Me">Only Me</label>
			</label><br>
			<label>Date: <input type="date" name="date" value="<?php echo date('Y-m-d');?>"></label><br>
			<label>Permission Type: 
				<input type="checkbox" name="permissiontype[]" id="allowLike" value="Allow Like">
				<label for="allowLike">Allow Like</label>
				<input type="checkbox" name="permissiontype[]" id="allowComment" value="Allow Comment">
				<label for="allowComment">Allow Comment</label>
				<input type="checkbox" name="permissiontype[]" id="allowShare" value="Allow Share">
				<label for="allowShare">Allow Share</label>
			</label><br><br>
			<input type="submit" value="Post">
			<input type="reset" value="Reset"><br>
			<a href="./index.html">Return to Home Page</a>
		</div>		
	</form>
<?php
	
?>
</body>
</html>
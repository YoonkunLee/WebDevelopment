<!--
	This page is using POST method that when submit button is clicked, all input field's value is going to poststatusprocess.php
	One of input field 'Date' value is set by current date time but it can be change by user.
	This page has 3 different buttons which are 'Post' that submit all input field, 'Reset' that reset all current user input as a default and 'Return to Home' button that user can go back to index page
-->
<html>
<head>
	<title>Index page</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1> Status Posting System</h1>	
	</br>
	<form class="font-weight-bold" action ="poststatusprocess.php" method = "POST" >
		<div class="form-group row">
			<label for="statusCode" class="col-sm-3 col-form-label">Status Code (required):</label> 
			<div class="col-sm-9">
				<input class="form-control" type="text" id="statusCode" name="statusCode" placeholder="Enter unique 5 digit code">
			</div>
		</div>	
		<div class="form-group row">
			<label for="status" class="col-sm-3 col-form-label">Status (required):</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" id="status" name="status" placeholder="Enter Status">
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label class="col-form-label col-sm-3 pt-0" for="share">Share</label>
				<div class="col-sm-9">
					<div class="form-check">
					<input class="form-check-input" type="radio" name="share" id="public" value="Public" checked>
					<label class="form-check-label" for="public">
						Public
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="share" id="freinds" value="Freinds">
					<label class="form-check-label" for="freinds">
						Freinds
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="radio" name="share" id="onlyme" value="Only Me">
					<label class="form-check-label" for="onlyme">
						Only Me
					</label>
					</div>
				</div>
			</div>
		</div>		
		<div class="form-group row">	
			<label class="col-form-label col-sm-3">Date: </label>
			<div class="col-sm-9">
				<input type="date" name="date" value="<?php echo date('Y-m-d');?>">
			</div>
		</div>
		<div class="form-group">
			<div class="row"> 
				<label class="col-form-label col-sm-3 pt-0" for="permissiontype[]">Permission Type:</label>
				<div class="col-sm-9">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="permissiontype[]" id="allowLike" value="Allow Like">
						<label class="form-check-label" for="allowLike">
							Allow Like
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="permissiontype[]" id="allowComment" value="Allow Comment">
						<label class="form-check-label" for="allowComment">
							Allow Commnet
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="permissiontype[]" id="allowShare" value="Allow Share">
						<label class="form-check-label" for="allowShare">
							Allow Share
						</label>
					</div>
				</div>
			</div>
			</br>		
		</div class="form-group">
		<div>
			<input class="btn btn-primary" type="submit" value="Post">
			<input class="btn btn-danger" type="reset" value="Reset">			
			<div class="returnToHome"><a class="btn btn-outline-info" href="./index.html">Return To Home</a></div>
		</div>
	</div>
	</form>
</body>
</html>
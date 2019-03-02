<html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style>
.form_div{
	margin-top: 100px;
	border: 1px solid white;
	background-color: white;
}
</style>

<body>


<div class="container-fluid">
	<div class="row">
  		<div class="col-sm-4"></div>
  		<div class="col-sm-4 form_div">
  			<div style="text-align: center">LOGIN</div>
  			<br><br>
  			<form action="login_user.php" method="post">
			<div class="form-group">
      			<label for="usr">Username</label>
      		<input type="text" class="form-control" name="username">
  			</div>
  			<div class="form-group">
      			<label for="usr">Password</label>
      		<input type="password" class="form-control" name="password">
  			</div>
  			<br>
  			<input type="submit" class="btn btn-success" value="Submit">
			</form>
			<br>
			<div style="text-align: center"><a href="signup.php">Click here to Join</a></div>
  		</div>
  		<div class="col-sm-4"></div>
	</div>
</div>

</body>

</html>
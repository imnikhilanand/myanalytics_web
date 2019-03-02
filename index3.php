<!DOCTYPE html>
<html>


<?php

// Connection file 
include 'conn.php';
//////////

if(!isset($_SESSION["user_id_session"])){
	header("Location: index.php");
	die();
}

$_SESSION["question_var"] = 0;
?>

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>

<style>

body{
	text-align: center;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;;
}

.topic_box{
	margin:auto;
	border: 1px solid #f9f9f9;
	padding: 10px 10px 10px 10px;
	text-align: left;
	width:1000px;
	margin-top: 100px;
	border-radius: 5px;
	padding:20px 30px 20px 30px;
	background-color: #f9f9f9;
	box-shadow: 5px 5px 5px #888888;
	cursor: pointer;
}


</style>


<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="analysis.php"><span class="glyphicon glyphicon-user"></span><?php echo " ".$_SESSION["user_name_session"]; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>


<?php 
$sql="SELECT * FROM test_set ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$id=$row["id"];
		$name=$row["name"];
		$desc=$row["description"];
		$time=$row["time"];
	

?>
<a href="index2.php?test_set_id=<?php echo $id;?>">
<div class="topic_box" id="ques" >

<?php 
echo "Topic : ".$name;
echo "<br>";
echo "Description : ".$desc;
echo "<br>";
echo "Time : ".$time;
?>

</div>
</a>

<?php 
	}
}
?>


</body>
</html>


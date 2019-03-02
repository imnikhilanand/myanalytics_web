<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

<?php

include "conn.php";

$sql1 = "SELECT * FROM user ORDER BY id DESC";
$result1 = mysqli_query($conn,$sql1);
if(!$result1){
	die(mysqli_error($conn));
}
echo "<b>NAME</b> - ";
echo "<b>USERNAME</b>";
echo "<br>";
if(mysqli_num_rows($result1)>0){
	while($row1=mysqli_fetch_assoc($result1)){
		echo $row1["name"]." - ";
		echo $row1["username"];
		echo "<br>";
	}
}

?>


</body>
</html>

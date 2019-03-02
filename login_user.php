<?php 

// Connection file 
include 'conn.php';
//////////

$username=$_POST["username"];
$password=$_POST["password"];
$sql="SELECT * FROM user WHERE  `username` = '$username' AND `password`='$password' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$user_id=$row["id"];
		$_SESSION["user_id_session"]=$user_id;	
		$_SESSION["user_name_session"]=$row["name"];

	}
}else{
	header("Location: index.php");
	die();
}
header("Location: index3.php");
die();
?>

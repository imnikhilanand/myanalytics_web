<?php 

// Connection file 
include 'conn.php';
//////////

$username=$_POST["username"];
$password=$_POST["password"];
echo $sql="SELECT * FROM test.admin_user WHERE  `username` = '$username' AND `password`='$password' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		echo $admin_id=$row["id"];
		$_SESSION["admin_id"]=$admin_id;									
	}
}else{
	header("Location: index.php");
	die();
}
header("Location: front.php");
die();
?>

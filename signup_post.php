<?php
// Connection file 
include 'conn.php';
//////////

$name=$_POST["name"];
$username=$_POST["username"];
$password=$_POST["password"];

echo $sql="INSERT INTO test.user (`name`,`username`,`password`) VALUES ('$name','$username','$password')";
$result=mysqli_query($conn,$sql);

header("Location: index.php");
die();

?>
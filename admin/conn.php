<?php
session_start();
@$_SESSION["admin_id"];
$conn = mysqli_connect("localhost","root","","test");
if(!$conn){
	echo "Server not responding";
}

?>
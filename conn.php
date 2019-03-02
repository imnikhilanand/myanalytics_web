<?php
session_start();
@$_SESSION["user_id_session"];
$conn = mysqli_connect("localhost","root","","test");
if(!$conn){
	echo "Server not responding";
}
?>
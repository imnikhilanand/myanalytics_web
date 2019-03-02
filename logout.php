<?php

// Connection file 
include 'conn.php';
//////////

unset($_SESSION["user_id_session"]);
unset($_SESSION["user_name_session"]);

session_destroy ();

header("Location: index.php");
die();

	
?>
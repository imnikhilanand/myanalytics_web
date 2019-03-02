<?php

// Connection file 
include 'conn.php';
//////////

echo "Hello ".$_SESSION["admin_id"];

?>

<body>

<ul>
	<a href="add_questions.php"><li>Add Questions</li></a>
	<a href="users.php"><li>Users</li></a>

</ul>



</body>
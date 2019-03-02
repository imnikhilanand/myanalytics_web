<?php
$var1 = $_GET["data_num"];
$conn = mysqli_connect("localhost","root","","test");
if(!$conn){
	echo "Server not responding";
}

$sql="SELECT * FROM `questions` ORDER BY `id` DESC LIMIT $var1,5";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		echo "<h1>".$ques=$row["question"]."</h1>";
		echo "<br>";
	}
	echo "<hr>";
}

?>
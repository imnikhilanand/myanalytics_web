<?php

// Connection file 
include 'conn.php';
//////////

@$user_id = @$_SESSION["user_id_session"];
echo "Hello ".@$_SESSION["user_name_session"];

?>

<html>


<style>
body{
	text-align: center;
	font-family: "Times New Roman", Times, serif;
}
.ques_box{
	margin:auto;
	border: 1px solid #f9f9f9;
	padding: 10px 10px 10px 10px;
	text-align: center;
	width:1000px;
	margin-top: 100px;
	border-radius: 5px;
	padding:20px 30px 20px 30px;
	background-color: #f9f9f9;
	box-shadow: 5px 5px 5px #888888;
}

</style>
<body>

<div class="ques_box">
<font size="5">Ananlysis of Student's performance</font>
<br>

<svg height="210" width="500" style="margin-top: -150px">

<?php
	
	$sql3="SELECT * FROM test.subject ORDER BY id";
	$result3=mysqli_query($conn,$sql3);
	while($row3=mysqli_fetch_array($result3)){
	$id=$row3["id"];
	$name=$row3["name"];
	$sql2="SELECT * FROM test.questions WHERE `subject` = '$id' ";
	$result2=mysqli_query($conn,$sql2);
	$no_of_ques=mysqli_num_rows($result2);
	$sql1="SELECT * FROM test.correct WHERE `user_id`='$user_id' AND `sub_id`='$id'";
	$result1=mysqli_query($conn,$sql1);
	$no_of_attempt=mysqli_num_rows($result1);
	$sql0="SELECT * FROM test.correct WHERE `user_id`='$user_id' AND `sub_id`='$id' AND `correct`='1'";
	$result0=mysqli_query($conn,$sql0);
	$no_of_correct=mysqli_num_rows($result0);
	
	
?>

	<p style="color: #0f323e;font-size: 18px; padding-left: 10px">Subject : <font color="black"><?php echo $name;?></p>
	<span style="color:#0f323e;margin-right:6px;padding-left: 10px;font-size: 17">Score : <font color="black"><?php echo "Marks";?></font></span>
	
	<svg height="10%" width="100%" style="margin-top: 15px">
	<rect x="12%" y="10" width="85%" height="15" style="fill:#e6e6e6;" />
	<rect x="12%" y="10" width="<?php echo $no_of_correct/$no_of_attempt*85;?>%" height="15" style="fill:#1ab2ff;" />
	<text x="1%" y="22" font-size="17" fill="#0f323e">Accuracy</text>
	</svg>

	<svg height="10%" width="100%" style="margin-top: -30px">
	<rect x="12%" y="10" width="85%" height="15" style="fill:#e6e6e6;" />
	<rect x="12%" y="10" width="<?php echo $no_of_attempt/$no_of_ques*85;?>%" height="15" style="fill:#ff1a75;" />
	<text x="1%" y="22" font-size="17" fill="#0f323e">Complete</text>
	</svg>



</svg>

<?php 
}	

?>




</div>
<br>
</body>

</html>
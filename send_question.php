<?php
// Connection file 
include 'conn.php';
//////////
$user_id = $_SESSION["user_id_session"];


echo $option_id=$_POST["option_id"];
echo $test_set_id=$_POST["test_set_id"];
$ques_id=$_POST["ques_id"];
$ques_level=$_POST["ques_level"];
$sub_id=$_POST["sub_id"];
$sql="SELECT * FROM questions WHERE `id`='$ques_id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$correct_choice=$row["correct_choice_id"];
}
//echo "correct choice : ".$correct_choice;
//echo "option id : ".$option_id;

if($correct_choice==$option_id){
	$flag=1;
	$_SESSION["question_var"]=$ques_id;
	if($ques_level==3){
		$_SESSION["question_var"]=0;
	}
}else{
	$flag=0;
	$_SESSION["question_var"]=0;
}


$sql2="INSERT INTO correct (`user_id`,`test_set_id`,`ques_id`,`correct`,`ques_level`,`sub_id`) VALUES ('$user_id','$test_set_id','$ques_id','$flag','$ques_level','$sub_id')";
$result2=mysqli_query($conn,$sql2);
if(!$result2){
	die(mysqli_error($conn));
}
?>
<?php

// Connection file 
include 'conn.php';
//////////

$question=$_POST["question"];
$option1=$_POST["option1"];
$option2=$_POST["option2"];
$option3=$_POST["option3"];
$option4=$_POST["option4"];
$level=$_POST["level"];
$test_set=$_POST["test_set"];
$subject=$_POST["subject"];
$correct=$_POST["correct"];

$sql1="INSERT INTO questions (`question`,`test_set_id`,`difficulty_level`,`subject`) VALUES ('$question','$test_set','$level','$level')";
$result1=mysqli_query($conn,$sql1);

if(!$result1){
	die(mysqli_error($conn));
}

$last_id = mysqli_insert_id($conn);

if(isset($option1)){
	$sql2="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option1')";
	$result2=mysqli_query($conn,$sql2);
	if(!$result2){
		die(mysqli_error($conn));
	}
	$last_id_2=mysqli_insert_id($conn);
	if($correct==1){
		$sql6="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
		$result6=mysqli_query($conn,$sql6);	
		if(!$result6){
			die(mysqli_error($conn));
		}	
	}
}

if(isset($option2)){
	$sql3="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option2')";
	$result3=mysqli_query($conn,$sql3);
	if(!$result3){
		die(mysqli_error($conn));
	}
	$last_id_2=mysqli_insert_id($conn);
	if($correct==2){
		$sql7="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
		$result7=mysqli_query($conn,$sql7);	
		if(!$result7){
			die(mysqli_error($conn));
		}	
	}
}

if(isset($option3)){
	$sql4="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option3')";
	$result4=mysqli_query($conn,$sql4);
	if(!$result4){
		die(mysqli_error($conn));
	}
	$last_id_2=mysqli_insert_id($conn);
	if($correct==3){
		$sql8="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
		$result8=mysqli_query($conn,$sql8);	
		if(!$result8){
			die(mysqli_error($conn));
		}
	}
}

if(isset($option4)){
	$sql5="INSERT INTO option (`ques_id`,`choices`) VALUES ('$last_id','$option4')";
	$result5=mysqli_query($conn,$sql5);
	if(!$result5){
		die(mysqli_error($conn));
	}
	$last_id_2=mysqli_insert_id($conn);
	if($correct==4){
		$sql9="UPDATE questions SET `correct_choice_id`='$last_id_2' WHERE `id`='$last_id'";
		$result9=mysqli_query($conn,$sql9);
		if(!$result9){
			die(mysqli_error($conn));
		}	
	}
}



echo "Successfully added";


?>
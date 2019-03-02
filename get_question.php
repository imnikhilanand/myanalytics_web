<?php

// Connection file 
include 'conn.php';
//////////

@$user_id = @$_SESSION["user_id_session"];

if($_SESSION["question_var"]==0){
$sql = "SELECT * FROM correct WHERE `user_id`='$user_id'";
$result = mysqli_query($conn,$sql);  
if(mysqli_num_rows($result)>0){
	$array_previous_questions=mysqli_fetch_assoc($result);
	$sql3 = "SELECT * FROM questions WHERE `difficulty_level`='1' AND `subject` NOT IN ( SELECT sub_id FROM correct WHERE `user_id`='$user_id' AND `ques_level`='1') ORDER BY RAND() LIMIT 1";
	$result3 = mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){
		while($row3=mysqli_fetch_assoc($result3)){
			$ques_id=$row3["id"];
			echo "<div class='question'>".$question=$row3["question"]."</div>";
			echo "<br>";
			echo "<span class='level'>"."Level : ".$level=$row3["difficulty_level"]; echo "</span>";
			echo "<span class='subject'>"."Subject : ".$subject=$row3["subject"];echo "</span>";
			echo "<br>";
			$test_id = $row3["test_set_id"];
			$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
			$result4 = mysqli_query($conn,$sql4);
			while($row4=mysqli_fetch_assoc($result4)){
			?>
			<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
			<?php
			} 	
		}
	}else{
		$sql4 = "SELECT * FROM questions WHERE `difficulty_level`='2' AND `subject` NOT IN ( SELECT sub_id FROM correct WHERE `user_id`='$user_id' AND `ques_level`='2') ORDER BY RAND() LIMIT 1";
		$result4 = mysqli_query($conn,$sql4);
		if(mysqli_num_rows($result4)>0){
			while($row4=mysqli_fetch_assoc($result4)){
				$ques_id=$row4["id"];
				echo "<div class='question'>".$question=$row4["question"]."</div>";
				echo "<br>";
				echo "<span class='level'>"."Level : ".$level=$row4["difficulty_level"];echo "</span>";
				echo "<span class='subject'>"."Subject : ".$subject=$row4["subject"]; echo "</span>";	
				echo "<br>";
				$test_id = $row4["test_set_id"];
				$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
				$result4 = mysqli_query($conn,$sql4);
				while($row4=mysqli_fetch_assoc($result4)){
				?>
				<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
				<?php
				} 
			}
		}else{
			$sql5 = "SELECT * FROM questions WHERE `difficulty_level`='3' AND `subject` NOT IN ( SELECT sub_id FROM correct WHERE `user_id`='$user_id' AND `ques_level`='3') ORDER BY RAND() LIMIT 1";
			$result5 = mysqli_query($conn,$sql5);
			if(mysqli_num_rows($result5)>0){
				while($row5=mysqli_fetch_assoc($result5)){
					$ques_id=$row5["id"];
					echo "<div class='question'>".$question=$row5["question"]."</div>";
					echo "<br>";
					echo "<span class='level'>"."Level : ".$level=$row5["difficulty_level"]; echo "</span>";
					echo "<span class='subject'>"."Subject : ".$subject=$row5["subject"]; echo "</span>";
					echo "<br>";
					$test_id = $row5["test_set_id"];
					$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
					$result4 = mysqli_query($conn,$sql4);
					while($row4=mysqli_fetch_assoc($result4)){
					?>
					<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
					<?php
					} 	
				}
			}	
		}
	}
}else{
	$sql2 = "SELECT * FROM questions WHERE `difficulty_level`='1' ORDER BY RAND() LIMIT 1";
	$result2 = mysqli_query($conn,$sql2);  
	while($row2=mysqli_fetch_assoc($result2)){
	$ques_id = $row2["id"];
	echo "<div class='question'>".$question=$row2["question"]."</div>";
	echo "<br>";
	echo "<span class='level'>"."Level : ".$level=$row2["difficulty_level"]; echo "</span>";
	echo "<span class='subject'>"."Subject : ".$subject=$row2["subject"]; echo "</span>";	
	echo "<br>";
	$test_id = $row2["test_set_id"];
	$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
	$result4 = mysqli_query($conn,$sql4);
	while($row4=mysqli_fetch_assoc($result4)){
		?>
		<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
		<?php
	} 
	}
}
}else{
	// If array isn't empty
	$question_var=$_SESSION["question_var"];

	$sql6 = "SELECT * FROM correct WHERE `ques_id`='$question_var' ORDER BY id DESC LIMIT 1";
	$result6 = mysqli_query($conn,$sql6);
	if(mysqli_num_rows($result6)>0){
		while($row6=mysqli_fetch_assoc($result6)){
			$question_level_last=$row6["ques_level"];
			$subject_last = $row6["sub_id"];
		}
	}	
	if($question_level_last==1){
		$sql7 = "SELECT * FROM questions WHERE `difficulty_level`='2' AND `subject`='$subject_last'";
		$result7 = mysqli_query($conn,$sql7);
		if(mysqli_num_rows($result7)>0){
			while($row7=mysqli_fetch_assoc($result7)){
				$ques_id=$row7["id"];
				echo "<div class='question'>".$question=$row7["question"]."</div>";
				echo "<br>";
				echo "<span class='level'>"."Level : ".$level=$row7["difficulty_level"]; echo "</span>";
				echo "<span class='subject'>"."Subject : ".$subject=$row7["subject"]; echo "</span>";
				echo "<br>";
				$test_id = $row7["test_set_id"];
				$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
				$result4 = mysqli_query($conn,$sql4);
				while($row4=mysqli_fetch_assoc($result4)){
				?>
				<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
				<?php
				} 	
			}
		}		
	}else if($question_level_last==2){
		$sql8 = "SELECT * FROM questions WHERE `difficulty_level`='3' AND `subject`='$subject_last'";
		$result8 = mysqli_query($conn,$sql8);
		if(mysqli_num_rows($result8)>0){
			while($row8=mysqli_fetch_assoc($result8)){
				$ques_id=$row8["id"];
				echo "<div class='question'>".$question=$row8["question"]."</div>";
				echo "<br>";
				echo "<span class='level'>"."Level : ".$level=$row8["difficulty_level"]; echo "</span>";
				echo "<span class='subject'>"."Subject : ".$subject=$row8["subject"]; echo "</span>";	
				echo "<br>";
				$test_id = $row8["test_set_id"];
				$sql4 = "SELECT * FROM option WHERE `ques_id`='$ques_id'"; 
				$result4 = mysqli_query($conn,$sql4);
				while($row4=mysqli_fetch_assoc($result4)){
				?>
				<button class="option_btn" onclick="abc(<?php echo $row4["id"];?>,<?php echo $test_id;?>,<?php echo $ques_id;?>,<?php echo $level;?>,<?php echo $subject;?>)"><?php echo $row4["choices"]?></button>
				<?php
				} 
			}
		}		
	}

}


?>
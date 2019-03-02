<?php 

// Connection file 
include 'conn.php';
//////////

?>

<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>



<h1>Upload Questions here</h1>

<form action="upload_csv.php" method="post" enctype="multipart/form-data">
    Select EXCEL file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>







	<h2>OR</h2>

	Question<br>
	<textarea cols="50" name="question" id="question"></textarea>
	<br>	
	
	Option 1<br>
	<textarea cols="30" name="option1" id="option1"></textarea><br>
	Option 2<br>
	<textarea cols="30" name="option2" id="option2"></textarea><br>
	Option 3<br>
	<textarea cols="30" name="option3" id="option3"></textarea><br>
	Option 4<br>
	<textarea cols="30" name="option4" id="option4"></textarea><br>
	<br>
	Correct Option<br>
	<input type="number" min="1" max="4" id="correct">
	<br>
	Level<br>
	<input type="number" min="1" max="3" id="level">
	<br>
	Test Set<br>
	<input type="number" min="1" max="500" id="test_set">
	<br>
	Subject<br>
	<select id="subject">
		<option value="1">Physics</option>
  		<option value="2">Chemistry</option>
  		<option value="3">Maths</option>
  	</select>
  	<br><br>
  	<button id="submit_question">Add Question</button>
	<br>


	<script>
			$(document).ready(function(){
			 	$("#submit_question").click(function(){
			 		var ques = $("#question").val();
					var o1 = $("#option1").val();
					var o2 = $("#option2").val();
					var o3 = $("#option3").val();
					var o4 = $("#option4").val();
					var correct = $("#correct").val();
					var level = $("#level").val();
					var test_set = $("#test_set").val();
					var subject = $("#subject").val();
					$.post("add_questions_db.php",
     				{
         				question: ques,
         				option1: o1,
         				option2: o2,
         				option3: o3,
         				option4: o4,
         				correct: correct,
         				level: level,
         				test_set: test_set,
         				subject: subject
         			},
	     			function(data, status){
         				alert("Data: " + data+"-"+status);
     				});
				});
	 		});
	</script>

<hr>


<?php
$sql1 = "SELECT * FROM questions ORDER BY id DESC";
$result1 = mysqli_query($conn,$sql1);
if(!$result1){
	die(mysqli_error($conn));
}
if(mysqli_num_rows($result1)>0){
	while($row1=mysqli_fetch_assoc($result1)){
		$id=$row1["id"];
		echo $row1["question"];
		echo "<br>";
		echo "Difficulty Level - ".$row1["difficulty_level"];
		echo "<br>";
		echo "Subject - ".$row1["subject"];
		echo "<br>";
		$sql2 = "SELECT * FROM option WHERE `ques_id`='$id'";
		$result2 = mysqli_query($conn,$sql2);
		if(!$result2){
			die(mysqli_error($conn));
		}
		while($row2=mysqli_fetch_assoc($result2)){
			echo $row2["choices"];
			echo "<br>";
		}

		echo "<hr>";
	}
}
?>


</body>

</html>
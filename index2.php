<!DOCTYPE html>
<html>

<?php

$test_set = @$_GET['test_set_id'];

// Connection file 
include 'conn.php';
//////////


if(!isset($_SESSION["user_id_session"])){
	header("Location: index.php");
	die();
}

$_SESSION["question_var"] = 0;
?>

<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>

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
	margin-top: 50px;
	border-radius: 5px;
	padding:20px 30px 20px 30px;
	background-color: #f9f9f9;
	box-shadow: 5px 5px 5px #888888;
}

.load_ques{
	margin-top: 20px;
	background-color: blue;
	text-align: center;
	color:white;
	border: 1px solid blue;
	padding:10px 20px 10px 20px;
	border-radius: 3px;
	font-size: 20px;
	cursor: pointer;
}

.level{
	align-content: center;
	border: 1px solid orange;
	padding: 2px 2px 2px 2px;
	text-align: center;
	width: 100px;
	border-radius: 2px;
	background-color: orange;
	box-shadow: 2px 2px 2px #888888;
	margin-right: 10px;
	padding: 5px 10px 5px 10px;
}
.subject{
	align-content: center;
	border: 1px solid pink;
	padding: 2px 2px 2px 2px;
	text-align: center;
	width: 100px;
	border-radius: 2px;
	background-color: pink;
	box-shadow: 2px 2px 2px #888888;
	margin-left: 10px;
	padding: 5px 10px 5px 10px;
}

</style>


<body onload="pqr()">

<ul style="text-align: left">
	<li><a href="analysis.php">Profile</a></li>
	<li><a href="logout.php">Log Out</a></li>
</ul>


Time Remaining : <span id="timer" style="font-size: 20px"></span>
<p id="timer2" style="font-size: 30px"></p>


<script>
var min = 2;
var global_now = new Date().getTime();
var countDownDate = global_now + min *6*10000;

var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
  //document.getElementById("timer2").innerHTML = distance;
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
    window.location.href = "redirect_Exam.php";
  }
}, 1000);

</script>


<div class="ques_box" id="ques">
</div>


<style>
.option_btn{
	margin-top: 20px;
	background-color: #1bc644;
	text-align: center;
	color:white;
	border: 1px solid #1bc644;
	padding:8px 15px 8px 15px;
	border-radius: 3px;
	font-size: 16px;
	cursor: pointer;
}

.question{
	font-size: 30px;
}
</style>

<button class="load_ques">Skip</button>
<br><br><br>


<script>
$(document).ready(function(){
    $(".load_ques").click(function(){
        $.post("get_question.php",
        function(data,status){
        	document.getElementById("ques").innerHTML=data;
        });
    });
});

function pqr(){
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ques").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "get_question.php", true);
  xhttp.send();
}



function abc(id_get,test_id,ques_id,level,subject){
	$(document).ready(function(){
		$.post("send_question.php",
    	{
        	option_id: id_get,
        	test_set_id: test_id,
        	ques_id: ques_id,
        	ques_level: level,
        	sub_id: subject
    	},
    	function(data, status){
        	$.post("get_question.php",
       			function(data,status){
        		document.getElementById("ques").innerHTML=data;
        	});
    	});
	});
}
</script>


</body>
</html>


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
</head>

<body>


<?php 
?>

<div id="load_main">
</div>

<button id="load_more" data-num="0">Load</button>

<script>

var num = $("#load_more").data("num");

$(document).ready(function(){
  	$("#load_main").load("test3.php?data_num="+num);
    num=num+5;
    $("#load_more").attr("data-num",num);	  	
});


$(document).ready(function(){
  $("button").click(function(){
  	$("#load_main").append($("<div id='"+num+"'></div>"));
  	$("#"+num).load("test3.php?data_num="+num);
    $("#load_main").append($("#"+num));
    num=num+5;
    $("#load_more").attr("data-num",num);
  });
});

</script>

</body>
</html>
<?php 
		require 'db.php';
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'jurshsmith'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
HNG 4.0 | Jurshsmith
</title>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"
  integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="
  crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/color/jquery.color-2.1.2.js"
  integrity="sha256-1Cn7TdfHiMcEbTuku97ZRSGt2b3SvZftEIn68UMgHC8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!--Javascript starts here-->
<script>

</script>

<!--my css starts here-->
<style>

#j-background{
		background-color: #f4f4f4;
				}

#j-image{
		border: 7px solid grey;
		border-radius: 45px;
		max-width: 100%;
}
#j-firstdiv{
		border-right: 1px solid grey;
		text-align: center;
		font-family: montserrat;
		color : grey;
}
.j-header{
		font-family: montserrat;
		color: grey;
		font-weight: 370;
}
.j-center{
		text-align: center;
}


/**chatbot css here**/
#show-chatbot{
	
	background: grey;
	color: white;
	position: fixed;
	right: 4px;
	bottom: 4px;
	padding: 5px;
	display: inline;
	z-index: 250;

}
#chat-interface{

	background-color: red;
	height: 300px;
	width: 300px;
	position: fixed;
	right: 4px;
	bottom: 33px;
	z-index: 23;

}
.add-transparency{
	background-color: #d0d0d0 !important;
}
#chatbot-header{
	background-color: #a39c9c !important;
	font-size: 16px;
}
#chatbot-header span{
	padding : 13px;
}
#chatbot-footer{
	position: fixed;
	right: 4px;
	bottom: 33px;
	background-color: #a39c9c;

}
#chatbot-footer span{

	padding : 10px;

}
.chatbot-text-area{
	position: fixed;
	bottom:  20px;
	width: 264px;
}
</style>
</head>
<body>
<!--chatbot html here-->
<a id = "j-show-chatbot" style = "color:white" href = "#">
<div id = "show-chatbot">
	<div class = "row">
		
		<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;Click toggle chatbot
		</div>
	</div>
</div>
</a>
<div id = "chat-interface" style = "background-color: transparent">

	<div id = "chatbot-header">
		<span class="glyphicon glyphicon-fullscreen"></span>
	 	<span style = "position: relative; left : 200px" class="glyphicon glyphicon-remove-sign"></span>
	</div>


	<form class = "chatbot-text-area">
			<div class="form-group">
  
  <input type="text" class="form-control" id="usr">
				</div></form>
	<div id = "chatbot-footer">
	
		<span class="glyphicon glyphicon-send"></span>
		

	</div>


</div>
<!-- chatbot 
html 
ends here -->

<div id = "j-background">
	<div class = "row">
		<div id = "j-firstdiv" class = "col-lg-5 col-md-5 col-sm-12 col-xs-12">
			<br><br>
			<center><img  src = "images/josh.png" width = "350px" id = "j-image"></center><br><br>
			<font class = "j-profile">  <span class="glyphicon glyphicon-user"></span>  &nbsp;</font>
			<font class = "j-profile" style = "font-weight: 600;">OLADELE JOSHUA</font><br>
			 <font class = "j-header" style = "font-weight: 250;">
			 <span class="glyphicon glyphicon-ok-sign"></span> &nbsp;
			 	HNG INTERN</font><br>
			<br><br>
			<br><br>
			<br><br>
			

			 	<a href = "https://github.com/Jurshsmith"><i class="fab fa-github j-profile"></i></a>
			 	<a href = "https://github.com/Jurshsmith"><i class="fab fa-instagram j-profile"></i></a>
			 	<a href = "https://github.com/Jurshsmith"><i class="fab fa-twitter j-profile"></i></a>

			<br><br>
		</div>
		<div class = "col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<br><br>
			<div id = "j-story">
			<font class = "j-header">ABOUT ME &nbsp;&nbsp;    <span class="glyphicon glyphicon-pencil"></span></font>
			<br><br><br><br><br><br>
			<br><br><br><br><br><br>
			<font class = "j-header">MY QUALIFICATIONS&nbsp;&nbsp;<span class="glyphicon glyphicon-wrench"></span></font>
			<br><br><br><br><br><br>
			<br><br><br><br><br><br>
			<font class = "j-header">MY SKILLS &nbsp;&nbsp;<span class="glyphicon glyphicon-briefcase"></span></font>
			<br><br><br><br><br><br>
			<br><br><br><br><br><br>
			</div>

		</div>
	</div>
</div>


</body>
</html>
<!--css js-->
<script type = "text/javascript">
$(document).ready(
function(){
  setInterval(function(){
var width = $(document).innerWidth();
if(width < 1000 )
{
  $('.j-profile').css({"font-size": "20px"});
  $('.j-header').css({"font-size": "16px"});
  $('#j-story').css({"text-align":"center"});




}
else{
  $('.j-profile').css({"font-size": "26px"});
  $('#j-story').css({"text-align":"left"});



}

  },6);
}
  );
</script>




<!-- chatbot js -->
<script type="text/javascript">
$('#chat-interface').hide();


$('#show-chatbot').click(function(){
$('#chat-interface').addClass('add-transparency');

$('#chat-interface').toggle(500);


});

</script>
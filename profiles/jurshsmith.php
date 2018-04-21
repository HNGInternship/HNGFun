<?php

  
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!--Javascript starts here-->
<script>
$('document').ready(function(){
	$('.mx-auto').hide();
});
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
		text-align: center;
		font-family: montserrat;
		color : grey;
}
.addBorder{
		border-right: 1px solid grey !important;

}
.j-header{
		font-family: montserrat;
		color: grey;
		font-weight: 370;
}
.j-center{
		text-align: center;
}

/*@media screen and () {
  
}*/
#j-links li{
	display : inline;
	list-style-type: none;
	padding: 20px;
}

#j-links {
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
}

#j-pc-links li{
	display : inline;
	list-style-type: none;
	padding: 20px;
}

#j-pc-links {
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
}
#j-story p{
	font-size:17px;
	font-family: montserrat;
	letter-spacing: 1.2px;
	width : 70%; 
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
	height: 370px;

	width: 300px;
	position: fixed;
	right: 4px;
	bottom: 69px;
	z-index: 23;

	overflow-y:scroll;
	overflow-x:hidden;
	

}

 /*p:nth-child(even){
	background: green;
}*/
.add-transparency{
	background-color: #d0d0d0 !important;
}
#chatbot-header{
	background-color: #a39c9c !important;
	font-size: 16px;
	position: fixed;
	z-index: 8000;
	width:100% ;
}
#chatbot-header span{
	padding : 13px;
}
#chatbot-footer{
	position: fixed;
	right: 25px;
	bottom: 35px;
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
.user{

	margin-top: 2px;
	margin-bottom: 6px;
	padding: 2px;
	background-color: red;
	color: white;
	width: 85%;
	border-radius: 8px;
	font-family: monospace;
	font-size: 12px;


}
.bot{
	position: relative;
	left: 15%;
	color: white;
	margin-top: 2px;
	margin-bottom: 6px;
	padding: 2px;
	background-color: green;
	border-radius: 8px;
	width : 85%;
	font-family: monospace;
	font-size: 12px;


}

#j-fullscreen{

}

#j-remove{

}


.chat-area{
	height: auto;
}

</style>
</head>

<body>
<!--chatbot html here-->
<!-- <p class = "chats"></p> -->
<div id = "j-show-chatbot" style = "color:white" role = "button" >
<div id = "show-chatbot">
	<div class = "row">
		
		<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;Click toggle chatbot
		</div>
	</div>
</div>
</div>
<div id = "chat-interface" style = "background-color: transparent">

	<div id = "chatbot-header">
		<span class="glyphicon glyphicon-fullscreen" id = "j-fullscreen" role = "button"></span>
	 	<span style = "position: relative; left : 200px" class="glyphicon glyphicon-remove-sign" id = "j-remove" role  = "button"></span>
	</div>
	<br><br>
	<div id = "chat-area" class = 'chat-area'>
	<div style = "font-size: 10px; font-family: monospace;background-color: grey;color: white">
		<br>
		<p><b>Jobot</b><br>Hi, I'm Jobot</p>
	</div>
	<div class = "chats"></div>
	<div id = "bott"></div>
	</div>
	<form id = "chatbot-text-area" class = "chatbot-text-area">
			<div class="form-group">
  
  <input type="text" class="form-control" id="message">
				</div>
	<div id = "chatbot-footer" >
	
		<span class="glyphicon glyphicon-send"   id = "j-send" role = "button"></span>
	</div>
		</form>

	


</div>
<!-- chatbot 
html 
ends here -->

<div id = "j-background">
	<div class = "row">
		<div id = "j-firstdiv" class = "col-lg-5 col-md-5 col-sm-12 col-xs-12">
			<br><br>
			<center><img  src = "http://res.cloudinary.com/jurshsmith/image/upload/v1524109896/josh.png" width = "350px" id = "j-image"></center><br><br>
			<font class = "j-profile">  <span class="glyphicon glyphicon-user"></span>  &nbsp;</font>
			<font class = "j-profile" style = "font-weight: 600;">OLADELE JOSHUA</font><br>
			 <font class = "j-header" style = "font-weight: 250;">
			 <span class="glyphicon glyphicon-ok-sign"></span> &nbsp;
			 	HNG INTERN</font><br>
			<br><br>
			<br><br>
			<br><br>

	<ul id = "j-pc-links">
		<li>
	<a href = "https://github.com/Jurshsmith"><i class="fab fa-github j-profile"></i></a>
		</li>
		<li>
	<a href = "https://github.com/Jurshsmith"><i class="fab fa-instagram j-profile"></i></a>
		</li>
		<li>
 	<a href = "https://github.com/Jurshsmith"><i class="fab fa-twitter j-profile"></i></a>
 		</li>
 	</ul>

			 	

			<br><br>
		</div>
		<div class = "col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<br><br>
			<div id = "j-story">
			<font class = "j-header">ABOUT ME &nbsp;&nbsp;    <span class="glyphicon glyphicon-pencil"></span></font>
			<p>I am a cool guy who loves coding as an hobby.Actually studying mechanical eengineering, but damn, coding captivates me.</p>
			<br><br><br><br><br>
			<br><br><br><br>
			<font class = "j-header">MY QUALIFICATIONS&nbsp;&nbsp;<span class="glyphicon glyphicon-wrench"></span></font>
			<p>I gat no certificates being a programmer</p>
			<br><br><br><br><br><br>
			<br><br><br>
			<font class = "j-header">MY SKILLS &nbsp;&nbsp;<span class="glyphicon glyphicon-briefcase"></span></font>
			<p>I am proficient in HTML, CSS, BOOTSTRAP, JQUery, Javascript, PHP and i do AI alot for SVG.My UI/UX is bae.</p>
			<br><br><br><br><br><br>
			<br><br><br><br>
			</div>

		</div>
	</div>
	<ul id = "j-links">
		<li>
	<a href = "https://github.com/Jurshsmith"><i class="fab fa-github j-profile"></i></a>
		</li>
		<li>
	<a href = "https://github.com/Jurshsmith"><i class="fab fa-instagram j-profile"></i></a>
		</li>
		<li>
 	<a href = "https://github.com/Jurshsmith"><i class="fab fa-twitter j-profile"></i></a>
 		</li>
 	</ul>
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
   $('#j-story p').css({"margin-left":"15%"});
  $('#j-pc-links').hide();
  $('#j-links').show();
	$('#j-firstdiv').removeClass('addBorder');

}
else{
  $('.j-profile').css({"font-size": "26px"});
  $('#j-story').css({"text-align":"left"});
	$('#j-links').hide();
	$('#j-pc-links').show();
	$('#j-firstdiv').addClass('addBorder');
   $('#j-story p').css({"margin-left":"0%"});

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
$('#j-fullscreen').click(function(){
// $('#chat-interface').addClass('make-full');

// for the full screen create another 
// ui than will show when fullscreen is clicked and small chat interface hides; and 
// disappears while the small chat interface shows when minimized
});

$('#j-remove').click(function(){
$('#chat-interface').hide(300);
});

//controlling what is happening in the text area
// $('.chatbot-text-area').keyup(
// function(){
	$('.chatbot-text-area').keyup(function (e){
			if (e.which == 13)
		{
			$('#j-send').click();
			return false;
		}
	});
	// });
var theScrollCounter = 0;


//what happens when you send a messge to jobot
$('#j-send').click(
	function(){
        theScrollCounter++;

		var chat = $('#message').val();
		var chatHtml = "<div class = 'user'><font class = 'userchat'><b>You<b><br>"+ chat + "</font><br></div>";
        $(".chats").append(chatHtml);//should be after bot chat

//trim for all browsers
	chat.replace(/^\s+|\s+$/gm,'');
	chat.trim();

//everystring should be in lower case
	chat.toLowerCase();

//initialize reply
var reply;
new Date($.now());

var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
var d = dt.getDate();
var m =dt.getMonth();
m += 1;
var y = dt.getFullYear();

var theDate = d + "-"+ m + "-" + y;

//searchIfItEAConstant
if (chat.search("time") != -1){
reply = "The time is "+time;
reply = "<div href = 'index.php#chat-interface#bott"+ theScrollCounter +"' class = 'bot' id = 'bott" + theScrollCounter +"'><font class = 'bot-reply'><b>jobot</b><br>"+ reply + "</font><br></div>";
        $(".chats").append(reply);//should be after bot chat    
}
else if (chat.search("date") != -1){
reply = "The date is "+theDate;
reply = "<div href = 'index.php#chat-interface#bott"+ theScrollCounter +"' class = 'bot' id = 'bott" + theScrollCounter +"'><font class = 'bot-reply'><b>jobot</b><br>"+ reply + "</font><br></div>";
        $(".chats").append(reply);//should be after bot chat    
}
// else if (!(isNaN(chat))){
// reply = "cool math";
// reply = "<div href = 'index.php#chat-interface#bott"+ theScrollCounter +"' class = 'bot' id = 'bott" + theScrollCounter +"'><font class = 'bot-reply'>"+ reply + "</font><br></div>";
//         $(".chats").append(reply);//should be after bot chat    
// }
//used to return say a word
//if it has say word in in it
//if it has convert word in it
//if it has Loc word in it
//if it has motivate me word in it

else{

	

        //using ajax
   $.post('profiles/j-replies.php',{phpques : chat}, function(data){
   		reply = data;
   		reply = "<div href = 'index.php#chat-interface#bott"+ theScrollCounter +"' class = 'bot' id = 'bott" + theScrollCounter +"'><font class = 'bot-reply'><b>jobot</b><br>"+ reply + "</font><br></div>";
        $(".chats").append(reply);//should be after bot chat    
        // $(".chats").append(data);//should be after bot chat
       
       
   });


 }
 $.fn.scrollView = function(){
 	return this.each(function(){
 		$('#chat-interface').animate({
 			scrollTop: $(this).offset().top
 			},1000);
 	});
 }
 $('#message').val('');
// var lastEle = $('.bot:last-child').position().top;
// var scrollAmount = lastEle - 30;
// $('#chat-interface').animate({scrollTop : scrollAmount}, 1000);
// $('#chat-interface').animate({scrollTop : $('.bot').offset().top},1000);
// alert($('#').scrollTop());
 // $('#chat-interface').animate({scrollTop : $('#j-send').offset().top},1000);
 var a = theScrollCounter - 1;
var bottString = String('#bott'+a);

 $(bottString).scrollView();
 

//  $('#chat-interface').scroll(function(){
//  var scrollValue = $('#bott').scrollTop();
// $('#chat-interface').scrollTop(scrollValue);

//  });

	});


</script>

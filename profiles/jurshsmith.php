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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=montserrat">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!--Javascript starts here-->
<script>

</script>

<!--my css starts here-->
<style>
html,body{
	background-color: #f4f4f4;
}

#j-background{
		background-color: #f4f4f4;
				}

#j-image{
		border: 7px solid #0c779e;
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
		color: #0c779e;
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
.blur {
	-webkit-filter : blur(7px);
	-moz-filter : blur(7px);
	-ms-filter : blur(7px);
	-o-filter: blur(7px);
	filter: blur(7px);
	/*opacity: 0.2;*/

}

 

.chat-area{
	height: auto;
}*/

/*new chat bot css starts here*/

</style>
</head>

<body style = "overflow-x: hidden">







<!-- botton for chatbot -->
<button id = "toggle-bot" style = "background-color: #72beda; border: none;border-radius: 4px;color: white;"><i id = "j-icon" style = "font-size: 55px;padding:5px"class="fab fa-reddit-alien"></i>&nbsp;</button>
<style>#j-icon:hover{font-size: 53px !important;}#toggle-bot:hover{background-color: #0c779e; !important;}#toggle-bot{position: fixed;bottom: 6px;right:6px;z-index: 800;}.dd{position: fixed;bottom: 2px;right:2px;z-index: 8000;}</style>
<!-- chatbot new starts here -->
<br>
<div class = "dd">
<div style = "width : 320px; background-color: #72beda;border-radius: 4px;" id = "bot -header">
<i style = "text-shadow: 2px 2px 4px #000000;color: #f4f4f4; font-size: 24px; margin-left: 20px;" class="fab fa-android"></i>
<i role = "button" style = "text-shadow: 2px 2px 4px #000000;color: #f4f4f4;font-size: 20px;position: relative; left : 220px;padding: 15px" class="fas fa-times bot-remove"  id = "bot-remove"></i>
<!-- <span  class="glyphicon glyphicon-remove-sign bot-remove" id = "bot-remove" role  = "button"></span> -->
</div>
<style>
#bot-remove:hover{
font-size: 15px !important;
	}</style>
<div id = "bot-interface" style = "background-color: #f4f4f4; height: 380px;width : 320px;border: 8px solid #04455d;border-bottom: 0px solid transparent; border-radius: 8px;overflow-y: auto">
<center><div style = "width : 90%; background-color: #a39c9c;border-radius:3px;font-family: monospace"><b style = "font-family: montserrat"><i style = "font-size: 14px"class="fab fa-reddit-alien"></i>&nbsp;JOBOT</b><br>
	Hello I'm Jobot. You call me <b>HNGBot</b> <i>too</i>.
</div></center><br>
<div id = "your-msg" style = "padding-bottom: 170px"></div>

</div>
	
 <div class="form-group" style = "width : 320px;position: relative;top: -3px;">
	 
 	
		<div class = "row" style = "background-color: #04455d;padding-top: 9px">
    <input style = "" type="text" class="form-control col-sm-12 col-xs-12 col-lg-12 col-md-12" id="bot-chat-area">
  <button id = "send-msg" type="submit" style = "background-color: #04455d;color: white;height: 77%" class="btn btn-default col-sm-12 col-xs-12 col-lg-12 col-md-12"><center><i class="fab fa-telegram-plane"></i></center></button>
			<style>
				#send-msg:hover{background-color: #72beda;}
			</style>			
	
	</div>
  
	 
</div>
</div>





<script>
//hides the chat bot
$('.dd').hide();
 // $("html, body").animate({ scrollTop: $(document).height() }, 1000);
// $("#bot-interface").animate({ scrollTop: $('#bot-interface').prop("scrollHeight")}, 1000);

var countt = 0;


$('#send-msg').click(function(){
var gone = 8;
var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
var d = dt.getDate();
var m =dt.getMonth();
m += 1;
var y = dt.getFullYear();
var theDate = d + "-"+ m + "-" + y;
var version = "1.0.0";
var message = $('#bot-chat-area').val();

var msg = new SpeechSynthesisUtterance();
var voices = window.speechSynthesis.getVoices();
msg.voice = voices[0]; // Note: some voices don't support altering params
msg.voiceURI = 'native';
msg.volume = 1; // 0 to 1
msg.rate = 1; // 0.1 to 10
msg.pitch = 2; //0 to 2


//edit the message
message = message.toLowerCase();
// message = message.replace(/'?'/g, ' ');
message = message.replace(/\?/gi,"");
message = message.replace(/\./gi,"");
message = message.replace(/\'/gi,"");
message = message.replace(/\"/gi,"");

message = message.replace(/\\/gi,"");



message = message.replace(/\s+/gi,' ').trim();


//if it doesn't have a value
if (message.length == 0){

}
else{
	//your message
var strr = '<div style = "padding: 2px;background-color: #ade4f8;width:70%;border-radius:4px"><font style = "font-size: 10px; font-family: monospace"><b><i style = "font-size: 17px" class="fas fa-user"></i>&nbsp;You</b><br>' +message + "</font></div><br>";
$('#your-msg').append(strr);
}




//time
// if (message.search("time") != -1){

// reply = "The time is "+time;

// msg.text = reply;
// msg.lang = 'en-US';
// speechSynthesis.speak(msg);

// reply = '<div id = "bb'+countt+'" style = "padding: 2px;background-color: #72beda;width:70%;position: relative;left: 30%;border-radius:4px "><b><i style = "font-size: 17px"class="fab fa-reddit-alien"></i>&nbsp;Bot</b><br><font class = "" style = "font-size: 10px; font-family: monospace">'+ reply + "</font></div><br>";
//         $("#your-msg").append(reply);  
//         gone = 0;
// }






//date
if (message.search("date") != -1){

reply = "The date is "+ theDate;
msg.text = reply;
msg.lang = 'en-US';
speechSynthesis.speak(msg);
reply = '<div id = "bb'+countt+'" style = "padding: 2px;background-color: #72beda;width:70%;position: relative;left: 30%;border-radius:4px "><b><i style = "font-size: 17px"class="fab fa-reddit-alien"></i>&nbsp;Bot</b><br><font class = "" style = "font-size: 10px; font-family: monospace">'+ reply + "</font></div><br>";
        $("#your-msg").append(reply);
        gone = 0;

}




//about bot
if (message.search("aboutbot") != -1){
reply = "Jobot "+ version;
msg.text = reply;
msg.lang = 'en-US';
speechSynthesis.speak(msg);
reply = '<div id = "bb'+countt+'" style = "padding: 2px;background-color: #72beda;width:70%;position: relative;left: 30%;border-radius:4px "><b><i style = "font-size: 17px"class="fab fa-reddit-alien"></i>&nbsp;Bot</b><br><font class = "" style = "font-size: 10px; font-family: monospace">'+ reply + "</font></div><br>";
        $("#your-msg").append(reply);   
        gone = 0;
}







//if it contains train and : hashtag and hashtag ...trim and take it to php
if (message.search("train") != -1){
	if (message.search(":") != -1){
		if (message.search("#") != -1){
			//do php thing
			var train = 1;
			$.post('profiles/j-replies.php',{trainValidity : train,chatMessage : message},function(data){
				reply = data;
				msg.text = reply;
				msg.lang = 'en-US';
				speechSynthesis.speak(msg);
				reply = '<div id = "bb'+countt+'" style = "padding: 2px;background-color: #72beda;width:70%;position: relative;left: 30%;border-radius:4px "><b><i style = "font-size: 17px"class="fab fa-reddit-alien"></i>&nbsp;Bot</b><br><font class = "" style = "font-size: 10px; font-family: monospace">'+ reply + "</font></div><br>";
				        $("#your-msg").append(reply); 
			});
		}
			else{
		reply =  "format wrong";
		msg.text = reply;
		msg.lang = 'en-US';
		speechSynthesis.speak(msg);
			}
	}
	else{
		reply =  "format wrong";
		msg.text = reply;
		msg.lang = 'en-US';
		speechSynthesis.speak(msg);
	}
	gone = 0;
}
//end of train javascript



//what it does with other commands
else if (gone == 8){
	$.post('profiles/j-replies.php',{chatMessage : message}, function(data)
{

	reply = data;
	msg.text = reply;
	msg.lang = 'en-US';
	speechSynthesis.speak(msg);
	reply = '<div id = "bb'+countt+'" style = "padding: 2px;background-color: #72beda;width:70%;position: relative;left: 30%;border-radius:4px "><b><i style = "font-size: 17px"class="fab fa-reddit-alien"></i>&nbsp;Bot</b><br><font class = "" style = "font-size: 10px; font-family: monospace">'+ reply + "</font></div><br>";
	        $("#your-msg").append(reply); 

});

}








//end effects
 var scrollString = "#bb"+countt;
  // $('#bot-interface').animate({scrollTop : $(scrollString).offset().top},1000);
countt++;
$('#bot-chat-area').val('');
$('#bot-interface').scrollTop($('#bot-interface')[0].scrollHeight);//works for me..just recall you did a lil padding-bottom thing


});//end of what happens after you submit





//for the enter key

$('#bot-chat-area').keyup(function (e){
			if (e.which == 13)
		{
			$('#send-msg').click();
			return false;
		}
	});
	




//some css effects
$('#toggle-bot').click(function(){

	$('.dd').show('slow');
	$('#j-background').addClass("blur");
	$('#toggle-bot').hide();
});

$('.bot-remove').click(
function(){

$('.dd').fadeOut('slow');
$('#j-background').removeClass("blur");
$('#toggle-bot').show();

}
	);

</script>




























<div id = "j-background">
	<div class = "row">
		<div id = "j-firstdiv" class = "col-lg-5 col-md-5 col-sm-12 col-xs-12">
			<br><br>
			<center><img  src = "http://res.cloudinary.com/jurshsmith/image/upload/v1524378502/jj.png" width = "350px" id = "j-image"></center><br><br>
			<font class = "j-profile">  <i class="fas fa-user-circle"></i>  &nbsp;</font>
			<font class = "j-profile" style = "font-weight: 600;">OLADELE JOSHUA</font><br>
			 <font class = "j-header" style = "font-weight: 250;">
			 <i class="fas fa-badge-check"></i> &nbsp;
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
			<font class = "j-header">ABOUT ME &nbsp;&nbsp;    <i class="fas fa-pencil-alt"></i></font>
			<p>I am a cool guy who loves coding as an hobby.Actually studying mechanical eengineering, but damn, coding captivates me.</p>
			<br><br><br><br><br>
			<br><br><br><br>
			<font class = "j-header">MY QUALIFICATIONS&nbsp;&nbsp;<i class="fas fa-wrench"></i></font>
			<p>I gat no certificates being a programmer</p>
			<br><br><br><br><br><br>
			<br><br><br>
			<font class = "j-header">MY SKILLS &nbsp;&nbsp;<i class="fas fa-suitcase"></i></font>
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
var msg = new SpeechSynthesisUtterance();
var voices = window.speechSynthesis.getVoices();
msg.voice = voices[0]; // Note: some voices don't support altering params
msg.voiceURI = 'native';
msg.volume = 1; // 0 to 1
msg.rate = 1; // 0.1 to 10
msg.pitch = 2; //0 to 2
msg.text = "Hello I'm Jobot, you can call me HNG BOT too";
msg.lang = 'en-US';
speechSynthesis.speak(msg);
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

   $.post('j-replies.php',{phpques : chat}, function(data){

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



<?php

if(!isset($_GET['id'])){
   require '../db.php';
 }else{
    require 'db.php';
 }



try{
   $sql = 'SELECT * FROM secret_word';
   $q = $conn->query($sql);
   $q->setFetchMode(PDO::FETCH_ASSOC);
   $data = $q->fetch();
   $secret_word= $data['secret_word'];
} catch (PDOException $e){
       throw $e;
   }


$result2 = $conn->query("Select * from interns_data where username = 'Syfon'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!-- chatbot -->
<?php
function _post($Var, $Default=''){
    return (isset($_POST[$Var]) === TRUE ? $_POST[$Var] : $Default);
}

$function = $_POST['function'];

$log = array();

switch($function) {

   case('getState'):
       if (file_exists('chat.txt')) {
           $lines = file('chat.txt');
       }
       $log['state'] = count($lines); 
       break;  
  
   case('update'):
      $state = $_POST['state'];
      if (file_exists('chat.txt')) {
         $lines = file('chat.txt');
      }
      $count =  count($lines);
      if ($state == $count){
         $log['state'] = $state;
         $log['text'] = false;
      } else {
         $text= array();
         $log['state'] = $state + count($lines) - $state;
         foreach ($lines as $line_num => $line) {
             if ($line_num >= $state){
                   $text[] =  $line = str_replace("\n", "", $line);
             }
         }
         $log['text'] = $text; 
      }
        
      break;
   
   case('send'):
        $nickname = htmlentities(strip_tags($_POST['nickname']));
     $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
     $message = htmlentities(strip_tags($_POST['message']));
     if (($message) != "\n") {
       if (preg_match($reg_exUrl, $message, $url)) {
          $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
       } 
          fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
     }
     break;
}
echo json_encode($log);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>My Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="c:\Users\Jnr\Desktop\bootstrap4beta\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My portfolio</title>
    <style>
.card-img-top{
    height:30rem;

}
.card-body{
    background-color: rgb(1, 1, 41);
}
.rounded-circle{
    border-radius:50%;
    height: 20rem;
    width:20rem;
    position: absolute;
    top:40px;
    left: 30em;
}
.fa {
    padding:20px ;
    font-size: 50px;
    /* width: 50px; */
    text-decoration: none;
}
#chatbot{
    background-color:rgb(1, 1, 53);
    padding: 1rem;
    border-radius: 10px;

}
.chat{
    min-height: 40vh;
    background-color:white;
}
.details, h1{
    color: white;
    padding: 2rem;
}
#About{
    background-color: rgb(163, 157, 157); 
    padding: 1rem;
}
#foot{
    background-color: rgba(14, 12, 12, 0.89);
}
#chatbox {
  height: 30px;
  width: 100%;
}

</style>

    
</head>
  <body>


    <section id="profile">
        <div id="container">
                        <img class="card-img-top" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg" alt="Card image cap">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle">
                        </div>     
    <section id="About" >                   
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">     
                        <div class="details">     
                            <h3>Sifon Isaac</h3><br>
                            <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                           
                    </div>
                    </div>
    <div class="col-md-6">
         <!-- <div id="chatbot">
            <h1>Syfon's Bot</h1>              
            <div class="chat">
            <form action="" method="post">
            <p id="chatlog8" class="chatlog"><p>To teach me use the format below</p>
            <p>train: your question # your answer # password</p>
            <p id="chatlog7" class="chatlog">&nbsp;</p>
           <p id="chatlog6" class="chatlog">&nbsp;</p>
            <p id="chatlog5" class="chatlog">&nbsp;</p>
            <p id="chatlog4" class="chatlog">&nbsp;</p>
            <p id="chatlog3" class="chatlog">&nbsp;</p>
            <p id="chatlog2" class="chatlog">&nbsp;</p>
             <p id="chatlog1" class="chatlog">&nbsp;</p>
            <input type="text" name="chat" id="chatbox" placeholder="Hi there! Type here to talk to me." onfocus="placeHolder()">            
            </form>
         </div>           
   
         -->
         <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p>Your message: </p>
            <textarea id="sendie" maxlength = '100'></textarea>
        </form>
    
    </div>




</section>
 <section id="foot" >                   
        <div class="container">
                <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
              <a href="https://github.com/Syfon01" class="fa fa-github"></a>
              <a href="" class="fa fa-slack"></a> 

 </div>
</section>

</section>

   <!-- <script>

nlp = window.nlp_compromise;

var messages = [], //array that hold the record of each string in chat
lastUserMessage = "ques", //keeps track of the most recent input string from the user
botMessage = "ans", //var keeps track of what the chatbot is going to say
botName = 'Syfon Chatbot', //name of the chatbot
talking = true; //when false the speach function doesn't work
//edit this function to change what the chatbot says
function chatbotResponse(ans) {
talking = true;
botMessage = "Please train me"; //the default message

if (lastUserMessage === 'hi' || lastUserMessage =='hello') {
const hi = ['hi','hello']
botMessage = hi[Math.floor(Math.random()*(hi.length))];;
}

if (lastUserMessage === 'what is your name') {
botMessage = 'My name is ' + botName;
}
if (lastUserMessage === 'How are you') {
botMessage = "I'm fine, how may I help you";
}
}

//It controls the overall input and output
function newEntry(ques) {
 
if (document.getElementById("chatbox").value != "") {

lastUserMessage = document.getElementById("chatbox").value;

document.getElementById("chatbox").value = "";

messages.push(lastUserMessage);
//Speech(lastUserMessage);  //says what the user typed outloud
//sets the variable botMessage in response to lastUserMessage
chatbotResponse(ans);
//add the chatbot's name and message to the array messages
messages.push("<b>" + botName + ":</b> " + botMessage);
// says the message using the text to speech function written below
Speech(botMessage);
//outputs the last few array elements of messages to html
for (var i = 1; i < 8; i++) {
if (messages[messages.length - i])
  document.getElementById("chatlog" + i).innerHTML = messages[messages.length - i];
}
}
}

//text to Speech
//https://developers.google.com/web/updates/2014/01/Web-apps-that-talk-Introduction-to-the-Speech-Synthesis-API
function Speech(say) {
if ('speechSynthesis' in window && talking) {
var utterance = new SpeechSynthesisUtterance(say);
//msg.voice = voices[10]; // Note: some voices don't support altering params
//msg.voiceURI = 'native';
//utterance.volume = 1; // 0 to 1
//utterance.rate = 0.1; // 0.1 to 10
//utterance.pitch = 1; //0 to 2
//utterance.text = 'Hello World';
//utterance.lang = 'en-US';
speechSynthesis.speak(utterance);
}
}

//runs the keypress() function when a key is pressed
document.onkeypress = keyPress;
//if the key pressed is 'enter' runs the function newEntry()
function keyPress(e) {
var x = e || window.event;
var key = (x.keyCode || x.which);
if (key == 13 || key == 3) {
//runs this function when enter is pressed
newEntry();
}
if (key == 38) {
console.log('hi')
//document.getElementById("chatbox").value = lastUserMessage;
}
}

 function placeHolder(){
    var ques = document.querySelector("#chat");
    displayOnScreen(ques.value, "sent");
    if(ques.value === 'chatlog'){
        displayOnScreen('', 'received');
        return;
    }
 //console.log(ques.value);
 var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "/profiles/Syfon.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ques="+ques.value);

    }

//clears the placeholder text ion the chatbox
//this function is set to run when the users brings focus to the chatbox, by clicking on it
function placeHolder() {
document.getElementById("chatbox").placeholder = "";
}
</script>   -->

<script>
    function Chat () {
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
}
//gets the state of the chat
function getStateOfChat() {
	if(!instanse){
		instanse = true;
		$.ajax({
			type: "POST",
			url: "process.php",
			data: {'function': 'getState', 'file': file},
			dataType: "json",	
			success: function(data) {state = data.state;instanse = false;}
		});
	}	
}

//Updates the chat
function updateChat() {
	if(!instanse){
		instanse = true;
		$.ajax({
			type: "POST",
			url: "new.php",
			data: {'function': 'update','state': state,'file': file},
			dataType: "json",
			success: function(data) {
				if(data.text){
					for (var i = 0; i < data.text.length; i++) {
						$('#chat-area').append($("

						"+ data.text[i] +"

						"));
					}	
				}
				document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				instanse = false;
				state = data.state;
			}
		});
	}
	else {
		setTimeout(updateChat, 1500);
	}
}

//send the message
function sendChat(message, nickname) { 
	updateChat();
	$.ajax({
		type: "POST",
		url: "process.php",
		data: {'function': 'send','message': message,'nickname': nickname,'file': file},
		dataType: "json",
		success: function(data){
			updateChat();
		}
	});
}

// ask user for name with popup prompt    
var name = prompt("Enter your chat name:", "Guest");
 
 // default name is 'Guest'
 if (!name || name === ' ') {
   name = "Guest";  
 }
 
 // strip tags
 name = name.replace(/(<([^>]+)>)/ig,"");
 
 // display name on page
 $("#name-area").html("You are: <span>" + name + "</span>");
 
 // kick off chat
 var chat =  new Chat();

 $(function() {
 
    chat.getState(); 
    
    // watch textarea for key presses
    $("#sendie").keydown(function(event) {  
    
        var key = event.which;  
  
        //all keys including return.  
        if (key >= 33) {
          
            var maxLength = $(this).attr("maxlength");  
            var length = this.value.length;  
            
            // don't allow new content if length is maxed out
            if (length >= maxLength) {  
                event.preventDefault();  
            }  
        }  
                                                                                                    });
    // watch textarea for release of key press
    $('#sendie').keyup(function(e) {  
               
       if (e.keyCode == 13) { 
       
             var text = $(this).val();
             var maxLength = $(this).attr("maxlength");  
             var length = text.length; 
              
             // send 
             if (length <= maxLength + 1) { 
               chat.send(text, name);  
               $(this).val("");
             } else {
               $(this).val(text.substring(0, maxLength));
             }  
       }
    });
 });
 
    </script>

    </body>
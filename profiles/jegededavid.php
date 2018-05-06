<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>JEGEDE DAVID- Hng Intern</title>
		<script type="text/javascript">
				var i = 0;
        var text = "Jegede David, i am a Web Developer";
        var speed = 50;
        var j = text.length;
        
        function textType() {
          if (i < text.length) {
            document.getElementById("typingEffect").innerHTML += text.charAt(i);
            i++;
            setTimeout(textType, speed);
          }
        }
		</script>
		<style type="text/css">
			body{
				background-color: #FF0000;
				background: linear-gradient(to bottom right, #87ceeb, #ffffff);
			}
			footer {
				padding-top: 200px;
				text-align: center;
				font-size: 30px;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 70px;
			}
			#socialMedia {
				padding-top: 40px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}
           

            
            body {
  font: 15px arial, sans-serif;
  background-color: #d9d9d9;
  padding-top: 15px;
  padding-bottom: 15px;
}



#chatborder {
  border-style: solid;
  background-color: #f6f9f6;
  border-width:20px ;
  margin-top:40px ;
  margin-bottom: 40px;
  margin-left: 80px;
  margin-right:50px ;
  padding-top:80px ;
  padding-bottom: 80px ;
  padding-right: 80px;
  padding-left:50px ;
  border-radius:80px ;
}

.chatlog {
   font: 15px arial, sans-serif;
}

#chatbox {
  font: 17px arial, sans-serif;
  height: 22 px;
  width: 400px ;
}

h1 {
  margin: auto;
}

pre {
  background-color: #f0f0f0;
  margin-left: 20px;
}
            
            
            
		</style>


	</head>
	<body class="container" onload="textType()">

		<main >
			<section id="typingEffect"></section>
			
			<section id="socialMedia">
				<div>Social Media</div>
				<div id="socialicons">
                    <a href="https://facebook.com/david_jegede91@yahoo.com"><i class="fa fa-facebook"></i></a>
				</div>
                
                <div class ="col-md-6" id="imgblock">
                    <img class = "img img-circle" src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg">
                </div>
			</section>
            
            	</main>
      
		
        
        <div id='bodybox'>
        <div id='chatborder'>
    <p id="chatlog7" class="chatlog">&nbsp;</p>
    <p id="chatlog6" class="chatlog">&nbsp;</p>
    <p id="chatlog5" class="chatlog">&nbsp;</p>
    <p id="chatlog4" class="chatlog">&nbsp;</p>
    <p id="chatlog3" class="chatlog">&nbsp;</p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>
    <input type="text" name="chat" id="chatbox" placeholder="Hi there! David'bot Type here to talk to me." onfocus="placeHolder()">
  </div>

     <footer> Jegede David @ 2018</footer>

        
        
	</body>
</html>
    
    <script>
           
            //links
//http://eloquentjavascript.net/09_regexp.html
//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
nlp = window.nlp_compromise;

var messages = [], //array that hold the record of each string in chat
  lastUserMessage = "", //keeps track of the most recent input string from the user
  botMessage = "", //var keeps track of what the chatbot is going to say
  botName = 'chatbot', //name of the chatbot
  talking = true; //when false the speach function doesn't work
//
//
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//edit this function to change what the chatbot says
function chatbotResponse() {
  talking = true;
  botMessage = "I'm confused train: this is a question # this is an answer # your password"; //the default message

  if (lastUserMessage === 'hi' || lastUserMessage =='hello') {
    const hi = ['hi am david','howdy','hello']
    botMessage = hi[Math.floor(Math.random()*(hi.length))];;
  }

  if (lastUserMessage === 'name') {
    botMessage = 'My name is ' + botName;
  }
}
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//****************************************************************
//
//
//
//this runs each time enter is pressed.
//It controls the overall input and output
function newEntry() {
  //if the message from the user isn't empty then run 
  if (document.getElementById("chatbox").value != "") {
    //pulls the value from the chatbox ands sets it to lastUserMessage
    lastUserMessage = document.getElementById("chatbox").value;
    //sets the chat box to be clear
    document.getElementById("chatbox").value = "";
    //adds the value of the chatbox to the array messages
    messages.push(lastUserMessage);
    //Speech(lastUserMessage);  //says what the user typed outloud
    //sets the variable botMessage in response to lastUserMessage
    chatbotResponse();
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

//clears the placeholder text ion the chatbox
//this function is set to run when the users brings focus to the chatbox, by clicking on it
function placeHolder() {
  document.getElementById("chatbox").placeholder = "";
}
    </script>

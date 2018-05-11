<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    
    </head>
    
    
    <style>
        body{
            margin:0;
            padding:0;
            background-color: lightgrey;
            background-size:cover;
        }
        
        
        .box{
            width: 450px;
            background: rgba(0,0,0,0.4);
            padding: 40px;
            text-align:center;
            margin:auto;
            margin-top: 5%;
            color:white;
        }
        
        .box-img{
            border-radius: 50%;
            width: 200px;
            height:200px;
            
        }
        .box h1{
            font-size: 40px;
            letter-spacing: 4px;
            font-weight: 100;
        }
        
        .box h5{
            font-size: 25px;
            letter-spacing: 3px;
            font-weight: 100;
        }
        
        ul{
            margin: 0;
            padding: 0;
            
        }
        
        .box li{
            display: inline-block;
            margin: 6px;
            list-style: none;
        }
        
        .box li a{
            color: white;
            text-decoration:none;
            font-size: 60px;
            transition: all ease-in-out 250ms;
            
        }
        
        .box li a:hover{
            color:cornflowerblue;
            
        }
    </style>
        
        <style>
        
       body {
  font: 15px arial, sans-serif;
  background-color: #d9d9d9;
  padding-top: 15px;
  padding-bottom: 15px;
}

#bodybox {
  margin: auto;
  max-width: 550px;
  font: 15px arial, sans-serif;
  background-color: white;
  border-style: solid;
  border-width: 1px;
  padding-top: 20px;
  padding-bottom: 25px;
  padding-right: 25px;
  padding-left: 25px;
  box-shadow: 5px 5px 5px grey;
  border-radius: 15px;
}

#chatborder {
  border-style: solid;
  background-color: #f6f9f6;
  border-width: 3px;
  margin-top: 20px;
  margin-bottom: 20px;
  margin-left: 20px;
  margin-right: 20px;
  padding-top: 10px;
  padding-bottom: 15px;
  padding-right: 20px;
  padding-left: 15px;
  border-radius: 15px;
}

.chatlog {
   font: 15px arial, sans-serif;
}

#chatbox {
  font: 17px arial, sans-serif;
  height: 22px;
  width: 100%;
}

h1 {
  margin: auto;
}

pre {
  background-color: #f0f0f0;
  margin-left: 20px;
}
        
        
    </style>
    
    
    
    
    
    <body>
        <div class="box">
            <img src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg" class="box-img">
            <h1>JEGEDE DAVID</h1>
            <h5>Web Developer-Web Designer</h5>
            <ul>
                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        
        <div id='bodybox'>
  <div id='chatborder'>
    <p id="chatlog7" class="chatlog">Hello! this is David's Bot</p>
    <p id="chatlog6" class="chatlog">Happy meeting you to chat with you</p>
    <p id="chatlog5" class="chatlog">You can teach me by using</p>
    <p id="chatlog4" class="chatlog">type:#train:Question|Answer.</p>
    <p id="chatlog3" class="chatlog"></p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>
    <input type="text" name="chat" id="chatbox" placeholder="Hi there! Type here to talk to me." onfocus="placeHolder()">
    
  </div>
        </div>
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
  botName = 'Chatbot', //name of the chatbot
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
  botMessage = "I'm confused you can train me when you do #train:Question|Answer"; //the default message

  if (lastUserMessage === 'hi' || lastUserMessage =='hello') {
    const hi = ['how are you doing today?','how are you doing today?','how are you doing today?']
    botMessage = hi[Math.floor(Math.random()*(hi.length))];;
  }
    
    if (lastUserMessage === 'fine' || lastUserMessage =='cool' || lastUserMessage == 'great' || lastUserMessage == 'splendid' || lastUserMessage == 'awesome' || lastUserMessage == '#train:Question|Answer') {
    const hi = ['awesome','awesome','awesome']
    botMessage = hi[Math.floor(Math.random()*(hi.length))];;
  }
    
    

  if (lastUserMessage === 'name' || lastUserMessage == '#train:Question|Answer') {
    botMessage = 'Awesome ';
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

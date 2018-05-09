<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enyioma's Profile</title>

    <!-- Oracle Jet CDN -->
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <!-- Awesome font CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    
  }
  .content {
    display: block;
    padding-top: 50px;
    padding-left: 0%
    position: absolute;
  }
  .about {
          font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
          text-align: justify;
          padding: 20px;
      }
  .card{
    box-shadow: 0px 0px 2px #2196f3;
    width: 50%;
  }
  .h2{
      color: #563d7c;
      font-size: 30px;
      text-align: center;
      padding-left: 50px;
  }
  .h4{
      color: #64b5f6;
      font-size: 20px;
      padding-left: 130px;
  }
  p{
      color: #90caf9;
  }
  .fa {
          padding: 20px;
          font-size: 30px;
           width: 60px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
           border-radius: 60%;
      }
      .fa:hover {
          opacity: 0.7;
      }

      .oj-avatar-image {
          border-radius: 100%;
          display: block;
          max-width: 250px;
          max-height: 200px;
          margin-left: auto;
          margin-right: auto;
          
          
      }
      input {
          width: 70%;
          height: 30px;
          padding: 20px, 20px;
          border-radius: 10%;
      }
      .recieved {
        background-color: rgba(58, 111, 172, 0.9);
        color: white;
        padding: 2%;
        max-width: 40%;
        border-radius: 20%;
        float: right;
      }
      .sent {
          background-color: #B8B10F;
          max-width: 40%;
          border-radius: 20%;
      }
      .yormabot {
          position: absolute;
          padding-top: 200px;
          padding-left: 50%;
          width: 450px;
          display: inline-block;
      }

     


      /* .contacts {
          float: right;
      } */
</style>
</head>

<body class="bg-light">
<div class= "container">
<div class="oj-flex oj-sm-flex-direction-columno oj-sm-align-items-center content">
  <div class="card mt-5 py-5">
    <div class="my-3">
      <p class="oj-sm-align-items-center h2"><b>Welcome, Everyone!</b></p>
      <p class="oj-sm-align-items-center h4">My name is Enyioma Nwadibia</p>    
      <div class="oj-flex-item oj-xl-align-items-center">
        <img src="https://res.cloudinary.com/dwkzixuca/image/upload/v1524141051/eyo3.jpg" class="oj-avatar-image" alt="Enyioma's photo">
      </div>
      
      <div class= "about">
          I am a budding Web Developer with an intermediate knowledge and experience garnered in a very short while.
          I am a fast learner who is optimistic about any task, situation and life in general. I have working knowledge of the following 
          technologies (The list will keep increasing of course):<br><br>
          <b>Frontend:</b> HTML, CSS, Bootstrap<br>
          <b>Backend:</b> MySQL, PHP<br>
          <b>Server:</b> Laragon, MAMP<br>
          <b>Design:</b> Figma<br>
      </div>
      <div class= "contacts">
          <a href="https://twitter.com/Fynewily" target= "_blank" class="fa fa-twitter"></a>
          <a href="https://www.linkedin.com/in/enyioma-nwadibia-40b59244/" target= "_blank" class="fa fa-linkedin-square"></a>
          <a href="https://github.com/fynewily" target= "_blank" class="fa fa-github"></a>
          <a href="https://hnginternship4.slack.com/account/profile" target= "_blank" class="fa fa-slack"></a>
      </div>
    
  

    
    </div>
  </div>
</div>

<div>
    
</div>


<div class="demo-flex-display yormabot">
  <div id="panelPage">
          
    
      <div class="oj-flex demo-panelwrapper">
  
        <div class="oj-flex-item oj-flex oj-xl-flex-items-1 oj-xl-12 oj-xl-12 oj-lg-6 oj-xl-6">
          <div class="oj-flex-item oj-panel oj-panel-shadow-md demo-mypanel">
           <h3 class="oj-header-border"><img src="https://res.cloudinary.com/dwkzixuca/image/upload/v1524141051/eyo3.jpg" alt="Enyioma photo"  
            class="oj-avatar-image" width="30px" height="30px"  style="margin-right: 5%">Yorma's Bot</h3><br>
        <div class= "chat-bot">
            <div class= "text-box" id="textbox">
                <p id="chatlog8" class= "chatlog">&nbsp;</p>
                <p id="chatlog7" class= "chatlog">&nbsp;</p>
                <p id="chatlog6" class= "chatlog">&nbsp;</p>
                <p id="chatlog5" class= "chatlog">&nbsp;</p>
                <p id="chatlog4" class= "chatlog">&nbsp;</p>
                <p id="chatlog3" class= "chatlog">&nbsp;</p>
                <p id="chatlog2" class= "chatlog">&nbsp;</p>
                <p id="chatlog1" class= "chatlog">&nbsp;</p>
            </div>

            <div class= "chat">
            <input type= "text" id= "chatbox" name= "chatbot" method= "POST" placeholder="Hi, nice to have you here...." onfocus="placeholder()">
            </div>
         
        </div>
          </div>
        </div>
    
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
    nlp = window.nlp_compromise;

    var messages = [], //array that hold the record of each string in chat
      lastUserMessage = "", //keeps track of the most recent input string from the user
      botMessage = "", //var keeps track of what the chatbot is going to say
      botName = 'Yorma Bot', //name of the chatbot
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
      botMessage = "You can train me more"; //the default message
    
      if (lastUserMessage === 'hi' || lastUserMessage =='hello') {
        const hi = ['hi','howdy','hello']
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

  <!-- RequireJS bootstrap file -->
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>

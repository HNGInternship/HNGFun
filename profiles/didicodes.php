<!DOCTYPE html>
<html>
<head>  
<title>HNG FUN PROFILE</title>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
  
</head>
<style type="text/css">

    * { 
  margin: 0;
  padding: 0;
  font-family: tahoma, sans-serif;
  box-sizing: border-box;
}
body{
  background: #1ddced;
}

.profile-body {
       text-align: center;
color: #ffffff;    }

.chatbox{
   position:absolute;
  width: 350px;
  height: 800px;
  background: #fff;
  padding: 25px;
  margin: 20px auto;
  box-shadow: 0 3px #ccc;
    margin-top:-550px;
    margin-right:100px;
    
}

.chatlogs{
  padding: 10px;
  width: 100%;
  height: 450px;
    overflow-x: hidden;
    overflow-y: scroll;
}
.chatlogs::-webkit-scrollbar{
  width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb{
  border-radius: 5px;
  background: rgba(0,0,0,.1);
}

.chat{
  display: flex;
  flex-flow: row wrap;
  align-items: flex-start;
  margin-bottom: 10px;
}

.chat .user-photo {
  width: 60px;
  height: 60px;
  background: #ccc;
  border-radius: 50%;
  overflow: hidden;
}
.chat .user-photo img {
width: 100%;
}

.chat .chat-message {
  width: 70%;
  padding: 15px;
  margin: 5px 10px 0;
  background: #1ddced;
color: #fff;
font-size: 20px;

}

.friend .chat-message{
  background: #1adda4;
}

.self .chat-message{
  background: #1ddced;


}

.chat-form{
  margin-top: 20px;
  display: flex;
  align-items: flex-start;
}
.chat-form textarea{
  background: #fbfbfb;
  width: 75%;
  height: 50px;
  border: 2px solid #1ddced;
  border-radius: 3px;
  resize: none;
  padding: 10px;
  font-size: 20px;
  color: #333;

}
.chat-form textarea:focus{
  background: #fff;
}

.chatlogs::-webkit-scrollbar{
  width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb{
  border-radius: 5px;
  background: rgba(0,0,0,.1);
}
.chat-form button{
  background: #1ddced;
  padding: 5px 15px;
  font-size: 30px;
  color: #fff;
  border: none;
  margin: 0 10px;
  border-radius: 3px
  box-shadow: 0 3px 0 #0eb2c1;
  cursor: pointer;

  -webkit-transition: background .2s ease;
  -moz-transition: background .2s ease;
  -o-transition: background .2s ease;
}
.game{
  padding:12px;
  background-color: #1ddced;
  border-radius:15px;
}

.chat-form button:hover{
  background: #13c8d9; 
}
   </style>
<body>

<div class="profile">
 <div class="profile-top"></div>
 <div class="text-center">
 <center><img src="http://res.cloudinary.com/didicodes/image/upload/c_crop,h_491/v1523639579/IMG-20180201-WA0022.jpg" alt="profile-image"></center>
 </div>
 <div class="profile-body">
               <h3>Edidiong Asikpo
                               <br>
                               <small>Android Developer</small>
                               <br>                            
                               <small class="text-color"><b>@Didicodes</b></small>
                           </h3>

                                                       <h3><br>I've always loved programing since high school<br> Join me as we make the best out of this wonderful opportunity.</h3>
                            
                           
                            
                            </div>
</head>
<body>
   
    <div class="chatbox"><!--This is a bot-->
    <p class="game">DidiBot V1.3.54</p>
    <div class="chatlogs">
    <div class="chat friend">user: <span id="user"></span> 
    </div>
      <div class="chat self">chatbot: <span id="chatbot"></span> 
      </div>
    <div id="main">
</div>
</div>
      <div class="chat-form"><input id="input" type="text" placeholder="Ask me anything..." autocomplete="off" />
  </div>
<script type="text/javascript">
var trigger = [
  ["hi","hey","hello"], 
  ["how are you", "how is life", "how are things"],
  ["what are you doing", "what is going on"],
  ["how old are you"],
  ["who are you", "are you human", "are you bot", "are you human or bot"],
  ["who created you", "who made you"],
  ["your name please",  "your name", "may i know your name", "what is your name"],
  ["i love you"],
  ["happy", "good"],
  ["bad", "bored", "tired"],
  ["help me", "tell me story", "tell me joke"],
  ["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
  ["bye", "good bye", "goodbye", "see you later"]
];
var reply = [
  ["Hi","Hey","Hello"], 
  ["Fine", "Pretty well", "Fantastic"],
  ["Nothing much", "About to go to sleep", "Can you guest?", "I don't know actually"],
  ["I am 1 day old"],
  ["I am just a bot", "I am a bot. What about you?"],
  ["Kani Veri", "My God"],
  ["I am nameless", "I don't have a name"],
  ["I love you too", "Me too"],
  ["Have you ever felt bad?", "Glad to hear it"],
  ["Why?", "Why? You shouldn't!", "Try watching TV"],
  ["I will", "What about?"],
  ["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
  ["Bye", "Goodbye", "See you later"]
];
var alternative = ["Haha...", "Eh..."];
document.querySelector("#input").addEventListener("keypress", function(e){
  var key = e.which || e.keyCode;
  if(key === 13){ //Enter button
    var input = document.getElementById("input").value;
    document.getElementById("user").innerHTML = input;
    output(input);
  }
});
function output(input){
  try{
    var product = input + "=" + eval(input);
  } catch(e){
    var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
    text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
    if(compare(trigger, reply, text)){
      var product = compare(trigger, reply, text);
    } else {
      var product = alternative[Math.floor(Math.random()*alternative.length)];
    }
  }
  document.getElementById("chatbot").innerHTML = product;
  speak(product);
  document.getElementById("input").value = ""; //clear input value
}
function compare(arr, array, string){
  var item;
  for(var x=0; x<arr.length; x++){
    for(var y=0; y<array.length; y++){
      if(arr[x][y] == string){
        items = array[x];
        item =  items[Math.floor(Math.random()*items.length)];
      }
    }
  }
  return item;
}
function speak(string){
  var utterance = new SpeechSynthesisUtterance();
  utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
  utterance.text = string;
  utterance.lang = "en-US";
  utterance.volume = 1; //0-1 interval
  utterance.rate = 1;
  utterance.pitch = 2; //0-2 interval
  speechSynthesis.speak(utterance);
}
</script>
        
                            
                            


                            <p id="fav">
<a href="https://github.com/edyasikpo"><i class="fa fa-github fa-2x"></i></a>&nbsp;
           <a href="https://twitter.com/didicodes"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;
           <a href="https://facebook.com/Didicodes"><i class="fa fa-facebook fa-2x"></i></a>
           </p>
                           </div>
       </div>
<br>     
 <?php

        require_once '../db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();
        } 
        catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];       
  
?>

</body>
</html>

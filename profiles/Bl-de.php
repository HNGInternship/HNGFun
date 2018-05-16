<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'Bl-de'");
        $intern_data->execute();
        $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $result = $intern_data->fetch();
    
    
        $secret_code = $conn->prepare("SELECT * FROM secret_word");
        $secret_code->execute();
        $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
        $code = $secret_code->fetch();
        $secret_word = $code['secret_word'];
     } catch (PDOException $e) {
         throw $e;
     }
     date_default_timezone_set("Africa/Lagos");
     $today = date("H:i:s");
}
 ?>
 <?php 
    if($_SERVER['REQUEST_METHOD']==='POST'){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            $data = preg_replace("(['])", "\'", $data);
            return $data;
        }
        function chatMode($input){
            require '../../config.php';
            $input = test_input($input);
            $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            if(!$conn){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$input'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'response' => $result
            ]);
            return;
        }
        function trainerMode($input){
            require '../../config.php';
            $questionAndAnswer = substr($input, 6); 
            $questionAndAnswer =test_input($questionAndAnswer); 
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==3)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
                $password = test_input($questionAndAnswer[2]);
            }
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Please insert the correct training password"
                ]);
                return;
            }
            if(isset($question) && isset($answer)){
                $question = test_input($question);
                $answer = test_input($answer);
                if($question == "" ||$answer ==""){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "empty question or response"
                    ]);
                    return;
                }
                $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
                if(!$conn){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                    ]);
                    return;
                }
                $query = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";
                if($conn->query($query) ===true){
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "trained successfully"
                    ]);
                }else{
                    echo json_encode([
                        'status'    => 1,
                        'response'    => "Error training me: ".$conn->error
                    ]);
                }
                
                return;
            }else{ 
            echo json_encode([
                'status'    => 0,
                'response'    => "Wrong training pattern<br> PLease use this<br>train: question # answer"
            ]);
            return;
            }
        }
        
        $input = test_input($_POST['input']);
        if(strpos($input, "train:") !== false){
            trainerMode($input);
        }else{
            chatMode($input);
        }
       
        return;
    }
 <!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bl-de - Profile</title>
<style type="text/css">
font-family: Montserrat;
</style>
</head>
<body style="background-color: #d3d3d3">
<nav style="background-color: #18BC9C; border-radius: 5px">
<a href="#Profile"><b>Profile</b></a>
    <a href="#ScarJobot"><b>ScarJobot</b></a>
</nav>
<section id="Profile" align="center" style="background-color:#18BC9C; color: #fff; border-radius: 5px">
<img src="http://res.cloudinary.com/bl-de/image/upload/v1525350858/pikbl-de.png">
<h1>MANNY EKANEM</h1>
<h2>Coder - Graphic Artist - User Experience Designer</h2>
<p><img src="https://res.cloudinary.com/bl-de/image/upload/v1525982300/map_marker.png"> Niger Delta, Nigeria</p>
</section>
<section id="ScarJobot" style="background-color:#2C3E50; color: #fff; border-radius: 5px">
<h2 style="margin-left: 5px">SCARjOBOT</h2>
<img src="https://res.cloudinary.com/bl-de/image/upload/v1525528851/ScarJo.png" style="float: left; height: 210px; width: 350px; border-radius: 16px; text-align: center; margin-left: 5px; margin-right: 20px">
<div id="Chatbox" style="float: center; margin-top: 30px">
<h3>Hi, I'm ScarJo</h3>
<p>"I think you'd love a chat with me. 'You know something I don't?</br>
Train me with the sequence-> train: question#answer#password<br/>
<p>Don't be shy:)"</p>
	<div>user: <span id="user"></span></div>
	<div>ScarJo: <span id="chatbot"></span></div>
	<div><input id="input" type="text" placeholder="Talk to me..." autocomplete="off" style="margin-bottom: 30px"/></div>
</div>
</section>

<script type="text/javascript">
var trigger = [
	["aboutbot"],
	["hi","hey","hello"], 
	["how are you", "how is life", "how are things"],
	["what are you doing", "what is going on"],
	["what can you do", "what are your skills", "tell me what you can do", "can you do anything"],
	["how old are you"],
	["who are you", "are you human", "are you bot", "are you human or bot"],
	["who created you", "who made you"],
	["your name please",  "your name", "may i know your name", "what is your name"],
	["i love you"],
	["happy", "good"],
	["bad", "bored", "tired"],
	["help me", "tell me story", "tell me joke"],
	["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
	["bye", "good bye", "goodbye", "see you later"],
	["fuck you", "screw you", "bitch", "fuck", "shit", "crap"]
];
var reply = [
	["ScarJo Bot. Version: 1.0"],
	["Hi","Hey","Hello"], 
	["Fine", "Pretty well", "Fantastic"],
	["Nothing much", "About to go to sleep", "Can you guess?", "I don't know actually"],
	["I can talk", "I can solve math", "Why don't you find out", "I can be trained"],
	["I am ageless"],
	["I am just a bot", "I am a bot. What are you?"],
	["Manny Ekanem", "Blade. With a katana", "My sensei Blade"],
	["I am ScarJo", "Wouldn't you like to know?"],
	["I love you too", "Me too", "Haha"],
	["Have you ever felt bad?", "Glad to hear it"],
	["Why?", "Why? You shouldn't!", "Try watching my movies"],
	["I will", "What about?"],
	["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
	["Bye", "Goodbye", "See you later"],
	["How old are you, seriously", "Your URL has been reported", "That's immature"]
];

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
			var product = processData (data);
		}
	}
	document.getElementById("chatbot").innerHTML = product;
	speak(product);
	document.getElementById("input").value = ""; //clear input value
	
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
	};
    xhttp.open("POST", "/profiles/Bl-de.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("input="+input.value);
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
function processData (data){
    data = JSON.parse(data);
    console.log(data);
    var answer = data.response;
	var trainee = ["Sorry I didn't get that. Train me with this sequence, train: question#answer#password"]
    if(Array.isArray(answer)){
        if(answer.length !=0){
            var res = Math.floor(Math.random()*answer.length);
            return(answer[res][0], "received");
        }else{
            return (trainee, "received");
        }
    }else{
        return(answer,"received");
    }
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
</body>


</html>
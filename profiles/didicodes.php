<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'didicodes'");
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
        //function definitions
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            $data = preg_replace("(['])", "\'", $data);
            return $data;
        }
        function chatMode($ques){
            require '../../config.php';
            $ques = test_input($ques);
            $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            if(!$conn){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'response' => $result
            ]);
            return;
        }
        function trainerMode($ques){
            require '../../config.php';
            $questionAndAnswer = substr($ques, 6); 
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
                //Correct training pattern
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
        
        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }
       
        return;
    }
 
?>
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
  height: 700px;
  background: #fff;
  padding: 25px;
  margin: 20px auto;
  box-shadow: 0 3px #ccc;
    margin-top:-550px;
    margin-right:-600px;
    
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
  width: 400px;
}
.chat-form textarea{
  background: #fbfbfb;
  width: 750%;
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
  box-shadow: 0 5px 0 #0eb2c1;
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

                                                     
                            </div>
</head>
<body>
   
    <div class="chatbox"><!--This is a bot-->
    <p class="game">DidiBot V1.3.54</p>
    <div class="chatlogs">
    <p> I can answer questions like how are you, who are you, i love you, who created you </p>
    <br>
    <p>You can train me using the format train: question#answer#password</p>
    <br>
    <br>
    <div class="chat friend">user: <span id="user"></span> 
    </div>
      <div class="chat self">chatbot: <span id="chatbot"></span> 
      </div>
    <div id="main">
</div>
</div>
      <div class="chat-form"><input id="input" type="text" placeholder="Press enter after typing" autocomplete="off" />
  </div>
<script>
    window.addEventListener("keydown", function(e){
    if(e.keyCode ==13){
        if(document.querySelector("#user-message").value==""||document.querySelector("#user-message").value==null){
            //console.log("empty box");
        }else{
            //this.console.log("Unempty");
            sendMsg();
        }
    }
    });
    function sendMsg(){
    var ques = document.querySelector("#user-message");
    displayOnScreen(ques.value, "sent");
    if(ques.value === 'aboutbot'){
        displayOnScreen('Name: BOTLER<br>Version: 1.0 beta*', 'received');
        return;
    }
    //console.log(ques.value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "/profiles/nedy.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ques="+ques.value);

    }
    function processData (data){
    data = JSON.parse(data);
    console.log(data);
    var answer = data.response;
    //Choose a random response from available
    if(Array.isArray(answer)){
        if(answer.length !=0){
            var res = Math.floor(Math.random()*answer.length);
            displayOnScreen(answer[res][0], "received");
        }else{
            displayOnScreen("Ooops!! I don't understand what you just said<br>To teach me use this  format<br>train# question # answer # password","received");
        }
    }else{
        displayOnScreen(answer,"received");
    }



    }
    function displayOnScreen(data,align){
    console.log(data);

    var main= document.querySelector(".messages-area");
    var div = document.createElement("div");
    div.classList = align+"-message text-left";
    var p = document.createElement("p");

    p.classList = "message "+align;
    p.innerHTML = data;
    div.appendChild(p);
    main.appendChild(div);
    //console.log(data);
    }
</script>
</script>
</div>
</div>
</body>
</html>s
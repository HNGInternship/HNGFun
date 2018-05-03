<?php
<<<<<<< HEAD
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
=======
<<<<<<< HEAD
  require 'db.php';
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
if($_SERVER['REQUEST_METHOD'] === "GET"){
        try {
       // $conn = new PDO("mysql:host=$servername;dbname=hng_fun", $username, $password);
=======
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'ekpono'");
        $intern_data->execute();
        $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $result = $intern_data->fetch();
<<<<<<< HEAD
    
    
=======
<<<<<<< HEAD
=======
    
    
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
        $secret_code = $conn->prepare("SELECT * FROM secret_word");
        $secret_code->execute();
        $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
        $code = $secret_code->fetch();
        $secret_word = $code['secret_word'];
     } catch (PDOException $e) {
         throw $e;
     }
<<<<<<< HEAD
     date_default_timezone_set("Africa/Lagos");
     $today = date("H:i:s");
=======
<<<<<<< HEAD
>>>>>>> master
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
                    'answer'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'answer' => $result
            ]);
            return;
        }
        function trainerMode($ques){
            require '../../config.php';
            $questionAndAnswer = substr($ques, 6); //get the string after train
            $questionAndAnswer =test_input($questionAndAnswer); //removes all shit from 'em
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  //to remove all ? and .
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==3)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
                $password = test_input($questionAndAnswer[2]);
            }
<<<<<<< HEAD
=======

           
=======
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
                    'answer'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'answer' => $result
            ]);
            return;
        }
        function trainerMode($ques){
            require '../../config.php';
            $questionAndAnswer = substr($ques, 6); //get the string after train
            $questionAndAnswer =test_input($questionAndAnswer); //removes all shit from 'em
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  //to remove all ? and .
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==3)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
                $password = test_input($questionAndAnswer[2]);
            }
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'answer'    => "Please insert the correct training password"
                ]);
                return;
            }
            if(isset($question) && isset($answer)){
                //Correct training pattern
<<<<<<< HEAD
                $question = test_input($question);
                $answer = test_input($answer);
=======
<<<<<<< HEAD
                $question = input($question);
                $answer = input($answer);
=======
                $question = test_input($question);
                $answer = test_input($answer);
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
                if($question == "" ||$answer ==""){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "empty question or response"
                    ]);
                    return;
                }
<<<<<<< HEAD
                $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
                if(!$conn){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                    ]);
                    return;
                }
                $query = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";
                if($conn->query($query) ===true){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "trained successfully"
                    ]);
                }else{
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "Error training me: ".$conn->error
                    ]);
                }
                

=======
<<<<<<< HEAD
                    try {
                        //$conn = new PDO("mysql:host=localhost;dbname=chat", 'root', '');
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //echo "Connected successfully"; 
                        }
                    catch(PDOException $e)
                        {
                        echo "Connection failed: " . $e->getMessage();
                        return;
                        }

                $sql = "insert into chatbot (question, answer) values (:question, :answer)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':question', $question);
				$stmt->bindParam(':answer', $answer);
				$stmt->execute();
				echo json_encode([
					'status' => 1,
					'answer' => "Thank you, I am now smarter"
				]);
=======
                $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
                if(!$conn){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                    ]);
                    return;
                }
                $query = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";
                if($conn->query($query) ===true){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "trained successfully"
                    ]);
                }else{
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "Error training me: ".$conn->error
                    ]);
                }
                

>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
                return;
            }else{ //wrong training pattern or error in string
            echo json_encode([
                'status'    => 0,
<<<<<<< HEAD
                'answer'    => "Wrong training pattern<br> PLease use this<br>train: question # answer"
=======
<<<<<<< HEAD
                'answer'    => "To train me, use<br>train: question # answer"
>>>>>>> master
            ]);
            return;
            }
        }

        //end of function definition
        
        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }

<<<<<<< HEAD
       
        return;
    }
=======
=======
                'answer'    => "Wrong training pattern<br> PLease use this<br>train: question # answer"
            ]);
            return;
            }
        }

        //end of function definition
        
        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }

       
        return;
    }
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ekpono's Profile</title>
   <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
   

<style>
* {
    margin: 0;
    padding: 0;
}
body {
  font-family: 'Dosis', sans-serif;
    background: linear-gradient(to right, rgba(216,0,0,0), rgba(216,0,0,0.2));
    background-repeat: cover;
}
.container {
    width: 80%;
    height: auto;
    margin: 0 auto;
    display: flex;
    position: relative;
    color: #806a21;
}
.text {
    width: 50%;
    display: block;
    text-align: right;
    font-size: 20px;
    padding-top: -80px;
}
.photo {
    width: 50%;
    margin-left: 80px;
    display: block;
}
.slogan {
    margin-top: 30px;
}
h3 {
    color:rgb(32, 32, 216)
}
a {
    text-decoration: none;
     text-decoration: underline dotted;
}
/* ChatBot */
        .display{
            position:fixed;
            bottom:0;
            right: 20px;
            background-color:white;
            width: 350px;
            height: 400px;
            overflow:auto;
            padding-bottom: 20px;
        }
        .display nav{
            display:block;
            height: 50px;
            background-color:#fff;
            text-align: center;
            font-size: 25px;
            padding-top:7.5px;
            font-weight: normal;
            box-shadow: 2px 2px 2px #aaa;
            text-shadow: 1.5px 1.5px 1px #ccc;
        }
        .display li{
            list-style-type:none;
            display:block;
            border-bottom: 1px dotted #aaa;
        }
        .display .form{
            position:fixed;
            bottom: 10px;
        }
        .user {
            text-align: right;
        }
        .user p{
            text-align: right;
            width: auto;
            display: inline;
            border-radius: 5px;
            background: gray;
            color: black;
            padding: 2px;
        }
        .bot p {
            display: inline;
        }
        .display {
            padding: 15px;

    -webkit-animation: fadein 5s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 5s; /* Firefox < 16 */
        -ms-animation: fadein 5s; /* Internet Explorer */
         -o-animation: fadein 5s; /* Opera < 12.1 */
            animation: fadein 5s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
<<<<<<< HEAD

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
.send {
    padding: 8px 20px ;
    background-color: blue;
    border-radius: 5px;
    color: #fff;
}

=======

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
.send {
    padding: 8px 20px ;
    background-color: blue;
    border-radius: 5px;
    color: #fff;
}

>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
input[type=text] {
    border-bottom: 5px solid #ccc;
    width: 250px;
    padding: 5px
}

.bot {
    width: 80%;
    text-align: justify;
    height: auto;
}




/* CSS button */
</style>
</head>
<body>
<div class="container">
    <div class="text">
        <h1 style="color:rgb(32, 32, 216); padding-top: 30px">Hey! I'm Ekpono </h1>
        <h2 style="color:#806a21;">I'm a developer from Nigeria</h2>
        <h3 class="slogan">I work with companies</h3>
        <p>Jiggle, Thirdfloor, JandK Services, Hilltop</p>
        <br><br>
        <h3>I use different technologies</h3>
        <p>Frontend: HTML, CSS, Bootstrap, Javascript, JQuery </p>
        <p>Backend: PHP, Laravel </p>
        <p>Design: Photoshop, Sketch, Figma</p>
        <br>
        <h3>I'm available for hire</h3>
        <a href="mailto:ekponoambrose@gmail.com">Email</a>
        <a href="http://www.facebook.com/ekpono">Facebook</a>
        <a href="http://www.twitter.com/ekpono11">Twitter</a>
        <a href="http://www.linkedin.com/in/ekpono">Linkedin</a>
        <a href="http://www.github.com/ekpono">Github</a>
    </div>
    <div class="photo">
        <img src="http://res.cloudinary.com/ambrose/image/upload/r_29/v1523629415/dp2.jpg" width="300px" height="300px"  style="border-radius: 50%; padding-top: 30px;" alt="Ekpono's Profile Picture" />
<<<<<<< HEAD
    </div>
    <!-- Chat form -->

    <div class="display">

        <div>
            <nav>Robotech</nav>
            <div class="myMessage-area">
                <div class="myMessage bot">
                </div>
            </div>
        </div>

        <div class="form">
            <input type="text" name="question" id="question" required class="textarea">
            <span onclick="sendMsg()" ><button class="send">Send</button></i></span>
        </div>
        </div>

=======
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
    </div>
    <!-- Chat form -->

    <div class="display">

        <div>
            <nav>Robotech</nav>
            <div class="myMessage-area">
                <div class="myMessage bot">
                </div>
            </div>
        </div>

        <div class="form">
            <input type="text" name="question" id="question" required class="textarea">
            <span onclick="sendMsg()" ><button class="send">Send</button></i></span>
        </div>
        </div>

    </div>


   <script>
        function meetB(){
            var display= document.querySelector(".display");
            display.style.display = "block";
            var btnM = document.querySelector(".btnM");
            btnM.style.display ="none"
            document.querySelector(".btnN").style.display ="inline"
        }
        function exitB(){
            var display= document.querySelector(".display");
            display.style.display = "none";
            document.querySelector(".btnN").style.display = "none";
            document.querySelector(".btnM").style.display = "inline";
        }
        window.addEventListener("keydown", function(e){
            if(e.keyCode ==13){
                if(document.querySelector("#question").value.trim()==""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){
                    //console.log("empty box");
                }else{
                    //this.console.log("Unempty");
                    sendMsg();
                }
            }
        });
        function sendMsg(){

            var ques = document.querySelector("#question");
            
            if(ques.value.toLowerCase() ==":about bot:"){
                displayOnScreen(ques.value, "user");
                displayOnScreen("Name: Robotech <br> V:1.0");
                return;
            }
            if(ques.value.trim()== ""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){return;}
            displayOnScreen(ques.value, "user");
            //console.log(ques.value);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState ==4 && xhttp.status ==200){
                    processData(xhttp.responseText);
                }
            };

            xhttp.open("POST","http://old.hng.fun/profile.php?id=ekpono", true);

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ques="+ques.value);
        }
        function processData (data){
            data = JSON.parse(data);
            console.log(data);
            var answer = data['answer'];
            //Choose a random response from available
            if(Array.isArray(answer)){
                if(answer.length !=0){
                    var res = Math.floor(Math.random()*answer.length);
                    displayOnScreen(answer[res].answer, "bot");
                }else{
                    displayOnScreen("Sorry I don't understand what you said <br>But You could help me learn<br> Here's the format: train: question # response # password");
                }
            }else{
                displayOnScreen(answer,"bot");
            }
        }
        function displayOnScreen(data,sender){
            //console.log(data);
            if(!sender){
                sender = "bot"
            }
            var display = document.querySelector(".display");
            var msgArea = document.querySelector(".myMessage-area");
            var div = document.createElement("div");
            var p = document.createElement("p");
            p.innerHTML = data;
            //console.log(data);
            div.className = "myMessage "+sender;
            div.append(p);
            msgArea.append(div)
            if(data != document.querySelector("#question").value){
                document.querySelector("#question").value="";
            } 

<<<<<<< HEAD

   <script>
        function meetB(){
            var display= document.querySelector(".display");
            display.style.display = "block";
            var btnM = document.querySelector(".btnM");
            btnM.style.display ="none"
            document.querySelector(".btnN").style.display ="inline"
        }
        function exitB(){
            var display= document.querySelector(".display");
            display.style.display = "none";
            document.querySelector(".btnN").style.display = "none";
            document.querySelector(".btnM").style.display = "inline";
        }
        window.addEventListener("keydown", function(e){
            if(e.keyCode ==13){
                if(document.querySelector("#question").value.trim()==""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){
                    //console.log("empty box");
                }else{
                    //this.console.log("Unempty");
                    sendMsg();
                }
            }
        });
        function sendMsg(){

            var ques = document.querySelector("#question");
            
            if(ques.value.toLowerCase() ==":about bot:"){
                displayOnScreen(ques.value, "user");
                displayOnScreen("Name: Robotech <br> V:1.0");
                return;
            }
            if(ques.value.trim()== ""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){return;}
            displayOnScreen(ques.value, "user");
            //console.log(ques.value);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState ==4 && xhttp.status ==200){
                    processData(xhttp.responseText);
                }
            };

            xhttp.open("POST","http://old.hng.fun/profile.php?id=ekpono", true);

            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ques="+ques.value);
        }
        function processData (data){
            data = JSON.parse(data);
            console.log(data);
            var answer = data['answer'];
            //Choose a random response from available
            if(Array.isArray(answer)){
                if(answer.length !=0){
                    var res = Math.floor(Math.random()*answer.length);
                    displayOnScreen(answer[res].answer, "bot");
                }else{
                    displayOnScreen("Sorry I don't understand what you said <br>But You could help me learn<br> Here's the format: train: question # response # password");
                }
            }else{
                displayOnScreen(answer,"bot");
            }
        }
        function displayOnScreen(data,sender){
            //console.log(data);
            if(!sender){
                sender = "bot"
            }
            var display = document.querySelector(".display");
            var msgArea = document.querySelector(".myMessage-area");
            var div = document.createElement("div");
            var p = document.createElement("p");
            p.innerHTML = data;
            //console.log(data);
            div.className = "myMessage "+sender;
            div.append(p);
            msgArea.append(div)
            if(data != document.querySelector("#question").value){
                document.querySelector("#question").value="";
            } 

<<<<<<< HEAD
        }
</script>
=======
        $(document).ready(function(){
    $(".display").fadeIn();
});
    </script>
=======
        }
</script>
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
>>>>>>> master

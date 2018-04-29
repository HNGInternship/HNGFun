<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
if($_SERVER['REQUEST_METHOD'] === "GET"){
        try {
        $conn = new PDO("mysql:host=$servername;dbname=hng_fun", $username, $password);
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'ekpono'");
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
}
try {
	require 'config.php';
    $conn1 = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected";
    }
catch(PDOException $e)
    {
    echo "Sorry connection not found: " . $e->getMessage();
    }
// Check connection

?>

<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        //function definitions
        function input($data) {
            $data = stripslashes($data);
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            return $data;
        }
        //end of function definition
        $ques = input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            $q_a = substr($ques, 6); //get the string after train
            $q_a =input($q_a); //removes all shit from 'em
            $q_a = preg_replace("([?.])", "", $q_a);  //to remove all ? and .
            $q_a = explode("#",$q_a);
            if((count($q_a)==3)){
                $question = $q_a[0];
                $answer = $q_a[1];
                $password = $q_a[2];
            }
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'answer'    => "Please insert the correct training password"
                ]);
                return;
            }
            if(isset($question) && isset($answer)){
                //Correct training pattern
                $question = input($question);
                $answer = input($answer);
                if($question == "" ||$answer ==""){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "empty question or response"
                    ]);
                    return;
                }
                    try {
                       $conn = new PDO("mysql:host=DB_HOST;dbname=DB_DATABASE", 'DB_USER', 'DB_PASSWORD');
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
                return;
            }else{ //wrong training pattern or error in string
            echo json_encode([
                'status'    => 0,
                'answer'    => "To train me, use<br>train: question # answer"
            ]);
            return;
            }
            
        }else{
            //chat mode
            $ques = input($ques);
                $sql = "select answer from chatbot where question like :question";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':question', $ques);
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						$rows = $stmt->fetchAll();
                    echo json_encode([
                        'status' => 1,
                        'answer' => $rows
                    ]);
           
            }
            return;
        }
//chogo
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
/* CSS button */
</style>
</head>
<body>
<div class="container">
    <div class="text">
        <h1 style="color:rgb(32, 32, 216); padding-top: 30px">Hey! I'm <?php echo $result['name']; ?></h1>
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
        <img src="<?php echo $result['image_filename']; ?>" width="300px" height="300px"  style="border-radius: 50%; padding-top: 30px;" alt="Ekpono's Profile Picture" />
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
            <input type="text" name="question" id="question" required>
            <span onclick="sendMsg()" ><button>Send</button></i></span>
        </div>
    </div>
    </div>


    <script>
        window.addEventListener("keydown", function(e){
            if(e.keyCode ==13){
                if(document.querySelector("#question").value.trim()==""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){
                }else{
                    sendMsg();
                }
            }
        });
        function sendMsg(){
            var ques = document.querySelector("#question");
            if(ques.value.trim()== ""||document.querySelector("#question").value==null||document.querySelector("#question").value==undefined){return;}
            displayOnScreen(ques.value, "user");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(xhttp.readyState ==4 && xhttp.status ==200){
                    processData(xhttp.responseText);
                }
            };
            xhttp.open("POST","https://hng.fun/profile.php?id=ekpono", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ques="+ques.value);
        }
        function processData (data){
            data = JSON.parse(data);
            console.log(data);
            var answer = data['answer'];
            if(Array.isArray(answer)){
                if(answer.length !=0){
                    var res = Math.floor(Math.random()*answer.length);
                    displayOnScreen(answer[res].answer, "bot");
                }else{
                    displayOnScreen("Not trained yet. Train me: train: question # response # password");
                }
            }else{
                displayOnScreen(answer,"bot");
            }
        }
        function displayOnScreen(data,sender){
            if(!sender){
                sender = "bot"
            }
            var display = document.querySelector(".display");
            var msgArea = document.querySelector(".myMessage-area");
            var div = document.createElement("div");
            var p = document.createElement("p");
            p.innerHTML = data;
            div.className = "myMessage "+sender;
            div.append(p);
            msgArea.append(div)
            if(data != document.querySelector("#question").value){
                document.querySelector("#question").value="";
            }
        }

        $(document).ready(function(){
    $(".display").fadeIn();
});
    </script>

<?php 
//require 'db.php';
if($_SERVER['REQUEST_METHOD'] === "GET"){
    try {
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'jaycodes'");
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
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'answer'    => "Please insert the correct training password"
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
                        'answer'    => "empty question or response"
                    ]);
                    return;
                }
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
                

                return;
            }else{ //wrong training pattern or error in string
            echo json_encode([
                'status'    => 0,
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
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@jaycodes</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        *{
            margin: 0;padding: 0;box-sizing: border-box;font-family: cursive;
        }
        body{
            background-color: #e5e5e5;
            position: relative;
        }
        .pic{
            position: absolute;
            box-shadow: 2px 2px 2px #a1a1a1;
            top:100px;
            left:200px;
            border-radius: 10px;
        }
        .details{
            text-align:center;
            position: absolute;
            width: 450px;
            top:130px;
            left: 632px;
            background-color: #fff;
            box-shadow: 2px 2px 2px #a1a1a1; 
        }.details h2{
            margin-top: 60px;
            text-align: center;
            font-size: 36px;
        }
        small{
            font-size: 24px;
            font-weight: normal;
        }
        #time{
            padding: 0px 5px;
            float: right;
            clear: both;
            height: 42px;
            width: 141px;
            background-color: #efefef;
            text-align: center;
            font-size: 30px;
        }
        details p{
            padding:0 30px;
            text-align: center;
            font-size: 24px;
        }
        .footer{
            margin-top: 70px;
            display: block;
            height: 50px;
            background-color: #efefef;
        }
        .footer button{
            height: 40px;
            margin: 5px 140px;
            width:150px;
            font-size: 24px;
        }
        .display{
            position:fixed;
            display: none;
            bottom:0;
            right: 20px;
            background-color:#fefefe;
            width: 350px;
            height: 470px;
            overflow:auto;
            box-shadow: 4px 4px 4px #888;
        }
        .display nav{
            display:block;
            width:350px;
            position: fixed;
            bottom:470px;
            height: 50px;
            background-color: #f8e2ea;
            text-align: center;
            font-size: 25px;
            padding-top:7.5px;
            font-weight: normal;
            box-shadow: 2px 2px 2px #888;
            text-shadow: 1.5px 1.5px 1px #ccc;
        }
        
        .display .form{
            position:fixed;
            bottom: 10px;
            display: block;
            margin-left: 10px;
            height: 35px;
        }
        input{
            width:270px;
            height: 40px;
            background-color:white;
            border:solid 2px #aaa;
            padding:4px 10px;
            outline:none;
            transition: border 0.2s linear;
            border-radius: 10px;
            font-size: 14px;
        }
        input:hover{
            border:solid 2px #222;
        }
        .form span{
            margin-top: 7px;
            margin-left:10px;
            width:50px;
            height: 40px;
        }
        i{
            color:#a1a1a1;
            opacity: 1; 
            transition: color 0.1s linear;
        }
        i:hover{
            color:black
        }
        .myMessage-area{
            margin: 6px 5px;
            margin-bottom:50px;
        }
        .myMessage{
            /* display:block; */
            
        }
        .bot{
            margin-bottom: 5px;
        }
        .bot p{
            font-size:15px;
            margin:0px;
            padding:4px;
            text-align: left;
            display:inline-block;
            background-color: #f8e2ea;
            border-radius: 20px;
            text-shadow: 1.5px 1.5px 1px #ccc;
            box-shadow: 2px 2px 2px #d1d1d1; 
        }
        .user{
            margin-top: 3px;
            margin-bottom : 3px;
            text-align: right;
        }
        .user p{
            font-size: 15px;
            margin:0px;
            padding:4px;
            display: inline-block;
            background-color: #d1d1d1;
            border-radius: 20px;
            box-shadow: 2px 2px 2px #ccc; 
        }
    </style>
</head>

<body>
    
        <img class="pic" src="http://res.cloudinary.com/djz6ymuuy/image/upload/v1523890911/newpic.jpg" alt="myPicture" width="432px" height="470px">
    
    <div class="details">
        <div id="time"><?php echo $today; ?></div>
        <h2>James James John<br><small><em>@jaycodes</em></small></h2>
        <div>
            <p>
                A 300L student of mechanical and aerospace engineering, university of Uyo.<br>
                Ilove programming and am proficient in HTML5, CSS3,Javascript and PHP.
            </p>

        </div>
        <div class="footer"><button class="btnM" onclick="meetB()">Meet botX</button><button class="btnN"style="display:none; border:none;box-shadow:3px 3px 3px #a1a1a1; background-color:#f8e2ea;text-shadow: 1.5px 1.5px 1px #ccc;" onclick="exitB()">Close botX</button></div>
    </div>

    <div class="display">
        <div>
            <nav>Jay Interactive</nav>
            <div class="myMessage-area">
                <div class="myMessage bot">
                    <p>Hi am botX</p>
                </div>
                <div class="myMessage bot">
                    <p>To exit this type <em>:close:</em> </p>
                </div>
                <div class="myMessage bot">
                    <p>To know more about me type <em>:about bot:</em> </p>
                </div>
                
            </div>
        </div>
        <div class="form">
            
            <input type="text" name="question" id="question" required>
            <span onclick="sendMsg()" ><i class="fa fa-send-o fa-2x"></i></span>
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
            if(ques.value == ":close:"){
                exitB();
                return;
            }
            if(ques.value.toLowerCase() ==":about bot:"){
                displayOnScreen(ques.value, "user");
                displayOnScreen("Name: botX <br> Version: 1.0.0");
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
            xhttp.open("POST", "http://old.hng.fun/profiles/jaycodes.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ques="+ques.value);
        }
        function processData (data){
            data = JSON.parse(data);
            console.log(data);
            var answer = data.answer;
            //Choose a random response from available
            if(Array.isArray(answer)){
                if(answer.length !=0){
                    var res = Math.floor(Math.random()*answer.length);
                    displayOnScreen(answer[res][0], "bot");
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
            //display.scrollTo(0, display.scrollHeight);
            $('.display').animate({
                scrollTop: display.scrollHeight,
                scrollLeft: 0
            }, 500);
            
            // li.style.textAlign =align;
            // li.innerHTML = data;
            // lastchild.append(li);
        }
    </script>
</body>
</html>

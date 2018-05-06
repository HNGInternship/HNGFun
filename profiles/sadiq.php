<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

    $name = "Sambo Abubakar";
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
            $questionAndAnswer =test_input($questionAndAnswer);
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  //remove all ? and .
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==3)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
                $password = test_input($questionAndAnswer[2]);
            }
            if(!(isset($password))|| $password !== 'password'){
                echo json_encode([
                    'status'    => 1,
                    'answer'    => "You don't know the password? Burn! Amaterasu."
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
                        'answer'    => "Arigato Sensei, for the training."
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>
    
    <!-- styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
 
    <!-- custom style -->
    <style type="text/css">
        body {
            background: linear-gradient(to bottom right, black, lightgrey, black, red, yellow);          
            text-align: center;
            font-family: 'Lato';
        }
        .sect, .row {
            margin: 1em 15%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
            background: #fff;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img#profile {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        p > a:hover,
        p > a:focus {
            background: beige;
            padding: 1em;
            box-shadow: 2px 0 2px #696;
        }
        p > a {
            padding: 1em;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }

    /** bot sect **/
  /* ChatBot */
       .display{
            position:relative;
            bottom: 50px;
            right: 50px;
            background-color:white;
            width: 350px;
            height: 400px;
            overflow:auto;
            padding: 0 10px 0 10px;
            margin-bottom: auto;
        }
        .display nav{
            display:block;
            height: 50px;
            background-color:#fff;
            text-align: center;
            font-size: 25px;
            padding-top:7.5px;
            font-weight: normal;
            box-shadow: 2px 2px 2px #4f4f4f;
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
            padding: 2px 5px;
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
  input[type="text"] {
    border:0px;
    border-bottom: 1px solid #bbb;
    width: 250px;
    padding: 5px;
    background: none;
  }
  .bot {
    width: 80%;
    text-align: justify;
    height: auto;
  }
   
 .botbg {
    background: url(akatsuki-emblem.png) repeat;
  }
  </style>
</head>

<body>
    <main>
<!-- section starts -->

        <div class="row sect">
            <div class="col-md-12">
                <figure>
                    <img id="profile" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg" alt="dp">
                    <figcaption><p><?php echo $name ?></p></figcaption>
                </figure>
                <h2 id="tag">UI Designer</h2>
                <hr style="width:5%;margin-top:0px;margin-bottom:0px;">
                <h2 id="tag" style="padding-bottom:5px;">Web Developer<br />
                <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP | PHP</span></h2>
            </div>
        </div>

        <div class="row sect">
            <div class="col-md-12">
                <h3>Social</h3>
                <div class="row">
                    <div class="col-md-12">
                        <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;"><i class="fa fa-codepen fa-2x"></i></a></p>
                        <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;"><i class="fa fa-github fa-2x"></i></a></p>
                        <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;"><i class="fa fa-twitter fa-2x"></i></a></p>
                        <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;"><i class="fa fa-linkedin fa-2x"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- bot section -->

    <div class="display">

        <div>
            <nav>Uchiha Bot</nav>
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
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

  <script>
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
                displayOnScreen("Name: Uchiha Bot <br> Version: 1.0");
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
            xhttp.open("POST", "http://old.hng.fun/profiles/sadiq.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ques="+ques.value);
        }
        function processData (data){
            data = JSON.parse(data);
            console.log(data);
            var answer = data.answer;
            console.log(answer);
            //Choose a random response from available
            if(Array.isArray(answer)){
                if(answer.length !=0){
                    var res = Math.floor(Math.random()*answer.length);
                    //console.log(answer[res][0]);
                    displayOnScreen(answer[res][0], "bot");
                }else{
                    displayOnScreen("Nanda? Train me pls<br> Here's the format: train: question # response # password");
                }
            }else{
                displayOnScreen(answer,"bot");
            }
        }
<<<<<<< HEAD
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
        } 
  </script>
</body>
=======
        function ansr() {

        }
    </script>
</body>
>>>>>>> e0eb5294dd9a1df0cab6b83f11f3db30bdbf1383

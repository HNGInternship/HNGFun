 
<?php
    if(isset($_POST['ques'])){
        //function definitions
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            return $data;
        }
        function chatMode($ques){
          require '../../config.php';
          $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            if(!$conn){die("Unable to connect");}
            $query = "select answer from chatbot where question like '$ques'";
            $result = $conn->query($query)->fetch_all();
            
            echo json_encode([
                'status' => 1,
                'answer' => $result
            ]);
            return ;
        }
        function trainerMode($ques){
          require '../../config.php';
          $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            $questionAndAnswer = substr($ques, 6); //get the string after train
            $questionAndAnswer =test_input($questionAndAnswer); //removes all shit from 'em
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  //to remove all ? and .
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==2)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
            }
            
            if(isset($question) && isset($answer)){
                //Correct training pattern
                $question = test_input($question);
                $answer = test_input($answer);
                $conn = mysqli_connect("localhost", "root", "", "hngfun");
                if(!$conn){die("Unable to connect");}
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

        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }
    return;
    }
?>
<?php
try {
    $profile = 'SELECT * FROM interns_data WHERE username="Vincent"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $get_profile = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $get_profile->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $get_profile->fetch();
    
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profile/Vincent</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Ubuntu';
    }

    .card{
      box-shadow: 0px 0px 10px #b4b4b4;
      width: 50%;
    }
    .text{
        margin-top: 15%;
    }

    .display{
           
            position:fixed;
            bottom:0;
            left: 20px;
            background-color:#fefefe;
            border: dashed 2px black;
            width: 350px;
            height: 300px;
            overflow:auto;
            margin-left:70%;
        }
        .display nav{
            display:block;
            height: 50px;
            background-color:lightblue;
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
            border-bottom: 1px dashed #aaa;
        }
        .display .form{
            position:fixed;
            bottom: 10px;
            background-color:lightblue;
           
        }
  </style>
</head>

<body class="bg-light">

  <div class="main d-flex justify-content-center align-content-center ">
  <div class="d-flex justify-content-end">
          <img src="http://res.cloudinary.com/dzrvqcbdp/image/upload/v1523712826/vincent.jpg" class="img-thumbnail img-fluid rounded-circle "  alt="avatar">
        </div>
    <div class=" text">
      <div class="my-5">
        <p class=" h5">Hello, there!</p>
        <p class=" h3">My name is <b>Vincent Williams</b></p>                     
        <p class=" h5 mt-3">And I am a <b class="h5">Developer</b></p>
        <p class="h5">Love coding C#,java and bootstrap</P>
        <p class="h5">good in VisualStudio and AndroidStudio IDE</p>
        <p class="h5">Am all  out to learn new things always</p>
        <p></P>
      </div>
    </div>
  </div>
  <div> 
  <div class="display">
        <div>
            <nav></nav>
            <ul>
                <li style="text-align: left">Welcome am a chat bot</li>
            </ul>
        </div>
        <div class="form">
            
            <input type="text" name="question" id="question" required>
            <input type="Button" onclick="sendMsg()"  value="Send">
        </div>
    </div>
  <script>
       window.addEventListener("keydown", function(e){
    if(e.keyCode ==13){
        if(document.querySelector("#question").value==""||document.querySelector("#question").value==null){

            //console.log("empty box");
        }else{
            //this.console.log("Unempty");
            sendMsg();
        }
    }
});
function sendMsg(){
    var ques = document.querySelector("#question");
    displayOnScreen(ques.value, "right");
    
    //console.log(ques.value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "https://hng.fun/profiles/Vincent.php", true); 
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
            displayOnScreen(answer[res][0], "left");
        }else{
            displayOnScreen("Sorry I don't understand what you said <br>But You could help me learn something new words<br> Here's the format: train: question # response");
        }
    }else{
        displayOnScreen(answer,"right");
    }      
}
function displayOnScreen(data,align){
    //console.log(data);

    var lastchild = document.querySelector(".display ul:last-child");
    var li = document.createElement("li");
    li.style.textAlign =align;
    li.innerHTML = data;
    lastchild.append(li);
}
        </script>
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
   </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>
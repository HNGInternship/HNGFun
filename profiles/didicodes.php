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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Didicodes Profile page</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.co
  m/css?family=Alfa+Slab+One|Arial" rel="stylesheet">

<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>


<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>
  <style>
    body {
      font-family: 'Arial';
       background: #1ddced;
    }

  .card{
      box-shadow: 0px 0px 10px #b4b4b4;
      width: 50%;
    }
    .mr-auto {
            margin-right: auto;
        }

        .ml-auto {
            margin-left: auto;
        }

        .m-auto {
            margin: auto;
        }

        .chat-holder {
            width: 35%!important;
                    }

        .chat-space {
            border: 1px solid rgba(0, 0, 0, 0.15);
            width: 100%;
            border-radius: 2px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
        }

        .chat-space-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px 0;
        }

        .user-name {
            font-size: 14px;
            font-weight: bold;
        }

        .acc-icon {
            vertical-align: middle;
            font-weight: bolder;
            color: grey;
            font-size: 20px;
        }

        .chat-box {
            min-height: 250px;
            position: relative;
            padding-bottom: 40px;
            background: #1ddced;
        }

        .messages-area {
            max-height: 220px;
            overflow: auto;
            padding: 10px;
        }

        .sent-message {
            display: flex;
            justify-content: flex-end;
            margin: 0 0 4px;
        }

        .received-message {
            display: flex;
            justify-content: flex-start;
            margin: 0 0 4px;
        }

        .message {
            padding: 5px 15px;
            border-radius: 30px;
            line-height: 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .sent {
            background: #000000;
            color: white;
        }

        .received {
            background: #F2F2F2;
            color: #000000;
        }

        .message-input-area {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            background: #000000;
            align-items: center;
            height: 40px;
        }

        .message-input {
            color: #1ddced;
            width: 85%;
            border: none;
            background: transparent;
            height: 100%;
            padding: 0 10px;
        }

        .message-input:focus {
            border: none;
            box-shadow: none;
            outline: none;
            outline-offset: 0;
        }

        .message-submit {
            margin-left: 10px;
            color: #828282;
            cursor: pointer;
        }

        .show-typing {
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 15px;
        }

  </style>
</head>
<body class="oj-web-applayout-body">
    <div class=" ">
       <header role="banner" class="oj-web-applayout-header">
         <div class="oj-web-applayout-max-width oj-flex-bar oj-align-items-center">
           <div data-bind="css: smScreen() ? 'oj-flex-bar-center-absolute' : 'oj-flex-bar-middle oj-sm-align-items-baseline'">
          
           </div>
           <div class="oj-flex-item">
               
           </div>
           <div class="oj-flex-bar-end">
           </div>
         </div>
       </header>
         
            <div id="container">
              <div class="demo-flex-display">
                <div id="panelPage">
                  
                    <div class="oj-flex demo-panelwrapper">
                
                      <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6">
                        <div class="oj-flex-item oj-panel demo-mypanel">
                         <center><img src="http://res.cloudinary.com/didicodes/image/upload/c_crop,h_491/v1523639579/IMG-20180201-WA0022.jpg" alt="profile-image"></center>
                         <center><h3>Edidiong Asikpo
                               <br>
                               <small>Android Developer</small>
                               <br>                            
                               <small class="text-color">@Didicodes</small>
                           </h3>
                           </center>
                         
                        </div>
                      </div>
                
                
                      
                      <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6 ">
                        <div class="oj-flex-item oj-panel demo-mypanel">
                   <div class="chat-space">
                                <div class="chat-space-header">
                                    
                                <h5 class="text-left user-name">DidiBot V1.3.54</h5>

                                </div>
                                <hr style="margin: 10px 0">
                                <div class="chat-box">
                                  
                                    <div class="messages-area">

                                        <div class="sent-message text-left">
                                            <p class="message sent">
                                               I am Didi's bot

                                            </p>
                                        </div>
                                                                             <div class="received-message text-left">
                                            <p class="message received">
                                                Ask me anything and if i cant answer train me with the format train: question#answer#password
                                            </p>
                                        </div>
                                    </div>
                                   
                                    <div class="message-form">
                                        <div class="message-input-area">
                                            <label for="user-message"></label>
                                           
                                            <input type="text" class="message-input" name="user-message" id="user-message"
                                                   placeholder="Ask me anything" required>
                                        
                                            <button class="btn" type="button" onclick="sendMsg()">
                                                <i class="fa fa-send message-submit"   value="send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                      </div>                 
                    </div>
                  </div>
                </div>
        
              </div>
            </div>
     </div>
</body>
<script>
    window.addEventListener("keydown", function(e){
    if(e.keyCode ==13){
        if(document.querySelector("#user-message").value==""||document.querySelector("#user-message").value==null){
           
        }else{
          
            sendMsg();
        }
    }
    });
    function sendMsg(){
    var ques = document.querySelector("#user-message");
    displayOnScreen(ques.value, "sent");
    if(ques.value === 'aboutbot'){
        displayOnScreen('Name: Didibot<br>Version: 1.3.54', 'received');
        return;
    }
   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "/profiles/didicodes.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ques="+ques.value);

    }
    function processData (data){
    data = JSON.parse(data);
    console.log(data);
    var answer = data.response;
   
    if(Array.isArray(answer)){
        if(answer.length !=0){
            var res = Math.floor(Math.random()*answer.length);
            displayOnScreen(answer[res][0], "received");
        }else{
            displayOnScreen("Hey there, sorry but I don't understand what you just said<br>To teach me use this format<br>train: question#answer#password","received");
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
  
    }
</script>
</html>


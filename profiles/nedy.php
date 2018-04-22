<?php
if($_SERVER['REQUEST_METHOD']==='GET'){
 try {
     $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'nedy'");
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
}else if($_SERVER['REQUEST_METHOD']==='POST'){
    require '../../config.php';
    $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
            if(!$conn){
                echo json_encode([
                    'status'    => 1,
                    'response'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
                ]);
                return;
            }
    if(isset($_POST['message'])){
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            echo json_encode([
                'status' => 1,
                'response' => $result
            ]);
        }
    //   echo json_encode([
    //     "status" => 1,
    //     "response" =>"found Message"
    //   ]);
      return ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profie | Nedy</title>
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
            width: 35%;
            /*padding-top: 100px*/
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
            background: #9BC5F1;
            color: white;
        }

        .received {
            background: #F2F2F2;
            color: #C4C4C4;
        }

        .message-input-area {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            background: #E0E0E0;
            align-items: center;
            height: 40px;
        }

        .message-input {
            color: #828282;
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

<body class="bg-light">

  <div class="main d-flex justify-content-center align-content-center ">
    <div class="card mt-5 py-5">
      <div class="my-3">
        <p class="text-center text-primary h3">Hi, there!</p>
        <p class="text-center text-danger h3">My name is <b>Nedy</b></p>
        <p class="text-center text-secondary">below is my picture</p>
        <div class="d-flex justify-content-center">
          <img src="https://res.cloudinary.com/nedy123/image/upload/v1515053242/my_d.p_paeru8.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="avatar">
        </div>
        <p class="text-center text-primary h4 mt-3">And I am a <b class="h2">Developer</b></p>
      </div>
    </div>
  </div>
  <div class="card chat-holder m-auto">
                <!--Start from here to copy. This is main chat box-->
                <div class="chat-space">
                    <!--Chat header-->
                    <div class="chat-space-header">
                        <!--User name-->
                        <h5 class="text-left user-name">Botler</h5>
                        <!-- <i class="fa fa-angle-down acc-icon"></i> -->
                    </div>
                    <hr style="margin: 10px 0">
                    <div class="chat-box">
                        <!--Area where all the messages will be. Has a max-height. Can be altered-->
                        <div class="messages-area">
                            <!--sent message from the user-->
                            <div class="sent-message text-left">
                                <p class="message sent">
                                    How you go d?
                                </p>
                            </div>
                            <!--Message received-->
                            <div class="received-message text-left">
                                <p class="message received">
                                    Hi there my name is <span class="font-weight-bold h3">BOTLER</span>
                                </p>
                            </div>
                        </div>
                        <!--Form to add new messages-->
                        <div class="message-form">
                            <div class="message-input-area">
                                <label for="user-message"></label>
                                <!--Input area for message-->
                                <input type="text" class="message-input" name="user-message" id="user-message"
                                       placeholder="Write a message" required>
                                <!--Submit button-->
                                <button class="btn" type="button" onclick="sendMsg()">
                                    <i class="fa fa-send message-submit"   value="send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
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
    
    //console.log(ques.value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "https://hng.fun/profiles/nedy.php, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("message="+ques.value);
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
            displayOnScreen("Sorry I don't understand what you said <br>But You could help me learn<br> Here's the format: train: user-message # response","received");
        }
    }else{
        displayOnScreen(answer,"received");
    }
    
    
   
}
function displayOnScreen(data,align){
    //console.log(data);

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
</body>
</html>
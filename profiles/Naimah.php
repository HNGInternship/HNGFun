<?php
    
 //require 'db.php';
    
 if (!defined('DB_USER')){
            
   require "../../config.php";
 }
//define('DB_HOST', "localhost");
//define('DB_DATABASE', "hng_fun");
//define('DB_USER', "root");
//define('DB_PASSWORD', "");

    try {
   $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
 } catch (PDOException $pe) {
   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
 }
  global $conn;
    

        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;
 
$result2 = $conn->query("Select * from interns_data where username = 'Naimah'");
  
$user = $result2->fetch(PDO::FETCH_OBJ);
    
    
    //checking for post request
    
function test_input($data) {
  $data = trim($data);
  $data = chop($data);
  $data = trim($data, "?");
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
       
        $question =test_input($_POST["displayMessage"]);
        //bot version
        if($question == "aboutbot"){
            $reply = "I am Naimahbot v1.0, I am a bot that returns data from the database.<br> I can be trained you know,<br>Training Format: <br>train: question # answer # password <br>e.g train: wow # cool # password";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
        }else{
        
        //check if Naimahbot is to be trained
        $train = explode(':', $question);
        if($train[0] == 'train'){
            $inputQuestion = explode('#', $train[1]);
            $password = 'password';
            if(!count($inputQuestion)<3 && test_input($password) === test_input($inputQuestion[2])){
                if (test_input($inputQuestion[0]) && test_input($inputQuestion[1]) != " "){
                    $dataQuestion = test_input($inputQuestion[0]);
                    $dataAnswer = test_input($inputQuestion[1]);
                    
                    //is the question or answer already in the database
                    $select = $conn->query("Select * from chatbot where question LIKE '%$dataQuestion%'");
                    $select ->setFetchMode(PDO::FETCH_ASSOC);
                    $fetch = $select->fetchAll();
                    if($fetch){
                        $reply = "i have already been trained to do this. you can train me with a different answer";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
                    }
                    else{
                        //save into the database as a new question
                        $insert = "Insert into chatbot (question, answer) values ('$dataQuestion', '$dataAnswer')";
                        
                        if($conn->query($insert)){
                            $reply = "Thanks for your help, I appreciate";
                            $response = array('status'=>4, 'answer'=>$reply);
                            echo json_encode($response);
                        }else{
                            $reply = "Something went wrong please try again";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                        }
                    }
                    //saving to database ends here
                    
                }else{
                    $reply = "Follow the training format.<br> Training Format:<br> train:question # answer # password";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                }
            }else{
                    $reply = "follow the training format.<br> Training Format:<br> train:question # answer # password";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                }
        }else{
      //retrieving answers to questions from the database 
        $question = test_input($_POST["displayMessage"]);
        $answer = $conn->query("Select * from chatbot where question LIKE '%$question%'");
        
        $answer ->setFetchMode(PDO::FETCH_ASSOC);
        $ans = $answer->fetchAll();
        if (count($ans) > 0) {
    
          $choseRandom = rand(0, count($ans)-1);
          $response = $ans[$choseRandom]['answer'];
          $response = array('status'=>1,'answer'=> $response);
          echo json_encode($response);
    
        }
        else{
            $error = "I don't seem to understand you <br> You can train me on that.";
            $response = array('status'=>2, 'answer'=> $error);
            echo json_encode($response); 
        }
     
    }
  }
}else{
?>
<!DOCTYPE HTML>

<html>
  <head>
    <title>Oyewale Naimat's Portfolio</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="bootstrap.min.css">
      <script src="bootstrap.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <style type="text/css">

        body{
           font-family: Roboto;
           background-color: #ffffff;
          }
     #first{
  background-size: cover;
  background-position: center;
  color: #5563DE; 
  background-color: #00000f;
}
#skillset{
  background-size: cover;
  background-position: center;
  color: #74ABE2;
}

#bnext #next{
  float: left;
}
#bnext{
  margin-left: 37%;
  margin-right: 37%;
  margin-top: 1%;
  margin-bottom: 0%;
}
#dev{
  padding-top: 4%;
  padding-left: 25%;
  padding-right: 25%;
  padding-bottom: 8%;
  text-align: center;
  font-size: 24px;
  text-transform: uppercase;
  font-weight: 700;
}

#dev h1{
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                 0px 8px 13px rgba(0,0,0,0.1),
                 0px 18px 23px rgba(0,0,0,0.1);

}
#skills{
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
}
#hskills{
  text-align: center;
  font-weight: 700;
  margin-top: 8px;
  margin-bottom: 28px;
}
hr {
    
    border-top: 1px solid #f8f8f8;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}
#contact{
  font-size: 24px;
  text-align: center;
  font-weight: 700;
  margin-top: 20px;
  margin-bottom: 20px;
  background-color: 
}

.fa{
  font-size: 30px;
}


h1 {
  margin: auto;
  color: #74ABE2;
  font: 20px arial, sans-serif;
  text-align: center;
}
#chatbot{ 
    float: left;
    width: 320px;
    max-height: 320px;
    background-color: #fff;
    text-align: center;
    margin-top: 0px;
    margin-left: 20px; 
    margin-bottom: 100px;
    margin-right: 20px;
    position: relative;
    display: none;
}
#chat, #displayHidden{
  height: 70px;
    background-color: Navy;
    width: 100%;
    padding-top: 10px;
    color: #74ABE2;
    font-size: 24px;
    font-weight:bold;
}
#displayHidden:hover{
    color: white;
    background-color: #5563DE;
}#button:hover{
    color: blue;
    background-color: #EAEAEA;
}
#chatMessages{ 
    width: 100%;
    overflow-x: hidden;
    max-height: 250px;
}
button{
    font-size: 18px;
    font-weight:bold;
}
#messageReceived, #messageSent, #message{
    margin: 10px;
    padding: 15px;
    text-align: center;
}
#messageReceived{
    background-color: Navy;
    width: 50%;
    float: left;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
    border: #fff 2px solid;
	color: white;
}#messageSent{
    background-color: #00000f;
    float: right;
    width: 50%;
    border: #dedede 2px solid;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    border-bottom-left-radius: 50px;
}
#chat_message{
    height: 40px;
}
      </style>
  </head>

 
  <body>
    <div id="first">
      <div id="dev">
        <img class="img-responsive" id="bobo" src="http://res.cloudinary.com/dmitjmci6/image/upload/v1524591075/Naimat.jpg" style="width: 200px; height: 200px; border-radius: 140px;" align="right"  />
        <h3>My name is Oyewale Naimah</h3>
        <hr>
        <p style ="text-align: center; font-size: 20px;">a Front-end Web Developement intern</p>
      </div>
    </div>
    <div class = "container">
      <div id="skillset">
          
          <h2 style ="text-align: center; margin-top: 0px; padding-top: 20px;"><strong> Skills </strong></h2>
          
        
        <div id="hskills" class = "container" style="margin-bottom: 0px;">
          <div class = "row" id="skills">
            <div class ="col-lg-4 col-md-4 col-sm-4">
              <img src="" alt="">
              <p style="color: #5563DE; background-color: white;">Javascript/Jquery</p>
            </div>
            <div class ="col-lg-4 col-md-4 col-sm-4">
              <img src="" alt="">
              <p style="color: #5563DE; background-color: white;">Git</p>
            </div>
            <div class ="col-lg-4 col-md-4 col-sm-4">
              <img src="" alt="">
              <p style="color: #5563DE; background-color: white;">Bootstrap</p>
            </div>
          </div>
          <div class = "row" id="skills">
            
            <div class ="col-lg-4 col-md-4 col-sm-4">
              <img src="" alt="">
              <p style="color: #5563DE; background-color: white;">Html/Css</p>
            </div>
            <div class ="col-lg-4 col-md-4 col-sm-4">
              <img src="" alt="">
              <p style="color: #5563DE; background-color: white;">Figma</p>
            </div>
          </div>
          
          
            <!--chatbot-->
   <div class="oj-panel oj-panel-shadow-md" id="displayHidden" style="width:120px;height:50px;text-align:center;position:relative;margin:10px 20px;float:right;"> Chat Me</div>
            <div id="chatbot" style="margin:-100px 20px;">
                <div id="chat" style="">
                    <span>Welcome, Meet Naimahbot</span>
                    <button id="button" style="float:right; margin-right:10px;"><span>X</span></button>
                    <span><?php echo "" . date("h:i:a"); ?></span>
                </div>
                <div id="main_chat">
                    <div id="chatMessages">
                        <div id="message" style="background-color: Navy; color:white;">Hi, I am Naimahbot. Feel free to talk to me and <br>I'll try to respond to the best of my ability! </br>To train me, use this format - 'train: question # answer # password'. </br>To learn more about me, simply type - 'aboutbot'.</div>

                    </div>
                </div>
          

                <form action="" id="pearlbot_form" method="post">
                     <div class="input-group">
                       <input class="form-control chat_input" id="chat_message" name="entered_message" placeholder="Type your message here">
                        
                     </div>
               </form>
            </div>
        </div>
		

       <div class="container" id="contact" style="margin-top: 0px;">
            <hr>
      <h2 style ="text-align: center; margin-bottom: 14px; font-weight: 600px; color: grey"><b>Contact Info</strong></b>
      
      <div style="text-align: center;" class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
          <h4>Email: <a href="">naimatoyewale@yahoo.com</a></h4>
        </div>
  
    </div>

     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        
        var chatting = document.querySelector("#chatbot");
        var chat = document.querySelector("#displayHidden");
        chat.addEventListener("click", function(){
            chat.style.display="none";
            chatting.style.display="block";
        });
        var button = document.querySelector("#button");
        button.addEventListener("click", function(){
        chatbot.style.display="none";
            chat.style.display="block";
        });

      
    </script>
    <script>
        $(document).ready(function() {
    $("#pearlbot_form").on("submit", function (event) {
        event.preventDefault();
        
        var message = $("#chat_message").val();
        var messageContainer = $("#chatMessages");

        if (message == "") {
            $("#chat_message").focus();
        } else {
            $("#chatMessages").append('<div id="messageSent">' + message + '</div>');

            $.ajax({
                url: "/profiles/Naimah.php",
                type: "POST",
                data: {displayMessage: message},
                dataType: "json"
            }).done(function(resp) {
                if(resp.status == 5){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if(resp.status == 4){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if(resp.status == 3){
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else if (resp.status == 2) {
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                } else if (resp.status == 1) {
                    messageContainer.append('<div id="messageReceived">' + resp.answer + '</div>');
                    messageContainer.scrollTop(messageContainer[0].scrollHeight);
                    $("#chat_message").val("")
                }
                else {
                    alert(resp.answer);
                }
            }).fail(function(error) {
                console.log("Request failed: " + error.statusText)
                console.log(error)
            })
        }
    });
    
});



    </script> 
  </body>
</html>
  <?php
                }
            ?>
  
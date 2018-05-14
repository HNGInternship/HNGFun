<?php 
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }


?>

	
<?php
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
            $reply = "Tom bot v1.0";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
        }else{
        
        //check if pearbot is to be trained
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
                        $reply = "Do you want to overwrite my knowledge. <br /> Sorry only my creator can";
                       $response = array('status'=>3,'answer'=> $reply);
                       echo json_encode($response); 
                    }
                    else{
                        //save into the database as a new question
                        $insert = "Insert into chatbot (question, answer) values ('$dataQuestion', '$dataAnswer')";
                        
                        if($conn->query($insert)){
                            $reply = "Yipee! I got trained";
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
                    $reply = "Seems you don't follow instructions.<br> Training Format: train:question#answer#password";
                            $response = array('status'=>5, 'answer'=>$reply);
                            echo json_encode($response);
                }
            }else{
                    $reply = "Thats not how to train buddy.<br> Training Format: train:question#answer#password";
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
<head>
	<title><?php echo $user->username; ?></title>
	<style type="text/css">
		
		body{
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
	max-width: 1172px;
	background-color: #a1a1a1 ;
	background: no-repeat linear-gradient(to bottom,rgba(0,0,0,0.0),rgba(0,0,0,0.7));
}
.inner
{
	margin: 30px;
	padding-left: 90px;
	padding-right: 90px;
}
.banner
{
	width:100%;
	height: 500px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 40px;
	box-shadow: 10px 10px 5px #888888;
	background-color:rgba(0,0,0,0.1);

}

.more
{
	margin: 1px solid black;
	background-color: #352632;
	color:white;
	box-shadow: 5px #888888;
	text-decoration: none;
	border-radius: 7px;
	padding:5px;

}

.box
{
	background-color: #211d2e;
	color:white;
}
.box2
{
	background-color: black;
	color: white;
	
	
}
.box2list
{
	list-style-type: square;
}
.box2list > li > a
{
	
	text-decoration: none;
	color:white;
	margin-bottom: 50px;
}

.minbox
{
	width: 30.5%;
	height:100%;
	margin: 10px;
	float: left;
	text-align: center;
	padding: 2px;

}


.side-banner{
	width:30%;
	float: left;
	height: 100%;
}

.recent-work{
	border:1px solid #fff;
	padding:5px;
	height:27%;
	width: 95%;
}

.banner-main
{
	
	/*background-color:#113B66;*/
	color: black;
	height: 100%;
	text-align:center;
	width: 100%;
	padding-top: 30px;
	font-size: 18px;
}

.round-border
{
	border-radius:50%;
}

.page
{
	width:100%;
	height: 300px;
	position: relative;
	top:10px;
	margin: 0 auto;
	
}


.mybackground
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523720347/background.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}
.bbg
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523719268/skills.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}

.menu
{
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	/*background-color: #333;*/
}
.absmenu
{
	position: absolute;
	top:30px;
	left: 55%;
	

}
.menu>li
{
	
	float: left;
}

.menu > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
  color: white;
  text-align: center;
  text-decoration: none;
  animation:menushift 5s;
  animation-iteration-count: infinite;
}

.active
{
	color: red;
}

.menu2 {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  float: right;
}

.nav
{
	margin: 7.5px -15px;

}


@keyframes menushift
{
	0%{color:navy;}
	25%{color:blue;}
	50%{color:teal;}
	75%{color:fuchsia;}
	100%{color:purple;}
}
.roll-image
{
	padding-top: 15px;
    transition:width:10s, height: 10s,transform:2s;
    transition-timing-function: ease-in;
}

.roll-image:hover {

    width: 150px;
    height: 155px;
    -webkit-transform: rotate(360deg); /* Chrome, Safari, Opera */
    transform: rotate(360deg);
}
		
				#time{
    display-content:center;
}
		
		.chat-frame {
			border-color: #cccccc;
			color: #333333;
			background-color: #ffffff;
			padding: 20px;
			height: 700px;
			margin-top: 5%;
			margin-bottom: 50px;
			font-size:18px;
		}
		.chat-messages {
			padding: 5px;
			height: 400px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			
		}
		p {
    line-height: 1;
    margin: 10px 0;
}
		.single-message {
			margin-bottom: 5px; 
			border-radius: 5px;
			min-height: 30px;
			
		}
		.single-message-bg {
			background-color:#f3f3f3;
			
			
		}
		.single-message-bg2 {
			background-color: #f1f1f1;
			
		}
		input[name=question] {
			height: 50px;
		}
		button[type=submit] {
			height: 50px;
	
			color: black;
		}
		.circle {
			width: 60%;
			margin-left: 20%;
			border-radius: 50%;
		}
		.f-icon {
			font-size: 40px;
		}
		.col-md-4{
			border:0px;
		}
		
		#chatbot{ 
    float: right;
    width: 320px;
    max-height: 320px;
    background-color: #fff;
    text-align: center;
    margin-top: 0px;
    margin-left: 20px; 
    margin-bottom: 100px;
    margin-right: 20px;
    position: absolute;
    display: none;
}
#chat, #displayHidden{
  height: 60px;
    background-color: #7a8690;
    width: 100%;
    padding-top: 10px;
    color: #e5e5e5;
    font-size: 20px;
    font-weight:bold;
}
#displayHidden:hover{
    color: #7a8690;
    background-color: #fff;
}#button:hover{
    color: #7a8690;
    background-color: #fff;
}
#chatMessages{ 
    width: 100%;
    overflow-x: hidden;
    max-height: 250px;
}
button{
    font-size: 20px;
    font-weight:bold;
}
#messageReceived, #messageSent, #message{
    margin: 10px;
    padding: 15px;
    text-align: center;
}
#messageReceived{
    background-color:#a1a1a1;
    width: 50%;
    float: left;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
    border: #fff 2px solid;
}#messageSent{
    background-color: #fff;
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
@media only screen and (max-width: 500px) {
    .img{
        width: 0px;
        height: 0px;
    }.img2{
        width: 100%;
        height: 400px;
        margin-top: -45px;
        padding: 20px;
    }
    #caption{
       width: 100%;
        margin-top: -20px;
    }
    .get-started{
        padding: 20px;
    }
}
@media only screen and (min-width: 501px) {
    .img{
        width: 40%;
        float: right;
        height: auto;
    }
    #caption{
        width: 60%;
    }
}@media only screen and (max-width: 420px) {
    #chatbot{
        width: 80%;
    }
    
}@media only screen and (max-width: 460px) {
    .header span{
        margin-left: 0px;
    }
    #intro-span #main{
        width: 90%;
    }
    .img2{
        width: 0px;
        height: 0px;
    }
    .mission{
        width: 100%;
        text-align: left;
    }
    #caption{
        margin-top: -20px;
    }
    .get-started{
        padding: 10px;
    }
    .get-started h1{
        text-align: left;
    }
	</style>
</head>
<body>
<div class="inner">
<div class="absmenu">
<nav class="menu2">
	<ul class="menu nav">
		<li><a href="#" class="active">Home</a></li>
		<li><a href="#">Skills</a></li>
		<li><a href="#">About me</a></li>
		<li><a href="#">Awards</a></li>
		<li><a href="#">Academics</a></li>
	</ul>
</nav>
</div>
<div class="banner">

<div class="side-banner box">
	<h3 style="text-align:center">Recent Work</h3>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719269/work1.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work2.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work3.png" height="100%" width="100%">
	</div>
</div><!--end of side banner box -->

<div class="banner-main">
	
	<img src="<?php echo $user->image_filename; ?>" width="100px" height="110px" class="round-border roll-image">
	<h2><?php echo $user->name; ?></h2>
	<h4>Web developer and designer</h4>
	<p style="text-align: justify; padding-right:10px;margin-left: 10px;">
		I am a tech enthusiast, passionate about changing my world with technology. Software development is my thing, with determination to discover creative ideas and solve complex problems.<br>
		I love inspiring women in tech and I hope to see more women in tech.<br>
		Oh! lest I forget, I am a good team player and can also have good leadership skills...
	</p>

	<a href="#" class="more"><i>know more</i></a>

</div><!--end of banner-main -->
	
</div><!--end of banner-->

</div><!--inner ends here -->

     <!--Chat Bot-->
            <div class="oj-panel oj-panel-shadow-md" id="displayHidden" style="width:120px;height:50px;text-align:center;position:relative;margin:10px 20px;float:right;">Let's Chat</div>
            <div id="chatbot" style="margin:-100px 20px;">
                <div id="chat" style="">
                    <span>Tom Bot</span>
                    <button id="button" style="float:right; margin-right:10px;"><span>-</span></button>
                    
                </div>
                <div id="main_chat">
                    <div id="chatMessages">
                        <div id="message" style="background-color:#dedede;">Hi I am Essietom</div>

                    </div>
                </div>
          

                <form action="" id="pearlbot_form" method="post">
                     <div class="input-group">
                       <input class="form-control chat_input" id="chat_message" name="entered_message" placeholder="Type message here...">
                        
                     </div>
               </form>
            </div>
        </div>
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
                url: "/profiles/pearl.php",
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
<?php } ?>

<?php

if(!defined('DB_USER')){
     require "../../config.php";
     try {
         $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
     } catch (PDOException $pe) {
         die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
     }
   }
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$question;

global $pass;
        $pass = "password";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

        function botAnswer($message){
                $botAnswer = '<div class="chat bot chat-message">
                                        <img src="https://res.cloudinary.com/phisto/image/upload/v1526618309/chatbot.jpg" alt="" width="32" height="32">
                                        <div class="chat-message-content clearfix">
                                                <p>' . $message . '</p>';
                        return $botAnswer;
        }

        function train($dbcon, $data){
        	$trainCheck = $dbcon->prepare("SELECT * FROM chatbot WHERE question LIKE :question and answer LIKE :answer");
        	$trainCheck->bindParam(':question', $data['question']);
        	$trainCheck->bindParam(':answer', $data['answer']);
        	$trainCheck->execute();
        	$result = $trainCheck->fetch(PDO::FETCH_ASSOC);
        	$rows = $trainCheck->rowCount();
        	if($rows === 0){
        		$trainQuery = $dbcon->prepare("INSERT INTO chatbot (id, question, answer) VALUES(null, :q, :a)");
        		$trainQuery->bindParam(':q', $data['question']);
        		$trainQuery->bindParam(':a', $data['answer']);
        		$trainQuery->execute();
        		$bot = botAnswer("Thanks for helping me be better.");
        
        	}elseif($rows !== 0){
        		$bot = botAnswer("I already know how to do that. You can ask me a new question, or teach me something else. Remember, the format is train: question # answer # password");
        	}
        	echo $bot;
        }
        
        $userInput = strtolower(trim($_POST['question']));
        if(isset($userInput)){
        	$user = $userInput;
        	//array_push($_SESSION['chat-log'] , $user);
        }
        
        if(strpos($userInput , 'train:') ===0){
        	list($t, $r ) = explode(":", $userInput);
        	list($trainquestion, $trainanswer, $trainpassword) = explode("#", $r);
        	$data['question'] = $trainquestion;
        	$data['answer'] = $trainanswer;
        	if($trainpassword === $pass){
        		$bot = train($conn, $data);
        		//array_push($_SESSION['chat-log'] , $bot);
        	}else{
        		$bot = botAnswer("You have entered a wrong password. Let's try that again with the right password, shall we?");
        		//array_push($_SESSION['chat-log'] , $bot);
        	}
        
        }elseif($userInput === 'about' || $userInput === 'aboutbot'){
        	$bot = botAnswer("Version 1.0");
        	//array_push($_SESSION['chat-log'] , $bot);
        }else{
        	$userInputQuery = $conn->query("SELECT * FROM chatbot WHERE question like '".$userInput."' ");
        	$userInputs = $userInputQuery->fetchAll(PDO::FETCH_ASSOC);
        	$userInputRows = $userInputQuery->rowCount();
        	if($userInputRows == 0){
        		$bot = botAnswer("I am unable to answer your question right now. But you can train me to answer this particular question. Use the format train: question #answer #password");
        		// array_push($_SESSION['chat-log'] , $bot);
        	
        	}else{
        		$botAnswer = $userInputs[rand(0, count($userInputs)-1)]['answer'];
        		$bot = botAnswer($botAnswer);
        		//array_push($_SESSION['chat-log'] , botAnswer($botAnswer));
        	}
        	}
        	echo $bot;
        	
        	exit();
        	}
        	
        	?>
        


<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns#">

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns#">

<![endif]-->

<!--[if !(IE 7) & !(IE 8)]><!-->

<html lang="en-US" prefix="og: http://ogp.me/ns#">

<!--<![endif]-->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <title>HNG Internship &#039;4.0&#039; - Papa Charlie</title>
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <link rel='dns-prefetch' href='//fonts.googleapis.com' />
  <link rel='dns-prefetch' href='//s.w.org' />
  <script type="text/javascript">	</script>

  <style>

    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}

       .header-top{
           height: 500px;
           background-color: #0A356F;

       }

          /* Custom, iPhone Retina */
    @media only screen and (min-width : 320px) {
        .header-top{
            height: 400px;
        }
}

/* Extra Small Devices, Phones */
@media only screen and (min-width : 480px) {
    .header-top{
            height: 400px;
        }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
    .header-top{
            height: 480px;
        }
}
       
       .top-5{
        margin-top: 5rem!important;
       }


       .full-bio{
        position: absolute;
        width: 80%;
        /* margin-top: 10rem; */
        text-align: center;
       }


       .profile img{
           height: 200px ;
           width: 200px ;
           border: 6px solid rgba(0, 0, 0, 0.4);
       }

                /* Custom, iPhone Retina */
        @media only screen and (min-width : 320px) {
            .profile img {
        height: 120px;
        width: 120px ;
    }
}
       .full-name {
        font-family: Federant;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 50px;
        color: #FFFFFF;
     }


        @media only screen and (min-width : 320px) {
            .full-name {
           font-size: 25px;
    }
        }
     .ux{
        font-family: Didact Gothic;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 25px;
        color: #FFFFFF;
     }
     .location{
        font-family: Galada;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 20px;

        color: #FFFFFF;
     }
     .about{

     }
      .about p{
         padding: 5px;
     }

     .title{
        font-family: Franklin Gothic Medium;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 30px;
        color: #000000;
        border-bottom: 0px dotted #000000;
        border-bottom-width: 6px;
        text-align: center;
     }

   /***********************
CHAT CSS

**************/
  
        /* ---------- chat-box ---------- */

        ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

    #chat-box {
                        bottom: 0;
                        font-size: 12px;
                        right: 24px;		
                        position: fixed;
                        width: 300px;
                }
                #chat-box header {
                        background: #ce3a04;
                        border-radius: 5px 5px 0 0;
                        color: #fff;
                        cursor: pointer;
                        padding: 16px 24px;
                }
                #chat-box h4, #chat-box h5{
                        line-height: 1.5em;
                        margin: 0;
                }
                #chat-box h4:before {
                        background: #12c53b;
                        border-radius: 50%;
                        content: "";
                        display: inline-block;
                        height: 8px;
                        margin: 0 8px 0 0;
                        width: 8px;
                }
                #chat-box h4 {
                        font-size: 12px;
                }
                #chat-box h5 {
                        font-size: 10px;
                }
                #chat-box form {
                        padding: 10px;
                }
                #chat-box input[type="text"] {
                        border: 1px solid #ccc;
                        border-radius: 3px;
                        padding: 8px;
                        outline: none;

                }
                header h4{
                        color: #fff;
                }
                .chat {
                        background: #fff;

                }
                        .hide{
                        display: none;
                }
                .chatlogs {
                        height: 252px;
                        padding: 5px 5px;
                        overflow-y: scroll;
                }
                .chat-message {
                        margin: 16px 0;
                }
                .bot img {
        border-radius: 50%;
        float: left;
        width: 45px;
        height: 45px;
        border: 4px solid #878c90;
        }
                .bot .chat-message-content{
                        margin-left: 40px;
                        border-radius:0  15px 15px 15px;
                        background: #e4e4e4;
                        padding: 15px 10px;
                }
                .user .chat-message-content {
            margin-right: 40px;
            border-radius: 15px 15px 0 15px;
            background: #ce5504;
            padding: 15px 10px;
            color: white;
        }
                .user img{
                        border-radius: 50%;
                        float: right;
            width: 45px;
            height: 45px;
            border: 4px solid #878c90;
                }
                .chat-message-content {
                        /*margin-left: 56px;*/
                }
                .bot .chat-time {
                        float: right;
                        font-size: 10px;
                }
                .user .chat-time {
                        float: right;
                        font-size: 10px;
                }

    div.vc_single_image-wrapper  {
  position: relative;
  left: 300px;
  bottom: 195px;


}

    .red-title {
      position: relative;
      left: 200px;

} 
body{
  overflow-x: hidden;
  overflow-y: hidden;
}


div.need-info {
text-decoration: none;
}
  </style>
  
</head>
<body class="home page-template-default page page-id-2 stretched custom-font-enabled single-author wpb-js-composer js-comp-ver-5.0.1 vc_responsive">

<!-- Main Wrapper Start -->

<div class="main-wrapper">

<!-- Header Start -->

                        <div class="wpb_wrapper">
			  <h1 class="red-title" style="color: #990000; font-size: 4em;">Papa Charlie </h1>
                        </div>
  


                          <div class="social-media" style="font-size: 18px;">
			   <p><a style="color: #990000;" href="https://www.linkedin.com/in/phist0">LinkedIn </a> | <a style="color: #990000;" href="https://twitter.com/phist0"> Twitter </a> | <a style="color: #990000;" href="https://www.facebook.com/phist0"> Facebook </a></p>
                          </div>
 
                          <div class="hng_internship">
                           <p>   
                              HNG 4.0 Internship 
			   </p> 
                           </div>
                                
                          <div class="need-info">
                           <p><a  style="color: #990000;" href="#chat-box" onclick="change()">  Need Information ? Chat With The Bot Here     &gt;&gt;</a></p>
                          </div>


                            <div class="vc_single_image-wrapper   vc_box_border_grey">
                              <img width="509" height="509" src="https://res.cloudinary.com/phisto/image/upload/v1526342621/26757b44659c7309fd0c152b1ed9ab64_400x400.jpg" class="vc_single_image-img attachment-full" alt="" srcset="https://res.cloudinary.com/phisto/image/upload/v1526342621/26757b44659c7309fd0c152b1ed9ab64_400x400.jpg 509w, http://https://res.cloudinary.com/phisto/image/upload/v1526342621/26757b44659c7309fd0c152b1ed9ab64_400x400.jpg 150w, http://https://res.cloudinary.com/phisto/image/upload/v1526342621/26757b44659c7309fd0c152b1ed9ab64_400x400.jpg 300w" sizes="(max-width: 509px) 100vw, 509px" />
                            </div>
			</div>



                        <div id="chat-box">
                          <header class="clearfix" onclick="change()">
                            <h4>ChatBot Online</h4>
                          </header>
                          <div class="chat hide" id="chat">
                            <div class="chatlogs" id="chatlogs">
                              <div class="chat bot chat-message">
                                <img src="https://res.cloudinary.com/phisto/image/upload/v1526618309/chatbot.jpg" alt="" width="32" height="32">
                                <div class="chat-message-content clearfix">
                                  <p>Welcome.</p>
                                  <span class="chat-time"> </span>
                                </div>
                              </div>
                              <div class="chat bot chat-message">
                                <img src="https://res.cloudinary.com/phisto/image/upload/v1526618309/chatbot.jpg" alt="" width="32" height="32">
                                <div class="chat-message-content clearfix">
                                  <p>I am here to help you.</p>
                                  <span class="chat-time"></span>
                                </div>
                              </div>    
                              <div class="chat bot chat-message">
                                <img src="https://res.cloudinary.com/phisto/image/upload/v1526618309/chatbot.jpg" alt="" width="32" height="32">
                                <div class="chat-message-content clearfix">
                                  <p>You can ask me questions, and I will do my best to answer. You can train me to answer specific questions. Just make use of the format train: question # answer # password.</p>
                                  <span class="chat-time"></span>
                                </div>
                              </div>
                                <div id="chat-content"></div>
                              </div> <!-- end chat-history -->
                              <form action="#" method="post" class="form-data">
                                <fieldset>
                                  <input type="text" placeholder="Type your message…" name="question" id="question" autofocus>
                                  <input type="submit" class=" btn-primary" name="bot-interface" value="SEND"/>
                                </fieldset>
                              </form>
                              </div> <!-- end chat -->
			    </div> <!-- end chat-box -->


                            <script >
                
                
                function change(){
                        document.getElementById("chat").classList.toggle('hide');
                        
    }
     var btn = document.getElementsByClassName('form-data')[0];
                var question = document.getElementById("question");
                var chatLog = document.getElementById("chatlogs");
                var chatContent = document.getElementById("chat-content");
                var myTime = new Date().toLocaleTimeString(); 
                document.getElementsByClassName('chat-time')[0].innerHTML = myTime;
                document.getElementsByClassName('chat-time')[1].innerHTML = myTime;
                document.getElementsByClassName('chat-time')[2].innerHTML = myTime;
                btn.addEventListener("submit", chat);


                function chat(e){
                    if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
                             var xhttp = new XMLHttpRequest();
                        } else if (window.ActiveXObject) { // IE 6 and older
                          var  xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    xhttp.onreadystatechange = function() {
                        if(this.readyState == 4 && this.status == 200) {
                              // console.log(this.response);
                               userChat(question.value, this.response);
                              e.preventDefault();
                          question.value = '';
                        }
                  }
              xhttp.open('POST', 'profiles/phist0.php', true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send('question='+ question.value);
              e.preventDefault();
                      }

                      function userChat(chats, reply){
                              if(question.value !== ''){
                                      var chat = `<div class="chat user chat-message">
                                              <img src="http://placehold.it/45/000000/fff&text=YOU" alt="" width="32" height="32">
                                              <div class="chat-message-content clearfix">
                                                      <p>` + chats + `</p>
                                                      <span class="chat-time">` + new Date().toLocaleTimeString(); + `</span>
                                               </div>
                                      </div>`;
                              }
                              chatContent.innerHTML += chat;
                              
                              setTimeout(function() {
                                      chatContent.innerHTML += reply + `<span class="chat-time">`+ new Date().toLocaleTimeString(); +` </span>
                                                  </div> 
                                          </div>`;
                                          document.getElementById('chatlogs').scrollTop = document.getElementById('chatlogs').scrollHeight;       
                                  }, 1000);
                          }
                           </script>
                         </div>
                       </div>
                     </div>
                   </div>
		 </div><!-- .entry-content -->


</body>
</html>




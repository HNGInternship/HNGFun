<?php

 include_once("../answers.php"); 

if (!defined('DB_USER')){
            
  require "../../config.php";
}
try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

 global $conn;

 try {
  $sql = 'SELECT * FROM secret_word LIMIT 1';
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $data = $q->fetch();
  $secret_word = $data['secret_word'];
} catch (PDOException $e) {
  throw $e;
}    
try {
  $sql = "SELECT * FROM interns_data WHERE `username` = 'juliet' LIMIT 1";
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $my_data = $q->fetch();
} catch (PDOException $e) {
  throw $e;
}

function decider($string){
  
  if (strpos($string, ":") !== false)
  {
    $field = explode (":", $string, 2);
    $key = $field[0];
    $key = strtolower(preg_replace('/\s+/', '', $key));
  if(($key == "train")){
     $password ="password";
     $trainer =$field[1];
     $result = explode ("#", $trainer);
  if($result[2] && $result[2] == $password){
    echo"<br>Training mode<br>";
    return $result;
  } 
  else echo "opssss!!! Looks like you are trying to train me without permission";   
  }
   }
}


function assistant($string)
{    $reply = "";
    if ($string == 'what is my location') {
       
      
      $ip=$_SERVER['REMOTE_ADDR'];
      $reply =unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
      $reply =var_export('you are in '. $reply['geoplugin_regionName'] .' in '. $reply['geoplugin_countryName']);
      return $reply;
        
    }
    elseif ($string == 'tell me about your author') {
        $reply= 'Her name is <i class="em em-sunglasses"></i> Chidimma Juliet Ezekwe, she is Passionate, gifted and creative backend programmer who love to create appealing Web apps solution from concept through to completion. An enthusiastic and effective team player and always challenge the star to quo by taking up complex responsibilities. Social account ';
        return $reply;    
    }
    elseif ($string == 'open facebook') {
        $reply= "<p>Facebook opened successfully </p> <script language='javascript'> window.open(
    'https://www.facebook.com/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }
    elseif ($string == 'open twitter') {
        $reply = "<p>Twitter opened successfully </p> <script language='javascript'> window.open(
    'https://twitter.com/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }elseif ($string == 'open linkedin') {
        $reply= "<p>Linkedin opened successfully </p> <script language='javascript'> window.open(
    'https://www.linkedin.com/jobs/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }
    elseif ($string == 'shutdown my pc') {
        $reply =  exec ('shutdown -s -t 0');
        return $reply;
    }elseif ($string == 'get my pc name') {
        $reply = getenv('username');
        return $reply;
    }
    else{
        $reply = "";
        return $reply;
    }
  
}




$existError =false;
$reply = "";//process starts
if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

  if ($_POST['msg'] == 'commands') {
    $reply = 'These are my commands <p>1. what is my location, 2. tell me about your author, 3. open facebook, 6. open twitter, 7. open linkedin, 8. shutdown my pc, 9. get my pc name.</p>';
    echo $reply;
  } 
      if($reply==""){
       $reply = assistant($_POST['msg']);
       echo $reply;
       
     }
  if($reply =="") {

    $post= $_POST['msg'];
    $result = decider($post);
    if($result){
      $question=$result[0]; 
      $answer= $result[1];
      $sql = "SELECT * FROM chatbot WHERE question = '$question' And answer = '$answer'";
      $stm = $conn->query($sql);
      $stm->setFetchMode(PDO::FETCH_ASSOC);

      $result = $stm->fetchAll();
        
        if (count(($result))> 0) {
              
          // while($result) {
          //   $strippedQ = strtolower(preg_replace('/\s+/', '', $question));
          //   $strippedA = strtolower(preg_replace('/\s+/', '', $answer));
          //   $strippedRowQ = strtolower(preg_replace('/\s+/', '', $result['question']));
          //   $strippedRowA = strtolower(preg_replace('/\s+/', '', $result['answer']));
          //   if(($strippedRowQ == $strippedQ) && ($strippedRowA == $strippedA)){
          //   $reply = "I know this already, but you can make me smarter by giving another response to this command";
          //   $existError = true;
          //   break;
            
          //   }
              
          // }  
          $existError = true; 
          echo "I know this already, but you can make me smarter by giving another response to this command";
            
        } 
      else
        if(!($existError)){
          $sql = "INSERT INTO chatbot(question, answer)
          VALUES(:quest, :ans)";
          $stm =$conn->prepare($sql);
          $stm->bindParam(':quest', $question);
          $stm->bindParam(':ans', $answer);

          $saved = $stm->execute();
            
          if ($saved) {
              echo  "Thanks to you, I am smarter now";
          } else {
              echo "Error: could not understand";
          }
            
          
        }  
  }
  else{
    $input = trim($post); 
 
  if($input){
    
    $sql = "SELECT * FROM chatbot WHERE question = '$input'";
    $stm = $conn->query($sql);
    $stm->setFetchMode(PDO::FETCH_ASSOC);

    $res = $stm->fetchAll();
    
    if (count($res) > 0) {
    
      $index = rand(0, count($res)-1);
      $response = $res[$index]['answer'];  

      echo $response;
    
    }
    else{
       echo "I did'nt get that, please rephrase or try again later";
    }       
  }
}
          
      
    
      }       
  
 

}
else{
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Juliet - HNG Internship 4</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>



<style type="text/css">
  *, *:after, *:before {
  -moz-box-sizing:border-box;
  box-sizing:border-box;
  -webkit-font-smoothing:antialiased;
  font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}

html {
  font-size:75%;
}
body {
  font: 400 normal 14px/1.4 'Lato', sans-serif;
  color: #706c72;
  background: #0bc3f7;
}

.clear:before,
.clear:after {
   content: ' ';
   display: table;
}

.clear:after {
    clear: both;
}
.clear {
    *zoom: 1;
}
img {
  width: 100%;
  vertical-align: bottom;
}
a, a:visited {
  color: #2895F1;
  text-decoration: none;
}
a:hover, a:focus {
  text-decoration: none;
}
a:focus {
  outline: 1;
}

/*------------------------------------*\
    Structure
\*------------------------------------*/

.wrapper {
  width: 100%;
}

.content {
  width: 736px;
  height: 560px;
  margin: 40px auto;
  border-radius: 10px;
  box-shadow: 0 15px 30px 5px rgba(0,0,0,0.4);
}

.sidebar {
  float: left;
  width: 100%;
  max-width: 296px;
  height: 100%;
  background: #2b2130;
  border-radius: 10px 0 0 10px;
}

.chatbox {
  position: relative;
  float: left;
  width: 100%;
  max-width: 440px;
  height: 100%;
  background: #fdfdfd;
  border-radius: 0 10px 10px 0;
  box-shadow: inset 20px 0 30px -20px rgba(0, 0, 0, 0.6);
}

/*------------------------------------*\
    Sidebar
\*------------------------------------*/


/* Contact List */

.contact-list {
  margin: 0;
  padding: 0;
  list-style-type: none;
  height: 100%;
  max-height: 460px;
  overflow-y: hidden;
}


.contact-list .person {
  position: relative;
  padding: 12px 0;
  border-bottom: 1px solid rgba(112,108,114,0.3);
  cursor: pointer;
}


.contact-list .person.active:after {
  content: '';
  display: block;
    position: absolute;
      top: 0; left: 0; bottom: 0; right: 0;
  border-right: 4px solid #0bf9c7;
  box-shadow: inset -4px 0px 4px -4px #0bf9c7;
}

.person .avatar img {
  width: 56px;
  margin-left: 25px;
  border-radius: 50%;
}

.person .avatar {
  position: relative;
  display: inline-block;
}

.person .avatar .status {
  position: absolute;
  right: 6px;
  bottom: 0;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #9e99a1;
  border: 4px solid #222; 
}

.person .avatar .status.online {
  background: #0bf9c7;
}

.person .avatar .status.away {
  background: #f4a711;
}

.person .avatar .status.busy {
  background: #f42464;
}

.person .info {
  display: inline-block;
  width: 200px;
  padding: 0 0 0 10px; 
}

.person .name, .person .status-msg {
  display: inline-block;
}

.person .name {
  color: #fdfdfd;
  font-size: 17px;
  font-size: 1.7rem;
  font-weight: 700;
}

.person .status-msg {
  width: 180px;
  font-size: 14px;
  font-size: 1.4rem;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}



/*------------------------------------*\
    Chatbox
\*------------------------------------*/

.chatbox {
  color: #a0a0a0;
}

/* Chatbox header */

.chatbox .person {
  position: relative;
  margin: 12px 20px 0 0;
  padding-bottom: 12px;
  border-bottom: 1px solid rgba(112,108,114,0.2);
}

.chatbox .person .avatar .status {
  border-color: #fff;
}

.chatbox .person .info {
  width: 290px;
  padding-left: 20px;
}

.chatbox .person .name {
  color: #a0a0a0;
  font-size: 19px;
  font-size: 1.9rem;
}

.chatbox .person .login-status {
  display: block;
}

/* Chatbox messages */

.chatbox-messages {
  margin: 20px 20px 0 44px;
  height: 376px;
  overflow-y: overlay;
}

.chatbox-messages .avatar {
  float: left;
}

.chatbox-messages .avatar img {
  width: 56px;
    border-radius: 50%;
}

.chatbox-messages .message-container {
  position: relative;
  float: right;
  width: 320px;
  padding-left: 10px;
}

.chatbox-messages .message {
  display: inline-block;
  max-width: 260px;
  margin-bottom: 12px;
  border: 1px solid #dedede;
  border-radius: 25px;
}

.chatbox-messages .sender .message {
  background: #fff;
}

.chatbox-messages .user .message {
  background: #dedede;
}

.chatbox-messages .sender .message-container:first-child .message {
  border-radius: 0 50px 50px 50px;
}

.chatbox-messages .user .message-container:first-child .message {
  border-radius: 50px 0 50px 50px;
}

.chatbox-messages .message p {
  margin: 14px 24px;
  font-size: 11px;
  font-size: 1.1rem;
}

.chatbox-messages .delivered {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 10px;
  font-size: 1.0rem;
}

/* Chatbox message form */

.message-form-container {
  width: 400px;
  height: 74px;
  position: absolute;
  left: 0;
  bottom: 0;
  margin: 0 20px;
  border-top: 1px solid rgba(112,108,114,0.2);
}

.message-form textarea {
  width: 290px;
  margin: 6px 0 0 24px;
  resize: none;
  border: 0;
  color: #a0a0a0;
  outline: 0;
}

.message-form textarea::-webkit-input-placeholder { color: #a0a0a0; }
.message-form textarea::-moz-placeholder { color: #a0a0a0;  }
.message-form textarea::-ms-placeholder { color: #a0a0a0; }
.message-form textarea:-moz-placeholder { color: #a0a0a0; }

.message-form textarea:focus::-webkit-input-placeholder { color: transparent; }
.message-form textarea:focus::-moz-placeholder { color: transparent;  }
.message-form textarea:focus::-ms-placeholder { color: transparent; }
.message-form textarea:focus:-moz-placeholder { color: transparent; }

/*------------------------------------*\
    Contacts List - Custom Scrollbar
\*------------------------------------*/


</style>
  </head>

<!-- jet -->
<body class="oj-web-applayout-body">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->
    <script type="text/html" id="navTemplate">
      <li><a href="#">
        <span :class="[[$data['iconClass']]]"></span>
        <oj-bind-text value="[[$data['name']]]"></oj-bind-text>
      </a></li>
    </script>
   
    <div id="globalBody" class="oj-offcanvas-outer-wrapper oj-offcanvas-page">
       <div id="pageContent" class="oj-web-applayout-page">
        <!--
           ** Oracle JET V5.0.0 web application header pattern.
           ** Please see the demos under Cookbook/Patterns/App Shell: Web
           ** and the CSS documentation under Support/API Docs/Non-Component Styling
           ** on the JET website for more information on how to use this pattern.
        -->
        <oj-module role="main" class="oj-web-applayout-max-width oj-web-applayout-content oj-complete" config="[[moduleConfig]]"><!-- ko ojModule: {"view":$properties.config.view, "viewModel":$properties.config.viewModel,"cleanupMode":$properties.config.cleanupMode,"animation":$properties.animation} --><!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->
<div class="oj-hybrid-padding">
  <my-profile>
    </my-profile>
    <div class="twcd container">
        <div class="name">
        <h1 >Chidimma Juliet Ezekwe</h1>
      <h4>Web Developer</h4>
          </div>
          <div class="profile mx-auto">
          <div class="oj-flex">
            <div class="oj-md-3 oj-lg-3 oj-xl-3 oj-flex-item"></div>
            <div class="oj-md-6 oj-lg-6 oj-xl-6 oj-flex-item"><img class="profile-img mx-auto" src="http://res.cloudinary.com/julietezekwe/image/upload/v1523643285/juliet.png" alt="my-profile">
</div>
            <div class="oj-md-3 oj-lg-3 oj-xl-3 oj-flex-item"></div>
        </div>
                      </div>
          <div class="about">
          <h3>Description</h3>
          <p>An Innovative web deveploper inter at HngInternship<sup>4</sup></p>
          <h3 >Details</h3>
          <ul>
            <li>Creative</li>
            <li>Innovative</li>
            <li>Team player</li>
            <li>Result oriented and time conscious</li>
          </ul>
          </div>
    </div>  

    <button type="button" class="btn btn-danger btn-lg pull-right" data-toggle="collapse" data-target="#chat">Chat now</button>
              
              <div id="chat" class="wrapper collapse">

                <div class="content">

                  <div class="sidebar">

                <br><br>

                    <div class="contacts">

                   <li class="person">
                          <span class="avatar">
                            <img src="http://res.cloudinary.com/julietezekwe/image/upload/v1523964193/human.png" alt="Sacha Griffin" />
                            <span class="status online"></span>
                          </span>
                          <span class="info">
                            <span class="status-msg">You Are Currently Logged In </span>
                          </span>
                        </li>
                           <li class="person">
                          <span class="avatar">
                            <img src="http://res.cloudinary.com/julietezekwe/image/upload/v1523964204/robot.jpg" alt="NitroChatBot" />
                            <span class="status online"></span>
                          </span>
                          <span class="info">
                            <span class="name">Julie's Assist</span>
                            <span class="status-msg">I am Julies's Assistant</span>
                          </span>
                        </li>

                      </ul><!-- /.contact-list -->

                    </div><!-- /.contacts -->

                  </div><!-- /.sidebar -->

                  <div class="chatbox">

                    <div class="person">
                      <span class="avatar">
                        <img src="http://res.cloudinary.com/julietezekwe/image/upload/v1523964193/human.png" alt="human Image" />
                        <span class="status online"></span>
                      </span>
                      <span class="info">
                       <span class="login-status">Online    | <?php
            echo "" . date("h:i:a");
            ?>, <?php
            
            $ip=$_SERVER['REMOTE_ADDR'];
            $reply = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
            echo var_export('you are in '. $reply['geoplugin_countryName'] .' in '. $reply['geoplugin_regionName']);
            ?></span>
                        
                      </span>
                    </div><!-- /.person -->
                <script>
            $(document).ready(function(){
            var hiddenDiv = $(".messages");
            var show = function() {
            hiddenDiv.fadeIn();
            play();

            };

            hiddenDiv.hide();
            setTimeout(show, 2000);


            });
                </script>
                    <div class="chatbox-messages" >
                      <div class="messages clear"><span class="avatar"><img src="http://res.cloudinary.com/julietezekwe/image/upload/v1523964204/robot.jpg"alt="Debby Jones" /></span><div class="sender"><div class="message-container"><div class="message"><p>
                      Hi My name is Cutie <i class="em em-sunglasses"></i> I can tell you about My Author <i class="em em-smiley"></i></p>
                              <p>You can tell me what to do i promise not to fail you, just type "commands' to see the list of what i can do.<br>You can train me too by simply using the key word "train", seperate the command and response with "#", and ofourse, the password</p>
                              </div><span class="delivered"><?php
            echo "" . date("h:i:a");
            ?></span></div><!-- /.message-container -</div><!-- /.sender --></div><!-- /.messages -->
                            </div>
                            <div class="push"></div>

                    </div><!-- /.chatbox-messages -->


                    <div class="message-form-container">

                      <script type="text/javascript">

                                  $(document).ready(function(){
               $('#msg').keypress(
                function(e){
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        var msg = $(this).val();
                  $(this).val('');
                        if(msg !== '' )
                  $('<div class="messages clear"><div class="user"><div class="message-container"><div class="message"><p>'+msg+'</p></div><span class="delivered"><?php
            echo "" . date("h:i:a");
            ?></span></div></div><!-- /.user --></div>').insertBefore('.push');
                  $('.chatbox-messages').scrollTop($('.chatbox-messages')[0].scrollHeight);

                  formSubmit();

                    }

                function formSubmit(){
                var message = $("#msg").val();
                    var dataString = 'msg=' + msg;
                    jQuery.ajax({
                        url: "/profiles/juliet.php",
                        data: dataString,
                        type: "POST",
                         cache: false,
                             success: function(response) {
            setTimeout(function(){
                     $(' <div class="messages clear"><span class="avatar"><img src="http://res.cloudinary.com/julietezekwe/image/upload/v1523964204/robot.jpg"alt="Debby Jones" /></span><div class="sender"><div class="message-container"><div class="message"><p>'+response+'</p></div><span class="delivered"><?php
            echo "" . date("h:i:a");
            ?></span></div><!-- /.message-container -</div><!-- /.sender --></div><!-- /.messages --></div>').insertBefore('.push');
                  $('.chatbox-messages').scrollTop($('.chatbox-messages')[0].scrollHeight);
                  play();
                },  1000);

                  },
                        error: function (){}
                    });
                return true;
                }
                    });
            });
                  function play(){
                   var audio = document.getElementById("audio");
                   audio.play();
                             }                
            </script>
            <audio id="audio" src="https://res.cloudinary.com/julietezekwe/video/upload/v1523964158/beep.mp3" ></audio>

                      <form class="message-form" method="POST" action="" >
                        <textarea id="msg" name="msg" value=""  placeholder="Type a message here..."></textarea>
                          </form><!-- /.search-form -->


                    </div><!-- /.message-form-container -->

                  </div><!-- /.chatbox -->

                </div><!-- /.content -->

              </div><!-- /.wrapper -->


        </div>
      </div>
      <!-- /.row -->

    

    </div>
    <!-- /.container -->



    <!-- Bootstrap core JavaScript -->
    

    <!-- Custom scripts for this template -->
    <script src="../js/hng.min.js"></script>
  
</div><!-- /ko --><div data-bind="_ojNodeStorage_" style="display: none;" class="oj-subtree-hidden">
        </div></oj-module>
      </div>
      </div>
 
</body>
<!-- end jet -->


  <body>

  

        

      
   
          
            

  </body>

</html>

<?php 
}?>
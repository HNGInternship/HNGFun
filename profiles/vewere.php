<!DOCTYPE html>
<html lang="en">
<head>
  <?php

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'vewere'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Victor's Profile</title>
  <link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
<<<<<<< HEAD
<<<<<<< HEAD
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <style>
    /* General */
    #toggle-visibility {
      padding-top: 5px;
      padding-bottom: 5px;
      border-radius: 5px;
      border-style: solid;
      border-width: thin;
      border-color: #ffffff;
    }
=======
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
  <style type="text/css">
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d


    /* General Styles */

    body {
			margin: 0px;
			background-color: #958080;
			height: 100%;
		}
=======
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
  <style type="text/css">


    /* General Styles */
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174

    body {
			margin: 0px;
			background-color: #958080;
			height: 100%;
		}

    div .hidden {
      display: none;
    }

    .text {
      font-family: "Rajdhani", sans-serif;
<<<<<<< HEAD
<<<<<<< HEAD
=======
      color: #ffffff;
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
      text-align: center;
      display: vertical;
		}

    h1 {
      padding-bottom: 0;
    }

<<<<<<< HEAD
    .white {
=======
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
      color: #ffffff;
      text-align: center;
      display: vertical;
		}

    h1 {
      padding-bottom: 0;
    }

    h2 {
      padding-top: 0;
    }

    #toggle-visibility {
      border-radius: 5px;
      border-style: solid;
      border-width: thin;
      border-color: #ffffff;
      width: 20px;
      margin-left: auto;
      margin-right: auto;
    }

<<<<<<< HEAD
    /* profile-area */ 
    #top {
      margin-top: 4%;
      margin-bottom: 0;
      padding-top: 20px;
      padding-bottom: 80px;
      height: 432px;
      background: #513E3E;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    }
=======
    #toggle-visibility:hover {
      cursor: pointer;
    }

>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d

    /* Profile Styles */

=======
    h2 {
      padding-top: 0;
    }

    #toggle-visibility {
      border-radius: 5px;
      border-style: solid;
      border-width: thin;
      border-color: #ffffff;
      width: 20px;
      margin-left: auto;
      margin-right: auto;
    }

    #toggle-visibility:hover {
      cursor: pointer;
    }


    /* Profile Styles */

>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
		#profile {
      background-color: #513e3e;
      margin-top: 3%;
      margin-left: auto;
      margin-right: auto;
      height: 480px;
      margin-bottom: 3%;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    }

    img {
      border-radius: 50%;
      border: 6px solid #958080;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10%;
<<<<<<< HEAD
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
    }


    /* Chat Styles */

    #chat {
      margin-left: auto;
      margin-right: auto;
      margin-top: 3%;
      height: 480px;
      margin-bottom: 3%;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    }

    #chat-area {
<<<<<<< HEAD
<<<<<<< HEAD
      margin-bottom: 0;
      height: 382px;
      background: #513E3E;
      overflow-y: auto;
      scroll-behaviour: auto;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
=======
      background-color: #513e3e;
      height: 427px;
      overflow-y: auto;
      scroll-behaviour: auto;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
      padding: 15px;
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
      background-color: #513e3e;
      height: 427px;
      overflow-y: auto;
      scroll-behaviour: auto;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
      padding: 15px;
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
    }

    #input-area {
      margin-top: 0;
      height: 53px;
      background: #000000;
<<<<<<< HEAD
<<<<<<< HEAD
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
=======
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
      margin-bottom: 3%;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    }

    #request {
      margin-left: 15px;
      font-family: "Rajdhani", sans-serif;
      font-size: 12pt;
      margin-top: 10px;
      margin-right: 0;
      border-radius: 5px 0px 0px 5px; 
      border:none; 
      padding-top: 5px; 
      padding-bottom: 5px;
    }

    #send {
      margin-top: 10px;
      margin-left: 0;
      background:#809595; 
      border-radius: 0px 5px 5px 0px; 
      border:none; 
      padding-top: 5px; 
      padding-bottom: 5px;
<<<<<<< HEAD
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
    }

    #bot-bubble {
      background-color: #fffff0;
      border-radius: 10px;
      word-wrap: break-word;
      max-width: 80%;
      float: left;
      margin-top: 5px;
      margin-bottom: 5px;
      margin-right: 150px;
    }

    #user-bubble {
      background: #809595;
      border-radius: 10px;
      word-wrap: break-word;
      max-width: 80%;
      float: right;
      margin-top: 5px;
      margin-bottom: 5px;
      margin-left: 150px;
    }

    p {
      margin: 5px 8px 5px 8px;
      font-family: "Rajdhani", sans-serif;
      font-size: 12pt;
      font-weight: bold;
    }

  </style>
  <script>
    var outer_profile = true;
    $(function (){    
      
      // Switch between Profile and Chat screens
      $("#toggle-visibility").click(function (){
        if (outer_profile) {
          $("#outer-profile").attr('class', 'hidden');
          $("#outer-chat").removeAttr('class', 'hidden');
          $("#toggle-text").html("VIEW PROFILE")
          outer_profile = false;
        } else {
          $("#outer-chat").attr('class', 'hidden');
          $("#outer-profile").removeAttr('class', 'hidden');
          $("#toggle-text").html("TEST MY BOT")
          outer_profile = true;
        }
      });

      // Add user's request to chat interface
      $("#send").click(function() {
        var input = $("#request").val();        
        if ($.trim(input)) {
          $("#chat-area").append("<div id='user-bubble'><p>"+input+"</p></div>");
          $("#request").val("");
        }
        $("#chat-area").scrollTop($("#chat-area")[0].scrollHeight);
      });
      $('#request').keypress(function (e) {
        if (e.which == 13) {
          $("#send").click(); 
          return false; 
        } 
      });


    });
  </script>

</head>
<body>
<<<<<<< HEAD
<<<<<<< HEAD
<!-- Profile Div -->
<div class="container" id="profile">
  <div class="row">
    <div class="col-md-offset-4 col-md-4" id="top">
      <div id="image-div">
        <img src="<?php echo $user->image_filename; ?>" height=180px width=180px>
      </div>
      <h1 class="text white"><?php echo $user->name; ?></h1>
      <h3 class="text black"><strong>@<?php echo $user->username; ?></strong></h3>
      <br><br>
      <h4 class="text white">Problem Solver | Student at</h4>
      <h4 class="text white">University of Ibadan</h4>
    </div>
  </div>    
  
</div>

<!-- Chat Div -->
<div class="container hidden" id="chat">
  <div class="row">
    <div class="col-md-offset-4 col-md-4" id="chat-area">
      <div id="bot-bubble">
        <p>Hi there!</p>
      </div>
      <div id="bot-bubble">
        <p>My name is Bot :p</p>
=======
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174

  <div class="oj-flex" id="outer-profile">
    <div id="profile" class="oj-flex-item oj-sm-10 oj-md-6 oj-lg-4"> 
      <div class="oj-flex">           
        <div class="oj-flex-item oj-sm-2">
        </div>
        <div class="oj-flex-item oj-sm-8" role="img">
          <img src="<?php echo $user->image_filename; ?>" width="168px" height="168px">
        </div>            
        <div class="oj-flex-item oj-sm-2">
        </div>
<<<<<<< HEAD
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
      </div>
      <div class="oj-flex">
        <div class="oj-flex-item oj-sm-3 oj-md-3 oj-lg-3">
        </div>
        <div class="oj-flex-item oj-sm-6 oj-md-6 oj-lg-6">
          <p><h1 class="text" style="font-weight: medium;"><strong><?php echo $user->name; ?></strong></h1></p>
          <p style="margin-top: 0%;"><h2 class="text" style="color: #000000;"><strong>@<?php echo $user->username; ?></strong></h2></p>
          <br>
          <p><h4 class="text">Problem Solver | Student at University of Ibadan</h4></p>
        </div>
        <div class="oj-flex-item oj-sm-3 oj-md-3 oj-lg-3">
        </div>
      </div>
    </div>
  </div>


  <div class="oj-flex hidden" id="outer-chat">
    <div id="chat" class="oj-flex-item oj-sm-10 oj-md-6 oj-lg-4"> 
      <div id="chat-area">
        <div id="bot-bubble">
          <p>Hi there!</p>
        </div>
        <div id="bot-bubble">
          <p>My name is Bot :p</p>
        </div>
        <div id="bot-bubble">
          <p>Ask me a question</p>
        </div>
      </div>
      <div id="input-area"> 
        <div class="oj-flex">
<<<<<<< HEAD
            <input id="request" placeholder="Ask a question" class="oj-padding-horizontal oj-flex-item oj-sm-9 oj-md-9 oj-lg-9"  type="text" >
            <button id="send" class="oj-flex-item oj-sm-2 oj-md-2 oj-lg-2" ><i class="fa fa-paper-plane"></i></button> 
=======
          <!-- <form class="oj-flex"> -->
            <input id="request" placeholder="Ask a question" class="oj-padding-horizontal oj-flex-item oj-sm-9 oj-md-9 oj-lg-9"  type="text" >
            <button id="send" class="oj-flex-item oj-sm-2 oj-md-2 oj-lg-2" ><i class="fa fa-paper-plane"></i></button> 
          <!-- </form> -->
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
        </div>
      </div>
    </div>
  </div>

<<<<<<< HEAD
<<<<<<< HEAD
<br>

<!-- Switch from Profile to Chatbot button -->
<div class="row">  
  <div class="col-md-offset-5 col-md-2" id="">
    <div id="toggle-visibility"><h4 class="text white" id="toggle-text">TEST MY BOT</h4></div>
=======
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
  <div class="oj-flex">
    <div class="oj-flex-item oj-sm-6 oj-md-4 oj-lg-2" id="toggle-visibility">
      <h4 class="text white" id="toggle-text">TEST MY BOT</h4>
    </div>
<<<<<<< HEAD
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
=======
>>>>>>> 73fcc20bf8ca275b329d164d67a366c777a9b174
  </div>

</body>
</html>
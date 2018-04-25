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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
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

    #toggle-visibility:hover {
      cursor: pointer;
    }

    body {
      background-color: #958080;
    }

    div .hidden {
      display: none;
    }

    .text {
      font-family: "Rajdhani", sans-serif;
      text-align: center;
    }

    .black {
      color: #000000;
    }

    .white {
      color: #ffffff;
    }

    h1 {
      margin-top: 10px;
      margin-bottom: 0px
    }

    h3, h4 {
      margin: 0px;
    }

    .col-md-4 {
      border-style: none;
      border-radius: 0;
    }

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

    #image-div{
      position: relative;
      width: 180px;
      height: 180px;
      display: table;
      margin: 0 auto;     
    }

    img {
      border-radius: 50%;
      border: 6px solid #958080;
    }


    /* chat-bot area */
    #chat {
      margin-top: 4%;
    }

    #chat-area {
      margin-bottom: 0;
      height: 382px;
      background: #513E3E;
      overflow-y: auto;
      scroll-behaviour: auto;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    }

    #input-area {
      margin-top: 0;
      height: 53px;
      background: #000000;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
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
      background-color: #1e90ff;
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

    #user-bubble p {
      color: #ffffff;
    }
    

  </style>

  <script>
    var profile = true;
    $(function (){    

      $("#toggle-visibility").click(function (){
        if (profile) {
          $("#profile").attr('class', 'hidden');
          $("#chat").removeAttr('class', 'hidden');
          $("#toggle-text").html("VIEW PROFILE")
          profile = false;
        } else {
          $("#chat").attr('class', 'hidden');
          $("#profile").removeAttr('class', 'hidden');
          $("#toggle-text").html("TEST MY BOT")
          profile = true;
        }
      });

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
      </div>
      <div id="bot-bubble">
        <p>Ask me a question</p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-offset-4 col-md-4" id="input-area">
      <div class="input-group">
        <input class="form-control" type="text" id="request">
        <div class="input-group-btn">
          <button class="btn btn-primary" id="send"><i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<!-- Switch from Profile to Chatbot button -->
<div class="row">  
  <div class="col-md-offset-5 col-md-2" id="">
    <div id="toggle-visibility"><h4 class="text white" id="toggle-text">TEST MY BOT</h4></div>
  </div>
</div>

</body>
</html>
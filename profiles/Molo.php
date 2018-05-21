<?php
    // Check if a get variable question isset. If not continue with page operation
    if(isset($_GET['question']))
     {
          if (!defined('DB_USER')){
            require "../../config.php";
          }
          try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not establish connection to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }
          $mesuu = $_GET['question'];
          $message=strtolower($mesuu);
          $message = trim($message); // When you call trim(message) returns a trimmed message which should be reassigned back into message
          $statusTrain = stripos($message, "train:");
          if($statusTrain !== false) // Check for truthiness should be explicitly stated
          {
              $newstring=str_replace("train:","","$message");
              $sets = explode("#", $newstring);
              $mQuestion= $sets[0];
              $mAns= $sets[1];
              $mPwd= $sets[2];
              
              if( $mPwd === "password"){
              $resultIns = $conn->query("insert into chatbot (`question`, `answer`) values ('$mQuestion','$mAns')" );
                if($resultIns)
                {
                  echo json_encode([
                   'status' => 1,
                    'answer' => "I just learnt something new. Thanks"
                  ]);
                  return;
                }
                else {
                  echo json_encode([
                  'status' => 1,
                  'answer' => "Ooops! It's like something went wrong"
                  ]);
                  return;
                  // code...
                }
              }
              else {
                echo json_encode([
                   'status' => 1,
                   'answer' => "Sorry but that password is wrong"
                 ]);
                // code...
              }
              return;
          }
          if($message=='aboutbot'){
            echo json_encode([
               'status' => 1,
               'answer' => "MoloBot 1.0"
             ]);
            return;
          }
         if ($message!=''){
              $result = $conn->query("SELECT answer FROM chatbot WHERE question LIKE '%{$message}%' ORDER BY rand() LIMIT 1"); // Set limit to 1, use LIKE instead of = for comparison
              $result = $result->fetch(PDO::FETCH_OBJ); //fetch result for query
              
           if($result){ //Check if result is null
             $answer = $result->answer; // Get column answer value from result
              echo json_encode([
                'status' => 1,
                'answer' => $answer
              ]);
              return;
           }else{
             echo json_encode([
               'status' => 1,
               'answer' =>"Huhmm..Sorry, I have no answer to that yet, but you can train me how to answer questions, I'm a fast learner. Try me.. "
             ]);
             return;
           }
         }
         return;
      }  
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
        <!-- styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">     
        <title>Molo Profile</title>
        <style>
            html, body { 
                margin: 0;
                padding: 0;
                font-family: 'Lato';
                background: #042349;
                text-align: center; 
                overflow-x: hidden; 
            }
            .contains {
                background: #F6D630;
                padding: 1em;
                border-top-right-radius: 10%;
                border-bottom-left-radius: 10%;
            }
            .clouds{
                border-radius:50%;
                width: 150px;
                height: 150px;
            }
            .row {
                margin-top: 3em;
            }
            .first {
                margin-top: 1.5em;
            }
            .p {
                font-weight: bold;
                font-size: 20px;
                margin: 0;
                text-shadow: #808080 7px 5px 10px;
            }
            .name {
                margin: auto 1em;
                font-size: 20px;
                font-weight: bold;
                text-shadow: 2px 5px 10px black;
            }
            span.link {
                margin: auto 0.5em;
                text-shadow: #4f4f4f 5px 5px 5px;
            }
            .link:hover,
            .link:focus {
                text-shadow: #555 -10px 0 10px, #4f4f4f 10px 0 10px;
                transform: scale(1.1);
            }
            @media screen and (max-width: 767px) {
                .name {
                    display: block;
                }
            }
            /** bot sect **/
            .container1 {
                border: 2px solid #dedede;
                background-color: #fa8072;
                color: #111111;
                font-size: 14px;
                border-radius: 25px;
                padding: 10px;
                margin: 10px 0;
                width: 70%;
            }
            .darker {
                width: 70%;
                border-color: #111111;
                background-color: #ddd;
            }
            .container1::after {
                content: "";
                clear: both;
                display: table;
            }
            .container1 img {
                float: left;
                max-width: 60px;
                width: 100%;
                margin-right: 20px;
                border-radius: 50%;
            }
            .container1 img.right {
                float: right;
                margin-left: 20px;
                margin-right:0;
            }
             .botbg {
                background-color: tomato;
            }
        </style>
    </head>

    <body>
        <?php
            //require "../db.php";
            if (!defined('DB_USER')){
                    require "../../config.php";
                }
                try {
                    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
                } catch (PDOException $pe) {
                    die("Could not establish connection to the database " . DB_DATABASE . ": " . $pe->getMessage());
                }  $result = $conn->query("Select * from secret_word LIMIT 1");
            $result = $result->fetch(PDO::FETCH_OBJ);
            $secret_word = $result->secret_word;
            $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
            $user = $result2->fetch(PDO::FETCH_OBJ);
            $name = 'Ayinde Ayobami'
        ?>

        <!--The interface section-->
        <div class="row">
            <div class="col-md-12">
                <div class="container contains first">
                    <span class="name">AYINDE</span>
                    <img class="clouds" src="http://res.cloudinary.com/molo/image/upload/v1526381592/profile.jpg">
                    <span class="name">AYOBAMI</span>                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="container contains">
                    <p class="p">Aspiring Lagos-based Dev</p>
                    <p class="p">Lover of everything art</p>                    
                    <hr width="30%" style="border:1px solid #4f4f4f;">
                    <span class="link"><a href="https://www.codepen.io/AyoIX" target="_blank" style="color: black;"><i class="fa fa-codepen fa-2x"></i></a></span>
                    <span class="link"><a href="https://www.github.com/Arafly" target="_blank" style="color: black;"><i class="fa fa-github fa-2x"></i></a></span>
                    <span class="link"><a href="https://www.twitter.com/AraflyIX" target="_blank" style="color: skyblue;"><i class="fa fa-twitter fa-2x"></i></a></span>
                </div>
            </div>
        </div>

        <!--Bot section-->
        <div id="data2"><center>
          MoloBot 
          <br>
        <div class="container1">
            <img src="http://res.cloudinary.com/molo/image/upload/v1526381592/profile.jpg" alt="Avatar" style="width:100%;">
            <p>Hello. My name's Bot. MoloBot. Ask me a question. To train me, use--> <i style="color: #fff;">Train with: question#answer#password</i></p>
        </div>
    
        <div id="async"></div>

        <form id="myform" method="GET">
            <textarea  sid="text" name="question" id="ter" rows="0" cols="0" class="textarea" style=" padding:2px; border-radius: 12px;width: 80%;background-color:rgba(220, 20, 60, 0.5); color: #fff; font-size: 16px;" placeholder="enter your message"></textarea> <br>
           <button id="btn1" type="submit" class="button" >send</button>
           <br><br>
        </form></center></div>

    </body>

<?php 
    date_default_timezone_set('Africa/Lagos');

        if (!defined('DB_USER')){
            
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }
        
    try {
    $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not query the database:" . $e->getMessage());
      }
    $result = $q->fetch();
    $secret_word = $result['secret_word'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){


      $ask = $_POST['ask'];
    
        //check if bot is training
        $train_bot = stripos($ask, "train:");
          if($train_bot === false){
            
            //Bot is not training, ask your question, but remove question mark and dot
            $ask = preg_replace('([\s]+)', ' ', trim($ask));
            $ask = preg_replace('([?.])', "", $ask);

            //if the answer is already in the database, do this:
            $ask = "$ask";
            $sql ="SELECT * FROM chatbot WHERE question LIKE :ask";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ask', $ask);
            $stmt->execute();
            $stmt->setFetchMode(FETCH_ASSOC);
            $results = $stmt->fetchAll();
            if(count($results)>0){
              $index = rand(0, count($results)-1);
              $result= $results[$index];
              $answer = $result['answer'];
              echo json_encode([
                'status' => 0, 'answer' => $answer
                ]);
              return;
          }else{
            echo json_encode([
                'status' => 0, 'answer' => "I dont have an answer to that question. Am not that intelligent you know. But you can make me be. Please train me. Type <strong>train: question # answer # password"
              ]);
          }
          return;
      }else{
        //Enter the training mode
        $ask_ans = substr($ask, 6);
        //remove excess white space in $ask_ans
         $ask_ans = preg_replace('([\s]+)', ' ', trim($ask_ans));
         //remove ? and . so that questions missing ? (and maybe .) can be recognized
         $ask_ans = preg_replace("([?.])", "", $ask_ans);
         $separate = explode("#", $ask_ans);
         if(count($separate) == 1){
          echo json_encode([
            'status' => 0, 'answer' => "It seems you didnt enter the format correctly. \n Here, Let me help you: \n Type: <strong>train: question # answer # password"
            ]);
          return;
         }
         $que = trim($separate[0]);
         $ans = trim($separate[1]);

         if(count($separate) < 3){
          echo json_encode([
            'status' => 0, 'answer'=> "You need to type the training password to train me"
            ]);
          return;
         }
         //Lets know what the password is
         $password = trim($separate[2]);
         define('ACCESS', 'password');
         //verify if training password is correct
         if($password !== ACCESS){
          echo json_encode([
            'status' => 0, 'answer' => "You can't train me with that password, check it and train again"
            ]);
          return;
         }
         //put results into database
         $sql = "INSERT INTO chatbot (question, answer) VALUES (:question, :answer)";
         $stmt= $conn->prepare($sql);
         $stmt->bindParam(':question', $que);
         $stmt->bindParam(':answer', $ans);
         $stmt->execute();
         $stmt->setFetchMode(FETCH_ASSOC);
         echo json_encode([
            'status' => 1, 'answer' => "I have learnt a new thing today, Thank you. You can now test me"
          ]);
         return;
      }
      echo json_encode([
      'status' => 0, 'answer' => "I cant grasp this, try me another time. Thanks."
    ]); 
  }else {
?>   

<!DOCTYPE html>
<html>
<head>

  <title>Steven</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
      <!-- Custom fonts for this template -->

      <!--Oracle Ojet -->
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
  <style>
    body {
      background-image: url("http://res.cloudinary.com/chikodi/image/upload/v1523699895/back.jpg");
      background-size: cover;
    }
    
    .fa:hover {
        color: blue;
    }

    .fa {
      float: right;
      font-size: 25px;
      color: gray;
      padding: 10px;
      text-align: center;
    }
    .environment{
      background-color: #fff;
      margin-top: 48px;
      border: 1px solid #c0c0c0;
      border-radius: 3px solid #c0c0c0;
      
    }
    .bot-head{
      background-color: #808080;
      color: #fff;
      text-align: center;
      margin-bottom: 20px;
      border: 1px solid #c0c0c0;
      border-radius: 3px solid #c0c0c0;
      font-size: 30px;

    }
    .message-environment {
      margin-bottom: 5px;
      background-color: #fff;
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      padding: 0 25px 80px;
      border: none;
      max-height: 400px;
      justify-content: flex-end;
      flex-direction: column;
    }
    .ask {
      font-size: 16px;
      position: relative;
      display: inline-block;
      clear: both;
      margin-bottom: 10px;
      padding: 13px 14px;
      vertical-align: top;
      border-radius: 5px;
    }
    .ask:before {
      position: absolute;
      top: 19px;
      display: block;
      width: 8px;
      height: 6px;
    }
    .ask.me {
      float: right;
      color: #1a1a1a;
      background-color: #edf3fd;
      max-width: 80%
      font-weight: bold;
      }
     .ask.me:before {
      right: -3px;
      background-color: #eceff1;
    }
    .ask.you {
      float: left;
      color: #fff;
     background-color: #c0c0c0;
     max-width: 80%;
     font-weight: bold;
      
    }
    .ask.you:before {
      left: -3px;
      background-color: #00b0ff;
    }
    
  .fa-send{
    color: blue;
  }
  .ask-btn{
    float: right;
    background-color: #fff;
    margin: none;
    border: none;
    padding-left: 15px;

  }
  .ask-input-field{
    height: 47px;
    padding-right: 30px;

  }
  
  /*.align-w{
    margin-left: 1em;
    margin-right: 2em;
  }
*/  .fit{
    margin-left: -30px;
    /*text-align: center;*/
    padding-left: 0.2em;
  
  }

  </style>
</head>
<body>

<section>

  <div class="oj-flex oj-flex-items-pad">
    
        <div class="oj-md-6 oj-flex-item">

          <div style="text-align: center; color: white; margin-top: 10px;" class="align-w">
              <img src="http://res.cloudinary.com/chikodi/image/upload/c_mfit,w_960/v1523617871/steven.jpg" alt="Steven Victor" class="rounded circle" height="250" width="250" style="margin-top: 40px;">
              <h2 style="text-align: center; color: white; margin-top: 10px;">Steven Victor</h2>
              Web Developer, skilled in HTML, CSS, JavaScript, PHP, Laravel, VueJS. 
          </div>
          <div class="oj-flex">
              <div class="oj-sm-2">
                <a href="https://twitter.com/@stevensunflash"><span class="fa fa-twitter"></span></a>
              </div>
              <div class="oj-sm-2">
                  <a href="https://github.com/victorsteven"><span class="fa fa-github"></span></a>
            </div>
            <div class="oj-sm-2">
                <a href="https://www.linkedin.com/in/stevenchikodi/"><span class="fa fa-linkedin"></span></a>
            </div>
            <div class="oj-sm-2">
                <a href="https://slack.com/hnginternship4/@Steven"><span class="fa fa-slack"></span></a>
            </div>
            <div class="oj-sm-2">
                <a href="https://www.instagram.com/stevensunflash/"><span class="fa fa-instagram"></span></a>
            </div>
        </div>
      </div>

      <div class="oj-md-5 oj-xs-5 oj-flex-items fit">
        <div class="environment">
          <h2 class="bot-head">Steven's Bot</h2>
          <div class="message-environment">
              <div class="ask you">
                Good to have you here, am Alexa, how can i help?
              </div>
          </div>
        </div>
        <div id="ask-form">
          <div class="ask-input">
                <input class="oj-md-10 ask-input-field" id="message" placeholder="Ask me..." />
    
                <button type="submit" class="submit ask-btn"><i class="fa fa-send"></i></button>
          </div>
        </div>
        </div>
       
    </div>
</section>

<script>
$(document).ready(function(){
  var askForm = $("#ask-form");

  askForm.submit(function(e){
    e.preventDefault();
    });

  $(".message-environment").animate({ scrollTop: $(document).height() }, "fast");

    function currentMessage(){
        var msg = $('.ask-input input').val();
        if($.trim(msg) == ''){
          return false;
        }
         $('<div class="ask me">' + msg + '</div>').appendTo($('.message-environment'));
        $(".message-environment").animate({ scrollTop: $(document).height() }, "fast");
      };

      $('.submit').click(function(){
        currentMessage();
        getAnswer();
      });

     $(window).on('keydown', function(e){
        if (e.which == 13) {
          currentMessage();
          getAnswer();
          return false;
      }
    });

    //Transfer the question asked to the server
    function getAnswer(){
      let ask = $("#message").val();
      if($.trim(ask) == ''){
        return false;
      }
    $.ajax({
      url: '/profiles/Steven.php',
      data: {ask: ask},
      dataType: 'json',
      type: 'POST',
      success: (response) => {
        if(response.status == 1){
        $('<div class="ask you">' + response.answer + '</div>').appendTo($('.message-environment'));
        $('.ask-input input').val(null);
        $(".message-environment").animate({ scrollTop: $(document).height() }, "fast");
      }else if(response.status == 0){
          $('<div class="ask you">' + response.answer + '</div>').appendTo($('.message-environment'));
          $('.ask-input input').val(null);
            $(".message-environment").animate({ scrollTop: $(document).height() }, "fast");
      }
      },
      error: (error) => {
        console.log(error);
      }
    });
  }
});

</script>
</body>
</html>
<?php } ?>

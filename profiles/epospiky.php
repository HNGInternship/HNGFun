<?php

  if(!defined('DB_USER')){
    require "../../config.php";   
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }

  //Fetch User Details and secret
  try {
      $query = "SELECT * FROM interns_data WHERE username ='Epospiky'";
      $result = $conn->query($query);
      $result = $result->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e){
      throw $e;
  }

  //get and set the name and user name
  $username = $result['username'];
  $name = $result['name'];
  //query the secret word table to Fetch Secret Word
  try{
      $queryKey =  "SELECT * FROM secret_word LIMIT 1";
      $result   =  $conn->query($queryKey);
      $result  =  $result->fetch(PDO::FETCH_ASSOC);
      $secret_word =  $result['secret_word'];
  }catch (PDOException $e){
      throw $e;
  }
  $secret_word =  $result['secret_word'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include '../answers.php';

  $question = $_POST['input'];
  $question = preg_replace('([\s]+)', ' ', trim($question)); 
  $question = preg_replace("([?.])", "", $question); 

  //Version of the bot
  if (strtolower(trim($question)) === "aboutbot") {
        echo json_encode([
           'status' => 1,
             'answer' => "Santra v1.0",
         ]);
    return;
  };
    
    // check if the string begins with the string train: 
  $checking = stripos($question, "train:");
  
  if ($checking === false) { 
      $question = preg_replace('([\s]+)', ' ', trim($question)); 
      $question = preg_replace("([?.])", "", $question); 
      
      //check if answer already exists in database
      $question = $question;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo json_encode([
            'status' => 1,
             'answer' => "Am not sure i understand that but you can train me by typing--> train: your question # answer # password.",
         ]);
          return;
        }else {
            $random = array_rand($data);
            $answer = $data[$random]['answer'];
            echo json_encode([
            'status' => 1,
             'answer' => $answer,
         ]);
           return;
        }
  }else{ // in training mode
    
    //Get the question and answer from the user
    $userText = preg_replace('([\s]+)', ' ', trim($question)); 
      $userText = preg_replace("([?.])", "", $userText); 
    $userText = substr($userText, 6);
      $userText = explode("#", $userText);
      $user_question = trim($userText[0]);
    if(count($userText) == 1){
      echo json_encode([
        'status' => 1,
        'answer' => "You entered an incorrect format. Enter the correct format by typing-->train:question#answer#password",
      ]);
      return;
    };
      $user_answer = trim($userText[1]);    
        if(count($userText) < 3){ //the user only enter question and answer without password
          echo json_encode([
            'status' => 1,
            'answer' => "Please enter the password to train me.",
          ]);
          return;
        };
         //get the index of the user password
      $user_password = trim($userText[2]);
        //verify if training password is correct
        define('PASSWORD', 'password'); //constant variable
        if($user_password !== PASSWORD){ 
          echo json_encode([
            'status' => 1,
            'answer' => "oops! Seems you're trying to train me with an unauthorised password. Please get the password and try again",
          ]);
        return;
      };
      //check database if answer exist already
      $user_answer = "$user_answer"; 
      $sql = "SELECT * FROM chatbot WHERE answer LIKE :user_answer";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':user_answer', $user_answer);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
      if(empty($rows)){     
        $sql = "INSERT INTO chatbot (question, answer) VALUES (:question, :answer)";  //insert into database
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $user_question);
        $stmt->bindParam(':answer', $user_answer);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        echo json_encode([
          'status' => 1,
            'answer' =>  "Now I'm smarter! Thanks for your help.",
          ]);     
        return;
      
      }else{
         echo json_encode([
          'status' => 1,
            'answer' => "Sorry! I know the answer. You can train me again with same question but with an alternative answer.",
          ]);
      return;   
      };
      return;
  };
}else{ 
?>

<!DOCTYPE html>
<html>
  <head>
    <title> Epospiky's Portfolio </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- link to main stylesheet -->
       <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/3.3.4/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

       <link rel="stylesheet" type="text/css" href="https://static.oracle.com/cdn/jet/v4.1.0/default/css/alta/oj-alta-min.css">
       <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/require.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/hmg.min.js"></script>
        <style>

        ul.navi {
        list-style-type: none;
        margin: 0;

        }

        .navi li a {
        display: block;
        font-size: 20px;
        color: #000;
        padding: 0px;
        text-decoration: none;
          }
        /* Change the link color on hover */
       .nav-right{
        border: 0px!important;
       }
       .user h3{
        font-size: 30px;
        color:blue;
        font-weight: bolder;
        font-family: 'as destine';
        cursor: pointer;
        text-align: center;
       }
       .user h3:hover{
          color: black;
       }
       .content{
        background-color: #C0C0C0;
        border-radius: 100px 0px;
        width: 500px;
        border: 0px solid black;
        padding: 50px;
        margin-top: 20px;
        margin-bottom: 20px;
        box-shadow: -5px 0px 5px #000, 0px 5px 5px #000;
       }
       .img-grid img{
        border-radius: 50%;
        border: 2px solid black;
        text-align: center;
       }
       .skill{
        padding-top: 30px;
        padding-right: 20px;
       }
       .skill p {
        text-align: center;
       }

      .logo{
        padding-top: 30px;
        width: 40px;
        margin: 10px;
        transition: all 600ms;
      }
      .logo ul{
        list-style-type: none;
         display: block;
         text-decoration: none;
      }
      .logo li {
        display: block;
        text-decoration: none;
      }



      .logo:hover{
        transform: scale(1.3, 1.3);
      }
    .chat {
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      overflow-y:absolute;
      padding: 0 35px 35px;
      border: none;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
      max-height: 300px;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      -webkit-flex-direction: column;
      flex-direction: column;
    }
    .chat p.san{
      float: left;
        font-size: 14px;
        padding: 20px;
        border-radius: 0px 50px 50px 50px;
        background-color: #b0bfff;
        max-width: 250px;
        clear: both;
        display: inline-block;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
    }
    .chat p.me{
      float: right;
        font-size: 14px;
        padding: 20px;
        border-radius: 50px 0px 50px 50px;
        background-color: #e0e0f0;
         max-width: 250px;
         clear: both;
         margin-bottom: 0px !important;
         margin-top: 2px !important;
    }


        .input {
          padding: 0 35px 35px;
          height: 50px;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .chat-btn{
         
           border-radius: 6px;
           cursor: pointer;
           z-index: 1;

           color: #fff;
           background-color: blue;
           transition: all 0.5s;
        }
        .chat-btn:hover{
          color: #000;
          background-color: #6bcfcf;
        }
        .modal-cont{
          background-color: #fff;
        }
    </style>
  </head>
  <body class="oj-web-applayout-body">

<div class="container oj-web-applayout-page">
 <div class="content oj-web-applayout-max-width oj-web-applayout-content">
  <div class="img-grid  oj-flex  oj-sm-12 oj-lg-offset-6">
    <div class="oj-sm-3"></div>
    <div class="oj-flex-item oj-sm-9">
      <img src="http://res.cloudinary.com/epospiky/image/upload/v1523739075/epo.png" class="oj-sm-center img-responsive" height="250px">
    </div>
  </div>

  <div class="user">
      <h3 ><?php echo $name;?></h3>
  </div>
  <div class="skills_grid oj-flex oj-sm-12">
    <div class="skill oj-flex-item oj-sm-4">
      <p>FrontEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 80%;"> 
            <span class="">80%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>BackEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 60%;"> 
            <span class="">60%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>UI</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 50%;"> 
            <span class="">50%</span> 
            </div>
        </div>
    </div>
    <div class="log0">
      <ul class="oj-flex navi">
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.twitter.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768461/twitter.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.github.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768442/githublogo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.linkedin.com/in/ernest-paul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768390/linkedin_logo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://plus.google.com/+ErnestPaul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768412/google_plus.png"></a>
        </li>
      </ul> 
    </div>
  </div>
        <!--modal-->
   <!--<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">-->
        <div class="modal-cont">
          <div class="modal-header">
            <h5 class="modal-title" id="chatModalLabel"><i class="fa fa-user"></i><b>Santra</b></h5>
           <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>-->
          </div>
          <div class="modal-body "  >
          <div class="chat" id = "chat">
              <p class="san">Hi there. I'm Santra.</p>
              <p class="san">You can train me using this command format <b>train: the question # the answer #authorised password</b> 
                or Type <b>help</b> to begin with</p>   
          
          </div>
          </div>  
          <div class="clearfix"></div> 
            <form class="input " id="bot-input" method="POST">
              <div class="input-group">
                 <input class="form-control" id="txt-input"  type="text" name="input" required="" placeholder="Chat me up..." />
               <span class="input-group-btn">
                  <button type="submit" id="send" class="btn btn-primary"><i class="fa fa-send"></i> </button>
              </span>
              </div>
            </form>
        </div>
     <!-- </div>
    </div>-->
    <!--end of modal
    <button class="btn col-sm-offset-5 chat-btn" data-toggle='modal' data-target='#chatModal'><i class="fa fa-comment-alt">Chat</i></button>-->
    
    </div>  
 </div>




    

  </body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){  
      var showDisplay = $("#chat"); 
        $("#send").click(function(event){ 
        event.preventDefault();
        var newMessage = $("#txt-input");
        var question = newMessage.val(); 

              showDisplay.append(
                '<div class="chat">'
                +'<p class="me">'+question+'</p>'+'</div>'
              );
              $("#chat").scrollTop($("#chat")[0].scrollHeight);
           
          //after appending user question, send it to server for processing
        $.ajax({
            url: "/profiles/epospiky.php",
            dataType : "json",
            type: "POST",
            data: {question: question},
            success: function(response) {
              if(response.status === 1){
                showDisplay.append(           
                  '<div class="chat">'
                  +'<p class="san">'+response.answer+'</p>'+'</div>'
                );
                    $("#chat").scrollTop($("#chat")[0].scrollHeight);
              } 
                },
            error: function(error){
              console.log(error);
            }
        });
        newMessage.val("");         
      });
    }); 
  </script>
</body>
</html>
<?php } ?>

<?php
if(!defined('DB_USER')){
    require "../config.php";   //change config details when pushing
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }
  //Fetch User Details
  try {
      $query = "SELECT * FROM interns_data WHERE username ='iamdevmm'";
      $resultSet = $conn->query($query);
      $profileData = $resultSet->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e){
      throw $e;
  }
  $username = $profileData['username'];
  $fullName = $profileData['name'];
  $picture = $profileData['image_filename'];
  //Fetch Secret Word
  try{
      $querySecret =  "SELECT * FROM secret_word LIMIT 1";
      $resultSet   =  $conn->query($querySecret);
      $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
      $secret_word =  $resultData['secret_word'];
  }catch (PDOException $e){
      throw $e;
  }
  $secret_word =  $resultData['secret_word'];
?>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $question = $_POST['input_text'];
  $question = preg_replace('([\s]+)', ' ', trim($question));
  $question = preg_replace("([?.])", "", $question); 
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'aboutbot'){
      echo json_encode([
        'status' => 1,
        'answer' => "I am Dev. MM bot 1.0"
      ]);
      return;
    };
  $check_for_train = stripos($question, "train:");
    if($check_for_train === false){ 
      $question = preg_replace('([\s]+)', ' ', trim($question));
      $question = preg_replace("([?.])", "", $question); 
  
  $question = $question;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){ 
            echo json_encode([
            'status' => 1,
             'answer' =>  "I can't provide answer to your question, train me to be productive, using this format  train: question #answer #password"
         ]);
          return;
        }else {
            $rand_keys = array_rand($data);
            $answer = $data[$rand_keys]['answer'];
            echo json_encode([
            'status' => 1,
             'answer' => $answer,  //return one of the the answers to client
         ]);
           return;
          };      
      
      
  }else{      
    //train the chatbot to be more smarter 
    //remove extra white space, ? and . from question
      $train_string  = preg_replace('([\s]+)', ' ', trim($question));
      $train_string  = preg_replace("([?.])", "",  $train_string); 
      //get the question and answer by removing the 'train'
      $train_string = substr( $train_string, 6);
      $train_string = explode("#", $train_string);
        //get the index of the user question
        $user_question = trim($train_string[0]);
          if(count($train_string) == 1){ //then the user only enter question and did'nt enter answer and password
            echo json_encode([
              'status' => 1,
              'answer' => "Ooop! invalid training format. Please use the correct format --> train: question #answer #password"
            ]);
          return; 
          };
          //get the index of the user answer
          $user_answer = trim($train_string[1]);    
          if(count($train_string) < 3){ //then the user only enter question and answer But did'nt enter password
            echo json_encode([
              'status' => 1,
              'answer' => "Please enter training password to train me. The password is--> password"
            ]);
          return;
          };
           //get the index of the user password
        $user_password = trim($train_string[2]);
          //verify if training password is correct
          define('TRAINING_PASSWORD', 'password'); //this is a constant variable
          if($user_password !== TRAINING_PASSWORD){ //the password is incorrect
            echo json_encode([
              'status' => 1,
              'answer' => "The password you entered is wrong! Please enter the correct password which is-->  password "
            ]);
        return;
        };
        //check database if answer exist already
        $user_answer = "$user_answer"; //return things that have the question
        $sql = "select * from chatbot where answer like :user_answer";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_answer', $user_answer);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $stmt->fetchAll();
        if(empty($rows)){// then it means the database could not fetch any existing question and answer, so we can insect the query.      
          $sql = "insert into chatbot (question, answer) values (:question, :answer)";  //insert into database
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':question', $user_question);
          $stmt->bindParam(':answer', $user_answer);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          
          echo json_encode([
            'status' => 1,
              'answer' => "Thanks so much for making me productive! "
            ]);     
        return;
        
        }else{ //then it means the the question already in the database and no need to insert it again
           echo json_encode([
            'status' => 1,
              'answer' => "I already learnt this, kindly teach me new things"
            ]);
      return;   
        };
      return;
    };    
    
} else {
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
	
	<style>
     
      body{
        background-image: url('http://res.cloudinary.com/devplus-devmm/image/upload/v1524619646/apple_imac_201705_thumb800_ualczl.webp');
         background-repeat: no-repeat;
          background-size: cover;

      }
      .circle-img{
        height: 200px;
        width: 200px;
        margin: auto;
        margin-top: -180px;
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }
        .bot-img{
        height: 30px;
        width: 30px;
        margin: auto;
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }
      .chatbot-main{
      background-color: #F3F3F3;
      width: 400px;
      height: 500px;
      border-radius: 10px;
      box-sizing: border-box;
    }
    .chat-header{
      width: auto;
      height: 50px;
      border-radius: 10px 10px 0 0;
      background-color: #ffffff;
      color: #000000;
      text-align: center;
      padding: 10px;
      font-size: 1em;
    }
    #chat-body{     
        display: flex;
        flex-direction: column;
        padding: 10px 20px 20px 20px;
        background: #f0f0f0;           
        overflow-y: scroll;
        height: 395px;
        max-height: 395px;
    }
    .message{
      font-size: 0.8em;
      width: 200px;
      display: inline-block;
      padding: 10px;
      margin: 5px;
      border-radius: 10px;
      line-height: 18px;
    }
    .bot_chat{
      text-align: left;
    }
    .bot_chat .message{
      background-color: #007bff;
      color: white;
      opacity: 0.9;
     
    }
    .user_chat{
      text-align: right;
    }
    .user_chat .message{
      background-color: #007bff;
      color: #ffffff;
    }
    .chat-footer{
      background-color: #ffffff;
      padding-bottom: 5px;
      height: 54px;
      border-radius: 0 0 10px 10px;

    }
    .input-text-container{
      margin-left: 20px;
    }
    .input_text{      
      width: 300px;
      height: 35px;
      padding: 5px;
      border-left: 0px;
      border-right:0px;
      border-top: 0px;
      margin-top: 8px;
      border-bottom: 0.5px solid #34495E;
    }
    .sendBtn{
      width: 40px;
      height: 40px;
      padding: 5px;
      margin-top: 8px;
      color: white;
      border:none;
      border-radius: 100%;
      background-color: #34495E;
    }
   
	</style>
</head>
<body> <br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card text-white bg-primary mb-3" style="width: 36rem; height: 50rem;">
        <img class="card-img-top" src="http://res.cloudinary.com/devplus-devmm/image/upload/v1507362477/IMG-20150921-WA0003_nbuexz.jpg" alt="Card image cap" style="height:24rem;">
        <img class="circle-img" src="<?php echo $picture; ?>" alt="Card image cap"> 
          <div class="card-body">
            <h4 class="card-title" style="text-align: center; color: #ffffff;"><?php echo $fullName; ?></h4>
            <hr>
            <p class="card-text" style="text-align: center;">
              I am a Web Developer who love to provide solution and adding value.
            </p>
          </div>
          <div class="card-footer">
            <ul class="list-inline text-center">
               <li class="list-inline-item">
                  <a id="twitter" href="https://twitter.com/iamdevmm?lang=en" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="facebook" href="https://web.facebook.com/abiola.muhammed" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="github" href="https://github.com/iamdevmm" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
    
            </ul>
          </div>
        </div>
      </div>
     

      <div class="col-sm-6">
        <div class="chatbot-main">
      <div class="chat-header">
        <span>Dev. MM Chatbot</span>
      </div>
      <div id="chat-body">
        <div class="bot_chat">
            <div class="message">Hey! My name is MM bot.<br>Do you have some questions for me drop them here!<br>Type <span style="color: #34495E;"><strong> Aboutbot</strong></span> to know more about me.
            </div>
        </div>
      </div>
      <div class="chat-footer">
        <div class="input-text-container">
          <form action="" method="post" id="chat-input-form">
            <input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Type your question here...">
            <button type="submit" class="sendBtn" id="send"><i class="fa fa-send"></i></button>
          </form>
        </div>        
      </div>
    </div>
      </div>
</div>
    </div>

    
       
<!-- <div class="oj-flex oj-flex-items-pad">
    <div class="oj-md-4 oj-flex-item">
    </div>
        <div class="oj-md-4 oj-flex-item" style="margin-top: 100px; background: rgb(43, 108, 167);">

          <div class="align-w">
              <img src="<?php echo $user->image_filename; ?>" height="250" width="250" style="margin-top:-90px;"><br><br>
              <hr style="background: #f0f0f0; width: 300px; height: 1px;">
              <h3>
                <i class="fa fa-user-circle"></i> 
                <span style="color: #ffffff;"><?php echo $user->name; ?></span>
            </h3>
            <h3>
                <i class="fa fa-slack"></i>
                <span style="color: #ffffff;"> @<?php echo $user->username; ?></span>
            </h3>

            <p align="center" style="color: #ffffff;">
                Web developer, Skilled in HTML, CSS, JS, PHP
            </p><br><br><br>
          </div>
      </div>
</div> -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var chat_output = $("#chat-body");
      $("#chat-input-form").on("submit", function(e) {
          e.preventDefault();
          var input_text = $("#input_text").val();
          chat_output.append("<div class='user_chat'><div class='message'>"+input_text+"</div><img class='bot-img' src='http://res.cloudinary.com/devplus-devmm/image/upload/v1526106999/user-dummy_pynep7.png'></div>");
          chat_output.scrollTop(chat_output[0].scrollHeight);
      //send question to server
      $.ajax({
        url: 'profiles/iamdevmm.php', //i will need to change this when pushing
        type: 'POST',
        data: {input_text: input_text},
        dataType: 'json',
        success: (response) => {
              response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />'); 
              let response_answer = response.answer;
              chat_output.append("<div class='bot_chat'><img class='bot-img' src='<?php echo $picture ?>'><div class='message'>" +response_answer+ "</div></div>");      
              $('#chat-body').animate({scrollTop: $('#chat-body').get(0).scrollHeight}, 1100);     
        },
        error: (error) => {
                alert('error occured')
            console.log(error);
        }
        
      });
      document.getElementById("chat-input-form").reset(); //clear the fields
    }); 
</script>

</html>

<?php }?>

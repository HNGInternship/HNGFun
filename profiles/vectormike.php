<?php

function getBotInfo() {
    $bot_version="1.0.1";
    return "Heyo! I'm Vectormike's smiggle. I'm version " .$bot_version;
}
function getBotMan() {
    return  "Send 'location' to know your location. \n
    Send 'time' to get the time. \n
    Send 'about' to know me. \n
    Send 'help' to see this again. \n
    To train me, send in this format: \n
    'train: question # answer # password'";
}
function getAge() {
    $bot_version="1.0.1";
    return "Vectormike is just 20 years old. As for me, I have got no idea of age. Still " .$bot_version;
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;

    $PublicIP = get_client_ip();
    $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
    $json  =  json_decode($json ,true);
    $country =  $json['country_name'];
    $region= $json['region_name'];
    $city = $json['city'];
}

if(!defined('DB_USER')){
    require "../../config.php";		
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
 }
  //Fetch User Details
  try {
      $query = "SELECT * FROM interns_data WHERE username ='vectormike'";
      $resultSet = $conn->query($query);
      $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e){
      throw $e;
  }
  $username = $resultData['username'];
  $fullName = $resultData['name'];
  $picture = $resultData['image_filename'];
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
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //require "../answers.php";

        date_default_timezone_set("Africa/Lagos");

        try {
            if(!isset($_POST['question'])) {
                echo json_encode([
                    'status' => 1,
                    'answer' => "Please provide a question"
                ]);
                return;
            }

            $question = $_POST['question'];

            // Getting Bot info
            if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'info') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getBotInfo()
                ]);
                return;
            }

            // Getting Bot Menu or Manual
            if(preg_replace('([\s])', ' ', trim(strtolower($question))) === 'help') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getBotMan()
                ]);
                return;
            }
            
            // Asking for age
            if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'age') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getAge()
                ]);
                return;
            }

            // Asking for time
            if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'time') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getTime()       
                ]);
                return;
            }

            // Asking for location
            if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'location') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getLocationDetails(get_client_ip())
                ]);
                return;
            }

            //check if in training mode
            $index_of_train = stripos($question, "train:");
            if($index_of_train === false){//then in question mode
                $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
                $question = preg_replace("([?.])", "", $question); //remove ? and .
            
            // check if answer already exists in database
            $question = "%$question%";
            $sql = "select * from chatbot where question like :question";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':question', $question);
            $stmt->execute();

            $stmt->setFetchmode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll();
            if(count($rows)>0) {
                $index = rand(0, count($rows)-1);
				$row = $rows[$index];
                $answer = $row['answer'];	
                
                //check if the answer is to call a function
            $index_of_parentheses = stripos($answer, "((");
            if($index_of_parentheses === false){ //then the answer is not to call a function
                 echo json_encode([
		            'answer' => $answer
				]);
            } else{
                
                //otherwise call a function. but get the function name first
                $index_of_parentheses_closing = stripos($answer, "))");
                if($index_of_parentheses_closing !== false){
                  $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
                  $function_name = trim($function_name);
                  if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
                    echo json_encode([
                      'status' => 0,
                      'answer' => "The function name should not contain white spaces"
                    ]);
                    return;
                  }
                  if(!function_exists($function_name)){
                    echo json_encode([
                      'status' => 0,
                      'answer' => "I am sorry but I could not find that function"
                    ]);
                  }else{
                    echo json_encode([
                      'status' => 1,
                      'answer' => str_replace("(($function_name))", $function_name(), $answer)
                    ]);
                  }
                  return;
                }
              }
            }else{
              echo json_encode([
                'status' => 0,
                'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further. The training data format is <br> <b>train: question # answer</b>"
              ]);
            }		
            return;

        }else{
            //in training mode
            //get the question and answer
            $question_and_answer_string = substr($question, 6);
            //remove excess white space in $question_and_answer_string
            $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
            
            $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
            $split_string = explode("#", $question_and_answer_string);
            if(count($split_string) == 1){
              echo json_encode([
                'status' => 0,
                'answer' => "Invalid training format. I cannot decipher the answer part of the question \n
                            The correct format is training: question # answer # password"
              ]);
              return;
            }
            $que = trim($split_string[0]);
            $ans = trim($split_string[1]);
        
            if(count($split_string) < 3){
              echo json_encode([
                'status' => 0,
                'answer' => "You need to enter the training password to train me."
              ]);
              return;
            }
        
            $password = trim($split_string[2]);
            //verify if training password is correct
            define('TRAINING_PASSWORD', 'password');
            if($password !== TRAINING_PASSWORD){
              echo json_encode([
                'status' => 0,
                'answer' => "You are not authorized to train me"
              ]);
              return;
            }
        
            //insert into database
            $sql = "insert into chatbot (question, answer) values (:question, :answer)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':question', $que);
            $stmt->bindParam(':answer', $ans);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo json_encode([
              'status' => 1,
              'answer' => "Thanks alot for your help"
            ]);
            return;
          }
        
        echo json_encode([
            'status' => 0,
            'answer' => "Sorry, i really dont understand you right now, you could offer to train me"
          ]);    
            
        
    } catch (Exception $e){
        return $e->message ;

    }
  
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Victor Jonah</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  	
    <style>
        .profile {
            background-color:#0af568;
        }
        .profile-section {
            justify-content: center;
            align-content: center;
            margin-bottom:50px;
            margin-right: auto;
            margin-left: auto;
            margin-top:30px;
            background-color:#ccb4cd;
            width:400px;
            height:700px;
            box-shadow:5px 10px;
            padding:50px;   
        }
        .imag {
            padding:10px;
        }
        .about {
            padding: 10px;
            font-family: 'Gamja Flower', cursive;
        }
        h1 {

            font-family: 'Jua', sans-serif;
        }
        .fa:hover {
            color: limegreen;
            padding: 3px;
        }
        .chat-modal-button {
            background-color:#ffff00;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            height:30px;
            border-radius:100%;
            bottom: 10px;
            left:0;
            width: 40px;
            height: 40px;
            transform: translateX(70px);
            transition: all 250ms ease-out;
            box-shadow: 0 2px 3px 0 #77a956;
        }
        .fa-comments {
            background-color:#ffff00;
        }
        .bubble {
           font-size:18px;
           padding:13px 14px;
           -moz-border-radius:10px;
           -webkit-border-radius:10px;
           border-radius:10px;
           position:relative;
           display:inline-block;
           clear:both;
           vertical-align:top;
           margin-bottom:8px;
        }
        .bubble:before {
            position: absolute;
            top: 19px;
            display: block;
            width: 8px;
            height: 6px;
            content: '\00a0';
            -moz-transform: rotate(29deg) skew(-35deg);
            -ms-transform: rotate(29deg) skew(-35deg);
            -webkit-transform: rotate(29deg) skew(-35deg);
            transform: rotate(29deg) skew(-35deg);
        }
        .bubble.you {
            float: left;
            color: #000000;
            background-color: #e4801b;
            -webkit-align-self: flex-start;
            align-self: flex-start;
            -moz-animation-name: slideFromLeft;
            -webkit-animation-name: slideFromLeft;
            animation-name: slideFromLeft;
        }
        .bubble.you:before {
            left: -3px;
            background-color: #e4801b; 
        }
        .bubble.me {
            float: right;
            color: #1a1a1a;
            background-color: #db4824;
            -webkit-align-self: flex-end;
            align-self: flex-end;
            -moz-animation-name: slideFromRight;
            -webkit-animation-name: slideFromRight;
            animation-name: slideFromRight;
        }
        .bubble.me:before {
            right: -3px;
            background-color: #db4824;
          
        }
        textarea {
            resize: none !important;
        }

    </style>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
    <body class="profile">
        <div class="profile-section text-center">
            <div class="imag">
                <img class="img-responsive img-circle img-fluid" style="margin: 0 auto;"width="350px" height="10px" src="https://res.cloudinary.com/vectormike/image/upload/v1523655733/gg.jpg" alt="This is me o!">
            </div>
            <div class="about">
                <h1>Hello! <i class="fa fa-angellist"></i></h1>
                <p>I'm Victor Jonah</p>
                <p>Computer Science Estudiante.</p>
                <p>HNG Intern, 2018</p>            
                <!-- Chatbot Section -->
                <!-- Trigger the modal with a button -->
            </div>
                <button type="button" id="mssgbox" class="btn chat-modal-button" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-user"></i> Vectormike</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="chat">
                                    <div class="bubble you">
                                        Heyo! What's up?
                                    </div>
                                    <div class="bubble you">
                                        Ask me any shiit!
                                    </div>
                                    <div class="bubble you">
                                        Don't be mean, please.
                                    </div>
                                    <div class="bubble you">
                                        Type 'help' first. 
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>
                            <form id="question-section">
                                <div class="row">
                                    <div class="col-md-9">
                                        <textarea name="question" id="question" class="form-control" cols="10" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div> 
        </div>
    </body>

    <script>
    $('h1').addClass('animated infinite hinge');
    $('#mssgbox').addClass('animated infinite flash');
    $('.imag').addClass('animated zoomInDown');
    $('.about').addClass('animated zoomInUp');
    </script>
    
    <script>
      $(document).ready(function(){
          var questionForm = $('#question-section');
          questionForm.submit(function(e){
              e.preventDefault();
              var questionBox = $('textarea[name=question]');
              var question = questionBox.val();

              // Display question in the message frame as a chat entry
              var messageFrame = $('.chat');
              var chatToBeDisplayed = '<div class="bubble me">'+question+'</div>';
              messageFrame.append(chatToBeDisplayed);
              $(".modal-body").scrollTop($(".modal-body")[0].scrollHeight);

              // Send questions to the server
              $.ajax({
                  url: "profiles/vectormike.php",
                  type: "post",
                  data: {question: question},
                  dataType: "json",
                  success: function(response){
                    var chatToBeDisplayed = '<div class="bubble you">'+response.answer+'</div>';
                    messageFrame.append(chatToBeDisplayed);
                    questionBox.val('');
                    $(".modal-body").scrollTop($(".modal-body")[0].scrollHeight);
                  },
                  error: function(error){
                      console.log(error);
                  }
              })
          });
      });
    </script>
    

<?php

    require_once '../../db.php';
    try {
    $select = 'SELECT * FROM secret_word';
    $query = $conn->query($select);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    }
    catch (PDOException $e) {

    throw $e;
    }
    $secret_word = $data['secret_word'];
?>
</html>
<?php } ?>
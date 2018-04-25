<?php 
if(!defined('DB_USER')){
  require "../../config.php";   
  try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'foluwa'");
$user = $result2->fetch(PDO::FETCH_OBJ);

if($_SERVER['REQUEST_METHOD'] === 'POST'){   
    try{

      if(!isset($_POST['question'])){
        echo json_encode([
          'status' => 1,
          'answer' => "Please provide a question"
        ]);
        return;
      }

      $mem = $_POST['question'];
      $mem = preg_replace('([\s]+)', ' ', trim($mem));
      $mem = preg_replace("([?.])", "", $mem);
    $arr = explode(" ", $mem);
    
    /* Training the bot*/ 
    if($arr[0] == "train:"){

      unset($arr[0]);
      $q = implode(" ",$arr);
      $queries = explode("#", $q);
      if (count($queries) < 3) {
        # code...
        echo json_encode([
          'status' => 0,
          'answer' => "You need to enter a password to train me."
        ]);
        return;
      }
      $password = trim($queries[2]);
      //to verify training password
      define('trainingpassword', 'password');
      
      if ($password !== trainingpassword) {
        # code...
        echo json_encode([
          'status'=> 0,
          'answer' => "You entered a wrong passsword"
        ]);
        return;
      }
      $quest = $queries[0];
      $ans = $queries[1];

      $sql = "insert into chatbot (question, answer) values (:question, :answer)";

      $stmt = $conn->prepare($sql);
          $stmt->bindParam(':question', $quest);
          $stmt->bindParam(':answer', $ans);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

      
      echo json_encode([
        'status' => 1,
        'answer' => "Thanks for training me, I would love to learn more"
      ]);
      return;
    }
      elseif ($arr[0] == "aboutbot") {
        # code...
        echo json_encode([
          'status'=> 1,
          'answer' => "I am ZOE, Version 1.0.0. You can train me by using this format ' train: This is a question # This is the answer # password '"
        ]);
        return;
      }
      else {
        $question = implode(" ",$arr);
        //to check if answer already exists in the database...
        $question = "%$question%";
        $sql = "Select * from chatbot where question like :question";
          $stat = $conn->prepare($sql);
          $stat->bindParam(':question', $question);
          $stat->execute();

          $stat->setFetchMode(PDO::FETCH_ASSOC);
          $rows = $stat->fetchAll();
          if(count($rows)>0){
            $index = rand(0, count($rows)-1);
            $row = $rows[$index];
            $answer = $row['answer'];
            // check if answer is a function.
            $index_of_parentheses = stripos($answer, "((");
            if($index_of_parentheses === false){// if answer is not to call a function
              echo json_encode([
                'status' => 1,
                'answer' => $answer
              ]);
              return;
            }else{//otherwise call a function. but get the function name first
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
            'answer' => "I am sorry, I cannot answer your question now. You could offer to train me."
          ]);
          return;
        }
      }
  }catch (Exception $e){
    return $e->message ;
  }
}

  function randomQuotes () {
    $quotes = array("I have a dream",
                       "Children are good", 
                       "Another quote"
                       "Another 11 quote"
                       "Another vbbv quote"
                       "Another [[[]]] quote"
                       "Anothernnn quote");
     $myQuotes = quotes[rand(0,3);];
     return $myQuotes;
    }
?>

<?php //DATE
 $d = date("h:i:sa");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Foluwa hng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  
  <style type="text/css">
      body {
          height: 100%;
          background-color: #87ceeb;
          background: linear-gradient(to bottom right, #DDA0DD,  #87ceeb);
      }
      img{
          border-radius: 50%;
          max-height: 250px;
          max-width: 250px;
      }
      input[type=text] {
          width: 50%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
          border-radius: 4px;
          background-color: skyblue;
          color: white;
        }
         input[type=text]:focus{
           border: 3px solid #555;
         }
         button{
            border: 3px solid #555;
            text-decoration: none;
            margin: 4px 2px;
            border-radius: 4px;
         }
      .socialMediaIcons {
          font-size: 25px;
      }
      #meSection{
          border: 2px black solid;
          width: 50%;
          height:auto;
      }

      #botSection{
         border: 2px red solid;
         width: 47%;
         height:auto;
         padding: 10px;
}
      .botSend{
         position: absolute; 
        color: red;
        right: 100px;
        background-color: grey;
        border-radius: 4px;
        font-size: 20px;

      }
      .humanSend {
        position: absolute; 
        color: green;
        right: 0px;
        background-color: skyblue;
        border-radius: 4px;
        font-size: 20px;
      }
  </style>
</head>
<body>
    <main class="container content">
      <div class="row">
            <div class="col-sm-6" id="meSection">
                     <div class="socialMedia">
                       <img src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg">
                      <span class="name"><?php echo $user->name; ?></span>
      									<div class="socialMediaIcons">
      										<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
      										<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
      										<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
      										<a href="https://github.com/foluwa"><i class="fa fa-github"></i></a>
      										<a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a>
                        </div>
                      </div>
             </div>
          
           <div class="col-sm-6" id="botSection">
                <div class="chat-head">Chat Interface</div>
                    <div class="chat">
                        <div id="conversation">
                          <p class="botSend" style="margin-top:0px;left:0px;">
                              <strong><?php echo $d ?></strong>
                          </p>
                        </div>
                        <div style="position:fixed;bottom:0;">
                        <form id="chat" class="box" action="foluwa.php" name="message" method="post">
                          <textarea name="inputtext" type="text" id="message" class="message" placeholder="Enter your command"></textarea>
                          <button id="send" class=send type=submit>Send</button>
                        </form>
                        </div>
                    </div>
                </div>
           </div>
      </div>
      <footer>Foluwa @ <a href="https://hotels.ng">Hotels.ng</a></footer>
    </main>
    <!--<script src="../vendor/jquery/jquery.min.js"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script>
    $(document).ready(function(){
      var Form =$('#conversation');
      Form.submit(function(e){
        e.preventDefault();
        var questionBox = $('textarea[name=inputtext]');
        var question = questionBox.val();
        $("#conversation").append("<p class='botSend'>" + question + "<?php echo $d?>" + "</p>");
        $.ajax({
          url: '/profiles/foluwa.php',
          type: 'POST',
          data: {question: question},
          dataType: 'json',
          success: function(response){
              $("#botPost").append("<p class='humanSend'>"  + response.answer +  "</p>");
          },
          error: function(error){
                alert(error);
          }
        })  
      })
    });
  </script>
</body>
</html>
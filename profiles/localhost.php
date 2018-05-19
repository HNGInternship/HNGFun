
  <?php
  /*include('../header.php');
  include('../config.php');

  require '../db.php';*/
  function isTraining($question){
    if(strpos($question, 'train:') !== FALSE){
      return true;
    }else{
      return false;

    }

  }


  function getAnswer($question, $conn){
    $answer = "";
    $sql = "SELECT * FROM chatbot WHERE question = '".$question."'";
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    $count = count($result);
    if($count >0){
          $random = rand(0,$count-1);
          $answer = $result[$random];
          $answer = $answer['answer'];
    }

    else{

          $answer = "I do not understand your question. You can train me to become smarter, to train me type 'train: question#answer#password'";

        }

        $status = 1;
        return json_encode(['status'=>$status,

                            'answer'=>$answer]);
  }

  function saveQuestionAnswer($question, $conn){
    $answer = '';
    $train = explode(":", $question);
    $save_new = explode('#', $train[1]);
    $count2 = count($save_new);
    if($count2 === 3){
      if (trim($save_new[2]) == "password") {
        $que = trim($save_new[0]); 
        $ans = trim($save_new[1]);
        if (checkAnswerExist($que, $ans, $conn) === false){ 
          $sql = "INSERT INTO chatbot (question, answer) VALUES ('".$que."', '".$ans."')";
          if($conn->exec($sql)){
            $answer = "Training successful!. Thank you for making me smarter";
          }else{
            $answer = "Oops! Training Failed. Something went wrong.";
          }
        }else{
          $answer = "I am already trained with that. You can train me using the same question but with a different answer";
        }
        

      }
      else{
        $answer = "Password incorrect, you are not permitted to train me";
      }

    }else{
      $answer = "Training format incorrect. You are not permitted to train me.";
    }

    $status = 1;
    return json_encode([
              'status' => $status,
              'answer' => $answer
          ]) ; 
  }


  function checkAnswerExist($question, $answer, $conn){
    $sql = "SELECT * FROM chatbot WHERE question = '" . $question . "'" . "AND answer = '" .$answer.  "'";
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    if(count($result) > 0){
      return true;
    }

    return false;
  }

  function isAbout(){
    $status = 1;
    $answer = "localhostBot version 1.0";

    return json_encode([
              'status' => $status,
              'answer' => $answer
          ]);  

  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require ('../../config.php');
    global $conn; 
    global $response; 

    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);

    } 

    catch (PDOException $pe) {

        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }

    $question = $_POST['msg'];
    $question = strtolower($question);

    if(preg_match('([?.])', $question)){
      $question = preg_replace('([?.])', "", $question);
    }

    if (isTraining($question) === true) {
      $response = saveQuestionAnswer($question, $conn);

    }else{
      if($question == 'aboutbot'){
        $response = isAbout();
      }else{
        $response = getAnswer($question, $conn);
      }
      
    }
    
    echo $response; 
  
        
  }

if($_SERVER['REQUEST_METHOD'] == 'GET'){
       $stmt = $conn->query("SELECT * FROM secret_word LIMIT 1");
        
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       $secret_word = $result['secret_word'];


       $sql = "SELECT * FROM interns_data where username='localhost'";
       $query = $conn->query($sql);
       $query->setFetchMode(PDO::FETCH_ASSOC); 
       $result = $query->fetch();
       $name = $result['name'];
       $username = $result['username'];
       $image = $result['image_filename'];
     

?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile Page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style type="text/css">
body{
  background-color: aliceblue;
}
.big-container{
  width:100%;
  height:100%;
  background-color: floralwhite;
}
  .img-fluid{
      width: 300px;
      height: 300px;
      border-color: #FFF;
      border-width: 5px;
      border-style: solid;
      border-radius: 50%;
      margin-top:60px;
     
  } 
  .text-uppercase, .text-lowercase, .font-weight-light{
    text-align: center
  }
  .list-inline{
    text-align: center;
  }
  
    .form-group{
   /*position:fixed;*/
    margin-top:20px; 
    }
    .cover{
      background-color: #C0C0C0;
      height:450px;
      width: 75%;
      float: left;
      margin: 0 auto;
      float: center;
      overflow-y: scroll;
        
    }
    .user{
        
        float:right;
        width:50%;
        border: 2px solid aliceblue;
        background-color: #36C;
        color: #FFF;
        border-radius: 7px;
         padding-left: 5px;
    
    }
    .bot{
       
        width:50%;
        border: 2px solid floralwhite;
        background-color: #36C;
        color: #FFF;
        border-radius: 7px;
        padding-left: 5px;
    }
    #main-cover{
        width:95%;
        height:100%;
        margin-top: 50px;
    }
    #btn{
      background-color: #00F;
      color:white;
    }
    input[type='text']{
      width: 75%;

    }
    .scrollbar-blue::-webkit-scrollbar-track {
           -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
           background-color: #F5F5F5;
           border-radius: 10px;
           border: 1px solid #000080;
       }

       .scrollbar-blue::-webkit-scrollbar {
           width: 6px;
           background-color: #F5F5F5;
       }

       .scrollbar-blue::-webkit-scrollbar-thumb {
           border-radius: 10px;
           -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
           background-color: #000080;
       }
        
        
</style>
<body>

  <section id="">
          <div class="section-content">
              <div class="container">
              <div class="row">
              <div class="col-md-12">
                  <div class="card-group">
                      <div class="card">
                          
                          <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo $image; ?>" alt="">
                          <div class="card-block">
                                <h1 class="text-uppercase mb-0"><?php echo($name) ?></h1>
                                <h1 class="text-lowercase mb-0"><?php echo $username; ?></h1>
                                <hr class="star-light">
                               <h2 class="font-weight-light mb-5">Skills: PHP - MySQL - HTML - CSS</h2>
                          </div>
                         
                      </div>
                      <div class="card" id="main-cover">
                        <!--div class="form-group"-->
                        <p class="text-uppercase mb-0"><b>Localhost Bot</b></p>
                          <div class="cover scrollbar-blue">
                          <p><strong>Bot</strong></p>
                          <div class="bot">
                            hi <br>
                            I am Localhost bot <br>
                            I am here to help you, ask me any question <br>
                            You can also train me using this format; <br>
                            <strong>train: question # answer # password</strong><br>
                            To find out more about me type <strong>aboutbot</strong>
                          </div>
                            
                        </div>
                        <div class="form-group" style="margin-top:24px">
                          <input class="form-control form" type="text" value="" >
                        </div>
                       
                        <div class="form-group" style="margin-top:10px;">
                          <button type="button" class="send" class="btn btn-success" id="btn">Send</button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
      </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
</script>
 <script>
    $(document).ready(function(){

      $('.send').click(function(){

      //alert('This is an alert');
      
        var user_input = $(".form").val();
        var msg =  '<p  style="text-align: right;"><strong>User</strong></p>' + '<div class = "user">' + user_input + '</div>';
        $(".cover").append(msg);
         $(".form").val("");
         $.ajax({
        url:"./profiles/localhost.php",
        type:"POST",
        data:{msg : user_input},
        dataType: 'json',
        success: function(data){
           var bot_input = "<br>" +'<p><strong>Bot</strong></p>' + '<div class="bot">' 
           + data.answer + '</div>';
           $(".cover").append(bot_input);
           $(".cover").scrollTop($(".cover")[0].scrollHeight);
        },
        error: function(req, status, err){
            console.log('something went wrong', status, err);
            console.warn(req.responseText);
        }

    });

  });
});


  </script>

</body>
</html>
<?php } ?>
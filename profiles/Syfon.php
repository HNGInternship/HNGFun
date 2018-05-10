<?php

if(!isset($_GET['id'])){
   require '../db.php';
 }else{
    require 'db.php';
 }



try{
   $sql = 'SELECT * FROM secret_word';
   $q = $conn->query($sql);
   $q->setFetchMode(PDO::FETCH_ASSOC);
   $data = $q->fetch();
   $secret_word= $data['secret_word'];
} catch (PDOException $e){
       throw $e;
   }


$result2 = $conn->query("Select * from interns_data where username = 'Syfon'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!-- chatbot -->
<?php
if(isset($_POST['send'])){
if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['message-input'];
      //  $data = preg_replace('/\s+/', '', $data);
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    } return $data;

   
    function aboutbot() {
        echo "<div id='result'>Syfon Bot - I am a bot that returns data from the database and I can do anything you ask me to do if only you train me</div>";
    }

    function chatMode($ques){
        require '../../config.php';
        $ques = test_input($ques);
        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
        if(!$conn){
            echo json_encode([
                'status'    => 1,
                'answer'    => "Could not connect to the database " . DB_DATABASE . ": " . $conn->connect_error
            ]);
            return;
        }
        $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
        $result = $conn->query($query)->fetch_all();
        echo json_encode([
            'status' => 1,
            'answer' => $result
        ]);
        return;
    }

    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();

            if(empty($data)) {
                $training_data = array(':question' => $question,
                    ':answer' => $answer);

                $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';

                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>Training Successful!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Invalid Password, Try Again!</div>";

        }
    }
  
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry, I do not know that command. You can train me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
}
    ?>
<!doctype html>
<html lang="en">
  <head>
    <title>My Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
    <title>My portfolio</title>
    <style>
.card-img-top{
    height:30rem;

}
.card-body{
    background-color: rgb(1, 1, 41);
}
.rounded-circle{
    border-radius:50%;
    height: 20rem;
    width:20rem;
    position: absolute;
    top:40px;
    left: 30em;
}
.fa {
    padding:20px ;
    font-size: 50px;
    /* width: 50px; */
    text-decoration: none;
}
#chatbot{
    background-color:rgb(1, 1, 53);
    padding: 1rem;
    border-radius: 10px;

}
#chat-area{
    min-height: 15vh;
    background-color:white;
}
.details, h1{
    color: white;
    padding: 2rem;
}
#About{
    background-color: rgb(163, 157, 157); 
    padding: 1rem;
}
#foot{
    background-color: rgba(14, 12, 12, 0.89);
}
#chatbox {
  height: 30px;
  width: 100%;
}

</style>

    
</head>
  <body>


    <section id="profile">
        <div id="container">
                        <img class="card-img-top" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg" alt="Card image cap">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle">
                        </div>     
    <section id="About" >                   
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">     
                        <div class="details">     
                            <h3>Sifon Isaac</h3><br>
                            <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                           
                    </div>
                    </div>
    <div class="col-md-6">
         <div id="chatbot">
         <div class="chatplace">
            <h1>Syfon's Bot</h1>              
            <div id="chat-area" class="chat-area">
            <form action="" method="post" name="message" id="message-input">
            <p id="chatlog" class="chatlog"><p>To teach me use the format below</p>
            <p>train: your question # your answer # password</p>
            <div class="input-group mb-3">
            <input class="form-control message chat_input " value="" autocorrection="off" name="chat" id="chat" class="chat" placeholder="Hi there! Type here to talk to me." focus="placeHolder()">            
            </div>
            </form>
         </div>    
    </div>
    </div>
  </div>
</section>
 <section id="foot" >                   
        <div class="container">
                <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
              <a href="https://github.com/Syfon01" class="fa fa-github"></a>
              <a href="" class="fa fa-slack"></a> 

 </div>
</section>

</section>

<script>
    var outputArea = $("#chat-area");

    $("#message-input").on("submit", function(e) {

        e.preventDefault();

        var message = $('.message').val();
        

        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);

   $.ajax({
            url: 'profile.php?id=Syfon',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
               // var result =    $('<div/>', {}).find('#message-input').text('');
               var result =  $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='chatplace'><div class='chat-area'>" + result + "</div></div>");
                    $('#chatbot').animate({
                        scrollTop: $('#chatbot').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });

 
        $("#message-input").val("");

    });

</script>

<?php


$db_conn = null;

?>
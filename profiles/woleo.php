<?php 
        try {
      
            if (!defined('DB_USER')){
                require '../../config.php';
                try {
                    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
                } catch (PDOException $pe) {
                    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
                }

            }
              
        $profile = 'SELECT * FROM interns_data WHERE username="woleo"';
        $select = 'SELECT * FROM secret_word';
    
        $query = $conn->query($select);
        $profile_query = $conn->query($profile);
    
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $profile_query->setFetchMode(PDO::FETCH_ASSOC);
    
        $get = $query->fetch();
        $secret_word = $get['secret_word'];
        $user = $profile_query->fetch();
        $name = $user['name'];
        $username = $user['username'];
        $image_filename = $user['image_filename'];
    } catch (PDOException $e) {
        throw $e;
    }
    //$secret_word = $get['secret_word'];
    ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <title>Profile</title>
    
    <style>
      
html,body{
        color: #555;
        font-family: 'lato', 'Arial', 'sans-serif';
        font-weight: 300;
        font-size: 18px;
        text-rendering:optimizeLegibility;
        margin: 0px;
        height: 100%;
        margin: auto 0;
}


.card{
            
            width: 100%;
            padding-left: 10%;
            font-family: 'sans-serif', Arial;
        }


h3 span, p span, h3, p{
    color:#BADA55;
    margin:0;
    padding:0;
}

img{
            width:20%;
            height:20%;
            margin-top:20px;
 }

 .buttn{
     margin-top:20px;
 }
a {
  text-decoration: none;
  font-size: 22px;
  color: blue;
  padding-right:20px;
}
.container{
        
            width: 100%;
            min-height: 100%
        }
        .body0 {
            height: 100%;
        }
        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
        .main {
            position: relative;
            /*top:20px;*/
            width: 100%;
            /*padding-top: 300px;*/
            max-height: 230px;
            font-family: "Romanesco";
            line-height: 230px;
            font-size: 96px;
            text-align: center;
        }
        .text {
            background: -webkit-linear-gradient(0deg, #FF0F00,
rgba(17, 26, 240, 0.55), #EC0F13);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .under {
            position: relative;
            /*top:450px;*/
            height: 50px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under1 {
            position: relative;
            /*top:500px;*/
            height: 40px;
            width: 100%;
            font-family: "Alegreya";
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000830;
        }
        .under2 {
            position: relative;
            /*top:540px;*/
            height: 49.71px;
            width: 100%;
            line-height: normal;
            font-size: 32px;
            text-align: center;
            color: #000;
        }
       
        .body1 {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 75%;
            max-width: 515px;
            margin: 0 auto;
            border: 5px solid #BADA55;
        }
        .chat-output {
            width:500px;
            padding: 20px;
            background: white;
            display:inline-block;
            overflow-y: scroll;
            height: 500px;
            
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #0fb0df;
            color: white;
            
            
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #fff;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            margin-right:20px
            
            
        }
        
        .chat-input {
            padding: 20px;
            width:500px;
            background: #fff;
            border: 1px solid #ccc;
            border-bottom: 0;
            
        }
        .chat-input .user-input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            
        }
        #result{
            text-align:center;  
        }
        .msgClass{
            text-align:right;
            background-color:white;
        }
        

  
    </style>
</head>
<body>

<div class="card">

  <img src="<?php echo $image_filename; ?>" alt="profile" >
  
 <h3><span> Name: </span><?php echo $name; ?></h3> <br>
 <p><span> Slack ID: </span><?php echo $username; ?> </p>
  <small><br> Software Developer from Ogun State</small>
  
  

  
  <div class='buttn'>       
    <a href="https://twitter.com/oluwolley"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/iam_ahead/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/S.Hammed"><i class="fa fa-facebook"></i></a> 


 </div>

 <div class="container">
        <div class="oj-sm-6 oj-md-6 oj-flex-item">
            <div class="body1">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message">
Lets Chat, Ask Me a question and I will try and find An answer </br>You can also
train me using this format - 'train: question # answer # password'.
</br>To learn more about me, simply type - 'aboutbot'.</div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input"
id="user-input" class="user-input" placeholder="Say something here">
        <input type="submit" name="Submit"
            id="sumbitbtn" class="sumbitbtn">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
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
    }
    function aboutbot() {
        echo "<div id='result'>woleo v1.0 -!</div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'.
$question .'" and answer = "'. $answer .'" LIMIT 1';
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
                echo "<div id='result'>I already understand this.
Teach me something new!</div>";
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
            echo "<div id='result'>Sorry, I do not understand this Commmand.
You can train me simply by using the format - 'train: question #
answer #password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>


<script>
    var outputArea = $('#chat-output');
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var $message = $("#user-input").val(); 
        if($message !== ''){
            
           $('.message').hide(); 
           
           $("#user-input").val("");
        }
        outputArea.append(`<div class='user-message'><div
class='message'>${$message}</div></div>`);
    
        $.ajax({
            url: 'profile.php?id=woleo',
            type: 'POST',
            data:  'user-input=' + $message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>

</body>
</html>





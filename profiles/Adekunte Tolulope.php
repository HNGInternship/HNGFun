<?php
require 'db.php';
try {
    $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'Adekunte Tolulope'");
    $intern_data->execute();
    $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
    $result = $intern_data->fetch();
  
    $secret_code = $conn->prepare("SELECT * FROM secret_word");
    $secret_code->execute();
    $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
    $code = $secret_code->fetch();
    $secret_word = $code['secret_word'];
 } catch (PDOException $e) {
     throw $e;
    }
  $result = $conn->query("SELECT * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
  $result2 = $conn->query("Select * from interns_data where username = 'Adekunte Tolulope'");
  $user = $result2->fetch(PDO::FETCH_OBJ);

 try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
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
        echo "<div id='result'> I am a computer program designed to simulate conversation with human users.</div>";
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
            echo "<div id='result'>Sorry, I am not able to process that command at the moment. You can train me simply by using the format - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>


<script>
    var outputArea = $("#chat-output");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(<div class='bot-message'><div class='message'>${message}</div></div>);
        $.ajax({
            url: 'profile.php?id=Tobey',
            type: 'POST',
            data:  'user-input=' + message,
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


?>

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.title {
  color: grey;
  font-size: 18px;
}
button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
button:hover, a:hover {
  opacity: 0.7;
}
    .chat-box{
    position: absolute;
    bottom: 0;
    right: 0;
	
	font-size:36px;
	color:#CCC;
}
.box{
    transition: height 1s ease-out;
    width: 300px;
    height: 0px;
    background:#003;
    z-index: 9999;
	
}
.open:hover>.box{
  height:400px;
      transition: height 1s ease-out;
	 
}
.open {
    text-align: center;
    font-size: 20px;
    border: 2px solid #3F51B5;
    background:#666;
    color:#999;
}

div {
	font-size:24px;
	font-style:oblique;
}
    .chat-output {
            flex: 1;
            padding: 10px;
            display: flex;
            background: #e0e7e8;
            font-size:14px;
            color: ;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 500px;
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #34495e;
            color: white;
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #eee;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            margin:3px;
            border-radius: 10px;
        }
        .chat-input {
            padding: 14px;
            background: #eee;
            font-size:14px;       
            border: 1px solid #ccc;
            border-bottom: 0;
        }
        .chat-input .user-input {
            width: 98%;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 9px;
            margin-right:10px;

    
</style>
</head>
<body>



<div class="card">
  <img src="http://res.cloudinary.com/de8awjxjn/image/upload/v1525561300/26219902_1872730456371316_8732891365608479809_n_1.jpg" alt="Profile Pic">
  <h1>Adekunte Tolulope David</h1>
  <p class="slack username">Adekunte Tolulope</p>
  <p class="title">Programmer</p>
  <p>HNG Internship</p>
  <div style="margin: 24px 0;">
  
    <a href="#"><i class="fa fa-whatsapp"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-instagram"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>


</div>
</div>

<div class="chat-box">
  <div class="open">ChatBot
  <div class="box">
    <br>
    Adtrexbot
    <div class="bot panel panel-default">
            
        <div class="panel-body">
        <div class="oj-sm-12 oj-flex-item">
            <div class="body1">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message">Hey there! it's Adtrexbot at your service. </div>
                        <div class="message">To teach me new stuff, use this format - <span style="color: yellow">'train: question # answer # password'.</span> </div>
                    
                    <div class="message">To learn more about me, simply type - <span style="color: orange">'aboutbot'.</span></div>
                  
                    </div>
                   
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Say something here">
                  
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    
    <br>
  </div>
    <div>
<div>
</body>
</html>

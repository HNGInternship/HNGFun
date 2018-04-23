<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra SC|Romanesco' rel='stylesheet'>
    <style type="text/css">
	
        .container{
            width: 100%;
            min-height: 100%
        }
        body {
            font-family: "quicksand"
            color: #4A4646;
			padding-left:400px;
		}        
		.profile-details{
            padding-top: 30px;
        }
        .profile-details {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
        }
        .social-links a {
            margin-right: 20px;
        }
        .fa-github {
            color: #333333;
        }
        .fa-facebook {
            color: #3b5998;
        }
        .fa-twitter {
            color: #1da1f2;
        }
		
	
 
chatbox {
    margin: 0px;
}
#user {
    width: 100vw;
    position: fixed;
    left: 0px;
    bottom: 0px;
    display: block;
    background-color: #EEE;
    white-space: nowrap;
}
#msgbox {
   width: calc(30% - 12px);
   min-height: 25px;
   max-height: 35px;
   padding: 5px;
   outline: none;
   border: solid 1px #AAA;
   display: inline-block;
   vertical-align: center;
   float: left;
   background-color: #FFF;
   border-radius: 25px;
   resize: none;
   margin: 0px;
}
#send {
   width: 20vw;
   height: 35px;
   display: inline-block
   outline: none;
   border: none;
   color: #FFF;
   background-color: #00F;
   float: left;
   border-radius: 25px;
   padding: 0px;
   cursor: pointer;
   margin: 0px;
}
#send:active {
   background-color: #00A; 
   outline: none;
}
#header {
   display: flex; 
   justify-content: left;
   align-items: center;
   width: calc(50% - 30px);
   height: 20px;
   padding: 15px;
   color: #FFF;
   font-size: 200%;
   font-weight: bolder;
   background-color: #00F;
   position: fixed;
   font-family: arial;
}
#messages {
   display: block;
   width: 50vw;
   height: calc(100% - 87px);
   background-color: #EEE;
   position: fixed;
   top: 50px;
   left: 0px;
   overflow: auto;
   overflow-x: hidden;
   overflow-y: auto;
    margin: 0 70px;;
}
.left {
   text-align: left; 
   /*
   display: block;
   */
}
.right {
   text-align: right; 
   /*
   display: block;
   */
}
.incoming {
   background-color: #FFF;
   color: #000;
   border: solid 1px #AAA;
}
.outgoing {
   background-color: #00F;
   color: #FFF;
}
.section {
   display: block; 
   width: calc(100% - 30px);
   padding-left: 15px;
   padding-right: 15px;
   margin-top: 7.5px;
   margin-bottom: 7.5px;
}
.message {
   display: inline-flex;
   justify-content: left;
   align-items: center;
   border-radius: 25px; 
   padding: 10px;
   font-size: 10pt;
}
input:first {
   color: #F00; 
}
.incoming:active {
   background-color: #EEE; 
}
.outgoing:active {
   background-color: #00A; 
}
* {
   outline: none; 
   tap-highlight: none;
   -webkit-tap-highlight: none;
   -webkit-tap-highlight-color: none;
   -moz-tap-highlight: none;
   -moz-tap-highlight-color: none;
   -khtml-tap-highlight: none;
   -khtml-tap-highlight-color: none;
}
a {
   display: block; 
   text-align: center;
}	
    </style>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="techHajiya"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data  = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

     <div class="row" style="width:1100px;">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?=$my_data['image_filename'] ?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?=$my_data['name'] ?>  <br/>(@<?=$my_data['username'] ?>) <br/> I Eat | I Code | I Repeat</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
        </div>

		<div class="chatbox">
         <div id="header">LoBot</div>
        <div id="messages">
        </div>
        <div id="user" >
            <input type="text" id="msgbox" name="msgbox"  placeholder="Type a message..." />
            <button id="send">SEND</button>
        </div>
        </div>
    </div>


    <?php
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
        $data = $_POST['msgbox'];
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
	##About Bot
    function aboutbot() {
        echo "<div id='result'>I am a LoBot Version 1.0 created by Lois Thomas that returns data from the database. That's not all, I also can be taught new tricks!</div>";
    }
	
	##Train Bot
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'LoBot') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            if(empty($data)) {
                $training_data = array(':question' => $question,':answer' => $answer);
                $sql = 'INSERT INTO chatbot ( question, answer) VALUES (:question,:answer);';
                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>Thank you for training me. <br>
			Now you can ask me same question, and I will answer it.</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>You entered an invalid Password. </br>Try Again!</div>";
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
    ?>

</div>

</body>

<script>
    var outputArea = $("#messages");
    $("#user").on("submit", function(e) {
        e.preventDefault();
        var message = $("#msgbox").val();
        outputArea.append(`<div class='bot-message'><div id='messages'>${message}</div></div>`);
        $.ajax({
            url: 'profile.php?id=techHajiya',
            type: 'POST',
            data:  'msgbox=' + messages,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div id='messages'>" + result + "</div>");
                    $('#messages').animate({
                        scrollTop: $('#messages').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#msgbox").val("");
    });
</script>

<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!isset($conn)) {
        include '../../config.php';

        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    }
        
    if(isset($_POST['message']))
    {
        
        $question = $_POST['message'];
        $stripqus = trim(preg_replace("([\s+])", " ", $question));
        $stqus = trim(preg_replace("/[^a-zA-Z0-9\s\'\-\:\(\)#]/", "", $stripqus));
        $lstqus = strtolower($stqus);
        if(stripos(trim($_POST['message']), "train") === 0)
        {
            $explodequsdata = explode(':', $lstqus);

            if ($explodequsdata[0] == 'train') 
                { 
                    $explodequsdata2 = explode('#', $explodequsdata[1], 2);

                    if (isset($explodequsdata2[1])) 
                        {
                            $explodequsdata3 = explode('#', $explodequsdata2[1], 2);
                            if (isset($explodequsdata3[1]))
                            {
                                if (  $explodequsdata3[1] == " password") 
                                {
                                    $query = $conn->prepare("SELECT * FROM chatbot WHERE strtolower(question) ='" . $explodequsdata2[0] . "' and strtolower(answer) =  '" . $explodequsdata3[0] . "'");
                                    $query->execute();
                                    $countrow = $query->rowCount();
                                    if ($countrow > 0) {
                                        $answer = "Question Exist in DB<br>Train me:<br>
                                        <code>train: question # answer # password</code>";
                                        echo $answer; exit();
                                    } 
                                    else{
                                        $insert_qa = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
                                        $insert_qa->bindParam(':question', $explodequsdata2[0]);
                                        $insert_qa->bindParam(':answer', $explodequsdata3[0]);
                                        $insert_qa->execute();
                                        $answer = "New Response Added to database👍";
                                        echo $answer; exit();
                                    }
                                }
                                else
                                {
                                    $answer="Password Incorrect😶";
                                    echo $answer; exit();
                                }
                            }
                        }
                }
        }
        elseif (preg_match('/\baboutbot\b/',$lstqus)) {
            $answer = "Tridax v1.0";
            echo $answer; exit();
        }
        elseif (preg_match('/\bcodequotes\b/',$lstqus)) {
            $json = file_get_contents('http://quotes.stormconsultancy.co.uk/random.json');
            $arr = json_decode($json,true);
            $answer = $arr['quote'].'-'.$arr['author'];
            echo $answer; exit();
        }
        else
        {

            $lstqus = "%$lstqus%";
            $query_lstqus = $conn->prepare("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
            $query_lstqus->bindParam(':question', $lstqus);
            $query_lstqus->execute();
            $row = $query_lstqus->fetch();

                if($row)
                {
                    $answer = $row['answer'];
                    echo $answer; exit();
                }
                else 
                {
                    $answer = "My Little Witty Brain Could Not Comprehend 😭.<br>Train me:<br>
                        <code>train: question # answer # password</code>";
                        echo $answer; exit();
                }
        }

    }
}
    $q = $conn->query("Select * from secret_word LIMIT 1");
	$r = $q->fetch(PDO::FETCH_OBJ);
	$secret_word = $r->secret_word;

	$qname = $conn->query("Select * from interns_data where username = 'tridax'");
	$row = $qname->fetch(PDO::FETCH_OBJ);
    $name = $row->name;
    $username = $row->username;
    $image_filename = $row->image_filename;

?>
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
    
body {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    background-color: #f0f3f5;
    margin-top:40px;
}

.userprofile {
    width: 100%;
	float: left;
	clear: both;
	margin: 40px auto
}
.userprofile .userpic {
	height: 100px;
	width: 100px;
	clear: both;
	margin: 0 auto;
	display: block;
	border-radius: 100%;
	box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-ms-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	position: relative; 
}
.userprofile .userpic .userpicimg {
	height: auto;
	width: 100%;
	border-radius: 100%;
}
.username {
	font-weight: 400;
	font-size: 20px;
	line-height: 20px;
	color: #000000;
	margin-top: 20px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.username+p {
	color: #607d8b;
	font-size: 13px;
	line-height: 15px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
}
.userprofile.small {
	width: auto;
	clear: both;
	margin: 0px auto;
}
.userprofile.small .userpic {
	height: 40px;
	width: 40px;
	margin: 0 10px 0 0;
	display: block;
	border-radius: 100%;
	box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	-ms-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
	position: relative;
	float: left;
}
.userprofile.small .textcontainer {
	float: left;
	max-width: 100px;
	padding: 0
}
.userprofile.small .userpic .userpicimg {
	min-height: 100%;
	width: 100%;
	border-radius: 100%;
}
.userprofile.small .username {
	font-weight: 400;
	font-size: 16px;
	line-height: 21px;
	color: #000000;
	margin: 0px;
	float: left;
	width: 100%;
}
.userprofile.small .username+p {
	color: #607d8b;
	font-size: 13px;
	float: left;
	width: 100%;
	margin: 0;
}

.countlist h3 {
	margin: 0;
	font-weight: 400;
	line-height: 28px;
}
.countlist {
	text-transform: uppercase
}
.countlist {
	padding: 15px 30px 15px 0;
	font-size: 14px;
	text-align: left;
}
.countlist small {
	font-size: 12px;
	margin: 0
}
.followbtn {
	float: right;
	margin: 22px;
}
.userprofile.social {
	background: url(https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg) no-repeat top center;
	background-size: 100%;
	padding: 50px 0;
	margin: 0
}
.userprofile.social .username {
	color: #ffffff
}
.userprofile.social .username+p {
	color: #ffffff;
	opacity: 0.8
}




.panel-default>.panel-heading {
    color: #607D8B;
    background-color: #ffffff;
    font-weight: 400;
    font-size: 15px;
    border-radius: 0;
    border-color: #e1eaef;
}



.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.428571429;
}




.btn i {
    font-size: 17px;
}

.panel {
    box-shadow: 0px 2px 10px 0 rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0px 2px 10px 0 rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: 0px 2px 10px 0 rgba(0, 0, 0, 0.05);
    -ms-box-shadow: 0px 2px 10px 0 rgba(0, 0, 0, 0.05);
    transition: all ease 0.5s;
    -moz-transition: all ease 0.5s;
    -webkit-transition: all ease 0.5s;
    -ms-transition: all ease 0.5s;
    margin-bottom: 35px;
    border-radius: 0px;
    position: relative;
    border: 0;
    display: inline-block;
    width: 100%;
}


    
    </style>
    <!-- Profile Page Css End -->


    <!-- Chatbot CSS Start -->
    <style>

fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}

h4, h5 {
	line-height: 1.5em;
	margin: 0;
}

hr {
	background: #e9e9e9;
    
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    
}

img {
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}

input {
	border: 0;
	color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}

p { margin: 0; }

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}
.clearfix:after { clear: both; }

/* ---------- LIVE-CHAT ---------- */

#live-chat {
	bottom: 0;
	font-size: 12px;
	right: 24px;
	position: fixed;
	width: 300px;
}

#live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 24px;
}

#live-chat h4:before {
	background: #1a8a34;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}

#live-chat h4 {
	font-size: 12px;
}

#live-chat h5 {
	font-size: 10px;
}

#live-chat form {
	padding: 24px;
}



.chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

.chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
}

.chat {
	background: #fff;
}

.chat-history {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}

.chat-message {
	margin: 16px 0;
}

.chat-message img {
	border-radius: 50%;
	float: left;
}

.chat-message-content {
	margin-left: 56px;
}

.chat-time {
	float: right;
	font-size: 10px;
}

.chat-feedback {
	font-style: italic;	
	margin: 0 0 0 80px;
}


    </style>
    

<div>
    <div class="row">
      <div class="col-md-12 text-center ">
        <div class="panel panel-default">
            <div class="userprofile social ">
                <div class="userpic"> <img src="<?php echo $image_filename ?>" alt="" width="140" height="140" class="userpicimg"> </div>
                <br />
                <b><h2 class="username"><?php echo $name?></h2></b>
                <h3 class="username"><?php echo $username?></h3>
                <b><h3 class="username">Web Developer, Lagos, Nigeria</h3></b>
                <div class="socials tex-center"> <a href="#" class="btn btn-circle btn-primary ">
                    <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
                    <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                    <i class="fa fa-linkedin"></i></a> <a href="https://linkedin.com/in/tridax" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-md-12 border-top border-bottom">
                <h3>Skills</h3>
                
                <right>
                        <span class="label label-success">PHP</span>
                        <span class="label label-success">MYSQL</span>
                        <span class="label label-success">HTML/CSS</span>
                        <span class="label label-success">Python</span>
                    </right>
                
                <hr />
            </div>
            <br />
            <div class="clearfix"></div>
        </div>
        
      </div>
    </div>
</div>
        <div id="live-chat">	
            <header class="clearfix">	
                <a href="#" class="chat-close">x</a>
                <h4>Tridax Bot</h4>
            </header>
            <div id='widget_message_list' class="chat">    
                <div id="user_chat" class="chat-history">
                    <div class="chat-message clearfix">
                        <img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">
                        <div class="chat-message-content clearfix">
                            
                            <h4>tridax bot</h4>
                            <p><?php 
                             echo "Send a Message to get started or type codequotes to get random programming quotes.<br>Train me:<br>
                            <code>train: question # answer # password</code>"; ?></p>
                        </div>
                    </div>
                    <hr>
                    
                    
                </div>
                <form id="messageForm">
                <div class="form-group m-b-30"> 
                    <input type="text" onkeypress="handle(event)" id="message" name="message" class="form-control floating-label" placeholder="Enter Message" required autofocus>
                    <input type="submit" name="submit" value="Send">
                </div>
                </form>
            </div> <!-- end live-chat -->
        </div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>



<script type="text/javascript">
  var messageArea = document.getElementById('user_chat');
  var form = document.getElementById('messageForm');

  form.addEventListener('submit', handleRequest);

  function handleRequest(e) {
    var textElement = document.getElementById('message');
   
    var text = textElement.value;
    textElement.value = '';

    if (text) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           
          addMyMessage(text);
          setTimeout(addBotMessage(this.responseText), 500);
          messageArea.scrollTop = messageArea.scrollHeight;
        }
      }
      xhttp.open('POST', 'profiles/tridax.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send('message=' + text);
    }

    e.preventDefault();
  }

  function addMyMessage(message) {
    var you = '<div class="chat-message clearfix">'+
      '<img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">'+
      '<div class="chat-message-content clearfix"><h4>chat</h4><p>'+message+'</p></div></div><hr>';
    messageArea.innerHTML += you;
  }

  function addBotMessage(answer) {
    var bot = '<div class="chat-message clearfix">'+
      '<img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">'+
      '<div class="chat-message-content clearfix"><h4>Tridax Bot</h4><p>'+answer+'</p></div></div><hr>';
    messageArea.innerHTML += bot;
  }

</script>


    <script>
(function() {

$('#live-chat header').on('click', function() {

    $('.chat').slideToggle(300, 'swing');
    $('.chat-message-counter').fadeToggle(300, 'swing');

});

$('.chat-close').on('click', function(e) {

    e.preventDefault();
    $('#live-chat').fadeOut(300);

});

}) ();
    </script>             
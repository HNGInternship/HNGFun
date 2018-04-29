
<?php


if(!isset($conn)) {
    include '../../config.php';

    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
}
    $q = $conn->query("Select * from secret_word LIMIT 1");
	$r = $q->fetch(PDO::FETCH_OBJ);
	$secret_word = $r->secret_word;

	$qname = $conn->query("Select * from interns_data where username = 'tridax'");
	$row = $qname->fetch(PDO::FETCH_OBJ);
    $name = $row->name;
    $username = $row->username;
    $image_filename = $row->image_filename;
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
                                } 
                                else{
                                    $insert_qa = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
                                    $insert_qa->bindParam(':question', $explodequsdata2[0]);
                                    $insert_qa->bindParam(':answer', $explodequsdata3[0]);
                                    $insert_qa->execute();
                                    $answer = "New Response Added to database👍";
                                    echo json_encode([
                                        'status' => 1,
                                        'answer' => $answer
                                    ]);
                                    return;
                                }
                            }
                            else
                            {
                                $answer="Password Incorrect😶";
                                echo json_encode([
                                    'status' => 0,
                                    'answer' => $answer
                                ]);
                                return;
                            }
                        }
                    }
            }
    }
    elseif (preg_match('/\baboutbot\b/',$lstqus)) {
        $answer = "Tridax v1.0";
        echo json_encode([
            'status' => 1,
            'answer' => $answer
        ]);
        return;
    }
    elseif (preg_match('/\bcodequotes\b/',$lstqus)) {
        $json = file_get_contents('http://quotes.stormconsultancy.co.uk/random.json');
        $arr = json_decode($json,true);
        $answer = $arr['quote'].'-'.$arr['author'];
        echo json_encode([
            'status' => 1,
            'answer' => $answer
        ]);
        return;
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
                echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;	
            }
            else 
            {
                $answer = "My Little Witty Brain Could Not Comprehend 😭.<br>Train me:<br>
                    <code>train: question # answer # password</code>";
                    echo json_encode([
                        'status' => 0,
                        'answer' => $answer
                    ]);
                    return;
            }
    }
// session_start();
// $_SESSION['messages']=array();
// array_push($_SESSION['messages'], $_POST['message'], $answer);
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hng intern">
    <meta name="author" content="akinsanya adeoluwa">
    <link rel="shortcut icon" href="" type="image/png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


<!-- Profile Page Css start -->
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
.settingbtn {
	height: 30px;
	width: 30px;
	border-radius: 30px;
	display: block;
	position: absolute;
	bottom: 0px;
	right: 0px;
	line-height: 30px;
	vertical-align: middle;
	text-align: center;
	padding: 0;
	box-shadow: 0px 2px 5px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 2px 5px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0px 2px 5px 0 rgba(0, 0, 0, 0.15);
	-ms-box-shadow: 0px 2px 5px 0 rgba(0, 0, 0, 0.15);
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
/*==============================*/
/*====== Social Profile css =====*/
/*==============================*/
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
.postbtn {
	position: absolute;
	right: 5px;
	top: 5px;
	z-index: 9
}
.status-upload {
	width: 100%;
	float: left;
	margin-bottom: 15px
}
.posttimeline .panel {
	margin-bottom: 15px
}
.commentsblock {
	background: #f8f9fb;
}
.nopaddingbtm {
	margin-bottom: 0
}
/*==============================*/
/*====== Recently connected  heading =====*/
/*==============================*/
.memberblock {
	width: 100%;
	float: left;
	clear: both;
	margin-bottom: 15px
}
.member {
	width: 24%;
	float: left;
	margin: 2px 1% 2px 0;
	background: #ffffff;
	border: 1px solid #d8d0c3;
	padding: 3px;
	position: relative;
	overflow: hidden
}
.memmbername {
	position: absolute;
	bottom: -30px;
	background: rgba(0, 0, 0, 0.8);
	color: #ffffff;
	line-height: 30px;
	padding: 0 5px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
	width: 100%;
	font-size: 11px;
	transition: 0.5s ease all;
}
.member:hover .memmbername {
	bottom: 0
}
.member img {
	width: 100%;
	transition: 0.5s ease all;
}
.member:hover img {
	opacity: 0.8;
	transform: scale(1.2)
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

.page-header.small {
    position: relative;
    line-height: 22px;
    font-weight: 400;
    font-size: 20px;
}

.favorite i {
    color: #eb3147;
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

.panel-footer {
    padding: 10px 15px;
    background-color: #ffffff;
    border-top: 1px solid #eef2f4;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    color: #607d8b;
}

.panel-blue {
    color: #ffffff;
    background-color: #03A9F4;
}

.panel-red.userlist .username, .panel-green.userlist .username, .panel-yellow.userlist .username, .panel-blue.userlist .username {
    color: #ffffff;
}

.panel-red.userlist p, .panel-green.userlist p, .panel-yellow.userlist p, .panel-blue.userlist p {
    color: rgba(255, 255, 255, 0.8);
}

.panel-red.userlist p a, .panel-green.userlist p a, .panel-yellow.userlist p a, .panel-blue.userlist p a {
    color: rgba(255, 255, 255, 0.8);
}

.progress-bar-success, .status.active, .panel-green, .panel-green > .panel-heading, .btn-success, .fc-event, .badge.green, .event_green {
    color: white;
    background-color: #8BC34A;
}

.progress-bar-warning, .panel-yellow, .status.pending, .panel-yellow > .panel-heading, .btn-warning, .fc-unthemed .fc-today, .badge.yellow, .event_yellow {
    color: white;
    background-color: #FFC107;
}

.progress-bar-danger, .panel-red, .status.inactive, .panel-red > .panel-heading, .btn-danger, .badge.red, .event_red {
    color: white;
    background-color: #F44336;
}

.media-object {
    max-width: 50px;
    border-radius: 50px;
    box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
    -ms-box-shadow: 0px 3px 10px 0 rgba(0, 0, 0, 0.15);
}

.media:first-child {
    margin-top: 15px;
}

.media-object {
    display: block;
}

.dotbtn {
    height: 40px;
    width: 40px;
    background: none;
    border: 0;
    line-height: 40px;
    vertical-align: middle;
    padding: 0;
    margin-right: -15px;
}

.dots {
    height: 4px;
    width: 4px;
    position: relative;
    display: block;
    background: rgba(0,0,0,0.5);
    border-radius: 2px;
    margin: 0 auto;
}

.dots:after, .dots:before {
    content: " ";
    height: 4px;
    width: 4px;
    position: absolute;
    display: inline-block;
    background: rgba(0,0,0,0.5);
    border-radius: 2px;
    top: -7px;
    left: 0;
}

.dots:after {
    content: " ";
    top: auto;
    bottom: -7px;
    left: 0;
}

.photolist img {
    width: 100%;
}

.photolist {
    background: #e1eaef;
    padding-top: 15px;
    padding-bottom: 15px;
}

.profilegallery .grid-item a {
    height: 100%;
    display: block;
}

.grid a {
    width: 100%;
    display: block;
    float: left;
}

.media-body {
    color: #607D8B;
    overflow: visible;
}
    
    </style>
    <!-- Profile Page Css End -->


    <!-- Chatbot CSS Start -->
    <style>
@charset "utf-8";
/* CSS Document */

/* ---------- GENERAL ---------- */


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
     <!-- Chatbot CSS End -->
    <title>Portfolio | HNG FUN</title>
  </head>

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
                    
                    <h4>chat</h4>
                    <p><?php 
                    if(isset($_POST['message']))
                    {
                        echo $_POST['message'];
                    }
                    else echo "Send a Message to get started or type codequotes to get random programming quotes.<br>Train me:<br>
                    <code>train: question # answer # password</code>"; ?></p>
                </div>
            </div>
            <hr>
            <?php if(isset($_POST['message'])) :?>
            <div class="chat-message clearfix">
                <img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">
                <div class="chat-message-content clearfix">
                    
                    <h4>Tridax Bot</h4>
                    <p><?php 
                        echo $answer;
            
                ?></p>
                </div>
            </div>
            <hr>
            <?php endif ?>
            
		</div>
        <form method="post" id="messageForm">
		<div class="form-group m-b-30"> 
        	<input type="text" onkeypress="handle(event)" id="message" name="message" class="form-control floating-label" placeholder="Enter Message" required autofocus>
			<button type="submit" class="btn btn-embossed btn-sm btn-primary m-b-10 m-r-0">SEND</button>
		</div>
        </form>
    </div> <!-- end live-chat -->
</div>
<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>


    <script>
$(document).ready(function() {
    // let's scroll to the last message
    $('#user_chat').animate({scrollTop: $('#user_chat').prop("scrollHeight")}, 1000);

      $('#messageForm').submit(function(e){
        e.preventDefault();
        sendMessage(e); 
      });

      
      
      
    });

  function sendMessage(e) {
    var message = $('#message').val();
    if (message.length>0) {
      
      var rand = Math.floor(Math.random()*100);
      var classname = 'sending-'+rand;
      var selector = '.'+classname;
      $('#message').val('');
      $('#user_chat').append('<div class="chat-message clearfix">'+
      '<img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">'+
      '<div class="chat-message-content clearfix"><h4>chat</h4><p class="'+classname+'">'+message+'</p></div></div><hr>');
      $('#user_chat').animate({scrollTop: $('#user_chat').prop("scrollHeight")}, 1000);
      
				
                
                    
                   
                    
                


      $.ajax({
        url: "https://hng.fun/profiles/tridax.php",
        type: "post",
        data: {message: message},
        dataType: "json",
        success: function(response){
        var answer = response.answer;
        $(selector).html(''+message+'');
      $(selector).removeClass(classname).addClass('sent');
      $('#user_chat').append('<div class="chat-message clearfix">'+
      '<img src="https://res.cloudinary.com/tridax/image/upload/v1524846848/sample.jpg" alt="" width="32" height="32">'+
      '<div class="chat-message-content clearfix"><h4>Tridax Bot</h4><p>'+answer+'</p></div></div><hr>');
      
      },
      error: function(error){
          console.log(error);
        }
      
    });
  }
}

    
    // function handle(event)
    // {
    //     if(event.keyCode==13)
    //     {
    //     sendmessage()
    //     }
    // }
    // function sendmessage(bot_id)
    // {
    //     var sendmessageurl = "https://hng.fun/profiles/tridax.php";
    //     var xmlhttp = new XMLHttpRequest();
    //     var message = document.getElementById("input_message").value;
    //     xmlhttp.open("POST", sendmessageurl, false);

    //     xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //     xmlhttp.send("message=" + message);

    //     document.getElementById("ujat").innerHTML=xmlhttp.responseText;
    //     $("#input_message").val('')
    //     // var objDiv = document.getElementById("usejt");
    //     // objDiv.scrollTop = objDiv.scrollHeight;
    //     $("#uhhat").scrollTop($("#usjat")[0].scrollHeight);

    // }

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

</html>



                    
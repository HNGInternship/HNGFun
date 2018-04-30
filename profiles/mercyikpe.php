<?php
date_default_timezone_set('Africa/Lagos');



if (!defined('DB_USER'))
	{
	require "../../config.php";

	}

try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}

catch(PDOException $pe)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}

global $conn;

function checkQuestionExistence($question, $conn) {
    $sql = "SELECT * FROM chatbot WHERE question='$question'";
    $stm = $conn->query($sql);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stm->fetchAll();
    return $result;
}


if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
	$mercy = $_POST['sent_messages'];

	if (empty($mercy))
		{
		echo json_encode(['status' => 0]);
		}


		elseif ($mercy == 'aboutbot')
		{
		echo json_encode(['status' => 6]);
		}
		else {
	$first_test_str = explode(':', $mercy);
	if ($first_test_str[0] == 'train')
		{
		$password = 'password';
		$trim_messages = explode('#', $first_test_str[1]);
		if (!count($trim_messages) < 3 && trim($password) === trim($trim_messages[2]))
			{
			if (trim($trim_messages[0]) != '' && trim($trim_messages[1] != ''))
				{
				$question = trim($trim_messages[0]);
				$answer = trim($trim_messages[1]);
                // We'll only attempt to insert a question if the question doesnt exist before
                if(count(checkQuestionExistence($question, $conn)) > 0) {
                    echo json_encode(['status' => 3, 'response' => 'Sorry that quetion already exists.']);
                } else {
                    $sql = "INSERT INTO chatbot(question, answer) VALUES(:question, :answer)";
    				$stm = $conn->prepare($sql);
    				$stm->bindParam(':question', $question);
    				$stm->bindParam(':answer', $answer);
    				$trained = $stm->execute();
    				if ($trained)
    				{
    					echo json_encode(['status' => 1, 'answer' => 'Thanks for educating me. You deserve some accolades.']);
    				}
                    else
  					{
  					$sql = "INSERT INTO chatbot(question, answer)
                                          VALUES(:question, :answer)";
  					$stm = $conn->prepare($sql);
  					$stm->bindParam(':question', $question);
  					$stm->bindParam(':answer', $answer);
  					$trained = $stm->execute();
  					if ($trained)
  						{
  						echo json_encode(['status' => 1, 'answer' => 'Thanks for educating me. You deserve some accolades.']);
  						}
  					  else
  						{
  						echo json_encode(['status' => 3, 'response' => 'So sorry but i dont understand your message. But you could teach me. train: this is a question # this is an answer # your password.']);
  						}
  					}
                }


				// if it's a new question, save into db


				}
			  else
				{
				echo json_encode(['status' => 3, 'response' => 'You got it wrong. train: this is a question # this is an answer # your password. ']);
				}
			}
		  else
			{
			echo json_encode(['status' => 3, 'response' => 'Sorry but for security you cant educate me.']);
			}
		}
	  else
		{
		$sql = "SELECT * FROM chatbot WHERE question='$mercy'";
		$stm = $conn->query($sql);
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stm->fetchAll();
		if ($result)
			{
			$answer_index = rand(0, (count($result) - 1));
			$answer = $result[$answer_index]['answer'];
			echo json_encode(['status' => 1, 'answer' => $answer]);
			}
		  else
			{
			echo json_encode(['status' => 2]);
			}
		}
	}

	}







?>
<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
try
	{
	$sql = 'SELECT * FROM secret_word LIMIT 1';
	$mercy = $conn->query($sql);
	$mercy->setFetchMode(PDO::FETCH_ASSOC);
	$data = $mercy->fetch();
	$secret_word = $data['secret_word'];
	}

catch(PDOException $e)
	{
	throw $e;
	}

try
	{
	$sql = "SELECT * FROM interns_data WHERE `username` = 'mercyikpe' LIMIT 1";
	$mercy = $conn->query($sql);
	$mercy->setFetchMode(PDO::FETCH_ASSOC);
	$my_data = $mercy->fetch();
	}

catch(PDOException $e)
	{
	throw $e;
	}

?>
<html>
	<head>
	            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Mercy Ikpe | Jamila</title>
		<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
            <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
					<style>



				@charset 'utf-8';




body {
	padding: 0;
	margin: 0;
    overflow: auto;
}




/* METERIAL ICONS */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialicons/v30/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}






.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}



.ubuntu {
    font-family: 'Ubuntu', sans-serif;
}


.btn {
	text-transform: uppercase;
	padding: 4px 8px !important;
    box-shadow: 0 2px 2px 0 rgba(153, 153, 153, 0.14), 0 3px 1px -2px rgba(153, 153, 153, 0.2), 0 1px 5px 0 rgba(153, 153, 153, 0.12);

}

.btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success:hover, .navbar .navbar-nav > li > a.btn.btn-success:focus, .navbar .navbar-nav > li > a.btn.btn-success:active, .navbar .navbar-nav > li > a.btn.btn-success:hover {
    box-shadow: 0 14px 26px -12px rgba(76, 175, 80, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(76, 175, 80, 0.2);
}
.btn.btn-success, .btn.btn-success:hover, .btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success.active, .btn.btn-success:active:focus, .btn.btn-success:active:hover, .btn.btn-success.active:focus, .btn.btn-success.active:hover, .open > .btn.btn-success.dropdown-toggle, .open > .btn.btn-success.dropdown-toggle:focus, .open > .btn.btn-success.dropdown-toggle:hover, .navbar .navbar-nav > li > a.btn.btn-success, .navbar .navbar-nav > li > a.btn.btn-success:hover, .navbar .navbar-nav > li > a.btn.btn-success:focus, .navbar .navbar-nav > li > a.btn.btn-success:active, .navbar .navbar-nav > li > a.btn.btn-success.active, .navbar .navbar-nav > li > a.btn.btn-success:active:focus, .navbar .navbar-nav > li > a.btn.btn-success:active:hover, .navbar .navbar-nav > li > a.btn.btn-success.active:focus, .navbar .navbar-nav > li > a.btn.btn-success.active:hover, .open > .navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle, .open > .navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle:focus, .open > .navbar .navbar-nav > li > a.btn.btn-success.dropdown-toggle:hover {
    background-color: #4caf50;
    color: #FFFFFF;
}
.btn-success:hover {
    color: #fff;
    background-color: #449d44;
    border-color: #398439;
}
.btn.focus, .btn:focus, .btn:hover {
    color: #333;
    text-decoration: none;
}
.btn.btn-sm, .btn-group-sm .btn, .navbar .navbar-nav > li > a.btn.btn-sm, .btn-group-sm .navbar .navbar-nav > li > a.btn {
    padding: 5px 20px;
    font-size: 11px;
}
.btn.btn-success, .navbar .navbar-nav > li > a.btn.btn-success {
    box-shadow: 0 2px 2px 0 rgba(76, 175, 80, 0.14), 0 3px 1px -2px rgba(76, 175, 80, 0.2), 0 1px 5px 0 rgba(76, 175, 80, 0.12);
}
.btn:focus, .btn:active, .btn:hover, .btn.btn-default:focus, .btn.btn-default:active, .btn.btn-default:hover, .navbar .navbar-nav > li > a.btn:focus, .navbar .navbar-nav > li > a.btn:active, .navbar .navbar-nav > li > a.btn:hover, .navbar .navbar-nav > li > a.btn.btn-default:focus, .navbar .navbar-nav > li > a.btn.btn-default:active, .navbar .navbar-nav > li > a.btn.btn-default:hover {
    box-shadow: 0 14px 26px -12px rgba(153, 153, 153, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(153, 153, 153, 0.2);
}
.btn, .btn:hover, .btn:active, .btn.active, .btn:active:focus, .btn:active:hover, .btn.active:focus, .btn.active:hover, .open > .btn.dropdown-toggle, .open > .btn.dropdown-toggle:focus, .open > .btn.dropdown-toggle:hover, .btn.btn-default, .btn.btn-default:hover, .btn.btn-default:focus, .btn.btn-default:active, .btn.btn-default.active, .btn.btn-default:active:focus, .btn.btn-default:active:hover, .btn.btn-default.active:focus, .btn.btn-default.active:hover, .open > .btn.btn-default.dropdown-toggle, .open > .btn.btn-default.dropdown-toggle:focus, .open > .btn.btn-default.dropdown-toggle:hover, .navbar .navbar-nav > li > a.btn, .navbar .navbar-nav > li > a.btn:hover, .navbar .navbar-nav > li > a.btn:focus, .navbar .navbar-nav > li > a.btn:active, .navbar .navbar-nav > li > a.btn.active, .navbar .navbar-nav > li > a.btn:active:focus, .navbar .navbar-nav > li > a.btn:active:hover, .navbar .navbar-nav > li > a.btn.active:focus, .navbar .navbar-nav > li > a.btn.active:hover, .open > .navbar .navbar-nav > li > a.btn.dropdown-toggle, .open > .navbar .navbar-nav > li > a.btn.dropdown-toggle:focus, .open > .navbar .navbar-nav > li > a.btn.dropdown-toggle:hover, .navbar .navbar-nav > li > a.btn.btn-default, .navbar .navbar-nav > li > a.btn.btn-default:hover, .navbar .navbar-nav > li > a.btn.btn-default:focus, .navbar .navbar-nav > li > a.btn.btn-default:active, .navbar .navbar-nav > li > a.btn.btn-default.active, .navbar .navbar-nav > li > a.btn.btn-default:active:focus, .navbar .navbar-nav > li > a.btn.btn-default:active:hover, .navbar .navbar-nav > li > a.btn.btn-default.active:focus, .navbar .navbar-nav > li > a.btn.btn-default.active:hover, .open > .navbar .navbar-nav > li > a.btn.btn-default.dropdown-toggle, .open > .navbar .navbar-nav > li > a.btn.btn-default.dropdown-toggle:focus, .open > .navbar .navbar-nav > li > a.btn.btn-default.dropdown-toggle:hover {
    background-color: #999999;
    color: #FFFFFF;
}
a:focus, a:active, button:active, button:focus, button:hover, button::-moz-focus-inner, input[type="reset"]::-moz-focus-inner, input[type="button"]::-moz-focus-inner, input[type="submit"]::-moz-focus-inner, select::-moz-focus-inner, input[type="file"] > input[type="button"]::-moz-focus-inner {
    outline: 0 !important;
}
.btn-group-sm > .btn, .btn-sm {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.btn-success {
    color: #fff;
    background-
    color: #5cb85c;
    border-color: #4cae4c;
}

.no-padding {

    padding: 0 !important;

}



.btn-warning {

    background: #ff9800 !important;
    border: none;
}







.no-show {
    display: none;
}










/*header img {

    margin-top: 20px;
    height: 200px;
    width: 200px;

}

header  h1 {
    float: left;
}



#imgBlock {

    height: 100%;
    justify-content:center;
    display: flex;
    align-items: center;
}
*/



p {
    margin-top: 20px;
    text-indent: 10px;
}


#letsChat {

    padding: 9px 13px !important;
    border-radius: 2px;
    margin-bottom: 20px;
    background: #ff9800;

}




#botBox {

    height: 100%;
    min-height: 100vh;
    box-shadow: -4px 0 4px rgba(0,0,0,0.23);
    background: #fff;
    background: url('../img/bgn.jpg');
    background-position: 20% 80%;
    background-attachment: fixed;
    padding: 10px 0;
    position: fixed;
    float: none;
    overflow: auto;
    transition: transform .15s



}




@media screen and (max-width: 992px){


    #letsChat {

        display: block;

    }

    #botBox.mobile-hide {

        transform: translate3d(100%, 0,0);


    }



    #botBox {


        position: fixed;
        top: 0;
        left: 0;

    }


}


#messages {

    float: left;
}


.message-block {

    height: auto;


}


.message-block ul {

    padding: 0;
    list-style-type: none;
    float: left;
    margin-top: 8px;
    width: 100%;
    min-width: 100%;

}

.message-block ul:last-child {

    margin-bottom: 80px;

}


.message-block ul li {

    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    padding: 12px 15px;
    margin-top: 1px;
    background: linear-gradient(60deg, #26c6da, #0097a7);
    color: #fff;
    max-width: 70%;
    /*min-width: 20%;*/
    width: auto;

}

.message-block ul li:nth-child(1) {


    border-top-right-radius: 20px;


}



.message-block ul li:last-child {


    border-bottom-right-radius: 20px;


}


.message-block ul.right {


    float: right !important;

}




.message-block ul.right li {

    border-radius: unset;
    background: linear-gradient(60deg, #eee, #fff);
    color: #666;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
    float: right;


}



.message-block ul.right li:nth-child(1) {


    border-top-left-radius: 20px;


}



.message-block ul.right li:last-child {


    border-bottom-left-radius: 20px;


}












#pendingMessageBox {

    background: linear-gradient(60deg, #26c6da, #0097a7);
    border-radius: 0 20px 20px 0;
    float: left;
    margin-left: -15px;
    left: 0;
    padding: 12px 9px;


}


#pendingMessageBox img {

    height: 10px;
    width: 100px;

}



















#messageInputContainer {


    position: fixed;
    bottom: 0;
    width: inherit;
    /*right: 0;*/
    display: flex;
    align-items: center;
    border-top: 2px solid #00bcd4;
    background: #fff;
    float: right;



}



#messageInput {

    border: none;
    height: 100%;
    resize: none;
    padding: 8px;
    font-size: 15px;
    background: #fff;
    overflow: hidden;
    width: calc(100% - 80px);
    /*position: absolute;*/
}


#sendButton, #closeButton {


    border-radius: 50%;
    height: 50px;
    width: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 15px;
    color: #fff !important

}





#closeButton {

    background: #fff !important;
    color: #666 !important;
    float: left;
    box-shadow: none !important

}






/*PROFILE STYLES*/




header {
  position: relative;
  height: 300px;
    background: linear-gradient(60deg, #26c6da, #0097a7);
}

h1 {
  margin: 0;
  padding: 100px 0;
  font: 44px "Arial";
  text-align: center;
}

header h1 {
  color: white;
}

</style>
					<style>
        .col-md-2,
        .col-md-10 {
            padding: 0;
        }

        .panel {
            margin-bottom: 0px;
        }

        .messenger_boxed .card{
            width: 100%;
         margin: 0 auto;
        }
        .messenger_boxed.col-xs-12 {
            left: 10px;
        }

        .messenger_boxed>div>.panel {
            border-radius: 5px 5px 0 0;
        }

        .reacher {
            padding: 2px 10px;
        }

        .messenger_dez {
            background: #17a2b8;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px 10px;
            max-height: 350px;
            overflow-x: hidden;
        }
        /* .messenger_dezs{
            width:100%;
        } */
        .heads {
            background: #00b2c5;
            color: white;
            padding: 10px;
            position: relative;
             overflow: hidden;
        }

        .outbox_msg {
            padding-left: 0;
            margin-left: 0;
            background: #00b2c5 !important;
            color: #FFF;
        }

        .inbox_msg {
            padding-bottom: 20px !important;
            margin-right: 0;

        }

        .responses {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }

        .responses>p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
            overflow-wrap: break-word;
        }

        .responses>time {
            font-size: 11px;
            color: #ccc;
        }

        .messenger_dezs {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }

        .response_got>.avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }

        .response_sent {
            justify-content: flex-end;
            align-items: flex-end;

        }

        .response_sent>.avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close } .inbox_msg > time{
            float: right;
        }

        .messenger_dez::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        .messenger_dez::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .messenger_dez::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }

        .messengerbody{

           border-radius: 20px;
            max-width: 90%;
            margin: 0 auto;
            margin-bottom: 50px;

        }

        .iconn:hover{
            color: #00AEFF !important;
        }
        .icon-container{
            padding: 20px;
        }
        .connect{

            color:red !important;
            padding: 10px 0;
        }

        #intro{
            padding: 0 20px;
        }

            </style>
					</head>
					<br>
					<br>
					<br>

					<body>
					<div class="container" style="margin: 100px auto">
					<section>
					<header class="col-md-12">
									<div class="col-md-6" id="imgBlock" >
										<!-- <img class="img img-circle" src="img/bg2.png"> -->
										<img class="img img-circle" src="https://res.cloudinary.com/mercyikpe/image/upload/w_400,h_400,c_crop,g_face,r_max/w_200/v1517443922/mercy_ownuvy.jpg" />

											<h1 class="ubuntu">Mercy Ikpe</h1>
											<div class="col-md-12 col-md-offset-2">
											<h3>mercyikpe</h3>
								<ul>
								  <li>Web Designer/Developer, Technical Article writer</li>
								  <li>Uyo, Aks</li>
								  <li>Nigeria</li>
								</ul>


													</p>
												</div>
										</div>


									</header>

						<div class="col-lg-12  no-padding" align="right">
							<div class="col-md-12 no-padding">
						<div class="col-lg-4 col-sm|md|xs-10">
                                <div class="row messenger_boxed" id="chat_window_1">
                                    <div class="card">
                                        <div class="row card-header heads">
                                            <div class="col-md-8 col-xs-8">
                                                <h3>Mercy's Bot</h3>
                                            </div>
                                        </div>
                                        <div class="card-body  messenger_dez">

                                            <div class="row messenger_dezs response_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="responses inbox_msg">
                                                        <p>Hello, I am mercy's bot. Feel Free to teach, I love learning new things.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>
                                            <div class="row messenger_dezs response_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="responses inbox_msg">
                                                        <p>To teach me use the format below</p>
                                                        <p>train: your question # your answer # password</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>

                                        </div>   <!-- message form -->
                                        <div class="card-footer message-div">
                                            <form action="" id="messenger" method="post">
                                                <div class="input-group mb-3">
                                                    <input class="form-control message chat_input" name="sent_messages" aria-label="With input" placeholder="Send Message...">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-sm send-message" id="btn-chat"><i class="fa fa-envelope"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


				<div class="col-md-12 col-md-offset-12" style="display:flex;justify-content: center">
				<a href="https://github.com/mercyikpe">
					<i class="fa fa-github" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i>

				</a>

				<a href="https://twitter.com/mercyikpee">
					<i class="fa fa-twitter"style="color:#ccc; font-size: 25px; padding:15px; float: right"></i>

				</a>

				<a href="https://medium.com/@mercyikpe">
					<i class="fa fa-medium" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i>

				</a>

				<a href="https://web.facebook.com/mercy.ikpe.79">
					<i class="fa fa-facebook" float style="color:#ccc; font-size: 25px; padding:15px; float: right"></i>

				</a>


							</section>
						</div>

						</div>
						</div>
						</div>

						<script>
                        $('document').ready(function() {

                            $("body").css("opacity", 0).animate({ opacity: 1}, 10);


                            $('#messenger').submit(function(e) {
                                e.preventDefault();

                                var message = $('.message').val();
				    message = message.trim();
				    if(message ==''){return;}
                                var messenger_dezs = $('.messenger_dez');

                                let bot_msg =  (answer)=>{

                                            return   '<div class="row messenger_dezs response_sent">'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="responses inbox_msg">'+
                                                                    '<p>'+answer+'</p>'+
                                                                '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-2 col-xs-2 avatar">'+
                                                            '</div>'+
                                                        '</div>';
                                }

                            let sent_msg =    (msg)=>{

                                              return   '<div class="row messenger_dezs response_got">'+
                                                            '<div class="col-md-2 col-xs-2 avatar"></div>'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="responses outbox_msg">'+
                                                                    '<p>'+msg+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>';
                            }

                                       if (message != ''){

                                           if (message.split(':')[0] !='train')
                                            messenger_dezs.append(sent_msg(message));
                                             messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                       }



                                $('.message-div').removeClass('')




                                $.ajax({
                                    type: 'POST',
                                    url: 'profiles/mercyikpe.php',
                                    dataType: 'json',
                                    data: {sent_messages: message},
                                    success: function(data) {

                                        if (data.status===1){

                                           $('.message').val('');
                                             messenger_dezs.append(bot_msg(data.answer));
                                             messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
                                        else if(data.status===2){
                                            $('.message').val('');
                                            messenger_dezs.append(bot_msg('So sorry but i don\'t\ understand your message. But you could teach me. train: this is a question # this is an answer # your password '));
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
										else if(data.status===6){
                                            $('.message').val('');
                                            messenger_dezs.append(bot_msg('mercyBot v1.0'));
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
                                        else if(data.status===0){
											$('.message').val('');
                                            messenger_dezs.append(bot_msg('you ought to be careful you know?'))
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
                                        else if(data.status===3){
                                            $('.message').val('');
                                            messenger_dezs.append(bot_msg(data.response));
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
                                        else if(data.status===4){
                                            $('.message').val('');
                                            messenger_dezs.append(bot_msg(data.response));
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }
                                        else if(data.status===5){
                                            $('.message').val('');
                                            messenger_dezs.append(bot_msg(data.response));
                                            messenger_dezs.scrollTop(messenger_dezs[0].scrollHeight);
                                        }

                                    },
                                    error: function(error) {

                                        console.log(error);

                                        if (error) {

                                            $('.message-div').addClass('has-danger');
                                        }
                                    },
                                });
                            });

                            $(document).on('click', '.card-header span.reacher', function(e) {
                                var $this = $(this);
                                if (!$this.hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideUp();
                                    $this.addClass('card-collapsed');
                                    $this.removeClass('fa-minus').addClass('fa-plus');
                                } else {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $this.removeClass('card-collapsed');
                                    $this.removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('focus', '.card-footer input.chat_input', function(e) {
                                var $this = $(this);
                                if ($('#minim_chat_window').hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $('#minim_chat_window').removeClass('card-collapsed');
                                    $('#minim_chat_window').removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('click', '.icon_close', function(e) {
                                $("#chat_window_1").remove();
                            });
                });

                    </script>


</body>
</html>
<?php
	}
?>

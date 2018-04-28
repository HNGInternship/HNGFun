
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require "../answer.php";

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
            if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'help') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getBotInfo()
                ]);
                return;
            }

            // Getting Bot Menu or Manual
            if(preg_replace('([\s])', ' ', trim(strtlower($question))) === 'help') {
                echo json_encode([
                    'status' => 1,
                    'answer' => getBotManual()
                ]);
                return;
            }
            
            //
        
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
                <p>This is Victor Jonah.</p>
                <p>300l Computer science of the University of Uyo.</p>
                <p>HNG Intern, 2018</p>            
                <!-- Chatbot Section -->
                <!-- Trigger the modal with a button -->
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
                                        <textarea name="chatbox" class="form-control" cols="10" rows="2"></textarea>
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
        </div>
    </body>
    	<!-- animate.css -->
	<script>
    $( document ).ready(function() {
    $('h1').addClass('animated infinite shake');
    
    $('#mssgbox').addClass('animated infinite flash');
   
    });
    </script>

<?php

    require_once '../db.php';
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
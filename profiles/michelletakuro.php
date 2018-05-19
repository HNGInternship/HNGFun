<?php

	if(!defined('DB_USER')){
		require "../config.php";
		
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("select * from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];
		}


		$name = null;
		$username = "michelletakuro";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];
			$image_filename = $row['image_filename'];
		}

 }
	catch(PDOException $e)
	{
  echo "Connection failed: " . $e->getMessage();
	}
	  /**
 *  functions to define
 *  -- check question
 *  --check training
 *  -- train
 *  -- check pssword
 *
 *
 */
   function processedAnswer($answer){
        $functionOpeningTag = '(';
        $functionClosingTag = ')';



        //find the function
        //Find the start limiter's position
        $functionStart = strpos($answer, $functionOpeningTag);

        //Find the ending limiters position, relative to the start position
        $functionEnd = strpos($answer, $functionClosingTag, $functionStart);

        //  Extract the string between the starting position and ending position
        $functionName = substr($answer, $functionStart+2, ($functionEnd-2)-$functionStart);

        $response = stripTags($answer);

        // interpolate the string, replace the function name with a function call
        return str_replace($functionName, call_user_func($functionName), $response);

    }
    function stripTags($string){
        return str_replace(['{{', '}}', '((', '))' ], '', $string);
    }
    function isTraining($question){
        $pos = strpos($question,'train:');

        if( $pos === false) {
            return false;
        } else {
            return true;
        }
    }
       function trainBot($trainingString, $conn){

            //extract parts, first remove train:
            $trainingString = str_replace('train:', '', $trainingString);

            //ckeck presence of #
            $pos = strpos($trainingString,'#');
            if( $pos === false) {

                return 'Oops! to train this bot please enter, <code>train: question # answer # password <code> ';
            }
            //check password
            $pos = strpos($trainingString, 'password');
            if( $pos === false) {

                return 'Please enter a valid password. <strong>password </strong> is the password.';
            } else {
            //the training sting is well formated and has password go on and split the string into question and answer parts
            //first get the question,  start from 0 to the first #
            $questionPart = trim(substr($trainingString, 0, strpos($trainingString,'#')));

            //get the answer, remove everything else from the training string
            $answerPart = trim(str_replace(['#', 'password', $questionPart], '', $trainingString));

            // Save it into db, use prepared statement to protect from security exploits
            try{

                $sql  = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';
                $stmt = $conn->prepare($sql);
                $stmt->execute(
                    array(
                    ':question' => stripTags($questionPart),
                    ':answer' => $answerPart,
                    )
                );
                return 'Thank you for training me';

            } catch(PDOException $e){
                throw $e;
            }
        }
    }



     //Bot Brain
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //require "../answers.php";
        if(isset($_POST['question'])){
			
		$question='%'.$_POST['question'].'%';
			
           
           $stmt = $conn->prepare("select answer from chatbot where question like :question LIMIT 1");
           $stmt->bindParam( ':question', $question);
           $stmt->execute();

           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rows){
             // echo json_encode([
                // 'status' => 1,
                // 'answer' => "Please provide a question"
            // ]);
		echo json_encode (['answer'=>$rows['answer']]);

              
        }
		else
             echo json_encode([
                'answer' => "I am afraid I do not have answer to your question but you can train me using the following format <strong>train: question # answer # password</strong>"
            ]);
		}

        function answerHasFunction($answer){

        $openingTags = strpos($answer,'((');
        $closingTags = strpos($answer,'))');

        if( $openingTags === false && $closingTags === false ) {
            return false;
        } else {
            return true;
        }
    }
        function getBotDetails(){
        return "I am Cyclo Bot @Version 1.0 ";
    }
         function getHelpdetails(){
        return "I am here to assist ask me any questions and I will answer if I can. You can also train me  to answer your questions by using the format <strong>train: question # answer # password</strong>";
    }
    //remove question mark and trim
            $question = trim($question);
            $question = str_replace('?', '', $question);

            //check if the question is "aboutbot" in which case return info about the bot
            if($question == "aboutbot"){
                echo json_encode([
                    'status' => 1,
                    'answer' => getBotDetails()

                ]);
                return;

             //check if the question is "help" in which case return infoon help
            if ($question == "help"){
            echo json_encode([
                 'status'=>1,
                 'answer'=>getHelpdetails()
                ]);
                return;}

             //check if the input is a training attempt
            if(isTraining($question) ){
                $trainingResult = trainBot($question, $conn);
                //train the bot
                echo json_encode([
                    'status' => 1,
                    'answer' => $trainingResult
                ]);
                return;
            }

            //fetch the answer to the question
            $answer = getAnswer($question, $conn);

            //if the answer has ((<function_name>)) then parse it
            if(answerHasFunction($answer)){
                //send the parsed answer
                echo json_encode([
                    'status' => 1,
                    'answer' => processedAnswer($answer)
                ]);
                return;
            }

            echo json_encode([
                'status' => 1,
                'answer' => $answer
            ]);

        } else{
            //no question was typed
            echo json_encode([
                    'status' => 0,
                    'answer' => "Please type a question"
            ]);
            return;
        }

    }


//duplicated code
           /* stmt=$conn->prepare("select*from chatbot where answer is like :'' " LIMIT 1);
           $stmt =bindParam( :answer, `%`.$answer.`%`)
           $stmt->execute();


           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if(count($rows)>0){

             echo json_encode([
                'status' => 1,
                'answer' => "Please provide a question"
            ]);

             
        }*/

		
		

?>
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HNG Internship 4.0 | Takuro Gbemisola</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="HNG Internship 4.0 Profile Page for Miss Takuro Gbemisola">
		<!--error is pointing below-->
        <script src="../js/jquery.min.js" type="text/javascript"></script>-
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

        <script type="text/javascript">  
            (function($) {
                $(document).ready(function() {
                    var $chatbox = $('.chatbox'),
                        $chatboxTitle = $('.chatbox__title'),
                        $chatboxTitleClose = $('.chatbox__title__close'),
                        $chatboxCredentials = $('.chatbox__credentials');
                    $chatboxTitle.on('click', function() {
                        $chatbox.toggleClass('chatbox--tray');
                    });
                    $chatboxTitleClose.on('click', function(e) {
                        e.stopPropagation();
                        $chatbox.addClass('chatbox--closed');
                    });
                    $chatbox.on('transitionend', function() {
                        if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
                    });
                    $chatboxCredentials.on('submit', function(e) {
                        e.preventDefault();
                        $chatbox.removeClass('chatbox--empty');
                    });
                    var msg =$('#quesform');
            msg.submit(function(e){
                e.preventDefault();
                var msgBox = $('textarea[name=question]');
                var question = msgBox.val();
                $(".chatbox__body").append("<div class='chatbox__body__message chatbox__body__message--right'><p>" + question + "</p></div>");
                    debugger;
                $.ajax({
                    url: 'profiles/michelletakuro.php',
                    type: 'POST',
                    data: {question: question},
                    dataType: 'json',
				}).done(function(response){
                    $(".chatbox__body__message--right").append("<div id='cyclo'><img src='http://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg'><p>" + response.answer + "</p></div>");
                   // console.log(response.result);
                    //alert(response.result.d);
                    //alert(answer.result);
                }).fail(function(error){
                        //console.log(error);
                        alert(JSON.stringify(error));
                });  
                $('.chatbox__body').scrollTop($('.chatbox__body')[0].scrollHeight);
                $("#texts").empty();       
            });


                    });

            })(jQuery);

			
		
        </script>

        <style type="text/css">
            .innerTop {
                padding: 45px;
                background-color: rgba(25,92,90,0.7);
                background-image: linear-gradient(35deg, #64b5f6 36%, #536dfe 65%);
                text-align: center;
                font-family: Arial, monospace;
                font-size: 25px;
                color:white;
            }

            /* Style The Dropdown Button */
            .dropbtn {
                background-color: #1a237e;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #CFD8DC;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {
                background-color: #f1f1f1;
            }

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .dropdown:hover .dropbtn {
                background-color: #00838f;
            }

            .Image {
                text-align: center;
                margin-top: 45px;
                margin-bottom:30px;
                    }


            .blue-bg{
                background-color: rgba(25,92,90,0.7);
                background-image: linear-gradient(35deg, #64b5f6 36%, #536dfe 65%);
                padding: 60px 30px;
                text-align: center;
            }

            .feat-title h2{
                color: #010101;
                text-align: center;
                font-size: 34px;
                text-transform: uppercase;
            }

            .box-white{
                background-color: white;
                border-radius: 20px;
                box-shadow: 0 3px 12px -2px rgba(0,0,0,0.08);
                margin: 10px;
                margin-bottom: 30px;
                padding: 30px 25px 25px;
                text-align: center;
                margin-top:70px;
            }


            .box-grey{
                background-color:white ;
                border-radius: 50px;
                box-shadow: 0 3px 12px -2px rgba(0,0,0,0.08);
                margin-top: 100px;
                margin-bottom: 30px;
                padding: 30px 25px 25px;
                text-align: center;
                height:contain;
            }

            .icons{
                display:inline;
                list-style: none;
            }

            .images{
                border-radius: 7px;
                margin-right: 50px;
                margin-top: 50px;
                text-align: center;
            }

            #footer p{
                margin-top: 50px;
                padding: 0px;
            }

            .Image2{
                text-align:center;
                margin-top: 30px;
                margin-bottom:15px;
                margin-left: -80px;
                display: inline;
            }

            /**Chatbot settings*/

            .chatbox {
                position: fixed;
                bottom: 0;
                right: 30px;
                width: 300px;
                height: 400px;
                background-color: #fff;
                font-family: 'Lato', sans-serif;

                -webkit-transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);
                transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);

                display: -webkit-flex;
                display: flex;

                -webkit-flex-direction: column;
                flex-direction: column;
            }

            .chatbox--tray {
                bottom: -350px;
            }

            .chatbox--closed {
                bottom: -400px;
            }

            .chatbox .form-control:focus {
                border-color: #1f2836;
            }

            .chatbox__title,
            .chatbox__body {
                border-bottom: none;
            }

            .chatbox__title {
                min-height: 50px;
                padding-right: 10px;
                background-color: #1f2836;
                border-top-left-radius: 4px;
                border-top-right-radius: 4px;
                cursor: pointer;

                display: -webkit-flex;
                display: flex;

                -webkit-align-items: center;
                align-items: center;
            }

            .chatbox button:hover{
                cursor: pointer;

            }

            .chatbox button:active{
                background-color: black;
                
            }


            .chatbox__title h5 {
                height: 50px;
                margin: 0 0 0 15px;
                line-height: 50px;
                position: relative;
                padding-left: 20px;

                -webkit-flex-grow: 1;
                flex-grow: 1;
            }

            .chatbox__title h5 a {
                color: #fff;
                max-width: 195px;
                display: inline-block;
                text-decoration: none;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .chatbox__title h5:before {
                content: '';
                display: block;
                position: absolute;
                top: 50%;
                left: 0;
                width: 12px;
                height: 12px;
                background: #4CAF50;
                border-radius: 6px;

                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .chatbox__title__tray,
            .chatbox__title__close {
                width: 24px;
                height: 24px;
                outline: 0;
                border: none;
                background-color: transparent;
                opacity: 0.5;
                cursor: pointer;

                -webkit-transition: opacity 200ms;
                transition: opacity 200ms;
            }

            .chatbox__title__tray:hover,
            .chatbox__title__close:hover {
                opacity: 1;
            }

            .chatbox__title__tray span {
                width: 12px;
                height: 12px;
                display: inline-block;
                border-bottom: 2px solid #fff
            }

            .chatbox__title__close svg {
                vertical-align: middle;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-width: 1.2px;
            }

            .chatbox__body,
            .chatbox__credentials {
                padding: 15px;
                border-top: 0;
                background-image: linear-gradient(35deg, #64b5f6 36%, #536dfe 65%);
                border-left: 1px solid #ddd;
                border-right: 1px solid #ddd;

                -webkit-flex-grow: 1;
                flex-grow: 1;
            }

            .chatbox__credentials {
                display: none;
            }

            .chatbox__credentials .form-control {
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            .chatbox__body {
                overflow-y: auto;
            }

            .chatbox__body__message {
                position: relative;
                width: 80%;
            }

            .chatbox__body__message p {
                padding: 15px;
                border-radius: 4px;
                font-size: 14px;
                background-color: #fff;
                -webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
                box-shadow: 2px 2px black;
            }

            .chatbox__body__message img {
                width: 40px;
                height: 40px;
                border-radius: 100%;
                border: 2px solid #fcfcfc;
                position: absolute;
                bottom: 0px;
            }

            .chatbox__body__message--left p {
                margin-left: 15px;
                padding-left: 30px;
                text-align: left;
            }

            .chatbox__body__message--left img {
                left: -5px;
            }
            
            #cyclo p{
                border-radius: 4px;
                font-size: 14px;
                background-color: #fff;
                -webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
                box-shadow: 2px 2px black;
                text-align: left;
                padding-left:30px;
                margin-left:10px;
            }
            
            #cyclo{
                position: relative;
                left:-60px;
                width: 109%;
                
                }
            
            #cyclo img{
                left:-10px;
            }
            .chatbox__body__message--right {
                float: right;
                margin-right: -15px;
            }

            .chatbox__body__message--right p {
                margin-right: 15px;
                padding-right: 30px;
                text-align: right;
            }

            .chatbox__body__message--right img {
                right: -5px;
            }

            .chatbox__message {

                min-height: 40px;
                outline: 0;
                resize: none;
                border: none;
                font-size: 12px;
                border: 1px solid #ddd;
                border-bottom: none;
                background-color: #fefefe;
                margin-left: 0px;
            }

            .chatbox__message button{
                float: right;
                padding-bottom: 10px;
                padding-top: 10px;
                border:none;
                background-color: #1a237e;
                color: white;
                border-radius: 20px;
                margin-right: 5px;
            }



            .chatbox__message textarea{
                padding: 2px;
                height: 20px;
                margin-left: -20px;
                margin-top: 7px;
                width: 70%;
                border: none;

            }

            .chatbox__message textarea{
                padding: 2px;
                height: 20px;
                margin-left: -20px;
                margin-top: 7px;
                width: 70%;
                border: none;

            }

            .chatbox--empty {
                height: 262px;
            }

            .chatbox--empty.chatbox--tray {
                bottom: -212px;
            }

            .chatbox--empty.chatbox--closed {
                bottom: -262px;
            }

            .chatbox--empty .chatbox__body,
            .chatbox--empty .chatbox__message {
                display: none;
            }

            .chatbox--empty .chatbox__credentials {
                display: block;
            }

            .form-group {
                margin-left: 0px;
                padding: 10px;
                margin-top: 20px;
                /*border: 2px red solid;*/
            }

            .form-control {
                margin-left: 10px;
                /*border: blue 2px solid;*/
                width: 7y0%;
                padding-top: 5px;
                padding-bottom: 5px;
                border-radius: 10px;
            }

            .chatbox__credentials label{
                margin-left: 0px;
                /*border: 2px black solid;*/
                padding-bottom: 10px;
                padding-top: 10px;
                color: white;
            }

            .chatbox__credentials button{
                text-decoration: none;
                background-color: #1a237e;
                border:0px;
                margin-top: 20px;
                padding: 15px;
                border-radius: 20px;
                color: white;
            }


    </style>
    </head>

    <body>
        <section>
            <div class="innerTop">
                <h1> HNG FUN INTERNSHIP 4.0 </h1>
                <h2> PROFILE </h2>
                <div class="dropdown">
                    <button class="dropbtn">MENU</button>
                    <div class="dropdown-content">
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Biography</a>
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Skillset</a>
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Connect with me</a>
                    </div>
                </div>

            </div>
        </section>

        <div class="Image">
            <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg" height="300px" width="30%">
        </div>

        <section class="blue-bg" id="Biography">
            <div class="box-white">
                <div class="feat-title"><h2>Biography</h2></div>
                <p class="small-text"> <strong>Takuro Gbemisola</strong> is a technology enthusiast with a keen interest in programming language as well as community impact.She is an avid reader, open learner and is constantly seeking opportunities to develop herself.She has worked with several notable organisations like AIESEC,Wecyclers,Ignite Africa etc. She is a fellow of the YALI West Africa RLC,
        Young Professional Network (YPB) and the Andela Learning Community.Takuro Gbemisola is a graduate of the University of Lagos Quantity surveying department.
                </p>
            </div>

            <div class="box-grey">
                  <div class="feat-title"><h2>SKILLSET</h2></div>
                <div class="Image2">
                    <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download_2.png" height="50%" width="25%">
                    <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download_1.png" height="50%" width="25%">
                    <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download.png" height="50%" width="25%">
                    <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images.png" height="50%" width="20%">
                </div>
            </div>

            <a href="https://twitter.com/GbemmySpeaks"> <img class="images" src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1_1.jpg" height="50px" width="50px"> </a>
            <a href="https://www.facebook.com/gtakuro"> <img class="images" src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1.png" height="50px" width="50px"> </a>
            <a href="https://ng.linkedin.com/in/gbemisola-takuro-78b34046"> <img class="images" src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1_2.jpg" height="50px" width="50px"> </a>

            <footer id="footer">
                <p>©Takuro Gbemisola |HNG INTERNSHIP 4.0</p>
            </footer>


            <!--Chat bot code-->


<div class="chatbox chatbox--tray chatbox--empty">
    <div class="chatbox__title">
        <h5><a href="#">Cyclo Bot</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg" height="40px" width="40px" alt="Picture">
            <p>Hello, I'm Cyclo Bot. !</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg" height="40px" width="40px" alt="Picture">
            <p>I am here to assist you to the best of my ability. You can find out more about me by typing <strong>#About me</strong></p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="http://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg" height="40px" width="40px" alt="Picture">
            <p> You can also train me  to answer your questions by using the format <strong>train: question # answer # password</strong>. </p>
        </div>

    </div>
    <form action="#" method="post" class="chatbox__credentials">
        <div class="form-group">
            <label for="inputName">Name:</label>
            <input type="text" class="form-control" id="inputName" placeholder="E.g John Smith" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Enter Chat</button>
    </form>
    <div class="chatbox__message">
    <form id="quesform" method="post">
            <textarea id='texts' name="question" placeholder="Enter message ..."></textarea>
            <button type="submit" id="sendtxt">Send</button>
    </form>
    </div>
        </div>
        </div>

        </section>



    </body>
</html>

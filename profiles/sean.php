
<?php

	if(!defined('DB_USER')){
		require "../config.php";
		
	}

	try {

        $q = 'SELECT * FROM secret_word';

        $sql = $conn->query($q);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $data = $sql->fetch();

        $secret_word = $data["secret_word"];

    } catch (PDOException $err) {

        throw $err;

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
        return "I am Sean and i love beautiful codes ";
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Seun Adebanwo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	
	<!------ Include the above in your HEAD tag ---------->
	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
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
                    url: 'profiles/sean.php',
                    type: 'POST',
                    data: {question: question},
                    dataType: 'json',
				}).done(function(response){
                    $(".chatbox__body__message--right").append("<div id='cyclo'><img src='http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png'><p>" + response.answer + "</p></div>");
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

	<script type="text/javascript">
		$(function() {
		var Accordion = function(el, multiple) {
			this.el = el || {};
			this.multiple = multiple || false;

			// Variables privadas
			var links = this.el.find('.link');
			// Evento
			links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
		}

		Accordion.prototype.dropdown = function(e) {
			var $el = e.data.el;
				$this = $(this),
				$next = $this.next();

			$next.slideToggle();
			$this.parent().toggleClass('open');

			if (!e.data.multiple) {
				$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
			};
		}	

		var accordion = new Accordion($('#accordion'), false);
	});


	</script>
	<!------ Include the above in your HEAD tag ---------->
	
<style>

@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
* {
    margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body {
	background: #2d2c41;
	font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
}

.img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}

.iamgurdeep-pic {
    position: relative;
}
.username {
    bottom: 0;
    color: #ffffff;
    padding: 30px 15px 4px;
    position: absolute;
    width: 100%;
    text-shadow: 1px 1px 2px #000000;
    
background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, #2d2c41 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%, #2d2c41 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, #2d2c41 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a64d4d4d',GradientType=0 ); /* IE6-9 */
}
.iamgurdeeposahan {
    border-radius: 4px 4px 0 0;
}
.username > h2 {
    font-family: oswald;
    font-size: 27px;
    font-weight: lighter;
    margin: 31px 0 4px;
    position: relative;
    text-shadow: 1px 1px 2px #000000;
    text-transform: uppercase;
}
.username > h2 small {
    color: #ffffff;
    font-family: open sans;
    font-size: 13px;
    font-weight: 400;
    position: relative;
}
.username .fa{
    color: #ffffff;
    font-size: 14px;
    margin: 0 0 0 4px;
    position: static;
}
.edit-pic a {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 1px solid #ffffff;
    border-radius: 50%;
    color: #2d2c41;
    font-size: 21px;
    height: 39px;
    line-height: 38px;
    margin: 8px;
    text-align: center;
    width: 39px;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
	transition: all 0.4s ease;
    text-decoration: none !important;
     display: list-item;
     background-color: rgba(255, 255, 255, 0.1)
}
.edit-pic a:hover {
   font-size: 17px;
   opacity: 0.9;
  }
.edit-pic a:focus {
   background:#b63b4d;
    color: #fff;
    border: 1px solid #b63b4d;
}
a:focus {
    outline: none;
    outline-offset: 0px;
}
.edit-pic {
    position: absolute;
    right: 0;
    top: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.tags {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 2px;
    display: inline-block;
    font-size: 13px;
    margin: 4px 0 0;
    padding: 2px 5px;
     -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.tags:hover {
    background: rgba(255, 255, 255, 0.3) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2px;
    display: inline-block;
    font-size: 13px;
    margin: 4px 0 0;
    padding: 2px 5px;
}
#accordion:hover .edit-pic {
    opacity: unset;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}


.btn-o {
    
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2px;
    color: #ffffff !important;
    display: inline-block;
    font-family: open sans;
    font-size: 15px !important;
    font-weight: normal !important;
    margin: 0 0 10px;
    padding: 5px 11px;
    text-decoration: none !important;
    text-transform: uppercase;
    
   background-color: rgba(255, 255, 255, 0.1);
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.btn-o:hover {
  background-color: rgba(255, 255, 255, 0.4);
    color: #fff !important;
  }
.btn-o:focus {
   background:#b63b4d;
    color: #fff;
    border: 1px solid #b63b4d;
}
.submenu .iamgurdeeposahan {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0 !important;
    border-radius: 50%;
    height: 60px;
    padding: 2px;
    width: 60px;
}
.photosgurdeep > a {
    background: #ffffff none repeat scroll 0 0;
    border-radius: 50%;
    display: inline-block !important;
    padding: 0 !important;
}
.view-all {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0 !important;
    border: 1px solid;
    float: right;
    font-family: oswald;
    font-size: 26px;
    height: 60px;
    line-height: 61px;
    text-align: center;
    width: 60px;
}
.photosgurdeep {
    padding: 10px 9px 4px 35px;
}
ul {
	list-style-type: none;
}

a {
	color: #b63b4d;
	text-decoration: none;
}

/** =======================
 * Contenedor Principal
 ===========================*/
h1 {
 	color: #FFF;
 	font-size: 24px;
 	font-weight: 400;
 	text-align: center;
 	margin-top: 40px;
 }

h1 a {
 	color: #c12c42;
 	font-size: 16px;
 }

 .accordion {
 	width: 100%;
 	max-width: 360px;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

.accordion .link {
	cursor: pointer;
	display: block;
	padding: 15px 15px 15px 42px;
	color: #4D4D4D;
	font-size: 14px;
	font-weight: 700;
	border-bottom: 1px solid #CCC;
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}

.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #b63b4d;
}

.accordion li.open i {
	color: #b63b4d;
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}

.accordion li.default .submenu {display: block;}
/**
 * Submenu
 -----------------------------*/
 .submenu {
 	display: none;
 	background: #444359;
 	font-size: 14px;
 }

 .submenu li {
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	display: block;
 	text-decoration: none;
 	color: #d9d9d9;
 	padding: 12px;
 	padding-left: 42px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	background: #b63b4d;
 	color: #FFF;
 }
















.nav.navbar-nav .dropdown-toggle {
    padding: 0 !important;
}

.dropdown-toggle span {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 50px;
    font-size: 23px !important;
    height: 38px;
    line-height: 40px;
    margin: 0 !important;
    padding: 0 !important;
    text-align: center;
    width: 38px;
    text-shadow:none !important;
}

.nav.navbar-nav {
    bottom: 10px;
    position: absolute;
    right: 12px;
    transition: all 0.4s ease 0s;
}

.navbar-nav > li > .dropdown-menu {
    border-radius: 2px !important;
    margin-top: 10px;
    min-width: 101px;
    padding: 0;
}
.navbar-nav > li > .dropdown-menu li a {
    color: #333333 !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    padding: 2px 8px !important;
    text-align: right !important;
    text-shadow:none !important;
}
.dropdown-toggle {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important;
    font-size: 15px !important;
}

.dropdown {
  -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.dropdown-menu>li>a {
    color:#428bca;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.dropdown ul.dropdown-menu {
    border-radius:4px;
    box-shadow:none;
}
.dropdown ul.dropdown-menu:before {
    content: "";
    border-bottom: 10px solid #fff;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    top: -8px;
    right: 8px;
    z-index: 10;
}




:before, :after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
	
@media (min-width: 768px)
.navbar-nav {
    float: left;
    margin: 0;
}

.navbar-nav {
    margin: 7.5px -15px;
}

.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.dropdown-menu.pull-right {
    right: 0;
    left: auto;
}

.open>.dropdown-menu {
    display: block;
}

.navbar-nav > li > .dropdown-menu {
    border-radius: 2px !important;
    margin-top: 10px;
    min-width: 101px;
    padding: 0;
}

.dropdown ul.dropdown-menu {
    border-radius: 4px;
    box-shadow: none;
}

/***********************
CHATBOT CSS
**************/

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<div class="container">
	<div class="row">
	
        
    <h1>@Sean <br><small>Chaos is a ladder</small></h1>
	<!-- Contenedor -->
	<ul id="accordion" class="accordion">
    <li>
<div class="col col_4 iamgurdeep-pic">
<img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">
<div class="edit-pic">
<a href="https://web.facebook.com/findseun" target="_blank" class="fa fa-facebook"></a>
<a href="https://www.instagram.com/findseun/" target="_blank" class="fa fa-instagram"></a>
<a href="https://twitter.com/findseun" target="_blank" class="fa fa-twitter"></a>



</div>
<div class="username">
    <h2>Seun 'Banwo  <small><i class="fa fa-map-marker"></i> Nigeria (Lagos)</small></h2>
    <p><i class="fa fa-briefcase"></i> Web Design and Development.</p>
    
    <a href="https://web.facebook.com/findseun" target="_blank" class="btn-o"> <i class="fa fa-user-plus"></i> Add Friend </a>
    <a href="https://www.instagram.com/findseun/" target="_blank"  class="btn-o"> <i class="fa fa-plus"></i> Follow </a>
    
    
     <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-ellipsis-v pull-right"></span></a>
          <ul class="dropdown-menu pull-right">
            <li><a href="#">Video Call <i class="fa fa-video-camera"></i></a></li>
            <li><a href="#">Poke <i class="fa fa-hand-o-right"></i></a></li>
            <li><a href="#">Report <i class="fa fa-bug"></i></a></li>
            <li><a href="#">Block <i class="fa fa-lock"></i></a></li>
          </ul>
        </li>
      </ul>
   
</div>
    
</div>
        
    </li>
		<li>
			<div class="link"><i class="fa fa-globe"></i>About<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#"><i class="fa fa-calendar left-none"></i> Date of Birth : 24/06/2018</a></li>
				<li><a href="#">Address : NIGERIA,Lagos</a></li>
				<li><a href="mailto:findseun@gmail.com">Email : findseun@gmail.com</a></li>
				<li><a href="#">Phone : +234-800-000-0000</a></li>
			</ul>
		</li>
		<li class="default open">
			<div class="link"><i class="fa fa-code"></i>Professional Skills<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#"><span class="tags">Adobe Photoshop</span> <span class="tags">Magento</span> <span class="tags">CSS</span> <span class="tags">Phyton</span> 
                <span class="tags">Graphic Design</span> <span class="tags">HTML</span> <span class="tags">HTML5</span> <span class="tags">JavaScript</span> 
                <span class="tags">Django</span> <span class="tags">bootstrap</span> <span class="tags">User Interface Design</span> <span class="tags">Wordpress</span></li></a>
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-picture-o"></i>Photos <small>1,120</small><i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li class="photosgurdeep"><a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
				</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
               
                <a class="view-all" href="https://web.facebook.com/findseun" target="_blank" >15+
        		</a>
    			    
				</li>
			</ul>
		</li>
		<li><div class="link"><i class="fa fa-users"></i>Friends <small>1,053</small><i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
    			<li class="photosgurdeep"><a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
				</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
        		</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
        		</a>
                <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png">                 
    			</a>
               
                <a class="view-all" href="https://web.facebook.com/findseun" target="_blank">50+
        		</a>
    			    
				</li>
			</ul>
		</li>
	</ul>
	</div>
    
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
            <img src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png" height="40px" width="40px" alt="Picture">
            <p>Hello, I'm Sean. !</p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png" height="40px" width="40px" alt="Picture">
            <p>I am here to assist you to the best of my ability. You can find out more about me by typing <strong>#About me</strong></p>
        </div>
        <div class="chatbox__body__message chatbox__body__message--left">
            <img src="http://res.cloudinary.com/findseun/image/upload/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png" height="40px" width="40px" alt="Picture">
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
</body
</html>
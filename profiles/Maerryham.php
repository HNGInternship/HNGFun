 <html>
 <?php 

// require '../config.php';

 //if(!isset(DB_HOST)) {
//     try {
//         $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
//     } catch (PDOException $pe) {
//         die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
//     }
 //}

 try {
     $sql = "SELECT * FROM secret_word";
     $q = $conn->query($sql);
     $q->setFetchMode(PDO::FETCH_ASSOC);
     $data = $q->fetch();
 } catch (PDOException $e) {

     throw $e;
 }

try {
$sql = "SELECT * FROM interns_data where username = 'Maerryham'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data2 = $q->fetchAll();

/*to send mail
    $to = "somebody@example.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

    mail($to,$subject,$txt,$headers); */

//require_once '../answers.php';

    function search_google($params) {

        $sms_array = array(
            'key' => 'AIzaSyAynR4i_9nJ3MF5ZDoxzT5E47JFcS3xpJE',
            'q' => $params

        );

        //$result = array_merge($params, $sms_array);

        $params = http_build_query($sms_array);
        $ch = curl_init();

        $url = "https://www.googleapis.com/customsearch/v1/";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function send_mail($email,$subject,$message){
//        $to      = 'nobody@example.com';
//        $subject = 'the subject';
//        $message = 'hello';

        $headers = "From: bot@hng.fun\r\n";

        $headers .= 'Content-Type: text/plain; charset=utf-8';

        //$email = filter_input($to, FILTER_VALIDATE_EMAIL);

        if($email) {
            $headers .= "\r\nReply-To: $email";
        }
//        $headers = 'From: webmaster@example.com' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
        if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
            echo "Incorrect email format";
            return;
        }
       // mail($to, $subject, $message, $headers);
        $success = mail($email, $subject, $message, $headers, '-fbot@hng.fun');



        if (isset($success) && $success) {

            echo 'Thank you.
            Your mesage has been sent';
            return;
        }else{
            echo 'Oops!, there was a problem sending your message';
            return;

        }

    }

 function lookforanswer($question)
 {
     try {
         $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
     } catch (PDOException $pe) {
         die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
     }
     if ($question === "aboutbot") {
         echo "Maerryham bot v 1.0";
         return;
     }


     $is_training = stripos($question, "train:");
    // echo $is_training;
//     if($is_training == 0 || substr($question, 6) == "train:"){
//         echo "yes";
//     }
//     if(stripos($question, "train:")){
//         echo "trainable";
//     }else{
//         echo "not";
//     }
     //$break = strtok('train: #question #answer');
    // echo $break[1];
     if (stripos($question, "train:") === false) {
         /* bot not training, process question */
         //$answer_stmt->execute()
       $query = $conn->prepare("SELECT * FROM chatbot  WHERE question LIKE :question ORDER BY RAND() Limit 1");
         $query->bindParam(':question', $question);
         $query->execute();
         $result = $query->fetch();
         $answer = $result['answer'];
         if (isset($answer)) {
             echo $answer;
             return;
         }else{
             echo "You have to train me now, I have no idea of what you are saying.";
             echo " Write train: question#answer#password to train me";
             //echo stripos($question, "train:");
                 return;
         }
         /* returned message when bot can't find answer*/
     }else{
         # bot training process
         //Write a code to capture the kind of training that will send mail only
         $train = substr($question, 6);
         $training = preg_replace('([\s]+)', ' ', trim($train));
         $split = explode("#", $training);
         $firstpart = trim($split[0]);
        // $answer = trim($split[1]);

         if($firstpart !== "sendmail" ){


//             $train = substr($question, 6);
//             $training = preg_replace('([\s]+)', ' ', trim($train));
//             $split = explode("#", $training);
//             //list($question, $answer) = explode("#", $training);
             if (count($split) == 2) {
                 # When user didnt give password
                 echo "You can only train me with a password please. Kindly supply my Password.";
                 return;
             } elseif (count($split) == 1) {
                 # When user didnt give answer
                // echo $question;
                 echo "Training is invalid, write train: question # answer # password to train me";
                // echo print_r($split);
                 return;
             }
             $question = trim($split[0]);
             $answer = trim($split[1]);
             $password = trim($split[2]);
             if ($password == 'yessme') {
                 # carry out insertion if password is supplied correctly
                 //echo "correct";
                 $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
                 if ($conn->exec($sql)) {
                     # check if was inserted
                     echo "Thanks for the training, I promise to be super smart so soon!.";
                     return;
                 }
                 echo "Have not gotten your question";
                 return;
             }else{
                 echo "You are not authorized to train me except you supply a valid password";
                // echo $password;
             }

             return;
         //return "undergoing training";
         }else{
             //Then send mail syntax is train: sendmail#to#tsubject#message
             //echo 'sending mail';
            // $firstpart

             if(count($split) == 3){
                 echo "You have to supply the message";
                 return;
             }elseif (count($split) == 2) {
                 # When user didnt give password
                 echo "You have to supply the subject";
                 return;
             } elseif (count($split) == 1) {
                 # When user didnt give answer
                 // echo $question;
                 echo "You have to supply the email address you are sending mail to, Kindly follow the sendmail syntax
                 train: sendmail#emailto@example.com#tsubject#message";
                 // echo print_r($split);
                 return;
             }
            // $command = trim($split[0]);
             $to = trim($split[1]);
             $subject = trim($split[2]);
             $message = trim($split[3]);

             //Then send mail

             send_mail($to,$subject,$message);


             return;
         }
//             if(stripos($question, "search:") !== false){
//
//
//             //$train = substr($question, 7);
//             $training = preg_replace('([\s]+)', ' ', trim($question));
//             $split = explode("#", $training);
//             $question = trim($split[0]);
//
//             echo 'searching';
//             //echo stripos($question, "search:");
//             $answer = search_google($question);
//             echo $answer;
//                 return;
//             }elseif(stripos($question, "send_mail:") === 0){
//                 echo 'sending mail';
//                 return;
//             }


     }

    /* if(strpos($question, "(") !== false){
         list($functionName, $paramenter) = explode('(', $question) ;
         list($paramenter, $parameterEnd) = explode(')', $paramenter);
         $paramenterArr = explode(",", $paramenter);
         if(strpos($paramenter, ",")!== false){
             $paramenterArr = explode(",", $paramenter);
             simpleMaths($paramenterArr[0], $paramenterArr[1]);
         }
     }
     else{
         echo  "Sorry I am not smart enough to answer, pls train me using the train: question # answer";
     } */

     return;

 }

 if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
     # code...
     $question = $_POST['value'];
     $question = trim($question);
     //echo $message;
     $answer = lookforanswer($question);
     # echo $answer;
     return;
 }

} catch (PDOException $e) {

    throw $e;
}


 //if(isset($_POST['value'])){
//$question = $_POST['value'];
//
////check_answer_table_chibuokem($question);
//
//}
?>
    <head>
        <title>My Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>

       <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
        <script type="text/javascript" src="vendor/jquery/jquery.js"></script>
        <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
		<style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900); html, html * { font-family: Roboto; }
		.font{
			font-family: Roboto;
		}
			.transparent{
				text-align: center;
				height: auto;  
				padding: 40px 20px; 
				font-weight: bold;
				color:blue;  
				background-image:url('http://res.cloudinary.com/maerryham/image/upload/v1524249303/ph-10240.jpg'); 
				background-repeat: repeat;
			}
		.chat-bucket{
			width: 100%; padding: 10px; margin:2px;
		}
		.me{
			background-color: white;
            text-align: right;
            //border-radius:3px;
            width: auto !important;
           // max-width: 60%;
            //background: #dcf8c6;
            border-radius: 10px 10px 0 10px;
            padding: 4px 10px 7px !important;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            display: block;
            word-wrap: break-word;
		}
		.you{
			background-color: #eee; text-align: left;
            //border-radius:3px;
            //width: auto !important;
            padding: 4px 10px 7px !important;
            border-radius: 10px 10px 10px 0;
            //background: #ffffff;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            word-wrap: break-word;
            display: block;
		}

        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
		</style>
    </head>
    <body >
	<div class="container">
	<?php foreach($data2 as $data2){ ?>
		
        <div class="col-md-12 center transparent">
			<center>
				<div class="col-md-2 col-md-offset-2 col-xs-12 img-circle" style="overflow:hidden; height:200px; padding:5px ">
					<img src="<?= $data2['image_filename'] ?>"  style="height:auto; max-height:100%; width:auto; min-width:40%; border: 2px solid blue; border-radius:5px;"/>
				</div>
			</center>
		
		<div  style="margin-top: 20px;  background: rgba(50, 50, 10, 0.2); min-height: 100px; padding: 40px 25px; visibility: visible; animation-duration: 2s; animation-name: fadeInRight;">
			<h1 style="font-family: 'Monotype Corsiva'; font-size: 48px ; text-align: center">My Name is <?= $data2['name'] ?></h1>
			<h5 style=" font-size: 24px ; text-align: center">My Username is <?= $data2['username'] ?></h5>
			<p style="font-family: 'arial'; color:white; ">I am a Web Developer passionate to learning new technology. Looking forward to meeting you soon.</p>
			
			
			<p style="font-family: arial; font-size: 64px; text-align: center"> <?php $secret_word = $data['secret_word']?></p>
			<a href="#chat-now"><button class="btn btn-info">Chat me now</button></a>
		</div>
		<div style="margin:10px;"></div>
		<center><div class="col-md-6 col-md-offset-3 col-xs-12" id="chat-now" data-spy="scroll" data-target=".chat-bucket" style="height: 1000px; overflow: auto;">
			<!--<div class="chat-bucket me" style="" id="chat">Hello <i class="fa fa-user"></i></div>
			<div class="chat-bucket you" style="" id="chat"><i class="fa fa-android"></i> Hi</div> -->
		
		<script type="text/javascript">


                    $(document).ready(function() {
                        var send_button         = $("#send");
                        var show_content      = $("#content");

                        $('#quest').keypress(function(e) {
                            if(e.which == 13) {
                                jQuery(this).blur();
                                jQuery('#send').focus().click();
                                jQuery('#quest').focus();

                            }
                        });


                       // Get question
                        $(send_button).click(function(){
                            var value = $("#quest").val();
                            var me = '<div class="chat-bucket me" style="" id="chat">'+ value +' <i class="fa fa-user"> </div>';
                            $(show_content).append(me)

                            //Ajax get answer

                                data = {value:value};
                                $.ajax({
                                url: 'Maerryham.php',
                                data: data,
                                type: 'post',
								
                                success: function(output){
									//alert(output);
                                var you = '<div class="chat-bucket you" style="" id="chat"><i class="fa fa-android"></i>'+ output +'</div>';
                                $("#content").append(you) ;
                                };

                                $("#quest").value = '';


                             });

                           // $("div#content").scrollTop(jQuery("div#content")[0].scrollHeight);
                            $('html, body').animate({
                                scrollTop: $("#content").offset().top
                            },1000);



                        });
                    });
                </script>
				<div class="form-group">
				  <!--<label for="comment">Chat</label> -->
				  <!--<textarea class="form-control" rows="5" id="comment" style="margin-top: 0px; margin-bottom: 0px; height: 35px;"></textarea> -->
				  <div id="content"></div>
                    <div class="row" style="margin: 0">
                        <div class="col-sm-11 col-xs-11 " style="margin:0px; padding: 0px;"><input type="text" class="form-control" name="quest" id="quest"></div>
                        <div class="col-sm-1 col-xs-1" style="margin:0px; padding-left: 0;"><button id="send" class="btn btn-info" style="height: 35px;"><i class="fa fa-send"></i></button></div>
                    </div>
				</div>
			
		</div> </center>

		
		</div>
		<?php } ?>
		</div>
    <div style="margin:20px"></div>
		

	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
	
<!--	<script type="text/javascript">-->
<!--		$(document).ready(function() {-->
<!---->
<!--			$('#send').click(function(e){-->
<!--                e.preventDefault();-->
<!--				var value = $('#quest').val();-->
<!--				var me = '<div class="chat-bucket me" style="" id="chat">\'+ value +\'</div>';-->
<!---->
<!--               // $(wrapper).prepend('');-->
<!---->
<!--				$("#content").append(me) ;-->
<!--				// data = {question:value};-->
<!--				// $.ajax({-->
<!--				// 	url: '../answers.php',-->
<!--				// 	data: data,-->
<!--				// 	type: 'post',-->
<!--				// 	success: function(){-->
<!--				// 	    var you = '<div class="chat-bucket you" style="" id="chat">\'+ data +\'</div>';-->
<!--				// 		$("#content").append(you) ;-->
<!--				// 	}-->
<!--				// });-->
<!--			});-->
<!--		});-->
<!--</script>-->


    </body>
</html>

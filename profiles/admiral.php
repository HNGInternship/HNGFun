<?php 
    date_default_timezone_set('Africa/Lagos');

        if (!defined('DB_USER')){
            
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }

           global $conn;

        try {
            $sql = 'SELECT * FROM secret_word LIMIT 1';
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            $secret_word = $data['secret_word'];
        } catch (PDOException $e) {
            throw $e;
        }    
        try {
            $sql = "SELECT * FROM interns_data WHERE `username` = 'oriechinedu' LIMIT 1";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $my_data = $q->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
    
    if ($_SERVER['REQUEST_METHOD']==="POST") {

        $q = $_POST['chat_message'];

        $q = trim(htmlspecialchars($q));
        $q = trim($q, "?");

        if (empty($q)){

            echo json_encode(['status'=>0]); //status =0 means, user submitted empty string
       }
           
            //check if it's a trainer
           $first_test_str = explode(':', $q);
           if ($first_test_str[0]== 'train'){

                $password = 'password';

                $second_test_str = explode('#', $first_test_str[1]);

                if (! count($second_test_str) < 3 && trim($password)===trim($second_test_str[2])){

                    if(trim($second_test_str[0]) !='' && trim($second_test_str[1] != '')){

                        $question = $second_test_str[0];
                        $ans = $second_test_str[1];
                        
                        //check if question or answer already exists
                            $sql = "SELECT * FROM chatbot WHERE `question` LIKE '%$question%' OR `answer` LIKE '%$ans%'";
                            $stm = $conn->query($sql);
                            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
                            $res = $stm->fetchAll();

                            if ($res){
                                echo json_encode(['status'=>4, 'response'=>'Were you thinking I am that dull not to know that <code>'.$res[0]['question']. '</code> simply require <code>'. $res[0]['answer'].'</code> as the answer? <code>Could you please ask something more challenging or teach me something serious?</code>']);
                            }
                            
                            //if it's a new question, save into db
                            else{
                                $sql = "INSERT INTO chatbot(question, answer)
                                        VALUES(:quest, :ans)";
                                $stm =$conn->prepare($sql);
                                $stm->bindParam(':quest', $question);
                                $stm->bindParam(':ans', $ans);

                                $saved = $stm->execute();
                                if ($saved){

                                    echo json_encode(['status'=>1, 'answer'=>'Thanks for helping me learn']);
                                }
                                else {
                                    echo json_encode(['status'=>3, 'response'=>'Opps could not understand because of my small brain, please kinly repeat']);
                                }
                            }
                    }
                    else{
                          echo json_encode(['status'=>3, 'response'=>'Opps, Invalid training format']);
                        }
                
                
                }        
                    else{
                    echo json_encode(['status'=>3, 'response'=>'Oops you are not authorized to train me']);
                }
           }
           else {
                    
                $sql = "SELECT * FROM chatbot WHERE `question` LIKE '%$q%'";
                $stm = $conn->query($sql);
                $stm->setFetchMode(PDO::FETCH_ASSOC);

                $result = $stm->fetchAll();
                if ($result) {
                    
                    $answer_index = rand(0, (count($result)-1));
                        $answer = $result[$answer_index]['answer'];

                        echo json_encode(['status'=>1, 'answer'=>$answer]);
                }
                else{
                    echo json_encode(['status'=>2]);//status=2 means, question does not exist
                }
        }
        
    }else{

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="ha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<style>
		body {
			background-color: ghostwhite;
			font-weight: normal;
			font-family: sans-serif;
		}
		.con {
			width: 90%;
			margin: 0 auto;
		}
		div img {
			width: 200px;
			float: left;
			margin-right: 5px;
		}
		.sum {
			background-color: lightgray;
			height: 226px;
			width: 78%;
			float: left;
			text-align: center;
			padding: 10px;
		}
		.cols {
			float: left;
			text-align: center;
			padding: 10px;
			margin-left: 70px;
			margin-top: 20px;
		}
		h3 {
			font-style: italic;
			font-size: 14px;
			margin: o auto
			}
		.clear {
			clear: both;
		}
		.footer {
			text-align: center;
			margin-top: 30px;
		}
		.top {
			margin-top: 50px;
		}
		.bot {
			position: fixed;
			bottom: 2%;
			right: 8%;
			width: 350px;
			display: block;
		}
		.chat {
			display: block;
			background-color: blue;
			color: #fff;
			text-align: center;
			padding: 10px 0;
		}
		.col-lg-4 {
    	-ms-flex: 0 0 33.333333%;
    	flex: 0 0 33.333333%;
    	max-width: 33.333333%;
    	}
    	  .col-sm {
    		-ms-flex-preferred-size: 0;
    		flex-basis: 0;
    		-ms-flex-positive: 1;
    		flex-grow: 1;
    		max-width: 100%;
  		}
  		.row {
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			margin-right: -15px;
  		}
  		.card-header {
  			padding: 0.75rem 1.25rem;
  			margin-bottom: 0;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-bottom: 1px solid rgba(0, 0, 0, 0.125);
		}
		.top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative; 
            overflow: hidden;
        }
        .col-md-8 {
    		-ms-flex: 0 0 66.666667%;
    		flex: 0 0 66.666667%;
    		max-width: 66.666667%;
  		}
  		.col-md-10 {
    		-ms-flex: 0 0 83.333333%;
    		flex: 0 0 83.333333%;
    		max-width: 83.333333%;
  		}
  		.col-md-2 {
    		-ms-flex: 0 0 16.666667%;
    		flex: 0 0 16.666667%;
    		max-width: 16.666667%;
  		}
        .msg_container_base {
            background: #e5e5e5;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px 10px;
            max-height: 350px;
            overflow-x: hidden;
        }
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
            
        }
        .base_receive>.avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }
        .base_sent>.avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close } .msg_sent > time{
            float: right;
        }
        .card-body {
  			-ms-flex: 1 1 auto;
  			flex: 1 1 auto;
  			padding: 1.25rem;
		}
		.messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        .msg_receive {
            padding-left: 0;
            margin-left: 0;
            background: #666 !important;
            color: #FFF;
        }
        
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }
        
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        
        .messages>p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
            overflow-wrap: break-word;
        }
        
        .messages>time {
            font-size: 11px;
            color: #ccc;
        }
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }
        .card-footer {
  			padding: 0.75rem 1.25rem;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-top: 1px solid rgba(0, 0, 0, 0.125);
		}

		.card-footer:last-child {
  			border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
		}
		.input-group {
  			position: relative;
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			-ms-flex-align: stretch;
  			align-items: stretch;
  			width: 100%;
		}
		.input-group-prepend,
		.input-group-append {
  			display: -ms-flexbox;
  			display: flex;
		}
		.input-group-prepend .btn,
		.input-group-append .btn {
  			position: relative;
  			z-index: 2;
		}
		.input-group-append {
  			margin-left: -1px;
		}
		.mb-3,
		.my-3 {
  			margin-bottom: 1rem !important;
		}
		.btn {
  			display: inline-block;
  			font-weight: 400;
  			text-align: center;
  			white-space: nowrap;
  			vertical-align: middle;
  			-webkit-user-select: none;
  			-moz-user-select: none;
  			-ms-user-select: none;
  			user-select: none;
  			border: 1px solid transparent;
  			padding: 0.375rem 0.75rem;
  			font-size: 1rem;
  			line-height: 1.5;
  			border-radius: 0.25rem;
  			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			}
			.btn-primary {
  				color: #fff;
  				background-color: #007bff;
  				border-color: #007bff;
			}
			.btn-sm, .btn-group-sm > .btn {
  				padding: 0.25rem 0.5rem;
  				font-size: 0.875rem;
  				line-height: 1.5;
  				border-radius: 0.2rem;
			}
			.chat-window .card{
            	width: 100%;
         		margin: 0 auto; 
        	}
        	.chat-window.col-xs-12 {
            	left: 10px;
        	} 
        	.chat-window>div>.panel {
            	border-radius: 5px 5px 0 0;
        	}
	</style>
</head>
<body>
	<div class="top clear"></div>
	<div class="con clear">
		<div class="img">
			<img src= "http://res.cloudinary.com/intellitech/image/upload/v1523779243/admiral.jpg" alt="Admiral">
		</div>
		<div class="sum">
    		<h1>Hi Guys!</h1>
    		<p>This is a summary of my profile and my skills</p>
  		</div>
  		<div class = "cols">
			<h2> PROFILE</h2>
			<h3>My Name is Bright Robert</h4>
		</div>
		<div class = "cols">
			<h2> SKILLS</h2>
			<h3> Software Development, System Engr, Network Admin</h3>
		</div>
		<div class = "cols" >
			<h2> CONTACT </h2>
			<h3> Slack: @admiral </h3>
		</div>
		<div class="clear"></div>
			<div class="bot col-lg-4">
				<img src="">
                <div class="row chat-window" id="chat_window_1">
                    <div class="card">
                        <div class="row card-header top-bar">
                            <div>
                                <h3>Bot Chat</h3>   
                            </div>
                        </div>
                            <div class="card-body  msg_container_base">
                        		<div class="row msg_container base_sent">
                                    <div class="col-md-10">
                                        <div class="messages msg_sent">
                                            <p><code>Hello, I am a bot, I am smart but you can make me smarter, I am always willing to learn</code></p>
                                        </div>
                                    </div>
                        			<div class="col-md-2"></div>
                                </div>
                            	<div class="row msg_container base_sent">
                                <div class="col-md-10">
                                    <div class="messages msg_sent">
                                        <p><code>To teach me, package your lesson in the format below</code></p>
                                        <p><code>train:your question#your answer#password</code></p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            	</div>
                            </div>   <!-- message form -->
                            <div class="card-footer message-div">
                                <form action="" id="chat-form" method="post">
                                    <div class="input-group mb-3">
                                        <input class="form-control message chat_input" name="chat_message" aria-label="With input" placeholder="Let's Chat  Now...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-sm send-message" id="btn-chat"><i class="fa fa-send-o"></i></button> 
                                        </div>
                                    </div>
                                </form>
                        	</div>
                    </div>
                </div>
            </div>
		<div class="footer">
			<footer class="socials">
                <i class="fab fa-github-square fa-2x"></i>
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-twitter-square fa-2x"></i>
                <i class="fab fa-linkedin fa-2x"></i>
            </footer>
		</div>
		                    <script>
                        $('document').ready(function() {

                            $("body").css("opacity", 0).animate({ opacity: 1}, 3000);


                            $('#chat-form').submit(function(e) {
                                e.preventDefault();
                            
                                var message = $('.message').val();
                                var msg_container = $('.msg_container_base');

                                let bot_msg =  (answer)=>{

                                            return   '<div class="row msg_container base_sent">'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_sent">'+
                                                                    '<p>'+answer+'</p>'+
                                                                '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-2 col-xs-2 avatar">'+
                                                                '<img src="" class="bot-img img-responsive" title="">'+
                                                            '</div>'+
                                                        '</div>';
                                }

                            let sent_msg =    (msg)=>{

                                              return   '<div class="row msg_container base_receive">'+
                                                            '<div class="col-md-2 col-xs-2 avatar"></div>'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_receive">'+
                                                                    '<p>'+msg+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>';
                            }
                                       
                                       if (message != ''){

                                           if (message.split(':')[0] !='train')
                                            msg_container.append(sent_msg(message));
                                             msg_container.scrollTop(msg_container[0].scrollHeight);
                                       }
                                        // msg_container.append(bot_msg);
                                       
                                        
                                $('.message-div').removeClass('has-danger')

                               

                                // alert(message);
                                $.ajax({
                                    type: 'POST',
                                    url: '/profiles/oriechinedu.php',
                                    dataType: 'json',
                                    data: {chat_message: message},
                                    success: function(data) {
                                        //console.log(data);
                                        if (data.status===1){

                                           $('.message').val('');
                                             msg_container.append(bot_msg(data.answer));  
                                             msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===2){
                                            $('.message').val('');
                                            msg_container.append(bot_msg('Oga I no know this one, abeg try again'));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===0){
                                            msg_container.append(bot_msg('Opps what do you really expect from me with empty question?'))
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===3){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===4){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===5){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
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

                            $(document).on('click', '.card-header span.icon_minim', function(e) {
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
                            $(document).on('click', '.icon_close', function(e) { //$(this).parent().parent().parent().parent().remove();
                                $("#chat_window_1").remove();
                            });
                });

                    </script>
    </body>
</html>
<?php 
	}
?>
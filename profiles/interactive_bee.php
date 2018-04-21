<?php
require_once '../../config.php';
   try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
       $sql = 'SELECT * FROM secret_word';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q->fetch();

       $result2 = $conn->query("Select * from interns_data where username='interactive_bee'");
       $user = $result2->fetch(PDO::FETCH_OBJ);    
   } catch (PDOException $e) {
       throw $e;
   }
   $secret_word = $data['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Rhodium+Libre" rel="stylesheet">
    <title>Blessing Akpan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
		.panel-body{
            background: #ccc;
        }
        .panel-heading h5{
            display: inline;
        }
        .pan{
            margin-top: 20px;
        }
        .box1{
            padding: 5px 7px;
            color: #fff;
            margin-left: 15px;
            margin-bottom: 10px;
            border-radius: 25px;
            background: linear-gradient(-85deg, #d9edf7, #9d9d9d);
        }
        .box2{
            padding: 5px 7px;
            color: #fff;
            margin-right: 15px;
            margin-bottom: 10px;
            border-radius: 25px;
            background: linear-gradient(-85deg, #a3c2a1, #2b0404);
        }
        .form-input{
            margin-top: 60px;
        }
	</style>
</head>
<style>
    body{
        font-family: 'Rhodium Libre', serif;
    }
    #head{
        background: blue;
        min-height: 400px;
        text-align:center;
    }
    img{
        border-radius:50%;
        background-color: beige;
        width:350px;
        height:300px;
        margin-top:3em;
    }
    h1{
        font-size: 2.5em;
        margin-bottom:0px;
        text-transform:uppercase;
    }
    #content{
        text-align:center;
    }
    p{
        margin:0px;
        font-size: 20px;
        font-weight: bold;
    }
    #chat-interface{
        height:300px;
        overflow: auto;
    }
</style>
<body>
    <div id="head">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="http://res.cloudinary.com/dlvlxep3r/image/upload/v1523715773/interactive_bee.jpg" alt="image">
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-default pan">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user"></span>
                            <h5>SMART CHAT-BOT</h5>
                        </div>
                        <div class="panel-body" id="chat-interface">
                        </div>
                            <!-- New Form for input-->
                            <form action="#" method="post" id="bot-interface">
                                <input type="text" name="question" id="question">
                                <input type="submit" value="submit">
                            </form>
                        
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>

    </div>
    <div id="content">
        <h1><?php echo $user->name; ?></h1>
        <p>Writer | Android Developer | HNG Intern</p>
        <p>Akwa Ibom, Nigeria</p>
    </div>
    <div>Social Media</div>
    <div id="socialicons">
    <div style="margin: 24px 0;">
        <a href="https://facebook.com/interactiveBee"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/interactive_bee"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/BeeAkpan"><i class="fa fa-github"></i></a>
         <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </div>
    <script>

    $(document).ready(function(){
		var questionForm = $('#bot-interface');
		questionForm.submit(function(e){
			e.preventDefault();
			var questionBox = $('#question');
			var question = questionBox.val();
			//display question in the message frame as a chat entry
			var messageFrame = $('#chat-interface');
			var chatToBeDisplayed = '<div class="row message">'+
						'<div class="col-md-1 2">'+
							'<p>User:</p>'+
						'</div>'+
						'<div class="col-md-8 2">'+
							'<p>'+question+'</p>'+
						'</div>'+
						
					'</div>';
			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			//send question to server
			$.ajax({
				url: "/profiles/interctive_bee.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
                    console.log(response);
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row message">'+
									'<div class="col-md-1 ">'+
										'<p>Bot:</p>'+
									'</div>'+
									'<div class="col-md-8 ">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row message">'+
									'<div class="col-md-1 ">'+
										'<p>Bot:</p>'+
									'</div>'+
									'<div class="col-md-8 ">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						$("#chats").scrollTop($("#chats")[0].scrollHeight);
					}
				},
				error: function(error){
					console.log(error);
				}
			})
		});
	});
</script>


</body>
</html>

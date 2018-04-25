
   
    <?php
        
    require_once 'db.php';
   

    try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();
  
    $sql_query = 'SELECT * FROM interns_data WHERE username="Charlespossible"';
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }


  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
    ?>

          
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Charlesposible Profile</title>
    <style type="text/css">

    body{
        background-color: #fff;
        margin: 0px;
    }

    .nav-page{
                float: center;
            }
        li {
            margin-right: 60px;
            font-weight: bold;
        }
        .my-pic{
            margin-left: 40%;
            height: 300px;
            border-radius: 50%;
        }
        .img-background{
            background-color:#ADFF2F;
        }
        h3{
            font-size:1.3em;
            font-weight: normal;
            text-align: center;
            margin-top: 30px;
            color: grey;


        }
      
        .head-text{
            font-family: sans-serif;
            font-style: italic;
            text-decoration: underline;
            color: grey;
            font-size: 1.2em;
            margin-left: 40%; 
            margin-top: 30px;
        }
        .para-text{
            border:0px;
            text-align: center;
        }
        .para{
            font-family: sans-serif;
            font-style: italic;
            color: grey;
            margin-top: 30px;
            margin-left: 30px
            font-size: 1.2em;
            font-weight: bold;
            text-align: justify;
        }

        .footer {
            position: fixed;
            width: 100%;
            background-color: grey ;
            color: white;
            text-align: center;
} 

    </style>
        

 
    
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light  nav-page">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Portforlio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
</header>

    <div class="img-background">
        <img src= "<?php echo $image_url ?>" alt="My Profile Picture" class="my-pic">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><b>Name:</b>  <em><?php echo $username ?></em></h3>
            </div>
            
        </div>
            
    </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="head-text">Formal Introduction</h4>
                </div>
            </div>
            <div class="row">
                <div class="para-text">
                    <p class="para">Hi, My name is Mbadugha Charles. I am a web developer based in Lagos. I am very comfortable with HTML , CSS, Javascript and  PHP. I am a life long learner so improviment is assured.</p>
                    <p class="para">I also get my hands dirty with Laravel and codeigniter. Curently and i am brushing up on React and Nodejs. I am an avid learner and a pro-active doer.</p>
                    <p class="para"> I am a very good cook. So when not coding, I cook. I mix ingredients to produce delicious taste exactly the way i mix codes to produce quality websites.</p>
                </div>
            </div>
        </div>
    
        
    

     <div class="container footer">
        <div class="row">
            <div>
             <p>Copyright &copy; HNG FUN
            <?php echo date("Y"); ?>
             </p>   
            </div>
        </div>
        
    </div>
    
   
   
</body>

</html>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(isset($_POST['message']) && $_POST['message'] != "")
	{
		$letsTalk = $_POST['message'];
	
		$training = stripos($letsTalk, "train:");
		$about_Bot = stripos($letsTalk, "botDetails");
        $find_say = strpos($question, "say:");
		
		if($training !== false){
			$myString = trim($letsTalk);
			$split_string = explode("#", $myString);
			$newQuestion = mysqli_real_escape_string($connect, ltrim($split_string[0], "train: "));
			$newAnswer = mysqli_real_escape_string($connect, $split_string[1]);
			
			$trainBot = mysqli_query($connect, "INSERT INTO chatbot (id, question, answer) VALUES(0, '$newQuestion', '$newAnswer')");
			if($trainBot){
				echo json_encode(['posit' => 1, 'info' => "Thanks for your mentorship. Am gratefull!"]);
			}else{
				echo json_encode(['posit' => 0, 'info' => "It appears all is not well."]);
			}
		}
		elseif($botDetails !== false){
			echo json_encode(['posit' => 1, 'info' => "Chatbot 0.1 By Mbadugha charles"]);
		}
		
	

		else{
			
			$check1 = stripos($letsTalk, "{{");
			
			if($check1 !== false){
				$check0 = stripos($letsTalk, "}}");
				
				$myMethod = substr($letsTalk, $check1+2, $check0 - $check1-2);
				
				if(stripos($myMethod, " ") !== false){
					echo json_encode(['posit' => 0, 'info' => "Please ensure there is space in your messages"]);	
				}
				elseif(!function_exists($myMethod)){
					echo json_encode(['posit' => 0, 'info' => "That appears to be beyond my capacity at the moment"]);
				}
                
                elseif($find_say !== false){
			$words = trim($question, "say:");
			echo json_encode(['posit' => 'say', 'info' => $words]);
		}
				else{
					$method_active = $myMethod();
					echo json_encode(['posit' => 0, 'info' => "The reply is " . $method_active]);
				}
			}
			else{
				$cleanUp = mysqli_real_escape_string($connect, trim($letsTalk));
				$myAnswer = mysqli_query($connect, "SELECT * FROM chatbot WHERE question LIKE '%$cleanUp%' ORDER BY RAND()");
				if($myAnswer){
					if($rows = mysqli_num_rows($myAnswer) > 0){
						$result = mysqli_fetch_assoc($myAnswer);
						$answer = $result['answer'];
					
						echo json_encode(['posit' => 1, 'info' => $answer]);
					}
					else{
						echo json_encode(['posit' => 1, 'info' => "Assuming you train me, I will do better"]);
					}
				}
				else{
					json_encode(['posit' => 0, 'info' => " something has gone wrong wrong"]);
				}
			}
		}
	}
}
?>

<?php if($_SERVER['REQUEST_METHOD'] === 'GET'){ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>My page</title>
		<style type="text/css">
            
			body{
					background: #ddd;
					font-family: 'arial';
				}
				
				
				
				.myContainer{
					position: fixed;
					right: 5px;
					bottom: 0;
					height: 400px;
					width: 300px;
					border: 3px dashed #ddd;
					background: #fff;
					box-model: border-box;
				}
				.myRow-head{
                			background: #007bff !important;
					padding: 5px;
               				color: #fff;
           			 }
				.myContainer > .myRow{
					
				}
				.myContainer > .myRow >{
					background: #00ff14;
					padding: 5px;
					color: #fff;
				}
				.myContainer > .myRow > .minimize{
					position: absolute;
					right: 5px;
				}
				.myRow-body {
					padding: 5px;
					height: 300px;
					overflow: auto;
				}
				.myRow-body > .design {
					display: block;
					font-size: 14px;
					border-radius: 4px;
					width: 80%;
					padding: 5px;
					margin-bottom: 5px;
				}
				.myRow-body > .design > .name{
					display: block;
					font-weight: bold;
					font-size: 15px;
				}
				.myRow-body > .sender{
					background: #e3de57;
					float: right;
                    border-radius: 30px;
				}
				.myRow-body > .reciever{
					background: #aaffeb;
					float: left;
                    border-radius: 30px;
				}
				
				.myRow > form{
					width: 100%;
					margin: 5px;
				}
				.myRow > form > textarea{
					width: 290px;
				}
		</style>
	</head>
	
	<body>
		
		
		<div class="myContainer">
			<div class="myRow">
				<div class="myRow-head">Talk To Me
					<span class="minimize fa fa-remove"></span>
				</div>
				<div class="myRow-body">
					<span class="design reciever">
						<span class="name">Dubem</span>
						I am your friend. Ask me anthing.
					</span>
				</div>
				<form action="#" method="POST" onSubmit="chatBot(); return false;">
					<input id="message" type="text" name="chats" placeholder="Ask me anything">
                    <button type="button" value="Lets Talk" class=" btn btn-primary"></button>
				</form>
			</div>
		</div>
		<script src="../HNGFun/vendor/jquery/jquery.min.js"></script>
		<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
		<script type="text/javascript">
			function chatBot(){
				let botMessage = $('#message').val();
				if(botMessage == ''){
					$('.myRow-body').append('<span class="design reciever"><span class="name">Bot</span>Common! Don\'t hide your feelings from me</span>');
					$(".myRow-body").scrollTop($(".myRow-body")[0].scrollHeight);
					return false;
				}
				else{
					$('.myRow-body').append('<span class="design sender"><span class="name">User</span>' + botMessage + '</span>');
					$('#message').val('');
					
					$.ajax({
						url: "profiles/Charlespossible.php",
						type: "POST",
						data: {message: botMessage},
						dataType: "json",
						success: function(response){ //alert(response);
							if(response.posit === "say")
							{
								$('.myRow-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.info + '</span>');
								$(".myRow-body").scrollTop($(".myRow-body")[0].scrollHeight);
								responsiveVoice.speak(response.info, 'UK English Male');
								return false;
							}
							else if(response.posit === 1){
								$('.myRow-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.info + '</span>');
								$(".myRow-body").scrollTop($(".myRow-body")[0].scrollHeight);
								return false;
							}
							else{
								$('.myRow-body').append('<span class="design reciever"><span class="name">Bot</span>' + response.info + '</span>');
								$(".myRow-body").scrollTop($(".myRow-body")[0].scrollHeight);
								return false;
							}
						}
					});
				}
			}
		</script>
	</body>
</html>
<?php } ?>




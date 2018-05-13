<!doctype html>
<html>
    <head>
    <title>HNG INTERNSHIP #1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  
<?php 
	if(defined('DB_USER') === false){
		try {
			require "../../config.php";
			global $conn;	
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}
        
        $result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'Fotes'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$conn = new PDO("mysql:host=". DB_HOST. "; dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			$question = trim($_POST['question']);
			
			//check whether in question mode
			$in_training_mode = stripos($question, "train:");
			
			if($in_training_mode === false){
				get_answer($question);
			}
			else{
				train_chatbot($question);
			}
			
			
		
}


	function get_answer($question){
		global $conn;
				$sql = "SELECT * FROM `chatbot` WHERE question = :question order by rand() limit 1";
				$statement = $conn->prepare($sql);
				$question = preg_replace('([?.])', '', trim($question));
				$question = preg_replace('([\s]+)', ' ', trim($question));
				$statement->bindParam(':question', $question);
				$statement->execute();
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				$results = $statement->fetchAll();

        
        if(count($results) ==0){
					echo "Apparently, I need training<br>Train me";
				
        }else{
					$q_and_a = $results[0];
					
					$answer = $q_and_a['answer'];
					
					echo $answer;
            
            }
				}
			
        
			
			
			function train_chatbot($question){
				global $conn;
				$qanda = substr($question, 6);
				$arr = explode('#', $qanda);
				
				if(count($arr) <2 ){
					echo "Invalid training data format";
				}else{
					$ques = trim($arr[0]);
					$ans = trim($arr[1]);
					
					if(count($arr) === 2){
						echo "Password is required";
						return;
					}
					$password = trim($arr[2]);
					
					$training_password = "password";
					if($password !== $training_password){
						echo "Incorrect password";
					}else{
						$sql = "insert into chatbot(question, answer) values(:ques, :ans)";
						$statement = $conn->prepare($sql);
						$ques = preg_replace('([?.])', '', trim($ques));
						$ques = preg_replace('([\s]+)', ' ', trim($ques));
						$statement->bindParam(':ques', $ques);
						$statement->bindParam(':ans', $ans);
						$statement->execute();
						
						echo "Thanks, I know something new";
					}
				}
			}		
	?>
	
	<?php 
	
	if($_SERVER['REQUEST_METHOD'] === "GET"){
			
		?>
		<style>
		body{
background-image: url('https://res.cloudinary.com/tolueek/image/upload/v1523743200/mac.jpg');

    padding: 0px;
}
h1{
font-family: Cursive ;
font-size: 85px;
text-align: center;

}
h3{
	color:white;
font-family: Cursive ;
font-size: 50px;
text-align: center;	
}
h2{
	color:white;
	font-family: forte ;
font-size: 50px;
text-align: center;	
padding-top:40px;
}

h1{
	animation: blink 1s 1s ease-in-out forwards infinite;
}
@keyframes blink {
	0% {
		color: #802D72;
		opacity: 1;
	}
	100% {
		color: transparent;
		opacity: 0;
	}
}
h4{
	animation: blink 1s 1s ease-in-out forwards infinite;
   
}
@keyframes blink {
	0% {
		color: #802D72;
		opacity: 1;
	}
	100% {
		color: transparent;
		opacity: 0;
	}
}
.time{
	color:white;
	padding-top: 0px;
    font-size: 50px;
    font-family: cursive;
    color: balck;
	text-align: center;

}
img{
			width: 15rem;
			height: 15rem;
			border-radius: 50%;
			float: right;
		 }
		 #answer{
			 color:darkmagenta;
             float:right;
		 }
            .accordion {
    background-color: darkmagenta;
    color: white;
    cursor: pointer;
    width:50%;
    text-align: left;
    font-size:15px;
	font-family:sans;	    
    border: none;
    outline: none;
    transition: 0.4s;
        
}
            .panel{
                overflow-x:hidden;
                overflow-y:scroll;
				
				
            }
            .panel::-webkit:scrollbar{width:5px;
                
                
            }
            .button {
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: darkmagenta;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: darkmagenta}

.button:active {
  background-color: darkmagenta;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
            .panel{
                width:70%;
            }

</body>
</html>

			
			</style>
    </head>
	<body>
	<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
<h2>Welcome to</h2>
<h1>HNG Internship 4.0</h1>
  <img src="<?php echo $user->image_filename ?>" />
        

		<section class= "col-md-6 chat-frame" >

		

             <div class="row">
                 <button class="accordion">HELLO WORLD!!!</button>
<div class="panel">
    <p style= color:darkmagenta;> <h4> I'm Fotes_Bot:Ask me anything!!!</h4><br>

    <p>You can also teach me answers to questions I do not know, by training me.<br>

Training format:<br>
<code>
train: question # answer # password<br>
</code>
</p>
    	<form id="form">

              <p id="answer"></p>
			<input type="text" id="questionfield" placeholder="Chat Here">
			<button class="button">CHAT</button><br>
			
            
		</form>
 

</div>
            
            
             </div>		
          
            </section>	

		
			</div>
		</div>
	<div>

		
		
<h3>I am <?php echo $user->name ?> <small>(@<?php echo $user->username ?>)</small></h3>

         
 <div class="time">
 <?php date_default_timezone_set("Africa/Lagos");
   echo 'The future is now_'  . date("h:i:sa") ;
   ?> 
</div>

   </div>
</div>
		
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			
			$(document).ready(function(){
				var form = jQuery('#form');
				form.submit(function(event){
					event.preventDefault();
					var quest = $('#questionfield').val();
					
					$.ajax({
						url: "../profiles/Fotes.php",
						type: "post",
						data: {'question' : quest},
						success: function(response){
							console.log(response);
							var oldValue = $('#answer').html();
							$('#answer').html(oldValue+"<br>"+response);
						}
					})
				});
			});
		</script>
        
	</body>
	</html>
	<?php
	}
	?>

<link rel = "stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<style>
body{background:#ced7df;
}
.head {color: #4eacff;
		font-size: 4.5em;
		text-transform: none;
		text-decoration: none;
		overflow: hidden;
	}


	
.head:hover {
	color: #fff;
  text-transform: none;
  text-decoration: none;
}
.link--head::after {
	content: '';
	position: absolute;
	top: 0;
	right: 0;
	z-index: -1;
	background: #242424;
	-webkit-transform: translate3d(101%,0,0);
	transform: translate3d(101%,0,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.link--head:hover::after {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

ul {
    list-style-type: none;
    margin: 0;
    padding:30px 0px 30px 0px;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    font-size: 20px;
    color: #000;
    padding: 10px;
    text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
    text-decoration: none;
}
.pull-left{float: left;}
.pull-right{float: right;
			padding-right: 150px;}
.about {
  background:#76b852;
  padding: 80px 0;
}
.chatarea{
		border:1px solid green;
		background-color: grey;
}
.clear{clear:both;}
h3{font-size: 25px; text-align: center;;}
</style>


<?php
//	require '../db.php';

?>
<?php
	$result = $conn->query("SELECT * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ, PDO::ERRMODE_EXCEPTION);
	$secret_word = $result->secret_word;
	$result2 = $conn->query("SELECT * from interns_data where username = 'epospiky'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
?>



<!-- for chatbot-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require "../answers.php";
  date_default_timezone_set("Africa/Lagos");
  try{
    if(!isset($_POST['question'])){
      echo json_encode([
        'status' => 1,
        'answer' => "Please enter a question"
      ]);
      return;
    }
  
    $question = $_POST['question'];
    
    // return help manual
    
    //check if in training mode
    $index_of_train = stripos($question, "train:");
    if($index_of_train === false){//then in question mode
      $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
      $question = preg_replace("([?.])", "", $question); //remove ? and .
  
      //check if answer already exists in database
      $question = "%$question%";
      $sql = "select * from chatbot where question like :question";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':question', $question);
      $stmt->execute();
  
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rows = $stmt->fetchAll();
      if(count($rows)>0){
        $index = rand(0, count($rows)-1);
        $row = $rows[$index];
        $answer = $row['answer'];	
  
        //check if the answer is to call a function
        $index_of_parentheses = stripos($answer, "((");
        if($index_of_parentheses === false){ //then the answer is not to call a function
          echo json_encode([
            'status' => 1,
            'answer' => $answer
          ]);
        }else{//otherwise call a function. but get the function name first
          $index_of_parentheses_closing = stripos($answer, "))");
          if($index_of_parentheses_closing !== false){
            $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
            $function_name = trim($function_name);
            if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
              echo json_encode([
                'status' => 0,
                'answer' => "The function name should not contain white spaces"
              ]);
              return;
            }
            if(!function_exists($function_name)){
              echo json_encode([
                'status' => 0,
                'answer' => "I am sorry but I could not find that function"
              ]);
            }else{
              echo json_encode([
                'status' => 1,
                'answer' => str_replace("(($function_name))", $function_name(), $answer)
              ]);
            }
            return;
          }
        }
      }else{
        echo json_encode([
          'status' => 0,
          'answer' => "I am afraid, I cannot provide answer to that question. I may need further training. Below is the training format <br> <b>train: question # answer # password</b>"
        ]);
      }		
      return;
    }else{
      //in training mode
      //get the question and answer
      $question_and_answer_string = substr($question, 6);
      //remove excess white space in $question_and_answer_string
      $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
      
      $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
      $split_string = explode("#", $question_and_answer_string);
      if(count($split_string) == 1){
        echo json_encode([
          'status' => 0,
          'answer' => "Invalid training format. I cannot decipher the answer part of the question \n
                      Please review the training format: question # answer # password"
        ]);
        return;
      }
      $que = trim($split_string[0]);
      $ans = trim($split_string[1]);
  
      if(count($split_string) < 3){
        echo json_encode([
          'status' => 0,
          'answer' => "You need to enter the training password to train me."
        ]);
        return;
      }
  
      $password = trim($split_string[2]);
      //verify if training password is correct
      define('TRAINING_PASSWORD', 'trainpwforhng');
      if($password !== TRAINING_PASSWORD){
        echo json_encode([
          'status' => 0,
          'answer' => "I am sorry. You are not authorized to train me"
        ]);
        return;
      }
  
      //insert into database
      $sql = "insert into chatbot (question, answer) values (:question, :answer)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':question', $que);
      $stmt->bindParam(':answer', $ans);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo json_encode([
        'status' => 1,
        'answer' => "Wow! I've learnt something today. Thanks alot for your help"
      ]);
      return;
    }
  
    echo json_encode([
      'status' => 0,
      'answer' => "Sorry, i don't understand you. I could use your training"
    ]);  
  } catch (Exception $e){
    return $e->message ;
  }
  
} else {
?>

<div class="row container">
	<div class="row col-md-12 ">
   <div>
       <a class="head" href="#home"><span data-letters=""><?php echo $user->name ?></span></a>
    </div>
	<div class="col-md-6">
	
						<div class="">
						
							<nav class="">
								<ul class="">
									<li><a class="scroll" href="#home">Home</a></li>
									<li><a class="scroll" href="#about">About</a></li>
									<li><a class="scroll" href="#portfolio">Portfolio</a></li>
									<li><a class="scroll" href="#services">Services</a></li>
									<li><a class="scroll" href="#contact">Contact</a></li>
								</ul>
							</nav>
						

				</div>
     </div>   

<div class="col-md-4 col-md-offset-2"> <img src="http://res.cloudinary.com/epospiky/image/upload/v1523739075/epo.png" class="img-responsive" height="400px"/></div>
</div>
	<div id = "about" class="about">
		<div class="about-info">
				<h3>ABOUT</h3>
				<h4>Who I am and why I design</h4>
				<p>I am Ernest Paul but i am porpularly known as epopsiky. I am a web designer. 
					I design because of my passion for designing. Since my kiddies time i've 
					always had a flare for designing and thus i started implementing it.</p>
		</div>
		<div class="about-grids">
		   	<div class="col-md-6 about-grid">
		   		<h4>What I do and my experience</h4>
		   		<p>I design. My long time in designing have given me lots of experiences and knowledge
		   			which i have implemented in some of my work.</p>
		   	</div>
		   	<div class="col-md-6 about-grid">
		   		<h4>My goals</h4>
		   		<p>My goal is to be the best designer ever. I Want to make great contribution to web design 
		   			per se and bridge the gap between imagination and reality. </p>
		   	</div>
		   	
		</div>   
	</div>

<div class="col-md-12 chatarea">	
 <div class="col-md-12">
            <div class="chat">
              <div class="msg you">
                  Hi there! I'm Derbie.
              </div>
             
            </div>
          </div>
          <div class="">
            <form class="form-inline" id="question-form">
              <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="question" placeholder="Chat with me ...">
              </div>
              <button type="submit" class="btn btn-primary mb-2" style="margin-left: 30px;"><i class="fa fa-send"></i></button>
            </form>
          </div>
</div>

            <script src="../vendor/jquery/jquery.min.js"></script>
  <script>
	$(document).ready(function(){
		let questionForm = $('#question-form');
		questionForm.submit(function(e){
			e.preventDefault();
			let questionBox = $('input[name=question]');
      let chatbox = $('.chat');
			let question = questionBox.val();
			//display question in the message frame as a chat entry
			let newMessage = `<div class="msg me">
                  ${question}
              </div>`;
			chatbox.html(`${chatbox.html()} ${newMessage}`);
      chatbox.scrollTop(chatbox[0].scrollHeight);
			//send question to server
			$.ajax({
				url: '/profiles/epospiky.php',
				type: 'POST',
				data: {question: question},
				dataType: 'json',
				success: (response) => { 
          let newMessage = `<div class="msg you">
                          ${response.answer}
                      </div>`;
          chatbox.html(`${chatbox.html()} ${newMessage}`);
          chatbox.scrollTop(chatbox[0].scrollHeight);
          questionBox.val('');						
				},
				error: (error) => {
          alert(' an error occured')
					console.log(error);
				}
			})
		});
	});
</script>
</div>
<?php 
   };
?>

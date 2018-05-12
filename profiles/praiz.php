<?php

$select = $conn->query("SELECT * FROM secret_word LIMIT 1");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$result= $select->fetch();
		$secret_word = $result['secret_word'];


$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'praiz'");
		$result2->setFetchMode(PDO::FETCH_ASSOC);
		$user = $result2->fetch();

// $query = "SELECT * FROM secret_word LIMIT 1";
// $result = mysqli_query($conn, $query);
// while($secret_word= mysqli_fetch_assoc($result))

// $query2= "SELECT * FROM interns_data WHERE username = 'praiz'";    
// $result2 = mysqli_query($conn, $query2);
// while ($user = mysqli_fetch_assoc($result2));
?>

<?php 

if(isset($_POST['chatspace'])){

   $chatspace = $_POST['chatspace'];
   $training = stripos($chatspace, 'Train:'); //check if it starts with train, NOT CASE SENSISTIVE


   //when Training the Chatbot
   if($training === true){
      $question_answer= substr($chatspace, 6);
      trim($question_answer);
      $split= explode("#", $question_answer);
         if(count($split)== 1){
            echo json_encode([
               'state' => 0,
               'response' => "Please train me in this format <br> Train: question # answer "
               ]);
            return;
         }
         if(count($split) < 3){
            echo json_encode([
               'state'=> 0,
               'response' => "please enter the training password"
               ]);
            return;
         }
      $question = trim($split[0]);
      $answer = trim($split[1]);
      $password = trim($split[2]);
      define('train_password', 'password');
      if($password !== 'train_password'){
         echo json_encode([
            'state' => 0,
            'response' => "please enter a valid password if you must train me!"
            ]);
         return;
      }
   $conn->query("INSERT INTO chatbot(question, answer) VALUES ('$question', '$answer' ");
   $sql2->setFetchMode(PDO::FETCH_ASSOC);
   $sql2->fetch();
   echo json_encode([
      'state' => 1,
      'response' => "**smiles, thank you for training me"
      ]);
   return;
   }
   //end of training 


   //if theyre asking  a question and not trying to train the  bot
   if($training === false){
            $conn->query("SELECT * FROM chatbot WHERE question LIKE '$chatspace'");
                  $select->setFetchMode(PDO::FETCH_ASSOC);
                  $output= $select->fetchAll();
      if(count($output)>0){
                     $displayy = rand(0, count($output)-1);
                     $row= $output[$displayy];
                     $ans = $row['answer'];
      //is this a call to a  function? 
                     $function_call = stripos($ans, "(("); //check if it starts with (( 

            if($function_call === true){
                        trim($function_call); 
                        $function_close = stripos($ans, "))");
               if($function_close === true){
                     $function_name = substr($ans, $function_call+2, $function_close-$function_call-2);
                     $function_name = trim($function_name);
                  if(stripos($function_name, ' ') !== false){ //it shouldnt contain empty spaces
                           echo json_encode([
                              'state' => 0,
                              'response' => "please type the name without white spaces"
                           ]);
                           return;
               }
                  if(!function_exists($function_name)){
                           echo json_encode([
                              'state' => 0,
                              'response' => "oops!! function doesnt exist"
                           ]);
                   }else{
                           echo json_encode([
                              'state' => 1,
                              'response' => str_replace("(($function_name))", $function_name(), $ans)
                           ]);
                  }   
            return;
            }

      }
      else{ //its not a call to a function
                  echo json_encode([
                     'state' => 1,
                     'response' => $ans
                     ]);
      }   }       
   } 
}


// if(substr($chatspace, 0,5==='train')){
//    $conn->query("INSERT INTO chatbot(question, answer) VALUES ($split[0], $split[1])");
//    $sql2->setFetchMode(PDO::FETCH_ASSOC);
//    $train = $sql2->fetch();
// }
?>


<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
   body{
      background-image: url(img/home-bg.jpg);
      background-position: 50% 50%;
   }
	#left-profile{
      position: left;
      width: 45%;
      margin-top: 45px;
      
   }
   #right-profile{
      position: absolute;
      float: right;
      top: 210px;  right: 15%;
      border: 7px dashed black;
      padding: 15px 15px 15px 15px;
      color: white; text-shadow: 3px 3px 5px black;
      overflow: auto; 
      height: 280px;
   }
   #header{
      color: black; text-shadow: 3px 3px 5px white;
   }
   .box{
      position: absolute;
      font-size: 15px;  
      color: black; text-shadow: 0.5px 0.5px 0.2px black;
      padding: 2px;

   }
   .ruby{
      float: left;      
      clear: right;   }
   .duby{     
      float: right;
      clear: left;    
   }
   .lighter{ 
      border-color:#dedede;
      background-color: #f1f1f1;
      margin-right: 20px;
   } 
   .darker{
      border-color: #ccc;
      background-color: #ddd;
      margin-left: 20px;
      display: inline-block;
   }
  
   .butt{
   position: absolute;

      float: right;
      top: 482px;  right: 17.789%;

      border: 7px dashed black;
      padding: 3px;
      font-size: 15px;
     
   }
   .avatar{
      
      border-radius: 50%;
   }
  
	</style>
</head>
<body>
<div id="left-profile">
<div id="header">
	<header><center>
		<img src=<?php echo $user['image_filename']?> alt="praiz profile picture">
		<p class="title">
			<?php echo "Hi, I'm ". $user['name']?> <br>
         <?php echo "Username: ". $user['username']?>
		</p>
		<p >A Tech Enthusiast, Budding Web Developer (Front-End, Back-End), Efficient Team Player, Designer and everything in betweeen</p>
		<p class="sub">Connect with me:</p>
	</header> </center>
</div>
<div id="social">
			<center>
				<a href="https://twitter.com/praiz_damilola?s=08" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://facebook.com/praisedamilola.adanlawo" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://github.com/praizz" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a href="https://www.linkedin.com/in/praiseadanlawo/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                     </span>
            </a></center>		        
		 </div>
</div>

<div id="right-profile"><center>
<form method="post" id="formm"> 
    <h5> HI, WELCOME TO MY CHATBOT</h5>
<!-- <input type="text" name="chatspace" placeholder=" Please ask me anything "> <br> -->
<!-- <input type="submit" value="Lets get started" style="color: blue;" name="submit"> -->
      <h6>Lets get started</h6>
   <div class="box" id="chats">    
      <div class="ruby">
         <div class="lighter"> <img src="avatar.png" class="avatar"> I'm Bottle the bot and its nice to meet you<br> What do i call you?</div>         
      </div>
      <div class="duby">
         <div class="darker"> My name is Dan <img src="avatar.png" class="avatar" style="margin-left: 5px; display: inline-block;"> </div>
      </div>  
      <div class="ruby">
         <div class="lighter"> <img src="avatar.png" class="avatar">Hi Dan</div></div>   
      </div>
      <!-- <div classAmongst others, im your Love specialist, allow me tell you your love status <br> type Love if you would like to test my intelligence. But if youre just as boring as my master, without a love life, type others and ill get you started -->
   </div> 
</div>
      <div class="butt"> <input type="text" name="chatspace"> 
      <button type="submit" id="button" name="submit" onclick="fun()">send</button></div>
</form>   
</center>
</div>
<script type="text/javascript">
   function fun(){
      alert("i have been clicked");
   }
</script>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


<script type="text/javascript">
$(document).ready(function(){
      var Form = $('#formm');
      Form.submit(function(e){
         e.preventDefault();
         var chatbox = $('input[name=chatspace]');
         var question = chatbox.val();

         var chatss = $('#chats');
         var display = '<div class="ruby">' + '<div class="lighter">' +'<img src="avatar.png" class="avatar" display: inline-block;">' + question +'</div>'+'</div>' ;

         chatss.html(chatss.html()+display);
         

   $('#button').click(function(){
      $.ajax ({
      url: "/profiles/praiz.php",
      type: "post",
      data: {chatspace: chatspace},
      dataType: "json",
      success: function(response){
            if(response.state == 1){
            var display = '<div class="duby">' + '<div class="darker">'+ response.response +'<img src="avatar.png" class="avatar" style="margin-left: 5px; display: inline-block;">' +'</div>'+'</div>' ;
            chatss.html(chatss.html()+display);
                     chatbox.val("");    
               }
               else if(response.state == 0){
                  var display = '<div class="duby">' + '<div class="darker">'+ response.response +'<img src="avatar.png" class="avatar" style="margin-left: 5px; display: inline-block;">' +'</div>'+'</div>' ;
                  chatss.html(chatss.html()+display);
               }
      },
      error: function(error){
               console.log(error);
            }
   })
})
</script>

</body>
</html>



<?php
<<<<<<< HEAD
include '../db.php';
include '../answers.php';
$sql = 'SELECT * FROM interns_data_ WHERE username="kingsley67"';
=======

include '../answers.php';
$sql = 'SELECT * FROM interns_data WHERE username="kingsley67"';

$sql = 'SELECT * FROM `interns_data` WHERE `username`="kingsley67"';

>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);  
    $result = $query->fetch();    

    $name = $result['name'];
    $user = $result['username'];
    $image = $result['image_filename'];

$sql2 = 'SELECT * FROM `secret_word`';
    $query = $conn->query($sql2);
    $query->setFetchMode(PDO::FETCH_ASSOC);  
    $result2 = $query->fetch(); 
$secret_word=$result2['secret_word'];



    if($_POST){
   
if($_POST['question']){
    
    
    
$text=$_POST['question'];
 $checktrain=strpos($text,'train:'); 
   if($checktrain ===false) {
       $checkBirthdate=strpos($text,"Birthdate:");
       
      if($checkBirthdate !==false){

    
          
      
 
if(isset($_POST['question'])){
    
   $text=$_POST['question']; 
    
    $birthDate= substr($text, 10);
    zodiac($birthDate);
     echo json_encode([
                  'question'=>$text,
                  'answers' => zodiac($birthDate)
                ]); 
 
 
   return;
} 
      
      
      }else if($_POST['question']=="aboutbot"){
          
          
          echo json_encode([
                  'question'=>$text,
                  'answers' => "<strong>RIM67</strong><br>Version 1.0.0 <br>build 2<br>Platforms: Windows, Linux"
                ]); 
 
 
   return;  
               
      } else{

 $sql3="SELECT * FROM chatbot where question='$text ' LIMIT 1";
 $query = $conn->query($sql3);
    $query->setFetchMode(PDO::FETCH_ASSOC);  
    $result3 = $query->fetch(); 
 $ans=$result3['answers'];
        
   
     if (isset($ans)) {
                echo json_encode([
                  'question' => $text,
                  'answers' => $ans
                ]);
         return;
 
  }else
     {$error="I couldn't find an answer to your question, please train me with that using the command <br>train:Your-Question#Your-Answer#Password";}
          if ($error!=""){
        echo json_encode([
                  'question' => $text,
                  'answers' => $error
                ]);
       return;       
    }
       
      }
   
}else {
       $tex=$_POST['question'];
  
      $rmtrain= substr($tex, 6);
        $rmspace = preg_replace('([\s]+)', ' ', trim($rmtrain));
      
        $extrain = explode("#", $rmspace,3); 
             
     
    
       
    if(count($extrain)==3){
         $question=trim($extrain[0]);
     $answer=trim($extrain[1]);
        $password=trim($extrain[2]);
      
 
        if($password=="trainpwforhng"){
         
            try {
<<<<<<< HEAD
    $sql3 = "INSERT INTO  `chatbot` (`question`, `answer`) VALUES ('". $question ."','". $answer ."')";
=======
    $sql3 = "INSERT INTO  `chatbot` (`question`, `answer`) VALUES ('" . $question . "','" . $answerm . "')";
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
    $query = $conn->query($sql3);
} catch(PDOException $e) {
    echo $e->getMessage();
}
     
            echo json_encode([
                  'question' => $answer,
                  'answers'=>"<strong>Your data was saved successfully</strong>"
                ]);
                
             return;
            }
        else{
             
       echo json_encode([
                  'question' => $tex,
                  'answers'=>"<strong>You inserted a wrong password<br>Note</stong>The password is:<strong>trainpwforhng</strong>"
                ]);
                 
             return;
       
    
       
        }
       
       
       
    }else {
        
         echo json_encode([
                  'question' => $tex,
                  'answers'=>"Your training has not been considered,please verify your training is in the following format:<br><strong>train:Your_question#Your_Answer#Password<br>Note:</strong>The password is:<strong>trainpwforhng</strong>"
             
                ]);
                 return;
      
    }
       
  
    }
    }
    }


?>


    
    
  



<!DOCTYPE>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    img{   
     width:250px;
    height:250px
    }
    .intro{
<<<<<<< HEAD
        background-color: #E8EEEF;
=======
        background-color: darkblue;
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
      
        text-align: center;
    }
   
<<<<<<< HEAD
    h3{background-color: #2A88AD;
    width:250px;
    margin: 20px 210px;
  }
=======
    h3{background-color: coral;
    width:250px}
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
   
    p{color:black}
    h1{color: #327CA7;
    text-align: center}
    #credentials{  color:white;}
<<<<<<< HEAD
   
=======
    p,li{
        color:white
    }
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
    
    #chatoutput{
        height: 500px;
        border:black solid 1px;
        width: 530px;
        overflow: scroll;
<<<<<<< HEAD
         border-radius: 10px;
=======
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
    }
    #chatinput{
        width: 450px;
        height: 80PX;
<<<<<<< HEAD
        border-radius: 10px;
        margin: 0px 5px;
=======
        
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
    }
    
    
    #rim{
<<<<<<< HEAD
        padding-left:50px;
        
    }
  
    
    
    .you{
        background-color:#E8EEEF;
=======
        padding-left:50px
    }
    #chatsend{
        height: 70px
    }
    
    .you{
        background-color:lawngreen;
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
        width:500px;
        padding-left: 390px;
        border: 1px solid black;
       
        overflow-wrap: break-word;
    }
    .bot{
<<<<<<< HEAD
        background-color:#109177;
        width:500px;
       
         overflow-wrap: break-word;
    
        
    }
    #chatbot{
        background-color: #F4F7F8;
       display: none;
    }
    #chathead{
        background-color: #E8EEEF;
        padding: -10px 0px;
        margin:0px 0px;
        
    }
    
    
    
    
    .push_button {
	position: relative;
	width:70px;
	height:50px;
	text-align:center;
	color:#FFF;
	text-decoration:none;
	line-height:43px;
	font-family:'Oswald', Helvetica;
	
	
}
.push_button:before {
	background:#f0f0f0;
	background-image:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#D0D0D0), to(#f0f0f0));
	
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF; 
	-moz-box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF; 
	box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF;
	
	position: absolute;
	content: "";
	left: -6px; right: -6px;
	top: -6px; bottom: -10px;
	z-index: -1;
}

.push_button:active {
	-webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset;
	top:5px;
}
.push_button:active:before{
	top: -11px;
	bottom: -5px;
	content: "";
}




.blue {
	text-shadow:-1px -1px 0 #109177;
	background: #109177;
	border:1px solid #109177;
	
	
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	
	-webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
	-moz-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
	box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
}

.blue:hover {
	background:#109177;
	
}
    .but{
        background-color: #F4F7F8;
    }
    #appear{
        margin: 50%;
       
        border-radius: 10px;
      width: 100px;
    }
=======
        background-color:lightskyblue;
        width:500px;
        white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
        
    }
    .chatbot{
        background-color: antiquewhite;
       
    }
    #chathead{
        background-color: burlywood;
        padding: -10px 0px;
        margin:-10 0px;
        
    }
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
</style> 
    
    
    
    
    
    
    
 </head>

<body >
  <div >
  <h1>Kingsley's profile on HNGInternship 4</h1>  
    <div class="row"> 
        
        <div class="col-md-6 intro">
        <div id='credentials'><h2>Name:<?php echo $name ?> </h2>
     <h2>Username: <?php echo $user?> </h2>
       </div>
      <div><img src="
https://res.cloudinary.com/dyngnvcre/image/upload/v1524083992/king.jpg" alt="king.jpg"></div>
 
       
  <div id="bio">
      <h3>Biography</h3>
   <p> I'm an Electrical Engineer with a passion for programming from Cameroon.</p> </div>  
    <div>
   <h3>Domain of competence</h3> 
    <p>I'm knowledgeable in the following domains when it comes to programming</p>
    <ol>
        <li>HTML......Average</li>
        <li>CSS.......Average</li>
        <li>Bootstrap......Average</li>
        <li>JavaScript.....Average</li>
        <li>PHP.......Beginner</li>
        <li>MYSQL.....Beginner</li>
         <li>Java.....Beginner</li>
        </ol>
       </div>
   
 </div>
    
   
        
<<<<<<< HEAD
    <div class="col-md-6 but">
       
       
        <button type="submit" id="appear" class="push_button blue" onclick = "appear()">Let's Chat</button>

    
       <div class="chatbody" id="chatbot">
            <h2 id="rim"><strong>RIM CHATBOT</strong></h2>
           <p>Welcome User, my name is <span style="color:#109177"><strong>Rim67</strong></span>,and I am a bot</p>
        <p>You can ask me any question and i'll do my best to suggest you answers</p>
            <div class="chat">
                <div id="chatOutput">
                    <div id="chathead">
                        <p>You can train me with your personal questions using the keyword/format <span style="color:#109177"><strong>train:your-Question#your-Answer#password<br>N.B:</strong></span>the training password is<span style="color:#109177"><strong>trainpwforhng</strong> </span></p>
             <p>I also have the ability to tell you your zodiac sign. To know your zodiac sign, enter the following keyword followed by your birthday<span style="color:#109177"><strong>
                 Birthday:yyyy-mm-dd</strong></span></p>
=======
    <div class="col-md-6 " class="chatbot">
       
       
        

    
       <div class="chatbody">
            <h1 id="rim"><strong>RIM CHATBOT</strong></h1>
           <h4>Welcome User, my name is <span style="color:red"><strong>Rim67</strong></span>,and I am a bot</h4>
        <h4>You can ask me any question and i'll do my best to suggest you answers</h4>
            <div class="chat">
                <div id="chatOutput">
                    <div id="chathead">
                        <h4>You can train me with your personal questions using the keyword/format <span style="color:red"><strong>train:your-Question#your-Answer#password<br>N.B:</strong></span>the training password is<span style="color:red"><strong>trainpwforhng</strong> </span></h4>
             <h4>I also have the ability to tell you your zodiac sign. To know your zodiac sign, enter the following keyword followed by your birthday<span style="color:red"><strong>
                 Birthday:yyyy-mm-dd</strong></span></h4>
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
        </div>
                    <div><h4></h4></div>
                    <div id="results">
                    <h4><span id='ques'> </span><br><span id='ans'> </span>
                        <br></h4>
        </div>
                </div>
                <form method="post" action="#" onsubmit="button();return false" name="myForm" id="myform" >
                <input  id="chatInput" type="text" placeholder="Input Text here" maxlength="400">
<<<<<<< HEAD
                <button type="submit" class="push_button blue">Send</button>
=======
                <button type="submit" id="chatSend">Send</button>
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
                </form>
            </div>
                </div>
      
        </div>    
        
    </div>
    
    </div>

    
 </body>



<script>
<<<<<<< HEAD
 $('#appear').click(function() {
  $('#chatbot').toggle('slow', function() {
   $('#appear').toggle();
  });
});
    
=======
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
  

 function button(){

var input=$('#chatInput').val();
       
$.ajax({
       url:'',
    method:'post',
        cache: false,
     dataType: "json",
    data:{
    question:input,
    
   }, 
<<<<<<< HEAD
       
        success: function(result) { 
         $("#chatOutput").append($("#ques").append("<div class=\"you\"><strong>You:</strong><br>"+result['question']+"</div><div class=\"bot\"><strong>BOT:</strong><br>"+result['answers']+"</div><br>"));
=======
        beforeSend: function() { $('#results').append('Please wait...'); },
        success: function(result) { 
         $("#chatOutput").append($("#ques").append("<div class=\"you\"><strong>You:</strong><br>"+result['question']+"</div><div class=\"bot\"><strong>BOT :</strong><br>"+result['answers']+"</div><br>"));
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a
       console.log(result);
        }
        });
};
<<<<<<< HEAD
    
     function updateScroll(){
    var element = document.getElementById("chatOutput");
    element.scrollTop = element.scrollHeight;
}


setInterval(updateScroll,1000);
                    
</script>


</html>
=======
</script>


</html>
>>>>>>> 028e0086082564ab8d4340fb264c0a85b9cd082a

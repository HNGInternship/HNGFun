
<?php

include '../answers.php';
$sql = 'SELECT * FROM interns_data WHERE username="kingsley67"';
=======
$sql = 'SELECT * FROM `interns_data` WHERE `username`="kingsley67"';
>>>>>>> 0d13d9356270629f92591e13d07e709318f450cc
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
    $sql3 = "INSERT INTO  `chatbot` (`question`, `answer`) VALUES ('" . $question . "','" . $answerm . "')";
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
        background-color: darkblue;
      
        text-align: left;
    }
   
    h3{background-color: coral;
    width:250px}
   
    p{color:black}
    h1{color: coral}
    #credentials{  color:white;}
    p,li{
        color:white
    }
    
    #chatoutput{
        height: 500px;
        border:black solid 1px;
        width: 530px;
        overflow: scroll;
    }
    #chatinput{
        width: 450px;
        height: 80PX;
        
    }
    
    
    #rim{
        padding-left:50px
    }
    #chatsend{
        height: 70px
    }
    
    .you{
        background-color:lawngreen;
        width:500px;
        padding-left: 390px;
        border: 1px solid black;
       
        overflow-wrap: break-word;
    }
    .bot{
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
        </div>
                    <div><h4></h4></div>
                    <div id="results">
                    <h4><span id='ques'> </span><br><span id='ans'> </span>
                        <br></h4>
        </div>
                </div>
                <form method="post" action="#" onsubmit="button();return false" name="myForm" id="myform" >
                <input  id="chatInput" type="text" placeholder="Input Text here" maxlength="400">
                <button type="submit" id="chatSend">Send</button>
                </form>
            </div>
                </div>
      
        </div>    
        
    </div>
    
    </div>

    
 </body>



<script>
  

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
        beforeSend: function() { $('#results').append('Please wait...'); },
        success: function(result) { 
         $("#chatOutput").append($("#ques").append("<div class=\"you\"><strong>You:</strong><br>"+result['question']+"</div><div class=\"bot\"><strong>BOT :</strong><br>"+result['answers']+"</div><br>"));
       console.log(result);
        }
        });
};
</script>


</html>

<?php

 	if($_SERVER['REQUEST_METHOD'] === 'POST')
 {
           if (!defined('DB_USER')){
               require "../../config.php";
           }
           try {
               $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
             } catch (PDOException $pe) {
               die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
             }
      $mesuu = $_POST['question'];
      $message=strtolower($mesuu);
      trim($message);
      $statusTrain = stripos($message, "rain:");
      if($statusTrain)
      {
        $newstring=str_replace("train:","","$message");
         $sets = explode("#", $newstring);
              $mQuestion= $sets[0];
              $mAns= $sets[1];
              $mPwd= $sets[2];
              if($mPwd=='passcode'){
              $resultIns = $conn->query("insert into chatbot (`question`, `answer`) values ('$mQuestion','$mAns')" );
              if($resultIns)
              {
                echo json_encode([
                 'status' => 1,
                        'answer' => "thanks for enlarging my knowledge base"
                        ]);
return;

}
else {

echo json_encode([
   'status' => 1,
   'answer' => "sorry something went wrong"
 ]);
return;
  // code...
}
              }
              else {

                echo json_encode([
                   'status' => 1,
                   'answer' => "sorry wrong password"
                 ]);
                // code...
              }
return;
      }if ($message==""){
  echo json_encode([
     'status' => 1,
     'answer' => "enter a question  you can also   remember train me "
   ]);
return;
}
if ($message==""){
echo json_encode([
'status' => 1,
'answer' => "enter a question  you can also   remember train me "
]);
return;
}

      if($message=='aboutbot'){
        echo json_encode([
           'status' => 1,
           'answer' => "franks bot version 1.45"
         ]);
return;
      }
     if ($message!=''){
$result2 = $conn->query("select * from chatbot where question = '$message' order by rand()");
$user = $result2->fetch(PDO::FETCH_OBJ);

if($user){
$rows=$user->answer;

echo json_encode([
   'status' => 1,
   'answer' => $rows
 ]);
return;
}
else
{
  echo json_encode([
     'status' => 1,
     'answer' =>"sorry i have no answer to that yet .......but you an train me how to annswer questions "
   ]);
return;
}

if ($message==""){
  echo json_encode([
     'status' => 1,
     'answer' => "enter a question  you can also   remember train me "
   ]);
return;
}
}
	return;
 }

  ?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<html>
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Righteous">
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Overpass">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
#mid
{

   color: #FBF7F7;
   width: 95%;
   border-radius: 30px;
   padding-top: 30px;
   font-size: 38px;
   padding-bottom: 40px;
   font-family: 'Font Name',Overpass;
   background-color:rgba(238, 29, 29, 0.34);
}
.button {
  display: inline-block;
  padding: 5px 15px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #111111;
  border: none;
  border-radius: 15px;
  box-shadow: 0 5px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}



#data
{

   color: #FBF7F7;
   width: 85%;
   text-decoration:bold ;
   border-radius: 30px;
   padding-top: 3px;
   font-size: 16px;
   text-align: left;
   padding-bottom: 4px;

   /*background-color:rgba(238, 29, 29, 0.34);*/
}
#data2
{

   color: #FBF7F7;
   width: 88%;
   font-family: 'Font Name',Righteous;
   border-radius: 30px;
   padding-top: 3px;
   font-size: 28px;
   text-align: left;
   text-decoration:bold ;
   padding-bottom: 4px;

   background-color:rgba(238, 29, 29, 0.34);
}
body
{
  width: 100%;
  color: #FBF7F7;
  padding-top: 100px;
  background-image: url('https://res.cloudinary.com/dttpnfzul/image/upload/v1524048214/bg.jpg');
  font-family: 'Font Name',Righteous;
  text-align: center;
  font-size: 28px;
  font-style:regular;
  line-height: normal;


   background-color:rgba(196, 196, 196, 0.50);
}

.container11 {
    border: 2px solid #dedede;
    background-color: #a38cfd;
    color: #111111;
    font-size: 14px;
    border-radius: 25px;
    padding: 10px;
    margin: 10px 0;
    width: 70%;
}

.darker {
  width: 70%;
    border-color: #111111;
    background-color: #ddd;
}

.container11::after {
    content: "";
    clear: both;
    display: table;
}

.container11 img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container11 img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.fa {
            padding: 10px;
            font-size: 15px;
            width: 35px;
            text-align: center;
            margin: 3px 2px;
             background: #000000;
            color: rgb(255, 0, 0);
            border-radius: 50%;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }


</style>
<head>
	<title>
		frankline owino

	</title>
</head>
<body>
  <?php
//require "../db.php";
if (!defined('DB_USER')){

            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'kingpin'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
   $yy='<img  src="';
   $img=$user->image_filename;
   $yz= '" style="width:240px;height:240px;border-radius: 50%;">';  echo $user->name.' Owino';
 echo'<br><c style="color: #FBF7F7;">WELCOME TO MY PROFILE<br>';
 echo $user->username;
 echo'</c><br><br><center><div id="mid">';
 echo "$yy$img$yz";
  ?>
    		 <div id="data">

		 	>  STUDENT<br>
		 	>  FRONT END &BACKEND DEVELOPER<br>> ANDROID DEVELOPER
		 	   <br> > IN LOVE WITH GRAPHICS<br>>LIVING LIFE
	 </div>
     <div id="data2"><center>
          try my bot <br>
          <div class="container11">
  <img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524056521/pp.jpg" alt="Avatar" style="width:100%;">
  <p>Hello im frank's bot i can answer some of your questions try me ........He is not around im using his profile picture dont tell him &#9786; &#9786; &#9786; you can also train me to answer questions    To train me use the format: below <br> <i style="color: #fefe00;">train: question#answer#password
  </i></p>
</div>
<div id="async">
</div>
<form id="myform" method="POST">

  <textarea  sid="text" name="question" id="ter" rows="0" cols="0" class="textarea" style=" padding:2px; border-radius: 12px;width: 80%;background-color:rgba(155, 22, 195, 0.32);  font-size: 16px;" placeholder="enter your message"></textarea> <br>

                               <button id="btn1" type="submit" class="button" >send</button>
                               <br><br>
</center>
      </div><br>
			<div id="data2"><center>
		 	   	  LINK ME UP<br>
		 	  <a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-github"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-slack"></a>
</center> 	</div></div></center>

</body>
</html>
<script>
  $(document).ready(function(){
    $('#myform').submit(function(e){
      e.preventDefault();
    var valnext2 = $("#ter").val();
    var question = $("#ter").val();
    var resusr='</center><div class="container11 darker" ><img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524285838/960_720.png" alt="Avatar" class="right" style="width:60%;"><p> ';
    $("#async").append(resusr+" "+valnext2+" </p></div>");
      $.ajax({
        url: 'profiles/kingpin.php',
        type: 'POST',
        data: {question: question},
        dataType: 'json',
        success: function(response){
           console.log(response);
            var resbot='<div class="container11" ><img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524056521/pp.jpg" alt="Avatar" class="left" style="width:60%;"><p> ';
             $("#async").append(resbot+" "+response.answer+" </p></div>");
              $("#ter").val('');

        },
        error: function(error){
          console.log(error);
        }
      })

    })
  });
</script>

<?php

 if (isset($_POST))
 {

      $mesuu = $_POST['message'];
      $message=strtolower($mesuu);
      echo "<br>";
      echo $mesuu;
  
      trim($message);
      $train = stripos($message, "train:");

      if( $train)
      {

      }

      if($message=='aboutbot'){

           $botresp='franks bot version 1.45';
      }




/*
      elseif (!$message) {



        # code...
         $result3 = $conn->query("Select * from chatbot where question = '$message'");
        $result3->execute();
      //  $dbresp = $result3->fetch(PDO::FETCH_OBJ);
      $rows = $dbresp->fetchAll();


            if(count($rows)<0)
            {
              $botresp = $row['answer'];
              echo "$botresp";
            }
              if(count($rows)>0)
             {
              $index = rand(0, count($rows)-1);
              $row= $rows[$index];
              $botresp = $row['answer'];    
              echo "$botresp";
              }
         if(count($rows)==0)
         {
          $botresp='sorry i have no answer to that yet .......but you an train me how to answer it ';
          echo "$botresp";
         }


      }

      */
    
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

.container1 {
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

.container1::after {
    content: "";
    clear: both;
    display: table;
}

.container1 img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container1 img.right {
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
    test bot

  </title>
</head>
<body>
  <?php 
//require "../db.php";
include_once("../answers.php"); 

        if (!defined('DB_USER')){
            
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }




  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'kingpin'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
   $yy='<img  src="';
   $img=$user->image_filename;
   $yz= '" style="width:240px;height:240px;border-radius: 50%;">';
 $sign='<br>slack @';
   $test="frank says u ra fine";
echo'<br><c style="color: #FBF7F7;">WELCOME TO MY PROFILE<br>';
    echo $user->name.' ';
 
 echo "$sign$user->username";
 echo'</c><br><br><center><div id="mid">';
 echo "$yy$img$yz";



     ?>

     <div id="data">
      
      >  STUDENT<br>
      >  USELESS FRONT & BACKEND DEVELOPER<br>> SHITTY ANDROID DEVELOPER
         <br> > IN LOVE WITH GRAPHICS<br>> ENJOYS LIVING LIFE<br>> LAZY TO THE CORE


       
         
         
    

     </div>


      <div id="data2"><center>
            try my chat bot <br>
            <div class="container1">
  <img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524056521/pp.jpg" alt="Avatar" style="width:100%;">
  <p>Hello im frank's bot i can answer some of your questions try me ........He is not around im using his profile picture dont tell him  &#9786; &#9786; &#9786; you can also train me to answer questions    To train me use the format: below <br> <i style="color: #fefe00;">train: question#answer#password 
  </i></p>
 





</div>

<div id="async">

  
</div>
<form id="myform" method="POST">
  <textarea  sid="text" name="message" id="ter" rows="0" cols="0" class="textarea" style=" padding:2px; border-radius: 12px;width: 80%;background-color:rgba(155, 22, 195, 0.32);" placeholder="enter your message"></textarea> <br>
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
</center>

      </div>

  </div></center>

</body>
</html>
<script>
$(document).ready(function(){
    $("#btn1").click(function(){
      var valnext2 = $("#ter").val();
      $("#ter").val('');
    // var valnext2 = "<?php echo $mesuu; ?>";
      var valnext = "ghjgjkhgkjhkhjhkhkjh";
      var resusr='</center><div class="container1 darker" ><img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524285838/960_720.png" alt="Avatar" class="right" style="width:60%;"><p> ';





      var resbot='<div class="container1" ><img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524056521/pp.jpg" alt="Avatar" class="left" style="width:60%;"><p> Sorry to disappoint as you  can see he is too lazy to train me he did not even train me to answer simple questions .........i dont even know my name  i think you should go and beat him up ....he is embarassing me <h1> &#x1F620;&#x1F620;&#x1F620; </h1>';
        $("#async").append(resusr+" "+valnext2+" </p></div>");
         $("#async").append(resbot+"</p></div>");

    });
$('form').submit(function(ev) {
    ev.preventDefault();
    // ajax stuff...
});

    
});
</script>
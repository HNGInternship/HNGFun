<?php

<<<<<<< HEAD
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
              if($mPwd=='password'){
              $resultIns = $conn->query("insert into chatbot (`question`, `answer`) values ('$mQuestion','$mAns')" );
              if($resultIns)
              {
                echo json_encode([
                 'status' => 1,
                        'answer' => "thanks sensei"
                        ]);
return;
=======
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
                            'answer' => "thanks and noted."
                            ]);
    return;
>>>>>>> bf9dc1acee51db585ac213306ec52339c6faee29

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
           'answer' => "sasbot version 1.0"
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
     'answer' =>"sorry i have no answer to that yet but you an train me how to answer questions "
   ]);
return;
}

if ($message==""){
  echo json_encode([
     'status' => 1,
     'answer' => "enter a question  you can also   train me "
   ]);
return;
}
}
  return;
 }

  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>
    
    <!-- styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
 
    <!-- custom style -->
    <style type="text/css">
        body {
            background: linear-gradient(to bottom right, black, lightgrey, black, red, yellow);          
            text-align: center;
            font-family: 'Lato';
        }
        .sect, .row {
            margin: 1em 15%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
            background: #fff;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img#profile {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        p > a:hover,
        p > a:focus {
            background: beige;
            padding: 1em;
            box-shadow: 2px 0 2px #696;
        }
        p > a {
            padding: 1em;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }

    /** bot sect **/
        .container1 {
            border: 2px solid #dedede;
            background-color: #fa8072;
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
 .botbg {
    background: url(akatsuki-emblem.png) repeat;
  }
  </style>
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
 	$result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
 	$user = $result2->fetch(PDO::FETCH_OBJ);

 	$name = 'Sambo Abubakar'
?>
    <main>
<!-- section starts -->

        <div class="row sect">
            <div class="col-md-12">
                <figure>
                    <img id="profile" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg" alt="dp">
                    <figcaption><p><?php echo $name ?></p></figcaption>
                </figure>
                <h2 id="tag">UI Designer</h2>
                <hr style="width:5%;margin-top:0px;margin-bottom:0px;">
                <h2 id="tag" style="padding-bottom:5px;">Web Developer<br />
                <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP | PHP</span></h2>
            </div>
        </div>

        <div class="row sect">
            <div class="col-md-12">
                <h3>Social</h3>
                <div class="row">
                    <div class="col-md-12">
                        <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;"><i class="fa fa-codepen fa-2x"></i></a></p>
                        <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;"><i class="fa fa-github fa-2x"></i></a></p>
                        <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;"><i class="fa fa-twitter fa-2x"></i></a></p>
                        <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;"><i class="fa fa-linkedin fa-2x"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- bot section -->
     <div id="data2"><center>
          sasBot <br>
        <div class="container1">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg" alt="Avatar" style="width:100%;">
            <p>Hello, I am SasBot. Ask me a question. To train me, use--> <i style="color: #fff;">train: question#answer#password
            </i></p>
        </div>
    
        <div id="async"></div>

        <form id="myform" method="POST">
	        <textarea  sid="text" name="question" id="ter" rows="0" cols="0" class="textarea" style=" padding:2px; border-radius: 12px;width: 80%;background-color:rgba(220, 20, 60, 0.5); color: #fff; font-size: 16px;" placeholder="enter your message"></textarea> <br>
	       <button id="btn1" type="submit" class="button" >send</button>
           <br><br>
	    </form></center></div>

    </main>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

  <script>
  $(document).ready(function(){
    $('#myform').submit(function(e){
      e.preventDefault();
    var valnext2 = $("#ter").val();
    var question = $("#ter").val();
    var resusr='</center><div class="container1 darker" ><img src="https://res.cloudinary.com/dttpnfzul/image/upload/v1524285838/960_720.png" alt="Avatar" class="right" style="width:60%;"><p> ';
    $("#async").append(resusr+" "+valnext2+" </p></div>");
      $.ajax({
        url: 'profiles/sadiq.php',
        type: 'POST',
        data: {question: question},
        dataType: 'json',
        success: function(response){
           console.log(response);
            var resbot='<div class="container1" ><img src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg" alt="Avatar" class="left" style="width:60%;"><p> ';
             $("#async").append(resbot+" "+response.answer+" </p></div>");
              $("#ter").val('');

        },
        error: function(error){
          console.log(error);
        }
      })

    })
	
	$("#ter").keyup(function(e){
		if(e.which == 13){
		   $("#myform").trigger("submit")
		}
		else{
		   // Do Nothing 
		}
	});	  
	
   });
  </script>
</body>

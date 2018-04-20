<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $question = $_POST['question'];

        

        if(!defined('DB_USER')){
                require "../../config.php";		
                try {
                    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
                } catch (PDOException $pe) {
                    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
                }
        }

        if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'reply' => "Please Enter a question"
			]);
			return;
        }


        
        
        $query = $conn->query("SELECT * FROM chatbot");
        $database = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($database as $key => $value) {
            array_push($qArray[], ($value['question']));

            array_push($aArray[], ($value['answer']));
          }
    

        $question_lower = strtolower($question);
        
        
      

        if(strpos($question_lower, "train:") != false) {
            $trainInfo = explode("#", $question_lower);
            $question_info = explode(":", $trainInfo[0]);
            $question_temp = trim($question_info);
            $answer_temp = trim($trainInfo[1]);

            $question_temp = preg_replace("([?.])", "", $question_temp);

            try{
                
                $insert = "INSERT INTO chatbot VALUES(NULL, '".$question_temp."', '".$answer_temp."') ";
                $conn->execute($insert);
                echo json_encode([
                    'status' => 1,
                    'reply' => "You've taught me something, you can ask me now and i'd answer :)",
                  ]);
                  return;
            } catch (Exception $e) {
                echo json_encode([
                  'status' => 1,
                  'reply' => "I could not be taught at this moment, please try again.",
                ]);
                return;
              }
        
        }
        else if (strpos($question_lower, "train:") != false){

            $trainInfo = explode("#", $question_lower);
            $question_info = explode(":", $trainInfo[0]);
            $question_temp = trim($question_info);

            if(in_array($question_temp, $qArray)){
                $qArraySize = count($qArray);
                $random = rand(0,$qArraySize-1);
                echo json_encode([
                    'status' => 1,
                    'reply' => $qArraySize[$random],
                  ]);
                  return;
                } 
            }
            else if(strpos($data_lower, "help") !== false || $data_lower === "help"){
                echo json_encode([
                    'status' => 1,
                    'reply' => "Hello there, my name is Rodrigo and I'm here to help you, this are a list of the commands i accept type to see a list of the commands I accept ",
                  ]);
                  return;
            }
            else if(strpos($data_lower, "aboutbot") !== false){
                echo json_encode([
                    'status' => 1,
                    'reply' => "I'm Rodrigo <br> <b>Version 1.0<b>",
                  ]);
                  return;
            }
        }



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>codetillamgone page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        h1{
            text-align : center;
            position:fixed;
            width:100%;
            top:0px;
            margin-top:0px;
            margin-left:0px;
            padding:10px;
            text-align:center;
            background-color:cornflowerblue;
            color: white;
        }.box{
            margin-top:60px;
            float:left;
            padding: 20px;
            text-align: center;
            margin-left: 20px;
            height: 400px;
            width: 300px;
            background-color:cornflowerblue;
            border-width: 2px;  
            border-style: solid; 
            border-color:grey;
            color:white;
            overflow-x:hidden;
            overflow-y:scroll;
        }.box::-webkit-scrollbar{
            width:5px;
        }.box::-webkit-scrollbar-thumb{
            border-radius:3px;
            background-color:white;
        }.chatbotbox {
            background-color:white;
            margin-top:70px;
            float:left; 
            margin-left:300px;
            padding:20px;
            height:500px;
            width: 500px;
            border-width:2px;
            text-align: left;
            min-width:390px;
            border-style: solid;
            border-color: grey;
            box-shadow: 0, 4px grey;
       }#chatlogs {
            padding:10px;
            width:100%;
            height:400px;
            overflow-x:hidden;
            overflow-y:scroll;
       }#chatlogs::-webkit-scrollbar{
            width:10px;
        }#chatlogs::-webkit-scrollbar-thumb{
            border-radius:5px;
            background-color:grey;
        }.questionform input[name=question]{
            margin-left:10px;
            height:50px;
            border:2px solid grey;
            border-radius:3px;
            color:grey;
            font-size:18px; 
            width:70%;   
        }#chatform{
            margin-top:20px;  
        }.questionform{
            width:100%;
        }.questionform input[type=submit]{
            padding:10px;
            margin-top:5px;
            margin-left:5px;
            border:none;
            color:white;
            font-size:20px;
            background-color:cornflowerblue;
        }h3.name{
           text-align: center;
           font-size: 25px;
           text-decoration: underline;
           text-decoration-style: solid;
           text-decoration-color: black;  
       }h3.android_dev{
        text-align: center;
        font-size: 20px;
       }img.small{
           width: 200px;
           height: 200px;
       }img.align-center{
           display: block;
           margin: 0px auto;
           margin: 0px auto;
       }p.two{
           text-align: center;
       }.bot{
           color : cornflowerblue;
           font-weight:bold;
       }.username{
           color: springgreen;
           font-weight:bold;
       }
    

     
    </style>
</head>
<body>




<?php

try{
    $getData = 'SELECT * FROM interns_data WHERE username="codetillamgone"';
    $query1 = $conn->query($getData);
    $query1->setFetchMode(PDO::FETCH_ASSOC);
    $result1 = $query1->fetch(); 
}
catch(PDOException $e){
    throw $e;
    
}
    
   $name = $result1['name'];
   $user = $result1['username'];
   $image = $result1['image_filename'];
 ?>
  <h1 class= "h1">Welcome to <i>@codetillamgone</i>'s Profile</h1>  
<br/>
    <div class="box">
        <p class="one">
            <h3 class="name"> <b>  <?php echo $name ?> </b>  </h3>
            <h3 class="android_dev"> <b> Android Developer </b></h3>
        </p>
        <p class="two">
            <img src="http://res.cloudinary.com/dh6nwthj4/image/upload/v1523703633/IMG_20180408_164418_288.jpg" alt="my image" class="align-center small"/>
        </p>
        <p>     
            <h3 class="hobbies"> Hobbies/About Me </h3>
            <ul>
                <li> Coding : Android, Java, Python and PHP ongoing</li>
                <li> Listening to Music </li>
                
                <li> Humiliating people on FIFA, ask <b><i>@bamii</i></b> of this Internship...Lol </li>
            </ul>   
        </p>
    </div>
    <div class = "chatbotbox" >
        <div id="chatlogs"> 
        <div > <span class= "bot" > Rodrigo :</span> Hello there, my name is Rodrigo and I'm here to help you, type <b>help</b> to see a list of the commands I accept </div>


        
        </div> 
            
        <div id= "chatform">
            <form method="post" action="../profiles/codetillamgone.php" id="form" class = "questionform">
            <input id="input" type="text" name="question" placeholder="Lets talk, pal">
            <input id="send" type="submit">
            </form>
           
        </div>
    </div> 
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#form").submit(function(e){
        e.preventDefault();
         var question = $("#input").val();
         $("#input").val("");
         var client = document.getElementById('chatlogs');
         if(question.trim() == ''){
             var servertext = document.createElement('div');
             servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "Please enter a question" + "<br>";
             client.appendChild(text);
         }
         else{
        
         var text = document.createElement('div');
         text.innerHTML = "<br>"  + "<span class= 'username' > You: </span>" + question + "<br>";
         
         client.appendChild(text);
         }
        
         $.ajax({
				url: "../profiles/codetillamgone.php",
				type: "post",
				data: {'question': question},
				dataType: "json",
                success: function(response){
                    if( response.status == 1){
                        var servertext = document.createElement('div');
                        servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + response.reply + "<br>";
                        client.appendChild(text);
                    }
                },
                error : function(error){
                    var errortext = document.createElement('div');
                    errortext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "I'm quite tired at the moment, please can we talk another time...Please don't tell my Master" + "<br>";
                    client.appendChild(errortext);
                }
                
         
        });


    });
    
    </script>

 <?php
      try {
          $getWord = "SELECT * FROM secret_word";
          $query2 = $conn->query($getWord);
          $query2->setFetchMode(PDO::FETCH_ASSOC);
          $result2 = $query2->fetch();
      } catch (PDOException $e) {
          throw $e;
      }
      $secret_word = $result2['secret_word'];
    ?>
        
         
     
                        
    
</body>
</html>
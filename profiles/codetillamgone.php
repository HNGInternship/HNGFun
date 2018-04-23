<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../answers.php";

   
    if(!defined('DB_USER')){
        require "../../config.php";		
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }

    $question = $_POST['question'];



    $question_lower = strtolower($question);
    $testvar = "?".$question_lower;  #Make Data Easier to compare

    if(strrpos($testvar, "train") != NULL){

        
        $trainInfo = explode("#", $question_lower);
        $questionInfo = explode(":", $trainInfo[0]);
        $question_temp = $questionInfo[1];
        $answer_temp = $trainInfo[1];
        $question_temp = trim(preg_replace("([?.])", "", $question_temp));
        $answer_temp = trim(preg_replace("([?.])", "", $answer_temp));
        $password_temp = trim(preg_replace("([?.])", "", $trainInfo[2] ));
        $password = $password_temp ;
        if ($password !== "password"){
            echo json_encode([
                'status' => 1,
                'reply' => "Wrong password, you are not authorized to train me",
              ]);
              return;
        }else{
            try{
            $sql = "insert into chatbot (question, answer) values (:question, :answer)";
            $initiate = $conn->prepare($sql);
            $initiate->bindParam(':question', $question_temp);
            $initiate->bindParam(':answer', $answer_temp);
            $initiate->execute();
            $initiate->setFetchMode(PDO::FETCH_ASSOC);
            if($initiate){
                echo json_encode(['status' => 1, 'reply' => "I have been trained, now you can ask me anything"]);
                return; 
            } }
            catch (PDOException $e) {
                throw $e;
            }
          
              
            }
           
        }
        else if(strrpos($testvar, "train") == NULL){

            if(strrpos($testvar, "--help") != NULL){
                echo json_encode([
                    'status' =>1,
                    'reply' => "Hello, thanks for talking to me, here are a list of the command I accept, <i>type</i> <b> Train: question # answer # password</b> in this format to train me , 
                    <i>type</i> <b>aboutbot</b> to know my version number,
                    <i>type</i> <b>aboutowner</b> to know more about my master
                    <i>type</i> <b>quadratic: a # b # c </b> in this format so i can solve your quadratic equation for you;
                    "
                ]);
                return;
                
            }
            else if(strrpos($testvar, "hi") || strrpos($testvar, "hello") || strrpos($testvar, "what's up") || strrpos($testvar, "Fuck you")){
                echo json_encode([
                    'status' => 1,
                    'reply' => "Hey buddy, how you doing?...Wwhat are we talking about today"
                ]);
                return;
            }
            else if(strrpos($testvar, "quadratic")){

                $trainInfo = explode("#", $question_lower);
                $firstInfo = explode(":", $trainInfo[0]);
                $thirdValue = trim(preg_replace("([?.])", "", $trainInfo[2]));
                $secondValue = trim(preg_replace("([?.])", "", $trainInfo[1]));
                $firstValue = trim(preg_replace("([?.])", "", $firstInfo[1] ));
                $result = davidQuadraticEquation($firstValue, $secondValue, $thirdValue);

                echo json_encode([
                    'status'=> 1,
                    'reply' => " ".$result
                ]);
                
               
                return;
            }
           

           else{

            $question = "%$question%";
            try{
                $sql = "select * from chatbot where question like :question";
                $initiate = $conn->prepare($sql);
                $initiate->bindParam(':question', $question);
                $initiate->execute();
                $initiate->setFetchMode(PDO::FETCH_ASSOC);
                $rows = $initiate->fetchAll();
                if($rows){
                 $rows_value = count($rows);
                if($rows_value>0){
                    $random = rand(0, $rows_value - 1);
                    $row = $rows[$random];
                    $answer = $row['answer'];
                    echo json_encode([
                        'status' => 1,
                        'reply' => $answer,
                      ]);
                      return;
                    }
                }
    
            }
            catch (PDOException $e) {
                throw $e;
            }

           }
            
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
     .box{
            margin-top:10px;
            float:left;
            padding: 10px;
            text-align: center;
            margin-left: 100px;
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
            margin-top:10px;
            float:left; 
            margin-left:100px;
            padding:20px;
            height:450px;
            width: 450px;
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
        }.questionform input{
            margin-left:20px;
            height:40px;
            border:2px solid grey;
            border-radius:3px;
            color:grey;
            font-size:18px; 
            width:70%;   
        }#chatform{
            margin-top:20px;  
        }.questionform{
            width:100%;
        }.questionform button{
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
        <div > <span class= "bot" > Rodrigo :</span> Hello there, my name is Rodrigo and I'm here to help you, before that, my master instructed me to let everyone know that Manchester United is the best team in the world and supporting any other team is a complete waste of time now, type <b>--help</b> to see a list of the commands I accept  </div>


        
        </div> 
            
        <div id= "chatform">
            <form  id="form" class = "questionform">
            <input id="input" type="text"  placeholder="Lets talk, pal">
            <button id="send" type="submit">SUBMIT</button>
            </form>
           
        </div>
    </div> 
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script>

    $(function(){
        $("#form").submit(function(e){
            e.preventDefault();
            var question = $("#input").val();
            $("#input").val("");
            var client = document.getElementById('chatlogs');
            if(question.trim() !== ''){
                var text = document.createElement('div');
                    text.innerHTML = "<br>"  + "<span class= 'username' > You: </span>" + question + "<br>";
                    client.appendChild(text);
                if(question.toLowerCase().includes("aboutbot")){
                    var servertext = document.createElement('div');
                    servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "Version : 1.1.0" + "<br>";
                    client.appendChild(servertext);
                    return false;
                }
                else if (question.toLowerCase().includes("aboutowner")){
                    var servertext = document.createElement('div');
                    servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "follow him on @codetillamgone across all social media platforms to know more, Oh you thought, I'd divulge personal information, <b>LOL</b>" + "<br>";
                    client.appendChild(servertext);
                    return false;
                }


                $.ajax({
				url: "/profiles/codetillamgone.php",
				type: "post",
				data: {question: question},
                dataType: "json",
                success: function(response){
                    if(response.status === 1){
                       
                    var servertext = document.createElement('div');
                    servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + response.reply + "<br>";
                    client.appendChild(servertext); 

                    }
                },          
                    error: function(error){
                    console.error(error);
                    var servertext = document.createElement('div');
                    servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "I don't understand what you said, it's prolly because I'm quite tired at the moment, could we talk some other time" + "<br>";
                    client.appendChild(servertext); 
                    
				}                               
                   
                
            })
            }    
 
      

            
           
            

        })
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
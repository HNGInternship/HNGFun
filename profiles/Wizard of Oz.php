<?php
if(!defined('DB_USER')){
            require "../../config.php";     
            try {
                $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            } catch (PDOException $pe) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
        }


 if(isset($_GET['training'])) {
      $message = $_GET['training'];
        echo workOnTrainData($message);
        exit();
}


else if(isset($_GET['func'])){
      $function = $_GET['func'];
      $text = $_GET['text'];

        echo doSpecialFunction($function,$text);
      exit();

}


else if(isset($_GET['info'])){
      $message = $_GET['info'];
      echo getReply($message);
        exit();

}



    try {
        $sql = "SELECT name, username, image_filename FROM interns_data WHERE username='Wizard of Oz'";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        print_r($e);
        
    }
        
        $fullname = $data["name"];
        $username = $data["username"];
        $profilePic = $data["image_filename"];

          try {
        $sql = "SELECT secret_word FROM secret_word";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        print_r($e);
    }

    $secret_word=$data["secret_word"];



    function sanitizeText($text){

    return trim($text);
}



function doSpecialFunction($func,$text){
    require "../answers.php";

    $text=sanitizeText($text);
    $text=strtolower($text);

    if($func=="pigLatin"){
    return pig_latin($text);
    }

    else if($func=="bot"){
        return get_bot_version();
    }

     else if($func=="commands"){
        return get_help();;
    }

    else{
        return find_place($text);
    }

}



function workOnTrainData($data){

    require '../db.php';


    // $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      
    


  
    try {


        $indexOfHash=strpos($data,"#");

        if($indexOfHash===FALSE){

            return "Training format used is incorrect, use : <br><span id='important'>train: question # answer # password </span>";

        }

        $indexOfColon=strpos($data,":");

        $newMessage=substr($data,$indexOfColon+1);
    $query=explode ( "#" , $newMessage );
    $question=sanitizeText($query[0]);
    $answer=sanitizeText($query[1]);
    $password=sanitizeText($query[2]);

    // return $question;


    if($password==null || $password!="password"){

        return "Sorry, the password you entered is incorrect. Try again";
    }
    
    $sql =  $conn->prepare("INSERT INTO chatbot (question, answer)
VALUES (:question, :answer)");
    // use exec() because no results are returned

    // $result= $sql->execute(array(':question'=>$question,':answer'=>$answer));
    // return "Awesome! I feel smarter already.";

   if( $result= $sql->execute(array(':question'=>$question,':answer'=>$answer))){
    
    return "Awesome! I feel smarter already.";
}

else{

    return "Something went wrong, sorry";
}
    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}





function getReply($data){

    require '../db.php';


    // $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);



    try{

        $trimData=sanitizeText($data);

        if(strtolower($trimData)=="aboutbot"){

            return doSpecialFunction("bot","");

        }

        if(strtolower($trimData)=="commands"){

            return doSpecialFunction("commands","");
           
        }

        if(strpos($trimData, "{{")==FALSE){

$stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question=:question ORDER BY RAND() LIMIT 1");

$result= $stmt->execute(array(
   ':question'=>$trimData
  ));

}

else{

    $trimCopy=$trimData;

    $newDataFront="";
    $newDataBack="";
    $indexToCut=strpos($trimData, "{{");
    if($indexToCut!=0){
    $newDataFront=substr($trimData, 0,$indexToCut);

    }

    $trimCopy=substr($trimData, $indexToCut);


    $indexToCut2=strpos($trimData, "}}");


    if($indexToCut2!=strlen($trimData)-2){
        $newDataBack==substr($tr, $indexToCut2);

    }

     $trimCopy=substr($trimCopy, 2,strlen($trimCopy)-4);

    $word=$trimCopy;


    $newData=$newDataFront."%".$newDataBack;

    $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question LIKE ? ORDER BY RAND() LIMIT 1");

    $stmt->bindValue(1, $newData);
        $result=$stmt->execute(); 

}

  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {


    $dataFront="";
    $dataBack="";
    $indexCut=strpos($row["answer"], "(");
    if($indexCut!=0){
    $dataFront=substr($row["answer"], 0,$indexCut);

    }

    $indexCut2=strpos($row["answer"], ")");


    if($indexCut2!=strlen($row["answer"])-2){
        $dataBack==substr($row["answer"], $indexCut2);

    }

        if(strpos($row["answer"], "(pig_latin)")){
            return $dataFront.doSpecialFunction("pigLatin",$word).$dataBack;
        }

        else if(strpos($row["answer"], "(find_place)")){
            return $dataFront.doSpecialFunction("findPlace",$word).$dataBack;

        }
        return $row["answer"];


  }


    return "I'm sorry, I haven't been trained to answer this question...you can train me using the format.<br> <span id='important'>train: question # answer # password </span>"; 


}

catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();

}

}




?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700" rel="stylesheet" type="text/css">


    <title>HNG FUN</title>


<style>
body{
background: #667db6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


font-family: "Open Sans";
font-size:14px;


}



.main-content{
margin-top:1%;
/*border-radius: 10px 10px;*/
/*box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.4);*/
min-height: 400px;

}


.main-info{
display: flex;
padding: 0px;
background-image: url("https://res.cloudinary.com/benjorah/image/upload/v1524172454/beth-teutschmann-154958-unsplash.jpg");
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
background-repeat: no-repeat;
background-size: cover;
background-position: center;
text-align: center;
color: white;
max-width: 500px;


}


#fullname,#school{
    font-size:1.6em;
    font-family: arial;
    text-align: center;
    padding: 3%;
    padding-bottom: 1%;
}


#username{

    font-size:1.3em;
    font-family: arial;
    text-align: center;
    padding: 5%;
    padding-top: 0%;

}

#job{

    font-size:1em;
    font-family: arial;
    text-align: center;
    margin-bottom: 10%;

}


#profile-pic{

width:50%;
height:auto;
margin:5%;
}


#secret-word{

    font-size:1.6em;
    font-family: arial;
    text-align: center;
    padding: 3%;
    padding-bottom: 1%;
    padding-bottom: 0%;
    margin-bottom: 0%;
    color: white;

}


#bot-button{

    margin: 0% 30%;
    padding-top: 3%;
    text-transform: uppercase;
    color: white;
    background: #ea5a58;
    border-style: none;
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 font-family: "Open Sans";
 padding: 1%;

}

#bot-button:hover,#cancel:hover{

    cursor: pointer;

}

.scrim{
    padding-top:5%;
padding-bottom:5%;
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
text-align: center;
background: rgba(0, 0, 0, 0.7);
}


.bot-container{
    background: rgba(0, 0, 0, 0.8);
    color: white;
    position: fixed;
    z-index: 9999;
    top: 0;
    height: 100%;
    margin: 0px;
    display: none;
}

.bot-container>div{
    height: 100%;
    padding: 2% 0%;
}


.bot-container-reveal{
    display: block;
}

.container:first-of-type{
    margin-left: 0%;
    padding-left: 0%;
    margin-right: 0%;
    padding-left: 0%;
    min-width: 100%;max-width: 100%;
}


/*@-webkit-keyframes dropBot{
    0%{margin-top:-200%;

    visibility: hidden;
     }
    50%{visibility: visible;}
    100%{margin-top: 0%;}
}


@-moz-keyframes dropBot{
    0%{margin-top:-200%; 

    visibility: hidden;
    }
    50%{visibility: visible;}
    100%{margin-top: 0%;}
}

@keyframes dropBot{
    0%{margin-top:-200%; 

    visibility: hidden;
    }
    50%{visibility: visible;}
    100%{margin-top: 0%;}
}
*/


.bot{
    background:white;
    position: relative;
    height: 100%;
    /*width: 80%;*/
    max-width: 600px;
    padding: 0px;

    animation: dropbot ease-out 3s forwards;
    -webkit-animation: dropbot ease-out 3s forwards;
    -moz-animation: dropbot ease-out 3s forwards;
    
    /*animation-name: dropbot;
    animation-duration: 4s;
    animation-fill-mode: forwards; 
    animation-timing-function: ease-out;

    -moz-animation-name: dropbot;
    -moz-animation-duration: 4s;
    -moz-animation-fill-mode: forwards; 
    -moz-animation-timing-function: ease-out;

    -webkit-animation-name: dropbot;
    -webkit-animation-duration: 4s;
   -webkit- animation-fill-mode: forwards; 
    -webkit-animation-timing-function: ease-out;*/
    
}


@-webkit-keyframes dropBot{
    0%{top: -110%;

    visibility: hidden;
     }
    50%{visibility: visible;}
    100%{top: 0%;}
}


@-moz-keyframes dropBot{
    0%{top: -110%;

    visibility: hidden;
     }
    50%{visibility: visible;}
    100%{top: 0%;}
}

@keyframes dropBot{
   0%{top: -110%;

    visibility: hidden;
     }
    50%{visibility: visible;}
    100%{top: 0%;}
}




#cancel{
    position: absolute;
    top:0;
    right:0%;
    padding: 4%;
    background: #ea5a58;
    font-weight: 300;
}



#bot-header{
    color: #696969;
    font-weight: 200;
    font-size: 2.4em;
    display: flex;
    flex-flow: column;
}


.top-area{
    height: 15%;
    padding: 2%;
    width: 100%;
    position: absolute;
    top: 0;
    text-align: center;
}


.chat-body{
    overflow-y: auto; 
    overflow-x: hidden;
    position: relative;
    box-sizing: border-box;
    width:100%;
    min-height: 73%;
     max-height: 73%;
    top: 20%;
    padding: 3% 5% 0% 5%;
    /*background: purple;*/
}

.text-area{

    height: 8%;
    width: 100%;
    position: absolute;
    bottom: 0;
    box-shadow: 4px 4px 8px 6px rgba(0, 0, 0, 0.2);

}

.text-box{
    display: inline-block;
    width: 90%;
    max-height: 100%;
    padding: 2% 5%;
    overflow: hidden;
    border-style: none;
    font-size: 1.2em;
}


.chat-name{
    font-size:1.4em;
    font-weight: bold;
    color: black;
    display: inline-block;
    word-wrap: break-word; min-width:25%;
    padding-right: 0px;



}

.chat-message{
    margin-bottom: 4%;

}

.message{

    font-size: 1.2em;
    color: black;
    display: inline-block;
    word-wrap: break-word; max-width:70%;
    color: #667db6;
    padding: 0px;

}

.user-message{
    color: #696969;
}

#exempt{
    color: #000000;
}

.send-key{

    display: inline-block;

    height: 100%;
    width: 10%;
    background: #667db6;
    position: absolute;
    right: 0;
    text-align: center;
    font-size: 2em;
    font-weight: 600;
    font-style: bold;
}


.top-area,#bot-header{
    background: white;
}

#important{
    background-color: #667db6;
    /*background-color: #ea5a58;*/

    
    color: white;
    padding: 1%;

}

ul{
    padding-left: 0%;
    padding-bottom: 2%;
    
}

li{
}


@media(max-width: 400px){

    .chat-name,.text-box{
        font-size: 1.1em;
    }

    .message{
        font-size: 1em;
    }
}

@media(min-width:760px){

    .chat-name{
    word-wrap: break-word; min-width:20%;

    }

    .message{
    word-wrap: break-word; max-width:80%;

    }

}



</style>


  </head>
  <body>



<main class="container">

    <!-- <h1 id="secret-word">The secret word is <?php echo $secret_word?></h1>  -->

    <button id="bot-button">Chat with the bot</button>

<div class="row main-content justify-content-md-center">



    <section class="main-info col-sm-10 col-lg-6">
        

<div class="scrim">


    <h1 id="fullname"><?php echo $fullname?></h1>

    <h2 id="username">@<?php echo $username?></h2>

    <h3 id="job">Web &amp; Android Engineer</h3>


     <img class="rounded-circle" id="profile-pic" src=<?php echo $profilePic?> alt="Profile picture"> 

    <h3 id="school">Graduate of the University of Lagos</h3>


</div>




    </section>

    
</div>

</main>


<section class="container-fluid bot-container">
   
   <div class="row justify-content-md-center">



    <section class="bot col-xs-10 col-lg-6">
        

         <section class="top-area">

            <img src="https://res.cloudinary.com/benjorah/image/upload/v1524250197/icons8-wizard-50.png" alt="wzard hat">

            <h1 id="bot-header">MERLIN</h1>

            <hr style="margin:0% 20% 0% 20%">

            <h2 id="cancel">X</h2>


            
        </section>



                <div class="chat-body">

                <div class="chat-message row">

            <h1 class="chat-name col-2">Merlin : </h1>
          <span class="message col-10">Hi, I'm Merlin<br>I am a chatbot created by the <strong>Wizard of Oz</strong><br>
          You can ask me questions and i'll try my best to answer.<br>
          Some special functions I perform are: <br>
          <ul>
                <li><strong>Bot Version</strong><br>
                Type <span id="important">aboutbot</span>
            </li>
              <li><strong>Translate English to Pig Latin</strong><br>
                Type <span id="important">pig latin: word/sentence</span><br>
                The variable is used like so <span id="important">{{variable}}</span> and function as <span id="important">(pig_latin)</span><br>

              </li>
              <li><strong>Place Locator</strong><br>
                Used to find type of places in an area
                Type <span id="important">find: place in area</span><br>
                For example <span id="important">find: restaurants in nigeria</span><br>
                <span id="important">find: hotels in yaba</span><br>
                Also can find location of compnies or org e.g <span id="important">find: hotelsng in nigeria</span><br>
                <span id="important">find: Chevron </span><br>
                The variable is used like so <span id="important">{{variable}}</span> and function as <span id="important">(find_place)</span><br>

              </li>

               <li><strong>View available commands again</strong><br>
                Type <span id="important">commands</span>
            </li>
          </ul><span>


      </div>

                       
                </div>

        <!-- <div class="text-area row">

            <input type="text" name="text-box" class="text-box col-10" placeholder="Say something nice :)">
           

            <section class="send-key col-2">
                >
            </section>
            
        </div>
 -->
         <section class="text-area">

            <!-- <input type="text" name="text-box" class="text-box" placeholder="Say something nice :)"> -->

            <textarea id="tb" name="text-box" class="text-box" placeholder="Say something nice :)"></textarea>
           

            <section class="send-key">
                >
            </section>
            
        </section>


    </section>

    
</div>
    
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>

    window.onload = function() {
    $(document).keypress(function(e) {
      if(e.which == 13) {
        getMessage();
      }
    });

    $('.send-key').on('click', function () {
      getMessage();
    });


    $('#bot-button').on('click', function () {
      $('.bot-container').addClass('bot-container-reveal');
    });

    $('#cancel').on('click', function () {
      $('.bot-container').removeClass('bot-container-reveal');
      
    });


  }


  function getMessage(){

        var message=$(".text-box").val();

        if($.trim( message ) == '' ){

            displayMerlinMessage("Nice try, your question or statement has to contain words.");
            return;
        }


        // $(".text-box").val(document.getElementById('tb').defaultValue)
        $(".text-box").val(null);
        $('.text-box').prop('selectionStart',0);

        displayUserMessage(message);

        $(".chat-body").animate({ scrollTop: 500 }, 1000);


        if (message.indexOf('train:') >= 0 || message.indexOf('train :')>=0){
        $.ajax({
            type: "GET",
            url: 'profiles/Wizard of Oz.php',
            data: { training: message },
            success: function(data){
                displayMerlinMessage(data);
                
            }
         });


    }


    else if(message.toLowerCase().indexOf('pig latin:') >= 0 || message.toLowerCase().indexOf('pig latin :')>=0){

       var text=message.substring(message.indexOf(":")+1);

          $.ajax({
            type: "GET",
            url: 'profiles/Wizard of Oz.php',
            data: { func: "pigLatin",text:text },
            success: function(data){
                displayMerlinMessage(data);
                
            }
         });


    }


     else if(message.toLowerCase().indexOf('find:') >= 0 || message.toLowerCase().indexOf('find :')>=0){

       var text=message.substring(message.indexOf(":")+1);

          $.ajax({
            type: "GET",
            url: 'profiles/Wizard of Oz.php',
            data: { func: "findPlace",text:text },
            success: function(data){
                displayMerlinMessage(data);
                
            }
         });


    }
        else{
        elses = message;
        $.ajax({
            type: "GET",
            url: 'profiles/Wizard of Oz.php',
            data: {info: message },
            success: function(data){
        console.log(data);

                displayMerlinMessage(data);
            }
         });}


  }





  function displayMerlinMessage(message){

          $('.chat-body').append(
      `
      <div class="chat-message row">

            <h1 class="chat-name col-2">Merlin :</h1>
          <span class="message col-10"</strong>${message}</span>

      </div>`
    );

  }

  function displayUserMessage(message) {
    $('.chat-body').append(
      `
      <div class="chat-message row">

            <h1 class="chat-name col-2">You :</h1>
          <span class="message user-message col-10">${message}</span>

      </div>`
    );
  }

</script>

  </body>
</html>
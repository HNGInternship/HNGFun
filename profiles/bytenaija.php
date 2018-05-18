<?php
global $conn;


function validateTraining($str){
 
    if(strpos($str, "train:") !== false){

        return true;
    }else{
       
        return false;
    }
}

function validateFunction($str){

      if(strpos($str, "(") !== false){
  
          return true;
      }else{
         
          return false;
      }
  }

function processQuestion($str){
    if(validateTraining($str)){
        list($t, $question) = explode(":", $str);
        $question = trim($question, " ");
        if($question !== ''){
            if(strpos($question, "#") !== false){
                list($question,$answer)  = explode("#", $question);
            $answer = trim($answer, " ");
           if($answer !== ''){
                training($question, $answer);
            }else{
                echo "Question and Answer required";
            }
            }else{
                echo "Question and Answer required";
            }
            
        }else{
            echo "Question and Answer required";
        }
    }else if(validateFunction($str)){
       list($functionName, $paramenter) = explode('(', $str) ;
        list($paramenter, $useless) = explode(')', $paramenter);
        if(strpos($paramenter, ",")!== false){
            $paramenterArr = explode(",", $paramenter);
        }
       switch ($functionName){
           case "time":
           //bytenaija_time(urlencode($paramenter));
           //break;

           case "convert":
           //bytenaija_convert(trim($paramenterArr[0]), trim($paramenterArr[1]));
           //break;

           case "hodl":
           //bytenaija_hodl();
           //break;

           default:
           echo "That command has not been implemented yet. It has been put on hold till stage 5";
       }
    }else{
        //call database for question;
        getAnswerFromDb($str);

    }
}
function training($question, $answer){
  //  echo "iN TRAININGF";
  global $conn;
  
    try {
       
        $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
        
        $conn->exec($sql);

        $message = "Saved " . $question ." -> " . $answer;
        
        
        echo $message;

    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    }

    function getAnswerFromDb($str){
        global $conn;
        if(strpos($str, "deleteEmpty") === false){        
        $str = "'%".$str."%'";
        if($str !== ''){
           /*  $sql = "SELECT COUNT(*) FROM chatbot WHERE question LIKE " . $str;
            if ($res = $conn->query($sql)) {
               
               
              if ($res->fetchColumn() > 0) { */
            
                
        $sql = "SELECT answer FROM chatbot WHERE question LIKE " . $str . " ORDER BY answer ASC";
        $q = $conn->query($sql);
        $count = $q->rowCount();
        if($count > 0){
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        
        $rand = rand(0, $count - 1);
    
        echo $data[$rand]["answer"];
 
        }else{
            echo "I don't understand that command yet. My master is very lazy. Try again in 200 years. You could train me to understand this using this format <strong>train: question # answer</strong>!";
        }
    
        
        }else{
            echo "Enter a valid command!";
        }
    }else{
        $sql = "DELETE FROM chatbot WHERE question = '' OR answer=''";
        $q = $conn->query($sql);
        $count = $q->rowCount();
        if($count > 0){
            echo "All empty questions and answers deleted!";
        }else{
            echo "There is no question or answer that is empty!";
        }

    }
    }


if (isset($_GET["query"])) {
    include_once realpath(__DIR__ . '/..') . "/answers.php"; 
    if(!defined('DB_USER')){
        require "../../config.php";
      }
      try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
      }
global $conn;
$image_filename = '';
$name = '';
$username = '';
$sql = "SELECT * FROM interns_data where username = 'bytenaija'";
foreach ($conn->query($sql) as $row) {
    $image_filename = $row['image_filename'];
    $name = $row['name'];
    $username = $row['username'];
}

global $secret_word;

try {
    $sql = "SELECT secret_word FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}


    processQuestion($_GET['query']);
    
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu|Lato' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Bytenaija - HNG Internship 4</title>

    <script>
        function updateClock(){
            console.log("called ")
            let d = new Date().toUTCString();
            d = d.substr(0, d.indexOf("GMT")-9)
             d += " - " + new Date().toLocaleTimeString();
            document.getElementById('time').innerText = d;
            
            return 0;
             
               
        }

         window.onload = function(){
            updateClock();
          var j=  setInterval(updateClock, 1000);
         }
    </script>
    
    <style>
    html, body, *{
    margin: 0;
    padding: 0;
}

header{
    width: 100%;
    margin-top : 4rem;
    text-align: center;
    font-family: 'Ubuntu';
    background-color: #632F2F;
    padding: 2rem 0;
    color: #E0D3D3;
    font-size: 200%;
}

section{
    background: url("http://res.cloudinary.com/bytenaija/image/upload/v1523620935/pexels-photo-248797.jpg") no-repeat center center;
    background-attachment: fixed;
    background-size: cover;
    color: #330505;
    padding: 2rem;
    min-height: 40rem;
    
}

aside{
    
    float:right;
    
    margin-right: 5rem;
    text-align: center;
}


aside img{
    border-radius : 50%;
    width: 15rem;  
    height: 15rem; 
    box-shadow: #330505 0 0 2rem;
  
       
}

aside h4{
font-size: 150%;
font-family: 'Roboto';
text-shadow: white 0 0 .5rem;

}

section h2, h3{
    color: #330505;
    font-size: 300%;
    font-family: 'Poppins';
    text-shadow: white 0 0 .5rem;
    
}

section h2:first-child{
    
    margin-top: 1rem;
}

.clear{
    clear: both;
}


.left{
    float: left;
}

.me{
    font-size: 100%;
}

.about {
    text-shadow: 5px 0 1rem #330505;
    font-size: 200%;
    color:aqua;
    text-align: center;
    margin-bottom: 2rem;
}

.me p{
   box-shadow: 1px 1px .5rem aqua;
    width: 20rem;
    margin: 1rem 2rem;
    background-color: white;
    font-size: 150%;
}


.me .left p, .me .right p{
    transition: transform 1s  ease-in-out;
    cursor: pointer;
    position: relative;
    padding:.5rem;


}

.me .left, .right{
    position: relative;
    top: -300px;
    animation: mymove 5s;
    animation-fill-mode: forwards;
}

@keyframes mymove{
    0%{
        top: -300px;
        
    }

    25%{
        top: -225px;
        
    }

     50%{
        top: -150px;
    }
    75%{
        top: -75px;
    }
    100%{
        top: 0px;
    }
}
.me .right{
    margin : 0;
    float:right;

    
    
}

.me .right p{
   transform: skew(20deg);

}

.me .left p{
   transform: skew(-20deg);
}

.left p:hover, .right p:hover{
    box-shadow: 1px 1px .5rem #330505;
   transform: skew(0deg);
   background-color:aqua;
}
.bot{
    width : 60%;
    margin: .5rem auto;
}
.form-control{
    width : 100%;
}

 input{
   
    padding: .5rem !important;
    
}

#botresponse{
    width: 100%;
   
    height: 15rem;
    overflow-y: scroll;
    padding: 1rem;
    font-family: Lato;
    color:#330505;
    border-left: 1px solid #330505;
    box-shadow: 1px 5px 3rem aqua;
}

.bot input{
    height: 1.5rem;
    box-shadow: 0 0 2rem aqua;
    border-radius: .5rem;
    margin-left: .5rem;
}

.bot #botresponse div{
    margin-bottom: 1rem;
    font-family: Lato;
}



.bot .botnet{
   color: white;
   background-color: black;
   padding:.2rem;
   margin-right: .5rem;
   margin-bottom: .2rem;
   display: inline-block;
   font-family: Lato;
}
.bot .user{
    color: Red;
   background-color: rgba(0,0,0,.5);
   padding:1rem;
   margin-right: .5rem;
   margin-bottom: .2rem;
   display: inline-block;
   font-family: Lato;
}
.bot .res{
    background-color:white;
    display: inline-block;
    font-family: Lato;
    padding:.5rem 1rem;
    width: 20rem;
    background-color: #1E73E8;
}

.bot .userres{
    background-color:white;
    display: inline-block;
    font-family: Lato;
    padding:.5rem 1rem;
    min-width: 20rem;
    background-color: #EB5757;
}
.bot #botresponse::-webkit-scrollbar {
    width: 2rem;
}

/* Track */
.bot #botresponse::-webkit-scrollbar-track {
    background: aqua; 
}

/* Handle */
.bot #botresponse::-webkit-scrollbar-thumb {
    background: white; 
}

/* Handle on hover */
.bot #botresponse::-webkit-scrollbar-thumb:hover {
    background: #555; 
}


.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
color: #000000;
opacity: 1; /* Firefox */
font-family: Lato;
}

  input:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #000000;
    font-family: Lato;
}
.move-right{
    animation: move  5s;
    animation-fill-mode: forwards;
    position: relative;
    left: -100%;
    

}

@keyframes move{
   from{
        left:-100%;
    }

    to{
        left:18%;
    }

}
@media screen and (max-width: 900px){

html, body{
    margin: 0;
    padding: 0;
}
    .bot{
        width : 100%;
        margin: 0 0;
    }

    aside{
    
    float:none;
    
    margin-right: 0rem;
    text-align: center;
    width: 100%;
}

aside img{
    border-radius : 50%;
    width: 15rem;  
    height: 15rem; 
    box-shadow: #330505 0 0 2rem;
  
       
}

aside h4{
font-size: 150%;
font-family: 'Roboto';
text-shadow: white 0 0 .5rem;

}

section h2, h3{
    color: #330505;
    font-size: 100%;
    font-family: 'Poppins';
    text-shadow: white 0 0 .5rem;
    
}

section{
   width: 100%;
   margin-bottom: .5rem;
}
.me{
    width:100%;
}
.left{
    float :none;
    width: 100%;
    text-align: center;
}

.right{
    float :none;
    width: 100%;
    text-align: center;
}

.me p{
   box-shadow: 1px 1px .5rem aqua;
    width: 80%;
    margin: .5rem auto  ;
    background-color: white;
    font-size: 100%;
    text-align: center;
}

header{
    width: 100%;
    margin-top: 4rem;
}
.botres{
    float:right !important;
}

.bot .botnet{
    font-size:80%;
}
.bot .user{
    font-size:80%;
}
.bot .res{
    font-size:80%;
   
}

.about{
    font-size: 100%;
}
}
    </style>
</head>
<body>
<?php

if(!defined('DB_USER')){
    require "../../config.php";
  }
  try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
global $conn;
$image_filename = '';
$name = '';
$username = '';
$sql = "SELECT * FROM interns_data where username = 'bytenaija'";
foreach ($conn->query($sql) as $row) {
    $image_filename = $row['image_filename'];
    $name = $row['name'];
    $username = $row['username'];
}

global $secret_word;

try {
    $sql = "SELECT secret_word FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}
?>
    <header>
        <h1>Welcome to HNG  <br />Internship 4</h1>
    </header>

    <section class="content">
        <div class="left">
        <h2>My name is <?php echo $name; ?>.</h2>
        <h3>It is great to be part of <br />HNG Internship 4</h3>
        </div>

        <aside>
            <img src='http://res.cloudinary.com/bytenaija/image/upload/v1523616184/me2.jpg' alt="Me" />


            <h4 id="time"> 
               
        
        
    </h4>
        </aside>

        
    <div class="clear">&nbsp;</div>
    <h1 class="about">I am a FullStack Developer from Nigeria.</h1>
    <div class="me">
    
    <div class="left">

    <p>Vue.js</p>
    <p>React.js</p>
    <p>Bootstrap</p>
    <p>jQuery</p>
    </div>
    <div class="right">
    <p>Node.js/Express.js</p>
    <p>PHP/Laravel</p>
    

    <div class="clear">&nbsp;</div>
    </div>
    <div class="clear">&nbsp;</div>
    
    </div>

    <div class="bot move-right">
    <h2>Byte9ja Chatbot</h2>
    <div id="botresponse"> </div>
    <br />
    <input type="text" name="botchat" placeholder="Chat with me! Press enter to send." onkeypress="return runScript(event)" onkeyDown="recall(event)" class="form-control">
    </div>
    </section>

<script>
let url = "profiles/bytenaija.php?query=";
url = window.location.href + "?query=";

let botResponse = document.querySelector("#botresponse");
window.onload = instructions;
let stack = [];
let count = 0;
function recall(e){
    let input = e.currentTarget;
    if(e.keyCode == 38){
       
        console.log(count)
        if(stack.length > 0){
       if(count < stack.length){
        let command = stack[stack.length- count -1];
        input.value = command;
            }else{
                count =0
            }
            count++;
        }
    
    }else if(e.keyCode == 40){
        if(count > 0){
            count--;
            console.log(count)
            let command = stack[count];
            input.value = command;
        }
        
    }
}
function runScript(e) {
if (e.keyCode == 13) {
    let input = e.currentTarget;
    let dv = document.createElement("div");
            dv.innerHTML = "<span class='user'>You: </span> <span class='userres'>" + input.value + "</span>";
           botResponse.appendChild(dv)
           stack.push(input.value)
    
   let urlL = url + encodeURIComponent(input.value);
   console.log(urlL);
    fetch(urlL)
    .then(response=>{
        
        return response.text();
    })
    .then(
        response=>{
            console.log(response)
            print(response);
        });
        input.value = '';
}

}

function print(response){
    let dv = document.createElement("div");
            dv.innerHTML = "<div class='botres' style='float: right;'><span class='res'>" + response + "</span><span class='botnet'>Byte9ja</span></div>";
           botResponse.appendChild(dv)
           botResponse.scrollTop = botResponse.scrollHeight;
}

function instructions(){
    $string = '<div class="instructions">My name is byte9ja. I am a Robot. Type a command and I will try and answer you.<br> Meanwhile, try this commands';
    $string += "<li><strong>deleteEmpty record - to delete any record the question or answer is empty</strong></li>";
    $string += "<li><strong>train: question # answer - to train me and make me more intelligent</strong></li>";
    $string += "</div>"
 
   print($string);
}
</script>
</body>
</html>
<?php
}
?>
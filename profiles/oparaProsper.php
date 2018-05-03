<?php

    if($_SERVER['REQUEST_METHOD'] === "POST"){

        // require config.php to get database login details
        include '../../config.php';
        // Establish connection to the database using PDO
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
        $userPost = trim($_POST['userInput']);

        if(isset($userPost)  && isset($userPost) != '' ) {

            // train the bot if the userInput questions are not on the database
            $userInputExplode = explode(":", $userPost);
   
            if($userInputExplode[0] == 'train'){

                $explode = explode("#", $userInputExplode[1]);
                $question = trim($explode[0]);
                $answer = trim($explode[1]);
                $password = trim($explode[2]);
                // Sql connection to db
                $sql = "insert into chatbot(`question`, `answer`) values ('{$question}', '{$answer}')";
                $status = $conn->prepare($sql);
                $status->execute();   

                if($password != 'password'){
                    echo "Password is incorrect use 'password' as the password";
                    exit();
                } else{
                    echo 'you successfully trained me';
                    exit();
                }
            }
            
            //get the length of the user input
            $userInputLength = strlen($userPost);
            //query chatbot table with user input
            $dbCheck = "SELECT * FROM chatbot WHERE question LIKE '$userPost%' ";
            $querydb = $conn->prepare($dbCheck);
            $querydb->execute();

            //return all the results from the query
            $queryResult = $querydb ->fetchAll(PDO::FETCH_OBJ);
            $queryResultRowCount = $querydb ->rowCount();

            if($queryResultRowCount == 1) {
                echo $queryResult[0]->answer;
                exit();
            }else if($queryResultRowCount > 1) {
                echo $queryResult[rand(0, $queryResultRowCount - 1)] ->answer;
                exit();
            }else if(strtolower($userPost) == 'aboutbot'){ 
                echo "version --1.0.0";
            }else{
                echo " I don't understand you. Please train me ";
                exit();
            }


           
            exit();
        }else if($userPost == ''){
            echo "please enter a word into the text field";
            exit();
        }

    }


    //PDO connection to database to get username, imag file.
    try{
        $queryUser = $conn->query(" SELECT * FROM interns_data WHERE username = 'oparaProsper' " );
        $prosper = $queryUser->fetch(PDO::FETCH_OBJ);

    } catch (PDOException $pe) {
        echo $e-> getMessage();
    }
    

    try{

        $querySecretWord = $conn->query("SELECT * FROM secret_word");
        $secretWord = $querySecretWord->fetch(PDO::FETCH_OBJ);
        $secret_word = $secretWord->secret_word;

    } catch (PDOException $pe) {
        echo $pe -> getMessage();
    }
    
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>I am opara prosper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/7c7493657e.js"></script>

    <style>
     @import url('https://fonts.googleapis.com/css?family=Asap');
        body{
            margin: 0;
            padding: 0;
            font-family: arial;
            background:rgb(116, 116, 116);
            height:100vh;
            font-family: 'Asap', sans-serif;
        }
        .about{
            width: 80%;
            margin: auto;
            text-align: center;
            position: relative;
            padding:1% 0;
            border-radius: 10px;
            /* background: rgb(43,40,40); */
        }
        .about img{
            width: 250px;
            height:250px;
            border-radius: 100%;
            border: 5px dashed rgb(205, 205, 206);
           
        }
        h1{
            text-align: center;
            text-transform: uppercase;
            color:rgb(59, 57, 57);
            width: 100%;
            margin: auto auto 1em;
            padding: .3em 0;
            font-size: 30px;
            background: white;
        }
        .about span{
            color: #00b2ff;
        }
        #name{
            width: 100%;
            display: flex;
            background: rgb(205, 205, 206);
            margin: 0 ;
            align-content:center;
            justify-content: space-between;
            height: 250px;
            padding: 7em 0;
        }
        h2{
            color: white;
            width: 20%;
            border-bottom: 2px dashed white;
            text-align: center;
            margin: auto;
        }
        .nameContent{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            width: 30%;
        }
        #about{
            width: 100%;
            margin: 0 ;
            text-align: left;
            background: rgb(59, 57, 57);
            padding: 20% 5% 10%;
            color: white;
            font-size: 20px;
        }
       #icon .fa{
           background: #365899;
           padding: .5em 0;
           border-radius: 100%;
           color: black;
           width: 2em;
       }
       #icon .fa:hover{
           background: white;
       }
       #skills{
           /* background: rgb(37, 37, 39); */
           width: 30%;
           text-align: left;
           color: white;
           display: flex;
           flex-wrap: wrap;
           align-content: center;
           justify-content: space-evenly; 
       }
       #skills p{
           width: 30%;
           margin: 0;
           color: rgb(59, 57, 57);
           text-transform: capitalize;
           font-size: 15px;
       }
       #skills h3{
           width: 100%;
           color: rgb(59, 57, 57);
           background: white;
           margin: auto auto 1em;
           padding: .4em;
           text-transform: uppercase;
           font-size: 25px;
       }


       /*my bot css styling*/
       #hngBot{
           background: rgba(0,0,0,0.7);
           margin: 0;
           padding-bottom: 70%; 
           position: absolute;
           width: 100%;
           height: 100%;
           z-index: 1;
           left: 0;
           display: none;
           
           font-style: bold;
       }
       #bot{
           position: fixed;
           left: 95%;
           top:90%;
           padding: .3em;
           text-align: center;
           background: rgb(59, 57, 57);
           color: rgb(9, 167, 240);
           z-index: 2;
       }
       #botForm{
           background: rgb(255, 255, 255);
           width: 35%;
           bottom: 6em;
           left: 64%;
           font-size: 15px;
           position: fixed;
           color: white;
           border-top-right-radius:20px;
           border-top-left-radius: 20px;
           text-align: left;
       }
       #botForm span{
           color: black;
           text-transform: uppercase;
       }
       #botIntro{
           width: 100%;
           text-align: left;
           height: 250px;
           background:rgb(9, 167, 240);
           padding: 0 10%;
           border-top-right-radius:20px;
           border-top-left-radius: 20px;
           margin: 0 0 1em;
           box-shadow: 0 0 10px rgba(0,0,0,0.9);
           display: flex;
           align-content: center;
           justify-content: space-between;
           font-style: bold;
       }
       #botIntro p{
           width: 80%;
           margin: 3% 0 0;
       }
       #botForm input{
           width: 100%;
           padding: 1.5% 1%;
           background: white;
           box-shadow: 0 0 5px rgba(0,0,0,0.9);
           background:#333;
           border: none;
           color:white;
       }
      #conversationPortal{
          text-align: left;
          overflow-y: scroll;
          margin-top: 0;
          height: 300px;
      }
      #conversationPortal p{
          float: left;
          clear: both;
          padding: .5em 2em;
          background: gray;
          color: white;
          margin: .5em 1em;
          text-align: left;
          border-bottom-Left-radius: 20px;
          border-bottom-right-radius: 5px;
          border-top-right-radius: 5px;
          box-shadow: 0 0 -3px rgba(0,0,0,0.9);
      }
       #botIntro img{
           margin: 1em 0 0;
           width: 15%;
           height: 25%;
           border-radius: 100%;
           border: 3px solid #007bff;;
       }
       #introBot{
           position: fixed;
           top: 90%;
           right: 2%;
           z-index: 1;
           width: 0px;
           overflow-X: hidden;
           height: 64px;
           background: white;
           border-top-right-radius: 30px;
           border-bottom-right-radius: 30px;
           background: white;
           color: black;
           line-height: 64px;
           /* border-radius: 100%; */
       }
       .botIntro{
           width: 34%;
           -webkit-animation: botIntro 3s ease-out;
           -webkit-animation-fill-mode: forwards;
           font-size: 15px;
           margin: 0;
       }
       @-webkit-keyframes botIntro{
           from{
            width: 0%;
           }
           to{
            width: 34%;
            padding: 0 0 0 10px;
           }
       }

      
    </style>
</head>

<body>
    <!-- Javis(bot) -->
    <section id="botSection">
        <div id="hngBot">
    
            <div id="botForm">
                <div id="botIntro">
                    <img src="<?php echo $prosper->image_filename ?>" alt="bot picture">
                    <p>
                        <span>Quick guide</span><br/>
                        * To train me type -- train: question # answer # password 
                    </p>
                </div>

                <div id="conversationPortal">
                    <p>Lets talk</P>
                </div>
    
                <form id="botChatForm">
                    <input type="text" name="askBot" placeholder="Ask me anything">
                </form>
            </div>
        </div>

        
        <i id="bot" class="fa fa-envelope fa-2x"></i>

        <div id="introBot">
            hello i'm PROSPER <i style="color: red" class="fa fa-smile-o fa-1x"></i>.
            I need your help to become human.
        </div>
    <section>
       
    <!-- My profile -->
    <article class="about">
        
        <section>

            <div id="name">

                <div class="nameContent">
                    <?php
                        echo"<h1> $prosper->username </h1>";
                    ?>

                    <div id="icon">
                        <a href="https://twitter.com/opara.prosper"><i class="fa fa-facebook "></i></a>
                        <a href="https://twitter.com/opara_prosper"><i class="fa fa-twitter "></i></a>
                        <a href="https://github/opara-prosper"><i class="fa fa-github "></i></a>
                        <a href="https://medium.com/@oparaprosper79"><i class="fa fa-medium "></i></a>
                    </div>
                </div>

                <div>
                    <img src="<?php echo $prosper->image_filename ?>" alt="This is my picture">
                </div>

                <div id="skills">
                    <h3>Language stack</h3>
                    <p><i class=""></i> html</p>
                    <p>css</p>
                    <p>php</p>
                    <p>javascript</p>
                    <p>jquery</p>
                    <p>bootstrap</p>

                </div>
            </div>

            <article id="about">            

                <h2># ABOUT</h2>
                <p>
                    I am <span><?php echo $prosper->name ?></span>, i'm a web developer based in aba and currently an undergraduate at the federal university of technology owerri. I am a knowledge junkie and always seek to learn new things [ that's why am working hard to become proficient in php].
                </p>
            </article>

            

        </section>
        
       
    </article>

    

    <script>
    
    const bot = document.getElementById("bot");
    // flag variable helps keep track of how many times
    // i engage a click event so i can easily hide and show my hngBot
    let flag = true;

    bot.addEventListener("click", function(e){   
        const hngBot = e.target.previousElementSibling;

        function animate(){
            const botIntro = document.getElementById("introBot");
            botIntro.className = "botIntro";
        }


        if (flag) {   

            hngBot.style.display = "block";
            flag = false;

            animate();
        } else {
            hngBot.style.display = "none";
            flag = true;

        }

    });   

    const botForm = document.forms["botChatForm"];

    

    botForm.addEventListener("submit", function(e){

        //Am using AJAX to connect to my server asynchronously
        const http = new XMLHttpRequest();
        // get the user Input to chat with the bot
        const botChat = botForm.children[0];
        // get the conversationPortal 
        const conversationPortal = document.getElementById("conversationPortal");
        // create conversion elements
        const userChat = document.createElement("p");
        const botReply = document.createElement("p");
        

        //my Ajax connection config
        http.onreadystatechange = function () {
            if( http.readyState == 4 && http.status == 200){
                botReply.textContent = http.responseText;
                botReply.style.background = "gray";
                // console.log(http.response);
            }
        };
        http.open("POST", "profiles/oparaProsper.php", true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("userInput=" + botChat.value);
        
        e.preventDefault();
        

        userChat.textContent = botChat.value;
        userChat.style.float = "right";
        userChat.style.clear = "both";
        userChat.style.width = "inline-block";
        userChat.style.padding = ".5em 2em";
        userChat.style.borderBottomRightRadius = "20px";
        userChat.style.borderBottomLeftRadius = "5px";
        userChat.style.borderTopLeftRadius = "5px";
        userChat.style.borderTopRightRadius = "0";
        userChat.style.background = " rgb(50, 52, 53)";
        userChat.style.color = " white";


        conversationPortal.appendChild(userChat);
        conversationPortal.appendChild(botReply);

        

    })

    </script>     
</body>
</html>

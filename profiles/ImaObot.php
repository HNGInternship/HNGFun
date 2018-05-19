<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
   require '../../config.php';
        //die('Hi');
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        if(!$conn){
            die('Unable to connect');
        }
        $question = $_POST['message'];
        $pos = strpos($question, 'train:');

        if($pos === false){
            $sql = "SELECT answer FROM chatbot WHERE question like '$question' ";
            // $sql = "SELECT answer FROM chatbot WHERE question = ' ".$question." ' ";
            $query = $conn->query($sql);
            if($query){
                echo json_encode([
                    'results'=> $query->fetch_all()
                ]);
                return;
            }
        }else{
            $trainer = substr($question,6 );
            $data = explode('#', $trainer);
            $data[0] = trim($data[0]);
            $data[1] = trim($data[1]);
            $data[2] = trim($data[2]);

            if($data[2] == 'password'){

                $sql = "INSERT INTO chatbot (question, answer)
                VALUES ('$data[0]', '$data[1]')";


                $query = $conn->query($sql);
                if($query){
                    echo json_encode([
                        'results'=> 'Trained Successfully'
                    ]);
                    return;
                }else{
                    echo json_encode([
                        'results'=> 'Error training'
                    ]);
                    return;
                }
                
            }else{
                echo json_encode([
                    'results'=> 'Wrong Password'
                ]);
                return;
            }
            
        }
        
        echo json_encode([
            'reply'=>  'working'
        ]);
        
    return ;
    }else{
        //echo 'HI';
        //return;
    }
    


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STAGE3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
    <style>
     img{
     border-radius: 50%;
    } 
    .rotateimg180{
         -webkit-transform:rotate(270deg);
        -moz-transform:rotate(270deg);
        -ms-transform: rotate(270deg);
        -o-transform: rotate(270deg);
         transform: rotate(270deg); 
    }
    .ima{
        text-align: center; 
        width: 652px;
        /* height: 500px; */
        background-color: rgb(83, 179, 179);
        /* border-color: blueviolet; */
    } 
    .eli{ 
    border:  solid black;
    border-width: 2px;
    width: 650px;
    
    }
    .pro{
        font-size: 20px;
        color: black;
        
    }
    h3{
        
       color: black;
       text-align: center; 
       font-size: 35px;
       font-family: 'Trebuchet MS';
    }
    .head{
        background-color: rgb(83, 179, 179);
    border-width: 2px; 
    text-align: center;
    }
    .botbot{
        background-color:rgb(83, 159, 169);
         width:650px;
         position: relative;
         /* left: 600px;
         bottom:500px;
         height:132px; */
    }
    .font{
        font-size: 35px;
    }
    #chat-area{
        border:5px ridge aliceblue;
        height:200px;
        background-color:white;
        overflow-y:scroll;
    }
    </style>
</head>
<body>
<section id="profile">

    <div class="ima">
            <div class="eli">
                   
                <div class="head">
                        <h3>
                                IMAOBOT'S PROFILE
                                <hr style=" border: 1px dotted black;">
                            </h3>  
                                               
                </div>
            
            <img src="https://res.cloudinary.com/dbvitxz4y/image/upload/v1525789006/cute.jpg"  width="200" height="200" alt="profile" class="rotateimg180">
        <!-- </span> -->
       <p>          
       Am a web designer that designs for fun during my leisure.<br> Am aspiring to become a web developer. <br>I love to love and I hate to hate, always grateful to God, my parents and loved ones. 
              </p><br>
              <p>
              <b> NAME:</b> Imaobong Elijah Obot<br>
               <b/>OCCUPATION:</b> Web Designer<br>
              <b> HOBBIES:</b> Playing games, Singing
            </p>
 </div>        
        <div class="container">
            <div id='chat-area'>
            <p></p>
                <p></p>
                <p></p>

            </div>
            <div class="botbot"> 
                <div class="font" style="color: rgb(13, 36, 53); text-align: center;"> IMA'S BOT</div>
                                <input type="text" name="message" id="message"> 
                <button onclick="loadDoc()">Send</button>
            
        
           
                    <!-- <textarea name="chat" id="chat" cols="20" rows="10" style="width: 644px; height: 80px;"> CHAT HERE</textarea> -->
        
        <!-- <div class="pro ">
            </pre> -->
            <br><br>
           
            <span class="input-group-addon" id="basic-addon1">  
             <a href="https://www.facebook.com/imaobong.obot.184" class="fab fa-facebook-square" style=" font-size: 30px; "></a>
                <a href="https://github.com/Imaobong-Elijah" class="fab fa-github" style=" font-size: 30px; "></a> 
                <a  href="https://www.whatsapp.com/Imaobong Obot" class="fab fa-whatsapp-square" style=" font-size: 30px;"></a>
            </span>   
        
      
        
   
        </div>
    </div>
 </div>
</section>
    <script>
            function loadDoc() {
                // alert('Hello');
                var message = document.querySelector('#message');
                //alert(message.value);
                var p = document.createElement('p');
                p.id = 'user';
                var chatarea = document.querySelector('#chat-area');
                p.innerHTML = message.value;
                chatarea.appendChild(p);
                
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    var result = JSON.parse(xhttp.responseText);
                    
                    var pp = document.createElement('p');
                    pp.id = 'bot';
                    if(result.results == ''){
                        pp.innerHTML = 'Not in database. please train me';
                        chatarea.append(pp)
                        return;
                    }
                    console.log(typeof(result.results))
                    if(typeof(result.results) == 'object' ){
                        var res = Math.floor(Math.random() * result.results.length);
                        pp.innerHTML = result.results[res];
                        chatarea.append(pp)
                    }else{
                        var res = Math.floor(Math.random() * result.results.length);
                        pp.innerHTML = result.results;
                        chatarea.append(pp)
                    }
                    
                    }
                };
                xhttp.open("POST", "/profiles/ImaObot.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("message="+message.value);
            }
            </script>
</body>
</html>
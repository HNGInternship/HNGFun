<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //die('Hi');
        $conn = new mysqli('localhost', 'root', '', 'hng_fun');
        
        if(!$conn){
            die('Unable to connect');
        }
        $question = $_POST['message'];
        $pos = strpos($question, 'train:');

        if($pos === false){
            $sql = "SELECT answers FROM chatbot WHERE questions like '$question' ";
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

                $sql = "INSERT INTO chatbot (questions, answers)
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
        height: 500px;
        background-color: rgb(83, 179, 179);
        /* border-color: blueviolet; */
    } 
    .eli{ 
    border:  solid black;
    border-width: 2px;
    height: 700px;
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
        background-color:rgb(87, 76, 76);
         width:650px;
         /* height:132px; */
    }
    .font{
        font-size: 35px;
    }
    p{
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <div class="ima">
            <div class="eli">
                   
                <div class="head">
                        <h3>
                                IMAOBOT'S PROFILE
                                <hr style=" border: 1px dotted black;">
                            </h3>  
                                               
                </div>
        <p style="margin-bottom: 70px;">    
    <!-- <div class="container"> -->
        <!-- <img src="..." alt="..." class="rounded-circle"> -->
        <!-- <span class="border border-success"> -->
            
            <img src="https://res.cloudinary.com/dbvitxz4y/image/upload/v1525789006/cute.jpg"  width="200" height="200" alt="profile" class="rotateimg180">
        <!-- </span> -->
        <br clear="left" />
       Am a web designer that designs for fun during my leisure.<br> Am aspiring to become a web developer. <br>I love to love and I hate to hate, always grateful to God, my parents and loved ones. 
    <br> 
   </p>
    <div class="pro" style="background-color: white; ">
        <p style="color: black;">
               NAME: Imaobong Elijah Obot<br>
               OCCUPATION: Web Designer<br>
               HOBBIES: Playing games, Singing
            <!-- </pre> -->

        </p>
        <div>
        <div class="container">
            <div id='chat-area'>
            <div class="botbot" style="height: 140px; background-color:rgb(87, 76, 76);"> 
                <div class="font" style="color: rgb(13, 36, 53); text-align: center;"> IMA'S BOT</div>
                <input type="text" name="message" id="message"> 
                <button onclick="loadDoc()">Send</button>
            </div>
            <br><br>
            <span class="input-group-addon" id="basic-addon1">  
                <i class="fab fa-facebook-square" style=" font-size: 30px; color: rgb(83, 179, 179); "></i> 
                <i class="fab fa-github" style=" font-size: 30px; color: rgb(83, 179, 179); "></i> 
                <i class="fab fa-whatsapp-square" style=" font-size: 30px; color: rgb(83, 179, 179); "></i>
            </span>   
                    <!-- <textarea name="chat" id="chat" cols="20" rows="10" style="width: 644px; height: 80px;"> CHAT HERE</textarea> -->
        </div>
        </div>
    </div>

        <!-- <div class="botbot" style="height: 130px;"> 
                <div class="font" style="color: rgb(13, 36, 53); text-align: center;"> IMA'S BOT</div>
                <form method="POST">
                    <div class="chat" id="chat">
                    <textarea name="chat" id="chat" cols="20" rows="10" style="width: 644px; height: 80px;"> CHAT HERE</textarea>
        </div>
                    <input type="text" id="mgs" name="mgs"> 
                    <button  style=" height: 35px; width: 80px;" type="button" onclick="alert('sent!')">Send</button>
                </form> -->
            </div>
            </div>
                         </div> 
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
                xhttp.open("POST", "ImaObot.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("message="+message.value);
            }
            </script>
</body>
</html>
<?php
// require 'conn.php';

// try{
//    $sql = 'SELECT * FROM secret_word';
//    $q = $conn->query($sql);
//    $q->setFetchMode(PDO::FETCH_ASSOC);
//    $data = $q->fetch();
//    $secret_word= $data['secret_word'];
// } catch (PDOException $e){
//        throw $e;
//    }


// $result2 = $conn->query("Select * from interns_data where username = 'Uddy'");
// $user = $result2->fetch(PDO::FETCH_OBJ);


if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require '../../config.php';
            //die('Hi');
            $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            
            if(!$conn){
                echo json_encode([
                'results'=> $query->fetch_all()
                ]);
                return;
            }
            $question = $_POST['message'];
            $pos = strpos($question, 'train:');
    
            if($pos === false){
                $sql = "SELECT answer FROM chatbot WHERE question like '$question' ";
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
                'results'=>  'working'
            ]);
            
        return ;
        }else{
            //echo 'HI';
            //return;
        }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>My Profile</title>
   
</head>
<style>
     .imgstyle{
        
        width:20rem;
        height:20rem;
        border-image: 3px solid grey; 
        position: relative;
        margin-top: 50px;
        margin-left:10%;
    } 
    .container{
        background-color: #044252;
        padding:50px;
        /* height: 800px; */
    }
    .butty{
        background-color:#464d91;
        color:#fff;
        border-color:#464d91;
        font-size:20px;
    }
    .txt{
        color:white;
        margin-top: 50px;
        font-size: 17pt;
        
    }
    .bot{
        border:5px solid aliceblue;
        background-color:aliceblue;
        opacity:0.5%;
        max-height:200px;
        overflow-y:scroll;
        padding:40px;
        border-radius:5px 5px 5px 5px;
    }
    .area{
        width:50%;
        max-height:20px;
        border-color:blue;
        border-radius:5px;
    }
    
   
</style>
<body class="profile">
    <br>
    <div class="container ">
         <div class="row">
         
            <div class="col-md-6">
                <img src="https://res.cloudinary.com/djdsmtbvk/image/upload/v1524210950/IMG_20170926_095728.jpg" alt="" class="img-fluid imgstyle rounded-circle">

            </div>
            <div class="col-md-6 ">
                <p class="txt"><span style=""><b>Hi I'm Amiable,</b></span><br>A student of the University of Uyo, Akwa Ibom state.An undergraduate in computer 
                    science currently undergoing my industrial training at Start Innovation
                    Center.My passion is using technology based solutions to solve real life challenges.

                </p>
                 <h4  class="text-center"style="color:white">Amy's bot</h4>
                <div class="bot">
                    <h6> Hi! I'm a bot what's up?</h6>
            
                        <div id='chat-area'>
                        
                        </div>
                </div>
                <div class="input-group mb-8">
                    <input type="text" class="form-control " placeholder="Type here to chat with  me" name="message" id="message">
                    <button  class="butty"onclick="loadDoc()">Send</button>
                </div>
                

            </div>
    
      </div>
      <script>
        function loadDoc() {
            //alert('Hello');
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
                    pp.innerHTML = 'I\'m confused. please train me using this:<br>train:Question# Reply#password';
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
            xhttp.open("POST", "/profiles/Uddy.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("message="+message.value);
        }
        </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
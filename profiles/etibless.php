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
            require '../db.php';
            //die('Hi');
           // $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            
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
<title>HNG Profile For etibless</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style>
  body {
    font-family: 'Rationale', sans-serif;
  }

  .card{
    box-shadow: 0px 0px 2px #2196f3;
    width: 50%;
  }

  .h2{
      color: #563d7c;
      padding:0 0 0 90px;
  }

  .h3{
      color: #42a5f5;
  }
  .h4{
      color: #64b5f6;
  }
  p{
      color: #93f990;
      text-align: justify;
  }
  .ChatBot{
    margin: 200px 10px 0 800px;
    position:absolute;
    /* z-index: 30; */
    background: cornflowerblue;
    width: 25rem;
    height: 30rem;
    box-shadow: 1px  1px 4px black;


  }
  #user{
      margin-left:13rem;
      margin-right:1rem;
      border-radius: 5%;
      background-color:white;
      text-align:center;
      color:cornflowerblue;
}
#bot{
      margin-left:0.5rem;
      margin-right:13rem;
      border-radius: 5%;
      background-color:black;
      color:white;
      text-align:center;
}
#msg{
    background-color:black;
    text-align:center;
    background-color:black;
    
}
ll{
  position:absolute;
  background-color: rgb(1, 1, 7)
}

.part1{
  margin-left:70px;
  width: 1300px;
  position:absolute;
  margin-bottom:10px; 
}
hr{
  margin: 0 90 0 0;
  margin-left:70px;
  outline-color: white;
}
.type{
  margin: 135 10 0 10;  
  width: 300px;
}
input{
    margin: 10px;
}
#sh{
  padding: 10px;
}
#chat-area{
    margin-top:20px;
    height:230px;
    Overflow:scroll;
}
</style>
</head>

<body class="bg-light">
<div class="container">
<div class="part1">
<div class="main d-flex justify-content-left align-content-left ">
  <div class="card mt-5 py-5">
    <div class="my-3">
            <p class="h2"><b>Hello Friend!</b></p>
            <div class="d-flex justify-content-center">
                <img src="http://res.cloudinary.com/dxv1e5ph1/image/upload/v1524143885/profile.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="jobitez">
                  </div>
                  <div style="padding:0 0 0 70px; text-shadow:1px 2px 1px #353435;">
      <br>
         <hr>
      <br>  
      <p class="h4">My name is PRINCEWILL EDWARD</p>    
      <p class="h4">My username is: <i>etibless</i></p>
      <p >Thank you for stoping by</p>
      <p class="h4"><b>I am an intermediate web Developer.
          <br>A 400 Level Computer Engineering Student
          <br>of University of Uyo, Uyo.</b></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ChatBot">
   
    <h3 style="padding:5px; color:rgb(181, 247, 224);text-shadow:1px 2px 1px #080808;">Etibless Chat!</h3><hr><br>
    <p id="msg">Hi There welcome, To Train me, Type: <br>Train: question#Answer#password</p>
    

            <div id='sh'>
                <div id='chat-area'>
                
                </div>
</div>
                <input type="text" name="message" id="message">
                <button onclick="loadDoc()">Send</button>
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
        xhttp.open("POST", "/profile.php?id=etibless", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
    }
    </script>
  
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>
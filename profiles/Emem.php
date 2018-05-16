<?php
<<<<<<< HEAD
 require 'db.php';
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
=======
       
        require '../../config.php';
        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
        
        if(!$conn){
            die('Unable to connect');
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
>>>>>>> 306b07817e52d3028043974c9945b701d9d70a10
  $secret_word = $result->secret_word;
<<<<<<< HEAD
  $result2 = $conn->query("Select * from interns_data where username = 'olubori'");
=======
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
    
>>>>>>> 306b07817e52d3028043974c9945b701d9d70a10
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <style>
     .aboutme{
       width: 500px;
       margin-left: 500px;
       margin-right: auto;
       padding-top: 50px;
       background-color: rgba(136, 7, 7, 0.438);
     }
     .me{
         color: white;
         font-size: 20px;
         font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         text-align: center;
     }
    </style>
</head>
<body>
    <div class="aboutme">
   <center> <img src="https://res.cloudinary.com/dtafmyxnn/image/upload/v1524231568/Emem.jpg" alt="Emmy" width="300" height="250"/><br />
       <div class="me"><b> I am Ememobong Daniel Bob</b><br /> 
        I am a Nigerian<br />
        I am a graduate of Information Technology/Business Information Systems<br />
        I am an optimist and a go-getter<br />
        I desire to be a web developer<br />
        I desire to be a techpreneur.</div><br /></center>
    </div>
<<<<<<< HEAD
=======
    <div id='bodybox'>
                <div id='chatborder'>
                  <p id="chatlog7" class="chatlog">&nbsp;</p>
                  <p id="chatlog6" class="chatlog">&nbsp;</p>
                  <p id="chatlog5" class="chatlog">&nbsp;</p>
                  <p id="chatlog4" class="chatlog">&nbsp;</p>
                  <p id="chatlog3" class="chatlog">&nbsp;</p>
                  <p id="chatlog2" class="chatlog">&nbsp;</p>
                  <p id="chatlog1" class="chatlog">&nbsp;</p>
                  </div>
                  <div><input style="width:170px" type="text" name="chat" id="chatbox" placeholder="chat here with me..." onfocus="placeHolder()"/>
                  <button style="float: right" onclick = loadDoc()><i class="fa fa-send-o fa-2x"></i></button></div>
                
  </div>
    
    </style>
    </div>
                <script>
    function loadDoc() {
        //alert('Hello');
        var message = document.querySelector('#chatbox');
        //alert(message.value);
        var p = document.createElement('p');
        p.id = 'user';
        var chatarea = document.querySelector('#chatlog1');
        p.innerHTML = message.value;
        chatarea.append(p);
        
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
        xhttp.open("POST", "/profiles/emem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
    }
    </script>
                
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>
>>>>>>> 306b07817e52d3028043974c9945b701d9d70a10
</body>
</html>
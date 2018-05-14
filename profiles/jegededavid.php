
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = preg_replace("([?.!])", "", $data);
        $data = preg_replace("(['])", "\'", $data);
        return $data;
    }
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
        if($data[2] == 'password'){
            $sql = "INSERT INTO chatbot (question, answer)
            VALUES ('$data[0]', '$data[1]')";
            $query = $conn->query($sql);
            if($query){
                echo json_encode([
                    'results'=> 'Successfully trained'
                ]);
                return;
            }else{
                echo json_encode([
                    'results'=> 'Training error'
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
        'results'=>  'Good to go'
    ]);
    
return ;
}
?>



<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    
    </head>
    
    
    <style>
        body{
            margin:0;
            padding:0;
            background-color: lightgrey;
            background-size:cover;
        }
        
        
        .box{
            width: 450px;
            background: rgba(0,0,0,0.4);
            padding: 40px;
            text-align:center;
            margin:auto;
            margin-top: 5%;
            color:white;
        }
        
        .box-img{
            border-radius: 50%;
            width: 200px;
            height:200px;
            
        }
        .box h1{
            font-size: 40px;
            letter-spacing: 4px;
            font-weight: 100;
        }
        
        .box h5{
            font-size: 25px;
            letter-spacing: 3px;
            font-weight: 100;
        }
        
        ul{
            margin: 0;
            padding: 0;
            
        }
        
        .box li{
            display: inline-block;
            margin: 6px;
            list-style: none;
        }
        
        .box li a{
            color: white;
            text-decoration:none;
            font-size: 60px;
            transition: all ease-in-out 250ms;
            
        }
        
        .box li a:hover{
            color:cornflowerblue;
            
        }
        
        #chatbot{
    background-color:#800080;
    padding: 1rem;
    border-radius: 10px;
   }
    #chat-area{
    height: 50vh;
    background-color:white;
    overflow-y:auto;
}
 .details, h1{
    color: white;
    padding: 2rem;
 }
    </style>
        
      
    <body>
        <div class="box">
            <img src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg" class="box-img">
            <h1>JEGEDE DAVID</h1>
            <h5>Web Developer-Web Designer</h5>
            <ul>
                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
            </ul>
        </div>
         <div class="col-md-6">
         <div id="chatbot">
            <h1>David's Bot</h1>              
            <div id="chat-area" class="chat-area">
            <p id="chatlog" class="chatlog"><p>To teach me use the format below</p>
           <p>train: your question # your answer # password</p>
            <p id="chatlog3" class="chatlog"><p>&nbsp;</p>
            <p id="chatlog2" class="chatlog"><p>&nbsp;</p>
            <p id="chatlog1" class="chatlog"><p>&nbsp;</p>
            
            </div>
            <div class="input-group mb-3">
            <input class="form-control chat " name="chat" id="chat" class="chat" placeholder="Hi there! Type here to talk to me.">            
            <button type= "button" onclick= loadDoc()> send</button>
            </div>
         </div>    
    </div>
        
             
    </body>
    
    
    
</html>
<script>
 function loadDoc() {
        // alert('Hello');
        var message = document.querySelector('#chat');
        // alert(message.value);
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
            message.value = '';
            var pp = document.createElement('p');
            pp.id = 'bot';
            console.log(result.results.length);
            
            if(result.results.length === 0){
                //alert('hello');
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
        
        
        xhttp.open("POST", "jegededavid.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
}
$('#chatbot').animate({
                scrollTop: chatbot.scrollHeight,
                scrollLeft: 0
            }, 100);
</script>








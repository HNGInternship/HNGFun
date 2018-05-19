<?php
// if (!defined('DB_USER'))
// {
// require "../../config.php";

// }

// try
// {
// $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
// }

// catch(PDOException $pe)
// {
// die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
// }

// global $conn;

// function checkQuestionExistence($question, $conn) {
// $sql = "SELECT * FROM chatbot WHERE question='$question'";
// $stm = $conn->query($sql);
// $stm->setFetchMode(PDO::FETCH_ASSOC);
// $result = $stm->fetchAll();
// return $result;
// }
// ?>



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
<!doctype html>
<html lang="en">
  <head>
    <title>My Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
    <title>My portfolio</title>
    <style>
.card-img-top{
    height:30rem;

}
.card-body{
    background-color: rgb(1, 1, 41);
}
.rounded-circle{
    border-radius:50%;
    height: 20rem;
    width:20rem;
    position: absolute;
    top:40px;
    left: 30em;
}
.fa {
    padding:20px ;
    font-size: 50px;
    /* width: 50px; */
    text-decoration: none;
}
#chatbot{
    background-color:rgb(1, 1, 53);
    padding: 1rem;
    border-radius: 10px;

}
#chat-area{
    height: 50vh;
    background-color:white;
    /* overflow-y:auto; */
}
.details, h1{
    color: white;
    padding: 2rem;
}
#About{
    background-color: rgb(163, 157, 157); 
    padding: 1rem;
}
#foot{
    background-color: rgba(14, 12, 12, 0.89);
}


</style>

    
</head>
  <body>


    <section id="profile">
        <div id="container">
                        <img class="card-img-top" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg" alt="Card image cap">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle">
                        </div>     
    <section id="About" >                   
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">     
                        <div class="details">     
                            <h3>Sifon Isaac</h3><br>
                            <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                           
                    </div>
                    </div>
    <div class="col-md-6">
         <div id="chatbot">
            <h1>Syfon's Bot</h1>              
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
    </div>
  </section>
 <section id="foot" >                   
        <div class="container">
                <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
              <a href="https://github.com/Syfon01" class="fa fa-github"></a>
              <a href="" class="fa fa-slack"></a> 

 </div>
</section>

</section>

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
        

        
        xhttp.open("POST", "/profiles/Syfon.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
}
$('#chatbot').animate({
                scrollTop: chatbot.scrollHeight,
                scrollLeft: 0
            }, 100);

</script>



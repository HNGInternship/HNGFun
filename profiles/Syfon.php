<?php
// if (!defined('DB_USER'))
// {
// require "../../config.php";

// }

<<<<<<< HEAD
// try
// {
// $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
// }

// catch(PDOException $pe)
// {
// die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
// }
=======
// $result = $conn->query("Select * from secret_word");
// $result = $result->fetch(PDO::FETCH_OBJ);
// $secret_word = $result['secret_word'];

// $result2 = $conn->query("Select * from interns_data where username = 'Syfon'");
// $user = $result2->fetch(PDO::FETCH_OBJ);
>>>>>>> 04aca8b09c0ed45a68683dab137d091fe6ac4f10

// global $conn;

// function checkQuestionExistence($question, $conn) {
// $sql = "SELECT * FROM chatbot WHERE question='$question'";
// $stm = $conn->query($sql);
// $stm->setFetchMode(PDO::FETCH_ASSOC);
// $result = $stm->fetchAll();
// return $result;
// }
// ?>


<<<<<<< HEAD

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
// $conn = new mysqli('localhost', 'root', '', 'hng_fun');

    
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
        'reply'=>  'Good to go'
    ]);
    
return ;

}



?>
=======
$result2 = $conn->query("Select * from interns_data where username = 'Syfon'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>



>>>>>>> 04aca8b09c0ed45a68683dab137d091fe6ac4f10
<!doctype html>
<html lang="en">
  <head>
    <title>My Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="c:\Users\Jnr\Desktop\bootstrap4beta\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My portfolio</title>
    <style>
.card-img-top{
    height:38rem;
}

.card-body{
    background-color: rgb(1, 1, 41);
}
.rounded-circle{
    border-radius:50%;
    height: 300px;
    width:300px;
    position: absolute;
    top:40px;
    left: 40%;
}
.fa {
    padding: 50px;
    font-size: 40px;
    width: 50px;
    text-decoration: none;
<<<<<<< HEAD
}
#chatbot{
    background-color:rgb(1, 1, 53);
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
#About{
    background-color: rgb(163, 157, 157); 
    padding: 1rem;
}
#foot{
    background-color: rgba(14, 12, 12, 0.89);
}

=======
 
}
>>>>>>> 04aca8b09c0ed45a68683dab137d091fe6ac4f10

    </style>
    
</head>
  <body>
    <div id="container">
                <div class="card" style="width: ; height: 44rem;">
                        <img class="card-img-top" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg" alt="Card image cap">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle">
                        
                          <center> 
                            <h5>Sifon Isaac</h5><br>
                            <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                        </center>
                            <div class="card-body">
                                <div class="row">
                                  <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                                    <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                                    <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
                                  <a href="https://github.com/Syfon01" class="fa fa-github"></a>
                                  <a href="" class="fa fa-slack"></a>
                                    
                              </div>
                    </div>
<<<<<<< HEAD
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
        

        
        xhttp.open("POST", "Syfon.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
}
$('#chatbot').animate({
                scrollTop: chatbot.scrollHeight,
                scrollLeft: 0
            }, 100);

</script>


=======
    </div>
>>>>>>> 04aca8b09c0ed45a68683dab137d091fe6ac4f10

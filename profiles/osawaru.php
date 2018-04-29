<?php

 if(!defined('DB_USER')){
     require "../../config.php";
     try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
 }
 
    $sql = 'SELECT * FROM secret_word';
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $data = $result->fetch();

    $secret_word = $data['secret_word'];

try {
     $sql2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="osawaru"';
     $q2 = $conn->query($sql2);
     $q2->setFetchMode(PDO::FETCH_ASSOC);
     $mydata = $q2->fetch();
    }
    catch (PDOException $e) {
        throw $e;
    }
?>
<?php //the start of my chatbot
global $response;
    require "answers.php";  

    function checkinput($input) 
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = checkinput($_POST["userinput"]); 

    if (preg_match("train:", $question)) {
        if (preg_match("#password", $question)) { //Seacrh for pattern called 'password'
                $strgpos= strpos($question, "#password"); //check the position
                $strglen = $strgpos . 8; 
                $password = substr($question, $strgpos, $strglen); // removes the word 'password'

            if ($password !== "password") {
                json_encode(["answers" => "Oops! You put in the wrong password! Try again."]);
            } 

            elseif (strtolower($question) === "about bot") {
                json_encode(["answers" => "VERSION 1.0"]);
            }

            else {
                    $question =trim($question); 
                    $trainpos = stripos('train:', $question);
                    $trainlen = $trainpos . 4 ; 
                    $newquestion = substr($question, $trainpos, $trainlen);
                    $answerpos = stripos("#answer:");
                    $answerlen = $answerpos . 6 ;
                    $newanswer = substr($question, $answerpos, $answerlen);
          
                    $sql1= "INSERT INTO chatbox (questions,answers) VALUES ($newquestion, $newanswer)";
                    $conn->exec($sql1);
                     exit(json_encode(array('answers' => "Thanks for that, now I am smarter")));
            } 
        }
    }
   
    else {      
          $sql= "SELECT * FROM chatbox WHERE questions = '$question'LIMIT 1";   /* OR '%who%'";*/
          $stmt = $conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $response = $stmt->fetch();         //$response is the answer to the user's question($question)
        if ($response == null) {
            exit(json_encode(
            array('answers' => "I am sorry, I do not have an answer, I am still an infant. You can train me and make me smarter. Type 'Train: *** #answer: *** #Password: *** '"))
            );
        }
        else { 
        exit(json_encode($response));
        }
    }
}; 
    
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Playball" rel="stylesheet">

<style>
    #projects {
        background-image: url(" http://res.cloudinary.com/osawaru/image/upload/v1523637993/bg-img.jpg");
    }

    body {
        background-color: black;
    }

    h4 {
        background-color: rgba(10, 67, 83, 0.658);
        padding: 20px;
    }
    #projects h1 {
        margin: 10px 300px;
        padding: 5px;
        background-color: rgba(4, 13, 15, 0.658);
        text-decoration: underline;
    }
    #carouselExampleControls  img {
      margin-left: 38%; 
    }
</style>
<title>Osawaru Oyelade Efe-osa</title>
</head>

<body>

<?php
$sql = "SELECT * FROM secret_word";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();
$secret_word = $result['secret_word'];

try {
    $sql2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="osawaru"';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $mydata = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}

?>


    <div class="containter text-white text-center">
        <p class="mt-5 text-danger" style="font-stretch: expanded; font-family: 'Playball',cursive; font-size:40px">Meet</p>
        <h1 class="font-weight-bold" style="font-family: 'Source Sans Pro', sans-serif;">
            <u><?php
            echo $mydata["name"];
            ?></u>
        </h1>
        <img src="<?php
            echo $mydata["image_filename"];
            ?>"
            class="img-fluid img-thumbnail rounded-circle mx-auto w-25 h-25" alt="Osawaru Efe">
        <h3 class="mt-5">I am a Full stack Developer as well as a digital designer</h3>
        <h6>
            <i class="fa fa-street-view mr-2"></i>Abuja | NG </h6>
    </div>
    <div id="projects">
        <div class="container-fluid text-center text-white">

            <h1 class="mt-5 text-center">PROJECTS</h1>
            <h4 class="mt-4">MY DESIGNS</h4>
            <div id="carouselExampleControls" class="carousel slide text-center" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523632003/Hello_October.png" 
                            alt="Elitebox's rowbox class">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523635397/SNF.png"
                            alt="Saturday Night Fights">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/c_crop,h_547,w_843/v1523638112/Screenshot_18.png"
                         alt="DevPlug">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-50 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523631934/Flyer.png"
                            alt="Gift Voucher" style="margin-left:30%;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <h4 class="mt-4 mb-4 webprojects">WEB</h4>
            <div class="row">
                <div class="col-sm-6 ">
                    <img src="http://res.cloudinary.com/osawaru/image/upload/v1523634896/Screenshot_9.png" class=" img-responsive w-75 mb-3"
                        alt="HNG challenge">
                </div>
                <div class="col-sm-6">
                    <img src="http://res.cloudinary.com/osawaru/image/upload/c_scale,w_1091/v1523634906/Screenshot_16.png" class="img-responsive w-75 mb-3"
                        alt="Address Book">
                </div>
            </div>

        </div>
    </div>
    <p class="text-center mt-3" style="color:white; font-size: 18px">Connect With Me
        <br>
        <span style="color: white; font-size: 30px">
        <a href="https://twitter.com/Jessy9507">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://github.com/jessye95?tab=stars">
                <i class="fa fa-github ml-2"></i>
            </a>
            <a href="https://www.linkedin.com/in/efe-osa-oyelade-4aa82a5b/">
                <i class="fa fa-linkedin ml-2"></i>
            </a>
            <a href="mail to:jessye95@gmail.com">
                <i class="fa fa-envelope ml-2"></i>
            </a>
        </span>
    </p>
</body>

    <script>
    $(document).ready(function () {
   /* $("#chatbot").click(function () {
                        $("#chatcontainer1").toggle();
                    });*/
        
        $("form").submit(function(e) {
            e.preventDefault();
            var inputbox = $('input[name=userinput]');
            var userinputval=  $('input[name=userinput]').val();
            if (userinputval !== null) {
               var newinput = "<p class='msgoutput'>" + userinputval +
               "<img style='height: 2.5em;'class='rounded-circle'"
               " src='http://res.cloudinary.com/osawaru/image/upload/e_grayscale/v1524047363/avatar.png'></p>";
               $('#chatbody').append(newinput); 
               $.ajax ({
                  method: "POST",
                  url: "profiles/osawaru.php",
                  data: {userinput:userinputval},
                  dataType : "json",
                    success: function (result) {
                        var successmsg = result.answers;
                          var result1 ="<p class='mybot'><img style='height: 2.5em;'class='rounded-circle mr-2'" + 
                          "src='http://res.cloudinary.com/osawaru/image/upload/e_grayscale/v1524047363/avatar.png'>" + 
                          successmsg + "</p>";
                          console.log('got it!')
                          $('#chatbody').append(result1);
                          userinput = ""; //function that runs what the request succeeds
                    }
               });       
            }; 
        });
    });
    </script>
</html>
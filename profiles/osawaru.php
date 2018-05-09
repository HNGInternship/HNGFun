<?php

if (!defined('DB_USER')) {
    // require "../config.php";
}
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE, DB_USER, DB_PASSWORD);
} 
catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
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
 
 //the start of my chatbot

global $response,$question,$conn;
require "answers.php";  

function checkinput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}


//special function
function getLatestNews() {
    global $news,$err;
    $api = 'https://newsapi.org/v2/top-headlines?sources=business-insider&apiKey=0b02db71635441abafa624c218e64192';
    $data = file_get_contents($api);
    $news = json_decode($data,true);
    return $news;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $question,$conn;
    $question = checkinput($_POST["userinput"]); 

    if (preg_match("/train:/", $question)) {
        function trainbot($question) {
            if (preg_match("/#password:/", $question)) { //Seacrh for pattern called 'password'
                        $question = trim($question);
                        $trainingarray = explode( '#', $question );
                        
                        $password = trim($trainingarray[2]);  
                        $password = substr($password,10);; // removes the word 'password'
                        $password = trim($password); 
                        
                        $newquestion = trim($trainingarray[0]);
                        $newquestion = substr($newquestion,7);
        
                        $newanswer = trim($trainingarray[1]);
                        $newanswer = substr($newanswer,8);
                 
                if ($password == 'password') { 
                    global $conn;
                        $sql1= "INSERT INTO chatbox (question,answer) VALUES ('$newquestion', '$newanswer')";
                        $conn->exec($sql1);
                        return ['answer' => "Thanks for that, now I am smarter"]; 
                }
                else {
                    return ['answer' => "Looks like you used the wrong password. The correct password is required."];
                }
            }
            else {
                return ["answer" => "Sorry! No password, No access. Please follow the training format."];
                }
            
        }
        exit(json_encode(trainbot($question)));   
    }
    
    elseif (strtolower($question) === "about bot") {
        exit(json_encode(["answer" => "IZZY version 1.0"]));
    }

    elseif (ucfirst($question) == 'Latest business news')  {
        getLatestNews();
        $title =  $news['articles'][0]['title'];
        $time = $news['articles'][0]['publishedAt'];
        $newsurl = $news['articles'][0]['url']; 
        $title1 =  $news['articles'][1]['title'];
        $time1 = $news['articles'][1]['publishedAt'];
        $newsurl1 = $news['articles'][1]['url'];
            exit(json_encode(["answers" => "<strong >Title: $title </strong><br> $time <br> <a href = '$newsurl' alt='Powered by Newsapi.org' style='color: #423ab7'>Read more..</a><br/><strong >Title: $title1 </strong><br> $time1 <br> <a href = '$newsurl1' style='color: #423ab7'>Read more..</a>"]));
    }
   
    else {      
          $sql= "SELECT * FROM chatbox WHERE question = '$question'ORDER BY RAND() LIMIT 1";    
          $stmt = $conn->query($sql);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $response = $stmt->fetchAll();         //$response is the answer to the user's question($question)


        if ($response == null) {
            exit(json_encode(
            array('answers' => "I am sorry, I do not have an answer, I am still an infant. You can train me and make me smarter. Type 'train: *** #answer: *** #password: *** '"))
            );
        }
        else { 
            exit(json_encode($response));
        }
    }
} 
   
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Playball" rel="stylesheet">

<title>Osawaru Oyelade Efe-osa</title>
</head>

<body>


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
    <button id="chatbutton" class="btn btn-primary fixed-bottom">Chat with me</a>
    </button>
    <div id="chatcontainer1" class="chatcontainer container fixed-bottom mr-1">
       
        <div id="chatbody">
        <p class='mybot'><img style='height: 2.5em;' class='rounded-circle mr-2'
        src='http://res.cloudinary.com/osawaru/image/upload/e_grayscale/v1524047363/avatar.png' alt='Izzy avatar'>
        Welcome.. <br> My training format is: <strong>train: *** #answer: ***  #password: ***. </strong><br> My commands
         <strong>about bot</strong>- returns my version number.
        <br><strong>about creator</strong>- returns information on my creator.
        <br><strong>Latest business news</strong>- returns latest Business insider news.
        </p>
        </div>

        <form id="userinput" method="post">
            
            <input type="text" id-"userinput" name="userinput" width="30"
            placeholder="Enter your message here" required>
               
                <div class="text-center text-capitalize">
                    <button  type="submit" class="btn mt-1 mb-1 font-bold">
                        Send
                    </button>
                </div>
        </form>
    </div>
    
    <style>
    nav {
        color : white;
    }
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
    .chatcontainer {
            padding-top: 3em;
            border-radius: 0.5em;
            width: 30%;
            background-color: whitesmoke;
            border-top-style: solid;
            border-top-width: 45px;
            border-top-color: rgba(4, 13, 15,0.8);
            margin-right: 0px;
            margin-bottom: 0px;
            height: 70%;
            max-height: 200%;
        }

        #chatbody {
            background-color: white;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(29, 49, 56, 0.849);
            border-radius: 10px;
            margin-bottom: 3%;
            color: black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            overflow: auto;
            height:75%;
            max-height:180%;
        }

        input {
            width: 90%;
            max-width: 1000px;
            line-height: 1.5em;
            margin: 4% 4% 0% 4%;
        }

        .mybot {
            background-color: rgba(238, 111, 111, 0.911);
            max-width: 70%;
            padding: 0.5em;
            margin: 1em 2em 0.3em 1em;
            border-radius: 2em 1.5em 1.5em 0em;
            font-size: 1.05em;
        }

        input:focus {
            background-color: rgb(248, 243, 232);
        }

        .msgoutput {
            background-color: rgb(185, 179, 179);
            max-width: 70%;
            padding: 0.5em;
            margin: 1em 2em 0.3em 7em;
            border-radius: 1.5em 2em 0em 1.5em;
            font-size: 1.05em;
        }
</style>

    <script>
    $(document).ready(function () {
        $("#chatcontainer1").hide()
        $("#chatbutton").click(function(e){
            $("#chatcontainer1").toggle()
        })
            
        $("form").submit(function(e) {
            e.preventDefault();
            var inputbox = $('input[name=userinput]');
            var userinputval=  $('input[name=userinput]').val();
            if (userinputval !== null) {
               var newinput = "<p class='msgoutput'>" + userinputval +
               "<img style='height: 2.5em;'class='rounded-circle ml-2'"
               " src='http://res.cloudinary.com/osawaru/image/upload/v1525257218/img_264157.png'></p>";
               $('#chatbody').append(newinput);
               $('#chatbody').scrollTop ($('#chatbody')[0].scrollHeight); 
               $.ajax ({
                  method: "POST",
                  url: "profiles/osawaru.php",
                  data: {userinput:userinputval},
                  dataType : "json",
                    success: function (result) {
                        var successmsg = result.answer;
                          var result1 ="<p class='mybot'><img style='height: 2.5em;'class='rounded-circle mr-2'" + 
                          "src='http://res.cloudinary.com/osawaru/image/upload/e_grayscale/v1524047363/avatar.png'>" + 
                          successmsg + "</p>";
                          $('#chatbody').append(result1);
                          $('#chatbody').scrollTop($('#chatbody')[0].scrollHeight);
                          inputbox = " "; //function that runs what the request succeeds
                    }
               });       
            }; 
        });
    });
    
    </script>
</body>
</html>
<?php

if (!defined('DB_USER')) {
    require "../../config.php";

    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("🤖I couldn't connect to knowledge base : " . $pe->getMessage() . DB_DATABASE . ": " . $pe->getMessage());
    }
}

try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data['secret_word'];
?>
<?php

//Bot Brain

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../answers.php";
    if (!isset($_POST['q'])) {
        echo json_encode([
            'status' => 1,
            'answer' => "Please provide a question",
        ]);
        return;
    }

    $q = $_POST['q']; //get what the user asked

    //check for Training Keyword:
    $training = stripos($q, "train");
    if ($training === false) { // is a question then
        $q = preg_replace('([\s]+)', ' ', trim($q)); //remove spaces from question
        $q = preg_replace("([?.])", "", $q); //remove question mark
        if ($q == 'aboutbot') {
            echo json_encode([
                'status' => 0,
                'answer' => "Easybot v1.0.0",
            ]);
            return;
        }
        //check for answers in the database
        $q = "%$q%";
        $sql = "select * from chatbot where question like :q";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':q', $q);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if (count($rows) > 0) {
            $index = rand(0, count($rows) - 1);
            $row = $rows[$index];
            $answer = $row['answer'];

            //check if you need to call a function
            $calfunction = stripos($answer, "((");
            if ($calfunction === false) { //function call is not require
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer,
                ]);
            } else {

            }
        } else {
            echo json_encode([
                'status' => 0,
                'answer' => "Oops! i'm just a bot i can't answer that, but you can help train me by using this format  <br> <code>train: question # answer</code>",
            ]);
        }
        return;
    } else {

        //Enter Training Mode and Get the question/answer
        $question_and_answer = substr($q, 5);
        //Remove white space
        $question_and_answer = preg_replace('([\s]+)', ' ', trim($question_and_answer));

        $question_and_answer = preg_replace("([?.:])", "", $question_and_answer); //remove ?  .  :
        $split_string = explode("#", $question_and_answer);
        if (count($split_string) == 1) {
            echo json_encode([
                'status' => 0,
                'answer' => "Invalid training format. I cannot decipher the answer part of the question. <br> The correct training data format is <br> <b>train: question # answer # password</b>",
            ]);
            return;
        }
        $quest = trim($split_string[0]);
        $ans = trim($split_string[1]);

        if (count($split_string) < 3) {
            echo json_encode([
                'status' => 0,
                'answer' => "You need to enter the training password to train me.",
            ]);
            return;
        }

        $password = trim($split_string[2]);
        //verify traning Password
        $training_pass = "password";

        if ($password !== $training_pass) {
            echo json_encode([
                'status' => 0,
                'answer' => "Your password is not correct, you cannot train me",
            ]);
            return;
        }

        $sql = "insert into chatbot (question, answer) values (:question, :answer)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $quest);
        $stmt->bindParam(':answer', $ans);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        echo json_encode([
            'status' => 1,
            'answer' => "Thank you, now i know how to reply " . $quest . "",
        ]);
        return;
    }

    echo json_encode([
        'status' => 0,
        'answer' => "Sorry i'm still learning but you can help train me by using this format  <br> <code>train: question # answer #password</code>",
    ]);

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Easy | Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }


              body{
                margin-top: 0.8rem;
              }
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        #about {
            text-align: center !important;
        }

        body>div {
            background: bisque;
            margin-bottom: 1rem;
        }

        .chat-container{
          background: white;
          max-height: 30rem;
          height:30rem;
          padding: 0;
          left: 1.6rem;
          top: 2rem;
          box-shadow: 0 0 8px 2px;
        }

        .chat-container .chat-header{
          background: lightgrey;
          text-align: center;
          line-height: 1.5;
          margin: 0;

        }

        .chat-container textarea{
            position: absolute;
            bottom: 0;
            width: 78%;
            left: 0;
            border: solid 2px #d17f12;
            padding: 0.5rem;
            resize:none;
            border-radius:1rem;
            outline:none;
            margin: 0 0 2px 2px;
        }

        .chat-container button{
          position: absolute;
          bottom: 0;
          right: 0;
          border-radius: 10px;
          background: antiquewhite;
          margin: 0 2px 2px 0;
          padding: 0.8rem 1.3rem;
        }

            .chat-container button:focus{
                outline:none;
            }
        .chat-space-text{
            margin: 1rem 0.5rem;
            background: #ffe0b8;
            display: block;
            max-width: 15rem;
            padding: 1rem;
            border-radius: 1rem;
            word-break:break-word;
            float:left;
            clear:both;
            transition:10s ease-in;
        }
        .chat-space-text:focus{
            outline:none;
        }

            .chat-space-text-2{
                margin: 1rem 0.5rem;
            background: #ffe0b8;
            display: block;
            max-width: 15rem;
            padding: 1rem;
            border-radius: 1rem;
            word-break:break-word;
            float:right;
            clear:both;
            transition:10s ease-in;
            }
            .chat-space-text-2:focus{
            outline:none;
        }
        .chat-space{
            overflow-y: auto;
            max-height: 24rem;
        }
        .bgimg {
            border: solid maroon;
            height: 25rem;
            border-radius: 50%;
            width: 27rem;
            background:url('https://res.cloudinary.com/easy007/image/upload/v1524607286/image-3.jpg') no-repeat;
            background-position-x: -20rem;
            background-position-y: -6rem;
        }

        .bgimg img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script src="../js/jquery.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-7">

                <div class="content" style="margin:auto">
                    <!-- Header -->
                    <header class="w3-container w3-center" id="home">
                        <h1 class="w3-jumbo" style="text-align:center;margin:1rem;">Name: &nbsp;&nbsp;
                            <b>Adeniyi Yusuf</b>
                        </h1>
                    </header>


                    <div class="w3-content w3-justify w3-text-grey w3-text-center w3-padding-32" id="about">
                        <h1 style="background: white;margin: 0 -1rem;">About</h1>
                        <hr class="w3-opacity">
                        <p>Student | Web developer| Computer scientist</p>

                        <h2 class="w3-padding-16">My Skills</h2>
                        <p class="w3-wide">HTML 5</p>
                        <p class="w3-wide">CSS3</p>
                        <p class="w3-wide">BootStrap</p>
                        <p class="w3-wide">JQuery</p>
                        <p class="w3-wide">JavaScript</p>
                        <p>Nodejs</p>
                        <p>Expressjs</p>
                    </div>
                    <!-- Contact Section -->
                    <div class="w3-padding-32 w3-content w3-text-grey" id="contact" style="margin-bottom:64px; text-align:center">
                        <h1 style="background: white;margin: 0 -1rem;">Contact Me</h1>
                        <hr class="w3-opacity">

                        <div class="w3-section">
                            <p>
                                <i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i>Lagos, Nigeria</p>
                            <p>
                                <i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i>Phone: +2348067177670</p>
                            <p>
                                <i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i>Email: easyclick05@gmail.com</p>
                        </div>

                        <p>Send me a message:</p>
                        <form action="/action_page.php" target="_blank">
                            <p>
                                <input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name">
                            </p>
                            <p>
                                <input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email">
                            </p>
                            <p>
                                <input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Subject" required name="Subject">
                            </p>
                            <p>
                                <input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message">
                            </p>
                            <p>
                                <button class="w3-button w3-light-grey w3-padding-large" type="submit">
                                    <i class="fa fa-paper-plane"></i> SEND MESSAGE
                                </button>
                            </p>
                        </form>
                        <!-- End Contact Section -->
                    </div>

                    <!-- Footer -->
                    <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin:-24px;text-align:center;">
                        <i class="fa fa-facebook-official w3-hover-opacity"></i>
                        <i class="fa fa-instagram w3-hover-opacity"></i>
                        <i class="fa fa-twitter w3-hover-opacity"></i>
                        <i class="fa fa-linkedin w3-hover-opacity"></i>
                        <p class="w3-medium">Designed by
                            <a href="#" target="_blank" class="w3-hover-text-green">Easyclick</a>
                        </p>
                    </footer>

                    <!-- END PAGE CONTENT -->
                </div>
            </div>


            <div class="col-5">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="bgimg">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 position-relative chat-container">
                            <h3 class="chat-header" tabindex='0'>My Chatbot</h3>
                            <div class="chat-space">
                                    <p class="chat-space-text-2">
                                            hello dear, welcome!
                                    </p>
                            </div>
                            <textarea name="chatText" id="chatText" cols="1" rows="1"></textarea>
                            <button  class='btn chat-btn'>Send</button>
                        </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>

    document.addEventListener('DOMContentLoaded',function(){

//send question to server

$('.chat-btn').click(sendData);
const $textarea = $('textarea');
const $chatSpace = $('.chat-space');
function sendData(e) {
let question = $textarea.val().trim();
    if(question === '') {
            return false;
        }
    $(`<p class=chat-space-text-2 tabindex=0>${question}</p>`).appendTo($chatSpace)[0].focus();
    $textarea.val('');
        $.ajax({
            url: "/profiles/easy007.php",
            type: "post",
            data: {q: question},
            dataType: "json",
            success: function(response){
                if(response.status == 1){
                    console.log('status-1',response);
                    setTimeout(()=>{
                    $(`<p class=chat-space-text tabindex=0>${response.answer}</p>`).appendTo($chatSpace)[0].focus();
                    },2000);
                }else if(response.status == 0){
                    console.log('statuss-2',response);
                    setTimeout(()=>{
                    $(`<p class=chat-space-text tabindex=0>${response.answer}</p>`).appendTo($chatSpace)[0].focus();
                    },2000);
                }
            },
            error: function(error){
                console.log(error);
            }
        })
};
    });

</script>
</body>

</html>

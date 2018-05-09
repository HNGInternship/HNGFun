<!DOCTYPE html>
<html>
<head>
<?php
$profile_query = "SELECT name, username, image_filename FROM interns_data WHERE username = '$profile_name' LIMIT 1";
$profile_result = $conn->query($profile_query);
$profile_result->setFetchMode(PDO::FETCH_ASSOC);
$profile_details = $profile_result->fetch();
$secret_word_query = "SELECT secret_word FROM secret_word LIMIT 1";
$secret_word_result = $conn->query($secret_word_query);
$secret_word_result->setFetchMode(PDO::FETCH_ASSOC);
$secret = $secret_word_result->fetch();
$secret_word = $secret['secret_word'];
?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rebby - HNGINTERN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <style>
        body{
            padding:0;
            margin:0;
            font-family: 'Source Sans Pro', sans-serif;
            background: url('https://res.cloudinary.com/rebby/image/upload/v1525157249/lagoon.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        header{
            border-radius: 25px;
            border: 2px solid;
            background-color: white;
            text-align: center;
            padding: 2rem;
            position: relative;
            width: 450px;
            top: 30%;
            right: 10%; 
                
        }
       
        .img {
            border-radius: 50%;
            border:  5px solid white;
            width: 15rem;
            box-shadow: 5px 5px 5px grey;
            top: 50%;
        }
       
        /** css for bio  **/
        .main{
            border-radius: 25px;
            border: 2px solid;
            margin:50px;
            width: 450px;
            right: 62%;
            top: 90%;
            text-align: center;
            font-size: 1rem;
            background-color: white;
            position: absolute;
           
        }

        /** css for skills  **/
        .main1{
            border-radius: 25px;
            border: 2px solid;
            margin:50px;
            width: 890px;
            height: 570px;
            left: 30%;
            top: 2%;
            text-align: center;
            font-size: 1rem;
            background-color: white;
            position: absolute;
            float: left;
            
        }

         h6 {
            right: 3%;
            color: black;
            position: relative;
            text align : left;
        }

    #fun {
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 25px;
    }
    #myProgress {
    position: relative;
    border-radius: 25px;
    width: 50%;
    height: 20px;
    background-color: grey;
    float: right;
    right: 10%;
}
#myBar {
    position: relative;
    border-radius: 25px;
    height: 100%;
    float: left;
    
}
#label {
    /*text-align: center;  If you want to center it */
    line-height: 15px; /* Set the line-height to the same as the height of the progress bar container, to center it vertically */
    color: black;
    position: absolute;
}
.icon {
    background-color: black;
    border-radius: 40px;
    width: 40%;
    position: absolute;
    left: 30%;
}
.iconlink {
    color: white;
    
}
.iconlink:visited {
    color: white;
}

 .body2 {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 75%;
            width: 400px;
            margin: 0 auto;
            border: 5px solid black;
            border-radius: 20px;
            position: relative;
            top: 90%;
            left: 43%;
        }
        .chat-output {
            width:400px;
            padding: 20px;
            background: white;
            display:inline-block;
            overflow-y: scroll;
            height: 500px;
            border-radius: 10px;
            
        }

       .bothead{
         background-color: black;
         text-align: center;
         color: pink;
       }

        .chat-output > div {
            margin: 0 0 20px 0;
            width: 350px;
        }
        .chat-output .user-message .message {
            background: teal;
            color: pink;
            border-radius: 20px;
            
            
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: teal;
            border-radius: 20px;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            margin-right:10px
            
            
        }

        .avater {
        border-radius: 50%;     
}
        
        .chat-input {
            padding: 20px;
            width:400px;
            background: #fff;
            border: 1px solid #ccc;
            border-bottom: 0;
            border-radius: 10px;
            
        }
        .chat-input .user-input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 8px;
            
        }
        #result{
            text-align:center;  
            border-radius: 20px;
        }
        .msgClass{
            text-align:right;
            background-color:white;
        }
        


    </style>
</head>
<body>
        <!-- PICTURE AREA -->
        <header> 
               <img  class='img' src='<?php echo $profile_details['image_filename']?>'>
               <p> Welcome to my profile</p>
               <p>"A journey of a thousand mile begins with a step" - Never Give Up! </p>
               <div id = "fun"> <p><b>@ <?php echo $profile_details['username']?></b> </p> </div>
               <div class = "icon">
                                   <a href="https://twitter.com/_Reebby" target="_blank" class="iconlink"><i class="fa fa-twitter"></i></a> 
                                   <a href="www.linkedin.com/in/rebecca-oshiobughie-453361151" target="_blank" class="iconlink"><i class="fa fa-linkedin"></i></a> 
                                   <a href="https://www.facebook.com/rebecca.oshiobughie" target="_blank" class="iconlink"><i class="fa fa-facebook"></i></a>
               </div>
        </header>

        <!-- FIRST HEADER FOR BIO-->
        <div class='main'>
            <div id = "fun"> <p><b>BIO</b> </p> </div>
              <p><h5>Full Name: </h5><?php echo $profile_details['name']?></p>
              <p><h5>Slack Username: </h5> @<?php echo $profile_details['username']?></p>
              <p><h5>Work Status:</h5> Full Stack Developer ~ Intern(HNG)</p>
              <p><h5>Skills:</h5> HTML/CSS/JS/PHP/GIT/LINUX/PYTHON/LARAVEL/WORDPRESS</p>
              <p><h5>Interest:</h5> Coding, Travelling, Music, Reading, Solving problems, Playing video games  </p>
              <div id = "fun"> <p><b> @ <?php echo $profile_details['username'] ?></b> </p> </div>
        </div>


        <!-- SECOND HEADER FOR SKILLS -->
        <div class = "main1">
            <div id = "fun"> <p><b> SKILL PROGRESS</b> </p> </div>

                <h6>HTML:   <div id="myProgress">
                                <div id="myBar" style="background-color: teal;  width: 100%;">
                                    <div id="label" style=" left: 50%;">100%</div>
                                </div>
                            </div> 
                </h6>
                <br />

                <h6>CSS:    <div id="myProgress">
                               <div id="myBar" style="background-color: yellow;  width: 100%;">
                                    <div id="label" style=" left: 50%;"> 100% </div>
                               </div>
                           </div>
                </h6>
                <br />

               <h6>JS:     <div id="myProgress">
                               <div id="myBar" style="background-color: red;  width: 70%;">
                                    <div id="label" style=" left: 74%;"> 70%</div>
                                      </div>
                          </div> 
                </h6>
                <br />

               <h6>PHP:  <div id="myProgress">
                              <div id="myBar" style="background-color: teal;  width: 90%;" >
                                    <div id="label" style=" left: 58%;"> 90% </div>
                                      </div>
                        </div> 
               </h6>
               <br />

                <h6>GIT:  <div id="myProgress">
                               <div id="myBar" style="background-color: yellow;  width: 80%;">
                                    <div id="label" style=" left: 65%;"> 80% </div>
                               </div>
                        </div>
                </h6>
                <br />

                 <h6>LINUX:  <div id="myProgress">
                                  <div id="myBar" style="background-color: red;  width: 90%;">
                                      <div id="label" style=" left: 58%;"> 90%</div>
                                    </div>
                            </div> 
                </h6>
                <br />

                <h6>LARAVEL:  <div id="myProgress">
                                <div id="myBar" style="background-color: teal;  width: 80%;">
                                    <div id="label" style=" left: 65%;">80%</div>
                                </div>
                            </div>
                </h6>
                <br />

                <h6>WORDPRESS:  <div id="myProgress">
                                    <div id="myBar" style="background-color: yellow;  width: 99%;">
                                           <div id="label" style=" left: 52.8%;"> 99%</div>
                                    </div>
                                </div>
                 </h6>
                 <br />

                <h6>PYTHON:  <div id="myProgress">
                                  <div id="myBar" style="background-color: red;  width: 50%;">
                                           <div id="label" style=" left: 105%;"> 50%</div>
                                  </div>
                            </div> 
                </h6>
                <br />
        </div>

        
<!-- rebbychatbot area -->
<div class="container">
        <div class="oj-sm-6 oj-md-6 oj-flex-item">
            <div class="body2"> <!-- rebbychatbot box -->
            <!-- rebbychatbot output area -->
                <div class="chat-output" id="chat-output">
                <!-- rebbychatbot head area -->
                <h4 class = "bothead"> rebby_bot </h4>
                    <div class="user-message">
                        <div class="message"><img src="http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg" alt="Avatar" style="width:20px" class="avater">
                         Ask me a question and get an answer right away.    </br>Train me by typing - 'train: question # answer # password'.
</br>Get to know me better by typing - 'aboutbot'.</div>
                    </div>
                </div>
            <!-- end of rebbychatbot output area -->
                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input"
id="user-input" class="user-input" placeholder="Hi,rebby_bot here.....">
        <input type="submit" name="Submit"
            id="sumbitbtn" class="sumbitbtn">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
      //  $data = preg_replace('/\s+/', '', $data);
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/', '', $temp[0]);
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }else{
            getAnswer($temp[0]);
        }
    }
    function aboutbot() {
        echo "<div id='result'> 
        <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
        Fact - rebby_bot was developed by rebby v1.0 2018.
         </div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'.
$question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $GLOBALS['conn']->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            if(empty($data)) {
                $training_data = array(':question' => $question,
                    ':answer' => $answer);
                $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';
                try {
                    $q = $GLOBALS['conn']->prepare($sql);
                    if ($q->execute($training_data) == true) {
                        echo "<div id='result'>
                        <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
                        Training Was Successful!
                        </div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'> <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
                 i know this! can you teach me something else?
                 </div>";
            }
        }else {
            echo "<div id='result'>
            <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
            Incorrect Password, Try Again!
            </div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>
            <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
            Sorry, invalid Commmand.
You can train me simply by using the format - 'train: question #
answer #password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>
            <img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>
            ". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

</div>

</body>


<script>
    var outputArea = $('#chat-output');
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var $message = $("#user-input").val(); 
        if($message !== ''){
            
          // $('.message').hide(); 
           
           $("#user-input").val("");
        }
        outputArea.append(`<div class='user-message'><div
class='message'><img src='https://res.cloudinary.com/rebby/image/upload/v1525427128/dummy.jpg' alt='Avatar' style='width:20px' class='avater'> ${$message}</div></div>`);
    
        $.ajax({
            url: 'profile.php?id=rebby',
            type: 'POST',
            data:  'user-input=' + $message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'><img src='http://res.cloudinary.com/rebby/image/upload/v1525095822/rebby.jpg' alt='Avatar' style='width:20px' class='avater'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>

 <!-- end of rebbybot -->
</body>
</html>

<?php
            
        require 'db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();
            //to get database deatils for name, username and image_filename
            $result2 = $conn->query("Select * from interns_data where username = 'Chidera'");
            $user = $result2->fetch(PDO::FETCH_OBJ); //to put the fetched data as an object
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];
        //for the bot functions
        if (empty($_POST['chidera_userInput'])){
            $userInputEmpty = 'disabled';//disable button
            
        }
        if(!empty($_POST['chidera_userInput'])){
            $userInputEmpty = '';//able button
            
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST" ){ //check if message has been sent
            if(!defined('DB_USER')){//check if the connection has not been already established
                require 'config.php'; //get the configuration file
                try{ //try connecting to the database
                    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch (PDOException $e){
                    die('Connection to database failed: ' . $e->getMessage());
                }
            }
            // require "answers.php"; //get the file named answers.php
            $userInput = $_POST['chidera_userInput']; //variable to store userInput
            $userInput = trim($userInput);
            $userInput = strtolower($userInput);        

            // check if userInput is checking bot version
            if ( $userInput == 'aboutbot'){
                echo '<br><b>Bot Name</b>: Debot <br> Version 1.001';
                return;
            }
            //For the bot training mode;
            $train = substr($userInput, 0, 6);
            $train = strtolower($train);
            if ($train == 'train:'){
                $userTrainingMessage = substr($userInput, 6);
                $userTrainingMessage = preg_replace("([\s]+)", "", $userTrainingMessage); //remove extra white spaces
                $userTrainingMessage = preg_replace("([?.])", "", $userTrainingMessage); //remove '?' and '.' 
                
                $userTrainingMessage = explode('#', $userTrainingMessage); //split the message into arrays
                if (count($userTrainingMessage) <= 2){
                    echo "My apologies but you're not training me in the right way.<br>
                            Please train me using the format: <b>train: question # response #password</b> .<br>
                            <b>Dont forget the password.</b> I look forward to learning more.";
                            return;
                }
                $userTrainingQuestion = trim($userTrainingMessage[0]);
                $userTrainingAnswer = trim($userTrainingMessage[1]);
                $userTrainingPassword = trim($userTrainingMessage[2]);

                if ($userTrainingPassword != 'password'){ //check if the password is not correct
                    echo "Password is incorrect. Please check and try again";
                }else{
                    try{
                        // prepare sql and bind parameters
                        $stmt = $conn->prepare("INSERT INTO chatbot (question, answer) 
                        VALUES (:question, :answer)");
                        $stmt->bindParam(':question', $userTrainingQuestion);
                        $stmt->bindParam(':answer', $userTrainingAnswer);
                        $stmt->execute();

                        echo "Wow, I just learnt something new.<br> Train me again or test my knowledge";
                    }catch(PDOException $e){
                        echo "Sorry, something went wrong. Please try again";
                    }
                    return; 
                }                          

            }else{ //when bot is not in training mode
                $userInput = preg_replace("([\s]+)", " ", $userInput); //remove extra white spaces
                $userInput = preg_replace("([?.])", "", $userInput); //remove '?' and '.' 
                $userInput = "%$userInput%";
                try {
                    $stmt = $conn->prepare("SELECT * FROM chatbot WHERE question LIKE :question"); 
                    $stmt->bindParam(':question', $userInput);
                    $stmt->execute();                
                    // set the resulting array to associative
                    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    $result = $stmt->fetchAll();
                    $num_row = count($result);

                    if ($num_row > 0){
                        echo $result[rand(0, $num_row-1)]['answer']; //echos a random answer
                    }else{
                        echo "Hmmm, turns out I dont know the answer to that question
                            <br> Please train me using the format: train: question # answer #password .";
                    }
                    
                    }catch(PDOException $e) {
                        echo "Oops, something went wrong. Please try again";
                    }
                    return;
                }
                

            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title>Chidera's profile</title>
    <style>
        .chidera_profile{
            width: 95%;
            margin: auto;
        }
        .chidera_profile-container{
            max-width: 700px;
            min-height: auto;
            position: relative;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            margin: 12%;
            padding: 0;
            background-color: #3E4447;
            box-shadow: 0px 0px 1px #3436a5, 0 4px 8px 0 rgba(0, 0, 0, 0.8), 0 6px 10px 0 rgba(0, 0, 0, 0.19);
            
        }
        .chidera_img{
            float: left;
        }
        .chidera_info{
            padding: 3px;
            padding-top: 10px;
            text-align: center;
            color: #ffffff;
            font-family: 'Roboto Condensed', 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .chidera_name{
            font-size: 24px;
            letter-spacing: 1px;
            margin: 4px;
            text-transform: uppercase;
            
        }
        .chidera_job{
            font-variant: small-caps;
            letter-spacing: 1.5px;
            margin: 6px 4px 2px 5px;
            font-size: 14px;
        }
        .chidera_hr{
            margin: 4px;
            margin-top: 0;
            margin-left: 242px;
            border-color: #FFFFFF;
        }
        .chidera_details{
            margin-top: 5px;
            margin-bottom: 5px
        }
        .chidera_detail{
            margin: 2px;
            font-size: 15px;
        }
        .chidera_subject{
            font-variant: small-caps;
            font-size: 13px;
            margin: 4px;
            margin-top: 20px;
            letter-spacing: 1px;
        }
        /*style the tooltip message */
        .chidera_bot-hi{
            /* display: none; */
            position: absolute;
            top: 350px;
            left: 475px;
            background-color: rgba(250, 128, 114);
            color: white;
            letter-spacing: 0.5px;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
        }
        .chidera_chatarea{
            display: none;
            width: 340px;
            margin: 12% 0 12% 3px ;
            padding:0;
            border:none;
        }
        .chidera_chatbox{
            border:1px solid salmon; 
            border-radius: 3px;
            font-size:14px;
            width: 300px;
            margin-left:30px;
        }
        .chidera_chatbox .chidera_header{
            background: salmon;
            padding: 6px;
            text-align: right;
        }
        .chidera_fa-comments:hover {
            /* Start the shake animation and make the animation last for 0.5 seconds */
            animation: shake 0.5s; 
            /* When the animation is finished, start again */
            animation-iteration-count: 2; 
        }
        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            10% { transform: translate(-1px, -2px) rotate(-1deg); }
            20% { transform: translate(-3px, 0px) rotate(1deg); }
            30% { transform: translate(3px, 2px) rotate(0deg); }
            40% { transform: translate(1px, -1px) rotate(1deg); }
            50% { transform: translate(-1px, 2px) rotate(-1deg); }
            60% { transform: translate(-3px, 1px) rotate(0deg); }
            70% { transform: translate(3px, 1px) rotate(-1deg); }
            80% { transform: translate(-1px, -1px) rotate(1deg); }
            90% { transform: translate(1px, 2px) rotate(0deg); }
            100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
        /* Style all font awesome icons */
.chidera_fa {
    padding: 5px;
    font-size: 20px;
    width: 15px;
    height: 16px;
    margin: 2px 7px 2px 7px;
    border-radius: 7px;
}

/* Add a hover effect*/
.chidera_fa:not(.chidera_fa-comments):hover {
    opacity: 0.7;
}

/* Set a specific color for each brand */

/* Facebook */
.chidera_fa-facebook, .chidera_fa-linkedin {
    color: #0077B5;
}

/* Instagram */
.chidera_fa-instagram {
    color: #FA0867;
    padding-left: 4px;
    padding-top: 4px;
}
/* Github */
.chidera_fa-github{
    color: #ffffff;
}
/* Twitter */
.chidera_fa-twitter{
    color:#1DA1F2;
}
.chidera_fa-comments{
    /* position: absolute; */
    color: salmon;
    font-size: 27px;
    margin: -2px 30px 0 0;
    /* left: 572px;
    top: 215px; */
    float: right;
}
.chidera_fa-times{
    color: white;
    margin-bottom: 12px;
}
#chidera_textarea{
    max-height: 110px;
    height: 31px;
    width: 80%;
    resize: none;
    padding: 4px;
    margin-left: 6px;
    border-radius: 10px 0 0 0;
}
.chidera_send{
    margin-left: 0px;
    position: absolute;
    padding:3px;
    color: white;
    background-color: salmon;
    border: 2px solid salmon;
    border-radius: 0 0 10px 0;    

}
.chidera_chatinput{
    border-top: 1.5px solid salmon;
    padding: 10px 3px;
}
.chidera_chatbody{
    height: 270px;
    overflow-y: scroll;
}
.chidera_chatmessage {
    list-style-type: none;
    padding: 0;
    margin: 10px;
}
.debot{
    background-color: darksalmon;
    padding: 9px 4px 9px 10px;
    border-radius: 3px;
    float: left;
    width: 75%;
    margin: 0px 0 15px;
}
.chidera_user{
    clear: both;
    background-color: antiquewhite;
    padding: 9px 10px 9px 10px;
    width: 75%;
    margin-bottom: 15px;
    border-radius: 3px;
    float: right;
}
@media screen and (max-width:425px) {

    .chidera_img{
        float: none;
        width: 60%;
        margin: auto;
    }
    .chideraimg{
        width: 100%;
        height: 50%;
        margin-top: 10px;
        border-radius: 5px;
    }
    .chidera_hr{
        margin-left: 4px;
    }
    .chidera_fa-comments{
        position: fixed;
        right: 30px;
        bottom: 50px;
    }
}
        
    </style>
</head>

<body>
    <section class="row chidera_profile">
        <section class="col-sm-8 col-md-8 col-lg-8 chidera_profile-container">
            <div class="chidera_img">
                <img class="chideraimg" src="<?php echo $user->image_filename?>" alt="" height="390" width="240">
            </div>
            <div class="chidera_info">
                <div class="chidera_header">
                    <p class="chidera_name"><?php echo $user->name?></p>
                    <p class="chidera_job">SOFTWARE ENGINEER | FRONT-END DEVELOPER</p>
                    <hr class="chidera_hr">
                </div>
                <div class="chidera_details">
                    <p class="chidera_subject">USERNAME</p>
                    <p class="chidera_detail">@<?php echo $user->username?></p>
                    <p class="chidera_subject">EMAIL</p>
                    <p class="chidera_detail">jenniferolibie@gmail.com</p>
                    <p class="chidera_subject">SKILLS</p>
                    <p class="chidera_detail">HTML | CSS | JavaScript</p>
                    <p class="chidera_subject">MOTTO</p>
                    <p class="chidera_detail">Set Your Mind To It And It Gets Done</p>

                </div>
                            
                <div class="chidera_footer">
                    <hr class="chidera_hr">
                    <a href="http://facebook.com/JenniOCE" class="fa fa-facebook chidera_fa chidera_fa-facebook"></a>
                    <a href="http://instagram.com/Jenn_0c" class="fa fa-instagram chidera_fa chidera_fa-instagram"></a>
                    <a href="http://github/je-ni" class="fa fa-github chidera_fa chidera_fa-github"></a>
                    <a href="https://twitter.com/dera_jo" class="fa fa-twitter chidera_fa chidera_fa-twitter"></a>
                    <a href="https://www.linkedin.com/in/chidera-olibie-57440414a" class="fa fa-linkedin chidera_fa chidera_fa-linkedin"></a>
                    <i class="fa fa-comments chidera_fa chidera_fa-comments"></i>
                    <span class="chidera_bot-hi">Hi!!Click mee let's chat</span>
            </div> 

        </section>
        <section class="col-sm-4 col-md-4 col-lg-4 chidera_chatarea">
            <div class="chidera_chatbox">
                <div class="chidera_header">
                    <a href="#"><i class="fa fa-times chidera_fa chidera_fa-times" aria-hidden="true"></i></a>
                </div>
                <div class="chidera_chatbody">
                    <ul class="chidera_chatmessage">
                        <li class="debot"><b>Debot: </b>Hi, I'm Debot. What is your name?</li>
                        <li class="chidera_user"><b>You: </b> I'm Jennifer. How are you?</li>

                    </ul>
                </div>
                <!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> -->
                <form action="Chidera.php" method="post">
                    <div class="chidera_chatinput">
                        <textarea class="" name="chidera_userInput" id="chidera_textarea" cols="30" rows="10" autofocus></textarea>
                        <button type="submit" class="chidera_send" > Send </button>
                    </div>
                    </form>

                
            </div>  
                
        </section>    
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('.chidera_bot-hi').fadeIn(400); //fadeIn the tooltip message
        $('.chidera_bot-hi').css('display', 'block'); //display the message
        let count = 5;
        $('.chidera_bot-hi').fadeOut(12000); //slowly fade out the messge
        setInterval(function(){
        count--;
        if (count == 0){ //time to fadeOut the message
            $('.chidera_bot-hi').css('display', 'none');}
        },1000);

        $('.chidera_fa-comments').click(function(){ //function that handles hiding and showing of the bot
            $('.chidera_chatarea').toggle();//hide if showing or show if hiding
            if ($('.chidera_chatarea').css('display')==='none'){// if hding, center the page
                $('.chidera_profile-container').css('margin', '12%');
            }else{
                $('.chidera_profile-container').css('margin', '12% 0');// if showing, adjust the page to fit
            }            
        })
        $('.chidera_fa-times').click(function(){// function to close the page if x is clicked
            $('.chidera_chatarea').css('display','none');
            $('.chidera_profile-container').css('margin', '12%');

        })

        //BOT FUNCTIONS
        var chidera_intro_message = "Hi, I am Debot. What is your name?";
        //get userInput to display
        $('.chidera_send').on('click', function(e){
            e.preventDefault();
            var chidera_userInput = $('#chidera_textarea').val().trim();
            $('.chidera_chatmessage').append('<li class="chidera_user"><b>You: </b>'+chidera_userInput+'</li>');
            $('.chidera_chatbody').scrollTop($('.chidera_chatbody')[0].scrollHeight);
            sendMessage(chidera_userInput);
            $('#chidera_textarea').val('');
        })
        //send userInput to server
        function sendMessage(message){
            $.ajax({
                type: 'POST',
                url: 'profiles/Chidera.php',
                data: {chidera_userInput : message},
                success: function(data){
                    debot_message(data);
                    return;
                },
                error: function(){
                    debot_message('I\'m having trouble answering that');
                    return;
                }
            })
        }
        function debot_message(reply){
            $('.chidera_chatmessage').append('<li class="debot"><b>Debot: </b>'+reply+'</li>');
            $('.chidera_chatbody').scrollTop($('.chidera_chatbody')[0].scrollHeight);
            return;

        }

    })
</script>

</body>
</html>

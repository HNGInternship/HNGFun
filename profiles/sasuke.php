<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(!defined('DB_USER')){
        require "../../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!defined('DB_USER')){
        require "../../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }
    require "../answers.php";
    date_default_timezone_set("Africa/Lagos");

    $userQuestion = $_POST['userQuestion'];
    $checkVersionQuestion  = "aboutbot";
    //$checkVersionQuestion = "%$checkVersionQuestion%";
    //check if input entered is to get chatbot version
    if($userQuestion == $checkVersionQuestion){
        $chatBotVersion = "Pinky v 1.0";
        echo $chatBotVersion;
        return;
    }

    /*Check if chatbot is in training mode*/
    $indexOfQuestion = stripos($userQuestion, "train:");
    if($indexOfQuestion === false){

        //i.e it is in question answering mode
        $userQuestion = preg_replace('([\s]+)', ' ', trim($userQuestion)); //remove all extra white spaces from the question
        $userQuestion = preg_replace('([?.])', '', $userQuestion); //remove '?' and '.'

        $userQuestion = "%$userQuestion%";

        $query = "SELECT * FROM chatbot WHERE question like :question";
        $sth = $conn->prepare($query);
        $sth->bindParam(':question', $userQuestion);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sth->fetchAll();
        $count = count($result);

        if($count > 0){
            $index = rand(0, $count-1);
            $resultRow = $result[$index];
            $userQuestionAnswer = $resultRow['answer'];

            //check if the userQuestionAnswer is to call a function
            $indexOfOpeningBrackets = stripos($userQuestionAnswer, "((");
            if($indexOfOpeningBrackets === false){
                echo "$userQuestionAnswer";
            }
            else{
                $indexOfClosingBrackets = stripos($userQuestionAnswer, "))");

                if($indexOfClosingBrackets !== false){
                    $functionName = substr($userQuestionAnswer, $indexOfOpeningBrackets+2, $indexOfClosingBrackets-$indexOfOpeningBrackets-2);
                    $functionName = trim($functionName);
                    if(stripos($functionName, ' ') !== false){ //if method name contains spaces, do not invoke method
                        echo "The function name should not have any white spaces";
                        return;
                    }
                    if(!function_exists($functionName)){
                        echo "Oops! Sorry! Function could not be found";
                    }
                    else{
                        echo str_replace("(($functionName))", $functionName(), $userQuestionAnswer);
                    }
                    return;
                }

            }
        }
        else{
            echo "Oops! Sorry! I couldn't understand your question. Try asking another question. <br/>
				 Or type <b style = 'color: #d16027;'>train: question # answer </b> to train me to more kinds of questions.";
        }
    }

    else{
        //i.e The chatbot is in training mode

        $trainingString = substr($userQuestion, 6); //get the trainingString from the textarea
        $trainingString = preg_replace('([\s]+)', ' ', trim($trainingString)); //remove extra white spaces in the trainingString
        $trainingString = preg_replace("([?.])", "", $trainingString); //remove '?' and '.' to ensure recognization of questions without those symbols in the trainingString

        $splitTrainingString = explode("#", $trainingString);
        $splitTrainingStringCount = count($splitTrainingString);
        if($splitTrainingStringCount == 1){
            echo "Sorry, you entered an invalid training format. Type <b style = 'color: #d16027;'> train: question # answer </b> to do this again";
            return;
        }

        $question = trim($splitTrainingString[0]);
        $answer = trim($splitTrainingString[1]);

        if($splitTrainingStringCount < 3){
            echo "You need to enter a password to train me. Type <b style = 'color: #d16027;'>train: question # answer # password</b>";
            return;
        }
        $trainingPassword = trim($splitTrainingString[2]);

        //verification of password entered
        define('Training_Password', 'password');

        if($trainingPassword != Training_Password){
            echo "Invalid Password. Try again";
        }

        else{
            // If everything is in place i.e training string is in order and password is correct insert into the database
            $query = "INSERT INTO chatbot (question, answer) values (:question, :answer)";
            $sth = $conn->prepare($query);
            $sth->bindParam(':question', $question);
            $sth->bindParam(':answer', $answer);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_ASSOC);

            //insert is successful, prompt user to ask that question.
            echo "Yay! Training Successful. Try asking me the same question now.";
        }
    }
}
?>

<?php if($_SERVER['REQUEST_METHOD'] === "GET"){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Aniuchi Adaobi M. - @AdaM</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Allura|Damion');
            @media only screen and (min-width: 600px) {
                img.bootstrap-pic { display:inline-block; margin-top:-60px;}
            }
            @media only screen and (max-width: 600px) {
                img.bootstrap-pic { display:block;}
            }
            .panel{border:0; box-shadow:none;}
            .hello{font-family: 'Allura', Helvetica, cursive; font-size: 35px; line-height: 1.375em; font-weight: bold;}
            .name{font-family: 'Damion', Arial, sans-serif; font-size:55px; color: #d16027;}
            .icons{font-size: 110px;}
            .icons.html5{color: #d16027;}
            .icons.css3{color: #27a9d1;}
            .details{font-size: 25px;}
            .fb{color: #3b5998;}
            .tw{color: #1da1f2;}
            .git{color: #333333;}
            .ln{color: #0077b5; }
            .main-section{ width: 330px; position: fixed; right:5px; /*bottom:0px;*/bottom:-380px; }
            .first-section:hover{ cursor: pointer; }
            .open-more{ bottom:0px; transition:2s; }
            .border-chat{ border:1px solid #007bff; margin: 0px; }
            .first-section{ background-color:#007bff; }
            .first-section p{ color:#fff; margin:0px; padding: 10px 0px; font-size: 15px; font-weight: bold; }
            .first-section p:hover{ color:#fff; cursor: pointer; }
            .right-first-section{ text-align: right; float:right;}
            .right-first-section i{ color:#fff; font-size: 15px; padding: 12px 3px; }
            .right-first-section i:hover{ color:#fff; }

            .second-section{ padding: 0px; margin: 0px; background-color: #F3F3F3; height: 300px; }
            .chat-section{ overflow-y:scroll; height:300px; }
            .chat-section ul{ padding: 0px; }
            .chat-section ul li{ list-style: none; margin-top:10px; position: relative; }
            .left-chat,.right-chat{ overflow: hidden; }
            .left-chat p,.right-chat p{ background-color:#007bff; padding: 10px; color:#fff; border-radius: 5px;  float:left;  width:60%; margin-bottom:20px; }
            .right-chat p{ float:right; background-color: #FFFFFF; color:#007bff; }
            .left-chat i,.right-chat i{ width:50px; height:20px; float:left; margin:0px 10px; }
            .left-chat i{color: #007bff;}
            .right-chat i{ float:right; color: #007bff;}
            .left-chat span,.right-chat span{ position: absolute; left:70px; top:40px; color:#B7BCC5; }
            .right-chat span{ left:65px; }
            .left-chat:before{ content: " "; position:absolute; top:0px; left:55px; bottom:150px; border:15px solid transparent; border-top-color:#007bff; }
            .right-chat:before{content: " "; position:absolute; top:0px; right:55px; bottom:150px;border:15px solid transparent; border-top-color:#fff; }

            .third-section{ border-top: 2px solid #EEEEEE; }
            .input-group{margin-top: 5px; margin-bottom: -5px; }
            textarea.form-control{ height: 40px; padding: 3px 6px; border:1px solid #007bff; }
            .input-group-addon{ background-color: #007bff; border: #007bff; color: #fff}
            input[type=checkbox]{margin: 2px 0 -5px; }
        </style>
    </head>

    <body>
    <div class="container">
        <div class="row" style="margin-top:70px; margin-bottom:0px;">
            <div class="col-sm-5">
                <div class="panel panel-default" style="padding:5px 0 5px 0 border:0">
                    <img src="https://res.cloudinary.com/missada/image/upload/v1523634470/squarequick_201671715640975.jpg" class= "img-responsive img-circle" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-body" align="center" style="padding: 20px 10px 20px 10px">
                        <h4 class= "hello">Hello! I'm</h4>
                        <h1 class="name"><b><?php echo $name; ?></b></h1>
                        <p style="font-size:20px">IT graduate, Web Designer and Blogger from Lagos, Nigeria</p>
                        <div>
                            <span class="fa fa-html5 icons html5"></span> &nbsp; &nbsp;
                            <span class="fa fa-css3 icons css3"></span>
                            <img src="https://res.cloudinary.com/missada/image/upload/v1523807521/bootstrap.jpg" width="150px" height="150px" class="img-responsive bootstrap-pic"/>
                        </div>
                        <p class="details"><span class="fa fa-envelope"> adamichelllle@gmail.com </span></p>
                        <p>
                            <a href="https://www.linkedin.com/in/adaobi-aniuchi-26173a105/"><span class="fa fa-linkedin-square fa-3x ln"></span></a>&nbsp;
                            <a href="https://web.facebook.com/michelle.aniuchi"><span class="fa fa-facebook-square fa-3x fb"></span></a>&nbsp;
                            <a href="https://twitter.com/AniuchiA"><span class="fa fa-twitter-square fa-3x tw"></span></a>&nbsp;
                            <a href="https://github.com/AdaM2196/"><span class="fa fa-github fa-3x git"></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chatbot Section -->
        <div class="main-section">
            <div class="row border-chat">
                <div class="col-md-12 col-sm-12 col-xs-12 first-section bg-primary">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6 left-first-section">
                            <p id="chatbot-heading" class="blink"><i class="fa fa fa-question-circle"></i> Chat with Me!</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 right-first-section">
                            <a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-clone" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row border-chat">
                <div class="col-md-12 col-sm-12 col-xs-12 second-section">
                    <div class="chat-section">
                        <ul id="chatSection">

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row border-chat">
                <div class="col-md-12 col-sm-12 col-xs-12 third-section">
                    <form class="message-box">
                        <div class="input-group">
                            <textarea class="form-control custom-control" id="textbox" autofocus="autofocus" rows="2" style="resize:none" placeholder="Enter your question here"></textarea>
                            <span class="input-group-addon btn btn-primary" id="send"><i class="fa fa fa-paper-plane fa-lg" aria-hidden="true"></i></span>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" checked id="enter"> Send On Pressing Enter</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <span style="z-index:50;font-size:0.9em;"><img src="https://theysaidso.com/branding/theysaidso.png" height="20" width="20" alt="theysaidso.com"/><a href="https://theysaidso.com" title="Powered by quotes from theysaidso.com" style="color: #9fcc25; margin-left: 4px; vertical-align: middle;">theysaidso.com</a></span>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/477bc8d938.js"></script>

    <script type="text/javascript">
        var username = "";

        //function to add extra zeros for my botdate
        function pad(number){
            return (number < 10 ? '0' : '') + number;
        }
        var myDate = new Date();
        var d = myDate.getDate();
        var m = pad(myDate.getMonth());
        var y = myDate.getFullYear();
        var min = pad(myDate.getMinutes());
        var hr = myDate.getHours();
        var botDate = d+'/'+m+'/'+y+' '+hr+':'+min+'';

        var welcome_message = "Hi there! I am Ada's Assitant, Pinky. What is your name?";

        //chatbots welcome message
        function welcome() {
            send_message(welcome_message);
        }

        //function to append users username in introductory greeting
        function displayUsername(message) {
            if(username.length < 6){
                username = message;
                send_message("Nice to meet you " + username + ". <br/>You could ask me a question right now, see my list of commands by typing <b style = 'color: #d16027'>pinky commands</b> or train me with a question of your own." +
                    "<br/> To do that, do the following: In your text field type this: <b style = 'color: #d16027'> train: question # answer </b>");
            }
        }

        //function to return bot's message
        function send_message(message) {
            $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
            var prevState = $("#chatSection").html();
            if(prevState.length > prevState.length){
                prevState = prevState + "<br/>";
            }
            $("#chatSection").html(prevState + "<li class='current_message'><div class='left-chat'><i class='fa fa-user-circle fa-3x'></i><p><b>Pinky: </b>" + message + "</p></div></li>");
            $(".current_message").hide();
            $(".current_message").delay(600).fadeIn();
            $(".current_message").removeClass("current_message");
            $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
        }

        //fuction to send the message received from the user to the php script
        function ai(message) {
            var prevState =$("#chatSection").html();
            var	userQuestion = "";
            if(userQuestion.length < prevState.length){
                var form_data = {userQuestion : message}
                $.ajax({
                    type: "POST",
                    url: "profiles/AdaM.php",
                    data: form_data,
                    success: function(data){
                        send_message(data);
                    },
                    error: function(){
                        alert("Unable to retrieve answer!");
                    }
                });
            }

        }

        //ON load of page.
        $(document).ready(function(){
            $(".left-first-section").click(function(){
                $("#chatbot-heading").removeClass('blink');
                $('.main-section').toggleClass("open-more");
            });

            $(".fa-minus").click(function(){
                $('.main-section').removeClass("open-more");
            });

            $('.main-section').addClass("open-more");

            welcome();
            $("#textbox").keypress(function(event){
                if( event.which == 13){
                    if( $("#enter").prop("checked") ){
                        $("#send").click();
                        event.preventDefault();
                    }
                }
            });

            $("#send").click(function(){
                var usernameTag = "<li><div class='right-chat'><i class='fa fa-user-circle-o fa-3x'></i><p><b>You: </b>";

                var prevState = $("#chatSection").html();

                if(prevState.length == 194){
                    var username = $("#textbox").val();

                    if(prevState.length > prevState.length){
                        prevState = prevState + "<br/>";
                    }

                    $("#chatSection").html(prevState + usernameTag + username + "</p><span>" +botDate+ "</span></div></li>");
                    $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
                    $("#textbox").val("");

                    displayUsername(username);
                }
                else{
                    var userQuestion = $("#textbox").val();
                    if(prevState.length > prevState.length){
                        prevState = prevState + "<br/>";
                    }

                    $("#chatSection").html(prevState + usernameTag + userQuestion + "</p></div></li>");
                    $(".chat-section").scrollTop($(".chat-section").prop("scrollHeight"));
                    $("#textbox").val("");

                    ai(userQuestion);
                }
            });


        });
    </script>
    </body>
    </html>
<?php } ?>
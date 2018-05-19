
<?php
    if(!defined('DB_USER')){
        if (file_exists('../../config.php')) {
            require_once '../../config.php';
        } else if (file_exists('../config.php')) {
            require_once '../config.php';
        } elseif (file_exists('config.php')) {
            require_once 'config.php';
        }
            
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);            
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
    }

  try {
      $sql = "SELECT * FROM interns_data WHERE username ='sammy'";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $names = $data['name'];
  $username = $data['username'];
  $profile_img = $data['image_filename'];


  try {
      $sql2 = 'SELECT * FROM secret_word';
      $q2 = $conn->query($sql2);
      $q2->setFetchMode(PDO::FETCH_ASSOC);
      $data2 = $q2->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $secret_word = $data2['secret_word'];

  
  
  
/** ChatBot Area **/
    if($_SERVER['REQUEST_METHOD'] === "POST"){
    
        function stripquestion($question){
            $strippedquestion = trim(preg_replace("([\s+])", " ", $question));
            $strippedquestion = trim(preg_replace("/[^a-zA-Z0-9\s\'\-\:\(\)#]/", "", $strippedquestion));
            $strippedquestion = $strippedquestion;
            return strtolower($strippedquestion);
        }
        
        function is_training($data){
            $keyword = stripquestion($data);
            if ($keyword=='train') {
                return true;
            }else{
                return false;
            }
        }
        function authorize_training($password){
            if ($password=='password') {
                return true;
            }else{
                return false;
            }
        }
        function training_data($body){
            $array_data = explode('#', $body);
/** Clear display **/
            foreach ($array_data as $key => $value) {
                $value = stripquestion($value);
            }
            return array('question' => $array_data[0], 'answer' => $array_data[1], 'password'=> $array_data[2]);
        }
        function train($question, $answer){
            global $conn;
            try {
                $insert_stmt = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
                $insert_stmt->bindParam(':question', $question);
                $insert_stmt->bindParam(':answer', $answer);
                $insert_stmt->execute();
                return "Hey, thank you";
            } catch (PDOException $e) {
                return "error: ". $e->getMessage();
            }
        }
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['message']) && $_POST['message']!=null) {
            $question = $_POST['message'];
            $strippedquestion = stripquestion($question);
            $array_data = explode(':', $strippedquestion);
            if (is_training($array_data[0])) { 
                extract(training_data(stripquestion($array_data[1])), EXTR_PREFIX_ALL, "train");
                if(authorize_training(stripquestion($train_password))){
                $answer = train($train_question, $train_answer);}else{$answer=" invalid password";}
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer
                ]);
                return;             
            }
            else{           
                $strippedquestion = "%$strippedquestion%";
                $answer_stmt = $conn->prepare("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
                $answer_stmt->bindParam(':question', $strippedquestion);
                $answer_stmt->execute();
                $results = $answer_stmt->fetch();
                if(($results)!=null){
                    $answer = $results['answer'];
                    echo json_encode([
                        'status' => 1,
                        'answer' => $answer
                    ]);
                    return;     
                }
                else{
                    $answer = "Oh waoh! i'm not familiar with this statement, but hey look on the bright side I was built to get smarter on the go!, so if you want to make me smarter type the following<br>
                    train: question #answer #password SammyBot will learn 😎";
                    echo json_encode([
                        'status' => 0,
                        'answer' => $answer
                    ]);
                    return;
                    
                }
            }
        }
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Achem Samuel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
<script>
        
        var slideInterval = 2500;
        function getFigures() {
            return document.getElementById('carousel').getElementsByTagName('figure');
        }
        function moveForward() {
            var pointer;
            var figures = getFigures();
            for (var i = 0; i < figures.length; i++) {
                if (figures[i].className == 'visible') {
                    figures[i].className = '';
                    pointer = i;
                }
            }
            if (++pointer == figures.length) {
                pointer = 0;
            }
            figures[pointer].className = 'visible';
            setTimeout(moveForward, slideInterval);
        }
        function startPlayback() {
            setTimeout(moveForward, slideInterval);
        }
        startPlayback();
        $('#carousel').hover(function () {
            $("#carousel").carousel('pause');
        }, function () {
            $("#carousel").carousel('cycle');
        });


     /**   function myChatBot() {
        var x = document.getElementById("myBot");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        } **/
/** Let's fix the SammyBot chat area */

    $(document).ready(function() {
                
                $('.chatWrap').hide();
                
                $('.chatHead').click(function(){
                    $('.chatWrap').slideToggle();
                });
                        
            /** SammyBot body */
                $('.chatBody').animate({scrollTop: $('.chatBody').prop("scrollHeight")}, 1000);
                    
                
                    
                    $('textarea').keypress(
                            function(e){
                            if (e.keyCode == 13) {
                                sendMessage(e); 
                            }
                    });
                    
                    
                });
                /** Message Zone */
                function sendMessage(e) {
                    var message = $('#message').val();
                    if (message.length>0) {
                        var rand = Math.floor(Math.random()*100);
                        var classname = 'sending-'+rand;
                        var selector = '.'+classname;
                        $('#message').val('');
                        $('.chatBody').append('<div class="second"><strong>You:</strong><br><p class="'+classname+'">Sending...</p></div>');
                        $('.chatBody').animate({scrollTop: $('.chatBody').prop("scrollHeight")}, 1000);
                        
                  $.ajax({
                        url: "/profiles/sammy.php",
                        type: "post",
                        data: {message: message},
                        dataType: "json",
                        success: function(response){
                    var answer = response.answer;
                    $(selector).html(''+message+'');
                    $(selector).removeClass(classname).addClass('sent');
                    $('.chatBody').append(' <div class="first"><strong style="color: white;">SammyBot</strong><br><p>'+answer+'</p></div>');
                  
                                            
                  },
                  error: function(error){
                            console.log(error);
                        }
                });
            }
        }

</script>
<style type="text/css">
body {
            background-size: cover;
            margin-top: 50px;
            height: 100%;
            font:normal 12px/1.6em Arial, Helvetica, 'San serif';
            
}

span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
}

#body {
            padding-top: 1px;
            height: 900px;
            width: 800px;
            margin: 0 auto;
}

.carousel-inner>.item>img,
.carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
}

.carousel-inner {
            text-align: center;
}

.carousel .item>p {
            display: inline-block;
}

.name {
            color: rgb(0, 0, 0);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: right;
            position: relative;
            margin-top: 0px;
            right: 5%;
            text-align: center;
            font-style: normal;
            letter-spacing: 1px;
            font-size: 13px;
}

#center {
            position: absolute;
            top: 15%;
            float: left;
            padding-left: 20px;
}

p {
            color: rgb(0, 0, 0);
            font-family: 'Sans-Serif', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: center;
            line-height: 2;
            text-align: center;
            margin: 5px 10px;
            padding: 5px 10px;
            background-color: #f7f7f7;
            box-shadow: -2px -2px 9px #f7f7f7b9;
}

#artcenter {
            position: absolute;
            display: inline-block;
            top: 340%;
            left: 52%;
            width: 500px;
            transform: translateX(-50%) translateY(-50%);
}

.right {
            float: right;
            margin-left: 30px;
}

.background {
            width: 800px;
}

       

#layer-sub {
            float: right;
            margin-right: 3px;
            margin-left: 3px;

}

#nav a:visited,
#nav a:link {
        
            text-decoration: none;
            color: #ffffff;
}

#nav a:hover {
            text-decoration: none;
            color: #ffffff;
}

#nav a {
            margin: 0 5px;
            font-size: 15px;
}

#nav a:hover {
            text-decoration: underline;
            color: #ffffff;
}

#nav {
            color: snow;
            text-align: center;
            background-image: url("https://res.cloudinary.com/dyuuulmg0/image/upload/v1523622023/sammm.jpg");
            height: 130px;
            display: inline-block;
            width: 800px;
            padding-top: 20px;
            position: relative;
            letter-spacing: 1.5px;
            
}

#bg {
            height: 20px;
}

#link {
            float: right;
            padding-right: 20px;
            padding-top: 15px;

}

#footer {
            transform: translateX(0%) translateY(430px);
            clear: both;
            background: #f7f7f7;
            padding-top: 10px;
            padding-bottom: 10px;
            border-top: 1px solid #f0e9eb;
            text-align: center;
}

#like {
            transform: translateX(-0.1%) translateY(199px);
            margin: 20px;
            width: 230px;
            padding: 5px 10px;
            background-color: #f7f7f7;
            box-shadow: -2px -2px 9px #f7f7f7b9;
}

h5 {
            color: rgb(6, 65, 124);
            font-size: 20px;
}

h4 {
            color: rgb(105, 15, 19);
            font-size: 20px;
}

#tod {
            padding-top: 1px;
            border-left: 1px solid #5e5c5c46;
            border-right: 1px solid #5e5c5c46;
            border-top: 1px solid #5e5c5c46;
            border-bottom: 1px solid #5e5c5c46;
            height: 900px;
            width: 802px;
            
}

#foot-container {
            padding-top: 59px;
}

#cent {
        float:left;
        margin-right: 50px;
        text-align: center;
        align-content: flex-start;
        transform: translateX(-10px) translateY(10px);
}

.text {
            background: -webkit-linear-gradient(0deg, #FF0F00, rgba(17, 26, 240, 0.55), #EC0F13);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
}

        .chatBox{
                cursor:pointer;
                background:#ffffff;
                bottom:-5px;
                border-radius: 5px 5px 0px 0px;
            }
            .chatHead{
                background:rgb(59, 2, 59);
                padding:15px;
                color: #ffffff;
                border-radius: 5px 5px 0px 0px;
            }
        
            .chatBody{
                height:300px;
                font-size:12px;
                overflow:auto;
                overflow-x:hidden;
                
            }
            
            .first{
                margin-top: 10px;
                margin-right:20px;
                padding:15px;
                background:rgb(59, 2, 59);
                margin-left:20px;
                position:relative;
                min-height:10px;
                border-radius:5px;
            }
            .first:before{
                  content: "";
                  position: absolute;
                  width: 0px;
                  height: 0px;
                  left: -28px;
                  top: 7px;
                  border-radius:5px;
                  border: 15px solid;
                  border-color: transparent #99ffcc transparent transparent;
            }
            .second{
                margin-top: 10px;
                margin-right:20px;
                padding:15px;
                background:rgb(18, 15, 68);
                margin-left:20px;
                min-height:15px;
                position:relative;
                border-radius:5px;
                color:#ffffff;
            }
            .second:before{
                 content: "";
                  position: absolute;
                  width: 0px;
                  height: 0px;
                  right: -28px;
                  top: 7px;
                  border-radius:5px;
                  border: 15px solid;
                  border-color: transparent  transparent transparent #6699ff;
            }

#message{
            border: transparent;
            border-top:1px solid #bdc3c7;
            width:100%;
            padding-right:10px;
            padding-left:10px;
            color: #ffffff;
            font-style: justify;
            background: rgba(187, 67, 187, 0.801);
            border-radius:30px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
}

.con {
        transform: translateX(800px) translateY(-420%);
        clear: both;
        height: 50px;
        width: 90%;
        position: fixed;
        margin-right: 10px;
        text-align: center;
}

</style>
</head>

<body >

    <div class="container">
            <div id="body">
                <div id="tod">
                    <div id="layer1">
                        <div id="head-image">
                            <div id="nav">
                                <a href="https://hng.fun">Home</a> |
                                <a href="https://sammy-favcode.heroku.com">About Me</a> |
                                <a href="#">Contact Me</a>
                                </br>
                                <div id="link">
                                    <a class="right" href="https://twitter.com/_Achimedes" target="_blank">
                                        <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625296/tweet.png" height="25" width="25"
                                        />
                                    </a>
                                    <a class="right" href="https://github.com/Achemsamuel" target="_blank">
                                        <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523625295/itytytyt.png" height="25" width="25"
                                        />
                                    </a>
                                    <a class="right" href="https://web.facebook.com/achimede" target="_blank">
                                        <img class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523626151/face.jpg" height="25" width="25"
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                
                        <div id="bg"></div>
                        <div class="background">
                            <div class="name">
                                <h4>Achem Samuel - Web | UI/UX | Android Developer</h4>
                                <hr>
                                <div id="outside-container">
                                    <section id="artcenter">
                                        <section id="carousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <figure class="item active" role="option">
                                                    <p>
                                                        I am a tech enthusiast, dedicated to learning and improving on my skills on a daily basis. I believe that hard and dedication
                                                        to the completion of a project should not be forced on anyone. </br>
                                                        A person should be willing to choose to work hard because of the vision and goals of a project.
                
                
                                                        </br>
                                                        Some Quotes I love </br>
                                                        "The price of success is hard work, dedication to the job at hand, and the determination that whether we win or lose, we
                                                        have applied the best of ourselves to the task at hand." </br>
                                                        -
                                                        <em>Vince Lombardi</em>
                                                        </br>
                
                
                                                    </p>
                                                </figure>
                                                <figure class="item" role="option">
                                                    <p>
                                                        "I'm proud of my hard work. Working hard won't always lead to the exact things we desire. There are many things I've wanted
                                                        that I haven't always gotten. But, I have a great satisfaction in the blessings from
                                                        my mother and father, who instilled a great work ethic in me both personally and
                                                        professionally." </br>
                                                        -
                                                        <em>Tamron Hall</em>
                                                        </br>
                                                        A major strong point for me in the design process is that the designer must clearly understand the mind og the client and
                                                        work around the clock to help the client achieve this dream. It's in this that the
                                                        designer should derive satisfaction.
                                                    </p>
                                                </figure>
                                            </div>
                                        </section>
                
                                </div>
                            </div>
                            <div>
                                <img id="center" class="img-circle" src="https://res.cloudinary.com/dyuuulmg0/image/upload/v1523621000/sam1.jpg" alt="I am Achem Samuel"
                                    height="250" width="210" />
                
                                <div id="like">
                                    <h5 style="text-align: justify">What I like</h5>
                                    <hr>
                                    <li>
                                        Music
                                    </li>
                                    <li>
                                        Coding
                                    </li>
                                    <li>
                                        Reading
                                    </li>
                                    <li>
                                        Swimming
                                    </li>
                                    <li>
                                        Traveling
                                    </li>
                                </div>
                            </div>
                
                        </div>


                        <div class="con">
                            <div class="col-md-3">
                            
                                <div class="chatBox">
                                    <div class="chatHead">
                                        SammyBot
                                    </div>
                                
                                    <div class="chatWrap">  
                                        <div class="chatBody">
                                            <!-- SammyBot's messages -->
                                            <div class="first">
                                                    <p>Hi... SammyBot here!<br> This is where you tell me what i can do for you...😎 </br> Let's get started amigo!</p>
                                            </div>
                                            
                                            <!-- sammybot's messages -->
                                            <?php if (isset($question)) {?>
                                            <div class="first">
                                                    <p><?php echo $question; ?></p>
                                            </div>
                                            <?php } ?>

                                            <!-- your message -->
                                            <?php if (isset($answer)) { ?>
                                                <div class="second">
                                                        <p><?php echo $answer; ?></p>  
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="chatFooter">
                                            <label for="message" class="sr-only">Message</label>
                                            <textarea id="message" name="message"  placeholder="Say something here!" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>



                    </div>
                    
                </div>
                








                        <footer id="foot-container">
                            <div id="footer">
                                Copyright &copy; 2018 Achem Samuel. All rights reserved.
                            </div>
                            
                        </footer>
                        
                
            </div>
            

    </div>
  


    </div>

</body>

</html>
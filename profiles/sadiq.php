<?php 
    require 'db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'sadiq'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<?php

 // enter bot {pam pararam}
if($_SERVER['REQUEST_METHOD'] === "POST"){
    
        function stripquestion($question){
            // remove whitespace first
            $strippedquestion = trim(preg_replace("([\s+])", " ", $question));
            // now let's remove any other character asides :, (, ), ', and whitespace
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

            // clear
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
                return "Thanks for the new Jutsu, Sensei!";
            } catch (PDOException $e) {
                return "An error occured: ". $e->getMessage();
            }
        }
        // set to debug mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Let's prepare a statement to just randomly fetch any answer like so--
        // $random_answer = $conn->prepare("SELECT answer FROM chatbot ORDER BY RAND() LIMIT 1");
        
        if (isset($_POST['message']) && $_POST['message']!=null) {
            $question = $_POST['message'];
            // remove question marks and strip extra spaces
            $strippedquestion = stripquestion($question);
            // check if we're in training mode
            $array_data = explode(':', $strippedquestion);
            if (is_training($array_data[0])) { 
                
                // get training data
                extract(training_data(stripquestion($array_data[1])), EXTR_PREFIX_ALL, "train");
                
                if(authorize_training(stripquestion($train_password))){
                // store question in database
                $answer = train($train_question, $train_answer);}else{$answer=" incorrect password, authorization failed";}
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer
                ]);
                return;
                
            }
            else{
                // then we're askin a question
            
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
                $answer = "Sorry, I do not know. You can train me by entering the following command: <br>
                <code class='codetext'>train: your question # the answer # password</code>
                ";
                echo json_encode([
                    'status' => 0,
                    'answer' => $answer
                ]);
                return;
                
            }
            }
        }
        // $stmt = $conn->prepare("SELECT * from chatbot WHERE question LIKE '%hello there%' LIMIT 1");
        // $stmt->execute();
        // $stmt->execute();
        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Just in case there are multiple answers, select a random one
}

    //  Exit Bot
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sadiq Profile</title>
    <!-- style -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- custom style -->
    <style type="text/css">
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .section, .row {
            margin: 1em 20%;
            padding: auto;
            box-shadow: 5px 5px 5px lightgrey;
            border-top: 1px solid lightgrey;
            border-left: 1px solid lightgrey;
        }
        span {
            opacity: 0.5;
            font-size: 16px;
        }
        img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
        a:link, a:visited, a:hover {
            text-decoration: none;
        }
        a:hover {
            background: beige;
            padding: 5px 0;
            box-shadow: 2px 0 2px #696;
        }
        p {
            display: inline-flex;
        }
        p:first-child {
            padding-top: 5px;
        }
        p:last-child {
            padding-bottom: 5px;
        }
        figure, h3 {
            padding-top: 50px;
        }
        h2, h3 {
            font-size: 28px;
        }
        h2#tag {
            opacity: 0.7;
        }

        /* bot style */
        .card.profile-card{
            
            width: 90%;
            max-width: 400px;
            background-color: #fff;
            color: #777;
            /*min-height: 90%;*/
            
        }
        .profile-card h1{
            font-size: 1.8rem;
        }
        .span-width{
            width: 80%;
        }
        .bot-panel{
            height: 80vh;
            width: 90%;
            max-width: 400px;
        }
        @media(min-width: 750px){
            .bot-panel{
                position: fixed;
                right: 0;
                bottom: 0;
            }
        }
        .bot-panel .card-header{
            background-color: rgba(255, 0, 0, 0.5); //t
            color: #fff;
        }
        .bot-panel .card-body{  
            overflow-y: scroll;
        }
        .nagatocon{ 
            max-width: 60px;
            border: 1px solid #fff;
            border-radius: 50%;
        }
        
        .ms-rta:after{
            width: 0;
            height: 0;
            content:"";
            top:-5px;
            left:14px;
            position:relative;
            border-style: solid;
            border-width: 13px 13px 0 0;
            border-color: whitesmoke transparent transparent transparent;           
        }  
        .text{
            width:75%;
            display:flex;
            flex-direction:column;
        }
        .text-r{
            float:right;padding-left:10px;
        }
        .avatar{
            display:flex;
            justify-content:center;
            align-items:center;
            width:25%;
            float:left;
            padding-right:10px;
        }
        .macro{
            margin-top:5px;
            width:85%;
            border-radius:5px;
            padding:5px;
            display:flex;
        }
        .ms-rta{
            float:right;background:whitesmoke;
        }
        .ms{
            float:left;
            background:#ffe4c4;
        }
        .codetext {
            color: red;
        }
    </style>
</head>
<body>

    <div class="row section">
        <div class="col-md-12">
            <figure>
                <img alt="dp" class="img-responsive" src="http://res.cloudinary.com/sastech/image/upload/v1523628995/caesarapp_20175292858459_wpfxlo.jpg">
                <figcaption><p><?php echo $user->name ?></p></figcaption>
            </figure>
            <h2 id="tag">Web Developer<br />
            <span>HTML | CSS | JS | JQUERY | ANGULAR | BOOTSTRAP | PHP</span></h2>
        </div>
    </div>

    <div class="row section">
        <div class="col-md-12">
            <h3>Check Me Out</h3>
            <div class="row">
                <div class="col-md-12">
                    <p><a href="https://www.codepen.io/sastech" target="_blank" style="color: black;">Codepen</a></p>
                    <p><a href="https://www.github.com/saslamp" target="_blank" style="color: black;">GitHub</a></p>
                    <p><a href="https://www.twitter.com/_saslamp" target="_blank" style="color: skyblue;">Twitter</a></p>
                    <p><a href="https://www.linkedin.com/in/abubakar-sambo-ii-102726b4" target="_blank" style="color: lightskyblue;">LinkedIn</i></a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- bot section -->
            <div class="row section">
                <div class="card border-0 bot-panel ml-auto mr-auto">
                  <div class="card-header">
                    <img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon"> <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">NagatoBot</h4>
                  </div>
                  <div class="card-body" id="chatWindow">
                    
                    <!-- nagato speaks -->
                        <div class="ms macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon"></div>
                            <div class="text text-l">
                                <p>Konichua. I am NagatoBot. How may i help?</p>
                                
                            </div>
                        </div>

                    <!-- nagato speaks -->
                        <div class="ms macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon align-self-start"></div>
                            <div class="text text-l">
                                <p>You can ask me anything. If I can not answer them, then train me by entering this format: <br>
                                    <code class="codetext">train: your question # the answer # password</code>
                                </p>
                                
                            </div>
                        </div>
                        <?php if (isset($question)) {
                            ?>
                        
                    <!-- User's message -->
                  
                        <div class="ms-rta macro">
                            <div class="text text-r">
                                <p><?php echo $question; ?></p>
                                
                            </div>
                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div>

                        </div>

                        <?php } ?>

                    <?php if (isset($answer)) { ?>
                        <!-- nagato speaks -->
                        <div class="ms macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon"></div>
                            <div class="text text-l">
                                <p><?php echo $answer; ?></p>                                
                            </div>
                        </div>
                    <?php } ?>

                  </div>

                  <div class="card-footer">
                    <form class="form-inline" method="post" id="messageForm">
                        <div class="form-group mb-2 col-10 mr-auto">
                            <label for="message" class="sr-only">Message</label>
                            <input type="text" class="col-12 form-control" id="message" name="message" placeholder="Enter your message..">
                        </div>
                        <button type="submit" class="col-2 mx-auto btn btn-primary mb-2">Go</button>

                    </form>
                    
                  </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // scroll to the last message
        $('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);
            $('#messageForm').submit(function(e){
                e.preventDefault();
                sendMessage(e); 
            });
            
            
            
        });
    function sendMessage(e) {
        var message = $('#message').val();
        if (message.length>0) {
            
            // anti-ms overlap
            var rand = Math.floor(Math.random()*100);
            var classname = 'sending-'+rand;
            var selector = '.'+classname;
            $('#message').val('');
            $('#chatWindow').append('<div class="ms-rta macro "><div class="text text-r"><p class="'+classname+'">Sending...</p></div>'+
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div></div>');
            $('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);
            
          $.ajax({
                url: "/profiles/sadiq.php",
                type: "post",
                data: {message: message},
                dataType: "json",
                success: function(response){
            var answer = response.answer;
            $(selector).html(''+message+'');
            $(selector).removeClass(classname).addClass('sent');
            $('#chatWindow').append(' <div class="ms macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon align-self-start"></div><div class="text text-l"><p>'+answer+'</p></div></div>');
          
          },
          error: function(error){
                    console.log(error);
                }
          // .catch(function (error) {
          //   $('#chatWindow').append(' <div class="ms macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="nagatocon align-self-start"></div><div class="text text-l"><p>sorry, an error occured</p></div></div>');
          // });
          
          // e.preventDefault();
        });
    }
}
</script>

</body>
</html>
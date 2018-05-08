<<<<<<< HEAD
          
 <!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Charlesposible Profile</title>
    <style type="text/css">

    body{
        background-color: #fff;
        margin: 0px;
    }

    .nav-page{
                float: center;
            }
        li {
            margin-right: 60px;
            font-weight: bold;
        }
        .my-pic{
            margin-left: 40%;
            height: 300px;
            border-radius: 50%;
        }
        .img-background{
            background-color:#ADFF2F;
        }
        h3{
            font-size:1.3em;
            font-weight: normal;
            text-align: center;
            margin-top: 30px;
            color: grey;


        }
      
        .head-text{
            font-family: sans-serif;
            font-style: italic;
            text-decoration: underline;
            color: grey;
            font-size: 1.2em;
            margin-left: 40%; 
            margin-top: 30px;
        }
        .para-text{
            border:0px;
            text-align: center;
        }
        .para{
            font-family: sans-serif;
            font-style: italic;
            color: grey;
            margin-top: 30px;
            margin-left: 30px
            font-size: 1.2em;
            font-weight: bold;
            text-align: justify;
        }

        .footer {
            position: fixed;
            width: 100%;
            background-color: grey ;
            color: white;
            text-align: center;
} 
        body, html {
            margin: 0px;
            background-color: skyblue; !important;
            height: 100%;
        }
        .my-body {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 85%;
            display: flex;
            flex-direction: column;
            max-width: 400px;
            height: 400px;
            float: right;
        }
        .chat-output {
            flex: 1;
            padding: 10px;
            display: flex;
            background: white;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 800px;
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #94edb3;
            color: #000;
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #d5e5be;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 20px;
        }
        .chat-input {
            padding: 20px;
            background: #eee;
            border: 1px solid #ccc;
            border-bottom: 0;
        }
        .chat-input .user-input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 8px;
        }

    </style>
    
</head>
    

<body>
    
    <?php
        
    require_once 'db.php';
   

    try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();
  
    $sql_query = 'SELECT * FROM interns_data WHERE username="Charlespossible"';
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }


  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
    ?>
    
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light  nav-page">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Portforlio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
</header>

    <div class="img-background">
        <img src= "<?php echo $image_url ?>" alt="My Profile Picture" class="my-pic">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><b>Name:</b>  <em><?php echo $username ?></em></h3>
            </div>
            
        </div>
            
    </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="head-text">Formal Introduction</h4>
                </div>
            </div>
            <div class="row">
                <div class="para-text">
                    <p class="para">Hi, My name is Mbadugha Charles. I am a web developer based in Lagos. I am very comfortable with HTML , CSS, Javascript and  PHP. I am a life long learner so improviment is assured.</p>
                    <p class="para">I also get my hands dirty with Laravel and codeigniter. Curently and i am brushing up on React and Nodejs. I am an avid learner and a pro-active doer.</p>
                    <p class="para"> I am a very good cook. So when not coding, I cook. I mix ingredients to produce delicious taste exactly the way i mix codes to produce quality websites.</p>
                </div>
            </div>
        </div>
    <div class="oj-sm-12 oj-md-6 oj-flex-item">
            <div class="my-body">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message"> DubemBot is my name! You can engage me in a conversation! </br>You can make me smarter by training me, use this format - 'train: question # answer # password'. </br>Type 'aboutbot' to know more about me.</div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Ask me things">
                    </form>
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
        echo "<div id='result'>Dubembot v1.0 - I am smart bot. I can learn new things if you teach me!</div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
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
                        echo "<div id='result'>I am Now Smarter!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I am familiar with this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Wrong Password, Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'> I can be better if you train me. Use the following format to make me smarter - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>


   
    
   
   
</body>

<script>
    var outputArea = $("#chat-output");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: "profile.php?id=Charlespossible",
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>

</html>


=======
          
 <!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Charlesposible Profile</title>
    <style type="text/css">

    body{
        background-color: #fff;
        margin: 0px;
    }

    .nav-page{
                float: center;
            }
        li {
            margin-right: 60px;
            font-weight: bold;
        }
        .my-pic{
            margin-left: 40%;
            height: 300px;
            border-radius: 50%;
        }
        .img-background{
            background-color:#ADFF2F;
        }
        h3{
            font-size:1.3em;
            font-weight: normal;
            text-align: center;
            margin-top: 30px;
            color: grey;


        }
      
        .head-text{
            font-family: sans-serif;
            font-style: italic;
            text-decoration: underline;
            color: grey;
            font-size: 1.2em;
            margin-left: 40%; 
            margin-top: 30px;
        }
        .para-text{
            border:0px;
            text-align: center;
        }
        .para{
            font-family: sans-serif;
            font-style: italic;
            color: grey;
            margin-top: 30px;
            margin-left: 30px
            font-size: 1.2em;
            font-weight: bold;
            text-align: justify;
        }

        .footer {
            position: fixed;
            width: 100%;
            background-color: grey ;
            color: white;
            text-align: center;
} 
        body, html {
            margin: 0px;
            background-color: skyblue; !important;
            height: 100%;
        }
        .my-body {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 85%;
            display: flex;
            flex-direction: column;
            max-width: 400px;
            height: 400px;
            float: right;
        }
        .chat-output {
            flex: 1;
            padding: 10px;
            display: flex;
            background: white;
            flex-direction: column;
            overflow-y: scroll;
            max-height: 800px;
        }
        .chat-output > div {
            margin: 0 0 20px 0;
        }
        .chat-output .user-message .message {
            background: #94edb3;
            color: #000;
        }
        .chat-output .bot-message {
            text-align: right;
        }
        .chat-output .bot-message .message {
            background: #d5e5be;
        }
        .chat-output .message {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 20px;
        }
        .chat-input {
            padding: 20px;
            background: #eee;
            border: 1px solid #ccc;
            border-bottom: 0;
        }
        .chat-input .user-input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 8px;
        }

    </style>
    
</head>
    

<body>
    
    <?php
        
    require_once 'db.php';
   

    try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();
  
    $sql_query = 'SELECT * FROM interns_data WHERE username="Charlespossible"';
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }


  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
    ?>
    
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light  nav-page">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Portforlio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
</header>

    <div class="img-background">
        <img src= "<?php echo $image_url ?>" alt="My Profile Picture" class="my-pic">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><b>Name:</b>  <em><?php echo $username ?></em></h3>
            </div>
            
        </div>
            
    </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="head-text">Formal Introduction</h4>
                </div>
            </div>
            <div class="row">
                <div class="para-text">
                    <p class="para">Hi, My name is Mbadugha Charles. I am a web developer based in Lagos. I am very comfortable with HTML , CSS, Javascript and  PHP. I am a life long learner so improviment is assured.</p>
                    <p class="para">I also get my hands dirty with Laravel and codeigniter. Curently and i am brushing up on React and Nodejs. I am an avid learner and a pro-active doer.</p>
                    <p class="para"> I am a very good cook. So when not coding, I cook. I mix ingredients to produce delicious taste exactly the way i mix codes to produce quality websites.</p>
                </div>
            </div>
        </div>
    <div class="oj-sm-12 oj-md-6 oj-flex-item">
            <div class="my-body">
                <div class="chat-output" id="chat-output">
                    <div class="user-message">
                        <div class="message"> DubemBot is my name! You can engage me in a conversation! </br>You can make me smarter by training me, use this format - 'train: question # answer # password'. </br>Type 'aboutbot' to know more about me.</div>
                    </div>
                </div>

                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                        <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Ask me things">
                    </form>
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
        echo "<div id='result'>Dubembot v1.0 - I am smart bot. I can learn new things if you teach me!</div>";
    }
    function train($input) {
        $input = explode('#', $input);
        $question = trim($input[0]);
        $answer = trim($input[1]);
        $password = trim($input[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'. $question .'" and answer = "'. $answer .'" LIMIT 1';
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
                        echo "<div id='result'>I am Now Smarter!</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I am familiar with this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>Wrong Password, Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'> I can be better if you train me. Use the following format to make me smarter - 'train: question # answer # password'</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>


   
    
   
   
</body>

<script>
    var outputArea = $("#chat-output");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<div class='bot-message'><div class='message'>${message}</div></div>`);
        $.ajax({
            url: "profile.php?id=Charlespossible",
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'><div class='message'>" + result + "</div></div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>

</html>


>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf

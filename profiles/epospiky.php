    <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="Epospiky"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>


<?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user-input'];
        $temp = explode(':', $data);
        $temp2 = preg_replace('/\s+/','', $temp[0]);
        
        if($temp2 === 'train'){
            train($temp[1]);
        }elseif($temp2 === 'aboutbot') {
            aboutbot();
        }elseif($temp2==='help'){
            help();
        }elseif($temp2 === 'version'){
            echo "<div id='result'> <b>Santra v1.0</b></div>";
        }else{
            getAnswer($temp[0]);
        }
    }
  ##About Bot
    function aboutbot() {
        echo "<div id='result'><strong>I am Santra, a power chatbot created by Epospiky </strong></div>";
    }
   function help(){
   echo "<div id ='result'>Type <b>about</b> to know about me.<br/>Type <b>version</b> to know my version.<br/>To train me,use this format:<b>train:question#answer#password</b> where password is password </div>";
   
   }
  
  ##Train Bot
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
                        echo "<div id='result'>Thank you for training me. </br>
      Now you can ask me same question, and I will answer it correctly.</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already understand this. Teach me something new!</div>";
            }
        }else {
            echo "<div id='result'>You entered an invalid Password. </br>Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry! I've not been trained to learn that command. </br>Would you like to train me?
</br>You can train me to answer any question at all using, train:question#answer#password
</br>You can type in <b>help</b> to begin with.</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title> Epospiky's Portfolio </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- link to main stylesheet -->
       <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/3.3.4/css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

       <link rel="stylesheet" type="text/css" href="https://static.oracle.com/cdn/jet/v4.1.0/default/css/alta/oj-alta-min.css">
       <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/require.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      
        <style>

        ul.navi {
        list-style-type: none;
        margin: 0;

        }

        .navi li a {
        display: block;
        font-size: 20px;
        color: #000;
        padding: 0px;
        text-decoration: none;
          }
        /* Change the link color on hover */
       .nav-right{
        border: 0px!important;
       }
       .user h3{
        font-size: 30px;
        color:blue;
        font-weight: bolder;
        font-family: 'as destine';
        cursor: pointer;
        text-align: center;
       }
       .user h3:hover{
          color: black;
       }
       .content{
        background-color: #C0C0C0;
        border-radius: 100px 0px;
        max-width: 500px;
        border: 0px solid black;
        padding: 50px;
        margin-top: 50px;
        margin-bottom: 20px;
        box-shadow: -5px 0px 5px #000, 0px 5px 5px #000;
       }
       .img-grid img{
        border-radius: 50%;
        border: 2px solid black;
        text-align: center;
       }
       .skill{
        padding-top: 30px;
        padding-right: 20px;
       }
       .skill p {
        text-align: center;
       }

      .logo{
        padding-top: 30px;
        width: 40px;
        margin: 10px;
        transition: all 600ms;
      }
      .logo ul{
        list-style-type: none;
         display: block;
         text-decoration: none;
      }
      .logo li {
        display: block;
        text-decoration: none;
      }



      .logo:hover{
        transform: scale(1.3, 1.3);
      }
    .chat {
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      overflow-y:absolute;
      padding: 0 35px 35px;
      border: none;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
      max-height: 300px;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      -webkit-flex-direction: column;
      flex-direction: column;
    }
    .chat p.san{
      float: left;
        font-size: 14px;
        padding: 20px;
        border-radius: 0px 50px 50px 50px;
        background-color: #b0bfff;
        max-width: 250px;
        clear: both;
        display: inline-block;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
    }
    .chat p.me{
      float: right;
        font-size: 14px;
        padding: 20px;
        border-radius: 50px 0px 50px 50px;
        background-color: #e0e0f0;
         max-width: 250px;
         clear: both;
         margin-bottom: 0px !important;
         margin-top: 2px !important;
    }


        .input {
          padding: 0 35px 35px;
          height: 50px;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .chat-btn{
         
           border-radius: 6px;
           cursor: pointer;
           z-index: 1;

           color: #fff;
           background-color: blue;
           transition: all 0.5s;
        }
        .chat-btn:hover{
          color: #000;
          background-color: #6bcfcf;
        }
        .modal-cont{
          background-color: #fff;
        }
        .san-img{
          background: url('http://res.cloudinary.com/epospiky/image/upload/v1525365569/san.png');
          background-repeat: no-repeat;
          background-size: 30px;
        }
        .me-img{
          background: url('http://res.cloudinary.com/epospiky/image/upload/v1525365549/human.png');
          background-repeat: no-repeat;
          background-size: 30px;
        }
    </style>
  </head>
  <body class="oj-web-applayout-body">

<div class="container oj-web-applayout-page">
 <div class="content oj-web-applayout-max-width oj-web-applayout-content">
  <div class="img-grid  oj-flex  oj-sm-12 oj-lg-offset-6">
    <div class="oj-sm-3"></div>
    <div class="oj-flex-item oj-sm-9">
      <img src="http://res.cloudinary.com/epospiky/image/upload/v1523739075/epo.png" class="oj-sm-center img-responsive" height="250px">
    </div>
  </div>

  <div class="user">
      <h3 ><?php echo $name;?></h3>
  </div>
  <div class="skills_grid oj-flex oj-sm-12">
    <div class="skill oj-flex-item oj-sm-4">
      <p>FrontEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 80%;"> 
            <span class="">80%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>BackEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 60%;"> 
            <span class="">60%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>UI/UX</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 50%;"> 
            <span class="">50%</span> 
            </div>
        </div>
    </div>
    <div class="log0">
      <ul class="oj-flex navi">
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.twitter.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768461/twitter.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.github.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768442/githublogo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.linkedin.com/in/ernest-paul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768390/linkedin_logo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://plus.google.com/+ErnestPaul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768412/google_plus.png"></a>
        </li>
      </ul> 
    </div>
  </div>

  <button class="btn col-sm-offset-5 chat-btn" data-toggle='modal' data-target='#chatModal'><i class="fa fa-comment-alt">Chat</i></button>
        <!--modal-->
   <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="chatModalLabel"><i class="fa fa-user"></i><b>Santra</b></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body "  > 
            <div class="chat" id="chat">
                
                  
                    <p class="san">Hi! I'm Santra. You are free to ask me anything.   </p>
                    <p class="san">To train me, use this syntax - "train:question#answer#password".</p>
                   <p class="san">The Password is: <b>password</b>. </p>
                    <p class="san">Type help to begin with.</p>
            </div>
                
          </div>  
          <div class="clearfix"></div>
                <div class="chat-input">
                    <form action="" method="post" id="user-input-form">
                      <div class="input-group">
                        <input type="text" class="form-control" name="user-input" id="user-input" class="user-input" placeholder="chat me up...">
                          <span class="input-group-addon"><button class="btn btn-primary" id="send"><i class="fa fa-send"></i></button></span>
                      </div>
                    </form>
                </div>
        </div>
     </div>
    </div>
    
    
    
    </div>  
 </div>




    



<script>
    var outputArea = $("#chat");
    $("#user-input-form").on("submit", function(e) {
        e.preventDefault();
        var message = $("#user-input").val();
        outputArea.append(`<p class='me'>${message}</p>`);
        $.ajax({
            url: 'profile.php?id=epospiky',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<p class='san'>" + result + "</p>");
                    $('#chat').animate({
                        scrollTop: $('#chat').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });
        $("#user-input").val("");
    });
</script>
</div>
</body>
</html>

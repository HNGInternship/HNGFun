 <?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="puenehfaith"';
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
            echo "<div id='result'> <b>Jayo v1.0</b></div>";
        }else{
            getAnswer($temp[0]);
        }
    }
  ##About Bot
    function aboutbot() {
        echo "<div id='result'><strong>hi my name na Jayo, my madam want you to teach me more about javascript </strong></div>";
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
                        echo "<div id='result'>you do well to train me </br>
      i sabi HTML ask me anything wey you no sabi</div>";
                    };
                } catch (PDOException $e) {
                    throw $e;
                }
            }else{
                echo "<div id='result'>I already sabi this one o!</div>";
            }
        }else {
            echo "<div id='result'>Ewo!! na wrong password you enter so o </br>Try Again!</div>";
        }
    }
    function getAnswer($input) {
        $question = $input;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){
            echo "<div id='result'>Sorry o! dem never train me to learn this one </br>Abeg i want you to train me
</br>for me to answer your question well well make you type, train:question#answer#password
</br>You fit type <b>help</b> to know more about me.</div>";
        }else {
            $rand_keys = array_rand($data);
            echo "<div id='result'>". $data[$rand_keys]['answer'] ."</div>";
        }
    }
    ?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>pueneh</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        
        <style type="text/css"> 
 body{
  padding-top: 60px;
    background-color: #0000ff;
    background-image:url(http://res.cloudinary.com/pueneh/image/upload/v1524600731/background.jpg);
    background-size:cover;
}
p{
  color: #ffffff;
}
h1{
  color: #ffffff;
  float: center;
}
h2{
  color: #000000;
}
ul{
  color: #ffffff;
}
h3{
  color: #ffffff;
}
#nav{
  background-color: white;
  color:white;
  float: right;
  width: 100%
  height:100px;
}
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-google {
  background: #dd4b39;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-youtube {
  background: #bb0000;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}
#bodybox {
  margin: auto;
  max-width: 550px;
  font: 15px arial, sans-serif;
  background-color: white;
  border-style: solid;
  border-width: 1px;
  padding-top: 10px;
  padding-bottom: 15px;
  padding-right: 15px;
  padding-left: 15px;
  box-shadow: 3px 3px 3px grey;
  border-radius: 10px;
}
#chatborder {
  border-style: solid;
  background-color: #0000ff;
  border-width: 15px;
  margin-top: 15px;
  margin-bottom: 15px;
  margin-left: 10px;
  margin-right: 25px;
  padding-top: 15px;
  padding-bottom: 20px;
  padding-right: 15px;
  padding-left: 10px;
  border-radius:15px;
}
.chatlog {
   font: 10px arial, sans-serif;
}
#chatbox {
  font: 10px arial, sans-serif;
  height: 15px;
  width: 100%;
}
.chat p.Jayo{
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
  .chat p.me{
        float: right;
        font-size: 12px;
        padding: 20px;
        border-radius: 20px 0px 20px 20px;
        background-color: #efc940;
        color: black;
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
          border: none;
          outline: 0;
          display: inline-block;
          color: white;
          background-color: #000;
          text-align: center;
          margin: auto;
          cursor: pointer;
          max-width: 50%;
          font-size: 18px;
        }
.chat-btn:hover, a:hover{
         opacity: 0.5;
        }
.modal-content{
      background-color: #fff;
      }
h5{
  background-color: #ffffff;
  margin-left: 15px;
}     
</style>
</head>

<body>
<?php
  require 'db.php';
$select = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $result= $select->fetch();
    $secret_word = $result['secret_word'];
$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'puenehfaith'");
    $result2->setFetchMode(PDO::FETCH_ASSOC);
    $user = $result2->fetch()
?>
    
<div id="wrapper">
    
  <div id="header">
    <div id="nav"><a href="index.html">Home</a> | <a href="#">About Me</a> | <a href="#">Contact Me</a> | <a href="#">My Photos</a></div>
    <div id="bg"></div>
  </div>
  
  <div id="main-content">
    <div id="left-column">
      <div class="box">
            <h1style="text-align: center;"><strong>WELCOME TO MY PAGE</strong></h1>
          <h1>my name is <span id="me"><?php echo $user["name"]?></span></h1>
<p>This is my space. Here are some of my interests: </p>
        <ul style="margin-top:10px;">
          <li>Am a front end web developer</li>
          <li>I love coding</li>
          <li>Still learning</li>
          <li>want to be good in vue.js,react and angular.js</li>
        </ul>
      </div>
      <h2><strong>MORE ABOUT ME</strong></h2>
      <p>
        <img src="http://res.cloudinary.com/pueneh/image/upload/v1524830779/pix_6.jpg
" width="139" height="150" style="margin: 0 10px 10px 0;float:left;" />
        <em>"Am a foodie"</em><br/>
        <em>"Am easy going."</em><br/> 
        <em>"My fav color is red"</em><br/>
        <em>"i love travelling."</em><br/> 
      </p>
    </div>
    <div id="right-column">
      <div id="main-image"><img src="http://res.cloudinary.com/pueneh/image/upload/v1524830633/pix_5.jpg
" width="160" height="188" /></div>
      <div class="sidebar">     
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
      </div>
    </div>
  </div>
    Copyright &copy; 2018 Pueneh Faith. All rights reserved.<br/>
  </div>
</div>

    <div>
  <div id='bodybox'>
  <div id='chatborder'
    <h1 id="chatlog7" class="chatlog">HELLO I BE JAYO! YOU FIT TRAIN ME?</h1> </div>
          <button class="btn col-sm-offset-5 chat-btn" data-toggle='modal' data-target='#chatModal'><i class="fa fa-comment-alt">chat</i></button>
          </div>
          <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="chatModalLabel"><b>JAYO</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body "  > 
                  <div class="chat" id="chat">
                    <p class="Jayo">Hi! My name na Jayo.<br>i sabi something well well ask me any question,my madam want you to teach me more about javascript,.</p>
                    <p class="Jayo">Anything you tell me to do i go do am,Assurance cover you.<br> You fit type Hello make we start from there.</p>
                    <p class="Jayo">You fit train me by typing "train:question#answer#password" The Password na: <b>password </p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="chat-input">
                  <form action="" method="post" id="user-input-form">
                    <div class="input-group">
                      <input type="text" class="form-control" name="user-input" id="user-input" class="user-input" placeholder="Ask me your questions"><span class="input-group-addon"><button class="btn btn-primary" id="send"><i class="fa fa-send"></i></button></span>
                    </div>
                  </form>
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
                url: 'profile.php?id=puenehfaith',
                type: 'POST',
                data:  'user-input=' + message,
                success: function(response) {
                  var result = $($.parseHTML(response)).find("#result").text();
                  setTimeout(function() {
                    outputArea.append("<p class='Jayo'>" + result + "</p>");
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

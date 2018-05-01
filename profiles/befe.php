<?php 
  if(!defined('DB_USER')){
    require "../../config.php";
  }
  try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
try {
      $user = 'befe';
      $sql = "SELECT * FROM interns_data WHERE username = '$user' "; 
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $bef = $data['username'];
      $image = $data['image_filename'];
  } catch (PDOException $e) {
      throw $e;
  }

  try {
      $sql = 'SELECT * FROM secret_word';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $mydata = $q->fetch();
      $secret_word = $mydata['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>

<?php 

global $msgss;
global $reply;
global $train;
global $aboutBot;

if(isset($_POST['msgs'])){
    $msgss = $_POST['msgs'];
    $train = stripos($msgss, 'train:');
    $aboutBot = 'aboutbot';

    if ($train === 0){
        trainbot($msgss);
    }
    else if ($aboutBot == $msgss){
        aboutBot();
    }
     else {
        fetchAnswer($msgss); 
    }
    
}

    function aboutBot(){
        $reply = 'Hello, Welcome to Bot Xperience v1.0...'.'<br>';
        $reply .= 'Ask me anything...'.'<br>';
        $reply .= 'If I don\'t know what you asked, you can simply train me by using the format:'.'<br>';
        $reply .= 'train: question # answer # password'.'<br>';
        $reply .= 'Thankyou!';

        echo $reply;
        exit();
    }

    function trainbot($msgss){

    include '../db.php';

        $trainmsg = substr($msgss, 6);
        $trainmsg = preg_replace("([\s]+)", " ", trim($trainmsg));
		$trainmsg = preg_replace("([?.'])", "", $trainmsg);
        $separate = explode('#', $trainmsg);
        $separatenum = count($separate);
        $ques = $separate[0];
        if (isset($separate[1])){
            $ans = $separate[1]; 
        }
        if (isset($separate[2])){
            $separate[2] = trim($separate[2]);
        }
        
        $pass = 'password';

        if($separatenum <= 1){
            echo $reply = 'Invalid training format.';
        } else if($separatenum < 3){
            echo $reply = 'You need to enter a password to train me.';
        } else if($separatenum > 3){
            echo $reply = 'Invalid training format.';
        } else {
            if($pass !== $separate[2]){
                echo $reply = 'Incorrect training password please try again with correct password.';
            } else {
                $sql = "INSERT INTO chatbot (question, answer) VALUES ('$ques', '$ans')";
                $conn->exec($sql);  
                echo $reply = 'Training me was successful. Thanks I\'m now Smarter.';
                // $reply = $sql;
                // echo $reply;
                // echo $ques.' and '.$ans;
            }     
            
        }  
        exit();  
    }

function fetchAnswer($msgss){
    include '../db.php';

    $msgss = preg_replace('([\s]+)', ' ', trim($msgss));
	$msgss = preg_replace("([?.'])", "", $msgss);

    $sql = "SELECT * FROM chatbot WHERE question LIKE '%$msgss%' ORDER BY rand() LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $answer = $q->fetch();
    $reply = $answer['answer'];
    if ($reply == ''){
        $reply = 'Sorry I couldn\'t understand you';
    } 

    echo $reply;
    exit();
} 


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['name']; ?>'s Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <style>
            body {
                background-color: #e6f2ff;
            }
            h1, h3 {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif !important;
            }
            h1 {
                font-style: normal;
                /*font-weight: bold;*/
                color: #007BFF !important;
            }
            h3 {
                font-style: italic;
                font-weight: normal;
                /*line-height: normal;*/
                color: #99B2B2 !important;
            }
            .bot-chat-button {
                    border: 2px solid #3396FF;
                    border-radius: 20px;
                    padding: 5px;
                    padding-left: 24px;
                    margin-top: 10px;
                    color: #3396FF;
                    cursor: pointer;
                    margin-bottom: 8px;
            }
            #chatlog {
                    overflow-y: auto;
                    height: 400px;
            }
            #bot-ui {
                    border: 2px solid #3396FF;
                    border-radius: 20px;
                    /*margin-right: -50px;*/
                    height: 540px;
                    /*position: absolute;*/
                }
                #bot-ui h3.first, #bot-ui h3.second {
                    line-height: 2px;
                }
                #chatbox {
                    position: absolute;
                    bottom: 20px;
                    margin-top: 20px;
                }
                input[type=text] {
                    box-sizing: border-box;
                    border-radius: 4px;
                    padding: 5px;
                    padding-left: 10px;
                    border: 2px solid #a6a6a6;
                }
                input[type=submit] {
                    padding: 5px;
                    border: none;
                    padding: 8px;
                    margin-top: 10px;
                    border-radius: 4px;
                    background-color: #006fe6;
                    color: #fff;
                }
            @media (min-width: 992px){
                #main {
                background-color: #fff;
                height: 460px;
                margin-top: 100px;
                margin-left: 50px;
                border-top-right-radius: 150px;
                }
                h1 {
                    font-size: 48px;
                    margin-bottom: 25px;
                    line-height: 10px;
                }
                h3 {
                    font-size: 24px;
                }
                p {
                    font-size: 19px;
                    font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif !important;
                    margin-top: 50px;
                    color: #212c2c !important;
                }
                img {
                margin-left: -20px;
                height: 460px;
                width: 300px !important;
                }
                .details {
                    margin-left: 25px;
                    margin-top: 80px;
                }
                
                #bot-ui {
                    /*border: 2px solid #3396FF;
                    border-radius: 20px;*/
                    margin-top: 60px;
                    /*margin-right: -50px;*/
                    margin-left: 25px;
                    /*height: 540px;*/
                    /*position: absolute;*/
                }
                #bot-ui p {
                    font-size: 15px;
                    margin-top: 0;
                }
                #bot-ui h1 {
                    font-size: 20px;
                }
                #bot-ui h3 {
                    font-size: 15px;
                }
                input[type=text] {
                    width: 240px;
                }
                input[type=submit] {
                    width: 70px;
                }
                
            }
            @media (max-width: 991px){
                body {
                    max-width: 100%;
                    overflow-x: hidden;
                }
                img {
                    display: inline-block;
                    width: 270px;
                    height: 480px;
                    margin-top: 10px;
                    /*margin-left: 35%;
                    margin-right: 35%;*/
                    
                } 
                #main {
                    /*max-width: 90%;  */
                    background-color: white;  
                    margin-bottom: 30px;
                }
                #main .details {
                    margin-left: 20px;
                    padding-bottom: 15px;
                }
                h1 {
                    font-size: 28px;
                }
                h3 {
                    margin-top: -10px;
                    font-size: 20px;
                }
                p {
                    font-size: 16px;
                }
                .contain-pic {
                    background-image: url("<?php echo $image;?>");
                    opacity: 0.8;
                    height: 500px;
                    background-size: cover;
                }
            }
        </style>
    </head>
    <body>
        <div class='container-fluid'>
            <section class='row'>
                <article class='col-md-8' id='main'>
                    <div class='row'>
                        <div class='contain-pic col-md-3'>
                            <img class='' src="<?php echo $image; ?>" alt ='befe sitted and giving a pose'>
                        </div>
                        <div class='details col-md-7'>
                            <h1>Deekor Baribefe</h1>
                            <h3>UI-UX Developer/Web Developer </h3>
                            <p>Hi, I'm Befe a tech enthusiast. <br>I am a web developer with skills: <br> in html5, css3, javascript and php/mysql. <br>I am conversant with bootstrap, jquery and <br> angular frameworks. <br>I am a newbie currently taking python and django. </p>
                            <div class='bot-chat-button col-sm-5 col-xs-6'>Chat With My Bot!</div>
                        </div>
                    </div>
                </article>
                <article class='col-md-3' id='bot-ui'>
                    <h1>Welcome to Bot Xperience</h1>
                    <section id='chatlog'> 
                        <h3 class='first'>Ask me anything...</h3>
                        <h3 class='second'>Or Simply type 'aboutbot' to know more...</h3>
                        <h3 class='third'>You can also train me if I can't answer your questions using:
                        <br>'trainbot: question # answer # password'</h3>
                    </section>
                    <div id='chatbox'>
                        <form class='chat' >
                        <input type='text' name='message' placeholder='Ask me anything...' class='msgbox'>
                        <input type='submit' value='Send'>
                    </div>
                </form>
                </div>
                </article>
            </section>
        </div>
        <script>
            $(function(){
                $('#bot-ui').hide();
                
                $('.bot-chat-button').click(function(){
                    $('#bot-ui').fadeIn(500);
                })
                $('h3.first').hide();
                $('h3.second').hide();
                $('h3.third').hide();
               $('input[type=text]').click(function(){
                    $('h3.first').show(500);
                    $('h3.second').show(500);
                    $('h3.third').show(500);
               });

               function bot_chat(reply){
                    $('#chatlog').append('<p>Bot Xperience: ' + reply + '</p>');
                    $('#chatlog').scrollTop($('#chatlog').height());
               }

               $('input[type=submit]').click(function(){
                  var msg = $('.msgbox').val();
                  var reset = $('.msgbox').val("");   
                    if(msg){
                        $('#chatlog').append('<p> You: ' + msg + '</p>');
                        $('#chatlog').scrollTop($('#chatlog').height());
                    }
                  

                  if(msg==''){
                    $('#chatlog').append('<p>Bot Xperience: You have not typed anything</p>');
                    $('#chatlog').scrollTop($('#chatlog').height());
                    return false;
                    } else {
                        $.ajax({
                        url: 'profiles/befe.php',
                        type: 'post',
                        cache: 'false',
                        data: {
                            msgs: msg
                        },
                        success: function(data){
                            bot_chat(data);
                            reset;
                        }
                    });
                    return false;
                    }
               })
            })
            
        </script>

    </body>
</html>


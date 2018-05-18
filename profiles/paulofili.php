<?php 
    if(!defined('DB_USER')){
         require "../../config.php";
    }
    global $connect;
    $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    //check connection
    
    if(!$connect){
        die("Connection failed  " . mysqli_connect_error() );
    }

    $result = mysqli_query($connect, "SELECT * FROM secret_word");
    $secret_word = mysqli_fetch_assoc($result)['secret_word'];

    $result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'paulofili'");
    if($result) {
        $my_data = mysqli_fetch_assoc($result);
    } else {
        echo "No data in database";
    }    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){              

        mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        function validate($data) {
            $data = stripslashes(strip_tags(str_replace(array ('(', ')'), '' , $data)));
            $data = preg_replace('([\s]+)', ' ', trim($data));
            $data = preg_replace("([?.])", "", $data);
            
            return $data;
        }  
    


        $message = validate(($_POST['message']));
        
        if( $message != ""){
            $queAns = explode(":", $message);

            if(strtolower(trim($queAns[0]))==="train") {                
            
                
                $queAnsNew = explode("#", $queAns[1]);
    
                if (count($queAnsNew) >= 3){
                    $que = $ans =$pass = "";
    
                    $que = strtolower(str_replace("'","''",trim($queAnsNew[0])));
                    $ans = str_replace("'","''",trim($queAnsNew[1]));
                    $pass = strtolower(trim($queAnsNew[2]));
                    if ($pass === "password"){
                            
                        $query1 = "INSERT INTO chatbot (id, question, answer)  VALUES (NULL, '$que', '$ans')";
                
                        $result1 = mysqli_query($connect, $query1);
                        
                        //check if successful
                        if ($result1){
                            
                            echo json_encode(['status' => 1, 'reply' => 'Thanks for that. Now, I have gotten better, no smarter']);
                                // echo $text;
                                    
                        } else{
                            echo json_encode(['status' => 2, 'reply' => 'Failure, please try again']);      
                        }
                
                    } else{
                        echo json_encode(['status' => 3, 'reply' => 'Wrong password, input password']);                
                    }
    
                } else {
                    echo json_encode(['status' => 4, 'reply' => 'Sequence not complete']);
                }        
            }
            
            else if (strtolower($message)==="--help"||strtolower($message)==="help"){
                echo json_encode(['status' => 5, 'reply' => 'Hey there, name is Paul and I Would love to help.']);
            }

            else if (strtolower($message)==="aboutbot"||strtolower($message)==="about"){
                echo json_encode(['status' => 6, 'reply' => 'Sequence not complete']);
            }
            else {
                $message = strtolower(str_replace("'","''",$message));
                $query2 = "SELECT * FROM chatbot WHERE question = '".$message."'";
                $result2 = mysqli_query($connect, $query2);

                if(mysqli_num_rows($result2)> 0) {
					$i = 0;
                     while($rows = mysqli_fetch_assoc($result2)) {
                         $replies[$i] = $rows['answer'];
                        $i=$i+1;
                     }
                    //$rows = mysqli_fetch_assoc($result2)['answer'];
                    $reply_index = rand(0, (count($replies) - 1));
			        $reply = $replies[$reply_index];
                    $reply = ucfirst($reply);
                    echo json_encode(['status' => 7, 'reply' => $reply]);

                }else {
                    echo json_encode(['status' => 8, 'reply' => "Not sure I understand that which means I need training. I wanna be of better help to you! To train, do this, train: the question # the answer # password . Password is 'password'. Can't wait to learn from you"]);
                }
            } 
        }else {
            echo json_encode(['status' => 9, 'reply' => 'Input something...anything']);
        }
    }
    

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paul Ofili - HNGFun</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    
    <style>
        html, body, {
            
            height: 100%;
            font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
        } 
        .cover {
            height:100%;
            width: 100%;
            background: url("https://res.cloudinary.com/paulofili/image/upload/v1523643456/paulofili.jpg") top left no-repeat;
            background-size: cover;
            display: table;
            font-size: 60px;    
            font-weight: 500px; 
            color: white;
            padding: 30px 50px 10px;
        }    
        #name {            
            font-size: 30px;
            font-weight: 100px; 
        }
        .cover #cover-head {
            margin:100px 0 0px;
            font-size: 50px;
            text-align: center;             
        }
        .cover h1 {
            font-size: 60px;            
        }
         #time {
            font-size: 18px;
            position: relative;           
        }
        .contain {
            padding: 30px 120px;
            background-color:#fff;
        }  
        .contain h3 {
            position: relative;
            left: 37px;
            top: 0px;
            font-size: 30px;
        }
        #bio {
            font-size: 20px;
            border-left: solid 1px #ccc;
            padding-left: 40px;
            padding: 0 0 100px 40px;
        }
        #socialmedia{
           float: right;
           font-size:22px;
           letter-spacing:15px;
        }
        #foot {
            padding-left:20px;
            background: #2c3539;
            color: white;
            text-align: center;
            padding: 20px;
        } 
        #foot span{
            position: relative;
            left:60px;
        }   

        #chatbody{
            
            background-size: cover;
            font-family:tahoma, sans-serif;
            box-sizing:border-box;
            margin: 30px 0;
            padding: 30px 0 20px;
        }
        
        #chatbody h1 {
            color: #666;
            text-align: center;
            font-size: 35px;
            margin-bottom: 10px;
        }
        .chatbox {
            width: 500px;
            min-width: 390px;
            height: 600px;
            background: #fff;
            padding: 25px;
            margin: 20px auto;
            box-shadow: 0 3px auto;
        } 

        .chatlogs{
            padding: 10px;
            width: 100%;
            height: 450px;
            overflow-x: hidden;
            overflow-y: scroll;
            
        }

        .chatlogs::-webkit-scrollbar{
            width: 10px;
        }

        .chatlogs::-webkit-scrollbar-thumb{
            border-radius: 5px;
            background: rgba(0,0,0,.1);
        }

        .chat {
            display: flex;
            flex-flow: row wrap;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .self .user-photo {
            width: 60px;
            height: 60px;
            background: #ccc;
            border-radius: 50%;
        }

        .bot .user-photo {
            width: 70px;
            height: 60px;
            background: url("https://res.cloudinary.com/paulofili/image/upload/v1526257328/chatbot4.png");
            overflow:hidden;
        }

        .chat .chat-message {
            width: 78%;
            padding: 15px;
            margin: 0px 10px 0;            
            color: #fff;
            font-size: 16px;
        }

        .bot .chat-message {
            background: #1adda4;
            border-radius: 0px 20px 20px 20px;
        }

        .self .chat-message {
            background: #1ddced;
            border-radius: 20px 0 20px 20px;
            order: -1;
        }

        .chatform {
            margin-top: 20px;
            display: flex;
            align-items: flex-start;
        }

        .chatform input {
            background: #fbfbfb;
            width: 75%;
            height: 50px;
            border: 2px solid #eee;
            border-radius: 8px 0 0 8px;
            padding: 5px 10px;
            color: #666;
            outline: none;
        }

        .chatform textarea:focus {
            background: #fff;
        }

        .chatform textarea::-webkit-scrollbar{
            width: 10px;
        }

        .chatform textarea::-webkit-scrollbar-thumb{
            border-radius: 5px;
            background: rgba(0,0,0,.1);
        }
        .chatform #send {
            background: #1ddced;
            padding: 5px 15px;
            font-size: 20px;
            color:#fff;
            border: none;
            height: 50px;
            outline: none;
            border-radius: 0px 8px 8px 0 ;
        }

        .chatform #send:active {
            background: #13c8d9;   
            outline: none; 
        }  


	</style>
</head>
<body>
    <div class="cover">
        <div class = "cover-text">
            <div class = 'row'>
                <div class = 'col-sm-9' id = "name">
                    <span><?php echo $my_data['username'] ?> | HNG Internship 4.0</span>
                </div>            
            </div>
            <div id = "cover-head">        
                <h1>Hello There!!</h1>
                <span id = "time">
                    <?php date_default_timezone_set ("Africa/Lagos"); ?>
                    <?php echo date("F j, Y | g:i:s a");?>
                </span> 
            </div>
        </div>
    </div>

    <div class = "contain">
        <div class='row'>
            <div class='col-sm-6'>
                <h3>My Profile picture</h3><br>
                <img src='<?php echo $my_data['image_filename'] ?>' class= 'rounded-circle'>
            </div>
                
            <div class='col-sm-6' id = 'bio'>
                <h2>A little bit about me </h2><br>
                <p>I am just a guy with lots of passion to code especially as a web developer. Really looking forward to this internship so as to improve on my existing skills and become a professional in it. View my profile in any of the links provided in the footer.</p>
                
            </div>
        </div>        
    </div>
    <div id="chatbody">
        <h1 >Paul's Chat Bot At Your Service ;)</h1>
        <div class="chatbox">
            <div class="chatlogs" id="chatlogs">
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">What's up! Name's Paul chat</p>
                </div>
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">I can answer loads of questions but it is highly recommended you train me first. To do so, just follow this sequence of commands. train: the question # the answer # password.</p>
                </div>
                <div class="chat bot row">
                    <div class="user-photo"></div>
                    <p class="chat-message">Password is usually 'password', so you are good to go.</p>
                </div>
                
                
            </div>

            <form class="chatform" id="chatform" method="post" action ="">
                <input type = "text" id = "message" name = "message"></input>
                <button id = "send" type = "submit" class = "btn btn-danger" name = "send">Send</button>
            </form>
        </div>
    </div>
    <footer id="foot">
        <span>Crafted with &hearts; in Lagos by Paul</span>
        <div id = "socialmedia">
            <a href="https://github.com/PaulOfili"><i class="fa fa-github"></i></a>
            <a href="https://twitter.com/paulofili42"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/paul-ofili-227a2215b"><i class="fa fa-linkedin"></i></a>      
        </div>
    </footer>   
   
    <script src="vendor/jquery/jquery.min.js"></script>
    
    <script src=  "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            
            $("#chatform").submit(function(e) {
                 //return false;
                 e.preventDefault();
                 
                var chatlogs = $('#chatlogs');
                var message = $('#message').val();
                $('#message').val("");

                if(message.trim() ==''){
                    var messageBody = 
                    "<div class='chat bot row'><div class='user-photo'></div><p class='chat-message'>Input something...anything</p> </div>";

                    chatlogs.html(chatlogs.html()+messageBody);
                    
                    $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);

                   // return;
                }

                else if(message.trim() !='')
                {
                var messageBody = "<div class='chat self row'><div class='user-photo'></div><p class='chat-message'>" + message + "</p> </div>";

                chatlogs.html(chatlogs.html()+messageBody);    
                $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);
              

                $.ajax 
                ({
                    type: "POST",
                    url: "profiles/paulofili.php",   
                    data: 
                    { 
                        message: message
                    },
                    dataType: "json",
                    success: function(data) { 
                        
                            // console.log(data.status);
                            

                            // if(data.status==1){
                                var messageBody = "<div class='chat bot row'><div class='user-photo'></div><p class='chat-message'>" +data.reply+ "</p></div>";
        
                            chatlogs.html(chatlogs.html()+messageBody);
                            
                            $("#chatlogs").scrollTop($("#chatlogs")[0].scrollHeight);
                                                
                        
                    }
                });
                }
            
            });
        });
    </script>
</body>
</html>

<?php
	}
?>

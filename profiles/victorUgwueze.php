<?php
try {

    $sql ="SELECT * FROM interns_data WHERE username = 'victorUgwueze' LIMIT 1";
    $q = $conn->query($sql);
     $q->setFetchMode(PDO::FETCH_ASSOC);
     $intern_data = $q->fetch();
  

    //query for the secret word;
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
// Set the secret word
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $intern_data['name']; ?></title>

    <style>
        *{
	margin: 0;
	padding: 0;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
	-webkit-box-sizing: border-box;
  	-moz-box-sizing: border-box;
	box-sizing: border-box;
}



html{
	color: #555;
	font-family: 'lato', 'Arial', 'sans-serif';
	font-weight: 300;
	font-size: 18px;
	text-rendering:optimizeLegibility;
}


body{
 	margin: 0;
	padding: 0;
}

h1,h2{
	margin: 0;
	letter-spacing: 1px;
	font-weight: 300;
	text-transform: uppercase;

}

h1{
	margin-top: 0;
	margin-bottom: 20px;
	font-size: 240%;
	word-spacing: 4px;

}

h2{
	font-size: 100%;
	word-spacing: 2px;
	text-align: center;
	margin: 10px auto;
	margin-bottom: 30px;

}
h3{
	font-size: 150%;
	word-spacing: 2px;
	margin-bottom: 20px;
}

.wrap{
    width: 480px;
    margin: 0 auto;
    margin-top: 100px;
    text-align: center;
    box-shadow: 7px 10px 34px 1px rgba(0, 0, 0, 0.68), inset -1px -6px 5px 0.1px #000;
}

.img img{
    height :200px;
    border-radius: 50%;
}
.contact{
    width:50%;
    margin: 0 auto; 
}
.contact .contact-link{
    display: flex;
    justify-content: space-around;
    padding-bottom: 20px;
}
.bot{
    height:400px;
    width:300px;
    background:white;
    position: fixed;
    right:0;
    bottom:0;
    /* border-radius:4%; */
    border: 1px solid gray;
    margin-right:3%;   
}
.top-bar {
  background: #666;
  height:50px;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;
   
}

.input{
    height:50px;
}
.minimize-bot{
    position:absolute;
    right:2%;
    font-weight:180%;
}

.panel-body{
    height:300px;
    position:relative;
    overflow-y:auto;
}

.human{
    background:gray; width:50%;position:absolute; right:0;
}
.human:before{
    width:0;
    height:0;
    content:"";
    border-width: 0 13px;
    border-style: solid;
    border-color: #fff #ffffff transparent transparent;
    position:relative;
    left:-14px;
    top:-3px;
}
  </style>



</head>
<body>
    <div class="wrap">
        <div class="img">
            <img src="<?php echo $intern_data['image_filename']; ?>" alt="Victor Ugwueze Profile Image">
        </div>
        <div class="username">
            <h2><?php echo $intern_data['name']; ?></h2>
            <h5>Software Developer</h5>
        </div>
        <div class="contact">
            <h3>Get In Touch With Me</h3>
            <p>Want to get in touch with me? Be it to request more info about myself or my
                experience, to ask for my resume, or even if only for some nice coffe here in Lagos, 
                Nigeria... just feel free to drop me a line anytime.
                I promise to reply A.S.A.P.
            </p>
            <div class="contact-link">
                <div>
                    <a  href="https://github.com/Victor-Ugwueze" target="_blank">
                    <i class="fa fa-github-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://www.facebook.com/victor.c.ugwueze" target="_blank">
                    <i class="fa fa-facebook-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://twitter.com/CVicchigo" target="_blank">
                    <i class="fa fa-twitter-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">Panel 
                <span><button class="minimize-bot" data-hide="minimize">-</button></span>
            </div>
            <div class="panel-body"> 
            
            </div>
            <div class="input" style="position:absolute; bottom:0;">
            <form action="" class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control question-input" id="inlineFormInputGroupUsername2" placeholder="type your message">
                        <div class="input-group-append">
                            <div class="input-group-text btn-primary"><a href="#" id="send">Send</a></div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Javascript tags -->
    <script>
        //handles show and hide for chat window 

        (function init(){
            let minimizeBot = document.querySelector('.minimize-bot');
            minimizeBot.addEventListener('click',chatAction);

            let sendMessageButton = document.getElementById('send');
            sendMessageButton.addEventListener('click',getInput);
        })();
        
        function chatAction(){
                if(this.dataset.hide ==="minimize"){
                    this.dataset.hide = "expand";
                    hideChat();
                }else if(this.dataset.hide === "expand"){
                    this.dataset.hide = "minimize";
                    showChat();
                }
                console.log(this.dataset.hide);
        }
        function hideChat(){
            let chatWindow = document.querySelector('.panel-body');
            chatWindow.style.display = "none";
            chatWindow.parentNode.style.height = "100px";
        }

        function showChat(){
            let chatWindow = document.querySelector('.panel-body');
            chatWindow.style.display = "block";
            chatWindow.parentNode.style.height = "400px";
        }


        function getInput(){
            let bot = "";
            let question = document.querySelector('.question-input');
            let messageBox = document.querySelector('.panel-body');
            messageBox.innerHTML += '<br><div class="human">'+question.value +'</div>';
            messageBox.innerHTML += '<br><div style="background:gray; width:50%;position:absolute: left:0">bot</div>';
            question.value = "";
            console.log(question.value);
        }
    </script>
</body>
</html>
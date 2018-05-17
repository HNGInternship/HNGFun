<?php 
   function makeSafe($data){
    return htmlspecialchars(stripslashes(trim($data)));
    }
   if(isset($_GET['answer'])){
		
		$question = makeSafe($_GET['question']);
		$answer = makeSafe($_GET['answer']);

		$params = array(':question' => $question, ':answer' => $answer);

		$sql = 'INSERT INTO chatbot ( question, answer )
		      VALUES (:question, :answer);';

        $resMessage;
		try {
		    $q = $conn->prepare($sql);
		    if ($q->execute($params) == true) {
		        $resMessage = [
		            'message' => "Thanks for training me, I'm feeling lucky and smart'"
		        ];
		    };
		} catch (PDOException $e) {
			$resMessage = [
			    'message'    => "Error! I couldn't recieve training, my bad (:"
            ];
		    throw $e;
        }
        
        echo json_encode($resMessage);

        return;

	}else if(isset($_GET['question'])){

	   	$question = makeSafe($_GET['question']);

		$result = $conn->query("SELECT answer FROM chatbot WHERE question LIKE '%{$question}%' ORDER BY rand() LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
        $answer = $result->answer;
        
        $data = ['answer'=>$answer];
        
		
		header('Content-Type: application/json');
		echo json_encode($data);
		return;
    }
    global $secret_word;
    $query = $conn->query("Select * from secret_word LIMIT 1");
    $result = $query->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $sql = $conn->query("Select * from interns_data where username = 'ogundiran12' LIMIT 1");
    $user = $sql->fetch(PDO::FETCH_OBJ);
    $name = $user->name;
    
	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://res.cloudinary.com/mentos/raw/upload/v1526566532/ogundiran12.css">    
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Slabo+27px" rel="stylesheet">
    <!---//adjust css -->
    <title>Ogundiran Al-Ameen</title>
</head>

<body>

    <div class="container">
        <h1 class="title fader"><?php echo $name; ?></h1>
        <h4 class="name fader">Software Developer</h4>

        <div class="oj-flex-item time-container">
            <?php
            date_default_timezone_set('Africa/Lagos');
            echo date('h:i A', time());
            ?>
        </div>

        <div class="text-center">
            <a href="#" id="addClass">
                <span class="glyphicon glyphicon-comment"></span>
                Open chat bot
            </a>
        </div>

        <aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">

            <div class="popup-head">
                <div class="popup-head-left pull-left">
                    <h1>mentOS Bot</h1>

                </div>
                <div class="popup-head-right pull-right">
                    <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
            </div>

            <div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                <div class="chat_box touchscroll chat_box_colors_a">
                    <!--msgBox content here-->
                </div>
            </div>
            <div class="chat_submit_box">
                <div class="uk-input-group">
                    <div class="gurdeep-chat-box">
                        <input @keyup.enter="sendHumanMessage" v-model="humanMessage" type="text" placeholder="Type a message" id="submit_message" name="submit_message" class="md-input" autofocus>
                    </div>
                    <span @click="sendHumanMessage" class="uk-input-group-addon">
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                        </a>
                    </span>
                </div>
            </div>

        </aside>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
    <script>
        $(function () {
            $("#addClass").click(function () {
                $('#sidebar_secondary').addClass('popup-box-on');
            });

            $("#removeClass").click(function () {
                $('#sidebar_secondary').removeClass('popup-box-on');
            });
        })
    </script>
    <script>
        var aside = new Vue({
                el: '#sidebar_secondary',
                data: {
                    humanMessage: '',
                    userMsgBox: '',
                    botMsg: '',
                    botMsgBox: '',
                },
                created: function(){
                    var msg = 'Hey new comer! I\'m a simple bot, but don\'t underestimate me.<br> To get a list of commands you can give me, type `help`.';                    
                    //add cookie store
                    if(this.checkCookie("visited")){
                        msg = "Hey! thanks for coming back, I guess you already know how we row. If not, type 'help'.";                        
                        var numVisits =  parseInt(this.getCookie("visited"));
                        if(numVisits > 2){
                            msg = "Hey fam! You really like checking me out, I\'m excited, what can I do for you? <br> Ok, type 'help' if you can't remember the things I can do";
                        }
                        this.setCookie("visited", numVisits+1, 365);
                    }else{
                        this.setCookie("visited", 1, 365);
                    }
                    
                    this.botMsg = msg;
                    this.sendBotMsg(this.botMsg);
                },
                methods: {
                    sendHumanMessage: function(){
                        this.userMsgBox = this.sendUserMsg();
                        $('.chat_box').append(this.userMsgBox);
                        this.determineAction(this.humanMessage);
                        this.humanMessage = '';
                    },
                    determineAction: function(hMsg){
                        hMsg = hMsg.trim().toLowerCase();
                        var action = hMsg.split(' ')[0];
                        switch(action){
                            case 'help':
                                var cmdMsg = `
                                            You can perform the following commands <br> 
                                            <p class="c1">aboutbot - To know about me.</p>
                                            <p class="c2">trumpet - I'll 'blow' you something Donald Trump once said.</p>
                                            <p class="c3">train - #train [question] [answer] [password] .</p>`;
                                this.sendBotMsg(cmdMsg);
                                break;
                            case 'aboutbot':
                                this.sendBotMsg('Mentos Bot Version 1.0.');
                                break;
                            case 'trumpet':
                                this.trumpIt();
                                break;    
                            case '#train':
                                this.trainBot(hMsg);
                                break;
                            default:
                                this.getAnswerFromDB(hMsg);
                        }
                    },
                    getAnswerFromDB: function(question){
                        this.$http.get('profiles/ogundiran12.php?question='+question)
                                .then(response => {
                                    // get body dat
                                    var trainMeMsg = 'I cannot find you a valid answer, go ahead and train me. Use #train [question] [answer] [password]';
                                    this.botMsg = (response.data !== null) ? response.data.answer : trainMeMsg;
                                    this.sendBotMsg(this.botMsg);
                                }, response => {
                                    // error callback

                                    console.log(response);
                                    this.sendBotMsg('Something went wrong, please try again later');
                                });
                    },
                    sendUserMsg: function(){
                        return `<div class="chat_message_wrapper chat_message_right">
                    <div class="chat_user_avatar">
                        <a href="#" target="_blank">
                            <img alt="bot avatar" title="Bot avatar" src="https://res.cloudinary.com/mentos/image/upload/v1526568148/humanicon.png"
                                class="md-user-image">
                        </a>
                    </div>
                    <ul class="chat_message">
                        <li>
                            <p> 
                                ${this.humanMessage} 
                                <span class="chat_message_time">${this.formattedDate()}</span>
                            </p>
                        </li>
                    </ul>
                </div>`;
                    },
                    makeBotMsg: function(message){
                        return `<div class="chat_message_wrapper">
                    <div class="chat_user_avatar">
                        <a href="#" target="_blank">
                            <img alt="bot avatar" title="Bot avatar" src="https://res.cloudinary.com/mentos/image/upload/v1526566466/boticon.png"
                                class="md-user-image">
                        </a>
                    </div>
                    <ul class="chat_message">
                        <li>
                            <p>
                                ${message}
                                <span class="chat_message_time">${this.formattedDate()}</span>
                            </p>
                        </li>
                    </ul>
                </div>`
                    },
                    sendBotMsg: function(message){
                        this.botMsgBox = this.makeBotMsg(message);
                        $('.chat_box').append(this.botMsgBox);
                    },
                    trainBot: function(command){
                        var args = command.match(/\[(.*?)\] \[(.*?)\] \[(.*?)\]/);
                        if(!args || !args[3]){
                            var msg = "I can't be trained that way, <br> follow the correct syntax #train [question] [answer] [password]";
                            this.sendBotMsg(msg);
                            return;
                        }
                        var password = args[3];
                        if(password != 'password'){
                            var msg = 'Invalid passowrd for training me. <br> Enter a valid password.';
                            this.sendBotMsg(msg);
                            return;
                        }

                        this.$http.get('profiles/ogundiran12.php?question='+args[1]+'&'+'answer='+args[2])
                                .then(response => {
                                    // get body data
                                    this.botMsg = (response.data !== null) ? response.data.message : 'Unable to recieve training';
                                    this.sendBotMsg(this.botMsg);
                                }, response => {
                                    // error callback
                                    this.sendBotMsg('Something went wrong, please try again later');
                                });

                    },
                    formattedDate: function(){
                        var date = new Date();                        
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        var ampm = hours >= 12 ? 'pm' : 'am';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0'+minutes : minutes;
                        var strTime = hours + ':' + minutes + ' ' + ampm;
                        return strTime;
                    },
                    setCookie: function(cname, cvalue, exdays) {
                        var d = new Date();
                        d.setTime(d.getTime() + (exdays*24*60*60*1000));
                        var expires = "expires="+ d.toUTCString();
                        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                    },
                    checkCookie: function(cname) {
                        var cname = this.getCookie(cname);
                        if (cname != "") {
                            return true;
                        } 
                        return false;
                    },
                    getCookie: function(cname) {
                        var name = cname + "=";
                        var decodedCookie = decodeURIComponent(document.cookie);
                        var ca = decodedCookie.split(';');
                        for(var i = 0; i <ca.length; i++) {
                            var c = ca[i];
                            while (c.charAt(0) == ' ') {
                                c = c.substring(1);
                            }
                            if (c.indexOf(name) == 0) {
                                return c.substring(name.length, c.length);
                            }
                        }
                        return "";
                    },
                    trumpIt: function() {
                        this.$http.get('https://api.whatdoestrumpthink.com/api/v1/quotes/random')
                                .then(response => {
                                    this.botMsg = (response.data !== null || response.data !== '') ? response.data.message : 'Trump refused to say anything';
                                    this.sendBotMsg('<b>Trump Said: </b>'+this.botMsg);
                                }, response => {
                                    // error callback
                                    this.sendBotMsg('Oops! Trump refused to allow me tell you anything');
                                });
                    }
                }
            });
    </script>
</body>

</html>
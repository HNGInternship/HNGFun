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
        require_once '../../config.php';

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
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Slabo+27px" rel="stylesheet">
    <!---//adjust css -->
    <title>Ogundiran Al-Ameen</title>
</head>

<body>
<style type="text/css">
html,body{
    font-family:'Montserrat', sans-serif;
    margin:0
}
html{
    height:100%;
}
body{
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#e7f8ec !important;
    background:-moz-linear-gradient(top, #e7f8ec 0%, #ddf4f4 100%) !important;
    background:-webkit-linear-gradient(top, #e7f8ec 0%, #ddf4f4 100%) !important;
    background:linear-gradient(to bottom, #e7f8ec 0%, #ddf4f4 100%) !important;
    filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='$light', endColorstr='$darker',GradientType=0 )

}
h1,h4{
    width:100%;
    margin:0
}
a{
    text-decoration:none
}
.social{
    padding:50px;
    text-align:center
}
.title{
    font-size:3em;
    font-weight:700;
    letter-spacing:.15em
}
@media screen and (max-width: 600px){
    .title{font-size:1.65em}
}
.name{
    margin-top:1em;
	font-size:.8em;
	font-weight:400;
    letter-spacing:.5em
}
@media screen and (max-width: 600px){
    .name{font-size:.5em}
}
.fader{
    color:#2e2e2e;
	text-align:center;
    text-transform:uppercase
}
.time-container{
    text-align:center;
    padding:2em 0 0 0;
    font-weight: bold;
    font-size: 30px;
    color: #1fde7f;
}

/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gTD_u50.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3g3D_u50.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gbD_u50.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gfD_u50.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gnD_g.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

</style>

    <div class="container">
        <h1 class="title fader"><?php echo $name; ?></h1>
        <h4 class="name fader">Software Developer</h4>

        <div class="time-container">
            <?php
            date_default_timezone_set('Africa/Lagos');
            echo date('h:i A', time());
            ?>
        </div>

        <div class="round hollow text-center">
            <a href="#" id="addClass">
                <span class="glyphicon glyphicon-comment"></span>
                Open chat bot
            </a>
        </div>
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
                        // GET //profiles/ogundiran12.php?question
                        // change profiles/ogundiran12.php?question='+ question)
                        this.$http.get('?question='+question)
                                .then(response => {
                                    // get body dat
                                    var trainMeMsg = 'I cannot find you a valid answer, go ahead and train me. Use #train [question] [answer] [password]';
                                    this.botMsg = (response.data !== null) ? response.data.answer : trainMeMsg;
                                    this.sendBotMsg(this.botMsg);
                                }, response => {
                                    // error callback
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

                        this.$http.get('?question='+args[1]+'&'+'answer='+args[2])
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
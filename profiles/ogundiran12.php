<?php 
   function makeSafe($data){
    return htmlspecialchars(stripslashes(trim($data)));
    }
   if(isset($_GET['answer'])){

        require_once '../../config.php';
    
       try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
		
		
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

        try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}

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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">    
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Slabo+27px" rel="stylesheet">
    <link rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    
    <!---//adjust css -->

    <style type="text/css">
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

        body{
            background-color: #e7f8ec !important;
        }
        .mycontainer{
            margin-top: 25%;
        }
        #app{
            font-family: "Montserrat", sans-serif;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        h1,
        h4 {
        width: 100%;
        margin: 0;
        }

        a {
        text-decoration: none;
        }

        .title {
        font-size: 3em;
        font-weight: 700;
        letter-spacing: 0.15em;
        }

        @media screen and (max-width: 600px) {
        .title {
            font-size: 1.65em;
        }
        }

        .name {
        margin-top: 1em;
        font-size: 0.8em;
        font-weight: 400;
        letter-spacing: 0.5em;
        }

        @media screen and (max-width: 600px) {
        .name {
            font-size: 0.5em;
        }
        }

        .fader {
        color: #2e2e2e;
        text-align: center;
        text-transform: uppercase;
        }

        .time-container {
            text-align: center;
            /*padding: 2em 0 0 0;*/
            font-weight: bold;
            font-size: 30px;
            color: #1fde7f;
        }

        .text-center{
            width: 100%;
            text-align: center;
        }

        /* cyrillic */

        @font-face {
        font-family: "Montserrat";
        font-style: normal;
        font-weight: 400;
        src: local("Montserrat Regular"), local("Montserrat-Regular"),
            url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2)
            format("woff2");
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        .round.hollow {
        margin: 40px 0 0;
        }
        .round.hollow a {
        border: 2px solid #ff6701;
        border-radius: 35px;
        color: red;
        color: #ff6701;
        font-size: 23px;
        padding: 10px 21px;
        text-decoration: none;
        font-family:  "Montserrat","Open Sans", sans-serif;
        }
        .round.hollow a:hover {
        border: 2px solid #000;
        border-radius: 35px;
        color: red;
        color: #000;
        font-size: 23px;
        padding: 10px 21px;
        text-decoration: none;
        }

        .chat_box .chat_message_wrapper ul.chat_message > li + li {
        margin-top: 4px;
        }
        .popup-box-on {
        display: block !important;
        }
        a:focus {
        outline: none;
        outline-offset: 0px;
        }
        .popup-head-left.pull-left h1 {
        color: #fff;
        float: left;
        font-family: oswald;
        font-size: 18px;
        margin: 2px 0 0 5px;
        }
        .popup-head-left a small {
        display: table;
        font-size: 11px;
        color: #fff;
        line-height: 4px;
        opacity: 0.5;
        padding: 0 0 0 7px;
        }
        .chat-header-button {
        background: transparent none repeat scroll 0 0;
        border: 1px solid #fff;
        border-radius: 7px;
        font-size: 15px;
        height: 26px;
        opacity: 0.9;
        padding: 0;
        text-align: center;
        width: 26px;
        }
        .popup-head-right {
        margin: 9px 0 0;
        }
        .popup-head .btn-group {
        margin: -5px 3px 0 -1px;
        }
        .gurdeepoushan .dropdown-menu {
        padding: 6px;
        }
        .gurdeepoushan .dropdown-menu li a span {
        border: 1px solid;
        border-radius: 50px;
        display: list-item;
        font-size: 19px;
        height: 40px;
        line-height: 36px;
        margin: auto;
        text-align: center;
        width: 40px;
        }
        .gurdeepoushan .dropdown-menu li {
        float: left;
        text-align: center;
        width: 33%;
        }
        .gurdeepoushan .dropdown-menu li a {
        border-radius: 7px;
        font-family: oswald;
        padding: 3px;
        transition: all 0.3s ease-in-out 0s;
        }
        .gurdeepoushan .dropdown-menu li a:hover {
        background: #304445 none repeat scroll 0 0 !important;
        color: #fff;
        }
        .popup-head {
        background: rgb(0, 150, 136) none repeat scroll 0 0 !important;
        color: #fff;
        display: table;
        width: 100%;
        padding: 8px;
        }
        .popup-head .md-user-image {
        border: 2px solid #5a7172;
        border-radius: 12px;
        float: left;
        width: 44px;
        }
        .uk-input-group-addon .glyphicon.glyphicon-send {
        color: rgb(0, 150, 136);
        font-size: 21px;
        line-height: 36px;
        padding: 0 6px;
        }
        .chat_box_wrapper.chat_box_small.chat_box_active {
        height: 342px;
        overflow-y: scroll;
        width: 316px;
        }
        aside {
        background-attachment: fixed;
        background-clip: border-box;
        background-color: rgba(255, 255, 255);
        background-origin: padding-box;
        background-position: center top;
        background-repeat: repeat;
        border: 1px solid #fff;
        bottom: 0;
        display: none;
        height: 466px;
        position: fixed;
        right: 70px;
        width: 300px;
        font-family: "Indie Flower","Open Sans", sans-serif;
        }
        .chat_box {
        padding: 16px;
        background: rgb(255, 255, 255) none repeat scroll 0 0;
        }
        .chat_box .chat_message_wrapper::after {
        clear: both;
        }
        .chat_box .chat_message_wrapper::after,
        .chat_box .chat_message_wrapper::before {
        content: " ";
        display: table;
        }
        .chat_box .chat_message_wrapper .chat_user_avatar {
        float: left;
        }
        .chat_box .chat_message_wrapper {
        margin-bottom: 32px;
        }
        .md-user-image {
        border-radius: 50%;
        width: 34px;
        height: 34px;
        }
        img {
        border: 0 none;
        box-sizing: border-box;
        height: auto;
        max-width: 100%;
        vertical-align: middle;
        }
        .chat_box .chat_message_wrapper ul.chat_message,
        .chat_box .chat_message_wrapper ul.chat_message > li {
        list-style: outside none none;
        padding: 0;
        }
        .chat_box .chat_message_wrapper ul.chat_message {
        float: left;
        margin: 0 0 0 20px;
        max-width: 77%;
        }
        .chat_box.chat_box_colors_a
        .chat_message_wrapper
        ul.chat_message
        > li:first-child::before {
        border-right-color: #616161;
        }
        .chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
        border-color: transparent #ededed transparent transparent;
        border-style: solid;
        border-width: 0 16px 16px 0;
        content: "";
        height: 0;
        left: -14px;
        position: absolute;
        top: 0;
        width: 0;
        }
        .chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li {
        background: #fcfbf6 none repeat scroll 0 0;
        color: #000000;
        }

        .chat_box .chat_message_wrapper ul.chat_message > li {
        background: #ededed none repeat scroll 0 0;
        border-radius: 4px;
        clear: both;
        color: #212121;
        display: block;
        float: left;
        font-size: 13px;
        padding: 8px 16px;
        position: relative;
        word-break: break-word;
        }
        .chat_box .chat_message_wrapper ul.chat_message,
        .chat_box .chat_message_wrapper ul.chat_message > li {
        list-style: outside none none;
        padding: 0;
        }
        .chat_box .chat_message_wrapper ul.chat_message > li {
        margin: 0;
        }
        .chat_box .chat_message_wrapper ul.chat_message > li p {
        margin: 0;
        }
        .chat_box.chat_box_colors_a
        .chat_message_wrapper
        ul.chat_message
        > li
        .chat_message_time {
        color: rgba(185, 186, 180, 0.9);
        }
        .chat_box .chat_message_wrapper ul.chat_message > li .chat_message_time {
        color: #727272;
        display: block;
        font-size: 11px;
        padding-top: 2px;
        text-transform: uppercase;
        }
        .chat_box .chat_message_wrapper.chat_message_right .chat_user_avatar {
        float: right;
        }
        .chat_box .chat_message_wrapper.chat_message_right ul.chat_message {
        float: right;
        margin-left: 0 !important;
        margin-right: 24px !important;
        }
        .chat_box.chat_box_colors_a
        .chat_message_wrapper.chat_message_right
        ul.chat_message
        > li:first-child::before {
        border-left-color: #e8ffd4;
        }
        .chat_box.chat_box_colors_a
        .chat_message_wrapper
        ul.chat_message
        > li:first-child::before {
        border-right-color: #fcfbf6;
        }
        .chat_box
        .chat_message_wrapper.chat_message_right
        ul.chat_message
        > li:first-child::before {
        border-color: transparent transparent transparent #ededed;
        border-width: 0 0 29px 29px;
        left: auto;
        right: -14px;
        }
        .chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
        border-color: transparent #ededed transparent transparent;
        border-style: solid;
        border-width: 0 29px 29px 0;
        content: "";
        height: 0;
        left: -14px;
        position: absolute;
        top: 0;
        width: 0;
        }
        .chat_box.chat_box_colors_a
        .chat_message_wrapper.chat_message_right
        ul.chat_message
        > li {
        background: #e8ffd4 none repeat scroll 0 0;
        }
        .chat_box .chat_message_wrapper ul.chat_message > li {
        background: #ededed none repeat scroll 0 0;
        border-radius: 12px;
        clear: both;
        color: #212121;
        display: block;
        float: left;
        font-size: 13px;
        padding: 8px 16px;
        position: relative;
        }
        .gurdeep-chat-box {
        width: 220px;  
        background: #ece8e8 none repeat scroll 0 0;
        border-radius: 5px;
        float: left;
        padding: 3px;
        }
        #submit_message {
        background: transparent none repeat scroll 0 0;
        border: medium none;
        padding: 4px;
        }
        .gurdeep-chat-box i {
        color: #333;
        font-size: 21px;
        line-height: 1px;
        }
        .chat_submit_box {
        bottom: 0;
        box-sizing: border-box;
        left: 0;
        overflow: hidden;
        padding: 10px;
        position: absolute;
        width: 100%;
        }
        .uk-input-group {
        border-collapse: separate;
        display: table;
        position: relative;
        }
        .c1{
        color: #006064;
        font-weight: bold;
        }
        .c2{
        color: #D84315;
        font-weight: bold;
        }
        .c3{
        color: #004D40;
        font-weight: bold;
        }
    </style>
    <div id="app" class="oj-flex oj-md-flex-items-1 mycontainer">
        <h1 class="title fader"><?php echo $name; ?></h1>
        <h4 class="name fader">Software Developer</h4>

        <div class="oj-flex-item mt-3">
            <div class="time-container mt-5">
                <?php
                date_default_timezone_set('Africa/Lagos');
                echo date('h:i A', time());
                ?>
            </div>

            <div class="round hollow text-center mt-5 mb-3">
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

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
    <script>
        $(function () {
            $("#addClass").click(function () {
                $('#sidebar_secondary').addClass('popup-box-on');
                $('#submit_message').focus();
            });

            $("#removeClass").click(function () {
                $('#sidebar_secondary').removeClass('popup-box-on');
            });
        });
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
                        this.scrollDown();
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
                    },
                    scrollDown: function(){
                        var chatWrapper = $('.chat_box_wrapper');
                        chatWrapper.animate({ scrollTop:  chatWrapper.prop("scrollHeight") -  chatWrapper.height() }, 1500);
                    }
                }
            });
    </script>
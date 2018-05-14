<?php

    if(!defined('DB_USER')){
        require "../../config.php"; 
            
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }

    if ( isset($_POST['message']) ) {
        $input = strtolower($_POST['message']);

        $bot = new tokrBot('tokr-Bot');    //make a new class

        trim($input);
        dx_process($conn, $bot, $input);
    } //else die("Variables not properly initialized. Exiting...");

    //process raw input and determine action what method to call
    function dx_process($conn, $bot, $input){
        //set a name for user
        if (mb_substr($input, 0, 1, 'utf-8') == '!')
            $bot -> setName($input);

        //get the time for user
        else if(strpos($input, 'time') !== false )
            $bot -> getTime($input);

        //train the bot
        else if (substr($input, 0, 6) == 'train:') {
            $bot -> trainBot($conn, $input);
        }

        //display bot data
        else if($input == 'aboutbot')
            $bot -> getBotData();

        else if( strpos($input, 'date') !== false){
            echo 'Today is '.date('D.').' the '.date('jS M, ').date('Y');
            exit();
        }

        //respond to input such as hello, hi etc
        else if(str_word_count($input) == 1 && $input != 'time' && $input != 'date' && $input != 'aboutbot' && $input != 'help')
            $bot -> response($input);

        //show help
        else if($input == 'help')
            $bot -> showHelp();

        else
           $bot -> respondToQuestion($conn, $input);


    }   //end function dx_process

    ////////////////////////////////////////////Begin class definition//////////////////////////////////////////////////////
    class tokrBot{
        private $botName = 'tokr-Bot';
        private $ver = '';
        private $user = '';
        private $command = '';

        function __construct($name){
            $this -> botName = $name;
            $this -> ver = '1.0.0 rev 1';
        }

        public function getBotData(){
            echo $this -> botName .' '. $this -> ver;
            exit();
        }

        function showHelp(){
            echo 'Here\'s a few stuff I could do for you right now:'.'<br><br />'.
                 '<strong>aboutbot: </strong> gives you a bit about me. '.'<br>'.
                 '<strong>what is the date | date: </strong> gives the current date'.'<br />'.
                 '<strong>what is the time | time: </strong> gives the current time  '.'<br>'.
                 '<strong>what is the time in `city` | time `city`: </strong> gives time in select cities '.'<br>'.
                 'You could train me using the format: '.'<span><h4>train: question # answer # password</h4></span>'.'<br />'.
                 'Don\'t forget to leave out the quotes.';

            exit();           
        }


        //search the db if the question already exists
        function searchInDB($conn, $input){
            $question_exists = false;

            $sql = "SELECT question FROM chatbot";

            $result = $conn -> query($sql);

            while ($row = $result -> fetch(PDO::FETCH_ASSOC)) {
                if ($row['question'] == trim($input)) {
                    $question_exists = true;    //This executes only if a question already exists
                    break;
                }
            }   //end while

            return $question_exists;    //returns TRUE if question exists, FALSE otherwise
        }   //end function searchInDB

        private function greetUser(){
            $word = '';

            $hrs = date('H');
            if( $hrs < 12 )
                $word = 'morning';
            elseif ($hrs >= 12 && $hrs <= 15) {
                $word = 'afternoon';
            }
            else {
                $word = 'evening';
            }

            echo 'Good '.$word. ', '. ucfirst( ($this -> getUser()) ).'. ';
            exit();
        }

        function setName($name){ 
            $this -> user = substr($name, 1, strlen($name));
            $this -> welcomeUser( $this-> getUser() );
        }   //end function set_name

        function welcomeUser($user_name){
            $this -> greetUser($user_name);
            echo '<br />'."Now we are great friends. See?";
            exit();
        }   //end function welcome_user

        private function getUser(){
            return $this -> user;
        }

        function respondToQuestion($conn, $input){
        if( $this -> searchInDB($conn, $input ) == true){                   //perform a search on database for question
            $sql = "SELECT `answer` FROM chatbot WHERE `question` LIKE :qstn";
            $stmt = $conn -> prepare($sql);
            
            $stmt -> bindValue(':qstn', '%'.$input.'%');

            if( $stmt -> execute() ){   //
                $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                if ($row) {         //row is returned?
                    $str = implode('', $row);

                    if(strpos($str, '#', 0) !== false ){
                        $split = explode('#', $str);
                        array_pop($split);

                        for ($i=0; $i < sizeof($split) ; $i++) { 
                            $split[$i] = preg_replace("/[^a-zA-Z0-9\s]/", "", $split[$i]);
                        }

                        $split = array_filter($split);  //remove empty positions
                        $split = array_slice($split, 0);    //remove gaps
                        
                        echo $split[mt_rand(0, sizeof($split) - 1)];    //print a random answer
                        exit();
                    }
                    else{   //# not found in string
                        echo $row['answer'];    //give any found answer
                        exit();
                    }   //end inner-most else        
                }   //end if row 
            }       //end if stmt -> execute
            else {  //statement did not execute
                echo 'Oops! Something seems to have gone wrong'.'<br />'. $conn -> errorInfo();
                exit();
            }   //
        }   //end if searchIndb
        else{   //question was not found
            echo "Sorry, I've got no idea what that's about. Mind training me on it?".'<br />'.'Use \'train: question # answer # password\'';
            exit();
        }
    }

        //training area
       function trainBot($conn, $command){
            $trainingString = substr($command, 7, strlen($command));
            $str_ex = explode('#', trim($trainingString));

            $question = trim($str_ex[0]);
            $answer = trim($str_ex[1]);
            $password = trim($str_ex[2]);

            if ($password != 'password') {
                echo "The password you entered is not correct.".'<br>'. ' Use \'password\' without the quotes';
                exit();
                //abortTraining();
            }
            else{
                if (isset($question) && isset($answer)) {

                    //check if the question already exists in the database
                    $qexists = $this -> searchInDB($conn, $question);      //set a question exists flag

                    //Insert new question
                    if( $qexists == false ){
                        $query =  $conn -> prepare("INSERT INTO chatbot (question, answer) VALUES (:qtn, :ans)");
                        $query -> bindParam(':qtn', $question, PDO::PARAM_STR);
                        $query -> bindValue(':ans', '#@'.$answer.'@#', PDO::PARAM_STR);

                        if($query -> execute()){
                            $replies = array( 'Training successful!', 'Dat one enter. U try!', 'Got it! Thanks', 'Oboy ee! Book too sweet' );
                            echo $replies[mt_rand(0, sizeof($replies) - 1)];
                            exit();
                        }
                        else {
                            $replies = array( 'Oops! Something went wrong!', 'E no enter o. I no sabi why', 'Didn\'t work pal. Can\'t help ya. Try again', 
                                              'Di thing no work o. Just try another time.' );
                            echo $replies[mt_rand(0, sizeof($replies) - 1)];
                            exit();
                        }   //end inner else
                    }   //end $question_exists flag if

                    //execute if question already exists
                    else {
                        $msg_id;    //message id of question

                        $sql = "SELECT msg_id FROM chatbot WHERE question LIKE :qstn";
                        $query = $conn -> prepare($sql);
                        $query -> bindValue(':qstn', '%'.$question.'%');

                        if($query -> execute()){
                            $row = $query -> fetch();
                            if($row){
                                $msg_id = $row['msg_id'];
                            } else{
                                echo "Could not retrieve message";
                                exit();
                            } 
                        } 
                        else{
                            print_r($conn -> errorInfo());
                        } 
                            
                        //add an answer to an existing question
                        $sql_r = "UPDATE chatbot SET answer = CONCAT(answer, :ans) WHERE msg_id = :msg_id";
                        $stmt = $conn -> prepare($sql_r);
                        $stmt -> bindParam(':msg_id', $msg_id, PDO::PARAM_INT);
                        $stmt -> bindValue(':ans', '#@'.$answer.'@#', PDO::PARAM_STR);

                        if ($stmt -> execute()) {
                            echo "You added a new answer to: '".$question."'";
                            exit();                         
                        } else  {
                            echo "New answer could not be added"; 
                            exit();
                        }  
                    }
                }   //end outer if
            }   //end outer else
        }   //end function trainBot

        function response($string){
            $greets = array('hi', 'hello', 'hey', 'hullo', 'oboy' );
            $replies = array(', how far na?', ', howdy?', ', how are you?', ', how e de be na?', ', how e de bend?', ', how area?');

            $match_found = false;

            for ($i = 0 ; $i < sizeof($greets) ; $i++ ) { 
                if($string == $greets[$i]){
                	$match_found = true;
                   echo $greets[mt_rand(0, sizeof($greets) - 1)]. $replies[mt_rand(0, sizeof($replies) - 1)]; 
                   exit();
                }
            }   //end loop
            if($match_found == false){
                echo 'Sorry, I didn\'t get that word.';
                exit();  
            } 
        }   //end funcrion response

        /////////////////////////////////////////////////determine current time//////////////
        function getTime($time_command){
            $locations = array('london', 'dubai', 'abuja', 'accra');
            $time_zone = '';
            $time = '';

            if (strpos($time_command, 'new_york')) {
                $location = 'new york';
                $time_zone = 'America/New_York';
                date_default_timezone_set($time_zone);
                $time = date("g:i:s a");

                echo 'found'; exit();
            }

            else{
                $input_arr = explode(' ', $time_command);

                //iterate over both arrays to determine if there's any predefined location
                for ($i = 0; $i < sizeof($input_arr); $i++) {
                    for ($j = 0; $j < sizeof($locations); $j++) {
                        if($input_arr[$i] == $locations[$j]){
                            $location = $locations[$j];      //set a predetermined location
                            break;
                        }
                    }

                }   //end outer for loop

                if( isset($location) ){
                    switch ($location) {
                        case 'london':
                            $time_zone = 'Europe/London';
                            date_default_timezone_set($time_zone);
                            $time = date("g:i:s a");
                            break;

                        case 'dubai':
                            $time_zone = 'Asia/Dubai';
                            date_default_timezone_set($time_zone);
                            $time = date("g:i:s a");
                            break;

                        case 'accra':
                            $time_zone = 'Africa/Accra';
                            date_default_timezone_set($time_zone);
                            $time = date("g:i:s a");
                            break;
                    }   //end switch
                }   //end if(isset)
                else {  //if only time was asked for then display Nigerian time
                    $time_zone = 'Africa/Lagos';
                    date_default_timezone_set($time_zone);
                    $time = date("g:i:s a");
                    $location = 'nigeria';
                }

            }   //end else

            echo 'The time in '.ucfirst($location). ' is: ' .$time;    //display current local time
            exit();
        }   //end function getTime
    }   //end class definition

    //fetch-store results
    try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_query = 'SELECT * FROM interns_data WHERE username="dautX"';
        $query_my_intern_db = $conn->query($sql_query);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
   }
   catch (PDOException $exceptionError) {
       throw $exceptionError;
   }

	  $secret_word = $query_result['secret_word'];
	  $name = $intern_db_result['name'];
	  $username = $intern_db_result['username'];
	  $image_addr = $intern_db_result['image_filename'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>dautX | Profile</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Junge' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>


        <style>

            body{
                background-color: #cfd8dc;
            }

            input[type=text] {
                border: 1px solid grey;
                border-radius: 4px;
            }

            input[type=submit] {
                border: 1px solid grey;
                border-radius: 4px;
            }

            #main{
                width: 40%;
                border: 1px solid white;
                min-height: 450px;
                border-radius: 4px;
                margin: 5px auto;
            }

            #pix{
                background-color: #c4c4c4;
                margin: 5px auto;
                border-radius: 4px;
                height: 400px;
                width: 90%;
            }
            
            #content{
                background-color: aliceblue;
                min-height: 100px;
                width: 90%;
                border-radius: 5px;
                margin: 3px auto;
                font-family: 'Sofia', sans-serif;
            }

            #content p{
                margin-left: 5px;
            }

            #socials{
                min-height: 20px;
                width: 90%;
                margin: 3px auto;
                border-bottom: 2px solid grey;
            }

            #socials p{
                width: 50%;
                margin: 5px auto;
            }

            a:link, a:visited, a:hover{
                color: grey;
            }

            /*chat-bot section*/
            #main_bot{
                width: 40%;
                min-height: 500px;
                margin: 5px auto;
                border-radius: 4px;
                border: 1px solid white;
                background-color: #cfd8dc;
            }

            header{
                width: 90%;
                margin: 5px auto;
                background-color: #455a64;
            }

            header h3{
                padding: 0 0 0 5px;
                margin: 0px;
            }

            #msg_box{
                padding: 3px;
                width: 90%;
                margin: 5px auto;
                height: 450px;
                background-color: #f4f4f4;
                overflow: auto;
            }

            #status{
                width: 90%;
                margin: 3px auto;
                min-height: 20px;
                background-color: #f4f4f4;
                color: red;
            }

            #input{
                width: 90%;
                min-height: 30px;
                margin: 4px auto;
            }

            ul li{
                padding: 1px;
                border-radius: 3px;
                margin-bottom: 2px;
            }

            .bot_msg{
                list-style: none;
                background-color: #616161;
                color: white;
                width: 70%;
                padding: 3px;
                font-family: 'Andika', sans-serif;
                font-size: 13px;
                margin-bottom: 5px;
                margin-top: 5px;
                display: block;
                clear: both;
                line-height: 95%; 
            }

            .usr_cmd{
                list-style: none;
                line-height: 95%; 
                text-align: right;
                background-color: #757575;
                color: white;
                width: 70%;
                margin-right: 3px;
                margin-top: 5px;
                margin-bottom: 5px;
                float: right;
                font-family: 'Andika', sans-serif;
                display: block;
                clear: both;
            }

            #ms_bx{
                margin-bottom: 5px;
                width: 99%;
            }

            #bot:hover {
                width: 100px;
                border-radius: 4px;
            }

            #bot{
                border-radius: 2px;
                background-color: #404040;
                color: white;
                font-family: 'Sofia', sans-serif;
            }

            #send{
                display: block;
                width: 100%;
                margin-bottom: 5px;
                background-color: #757575;
                color: #ffffff;
                cursor: pointer;
                border-radius: 4px;
            }

            #status{
                display: block;
                background-color: #757575;
                color: white;
                text-align: left;
                width: 100%;
                font-family: 'Dosis', sans-serif;
                border-radius: 4px;
            }
            
            a:link, a:visited, a:hover{
                color: normal;
            }

        </style>
    </head>

    <body>
        <!-- landing page UI -->
        <div id="main">
            <div id="pix">
                <img src="https://res.cloudinary.com/dautx/image/upload/v1524690282/img_edit.png" height="400px" width="100%" alt="Profile image">
            </div>

            <!-- profile info display -->
            <div id="content">
	            <p><h3><?php echo $name; ?></h3> <?php echo '@'.$username; ?> </p>
	            <p>Experimenter, go-coder, no-mean-guts, great guy!</p>
        	</div>

            <div id="socials">
                <p style="word-spacing: 40px;"><a href="https://github.com/patrex"><i class="fab fa-github"></i></a>
                    <a href="https://facebook.com/patsoks.sokari"> <i class="fab fa-facebook"></i></a>  <a href="https://twitter.com/patman4real"><i class="fab fa-twitter"></i></a></p>
            </div>
        </div>

        <div id="cbot" style="position: fixed; right: 10px; bottom: 10px">
            <input type="button" value="ChatBot >>" id="bot">
        </div>

        <div style="clear:both">

        </div>

        <!-- bot section -->
        <div id="main_bot">
            <header>
                <h3 style="color: #ffffff;">tokr-Bot</h3>
            </header>

            <div id="msg_box">
                <ul id="message_list">
                    <li class="bot_msg">Hi, I'm tokr-Bot<br />You can say your name if you preceed it with '!'<br />'Help' shows commands I can process.
                                        <br>Wanna make me smarter? Train me using the format;<br /><span><strong>train: question#answer#password</span></strong><br />
                                        The password is 'password'. No quotes ofcourse.<br>Or just ask me something...I might just know it.</li>
                </ul>
            </div>

            <div id="input">
                <form id="input_">
                    <input id="ms_bx" type="text" placeholder="Ask me a question...">
                    <br />
                    <input type="button" value="Status: " id="status">
                    <input type="button" value="Send" id="send">
                </form>
            </div>
        </div>      <!-- end main_bot -->
        <!-- start of scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            //declare variables and links to divs
            var chat_box = document.getElementById('msg_box');          //chat box
            var user_command_display_ctrl = document.getElementById('usr_cmd');     //control how user commands are displayed
            var bot_msg_ctrl = document.getElementById('bot_msg');      //control how bot replies get displayed
            var send_but = document.getElementById('send');             //control how the send button behaves
            var form_ctrl = document.getElementById('ms_bx')            //handle on command form
            var bot_toggle = document.getElementById('bot');            //handle on bot div activator
            var bot_main_ctrl = document.getElementById('main_bot');    //control main bot div
            var main_ctrl = document.getElementById('main');            //handle on landing page
            var main_list = document.getElementById('message_list');

            var ajax_response = '';                                     //store response for processing

            window.onload = function(){
                init_bot();

            }

            function write_to_box(response){    //sanitize user command output
                if (response.length > 0) {
                    const $list_item = $( '<li class="bot_msg"></li>' );
                    $list_item.html(response);

                    $('#message_list').append($list_item);
                    chat_box.scrollTop = chat_box.scrollHeight;
                }
            }

            function init_bot(){
                bot_main_ctrl.style.display = 'none';
            }

            form_ctrl.addEventListener('keydown', function(){
                if(form_ctrl.value.length > 0){
                    document.getElementById('status').style.background = '#E1BEE7';
                    document.getElementById('status').style.color = 'black';
                    document.getElementById('status').value = 'Typing...';
                }
                else if(form_ctrl.value.length < 0){
                    document.getElementById('status').style.background = '#757575'
                    document.getElementById('status').value = 'Status: ';
                }
            }, false);

            form_ctrl.addEventListener('click', function(){
                if(form_ctrl.value.length > 0){
                    document.getElementById('status').style.background = '#E1BEE7';
                    document.getElementById('status').style.color = 'black';
                    document.getElementById('status').value = 'Typing...';
                }
                else{
                    document.getElementById('status').style.background = '#757575'
                    document.getElementById('status').value = 'Status: ';

                }
            }, false);

            send_but.addEventListener('click', ajaxify, false);

            //submit prevent reload
            document.getElementById("input_").onkeypress = function(e) {
                var key = e.charCode || e.keyCode || 0;     
                if (key == 13) {
                    //alert("Enter pressed");
                    ajaxify();

                    return false;
                }
            };

            function ajaxify(){
                //do a little housekeeping then make ajax request
                
                if (form_ctrl.value.length < 1){
                    document.getElementById('status').style.background = '#c62828';
                    document.getElementById('status').value = 'Status: you cannot submit an empty message!';
                    return false;
                } else{
                    document.getElementById('status').style.background = '#757575';
                    document.getElementById('status').style.color = '#FFFFFF';
                    document.getElementById('status').value = 'Status: message submitted successfully!';
                } 
                    

                //display user input first
                if(form_ctrl.value.length > 0){
                    var text = '';
                    var msg = document.createElement('li');
                    msg.setAttribute('class', 'usr_cmd');   //set message to class usr_cmd
                    text = document.createTextNode(form_ctrl.value);
                    msg.appendChild(text);
                    message_list.appendChild(msg);      //plant element on chat box
                    chat_box.scrollTop = chat_box.scrollHeight; //auto scroll to point
                }
                

                //create server request
                var xmlhttp = new XMLHttpRequest();
                var data = form_ctrl.value;

                form_ctrl.value = '';   //clear the textfield

                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        write_to_box(xmlhttp.responseText);
                    }
                }   //end function ajaxify

                xmlhttp.open('POST', 'profiles/dautX.php', true);
                
                xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlhttp.send('message=' + data);
            }

            //event handler for showing and hiding bot interface
            bot_toggle.addEventListener('click', function(){
                if(bot_main_ctrl.style.display == 'block'){
                    bot_main_ctrl.style.display = 'none';
                    bot_toggle.value = 'ChatBot >>';
                    main_ctrl.style.display = 'block';
                }
                else {
                    bot_main_ctrl.style.display = 'block';
                    main_ctrl.style.display = 'none';
                    bot_toggle.value = '<< Profile';
                }
            }, false);

        </script> <!-- end script -->


    </body>
</html>

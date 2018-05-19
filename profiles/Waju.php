<?php 
// functions go here

//CHAT BOT STUFF    
// answer to start us off
$answer = "Welcome, I am Olanrewaju, how may i help you, i can tell time, soon i would be able to do a lot more";
// bring in answers.php the url depends on our mode, ajax or regular
if(!array_key_exists('ajax', $_POST)){
    // 'not ajax'
    require_once ('answers.php');
} else {
    // ajax mode, need our own db and calling answers
    require_once ('../answers.php');
    require_once ('../../config.php');
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
}
function return_version(){
    define ('VERSION', "Waju @1.0.1");

    if( !isset( $_POST['ajax'] ) ){
        //not ajax
        return VERSION;
      
    } else {
        // ajax  use status for styling later
        echo json_encode([
            "message" => VERSION
        ]);
        return;
    }
}
//1 when asked a question, check in DB if present and display answer
function check_question($q, $conn){

    try{
         //Use prepared statement to protect the db
        $sql ='Select * from chatbot where question like :question';
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            'question'=> "%$q%",
        ));
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $question = $stmt->fetchAll();
       
       
        // check if the question exists
        if( $question ) {
            //it exists
             //if there exists only one answer, show this
                if( count( $question ) === 1 ){
                    // only one answer, send this
                    return $question[0];
                } else {
                        // multiple answers, send a random one
                     //get a random undex for answer to return
                     $random_answer_index = rand(0, count($question)-1);
                     return ($question[$random_answer_index]);
                 }
          
        } else {
            //the question does not exist
           return false;
        }

    } catch(PDOException $e) {
        //db access failed
        throw $e;
    }
}
function check_training($question){
    $pos = strpos($question,'train:');

    if( $pos === false) {
        return false;
    } else {
        return true;
    }
}
// Checks an anwer to see if it has function calls 
function check_answer($question){
    $opening_paren = strpos($question,'((');
    $closing_paren = strpos($question,'))');

    if( $opening_paren === false && $closing_paren === false ) {
        return false;
    } else {
        return true;
    }
}
//finds a function in an answer, calls it and interpolates its result into the return string
function parse_answer($answer){
    $function_start_limiter = '(';
    $function_end_limiter = ')';

    $param_start_limiter = '{';
    $param_end_limiter = '}';
    
    //find the function
    //Find the start limiter's position
    $function_start_pos = strpos($answer, $function_start_limiter);
    
    //Find the ending limiters position, relative to the start position
    $function_end_pos = strpos($answer, $function_end_limiter, $function_start_pos);
    
    //  Extract the string between the starting position and ending position 
    $function_name = substr($answer, $function_start_pos+2, ($function_end_pos-2)-$function_start_pos);
    // interpolate the string, replace the function name with a function call
     $response = strip_my_tags($answer);

    return str_replace($function_name, call_user_func($function_name), $response);

}

// function to strip tags, either (()) or {{}}
function strip_my_tags($string){
       return str_replace(['{{', '}}', '((', '))' ], '', $string);
}

function train($training_string, $conn){
    //extract parts, first remove train:
    $training_string = str_replace('train:', '', $training_string);

     //ckeck presence of #
     $pos = strpos($training_string,'#');
     if( $pos === false) {
 
         return 'Oops! to train me please enter use the format, <code>train: question # answer # password <code> ';
     }
     define ('PASSWORD', "password");
     //ckeck presence of password
     $pos = strpos($training_string, PASSWORD);
     if( $pos === false) {
 
         return 'I am sorry i can not accept your input without a password';
     } else {
        //the training sting is well formated and has password go on and split the string into question and answer parts
        //first get the question,  start from 0 to the first #
        $question_part = trim(substr($training_string, 0, strpos($training_string,'#')));
        
        //get the answer, remove everything else from the training string
        $answer_part = trim(str_replace(['#', PASSWORD, $question_part], '', $training_string));
  
        // Save it into db, use prepared statement to protect from security exploits
        try{

            $sql  = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                array(
                ':question' => $question_part,
                ':answer' => $answer_part,
                )
            );
            return 'Thank you kindly';

        } catch(PDOException $e){
            throw $e;
        }
    }
   
}

//SPECIAL FUNCTIONS 
function get_name(){
    return " Abolarin Olanrewaju Olabode";
}
function get_the_time(){
    //instantiate date-time object
     $datetime = new DateTime();
     //set the timezone to Africa/Lagos 
     $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
     //format the time

     return $datetime->format('H:i: A');
 }

//QUERY for User Profile, using prepared statement for security
  try {
    $sql ='Select * from interns_data where username =:user';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        'user'=> 'Waju',
    ));
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data = $stmt->fetch();
  

//query for the secret word; no need for prepared statement since its all internal
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    // Set the secret word
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}

//RUNTIME --
 if( isset ( $_POST['submit'] ) || isset( $_POST['ajax'] ) ){
    if($_POST['question'] == "") {
        $answer = 'Please type a question to start chatting';
    } else{
        //there is a question    

        $question = $_POST['question'];
        $question = trim($question);
        //remove question mark 
        $question = str_replace('?', '', $question);
            
          //check if the input is a training attempt
        $is_training = check_training($question);
        
        //if not training, go on to check answer, else train
        if(!$is_training){
           if($question == "aboutbot"){
                $answer = return_version();
           } else {

                 //check the question in db, getting a row or false
            $question = check_question($question, $conn);
            
            if($question){

                //we got a row, set the anwer to display
                //check answer for function calls
                $answer_has_function = check_answer($question['answer']);
                if(!$answer_has_function){
                    //ther are no function call just go on and display answer/response
                        if( !isset( $_POST['ajax'] ) ){
                            //not ajax
                            $answer = $question['answer'];
                        } else {
                            // ajax  use status for styling later
                            echo json_encode([
                                "message" => $question['answer']
                            ]);
                            return;
                        }
                } else{
                    //the answer has function calls parse it
                    if( !isset( $_POST['ajax'] ) ){
                        //answer has function
                        $answer = parse_answer($question['answer']);
                        
                    } else {
                        // ajax  use status for styling later
                        echo json_encode([
                            "message" => parse_answer($question['answer'])
                        ]);
                        return;
                    }
                    
                }
            } else {
                
                if( !isset( $_POST['ajax'] ) ){
                    //we did not get an answer, ask to be trained
                    $answer = "I am sorry i don't have an answer for that, please train me";
                    
                } else {
                    // ajax  use status for styling later
                    echo json_encode([
                        "message" =>  "I am sorry i don't have an answer for that, please train me"
                    ]);
                    return;
                }
            }
           }
        
        } else {
            // training
            if( !isset( $_POST['ajax'] ) ){
                //train does it stuff and returns a response, either thanks for trainig, or errors
                $answer = train($question, $conn);
            } else {
                // ajax  use status for styling later
                echo json_encode([
                    "message" => train($question, $conn)
                ]);
                return;
            }
        } 
    }
    //there is a question ends here;
 }
?>

<?php 
    // only output stuff if not doing ajax
if( !array_key_exists('ajax', $_POST)){ 
    //not doing ajax, print the page as normal
?>
    <!-- ALL printing to screen go here -->
    <style>
    .main-wrapper{
        margin-top: 30px;
        /* opacity:0; */
        /* the animation is bad for the bot using pure php */
        /* animation: fadeIn 3s 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; */
    }
    .left-pane {
        margin-right: 40px;
        /* margin-bottom: 50px; */
        height:80vh;
    }
    .img-wrap{
    border: 5px solid white;
    border-radius: 50%;
    overflow: hidden;
    height: 350px;
    width: 350px;
    box-shadow: 0px 5px 20px 5px rgba(0,0,0,0.234);
    }
    img{
        width: 100%;
        height: auto;
        object-fit:cover;
    }
    h4.name{
        margin-top: 30px;
        margin-bottom:2px;
        line-height: 1.5;
        /* opacity:0; */
        /* transform: translateY(30px); */
        /* animation: slideInUp 2s 3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; */
    }
    h4.name span{
        font-size: 20px;
    }
    h4.name span.seperator{
        color: rgba(0,0,0,0.678);
        font-size: 24px;
        font-weight: normal;
    }
    hr{
    border-top: 5px solid rgba(0,0,0,.456);
    }
    h2.heading,
    h4.name span{
        color:#007BFF;
    }
    
    /* Tweak the progressbar component */
    .progress{
        margin-top: 15px;
        height: 30px;
    }
    .progress-bar.bg-info{
        background: rgb(103, 174, 188) !important;
    }
    .progress-bar.bg-success{
        background:  rgb(146, 191, 143) !important;
    }
    .progress-bar.bg-danger{
        background:  rgb(206, 121, 124) !important;
    }
   /* And some magic */
   @keyframes slideInUp {
    from{
        opacity: 0;
        transform: translateY(30px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeIn {
    from{
        opacity: 0;

    }
    to{
        opacity: 1;
    }
}


    /* Going by mobile first, these get applied at larger screen sizes onlys */
@media (min-width:700px){
    .left-pane{
        height:auto;
    }
    h2.heading{
        color:#007BFF;
        text-align:right;
    }
    .my-skillset{
        margin-top: 35px;
    }
    .right-pane{
        position:relative;
    }
    .right-pane:before{
        display:inline-block;
        content:"";
        background:rgba(0,0,0,0.456);
        width:1px;
        height:70%;
        position: absolute;
        left:-15px;
        top: 15%;
    }
}

</style>


    <!-- bootstrap is mobile first so mf-row must come before flex-column -->
    <div class="d-flex flex-md-row flex-column mb-3 main-wrapper">

        <div class="p-2 left-pane flex-grow-0 flex-md-grow-5">
            <div class="img-wrap">
                <img src="<?=$intern_data['image_filename']; ?>" alt="waju">
            </div> 
            <h4 class="name text-center"><?=$intern_data['name']; ?><br>
                <span><?="@".$intern_data['username']; ?><span class="seperator"> | </span>Fullstack Developer</span>
            </h4>
            
        </div>
        <!-- /.left-pane -->
            
            <hr class="hide-lg">


        <div class="d-flex flex-column p-2 right-pane flex-grow-0 flex-md-grow-7">
            <div class="meet-me">
                <h2 class="heading">Meet Me!</h2>
                
                <p>
                    Hi! I am Olanrewaju, a Fullstack Developer and technology enthusiast. I love clean design and I love beautiful expressive code.                     I build Websites with vanilla PHP( using a custom framework), WordPress and good 'ol Javascript.
                </p>
                <p>
                    As a trained Project Manager I particulary enjoy setting up projects - drawing up plans, wireframes, user stories and the works. 
                </p>
            </div>
            <!-- /.meet-me -->

            <hr class="hide-lg">

            <div class="my-skillset">
                <h2 class="heading">My Skillset</h2>
                
                <div class="progress"  >
                   <span class="skill-logo php"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    PHP</div>
                </div>
                 <!-- /.php -->
                
                <div class="progress" >
                    <span class="skill-logo js"></span><div class="progress-bar bg-success " role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                     Javascript</div>
                </div>
                <!-- /.JS -->
                
                <div class="progress" >
                    <span class="skill-logo css"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">CSS3</div>
                </div>
                <!-- /.css -->
                
                <div class="progress" >
                    <span class="skill-logo vue"></span> <div class="progress-bar bg-danger " role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">VueJs</div>
                </div>
                <!-- /vue -->
                
                <div class="progress" >
                    <span class="skill-logo wp"></span> <div class="progress-bar  bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">WordPress Dev.</div>
                </div>
                <!-- /WordPress Dev-->
                
                <div class="progress" >
                    <span class="skill-logo git"></span> <div class="progress-bar bg-success " role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Git</div>
                </div>
                <!-- /git -->

                <div class="progress" >
                    <span class="skill-logo devops"></span> <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">DevOps</div>
                </div>
                <!-- /DevOps -->

            </div>
            <!-- ./my-skillset -->

        </div>
            <!-- /.right-pane -->
    </div>
    <!-- /.main-wrapper -->

    <style>
    /* Move these to the top later */
    .chat-area{
        position:fixed;
        bottom: 0%;
        left: 10%;
        background: white;
        font-size: 14px;
        height:100px;
        width:350px;
        padding:0;
        box-shadow: 3px -1px 10px 1px rgba(0,0,0,0.345);
    }
    /* different style for game  */
    .chat-area[data-state="game"]{
        /*  */
    }
    .chat-area.chat-area--js {
        height: 170px;
    }
    
    .chat-form{
        position:absolute;
        bottom: 0;
        left:0;
        width:100%;
    }
    .input-field{
        width:75%;
        margin:0;
        outline:none;
        text-indent: 10px;
        height:30px;
    }
    .form-group{
        padding:0;
        margin:0;
    }
    .send-button{
        width:20%;
        margin:0;
        background: #92BF8F;
        padding: 2px 5px;
        font-weight: bold;
        color:rgba(255,255,255,0.789);
    }
    .chat-header{
        background: linear-gradient(96deg, #373A98 0, #226AE6 58%);
        height: 40px;
        padding: 10px 10px 0 10px;
        color: white;
        font-weight: bold;
        font-size:16px;
        display: flex;
        justify-content: space-between;
        align-items:baseline;
    }
    span.status{
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgb(124, 191, 116);   
    }
    span.toggle{
        padding: 2px 10px;
        cursor:pointer;
    }
    .chat-list-wrapper{
        position: relative;
        width:100%;
        height:80%;
        padding-bottom: 20px;
        overflow-y:auto;
        overflow-x:hidden;
    }
    .chat-list{
        list-style:none;
        display:flex;
        flex-direction:column;
        padding:0;
    }
    .chat-list__item:not(:empty){
        padding: 10px 15px;
        width: 70%;
        margin-top: 10px; 
        font-style: italic;
        font-weight: bold;
        color: rgba(255, 255, 255,0.9);
    }
    .chat-list__item--user{
        background: #DBE1E1;
        color: rgba(0,0,0,0.789);
        margin-left:auto;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }
    .chat-list__item--bot{
        text-align: right;
        padding-right: 5px;
        background: #007BFF;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
    </style>
    <div class="chat-area chat-area--js" data-state="">
        <div class="chat-header">
            <span class="left">
                <span class="status"></span>
                <span class="bot-name">@Waju</span> 
            </span>               
            <span class="toggle" data-state="down">&#x23EB;</span>
            <!-- &#x23EC; -->
        </div>
        <div class="chat-list-wrapper">
            <ul class="chat-list">
                    
                <li class="chat-list__item chat-list__item--bot"><?=$answer?></li>
            </ul>
        </div>
        <form action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $_GET['id']; ?>" class="chat-form" id="chatForm" method="POST">
            <div class="form-group">
                <input type="text" name="question" id="questionField" class="input-field" autofocus>
                <input type="submit" name="submit" value="Send" class="send-button">
            </div>
        </form>
    </div>
<script>
window.addEventListener("load", function() {
    loadQuestions = function(){

        return new Promise((resolve, reject) => {
            fetch('https://opentdb.com/api.php?amount=20&difficulty=easy&type=boolean')
            .then(resp => resp.json())
            .then(questions => {
                resolve(questions);
            });
        });
    
    }
    const chatBot = {
            $el: $('.chat-area'),
        init: function(){
            this.$el.addClass('chat-area--js');
            //add functions js can do
            this.$el.find('.chat-list__item--bot').text("I am Waju, a bot built by Olanrewaju, i can tell the time, to play a game type #game");
            this.cacheDome();
            this.bindEvents();
        },
        cacheDome: function(){
            this.$chatList = this.$el.find('.chat-list')
            this.$form = this.$el.find('form');
            this.$userInput = this.$form.find('#questionField');
            this.$wrapper = this.$el.find('.chat-list-wrapper');
            this.$toggle = this.$el.find('span.toggle'); 
        },
       
        /**
         * Handle input from the user
         */
        handleInput: function(e){
            e.preventDefault();
            let message = this.$userInput.val();
            if(message === '') {
                this.appendMessage("Please input a message", 'bot');
                return;
            } 
            //append the message
            this.appendMessage(message,'user');
            //if input is a command run it regardless of state;
            if( message.charAt(0) == '#' ){
                // run command
                this.runCommand(message);
                this.$userInput.val('');
                return;
            }
            //check if we are in a function state
            if(this.$el.data('state') == ''){
                //its stateless - just chat
                //check if its a command has a leading #, if so do the command else send it to server                    //send question to server Assynchronously
                this.sendRequest(message);

            } else {
                //its in a function state (just game for now)
                this.evaluateResponse(message);
            }

            //clear the input
            this.$userInput.val('');


            },
            //send a request to the serve and append it to the bot
            sendRequest: function(message) {
                let self = this;
                let posting = $.post({
                    url: 'profiles/Waju.php',
                    data: {question: message, ajax: 'AJAX'},
                    dataType: 'json'
                });
                posting.done(function(data){
                    self.appendMessage(data.message, 'bot');;
                });  
            },
        /**
         * Append the message to the chat-list, takes in message and sender-type
         */
        appendMessage: function(message, senderType){
            //PS; 'this' is chatBot Object
            // console.log( `Appending message: ${message} from Sender: ${senderType}`);
            //for bots, add a 400s delay, for user dont;
            let delay = senderType == 'bot' ? 800 : 400,
                self = this;
            setTimeout(function(){
                self.$chatList.append(`
                <li class="chat-list__item chat-list__item--${senderType}">${message}</li>
            `);
            }, delay);
                   

            //scroll the chat interface up/ down
            this.$wrapper.animate(
                {scrollTop: '+=1000',},
                {duration: 700,
                easing: 'swing',
                duration: 600
                }
            );
        },
        toggleView: function(e){
            // if height is ,170.. increase it and point down 
            console.log(this.$el.height());
            if( this.$el.height() <= 180 ){
                    // <!-- &#x23EC; -->
                    this.$toggle.html(`<span class="toggle" data-state="down">&#x23EC;</span>`);
                    this.$el.animate({ height: 350 }, { duration: 300 })
            } else {
                // reduce it and point down 
                // <!-- &#x23EC; -->
                this.$toggle.html(`<span class="toggle" data-state="down">&#x23EB;</span>`);
                this.$el.animate({ height: 180 }, { duration: 300 })
            }
        },
         //gets the machine to switch to a command mode
         runCommand: function(command){
            switch(command){
                case "#game":
                    this.$el.trigger('startGame');
                break;
                case "#end":
                    this.$el.trigger('endGame');
                default:
                    this.$el.data('state', '');
            }
        },
        bindEvents: function(){
            //handle user inputs
            this.$form.on('submit',this.handleInput.bind(this));

            //toggle on click 
            this.$toggle.on('click', this.toggleView.bind(this));

            //start actions based on triggered events

            //start game
            this.$el.on('startGame', this.startGame.bind(this));

            //end game
            this.$el.on('endGame', this.gameOver.bind(this));
        },
        // =====GAME FUNCTIONS ======= 
        //vars
        _score: 0,
        _trials : 0,
        _screens: {
            start: `Hi there, lets play a trivia game I will ask you a question, respond with T (True) or F (False), type #end to stop the game`,
            wrong: `Sorry that answer was wrong`,
            correct: `Cool, you were right`,
            gameOver: `Thanks for playing you scored ${self._score} points type #game to play again`
        },
        startGame: function(){
            let self = this,
                fetch_data = loadQuestions();
                fetch_data.then(function(data){
                   self._questions =data.results;                   // self._questions = data.result;
                })
            // reset question index in case restarting game
            this.$el.data('state', 'game');
            this.current_index = 0;
            //set $el data-state to game, used in handle input to know if game is on going.
            //send start screen message,
            this.appendMessage(this._screens.start, 'bot');
            
            //send first question after some seconds
            setTimeout(function(){
                self.appendMessage(self._questions[self.current_index].question, 'bot');        
            }, 1200);
            
            this.$wrapper.animate(
                {scrollTop: '+=1000',},
                {duration: 700,
                easing: 'swing',
                duration: 600
                }
            );
        },
        nextQuestion: function(){
            //increase index
            this.current_index++;
            if(this.current_index !=this._questions.length){
                //show question after some seconds
                    let self = this;
                    setTimeout(function(){
                        self.appendMessage(self._questions[self.current_index].question, 'bot');        
                    }, 1200);
            } else {
                //we have exhasted question, game over
                this.gameOver();
                //unset the state 
                this.$el.data('state','');
            }
            this.$wrapper.animate(
                {scrollTop: '+=1000',},
                {duration: 700,
                easing: 'swing',
                duration: 600
                }
            );
        },
        gameOver: function(){
            this.appendMessage(`Thanks for playing you scored ${this._score} points type #game to play again or type a message to chat`, 'bot');
        },
        evaluateResponse:function(response){
            let _response = response.charAt(0).toUpperCase(),
                answer = this._questions[this.current_index].correct_answer.charAt(0).toUpperCase(),
  
                //check if right or wrong
                result = (_response === answer ) ? 'Correct' : 'Wrong';          
                //update score
                    this.updateScore(result);
                //show result
                let screen = result === 'Correct' ? this._screens.correct : this._screens.wrong;
                this.appendMessage(screen, 'bot');    
                //next question
                this.nextQuestion();       
        },
        //update the score adding 100 for correct answers of leaving it thesame
        updateScore(verdict){
           this._score = ( verdict === 'Correct' ) ? this._score +100 : this._score;
        },
        dislayQuestion: function(){},
        current_index: 0,
       
    }
   
  chatBot.init();
});
</script>
<?php
//close if not doing ajax
} else{
    // doing ajax, dont print anything to screen;
    //RUNTIME --AJAX
    
}
//doing ajax ends here
?>
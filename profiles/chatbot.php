<?php
ini_set('display_errors',0);
function gettTime(){
    date_default_timezone_set('Africa/Lagos');
    return "The time is " . date("h:i:sa");
}function getMyquote(){
    $random = rand(0,11);
    $quote = array("My life is my message. Mahatma Gandhi",
        "Not how long, but how well you have lived is the main thing. Seneca",
        "I love those who can smile in trouble… Leonardo da Vinci",
        "Time means a lot to me because, you see, I, too, am also a learner and am often lost in the joy of forever developing and simplifying. If you love life, don’t waste time, for time is what life is made up of. Bruce Lee",
        "Life is what happens when you’re busy making other plans. John Lennon",
        "It is better to be hated for what you are than to be loved for what you are not. Andre Gide",
        "Dost thou love life? Then do not squander time, for that is the stuff life is made of. Benjamin Franklin",
        "Very little is needed to make a happy life; it is all within yourself, in your way of thinking. Marcus Aurelius",
        "Life is like playing a violin in public and learning the instrument as one goes on. Samuel Butler",
        "In the end, it’s not the years in your life that count. It’s the life in your years. Abraham Lincoln",
        "You’ve gotta dance like there’s nobody watching. William W. Purkey",
        "Believe that life is worth living and your belief will help create the fact. William James");
    return $quote[$random];
}function getmyJoke(){
    $random = rand(0,6);
    $joke = array("Q. What is the biggest lie in the entire universe?
               A. I have read and agree to the Terms & Conditions.",
        "Q. What do you call it when you have your mom’s mom on speed dial? A. Instagram.",
        "Q. What should you do after your Nintendo game ends in a tie?  A. Ask for a Wii-match!",
        "Why are iPhone chargers not called Apple Juice?!",
        "Q. How does a computer get drunk?  A. It takes screenshots.",
        "Q. Why did the PowerPoint Presentation cross the road?
        A. To get to the other slide.",
        "PATIENT: Doctor, I need your help. I’m addicted to checking my Twitter!
    DOCTOR: I’m so sorry, I don’t follow.",
        "What’s the Gig Deal?
        Have you heard of that new band “1023 Megabytes”? They’re pretty good, but they don’t have a gig just yet."
    );
    return $joke[$random];
}
session_start();
if (!isset($_SESSION["all"])){
    $_SESSION["all"] = [];
}if(!defined('DB_USER')){
    require_once "../../config.php";
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }}
global $conn;
$solution = '';
if (isset($_POST['restart'])){
    session_destroy();
}if (isset($_POST['button'])) {
    if (isset ($_POST['input']) && $_POST['input'] !== "") {

        $function = $_POST['input'];
        $functionName = explode("(", $function);
        if (function_exists($functionName[0])&&strpos($function,"(")&&strpos($function,")")) {
            $functionVariable = explode(')',$functionName[1],2);
            if (!strpos($functionVariable[0],",")){
                $response = $functionName[0]($functionVariable[0]);
            }else
                $functionVariable1 = explode(',',$functionVariable[0],2);
            $response = $functionName[0]($functionVariable1[0],$functionVariable1[1]);
            // Dynamic call using variable value as function name.
        }else{$asked_question_text = $_POST['input'];
            $solution = askQuestion($asked_question_text) . "<br/>";
            $_SESSION["all"][] = array($solution, $asked_question_text);
        }
    }
}
function askQuestion($input)
{$input = strtolower($input);
    $input = trim($input);
    $action = "train:";
    $time = "time";
    global $conn;
    $train = strpos($input,$action);
    if ($input!==""||$input!==" ") {
        if ($train === 0) {
            $explode = explode(':', $input, 2);
            if (isset($explode[1])) {
                $explode2 = explode('#', $explode[1], 2);
                if (isset($explode2[1])) {
                    $explode3 = explode('#', $explode2[1], 2);
                    if (isset($explode3[1])){
                        if (  $explode3[1] == "password") {
                            $query = $conn->query("SELECT question, answer FROM chatbot WHERE LOWER(question) ='" . $explode2[0] . "' and LOWER(answer) =  '" . $explode3[0] . "'");
                            $row_cnt = $query->rowCount();
                            if ($row_cnt > 0) {
                                return "QUESTION ALREADY EXISTS ";
                            } else
                                $the_queried = $conn->query("INSERT INTO chatbot(question, answer) VALUES ('" . $explode2[0] . "', '" . $explode3[0] . "')");
                            if ($the_queried) {
                                $saved_message = "Saved " . $explode2[0] . " -> " . $explode3[0];
                                return $saved_message;
                            } else
                                return "Please try again";
                        } else
                            return "Please enter the right password";
                    }else
                        return "Please enter the password after your answer";
                } else
                    return "The right format is train:yourquestion#youranswer#password";
            } else
                return "The right format is train:yourquestion#youranswer#password";
        } else {
            if (preg_match('/\baboutbout\b/',$input)) {
                return "Adokiye v1.0";
            } else if (preg_match("/\b($time)\b/",$input)) {
                return gettTime();
            } else if (preg_match('/\bhelp\b/',$input)) {
                return "Enter train:yourquestion?#youranswer#password to add more questions to dummy me<br/>Click on restart to clear our conversation and start again<br/>";
            }else if($input=="you are mad"||$input == "you're mad"){
                return "YOUR FATHER";
            }else if(preg_match("/\bquote\b/",$input)){
                return getMyquote();
            }else if(preg_match("/\bjoke\b/",$input)){
                return getmyJoke();
            }
            else {
                $input = $_POST['input'];
                $question = strtolower($input);
                $question = str_replace('?', '', $question);
                $question = trim($question);
                $query = "SELECT * FROM chatbot WHERE LOWER(question) like '$question'";
                $result = $conn->query($query);
                $row_cnt = $result->rowCount();
                $records = $result->fetchAll(PDO::FETCH_ASSOC);
                $rand = rand(0, $row_cnt - 1);
                if ($row_cnt > 0) {
                    return $records[$rand]['answer'];
                } else
                    return "Am sorry, this question wasn't found,Please ENTER TRAIN:QUESTION#ANSWER#password to make me smarter";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Resumex - Professional HTML CSS Resume Website Template</title>

    <!-- favicon -->
    <link href="favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- font-awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
    font-family : 'Hind', sans-serif;
    font-size   : 15px;
    line-height : 1.8em;
    color       : #3d3d50;
    font-weight : 300;
    background  : url("../img/pattern-bg.png") fixed;
    }

/* --------------------------------------
 * Global Typography
 *------------------------------------------*/

h1, h2, h3, h4, h5, h6 {
    margin : 0 0 15px;
    color  : #2b2b3d;
    }

h1 {
    font-size   : 26px;
    line-height : 1.8em;
    font-weight : 700;
    }

h2 {
    font-size   : 18px;
    line-height : 1.8em;
    font-weight : 700;
    }

h3 {
    font-size   : 16px;
    line-height : 1.8em;
    font-weight : 500;
    }

h4 {
    font-size   : 15px;
    line-height : 1.8em;
    font-weight : 500;
    }

h5 {
    font-size   : 15px;
    line-height : 1.5em;
    font-weight : 500;
    }

h6 {
    font-size   : 15px;
    line-height : 1.5em;
    }

/* --------------------------------------
 * LINK STYLE
 *------------------------------------------*/
a {
    color              : #FFC107;
    text-decoration    : none;
    -webkit-transition : all 0.3s ease 0s;
    -moz-transition    : all 0.3s ease 0s;
    -o-transition      : all 0.3s ease 0s;
    transition         : all 0.3s ease 0s;
    }

a,
a:active,
a:focus,
a:active {
    text-decoration : none;
    outline         : none
    }

a:hover,
a:focus {
    text-decoration : none;
    color           : #ff9800;
    }

p {
    margin-bottom : 20px;
    }

ul {
    margin     : 0;
    padding    : 0;
    list-style : none;
    }

/*------------------
 * Button Style
 *------------------*/
.btn {
    padding        : 14px 30px 11px;
    margin-bottom  : 0;
    font-size      : 14px;
    font-weight    : 500;
    border-radius  : 0;
    border         : 0;
    text-transform : uppercase;
    }

.btn-lg {
    font-weight : 700;
    font-size   : 24px;
    padding     : 15px 30px;
    }

/*btn-primary*/
.btn-primary {
    background-color : #FFC107;
    }

.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active:focus {
    background : #ff9800;
    }

/*btn-default*/
.btn-default {
    color            : #2a54f5;
    background-color : transparent;
    border           : 2px solid #2a54f5;
    }

.btn-default:hover,
.btn-default:focus,
.btn-default:active:focus {
    background   : #2a54f5;
    color        : #ffffff;
    border-color : #2a54f5;
    }

button:focus,
.btn:focus,
.btn:active:focus {
    outline : none;
    }

/* --------------------
 * Column Block
 * -------------------*/

.columns-block {
    display                : -webkit-flex;
    display                : flex;
    -webkit-flex-direction : row;
    flex-direction         : row;
    margin                 : 60px auto;
    padding                : 0;
    box-shadow             : 0 0 0 1px #eaeaea;
    }

.blocks {
    box-sizing : border-box;
    }

.left-col-block {
    overflow     : hidden;
    -webkit-flex : 1 0 0;
    flex         : 1 0 0;
    position     : relative;
    background   : rgba(255, 255, 255, .8);
    border-right : 1px solid #eaeaea;
    }

.right-col-block {
    -webkit-flex : 2 0 0;
    flex         : 2 0 0;
    position     : relative;
    background   : #ffffff;
    }

@media (max-width : 768px) {

    .columns-block {
        display    : block;
        margin     : 0;
        box-shadow : none;
        }

    .left-col-block {
        width    : 100%;
        position : relative;
        border   : 0;
        }

    .right-col-block {
        width      : 100%;
        position   : relative;
        box-shadow : none;
        }
    }

@media (min-width : 769px) and (max-width : 1024px) {
    .columns-block {
        margin-top    : 30px;
        margin-bottom : 30px;
        }
    }

/* --------------------
 * Section Background
 * -------------------*/

.gray-bg {
    background-color : #ffffff;
    }

/* --------------------
 *  main Wrapper
 * -------------------*/
#main-wrapper {
    overflow : hidden;
    }

/*-------------------
 * Section Wrapper
 *-------------------*/
.section-wrapper {
    padding       : 50px;
    border-bottom : 1px solid #eaeaea;
    }

@media (max-width : 480px) {
    .section-wrapper {
        padding : 30px 20px;
        }
    }

/*---------------------------
* Section Title
*---------------------------*/
.section-title {
    margin-bottom : 15px;
    }

.section-title h2 {
    margin-bottom : 5px;
    color         : #bebece;
    }

/*-----------------------------
 * NAVIGATION & HEADER STYLE
 *-----------------------------*/

.header {
    padding  : 20px !important;
    margin   : 0;
    position : relative;
    }

.header .profile-img {
    margin-bottom : 50px;
    }

.header .content-wrapper {

    }

.header .content {
    width  : 100%;
    margin : 0 auto;
    }

.header .content h1 {
    line-height : 1;
    margin      : 0 0 5px;
    }

.header .content .lead {
    font-size : 18px;
    }

.header .content .about-text {
    margin : 10px 0;
    }

.header .btn {
    margin-top : 40px;
    }

@media (max-width : 768px) {
    .header {
        padding       : 0;
        text-align    : center;
        border-bottom : 1px solid #ededed;
        }

    .header img {
        margin : 0 auto;
        }

    .header .content {
        padding : 50px;
        }
    }

/* Header Sticky */

.sticky {
    position : -webkit-sticky;
    position : sticky;
    top      : 0;
    }

/*-------------------
 * Social Icon
 *-------------------*/

.social-icon {
    margin  : 20px 0;
    padding : 0;
    display : block;
    }

.social-icon li {
    display : inline-block;
    margin  : 0 2px;
    }

.social-icon li a {
    display       : block;
    font-size     : 12px;
    color         : #333333;
    width         : 34px;
    height        : 34px;
    line-height   : 33px;
    text-align    : center;
    border-radius : 2px;
    border        : 2px solid #eeeeee;
    }

.social-icon li a:hover {
    border-color : #cccccc;
    }

/*-------------------
 * Expertise
 *-------------------*/
.expertise-item {
    margin-bottom : 20px;
    }

.expertise-item h3 {
    margin-bottom : 5px;
    font-weight   : 700;
    }

/*-------------------
 * Skills Progressbar
 *-------------------*/

.progress-item {
    position : relative;
    }

.progress-item .progress-title {
    font-size     : 15px;
    font-weight   : 400;
    display       : inline-block;
    margin-bottom : 5px;
    }

.progress-item .progress {
    height        : 4px;
    box-shadow    : none;
    border-radius : 5px;
    }

.progress-item .progress-bar {
    background-color : #FFC107;
    box-shadow       : none;
    text-align       : right;
    }

.progress-item .progress-percent {
    font-size        : 10px;
    background-color : #313131;
    position         : absolute;
    top              : 5px;
    padding          : 0 8px;
    border-radius    : 3px;
    }

.progress-item .progress-percent::before {
    content      : "";
    position     : absolute;
    left         : 0;
    bottom       : -4px;
    border-top   : 6px solid #313131;
    border-right : 8px solid transparent;
    }

/*-------------------
 * Portfolio
 *-------------------*/

.portfolio-item {
    position      : relative;
    display       : block;
    margin-bottom : 30px;
    }

.portfolio-item .portfolio-thumb img {
    height    : auto;
    display   : block;
    max-width : 100%;
    }

.portfolio-item .portfolio-info {
    position   : absolute;
    bottom     : 0;
    padding    : 30px 15px 5px;
    width      : 100%;
    background : -webkit-linear-gradient(
            top,
            transparent 0%,
            rgba(0, 0, 0, 0.5) 100%
    );
    }

.portfolio-item .portfolio-info h3 {
    margin      : 0;
    line-height : 1;
    color       : #ffffff;
    }

.portfolio-item .portfolio-info small {
    color : #ffffff;
    }

.portfolio-item:hover .portfolio-info {
    background : -webkit-linear-gradient(
            top,
            transparent 0%,
            #000 100%
    );
    }

/*-------------------
 * Content Item
 *-------------------*/

.content-item {
    margin-bottom : 40px;
    }

.content-item h3 {
    margin         : 0 0 10px;
    line-height    : 1;
    font-weight    : bold;
    text-transform : uppercase;
    }

.content-item h4 {
    margin      : 0;
    line-height : 1;
    }

.content-item small {
    color : #888888;
    }

/*-------------------
 * Contact
 *-------------------*/

.feedback-form {
    margin-top : 50px;
    }

/*-------------------
 * Form Style
 *-------------------*/
.form-control {
    height        : 50px;
    padding       : 0 20px;
    font-size     : 13px;
    line-height   : 50px;
    color         : #969595;
    border        : 1px solid #cccccc;
    border-radius : 0;
    box-shadow    : none;
    box-sizing    : border-box;
    }

.form-control:focus,
.form-control:active {
    box-shadow : none;
    }

/* --------------------------------------------
 *   Footer
 *---------------------------------------------- */

/* Copyright */

.footer {
    padding : 30px 50px;
    }

.footer .copyright-section {
    font-size : 13px;
    color     : #888888;

    }

.footer .copyright-section .copytext {
    font-weight : 400;
    display     : block;
    }

@media (max-width : 480px) {
    .footer {
        padding : 10px 20px;
        }
    }

/* ---------------------------------------------- /*
 * Preloader
/* ---------------------------------------------- */
#preloader {
    background : rgba(255, 255, 255,.8);
    bottom     : 0;
    left       : 0;
    position   : fixed;
    right      : 0;
    top        : 0;
    z-index    : 9999;
    }

#status,
.status-mes {
    background-image    : url(../img/preloader.svg);
    background-position : center;
    background-repeat   : no-repeat;
    height              : 200px;
    left                : 50%;
    margin              : -100px 0 0 -100px;
    position            : absolute;
    top                 : 50%;
    width               : 200px;
    }

.status-mes {
    background : none;
    left       : 0;
    margin     : 0;
    text-align : center;
    top        : 65%;
    }
    </style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">

<div class="columns-block container">
<div class="left-col-block blocks">
    <header class="header theiaStickySidebar">
        <div class="profile-img">
            <img src="https://res.cloudinary.com/mikejetty/image/upload/v1526042287/mypic_github.jpg" class="img-responsive" alt=""/>
        </div>
        <div class="content">
            <h1>Mikoloxtra</h1>
            <span class="lead">Ajetunmobi Michael</span>

            <div class="about-text">
                <p>
                    Credibly embrace visionary internal or "organic" sources and business benefits. Collaboratively
                    integrate efficient portals rather than customized customer service. Assertively deliver
                    frictionless services via leveraged interfaces. Conveniently evisculate accurate sources and
                    process-centric expertise.
                </p>

                <p>Energistically fabricate customized imperatives through cooperative catalysts for change.</p>


                <p><img src="https://res.cloudinary.com/mikejetty/image/upload/v1526042524/coollogo_com-27034917.png" alt="" class="img-responsive"/></p>
            </div>


            <ul class="social-icon">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            </ul>
        </div>

    </header>
    <!-- .header-->
</div>
<!-- .left-col-block -->


<div class="right-col-block blocks">
<div class="theiaStickySidebar">
    

<section class="section-wrapper skills-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Skills</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="progress-wrapper">

                    <div class="progress-item">
                        <span class="progress-title">HTML</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 62%"><span class="progress-percent"> 62%</span>
                            </div>
                        </div>
                        <!-- .progress -->
                    </div>
                    <!-- .skill-progress -->


                    <div class="progress-item">
                        <span class="progress-title">CSS</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 90%"><span class="progress-percent"> 90%</span>
                            </div>
                        </div>
                        <!-- /.progress -->
                    </div>
                    <!-- /.skill-progress -->


                    <div class="progress-item">
                        <span class="progress-title">BOOTSTRAP</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 75%;"><span class="progress-percent"> 75%</span>
                            </div>
                        </div>
                        <!-- /.progress -->
                    </div>
                    <!-- /.skill-progress -->

                    <div class="progress-item">
                        <span class="progress-title">WORDPRESS</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 55%;"><span class="progress-percent"> 55%</span>
                            </div>
                        </div>
                        <!-- /.progress -->
                    </div>
                    <!-- /.skill-progress -->
                    <div class="progress-item">
                        <span class="progress-title">PHP</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 80%;"><span class="progress-percent"> 80%</span>
                            </div>
                        </div>
                        <!-- .progress -->
                    </div>
                    <!-- .skill-progress -->

                </div>
                <!-- /.progress-wrapper -->
            </div>
        </div>
        <!--.row -->
    </div>
    <!-- .container-fluid -->
</section>
<!-- .skills-wrapper -->



<section class="section-contact section-wrapper gray-bg">
    <div class="container-fluid">
        <!--.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="feedback-form">
                    <h2>CHATBOT</h2>

                    <form id="contactForm" action="sendemail.php" method="POST">
                       
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message</label>
                            <textarea class="form-control" rows="4" required="" name="message" id="message-text"
                                      placeholder="Write message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Ask</button>
                    </form>
                </div>

                <p>&nbsp;</p>
    </form>&nbsp;</p>
    <p><?php echo $response;echo "<br/>"?>
        <?php foreach($_SESSION["all"] as list($asked,$soln )){ ?>
        <span style="color:greenyellow"><?=  "YOU : $soln <br/>";echo "</span>";echo "<span style=\"color:white\">";
            echo "BOT : $asked<br/>" ?><br/></span></p>
    <?php }?>
</div>
<br/><div class="Screenshot"></div>
                <!-- .feedback-form -->


            </div>
        </div>
    </div>
    <!--.container-fluid-->
</section>
<!--.section-contact-->


</div>
<!-- Sticky -->
</div>
<!-- .right-col-block -->
</div>
<!-- .columns-block -->
</div>
<!-- #main-wrapper -->

</body>
</html>
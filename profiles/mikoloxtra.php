<?php
    if(!defined('DB_USER')){
        require_once "../../config.php";
        //configs   
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }
    $sql = "SELECT 'name', 'username', 'image_filename' FROM 'interns_data' WHERE 'username'='mikoloxtra'";
    $sql0 = "SELECT * FROM 'secret_word' LIMIT 1";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->execute();
    $data = $stmt0->fetch(PDO::FETCH_ASSOC);
    $secret_word = $data['secret_word'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $quest = $_POST['question'];
        $quest_low = strtolower($quest);
        $training_mode = stripos($quest_low, "train:");
        $menu_mode = stripos($quest_low, "menu");
        $crypto_mode = stripos($quest_low, "crypto:");
        if ($training_mode !== false) {
            $trtext = explode("#", $quest_low);
            $tempquestion = explode(":", $trtext[0]);
            $mquestion = trim($tempquestion[1]);
            $answer = trim($trtext[1]);
            try{
                $sql = "INSERT INTO chatbot (question, answer) values (:question, :answer)";
                $init = $conn->prepare($sql);
                $init->bindParam(':question', $mquestion);
                $init->bindParam(':answer', $answer);
                $init->execute();
                $init->setFetchMode(PDO::FETCH_ASSOC);
                if ($init) {
                    echo json_encode(['status' => 1, 'reply' => 'Training Successful']);
                    die();
                }
            } catch(PDOException $e){
                throw $e;
            }
        }elseif($crypto_mode !== false){
            $temp = explode(":", $quest_low);
            $ticker = trim($temp[1]);
            $price = getCryptoPrice($ticker);
            if (strcasecmp($price, "No value") == 0) {
                echo json_encode(['status' => 1, 'reply' => 'Wrong ticker, check again.']);
                die();
            }else{
                echo json_encode(['status' => 1, 'reply' => 'The price of '.$ticker.' is '.number_format($price, 2).' in dollars and '.number_format(($price*360)).' in naira.']);
                die();
            }
        }elseif (strcasecmp($quest_low, "what is your name?") == 0){
            echo json_encode(['status' => 1, 'reply' => 'My name is mikoloxtra']);
            die();
        }elseif($menu_mode !== false ){
            $menu = bot_menu();
            echo json_encode(['status' => 1, 'reply' => $menu]);
            die();
        }else{
            $quest_lowe = "%$quest_low%";
            try{
                $sql = "SELECT * FROM chatbot WHERE question LIKE :question";
                $init = $conn->prepare($sql);
                $init->bindParam(':question', $quest_lowe);
                $init->execute();
                $init->setFetchMode(PDO::FETCH_ASSOC);
                $dats = $init->fetchAll();
                if ($dats) {
                    $dats_count = count($dats);
                    if ($dats_count >= 1) {
                        $random = rand(0, $dats_count-1);
                        $data = $dats[$random];
                        $answer = $data['answer'];
                        if (strcasecmp($quest_low, "what is the time") == 0 || strcasecmp($quest_low, "time") == 0) {
                            $time = get_time();
                            //$cansa = str_replace("((time))", $time, $answer);
                            $cansa = $str = preg_replace('/[[{(].*[]})]/U' , $time, $answer);
                            echo json_encode(['status' => 1, 'reply' => $cansa]);
                            die();
                        }else{
                            echo json_encode(['status' => 1, 'reply' => $answer]);
                            die();
                        }
                    }
                }else {
                    echo json_encode(['status' => 1, 'reply' => "Sorry, I don't have a suitable response."]);
                    die();
                }
            }catch(PDOException $e){
                throw $e;
            }
        }
    }

    function bot_menu(){
        return  "Send <b>'time'</b> to get the time. \n
          Send <b>'about'</b> to know my version number. \n
          Send <b>'help'</b> or <b>'menu'</b> to see this again. \n
          To train me, send in this format => \n
          'train:question#answer' \n
          To get price for any cryptocurrency, send in this format \n
          <b>crypto:'cryptoname'</b>\n
          To clear the chat logs, just type <b>'cls'</b> or <b>'clear'</b>";
      }
    function getCryptoPrice($ticker){
        $url = "https://api.coinmarketcap.com/v1/ticker/".$ticker."/";
        $response = @file_get_contents($url); //the '@' is to surpress any errors if need be
        if (false === $response) {
            return "No value";
        }
        $resp = json_decode($response, true);
        $result = $resp[0]["price_usd"];
        return $result;
    }
    function get_time(){
        //instantiate date-time object
        $datetime = new DateTime();
        //set the timezone to Africa/Lagos
        $datetime->setTimezone(new DateTimeZone('Africa/lagos'));
        //format the time
        return $datetime->format('h:i A');
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
    background-color : dodgerblue;
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

    </style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">

<div class="columns-block container">
<div class="left-col-block blocks">
    <header class="header theiaStickySidebar">
        <div class="profile-img">
            <img src="<?php echo $result['image_filename']; ?>" class="img-responsive" alt=""/>
        </div>
        <div class="content">
            <h1>slack: @ <?php echo $result['username']; ?></h1>
            <span class="lead"><?php echo $result['name']; ?></span>

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
                <div class="card1">

                    <h2>CHATBOT</h2>

                    <div id="chatlogs">
                        <h2><p><span class="bot">Mikoloxtra: </span>Hello, how may i help you?</p></h2>
                    </div>

                    <div id="chatform">
                        <form id="contactForm" class="feedback-form">
                            <input id="input" type="text" placeholder="Type 'menu' to start" >
                            <button id="send" class="btn btn-primary" type="submit">SEND</button>
                        </form>
                    </div>
                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="../vendor/jquery/jquery.min.js"></script -->
        <script>
            $(function(){
                $('#form').submit(function(e){
                    e.preventDefault();
                    var holdiv = document.getElementById('chatlogs');
                    var quest = $('#input').val().trim();
                    $('#input').val("");
                    if(0 !== quest.length){
                        var inp = document.createElement('p');
                        inp.innerHTML = "<span class='user'>You: </span>"+ quest + "";
                        holdiv.appendChild(inp);
                        $('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
                        //to check if it includes about bot
                        if(quest.toLowerCase().includes("about") || quest.toLowerCase().includes("aboutbot")){
                            var inpi = document.createElement('p');
                            inpi.innerHTML = "<span class='bot'>mikoloxtra: </span> This is v1.8.0";
                            holdiv.appendChild(inpi);
                            $('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
                        }else if(quest.toLowerCase().includes("cls") || quest.toLowerCase().includes("clear")){
                            while(holdiv.firstChild){
                                holdiv.removeChild(holdiv.firstChild);
                            }
                            var inpi = document.createElement('p');
                            inpi.innerHTML = "<span class='bot'>mikoloxtra: </span> Hello, how may i help you?";
                            holdiv.appendChild(inpi);
                        }else{
                            $.ajax({
                                //url: "./mikoloxtra.php",
                                url: "/profiles/mikoloxtra.php",
                                type: "POST",
                                data: {question: quest},
                                success: function(resp){
                                    var response = jQuery.parseJSON(resp);
                                    //console.log(response.reply);
                                    if(response.status == 1){
                                        var inpi = document.createElement('p');
                                        inpi.innerHTML = "<span class='bot'>mikoloxtra: </span>" + response.reply + "";
                                        holdiv.appendChild(inpi);
                                        $('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
                                    }
                                },
                                error: function(error){
                                    console.log(error);
                                    var inpi = document.createElement('p');
                                    inpi.innerHTML = "<span class='bot'>mikoloxtra: </span> Unexpected Error Occured";
                                    holdiv.appendChild(inpi);
                                    $('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
                                }
                            });
                        }
                    }else {
                        var inp = document.createElement('p');
                        inp.innerHTML = "<span class='bot'>mikoloxtra: </span> No content";
                        holdiv.appendChild(inp);
                        $('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
                    }
                });
            });
        </script>
</body>
</html>
© 2018 GitHub, In

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Ajax call from chat
    $userMessage      = strtolower($_POST['message']);
    $aboutMeMessages  = ['about','about me','aboutme','aboutme?','about me ?' ];
    $isTrainingMode   =  (strpos($userMessage,'train')!==false) ? true : false ;
    $response         = "";
    //Check if message is about me
    if(in_array($userMessage,$aboutMeMessages)){
        $response    = "Oluwaseyi Bot V 1.0.0";
    }elseif($isTrainingMode){
        // train #q #ans
        $trainingData = explode("#",$userMessage);
        if(count($trainingData)==3){
            //Pattern train #question #answer followed
            $question = $trainingData[1];
            $answer   = $trainingData[2];
            //Save to DB
        }
        //print_r($trainingData);
    }else{
        //Check DB
        $response    = "Will Check DB for response";
    }
    echo $response;
    return;
}
//Fetch User Details
//include_once "../../../testing.php";
try {
    $query = "SELECT * FROM interns_data WHERE username ='OluwaseyiSam'";
    $resultSet = $conn->query($query);
    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $resultData['username'];
$fullName = $resultData['name'];
$picture = $resultData['image_filename'];

//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $resultData['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $resultData['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile | <?php echo $username;?> </title>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="../css/style2.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/learn.css" rel="stylesheet">
    <link href="../css/landing-page.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<style class="cp-pen-styles">
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        font-size: 16px;
        letter-spacing: 0.1px;
        color: #32465a;
        text-rendering: optimizeLegibility;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
        -webkit-font-smoothing: antialiased;
    }

    #frame {
        width: 95%;
        min-width: 360px;
        max-width: 1000px;
        height: 92vh;
        min-height: 300px;
        max-height: 720px;
        background: #E6EAEA;
    }
    @media screen and (max-width: 360px) {
        #frame {
            width: 100%;
            height: 100vh;
        }
    }
    #frame #sidepanel {
        float: left;
        min-width: 280px;
        max-width: 340px;
        width: 40%;
        height: 100%;
        background: #2c3e50;
        color: #f5f5f5;
        overflow: hidden;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel {
            width: 58px;
            min-width: 58px;
        }
    }
    #frame #sidepanel #profile {
        width: 80%;
        margin: 25px auto;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile {
            width: 100%;
            margin: 0 auto;
            padding: 5px 0 0 0;
            background: #32465a;
        }
    }
    #frame #sidepanel #profile.expanded .wrap {
        height: 210px;
        line-height: initial;
    }
    #frame #sidepanel #profile.expanded .wrap p {
        margin-top: 20px;
    }
    #frame #sidepanel #profile.expanded .wrap i.expand-button {
        -moz-transform: scaleY(-1);
        -o-transform: scaleY(-1);
        -webkit-transform: scaleY(-1);
        transform: scaleY(-1);
        -ms-filter: "FlipH";
    }
    #frame #sidepanel #profile .wrap {
        height: 60px;
        line-height: 60px;
        overflow: hidden;
        -moz-transition: 0.3s height ease;
        -o-transition: 0.3s height ease;
        -webkit-transition: 0.3s height ease;
        transition: 0.3s height ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap {
            height: 55px;
        }
    }
    #frame #sidepanel #profile .wrap img {
        width: 50px;
        border-radius: 50%;
        padding: 3px;
        border: 2px solid #e74c3c;
        height: auto;
        float: left;
        cursor: pointer;
        -moz-transition: 0.3s border ease;
        -o-transition: 0.3s border ease;
        -webkit-transition: 0.3s border ease;
        transition: 0.3s border ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap img {
            width: 40px;
            margin-left: 4px;
        }
    }
    #frame #sidepanel #profile .wrap img.online {
        border: 2px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap img.away {
        border: 2px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap img.busy {
        border: 2px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap img.offline {
        border: 2px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap p {
        float: left;
        margin-left: 15px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap p {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap i.expand-button {
        float: right;
        margin-top: 23px;
        font-size: 0.8em;
        cursor: pointer;
        color: #435f7a;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap i.expand-button {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap #status-options {
        position: absolute;
        opacity: 0;
        visibility: hidden;
        width: 150px;
        margin: 70px 0 0 0;
        border-radius: 6px;
        z-index: 99;
        line-height: initial;
        background: #435f7a;
        -moz-transition: 0.3s all ease;
        -o-transition: 0.3s all ease;
        -webkit-transition: 0.3s all ease;
        transition: 0.3s all ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options {
            width: 58px;
            margin-top: 57px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options.active {
        opacity: 1;
        visibility: visible;
        margin: 75px 0 0 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options.active {
            margin-top: 62px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 8px solid #435f7a;
        margin: -8px 0 0 24px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options:before {
            margin-left: 23px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul {
        overflow: hidden;
        border-radius: 6px;
    }
    #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 30px 18px;
        display: block;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li {
            padding: 15px 0 35px 22px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li:hover {
        background: #496886;
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 5px 0 0 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
            width: 14px;
            height: 14px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        content: '';
        position: absolute;
        width: 14px;
        height: 14px;
        margin: -3px 0 0 -3px;
        background: transparent;
        border-radius: 50%;
        z-index: 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
            height: 18px;
            width: 18px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li p {
        padding-left: 12px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li p {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
        background: #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
        border: 1px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
        background: #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
        border: 1px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
        background: #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
        border: 1px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
        background: #95a5a6;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
        border: 1px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap #expanded {
        padding: 100px 0 0 0;
        display: block;
        line-height: initial !important;
    }
    #frame #sidepanel #profile .wrap #expanded label {
        float: left;
        clear: both;
        margin: 0 8px 5px 0;
        padding: 5px 0;
    }
    #frame #sidepanel #profile .wrap #expanded input {
        border: none;
        margin-bottom: 6px;
        background: #32465a;
        border-radius: 3px;
        color: #f5f5f5;
        padding: 7px;
        width: calc(100% - 43px);
    }
    #frame #sidepanel #profile .wrap #expanded input:focus {
        outline: none;
        background: #435f7a;
    }
    #frame #sidepanel #search {
        border-top: 1px solid #32465a;
        border-bottom: 1px solid #32465a;
        font-weight: 300;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #search {
            display: none;
        }
    }
    #frame #sidepanel #search label {
        position: absolute;
        margin: 10px 0 0 20px;
    }
    #frame #sidepanel #search input {
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
        padding: 10px 0 10px 46px;
        width: calc(100% - 25px);
        border: none;
        background: #32465a;
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:focus {
        outline: none;
        background: #435f7a;
    }
    #frame #sidepanel #search input::-webkit-input-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input::-moz-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:-ms-input-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:-moz-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #contacts {
        height: calc(100% - 177px);
        overflow-y: scroll;
        overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts {
            height: calc(100%);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        #frame #sidepanel #contacts::-webkit-scrollbar {
            display: none;
        }
    }
    #frame #sidepanel #contacts.expanded {
        height: calc(100% - 334px);
    }
    #frame #sidepanel #contacts::-webkit-scrollbar {
        width: 8px;
        background: #2c3e50;
    }
    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
        background-color: #243140;
    }
    #frame #sidepanel #contacts ul li.contact {
        position: relative;
        padding: 10px 0 15px 0;
        font-size: 0.9em;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact {
            padding: 6px 0 46px 8px;
        }
    }
    #frame #sidepanel #contacts ul li.contact:hover {
        background: #32465a;
    }
    #frame #sidepanel #contacts ul li.contact.active {
        background: #32465a;
        border-right: 5px solid #435f7a;
    }
    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
        border: 2px solid #32465a !important;
    }
    #frame #sidepanel #contacts ul li.contact .wrap {
        width: 88%;
        margin: 0 auto;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 100%;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap span {
        position: absolute;
        left: 0;
        margin: -2px 0 0 -2px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #2c3e50;
        background: #95a5a6;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.online {
        background: #2ecc71;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.away {
        background: #f1c40f;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
        background: #e74c3c;
    }
    #frame #sidepanel #contacts ul li.contact .wrap img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap img {
            margin-right: 0px;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta {
        padding: 5px 0 0 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            display: none;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
        font-weight: 600;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
        margin: 5px 0 0 0;
        padding: 0 0 1px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        -moz-transition: 1s all ease;
        -o-transition: 1s all ease;
        -webkit-transition: 1s all ease;
        transition: 1s all ease;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
        position: initial;
        border-radius: initial;
        background: none;
        border: none;
        padding: 0 2px 0 0;
        margin: 0 0 0 1px;
        opacity: .5;
    }

    #frame .content {
        float: right;
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame .content {
            width: calc(100% - 58px);
            min-width: 300px !important;
        }
    }
    @media screen and (min-width: 900px) {
        #frame .content {
            width: calc(100% );
        }
    }
    #frame .content .contact-profile {
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: #007bff;
    }
    #frame .content .contact-profile img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin: 9px 12px 0 9px;
    }
    #frame .content .contact-profile p {
        float: left;
    }
    #frame .content .contact-profile .social-media {
        float: right;
    }
    #frame .content .contact-profile .social-media i {
        margin-left: 14px;
        cursor: pointer;
    }
    #frame .content .contact-profile .social-media i:nth-last-child(1) {
        margin-right: 20px;
    }
    #frame .content .contact-profile .social-media i:hover {
        color: #435f7a;
    }
    #frame .content .messages {
        height: auto;
        min-height: calc(100% - 93px);
        max-height: calc(100% - 93px);
        overflow-y: scroll;
        overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
        #frame .content .messages {
            max-height: calc(100% - 105px);
        }
    }
    #frame .content .messages::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }
    #frame .content .messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }
    #frame .content .messages ul li {
        display: inline-block;
        clear: both;
        float: left;
        margin: 15px 15px 5px 15px;
        width: calc(95% - 45px);
        font-size: 0.9em;
    }
    #frame .content .messages ul li:nth-last-child(1) {
        margin-bottom: 20px;
    }
    #frame .content .messages ul li.sent img {
        margin: 6px 8px 0 0;
    }
    #frame .content .messages ul li.sent p {
        background: #435f7a;
        color: #f5f5f5;
    }
    #frame .content .messages ul li.replies img {
        float: right;
        margin: 6px 0 0 8px;
    }
    #frame .content .messages ul li.replies p {
        background: #f5f5f5;
        float: right;
    }
    #frame .content .messages ul li img {
        width: 22px;
        border-radius: 50%;
        float: left;
    }
    #frame .content .messages ul li p {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
    }
    @media screen and (min-width: 735px) {
        #frame .content .messages ul li p {
            max-width: 300px;
        }
    }
    #frame .content .message-input {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 99;
    }
    #frame .content .message-input .wrap {
        position: relative;
    }
    #frame .content .message-input .wrap input {
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
        float: left;
        border: none;
        width: calc(100% - 90px);
        padding: 11px 32px 10px 8px;
        font-size: 0.8em;
        color: #32465a;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap input {
            padding: 15px 32px 16px 8px;
        }
    }
    #frame .content .message-input .wrap input:focus {
        outline: none;
    }
    #frame .content .message-input .wrap .attachment {
        position: absolute;
        right: 60px;
        z-index: 4;
        margin-top: 10px;
        font-size: 1.1em;
        color: #435f7a;
        opacity: .5;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap .attachment {
            margin-top: 17px;
            right: 65px;
        }
    }
    #frame .content .message-input .wrap .attachment:hover {
        opacity: 1;
    }
    #frame .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #32465a;
        color: #f5f5f5;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap button {
            padding: 16px 0;
        }
    }
    #frame .content .message-input .wrap button:hover {
        background: #435f7a;
    }
    #frame .content .message-input .wrap button:focus {
        outline: none;
    }
    /* Titles */
    h1, h2, h3, h4, h5, h6 {
        font-family: "Raleway";
        font-weight: 300;
        color: #333;
    }
    /* Paragraph & Typographic */
    p {
        line-height: 28px;
        margin-bottom: 25px;
    }
    .contact-details {
        text-align: center;
    }
    .contact-details i {
        padding: 5px 10px;
        color: white;
    }
    .contact-details a {
        color: white !important;
    }
    .about-details{
        text-align: center;
        font-size: 16px;
    }
    #intro{
        background: #007bff;
        padding-top: 60px;
        padding-bottom: 60px;
        color: white;
    }
    .contact-profile p {
        color: white ;
    }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/learn.php">Learn</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/listing.php">Interns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/testimonies.php">Testimonies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div id="section-topbar">
            <br>
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <img height='200' width='200' class='img-thumbnail img-circle img-responsive' src='<?php echo $picture; ?>' />
                        <h1><?php echo $fullName; ?></h1>
                        <h3>Web/Android Developer | Sheyilaaw98@gmail.com</h3>
                    </div><!--/.col-lg-12 -->
                </div><!--/.row -->
            </div><!--/.container -->

            <section id="about"></section>
            <div id="intro">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-1">
                            <h4 class='text-center'>ABOUT</h4>
                            <p class="about-details">I am a Web & Android developer with less than one year of professional experience.
                                I'm interested in all kinds of software development ,
                                but my major focus is on developing for Web & Mobile.
                                I also have skills in other fields like front end / icon design or system development.</p>
                        </div>
                        <div class="col-lg-6 col-lg-offset-1">
                            <h4 class='text-center'>CONTACT</h4>
                            <div class="contact-details">
                                <a><i class="fa fa-phone"></i>+2348175851897</a><br>
                                <a href="https://facebook.com/kvng.sheyi"><i class="fa fa-facebook"></i><?php echo $fullName; ?></a><br>
                                <a href="https://www.linkedin.com/in/oluwaseyi-adeogun-28bb48147/"><i class="fa fa-linkedin"></i><?php echo $fullName; ?></a><br>
                                <a href="https://github.com/Sheyilaaw"><i class="fa fa-github"></i>Sheyilaaw</a><br>
                            </div>
                        </div>
                    </div>

                </div><!--/.row -->
            </div><!--/.container -->
        </div><!--/ #intro -->
    </div>
    <div class="row" style="margin-bottom: 100px">
        <div id="frame" class="col-md-12" style="margin: 3% 5%">
            <div class="content">
                <div class="contact-profile">
                    <img src="<?php echo $picture; ?>" alt="" height="40px" />
                    <p style="padding: 10px"><?php echo $fullName; ?></p>
                </div>
                <div class="messages" >
                    <ul id="messages-list">
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>When you're backed against the wall, break the god damn thing down.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Excuses don't win championships.</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>Oh yeah, did Michael Jordan tell you that?</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>No, I told him that.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>What are your choices when someone puts a gun to your head?</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                        </li>
                    </ul>
                </div>
                <form action="" id="messageForm">
                    <div class="message-input">
                        <div class="wrap">
                            <input name="message" id="message" type="text" placeholder="Write your message..." />
                            <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                            <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script >
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    function newMessage() {
        var message = $(".message-input input").val();
        if ($.trim(message) == '') {
            return false;
        }
        $('<li class="sent"><img src="https://www.imaswmp.in/wp-content/uploads/default-avatar.jpg" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        $(".messages").animate({scrollTop: $(document).height()}, "fast");


        $.ajax({
            type:  "POST",
            url:   "OluwaseyiSam.php",
            data:  {
                message : message
            },
            success: function (message) {
                if(message!=''){
                    updateUI(message);
                }
            },
            error: function () {
            }
        });

    }
    function updateUI(message) {
        var messageResponse = '<li class="replies"><img height="22" width="22" src="<?php echo $picture; ?>" alt="" /> <p>'+message+'</p></li>';
        $("#messages-list").append(messageResponse);
    }


    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.which == 13) {
            newMessage();
            return false;
        }
    });

</script>
</body>

</html>

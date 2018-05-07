<!DOCTYPE html>
<?php
if(!isset($_GET['id'])){
    require '../db.php';
}else{
    require 'db.php';
}
try {
    $sql = 'SELECT * FROM secret_word LIMIT 1';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}
try {
    $sql = "SELECT * FROM interns_data WHERE `username` = 'ordooter' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Butu Ordooter" content="">

    <title>Butu Ordooter</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/ordooter.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<!-- Header -->
<section class="bg-secondary text-white text-center">
    <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png" alt="">
        <?php if (!empty($my_data)) { ?>
            <h1 class="text-uppercase mb-0"><?php echo ($my_data['name']); ?></h1>
        <?php } ?>
        <hr class="star-light">
        <h3 class="font-weight-light mb-0"><?php echo ("Web Developer -  DevOps Engineer - Backend Engineer"); ?></h3>
        <hr class="star-light">
        <h3 class="font-weight-light mb-0">My Current Date is: <?php echo date("D M d, Y G:i a"); ?></h3>
    </div>
</section>



<!-- About Section -->
<section class="bg-primary text-white mb-0">
    <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">Butu Ordooter is an experienced Professional In Information Communication Technology with a demonstrated history of working in the industry. Full Stack Web Developer skilled in DevOps, Software Development, </p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">System Administration, Ruby, PHP, Python, Scrum Agile, Web Technologies, Operating Systems, Blockchains, Cryptocurrencies and HTML. Strong entrepreneurship professional with a B.Sc. Computer Science from Benue State University, Makurdi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Chatbot Section -->
<div class="container">
    <div class="row pt-3">
        <div class="chat-main bg-white">
            <div class="col-md-12 chat-header rounded-top bg-success text-white">
                <div class="row">
                    <div class="col-md-6 username pl-2">
                        <i class="fa fa-circle text-primary" aria-hidden="true"></i>
                        <h6 class="m-0 show-chat-box">Let's Chat</h6>
                    </div>
                    <div class="col-md-6 options text-right pr-2">
                        <i class="fa fa-minus hide-chat-box" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="chat-content">
                <div class="col-md-12 chats border">
                    <ul class="p-0">
                        <li class="p-1 rounded mb-1">
                            <div class="receive-msg">
                                <img src="images/ordooter.png">
                                <div class="receive-msg-desc  text-center mt-1 ml-1 pl-2 pr-2">
                                    <p class="pl-2 pr-2 rounded">Hello! My name is Nguveren.</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-1 rounded mb-1">
                            <div class="receive-msg">
                                <div class="receive-msg-img">
                                    <img src="images/ordooter.png">
                                </div>
                                <div class="receive-msg-desc rounded text-center mt-1 ml-1 pl-2 pr-2">
                                    <p class="pl-2 pr-2 rounded">I can answer any questions you may have. Feel free to ask me anything, I mean anything</p>
                                </div>
                            </div>
                        </li>

                        <li class="p-1 rounded  mb-1">
                            <div class="receive-msg">
                                <img src="images/ordooter.png">
                                <div class="receive-msg-desc rounded text-center mt-1 ml-1 pl-2 pr-2">
                                    <p class="pl-2 pr-2 rounded">You can also train me using the Format "Train: Question#Answer#Password"</p>
                                </div>
                            </div>
                        </li>
                        <li class="pl-2 pr-2 bg-success rounded text-white text-center send-msg mb-1">
                            Text From User shows up here.
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 message-box border pl-2 pr-2 border-top-0">
                    <input name="chat-message" id="chat-message"type="text" class="pl-0 pr-0 w-100" placeholder="Type a message..." />
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<!-- Custom JS -->
<script src = "js/ordooter.js"></script>
</html>

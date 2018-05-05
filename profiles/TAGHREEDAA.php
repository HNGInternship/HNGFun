<?php
session_start();
//include "../answers.php";

function getmenu()
{
    return 'Main Menu: <ul><li>AboutBot</li><li>Time</li></ul>';
}

function getTime()
{
    return date("h:i:s a");
}

try {
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(!isset($conn)) {
            include '../config.php';
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        }

        if(isset($_POST['message']) && $_POST['message'] != '') {
            $question = trim($_POST['message']);

            switch (strtolower($question) ) {
                case 'aboutbot':
                    {
                        echo json_encode(['message' => 'TAGHREEDAA. Version: 1.0']);
                        break;

                    }
                case 'time':
                    {
                        echo json_encode(['message' => getTime()]);
                        break;

                    }
                case 'menu':
                    {
                        echo json_encode(['message' => getmenu()]);
                        break;

                    }
                case (explode(':',$question)[0] === 'train'):
                    {
                        $training_question = trim(explode('#',explode(':',$question)[1])[0]);
                        $training_answer = trim(explode('#',explode(':',$question)[1])[1]);
                        $training_password = trim(explode('#',explode(':',$question)[1])[2]);
                        if ($training_question != "" && $training_answer != "" && $training_password!= "")
                        {
                            try {

                                if($training_password === 'password')
                                {
                                    // do insert in the sql table
                                    $sql = $conn->prepare("insert into chatbot (question, answer) values (:question, :answer)");
                                    $sql->execute(array('question' => $training_question, 'answer' => $training_answer));
                                    echo json_encode(['message'=> '<div class="alert alert-success" role="alert">Trained Successfully</div>']);
                                }
                                else
                                {
                                    echo json_encode(['message'=> '<div class="alert alert-danger" role="alert">Incorrect Password!</div>']);
                                }
                                break;
                            }
                            catch (Exception $ex) {
                                var_dump($ex);
                            }
                        }
                        else
                        {
                            echo json_encode(['message' => "I can't understand it, you can train me using: <h3>train: question # answer # password</h3>" ]);
                            break;
                        }
                    }
                default:
                    {
                        try {
                            $q_length = strlen($question);
                            $question = ($question[$q_length - 1] == '?') ? substr($question, 0, $q_length - 1) : $question;

                            $sql = "select * from chatbot where question like '$question%'";

                            $query = $conn->prepare($sql);

                            $res = $query->execute();


                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $rowCount = $query->rowCount();
                            if($rowCount == 1) { // if one answer
                                echo json_encode(['message' => $results[0]->answer]);
                            }
                            else if($rowCount > 1) { // if multiple answers, select 1 randomly from the available
                                echo json_encode(['message' => $results[rand(0, $rowCount - 1)]->answer]);
                            }
                            else
                            {
                                echo json_encode(['message' => "I can't understand it, you can train me using: <h3>train: question # answer # password</h3>" ]);
                            }
                        }
                        catch (Exception $ex) {
                            var_dump($ex);
                        }
                    }
            }
            exit;
        }

    }
}
catch (Exception $exception)
{
    var_dump($exception);
}




$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];

$username = "TAGHREEDAA";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);
$name = $my_data['name'];
$src = $my_data['image_filename'];
$username =$my_data['username'];
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" id="bootstrap-css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container">
    <div class="row top-buffer">
        <div class="col-lg-6 col-sm-6">
            <div class="card hovercard">
                <div class="cardheader"></div>
                <div class="avatar">
                    <img alt="Taghreed Image" src="<?php echo $src; ?>">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#"><?php echo $name; ?></a>
                    </div>
                    <div class="desc">Backend Developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" rel="publisher"
                       href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                        <i class="fa fa-behance"></i>
                    </a>

                    <button class="open-chat"><i class="fa fa-comment">Show Bot</i></button>
                </div>

            </div>
        </div>
        <div class="chatbox hidden">
            <div class="chatlogs">
                <!--                <div class="chat friend">-->
                <!--                    <div class="user-photo"><img src="./images/guest-avatar.jpeg"></div>-->
                <!--                    <div class="chat-message">xxxxxxxxxx xxxxxxxxx xxxxxx</div>-->
                <!--                </div>-->

            </div>

            <div class="chat-form">
                <textarea id="usermsg" required></textarea>
                <button id="submitmsg"><i class="fa fa-paper-plane"></i></button>
            </div>

        </div>
    </div>

</div>




<style>


    .top-buffer {
        margin-top: 60px;
    }

    .card {
        padding-top: 20px;
        margin: 10px 0 20px 0;
        background-color: rgba(214, 224, 226, 0.2);
        border-top-width: 0;
        border-bottom-width: 2px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card .card-heading {
        padding: 0 20px;
        margin: 0;
    }

    .card .card-heading.simple {
        font-size: 20px;
        font-weight: 300;
        color: #777;
        border-bottom: 1px solid #e5e5e5;
    }

    .card .card-heading.image img {
        display: inline-block;
        width: 50px;
        height: 50px;
        margin-right: 15px;
        vertical-align: top;
        border: 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .card .card-heading.image .card-heading-header {
        display: inline-block;
        vertical-align: top;
    }

    .card .card-heading.image .card-heading-header h3 {
        margin: 0;
        font-size: 14px;
        line-height: 16px;
        color: #262626;
    }

    .card .card-heading.image .card-heading-header span {
        font-size: 12px;
        color: #999999;
    }

    .card .card-body {
        padding: 0 20px;
        margin-top: 20px;
    }

    .card .card-media {
        padding: 0 20px;
        margin: 0 -14px;
    }

    .card .card-media img {
        max-width: 100%;
        max-height: 100%;
    }

    .card .card-actions {
        min-height: 30px;
        padding: 0 20px 20px 20px;
        margin: 20px 0 0 0;
    }

    .card .card-comments {
        padding: 20px;
        margin: 0;
        background-color: #f8f8f8;
    }

    .card .card-comments .comments-collapse-toggle {
        padding: 0;
        margin: 0 20px 12px 20px;
    }

    .card .card-comments .comments-collapse-toggle a,
    .card .card-comments .comments-collapse-toggle span {
        padding-right: 5px;
        overflow: hidden;
        font-size: 12px;
        color: #999;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card-comments .media-heading {
        font-size: 13px;
        font-weight: bold;
    }

    .card.people {
        position: relative;
        display: inline-block;
        width: 170px;
        height: 300px;
        padding-top: 0;
        margin-left: 20px;
        overflow: hidden;
        vertical-align: top;
    }

    .card.people:first-child {
        margin-left: 0;
    }

    .card.people .card-top {
        position: absolute;
        top: 0;
        left: 0;
        display: inline-block;
        width: 170px;
        height: 150px;
        background-color: #ffffff;
    }

    .card.people .card-top.green {
        background-color: #53a93f;
    }

    .card.people .card-top.blue {
        background-color: #427fed;
    }

    .card.people .card-info {
        position: absolute;
        top: 150px;
        display: inline-block;
        width: 100%;
        height: 101px;
        overflow: hidden;
        background: #ffffff;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.people .card-info .title {
        display: block;
        margin: 8px 14px 0 14px;
        overflow: hidden;
        font-size: 16px;
        font-weight: bold;
        line-height: 18px;
        color: #404040;
    }

    .card.people .card-info .desc {
        display: block;
        margin: 8px 14px 0 14px;
        overflow: hidden;
        font-size: 12px;
        line-height: 16px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.people .card-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        display: inline-block;
        width: 100%;
        padding: 10px 20px;
        line-height: 29px;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.hovercard {
        position: relative;
        padding-top: 0;
        overflow: hidden;
        text-align: center;
        background-color: rgba(214, 224, 226, 0.2);
    }

    .card.hovercard .cardheader {
        background: url("http://res.cloudinary.com/taghreedaa/image/upload/v1525352063/nature-cover.jpg");
        background-size: cover;
        height: 150px;
    }

    .card.hovercard .avatar {
        position: relative;
        top: -50px;
        margin-bottom: -50px;
    }

    .card.hovercard .avatar img {
        width: 250px;
        height: 250px;
        max-width: 250px;
        max-height: 250px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255,255,255,0.5);
    }

    .card.hovercard .info {
        padding: 4px 8px 10px;
    }

    .card.hovercard .info .title {
        margin-bottom: 4px;
        font-size: 24px;
        line-height: 1;
        color: #262626;
        vertical-align: middle;
    }

    .card.hovercard .info .desc {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.hovercard .bottom {
        padding: 0 20px;
        margin-bottom: 17px;
    }

    .btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }

</style>

<style>
    .chatbox {
        float: right;
        width: 500px;
        min-width : 390px;
        height: 570px;
        background: rgba(51, 51, 51, 0.5);
        padding: 25px;
        margin: 20px auto;
        box-shadow: 0 3px #ccc;
        border-radius: 10px;

    }

    .chatlogs {
        padding: 10px;
        width: 100%;
        height: 450px;
        background: #eee;
        overflow-y: scroll;
        overflow-x: hidden;
        border-radius: 10px;
    }

    .chatlogs::-webkit-scrollbar {
        width: 10px;
    }

    .chatlogs::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: rgba(0,0,0,0.1);
    }

    .chat {
        display: flex;
        flex-flow: row wrap;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .chat .user-photo {
        width: 60px;
        height: 60px;
        background: #ccc;
        border-radius: 50%;
        overflow: hidden;
    }

    .chat .user-photo img{
        width: 100%;
    }

    .chat .chat-message {
        width: 80%;
        padding: 15px;
        margin: 5px 10px 0;
        /*background: #1ddced;*/
        border-radius: 10px;
        color: #fff;
        font-size: 20px;
    }

    .friend .chat-message {
        background: #0c779e;
    }


    .self .chat-message {
        background: #0eb2c1;
        order: -1;
    }

    .chat-form {
        margin-top: 20px;
        display: flex;
        align-items: flex-start;
    }

    .chat-form textarea{
        background: #fbfbfb;
        width: 90%;
        height: 50px;
        border: 2px solid #eee;
        border-radius: 3px;
        resize: none;
        padding: 10px;
        font-size: 18px;
        color: #595959;
        overflow-y: scroll;
        overflow-x: hidden;

    }

    .chat-form textarea::-webkit-scrollbar {
        width: 10px;
    }

    .chat-form textarea::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: rgba(0,0,0,0.1);
    }

    .chat-form textarea:focus{
        background: #fff;
    }

    .chat-form button {
        background: #0eb2c1;
        padding: 5px 15px;
        font-size: 27px;
        color: #fff;
        border: none;
        margin: 0 10px;
        border-radius: 3px;
        box-shadow: 0 3px 0 #0eb2c1;
        cursor: pointer;

        -webkit-transition: background .2s ease;
        -moz-transition: background .2s ease;
        -p-transition: background  .2s ease;

    }
    .open-chat {
        background: #0eb2c1;
        padding: 5px 15px;
        font-size: 27px;
        color: #fff;
        border: none;
        margin: 0 10px;
        border-radius: 3px;
        box-shadow: 0 3px 0 #0eb2c1;
        cursor: pointer;

        -webkit-transition: background .2s ease;
        -moz-transition: background .2s ease;
        -p-transition: background  .2s ease;
    }
    .chat-form button:hover {
        background: #13c8d9;
    }

</style>

<script>


    $(document).ready(function () {
        var firstLoad = true;

        $('.open-chat').click(function(){
        $('.chatbox').toggleClass('hidden');
        if (firstLoad === true && $('.chatbox').hasClass('hidden') === false) {
            firstLoad = false;
                    var message1 = window.setTimeout(function(){
                        var default_message = '<div class="chat self"><div class="user-photo"><img alt="Taghreed Image" src="<?php echo $src; ?>"></div> <div class="chat-message">Hello I\'m TAGHREEDAA, <br> I\'m here to help you choose an option from the menu. :)</div> </div>';
                        $('.chatlogs').append(default_message);
                        playMessageSound();
                        window.clearTimeout(message1);
                    }, 1000);


                var menu = window.setTimeout(function(){
                    var menu_message ='<div class="chat self"> <div class="user-photo"><img alt="Taghreed Image" src="<?php echo $src; ?>"></div> <div class="chat-message">Main Menu: <ul> <li>AboutBot</li> <li>Time</li> </ul> </div> </div>';
                    $('.chatlogs').append(menu_message);
                    playMessageSound();
                    window.clearTimeout(menu);
                }, 2000);
            }
        });
    });

    function playMessageSound() {
        var aSound = document.createElement('audio');
        aSound.setAttribute('src', 'http://res.cloudinary.com/taghreedaa/video/upload/v1525350931/sound/facebook_tone.mp3');
        // aSound.setAttribute('autoplay', 'true');
        aSound.play();

    }
    //If user submits the form
    $("#usermsg").keypress(function(e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            $("#submitmsg").click();
        }
        if (e.keyCode == 38 && !e.shiftKey) {
            // get the last message chat friend and put it into the textarea
            $('#usermsg').val($('.chatlogs').children('.friend').last()[0].innerText);
        }
    });

    $("#submitmsg").click(function() {
        var clientmsg = $("#usermsg").val().trim();

        if (clientmsg != '') {
            var msg='<div class="chat friend"><div class="user-photo"><img src="http://res.cloudinary.com/taghreedaa/image/upload/v1525351717/guest-avatar.jpg"></div> <div class="chat-message">'+
                clientmsg.replace(/\n/g, '<br />') +
                '</div></div>';

            $('.chatlogs').append(msg);
            $('#usermsg').val('').focus();
            $('#usermsg').animate({scrollTop: $('#usermsg').height});

            $.ajax({
                url: 'profiles/TAGHREEDAA.php',
                type: 'post',
                dataType: 'json',
                data: {message: clientmsg},
                success: function(response){
                    var received_message = '<div class="chat self"><div class="user-photo"><img alt="Taghreed Image" src="<?php echo $src; ?>"></div> <div class="chat-message">'+
                        response.message
                        +'</div></div>';

                    $('.chatlogs').append(received_message);
                    playMessageSound();

                    var height = 0;
                    $('.chatlogs .chat').each(function(i, value){
                        height += parseInt($(this).height());
                    });

                    height += '';

                    $('.chatlogs').animate({scrollTop: height});
                }
            });
        }

        return false;
    });
</script>

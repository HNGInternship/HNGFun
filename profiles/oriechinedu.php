<?php 
    date_default_timezone_set('Africa/Lagos');

        if (!defined('DB_USER')){
            
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }

           global $conn;

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
            $sql = "SELECT * FROM interns_data WHERE `username` = 'oriechinedu' LIMIT 1";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $my_data = $q->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
    
    if ($_SERVER['REQUEST_METHOD']==="POST") {

        $q = $_POST['chat_message'];

        $q = trim(htmlspecialchars($q));
        $q = trim($q, "?");

        if (empty($q)){

            echo json_encode(['status'=>0]); //status =0 means, user submitted empty string
       }
           
            //check if it's a trainer
           $first_test_str = explode(':', $q);
           if ($first_test_str[0]== 'train'){

                $password = 'password';

                $second_test_str = explode('#', $first_test_str[1]);

                if (! count($second_test_str) < 3 && trim($password)===trim($second_test_str[2])){

                    if(trim($second_test_str[0]) !='' && trim($second_test_str[1] != '')){

                        $question = $second_test_str[0];
                        $ans = $second_test_str[1];
                        
                        //check if question or answer already exists
                            
                            $sql = "SELECT * FROM chatbot WHERE question LIKE :question OR answer LIKE :ans";
                            $stm = $conn->prepare($sql);
                            $stm->bindParam(':question', $question);
                            $stm->bindParam(':ans', $ans);
                            $stm->execute();
                 
                            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
                            $res = $stm->fetchAll();

                            if ($res){
                                echo json_encode(['status'=>4, 'response'=>'Were you thinking I am that dull not to know that <code>'.$res[0]['question']. '</code> simply require <code>'. $res[0]['answer'].'</code> as the answer? <code>Could you please ask something more challenging or teach me something serious?</code>']);
                            }
                            
                            //if it's a new question, save into db
                            else{

                                $sql = "INSERT INTO chatbot(question, answer)
                                        VALUES(:quest, :ans)";
                                $stm =$conn->prepare($sql);
                                $stm->bindParam(':quest', $question);
                                $stm->bindParam(':ans', $ans);

                                $saved = $stm->execute();
                                if ($saved){

                                    echo json_encode(['status'=>1, 'answer'=>'Thanks for helping me learn']);
                                }
                                else {
                                    echo json_encode(['status'=>3, 'response'=>'Opps could not understand because of my small brain, please kinly repeat']);
                                }
                            }
                    }
                    else{
                          echo json_encode(['status'=>3, 'response'=>'Opps, Invalid training format']);
                        }
                
                
                }        
                    else{
                    echo json_encode(['status'=>3, 'response'=>'Oops you are not authorized to train me']);
                }
           }
           else {
                    
                 $query = "$q";
                $sql = "SELECT * FROM chatbot WHERE question LIKE :question";
                $statement = $conn->prepare($sql);
                $statement->bindParam(':question', $query);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                $result = $statement->fetchAll();
                if ($result) {
                    
                    $answer_index = rand(0, (count($result)-1));
                        $answer = $result[$answer_index]['answer'];

                        echo json_encode(['status'=>1, 'answer'=>$answer]);
                }
                else{
                    echo json_encode(['status'=>2]);//status=2 means, question does not exist
                }
        }
        
    }else{

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title><?= $my_data['name'] ?></title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- Custom fonts for this template -->
            <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <style>
        .col-md-2,
        .col-md-10 {
            padding: 0;
        }
        
        .panel {
            margin-bottom: 0px;
        }
        
        .chat-window .card{
            width: 100%;
         margin: 0 auto; 
        }
        .chat-window.col-xs-12 {
            left: 10px;
        } 
         
        .chat-window>div>.panel {
            border-radius: 5px 5px 0 0;
        }
        
        .icon_minim {
            padding: 2px 10px;
        }
        
        .msg_container_base {
            background: #e5e5e5;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px 10px;
            max-height: 350px;
            overflow-x: hidden;
        }
        /* .msg_container{
            width:100%;
        } */
        .top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative; 
             overflow: hidden;
        }
        
        .msg_receive {
            padding-left: 0;
            margin-left: 0;
            background: #666 !important;
            color: #FFF;
        }
        
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
            
        }
        
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        
        .messages>p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
            overflow-wrap: break-word;
        }
        
        .messages>time {
            font-size: 11px;
            color: #ccc;
        }
        
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        
        .base_receive>.avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }
        
        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
            
        }
        
        .base_sent>.avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close } .msg_sent > time{
            float: right;
        }
        
        .msg_container_base::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }
        
        .msg_container_base::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }
        
        .msg_container_base::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }

        .profile{

           border-radius: 20px;
            max-width: 90%;
            margin: 0 auto;
            box-shadow: inset 0 0 25px #246476;
            margin-bottom: 50px;

        }

        .iconn:hover{
            color: #00AEFF !important;
        }
        .icon-container{
            padding: 20px;
        }
        .connect{

            color:red !important;
            padding: 10px 0;
        }
        
        #intro{
            padding: 0 20px;
        }
     
            </style>
        </head>
            <body>
                <div class="container" style="margin: 100px auto">
                    <section class="text-dark text-center">
                        <div class="row">
                            <div class="col-lg-8 col-sm|md|xs-12">
                                <div class="profile"> 
                                    <div class="text-center">
                                        <img src="<?= "https://res.cloudinary.com/drjpxke9z/image/upload/c_scale,e_auto_saturation,h_1300,q_auto:best/v1523623738/oriechinedu_ihubdk.png"?>" class="rounded-circle" alt="orie chinedu" width="200px" height="200px">
                                    </div>
                                    <h1 >Hey! <small>this is</small> <?= 'Orie Chinedu' ?></h1> 
                                    <p id="intro" style="margin-bottom: 50px; text-shadow: 2px 2px 2px #fff; color: dark;">I am a Web Developer. Proficient in HTML, CSS, JAVASCRIPT,
                                        PHP/LARAVEL/VUEJS. A little of Python/Django. I also write technical articles on medium. I am a volunteer coach at Djangogirls.org and generally a tech lover</p>
                                        
                                    
                                        <h2 class="text-dark connect">Let's Get Connected</h2><hr>
                                  
                                    <div class="row icon-container" >
                                        <div class="offset-md-1 col-md-10 offset-xs-1 col-xs-10">
                                            <div class="d-inline">
                                                <a href="https://slack.com/hnginternship4/@oriechinedu"><span class="fa fa-slack iconn" style="color: #000; font-size: 48px;"></span></a>
                                            </div>
                                            <div class="d-inline">
                                                <a href="https://facebook.com/orie.chinedu"><span class="fa fa-facebook iconn" style="color: #000;font-size: 48px;"></span></a>
                                            </div>
                                            <div class="d-inline">
                                                <a href="https://medium.com/@oriechinedu"><span class="fa fa-medium iconn" style="color: #000; font-size: 48px;"></span></a>
                                            </div>
                                            <div class="d-inline">
                                                <a href="https://twitter.com/@orie.chinedu"><span class="fa fa-twitter iconn" style="color: #000; font-size: 48px;"></span></a>
                                            </div>
                                            <div class="d-inline">
                                                <a href="https://linkedin.com/in/chinedu-emmanuel-orie-b8484b147/"><span class="fa fa-linkedin iconn" style="color: #000; font-size: 48px;"></span></a>
                                            </div>
                                            <div class="d-inline">
                                                <a href="https://github.com/oiechinedu"><span class="fa fa-github iconn" style="color: #000; font-size: 48px;"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm|md|xs-10">
                                <div class="row chat-window" id="chat_window_1">
                                    <div class="card">
                                        <div class="row card-header top-bar">
                                            <div class="col-md-8 col-xs-8">
                                                <h3><span class="fa fa-comment"></span>ChatBot</h3>   
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <a href="#"><span id="minim_chat_window" class="fa fa-minus icon_minim"></span></a>
                                                <a href="#"><span class="fa fa-remove icon_close" data-id="chat_window_1"></span></a>
                                            </div>
                                        </div>
                                        <div class="card-body  msg_container_base">
                        
                                            <div class="row msg_container base_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="messages msg_sent">
                                                        <p><code>Hello, I am a bot, I am smart but you can make me smarter, I am always willing to learn</code></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>
                                            <div class="row msg_container base_sent">
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="messages msg_sent">
                                                        <p><code>To teach me, package your lesson in the format below</code></p>
                                                        <p><code>train:your question#your answer#password</code></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2"></div>
                                            </div>

                                        </div>   <!-- message form -->
                                        <div class="card-footer message-div">
                                            <form action="" id="chat-form" method="post">
                                                <div class="input-group mb-3">
                                                    <input class="form-control message chat_input" name="chat_message" aria-label="With input" placeholder="Let's Chat  Now...">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-sm send-message" id="btn-chat"><i class="fa fa-send-o"></i></button>                                                                                 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        <div >
                    </section>
                </div>

                    <script>
                        $('document').ready(function() {

                            $("body").css("opacity", 0).animate({ opacity: 1}, 3000);


                            $('#chat-form').submit(function(e) {
                                e.preventDefault();
                            
                                var message = $('.message').val();
                                var msg_container = $('.msg_container_base');

                                let bot_msg =  (answer)=>{

                                            return   '<div class="row msg_container base_sent">'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_sent">'+
                                                                    '<p>'+answer+'</p>'+
                                                                '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-2 col-xs-2 avatar">'+
                                                                '<img src="" class="bot-img img-responsive" title="">'+
                                                            '</div>'+
                                                        '</div>';
                                }

                            let sent_msg =    (msg)=>{

                                              return   '<div class="row msg_container base_receive">'+
                                                            '<div class="col-md-2 col-xs-2 avatar"></div>'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_receive">'+
                                                                    '<p>'+msg+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>';
                            }
                                       
                                       if (message != ''){

                                           if (message.split(':')[0] !='train' && message != "aboutbot"){
                                                msg_container.append(sent_msg(message));
                                                msg_container.scrollTop(msg_container[0].scrollHeight);
                                           }
                                       }

                                       if (message == "aboutbot"){
                                            msg_container.append(bot_msg('<code>Glad you want to learn about me. Well I am HNGsoftBot version 4.0. I wouldn\'t have existed if not the HNGInternship 4.0</code>'));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                             $('.message').val('');
                                            return;
                                       }
                                        // msg_container.append(bot_msg);
                                       
                            

                               

                                // alert(message);
                                $.ajax({
                                    type: 'POST',
                                    url: '/profiles/oriechinedu.php',
                                    dataType: 'json',
                                    data: {chat_message: message},
                                    success: function(data) {
                                        //console.log(data);
                                        if (data.status===1){

                                           $('.message').val('');
                                             msg_container.append(bot_msg(data.answer));  
                                             msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===2){
                                            $('.message').val('');
                                            msg_container.append(bot_msg('Oga I no know this one, abeg try again'));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===0){
                                            msg_container.append(bot_msg('Opps what do you really expect from me with empty question?'))
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===3){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===4){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===5){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        
                                    },
                                    error: function(error) {
                                    
                                        console.log(error);
                                    
                                        if (error) {
                                            
                                            $('.message-div').addClass('has-danger');
                                        }
                                    },
                                });
                            });

                            $(document).on('click', '.card-header span.icon_minim', function(e) {
                                var $this = $(this);
                                if (!$this.hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideUp();
                                    $this.addClass('card-collapsed');
                                    $this.removeClass('fa-minus').addClass('fa-plus');
                                } else {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $this.removeClass('card-collapsed');
                                    $this.removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('focus', '.card-footer input.chat_input', function(e) {
                                var $this = $(this);
                                if ($('#minim_chat_window').hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $('#minim_chat_window').removeClass('card-collapsed');
                                    $('#minim_chat_window').removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('click', '.icon_close', function(e) { //$(this).parent().parent().parent().parent().remove();
                                $("#chat_window_1").remove();
                            });
                });

                    </script>
            </body>
        </html>

<?php 
	}
?>
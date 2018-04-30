<?php    
    global $conn;
    if(!defined('DB_USER')){
      require "../../config.php";   
      try {
          $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $e) {
         throw $e;
      }
    }
    try{
     $sql = 'SELECT * FROM interns_data WHERE username="Epospiky"';
      $query = $conn->query($sql);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $result1 = $query->fetch();    }
      catch (PDOException $e){
          throw $e;         
      }
         
      try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }

    $secret_word = $data['secret_word'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     #require "../answers.php";
    # require_once '../db.php';
    # User input
     $user_data = $_POST['input'];
    if (strpos($user_data, 'train') !==false) {
      $input_val = explode(':', $user_data, 2);
      $key_iput = $input_val[0];  #locate the input as the 1st value in the array 
      $key_iput = strtolower($key_iput);  #force it to lowercase
      $key_iput = preg_replace('/\s+/', '', $key_iput);   #remove whitespace

        train($input_val[1]);
    } 


 

function train($data){
         $data =  explode('#', $input_val[1],3);
          $question = trim($data[0]);
          $answer = trim($data[1]);
          $password = trim($data[2]);

          if ($password === 'password') {
             try {
                $queryChatBot = 'SELECT * FROM chatbot';
                $result = $conn->query($queryChatBot);
                $resultdata = $result->fetch(PDO::FETCH_ASSOC);
               
             } catch (PDOException $e) {
              throw $e;
               
             }
             if (empty($user_data)) {
               $train_info  = array(':question' => $question, ':answer' => $answer );
               $sql = 'INSERT INTO chatbot (question, password) VALUES (:question, :answer);';
               echo "Thank for your help. Now i'm smarter";
             } else {
               echo "I already understand this. Please try something new";
             }
             

          } else {
            echo "Sorry. Seems you are trying to train me with an unauthorised password.";# code...
          }
          


}
    
}
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Epospiky's Portfolio </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- link to main stylesheet -->
       <link rel="stylesheet" type="text/css" href="/css/main.css">

       <link rel="stylesheet" type="text/css" href="https://static.oracle.com/cdn/jet/v4.1.0/default/css/alta/oj-alta-min.css">
       <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v4.1.0/3rdparty/require/require.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
      <script src="../vendor/jquery/jquery.min.js"></script>
        <style>

        ul.navi {
        list-style-type: none;
        margin: 0;

        }

        .navi li a {
        display: block;
        font-size: 20px;
        color: #000;
        padding: 0px;
        text-decoration: none;
          }
        /* Change the link color on hover */
       .nav-right{
        border: 0px!important;
       }
       .user h3{
        font-size: 30px;
        color:blue;
        font-weight: bolder;
        font-family: 'as destine';
        cursor: pointer;
        text-align: center;
       }
       .user h3:hover{
          color: black;
       }
       .content{
        background-color: #C0C0C0;
        border-radius: 100px 0px;
        width: 500px;
        border: 1px solid black;
        padding: 50px;
        margin-top: 20px;
        margin-bottom: 20px;
        box-shadow: -5px 0px 3px #000, 0px 5px 3px #000;
       }
       .img-grid img{
        border-radius: 50%;
        border: 2px solid black;
        text-align: center;
       }
       .skill{
        padding-top: 30px;
        padding-right: 20px;
       }
       .skill p {
        text-align: center;
       }
      /*--.about-grids {
        margin-top: 60px;
      }
      .about {
        background:#76b852;
        padding: 80px 0;
      }
      .about-info h3 {
        font-family: 'Jockey One', sans-serif;
        margin: 0;
        color:#323b43;
        font-size: 44px;
        text-align: center;
        font-weight: 400;
      }
      .about-info h4 {
        text-align: center;
        font-size: 17px;
        color:#d9ffc4;
        font-weight: 600;
        margin: 10px 0 16px 0;
        font-style: italic;
      }
      .about-info p {
        text-align: center;
        font-size: 14px;
        color: #fff;
        width: 71%;
        margin: 0 auto;
        line-height: 1.8em;
      }
      .about-grid h4{
        font-family: 'Jockey One', sans-serif;
        text-align: center;
        color: #d9ffc4;
        font-size: 24px;
        text-transform: uppercase;
      }
      .about-grid p{
        text-align: center;
        color: #fff;
        font-size: 14px;
        line-height: 1.8em;
        padding: 2em 0 0 0;
      }
      .our-skills{
      background:#323b43;
      padding:80px 0px 80px 0px !important;

      }
      .circles-text-wrp {
        font-size: 30px;
        color: #fff;
        font-weight: 300;
        }
      /*--- //circles 
      .skill-grids {
        margin-top: 60px;
      }
      .skills-grid p{
        margin: 34px 0 0 0;
        font-size: 22px;
        color: #ced7df;
        }
      .skill-info h2{
      font-family: 'Jockey One', sans-serif;
        margin: 0;
        color: #ced7df;
        font-size: 44px;
        text-align:center;
        font-weight:400;
        }
      .contact{
        padding:20px 0px 10px 0px !important;
        text-align: center;
        background-color: #ccc000;
      }
      .contact-grids{
        width: 200px;
         margin: 0 auto;
      }--*/
      .logo{
        padding-top: 30px;
        width: 40px;
        margin: 10px;
        transition: all 600ms;
      }
      .logo ul{
        list-style-type: none;
         display: block;
         text-decoration: none;
      }
      .logo li {
        display: block;
        text-decoration: none;
      }



      .logo:hover{
        transform: scale(1.3, 1.3);
      }
    .chat {
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      overflow-y:absolute;
      padding: 0 35px 35px;
      border: none;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
      max-height: 300px;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      -webkit-flex-direction: column;
      flex-direction: column;
    }
    .chat p.san{
      float: left;
        font-size: 14px;
        padding: 20px;
        border-radius: 0px 50px 50px 50px;
        background-color: #f8f000;
        max-width: 250px;
        clear: both;
        display: inline-block;
        margin-bottom: 0px !important;
        margin-top: 2px !important;
    }
    .chat p.me{
      float: right;
        font-size: 14px;
        padding: 20px;
        border-radius: 50px 0px 50px 50px;
        background-color: #b8b000;
       max-width: 250px;
       clear: both;
       margin-bottom: 0px !important;
       margin-top: 2px !important;
    }


        .input {
          padding: 0 35px 35px;
          height: 50px;
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .chat-btn{
          position: fixed;
           border-radius: 6px;
           cursor: pointer;
           z-index: 1;
           bottom: 0;
           right: 0;
           color: #fff;
           background-color: blue;
           transition: all 0.5s;
        }
        .chat-btn:hover{
          color: #000;
          background-color: #6bcfcf;
        }
    </style>
  </head>
  <body class="oj-web-applayout-body">
    <?php
     

      $name = $result1['name'];
      $user = $result1['username'];
      $image = $result1['image_filename'];
    ?>
<div class="container oj-web-applayout-page">
 <div class="content oj-web-applayout-max-width oj-web-applayout-content">
  <div class="img-grid  oj-flex  oj-sm-12 oj-lg-offset-6">
    <div class="oj-sm-3"></div>
    <div class="oj-flex-item oj-sm-9">
      <img src="http://res.cloudinary.com/epospiky/image/upload/v1523739075/epo.png" class="oj-sm-center img-responsive" height="250px">
    </div>
  </div>

  <div class="user">
      <h3 ><?php echo $name;?></h3>
  </div>
  <div class="skills_grid oj-flex oj-sm-12">
    <div class="skill oj-flex-item oj-sm-4">
      <p>FrontEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 80%;"> 
            <span class="">80%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>BackEnd</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 60%;"> 
            <span class="">60%</span> 
            </div>
        </div>
    </div>
    <div class="skill oj-flex-item oj-sm-4">
      <p>UI</p>
       <div class="progress progress-striped active"> 
            <div class="progress-bar progress-bar-success" role="progressbar"  
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"  
                style="width: 50%;"> 
            <span class="">50%</span> 
            </div>
        </div>
    </div>
    <div class="log0">
      <ul class="oj-flex navi">
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.twitter.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768461/twitter.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.github.com/epospiky" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768442/githublogo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://www.linkedin.com/in/ernest-paul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768390/linkedin_logo.png"></a>
        </li>
        <li Class="oj-flex-item oj-sm-3">
          <a href="https://plus.google.com/+ErnestPaul" target="_blank"><img class="logo" src="http://res.cloudinary.com/epospiky/image/upload/v1524768412/google_plus.png"></a>
        </li>
      </ul> 
    </div>
  </div>
  
 </div>
  <!--end of contact-->
    <button class="btn chat-btn" data-toggle='modal' data-target='#chatmodal'><i class="fa fa-comment-alt">Chat</i></button>
    <!--modal-->

        <div class="modal-content-">
          <div class="modal-header">
            <h5 class="modal-title" id="chatModalLabel"><i class="fa fa-user"></i>Santra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body " >
            <div class="chat" id="chat">
              <p class="san">Hi there. I'm Santra.</p>
              <p class="san">You can train me using this command format <b>train: the question # the answer #authorised password</b> 
                or Type <b>help</b> to begin with</p>   


            </div>
          </div>  
          <div class="clearfix"></div> 
            <form class="input " id="bot-input">
              <div class="input-group">
                 <input class="form-control" id="txt-input" type="text" name="input" required="" placeholder="Chat me up..." />
               <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> </button>
              </span>
              </div>
            </form>
        </div>

    <!--end of modal-->
    </div>

      <script>
      var chatArea = $('#chat');
      $("#bot-input").on("submit", function(e){
        e.preventDefault();
        var message = $("txt-input").val();
        chatArea.append(`<div class='bot-message'><div class=''>${message}</div></div>`);
        $.ajax({
          url:"epospiky.php",
          type: 'POST',
          data: '#txt-input='+message,
          datatype: 'json'
          success: function(response){
            var output = $($.parseHTML(response)).find("#output").text();
            setTimeout(function() {
                    outputArea.append("<div class=''><div class=''>" + output + "</div></div>");
                    $('#chat').animate({
                        scrollTop: $('#chat').get(0).scrollHeight
                    }, 1500);
                },, 10);
          }
        });
      
      });
        
      </script>

  </body>
</html>

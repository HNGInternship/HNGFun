<?php
try {
    $sql = 'SELECT * FROM secret_word';
    $q   = $conn->query( $sql );
    $q->setFetchMode( PDO::FETCH_ASSOC );
    $data = $q->fetch();
}
catch ( PDOException $e ) {
    throw $e;
}
$secret_word = $data[ 'secret_word' ];
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $data  = $_POST[ 'user-input' ];
    $temp  = explode( ':', $data );
    $temp2 = preg_replace( '/\s+/', '', $temp[ 0 ] );
    if ( $temp2 === 'train' ) {
        train( $temp[ 1 ] );
    } elseif ( $temp2 === 'aboutbot' ) {
        aboutbot();
    } else {
        getAnswer( $temp[ 0 ] );
    }
}
function aboutbot( ) {
    echo "<div id='result'>v1.0</div>";
}
function train( $input ) {
    $input    = explode( '#', $input );
    $question = trim( $input[ 0 ] );
    $answer   = trim( $input[ 1 ] );
    $password = trim( $input[ 2 ] );
    if ( $password == 'password' ) {
        $sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '" and answer = "' . $answer . '" LIMIT 1';
        $q   = $GLOBALS[ 'conn' ]->query( $sql );
        $q->setFetchMode( PDO::FETCH_ASSOC );
        $data = $q->fetch();
        if ( empty( $data ) ) {
            $training_data = array(
                 ':question' => $question,
                ':answer' => $answer 
            );
            $sql           = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';
            try {
                $q = $GLOBALS[ 'conn' ]->prepare( $sql );
                if ( $q->execute( $training_data ) == true ) {
                    echo "<div id='result'>Training Successful!</div>";
                }
            }
            catch ( PDOException $e ) {
                throw $e;
            }
        } else {
            echo "<div id='result'>Teach me something new!</div>";
        }
    } else {
        echo "<div id='result'>Invalid Password, Try Again!</div>";
    }
}
function getAnswer( $input ) {
    $question = $input;
    $sql      = 'SELECT * FROM chatbot WHERE question = "' . $question . '"';
    $q        = $GLOBALS[ 'conn' ]->query( $sql );
    $q->setFetchMode( PDO::FETCH_ASSOC );
    $data = $q->fetchAll();
    if ( empty( $data ) ) {
        echo "<div id='result'>Sorry, 'train: question # answer # password'</div>";
    } else {
        $rand_keys = array_rand( $data );
        echo "<div id='result'>" . $data[ $rand_keys ][ 'answer' ] . "</div>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml" xml:lang=
"en-us">
  <head>
    <title>
      Oracle JET Starter Template - Web Blank
    </title>
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content=
    "text/html; charset=utf-8" />
    <meta name="viewport" content=
    "viewport-fit=cover, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-title" content="Oracle JET" />
    <!-- injector:theme -->
    <link href=
    'https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css'
    rel='stylesheet' type="text/css" />
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"
    type="text/javascript">
</script>
<!-- RequireJS bootstrap file -->
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
    <style type="text/css">
                .chat-output > div {
    display: inline-block;
    width: 100%;
}
            .chat-output {
                 display: block;
    overflow-y: scroll;
    height: 100%;
    }
        .oj-flex {
    background-color: #007bff;
}
        .container {
    max-width: 100% !important;
                padding: 0;
}
   #user-input-form {
        width: 100%;
    position: fixed;
    bottom: 0;
    height: 6%;
}
        img {
    display: block;
    margin: 0 auto;
    border-radius: 100%;
    box-shadow: 0 0 0 1.5em #ffffff;
    border: 0;
}
          input#user-input.user-input {
    width: 50%;
    border: none;
    padding: 10px 14px;
    font-size: 18px;
    line-height: normal;
    position: fixed;
    right: 0px;
    bottom: 0px;
    box-shadow: rgb(1, 1, 1) 1px 1px 9px 0px;
}
.blue1 {
    width: 50%;
    position: fixed;
    left: 0;
    /* background-color: #007bff; */
    height: 100%;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    top: 30%;
    /* transform: translate(0, 40%); */
}
.white2 {
    width: 50%;
    background-color: #ffffff;
    width: 50%;
    position: fixed;
    right: 0;
    background-color: #007bff;
    height: 100%;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    /* transform: translate(0, 40%); */
}
      footer {
      display: none;
      }
        
                .bot-message {
    float: right;
    font-size: 16px;
    background-color: #ffffff;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 15px 1px 1px 0px;
    }
        p {
    font-weight: bolder;
}
                  .user-message message {
                    float: left;
    font-size: 16px;
    background-color: #ffffff;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
            
                      
            }
    .message {
                    float: left;
    font-size: 16px;
    background-color: #ffffff;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
            
                      
            }
    </style>
  </head>
  <body>
<div class="oj-sm-flex-direction-column oj-flex oj-flex-item">
  <div class="oj-flex-item blue1">
    <span class="avatar"><img src="https://res.cloudinary.com/dekstar-incorporated/image/upload/v1523701221/avatar.png" alt="" /></span>
    <h1>Dennis Otugo</h1>
    <p>Human Being | Cyborg | Never asked for this</p>
  </div>
  <div class="oj-flex-item white2">
    <div class="chat-output" id="chat-output">
        <div class="user-message"></div>
        <div class="message">train: question # answer # password</div>
        <div class="chat-input">
            <form action="" method="post" id="user-input-form" name="user-input-form"></div>
            <input type="text" name="user-input" id="user-input" class="user-input" placeholder="Enter Text here" /></form></div>
  </div>
</div></div>
</script>
     <script>
//<![CDATA[
    var outputArea = $("#chat-output");

    $("#user-input-form").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(`<div class='bot-message'><div><div class='message'>${message}<\/div><\/div><\/div>`);


        $.ajax({
            url: 'profile.php?id=dennisotugo',
            type: 'POST',
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='user-message'<div><div><div class='message'>" + result + "<\/div><\/div><\/div>");
                    $('#chat-output').animate({
                        scrollTop: $('#chat-output').get(0).scrollHeight
                    }, 1500);
                }, 250);
            }
        });


        $("#user-input").val("");

    });
    //]]>
    </script>
  </body>
</html>

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
    'https://fonts.googleapis.com/css?family=Alegreya|Allura|Almendra%20SC|Romanesco|Source+Sans+Pro:400,700'
    rel='stylesheet' type="text/css" />
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"
    type="text/javascript">
</script>
    <style type="text/css">
/*<![CDATA[*/
    @import url('//static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css');
    /*]]>*/
    </style><!-- endinjector -->
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

        h1 {
    color: blue;
    color: white;
    text-align: center;
    bottom: 50%;
    left: 65%;
    position: fixed;
    font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 700;
    }
        p {
    position: fixed;
    bottom: 40%;
    left: 58%;
    line-height: 1.5;
    margin: 30px 0;
    }
        #mainNav {
    position: fixed;
    }
    .user-input {
    width: -webkit-fill-available;
    border: none;
    padding: 10px 14px;
    font-size: 18px;
    line-height: normal;
    }
    #user-input-form {
    box-shadow: 1px 1px 9px 0px rgba(1, 1, 1, 1);
            }
            .user-message {
                    
    font-size: 16px;
    background-color: #007bff63;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
            
            }
                  .user-message message {
                    float: left;
    font-size: 16px;
    background-color: #007bff63;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
            
            }
            .user-message:before {
    border-color: transparent #007bff63 transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
}
      
            footer .copyright {
    font-size: 14px;
    margin-bottom: 0;
    text-align: center;
    left: 66% !important;
    align-content: center;
    }
            
        .bot-message {
    float: right;
    font-size: 16px;
    background-color: #007bff63;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 15px 1px 1px 0px;
    }
      .bot-message:before {
    border-color: transparent #007bff63 transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
}
      footer {
      display: none;
      }
    </style>
  </head>
  <body>
 <div class="oj-flex oj-flex-item">
       <div class="oj-flex-item oj-panel oj-margin">

          <h1>
              Dennis Otugo
          </h1>
         <p>
                Human Being | Cyborg | Never asked for this
            </p>
     </div>
       </div>
        <div class="oj-flex-item oj-panel oj-margin">
          <div class="chat-output" id="chat-output">
            <div class="user-message">
              <div class="message">
                train: question # answer # password'

          <div class="chat-input">
            <form action="" method="post" id="user-input-form" name=
            "user-input-form">
              <input type="text" name="user-input" id="user-input"
              class="user-input" placeholder="Enter Text here" />
            </form>
            </div>
         </div>
                              </div>
            </div>
          </div>
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


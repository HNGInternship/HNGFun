<!-- z -->
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
    echo "<div id='result'>yuno 1.2</div>";
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
                    echo "<div id='result'>yuno has been trained</div>";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
    <title>4th_clover</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src=
      "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"
      type="text/javascript">
    </script>
<!-- RequireJS bootstrap file -->

    <style>
        body{
          margin: 10px;
          background:rgba(186, 55, 181, 0.5);
          font-family:cursive;
            }

            .card{
              position: relative;
              left:40%;
              width: 300px;
              height:1000px;
              background: #fff;
              box-sizing: border-box;
              border-radius: 10px;
              box-shadow: 0 20px 20px rgba(0,0,0,.5);
          }
          .card-header {
                overflow: hidden;
                width: 100%;
                max-height: 300px;


              }
              .card-header img{
                height: 400px;
                width: 100%;
                object-fit:cover;
                padding:0,20px,0px,20px;

                background-repeat: no-repeat;
                border-bottom:2px solid blue;

              }
          .details
          {
            height: 20%;
            width: 100%;
            background: #fff;
            position: bottom;
            bottom:0;
            text-align: center;
            padding: 20px;
            padding-bottom: 0px;
            box-sizing:border-box;
            transition: .5s;
          }
          .details h2
          {
            margin: 0;
            padding: 0;
            color: #607d8b;
            font-size: 18px;
            text-transform: uppercase;
            position: relative;
          }
      
          .details h2 span
          {
            font-size: 14px;
            color:rgba(186, 55, 181, 0.5);
          }
          .details p
          {
            margin: 0;
            padding: 10px 0 0 0;
            font-size: 14px;
            color: #795548;
          }
          .contact{

            background-color: #fff;
            color: rgba(186, 55, 181, 0.7);
            width:100px;
            text-align: center;
            padding-left:55px;
            padding-bottom:0px;
           font-size:18px;


          }
       
          i {
            color: #607d8b;
           width:20px;
            height:20px;
            border-radius: 50%;
            text-align: center;
          }
          .if:hover{

            color:#fff;

            padding:1px;
            text-align: center;

          }
          .textt{
          height: 150px;
          }
          .btn{
           background-color:transparent;
            border:2px solid rgba(186, 55, 181, 0.5);
            z-index: 100;
            padding:7px;
            padding-bottom: 1px;


          }
          .btn:hover{
            color:white;
            font-weight: bolder;
            background-color: rgba(186, 55, 181, 0.5);
          }
          h4{
            padding-bottom: 0px;
            margin-bottom: 0px;
          }
          .formm{
            padding-top:10px;

          }
          ul{
            float: left;

            align-items: center;
            list-style: none;
            list-style: inline;
            display: inline-flex;
          }

          .ic{
            font-size: x-large;
            padding-left:30px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding-right: 10px;
          }
          .ic:hover{
            color:rgba(186, 55, 181, 0.5);
            font-size: xx-large;
          }

          .ontop{
          border-radius: 50%;
          height: 130px;
          width: 120px;
          z-index: +1000;
          position: relative;
          margin-top: -50px;
          background-size: contain;
          border: 5px solid  rgba(186, 55, 181, 0.5);

          }
          .ontop:hover{
            width:130px;
            height:140px;
          }
          .fish{
            
            padding-left: 70px;
            padding-right: 60px;
          }

          .title{
            font-size:12px;
          }

          .icons
          {
              position: relative;
              bottom: 20;
          }
          .buttondesign
          {

            text-decoration: none;
            padding:10px 20px 10px 20px;
            border:1px solid purple;
            background-color: transparent;
          }
          .buttondesign:hover
          {
            color: white;

            background-color: rgba(186, 55, 181, 0.5);
          }
          .smbox
          {
            
            height:200px;
            position: relative;
            margin-top: 70px;

          }
          .fwhite{
            background-color: #dcd6d6;
            margin:10px;
            height: 150px;
            overflow-y: scroll;
          }
          .dinput
          {
            width: 80%;
            padding: 5px;

          }
          .myinput{
            padding-top:10px;
            padding-bottom: 10px;
            padding-left: 5px;
            padding-right: 5px;

           
          }
           .mysend:hover{
            border:1px solid rgba(186, 55, 181, 0.5);
            background-color: rgba(186, 55, 181, 0.5);
            color: white;

           
          }
          .myp
          {
            padding-left: 15px;
          }
          .mysend
          {
            float: right;
            border:1px solid rgba(186, 55, 181, 0.5);
            padding: 5px;
            background: white;
          }
          .bot-message {
          float: right;
          font-size: 10px;
          background-color: grey;

          width: 60%;
          display: inline-block;
          border-radius: 50px;
          position: relative;
          margin: 15px 1px 1px 0px;
          }
          .message {
          float: left;
          font-size: 10px;
          background-color: #ffffff;
          padding: 10px;
          display: inline-block;
          border-radius: 50px;
          position: relative;
          margin: 5px;    
            
                      
            }
            .bot-message2 {
          float: left;
          font-size: 10px;
          background-color: grey;

          width: 60%;
          display: inline-block;
          border-radius: 50px;
          position: relative;
          margin: 15px 1px 1px 0px;
          }
          .message2 {
          float: left;
          font-size: 10px;
          background-color: #ffffff;
          padding: 10px;
          display: inline-block;
          border-radius: 50px;
          position: relative;
          margin: 5px;    
            
                      
            }
         
  </style>


<body onload="welcome()">
  <div class="card ">

    <div class= "front">
      <div>
          <div class = "card-header">
             <img src = " http://res.cloudinary.com/seyike/image/upload/v1505512043/love_uyn0wc.jpg" alt = "profile">
          </div>
          <div class = "fish">
              <img  class = ontop src= "http://res.cloudinary.com/seyike/image/upload/c_scale,e_sharpen:100,h_944,q_86,r_4,w_557/r_7/v1505062864/1_ljr5it.jpg" alt="Profile Picture">
          </div>
        </div>

    <!-- image in front -->

        <div class="details">
             <h2>Seyike Sojirin<br><span class = "dd">Front-end Developer and UI/UX designer</span></h2>
             <p> My name is Seyike Sojirin, A student of the University of Lagos; Computer science department.
            I am a UI/UX designer , aspiring Full Stack web developer and IT enterpreneur.
            I'm conversant with HTML, CSS ,MYSQL, PHP and JavaScript .
            </p>
          </div>
          <div class ="icons">
            <ul>

              <li>
               <a href = "https://github.com/seyike"><i class="fa fa-github ic" aria-hidden="true"></i></a>

              </li>
              <li>
              <a href="https://hnginterns.slack.com/messages/@seyike" alt="slack"><i class="fa fa-slack ic" aria-hidden="true"></i></a>
               </li>

              <li>
              <a href="https://www.facebook.com/ssojirin" alt = "myprofile"><i class="fa fa-facebook-official ic" aria-hidden="true"></i></a>
               </li>
            </ul>

         </div>
        
    </div>
   

    <div class = "smbox" id = "smbox">
      <p class = "myp">My Chatbot <span>-- #Train #Question</span></p>
      <div class = "fwhite" id = "chatwindow">

       <div></div>
        <div class='bot-message2'>
          <div>
            <div class='message2'>
              <p  style="margin: 0!important" >Hello i am Yuno</p>
            </div>
          </div>
        </div>


        
      </div>
          <div class = "myinput" id= "myinput">
            <form action="" method="post" name = "chatinput" id = "chatinput">
              <input type="text" name="" placeholder="Ask me anything" class = "dinput" id ="user-input">
               <button class="mysend" id = "chatinput" name = "chatinput">Send</button> 
            </form>
            
          </div>
     
    </div>

  </div>

  


</div>

   <script>
//<![CDATA[
    var outputArea = $("#chatwindow");

    $("#chatinput").on("submit", function(e) {

        e.preventDefault();

        var message = $("#user-input").val();

        outputArea.append(
        `<div class='bot-message'><div><div class='message'>${message}<\/div><\/div><\/div>
        `);


        $.ajax({
            url: 'profile.php?id=4th_clover',
            type: 'POST',
            cache: false ,
            data:  'user-input=' + message,
            success: function(response) {
                var result = $($.parseHTML(response)).find("#result").text();
                setTimeout(function() {
                    outputArea.append("<div class='message'>" + result + "<\/div>");
                    $('#chatwindow').animate({
                        scrollTop: $('#chatwindow').get(0).scrollHeight
                    }, 150);
                }, 250);
            }
        });


        $("#user-input").val("");

    });
    //]]>
    // function welcome(){
    //   document.getElementById('').innerHTML.style = >  
    //    }
    </script>

</body>

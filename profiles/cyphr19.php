



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stage 1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   

    
    
<style>
  body{
        margin: 0;
        padding: 0;
        color: white;
        background:url(http://res.cloudinary.com/galdrencyphr/image/upload/v1526547567/IMG_20171014_181932-01_2.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-family: "abel";
  } 
  #cover{
    width: 100%;
    /*background: rgba(0,0,0,.95);*/
    height: 100vh;
    text-align: center;
  }
 
  #box{
    width: 100%;
    text-align: center;
    position:;
    padding: 0;
    min-height: 100vh;
    
  }
  #box p{
    font-size: 50px
  }
  #box img{
    width: 200px;
    border-radius: 5px;
    /*transform: rotate(360deg);*/
  }
  .row{
    margin: 0;
    padding: 0;
    min-height: 100%
  }
  .row .col-sm-12{
    height: 100%;
    padding: 0;
    padding-top: 80px;
  }
  .row #chatbox{
    padding: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.9);
    width: 70%;
    border: 1px solid #696969;
    border-radius: 5px;
  }
  #chatbox #cbox{
    height: 350px;
    overflow-y: auto;
    overflow-x: auto;
}
#form{
  color: cyan
}
#tbox{
  background: rgba(0,0,0,0);
  width: 95%;
  height: 45px;
  border: 1px solid #696969;
  padding: 1%;
}
  
#head{
  border-bottom: 1px solid #696969;
  font-size: 30px;
  color: cyan;
  text-align: left;
  padding: 1% 1% 1% 10%;
}
#socialcons{
  
  
}
.output{
  text-align: right;
  color: cyan;
  font-size: 20px;
  padding: 1% 5% 1% 1%;
}
.outputa{
  text-align: left;
  color: red;
  font-size: 20px;
  padding: 1% 1% 1% 5%;
}
#cbox .outputa p{
  font-size: 20px;
  white-space: nowrap;
  width: 100%;
  word-wrap: break-word;
  overflow: hidden;
   -webkit-animation: type 5s steps(40, end);
  animation: type 5s steps(40, end);
  -webkit-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
#social {
margin: 0 auto;
width: 250px;
size: 45px;
}
.social-icons {
width: 25px;
transition: all 700ms;
}
.social-icons:hover {
transform: scale(1.2, 1.2);
.btn{
  margin-top: 1%;
  width: 50%;
  border-radius: 0;
  background: rgba(0,0,0,0);
  border: 1px solid #696969;
}
@-webkit-keyframes type {
  0% {
    width: 0;
  }
  99.9% {
    border-right:none; 
  }
  100% {
    border: none;
  }
}
@keyframes blink {
  50% {
    border-color: transparent;
  }
}
@-webkit-keyframes blink {
  50% {
    border-color: tranparent;
  }
}
h4{
  font-size: 30px;
}
h5{
  font-size: 20px;
}    
</style>


<!--script language="javascript">
        function copy() {
            var data = document.getElementById('tbox').value;
            document.getElementById('cbox').innerHTML +="<div class='output'>" + data + "</div>" + "<br/>";
        }
    </script-->
</head>

<body>

<?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;
        $result2 = $conn->query("Select * from interns_data where username = 'cyphr19'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
		
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $msg = $_POST['msg'];
    $train = stripos($msg, 'train:');
    echo $train;
    if ($train === 0){
        trainbot($msg);
    }
     else {
        fetchans($msg); 
    }
}
function fetchans($msg){
    include '../db.php';
    $msg = preg_replace('([\s]+)', ' ', trim($msg));
    $sql = "SELECT * FROM chatbot WHERE question='$msg' ORDER BY rand() LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $ans = $q->fetch();
    $ans1 = $ans['answer'];
    if ($ans1 == ''){
        $ans1 = 'Sorry, I cant find an answer. You can train me though.';
    } 
    echo $ans1;
    exit();
} 
    function trainbot($msg) {
     include '../db.php';
       $msg = preg_replace("([\s]+)", " ", trim($msg));
       $msg = substr(strstr($msg," "), 1);
        $msg = explode('#', $msg);
        $question = trim($msg[0]);
        $answer = trim($msg[1]);
        $password = trim($msg[2]);
        if($password == 'password') {
            $sql = 'SELECT * FROM chatbot WHERE question = "'.$question .'" and answer = "'. $answer .'" LIMIT 1';
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
            if(empty($data)) {
                $training = array(':question' => $question, ':answer' => $answer);
                $sql = 'INSERT INTO chatbot ( question, answer) VALUES (:question, :answer );';
                    $q = $conn->prepare($sql);
                    if ($q->execute($training) == true) {
                        $ans2 = 'Training Successful';
                    }
            }else{
              $training = array(':question' => $question, ':answer' => $answer);
                $sql = 'INSERT INTO chatbot ( question, answer) VALUES (:question, :answer );';
                    $q = $conn->prepare($sql);
                    if ($q->execute($training) == true) {
                $ans2 = 'Question already exists but your version has been added. :)';
            }
          }
        }else {
           $ans2 = 'Incorrect Password';
        }
        echo $ans2;
        exit();
    }
    ?>


    <div id="cover">
      <div id="box">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12">
           <img src="http://res.cloudinary.com/galdrencyphr/image/upload/v1523626611/IMG_20180218_181243_674.jpg"  alt="Afolabi's picture" class="img-rounded">
            <h5>Phone: 07012337031</h5> 
            <h5>Email: cyphr19@gmail.com</h5> 
			<h5>username: cyphr19</h5>
           
		   <div id="social">

            <ul class="nav nav-pills">

              <div> <li>

                <a href="https://github.com/galdrencyphr" target="_blank" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_150/v1523623556/github.svg" />

                </a>

              </li>

              <li>

                <a href="https://twitter.com/GALDREN_CYPHR" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_100/v1523623465/twitter.svg" />

                </a>

              </li>

              <li>

                <a href="https://facebook.com/tommy5b" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_512/v1523623281/facebook.png" />

                </a>

              </li>
			  </div>

           

            </ul>

          </div>
          </div>

        <div class="col-lg-6 col-md-6 col-sm-12" align="center">
          <div id="chatbox">
            <div id="head">
              PEARL
            </div>
            <div id="cbox">
              <div class="outputa">
                  To Know More about me type 'aboutbot'
                  You can also train me using:
                  'train: question #answer #password'
                  if i cant answer any of your question.
                  ;) 
              </div>
            </div>
            <div id="form">
                  <div class="form-group">
                  <input type="text" name="text" id="tbox" class="mbox">
                  <input type="submit" name="submit" value="Submit" class="btn">
                </div>

            </div>
          </div>
        
        </div>

     </div>
    </div>
  </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>






<!--script type="text/javascript">
  $(function() {
    $('#box')
  .css('opacity', 0)
  .slideDown('slow')
  .animate(
    { opacity: 1 },
    { queue: false, duration: 1500 }
  );
});
</script-->


 <script>
            $(function(){
              var name='PEARL:';
               function bot_chat(reply){
                    $('#cbox').append('<div class="outputa"><p>PEARL: ' + reply + '<p></div>');
                    $('#cbox').scrollTop($('#cbox').height());
               }
               $('input[type=submit]').click(function(){
                  var message = $('.mbox').val();
                  var reset = $('.mbox').val("");   
                    if(message){
                        $('#cbox').append('<div class="output">You: ' + message + '</div>');
                        $('#cbox').scrollTop($('#cbox').height());
                    }
                  
                  if(message==''){
                    $('#cbox').append('<div class="outputa"><p>'+ name + ' You have not typed anything</p></div>');
                    $('#cbox').scrollTop($('#cbox').height());
                    return false;
                    } else if(message=='aboutbot'){
                      $('#cbox').append('<div class="outputa"><p>'+ name + ' PEARL v1.2</p></div>');
                    $('#cbox').scrollTop($('#cbox').height());
                    return false;
                    } else{
                        $.ajax({
                       url: 'profiles/cyphr19', //This is the current doc
                          type: "POST",
                          //dataType:'json', // add json datatype to get json
                          data: ({msg: message}),
                        success: function(data){
                            bot_chat(data);
                            reset;
                        }
						
                    }) .done(function(data,textStatus,jqXHR){
                        alert("response with: " + data);
                        })
                        .fail(function(data,textStatus,errorThrown){ alert("Request failed!"); console.log('FAILURE: ' + textStatus); })
                        .always(function(data,textStatus,errorThrown){});
                    return false;
                    }
               })
            })
            
        </script>

</body>
</html>

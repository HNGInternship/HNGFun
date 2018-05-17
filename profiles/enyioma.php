<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = preg_replace("([?.!])", "", $data);
        $data = preg_replace("(['])", "\'", $data);
        return $data;
       }
      require '../../config.php';
      $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
        
        if(!$conn){
            die('Unable to connect');
        }
        $question = $_POST['message'];
        $pos = strpos($question, 'train:');

        if($pos === false){
            $sql = "SELECT answer FROM chatbot WHERE question like '$question' ";
            $query = $conn->query($sql);
            if($query){
                echo json_encode([
                    'results'=> $query->fetch_all()
                ]);
                return;
            }
        }else{
            $trainer = substr($question,6 );
            $data = explode('#', $trainer);
            $data[0] = trim($data[0]);
            $data[1] = trim($data[1]);
            $data[2] = trim($data[2]);

            if($data[2] == 'password'){

                $sql = "INSERT INTO chatbot (question, answer)
                VALUES ('$data[0]', '$data[1]')";


                $query = $conn->query($sql);
                if($query){
                    echo json_encode([
                        'results'=> 'Trained Successfully'
                    ]);
                    return;
                }else{
                    echo json_encode([
                        'results'=> 'Error training '. $conn->error
                    ]);
                    return;
                }
                
            }else{
                echo json_encode([
                    'results'=> 'Wrong Password'
                ]);
                return;
            }
            
        }
        
        echo json_encode([
            'results'=>  'working'
        ]);
        
    return ;
    }else{
        //echo 'HI';
        //return;
    }
    


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enyioma's Profile</title>

    <!-- Oracle Jet CDN -->
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <!-- Awesome font CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    
  }
  .content {
    display: block;
    padding-top: 50px;
    padding-left: 0%;
    position: absolute;
  }
  .about {
          font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
          text-align: justify;
          padding: 20px;
      }
  .card{
    box-shadow: 0px 0px 2px #2196f3;
    width: 40%;
  }
  .h2{
      color: #563d7c;
      font-size: 30px;
      text-align: center;
      padding-left: 50px;
  }
  .h4{
      color: #64b5f6;
      font-size: 20px;
      padding-left: 130px;
  }
  p{
      color: #90caf9;
  }
  .fa {
          padding: 20px;
          font-size: 30px;
           width: 60px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
           border-radius: 60%;
      }
      .fa:hover {
          opacity: 0.7;
      }

      .oj-avatar-image {
          border-radius: 100%;
          display: block;
          max-width: 250px;
          max-height: 200px;
          margin-left: auto;
          margin-right: auto;
          
          
      }
      input {
          width: 70%;
          height: 30px;
          padding: 20px, 20px;
          border-radius: 10%;
      }
      .recieved {
        background-color: rgba(58, 111, 172, 0.9);
        color: white;
        padding: 2%;
        max-width: 40%;
        border-radius: 20%;
        float: right;
      }
      .sent {
          background-color: #B8B10F;
          max-width: 40%;
          border-radius: 20%;
      }
      .yormabot {
          position: absolute;
          padding-top: 150px;
          padding-left: 40%;
          width: 1000px;
          display: inline-block;
          max-height: 400px; 
          resize: none;
      }
      .text-box {
          overflow-y: scroll;
          resize: none;
          max-height: 200px;
      }
      .button {
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; 
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
    }
        .button:hover {
            background-color: #008CBA;
            color: white;
}

     



</style>
</head>

<body class="bg-light">
<div>
<div class="oj-flex oj-sm-flex-direction-columno oj-sm-align-items-center content">
  <div class="card mt-5 py-5">
    <div class="my-3">
      <p class="oj-sm-align-items-center h2"><b>Welcome, Everyone!</b></p>
      <p class="oj-sm-align-items-center h4">My name is Enyioma Nwadibia</p>    
      <div class="oj-flex-item oj-xl-align-items-center">
        <img src="https://res.cloudinary.com/dwkzixuca/image/upload/v1524141051/eyo3.jpg" class="oj-avatar-image" alt="Enyioma's photo">
      </div>
      
      <div class= "about">
          I am a budding Web Developer with an intermediate knowledge and experience garnered in a very short while.
          I am a fast learner who is optimistic about any task, situation and life in general. I have working knowledge of the following 
          technologies (The list will keep increasing of course):<br><br>
          <b>Frontend:</b> HTML, CSS, Bootstrap<br>
          <b>Backend:</b> MySQL, PHP<br>
          <b>Server:</b> Laragon, MAMP<br>
          <b>Design:</b> Figma<br>
      </div>
      <div class= "contacts">
          <a href="https://twitter.com/Fynewily" target= "_blank" class="fa fa-twitter"></a>
          <a href="https://www.linkedin.com/in/enyioma-nwadibia-40b59244/" target= "_blank" class="fa fa-linkedin-square"></a>
          <a href="https://github.com/fynewily" target= "_blank" class="fa fa-github"></a>
          <a href="https://hnginternship4.slack.com/account/profile" target= "_blank" class="fa fa-slack"></a>
      </div>
    
  

    
    </div>
  </div>
</div>

<div>
    
</div>


<div class="demo-flex-display yormabot">
  <div id="panelPage">
          
    
      <div class="oj-flex demo-panelwrapper">
  
        <div class="oj-flex-item oj-flex oj-xl-flex-items-1 oj-xl-12 oj-xl-12 oj-lg-6 oj-xl-6">
          <div class="oj-flex-item oj-panel oj-panel-shadow-md demo-mypanel">
           <h3 class="oj-header-border"><img src="https://res.cloudinary.com/dwkzixuca/image/upload/v1524141051/eyo3.jpg" alt="Enyioma photo"  
            class="oj-avatar-image" width="30px" height="30px"  style="margin-right: 5%">Yorma's Bot</h3><br>
        <div class= "chat-bot">
        <div>Hello, <span id = "greeting"> </span> (Yea I know what time it is). My name is YormaBot. I'm very much open to learn more. You can teach me using the format: 
            "train: question #answer #password."</div>
            <div class= "text-box" id="textbox">
                <p id="chatlog8" class= "chatlog">&nbsp;</p>
                <p id="chatlog7" class= "chatlog">&nbsp;</p>
                <p id="chatlog6" class= "chatlog">&nbsp;</p>
                <p id="chatlog5" class= "chatlog">&nbsp;</p>
                <p id="chatlog4" class= "chatlog">&nbsp;</p>
                <p id="chatlog3" class= "chatlog">&nbsp;</p>
                <p id="chatlog2" class= "chatlog">&nbsp;</p>
                <p id="chatlog1" class= "chatlog">&nbsp;</p>
            </div>

            <div class= "input-group mb-3 chat">
            <input type= "text" class= "form-control" id= "chatbox" name= "chatbot" method= "POST" placeholder="Hi, nice to have you here....">
            <button class="button" style="float: right" onclick = loadDoc()>Send</button>
            </div>
         
        </div>
          </div>
        </div>
    
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
    nlp = window.nlp_compromise;

    currentTime=new Date();
    //getHour() function will retrieve the hour from current time
    if(currentTime.getHours()<12)
    document.getElementById("greeting").innerHTML = "<b>Good Morning!! </b>";
    //document.write("<b>Good Morning!! </b>");
    else if(currentTime.getHours()<17)
    document.getElementById("greeting").innerHTML = "<b>Good Afternoon!! </b>";
    //document.write("<b>Good Afternoon!! </b>");
    else 
    //document.write("<b>Good Evening!! </b>");
    document.getElementById("greeting").innerHTML = "<b>Good Evening!! </b>";
    

    function loadDoc() {
        //alert('Hello');
        var message = document.querySelector('#chatbox');
        //alert(message.value);
        var p = document.createElement('p');
        p.id = 'user';
        var chatarea = document.querySelector('#chatlog1');
        p.innerHTML = message.value;
        chatarea.appendChild(p);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText);
            var result = JSON.parse(xhttp.responseText);
            message.value = '';
            var pp = document.createElement('p');
            pp.id = 'bot';
            if(result.results == ''){
                pp.innerHTML = 'You can train me more. Not in database.';
                chatarea.append(pp)
                return;
            }
            console.log(typeof(result.results))
            if(typeof(result.results) == 'object' ){
                var res = Math.floor(Math.random() * result.results.length);
                pp.innerHTML = result.results[res];
                chatarea.append(pp)
            }else{
                var res = Math.floor(Math.random() * result.results.length);
                pp.innerHTML = result.results;
                chatarea.append(pp)
            }
            
            }
        };
        document.onkeypress = keyPress;
    //if the key pressed is 'enter' runs the function newEntry()
    function keyPress(e) {
      var x = e || window.event;
      var key = (x.keyCode || x.which);
      if (key == 13 || key == 3) {
        //runs this function when enter is pressed
        newEntry();
      }
      if (key == 38) {
        console.log('hi')
          //document.getElementById("chatbox").value = lastUserMessage;
      }
    }
    //clears the placeholder text ion the chatbox
    //this function is set to run when the users brings focus to the chatbox, by clicking on it
    function placeHolder() {
      document.getElementById("chatbox").placeholder = "";
    }

        xhttp.open("POST", "/profiles/enyioma.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
    }
        $('#textbox').animate({
                scrollTop: textbox.scrollHeight,
                scrollLeft: 0
            }, 100);
</script>

  <!-- RequireJS bootstrap file -->
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>

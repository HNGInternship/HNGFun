<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //die('Hi');
        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE );
        
        if(!$conn){
            die('Unable to connect');
        }
        $question = $_POST['message'];
        $pos = strpos($question, 'train:');

        if($pos === false){
            $sql = "SELECT answers FROM chatbot WHERE questions like '$question' ";
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

                $sql = "INSERT INTO chatbot (questions, answers)
                VALUES ('$data[0]', '$data[1]')";


                $query = $conn->query($sql);
                if($query){
                    echo json_encode([
                        'results'=> 'Trained Successfully'
                    ]);
                    return;
                }else{
                    echo json_encode([
                        'results'=> 'Error training'
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
            'reply'=>  'working'
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
    <title>My Profile</title>
    <link  rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/><!-- RequireJS bootstrap file -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
       body {
  font: 15px arial, sans-serif;
  background-color: #5c556e;
  padding-top: 15px;
  padding-bottom: 15px;
}

#bodybox {
  margin: auto;
  max-width: 300px;
  font: 15px arial, sans-serif;
  background-color: rgb(121, 147, 182);
  border-style: solid;
  border-width: 1px;
  padding-top: 20px;
  padding-bottom: 25px;
  padding-right: 25px;
  padding-left: 25px;
  box-shadow: 5px 5px 5px rgb(39, 37, 46);
  border-radius: 15px;
}

#chatborder {
  border-style: solid;
  background-color: #cdcfd8;
  border-width: 3px;
  margin-top: 20px;
  margin-bottom: 20px;
  margin-left: 20px;
  margin-right: 20px;
   padding-top: 10px; 
  padding-bottom: 15px;
  padding-right: 20px;
  padding-left: 15px;
  border-radius: 15px;
  max-height:200px;
  overflow-y:scroll;
}

.chatlog {
   font: 15px arial, sans-serif;
}

#chatbox {
  font: 17px arial, sans-serif;
  height: 22px;
  width: 100%;
}

h1 {
  margin: auto;
}

pre {
  background-color: #746c72;
  margin-left: 20px;
}
     .aboutme{
       width: 500px;
       margin-left: 500px;
       margin-right: auto;
       padding-top: 50px;
       background-color: rgba(136, 7, 7, 0.438);

     }
     .me{
         color: white;
         font-size: 20px;
         font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         text-align: center;
     }
    </style>
</head>

<body>
    
    <div class="aboutme">
    <body class="demo-disable-bg-image">
    <div id="sampleDemo" style="" class="demo-padding demo-container">
      <div id="componentDemoContent" style="width: 1px; min-width: 100%;">
        
        <div id="animationDemo" style="overflow:hidden">
        
          <oj-label for="effect-select">Select effect</oj-label>
          <oj-select-one id="effect-select" 
                     options='[[effectArray]]'
                     value='{{effect}}'
                     style='max-width:20em'>
          </oj-select-one>
              
          <div>
            <oj-button on-oj-action='[[buttonClick]]'>
                Animate
            </oj-button>
          </div>
        
          <div>
            <div id="animatable" class="container">
              <oj-chart id="pieChart"
                        type='pie' 
                        series='[[dataSeries]]'
                        style-defaults='{"threeDEffect": "on"}'
                        hover-behavior='dim'
                        style='width:100%'>
              </oj-chart>
            </div>
          </div>
        
          <div id="form-container" class="oj-form-layout">
            <div class="oj-form oj-sm-odd-cols-12 oj-md-odd-cols-4 oj-md-labels-inline">  
              <!-- ko ojModule: {name: 'animation/common', 
                                 params: {effectOptions: effectOptions}} -->
              <!-- /ko -->
              <!-- ko ojModule: {name: modulePath, 
                                 params: {effectOptions: effectOptions}} -->
              <!-- /ko -->
            </div>
          </div>
        
        </div>

        
      </div>
    </div>
    <div <style="display:flex">
    <center> <img src="https://res.cloudinary.com/dtafmyxnn/image/upload/v1524231568/Emem.jpg" alt="Emmy" width="300" height="250"/><br />
       <div class="me"><b> I am Ememobong Daniel Bob</b><br /> 
        I am a Nigerian<br />
        I am a graduate of Information Technology/Business Information Systems<br />
        I am an optimist and a go-getter<br />
        I desire to be a web developer<br />
        I desire to be a techpreneur.</div><br /></center>
    </div>
    <div id='bodybox'>
                <div id='chatborder'>
                  <p id="chatlog7" class="chatlog">&nbsp;</p>
                  <p id="chatlog6" class="chatlog">&nbsp;</p>
                  <p id="chatlog5" class="chatlog">&nbsp;</p>
                  <p id="chatlog4" class="chatlog">&nbsp;</p>
                  <p id="chatlog3" class="chatlog">&nbsp;</p>
                  <p id="chatlog2" class="chatlog">&nbsp;</p>
                  <p id="chatlog1" class="chatlog">&nbsp;</p>
                  </div>
                  <div><center><input style="width:170px" type="text" name="chat" id="chatbox" placeholder="chat here with me..." onfocus="placeHolder()"/></center>
                  <button style="float: right" onclick = loadDoc()><i class="fa fa-send-o fa-2x"></i></button></div>
                
  </div>
    
    </style>
    </div>
                <script>
    function loadDoc() {
        //alert('Hello');
        var message = document.querySelector('#chatbox');
        //alert(message.value);
        var p = document.createElement('p');
        p.id = 'user';
        var chatarea = document.querySelector('#chatlog1');
        p.innerHTML = message.value;
        chatarea.append(p);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText);
            var result = JSON.parse(xhttp.responseText);
            
            var pp = document.createElement('p');
            pp.id = 'bot';
            if(result.results == ''){
                pp.innerHTML = 'Not in database. please train me';
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
        xhttp.open("POST", "/profiles/emem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
    }
    </script>
                

    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>

<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>

<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>

<script type="text/javascript" src="../js/main.js"></script>


</body>
</html>


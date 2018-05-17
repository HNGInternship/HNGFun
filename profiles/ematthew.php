<?php
global $conn;


    function validateTraining($str){
    
        if(strpos($str, "train:") !== false){

            return true;
        }else{
        
            return false;
        }
    }

    function validateFunction($str){

        if(strpos($str, "(") !== false){

            return true;
        }else{
            
            return false;
        }
    }

    function processQuestion($str){
        if(validateTraining($str)){
            list($t, $question) = explode(":", $str);
            $question = trim($question, " ");
            if($question !== ''){
                if(strpos($question, "#") !== false){
                    list($question,$answer)  = explode("#", $question);
                $answer = trim($answer, " ");
            if($answer !== ''){
                    training($question, $answer);
                }else{
                    echo "Question and Answer required";
                }
                }else{
                    echo "Question and Answer required";
                }
                
            }else{
                echo "Question and Answer required";
            }
        }else if(validateFunction($str)){
        list($functionName, $paramenter) = explode('(', $str) ;
            list($paramenter, $useless) = explode(')', $paramenter);
            if(strpos($paramenter, ",")!== false){
                $paramenterArr = explode(",", $paramenter);
            }
        switch ($functionName){
            case "time":
            //bytenaija_time(urlencode($paramenter));
            //break;

            case "convert":
            //bytenaija_convert(trim($paramenterArr[0]), trim($paramenterArr[1]));
            //break;

            case "hodl":
            //bytenaija_hodl();
            //break;

            default:
            echo "That command has not been implemented yet. It has been put on hold till stage 5";
        }
        }else{
            //call database for question;
            getAnswerFromDb($str);
        }
    }
    function training($question, $answer){
    //  echo "iN TRAININGF";
    global $conn;
    
        try {
        
            $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
            
            $conn->exec($sql);

            $message = "Saved " . $question ." -> " . $answer;
            
            
            echo $message;

        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

    }

    function getAnswerFromDb($str){
        global $conn;
        if(strpos($str, "deleteEmpty") === false){        
        $str = "'%".$str."%'";
        if($str !== ''){
           /*  $sql = "SELECT COUNT(*) FROM chatbot WHERE question LIKE " . $str;
            if ($res = $conn->query($sql)) {
               
               
              if ($res->fetchColumn() > 0) { */
            
                
            $sql = "SELECT answer FROM chatbot WHERE question LIKE " . $str . " ORDER BY answer ASC";
            $q = $conn->query($sql);
            $count = $q->rowCount();
            if($count > 0){
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetchAll();
            
            $rand = rand(0, $count - 1);
        
            echo $data[$rand]["answer"];
    
            }else{
                echo "Hello buddy I don't understand your command . do you mind if you train me. i'm here to serve you better. You could train me to understand this format <strong>train: question # answer</strong>!";
            }
    
        
        }else{
            echo "Enter a valid command!";
        }
        }else{
            $sql = "DELETE FROM chatbot WHERE question = '' OR answer=''";
            $q = $conn->query($sql);
            $count = $q->rowCount();
            if($count > 0){
                echo "All empty questions and answers deleted!";
            }else{
                echo "There is no question or answer that is empty!";
            }

        }
    }


    if (isset($_GET["query"])) {
        include_once realpath(__DIR__ . '/..') . "/answers.php"; 
        if(!defined('DB_USER')){
            require "../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
        global $conn;
        $image_filename = '';
        $name = '';
        $username = '';
        $sql = "SELECT * FROM interns_data where username = 'ematthew'";
        foreach ($conn->query($sql) as $row) {
            $image_filename = $row['image_filename'];
            $name = $row['name'];
            $username = $row['username'];
    }

    global $secret_word;

    try {
        $sql = "SELECT secret_word FROM secret_word";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
    } catch (PDOException $e) {
        throw $e;
    }
    processQuestion($_GET['query']);
    
    }else{

?>



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

body{
  background:#FFFACD;
}
.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

.sendersname {
            padding: 20px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .submit {
            padding: 10px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .contact {
            margin-top: 10px;
        }
        .submit {
            background-color: #157EFB;
            color: white;
        }

        .submit:hover {
            background-color: #157EFB;
        }

.message {
            height: 100px;
            padding: 20px;
            margin-top: 5px;
            font-size: 14px;
            width: 460px;
            border: 0px;
        }
        #matbot h1{
            color:white;
            font-size:14px;
            background:gray;
            padding:15px;
            width:350px;
            margin-top:80px;
            width: 100%;
        }
        #botresponse{
            width: 100%;
            height: 15rem;
            overflow-y: scroll;
            padding: 1rem;
            font-family: Lato;
            color:black;
            box-shadow: 0px 1px 1rem white;
        }
        .form-control{
            background:white;
            width: 100%;
            height:40px;
            padding-left:10px;
            border:0px;
            color:#2181F7;
            box-shadow: 1px 1px 1rem white;
        }

input[type=text]:active{
            border: 1px solid #2181F7;
            font-style:bold;
        }
        .botres{
            font-size:14px;
            background:white;
            padding:12px;
            border-radius:1px;
            float:left;
            display: inline-block;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }
        .userres{
            background-color:white;
            display: inline-block;
            background-color: #2181F7;
            color:white;
            float:right;
            padding:5px;
            font-size:14px;
            margin-top:10px;         
            margin-bottom:10px;
            display: inline-block;
            border-radius:20px;
            padding-top:10px;
            padding-bottom:10px;
            padding-right:15px;
            padding-left:15px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }
        .clearfix{
            display:table;
            content:'';
            clear:both
            }
</style>
</head>
<body>
    <br> <br/>

    <h2 style="text-align:center">Matthew Profile Card</h2>

    <div class="card">
        <img src="http://res.cloudinary.com/hng/image/upload/v1523623156/mat1.png" alt="Matthew" style="width:100%">
        <h1>Matthew Bernard</h1>
        <p class="title">profile, Contact details</p>
        <p>Software Developer</p>
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="https://www.linkedin.com/in/ekpoto-matthew-372926a6/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3Byj7YsXsQTZWQTPTqlt8CFg%3D%3D&licu=urn%3Ali%3Acontrol%3Ad_flagship3_feed-identity_welcome_message"><i class="fa fa-linkedin"></i></a>  
            <a href="https://web.facebook.com/ekpotobenernard"><i class="fa fa-facebook"></i></a> 
        </div>
        <p><button>Contact</button></p>
    </div>

        <div class="mybot">
            <div id="matbot">
                <h1>MATBOT</h1>
                <div id="botresponse"> </div>
                <input type="text" name="botchat" placeholder="Chat with me! Press enter to send." onkeypress="return runScript(event)" onkeyDown="recall(event)" class="form-control">
            </div>
        </div>
    </div>

    <script>
        let url = "profiles/ematthew.php?query=";
        url = window.location.href + "?query=";

        let botResponse = document.querySelector("#botresponse");
        window.onload = instructions;
        let stack = [];
        let count = 0;
        function recall(e){
            let input = e.currentTarget;
            if(e.keyCode == 38){
            
                console.log(count)
                if(stack.length > 0){
            if(count < stack.length){
                let command = stack[stack.length- count -1];
                input.value = command;
                    }else{
                        count =0
                    }
                    count++;
                }
            
            }else if(e.keyCode == 40){
                if(count > 0){
                    count--;
                    console.log(count)
                    let command = stack[count];
                    input.value = command;
                }
                
            }
        }

        function runScript(e) {
            if (e.keyCode == 13) {
            let input = e.currentTarget;
            let dv = document.createElement("div");
                    dv.innerHTML = "<span class='user'></span> <span class='userres'>" + input.value + "</span><div class='clearfix'></div>";
                botResponse.appendChild(dv)
                stack.push(input.value)
            
            let urlL = url + encodeURIComponent(input.value);
            console.log(urlL);
            fetch(urlL).then(response=>{
                return response.text();
            }).then(
                response=>{
                    console.log(response)
                    print(response);
                });
                input.value = '';
            }
        }

        function print(response){
            let dv = document.createElement("div");
                    dv.innerHTML = "<div class='botres'><span class='res'>" + response + "</span></div><div class='clearfix'></div>";
                botResponse.appendChild(dv)
                botResponse.scrollTop = botResponse.scrollHeight;
        }

        function instructions(){
            $string = '<div class="instructions">Welcome!Hello buddy My name is <b>Matthew</b> and I’m your bot.<br/>Type a command and I will try and answer you.<br> Meanwhile, try this commands';
            $string += "";
            $string += "";
            $string += "</div>"
        
         print($string);
        }
    </script>

<?php } ?>
</body>
</html>
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
                echo "I don't understand that command yet. My master is very lazy. Try again in 200 years. You could train me to understand this using this format <strong>train: question # answer</strong>!";
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
        $sql = "SELECT * FROM interns_data where username = 'timi'";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #efefef;
            background-image: url(http://res.cloudinary.com/tarrot-system-inc/image/upload/v1503349370/dot_srox60.png);
            color: #157EFB;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
        }
        .containers {
            display: flex;
            max-width: 700px;
            height: 100vh;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .wrappers {
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .mybio b {
            font-size: 14px;
            color:black;
        }
        .mybio{
            color:black;
        }
        .avatar {
            background-size: cover;
            height: 190px;
            width: 190px;
            margin: 8px
        }
        .name {
            font-size: 15px;
            padding-left: 20px;
            padding-right: 5px;
        }
        .name p {
            padding-left: 35%;
            padding-bottom: 5px;
        }
        .about {
            line-height: 1.5;
        }

        .about h3{
            color: #157EFB;
        }
        .profile-social-links span {
            display: none;
        }
        .footer-wrapper {
            display: flex;
            justify-content: space-between;
            float: right;
            margin: 0px 15px;
        }

        .others {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
        }

        .task {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
            padding-right: 15px;
            padding-bottom: 10px;
            float: right;
        }
        .task a {
            text-decoration: none;
            color: #636b6f;
        }
        .fa-link {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #00aced;
            margin-left: 10px;
            color: #fff;
        }
        .fa-link:hover {
            background-color: #322f30;
        }
        .myprofile {
            background-color: #ffffff;
            margin-right: 20px;
            height: 255px;
        }
        .profile-social-links {
            color: #fff;
            margin-left: 18%;
        }
        ul.profile-social-links {
            align-items: center;
            float: right;
        }
        .profile-social-links li {
            vertical-align: top;
            height: 100px;
            display: inline;
        }
        .profile-social-links a {
            color: #fff;
            text-decoration: none;
        }
        .fa-slack {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-slack:hover {
            background-color: #00aced;
        }
        .fa-github {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-github:hover {
            background-color:#157EFB;
        }
        .fa-twitter {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-twitter:hover {
            background-color: #157EFB;
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
        #timsbot h1{
            color:white;
            font-size:14px;
            background:#2181F7;
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

    <div class="containers">
        <div class="wrappers">
            <div class="myprofile">
                <img src="http://res.cloudinary.com/tarrot-system-inc/image/upload/v1523621115/IMG_4551_muwd22.jpg" class="avatar">
                <div class="name" style ="color: #157EFB;"><b>Tejumola David Timi</b>
                <p>@timi</p>
            </div>
            <div class="others socials">
                <ul class="profile-social-links">
                    <li>
                        <a href="https://github.com/timi-codes" class="social-icon" target="_blank"> <i class="fa fa-github"></i></a>
                    </li>
                    <li>
                        <a href="https://hnginternship4.slack.com/messages/@timi" class="social-icon" target="_blank"> <i class="fa fa-slack"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/codepreneur" class="social-icon" target="_blank"> <i class="fa fa-twitter"></i></a>
                    </li>
                    <br>
                </ul>
            </div>
        </div>

        <div class="mybio">
            <br/><h3>Tejumola David Timi</h3><br/>
            <p>UI/UX designer.<br/>JAVA Lover<br/>Swift.<br/></p>
            <p># Google Android Associate Developer.<br> # Learning fullstack javascript (MEAN Stack).<br/># Music Lover<br/> </b></p>
            <div id="timsbot">
                <h1>TIMBOT</h1>
                <div id="botresponse"> </div>
                <input type="text" name="botchat" placeholder="Chat with me! Press enter to send." onkeypress="return runScript(event)" onkeyDown="recall(event)" class="form-control">
            </div>
        </div>
    </div>
    <script>
        let url = "profiles/timi.php?query=";
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
            fetch(urlL)
            .then(response=>{
                
                return response.text();
            })
            .then(
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
            $string = '<div class="instructions">Welcome! My name is <b>Tim</b> and I’m your bot.<br/>Type a command and I will try and answer you.<br> Meanwhile, try this commands';
            $string += "<li><strong>deleteEmpty record - to delete any record<br>the question or answer is empty</strong></li>";
            $string += "<li><strong>train: question # answer - to train me and<br> make me more intelligent</strong></li>";
            $string += "</div>"
        
        print($string);
        }
    </script>
</body>
<html>
<?php
}
?>
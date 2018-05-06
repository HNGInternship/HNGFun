<?php

if(!defined('DB_USER')){
  require "../../config.php";		
  try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}

$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];


$username = "Adina";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);

$name = $my_data['name'];
$image = $my_data['image_filename'];
$username =$my_data['username'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $question = preg_replace("([?!.])", "", trim($_POST['yourinput']));
//    $question1 = trim($_POST['yourinput']);
    
    function deletequest($dquest)
    {
        global $conn;
        $trqa = $conn->prepare("SELECT * FROM  chatbot WHERE question = ".$dquest." ");
        $trqa->execute();
        $trqa->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $trqa->fetchAll();
        if(count($rows)>0){
            $sqld = "DELETE FROM chatbot WHERE question =".$dquest."";  //delete from database
            $dfunc = $conn->prepare($sqld);
            $dfunc->execute();
            $dfunc->setFetchMode(PDO::FETCH_ASSOC);
            echo json_encode([
                    'status' => 1,
                    'answer' => "Delete successful!! The answer to that question is currently not in the database...unless ofcourse your stalker just added it back!"
                ]);
        return;
        }else{ //if input is not a question in db
                 echo json_encode([
                'status' => 1,
                'answer' => "There is no question like that in the database."
            ]);
        return;

        }
        return;
    }

    if(stripos($question, "train:") === 0) //if the input is to train (if it begins with 'train:')
    {
        if(substr_count($question, "#") === 2) //if it has two hastags
        {
            $passstrt = strripos($question, "#") + 1;
            $answerstrt = stripos($question, "#") + 1;
            $answerend = strripos($question,"#") - $answerstrt;
            $trainqend = stripos($question, "#") - 6;
            $trainquest = trim(substr($question,6,$trainqend));
//            echo $trainquest;
            $trainanswer = trim(substr($question,$answerstrt, $answerend));
//            echo $trainanswer;
            $trainpass = trim(substr($question, $passstrt));
            if(trim(substr($question, $answerstrt, $answerend)) === "") // if there is no answer
            {
                $trqa = $conn->prepare("SELECT * FROM  chatbot WHERE question = '".$question."' ");
                    $trqa->execute();
                    $trqa->setFetchMode(PDO::FETCH_ASSOC);
                    $rows = $trqa->fetchAll();
                    if(count($rows)>0){ //if input is a question in db
                        $index = rand(0, count($rows)-1); //choose random row
                        $row = $rows[$index];
                        $answer = $row['answer'];
                            echo json_encode([
                                'status' => 1,
                                'answer' => $answer,  //returns one row answer
                            ]);
                        return;

                    }else{ //if input is not a question in db
                             echo json_encode([
                            'status' => 1,
                            'answer' => "Training Unsuccessfull! You forgot to add your desired answer. Do like so: 'train: question #answer #password' without the quote ofcourse."
                        ]);
                    return;
                    }
            }
            else // if there is answer
            {
                if($trainpass === "password") //if password is correct
                {
                    $sql = "insert into chatbot (question, answer) values ('".$trainquest."', '".$trainanswer."')";  //insert into database
                    $trqa = $conn->prepare($sql);
                    $trqa->execute();
                    $trqa->setFetchMode(PDO::FETCH_ASSOC);
                    echo json_encode([
                            'status' => 1,
                            'answer' => "Training successful!! Ask the same question to get an answer!"
                        ]);
                        return;
                }
                else //if password is not correct
                {
                    $trqa = $conn->prepare("SELECT * FROM  chatbot WHERE question = '".$question."' ");
                    $trqa->execute();
                    $trqa->setFetchMode(PDO::FETCH_ASSOC);
                    $rows = $trqa->fetchAll();
                    if(count($rows)>0){ //if input is a question in db
                        $index = rand(0, count($rows)-1); //choose random row
                        $row = $rows[$index];
                        $answer = $row['answer'];
                            echo json_encode([
                                'status' => 1,
                                'answer' => $answer,  //returns one row answer
                            ]);
                            return;

                    }else{ //if input is not a question in db
                             echo json_encode([
                            'status' => 1,
                            'answer' => "Training Unsuccessfull! Incorrect training password. Do like so: 'train: question #answer #password' without the quote ofcourse."
                        ]);
                        return;

                    }
                    return;
                }
            }
        }
        else //if it does not have 2 hashtags
        {
            $trqa = $conn->prepare("SELECT * FROM  chatbot WHERE question = '".$question."' ");
            $trqa->execute();
            $trqa->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $trqa->fetchAll();
            if(count($rows)>0){ //if input is a question in db
                $index = rand(0, count($rows)-1); //choose random row
                $row = $rows[$index];
                $answer = $row['answer'];
//                echo $answer;
                    echo json_encode([
                        'status' => 1,
                        'answer' => $answer,  //returns one row answer
                    ]);
                return;

            }else{ //if no answer for the question in database
                if(substr_count($question, "#") === 1) //if it has 1 hashtag
                {
                    $onlyhash = stripos($question, "#") + 1;
                    if(trim(substr($question, $onlyhash)) === "") //if no answer and password
                    {
                         echo json_encode([
                        'status' => 1,
                        'answer' => "Training Unsuccessfull! Please add desired answer and the training password, like so: 'train: question #answer #password' without the quote ofcourse."
                        ]);
                return;
                    }
                    else //if no password only
                    {
                         echo json_encode([
                        'status' => 1,
                        'answer' => "Training Unseccessfull! Please add the training password, like so: 'train: question #answer #password' without the quote ofcourse."
                        ]);
                return;
                    }
                }
                else //if it does not have 1 or 2 hashtags
                {
                    echo json_encode([
                    'status' => 1,
                    'answer' => "Training Unseccessfull! Please train with this pattern: 'train: question #answer #password' without the quote ofcourse."
                    ]);
                return;
                }

            }
        }
        return;
    }
    else // if it is a question
    {
        if(stripos($question, "aboutbot") === 0 && strlen($question) ===8)
        {
            echo json_encode([
                    'status' => 1,
                    'answer' => "I am Adina's PROTOTYPE! Version 1.0.Perfect. I am the prototype to the bot she created to take over the world...If that makes any sense at all."
                ]);
        }
        elseif(stripos($question, "deletequest(") === 0)
        {
            if((substr($question, 12, 1) === "'") && (substr($question, -2, 1) === "'") &&(substr($question, -1) === ")"))
            {
                $deletequest = '"'.preg_replace("([?!.])", "", trim(substr($question, 13, -2))).'"';
                deletequest($deletequest);
            }
            else
            {
                echo json_encode([
                    'status' => 1,
                    'answer' => "That function wasn't typed correctly. Please do it like so: deletequest('your question')"
                ]);
            }
        }
        else
        {
            $trqa = $conn->prepare("SELECT * FROM  chatbot WHERE question = '".$question."' ");
            $trqa->execute();
            $trqa->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $trqa->fetchAll();
            if(count($rows)>0){ //if input is a question in db
            $index = rand(0, count($rows)-1); //choose random row
            $row = $rows[$index];
            $answer = $row['answer'];
    //        echo $answer; //returns one row answer
                        echo json_encode([
                            'status' => 1,
                            'answer' => $answer,  //returns one row answer
                        ]);
                return;

            }else{ //if no answer for the question in database
                     echo json_encode([
                    'status' => 1,
                    'answer' => "I can't answer your question! Please train me like so: 'train: question #answer #password' without the quote ofcourse."
                ]);

            }
        }
        return;
    }  
	  
} else {

?>

<!DOCTYPE html>
<html lang= "en">
    
<head>
	<title>Aussie/Afrik...</title>
	<meta name= "keywords" content= "xdna, adina, adinadoes, website developer, webdev, web, web designer, web developer, framework, website">
	<meta name= "author" content= "Xdna">
    <link rel= "stylesheet" href= "css/font-awesome.css">
    <link rel= "stylesheet" href= "css/bootstrap.min.css">
    <style>
        *
        {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
        }

        html
        {
            height: 100%;
            width: 100%;
        }

        #div1
        {
            position: relative;
            height: calc(100vh);
            background-color: RGBA(30, 33, 71, 1);
            overflow: hidden;
        /*
            background: url(../images/c.png);
            background-repeat: no-repeat;
            background-position: bottom;
            background-attachment: scroll;
            background-size: cover;
        */
            width: 100%;
        /*    margin-top: 70px;*/
            display: flex;
        }
        
        #div11
        {
            position: relative;
            height:100%;
            width: 35%;
            background-color: transparent;
        }
        
        #div12
        {
            color: RGBA(142, 207, 211, 1);
            position: relative;
            height:100%;
            width: 65%;
            background-color: transparent;
        }
        
        #aboutme
        {
            position: relative;
            height: 50%;
            width: 75%;
            transform: translate(17%, 50%);
            -webkit-transform: translate(17%, 50%);
            -ms-transform: translate(17%, 50%);
            -o-transform: translate(17%, 50%);
            -moz-transform: translate(17%, 50%);
/*            background-color: black;*/
            text-align: center;
            font-family: "Elephant Regular";
            letter-spacing: 2.5px;
        }
        
        #img
        {
            height: 70%;
            width: 80%;
            left:10%;
            margin: auto;
            position: relative;
            top: 15%;
            background: url(<?php echo $image; ?>);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: scroll;
            background-size: cover;
        }
        
        #chatbot
        {
            position: relative;
            height: auto;
            width: 50%;
            left: 25%;
            background-color: RGBA(30, 33, 71, 1);
            border-radius: 5px;
        }
        
        #cbheader
        {
            position: relative;
            height: 40px;
            width: 100%;
            background-color: RGBA(30, 33, 71, 1);
            color: RGBA(142, 207, 211, 1);
            text-align: center;
        }
        
        #cbmain
        {
            position: relative;
            height: 400px;
            width: 100%;
            background-color: RGBA(142, 207, 211, 1);
            color: RGBA(142, 207, 211, 1);
            overflow-y: scroll;
            padding: 10px 10px 10px 10px;
        }
        
        .bot
        {
            position: relative;
            height: auto;
            text-align: left;
        }
        
        .bot>.note
        {
            background-color: black;
        }
        
        .you
        {
            position: relative;
            height: auto;
            text-align: right;
        }
        
        .you>.note
        {
            background-color: pink;
        }
        
        .note
        {
            font-size: 0.8em;
            width: 300px;
            display: inline-block;
            padding: 10px;
            margin: 0 5px 5px 5px;
            border-radius: 10px;
            line-height: 18px;
        }
        
        #cbtextfld
        {
            position: relative;
            height: 50px;
            width: 100%;
            background-color: transparent;
            color: RGBA(30, 33, 71, 1);
            display: flex;
        }
        
        #cbtextfld>form
        {
            position: relative;
            width: 100%;
            height: auto;
        }
        
        #cbtextfld>form>input
        {
            position: relative;
            height: 40px;
            top: 5px;
            width: 82%;
            left: 1.5%;
            background-color: white;
            color: RGBA(30, 33, 71, 1);
            padding: 5px;
            border: 0.5px solid #34495E;
            border-radius: 5px;
        }
        
        #cbtextfld>form>button
        {
            position: relative;
            height: 40px;
            top: 5px;
            width: 15%;
            left: 1%;
            background-color: white;
            color: RGBA(30, 33, 71, 1);
            border-radius: 5px;
            text-align: center;
            border: 0.5px solid #34495E;
        }
        
        @media (max-width:772px) {
            html
            {
            }
            
            #div1
            {
                display: block;
                height: 100%;
                overflow: visible;
            }
            
            #div11
            {
                position: relative;
                height: 100vh;
                width: 100%;
                background-color: transparent;
            }
            
            #div12
            {
                position: relative;
                height:auto;
                width: 100%;
                background-color: transparent;
            }
            
            #img
            {
                height: 70%;
                width: 60%;
                left: 0%;
            }
            
            #aboutme
            {
                height: auto;
                width: 80%;
                left: 10%;
                padding-bottom: 100px;
                transform: none !important;
            }
            
            #chatbot
            {
                width: 80%;
                left: 10%;
            }
        }
        
        @media (max-width:461px) {
            #chatbot
            {
                width: 100%;
                left: 0%;
            }
            
            .note
            {
                width: 200px;
            }
        }
        
        @media (max-width:374px) {
            #img
            {
                height: 280px;
                width: 60%;
                left: 20%;
                margin: 70px 0px 50px 0px;
            }
            #div11
            {
                display: block;
                height: 400px;
                overflow: visible;
            }
        }
    </style>
</head>

<body>
    <div id= "bodydiv">
<!--        My Profile        -->
        <div id="div1">
            <div class="divs" id= "div11">
                <div id="img"></div>
<!--                <img src="http://res.cloudinary.com/djdhcpx0q/image/upload/v1524662314/HNG%20Internship%204/IMG_20170924_104542.jpg">-->
            </div>
            <div class="divs" id="div12">
                <div id="aboutme">
                    <span> I am <b>@</b><b><?php echo $username; ?>!!!</b></span>
                    <p></p>
                    <span> Tch. Not true. Well it is true...technically. At least that is my Slack username on the HNG Internship 4 workspace. My birth name is <b><?php echo $name; ?></b>. If you are wondering what the <b>C.</b> is for, <b>Dont't!</b> You aren't going to find out. At least, not from me. If you won't call me Adina then Oluwatoyin is good, unless It is a mouthfull for you, then  you can call me Toyin.</span>
                    <p></p>
                    <span> I live for <span style="text-decoration:line-through;">JavaScript</span> <b>jQuery</b> though I am not that good at it. I also dabble in <b>HTML</b>, <b>CSS</b> and some <b>PHP</b>. So basically, I am a front-end developer. I am pretty ok at it, but I am terrible at coming up with good UI designs. So if you've got your UI ready, the site is as good as done.</span>
                    <p></p>
                    <span>Although you cannot contact my alter ego with <b>08012345678</b>,</span>
                    <p></p>
                    <span>You can at <b>alexandradonalds@gmail.com</b>.</span>
                </div>
            </div>
        </div>
<!--        My Chatbot       -->
        <div id="div2">
            <div id="chatbot">
                <div id="cbheader">
                    <span><b>Prototype</b></span>
                </div>
                <div id="cbmain">
                    <div class="bot"><div class="note">Hi, I am PROTOTYPE; a chatbot.</div></div>
                <div class="bot"><div class="note">You can ask me a question you want me to answer. You can train me to answer a specific question with a specific answer like so: <b>train: question #answer #password</b>. You can find out about me like so: <b>aboutbot</b>. You can decide to delete a question and all its possible answers from my memory, though they can be added back! like so <b>deletequest('your question')</b>.</div></div>
                </div>
                <div id="cbtextfld">
                    <form action="" method="post" id="thisform">
                        <input type="text" name="yourinput" id="yourinput" class="yourinput" placeholder="Ask or say anything you want...">
                        <button id="send" type="submit">Send!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/jquery-1.10.2.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="js/typed.js"></script>
<script type='text/javascript' src = "js/index.js"></script>
    <script type='text/javascript'>
         $("#thisform").on("submit", function(event) {
             event.preventDefault();
            var yourinput= $("#yourinput").val();
             $("#cbmain").append("<div class='you'><div class='note'>" + yourinput + "</div></div>");
             
             $.ajax({
				url: '/profiles/adina.php', //i will need to change this when pushing
				type: 'POST',
				data: {yourinput: yourinput},
				dataType: 'json',
				success: (response) => {
//                    alert("worked");
			        response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />'); 
			        let response_answer = response.answer;
			        $("#cbmain").append("<div class='bot'><div class='note'>" + response_answer + "</div></div>");      
			       	$('#cbmain').animate({scrollTop: $('#cbmain').get(0).scrollHeight}, 1100);     

				},
				error: (error) => {
	          		alert('error occured')
						console.log(error);
				}
				
			});
             
             $("form").each(function(event){
                    this.reset()
                });
             });	
    </script>
    
</html>
<?php } ?>
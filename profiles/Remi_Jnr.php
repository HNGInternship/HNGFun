<?php

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    if(!defined('DB_USER')){
        require "../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
    }
    try{
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);

        $result2 = $conn->query("Select * from interns_data where username='Remi_Jnr'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e){
        throw $e;
    }
    $secret_word = $result->secret_word;

}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    if(!defined('DB_USER')){
        require "../config.php";
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
        }
    }
    //require "../answers.php"; // This is the offending line that caused all the problem. I need to figure out how to use it correctly.
    date_default_timezone_set("Africa/Lagos");
    // header('Content-Type: application/json');
    if(!isset($_POST['question'])){
        echo json_encode([
            'status' => 1,
            'answer' => "Please type in a question"
        ]);
        return;
    }
    $question = $_POST['question']; //get the entry into the chatbot text field
    //check if in training mode
    $index_of_train = stripos($question, "train:");
    if($index_of_train === false){//then in question mode
        $question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
        $question = preg_replace("([?.])", "", $question); //remove ? and .
        //check if answer already exists in database
        $question = "%$question%";
        $sql = "select * from chatbot where question like :question";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $question);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if(count($rows)>0){
            $index = rand(0, count($rows)-1);
            $row = $rows[$index];
            $answer = $row['answer'];
            //check if the answer is to call a function
            $index_of_parentheses = stripos($answer, "((");
            if($index_of_parentheses === false){ //then the answer is not to call a function
                echo json_encode([
                    'status' => 1,
                    'answer' => $answer
                ]);
            }else{//otherwise call a function. but get the function name first
                $index_of_parentheses_closing = stripos($answer, "))");
                if($index_of_parentheses_closing !== false){
                    $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
                    $function_name = trim($function_name);
                    if(stripos($function_name, ' ') !== false){ //if method name contains whitespaces, do not invoke any method
                        echo json_encode([
                            'status' => 0,
                            'answer' => "The function name should be without white spaces"
                        ]);
                        return;
                    }
                    if(!function_exists($function_name)){
                        echo json_encode([
                            'status' => 0,
                            'answer' => "I am unable to find the function you require"
                        ]);
                    }else{
                        echo json_encode([
                            'status' => 1,
                            'answer' => str_replace("(($function_name))", $function_name(), $answer)
                        ]);
                    }
                    return;
                }
            }
        }else{
            echo json_encode([
                'status' => 0,
                'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
            ]);
        }
        return;
    }else{
        //in training mode
        //get the question and answer
        $question_and_answer_string = substr($question, 6);
        //remove excess white space in $question_and_answer_string
        $question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));

        $question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
        $split_string = explode("#", $question_and_answer_string);
        if(count($split_string) == 1){
            echo json_encode([
                'status' => 0,
                'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
            ]);
            return;
        }
        $que = trim($split_string[0]);
        $ans = trim($split_string[1]);
        if(count($split_string) < 3){
            echo json_encode([
                'status' => 0,
                'answer' => "training password required"
            ]);
            return;
        }
        $password = trim($split_string[2]);
        //verify if training password is correct
        define('TRAINING_PASSWORD', 'password');
        if($password !== TRAINING_PASSWORD){
            echo json_encode([
                'status' => 0,
                'answer' => "invalid training password"
            ]);
            return;
        }

        //insert into database
        $sql = "insert into chatbot (question, answer) values (:question, :answer)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $que);
        $stmt->bindParam(':answer', $ans);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        echo json_encode([
            'status' => 1,
            'answer' => "Thank you, I am now smarter"
        ]);
        return;
    }
    echo json_encode([
        'status' => 0,
        'answer' => "I can't answer that right now, please train me.The format...<br> <b>train: question#answer#password</b>"
    ]);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Remi_Jnr | Profile</title>
   <style>
	body{
	position: relative;
	bottom: 0px;
	color: inherit;
	}
   .main{
   background-color: #96deda;
   margin: auto;
   width: 45em;
   height: 34em;
   border-color: grey;
   border-radius: 1.27em;
   position: relative;
   bottom: 30px;
}
.d{
   width: 195px;
   background-color: white;
   color: #625be7;
   margin-top: 1em;
   font-size: 2.1em;
   margin-bottom: 0em;
   border-top-right-radius: 30px;
   border-bottom-style : solid black;
   text-shadow: 0 0 3px #FF0000;
}
#me{
    font-size: 2.09em;
   text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
}
hr{
   margin: 0px;
   height: 4px;
   border-top: none;
   background-color: white;
   
}
#div1{
   width: 40em;
   height: 41em;
   position: relative;
   bottom: 4em;
   left: 0px;
   border-right-width: 0.2em;
}
img{
	box-shadow: 5px 5px 5px rgb(25,20,60);
	top: 5em;
   margin: auto;
   position:relative;
   left: 13em;
   z-index: 1;
   border: groove ;
   border-width: 20px;
   border-radius: 50%;
   
   background-color: #625be7;
}
#details{
   height: 13em;
   width: 45em;
   position: absolute;
   bottom: 10px;
   left: 0px;
   background-color: #625be7;
   border-radius: 20px;
   border-top-left-radius: 40px;
   border-top-right-radius: 40px;
}
#span{
   font-style: italic;
   font-size: 2em;
   text-align: center;
   text-shadow: 5px 5px 3px darkseagreen;
   opacity: 0.9;
   color: cyan;
}</style>
</head>
<body>
   
      <div class="main">
          <div id="div1">
              <img src="http://res.cloudinary.com/remijr/image/upload/v1524646974/FB_IMG_15233947670837503.jpg">
            <div id="details">
                <span>
                    <p class="d">Details<hr></p>
                    <div id="span"> Hi, Sweet! The name is <strong>Remi_Jnr</strong><br> and I am a Developer</div>
                </span>
               
            </div>
          </div>
      </div>
      <script>
          console.log("Hello World");
      </script>
  </body>
</html>
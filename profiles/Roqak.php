<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
if(!defined('DB_USER')){
require "../../config.php";
 try {
     $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
 } catch (PDOException $pe) {
     die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
 }
}
// include_once "db.php";
// include 'answers.php';

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'roqak'");
$user = $result2->fetch(PDO::FETCH_OBJ);
//////////////////////////////////////////////////////////////
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // include '../answers.php';
      
      try{

        if(!isset($_POST['question'])){
          echo json_encode([
            'status' => 1,
            'answer' => "Please provide a question"
          ]);
          return;
        }

        //if(!isset($_POST['question'])){
        $mem = $_POST['question'];
        $mem = preg_replace('([\s]+)', ' ', trim($mem));
        $mem = preg_replace("([?.])", "", $mem);
      $arr = explode(" ", $mem);
      //test for training mode

      if($arr[0] == "train:"){

        unset($arr[0]);
        $q = implode(" ",$arr);
        $queries = explode("#", $q);
        if (count($queries) < 3) {
          # code...
          echo json_encode([
            'status' => 0,
            'answer' => "You need to enter a password to train me."
          ]);
          return;
        }
        $password = trim($queries[2]);
        //to verify training password
        define('trainingpassword', 'password');
        
        if ($password !== trainingpassword) {
          # code...
          echo json_encode([
            'status'=> 0,
            'answer' => "You entered a wrong passsword"
          ]);
          return;
        }
        $quest = trim($queries[0]);
        $ans = trim($queries[1]);

        $sql = "insert into chatbot (question, answer) values (:question, :answer)";

        $stmt = $conn->prepare($sql);
            $stmt->bindParam(':question', $quest);
            $stmt->bindParam(':answer', $ans);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

        
        echo json_encode([
          'answer' => "Thanks for training me, you can now test my knowledge"
        ]);
        return;
      }
      elseif ($arr[0] == "help") {
        echo json_encode([
          'answer' => "You can train me by using this format ' train: This is a question # This is the answer # password '. You can also convert cryptocurrencies using this syntax.'convert btc to usd"
          
        ]);
        return;
        
      }
      elseif ($arr[0] == "convert") {
        # code...
        $from = $arr[1];
        $to = $arr[3];
        $converted_price = GetCryptoPrice($from, $to);
        $price = "1 " . $from . " = " . $to . " " . $converted_price ;
        echo json_encode([
          'answer' => $price
        ]);
        return;
      }
        elseif ($arr[0] == "aboutbot") {
          # code...
          echo json_encode([
            'answer' => "I am VEER, Version 1.0 "
          ]);
          return;
        }
        else {
          $question = implode(" ",$arr);
          //to check if answer already exists in the database...
          $question = "$question";
          $sql = "Select * from chatbot where question like :question";
            $stat = $conn->prepare($sql);
            $stat->bindParam(':question', $question);
            $stat->execute();

            $stat->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stat->fetchAll();
            if(empty($rows)){
              echo json_encode([
              'answer' => "I am sorry, I cannot answer your question now. Why don't you train me?"
            ]);
            return;
          }else{
            $rand = array_rand($rows);
            $answer = $rows[$rand]['answer'];

            $index_of_parentheses = stripos($answer, "((");
              if($index_of_parentheses === false){// if answer is not to call a function
                echo json_encode([
                  'answer' => $answer
                ]);
                return;
              }else{//to get the name of the function, before calling
                  $index_of_parentheses_closing = stripos($answer, "))");
                  if($index_of_parentheses_closing !== false){
                      $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
                      $function_name = trim($function_name);
                      if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
                         echo json_encode([
                          'answer' => "The function name should not contain white spaces"
                        ]);
                        return;
                      }
                    if(!function_exists($function_name)){
                      echo json_encode([
                        'answer' => "I am sorry but I could not find that function"
                      ]);
                    }else{
                      echo json_encode([
                        'answer' => str_replace("(($function_name))", $function_name(), $answer)
                      ]);
                    }
                    return;
                  }
              }
          }       
        }
    }catch (Exception $e){
      return $e->message ;
    }
  }

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <title> <?php echo $user->name ?> </title>
  <style type="text/css">
  .white{
    color: white;
    margin-top: 20%;
    font-family: Alfa Slab One;
  }
  body{
    background-color: red;
  }
  #hello{
    font-size: 90px;
  }
  a{
    font-size: 40px;
    color: white;
    text-decoration: none;
    margin: 14px;
  }
  .mainn{
    height: 100%;
  }
  .chat{
    /*margin-top:9%;*/
    background-color: #fff;
    /* margin-bottom: 9%; */
    /*width: 100%;*/
    height: 90%;
    width: 400px;
    float: right;
    margin-top: 10%;
    margin-left: 5%;
  }
  .padedd{
    margin-top: 5%;
  }
  li{
    list-style-type: none;
  }
  #botresponse{
    background-color: #2E7CAF;
    color: white;
    width: 100%;
    margin-bottom: 2%;
    float: left;
    margin-left: 56px;
    /*width: 60%;*/
  }
  #sentmessage{
    background-color: gray;
    color: white;
    width: 100%;
    margin-bottom: 2%;
    float: right;
    margin-left: 56px;
    /*width: 60%;*/
  }
  #mchats{
    /*overflow-y: scroll;*/
    max-height: 90%;
    height: 90%;
    
  }
  #chats{
    height: 90%;
    max-height: 90%;
    overflow-y: scroll;

  }
  #bbb{
    border-radius: 5%;
    min-height: 80%;
    max-height: 80%;
    height: 80%;
  }
  .roww{
    display: flex;
    width: 100%;
    margin-top: 20%;
  }
  </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="jquery-3.3.1.min.js"></script> -->
<body>
<div class="container">
<div class="roww">
 <div class="mainn">
   <div class="white text-center">
    <h1 id="hello">HELLO</h1>
    <h3>I AM <?php echo $user->name ?>  HNG INTERN.</h3>
                <a href="" target="https://www.facebook.com/badoo.akin">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-instagram"></i>
                </a>
                <a href="" target="https://slack.com/roqak">
                  <i class="fa fa-slack"></i>
                </a>
     </div>
   </div>
   <div id="bbb" class="chat" height="500px;">
      <div><h1 class="text-center"> My ChatBot</h1></div>
          <div id="chats">
       <p id ='botresponse'>VEER : Hello I'm VEER, to train me type: train: question#response#password </p>
        </div>  
         <form class="padedd" methood="post" id="formm">
      <input type="text" placeholder="message" name="question"><button id="send" name="send">Send</button>
      </form>    
      </div>

  </div>
  </div>
</div>
<script>
$(document).ready(function(){
  var Form = $('#formm');
  Form.submit(function(e){
    e.preventDefault();
    var MBox = $('input[name=question]');
    var question = MBox.val();
    $("#chats").append("<p id='sentmessage'>YOU : " + question + "</p>");


    // $.ajax({
    //  url: 'Roqak.php',
    //  type: 'POST',
    //  dataType: 'json',
    //  data: {question: question},
    //  success: function(response){
    //  console.log("sucess");
    //  $("#chats").append(`<li> ${response.answer} </li>`);
    //  },
    //  error: function(error){
    //    alert('error occured   ' + error);
    //    console.log(error);
    //  }
    // } )
    $.ajax({
      url: "/profiles/Roqak.php",
      type: "post",
      data: {question: question},
      dataType: "json",
      success: function(response){
        $("#chats").append("<p id ='botresponse'>VEER : " + response.answer + "</p>");
      },
      error: function(error){
        console.log(error);
        alert(error);
      }
    })

  });
});
</script>
</body>
</html>


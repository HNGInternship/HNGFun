<?php 
    date_default_timezone_set('Africa/Lagos');
        if (!defined('DB_USER')){
            
            require "../../config.php";
        }
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
          } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
          }
    try {
    $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not query the database:" . $e->getMessage());
      }
    $result = $q->fetch();
    $secret_word = $result['secret_word'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $ask = $_POST['ask'];
    
        //check if bot is training
        $train_bot = stripos($ask, "train:");
          if($train_bot === false){
            
            //Bot is not training, ask your question, but remove question mark and dot
            $ask = preg_replace('([\s]+)', ' ', trim($ask));
            $ask = preg_replace('([?.])', "", $ask);
            //if the answer is already in the database, do this:
            $ask = "$ask";
            $sql ="SELECT * FROM chatbot WHERE question LIKE :ask";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ask', $ask);
            $stmt->execute();
            $stmt->setFetchMode(FETCH_ASSOC);
            $rows = $stmt->fetchAll();
            if(count($rows)>0){
              $index = rand(0, count($rows)-1);
              $row= $rows[$index];
              $answer = $row['answer'];
                echo json_encode([
                  'status' => 1,
                  'answer' => $answer
                ]);
          }else{
            echo json_encode([
                'status' => 0,
                'answer' => "I dont have an answer to that question. Am not that intelligent you know. But you can make me be. Please train me. Type <strong>train: question # answer # password"
              ]);
          }
          return;
      }else{
        //Enter the training mode
        $ask_ans = substr($ask, 6);
        //remove excess white space in $ask_ans
         $ask_ans = preg_replace('([\s]+)', ' ', trim($ask_ans));
         //remove ? and . so that questions missing ? (and maybe .) can be recognized
         $ask_ans = preg_replace("([?.])", "", $ask_ans);
         $separate = explode("#", $ask_ans);
         if(count($separate) == 1){
          echo json_encode([
            'status' => 0,
            'answer' => "It seems you didnt enter the format correctly. \n Here, Let me help you: \n Type: <strong>train: question # answer # password"
            ]);
          return;
         }
         $que = trim($separate[0]);
         $ans = trim($separate[1]);
         if(count($separate) < 3){
          echo json_encode([
            'status' => 0,
            'answer'=> "You need to type the training password to train me"
            ]);
          return;
         }
         //Lets know what the password is
         
         $password = trim($separate[2]);
         define('TRAINING_PASSWORD', 'password');
         //verify if training password is correct
         if($password !== TRAINING_PASSWORD){
          echo json_encode([
            'status' => 0,
            'answer' => "You can't train me with that password, check it and train again"
            ]);
          return;
         }
         //put results into database
         $sql = "INSERT INTO chatbot (question, answer) VALUES (:question, :answer)";
         $stmt= $conn->prepare($sql);
         $stmt->bindParam(':question', $que);
         $stmt->bindParam(':answer', $ans);
         $stmt->execute();
         $stmt->setFetchMode(FETCH_ASSOC);
         echo json_encode([
            'status' => 1,
            'answer' => "I have learnt a new thing today, Thank you. You can now test me"
          ]);
         return;
      }
      echo json_encode([
      'status' => 0,
      'answer' => "I cant grasp this, try me another time. Thanks."
    ]); 
  }else {
?>   

  <div class="bot-body">
    <div class="messages-body">

      <div>
        <div class="message bot">
          <span class="content">Look alive</span>
        </div>
      </div>
    </div>
    <div class="send-message-body">
      <input class="message-box" placeholder="Type here..."/>
	    <button type="submit" class="message-btn">
      </button>
    </div>
  </div>

<style>
  .message-btn {
    background-color: #fff;
    padding: 0px;
    border-radius: 50%;
    border: none;
    font-size: 16px;
    grid-column-start: 4;
  }
  .message-btn > div {
    margin-top: 0px;
    margin-right: 2px;
  }

footer {
	display: none;
	padding: 0px !important;
}
	
  .bot-body {
		max-width: 100% !important;
    position: fixed;
    /* top: 0; */
    margin: 32px auto;
    position: fixed;
    width: 100%;
    left: 0;
    bottom: 0px;
		height: 25%;
    /* box-sizing: border-box; */
    /* box-shadow: 1px 1px 9px; */
  }

  .messages-body {
    background-color: white;
    color: #3A3A5E;
    padding: 10px;
    overflow: auto;
    width: 100%;
    border-top: 1px solid #f1f1f1;
    padding-bottom: 50px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .messages-body > div {
    background-color: white;
    color: #3A3A5E;
    padding: 10px;
    overflow: auto;
    width: 100%;
    padding-bottom: 50px;
  }

  .message {
    float: left;
    font-size: 16px;
    background-color: #007bff63;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
  }

  .message:before {
    position: absolute;
    top: 0;
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
  }

  .message.bot:before {
    border-color: transparent #9cccff transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
  }
	.color-change {
  border-radius: 5px;
  font-size: 20px;
  padding: 14px 80px;
  cursor: pointer;
  color: #fff;
  background-color: #00A6FF;
  font-size: 1.5rem;
  font-family: 'Roboto';
  font-weight: 100;
  border: 1px solid #fff;
  box-shadow: 2px 2px 5px #AFE9FF;
  transition-duration: 0.5s;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
}

.color-change:hover {
  color: #006398;
  border: 1px solid #006398;
  box-shadow: 2px 2px 20px #AFE9FF;
}
  .message.you:before {
    border-width: 10px 10px 0 0;
    right: -9px;
    border-color: #edf3fd transparent transparent transparent;
  }
  
  .message.you {
    float: right;
  }

  .content {
    display: block;
		color: black;
  }

  .send-message-body {
		position: fixed;
    width: 100%;
    left: 0;
    bottom: 0px;
    box-sizing: border-box;
    box-shadow: 1px 1px 9px 0px rgba(1, 1, 1, 1);
  }

  .message-box {    
		width: -webkit-fill-available;
    border: none;
		padding: 2px 4px;
    font-size: 18px;
  }


  body {
		overflow: hidden;
    height: 100%;
		background: white !important;
  }

	.container {
    max-width: 100% !important;
}

</style>
<script>
$(document).ready(function(){
  var askForm = $("#send-message-body");
  askForm.submit(function(e){
    e.preventDefault();
    });
  $(".messages-body").animate({ scrollTop: $(document).height() }, "fast");
  $("")
  
    function currentMessage(){
        var msg = $('.ask-input input').val();
        if($.trim(msg) == ''){
          return false;
        }
         $('<div class="ask me">' + msg + '</div>').appendTo($('.messages-body'));
        $(".messages-body").animate({ scrollTop: $(document).height() }, "fast");
      };
      $('.submit').click(function(){
        currentMessage();
        getAnswer();
      });
     $(window).on('keydown', function(e){
        if (e.which == 13) {
          currentMessage();
          getAnswer();
          return false;
      }
    });
   
    //Transfer the question asked to the server
    function getAnswer(){
      let ask = $("#message").val();
      if($.trim(ask) == ''){
        return false;
      }
    $.ajax({
      url: '/profiles/dennisotugo.php',
      data: {ask: ask},
      dataType: 'json',
      type: 'POST',
      success: (response) => {
        if(response.status == 1){
        $('<div class="message bot">' + response.answer + '</div>').appendTo($('.messages-body'));
        $('.message-box input').val(null);
        $(".messages-body").animate({ scrollTop: $(document).height() }, "fast");
      }else if(response.status == 0){
          $('<div class="message bot">' + response.answer + '</div>').appendTo($('.messages-body'));
          $('.message-box input').val(null);
            $(".messages-body").animate({ scrollTop: $(document).height() }, "fast");
      }
      },
      error: (error) => {
        console.log(error);
      }
    })
  }
});
</script>
<?php } 
?>

<?php
$sql = "SELECT * FROM interns_data WHERE username = 'dennisotugo'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$dennisotugo = array_shift($data);
// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];
?>
/************************SET UP DB CONN************************/
<?php
if(!defined('DB_USER')){
  require "../../config.php";
}
try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
global $conn;


$stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question='$check' ORDER BY rand() LIMIT 1");
$stmt->execute();
if($stmt->rowCount() > 0)
{
  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
		echo $row["answer"];
  }
} else {
    echo "Well i couldnt understand what you asked. But you can teach me.";
	echo "Type ";
	echo "train: write a question | write the answer.  "; 
	echo "to teach me.";
}
}


function train_bot ($message) {
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
//$text = "#train: this a question | this my answer :)";
$exploded = multiexplode(array(":","|"),$message);
$question = trim($exploded[1]);
$answer = trim($exploded[2]);
require 'db.php';
try {
    
    $sql = "INSERT INTO chatbot (id, question, answer)
VALUES ('', '$question', '$answer')";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    echo "Thank you! i just learnt something new, my master would be proud of me.";
	
	}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
$conn = null;

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
    </div>
  </div>

<style>

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
// send the message to user
function send_message(message){
      var prevSms = $('#opheuscont').html();
      if (prevSms.length > 8) {
        prevSms = prevSms + '<br>'
        }
      $('#opheuscont').html(prevSms + '<span class="cureent_sms">' + '<span class="bot">opheusbot: </span>' + message + '</span>');
	  $('#opheuscont').scrollTop($('#opheuscont').height());
      $('.cureent_sms').hide();
      $('.cureent_sms').delay(50).fadeIn();
      $('.cureent_sms').removeClass("current_sms");
    }
	
	
	// main JQuery function
$(function() {
      get_username();
      $('#text-sms').keypress(function(event){
        if (event.which == 13) {
          if ($('#enter').prop('checked')){
            $('#send-button').click();
            event.preventDefault();
          }
        }
      });
    $('#send-button').click(function(){
        var username = '<span class="username">You: </span>'
        var sms = $('#text-sms').val();
        $('#text-sms').val('');
          //store the first sms
        var prevSms = $('#opheuscont').html();
          //check if prev sms length is greater than 8
        if (prevSms.length > 8) {
          prevSms = prevSms + '<br>'
          }
        //show the sms to the opheuscont div
        $('#opheuscont').html(prevSms + username + sms);
        $('#opheuscont').scrollTop($('#opheuscont').prop('scrollHeight'));
        ai(sms);
      });
});
	
	
</script>
<?php } 
?>

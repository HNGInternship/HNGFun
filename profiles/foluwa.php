
<?php //DATE
 $d = date("h:i:sa");
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  require '../../config.php';
else
  require '../config.php';
try {
  $db_conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
  $secret_word = $db_conn->query('SELECT secret_word FROM secret_word')->fetch(PDO::FETCH_OBJ)->secret_word;
  $user = $db_conn->query('SELECT * FROM interns_data WHERE username="foluwa"')->fetch(PDO::FETCH_OBJ);
}
catch (PDOException $e) {
  die('Error: ' . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  include '../answers.php';
  $message = $_POST['message'];  
  $syntax = 'Please, use the format <code>train: question # answer # password</code> to train me.';
  function pick_one(Array $answers)
  {
    return $answers[random_int(0, count($answers) - 1)];
  }
  function escape_apostrophe(String $string)
  {
    return str_replace("'", "\\'", $string);
  }
  function validate_answer(String $answer)
  {
    $matches = [];
    if (preg_match_all('/.*\(\((?<functions>[[:alnum:]_]+)\)\).*/', $answer, $matches)) {  
      $functions = array_map(function ($function) {
        if (function_exists($function)) return $function;
        return sendResponse(200, "The function, '$function', is not available to me at the moment.");
      }, $matches['functions']);
    }
    return count($functions);
  }
  function function_replace(String $string)
  {
    $matches = [];
    $matched = preg_match_all('/.*\(\((?<functions>[[:alnum:]_]+)\)\).*/', $string, $matches);
    if ($matched) {
      $functions = $matches['functions'];
      foreach ($functions as $function) {
        $string = str_replace("(($function))", $function(), $string);
      }
      return $string;
    }
    return $string;
  }
  function sendResponse($status, $message, $type = 'text')
  {
    http_response_code($status);
    echo json_encode([
      'message' => nl2br($message),
      'type' => $type,
    ]);
    exit;
  }
  function show($option = 'commands')
  {
    $fails = [
      'I DONT KNOW THAT.',
      'Would you teach me.',
      '',
    ];
    $contains_command = (bool) preg_match('/.*command.*/', $option);
    if ($contains_command) return sendResponse(200, getListOfCommands());
    return sendResponse(200, pick_one($fails));
  }
  function send_url($url)
  {
    $link = trim($url);
    if (filter_var("http://$link", FILTER_VALIDATE_URL) === false) return sendResponse(200, 'That is an invalid link.');
    return sendResponse(200, $url, 'url');
  }
<<<<<<< HEAD
  function train_alfred(String $instruction = '')
=======

  function train_zoe(String $instruction = '') 
>>>>>>> 5c663863828d43d2f4d816767f80e3c439d708a2
  {
    global $db_conn;
    global $syntax;
    $invalid_password = [
      'You entered an invalid training password.',
    ];
    $success = [
      'Thank you, Gracias!.',
      'I want to learn more',
    ];
    $failure = [
        'You inputted the wrong format, please try again.',
    ];
    $instructions = explode('#', $instruction);
    $instructions = array_map('trim', $instructions);
    if (count($instructions) !== 3)
      return sendResponse(200, $syntax);
    if ($instructions[2] !== 'password')
      return sendResponse(200, pick_one($invalid_password));
    validate_answer($instructions[1]);
    $instructions = array_map('escape_apostrophe', $instructions);
    $query = "INSERT INTO chatbot (question, answer) VALUES ('$instructions[0]', '$instructions[1]')";
    $send_training_data = $db_conn->prepare($query);
    $query_success = $send_training_data->execute();
    if ($query_success)
        return sendResponse(201, pick_one($success));
    return sendResponse(200, pick_one($failure));
  }
  function reply($message)
  {
    global $db_conn;
    global $syntax;
    $dumb = [
      'I do not know what that means',
    ];
    $question = str_replace('?', '', $message);
    $question = escape_apostrophe($question);
    $question = trim($question);
    $answers = $db_conn->query("SELECT answer FROM chatbot WHERE question LIKE '%$question%'")->fetchAll(PDO::FETCH_OBJ);
    if (empty($answers)) {
      $reply = pick_one($dumb)."\n".$syntax;
      sendResponse(200, $reply);
    }
    $answer = pick_one($answers)->answer;
    if (validate_answer($answer))
      return sendResponse(200, function_replace($answer));
    return sendResponse(200, $answer);
  }
  $messageParts = array_map('trim', explode(':', $message));
  switch($messageParts[0]) {
    case 'show':
      show($messageParts[1]);
      break;
    case 'open':
      unset($messageParts[0]);
      $url = implode(':', $messageParts);
      send_url($url);
      break;
    case 'train':
      unset($messageParts[0]);
      $command = implode(':', $messageParts);
      train_alfred($command);
      break;
    default:
      reply($message);
  }
<<<<<<< HEAD
} else {

?>


=======
}  else {

?>

>>>>>>> 5c663863828d43d2f4d816767f80e3c439d708a2
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Foluwa hng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">
      body {
          height: 100%;
          background-color: #87ceeb;
          background: linear-gradient(to bottom right, #DDA0DD,  #87ceeb);
      }
      img{
          border-radius: 50%;
          max-height: 250px;
          max-width: 250px;
      }
      input[type=text] {
          width: 50%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
          border-radius: 4px;
          background-color: skyblue;
          color: white;
        }
         input[type=text]:focus{
           border: 3px solid #555;
         }
         button{
            border: 3px solid #555;
            text-decoration: none;
            margin: 4px 2px;
            border-radius: 4px;
         }
      .socialMediaIcons {
          font-size: 25px;
      }
      #meSection{
          border: 2px black solid;
          width: 50%;
          height:auto;
      }

      #botSection{
         border: 2px red solid;
         width: 47%;
         height:auto;
         padding: 10px;
}
      .botSend{
         position: absolute; 
        color: red;
        right: 100px;
        background-color: yellow;
        border-radius: 4px;

      }
      .humanSend {
        position: absolute; 
        color: green;
        right: 0px;
        background-color: blue;
        border-radius: 4px;
      }
  </style>
</head>
<body>
    <main class="container content">
      <div class="row">
            <div class="col-sm-6" id="meSection">
                     <div class="socialMedia">
                       <img src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg">
                      <span class="name"><?php echo $user->name; ?></span>
      									<div class="socialMediaIcons">
      										<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
      										<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
      										<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
      										<a href="https://github.com/foluwa"><i class="fa fa-github"></i></a>
      										<a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a>
                        </div>
                      </div>
             </div>
          
           <div class="col-sm-6" id="botSection">
                <div class="chat-head">Chat Interface</div>
                    <div class="chat">
                        <div id="conversation">
                          <p class="bot botSend" style="margin-top:0px;left:0px;">
                              <strong><?php echo $d ?></strong>
                          </p>
                        </div>
                        <div style="position:fixed;bottom:0;">
                        <form id="chat" class="box" action="foluwa.php" name="message" method="post">
                          <textarea type="text" id="message" class="message" placeholder="Enter your text" wrap="soft" rows=1 autofocus></textarea>
                          <button id="send" class=send type=submit>Send</button>
                        </form>
                        </div>
                    </div>
                </div>
           </div>
      </div>
      <footer>Foluwa @ <a href="https://hotels.ng">Hotels.ng</a></footer>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<script>
const messageField = document.getElementById('message');
const sendButton = document.getElementById('send');
const conversation = document.getElementById('conversation');
const messageForm = document.getElementById('chat');
messageField.scrollIntoView();
const appendMessage = function (text, from) {
    const message = document.createElement('p');
    message.style.cssText = 'color:blue; 
                               font-size:25px;
                               width:auto; 
                               border-radius:4px;
                               background-color: yellow;';
    message.innerHTML = text;
    message.className = from;
    conversation.appendChild(message);
    conversation.scrollTop = conversation.scrollHeight;
};

const retractMessage = function (from = 'you') {
    const messages = jQuery(`p.${from}`);
    const message = messages[messages.length - 1];
    message.remove();
    messageField.value = message.innerText;
    return message.innerText;
};

messageField.oninput = function () {
    if (this.value[this.value.length - 1] === "\n") {
        this.value = this.value.replace(/\n/g, '');
        sendButton.click();
        return false;
    }
    return true;
};

messageForm.onsubmit = function (e) {
    e.preventDefault();
    const handleError = function (xhr) {
        if (String(xhr.status)[0] == 4) {
            retractMessage();
            appendMessage('Kindly, check your internet connection.', 'bot');
        }
        if (String(xhr.status)[0] == 5)
            appendMessage('something is wrong ', 'bot');
    };
    const useResult = function (res) {
        if (res.type === 'url') {
            const u = new URL('http://example.com');
            u.hostname = res.message;
            return window.open(u.toString(), '_blank');
        }
        appendMessage(res.message, 'bot');
    };
    appendMessage(messageField.value, 'you');
    if (messageField.value.trim().toLowerCase() === 'aboutbot')
        appendMessage('zoe version1.0', 'bot');
    else $.ajax({
        type: 'POST',
        url: '/profiles/foluwa.php';  //'/profiles/foluwa.php',
        data: {message: messageField.value},
        dataType: 'json',
        success: useResult,
        error: handleError,
    });
    messageField.value = '';
};
</script>

<?php

$db_conn = null;

?>
</html>
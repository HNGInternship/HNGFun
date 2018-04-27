<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  require '../../config.php';
else
  require '../config.php';
try {
  $db_conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);

  $secret_word = $db_conn->query('SELECT secret_word FROM secret_word')->fetch(PDO::FETCH_OBJ)->secret_word;

  $user = $db_conn->query('SELECT * FROM interns_data WHERE username="tobalase"')->fetch(PDO::FETCH_OBJ);
}
catch (PDOException $e) {
  die('Error: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  include '../answers.php';

  $message = $_POST['message'];

  $synonyms = [
    'hi' => ['hello', 'hola'],
    'bye' => ['good bye', 'bye bye', 'adios'],
    'speak' => ['talk', 'say'],
  ];

  $map = [
    'hi' => '',
  ];

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
      'I am sorry, I cannot show you that.',
      'I do not know what that is.',
      'What is that? I guess I need more exposure.',
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

  function train_alfred(String $instruction = '')
  {
    global $db_conn;
    global $syntax;
    $invalid_password = [
      'You entered an invalid training password.',
    ];
    $success = [
      'Hmmm, more NZT please.',
      'Thank you, I could use more of that.',
      'Would I be greedy to ask for more training?',
    ];
    $failure = [
        'Something went wrong somewhere. Please check your syntax.',
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
      'Oops, I guess I am not so smart.',
      'Forgive me, I have failed.',
      'I could use some help.',
      'I do not know what to say to that.',
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
} else {


?>
<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
<link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?9ukd8d">
<link rel="stylesheet" href='https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css'>
<style>
div.content {
  margin-top: 60px;
}

img {
  filter: gray;
  -webkit-filter: grayscale(1);
  filter: grayscale(1);
}

img:hover {
  -webkit-filter: grayscale(0);
  filter: none;
}

.social a span, .skills i {
  font-size: 30px;
  padding: 10px ;
}

.social a {
  text-decoration: none;
}

.socicon-github, .socicon-mastodon {
  color: #000;
  text-decoration: none;
}

.socicon-github:hover {
  background-color: #221e1b;
  color: #fff;
}

.socicon-mastodon:hover {
  background-color: #2986d6;
  color: #fff;
}

.my-profile-picture {
  # border-radius: 50%;
  border: 4px solid black;
  width: 180px;
}

p {
  font-family: 'Montserrat', sans-serif;
  margin-bottom: 10px;
  text-align: center;
}

.name {
  font-size: 24px;
  font-weight: bold;
}

.my-profile {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  border: 4px solid black;
  width: auto;
  padding: 20px;
}

.skills, .social {
  margin: 10px 0 10px 0;
}

.devicon-html5-plain.sq:hover {
  background-color: #e54d26;
  color: #fff;
}
.devicon-css3-plain.sq:hover {
  background-color: #3d8fc6;
  color: #fff;
}
.devicon-php-plain.sq:hover {
  background-color: #6181b6;
  color: #fff;
}
.devicon-nodejs-plain.sq:hover {
  background-color: #83CD29;
  color: #fff;
}
.devicon-ruby-plain.sq:hover {
  background-color: #d91404;
  color: #fff;
}
.devicon-javascript-plain.sq:hover {
  color: #f0db4f;
  font-size: 30px;
  padding: 10px;
  margin: 0;
  width:50px;
  height:50px;
  background: linear-gradient(to bottom, #fff 0%, #f0db4f 100%);
  margin:0 auto;
  margin-top:50px;
  background: #fff;
  box-shadow: inset 0 0 0 13px #f0db4f;
}

.skills i {
  vertical-align: middle;
}

.bot, .you, .chat, .message {
  border: 4px solid black;
  background: #fff;
  color: #000;
}

.bot, .you, .message {
  padding: 10px;
}

.bot, .you, .message, .send {
  margin: 10px;
  display: block;
}

.bot, .you {
  width: auto;
}

.message {
  width: 100vh;
}

.bot::before, .you::before {
  white-space: pre;
  text-decoration: underline;
}

.bot::before {
  content: "Alf\A";
  color: purple;
}

.you::before {
  content: "You\A";
  color: #2f9c5a;
}

.bot {
  text-align: left;
  padding-left: 10px;
}

.you {
  text-align: right;
  padding-right: 10px;
}

.box {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.message {
  resize: none;
  width: 70vw;
}

.send {
  border: 4px solid black;
  background-color: #000;
  color: #fff;
  height: inherit;
  width: 10vw;
}

.conversation {
  max-height: 80vh;
  overflow-y: auto;
}

.chat {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  height: 80vh;

}

.chat-head {
  font-family: 'Montserrat', sans-serif;
  background-color: #000;
  color: #fff;
  width: 100%;
  text-align: center;
  margin: 0;
}

.conversation {
  justify-self: stretch;
}
</style>

<div class="content">
  <div class="my-profile">
    <p>
    <span class="name"><?php echo $user->name; ?></span>
    <br>
    <span class="username">(@<?php echo $user->username; ?>)</span>
    </p>
    <img class="my-profile-picture" src="<?php echo $user->image_filename; ?>" alt="<?php echo $user->name; ?>">
    <br>

    <p>Skills</p>
    <div class="skills">
      <i class="devicon-html5-plain sq" title="HTML5"></i>
      <i class="devicon-css3-plain sq" title="CSS3"></i>
      <i class="devicon-javascript-plain sq gradient" title="JavaScript"></i>
      <i class="devicon-php-plain sq" title="PHP"></i>
      <i class="devicon-nodejs-plain sq" title="NodeJS"></i>
      <i class="devicon-ruby-plain sq" title="Ruby"></i>
    </div>

    <p>Contact</p>
    <div class="social">
      <a href="https://mastodon.host/@amarillo"><span class="socicon-mastodon" title="Mastodon"></span></a>
      <a href="https://github.com/funspectre"><span class="socicon-github" title="Github"></span></a>
    </div>
  </div>
  <div class="chat-head">Chat</div>
  <div class="chat">
    <div class="conversation" id="conversation">
      <p class="bot">
        Hi, my name is Alfred. Feel free to ask me anything.
        <br>
        Send <code>show: List of commands</code> to see a list of things I can do.
      </p>
    </div>
    <form id="chat" class="box" action="/profiles/tobalase.php" name="message" method="post">
      <textarea type="text" id="message" class="message" placeholder="Message" wrap="soft" rows=1 autofocus></textarea>
      <button id="send" class=send type=submit>Send</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<script>
const messageField = document.getElementById('message');
const sendButton = document.getElementById('send');
const conversation = document.getElementById('conversation');
const messageForm = document.getElementById('chat');

messageField.scrollIntoView();

const appendMessage = function (text, from) {
    const message = document.createElement('p');
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
            appendMessage('Please, check your internet connection.', 'bot');
        }
        if (String(xhr.status)[0] == 5)
            appendMessage('Forgive me, something is wrong with my insides.', 'bot');
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
        appendMessage('Alfred v1.0', 'bot');
    else $.ajax({
        type: 'POST',
        url: '/profiles/tobalase.php',
        data: {message: messageField.value},
        dataType: 'json',
        success: useResult,
        error: handleError,
    });
    messageField.value = '';
};
</script>

<?php
}

$db_conn = null;

?>

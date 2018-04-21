<?php
    session_start();
    require('answers.php');
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;
    $db = new PDO($dsn, DB_USER,DB_PASSWORD);
    $codeQuery = $db->query('SELECT * FROM secret_word ORDER BY id DESC LIMIT 1', PDO::FETCH_ASSOC);
    $secret_word = $codeQuery->fetch(PDO::FETCH_ASSOC)['secret_word'];
    $detailsQuery = $db->query('SELECT * FROM interns_data WHERE name = \'Sagoe Kay\' ');
    $username = $detailsQuery->fetch(PDO::FETCH_ASSOC)['username'];

    if(isset($_POST['message']))
    {
        array_push($_SESSION['chat_history'], trim($_POST['message']));
        if(strtolower(trim($_POST['message'])) == "aboutbot")
        {
            $answer = "Version 1.1";
            array_push($_SESSION['chat_history'] , $answer);
        }
        else if(stripos(trim($_POST['message']), "train") === 0)
        {
          // Training
          $args = explode(":", trim($_POST['message']), 2);
          $args1 = explode("#", trim($args[1]));
          $question = trim($args1[0]);
          $answer = trim($args1[1]);
          $password = trim($args1[2]);

          if($password == "password")
          {
              // Password correct
            $trainQuery = $db->prepare("INSERT INTO chatbot (question , answer) VALUES ( :question, :answer)");
            if($trainQuery->execute(array(':question' => $question, ':answer' => $answer)))
            {
                array_push($_SESSION['chat_history'], "The bot has been trained to do that");
            }
            else
            {
                array_push($_SESSION['chat_history'], "Something went wrong somewhere");
            }
          }
          else
          {
              // Password wrong
             array_push($_SESSION['chat_history'], "The password entered was incorrect");
          }

        }
        else
        {
            // Not Training
          $questionQuery = $db->prepare("SELECT * FROM chatbot WHERE question LIKE :question");
          $questionQuery->execute(array(':question' => trim($_POST['message'])));
          $qaPairs = $questionQuery->fetchAll(PDO::FETCH_ASSOC);
          if(count($qaPairs) == 0)
          {
             $answer = "Sorry, I do not understand what you said";
          } else
          {
            $answer = $qaPairs[mt_rand(0, count($qaPairs) - 1)]['answer'];
            $bracketIndex = 0;
            while(stripos($answer, "{{", $bracketIndex) !== false)
            {
              $bracketIndex = stripos($answer, "{{", $bracketIndex);
              $endIndex = stripos($answer, "}}", $bracketIndex);
              $bracketIndex++;
              $function_name = substr($answer, $bracketIndex + 1, $endIndex - $bracketIndex -1);
              $answer = str_replace("{{".$function_name."}}", call_user_func($function_name), $answer);



            }

            $bracket1Index = 0;
            while(stripos($answer, "((", $bracket1Index) !== false)
            {
              $bracket1Index = stripos($answer, "((", $bracketIndex);
              $endIndex = stripos($answer, "))", $bracketIndex);
              $bracket1Index++;
              $function_name = substr($answer, $bracket1Index + 1, $endIndex - $bracket1Index -1);
              $answer = str_replace("{{".$function_name."}}", call_user_func($function_name), $answer);



            }


          }


          array_push($_SESSION['chat_history'] , $answer);
        }
    }

    if(!isset($_SESSION['chat_history']))
    {
        $_SESSION['chat_history'] = array('Hi! How can I help? Ask me any question. To train me, enter the command "train # question # answer # password');

    }

    $messages = $_SESSION['chat_history'];



?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Work+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<style>
    .my-container
    {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: "Work Sans", sans-serif;

    }

    .content
    {
        display: flex;
        flex-direction: column;
    }

    .row
    {
        display: flex;
        width: 100%;
        justify-content: center;
        flex-direction: row;
    }

    .icon-row
    {
        display: flex;
        flex-direction: row;
        width: 70px;
        justify-content: space-between;
    }

    .chatbox
    {
        display: flex;
        flex-direction: column;
        background-color: #FAFAFA;
        width: 40%;
        min-height: 500px;
        border-style: solid;
        border-width: 1px;
        border-radius: 5px;
        border-color: #757575;
        margin-top: 25px;
        margin-bottom: 50px;
    }

    .chat-area
    {
        display: flex;
        flex-direction: column;
        width: 100%;
        min-height: 450px;
        padding-top: 20px;
        padding-bottom: 10px;
        padding-right: 20px;
        padding-left: 20px;
        overflow: scroll;
        box-sizing: border-box;
    }

    .chat-controls
    {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 50px;
        border-top: 1px solid #757575;
        box-sizing: border-box;
        font-size: 12px;
    }

    .chat-container
    {
        box-sizing: border-box;
        width: 100%;
        display: flex;

    }

    .input-ctn
    {
        flex-direction: row-reverse;
    }

    .output-ctn
    {
        flex-direction: row;
    }

    .chat
    {
        min-height: 30px;
        padding: 10px;
        box-sizing: border-box;
        min-width: 30px;
        border-radius: 8px;
        font-size: 12px;
        margin-bottom: 5px;
        max-width: 60%;
    }

    .input
    {
        color: #FAFAFA;
        background-color: #1E88E5;
    }

    .output
    {
        background-color: transparent;
        border: 0.5px solid #1E88E5;
        color: #1E88E5;
    }
</style>
<body>

<div class="my-container">
    <div class="content">
        <div class="row">
            <span style="width:100%;font-weight: 700; font-size: 159px; color: #263238; letter-spacing: -10px; text-align: center;"><?=$username ?>.</span>
        </div>
        <div class="row">
            <span style="width: 100%;font-size: 28px; text-align: center; color: #212121; font-family: 'Lato'; font-weight: 300;">Web Developer &#x25CF; Designer</span>
        </div>
        <div style="margin-top: 20px; font-size: 28px; color: #212121" class="row">
            <div class="icon-row">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-github-alt"></i>
            </div>
        </div>
    </div>
    <span style="margin-top: 150px; font-size: 37px; font-weight: 700;color: #263238;">Chatbot</span>
    <div class="chatbox">
        <div class="chat-area">


          <?php for($index = 0; $index < count($messages); $index++ ) :?>
              <div class="chat-container <?= ($index % 2 == 0) ? "output-ctn" : "input-ctn"  ?>">
                  <div class="chat <?= ($index % 2 == 0) ? "output" : "input"  ?>"><?= $messages[$index] ?></div>
              </div>
          <?php endfor; ?>

        </div>
        <div class="chat-controls">
            <form action="/profile.php?id=KaySagoe" method="POST" style="display: flex; width: 100%;">
                <input type="text" name="message" style="box-sizing: border-box; flex-grow: 3; border-right: 1px solid #757575; border-left: 0px;  border-top: 0px; border-bottom: 0px; background-color: transparent; margin-left: 5px; height: 50px;" placeholder="Enter a message..."/>
                <input type="submit" style="flex-grow: 1; background-color: #1565C0; color: #FAFAFA;"/>
            </form>
        </div>
    </div>
</div>
</body>
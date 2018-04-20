<?php
    session_start();
    require('answers.php');
    			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;
    			$db = new PDO($dsn, DB_USER,DB_PASSWORD);
    			$codeQuery = $db->query('SELECT * FROM secret_word ORDER BY id DESC LIMIT 1', PDO::FETCH_ASSOC);
    			$secret_word = $codeQuery->fetch(PDO::FETCH_ASSOC)['secret_word'];
    			$detailsQuery = $db->query('SELECT * FROM interns_data WHERE name = \'Joseph Miracle\' ');
    $username = $detailsQuery->fetch(PDO::FETCH_ASSOC)['username'];
    if(isset($_POST['message']))
    {
        			array_push($_SESSION['chat_history'], trim($_POST['message']));
        			if(stripos(trim($_POST['message']), "train") === 0)
        {
          
          			$args = explode("#", trim($_POST['message']));
          			$question = trim($args[1]);
          $answer = trim($args[2]);
          $password = trim($args[3]);
          if($password == "trainisdope")
          {
              // Password perfect
            $trainQuery = $db->prepare("INSERT INTO chatbot (question , answer) VALUES ( :question, :answer)");
            if($trainQuery->execute(array(':question' => $question, ':answer' => $answer)))
            {
                array_push($_SESSION['chat_history'], "Try another method");
            }
            else
            {
                array_push($_SESSION['chat_history'], "Something went wrong somewhere");
            }
          }
          else
          {
              // Password not correct
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
             		$answer = "Sorry, I cant understand your details";
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

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>TiaraYuppy - HNG Internship</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
 
body{
    margin-bottom: 100px;
}
.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background: url("http://lorempixel.com/850/280/nature/4/");
    background-size: cover;
    height: 155px;
}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

.card.hovercard .avatar img {
    width: 100%;
    height: 100%;
    max-width: 200px;
    max-height: 200px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 35px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 20px;
    line-height: 50px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}

.btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  

}
.color{
    background-color: #e2e2e2;
}
.btn-sm-github{
    color: #070707;
    background-color: #070707;
}

#time{
    display-content:center;
}
#demo {
            /*background-color: #ffffff;*/
            width: 80%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;

            background-color: #F8F8F8;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #999;
            line-height: 1.4em;
            font: 13px helvetica,arial,freesans,clean,sans-serif;
            color: black;
        }
        #demo input {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            width: 400px;
        }
        .button {
            display: inline-block;
            background-color: darkcyan;
            color: #fff;
            padding: 8px;
            cursor: pointer;
            float: right;
        }
        #chatBotCommandDescription {
            display: none;
            margin-bottom: 20px;
        }
        input:focus {
            outline: none;
        }
        .chatBotChatEntry {
            display: none;
        }
        .chatBotChatEntry {
    padding: 20px;
    background-color: #fff;
    border: none;
    margin-top: 5px;
    font-family: 'open_sanslight', sans-serif !important;
    font-size: 17px;
    font-weight: normal;
}

.chatBotChatEntry * {
    font-family: 'open_sanslight', sans-serif !important;
    font-size: 17px;
    font-weight: normal;
}

.chatBotChatEntry .origin {
    font-weight: bold;
    margin-right: 10px;
}
.chatBotChatEntry .imgBox {
    position: relative;
    width: 32%;
    display: inline-block;
    margin-top: 10px;
    margin-right: 10px;
    height: 218px;
    overflow: hidden;
}
.chatBotChatEntry .imgBox .actions .button {
    margin-top: 10px;
    font-size: 18px;
    padding: 5px;
    width: 50%;
}
.chatBotChatEntry .imgBox .actions {
    position: absolute;
    display: none;
    top: 31px;
    width: 100%;
    text-align: center;
}
.chatBotChatEntry .imgBox:hover .actions {
    display: block;
}
.chatBotChatEntry .imgBox .title {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 5px;
    color: #fff;
    background-color: #333;
    font-weight: normal;
    font-size: 16px;
}

    .chatBotChatEntry .imgBox img {
        width: 100%;
    }

    .bot {
        /*border: 4px solid rgba(0, 132, 60, 0.2);*/
        background-color: rgba(0, 132, 60, 0.2);
    }
    .human {
        /*border: 4px solid rgba(38, 159, 202, 0.2);*/
        background-color: rgba(38, 159, 202, 0.2);
    }

    #chatBotCommandDescription {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }
    .commandDescription span.phraseHighlight {
        color: chartreuse;
    }
    .commandDescription span.placeholderHighlight {
        color: deeppink;
    }
    .commandDescription {
        margin-top: 5px;
    }

    #chatBotConversationLoadingBar {
        background-color: darkcyan;
        height: 2px;
        width: 0;
    }

    .appear {
        animation-duration: 0.2s;
        animation-name: appear;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }

    @keyframes appear {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
 }

</style>
<body class="color">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="http://res.cloudinary.com/tiarayuppy/image/upload/v1523634049/IMG_20171025_172725.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://res.cloudinary.com/tiarayuppy/image/upload/v1523634049/IMG_20171025_172725.jpg">Miracle Joseph</a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek| Woman in Tech</div>
                    <div class="desc">Fast Learner</div>
                </div>
                <div class="bottom">
                    
                    <a class="btn btn-danger btn-sm-github" rel="publisher"
                       href="https://github.com/Tiarayuppy">
                        <i class="fa fa-github"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://facebook.com/tiarayuppy">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/tiarayuppy">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
                    
  
            </div>

        </div>


    </div>


</div>
<div id="time"></div>
  
    
   
    </div>
    
<script src="https://rawgit.com/tiarayuppy/chatscript/master/chatbot.js"></script>


<div id="demo">
	<h4>Train password <code>`trainisdope`</code></h4>
    <div id="chatBotCommandDescription"></div>
    <input id="humanInput" type="text" placeholder="Say something" />

    <div class="button" onclick="if (!ChatBot.playConversation(sampleConversation,4000)) {alert('conversation already running');};">Play sample conversation!</div>
    <div class="button" onclick="$('#chatBotCommandDescription').slideToggle();" style="margin-right:10px">What can I say?</div>

    <div style="clear: both;">&nbsp;</div>

    <div id="chatBot">
        <div id="chatBotThinkingIndicator"></div>
        <div id="chatBotHistory"></div>
        
    </div>
</div>
<div>
	<?php for($index = 0; $index < count($messages); $index++ ) :?>
              <div class="chat-container <?= ($index % 2 == 0) ? "output-ctn" : "input-ctn"  ?>">
                  <div class="chat <?= ($index % 2 == 0) ? "output" : "input"  ?>"><?= $messages[$index] ?></div>
              </div>
          <?php endfor; ?>
</div>
<!--<script>
    var sampleConversation = [
        "Hi",
        "My name is [name]",
        "Where is Hotels.ng?",
        "Where is  Nigeria",
        "Bye",
        "What is the time"
        
    ];
    var config = {
        botName: 'Tiarayuppy',
        inputs: '#humanInput',
        inputCapabilityListing: true,
        engines: [ChatBot.Engines.duckduckgo()],
        addChatEntryCallback: function(entryDiv, text, origin) {
            entryDiv.delay(200).slideDown();
        }
    };
    ChatBot.init(config);
    ChatBot.setBotName("Tiarayuppy");
    ChatBot.addPattern("^hi$", "response", "Hello, friend", undefined, "Say 'Hi' to be greeted back.");
    ChatBot.addPattern("^What is the time$", "response", "The Time is getTime()", undefined, "Say 'What is the time' to be greeted back.");
    ChatBot.addPattern("^bye$", "response", "See you later...", undefined, "Say 'Bye' to end the conversation.");
    ChatBot.addPattern("(?:my name is|I'm|I am) (.*)", "response", "hi $1, thanks for talking to me today", function (matches) {
        ChatBot.setHumanName(matches[1]);
    },"Say 'My name is [your name]' or 'I am [name]' to be called that by the bot");
    ChatBot.addPattern("(what is the )?meaning of life", "response", "42", undefined, "Say 'What is the meaning of life' to get the answer.");
    ChatBot.addPattern("compute ([0-9]+) plus ([0-9]+)", "response", undefined, function (matches) {
        ChatBot.addChatEntry("That would be "+(1*matches[1]+1*matches[2])+".","bot");
    },"Say 'compute [number] plus [number]' to make the bot your math calculator");
</script>	
-->
</body>
</html>

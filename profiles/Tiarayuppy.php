<?php
    session_start();
    require('answers.php');
                $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;
                $db = new PDO($dsn, DB_USER,DB_PASSWORD);
                $codeQuery = $db->query('SELECT * FROM secret_word ORDER BY id DESC LIMIT 1', PDO::FETCH_ASSOC);
                $secret_word = $codeQuery->fetch(PDO::FETCH_ASSOC)['secret_word'];
                $detailsQuery = $db->query('SELECT * FROM interns_data WHERE name = \'Tiarayuppy\' ');
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
          if($password == "[password]")
          {
              // Password perfect
            $trainQuery = $db->prepare("INSERT INTO chatbot (question , answer) VALUES ( :question, :answer)");
            if($trainQuery->execute(array(':question' => $question, ':answer' => $answer)))
            {
                array_push($_SESSION['chat_history'], "That works! okay continue chatting");
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
                $_SESSION['chat_history'] = array('Hello! How can I help? Ask for my help. To train me, enter the command "train # question # answer # password');
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://rawgit.com/tiarayuppy/chatscript/master/chatbot.js"></script>

<style>
 
 .mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:450px;
    overflow:hidden;
    padding:0;
}
.frame > div:last-of-type{
    position:absolute;bottom:0;width:100%;display:flex;
}
body > div > div > div:nth-child(2) > span{
    background: blue;
    padding: 10px;
    font-size: 21px;
    border-radius: 50%;
}
body > div > div > div.msj-rta.macro{
    margin:auto;margin-left:1%;
}
ul {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:47px;
    display:flex;
    flex-direction: column;
    top:0;
    overflow-y:scroll;
}
.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}  


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
        height:300px;
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
        display: center;
        flex-direction: column;
        background-color: #c5f9f0;
        width: 40%;
        min-height: 500px;
        border-style: solid;
        border-width: 1px;
        border-radius: 20px;
        border-color:#1d3baf;
        margin-top: 25px;
        margin-bottom: 50px;
        margin-left: 400px;
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
    .chat-controller
    {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 50px;
        border-top: 1px solid #1d3baf;
        box-sizing: border-box;
        font-size: 20px;
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
        background-color: #1de5d1;
    }
    .output
    {
        background-color: transparent;
        border: 0.5px solid #1E88E5;
        color: #1E88E5;
    }
    form{
        display: flex; 
        width: 100%;
    }
    input{
        box-sizing: border-box; 
        flex-grow: 3; 
        border-right: 1px solid #757575; 
        border-left: 0px;  
        border-top: 0px; 
        border-bottom: 0px; 
        background-color: 
        transparent; 
        margin-left: 5px; 
        height: 50px;
    }

@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
body
{
    font-family: 'Open Sans', sans-serif;
    }
.popup-box {
   background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: none;
    height: 415px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
}
.round.hollow {
    margin: 40px 0 0;
}
.round.hollow a {
    border: 2px solid #ff6701;
    border-radius: 35px;
    color: red;
    color: #ff6701;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
}
.round.hollow a:hover {
    border: 2px solid #000;
    border-radius: 35px;
    color: red;
    color: #000;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
}
.popup-box-on {
    display: block !important;
}
.popup-box .popup-head {
    background-color: #fff;
    clear: both;
    color: #7b7b7b;
    display: inline-table;
    font-size: 21px;
    padding: 7px 10px;
    width: 100%;
     font-family: Oswald;
}
.bg_none i {
    border: 1px solid #ff6701;
    border-radius: 25px;
    color: #ff6701;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none:hover i {
    border: 1px solid #000;
    border-radius: 25px;
    color: #000;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
}
.popup-box .popup-head .popup-head-right {
    margin: 11px 7px 0;
}
.popup-box .popup-messages {
}
.popup-head-left img {
    border: 1px solid #7b7b7b;
    border-radius: 50%;
    width: 44px;
}
.popup-messages-footer > textarea {
    border-bottom: 1px solid #b2b2b2 !important;
    height: 34px !important;
    margin: 7px;
    padding: 5px !important;
     border: medium none;
    width: 95% !important;
}
.popup-messages-footer {
    background: #fff none repeat scroll 0 0;
    bottom: 0;
    position: absolute;
    width: 100%;
}
.popup-messages-footer .btn-footer {
    overflow: hidden;
    padding: 2px 5px 10px 6px;
    width: 100%;
}
.simple_round {
    background: #d1d1d1 none repeat scroll 0 0;
    border-radius: 50%;
    color: #4b4b4b !important;
    height: 21px;
    padding: 0 0 0 1px;
    width: 21px;
}





.popup-box .popup-messages {
    background: #3f9684 none repeat scroll 0 0;
    height: 275px;
    overflow: auto;
}
.direct-chat-messages {
    overflow: auto;
    padding: 10px;
    transform: translate(0px, 0px);
    
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages abbr.timestamp {
    background: #3f9684 none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}

.popup-head-right .btn-group {
    display: inline-flex;
    margin: 0 8px 0 0;
    vertical-align: top !important;
}
.chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #636364;
    border-radius: 50%;
    font-size: 14px;
    height: 30px;
    width: 30px;
}
.popup-head-right .btn-group .dropdown-menu {
    border: medium none;
    min-width: 122px;
    padding: 0;
}
.popup-head-right .btn-group .dropdown-menu li a {
    font-size: 12px;
    padding: 3px 10px;
    color: #303030;
}

.popup-messages abbr.timestamp {
    background: #3f9684  none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages .direct-chat-messages {
    height: auto;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}

.popup-messages .direct-chat-timestamp {
    color: #fff;
    opacity: 0.6;
}

.popup-messages .direct-chat-name {
    font-size: 15px;
    font-weight: 600;
    margin: 0 0 0 49px !important;
    color: #fff;
    opacity: 0.9;
}
.popup-messages .direct-chat-info {
    display: block;
    font-size: 12px;
    margin-bottom: 0;
}
.popup-messages  .big-round {
    margin: -9px 0 0 !important;
}
.popup-messages  .direct-chat-img {
    border: 1px solid #fff;
    background: #3f9684  none repeat scroll 0 0;
    border-radius: 50%;
    float: left;
    height: 40px;
    margin: -21px 0 0;
    width: 40px;
}
.direct-chat-reply-name {
    color: #fff;
    font-size: 15px;
    margin: 0 0 0 10px;
    opacity: 0.9;
}

.direct-chat-img-reply-small
{
    border: 1px solid #fff;
    border-radius: 50%;
    float: left;
    height: 20px;
    margin: 0 8px;
    width: 20px;
    background:#3f9684;
}

.popup-messages .direct-chat-msg {
    margin-bottom: 10px;
    position: relative;
}

.popup-messages .doted-border::after {
    background: transparent none repeat scroll 0 0 !important;
    border-right: 2px dotted #fff !important;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
     display: inline;
      z-index: -2;
}

.popup-messages .direct-chat-msg::after {
    background: #fff none repeat scroll 0 0;
    border-right: medium none;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
     display: inline;
      z-index: -2;
}
.direct-chat-text::after, .direct-chat-text::before {
   
    border-color: transparent #dfece7 transparent transparent;
    
}
.direct-chat-text::after, .direct-chat-text::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent #d2d6de transparent transparent;
    border-image: none;
    border-style: solid;
    border-width: medium;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}
.direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}
.direct-chat-text {
    background: #d2d6de none repeat scroll 0 0;
    border: 1px solid #d2d6de;
    border-radius: 5px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
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
              
                </div>
               
                    
  
            </div>
        </div>
    </div>
</div>

 <h4 style="text-align: center;">My Chat bot</h4>

      <div class="col-sm-4 col-sm-offset-4 frame" 
      style="box-shadow:2px 2px 4px 5px #ccc;
      background-color: #e1ecf7; 
      border: 4px; 
      margin-bottom: 30px;">
            <ul></ul>
            <?php for($index = 0; $index < count($messages); $index++ ) :?>
                      <div class="chat-container <?= ($index % 2 == 0) ? "output-ctn" : "input-ctn"  ?>">
                          <div class="chat <?= ($index % 2 == 0) ? "output" : "input"  ?>"><?= $messages[$index] ?></div>
                      </div>
                  <?php endfor; ?>
            <div class="msj-rta macro"> 
                     
            <div>
                
                <form action="/profile.php?id=Tiarayuppy" method="POST" style="display: flex; width: 100%;">
                  
                    <div class="text text-r" style="background:lightblue !important">
                          
                        <input type="text" class="mytext" placeholder="Type a message"/>
                    </div> 

                </div>
                <div style="padding:10px;">
                    <input type="submit" value="send your message" style=" border-radius:10px; flex-grow: 1; background-color: green; color: #FAFAFA;"/>
                </form>
                </div>                
            </div>
        </div> 

    <!--
    <div class="chatbox">
        <div class="chat-area">


          <?php for($index = 0; $index < count($messages); $index++ ) :?>
              <div class="chat-container <?= ($index % 2 == 0) ? "output-ctn" : "input-ctn"  ?>">
                  <div class="chat <?= ($index % 2 == 0) ? "output" : "input"  ?>"><?= $messages[$index] ?></div>
              </div>
          <?php endfor; ?>

        </div>
        <div class="chat-controls">
            <form action="/profile.php?id=Tiarayuppy" method="POST" style="display: flex; width: 100%;">
                <input type="text" name="message" style="box-sizing: border-box; flex-grow: 3; border-right: 1px solid #757575; border-left: 0px;  border-top: 0px; border-bottom: 0px; background-color: transparent; margin-left: 5px; height: 50px;" placeholder="Enter a message..."/>
                <input type="submit" style="flex-grow: 1; background-color: #1565C0; color: #FAFAFA;"/>
            </form>
        </div>
    </div>

    starts here-->
<!--    
<div id="demo">
    <h4 style="text-align: center;">Chat Bot Query from Duckducko </h4>
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
     <span style="margin-top: 150px;margin-left: 400px; font-size: 37px; font-weight: 700;color: #263238;">Chat Bot from Database</span>

 -->
   

<!--


<div class="container text-center">
    <div class="row">
        
        <div class="round hollow text-center">
        <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open chat with bot </a>
        </div>
        
        
    </div>
</div>

<div class="popup-box chat-popup" id="qnimate">
              <div class="popup-head">
                <div class="popup-head-left pull-left"><img src="http://res.cloudinary.com/tiarayuppy/image/upload/v1523634049/IMG_20171025_172725.jpg" alt="Miracle"> Tiara's chat bot</div>
                      <div class="popup-head-right pull-right">
                        <div class="btn-group">
                                      <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                                       <i class="glyphicon glyphicon-cog"></i> </button>
                                <ul role="menu" class="dropdown-menu pull-right">
                                        <li><a href="#">Media</a></li>
                                        <li><a href="#">Block</a></li>
                                        <li><a href="#">Clear Chat</a></li>
                                        <li><a href="#">Email Chat</a></li>
                                </ul>
                        </div>
                        
                        <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
                      </div>
              </div>
            <div class="popup-messages chatbox">
            
            <div class="direct-chat-messages chat-area">
                    
                     <?php for($index = 0;
                     $index < count($messages);
                     $index++ ) :?>
                          <div class="chat-container <?= ($index % 2 == 0) ? "output-ctn" :
                           "input-ctn"  ?>">
                              <div class="chat <?= ($index % 2 == 0) ? "output" 
                              : "input"  ?>">
                                <?= $messages[$index] ?>
                                    
                                </div>
                          </div>
                      <?php endfor; ?>
                  
                <div class="chatbox popup-messages">
                    <div class="chat-area direct-chat-messages">
                  
                    </div>
                    <div class="chat-controller">
                        <form action="/profile.php?id=Tiarayuppy" method="POST">
                            <input type="text" name="message" placeholder="Chat with me"/>
                            <input type="submit" value="enter" />

                        </form>
                    </div>
                   </div>
                    
                </div>
            
            </div>
            <div class="popup-messages-footer chat-controller">
            <form action="/profile.php?id=Tiarayuppy" method="POST">
            <input type="text" name="message" placeholder="Chat with me">
            <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
            <input type="submit"/>
            <div class="btn-footer">
            </form>
            <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
            <button class="bg_none pull-right" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
           
            </div>
            </div>
      </div>



    </div>
</div>
</div>-->
<script>
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
<script>
    
  $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })

</script>

<script>
    var me = {};
me.avatar = "data:image/png;base64,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";

var you = {};
you.avatar = "data:image/png;base64,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";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +                                
                  '</li>';
    }
    setTimeout(
        function(){                        
            $("ul").append(control).scrollTop($("ul").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $("ul").empty();
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);              
            $(this).val('');
        }
    }
});

$('body > div > div > div:nth-child(2) > span').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

//-- Clear Chat
resetChat();

//-- Print Messages



//-- NOTE: No use time on insertChat.
</script>

</body>
</html>

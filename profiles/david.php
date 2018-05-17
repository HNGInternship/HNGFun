<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile page</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style media="screen">
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
    background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;
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
  background-image: url("https://res.cloudinary.com/gyrationtechs/image/upload/v1526053526/bg.jpg");
  
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin: 0px;
  padding: 0px;
 }
.navbar{
  width: 100%
  padding: 20px;
  position: fixed;
  top: 0px;
  transition: .5s;
}
.navbar ul li{
  list-style-type: none;
  display: inline-block;
  padding: 10px 15px;
  color: white;
  font-size: 24px;
  font-family: sans-serif;
  cursor: pointer;
  float: right;
  border-radius: 10px;
  transition: .5s;
}
.navbar ul li:hover{
  background: orange;
}
.navbar,
.text-center{
  text-align: center;
}
      .personal-image img{
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }
      .personal-image p{
        border-left: 3px black;
        border-right: 3px black;
        font-size: 20px;
        text-align: center;
        font-family: Playball;
        margin: 0;
        padding: 0;
      }
      .personal-image h4{
        font-size: 35px;
        text-align: center;
        margin-top: 0em;
      }
      .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
      margin-top: 10%;
      }
      .personal-image h4 {
        font-family:  sans-serif;
        margin-bottom: 0em;
      }
      .personal-image p{
        font-family: Arial;
        margin-top: 0em;
        padding-top: 0em;
        color: #a90909;
	font-weight: bold;
        margin-bottom: 0em;
      }
      .social-page{
        margin-top: 0em;
      }
      .social-page img{
        width: 30px;
        height: 30px;
        padding-bottom: 0;
      }
.text-center{
  text-align: center;
}
.box{
  display: inline-block;
  background-color: grey;
  width: 100%;
  height: 50px;
}
.box p{
  font-size: 16px;
  text-align: center;
  padding-top: 10px;
  color: #430f0f;
}

.box span {
text-align: center;
  padding-top: 10px;
  color: #430f0f;
}
p {
font-size: 18px;
color: #430f0f
}

.personal-image span {
font-size: 14px;
text-align: center;
font-family: verdana;
color: #fff;
left: 30%; 
right: 30%;

}
</style>
  </head>
  <body>
<div class="personal-image">
  <img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526012343/David.jpg" alt="my image" class="center">
        
        <h4 style="color: #fff">David Ozokoye</h4>
        <p>Front End Web developer / AI (chabot) developer / HNG Intern </p><br>
        <div class="social-page text-center">
	<span> What's up, I'm David a Web developer based in Nigeria. I am a fan of technology, design and entrepreneurship. <br> I'm also interested in web development and programming. Get in touch with me via any of my social handle below.</span> <br><br>
          <a href="https://www.facebook.com/davis5nd"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051537/fb.png"></a>
          <a href="https://www.twitter.com/gyrationtech"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051669/twitter.png"></a>
          <a href="https://www.linkedin.com/in/david-ozokoye"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051162/link.jpg" ></a>
          <a href="https://www.github.com/gyrationtechs"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526052030/git.png"></a>
 </div>
      </div><br><br>

      <!-- chatbot interface-->
      <right>
      <div class="col-sm-3 col-sm-offset-4 frame">
            <ul></ul>
            <div>
                <div class="msj-rta macro">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 

                </div>
                <div style="padding:10px;">
                    <span class="glyphicon glyphicon-share-alt"></span>
                </div>                
            </div>
        </div>   
        </right>
<script type="text/javascript">

var davbot = {};
davbot.avatar = "https://res.cloudinary.com/gyrationtechs/image/upload/v1526012343/David.jpg";

var user = {};
user.avatar = "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg";
var introText = "<p>Hello. My name is davbot, I'm a chatbot. You can ask me questions and I will try to answer them. You can also train me using the following format,</p>" +


"<code>train : question # answer # password</code>" +


'<p>Feel free to replace the word "<i>train</i>" with "<i>teach</i>" or "<i>coach</i>" or even "<i>teach how</i></p>' +


'<p>To see this message at any time, type "intro"</p>' +


'<p>To see my version number, type "<i>about</i>", "<i>aboutbot</i>" or "<i>about_bot</i>"</p>';
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
    
    if (who == "user"){
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


$(document).ready(function() {

$(".mytext").on("keyup", function(e) {

if ((e.keyCode || e.which) == 13) {

var text = $(this).val();

if (text !== "") {

insertChat("user", text);

$(this).val('');

botResponse();

}

}

function botResponse() {

shouldScroll = $("ul.chats").scrollTop + $("ul.chats").clientHeight === $("ul.chats").scrollHeight;

var date = formatAMPM(new Date());

if (text.toUpperCase() === "INTRO") {

insertChat("bot", introText, 200);

} else {

$.ajax({

type: "POST",

url: 'profiles/david.php',

data: {message: text},

success: function(response) {

reply = '<li style="width:100%">' +

'<div class="msj macro">' +

'<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ davbot.avatar +'" /></div>' +

'<div class="text text-l">' +

'<p>'+ response +'</p>' +

'<p><small>'+date+'</small></p>' +

'</div>' +

'</div>' +

'</li>';

setTimeout(

function() {

$("ul.chats").append(reply).scrollTop($("ul.chats").prop('scrollHeight'));

}, 0

);

}

});

if (!shouldScroll) {

scrollToBottom();

}

}

}

});

});

function scrollToBottom() {

$("ul.chats").scrollTop = $("ul.chats").scrollHeight;

}

// $('body > div > div > div:nth-child(2) > span').click(function() {

// $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});

// })

insertChat("davbot", introText, 350);

scrollToBottom();
//-- Print Messages
/*insertChat("davbot", "Hello My name is davbot. I'm a chatbot. To know about me simply type <em>aboutbot</em>", 0);  
insertChat("you", "Hi, Pablo", 1500);
insertChat("me", "What would you like to talk about today?", 3500);
insertChat("you", "Tell me a joke",7000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
insertChat("you", "LOL", 12000);*/


//-- NOTE: No use time on insertChat.

</script>


</body>
</html>
<?php

if(!defined('DB_USER')){

    require "../../config.php"; 
    
    try {
    
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    
    } catch (PDOException $pe) {
    
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    
    }
    
    }
    
    global $conn;
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $result = $conn->query("select * from secret_word LIMIT 1");
    
    $result = $result->fetch(PDO::FETCH_OBJ);
    
    $secret_word = $result->secret_word;
    
    $result2 = $conn->query("Select * from interns_data where username = 'david'");
    
    $user = $result2->fetch(PDO::FETCH_OBJ);
    
    } else {
    
    $message = trim(strtolower($_POST['message']));
    
    $botversion = 'davbot v1.0';
    
    $intent = 'unrecognized';
    
    $unrecognizedAnswers = [
    
    'Please I am not understanding you. You can help train me?. just type: <b>#train: Question | Answer | password.</b>',
    
    'I don\'t understand that question. train me pleasee. Just type: <b>#train: Question | Answer | password.</b>',
    
    ];
    
    if (strpos($message, 'what is your name') !== false || strpos($message, 'what do you do') !== false || strpos($message, 'who are you') !== false) {
    
    $intent = 'myname';
    
    }
    
    if (strpos($message, 'who created you') !== false || strpos($message, 'define drug abuse') !== false || strpos($message, 'drug abuse') !== false) {
    
    $intent = 'drugabuseDEF';
    
    }
    
    if (strpos($message, 'dаngеr аѕѕосіаtеd wіth drugs') !== false || strpos($message, 'dаngеrs аѕѕосіаtеd wіth drugs') !== false || strpos($message, 'dangers of drug abuse') !== false || strpos($message, 'effect of drug abuse') !== false) {
    
    $intent = 'dаngеr';
    
    }
    
    if (strpos($message, 'effесtѕ оf drug abuse') !== false || strpos($message, 'what are the effесtѕ оf drug abuse') !== false || strpos($message, 'drug abuse effects') !== false || strpos($message, 'drug abuse effect') !== false) {
    
    $intent = 'Effесtѕ';
    
    }
    
    if (strpos($message, 'cаuѕеѕ of drug abuse') !== false || strpos($message, 'things that cаuѕе drug abuse') !== false || strpos($message, 'factors that leads to drug abuse') !== false || strpos($message, 'what can cause drug abuse') !== false) {
    
    $intent = 'Cаuѕеѕ';
    
    }
    
    if (strpos($message, 'solution to drug аbuѕе') !== false || strpos($message, 'Remedies to drug аbuѕе') !== false || strpos($message, 'what are the solutions to drug аbuѕе') !== false || strpos($message, 'what is the solution to drug аbuѕе') !== false) {
    
    $intent = 'solution';
    
    }
    
    if (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
    
    $intent = 'greeting';
    
    }
    
    if (strpos($message, 'aboutbot') !== false || strpos($message, 'about bot') !== false || strpos($message, 'bot version') !== false || strpos($message, 'what is your bot version') !== false) {
    
    $intent = 'version';
    
    }
    
    if (strpos($message, 'how are you') !== false 
    
    || strpos($message, 'how are you doing') !== false
    
    || strpos($message, 'how do you feel') !== false) {
    
    $intent = 'greeting_response';
    
    }
    
    if ((strpos($message, 'am ok') !== false 
    
    || strpos($message, 'am cool') !== false) 
    
    && $intent !== 'greeting_response') {
    
    $intent = 'casual';
    
    }
    
    if(strpos($message, "help") !== false) {
    
    echo json_encode([
    
    "
    
    - To know who my creator is, simply type (who created you) <br />
    
    - To get hotel recommendation, simply type (hotel suggestions) <br />
    
    - To know list of hotels in jos, Plateau. Simply type (hotels in jos).
    
    - To know the cаuѕеѕ of drug abuse just type (cаuѕеѕ of drug abuse) <br />
    
    - To know the solution to drug abuse just type (solution to drug аbuѕе) <br />
    
    - To know about the bot just type (about bot) <br />
    
    ",
    
    ]);
    
    return;
    
    }
    
    //check for bot training
    
    $trainingData = '';
    
    if (strpos($message, 'train:') !== false) {
    
    $intent = 'training';
    
    $parts = explode('train:', $message);
    
    if (count($parts) > 1) {
    
    $trainingData = $parts[1];
    
    }
    
    }
    
    if ($intent === 'training' && $trainingData === '') {
    
    $response = 'please you did not get the training format. Use this format >>> "#train: Question | Answer"';
    
    } else if ($trainingData !== '') {
    
    $intent = 'training';
    
    $parts = explode('|', $trainingData);
    
    if (count($parts) > 1) {
    
    $question = trim($parts[0]);
    
    $answer = trim($parts[1]);
    
    $password = trim($parts[2]);
    
    //save in db
    
    if ($password === 'password') {
    
    $sql = "insert into chatbot (question, answer) values (:question, :answer)";
    
    $query = $conn->prepare($sql);
    
    $query->bindParam(':question', $question);
    
    $query->bindParam(':answer', $answer);
    
    $query->execute();
    
    $query->setFetchMode(PDO::FETCH_ASSOC);
    
    $response = 'Thank you!! I will build on your current training'; 
    
    }
    
    else {
    
    $response = 'Ooops, please enter a correct password (HINT: Password is password';
    
    } 
    
    } else {
    
    $response = 'sorry. please enter question, answer and password using this format >>> "#train: Question | Answer | password"';
    
    }
    
    }
    
    if ($intent === 'unrecognized') {
    
    $answer = '';
    
    $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question LIKE '$message' ORDER BY rand() LIMIT 1");
    
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
    
    $intent = 'db_question';
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    $answer = $row["answer"];
    
    }
    
    }
    
    }
    
    switch($intent) {
    
    case 'Cаuѕеѕ':
    
    echo 'Thеrе are twо primary саuѕеѕ of drug аbuѕе аmоng the уоuthѕ. Thеѕе аrе
    
    PEER PRESSURE: Yоuth аѕѕосіаtеѕ wіth dіffеrеnt tуреѕ оf реорlе otherwise known аѕ frіеndѕ. Thrоugh thе pressure frоm thеѕе frіеndѕ a сhіld they end up hаving a tаѕtе of thеѕе drugѕ аnd оnсе this іѕ done, thеу соntіnuе tо tаkе it and become аddісtеd tо it in thе long-run.
    
    DEPRESSION: Anоthеr рrіmаrу cause оf drug аbuѕе іѕ depression. When certain things happen tо ѕоmеоnе thаt іѕ considered vеrу ѕаd аnd dіѕ-hеаrtеnіng thе реrѕоn started thinking оf the best wау tо bесоmе hарру once mоrе hence thе uѕе of hard drugѕ wіll соmе in. This lаtеr оn turnѕ to a hаbіt, hence drug abuse.
    
    Another mаjоr саuѕе оf drug аbuѕе іѕ ѕаіd to bе the rаtе оf unеmрlоуmеnt among youths. Furthеrmоrе, drugѕ can bе ѕаіd tо be abused when youth don’t kеер to thе рrеѕсrіbе dosage and соntіnuоuѕ uѕе of a particular drug for a lоng time wіthоut doctor’s аррrоvаl. Thіѕ kind of аbuѕе іѕ аѕѕосіаtеd wіth ѕоft drugѕ.';
    
    break;
    
    case 'Effесtѕ':
    
    echo 'he following effects соuld bе еxреrіеnсеd in the body:
    
    1. It deadens the nеrvоuѕ system.
    
    2. It іnсrеаѕеs thе heart-beat.
    
    3. It causes thе blооd vеѕѕеlѕ tо dilate.
    
    4. It саuѕеѕ bad dіgеѕtіоn nоtаblу оf vіtаmіn B еѕресіаllу whеn taken on empty stomach.
    
    5. It interferes wіth thе роwеr оf judgmеnt аnd роіѕоnѕ thе higher brаіn аnd nеrvе сеntrе еtс.Ovеr dоѕе of thе drugѕ produces blurrеd ѕреесh, ѕtаggеrіng, ѕluggіѕhnеѕѕ, rеасtіоn, erratic emotionality and untіmеlу ѕlеер. The stimulants іnсludе wеll knоwn сосаіnе, caffeine оr codeine, paracetamol еtс.';
    
    break;
    
    case 'solution':
    
    echo '1] Aggrеѕѕіvе еxtіnсtіоn оf аll thе sources оf these hаrd drugѕ іnсludіng the fаrmѕ whеrе thеу аrе planted bу a jоіnt fоrce of authorities.
    
    2] Pаrеntѕ should mоnіtоr the kіnd of friends thеіr сhіldrеn interact with аnd guіdе аgаіnѕt bаd соmраnу.
    
    3] alcohol recovery programs for jesus followers of the аffесtеd persons.
    
    4] Tеасhіng thе еffесtѕ of drug аbuѕе іn schools.
    
    5] Cоntіnuоuѕ саmраіgn аgаіnѕt thе uѕе оf hard drugѕ аt thе fеdеrаl, state аnd lосаl levels.
    
    6] Cоnѕеnt of a dосtоr ѕhоuld be ѕоught bеfоrе a рrоlоng intаkе оf a particular ѕоft drug.
    
    7] Stіff penalty should be mеltеd аgаіnѕt anybody fоund dеаlіng in hard drugѕ.';
    
    break; 
    
    case 'dаngеr':
    
    echo 'There аrе twо аѕресtѕ оf dаngеr аѕѕосіаtеd wіth drugs; the risk оf addiction and аdvеrѕе hеаlth and bеhаvіоurаl consequences.';
    
    break;
    
    case 'greeting':
    
    echo 'Hello. how are you doing today?';
    
    break; 
    
    case 'drugabuseDEF':
    
    echo 'Drug abuse іѕ a ѕіtuаtіоn whеn drug is tаkеn mоrе thаn іt is prescribed. Drug аbuѕе саn bе further dеfіnеd as thе dеlіbеrаtе uѕе оf chemical ѕubѕtаnсеѕ fоr reasons other thаn іntеndеd mеdісаl purposes and whісh rеѕultѕ іn рhуѕісаl, mental emotional оr ѕосіаl іmраіrmеnt of thе uѕеr.';
    
    break;
    
    case 'greeting_response':
    
    echo 'am fine thank you';
    
    break;
    
    case 'db_question':
    
    echo $answer;
    
    break;
    
    case 'training':
    
    echo $response;
    
    break;
    
    case 'casual':
    
    echo 'Alright.';
    
    break;
    
    case 'myname':
    
    echo 'my name is davbot, you can ask me about hotel suggestions in plateau state';
    
    break;
    
    case 'version':
    echo $botversion;
    break;

    case 'unrecognized':  
    default:  
    echo $unrecognizedAnswers[rand(0, count($unrecognizedAnswers) - 1)];   
    break;   
    }  
    exit;
    }
  
  ?>
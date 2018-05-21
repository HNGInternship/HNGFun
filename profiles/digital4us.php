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

$result2 = $conn->query("Select * from interns_data where username = 'digital4us'");

$user = $result2->fetch(PDO::FETCH_OBJ);

} else {

$message = trim(strtolower($_POST['message']));

$botversion = 'drugAbuse2020 V2.1';

$intent = 'unrecognized';

$unrecognizedAnswers = [

'Please I Dont Know the answer can you Please help train me?. just type: <b>#train: Question | Answer | password.</b>',

'I don\'t understand that question. train me pleasee. Just type: <b>#train: Question | Answer | password.</b>',

];

if (strpos($message, 'what is your name') !== false || strpos($message, 'what do you do') !== false || strpos($message, 'who are you') !== false) {

$intent = 'myname';

}

if (strpos($message, 'what is drug abuse') !== false || strpos($message, 'define drug abuse') !== false || strpos($message, 'drug abuse') !== false) {

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

- To know what drug abuse is just type (what is drug abuse) <br />

- To know the dengers of drug abuse just type (dangers of drug abuse) <br />

- To know the effесtѕ of drug abuse just type (effесtѕ оf drug abuse).

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

$response = 'Thank you!! you have succesfully updated my brain'; 

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

echo 'Alright. nice to kmow';

break;

case 'myname':

echo 'my name is Joel and am here to teach about drug abuse in nigeria';

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



<!DOCTYPE html>

<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Olasupo Abdulhakeem Adigun</title>

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/3.3.4/css/bootstrap.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

  <style>

body, html {

background: url('https://unsplash.com/photos/C8VWyZhcIIU') no-repeat center top;

background-position: center;

background-repeat: no-repeat;

background-size: cover;

font-family: 'Open Sans', sans-serif;

text-rendering: optimizeLegibility !important;

-webkit-font-smoothing: antialiased !important;

color: #777;

width: 100% !important;

height: 100% !important;

}

h2 {

margin: 0 0 20px 0;

color: #555;

text-transform: uppercase;

letter-spacing: 1px;

font-weight: 400;

font-size: 30px;

}

h3, h4 {

color: #222;

font-size: 18px;

font-weight: 300;

letter-spacing: 1px;

}

h5 {

text-transform: uppercase;

font-weight: 700;

line-height: 20px;

}

p.intro {

font-size: 16px;

margin: 12px 0 0;

line-height: 24px;

}

a {

color: #555;

}

a:hover, a:focus {

text-decoration: none;

color: #000;

}

ul, ol {

list-style: none;

}

.clearfix:after {

visibility: hidden;

display: block;

font-size: 0;

content: " ";

clear: both;

height: 0;

}

.clearfix {

display: inline-block;

}

* html .clearfix {

height: 1%;

}

.clearfix {

display: block;

}

ul, ol {

padding: 0;

webkit-padding: 0;

moz-padding: 0;

}

hr {

height: 1px;

width: 70px;

text-align: center;

position: relative;

background: #666;

margin: 0 auto;

margin-bottom: 30px;

border: 0;

}

/* About Section */

#about {

padding: 120px 0;

width: 80%;

}

#about .about-text {

margin-left: 10px;

text-align: center;

width: 80%;

}

#about img {

border-radius: 50%;

width: 200px;

height: 200px;

display: inline-block;

-webkit-filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));

filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));

}

#about p {

margin-top: 40px;

margin-bottom: 30px;

line-height: 22px;

}

.categories {

padding-bottom: 30px;

text-align: center;

}

ul.cat li {

display: inline-block;

}

ol.type li {

display: inline-block;

margin-left: 20px;

}

ol.type li a {

border: 1px solid #777;

color: #555;

padding: 8px 20px;

}

ol.type li a:hover {

background: #222;

border: 1px solid #222;

color: #fff;

}

/* chatbot */

.mytext{border:0;padding:10px;background:whitesmoke;}

.text{width:75%;display:flex;flex-direction:column;}

.text > p:first-of-type{width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;}

.text > p:last-of-type{width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;}

.text-l{float:left;padding-right:10px;}

.text-r{float:right;padding-left:10px;}

.avatar{

display:flex;

justify-content:center;

align-items:center;

width:25%;

float:left;

padding-right:10px;

}

.macro{margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;}

.msj-rta{float:right;background:whitesmoke;}

.msj{float:left;background:white;}

.frame{

background:#e0e0de;

height:590px;

position: fixed;

bottom: 100px;

right: 0;

overflow:auto;

}

.frame > div:last-of-type{position:absolute;bottom:0;width:100%;display:flex;}

body > div > div > div:nth-child(2) > span{background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;}

body > div > div > div.msj-rta.macro{margin:auto;margin-left:1%;}

.chats {

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

input:focus{outline: none;}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */color: #d4d4d4;}

::-moz-placeholder { /* Firefox 19+ */color: #d4d4d4;}

:-ms-input-placeholder { /* IE 10+ */color: #d4d4d4;}

:-moz-placeholder { /* Firefox 18- */color: #d4d4d4;}

footer {

bottom: 0;

height: 2em;

position: relative;

width:100%;

}

</style>


  <script type="text/javascript">

var user = {};

var bot = {};

var introText = "<p><marquee>Hello. You can ask me questions and I will try to answer them. You can also train me using the following format,/marquee></p>" +


"<code>train : question # answer # password</code>" +


'<p>Feel free to replace the word "<i>train</i>" with "<i>teach</i>" or "<i>coach</i>" or even "<i>teach how</i></p>' +


'<p>To see this message at any time, type "intro"</p>' +


'<p>To see my version number, type "<i>about</i>", "<i>aboutbot</i>" or "<i>about_bot</i>"</p>';

bot.avatar = "https://cdn-images-1.medium.com/max/1200/1*0Cj-W6K2TP_xAh-rXxunBg.png";

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

function insertChat(who, text, time) {

if (time === undefined) {

time = 0;

}

var control = "";

var date = formatAMPM(new Date());

if (who == "user") {

control = '<li style="width:100%;">' +

'<div class="msj-rta macro">' +

'<div class="text text-r">' +

'<p>'+text+'</p>' +

'<p><small>'+date+'</small></p>' +

'</div>' +

'</li>';

} else {

control = '<li style="width:100%">' +

'<div class="msj macro">' +

'<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ bot.avatar +'" /></div>' +

'<div class="text text-l">' +

'<p>'+ text +'</p>' +

'<p><small>'+date+'</small></p>' +

'</div>' +

'</div>' +

'</li>';

}

setTimeout(

function() {

$("ul.chats").append(control).scrollTop($("ul.chats").prop('scrollHeight'));

}, time

);

}

function resetChat() {

$("ul.chats").empty();

}

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

url: 'profiles/digital4us.php',

data: {message: text},

success: function(response) {

reply = '<li style="width:100%">' +

'<div class="msj macro">' +

'<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ bot.avatar +'" /></div>' +

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

insertChat("bot", introText, 350);

scrollToBottom();

</script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">








  <!-- About Section -->

  <div id="about">

    <div class="container">

      <div class="row">

        <div class="col-md-12 text-center"><img src="http://res.cloudinary.com/digital4us/image/upload/v1525988624/Webp.net-resizeimage_1.jpg" class="img-responsive"></div>

        <div class="col-md-8 col-md-offset-2">

          <div class="about-text">

            <p>My name is <b>Olasupo Abdulhakeem Adigun</b>. I am A Blogger, A Web developer, An Intern at HNG Internship 4.0, A Ui/UX designer, Chatbot Developer (certificate from IBM Watson Assistant) A Favcoder, and a digital enthusiats .Passionate about Learning | Unlearning | Relearning and keeping pace with everything technology. Currently learning Android development and Chatbot Development with Favcode54, certified by IBM Watson Assistant, Warm, energetic and a fast learner.</p>

          </div>

          <div class="section-title text-center center">

            <h2>My Skills</h2>

            <hr>

          </div>

          <div class="categories">

            <ul class="cat">

              <li>

                <ol class="type">

                  <li><a href="#" data-filter="*">CSS3</a></li>

                 
 <li><a href="#" data-filter=>HTML5</a></li>

                 
 <li><a href="#" data-filter=>PHP</a></li>

                 
 <li><a href="#" data-filter=>SQL</a></li>

                </ol>

              </li>

            </ul>

            <div class="clearfix"></div>

          </div>

        </div>

      </div>

    </div>

  </div>


  <!-- Chat bot -->

  <div class="col-sm-3 col-sm-offset-4 frame">

    <ul class="chats"></ul>

    <div>

        <div class="msj-rta macro">

            <div class="text text-r" style="background:whitesmoke !important">

                <input class="mytext" placeholder="Type here" autofocus/>

            </div>

        </div>

    </div>

  </div>


</body>

</html>


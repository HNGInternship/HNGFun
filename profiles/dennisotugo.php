<!DOCTYPE HTML>
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
<html>
	<head>
		<title>Dennis Otugo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="/aerial/assets/css/main.css" />	
<style>
#overlay {

    background-image: none;
}
#mainb {
		text-align: center;
		width: 100%;
	}
	.chat-input {
  padding: 20px;
  background: #eee;
  border: 1px solid #ccc;
  border-bottom: 0;
}
input {
    background-color: #eee;
    border: none;
    font-family: sans-serif;
    /* color: #000; */
    /* padding: 15px 32px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    /* font-size: 30px; */
    width: 70%;
    font-size: 1rem;
    color: black;
    /* border: 2px solid #000000; */
    border-radius: 4px;
    padding: 8px;
}
span#user {
	display: none;
}
span#chatbot {
    font-family: sans-serif;
    text-align: center;
    text-decoration: none;
    width: 70%;
    font-size: 1.2rem;
    color: black;
}
.bot-container {
    border-bottom: 1px solid #bbbfbf;
    padding-bottom: 50px;
    width: 60%;
    margin: 50px auto;
  }
  .messages-container {
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
  .messages-container > div {
    display: inline-block;
    width: 100%;
  }
  .message {
    float: left;
    font-size: 16px;
    background-color: #edf3fd;
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
    border-color: transparent #edf3fd transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
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
  }
  .send-message-container {
    display: inline-grid;
    background-color: #2b7ae3;
    grid-column-gap: 10px;
    grid-template-columns: 1px auto auto 40px 1px;
    /* position: fixed; */
    width: 100%;
    left: 0;
    bottom: 0px;
    box-sizing: border-box;
    padding: 10px 0px;
    box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.25);
    height: 60px;
  }
  .message-box {
    border-radius: 3px;
    border: none;
    padding: 5px 10px;
    grid-column-start: 2;
    grid-column-end: 4;
  }
  .send-message-btn {
    background-color: #fff;
    padding: 0px;
    border-radius: 50%;
    border: none;
    font-size: 16px;
    grid-column-start: 4;
  }
  .send-message-btn > div {
    margin-top: 0px;
    margin-right: 2px;
  }
  .img-container {
    margin-left: 85px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #fff;
    padding: 5px;
    top: 150px;
    left: 175px;
  }
  .img-container > img {
    height: 190px;
    width: 190px;
    border-radius: 50%;
  }
  .time {
    padding: 10px;
    text-transform: uppercase;
    font-size: 60px;
    width: 100%;
  }
  .time-container {
    display: flex;
    height: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
  }
  .container {
    height: 100%;
  }


				</style>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">
					<header id="header">
						<h1>Dennis Otugo</h1>
						<p>Human Being &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p>
						<nav>
							<ul>
								<li><a href="https://facebook.com/el.chapon.9" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="https://twitter.com/wesleyotugo" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="https://github.com/dennisotugo" class="icon fa-github"><span class="label">Github</span></a></li>
								<li><a href="emailto:wesleyotugo@fedoraproject.org" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
							</ul>
						</nav>
					</header>
					
					
						<footer id="footer">
							<div id="mainb">
									<div class="bot-container">
											<div class="messages-container">
											  <div>
												<div class="message bot">
												  <span class="content">Hi! I'm a bot and you can ask me various questions and give me different commands.</span>
												</div>
											  </div>
											  <div>
												<div class="message bot">
												  <span class="content">Type "<code>show: List of commands</code>" to see what the list of commands I understand.</span>
												</div>
											  </div>
											</div>
											<div class="send-message-container">
											  <input class="message-box" placeholder="Type here..."/>
											  <button class="send-message-btn">
												<div>
												  <i class="fa fa-paper-plane" aria-hidden="true"></i>
												</div>
											  </button>
											</div>
										  </div>
				<script type="text/javascript">
				var trigger = [
					["hi","hey","hello","yo","bot"], 
					["how are you", "how is life", "how are things"],
					["what are you doing", "what is going on"],
					["how old are you"],
					["who are you", "are you human", "are you bot", "are you human or bot"],
					["who created you", "who made you"],
					["your name please",  "your name", "may i know your name", "what is your name"],
					["i love you"],
					["happy", "good"],
					["bad", "bored", "tired"],
					["help me", "tell me story", "tell me joke"],
					["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
					["bye", "good bye", "goodbye", "see you later"]
				];
				var reply = [
					["Hi","Hey","Hello","howdy","Yes, I'm listening..."], 
					["Fine", "Pretty well", "Fantastic"],
					["Nothing much", "About to go to sleep", "Can you guest?", "I don't know actually"],
					["I am 1 day old"],
					["I am just a bot", "I am a bot. What are you?"],
					["Kani Veri", "My God"],
					["I am nameless", "I don't have a name"],
					["I love you too", "Me too"],
					["Have you ever felt bad?", "Glad to hear it"],
					["Why?", "Why? You shouldn't!", "Try watching TV"],
					["I will", "What about?"],
					["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
					["Bye", "Goodbye", "See you later"]
				];
				var alternative = ["You would have to train me to say that", "Say that again but now say it slowly"];
				document.querySelector("#input").addEventListener("keypress", function(e){
					var key = e.which || e.keyCode;
					if(key === 13){ //Enter button
						var input = document.getElementById("input").value;
						document.getElementById("user").innerHTML = input;
						output(input);
					}
				});
				function output(input){
					try{
						var product = input + "=" + eval(input);
					} catch(e){
						var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
						text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
						if(compare(trigger, reply, text)){
							var product = compare(trigger, reply, text);
						} else {
							var product = alternative[Math.floor(Math.random()*alternative.length)];
						}
					}
					document.getElementById("chatbot").innerHTML = product;
					speak(product);
					document.getElementById("input").value = ""; //clear input value
				}
				function compare(arr, array, string){
					var item;
					for(var x=0; x<arr.length; x++){
						for(var y=0; y<array.length; y++){
							if(arr[x][y] == string){
								items = array[x];
								item =  items[Math.floor(Math.random()*items.length)];
							}
						}
					}
					return item;
				}
				function speak(string){
					var utterance = new SpeechSynthesisUtterance();
					utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Agnes";})[0];
					utterance.text = string;
					utterance.lang = "en-US";
					utterance.volume = 1; //0-1 interval
					utterance.rate = 1;
					utterance.pitch = 1; //0-2 interval
					speechSynthesis.speak(utterance);
				}
				</script>
						</footer>

			</div>
		</div>
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		<script>
			window.onload = function() {
			  $(document).keypress(function(e) {
				if(e.which == 13) {
				  getResponse(getQuestion());
				}
			  });
			  $('.send-message-btn').on('click', function () {
				getResponse(getQuestion());
			  });
			}
			function isUrl(string) {
			  var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
			  var regex = new RegExp(expression);
			  var t = string;
			  if (t.match(regex)) {
				return true;
			  } else {
				return false;
			  }
			}
			function stripHTML(message){
			  var re = /<\S[^><]*>/g
			  return message.replace(re, "");
			}
			function getResponse(question) {
			  updateThread(question);
			  showResponse(true);
			  if (question.trim() === "") {
				showResponse(':)');
				return;
			  } 
			  if (question.toLowerCase().includes("open: ") && isUrl(question.toLowerCase().split("open: ")[1].trim())) {
				var textToSay = question.toLowerCase().split("open: ")[1];
				showResponse('Okay, opening: <code>'+ textToSay + '</code>');
				window.open("http://" + textToSay);
				return;
			  }
			  if (question.toLowerCase().includes("say: ")) {
				var textToSay = question.toLowerCase().split("say: ")[1];
				var msg = new SpeechSynthesisUtterance(textToSay);
				window.speechSynthesis.speak(msg);
				showResponse('Okay, saying: <code>'+ textToSay + '</code>');
				return;
			  }
			  $.ajax({
				url: "profiles/dennisotugo.php",
				method: "POST",
				data: { payload: question },
				success: function(res) {
				  if (res.trim() === "") {
					showResponse(`
					I don\'t understand that question. If you want to train me to understand,
					please type <code>"train: your question? # The answer."</code>
					`);
				  } else {
					showResponse(res);
				  }
				}
			  });
			}
			function showResponse(response) {
			  if (response === true) {
				$('.messages-container').append(
				  `<div>
					<div class="message bot temp">
					  <span class="content">Thinking...</span>
					</div>
				  </div>`
				);
				return;
			  }
			  $('.temp').parent().remove();
			  $('.messages-container').append(
				`<div>
				  <div class="message bot">
					<span class="content">${response}</span>
				  </div>
				</div>`
			  );
			  $('.message-box').val("");
			}
			function getQuestion() {
			  return $('.message-box').val();
			}
			function updateThread(message) {
			  message = stripHTML(message);
			  $('.messages-container').append(
				`<div>
				  <div class="message you">
					<span class="content">${message}</span>
				  </div>
				</div>`
			  );
			}
			var options = { hour12: true };
			var time = "";
			function updateTime() {
			  var date = new Date();
			  time = date.toLocaleString('en-NG', options).split(",")[1].trim();
			  document.querySelector(".time").innerHTML = time;
			}
			setInterval(updateTime, 60);
		  </script>
		  <?php } ?>
	</body>
</html>

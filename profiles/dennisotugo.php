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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />	
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style>

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
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    width: 70%;
    font-size: 1.2rem;
    color: black;
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
					
					<div id="mainb">
					<div><span id="user"></span></div>
					<div><span id="chatbot"></span></div>
					<div><input id="input" type="text" placeholder="say anything..." autocomplete="off"/></div>
				</div>
				<script type="text/javascript">
				var trigger = [
					["hi","hey","hello"], 
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
					["Hi","Hey","Hello"], 
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
				var alternative = ["Haha...", "Eh..."];
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
					utterance.pitch = 2; //0-2 interval
					speechSynthesis.speak(utterance);
				}
				</script>
						<footer id="footer">
						</footer>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>

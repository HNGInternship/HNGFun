<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bl-de - Profile</title>
<style type="text/css">
font-family: Montserrat;
</style>
</head>
<body>
<nav>
<a href="#Profile">Profile</a>
    <a href="#ScarJobot">ScarJobot</a>
</nav>
<section id="Profile" align="center" style="background-color:#18BC9C; color: #fff">
<img src="http://res.cloudinary.com/bl-de/image/upload/v1525350858/pikbl-de.png">
<h1>MANNY EKANEM</h1>
<h2>Coder - Graphic Artist - User Experience Designer</h2>
<p><img src="https://res.cloudinary.com/bl-de/image/upload/v1525871730/map_marker.png"> Niger Delta, Nigeria</p>
<a href="mailto: [maestr0nic@msn.com]" target="_blank" alt="Email" src="https://res.cloudinary.com/bl-de/image/upload/v1525871536/mail.png"></a>
<a href="https://github.com/Bl-de" target="_blank" alt="Github" src="https://res.cloudinary.com/bl-de/image/upload/v1525871536/github.png"></a>
<a href="https://slack.com/hnginternship4" target="_blank" alt="Slack" src="https://res.cloudinary.com/bl-de/image/upload/v1525871536/slack.png"></a>
<a href="https://twitter.com/riggerus" target="_blank" alt="Twitter" src="https://res.cloudinary.com/bl-de/image/upload/v1525871536/twitter_black.png"></a>
</section>
<section id="ScarJobot" style="background-color:#2C3E50; color: #fff">
<h2>SCARjOBOT</h2>
<img src="https://res.cloudinary.com/bl-de/image/upload/v1525528851/ScarJo.png">
<h3>Hi, I'm ScarJo</h3>
	<div>user: <span id="user"></span></div>
	<div>ScarJo: <span id="chatbot"></span></div>
	<div><input id="input" type="text" placeholder="Talk to me..." autocomplete="off"/></div>

<script type="text/javascript">
var trigger = [
	["hi","hey","hello"], 
	["how are you", "how is life", "how are things"],
	["what are you doing", "what is going on"],
	["what can you do", "what are your skills", "tell me what you can do", "can you do anything"],
	["how old are you"],
	["who are you", "are you human", "are you bot", "are you human or bot"],
	["who created you", "who made you"],
	["your name please",  "your name", "may i know your name", "what is your name"],
	["i love you"],
	["happy", "good"],
	["bad", "bored", "tired"],
	["help me", "tell me story", "tell me joke"],
	["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
	["bye", "good bye", "goodbye", "see you later"],
	["fuck you", "screw you", "bitch", "fuck", "shit", "crap"]
];
var reply = [
	["Hi","Hey","Hello"], 
	["Fine", "Pretty well", "Fantastic"],
	["Nothing much", "About to go to sleep", "Can you guess?", "I don't know actually"],
	["I can talk", "I can solve math", "Why don't you find out", "I can be trained"],
	["I am ageless"],
	["I am just a bot", "I am a bot. What are you?"],
	["Manny Ekanem", "Blade. With a katana", "My sensei Blade"],
	["I am ScarJo", "Wouldn't you like to know?"],
	["I love you too", "Me too"],
	["Have you ever felt bad?", "Glad to hear it"],
	["Why?", "Why? You shouldn't!", "Try watching my movies"],
	["I will", "What about?"],
	["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
	["Bye", "Goodbye", "See you later"],
	["How old are you, seriously", "Your URL has been reported", "That's immature"]
];
var alternative = ["Haha...", "Eh...", "Say again?"];
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
</section>
</body>


</html>
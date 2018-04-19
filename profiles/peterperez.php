<?php



  try {
      $sql = 'SELECT name, username, image_filename, secret_word FROM secret_word, interns_data WHERE username = \'peterperez\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['username']; ?> | HNGInternship4</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<style type="text/css">
	body{
		color: #fff;
		font-family: 'Lato', sans-serif;
		background: linear-gradient(to bottom right, #00AEFF, #012738);
	}
		
		
		a{
			 color: #C4C4C4;
		}

		a:hover{
			color: #fff;
		}

		figure {
            background-image: url(http://res.cloudinary.com/pixeldb/image/upload/c_crop,h_4032,x_10,y_673/v1523637382/IMG_0952_tfxgmf.jpg);
            background-size: cover;
            border-radius: 4px;
            height: 150px;
            width: 150px;
            border: 3px solid #a0a0a0;
        }
	</style>



	<style type="text/css">
		



.window {
  display: block;
  margin: 0 auto;
  padding: 16px;
  max-width: 360px;
  border-radius: 9px;
  height: 460px;
  border: 1px solid #dcdcdc;
  background-color: rgba(255,255,255,0.85);
}

#history {
  display: block;
  overflow: hidden;
  overflow-y: auto;
  height: 360px;
}

input:focus {
  outline: none;
}

.chat_input {
  height: 48px;
}

.chat_input img {
  display: inline-block;
  margin: 14px 6px;
}

#chat {
  width: 250px;
  border: none;
  border-bottom: 1px solid #dcdcdc;
  background-color: transparent;
}

.middle {
  vertical-align: middle;
}

.right {
  float: right;
}

.left {
  float: left;
}

.user,
.bot {
  font-family: 'Roboto', sans-serif;
  border-radius: 11px;
  padding: 3px;
  font-size: 15px;
  display: block;
  margin: 4px;
  vertical-align: middle;
  overflow-x: hidden;
  max-width: 97.5%;
}

.user p,
.bot p {
  padding: 6px;
  margin: 0;
  display: inline-block;
  vertical-align: text-bottom;
  max-width: 89.5%;
  word-wrap: break-word;
}

.user p {
  padding-right: 0;
}

.user {
  margin: 4px;
  float: right;
  display: inline-block;
  background: #00AEFF;
}

.bot {
  float: left;
  display: inline-block;
  background-color: #0c90c9;
}

.avatar {
  width: 18px;
  height: 18px;
  margin: 6px;
  display: inline-block;
}

.chat_block {
  display: inline-block;
  clear: both;
}

.full {
  width: 100%;
  clear: both;
}

.full::after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}

.blurb {
  color: #dcdcdc;
  border: 1px solid #dcdcdc;
  border-radius: 9px;
  margin: 16px auto;
  padding: 16px;
  max-width: 360px;
  padding: 5px;
}

.blurb a:link {
  color: #dcdcdc;
}

.blurb a:hover {
  color: #999;
}

.blurb a:visited {
  color: #555;
}

.bouncer {
  width: 2px;
  height: 2px;
  display: inline-block;
  margin: 12px 1px;
  position: relative;
  background-color: #000;
}

.one {
  animation-duration: .5s;
  animation-name: bounce;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

.two {
  animation-duration: .5s;
  animation-name: bounce;
  animation-iteration-count: infinite;
  animation-direction: alternate;
  animation-delay: .1s;
}

.three {
  animation-duration: .5s;
  animation-name: bounce;
  animation-iteration-count: infinite;
  animation-direction: alternate;
  animation-delay: .2s;
}

@keyframes bounce {
  from {
    bottom: -6px;
  }
  to {
    bottom: 0px;
  }
}
	</style>







	<script type="text/javascript">
		/*
 * Main module for the lorem ipsum chat, declares local vars, calls init() on
 *  load
 *
 */

(function main() {
	"use strict";

	// Local vars
	var words,       // object for lorem ipsum JSON
	    chatInput,   // chat input
	    history,     // chat history window
	    isTyping;    // global boolean to prevent multiple asynchronous responses


	/*
	 * init - initializes XMLHttpRequest, reads in the words object, and adds
	 * event listeners
	 *
	 */
	function init () {
		/*var xhr,
		    success;

		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		}
		else {
			window.alert("Your browser does not support XMLHttpRequest. Please upgrade your browser to view this demo.");
			return false;
		}

		// Init AJAX, parse JSON
		xhr.open("get", "data/words.json", true);
		xhr.send(null);
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
				words = JSON.parse(xhr.responseText);
			}
			else
				console.log("Ready state:" + xhr.readyState + " Status: " + xhr.status);
		};*/



    words = {"1":["a"],"2":["ac","ad","at"]};

		// Init listeners
		chatInput = document.getElementById("chat");
		chatInput.addEventListener("keyup", parseText, false);
		history = document.getElementById("history");

		isTyping = false;
	}


	/**
	 * parseText is the callback for the keyup eventlistener, and listens for
	 * enter key to be pressed, signaling that the user has entered a message.
	 *
	 * @param {Event} event          - keyup from chatInput
	 *
	 */
	function parseText(event) {
		var message;

		if (event.keyCode === 13 && chatInput.value) {
			message = chatInput.value.trim();

			// message is "sent" and triggers bot "response" with small delay
			if (message !== "") {
				chatInput.value = "";
				createMessage("user", message);
				// Only respond to one message at a time
				if(!isTyping) {
					isTyping = true;
					setTimeout(function () {
						respondTo(message);
					}, Math.random() * (2000) + 1000);
				}
			}
		}
	}


	/*
	 * respondTo responds to the user's message by picking random lorem ipsum
	 * words from the words object.
	 *
	 * @param  {String} message    - incoming message string
	 *
	 */
	function respondTo(message) {
		var response = "",  // String to hold generated response
		    responseLength, // number of words in response
		    numChars,       // number of characters in word
		    selectedWord,   // index of selected word (by length)
		    delay,          // chat bot delay in ms
		    msgLength,      // number of words in @message String
		    comma;          // optional comma



		    if (message == "hi") {
		    	response = "hello, how are you?";
		    } else{
		    	response = "OOPS! I'm sorry but I'm confused. But you can train me to understand more by entering (train: QUESTION # ANSWER)";
		    }

		
		delay = 300;

		createMessage("bot", response, delay);
	}


	/**
	 * createMessage creates a message with an optional delay and posts it to the
	 * .chat_history window.
	 *
	 * @param  {String} from       - "user", "bot" class
	 * @param  {String} message    - message
	 * @param  {Number} delay      - delay in MS
	 *
	 */
	function createMessage(from, message, delay) {
		var p,                 // paragraph element for message
		    img,               // image for avatar
		    innerDiv,          // inner div to hold animation and avatar
		    outerDiv,          // outer div for clearing floats
		    animationSequence, // class list for animation
		    position;          // left or right

		// paragraph
		p = document.createElement("p");

		// img
		img = document.createElement("img");

		if (from === "bot") {
			img.src = "http://www.stickpng.com/assets/images/580b57fbd9996e24bc43be05.png";
			position = "left";
		}
		else if (from === "user") {
			img.src = "https://sdlambert.github.io/loremipsum/img/user168.svg";
			position = "right";
		}

		img.classList.add("avatar", "middle", position);

		// inner div
		innerDiv = document.createElement("div");
		innerDiv.appendChild(img);
		innerDiv.classList.add(from);

		// add animation, remove animation, add message
		if (delay) {
			addAnimation(innerDiv);
			setTimeout(function () {
				removeAnimation(innerDiv);
				p.appendChild(document.createTextNode(message));
				innerDiv.appendChild(p);
				history.scrollTop = history.scrollHeight;
				isTyping = false;
			}, delay);
		}
		else {
			// no delay, just post it
			p.appendChild(document.createTextNode(message));
			innerDiv.appendChild(p);
		}

		//outer div
		outerDiv = document.createElement("div");
		outerDiv.appendChild(innerDiv);
		outerDiv.classList.add("full");

		// history
		history.appendChild(outerDiv);
		history.scrollTop = history.scrollHeight;
	}


	/**
	 * addAnimation adds the "typing" animation to element by appending the
	 * animation sequence divs to the target element.
	 *
	 * @param {HTMLElement} element  - the target Element
	 *
	 */
	function addAnimation (element) {
		var animationSequence = ["one","two","three"];

		animationSequence.forEach(function (animationClass) {
			var newDiv = document.createElement("div");
			newDiv.classList.add("bouncer", animationClass);
			element.appendChild(newDiv);
		});
	}


	/**
	 * removeAnimation removes the "typing" animation by removing all of the
	 * child divs of the target element.
	 *
	 * @param  {HTMLElement} element - the target Element
	 *
	 */
	function removeAnimation (element) {
		var i = element.childNodes.length - 1;

		for ( ; i >= 0; i--)
			if (element.childNodes[i].tagName === "DIV")
				element.removeChild(element.childNodes[i]);
	}


	/**
	 * capitalizeWord takes in a lowercase string and returns it with the first
	 * letter capitalized.
	 *
	 * @param  {String} word - the word to capitalize
	 * @return {String}      - the capitalized word
	 */
	function capitalizeWord(word) {
		return  word.charAt(0).toUpperCase() + word.slice(1);
	}


	/**
	 * wordLengthByFrequency provides a Normal (Gaussian) distribution for word
	 * lengths. Higher length words are called less frequently.
	 *
	 */
	function wordLengthByFrequency() {
		var rndm,  // a random number between 1-100
		    dist,  // the distribution (in %) of the frequency of word lengths
		    i,     // loop counter
		    limit; // upper range limit for test

		rndm = Math.floor(Math.random() * 100);
		dist = [5, 7, 9, 13, 20, 13, 9, 5, 4, 4, 3, 2, 2, 2, 1, 1];

		for (i = 0, limit = 0; i < 16; i++) {
			limit += dist[i];
			if (rndm <= limit) {
				return ++i;
			}
		}
	}


	/**
	 * getPunctuation returns a random punctuation mark based on frequency.
	 *  There is a 10% chance of an exclamation point or question mark, and an
	 *  80% chance for a period.
	 *
	 */

	function getPunctuation() {
		var mark = Math.ceil(Math.random() * 10);

		if (mark == 9)
			return '?';
		else if (mark == 10)
			return '!';
		else
			return '.';
	}

	// add event listener for page load
	window.addEventListener("load", init, false);

})();

	</script>
</head>
<body>
<section>
   <div class="container">
   	<div class="row" style="height: 50px;"></div>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-6">
         	<div class="content">
		    	
		    	
		    	<figure></figure>
		    	<xmp style="font-family: 'Lato', sans-serif; font-weight: 600; font-size: 30px;"> </<?php echo $data['username']; ?>> </xmp>
		    	<h4><?php echo $data['name']; ?></h4>

		    	<span style="color: #C4C4C4;">Laravel • PHP • HTML • CSS • JAVA • C</span><br>

		    	<span>I believe the passion to learn more everyday,<br> helps me use technology to solve problems around me.</span>
		    	<br>
		    	<div style="font-size: 25px; margin-top: 10px;">
		    	<a href="http://www.github.com/peterperez" target="_blank"><i class="fa fa-github"></i></a>
		    	<a href="http://www.instagram.com/ambarelyscared" target="_blank"><i class="fa fa-instagram"></i></a>
		    	<a href="http://www.twitter.com/ambarelyscared" target="_blank"><i class="fa fa-twitter"></i></a>
		    	</div>
		    	<h3>Secret Word: <?php echo $secret_word; ?></h3>
		    	


		    </div>
         </div>
         <div class="col-md-4">
         	

			  <div class="window">
			    <div id="history"></div>
			    <div class="chat_input full">
			      <img src="https://sdlambert.github.io/loremipsum/img/smiling36.svg" height="20" width="20" class="middle">
			      <input type="text" name="chat" id="chat" style="color: #000;" autofocus="autofocus" placeholder="Type Message and PRESS 'ENTER">
			    </div>
			  </div>
			  




         </div>
      </div>
   </div>
</section>
</body>
</html>

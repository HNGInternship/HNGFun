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

	<body>
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
			
			<style>
			
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
			
				body, html {
					/* height: 100%!important; */
				}
			</style>
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
						url: "profiles/the_ozmic.php",
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


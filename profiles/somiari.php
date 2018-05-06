<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Somiari Lucky | Learner, Developer, Builder</title>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		*,
		*::before,
		*::after {
			margin: 0;
			padding: 0;
			box-sizing: inherit;

		}

		html {
			font-size: 100%;
			box-sizing: border-box;
			height: 100%;
		}

		body {
			font-family: Roboto, 'Roboto Slab', sans-serif;
			font-size: 1.4rem;
			line-height: 1;
			height: 100%;
			background: #ecf0f1;
		}

		a {
			color: inherit;
			text-decoration: none;
		}

		.contained {
			margin: 0 auto;
			height: 100%;
			width: 95%;
			max-width: 2000px;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			text-align: center;
		}

		.name {
			font-family: 'Playfair Display', sans-serif;
			font-size: 4rem;
			font-weight: 900;
			color: #0e0e19;
			letter-spacing: 1px;
		}

		.labels {
			font-family: 'Roboto Condensed', sans-serif;
			font-size: 1.1rem;
			letter-spacing: 1px;
			color: orangered;
			margin-top: 15px;
		}

		.socials {
			width: 80%;
			margin-top: 30px;
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
		}

		.socials .fa-icon {
			font-size: 1.2rem;
			flex-basis: 33%;
			margin: 8px auto;
			color: #555;
			transition: all .5s ease;
		}

		.socials .fa-icon:hover {
			color: #0e0e19;
		}

		.footer {
			font-size: 1.1rem;
			color: #666;
			margin-left: auto;
			margin-right: auto;
			margin-top: 40px;
			margin-bottom: 20px;
			text-align: center;
		}

		.footer .icon {
			padding-left: 5px;
			padding-right: 5px;
			font-size: 1.4rem;
			color: rgba(0, 0, 0, .3);
		}

		.profile-pic img {
			width: 90%;
		}

		.chat-box {
			display: flex;
			flex-direction: column;
			margin: 50px auto 30px auto;
			border: 1px solid rgba(0, 0, 0, .3);
			border-radius: 30px;
			width: 90%;
			padding-bottom: 10px;
		}

		.chat-box .chat-box-header {
			display: block;
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 1px solid rgba(0, 0, 0, .3);
			font-size: 18px;
		}

		.chat-msgs {
			height: 300px;
			margin: 30px auto 15px auto;
			overflow-y: scroll;
			width: 98%;
		}

		.guest,
		.alan {
			width: auto;
			max-width: 80%;
			border: 1px solid lightgrey;
			padding: 5px;
			clear: both;
			margin: 0 5px 5px 8px;
			border-radius: 10px;
			font-size: 16px;
		}

		.alan {
			text-align: left;
			padding-left: 20px;
		}

		.guest {
			float: right;
			text-align: left;
			padding-right: 20px;
		}

		.chat-type {
			position: relative;
			width: 100%;
			margin: 0 auto;
		}

		.chat-msg {
			width: 95%;
			margin: 0 auto;
			outline: none;
			border: 1px solid rgba(0, 0, 0, .3);
			background: transparent;
			/* position: relative; */
			resize: none;
			padding: 10px;
			padding-right: 75px;
			height: 90px;
			border-radius: 10px;
			font-size: 18px;
		}

		.chat-send {
			position: absolute;
			border-radius: 50%;
			border: 1px solid rgba(0, 0, 0, .3);
			height: 50px;
			width: 50px;
			background: transparent;
			right: 20px;
			bottom: 23px;
			color: rgba(0, 0, 0, .6);
			cursor: pointer;
			outline: none;
			/* overflow: hidden; */
		}

		@media only screen and (min-width: 600px) {
			.socials .fa-icon {
				flex-basis: 0;
			}
			.name {
				font-size: 4.1rem;
				font-weight: bolder;
			}
			.labels {
				font-size: 1.4rem;
			}
			.footer {
				font-size: 1.2rem;
			}
			.footer .icon {
				font-size: 1.4rem;
			}
			.guest,
			.alan {
				width: auto;
				max-width: 60%;
			}

			.chat-send {
				line-height: 50px;
				position: absolute;
				border-radius: 50%;
				border: 1px solid rgba(0, 0, 0, .3);
				;
				height: 50px;
				width: 50px;
				background: transparent;
				right: 40px;
				bottom: 23px;
				color: rgba(0, 0, 0, .6);
				cursor: pointer;
				outline: none;
				/* overflow: hidden; */
			}
			.chat-msg {
				width: 95%;
				margin: 0 auto;
				outline: none;
				border: 1px solid rgba(0, 0, 0, .3);
				background: transparent;
				/* position: relative; */
				resize: none;
				padding: 10px;
				padding-right: 85px;
				height: 90px;
				border-radius: 10px;
				font-size: 18px;
			}

			.chat-box .chat-box-header {
				font-size: 24px;
			}
		}

		@media only screen and (min-width: 700px) {
			.name {
				font-size: 5.1rem;
				font-weight: bolder;
			}
			.labels {
				font-size: 1.8rem;
			}
		}

		@media only screen and (min-width: 800px) {
			.name {
				font-size: 6rem;
				font-weight: bolder;
			}
			.labels {
				font-size: 1.9rem;
			}
		}

		@media only screen and (min-width: 1200px) {
			.name {
				font-size: 8rem;
				font-weight: bolder;
			}
			.labels {
				font-size: 2.4rem;
			}
		}
	</style>
</head>

<body>

	<?php

   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'somiari'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
	?>
		<div class="contained">
			<figure class="profile-pic">
				<img src="https://res.cloudinary.com/somiari/image/upload/v1523656656/somiariblended_feuybj.png" alt="An overtly serious pic of Somiari. Lol.">
			</figure>
			<section class="title">
				<h1 class="name">
					<?php echo $user->name?>
				</h1>
				<p class="labels">UI/UX. Front-end. Content Development.</p>
			</section>
			<section class="socials">
				<a href="https://www.github.com/somiari" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-github-alt"></i>
				</a>
				<a href="https://www.twitter.com/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-twitter"></i>
				</a>
				<a href="https://www.facebook.com/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-facebook-f"></i>
				</a>
				<a href="https://www.medium.com/@somiari" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-medium"></i>
				</a>
				<a href="https://www.linkedin.com/in/somiarilucky" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-linkedin"></i>
				</a>
				<a href="mailto:hello@somiari.me" class="fa-icon" target="_blank">
					<i class="fa fa-fw fa-envelope"></i>
				</a>
			</section>

			<form class="chat-box">
				<span class="chat-box-header">Alan is not a bot</span>
				<div class="chat-msgs">
					<p class="alan">Hello! My name is Alan, and I am not a bot.</p>
					<p class="alan">I'm a fast learner. To teach me something, just type and send: train # question # answer # password</p>
				</div>
				<div class="chat-type">
					<textarea class="chat-msg" required></textarea>
					<div class="chat-send">
						<i class="icon fa fa-fw fa-paper-plane"></i>
					</div>
				</div>
			</form>

			<footer class=".footer">
				<?php
				date_default_timezone_set('Africa/Lagos');
			?>
				<span class="date">
					<?php echo date("D. M d, Y"); ?>
				</span>
				<i class="icon fa fa-fw fa-clock-o"></i>
				<span class="time">
					<?php echo date("h:i a"); ?>
				</span>
			</footer>

		</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" ></script>
		<script>
			const chatMsgs = document.querySelector(".chat-msgs");
			const chatMsg = document.querySelector(".chat-msg");
			const callAJAX = document.querySelector(".chat-send");

			callAJAX.addEventListener("click", function () {
				if (chatMsg.value != "") {
					chatMsgs.innerHTML += '<p class="guest">' + chatMsg.value + '</p>';
				}
				fixScroll();
				getAlan(chatMsg.value);
				chatMsg.value = "";
			});

			function getAlan(messageAlan) {
				if (messageAlan.length == 0) {
					return;
				} else {
					var xmlReq = new XMLHttpRequest();
					xmlReq.onreadystatechange = function () {
						if (this.readyState == 4 && this.status == 200) {
							var message = this.responseText;
							fixScroll();
							if (message != "") {
								chatMsgs.innerHTML += '<p class="alan">' + message + '</p>';
							}
						}
					}
				};

				$.ajax({
					type: "POST",
					url: 'profiles/somiari.php',
					data: {
						alan: messageAlan}
				});
				// xmlReq.open("GET", "answers.php?alan=" + messageAlan, true);
				// xmlReq.send();
			}

			function fixScroll() {
				chatMsgs.scrollTop = chatMsgs.scrollHeight - chatMsgs.clientHeight;
			}
		</script>
</body>
</html>
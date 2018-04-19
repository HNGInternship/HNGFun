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
	</body>
</html>

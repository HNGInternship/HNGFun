<?php 
#########################################################
#  __                     __          __    _
# |__ |\/||\/| /\ |\ || ||__|    |\/||__|  / \|\ |
# |__ |  ||  |/--\| \|\_/|__|__  |  ||__|__\_/| \|
#########################################################
#########################################################
####################### @EMELON #########################
#########################################################

/*
Project objectives and some highlights

---- Main functionalities -----

- Form in the front end
- Validate form content in the front end
- Send form content in an ajax request to the server 
- Validate form content server side
- Query database to see if question exists
- If question exists, then retrieve and then display it to the user
- If question doesn't exist, display a custom reply (probably using a few keywords from the user input)
- It's also possible to train the bot
- type train: question #answer
- Training syntax "train: what is the time? #time is date('h':'m':'s')"
- You could also add parameters to the questions 
- Example "train: what is the time in {location}? #the time in {location} is date('h':'m':'s')"
- Asynchronous JavaScript has to be used to achieve this functionality (adding parameters)
- For extra points, let the bot call a certain function as a response such as what time is it?
- Create a function and save it in answers.php
- Function is expected to return a text (string) result

----- Bot enhancements -----

- Be a motivational speaker
- A user types in a feeling and Bot returns a quote relating to that specific feeling
- Assist user in solving problems by referring them to documentation and Q/A sites

----- Bot UI -----

- Popup chat-box
- A div containing the chat-box
- A header for the bot name
- A body for the messages 
- An unordered list representing all of the messages in a conversation
- Represent every message as a list item
- Insert a paragraph for the text
- Paragraph for date
- Create two li classes
- Class one is user messages
- Class two is bot messages 


----- Bot client side logic -----

- An event handler for when the form is submitted
- Capture info from the form
- Append list item to form class user message 

----- Bot server side logic -----

*/

/* 

Learning Material

I advise you to understand the following
$_SERVER['REQUEST_METHOD']

*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Site</title>
	<meta name="author" content="Emmanuel-Melon">
	<link href="https://fonts.googleapis.com/css?family=Orbitron|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<style type="text/css">
		body {
			background: linear-gradient(to left top, #EAE2D6, #D5C3AA); /* Linen, Oyster */
		}
		/* typography */
		h1, h2, h3, h4, h5, h6 {
			font-family: 'Orbitron', sans-serif;
			padding-left: 0.3em;
			border-radius: 0.2em;
		}

		.container {
			margin: 1.5em;
		}
		.emphasized {
			background: #fff;
			color: #D13525; /* apple red */
			padding-left: 0.5em;
			border-radius: 0.3em;
		}
		.small {
			background: #fff;
			color: #D13525; /* apple red */
			padding-left: 0.5em;
			border-radius: 0.3em;
			font-size: 0.5em;
		}
		p, li {
			font-family: 'Ubuntu', sans-serif;
		}
		ul {
			list-style-type: none;
		}

		ul li {
			padding: 0.3em;
			margin: 0.1em;
		}
		ul li:nth-child(even) {
			border-left: solid #4C3F54 0.2em; /* fig */
			padding-left: 0.5em;
			color: #4C3F54; /* fig */
		}
		ul li:nth-child(odd) {
			border-left: solid #D13525 0.2em; /* apple red */
			padding-left: 0.5em;
			color: #4C3F54; /* fig */
		}
		/* font-awesome icons */
		.fas {
			color: #D13525; /* apple red */
		}
		/* general styles */
		.card, .para {
			box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			transition: all 0.3s cubic-bezier(.25,.8,.25,1);
		}
		.card:hover, .para:hover {
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
		}
		.card-title {
			color: #4C3F54; /* fig */
			border-left: solid #4C3F54 0.2em;  /* fig */

		}
		.social {
			padding: 1.5em;
			width: 50%;
			margin: 0 auto;
			text-align: center;
			margin-top: 0.5em;
		}
		.social a {
			padding: 0.5em;
			color: #4C3F54; /* fig */
		}
		.social a:hover {
			padding: 0.5em;
			color: #D13525;  /* apple red */
		}
		.header h1 {
			background: #fff;
			color: #4C3F54; /* fig */
			padding-left: 0.5em;
			border-left: solid #4C3F54 0.3em; /* fig */
		}
		.header h3 {
			color:  #D13525;  /* apple red */
		}
		.top-bar {
  background: #666;
  position: relative;
  overflow: hidden; 
}
.top-bar::before {
  content: "";
  position: absolute;
  top: -100%;
  left: 0;
  right: 0;
  bottom: -100%;
  opacity: 0.25;
  background: radial-gradient(white, black);
}

.top-bar > * {
  position: relative;
}

.top-bar::before {
  animation: pulse 1s ease alternate infinite;
}
@keyframes pulse {
  from { opacity: 0; }
  to { opacity: 0.5; }
}


	</style>
</head>
<body>
<?php 
	//create database connection
	if(!defined('DB_USER')){
        require "../config.php";     
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }

    //query databse for secret word
    $query_secret_word = $conn->query("Select * from secret_word LIMIT 1");
	$query_secret_word = $query_secret_word->fetch(PDO::FETCH_OBJ);
	$secret_word = $query_secret_word->secret_word;

    //query databse for username
    $query_username = $conn->query("Select * from interns_data where username = 'emelon'");
	$query_username = $query_username->fetch(PDO::FETCH_OBJ);
	$username = $query_username->username;

    //query databse for name
	$query_name = $conn->query("Select * from interns_data where name = 'Emmanuel Daniel'");
	$query_name = $query_name->fetch(PDO::FETCH_OBJ);
	$name = $query_name->name;

?>

<?php 
//chatbot logic
//we'll recieve an ajax call from the client containing the message

?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div id="profile">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="http://res.cloudinary.com/dwacr3zpp/image/upload/v1525132727/QVmkcjuT_400x400.jpg" alt="Emmanuel-Melonn" class="img-fluid">
						<div class="card-body">
							<h5 class="card-title"><?php echo "$name"; ?></h5>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><i class="fas fa-map-marker"></i> Harare, Zimbabwe</li>
								<li class="list-group-item"><i class="fas fa-graduation-cap"></i> Harare Institute of Technology</li>
								<li class="list-group-item"><i class="fas fa-briefcase"></i> Web Developer</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="header">
					<h1>Hi, my name is <?php echo "$username"; ?></h1> <hr>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<h3 class="emphasized">I do...</h3> <hr>
						<ul class="list-group list-group-flush">
							<li>Web application development,</li>
							<li>HTML5 games,</li>
							<li>Software design and architecture,</li>
							<li>API design,</li>
							<li>&amp; I also build mobile apps</li>
						</ul> <hr>
					</div> <!-- col-md-6 -->
					<div class="col-md-6">
						<h3 class="emphasized">Let's chat...</h3> <hr>
						<div class="chatbox">
							<div class="top-bar">
								<h1>Hangouts</h1>
								<!-- likely some spans and stuff -->
							</div>
							<ol class="conversation">
								<li>
									<img class="avatar" />
									<div class="message">
										<p>Talkie talk talk.</p>
									</div>
								<li>
							</ol>
						</div>
					</div> <!-- col-md-6 -->
				</div> <!-- row -->

			</div> <!-- col-md-8 -->
		</div> <!-- row -->
	</div> <!-- container -->

	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="social">
					<p>
						<a href="https://twitter.com/JunubiMan" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
						<a href="https://twitter.com/JunubiMan" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
						<a href="https://github.com/Emmanuel-Melon/" target="_blank"><i class="fab fa-github fa-2x"></i></a>
					</p>
				</div>
			</div> <!-- row -->
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		//handle form here

		/*
		1 - Capture form details
		2 - Validate and sanitize form
		3 - send an ajax call to the server

		*/



$(document).ready(function() {

	var form = $('#form');
	//prevent default behavior
	form.submit(function(e) {
		e.preventDefault();
	})

	//create a new message 
	function newMessage() {
		//get value from form input
		console.log("I have been called");
	}

	//add event handler for when a user clicks on submit
	$('.btn').click(function() {
		newMessage();
		serverCall();
	});

	//I assume this is fired when a user presses return
	$(window).on('keydown', function(e) {
	  if (e.which == 13) {
		newMessage();
		ajaxCall();
		return false;
	  }
	});

	//send an ajax request to the server with the form's content
	function serverCall() {
		var question = $("#message").val();

		//check if question is an empty string
		if($.trim(question) == '') {
			return false;
		}

		//send an ajax request
		$.ajax({
			url : "profiles/emelon.php",
			type : "post",
			data : {question : question},
			dataType : "json",
			success : function(res) {

				//create a div and attach class bubble to it to indicate it's a message
				//append div
				//make chat window scrollable 


				/* 
				some hints
				parseHTML on response
				try to figure out what is the response object
				also jquery.find() method
				*/

				/*
				What you're supposed to do when this request is successfully sent to the server
				// I assume it's when a user asks a question
				// An immediate response would be displaying the message to them
				//Means create an element (could be li, p, a)
				//append to chat window
				//display content in there
				//that's my client side logic
				//server side logic would be handling the question and then performing the query
				//your next step would be creating the chat bubbles
				*/

			}, 
			error : function(err) {
				console.log(err);
			}
		});
	}
});


/*

git status: check status of project. Which files are being tracked.
git add . (dot): add all files to git
git commit -m 'write message here': commits changes to git
git pull origin master: refreshes and keeps your files up to date with the online version
git push -u origin master: uploads the files into github


So, there are two copies of the project


An offline copy known as master 
An online copy known as origin master 

You write code offline then push it online
Always make sure you git pull origin master so the files stay up to date

*/

	</script>
</body>
</html>

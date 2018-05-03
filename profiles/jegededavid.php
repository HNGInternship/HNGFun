<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>JEGEDE DAVID- Hng Intern</title>
		<script type="text/javascript">
				var i = 0;
        var text = "Jegede David, i am a Web Developer";
        var speed = 50;
        var j = text.length;
        
        function textType() {
          if (i < text.length) {
            document.getElementById("typingEffect").innerHTML += text.charAt(i);
            i++;
            setTimeout(textType, speed);
          }
        }
		</script>
		<style type="text/css">
			body{
				background-color: #FF0000;
				background: linear-gradient(to bottom right, #87ceeb, #ffffff);
			}
			footer {
				padding-top: 200px;
				text-align: center;
				font-size: 30px;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 70px;
			}
			#socialMedia {
				padding-top: 40px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}
           
            
            #output, #container {
    display: flex;
    justify-content: center;
    margin-top: 100px;
}


input {
    background-color: #eee;
    border: none;
    font-family: sans-serif;
    color: #000;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 30px;
}
      
            
		</style>
	</head>
	<body class="container" onload="textType()">

		<main >
			<section id="typingEffect"></section>
			<section></section>
			<section id="socialMedia">
				<div>Social Media</div>
				<div id="socialicons">
                    <a href="https://facebook.com/david_jegede91@yahoo.com"><i class="fa fa-facebook"></i></a>
				</div>
                
                <div class ="col-md-6" id="imgblock">
                    <img class = "img img-circle" src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg">
                </div>
			</section>
		</main>
        
        <div id="output"></div>
        <div id="container">
            <input type ="text" id ="input" value="">
        </div>
        
        <!--jquery for enter key press -->
        
        <script src= "https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>
       
        
      
        <script>
            var questionNum = 0;													// keep count of question, used for IF condition.
var question = '<h1>Welcome to david bot what is your name?</h1>';				  // first question

var output = document.getElementById('output');				// store id="output" in output variable
output.innerHTML = question;													// output first question

function bot() { 
    var input = document.getElementById("input").value;
    console.log(input);

    if (questionNum == 0) {
    output.innerHTML = '<h1>hello ' + input + '</h1>';// output response
    document.getElementById("input").value = "";   		// clear text box
    question = '<h1>how old are you?</h1>';			    	// load next question		
    setTimeout(timedQuestion, 2000);									// output next question after 2sec delay
    }

    else if (questionNum == 1) {
    output.innerHTML = '<h1>That means you were born in ' + (2018 - input) + '</h1>';
    document.getElementById("input").value = "";   
    question = '<h1>will be happy if you can train me?</h1>';					      	
    setTimeout(timedQuestion, 2000);
    }   
    else if (questionNum == 2){
    output.innerHTML= '<h1>so sorry but i don\'t\ understand your message. But you could teach me. train: this is a question # this is an answer # your password</h1>';
    document.getElementById("input").value = "";
    question='<h1>Thank you for attempting to train me</h1>';
    setTimeout(timedQuestion, 2000);
    
    }
    else if (questionNum == 3){
    output.innerHTML='<h1>did you get this is a question 3 this is an answer # your password</h1>';
    document.getElementById("input").value="";
    }
}
            
            
   
function timedQuestion() {
    output.innerHTML = question;
}
            
            
            

//push enter key (using jquery), to run bot function.
$(document).keypress(function(e) {
  if (e.which == 13) {
    bot();																						// run bot function when enter key pressed
    questionNum++;																		// increase questionNum count by 1
  }
});

        </script>
        
		
		<footer> Jegede David @ 2018</footer>
	</body>
</html>

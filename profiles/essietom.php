<?php 
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }


require "../answers.php";
		date_default_timezone_set("Africa/Lagos");
		
		
		$question = $_POST['question']; 
		
		$index_of_train = stripos($question, "train:");
		if($index_of_train === false){
			$question = preg_replace('([\s]+)', ' ', trim($question)); 
			$question = preg_replace("([?.])", "", $question); 
			
			$question = "%$question%";
			$sql = "select * from chatbot where question like :question";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $question);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->fetchAll();
			if(count($rows)>0){
				$index = rand(0, count($rows)-1);
				$row = $rows[$index];
				$answer = $row['answer'];	
			
				$index_of_parentheses = stripos($answer, "((");
				if($index_of_parentheses === false){ 
					echo json_encode([
						'status' => 1,
						'answer' => $answer
					]);
				}else{
					$index_of_parentheses_closing = stripos($answer, "))");
					if($index_of_parentheses_closing !== false){
						$function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
						$function_name = trim($function_name);
						if(stripos($function_name, ' ') !== false){ 
							echo json_encode([
								'status' => 0,
								'answer' => "The function name should not contain white spaces"
							]);
							return;
						}
						if(!function_exists($function_name)){
							echo json_encode([
								'status' => 0,
								'answer' => "I am sorry but I could not find that function in the database"
							]);
						}else{
							echo json_encode([
								'status' => 1,
								'answer' => str_replace("(($function_name))", $function_name(), $answer)
							]);
						}
						return;
					}
				}
			}else{
				echo json_encode([
					'status' => 0,
					'answer' => "Unfortunately, I cannot answer your question at the moment. you can train me now. The training data format is <br> <b>train: question # answer</b>"
				]);
			}		
			return;
		}else{
		
			$question_and_answer_string = substr($question, 6);
			
			$question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
			
			$question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); 
			$split_string = explode("#", $question_and_answer_string);
			if(count($split_string) == 1){
				echo json_encode([
					'status' => 0,
					'answer' => "Invalid training format. I dont understand your commands. <br> The correct training data format is <br> <b>train: question # answer</b>"
				]);
				return;
			}
			$que = trim($split_string[0]);
			$ans = trim($split_string[1]);
			if(count($split_string) < 3){
				echo json_encode([
					'status' => 0,
					'answer' => "You need to enter my keyword before you train me"
				]);
				return;
			}
			$password = trim($split_string[2]);
			
			define('TRAINING_PASSWORD', 'trainisdope');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "You are not authorized to train me"
				]);
				return;
			}
			
			$sql = "insert into chatbot (question, answer) values (:question, :answer)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $que);
			$stmt->bindParam(':answer', $ans);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode([
				'status' => 1,
				'answer' => "Thank you, I can now do better"
			]);
			return;
		}
		echo json_encode([
			'status' => 0,
			'answer' => "Unfortunately, I cannot answer your question at the moment. I need to be trained further"
		]);
		
	
?>
<head>
	<title><?php echo $user->username; ?></title>
	<style type="text/css">
		
		body{
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
	max-width: 1172px;
	background-color: #a1a1a1 ;
	background: no-repeat linear-gradient(to bottom,rgba(0,0,0,0.0),rgba(0,0,0,0.7));
}
.inner
{
	margin: 30px;
	padding-left: 90px;
	padding-right: 90px;
}
.banner
{
	width:100%;
	height: 500px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 40px;
	box-shadow: 10px 10px 5px #888888;
	background-color:rgba(0,0,0,0.1);

}

.more
{
	margin: 1px solid black;
	background-color: #352632;
	color:white;
	box-shadow: 5px #888888;
	text-decoration: none;
	border-radius: 7px;
	padding:5px;

}

.box
{
	background-color: #211d2e;
	color:white;
}
.box2
{
	background-color: black;
	color: white;
	
	
}
.box2list
{
	list-style-type: square;
}
.box2list > li > a
{
	
	text-decoration: none;
	color:white;
	margin-bottom: 50px;
}

.minbox
{
	width: 30.5%;
	height:100%;
	margin: 10px;
	float: left;
	text-align: center;
	padding: 2px;

}


.side-banner{
	width:30%;
	float: left;
	height: 100%;
}

.recent-work{
	border:1px solid #fff;
	padding:5px;
	height:27%;
	width: 95%;
}

.banner-main
{
	
	/*background-color:#113B66;*/
	color: black;
	height: 100%;
	text-align:center;
	width: 100%;
	padding-top: 30px;
	font-size: 18px;
}

.round-border
{
	border-radius:50%;
}

.page
{
	width:100%;
	height: 300px;
	position: relative;
	top:10px;
	margin: 0 auto;
	
}


.mybackground
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523720347/background.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}
.bbg
{
	background-image: url('http://res.cloudinary.com/essietom/image/upload/v1523719268/skills.png') ; 
	background-repeat:no-repeat; 
	background-size:cover;
	background-color: black;
	color: white;
}

.menu
{
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	/*background-color: #333;*/
}
.absmenu
{
	position: absolute;
	top:30px;
	left: 55%;
	

}
.menu>li
{
	
	float: left;
}

.menu > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
  color: white;
  text-align: center;
  text-decoration: none;
  animation:menushift 5s;
  animation-iteration-count: infinite;
}

.active
{
	color: red;
}

.menu2 {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  float: right;
}

.nav
{
	margin: 7.5px -15px;

}


@keyframes menushift
{
	0%{color:navy;}
	25%{color:blue;}
	50%{color:teal;}
	75%{color:fuchsia;}
	100%{color:purple;}
}
.roll-image
{
	padding-top: 15px;
    transition:width:10s, height: 10s,transform:2s;
    transition-timing-function: ease-in;
}

.roll-image:hover {

    width: 150px;
    height: 155px;
    -webkit-transform: rotate(360deg); /* Chrome, Safari, Opera */
    transform: rotate(360deg);
}
		
				#time{
    display-content:center;
}
		#demo {
            
            width: 30%;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #F8F8F8;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #999;
            line-height: 1.4em;
            font: 13px helvetica,arial,freesans,clean,sans-serif;
            color: black;
        }
        #demo input {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            width: 100%;
	    
        }
        .button {
            display: inline-block;
            background-color: darkcyan;
            color: #fff;
            padding: 8px;
            cursor: pointer;
            float: right;
        }
        #chatBotCommandDescription {
            display: none;
            margin-bottom: 20px;
        }
        input:focus {
            outline: none;
        }
        .chatBotChatEntry {
            display: none;
        }
        .chatBotChatEntry {
    padding: 20px;
    background-color: #fff;
    border: none;
    margin-top: 5px;
    font-family: 'open_sanslight', sans-serif !important;
    font-size: 17px;
    font-weight: normal;
}
.chatBotChatEntry * {
    font-family: 'open_sanslight', sans-serif !important;
    font-size: 17px;
    font-weight: normal;
}
.chatBotChatEntry .origin {
    font-weight: bold;
    margin-right: 10px;
}
.chatBotChatEntry .imgBox {
    position: relative;
    width: 32%;
    display: inline-block;
    margin-top: 10px;
    margin-right: 10px;
    height: 218px;
    overflow: hidden;
}
.chatBotChatEntry .imgBox .actions .button {
    margin-top: 10px;
    font-size: 18px;
    padding: 5px;
    width: 50%;
}
.chatBotChatEntry .imgBox .actions {
    position: absolute;
    display: none;
    top: 31px;
    width: 100%;
    text-align: center;
}
.chatBotChatEntry .imgBox:hover .actions {
    display: block;
}
.chatBotChatEntry .imgBox .title {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 5px;
    color: #fff;
    background-color: #333;
    font-weight: normal;
    font-size: 16px;
}
    .chatBotChatEntry .imgBox img {
        width: 100%;
    }
    .bot {
        /*border: 4px solid rgba(0, 132, 60, 0.2);*/
        background-color: rgba(0, 132, 60, 0.2);
    }
    .human {
        /*border: 4px solid rgba(38, 159, 202, 0.2);*/
        background-color: rgba(38, 159, 202, 0.2);
    }
    #chatBotCommandDescription {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }
    .commandDescription span.phraseHighlight {
        color: chartreuse;
    }
    .commandDescription span.placeholderHighlight {
        color: deeppink;
    }
    .commandDescription {
        margin-top: 5px;
    }
    #chatBotConversationLoadingBar {
        background-color: darkcyan;
        height: 2px;
        width: 0;
    }
    .appear {
        animation-duration: 0.2s;
        animation-name: appear;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }
    @keyframes appear {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
 }
	</style>
</head>
<body>
<div class="inner">
<div class="absmenu">
<nav class="menu2">
	<ul class="menu nav">
		<li><a href="#" class="active">Home</a></li>
		<li><a href="#">Skills</a></li>
		<li><a href="#">About me</a></li>
		<li><a href="#">Awards</a></li>
		<li><a href="#">Academics</a></li>
	</ul>
</nav>
</div>
<div class="banner">

<div class="side-banner box">
	<h3 style="text-align:center">Recent Work</h3>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719269/work1.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work2.png" height="100%" width="100%">
	</div>
	<div class="recent-work">
		<img src="http://res.cloudinary.com/essietom/image/upload/v1523719267/work3.png" height="100%" width="100%">
	</div>
</div><!--end of side banner box -->

<div class="banner-main">
	
	<img src="http://res.cloudinary.com/essietom/image/upload/v1523719246/<?php echo $user->image_filename; ?>" width="100px" height="110px" class="round-border roll-image">
	<h2><?php echo $user->name; ?></h2>
	<h4>Web developer and designer</h4>
	<p style="text-align: justify; padding-right:10px;margin-left: 10px;">
		I am a tech enthusiast, passionate about changing my world with technology. Software development is my thing, with determination to discover creative ideas and solve complex problems.<br>
		I love inspiring women in tech and I hope to see more women in tech.<br>
		Oh! lest I forget, I am a good team player and can also have good leadership skills...
	</p>

	<a href="#" class="more"><i>know more</i></a>

</div><!--end of banner-main -->
	
</div><!--end of banner-->


<div class="page">
<div class="minbox mybackground" style="">

	<h3>Background</h3>
	<p>
		I wrote my first line of code "Hello World" in my first year in College.I have always been thrilled and fascinated by codes. I started with python, writing code for mathematical calculations like  "fibonnaci series", "Tower of Hanoi"...<a href="background.php">read more</a>
	</p>
	
</div>

<div class="bbg minbox">
	<h3>Skills</h3>
	
</div>
<div class="box2 minbox">
	<h3>Works</h3>

	<p>
		<ul class="box2list">
		<li><a href="github.com/cmstom" style="">Course Management System</a></li>
		<li><a href="github.com/cmstom">Expenses Manager</a></li>
		<li><a href="github.com/cmstom" >Website Design</a></li>
		<li><a href="#" >And many more</a></li>
		</ul>
	</p>
</div>

</div><!--end of page div-->
<div style="color:white">My secret code:<?php echo $secret_word; ?></div>
</div><!--inner ends here -->



<div id="demo">
    <div id="chatBotCommandDescription"></div>
    <input type="text" placeholder="Say something" />


    <div style="clear: both;">&nbsp;</div>

    <div id="chatBot">
        <div id="chatBotThinkingIndicator"></div>
        <div id="chatBotHistory"></div>
        
    </div>
</div>


<script>
   function updateClock(){
            console.log("called ")
            let d = new Date().toUTCString();
            d = d.substr(0, d.indexOf("GMT")-9)
             d += " - " + new Date().toLocaleTimeString();
            document.getElementById('time').innerText = d;
            
            return 0;
             
               
        }
         window.onload = function(){
            updateClock();
          var j=  setInterval(updateClock, 1000);
         }
</script>
<script>
    var sampleConversation = [
        "Hi",
        "My name is [name]",
        "Where is Hotels.ng?",
        "Where is  Nigeria",
        "Bye",
        "What is the time",
	 "How are you"
        
    ];
    var config = {
        botName: 'Tiarayuppy',
        inputs: '#humanInput',
        inputCapabilityListing: true,
        engines: [ChatBot.Engines.duckduckgo()],
        addChatEntryCallback: function(entryDiv, text, origin) {
            entryDiv.delay(200).slideDown();
        }
    };
    ChatBot.init(config);
    ChatBot.setBotName("Tom");
    ChatBot.addPattern("^hi$", "response", "Hello, friend", undefined, "Say 'Hi' to be greeted back.");
    ChatBot.addPattern("^What is the time$", "response", "The Time is getTime()", undefined, "Say 'What is the time' to be greeted back.");
    ChatBot.addPattern("^bye$", "response", "See you later...", undefined, "Say 'Bye' to end the conversation.");
    ChatBot.addPattern("^How are you$", "response", "im fine and you?...", undefined, "Say 'Fine' to end the conversation.");
    ChatBot.addPattern("(?:my name is|I'm|I am) (.*)", "response", "hi $1, thanks for talking to me today", function (matches) {
        ChatBot.setHumanName(matches[1]);
    },"Say 'My name is [your name]' or 'I am [name]' to be called that by the bot");
    ChatBot.addPattern("(what is the )?meaning of life", "response", "42", undefined, "Say 'What is the meaning of life' to get the answer.");
    ChatBot.addPattern("compute ([0-9]+) plus ([0-9]+)", "response", undefined, function (matches) {
        ChatBot.addChatEntry("That would be "+(1*matches[1]+1*matches[2])+".","bot");
    },"Say 'compute [number] plus [number]' to make the bot your math calculator");
</script>
<script>
    
else if(str.indexOf("time") != -1){
        let inStr = str.substr(str.indexOf("time") + 5, 2);
        if(inStr !== "in"){
            print("Usage: What is the time in New York \n or Time in New York");
        }else {
        let city = str.substr(str.indexOf(inStr)+3, str.length -1)
        //city = capitalize(city);
        console.log("citycity", city)
        
        if(city == " "){
            print("Usage: What is the time in New York \n or Time in New York");
        }else{
            let geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address="+ city + "&sensor=true&key=AIzaSyCWLZLW__GC8TvE1s84UtokiVH_XoV0lGM";
            fetch(geocodeUrl)
            .then(response=>{
                return response.json()
            })
            .then(response=>{
                let lat = response.results[0].geometry.location.lat;
                let lng = response.results[0].geometry.location.lng;
                var targetDate = new Date() // Current date/time of user computer
                var timestamp = targetDate.getTime()/1000 + targetDate.getTimezoneOffset() * 60 
                let url = "https://maps.googleapis.com/maps/api/timezone/json?location="+lat+"," + lng+"&timestamp=" +timestamp+ "&key=AIzaSyBk2blfsVOf_t1Z5st7DapecOwAHSQTi4U" 
                console.log(url);  
                
                fetch(url)
                .then(response=>{
                    return response.json();
                })
                .then(response=>{
                    var offsets = response.dstOffset * 1000 + response.rawOffset * 1000 // get DST and time zone offsets in milliseconds
                    var localdate = new Date(timestamp * 1000 + offsets) // Date object containing current time of Tokyo (timestamp + dstOffset + rawOffset)
                    print("The time in " + capitalize(city) + " is " + localdate.toLocaleString())
                }) 
</script>

</body>
</html>


<?php
    if(!defined('DB_USER')){
        require "../../config.php";		
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }
    global $conn;

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        try {
            $sql = 'SELECT * FROM secret_word LIMIT 1';
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];

        try {
            $sql = "SELECT intern_id, name, username, image_filename FROM interns_data WHERE username='Geedhey'";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $name= $data['name'];
        $username= $data['username'];
        $image= $data['image_filename'];
    }
?>

<?php
    // bot sending POST request to answers
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require "../answers.php";
        
        // sending a reply to bot will call this function
        function sendReply($answer){
            echo json_encode([
                'answer' => $answer
                ]);
            exit();
        }
        function answerBot($question){
            global $conn;
            switch($question){
                case 'aboutbot':
                case 'Aboutbot':
                    sendReply(' crochet v 1.0.0.');
            }
           
            $question = "%".$question."%";
            $sql = "select * from chatbot where question like :question";
            $query = $conn->prepare($sql);
            $query->execute([':question' => $question]);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $query->fetchAll();
            
            // If the DB query returns more than one result pick a random one and send back to the bot
            $rowCount = count($rows);
            if($rowCount > 0){
                $answer = $rows[rand(0, $rowCount - 1)]['answer'];
                // If the answer contains '((' it means the answer contains a call to another function
                $startParanthesesIndex = stripos($answer, '((');
                if($startParanthesesIndex === false){
                    sendReply($answer);
                }else{
                    returnInnerFunctionResponse($answer, $startParanthesesIndex);
                }
            }
        }
        function returnInnerFunctionResponse($answer, $startParanthesesIndex){
            $endParanthesesIndex = stripos($answer, '))');
            $functionToCall = substr($answer, $startParanthesesIndex + 2, $endParanthesesIndex - $startParanthesesIndex - 2);
            // If the inner function in the answer does not exist in answers.php, we let the user know
            if(!function_exists($functionToCall)){
                sendReply('Sorry. I do not have an answer to your question at the moment.');
            }else{
                $functionCallResult = $functionToCall();
                // send the reply of the function call in the original answer we got from the DB
                sendReply(str_replace("((".$functionToCall."))", $functionCallResult, $answer));
            }
        }
        // command to train the bot
        function trainBot($question){
            global $conn;
            // Remove the 'train:' from the string and split it with the delimiter # into the training question and answer
            $data = explode("#", substr($question, 6));
            $trainingQuestion = trim($data[0]);
            $trainingAnswer = trim($data[1]);
            $sql = "insert into chatbot (question, answer) values (:question, :answer)";
            $query = $conn->prepare($sql);
            $query->bindParam(':question', $trainingQuestion);
            $query->bindParam(':answer', $trainingAnswer);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            sendReply("Training acquired.");
        }
        // Retrieving the question from the bot's POST request
        $question = $_POST['question'];
        if($question){
            $userIsTrainingBot = stripos($question, 'train:');
            if($userIsTrainingBot === false){
                answerBot($question);
            }else{
                trainBot($question);
            }
            // send response for other errors
            sendReply("Answer not available...Type 'train: question # answer' to train and make me smarter");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <title>Geedhey</title>
</head>
<style>
    /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
html {
    font: normal 16px sans-serif;
    color: slategrey;
}
ul, nav {
    list-style: none;
}
a {
    text-decoration: none;
    opacity: 0.75; 
    color: white;
}
a:hover {
    opacity: 1;
}
a.btn {
    border-radius: 4px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
    background-color: sienna;
    opacity: 1;
}
section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 100px 80px;
}
/*Header Styles */
header{
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 35px 100px 0;
    animation: 1s fadein 0.5s forwards;
    opacity: 0;
    color: #454545;
}
 @keyframes fadein {
    100% {
        opacity: 1;
    }
 }
header h2 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
header nav {
    display: flex;
    margin-right: -15px;
}
header nav li {
    margin: 0 15px;
}section:not(.content):nth-child(even) {
    background-color: #f5f5f5;
}
 
@media (max-width: 800px) {
    header {
        padding: 20px 50px;
        flex-direction: column; 
    }
    header h2 {
        margin-bottom: 15px;
    }
}
.grid{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
hr {
    width: 250px;
    height: 3px;
    background-color: #3f51b5;
    border: 0;
    margin-bottom: 50px;
}
section h3.title {
    text-transform: capitalize;
    font: bold 32px sans-serif;
    margin-bottom: 30px;
    text-align: center;
}
section p {
    max-width: 775px;
    line-height: 2;
    padding: 0 20px;
    margin-bottom: 30px;
    text-align: center;
    
}
.prof-image{
    width: 400px;
    height:300px;
    border-radius:15px;
    justify-content: center;
}
h5 {
    color: black;
    
}
@media (max-width: 800px) {
    section {
        padding: 50px 20px;
    }
}
/*Content Styles */
.content {
    position: relative;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
    color: white;
}
.content .background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    z-index: -1;
    
}
.content h1 {
    font: bold 60px sans-serif;
    margin-bottom: 15px;
    color: #581845;
}
.content h3 {
    font: normal 28px sans-serif;
    margin-bottom: 40px;
    color:#900c3f;
}
.content-area {
    opacity: 0;
    margin-top: 100px;
    animation: 1s slidefade 1s forwards;
}

.bot {
    margin-left: 0px;
}

.card-body {
    height: 450px;
    overflow-y : auto;
}
.card-body p {
	color: blue;
}

.chat-bubble{
            background-color: skyblue;
            border-radius: 5px;
            border: 0px solid transparent;
            list-style-type: none;
            margin-bottom: 16px;
            padding: 8px;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
        }
        .chat-bubble > p{
            margin: 0px;
            padding: 0px;
            color: rgba(0, 0, 0.1, 0.8);
        }
    .img-rounded{
      
      width: 200px;
      height: 200px;
      border-color: #FFF;
      border-width: 5px;
      border-style: solid;
      border-radius: 50%;
      margin-top:60px;
      margin-left: auto;
      margin-right: auto;
     
  } 

@keyframes slidefade {
    100%{
        opacity: 1;
        margin: 0;
    }
}
@media (max-width: 800px) {
    .content {
        min-height: 600px;
    }
    .content h1 {
        font-size: 48px;
    }
    .content h3 {
        font-size: 24px;
    }
    .content a.btn {
        padding: 15px 40px;
    }
}
/*Packages Section */
.packages .grid li {
    padding: 50px;
    flex-basis: 50%;
    text-align: center;
}
.packages .grid li i {
    color: steelblue;
}
.packages .grid li h4{
    font-size: 30px;
    margin: 25px 0;
}
/*Testimonials Section */
@media (max-width: 800px) {
    .testimonials .quote {
        font-size: 18px;
        margin: 15px 0;
    }
    .testimonials .author {
        font-size:  14px;
    }
}
.testimonials .quote {
    font-size: 22px;
    font-weight: 300;
    line-height: 1.5;
    margin: 40px 0 25px;
}
/*Footer Section */
 footer {
     display: flex;
     align-items: center;
     justify-content: space-around;
     background-color: #607d8b;
     color: #fff;
     padding: 20px 0;
 }
 footer ul li {
     display: flex;
 }
 footer p {
     text-transform: uppercase;
     font-size: 14px;
     opacity: 0.6;
     align-self: center;
 }
 @media (max-width: 1100px) {
     footer {
         flex-direction: column;
     }
      footer p {
          text-align: center;
          margin-bottom: 20px;
      }
      footer ul li {
          margin: 0 8px;
      }
 }
</style>
<body class="oj-web-applayout-body">
    <header role="banner" class="oj-web-applayout-header"></header>
    <section class="content"> 
        <div class="background-image" style="background-image: url(https://res.cloudinary.com/geedhey/image/upload/v1523662775/city.jpg) "></div>
        
        <div class="oj-flex oj-flex-item-pads">
        <div class="oj-md-6 oj-sm-6 oj-flex-item left">
        <div class="content-area card" >
            
            <img  class="img-rounded" src="http://res.cloudinary.com/geedhey/image/upload/v1523658558/IMG_20161218_191105_542_1.jpg"
             alt="profile picture">
           
            <h1><?php echo $name; ?></h1>
            <h3> Electrical & Electronics Engineer,IT Enthusiasts, Software Developer and Pianist.</h3>
        </div>
        </div>
		<div class="oj-md-6 oj-sm-6 oj-flex-item bot">
		</div>

	
    </section>
    
    <section class="packages">
        <h3 class="title">The Few Things I do.</h3>
        <p>I Love to classify myself as having different skills Here are Few.
        </p>
        <ul class="grid">
            <li>
                <i class="fa fa-graduation-cap fa-4x"></i>
                <h4> Education</h4>
                <p>I Studied Electrical & Electronics Engineering.</p>
            </li>
            <li>
                <i class="fa fa-music fa-4x"></i>
                <h4>Musician</h4>
                <p> Trained Musician, Pianist, Classical Singer and Music Instructor.</p>
            </li>
            <li>
                <i class="fa fa-code fa-4x"></i>
                <h4> Developer</h4>
                <p>I Like to say am an IT Enthusiasts while also a Developer,
                    Currently a backend Developer: NodeJS,Express, MongoDB, Javascript.
                </p>
            </li>
            <li>
                <i class="fa fa-soccer-ball-o fa-4x"></i>
                <h4>Sports</h4>
                <p>A Big Sports Fan (Manchester United), Loves to analyze soccer a lot and i also 
                    follow other sports which includes Tennis and Basketball.
                </p>
            </li>
        </ul>
    </section>
    <section class="testimonials">
        <h3>Hotels.ng Internship</h3>
        <hr>
        <p class="quote">
            These have been the most practical orientented remote internship i could imagine,
            from moving away from my comfort zone using tools i have never got to use, (figma, pivot)
            also learning PHP... i can only say what a great opportunity and Thank You to all who made
            these possible.
        </p>
        <p class="author">
            Geedhey
        </p>
        
       
    </section>
    
    <footer>
        <p>Connect with me via Social Media</p>
        <p>Powered by GeedheyInc &copy;</p>
        <ul>
            <li><a href="https://www.linkedin.com/in/ojo-babajide-tolulope/"><i class="fa fa-linkedin fa-2x"></i></a></li>
            <li><a href="https://github.com/babageedhey/"><i class="fa fa-github fa-2x"></i></a></li>
            <li><a href="https://mailto:babageedhey@gmail.com"><i class="fa fa-google fa-2x"></i></a></li>

        </ul>
    </footer>
    
    
   
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // el is for the element we want to attach Vue.js to
        new Vue({
            el: '.bot',
			data: {
                messages: [{data: "My Name is Crochet! and i'm here to respond to your questions", sender: 'bot'},
                    {data: "To input your own customized questions and answers..." + 
                        "Type train: questions #answers" , sender: 'bot'},
                    {data: "Use aboutbot to check for current bot version", sender: 'bot'} 
                ],
                message: ''
            },
            methods: {
                getBubbleColor(sender){
                    if(sender == 'bot')
                    return 'lightblue';
                
                    return 'gray';
                },
                addMessage(){
                    this.messages.push({data: this.message, sender: 'user'});
                    this.answerQuery(this.message);
                    this.message = '';
                },
                answerQuery(query) {
                    this.messages.push({ sender: 'bot', data: '...' });
                    var params = new URLSearchParams();
                    params.append('password', 'password');
                    params.append('question', query);
                    axios.post('/profiles/Geedhey.php', params)
                        .then(response => {
                            console.log(response);
                            this.messages.pop();
                            this.messages.push({ sender: 'bot', data: response.data.answer });
                        }).catch(error => {
                            console.log(error);
                            this.messages.pop();
                            this.messages.push({ sender: 'bot', data: 'Please check Your internet connection might be down.'
                        });
                    });
                },
            },
			template: `

        <div class="oj-md-6  oj-sm-6 oj-flex-item bot">
        <div class="card content-area">
        <h3 class="card-header">Geedhey Bot</h3>
            <div class="card-body">
                
				<ul>
                    <li class="chat-bubble" v-for="(message, index) in messages" v-key="index" :style="{'background-color': 
                                getBubbleColor(message.sender)}">
                                <p>{{message.data}}</p>
                    </li>
                </ul>
               
            </div>
                <div class="card-footer">
                    <form class="form-group" id="inputForm">
                        <input type="text" placeholder="" class="mb-2 form-control"  @keyup.enter="addMessage" v-model="message">
                        <input type="button" value="SEND" class="btn btn-primary form-control" @click="addMessage">
                    </form>
                </div>
        </div>
		</div> `,
		});
	</script>
    
</body>
</html>
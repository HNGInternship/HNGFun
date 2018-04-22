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
            $sql = "SELECT intern_id, name, username, image_filename FROM interns_data WHERE username='bukola'";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $name= $data['name'];
        $username= $data['username'];
        $link= $data['image_filename'];
    }
?>
<?php
    // Our bot will send a POST request to this file and we only want the code below to run only when that happens
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require "../answers.php";

        // When we are ready to send a reply to our bot we'll call this function
        function sendReply($answer){
            echo json_encode([
                'answer' => $answer
                ]);
            exit();
        }

        function answerBot($question){
            global $conn;

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
                sendReply('Sorry. I do not have an answer to your query.');
            }else{
                $functionCallResult = $functionToCall();

                // We'll now send the reply of the function call in the original answer we got from the DB
                sendReply(str_replace("((".$functionToCall."))", $functionCallResult, $answer));
            }
        }

        // We got a command to train the bot
        function trainBot($question){
            global $conn;

            // Remove the 'train:' from the string and split itwith the delimiter # into the training question and answer
            $data = explode("#", substr($question, 6));
            $trainingQuestion = $data[0];
            $trainingAnswer = $data[1];

            $sql = "insert into chatbot (question, answer) values (:question, :answer)";
            $query = $conn->prepare($sql);
            $query->bindParam(':question', $trainingQuestion);
            $query->bindParam(':answer', $trainingAnswer);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);

            sendReply("Hooray! You've trained me.");
        }

        // Retrieving the question from the bot's POST request
        $question = $_POST['question'];
        if($question){
            $userIsTrainingBot = stripos('train:', $question);
            if($userIsTrainingBot){
                trainBot($question);
            }else{
                answerBot($question);
            }

            // If something does not go well we'll still send a response incase
            sendReply("Sorry. I have no idea what you just asked of me.");
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My HNG Profile</title>
    <!-- css stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,700" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            font-size: 62.5%;
            background-color: #fbfbf5;
        }
        body {
            font-family: "Overpass", sans-serif;
            font-size: 1.8rem;
            line-height: 1.6;
            color: #DC5960;
        }
        .wrapper {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-evenly;
            height: 100vh;
        }
        .my-profile, .bot {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 500px;
            width: 100%;
            flex: 1 1 50%;
            align-items: center;
        }
        .my-face {
            background: lightblue url('https://res.cloudinary.com/do52uumgy/image/upload/v1523890291/avatar_lphsd8.png') no-repeat center;
            background-size: contain;
            width: 200px;
            height: 200px;
            border-radius: 100px;
            border: 1px solid #535353;
        }
        h1 {
            color: #047CB6;
        }
        .my-info div span {
            font-weight: 700;
        }
        .my-info div a {
            color: inherit
        }
        .bot-con {
            border: 1px solid #535353;
            height: 500px;
            width: 350px;
            padding: 1em;
            display: flex;
            flex-direction: column;
            position: relative;
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
            color: rgba(0, 0, 0, 0.8);
        }
        /* .actions */
        .btn {
            background-color: #DC5960;
            padding: 1em;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 700;
        }
        .actions {
            display: flex;
            flex-direction: row;
        }

        .actions input {
            padding-left: 16px;
            width: 80%;
            border: 0px solid transparent;
            border-radius: 10px;
            margin-right: 16px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="my-profile">
            <div>
                <h1>Hi, I'm Bukola!<h1>
            </div>
            <div class="my-face"></div>
            <div class="my-info">
                <div>
                    <span>Fullname:</span> 
                    Bukola Bisuga
                </div>
                <div>
                    <span>Nickname:</span> 
                    bukks
                </div>
                <div>
                    <span>Email:</span> 
                    <a href="mailto:bukksbisuga@gmail.com">bukksbisuga@gmail.com</a>
                </div>
                <div>
                    <span>Interests:</span> 
                    Athletics, Singing
                </div>
            </div>
        </div>
        <div class="bot">
           
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // This is Vue.js
        // el is for the element we want to attach Vue.js to
        new Vue({
            el: '.bot',
            data: {
                messages: [{data: "Hey, I'm Phoenix!", sender: 'bot'}, 
                {data: "I know the USSD codes of all banks in Nigeria! Just type 'ussd: name_of_bank' e.g 'ussd: Money Bank'", sender: 'bot'}],
                message: ''
            },
            methods: {
                getBubbleColor(sender){
                    if(sender == 'bot')
                    return 'skyblue';
                    
                    return 'tomato';
                },
                addMessage(){
                    this.messages.push({data: this.message, sender: 'user'});

                    this.answerQuery(this.message);
                    this.message = '';
                },
                answerQuery(query) {
                    this.messages.push({ sender: 'bot', query: 'Coming up...' });

                    var params = new URLSearchParams();
                    params.append('password', 'password');
                    params.append('question', query);

                    axios.post('/profiles/bukola.php', params)
                        .then(response => {
                            console.log(response);
                            this.messages.pop();
                            this.messages.push({ sender: 'bot', query: response.data.answer });
                        }).catch(error => {
                            console.log(error);
                            this.messages.pop();
                            this.messages.push({ sender: 'bot', query: 'Your internet connection is down.' 
                        });
                    });
                },
            },
            template: `
            <div class="bot">
                <div class="bot-con">
                    <ul style="height: 500px">
                        <li class="chat-bubble" v-for="(message, index) in messages" v-key="index" :style="{'background-color': 
                            getBubbleColor(message.sender)}">
                            <p>{{message.data}}</p>
                        </li>
                    </ul>
                    <div class="actions">
                        <input type="text" placeholder="Type a message" @keyup.enter="addMessage" v-model="message">
                        <button class="btn" @click="addMessage">Send</button>
                    </div>
                </div>
            </div>`,
        });
    </script>
</body>

</html>

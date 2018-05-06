<?php 

try {
    // Get the Secret Word from DB hush hush
    $secret_word_sql = "SELECT * FROM secret_word LIMIT 1";
    $secret_word_query = $conn->query($secret_word_sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $secret_word_data = $secret_word_query->fetch();
    $secret_word = $secret_word_data['secret_word'];

    // Get my data from the DB
    $interns_data_sql = "SELECT * FROM interns_data WHERE username='rayhatron'";
    $interns_data_query = $conn->query($interns_data_sql);
    $interns_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $interns_data_data = $interns_data_query->fetch();
    
    $my_name = $interns_data_data['name'];
    $my_username = $interns_data_data['username'];
    $my_image = $interns_data_data['image_filename'];

} catch (PDOException $e) {

    throw $e;
}
$message = "";
$botReply = ""; 

/**
 * Sanitize data so that SQL injection doesn't occur
 * 
 * @param data The data to be sanitized, in this case it's the message sent by the user
 * 
 * @return data The cleaned message or data
 */
function cleanData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<section class="ray-container">
<style>
@import url('https://fonts.googleapis.com/css?family=Eczar');
.ray-container{
    margin: 10px 0 0 0;
}
.content-card {
    font-size: 16px;
    font-family: "Eczar", cursive;
    line-height: 1.5;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
}
.portrait {
    width: 350px;
    height: 250px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
}
.bio {
    width: 400px;
    height: 290px;
    padding: 10px;
}
.portrait img {
    width: 100%;
    height: 100%;
}
.text-center {
    text-align: center;
}
h1{
    font-family: "Eczar", cursive;
    font-size: 2.3686rem;
    line-height: 3.375rem;
}
.giga {
    font-size: 1.7769rem;
    line-height: 2.625rem;
}
.normal {
    font-family: "Eczar", cursive;
    font-weight: normal;
    font-style: normal;
}
p {
    padding: 10px;
    margin: 0 0 1.5rem;
}
.chatBox {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 450px;
    margin: 10px auto;
    max-width: 90vw;
    border-radius: 10px;
    padding: 10px 5px;
    background: #F6F2F2;
    box-shadow: inset 0 1px 1px 0px rgba(0,0,0,0.14), inset 0px -2px 1px 0px rgba(0,0,0,0.12), inset 0px 1px 1px 0px rgba(0,0,0,0.2);
}
.messages{
    width: 450px;
    height: 450px;
    overflow-y: scroll;
}
.userMessage {
    float: right;
    clear: both;
    width: fit-content;
    margin: 5px;
    padding: 5px;
    border: 1px solid #0CFF25;
    border-radius: 10px;
    background: #f8f8f8;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
}
.botResponse, .welcomeMessage{
    float: left;
    clear: both;
    width: fit-content;
    margin: 5px;
    padding: 5px;
    border: 1px solid #41BEF3;
    border-radius: 10px;
    background: #f8f8f8;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
}
.previousAnswer{
    display: none;
}
.rayMessage{
    margin: 5px;
}
.rayBtnSend{
    margin: 5px;
}
.highlight{
    color: #41BEF3;
}
@media screen and (max-width: 960px){
    .ray-container{
        min-height: 645px;
    }
}
footer{
    display: none;
}
</style>
<article class="content-card"> 
    <article class="portrait"> 
        <img src="<?php echo $my_image; ?>" alt="<?php echo "{$my_name} ({$my_username})"; ?>" title="<?php echo "{$my_name} ({$my_username})"; ?>"> 
    </article> 
    <article class="bio"> 
        <div> 
            <h1 class="text-center">
                <div>
                    <strong>Hey!</strong>
                </div>
                <div class="normal giga">
                    <p>I'm Rayhatron, a <strong>web developer</strong> who loves to code and tackle challenges like the ones presented in the HNG Internship.</p>
                </div>
            </h1> 
        </div> 
    </article> 
</article>
</section>
<div class="normal giga text-center">
    <p>You can find out more about me on my <a href="https://rayhatron.github.io">website</a> :)</p>
</div>

<div class="chatBox">
    <div class="messages">
        <p class="welcomeMessage">Hey! I'm Spideybot, your friendly neighbourhood bot and it's nice to meet you.</p> 
        <p class="welcomeMessage">You can send me messages and we'll be sure to have a webtastic conversation. However, if my spidey senses fail me and I'm unable to respond, you can train me with the command: <br><span class="highlight">train: your question # the answer # password</span></p>
        <p class="welcomeMessage">Note, the password is just password ;) <br>You can also send <span class="highlight">aboutbot</span> to get information about me. <br>Okay, enough swinging around, let's get chatting :)</p>
    </div>
    
        <input type="text" name="message" id="message" class="rayMessage">
        <button class="rayBtnSend">Send</button>
   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    let messagesElem = document.getElementsByClassName('messages');

    // If someone clicks the enter key make sure it sends the message.
    $(".rayMessage").keyup(function(event) {
        if (event.keyCode === 13) {
            $(".rayBtnSend").click();
        }
    });

    // Send the message when the send button is clicked or when the person clicks enter in the textbox
    $(".rayBtnSend").click( 
        function(){
            let previousAnswerElem = document.getElementsByClassName('previousAnswer');
            let storedPreviousAnswer = null;
            
            // Get the previous answer if available so that we can make sure we don't repeat it if the same question is asked later
            if(previousAnswerElem['length'] != 0 ){
                storedPreviousAnswer = previousAnswerElem[0].textContent;
            }
            
            // Get the message entered by the user and then clear the textbox.
            let message = $(".rayMessage").val();
            $(".rayMessage").val("");
            
            // Send the message via post to this same page along with the previousAnswer
            $.post("/profile.php?id=rayhatron",
                {
                    message: message,
                    previousAnswer: storedPreviousAnswer
                },
                function(data, status){
                    
                    // Create a regex to extract the response from the bot from the data returned by php
                    const regex = /<p\sclass="botResponse">.*<\/p>/g;
                    const answerRegex = /<h4\sclass="previousAnswer">.*<\/h4>/g;
                    const str = '' + data;
                    let m;
                    let n;
                    let previousAnswer = '';

                    while ((m = answerRegex.exec(str)) !== null) {
                        // This is necessary to avoid infinite loops with zero-width matches
                        if (m.index === answerRegex.lastIndex) {
                            answerRegex.lastIndex++;
                        }
                        
                        // Retrieve the previous answer html from what the bot sent
                        m.forEach((match, groupIndex) => {
                            previousAnswer = m[0];
                        });
                    }

                    while ((n = regex.exec(str)) !== null) {
                        // This is necessary to avoid infinite loops with zero-width matches
                        if (n.index === regex.lastIndex) {
                            regex.lastIndex++;
                        }
                        
                        // Retrieve the answer to the message sent by the user
                        n.forEach((match, groupIndex) => {
                            let messageHTML = `<p class="userMessage">${message}</p>`;
                            
                            // Append the message sent by the user to the chatbox
                            $(".messages").append(messageHTML);
                            
                            // If we had a previous answer on the page, let's remove is and add the new answer from the bot in place of that
                            if(previousAnswer){
                                $(".previousAnswer").remove();
                                $(".chatBox").append(previousAnswer);
                            }

                            // Append the answer from the bot
                            $(".messages").append(n[0]);

                            // Keep the chatbox scrolling if more messages come in and they can't all be shown.
                            messagesElem[0].scrollTop = messagesElem[0].scrollHeight;
                        });
                    }
                }
            );
        }
    );
</script>

<?php

// Handle POST requests to the page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $previousAnswer = $_POST["previousAnswer"];
    $message = cleanData($_POST["message"]);

    // Get the answer to the message sent by the user and echo that so that it is accessed by the JS in the callback
    $botReply = '<p class="botResponse">'. getAnswer($message, $previousAnswer) .'</p>';
    
    echo $botReply;
}

/**
 * Get the answer to the message sent by the user
 * 
 * @param question A string containing the message/question sent by the user
 * @param previousAnswer A string containing any previous answer that the bot sent to the user and stored on the page
 * 
 * @return string A response from the bot, could be the answer to the question, information about the bot, an all is ok message or worse an error message
 */
function getAnswer($question, $previousAnswer){
    try {
        require 'db.php';

        // If someone enters aboutbot , let's just send them info about the bot
        if( preg_match("/aboutbot/", $question) ){
            return 'Version: 1.0.1<br>Created by: <a href="https://twitter.com/rayhatron" target="_blank">@rayhatron</a>';
        }
        
        // Handle the training command
        if( preg_match("/train:(.*)#(.*)#(.*)/", $question, $train_sentence) ){
            if( trim($train_sentence[3]) == 'password' ){
                $train_question = trim($train_sentence[1]);
                $train_answer = trim($train_sentence[2]);

                // Make sure we have enough data
                $isTrainingDataFullResult = checkIfTrainingDataIsFull($train_question, $train_answer);
                if($isTrainingDataFullResult != 'Full'){
                    return $isTrainingDataFullResult;
                }
                
                // Check if the question being attempted to be trained for already exists and has the same answer as the one being attempted to be trained for
                $existingTrainingData = getExistingTrainingData($conn, $train_question);

                $numberOfAnswers = count($existingTrainingData);

                if( $numberOfAnswers == 0 ){
                    return addTrainingData( $conn, $train_question, $train_answer );
                }else if($numberOfAnswers == 1){
                    // Make sure the training answer is not the same as the found answer before trying to add it to the DB
                    if($existingTrainingData[0]['answer'] == $train_answer){
                        return 'Oh! Looks like the answer you provided already exists for that question. Maybe provide an alternative answer :)';
                    }else{
                        return addTrainingData( $conn, $train_question, $train_answer );
                    }
                }else{
                    // Make sure the training answer is not the same as the found answer before trying to add it to the DB
                    foreach ( $existingTrainingData as $key => $existingAnswer ){
                        if( $existingAnswer['answer'] == $train_answer ){
                            return 'Oh! Looks like the answer you provided already exists for that question. Maybe provide an alternative answer :)';
                        }
                    }

                    return addTrainingData( $conn, $train_question, $train_answer );
                }  
            }else{
                return 'Ooops! You seem to have entered the wrong password. Please enter the correct password to train me ;)';
            }
        }

        // At this point the user is not trying to get info about the bot or trying to train it 
        // So let's get the answers that are available for the message that they have sent
        $question_sql = "SELECT answer FROM chatbot WHERE question=:question";
        $question_query = $conn->prepare($question_sql);
        $question_query->bindParam(':question', $question);
        $question_query->setFetchMode(PDO::FETCH_ASSOC);
        $question_query->execute();
        $question_data = $question_query->fetchAll();
        
        $numberOfAnswers = count($question_data);

        if($numberOfAnswers == 0){
            return 'This is kinda embarrassing, I don\'t understand that yet. So how about you can teach me by entering:<br><span class="highlight">train: question # answer # password</span>';
        }else if($numberOfAnswers == 1){
            return $question_data[0]['answer'];
        }else{
            // Ensure we get a random answer if there is more than 1 answer returned from the DB
            $maxIndex = $numberOfAnswers - 1;
            $chosenAnswerIndex = mt_rand(0, $maxIndex);
            $chosenAnswer = $question_data[$chosenAnswerIndex]['answer'];

            // Make sure the selected random answer is not the same as the previously selected answer we got from the POST request
            if(!empty($previousAnswer)){
                // Make sure only proceed if the random answer isn't the same as the previously selected answer
                while( $chosenAnswer == $previousAnswer ){
                    $chosenAnswerIndex = mt_rand(0, $maxIndex);
                    $chosenAnswer = $question_data[$chosenAnswerIndex]['answer'];
                }
            }
            
            // Send the chosen answer as both the response and the previous Answer to JS
            echo '<h4 class="previousAnswer">' . $chosenAnswer . '</h4>';
            return $chosenAnswer;
        }
    } catch (PDOException $e) {
        return 'Something went wrong: ' . $e->getMessage() . '<br>Tweet me <a href="https://twitter.com/rayhatron" target="_blank">@rayhatron</a> with the error message thanks! :)';
    }
}

/**
 * Make sure we have enough data for training the bot
 * 
 * @param train_question A string containing the question we want to train for
 * @param train_answer A string containing the answer that is supposed to be linked to the question
 * 
 * @return string Return a string that either gives an error message or says that the data is sufficient
 */
function checkIfTrainingDataIsFull( $train_question, $train_answer ){
    if( empty($train_question) && empty($train_answer) ){
        return 'Please provide a question and an answer in the training command.<br><span class="highlight">train: question # answer # password</span>';
    }else if( empty($train_question) ){
        return 'Please provide a question in the training command.<br><span class="highlight">train: question # answer # password</span>';
    }else if( empty($train_answer) ){
        return 'Please provide an answer in the training command.<br><span class="highlight">train: question # answer # password</span>';
    }else{
        return 'Full';
    }
}

/**
 * Retrieve the answers for a supplied question before training for it
 * 
 * @param conn The already established connection to the DB
 * @param train_question A string containing the question we want to train for
 * 
 * @return check_if_question_exists_data An array with any answers to the supplied question or an empty array if none are found
 */
function getExistingTrainingData( $conn, $train_question ){
    try{
        $check_if_question_exists_sql = "SELECT answer FROM chatbot WHERE question=:question";
        $check_if_question_exists_query = $conn->prepare($check_if_question_exists_sql);
        $check_if_question_exists_query->bindParam(':question', $train_question);
        $check_if_question_exists_query->setFetchMode(PDO::FETCH_ASSOC);
        $check_if_question_exists_query->execute();
        $check_if_question_exists_data = $check_if_question_exists_query->fetchAll();

        return $check_if_question_exists_data;
    }catch( PDOException $e ){
        return 'Something went wrong: ' . $e->getMessage() . '<br>Tweet me <a href="https://twitter.com/rayhatron" target="_blank">@rayhatron</a> with the error message thanks! :)';
    }
}

/**
 * Insert the question and answer being trained for
 * 
 * @param conn The already established connection to the DB
 * @param train_question A string containing the question we want to train for
 * @param train_answer A string containing the answer we want to train for
 * 
 * @return string The response saying that all went well
 */
function addTrainingData( $conn, $train_question, $train_answer ){
    try{
        $train_sql = "INSERT INTO `chatbot` ( `question`, `answer` ) VALUES ( :trainQuestion, :trainAnswer )";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $add_training_data_query = $conn->prepare($train_sql);
        $add_training_data_query->bindParam(':trainQuestion', $train_question);
        $add_training_data_query->bindParam(':trainAnswer', $train_answer);
        $add_training_data_query->execute();
        
        return 'Great! I now know that the answer to ' . $train_question . ' is ' . $train_answer;
    }catch( PDOException $e ){
        return 'Something went wrong: ' . $e->getMessage() . '<br>Tweet me <a href="https://twitter.com/rayhatron" target="_blank">@rayhatron</a> with the error message thanks! :)';
    }
}

?>
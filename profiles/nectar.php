
<?php
 // First check if submit is clicked
//  if ($_SERVER['REQUEST_METHOD']== 'POST'){
//     require ('../answers.php');

//     if(!defined('DB_USER')){
//         require "../../config.php";		
//         try {
//             $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
//         } catch (PDOException $pe) {
//             die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
//         }
//     }

//     $message = $_POST['message'];
//     $question = strtolower($message);
//     $testvar = "?".$question_lower;

//     if(strrpos($testvar, "train") != NULL){
//         $train_detail = explode("#", $question);
//         $question_detail = explode(":", $train_detail[0]);
//         $question_only = $question_detail[1];
//         $answer_only = $trainInfo[1];
//         $question_only = trim(preg_replace("([?.])", "", $question_only));
//         $answer_only = trim(preg_replace("([?.])", "", $answer_only));
//         $password_only = trim(preg_replace("([?.])", "", $train_detail[2] ));
//         $password = $password_only ;

//         if ($password !== "password"){
//             echo json_encode([
//                 'status' => 1,
//                 'reply' => "Wrong password, you are not authorized to train me",
//               ]);
//               return;
//         }else {
//             try{
//                 $sql = "insert into chatbot (question, answer) values (:question, :answer)";
//                 $initiate = $conn->prepare($sql);
//                 $initiate->bindParam(':question', $question_only);
//                 $initiate->bindParam(':answer', $answer_only);
//                 $initiate->execute();
//                 $initiate->setFetchMode(PDO::FETCH_ASSOC);
//                 if($initiate){
//                     echo json_encode(['status' => 1, 'reply' => "I have been trained, now you can ask me anything"]);
//                     return; 
//                 }
//             }catch (PDOException $e){
//                 throw $e;
//             }
//         }
//     }else{
//         $question = "%$question%";
//         try{
//             $sql = "select * from chatbot where question like :question";
//             $initiate = $conn->prepare($sql);
//             $initiate->bindParam(':question', $question);
//             $initiate->execute();
//             $initiate->setFetchMode(PDO::FETCH_ASSOC);
//             $rows = $initiate->fetchAll();
//             if($rows){
//              $rows_value = count($rows);
//             if($rows_value>0){
//                 $random = rand(0, $rows_value - 1);
//                 $row = $rows[$random];
//                 $answer = $row['answer'];
//                 echo json_encode([
//                     'status' => 1,
//                     'reply' => $answer,
//                   ]);
//                   return;
//                 }
//             }

//         }
//         catch (PDOException $e) {
//             throw $e;
//         }   
//     }                           
// } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HNG Nectar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    

    <style media="screen and (max-width: 600px)">
        body{
            background-color: #e6e6e6;  
            width: 100%;                       
        }
        div.section-info {
            background-image: url('http://res.cloudinary.com/primefeed/image/upload/v1524155781/bg.jpg');
            height: 90%;
            width: 100%;
        }
        div.section-info div.profile-image{
                              
                    
        }
        div.section-info div.profile-image img {
            max-width: 40%;
            width: 30%;
            min-width: 20%;
            height: 60%;
            margin-left: 40%;

        }

        div.section-info div.profile-image > p.intern-name {
            text-align: center;
            color: #03A9F4;;
            font-size: 1.0em;
        }

        div.section-info div.profile-details{
            text-align: center;
            margin:auto;
            color: #03A9F4;
        }

        div.section-info div.profile-details .detail-title{
            font-size: 1.5em;
            font-weight:bold;
            font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;
        }
        div.section-info div.profile-details .detail-username{
            color: #FFFFFF;
            font-size: 1.5em;
        }

        div.section-chatbot{
            margin:0.6em auto 0.6em 0.6%;
            width: 100%;
            height: 300px;
        }
        div.section-chatbot h5.chatbot-title{
            font-size: 1.0em;
            font-weight:bold;
            background-color: #03A9F4;
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;
        }

        div.section-chatbot div.chatbot-conversation{
            overflow-y: scroll;
            height: 90%;
        }

        div.section-chatbot div.chatbot-conversation p.chat-entry{
            overflow: auto;    
            font-size: 0.7em;    
        }

        div.section-chatbot div.chatbot-conversation p.bot{      
            text-align: left;   
            padding-right: 2px ;  
            width: 50%; 

            background-color: blue;
            color: #FFFFFF;
            border: 1px solid blue;
            border-radius: 5px;
        }

        div.section-chatbot div.chatbot-conversation p.user{
            margin-left: 60%;
            margin-right:5px; 
            align-content: right;
            /* position: absolute; */
            background-color: green;
            color: #FFFFFF;
            border 1px solid green;
            border-radius: 5px;     
        }

        div.section-chatbot div.chatbot-input{
            
        }

        div.section-chatbot div.chatbot-input form {
            
        }
        div.section-chatbot div.chatbot-input form input {
        }

        div.section-chatbot div.chatbot-input form p.info {
            float: left;
        }

        div.section-chatbot div.chatbot-input form button.submit {
            float: right;
        }
    </style>

    <style media="screen and (min-width: 600px)">
    /* 
    primary=#FF5722   
    primary-dark = #E64A19
    primary-light= #FFCCBC
    secondary = 
    accent = 
    */
        body{
            background-color: #e6e6e6;  
            width: 100%;                       
        }
        div.section-info {
            background-image: url('http://res.cloudinary.com/primefeed/image/upload/v1524155781/bg.jpg');
            height: 90%;
            width: 100%;

        }
        div.section-info div.profile-image{
            float: left;
            width: 20%; 
            margin: 1em 1em; 
            height: 20em;                      
                        
            /* background-repeat: no-repeat; */

            /* Test attributes */
            /* border: 2px solid red;  */
        }
        div.section-info div.profile-image img {
            max-width: 100%;
            min-width: 50%;
            width: 90%;
            height: 80%;
            border-radius: 50%;
        }

        div.section-info div.profile-image p.intern-name {
            text-align: center;
            color: #03A9F4;;
            font-size: 2.0em;

            /* Test attributes */
            /* border: 2px solid blue;  */
        }

        div.section-info div.profile-details{
            /* float:right; */
            margin:auto;
            width: 40%;
            color: #03A9F4;

            /* Text attrributes */
            text-align: center;

            /* Test attributes */
            /* border: 2px solid blue;  */
        }

        div.section-info div.profile-details .detail-title{
            font-size: 3em;
            font-weight:bold;
            font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;

            /* Test attributes */
            /* border: 2px solid green; */
        }
        div.section-info div.profile-details .detail-username{
            font-size: 3.5em;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            color: #FFFFFF;

            /* Test attributes */
            /* border: 2px solid red;             */
        }

        div.section-chatbot{
            margin:1em auto 1em 50%;

            max-width: 60%;
            min-width: 40%;
            width: 30%;
            height: 350px;

            border: 1px solid black;
        }
        div.section-chatbot h5.chatbot-title{
            margin-top: 0em;
            margin-bottom: 0em;
            background-color: #03A9F4;
            text-align: center;
            font-size: 1.5em;
        }

        div.section-chatbot div.chatbot-conversation{
            overflow-y: scroll;
            height: 100%;

        }

        div.section-chatbot div.chatbot-conversation p.chat-entry{
            overflow: auto;    
            font-size: 1em;       
        }

        div.section-chatbot div.chatbot-conversation p.bot{      
            text-align: left;   
            padding-right: 2px ;  
            width: 50%; 

            background-color: blue;
            color: #FFFFFF;
            border: 1px solid blue;
            border-radius: 5px;
        }

        div.section-chatbot div.chatbot-conversation p.user{
            
            margin-left: 60%;
            margin-right:5px; 
            align-content: right;
            /* position: absolute; */
            left: -400;

            background-color: green;
            color: #FFFFFF;
            border 1px solid green;
            border-radius: 5px;               
                
        }

        div.section-chatbot div.chatbot-input{
            
        }

        div.section-chatbot div.chatbot-input form {
            margin-top: 2em;            
        }

        div.section-chatbot div.chatbot-input form input {
            color: red;
            height: 2.5em;
            font-size: 0.7em;
        }

        div.section-chatbot div.chatbot-input form p.info {
            float: left;
        }

        div.section-chatbot div.chatbot-input form button.submit {
            float: right;
            font-size: 0.7em;
            margin-top: 2px;
        }
    </style>
    
</head>
<body >

    <?php
        
        // Get the config file
        // include_once '../db.php';       
         
        // Set the needed variables
        $table = 'interns_data';
        $secret_table = 'secret_word';
        $intern_name = 'Nectar';

        // Query the db for the data in interns data table
        $query = "SELECT * FROM ".$table." WHERE username='Nectar'";
        $data = $conn->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);

        foreach($data as $row) {
            $name = $row["name"];
            $username = $row["username"];
            $pics = $row["image_filename"];
        }
        
        try {
            $query2 = "SELECT * FROM secret_word";
            $word = $conn->query($query2);
            $word->setFetchMode(PDO::FETCH_ASSOC);
            $result = $word->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $result['secret_word'];

        // Handle the Chat bot interaction
        $bot_version = 'fred v1.0.0';         
    ?>
    
    <div class="section-info">
        <div class ="profile-image">
            <img src="<?php echo $pics ?>" alt="<?php echo $pics ?>">
            <p class="intern-name"><?php echo $name?></p>
        </div>

        <div class ="profile-details">
            <h4 class="detail-title">HNG4 internship 2018 </h4>            
            <p>I am an enthusiastic Tech lover and Passionate with solving problems. </p>
            <p class="detail-username">&#35;<?php echo $username?></p>        
            <p>Stacks: </p>
            <p><span>Android, </span> <span>Node, </span> <span> Angular, </span> <span> PHP, </span><span>...</span> </p>
        </div>        
    </div>


    <div ng-controller="myCtrl" class="section-chatbot card">
        <h5 class="chatbot-title"><?php echo $bot_version ?> </h5>
        <!-- <user-input-directive></user-input-directive> -->
        <div class="chatbot-conversation card-body">
            <!-- <p id="bot" class="chat-entry bot"> {{initial}}</p> -->
            <!-- <p class="chat-entry user"> {{user}}</p> -->
                  
        </div>

        <div ng-controller="myCtrl" class="chatbot-input">
            <form  class="form" action="" method="post">
                <input autocomplete="off" class="form-input form-control" placeholder="Type in Here" type="text" width= "70%" name="entry-question" id="question">               
                <p class="info"><?php echo $info ?></p>
                <button class="btn btn-primary submit" type="button" name="submit">Send</button>
            </form>
        </div>                
    </div>

        <!-- <script>
            var myApp = angular.module('myApp', []);

            // myApp.directive("x", function(){
            //     var work;
            //     $(.submit).on('click', work)
            //     return {
            //         scope:{},
            //         restrict: 'E',
            //         template: '<p class="chat-entry user"> Hello i am a user</p>';
            //         link: function(scope, element, attrs){
            //             $(this).work({
            //                 color: blue;
            //             })
            //         }
            //     }
            // });

            myApp.controller('myCtrl', ['$scope', '$http', function ($scope, $http){

                $scope.initial = 'Hello my name is $bot_version';

                $scope.userInput = function(message, response){
                    $scope.user = message;
                };
                $scope.submitForm = function(message, response){
                    $scope.info = "ng sent";
                    $scope.user = "<p>" +message+ "</p>";
                }
            }]);

            myApp.directive(makeDirective, function(){
                return{
                    template: "<p>Hello world</p>"
                }
            });
        </script> -->
        <!-- <script>
         
            function sendRequest(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bot").innerHTML =
                        this.responseText;
                    }
                };
                xhttp.open("POST", "nectar.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("chat-entry = Hello");
            }

            function registerUserMessage(message){

            }

        </script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

            function handleResponse(response){
                
                return response;
            }

            $(document).ready(function(){
                var message = "";
                var response = handleResponse("This is response quicky");

                console.log('nectar.php is Ready');

                $('.chatbot-conversation').append(`
                    <p id="bot" class="chat-entry bot"> Hello I am medric ask me about any drug, use #help </p>
                `);

                $('form.form').submit(function(event){
                        message = $('input.form-input').val().toString();
                        console.log("Submit got this input: "+message);
                        event.preventDefault();

                        if((message.trim()) == ""){
                            $('.chatbot-conversation').append(`
                                <p style="background-color:#F44336; border:none" id="bot" class="chat-entry bot"> No response from you ... </p>
                            `)
                            return;
                            
                        }else if((message.trim()).startsWith("aboutbot") || (message.trim()) === "#aboutbot"){

                             // Render the msg
                             $('.chatbot-conversation').append(`
                                    <p class="chat-entry user"> ${message} </p>
                                `);

                            $('.chatbot-conversation').append(`
                                <p id="bot" class="chat-entry bot"> I am Medric your drug assistace, Current version 1.0                             
                                    Tell me what you're feeling in concise sentence as much as possible
                                    Use #help to get list of commands</p>
                            `)
                            return;                            
                        }
                        else if((message.trim()).startsWith("help") || (message.trim()) === "#help"){
                            // Render the msg
                            $('.chatbot-conversation').append(`
                                <p class="chat-entry user"> ${message} </p>
                            `);

                            $('.chatbot-conversation').append(`
                            <p id="bot" class="chat-entry bot"> Commands: Train - #train: question : answer : password 
                               "About- #aboutbot to get info about me</p>
                            `)
                            return;                            
                        }else{

                        // if(message == "#help"){
                        //     response="Commands "+"\n Train - #train: question : answer : password \n "+
                        //     "About- #aboutbot to get info about me";
                        //     return;
                        // }
                        // if((message.toLowerCase()).startsWith("hello")){
                        //     response="Hi buddy, How can i be of help?";
                        //     return;
                        // }
                        
                        $.ajax({
                                type: "POST",
                                url:"nectar.php",
                                data: {
                                    message: message,
                                },
                                dataType: "json",
                                success: function() {
                                console.log('Sent ...');

                                // if(res.status === 1){
                                //     console.log("Response OK");
                                //     // response= res.reply;
                                // }
                                
                                // Clear the input section
                                $('input.form-input').val("");

                                // Render the msg
                                $('.chatbot-conversation').append(`
                                    <p class="chat-entry user"> ${message} </p>
                                `);

                                // Get the response
                                $('.chatbot-conversation').append(`
                                    <p id="bot" class="chat-entry bot"> ${response} </p>
                                `);
                                },
                                error: function(error){
                                    console.log(error);
                                    // var servertext = document.createElement('div');
                                    // servertext.innerHTML = "<br>"  + "<span class= 'bot' > Rodrigo: </span>" + "I don't understand what you said, it's prolly because I'm quite tired at the moment, could we talk some other time" + "<br>";
                                    // client.appendChild(servertext);      
				                }   
                            });
                        }
                                              
                });

                $('button.btn').click(function(event){
                    message = $('input.form-input').val();
                        console.log(message);
                        event.preventDefault();

                        if(message == ""){
                            $('.chatbot-conversation').append(`
                                <p style="background-color:#F44336; border:none" id="bot" class="chat-entry bot"> No response from you ... </p>
                            `)
                            return;
                        }

                        if(message == "#aboutbot"){
                            response = "I am Medric your drug assistace, Current version 1.0 \n "+                            
                            "Tell me what you're feeling in concise sentence as much as possible \n "+
                            "Use #help to get list of commands";
                            return;
                        }

                        if(message == "#help"){
                            response = "Commands "+"\n Train - #train: question : answer : password \n "+
                            "About- #aboutbot to get info about me";
                            return;
                        }
                        if((message.toLowerCase()).startsWith("hello")){
                            response="Hi buddy, How can i be of help?";
                            return;
                        }
                        
                        $.ajax({
                                type: "POST",
                                url:"nectar.php",
                                data: {
                                    message: message,
                                },
                                dataType: "json",
                                success: function() {
                                console.log('Msg Sent');
                                // if(res.status === 1){
                                //     console.log("Response OK");
                                //     response= res.reply;
                                // }
                                
                                // Clear the input section
                                $('input.form-input').val("");

                                // Render the msg
                                $('.chatbot-conversation').append(`
                                    <p class="chat-entry user"> ${message} </p>
                                `);

                                // Get the response
                                $('.chatbot-conversation').append(`
                                    <p id="bot" class="chat-entry bot"> ${response} </p>
                                `);
                                }
                            });
                });
            });                
        </script>
</body>
</html>
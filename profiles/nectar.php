<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HNG Nectar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
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
            height: 250px;

            border: 1px solid black;
        }
        div.section-chatbot h5.chatbot-title{
            margin-top: 0em;
            background-color: #03A9F4;
            text-align: center;
            font-size: 1em;
        }

        div.section-chatbot div.chatbot-conversation{
            overflow-y: scroll;
            height: 100%;

            border: 1px solid blue;
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
            
        }

        div.section-chatbot div.chatbot-input form input {
            size: 100%;
            color: red;
        }

        div.section-chatbot div.chatbot-input form p.info {
            float: left;
        }

        div.section-chatbot div.chatbot-input form button.submit {
            float: right;
        }
    </style>
    
</head>
<body ng-app="profileApp">
    <?php
        // Get the config file
        // include '../db.php';
         
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


        // Handle form submit
        $info = "";
        // Check for submission of form
        if (isset($_POST['submit'])){
            // Check for empty entry
            if (empty($_POST['entry-question'])){
                // echo "Error ";
                $info = "No Entry";
            }else{
                // The input entry is not empty
                // echo "Successful";
                $info = "Sent";
                // Query the db with the content of the entry

            }
        }

    ?>
    <div ng-controller="controller" class="section-info">
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

    <div class="section-chatbot card">
        <h5 class="chatbot-title">Chat Bot {{test + 10}}</h5>

        <div class="chatbot-conversation card-body">
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry user"> {{test}}</p>

            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user">For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>        

            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user">For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>        

            
        </div>

        <div class="chatbot-input">
            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input class="form-control" ng-model="test" type="text" width= "100%" name="entry-question" id="question">               
                <p class="info"><?php echo $info ?> </p>
                <button class="btn btn-primary submit" type="submit" name="submit">Send</button>
            </form>
        </div>                
    </div>

    <script>
        var myApp = angular.module("profileApp",[]);
        myApp.controller("controller", ['$scope', function($scope){
            $scope.test = 'Hello Angular';
            $scope.first= "first";
            $scope.chat_container;
        }]);
    </script>
</body>
</html>
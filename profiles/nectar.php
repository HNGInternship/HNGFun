<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HNG Nectar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
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
            min-width: 10%;
            width: 90%;
            height: 100%;
            border-radius: 50%;
        }

        div.section-info div.profile-image > p.intern-name {
            text-align: center;
            color: #03A9F4;;
            font-size: 2.5em;

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
            margin:1em auto;

            max-width: 60%;
            min-width: 40%
            width: 50%;

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
            height: 200px;
        }

        div.section-chatbot div.chatbot-conversation p.chat-entry{
            background-color: white; 
            overflow: auto;           
        }

        div.section-chatbot div.chatbot-conversation p.bot{      
            text-align: left;   
            padding-right: 2px ;  
            width: 50%; 
        }

        div.section-chatbot div.chatbot-conversation p.user{
            text-align: end;
            /* margin-right: 40%;                 */
            padding-right: 7px; 
            padding-left: 50%;
            width: 50%;    
        }

        div.section-chatbot div.chatbot-input{
            
        }

        div.section-chatbot div.chatbot-input form {
            
        }
    </style>
    
</head>
<body>
    <?php
        // Get the config file
        include '../db.php';
         
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

    <div class="section-chatbot">
        <h5 class="chatbot-title">Chat Bot</h5>
        <div class="chatbot-conversation">
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>

            <!-- <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user"> Hello i am a user</p>
            <p class="chat-entry bot"> Hello! My Name is Locala</p>
            <p class="chat-entry user">For the vertical bar,it will allow the content to expand up to the height you have specified. If it exceeds that height, it will show a vertical scrollbar to view the rest of the content, but will not show a scrollbar if it does not exceed the height.</p>         -->
        </div>

        <div class="chatbot-input">
            <form action="" method="get">
                <input type="text" width= "100%" name="entry-question" id="question">
                <button type="submit">Send</button>
            </form>
        </div>                
    </div>
</body>
</html>
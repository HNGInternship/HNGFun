<!DOCTYPE html>
<html>
    <head>
        <style>
            body, div, h1, h2, h3, h4, h5, h6{
                margin: 0px;
                padding: 0px;
        
            }
            h2{
                margin-bottom: 20px;
                margin-left: 20px;
                font-weight: 80;
                font-style:oblique;
                color: rgb(134, 137, 138);
                
            }
            h2 > b{
                color: #d4d4d4;
                font-style:italic;
                
            }
            .profile_background{
                /*text-align: center;*/
                background-color: rgb(0, 0, 0);
                width: 800px;
                height: 550px;
                padding-top: 5px;
                margin-left: 300px;
                margin-top: 10px;
                /*border-radius: 10px;*/
	            box-shadow: 5px 50px 50px rgb(9, 15, 13);
                text-align: center;
                
            }
            .picture_background{
                width: 350px;
                height: 350px;
                margin-left: 265px;
                margin-top: 20px;
                margin-bottom: 10px;
                transform: rotate(-90deg);
              
            }
            .line_division{
                background-color: rgb(94, 0, 0);
                width: 800px;
                height: 2px;
                margin-left: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
            }
            .details{
                text-align: center;
                background-color: rgb(17, 17, 17);
                height: 215px;
                font-family: Georgia, "Times New Roman", Times, serif;
                padding-top: 10px;
            }
            div > figure > img{
                border-radius: 150px;
	            /*box-shadow: 5px 5px 10px rgb(9, 15, 13);*/
            }
            
        </style>
    </head>
    <body>
            <?php

            // include('../../htconfig/config.php');
             $dbSuccess = false;
             $dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);
             if ($dbConnected) {
                 $dbSelected = mysql_select_db($db['database'], $dbConnected);
                 $dbSuccess = true;
             }

            if($dbSuccess) {
                /*___________________________________________________________________
                This block queries the interns_data table in the hng_fun database
                ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
              //echo "<h1>SUCCESS! </h1>". " <h2>Congratulations, you have successfully connected to the database.</h2>";
               $get_my_data = "SELECT name, username, image_filename FROM interns_data";
               $my_data = mysql_query($get_my_data);
               $row = mysql_fetch_array($my_data, MYSQL_ASSOC);

               /*_____________________________________________________________________
                This block queries the sectret_word table in the hng_fun database
                ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
               $get_secret_word = "SELECT secret_word FROM secret_word";
               $secret_word = mysql_query($get_secret_word);
               /*______________________________________________________________________________________________
               This block is used to check if the secret_word query is successful (not needed for the project)
               if($secret_word != "") {
                   echo "<br /><br />secret_word QUERY - SUCCESSFUL!";
               } else {
                   echo "<br /><br />secret_word QUERY - FAILED";
               }_______________________________________________________________________*/
             }
             
             ?>
        <div class="profile_background">
            <h2><b>HNG 4 - Participant Profile</b></h2>

            <div class="picture_background">
                    <figure>
                        <img src="http://res.cloudinary.com/dmx0a3nqi/image/upload/v1525814048/pic-2.jpg" width="300" height="300" alt="picture space">
                    </figure> 
            </div>

            <div class="line_division"></div>

            <div class="details">
                    <h2>Username: <?php echo "<b>$row[username]</b></h2>"?>;
                    <h2>Full Name: <?php echo "<b>$row[name]</b></h2>"?>;
                    <h2>Level: <b>Stage 3 </b></h2>
                    <h2>email: <a href="eneja.kc@gmail.com">eneja.kc@gmail.com</a></h2>
            </div>
            
        </div>
        

    </body>
</html>
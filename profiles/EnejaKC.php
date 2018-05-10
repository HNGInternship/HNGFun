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
                background-color: rgb(0, 0, 0);
                width: 800px;
                height: 550px;
                padding-top: 5px;
                margin-left: 300px;
                margin-top: 10px;
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
            }
            
        </style>
    </head>
    <body>
            <?php
            $result = $conn->query("SELECT * from secret_word LIMIT 1");
            $result = $result->fetch(PDO::FETCH_OBJ);
            $secret_word = $result->secret_word;
            $result2 = $conn->query("Select * from interns_data where username = 'EnejaKC'");
            $user = $result2->fetch(PDO::FETCH_OBJ);
/*
            // include('../../htconfig/config.php');
            $db = array(
                'hostname'=> 'localhost',
                'username'=> 'root',
                'password'=> '',
                'database'=> 'hng_fun',
                );
                
             $dbSuccess = false;
             $dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);
             if ($dbConnected) {
                 $dbSelected = mysql_select_db($db['database'], $dbConnected);
                 $dbSuccess = true;
             }

            if($dbSuccess) {
               $get_my_data = "SELECT name, username, image_filename FROM interns_data";
               $my_data = mysql_query($get_my_data);
               $row = mysql_fetch_array($my_data, MYSQL_ASSOC);
               $get_secret_word = "SELECT secret_word FROM secret_word";
               $secret_word = mysql_query($get_secret_word);
             }
*/
             
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
                    <h2>Username: EnejaKC</h2>;
                    <h2>Full Name: Eneja Kingsley Chinonso</h2>;
                    <h2>Level: <b>Stage 3 </b></h2>
                    <h2>email: <a href="eneja.kc@gmail.com">eneja.kc@gmail.com</a></h2>
            </div>
            
        </div>
        

    </body>
</html>
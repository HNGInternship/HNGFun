<?php

        require_once '../db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();

            $result2 = $conn->query("Select * from interns_data where username = 'Chidera'");
            $user = $result2->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title>Chidera's profile</title>
    <style>
        .chidera_profile-container{
            max-width: 600px;
            min-height: auto;
            position: relative;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            margin: 6% auto;
            background-color: #3E4447;
            box-shadow: 0px 0px 1px #3436a5, 0 4px 8px 0 rgba(0, 0, 0, 0.8), 0 6px 10px 0 rgba(0, 0, 0, 0.19);
            
        }
        .chidera_img{
            float: left;
        }
        .chidera_info{
            padding: 3px;
            padding-top: 20px;
            text-align: center;
            color: #ffffff;
            font-family: 'Roboto Condensed', 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .chidera_name{
            font-size: 24px;
            letter-spacing: 1px;
            margin: 4px;
            text-transform: uppercase;
            
        }
        .chidera_job{
            font-variant: small-caps;
            letter-spacing: 1.5px;
            margin: 6px 4px 2px 5px;
            font-size: 14px;
        }
        .chidera_hr{
            margin: 4px;
            margin-top: 0;
            margin-left: 242px;
        }
        .chidera_details{
            margin-top: 20px;
            margin-bottom: 20px
        }
        .chidera_detail{
            margin: 2px;
            font-size: 18px;
        }
        .chidera_subject{
            font-variant: small-caps;
            font-size: 13px;
            margin: 4px;
            margin-top: 20px;
            letter-spacing: 1px;
        }
        /* Style all font awesome icons */
.chidera_fa {
    padding: 5px;
    font-size: 18px;
    width: 15px;
    height: 16px;
    margin: 2px 7px 2px 7px;
    border-radius: 7px;
}

/* Add a hover effect*/
.chidera_fa:hover {
    opacity: 0.7;
}

/* Set a specific color for each brand */

/* Facebook */
.chidera_facebook, .chidera_linkedin {
    color: #0077B5;
}

/* Instagram */
.chidera_instagram {
    color: #FA0867;
    padding-left: 4px;
    padding-top: 4px;
}
/* Github */
.chidera_github{
    color: #ffffff;
}
/* Twitter */
.chidera_twitter{
    color:#1DA1F2;
}
@media screen and (max-width:425px) {

    .chidera_img{
        float: none;
        width: 60%;
        margin: auto;
    }
    .chideraimg{
        width: 100%;
        height: 50%;
        margin-top: 10px;
        border-radius: 5px;
    }
    .chidera_hr{
        margin-left: 4px;
    }
}
        
    </style>
</head>

<body>
    <section>
        <section class="chidera_profile-container">
            <div class="chidera_img">
                <img class="chideraimg" src="<?php echo $user->image_filename?>" alt="" srcset="" height="386" width="240">
            </div>
            <div class="chidera_info">
                <div class="chidera_header">
                    <p class="chidera_name"><?php echo $user->name; ?></p>
                    <p class="chidera_job">SOFTWARE ENGINEER | FRONT-END DEVELOPER</p>
                    <hr class="chidera_hr">
                </div>
                <div class="chidera_details">
                    <p class="chidera_subject">USERNAME</p>
                    <p class="chidera_detail">@<?php echo $user->username?></p>
                    <p class="chidera_subject">EMAIL</p>
                    <p class="chidera_detail">jenniferolibie@gmail.com</p>
                    <p class="chidera_subject">SKILLS</p>
                    <p class="chidera_detail">HTML | CSS | JavaScript</p>
                    <p class="chidera_subject">MOTTO</p>
                    <p class="chidera_detail">Set Your Mind To It And It Gets Done</p>

                </div>
                <div class="footer">
                    <hr class="chidera_hr">
                    <a href="http://facebook.com/JenniOCE" class="fa fa-facebook chidera_fa chidera_facebook"></a>
                    <a href="http://instagram.com/Jenn_0c" class="fa fa-instagram chidera_fa chidera_instagram"></a>
                    <a href="http://github/je-ni" class="fa fa-github chidera_fa chidera_github"></a>
                    <a href="https://twitter.com/dera_jo" class="fa fa-twitter chidera_fa chidera_twitter"></a>
                    <a href="https://www.linkedin.com/in/chidera-olibie-57440414a" class="fa fa-linkedin chidera_fa chidera_linkedin"></a>



                </div>

            </div>

        </section>

    </section>
    
</body>
</html>

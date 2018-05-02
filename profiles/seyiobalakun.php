    <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $secret_word = $result['secret_word'];

        $result2 = $conn->query("Select * from interns_data where username = 'seyiobalakun'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<style>
    body{
        background-image: url('http://res.cloudinary.com/seyiobalakun/image/upload/v1524787479/002221-Mari-Responsive-Resume-_-CV-_-vCard-WordPress-Theme-Preview-ThemeForest.jpg');
        background-size: 100% 100%;

      }
    .main {
        width: 360px;
        height: 300px;
        margin: auto;
        margin-top: 100px;
        border:3px solid #4a4e0d;
        border-radius:10%;
        background:rgba(246,244,223,0.7);
        }

    img{
        margin-left: 100px;
        height: 150px;
        width: 150px;
        margin-top: -50px;
        border: 3px solid rgb(74,78,13);
        border-radius: 20% 20% 0 0;
        -moz-box-shadow: #FF7666 0px 4px 7px; 
        -webkit-box-shadow:#FF7666 0px 4px 7px;
        box-shadow: #2a3132 0px 4px 7px;
        background: #fff;   
        }

    .content{
        color:#4a4e0d;
        padding:10px;
        }
	</style>
</head>
<body>
    <div class="main">
        <div class="image">
            <img src="<?php echo $user->image_filename; ?>" alt="Author's Picture">
        </div>

        <div class="content">
            <hr style="background:#4a4e0d; width: 300px; height: 1px;">
            <h3><span style="background:#4a4e0d; padding: 5px;"><i class="fa fa-user-circle" style="color:#F6F4DF"></i></span> <?php echo $user->name; ?></h3>
            <h3><span style="background:#4a4e0d; padding: 6px;"><i class="fa fa-slack" style="color:#F6F4DF"></i></span> @<?php echo $user->username; ?></h3>    
        </div>
     </div>
 </body>
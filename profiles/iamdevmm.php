    <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $secret_word = $result['secret_word'];

        $result2 = $conn->query("Select * from interns_data where username = 'iamdevmm'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  
	
	
	<style>
      
      body{
        background-image: url('http://res.cloudinary.com/devplus-devmm/image/upload/v1524619646/apple_imac_201705_thumb800_ualczl.webp');
        background-size: 100% 100%;

      }
        .main {
        width: 360px;
        height: 300px;
        margin: auto;
        margin-top: 100px;
        background: rgb(43, 108, 167);
        }
        .img{
            width: 200px;
            height: 200px;
            margin: auto;
            margin-left: 40%;
        }
         img{
        margin-left: 100px;
        height: 150px;
        width: 150px;
        margin-top: -60px;
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }

        .details{
        color: #f0f0f0;
        padding: 10px;
        }

       

   
	</style>
</head>
<body>
    <div class="main">
        <div class="image">
            <img src="<?php echo $user->image_filename; ?>" alt="Author's Picture">
        </div>

        <div class="details">
            <hr style="background: #f0f0f0; width: 300px; height: 1px;">
            <h3><span style="background: #f0f0f0; padding: 5px;"><i class="fa fa-user-circle" style="color: #2B63A7"></i></span> <?php echo $user->name; ?></h3>
            <h3><span style="background: #f0f0f0; padding: 6px;"><i class="fa fa-slack" style="color: #2B63A7"></i></span> @<?php echo $user->username; ?></h3>    
        </div>
     </div>
 </body>
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
  
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
	
	<style>
     
      body{
        background-image: url('http://res.cloudinary.com/devplus-devmm/image/upload/v1524619646/apple_imac_201705_thumb800_ualczl.webp');
        background-size: 100% 100%;

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
   
	</style>
</head>
<body>

    <div class="main">
       
<div class="oj-flex oj-flex-items-pad">
    <div class="oj-md-4 oj-flex-item">
    </div>
        <div class="oj-md-4 oj-flex-item" style="margin-top: 100px; background: rgb(43, 108, 167);">

          <div class="align-w">
              <img src="<?php echo $user->image_filename; ?>" height="250" width="250" style="margin-top:-90px;"><br><br>
              <hr style="background: #f0f0f0; width: 300px; height: 1px;">
              <h3>
                <i class="fa fa-user-circle"></i> 
                <span style="color: #ffffff;"><?php echo $user->name; ?></span>
            </h3>
            <h3>
                <i class="fa fa-slack"></i>
                <span style="color: #ffffff;"> @<?php echo $user->username; ?></span>
            </h3>

            <p align="center" style="color: #ffffff;">
                Web developer, Skilled in HTML, CSS, JS, PHP
            </p><br><br><br>
          </div>
      </div>
</div>

 </body>

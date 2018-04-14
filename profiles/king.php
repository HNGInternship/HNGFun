<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HNG</title>
    <style>
     .container {
     left: 170px;
     text-align: center;
     position: relative;
     width: 1152px;
     height: 700px;

     background: #6FCF97;  

}

.text {
        margin-top: -170px;
    position: absolute;
    width: 413px;
    height: 82px;
    left: 397px;
    top: 136px;

    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 40px;

    color: #F2F2F2;
}

.line {
    position: absolute;
    width: 1141px;
    height: 0px;
    left: 3px;
    top: 265px;

    border: 1px solid #000000;
}

.time-box{
    position: absolute;
    width: 565px;
    height: 160px;
    left: 297px;
    top: 427px;

    background: #F2F2F2;
}

.time {
/*    position: absolute;*/
    width: 520px;
    height: 100px;
    left: 313px;
    top: 463px;

    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 40px;

    color: #000000;
}
    </style>
</head>
<body>
   <?php
            require_once("../db.php");
            $stm = $conn->prepare("SELECT secret_word FROM secret_word WHERE id = :id");
            $stm->execute(array(':id'=>1));
            $product = $stm->fetch();
            $stm->closeCursor();
            $secret_word = $product['secret_word'];


            $stm = $conn->prepare("SELECT * FROM interns_data_ WHERE intern_id = :id");
            $stm->execute(array(':id'=>1));
            $product = $stm->fetch();
            $stm->closeCursor();
            $name = $product['name'];
            $user_name = $product['username'];
            $image = $product['image_filename'];
//           echo $image;
    ?>
    <div class="container">
        <div class="text">
          <p><img src="<?php echo $image ?>" alt=""></p>
        </div>
        <div class="time-box">
          <p class="time">
              <i>Name:<?php echo $name ?></i>
                <br>
              <i>User Name:<?php  echo $user_name ?></i>
              <br></p>
        </div>
    </div>
</body>
</html>
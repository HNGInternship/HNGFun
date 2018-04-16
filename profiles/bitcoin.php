<?php
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

       throw $err;
    }?>
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JOSEPH FOR PRESIDENT</title>
    <style>
    /* Desktop */

body {
    position: fixed;
    width: 100%;
    height: 100%;
    background: #574F4A;
}
/* OH! Hi, Mark! */
p {
    position: absolute;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    left: 25%;

    font-family: Roboto Slab;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 100px;

    color: #F2994A;
}
/* Rectangle */
box {
    position: absolute;
    align-items: center;
    justify-content: center;
    left: 28%;
    top: 40%;
    font-size: 37px;
    color: white;
    padding: 30px;

    background: #000000;
}
</style>
    <title></title>
    <meta content="">
  </head>
  <body>
  <p>OH! Hi, Mark!</p>
  <box><?php
echo "Time is " . date("F j, Y, g:i a") . "<br>";
?>
</box>


<footer>
<div>
                <a href="https://github.com/josephogunlowo1"><i class="fa fa-github"></i></i></a>
                <a href="https://twitter.com/josephogunlowo1"><i class="fa fa-twitter"></i></i></a>
                <a href="https://medium.com/@josephogunlowo1"><i class="fa fa-medium"></i></i></a>
                <a href="https://web.facebook.com/joseph.ogunlowo"><i class="fa fa-facebook"></i></i></a>  
            </div>
</footer>
  </body>
</html>

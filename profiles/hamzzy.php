<?php
include "db.php";
$profile="SELECT * FROM interns_data WHERE username='hamzzy'";

$query = $conn->query($profile);
$intern = $query->fetch(PDO::FETCH_ASSOC);

/* secret key  */
$sect="SELECT * FROM secret_word LIMIT 1";
$que = $conn->query($sect);
$get=$que->fetch(PDO::FETCH_ASSOC);
$secret_word=$get['secret_word'];

    $chat="select * from chatbot";
    $question=$conn->query($chat);
    $in = $question->fetch(PDO::FETCH_ASSOC);



echo json_encode([

        'question'=>$in['question'],
         'answer'=>$in['answer']



]);






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
body{
    margin:0;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.title {
    
    font-size: 30px;
    text-align:center;
    font-family:;
}
p{
    text-align:left;
}
i{
    margin-right:10px;
    margin-left:10px;
}
.tit{
    text-align:center;
    font-size: 30px;
}

.section{
    
    
}
.container{
    display:inline;


}

body {
    margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;
}


    .con{
        float: right;
        display: inline-block;
        position: relative;
    }



</style>

<body>


<br/>

<div class="container">

<div class="card">
<img src="http://res.cloudinary.com/hamtech/image/upload/v1524671205/ibrahim.jpg" alt="John" style="width:100%">
<p class="title">@<?php echo  $intern['username'] ; ?></p>
<p class="title"><i class="fa fa-user"></i><?php echo  $intern['name'] ; ?></p>
<p class="tit"><i class="fa fa-envelope"></i>software developer intern @ HNG </p>
<p class="tit"><i class="fa fa fa-asterisk fa-fw"></i>Passionate software developer and a lover of ml</p>

 <div style="margin: 24px 0;"> 
    <a href="https://twitter.com/hamzati26306904"><i class="fab fa-twitter fa-3x"></i></a>  
    <a href="https://github.com/hamzzy"><i class="fab fa-github-square fa-3x"></i></a>  
    <a href="#"><i class="fab fa-facebook fa-3x"></i></a> 
 </div>

</div>

    <?php echo  json_encode( ['answer'=>$in['answer']

    ]);
    ?>
<!--  Chatbot   -->

    <input type="text" class="in">
  <button type="submit"  class="btn"></button>
</div>

<script src="../js/jquery.min.js"></script>
<script>

    $(document).ready(function () {

         $('.btn').click(function () {

             var input=$('.in').val

             $.ajax({
                  url:'profiles/hamzzy.php',
                  type: "post",
                  DataType:'json',
                  success:function (data) {
                     alert(data.data);




                 }

             });





         }) ;















    });




</script>


</body>
</html>

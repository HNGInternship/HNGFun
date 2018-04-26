<?php

define ('DB_USER', "root");
define ('DB_PASSWORD', "");
define ('DB_DATABASE', "hng_fun");
// define ('DB_HOST', "");
define ('DB_HOST', "localhost");

    // Create connection
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

$res = mysqli_query($connect,"SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($res)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'Abdullahi Abdulkabir'");
if($result) {$my_data = mysqli_fetch_assoc($result);}
else {echo "An error occored";}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/icon.ico" />
  <meta name="Abdullahi Abdulkabir"  content="content">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
  <title>Official Website of <?php echo $my_data['name']; ?></title>
  <style>
    @font-face {
    font-family: Avenir-Book;
    src: url('../fonts/Avenir/AvenirLTStd-Book.otf'); 
}
@font-face {
    font-family: Avenir-Light;
    src: url('../fonts/Avenir/AvenirLTStd-Light.otf'); 
}

*{
  margin:0px;
}
body{
 background-color: #58A;
 background-repeat: no-repeat;
 background-size: cover;
}
.container{
}
.site{
  background: #fff;
    padding: 10px;
    margin-top: 150px;
    margin-bottom: 150px;
}
.holder{
    background: #f2f2f2;
    border: 1px solid #c2c2c2;
    min-height: 50px;
    padding: 30px 50px ;
}
h2{
  font: 200 3em/1.0em "Chicle", Helvetica, Chiller,cursive ;
  font-weight: bold;
  padding-top: 420px;
}
.header{
  /*height: 500px;*/
  /*width: 100%;*/
  }
.type{
  margin-left: 12px;
  width: 100%;
  /*position: relative;*/
}
  .type h2 {
  overflow: hidden; 
  white-space: nowrap; 
  margin: 8 auto; 
  letter-spacing: .07em; 
  animation-delay: 7s;
  animation-delay: 250ms;
  animation: 
  typing 4.0s steps(40, end), /*speed*/
   blink-caret .65s step-end infinite;
  color: #f6f7f9;
  text-align: left;
}
@keyframes typing {
  from { width: 0 }
  to { width: 80% }
}
.btn1{
    display: block;
    background: #dddddd;
    border: 1px solid #cccccc;
    box-shadow: 0px 1px #fff;
    -moz-box-shadow: 0px 1px #fff;
    -webkit-box-shadow: 0px 1px #fff;
    text-align: center;
    font-size: 23px;
    line-height: 23px;
    border-radius: 0px;
    color: #4b4b4b;
    margin:10px 70px 10px 10px;
    padding-right: 13px;
    text-shadow: 0px 1px rgba(255,255,255,0.5);
    text-transform: lowercase;
}
.btn1:hover{
      border: 1px solid #4b4b4b;
    background: #646464;
    box-shadow: 0px 1px #fff;
    color: #ddd;
    text-shadow: 0px 1px rgba(75,75,75,0.5);
    text-decoration: none;
}
.row2{
  margin-top: 50px;

}
.pics{
  /*border-radius: 50px;*/
  width: 150px;
  /*margin-right: 150px*/
  margin-bottom: -450px
}

/*http://res.cloudinary.com/pace/image/upload/v1524535256/My_photo.jpg*/
  </style>
</head>
<body>
<div class="container">                
    <div class="header">
      <div class="type">
        <div class="rounded-circle"><div class="text-center  "><img src="<?php echo $my_data['image_filename'] ?>" alt="" class="pics"></div>
        <h2 class="">I'm <?php echo $my_data['name']; ?>, a Web Developer
         based in Lagos, Nigeria</h2>
      </div>
    </div>
  <div class="site">
    <div class="holder">
       <div class="row">
          <a class="btn btn1 btn-lg  col-md-2 " href="https://linkedin.com/in/abdullahi-abdulkabir-40a762bb/" role="button"><i class="fa fa-linkedin-square"> Linkedin</i> </span></a>
          <a class="btn btn1 btn-lg col-md-2 col-md-offset-1" href="#" role="button">  gtalk</a>
          <a class="btn btn1 btn-lg col-md-offset-1 col-md-2 " href="http://twitter.com/abdullahi_bn" role="button"><i class="fa fa-twitter "> Twitter</i></a>
          <a class="btn btn1 btn-lg col-md-offset-1 col-md-2 " href="https://facebook.com/abdullahi.abdulkabir.5" role="button"> <i class="fa fa-facebook-square">  Facebook</i></a>
      </div>
      <div class="row row2">
        <a class="btn btn1 btn-lg  col-md-2" href="#" role="button"> <i class="fa fa-yahoo"></i> Yahoo</a>
        <a class="btn btn1 btn-lg col-md-offset-1 col-md-2 " href="#" role="button"><i class="fa fa-skype ">   Skype</i></a>
        <a class="btn btn1 btn-lg col-md-offset-1 col-md-2" href="https://github.com/AbdullahiAbdulkabir" role="button"> Github</a>
        <a class="btn btn1 btn-lg col-md-offset-1 col-md-2" href="#" role="button"> Store</a>
      </div>  
    </div><!--holder-->
  </div><!-- site-->
</div>

</body>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>
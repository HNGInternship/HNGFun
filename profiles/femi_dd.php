<style>
body {
   background: #DAE3E7;
   padding: 10px;
   /* border: 25px solid; */
   font-family: 'Lato', arial, sans-serif;
   margin: 20px;
}
a{
   color: #434343;
}
#top {
   background-color: #DAE3E7;
   background: white;
   height: 35%;
   margin: 20px;
   border-radius: 20px;
}
#intro{
   margin: 29px;
   display: block;
   font-size: 16px;
   padding: 20px;
}
h1{
   color: #434343;
   font-size: 38px;
   margin-bottom: 5px;
   margin-top: 30px;
   padding-top: 10px;
   font-family: 'Montserrat', sans-serif;
}
h2{
   color: #778492;
   font-size: 26px
}
img {
   border-radius: 50%;
   float: left;
   width: 15%;
   margin: 15px;
}
li{
   padding-right: 25px;
   margin-right: 9px;
   list-style: none;
   display: inline;
   font-size: 30px;
   padding-top: 10px;
   border-radius: 50%;
   color: #fff;
   text-align: center;
}
.round-corners{
   border-radius: 20px;
   /* background-color: #DAE3E7; */
   background: white;
   margin: 20px;
}
.inner{
   padding: 20px
}
p,i,li{
   font-family:'Lato', arial, sans-serif;
}
#all_content{
   padding-top:21px
}
</style>
<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'femi_dd'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE HTML5>
<head>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css' />
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' />
</head>
<html>
<body>
   <div id="all_content">
      <div id="top">
         <img src="http://res.cloudinary.com/femidd/image/upload/v1523647188/femi_dd.jpg" alt="Kole-Ibrahim AbdulQudus">
         <div id="intro">
            <h1><?php echo $user->name; ?></h1>
            <h2 style="text-align:left">Backend Developer</h2>
            <ul class="list-inline">
               <li><a target="_blank" title="Twitter/Femi_DD" href="https://twitter.com/Femi_DD"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" title="Facebook/KoleIbrahimAbdulQudus" href="http://facebook.com/KoleIbrahimAbdulQudus"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" title="Linkedin/KoleIbrahimAbdulQudus" href="https://www.linkedin.com/in/koleibrahimabdulqudus/"><i class="fa fa-linkedin"></i></a></li>
               <li><a target="_blank" title="Github/Femi-DD" href="http://github.com/femi-dd"><i class="fa fa-github-alt"></i></a></li>
               <li><a target="_blank" title="StackOverflow/Femi_DD" href="https://stackoverflow.com/story/femi_dd"><i class="fa fa-stack-overflow"></i></a></li>
               <li><a style="font-size:20px;" class="btn btn-cta-primary pull-right" href="mailto:femi.highsky@gmail.com" target="_blank"><i class="fa fa-paper-plane"></i> Contact Me</a></li>
            </ul>
         </div>
      </div>
      <div class="round-corners">
         <div style="font-size: 18px" class="inner">
            <h2>About Me</h2>
            <p>Backend Developer(PHP:CodeIgniter), Java && MySQL. Currently learning core JavaScript.</p>
            <p>I'm also a Motivational Writer, basically just quotes, the kinds that mean so much!! <br> I'm a Farmer as well.</p>
            <p>Wanna read some? Checkout my Instagram page &nbsp;&nbsp;&nbsp;<a style="font-size:28px" target="_blank" title="Instagram/Femi_DD" href="http://instagram.com/femi_dd">@Femi_DD <i class="fa fa-instagram"></i></a></p>
            <p>The things i like aren't so much: #peace #solitude #mylaptop</p>
         </div>
      </div>
   </div>
   <footer style="margin-bottom:0px; text-align:center; padding-top:25px;" id="footer">
      <p>Copyright &copy; Kole-Ibrahim AbdulQudus 2018</p>
   </footer>
</body>
</html>

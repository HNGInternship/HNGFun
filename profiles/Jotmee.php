
<?php
 
        require_once "../db.php";
    try {
        $select = 'SELECT * FROM secret_word';
        $query = $conn->query($select);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        }
        catch (PDOException $e) {
 
        throw $e;
    }
    $secret_word = $data['secret_word'];
 ?>
 
 <!DOCTYPE HTML>
 
 <html>
   <head>
     <title>Oyewale Naimat's Portfolio</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="bootstrap.min.css">
       <script src="bootstrap.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <style type="text/css">
 
         body{
            font-family: Roboto;
            background-color: #00000f;
           }
      #first{
   background-size: cover;
   background-position: center;
   color: #5563DE; 
 }
 #skillset{
   background-size: cover;
   background-position: center;
   color: #74ABE2;
 }
 
 #bnext #next{
   float: left;
 }
 #bnext{
   margin-left: 37%;
   margin-right: 37%;
   margin-top: 1%;
   margin-bottom: 0%;
 }
 #dev{
   padding-top: 4%;
   padding-left: 25%;
   padding-right: 25%;
   padding-bottom: 8%;
   text-align: center;
   font-size: 24px;
   text-transform: uppercase;
   font-weight: 700;
 }
 
 #dev h1{
   text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                  0px 8px 13px rgba(0,0,0,0.1),
                  0px 18px 23px rgba(0,0,0,0.1);
 
 }
 #skills{
   font-size: 24px;
   text-align: center;
 }
 #hskills{
   text-align: center;
   font-weight: 700;
   margin-top: 8px;
   margin-bottom: 28px;
 }
 hr {
     
     border-top: 1px solid #f8f8f8;
     border-bottom: 1px solid rgba(0,0,0,0.2);
 }
 #contact{
   font-size: 24px;
   text-align: center;
   font-weight: 700;
   margin-top: 20px;
   margin-bottom: 20px;
   background-color: 
 }
 
 .fa{
   font-size: 30px;
 }
 
       </style>
 
   </head>
 
   <body>
     <div id="first">
       <div id="dev">
         <img class="img-responsive" id="bobo" src="http://res.cloudinary.com/dmitjmci6/image/upload/v1524591075/Naimat.jpg" style="width: 300px; height: 300px; border-radius: 100px;" align="right"  />
         <h3>My name is Oyewale Naimah</h3>
         <hr>
         <h1>A Front-end Web Developement intern</h1>
       </div>
     </div>
     <div class = "container">
       <div id="skillset">
       
           <h2 style ="text-align: center; margin-top: 0px; padding-top: 20px;"><strong> What I do and the skills I use</strong></h2>
           <p style ="text-align: center; font-size: 24px;"> I am a Front-end Web Developement intern</p>
         
         <div id="hskills" class = "container" style="margin-bottom: 0px;">
           <div class = "row" id="skills">
             <div class ="col-lg-4 col-md-4 col-sm-4">
               <img src="" alt="">
               <p style="color: #5563DE; background-color: white;">Javascript/Jquery</p>
             </div>
             <div class ="col-lg-4 col-md-4 col-sm-4">
               <img src="" alt="">
               <p style="color: #5563DE; background-color: white;">Git</p>
             </div>
             <div class ="col-lg-4 col-md-4 col-sm-4">
               <img src="" alt="">
               <p style="color: #5563DE; background-color: white;">Bootstrap</p>
             </div>
           </div>
           <div class = "row" id="skills">
             
             <div class ="col-lg-4 col-md-4 col-sm-4">
               <img src="" alt="">
               <p style="color: #5563DE; background-color: white;">Html/Css</p>
             </div>
             <div class ="col-lg-4 col-md-4 col-sm-4">
               <img src="" alt="">
               <p style="color: #5563DE; background-color: white;">Figma</p>
             </div>
           </div>
           
           <div class="container" id="contact" style="margin-top: 0px;">
             <hr>
       <h2 style ="text-align: center; margin-bottom: 30px; font-weight: 700px; color: grey"><strong>Contact Info</strong></h2>
       <div style ="text-align: center; margin-bottom: 30px;" id="bnext">
         <div id="next">
           <a href="https://twitter.com/DoyinNaimah" style ="text-align: center;" class="btn btn-circle" target ="_blank"><i class="fa fa-twitter"></i></a>
         </div>
         <div id="next">
           <a href="https://www.facebook.com/OyewaleNahimah" class="btn btn-circle" target = "_blank"><i class="fa fa-facebook"></i></a>
  
         </div>
         <div id="next">
           <a href="https://github.com/Naimahtech" class="btn btn-circle" target ="_blank"><i class="fa fa-github"></i></a>
 
         </div>
         <div id="next">
           <a href="www.linkedin.com/in/naimat-oyewale-828a88154" class="btn btn-circle" target ="_blank"><i class="fa fa-linkedin"></i></a>
 
         </div>
       </div>
 
       <div style="text-align: center;" class="row">
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
           <h4>Email: <a href="">naimatoyewale@yahoo.com</a></h4>
         </div>
       </div>
     </div>
     <div style="text-align: center">
     <h5 style="color: grey;">Naimah  ©. 
       <script type="text/javascript">
         document.write(new Date().getFullYear())
       </script>  All rights reserved
     </h5>
   </div>
 
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
 </html>
      

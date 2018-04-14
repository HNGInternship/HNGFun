<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <style type="text/css">
          body{
              background: #FFFFFF
          }
          
          .landing{
              background: #FFFFFF;
          }
          .section-heading{
              border-top: 4px solid #000000;
              border-bottom: 2px solid #109AF7;
               padding:5px;
              display: inline-block;
              margin-bottom: 15px;
          }
          section h3.section-subheading {
              margin-bottom: 75px;
            margin-top: 10px;
            text-transform: none;
              font-size: 16px;
            font-weight: 400;
            }
          
          .b0{
              border:0px solid #fff;
          }
          
          .text-center {
            text-align: center!important;
                  }
          
          .text-muted {
                color: #777;
            }
          
          .img-me {
            border: 10px solid #f4f4f4;
            margin-top: 18px;
          }
          
          img{
              max-width: 100%;
          }
          
          .img-circle {
              border-radius: 50%;
          }
          
          .name {
            color: #109af7;
            font-weight:700;
            
            }
          
          .font-thin {
            font-weight: 500;
            text-transform: uppercase;
        }   
          
          .text-muted {
                 color: #777;
            }
          
          .download-resume-btn {
            margin-top: 20px;
          }
          
          .btn-blue {
            background: transparent;
            border: 2px solid #109af7;
            border-radius: 1px;
            color: #109af7;
            font-size: 16px;
            font-weight: 400;
            padding: 15px 20px;
            text-transform: uppercase;
            -webkit-transition: .3s;
            transition: .3s;
          }
          
          .btn-blue:hover{
                  color: #fff;
            background: rgba(0,0,0,0) -webkit-linear-gradient(left,#00c6ff,#0072ff);
            background: rgba(0,0,0,0) linear-gradient(to right,#00c6ff,#0072ff);

          }
        

      </style>
  </head>
  <body>
  <?php 
  if(!isset($_GET['id'])){
     require '../db.php';
   }else{
      require 'db.php';
   }
 

  try {
        $sql = 'SELECT * FROM interns_data,secret_word WHERE username ="'.'uncletee'.'"';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
        
    } catch (PDOException $e) {
        throw $e;
    }


  ?>
     <section class="container landing">
         <div class="row">
            <div class="col-md-12 text-center">
             <h2 class="section-heading ">ABOUT ME</h2>
                <h3 class="section-subheading text muted">Am a guy that with serious interest in technology.</h3>
             </div>
         </div>
         <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4  text-center  b0">
                <img class="img-circle img-me" src="<?php  echo ($data['image_filename'])?>">
             </div>
             <div class="col-lg-7 col-md-7 col-sm-7    b0">
                <h3 class = "name">@<?php echo ($data['username']) ?></h3>
                 <h4 class="font-thin">Technophile</h4>
                 <p class = "text-muted">
                    I have serious interest in the Nigeria technology startup space, as well as the use of emerging technology is resolving societal issues. However as a beginner in the technology space I am eager to be exposed to different analytical thinking and management skills.
                 </p>
                 <P class="text-muted">
                    I am currently seeking for opportunities in the technology space.
                 </P>
                 <a class="btn btn-blue download-resume-bt" href="">Buzz me</a>
               
             </div>    
         </div>
            
    </section>
  </body>
 </html> 


   


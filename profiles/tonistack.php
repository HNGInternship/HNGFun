<!DOCTYPE html>
<html lang ="en-US"> 
<head>
    <title>Tonistacks Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Federant" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">

    <style>

    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}

       .header{
           height: 500px;
           background-color: #0A356F;

       }

          /* Custom, iPhone Retina */ 
    @media only screen and (min-width : 320px) {
        .header{
            height: 400px;
        }
}

/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
    .header{
            height: 400px;
        }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
    .header{
            height: 480px;
        }
}



       .top-5{
        margin-top: 5rem!important;
       }

       
       .full-bio{
        position: absolute;
        width: 80%;
        /* margin-top: 10rem; */
        text-align: center;
       }
       

       .profile img{
           height: 200px ;
           width: 200px ;
           border: 6px solid rgba(0, 0, 0, 0.4);
       }

                /* Custom, iPhone Retina */ 
        @media only screen and (min-width : 320px) {
            .profile img {
        height: 120px;
        width: 120px ;
    }
}
       .full-name {
        font-family: Federant;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 50px;
        color: #FFFFFF;
     }


        @media only screen and (min-width : 320px) {
            .full-name {
           font-size: 25px;
    }
        }

     .ux{
        font-family: Didact Gothic;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 25px;
        color: #FFFFFF;
     }
     .location{
        font-family: Galada;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 20px;

        color: #FFFFFF;
     }
     .about{

     }

     .about p{
         padding: 5px;
     }

     .title{
        font-family: Franklin Gothic Medium;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 30px;
        color: #000000;
        border-bottom: 0px dotted #000000;
        border-bottom-width: 6px;
        text-align: center;
     }

    </style>
    
</head>

<body>

<div class="container-fluid header">

<div class="full-bio">
<div class="d-flex justify-content-center top-5">
                    <img src="http://res.cloudinary.com/tonistack/image/upload/c_scale,h_150,w_150/v1526118744/32186506_190330148270134_8580498699174543360_n.jpg" class="rounded-circle w-25 h-25 img-fluid profile">              
                </div>


   <h1 class="full-name">Mcdonald Aladi </h1>

<div class="ux">Frontend Developer, UI & UX Developer</div>
 <div class="location"> <i class="fa fa-map-marker-alt"></i> Lagos,Nigeria</div>

</div>

</div>


<div class="container-fluid mt-5 card">
<div class="title">About Me</div>
<div class="about ">
<p> A UI and UX designer with an eye for design, development and a strong desire to learn and create.</p>
<p>I firmly believe in life long learning and I'm constantly exploring new ideas and technologies. MOOC's have enabled me to update my skills and keep abreast of the latest trends in design and coding.</p>
</div>

</div>
























    <!-- <div class="d-flex justify-content-center">
        <div class="card rounded p-0 mt-5">
            <div class="card-top d-flex justify-content-center">
                <div class="d-block">
                <div class="d-flex justify-content-center mt-5">
                    <img src="https://res.cloudinary.com/nedy123/image/upload/v1523911950/profilePic_xilm0r.jpg" class="rounded-circle w-25 h-25 img-fluid">              
                </div>                
                    <div class="card-body text-center">
                        <p class="card-title h2" style="color:white;"> David Enoch Aji</p>
                        <p class="card-text h4 mb-4" style="color:#BDBDBD;">Android | Graphics | UI/UX</p>
                        <a href="facebook.com/David Enoch Aji">
                            <i class="fab fa-facebook-f fa-fw text-dark fa-2x"></i>
                        -</a>
                        <a href="twitter.com/daveaji">
                            <i class="fab fa-twitter fa-fw text-dark fa-2x"></i>  
                        </a>
                        <a href="github.com/Ajiva-D">
                            <i class="fab fa-github fa-fw text-dark fa-2x"></i>          
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div> -->


    
    <?php

      require_once 'db.php';
      try {
          $select = 'SELECT * FROM secret_word';
          $query = $conn->query($select);
          $query->setFetchMode(PDO::FETCH_ASSOC);
          $data = $query->fetch();
      } catch (PDOException $e) {
          throw $e;
      }
      $secret_word = $data['secret_word'];        
?>


    
</body>


</html
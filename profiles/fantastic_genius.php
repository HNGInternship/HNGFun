<!DOCTYPE html>
<?php

try{
    $sql = "SELECT * FROM secret_word LIMIT 1" ;
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    $secret_word = $data['secret_word'];

}catch(PDOException $err){
    throw $err;
}

try{
    $sql = "SELECT * FROM interns_data WHERE username = 'fantastic_genius'";
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    $name = $data['name'];
    $image_url = $data['image_filename'];
 

}catch(PDOException $err){
    throw $err;
}

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fantastic Genius Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    

    <style>
        .main{
            background: url("https://res.cloudinary.com/dbd5poy8d/image/upload/v1524087688/layout-bg.jpg") ;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 600px;
        }

        .overlay{
            background: rgb(51, 51, 51, 0.59) ;
            background-size: cover;
            min-height: 600px;

        }

        .item-right{
            margin: 100px 0 20px 0;
            font-family: Arial, Helvetica, sans-serif;;
            font-style: normal;
            font-weight: normal;
            line-height: normal;
            border-radius: 10px;
            background: #56CCF2;
            padding: 20px 20px 10px 20px;
        }

        .item-right h3{
            font-size: 24px;
            color: 	#000080;
        }

        .item-right small{
            font-size: 16px;
            color: 	#0000CD;
        }

        .item-content p:first-child{
            color: #CC0000;
            font-size: 18px;
        }

        .item-content p:last-child{
            font-size: 24px;    
            color: #9F0D0D;
            background: #56CCF2;
            line-height: 38px;
            vertical-align: center;    
        }

        .item-content p:last-child span{
            font-size: 36px;   
            color: #2A32F4;
            line-height: 38px;
        }

        .circle{
            margin-top: 100px;
            width: 400px;
            height: 400px;
            border-radius: 200px;
            margin-left: 100px;
        }

        @media only screen and (min-width: 991px) and (max-width: 1052px){
            .circle{
                margin-top: 100px;
                width: 350px;
                height: 350px;
                border-radius: 175px;
                margin-left: 0px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px){
            .circle{
                margin-top: 100px;                
                width: 300px;
                height: 300px;
                border-radius: 150px;
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 768px){
            .circle{
                width: 350px;
                height: 350px;
                border-radius: 175px;
                margin-left: 20px;
            }
        }
        
        .skills-title{
            color: 	#000080;
            font-size: 20px;            
        }

        ul.skills-item{
            list-style: none;
            padding-left: 0;
        }

        .skills-item li{
            color: 	#990000;
        }

        .skills-item li .fa{
            margin-right: 10px;
        }

        .social-link{
            list-style: none;
            padding-left: 0;
        }

        .social-link li{
            display: inline;
            color: #2A32F4;
            padding: 0 5px;
        }
        .social-link li .fa{
            color: #2A32F4;
            font-size: 20px;
        }

        @media only screen and (min-width: 48em) {
            .pull-right-sm {
              float: right;
            }
        }
    
    </style>
    
</head>
<body>
    <div class="main">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div>
                            <img class="circle" src="<?php echo $image_url ?>">
                        </div>                    
                    </div>  
                    <div class="col-md-6">
                        <div class="item-right order-md-1">
                            <h3>I am <?php echo $name ?></h3>
                            <small>@<?php echo $profile_name ?></small>
                            <div class="item-content">
                                <p>I am a Software Developer.I do frontend and backend development with upto one year 
                                experience in web application development. I am a creative thinker and problem solver with a can do attitude. </p>
                                <div>
                                <h5 class="skills-title">Skills</h5>
                                    <ul class="skills-item">
                                        <li><i class="fa fa-check"></i>HTML5</li>
                                        <li><i class="fa fa-check"></i>CSS</li>
                                        <li><i class="fa fa-check"></i>PHP</li>
                                        <li><i class="fa fa-check"></i>Javascript</li>
                                        <li><i class="fa fa-check"></i>Laravel</li>
                                        <li><i class="fa fa-check"></i>Codeigniter</li>
                                        <li><i class="fa fa-check"></i>Bootstrap</li>
                                        <li><i class="fa fa-check"></i>Wordpress</li>
                                    <ul>
                                </div>
                                <div>
                                    <ul class="social-link">
                                        <li><a href="https://github.com/fantastic-genius"><i class="fa fa-github"></i></a></li>
                                        <li><a href="https://www.facebook.com/hamzah.atanda"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="www.linkedin.com/in/hamzah-abdulfattah-81419694"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://twitter.com/Fantastigenius"><i class="fa fa-twitter"></i></a></li>
                                    <ul>
                                </div>
                            </div>                            
                        </div>
                    </div>
                                      
                </div>                
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
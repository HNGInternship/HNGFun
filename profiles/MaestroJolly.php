<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MaestroJolly HNGFun Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="main.js"></script>

    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,700,700i,900,900i);

    body{
        background-color: #fafafa;
        font-family: Montserrat;
        font-size: 16px;

    }
    .header{
    width: 100%;
    height: 50px;
    border-bottom: 1px solid #f3f3f3;
}
    .headermenu{
    padding: 3px 10px 3px 10px;
    width: 100%;
}
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        .column {
        float: left;
        width: 50%;
    }
    .content{
    padding: 10px 10px 10px 10px;
    }
    .contentdisplay{
    width: 100%;
    height: 100%;
    align: center;
    margin: 0px auto;
}
.img{
    align: center;
    padding: 60px 0px 60px 60px;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
    .contentdisplay{
        width: 100%;
    }
}

.socialicons{
    text-align: justify;
    padding-top: 10px;
}
.tw{
    color: #000000;
    padding-right: 20px;
}
.tw:hover{
    color: #00aced;
}
.fb{
    color: #000000;
    padding-right: 20px;
}
.fb:hover{
    color: #3b5998;
}
.ig{
    color: #000000;
    padding-right: 20px;
}
.ig:hover{
    color: #bc2a8d;
}
.git{
    color: #000000;
    padding-right: 20px;
}
.git:hover{
    color: #6e5494;
}
.ln{
    color: #000000;
    padding-right: 20px;
}
.ln:hover{
    color: #007bb6;
}
/* a:hover{
    color : blue;
} */

footer{
    width: 100%;
    height: 50px;
    border-top: 1px solid #f3f3f3;
}
.foot{
    padding: 20px 20px 5px 20px;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="headermenu">
                <div style="float: right">
                    <?php date_default_timezone_set('Africa/Lagos')?>
                    <?php echo "<span style='font-size: 20px;'>".date('h')."</span>H"." "."<span style='font-size:20px'>:</span>".
                        " "."<span style='font-size: 20px;'>".date('i')."</span>M"." "."<span style='font-size:20px'>:</span>".
                        " "."<span style='font-size: 20px;'>".date('sa')."</span>S"." ".date('M')." ".","." ".date('D')." ".date('Y');?></p>
                </div>
            </div>
        </div>
        <?php 
            require_once 'db.php';


            $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'MaestroJolly'");
            $intern_data->execute();
            $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
            $result = $intern_data->fetch();


            $secret_code = $conn->prepare("SELECT * FROM secret_word");
            $secret_code->execute();
            $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
            $code = $secret_code->fetch();
            $secret_word = $code['secret_word'];
            // echo ($secret_word);
            // $result = $intern_data->fetchAll();
            // print_r($result);

        ?>
        <div class="content">
            <div class="row contentdisplay">
                <div class="column">
                    <div class="img">
                        <img src="<?php echo $result['image_filename'];?>" style="border: 2px solid #f3f3f3;" alt="My Image" width="450px" height="600px">
                    </div>
                </div>
                <div class="column" style="padding: 60px 0px 60px 0px; margin: 0px auto;">
                    <span style="font-size: 35px;"><strong><?php echo $result['name']. ' ('.$result['username'].')';?></strong></span><br/>
                    <span style="font-size: 22px;"><strong>(Web Developer)</strong></span>
                    <p style="font-size: 20px;">
                        Skills Includes: HTML, CSS, PHP, CodeIgniter, Figma, Corel Draw, Adobe Photoshop And Illustrator.
                    </p>
                    <p style="font-size: 20px;">
                        Available On:
                    </p>
                    <div class="socialicons">
                            <a href="https://twitter.com/manutdmaestro" target="_blank"><i class="fa fa-twitter fa-3x tw"></i></a>
                            <a href="https://web.facebook.com/jolaosoyusuf" target="_blank"><i class="fa fa-facebook-square fa-3x fb"></i></a>
                            <a href="https://www.instagram.com/maestrojolly/" target="_blank"><i class="fa fa-instagram fa-3x ig"></i></a>    
                            <a href="https://www.linkedin.com/in/jolaoso-yusuf-7b8a9a2a/" target="_blank"><i class="fa fa-linkedin fa-3x ln"></i></a>
                            <a href="https://github.com/MaestroJolly" target="_blank"><i class="fa fa-github fa-3x git"></i></a>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <footer>
            <div class="foot">
            © Copyright <?php echo date('Y');?>. Designed  By MaestroJolly.
            </div>
        </footer>
</body>
</html>
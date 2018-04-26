
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paul Ofili - HNGFun</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        html, body, {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        } 
        .cover {
            height:100%;
            width: 100%;
            background: url("https://res.cloudinary.com/paulofili/image/upload/v1523643456/paulofili.jpg") top left no-repeat;
            background-size: cover;
            display: table;
            font-size: 60px;    
            font-weight: 500px; 
            color: white;
            padding: 30px 50px 10px;
        }    
        #name {            
            font-size: 30px;
            font-weight: 100px; 
        }
        .cover #cover-head {
            margin:100px 0 0px;
            font-size: 50px;
            text-align: center;             
        }
        .cover h1 {
            font-size: 60px;            
        }
         #time {
            font-size: 18px;
            position: relative;           
        }
        .container {
            padding: 30px 120px;
        }  
        .container h3 {
            position: relative;
            left: 37px;
            top: 0px;
            font-size: 30px;
        }
        #bio {
            font-size: 20px;
            border-left: solid 1px #ccc;
            padding-left: 40px;
            padding: 0 0 100px 40px;
        }
        #socialmedia{
           float: right;
           font-size:22px;
           letter-spacing:15px;
        }
        footer{
            padding-left:20px;
            background: #2c3539;
            color: white;
            text-align: center;
            padding: 20px;
        } 
        footer span{
            position: relative;
            left:60px;
        }      
	</style>
</head>
<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'paulofili'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<body>
    <div class="cover">
        <div class = "cover-text">
            <div class = 'row'>
                <div class = 'col-sm-9' id = "name">
                    <span><?php echo $user->name ?> | HNG Internship 4.0</span>
                </div>            
            </div>
            <div id = "cover-head">        
                <h1>Hello There!!</h1>
                <span id = "time">
                    <?php date_default_timezone_set ("Africa/Lagos"); ?>
                    <?php echo date("F j, Y | g:i:s a");?>
                </span> 
            </div>
        </div>
    </div>

    <div class = "container">
        <div class='row'>
            <div class='col-sm-6'>
                <h3>My Profile picture</h3><br>
                <img src='<?php echo $user->image_filename ?>' class= 'rounded-circle'>
            </div>
                
            <div class='col-sm-6' id = 'bio'>
                <h2>A little bit about me</h2><br>
                <p>I am just a guy with lots of passion to code especially as a web developer. Really looking forward to this internship so as to improve on my existing skills and become a professional in it. View my profile in any of the links provided in the footer</p>
                
            </div>
        </div>
    </div>
    <footer>
        <span>Crafted with &hearts; in Lagos by Paul</span>
        <div id = "socialmedia">
            <a href="https://github.com/PaulOfili"><i class="fa fa-github"></i></a>
            <a href="https://twitter.com/paulofili42"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/paul-ofili-227a2215b"><i class="fa fa-linkedin"></i></a>      
        </div>
    </footer>   
   
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
</body>
</html>
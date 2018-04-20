<!DOCTYPE html>
<html>


<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Horlathunbhosun</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- <link href="tunbosun/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
        <link href="tunbosun/icons.css" rel="stylesheet" type="text/css">
        <link href="tunbosun/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
/* body {
    margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;
}*/

.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.container::after {
    content: "";
    clear: both;
    display: table;
}

.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}   



</style>
    </head>

<?php 
   require_once ('db.php');
    $query = $conn->query("SELECT * FROM secret_word");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];


    $result2 = $conn->query("SELECT * FROM interns_data WHERE  username = 'horlathunbhosun'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
   // $user = $result2->fetch();


 ?>

    <body class="fixed-left">

               <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                  

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                           
                            <!-- end page title end breadcrumb -->

                                    
                            
                            <div class="row" style="padding-right:200px; ">
                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <!-- <h5 class="header-title pb-3 mt-0">Overview</h5> -->
                                          <img src="<?php echo $user->image_filename; ?>" height="300" width="250" class="img-responsive">


                                          <h5><b>Name:</b> <?php echo  $user->name; ?> <span></span></h5>
                                            <h5><b>Username:</b> (<?php echo $user->username; ?>) </h5>
                                            <h2>About</h2>
                                            <p style="font-size: 20px;"> i love tech stuff and cools things</p>
                                            <h6><b>Skills:</b>PHP(Code Igniter, Laravel)</h6> 

    
                                          <div>
                                                <span class=""><a href="https://github.com/horlathunbhosun" target="_blank"><i class="fa fa-github"></i></a></span>
                                                <span ><a href="https://twitter.com/@horlathunbhosun" target="_blank"><i class="fa fa-twitter"></i></a</span>
                                                <span ><a href="https://www.linkedin.com/in/olulode-olatunbosun-458927135/" target="_blank"><i class="fa fa-linkedin "></i></a></span>
                                                <span ><a href="https://web.facebook.com/olaolulode" target="_blank"><i class="fa fa-facebook"></i></a></span>
                                                <span><a href="https://medium.com/@olulode olatunbosun" target="_blank"><i class="fa fa-medium"></i></a></span>
                                                <span ><a href="https://www.instagram.com/ola_olulode" target="_blank"><i class="fa fa-instagram"></i></a></span>
                                            </div>
                                
                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                        <h5>Horlathunbhosun bot</h5>

                                            <div class="container">
                                                <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                                                <p>Hello. How are you today?</p>
                                                 <span class="time-right">11:00</span>
                                                    </div>

                                                <div class="container darker">
                                                 <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
                                                         <p>Hey! I'm fine. Thanks for asking!</p>
                                                         <span class="time-left">11:01</span>
                                                        </div>

                                                        <div class="container">
                                                                <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                                                                <p>Sweet! So, what do you wanna do today?</p>
                                                                <span class="time-right">11:02</span>
                                                                </div>

                                                        <div class="container darker">
                                                                <img src="avatar_g2.jpg" alt="Avatar" style="width:100%;">
                                                                 <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                                                                <span class="time-left">11:05</span>
                                                            </div>

                                                   <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Ask Me for..." .">
                                                                <span class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">Send</button>
                                                                </span>
                                                            </div>


                                            
                                         </div>
                                    </div>
                                </div>
                            </div>

                          
                            </div>                                                 
                        </div><!-- container -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                  
                </footer>

            </div>
       

     
    </body>

</html>
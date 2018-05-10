<<<<<<< HEAD
<?php 
		//require 'db.php';
		$result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = "1n73rn@Hng";
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'godson'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Godson Chibuikem Jnr</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic,900,900italic'" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic'" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Risque" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   

    <style>
       * {
           margin: 0;
           padding: 0;
       }

       body {
         font-family: 'Roboto';
         
         background: url('http://res.cloudinary.com/godsoncjnr/image/upload/v1524322856/profile-bg.png') center center no-repeat;
         padding: 30px;
         margin: 0 auto;
         height: 100%;
         overflow: hidden;
         background-size: cover;
       }

       .container1 {
           width: 100%;
           height: 100%;
           margin: 0 auto;
           padding-top: 40px;
           padding-bottom: 40px;
           padding-right: 25px;
           overflow: hidden;
           position: relative;
           color: #806a21;
       }
	    
	    .container {
           margin: 0 auto;
           overflow: hidden;
           position: relative;
           color: #806a21;
       }
       .TxtMask {
           
           background: url('http://res.cloudinary.com/godsoncjnr/image/upload/v1524322858/profile-mask.jpg') center center no-repeat;
           background-size: cover;
           box-shadow: 0px 7px 8px rgba(0, 0, 0, 0.25);
           height: 580px;
	   margin-top: 50px;
           float: right;
           width: 90%;
       }
       .clear {clear: both;}

       .Menu-bars {
         width: 70px;
         height: 55px;
         padding-top: 20px;
         float: right;
         
         
         background-color: #fff;
       }

       .Menu-bars:hover{
         cursor: pointer;
       }

       .Menu-bars hr {
         width: 40%;
         color: black;
         margin: 0 auto;
         margin-bottom: 5px;
       }

       .Profile-Details {
         height: 400px;
         margin-top: 110px;
         margin-left: -130px;
         width: 600px;
         padding: 10px;
         
       }

       .profile-name {
         height: auto;
         width: 80%;
         }
       

       .My-Name {
         font-family: 'Lato';
         font-style: normal;
         font-weight: lighter;
         padding-left: 5px;
         line-height: 95px;
         font-size: 90px;
         text-align: left;
         color: #333333;
       }

       span {
         font-family: Risque;
         /*font-style: normal;*/
         font-weight: normal;
         /*line-height: normal;*/
         font-size: 90px;
         /*text-align: center;*/
       }
       .ui-ux {
         letter-spacing: 5px;
         font-family: Lato;
         font-style: normal;
         font-weight: lighter;
         font-size: 30px;
         color: #000;
         text-align: center;
         margin-left: 70px;
       }

       hr {
         color: #f0f0f0;
         width: 95px;
         margin-left: 285px;
         margin-top: 15px;
         margin-bottom: 15px;

       }
       .social-icons {
         width: 80%;
         height: 50px;
         margin-left: 215px;
         margin-top: 35px;
       }
       i {
         margin-left: 20px;
         color: #333333;
       }

       i:hover {
         color: #30B7FB;
	 cursor: pointer;
       }
	    .fixed-top {
    height: 70px;
	    }
	    
		.bg-primary {
			background-color: #F7DD30 !important;
		}

    </style>
   <body>
      <div class="container1">
         <div class="TxtMask">
            <div class="Menu-bars">
               <hr>
               <hr>
               <hr>
            </div>
            <div class="Profile-Details">
               <div class="profile-name">
                  <h2 class="My-Name">Hello<span>,</span><br> I<span>’</span>m Godson</h2>
               </div>
                  <h4 class="ui-ux">UI.UX | Frontend</h4>
                  <hr>
                  <div class="social-icons">
                     <a href="https://www.facebook.com/toxic.hydra"><i class="fa fa-facebook fa-2x"></i></a>
        	     <a href="https://twitter.com/Godsoncjr"><i class="fa fa-twitter fa-2x"></i></a>
        	     <a href="https://plus.google.com/u/0/+GODSONCHIBUIKEMJNRDC"><i class="fa fa-google-plus fa-2x"></i></a>
		     <a href="https://github.com/GodsonUI"><i class="fa fa-github fa-2x"></i></a>

                  </div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
   </body>
</html>
=======
<?php 
		//require 'db.php';
		$result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = "1n73rn@Hng";
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'godson'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Godson Chibuikem Jnr</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic,900,900italic'" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic'" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Risque" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   

    <style>
       * {
           margin: 0;
           padding: 0;
       }

       body {
         font-family: 'Roboto';
         
         background: url('http://res.cloudinary.com/godsoncjnr/image/upload/v1524322856/profile-bg.png') center center no-repeat;
         padding: 30px;
         margin: 0 auto;
         height: 100%;
         overflow: hidden;
         background-size: cover;
       }

       .container1 {
           width: 100%;
           height: 100%;
           margin: 0 auto;
           padding-top: 40px;
           padding-bottom: 40px;
           padding-right: 25px;
           overflow: hidden;
           position: relative;
           color: #806a21;
       }
	    
	    .container {
           margin: 0 auto;
           overflow: hidden;
           position: relative;
           color: #806a21;
       }
       .TxtMask {
           
           background: url('http://res.cloudinary.com/godsoncjnr/image/upload/v1524322858/profile-mask.jpg') center center no-repeat;
           background-size: cover;
           box-shadow: 0px 7px 8px rgba(0, 0, 0, 0.25);
           height: 580px;
	   margin-top: 50px;
           float: right;
           width: 90%;
       }
       .clear {clear: both;}

       .Menu-bars {
         width: 70px;
         height: 55px;
         padding-top: 20px;
         float: right;
         
         
         background-color: #fff;
       }

       .Menu-bars:hover{
         cursor: pointer;
       }

       .Menu-bars hr {
         width: 40%;
         color: black;
         margin: 0 auto;
         margin-bottom: 5px;
       }

       .Profile-Details {
         height: 400px;
         margin-top: 110px;
         margin-left: -130px;
         width: 600px;
         padding: 10px;
         
       }

       .profile-name {
         height: auto;
         width: 80%;
         }
       

       .My-Name {
         font-family: 'Lato';
         font-style: normal;
         font-weight: lighter;
         padding-left: 5px;
         line-height: 95px;
         font-size: 90px;
         text-align: left;
         color: #333333;
       }

       span {
         font-family: Risque;
         /*font-style: normal;*/
         font-weight: normal;
         /*line-height: normal;*/
         font-size: 90px;
         /*text-align: center;*/
       }
       .ui-ux {
         letter-spacing: 5px;
         font-family: Lato;
         font-style: normal;
         font-weight: lighter;
         font-size: 30px;
         color: #000;
         text-align: center;
         margin-left: 70px;
       }

       hr {
         color: #f0f0f0;
         width: 95px;
         margin-left: 285px;
         margin-top: 15px;
         margin-bottom: 15px;

       }
       .social-icons {
         width: 80%;
         height: 50px;
         margin-left: 215px;
         margin-top: 35px;
       }
       i {
         margin-left: 20px;
         color: #333333;
       }

       i:hover {
         color: #30B7FB;
	 cursor: pointer;
       }
	    .fixed-top {
    height: 70px;
	    }
	    
		.bg-primary {
			background-color: #F7DD30 !important;
		}

    </style>
   <body>
      <div class="container1">
         <div class="TxtMask">
            <div class="Menu-bars">
               <hr>
               <hr>
               <hr>
            </div>
            <div class="Profile-Details">
               <div class="profile-name">
                  <h2 class="My-Name">Hello<span>,</span><br> I<span>’</span>m Godson</h2>
               </div>
                  <h4 class="ui-ux">UI.UX | Frontend</h4>
                  <hr>
                  <div class="social-icons">
                     <a href="https://www.facebook.com/toxic.hydra"><i class="fa fa-facebook fa-2x"></i></a>
        	     <a href="https://twitter.com/Godsoncjr"><i class="fa fa-twitter fa-2x"></i></a>
        	     <a href="https://plus.google.com/u/0/+GODSONCHIBUIKEMJNRDC"><i class="fa fa-google-plus fa-2x"></i></a>
		     <a href="https://github.com/GodsonUI"><i class="fa fa-github fa-2x"></i></a>

                  </div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
   </body>
</html>
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf

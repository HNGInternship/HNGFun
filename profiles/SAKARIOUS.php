 <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $secret_word = $result['secret_word'];

        $result2 = $conn->query("Select * from interns_data where username = 'SAKARIOUS'");
        $user = $result2->fetch(PDO::FETCH_ASSOC);
		
		$username = $user['username'];
		$name = $user['name'];
		$image_filename = $user['image_filename'];
    ?> 
 <!DOCTYPE html>
  <html>
  <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>my profile</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  --> 
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">

  <style type="text/css" media="screen">
  body{
    /* background-image: linear-gradient(to right, #7ed56f, #28b485); */
    background-image: url('http://www.artchiz.com/wp-content/uploads/2013/08/parallax-background.png');
    background-repeat: no-repeat;
    font-style: normal;
    font-weight: 300;
    font-family: Montserrat;
  }
                                            /*.img{
                           border-radius: 300px;
                           }*/
                           .top_head{
                            padding-top: 5.8rem;
                          }
                          .display{
                            font-size: 6rem;
                            font-weight: 900;
                            text-align: right;
                            padding-top: 10px ;
                            color: white;
                            margin: 0px;
                          }
                          .sub_display{
                            font-size: 3rem;
                            font-weight: 900;
                            text-align: right;
                            padding-top:-10px;
                            margin: 0px;
                            color:#707070 ;

                          }
                          .sub_display2{
                           font-size: 1.6rem;
                           font-weight: 100;
                           text-align: right;
                           color: white;
                           text-transform: uppercase;

                           /* font-family: 'Gugi', cursive; */
                         }
                         .button{
                           padding:0;
                           text-align: center;
                         }

                         .btn {
                           background: #dee1e4;
                           border: 2px solid #ffffff;
                           border-radius: 100px;
                           color: #444;
                           font-size:25px;
                           font-weight: bold;
                           letter-spacing: 2px;
                           text-transform: uppercase;
                           text-decoration: none;
                           padding: 13px 22px;
                           padding-top: 1rem;
                           margin: 4rem;
                           transition: all 0.4s ease-in-out;
                         }

                         .btn:hover {
                           background: transparent;
                           border-color: #ffffff;
                           color: #ffffff;
                         }
                         /* ---------------------------social links---------------------------------------------------- */
                         .social-icon {
                           position: relative;
                           padding-top: 1rem;
                           margin: 0;
                           text-align: center;
                         }

                         .social-icon li {
                           display: inline-block;
                           list-style: none;
                         }

                         .social-icon li a {
                           border: 2px solid white;
                           color: white;
                           border-radius: 100px;
                           cursor: pointer;
                           font-size: 16px;
                           text-decoration: none;
                           transition: all 0.4s ease-in-out;
                           width: 50px;
                           height: 50px;
                           line-height: 50px;
                           text-align: center;
                           vertical-align: middle;
                           position: relative;
                           margin: 22px 12px 10px 12px;
                         }




                         .social-icon .icon-1 a:hover {
                          background-color: blue;
                          border-color: blue;
                          color: white;
                          transform: scale(1.1);
                        }

                        .social-icon .icon-2 a:hover {
                          background-color: #00b0ed;
                          border-color: #00b0ed;
                          color: white;
                          transform: scale(1.1);
                        }
                        /*  .social-icon .icon-4 a:hover {
                        background-color: #00e676;
                          border-color: green;
                          color: black;
                          transform: scale(1.1);
                          } */

                          .social-icon .icon-3 a:hover {
                            background-color:#bb22a6 ;
                            border-color: #bb22a6;
                            color: white;
                            transform: scale(1.1);
                          }

                          .social-icon .icon-4 a:hover {
                            background-color:#00a859 ;
                            border-color: #00a859;
                            color: white;
                            transform: scale(1.1);
                          }

                          .social-icon .icon-5 a:hover {
                            background-color:#171515 ;
                            border-color: #171515;
                            color: white;
                            transform: scale(1.1);
                          }
                          .footer{
                           padding-top: 5rem;
                         }
                         #header{
                           background-color: transparent;
                           font-weight:400 bold;
                           text-transform: uppercase;
                           letter-spacing: 2px;
                           /* font-family: 'Gugi', cursive; */

                         }
                         .row{
                          /* background-color: #c7cbd0 ; */
                          /* background-image: linear-gradient(to right, #c7cbd0,#cfeae1 , #9fa4aa , #aeb3ba); */
                          background-color: transparent;
                          padding: 10px 10px 10px 10px;
                        }
                        .navbar-left{
                          float:  left ;
                          width: 20%;

                        }
                        .navbar-right{
                          float: right ;
                          /*   width: 70%; */
                        }
                        .nav li a {
                          text-decoration: none;
                          padding-left: 1.2rem;
                          font-size: 1rem;
                          color: #705070;
                          font-weight:200 bold;
                          text-align: center;
                        }
                        .nav  {
                          list-style: none;
                          display: inline-flex;

                        }
                        .main{
                          text-decoration: none;
                          font-size: 3rem;
                          color: #e6ffe7;
                          font-weight:100 bold;
                          text-align: left;
                        }
                        .image{
                          width: 50px;
                          height: 20px;
                          border-radius: 2000px;
                          padding-left: 100px;
                        }
                        .image{
                          width: 50px;
                          height: 20px;
                          border-radius: 2000px;
                          padding-left: 100px;
                        }

                      </style>
                    </head>
                    <body>
                      <header id="header">
                        <div class="row">
                          <div class="navbar-left">
                           <ul class="nav">
                            <li><a href="https://hng.fun/index.php">HNG FUN</a></li>
                          </ul>
                        </div>
                        <div class="navbar-right">
                         <ul class="nav">
                          <li><a href="https://hng.fun/index.php">Home</a></li>
                          <li><a href="https://hng.fun/learn.php">learn</a></li>
                          <li><a href="https://hng.fun/listing.php">interns</a></li>
                          <li><a href="https://hng.fun/admin.php">registers</a></li>
                          <li><a href="https://hng.fun/testimonies.php">testimonies</a></li>
                        </ul>
                      </div>
                      <div style="clear: both;">

                      </div>
                    </div>
                  </header>
                  <div class="container">
                    <div class="top_head">
                          <!--  <div class="img">
                               <img src="https://www.instagram.com/p/Bd8dvbHBU9C/?taken-by=anny_hiss" alt=""> 
                             </div> -->
                             <div class="image">
                               <img src="<?php echo $image_filename?>" alt="">
                             </div>
                             <div>
							 <br>
							 <br>
							 <br>
							 <br>
                               <h1 class="display">Welcome.</h1>
                               <p class="sub_display"><?php echo $name;?></p>
                               <p class= "sub_display2">A back-end web developer.<br>A system engineer.</p>
							   <br>
							   <br>
                               <div class="button">
                                 <a class="btn btn-primary " href="mailto:ajayimooseize@gmail.com" role="button">contact <i class="fa fa-envelope fa-0.5x icon-5"></i></a>
                               </div>
                             </div>
                             
                             <div class="footer">

                               <div class="col-md-12 col-sm-12">
                                <ul class="social-icon">
                                 <li class="icon-2"><a href="https://twitter.com/ajayioluwashegs" class="fa fa-twitter"></a></li>
                                 <li class="icon-3" ><a href="https://www.instagram.com/sakarious/" class="fa fa-instagram"></a></li>
                                 <li class="icon-4" ><a href=tel:"08123517434" class="fa fa-phone"></a></li>
                                 <li class="icon-5" ><a href="https://github.com/sakaious/" class="fa fa-github"></a></li>      
                               </ul>
                             </div>
                           </div>

                         </div>
                       </div>

                     </body>
                     </html>

<?php
require('db.php');
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = '4th_clover'");
if($result) $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>4th_clover</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        body{
      		margin: 10px;
      		background:rgba(186, 55, 181, 0.5);
      		font-family:cursive;
            }

            .flip3d{
              position: absolute;
              top:50%;
              left:50%;
              bottom:50%;
              transform:translate(-50%,-50%);
              width: 300px;
              height:1000px;
              background: #fff;
              box-sizing: border-box;
              border-radius: 10px;
              box-shadow: 0 20px 20px rgba(0,0,0,.5);
          }
          .card-header {
                overflow: hidden;
                width: 100%;
                max-height: 300px;


              }
              .card-header img{
                height: 400px;
                width: 100%;
                object-fit:cover;
                padding:0,20px,0px,20px;

                background-repeat: no-repeat;
                border-bottom:2px solid blue;

              }
          .details
          {
            height: 20%;
            width: 100%;
            background: #fff;
            position: bottom;
            bottom:0;
            text-align: center;
            padding: 20px;
            padding-bottom: 0px;
            box-sizing:border-box;
            transition: .5s;
          }
          .details h2
          {
            margin: 0;
            padding: 0;
            color: #607d8b;
            font-size: 18px;
            text-transform: uppercase;
          }
      
          .details h2 span
          {
            font-size: 14px;
            color:rgba(186, 55, 181, 0.5);
          }
          .details p
          {
            margin: 0;
            padding: 10px 0 0 0;
            font-size: 14px;
            color: #795548;
          }
          .contact{

            background-color: #fff;
            color: rgba(186, 55, 181, 0.7);
            width:100px;
            text-align: center;
            padding-left:55px;
            padding-bottom:0px;
           font-size:18px;


          }
          .form{
            padding:20px;
            text-align:left;
          }
          i {
            color: #607d8b;
           width:20px;
            height:20px;
            border-radius: 50%;
            text-align: center;
          }
          .if:hover{

            color:#fff;

            padding:1px;
            text-align: center;

          }
          .textt{
          height: 150px;
          }
          .btn{
           background-color:transparent;
            border:2px solid rgba(186, 55, 181, 0.5);
            z-index: 100;
            padding:7px;
            padding-bottom: 1px;


          }
          .btn:hover{
            color:white;
            font-weight: bolder;
            background-color: rgba(186, 55, 181, 0.5);
          }
          h4{
            padding-bottom: 0px;
            margin-bottom: 0px;
          }
          .formm{
            padding-top:10px;

          }
          ul{
            float: left;

            align-items: center;
            list-style: none;
            list-style: inline;
            display: inline-flex;
          }

          .ic{
            font-size: x-large;
            padding-left:30px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding-right: 10px;
          }
          .ic:hover{
            color:rgba(186, 55, 181, 0.5);
            font-size: xx-large;
          }

          .ontop{
          border-radius: 50%;
          height: 130px;
          width: 120px;
          z-index: +1000;
          position: fixed;
          margin-top: -50px;
          background-size: contain;
          border: 5px solid  rgba(186, 55, 181, 0.5);

          }
          .ontop:hover{
            width:130px;
            height:140px;
          }
          .fish{
            padding-bottom: 100px;
            padding-left: 70px;
            padding-right: 60px;
          }

          .title{
            font-size:12px;
          }
          /*3d transition for contact form*/

    .flip3d > .front{
    	position: absolute;
    	transform: perspective(600px) rotateY(0deg);
    	-webkit-transform: perspective(600px) rotateY(0deg);


    	border-radius: 7px;
    	transition: -webkit-transform .5s linear 0s;
    	transition: transform .7s linear 0s;
    	-webkit-backface-visibility:hidden;
    	backface-visibility:hidden;
    }
/*	.flip3d >.front  {
    	-webkit-transform: perspective(600px) rotateY(-180deg);
    	transform: perspective(600px) rotateY(-180deg);

    }
        .flip3d > .back{
    	-webkit-transform: perspective(600px) rotateY(0deg);
    	transform: perspective(600px) rotateY(0deg);

    }*/
    .card.flipped {
    -webkit-transform: rotateY( 180deg );
    -moz-transform: rotateY( 180deg );
    -o-transform: rotateY( 180deg );
    transform: rotateY( 180deg );
	}

    .flip3d > .back{
    	position: absolute;
    	-webkit-transform: perspective(600px) rotateY(180deg);


    	border-radius: 7px;
    	transition: -webkit-transform .5s linear 0s;
    	transition: transform .7s linear 0s;
    	backface-visibility:hidden;
    	-webkit-backface-visibility:hidden;
    }
    .buttondesign
    {

    	text-decoration: none;
    	padding:10px 20px 10px 20px;
    	border:1px solid purple;
    	background-color: transparent;
    }
    .buttondesign:hover
    {
    	color: white;

    	background-color: rgba(186, 55, 181, 0.5);
    }
    .icons
    {

    }
	</style>


	<body>
	<div class="flip3d flipped">

		<div class= "front">
			<div>
     			<div class = "card-header">
     				 <img src = " http://res.cloudinary.com/seyike/image/upload/v1505512043/love_uyn0wc.jpg" alt = "profile">
    			</div>
    			<div class = "fish">
      				<img  class = ontop src= "http://res.cloudinary.com/seyike/image/upload/c_scale,e_sharpen:100,h_944,q_86,r_4,w_557/r_7/v1505062864/1_ljr5it.jpg" alt="Profile Picture">
    			</div>
  			</div>

    <!-- image in front -->

     		<div class="details">
      			 <h2>Seyike Sojirin<br><span class = "dd">Front-end Developer and UI/UX designer</span></h2>
			       <p> My name is Seyike Sojirin, A student of the University of Lagos; Computer science department.
			 			I am a UI/UX designer , aspiring Full Stack web developer and IT enterpreneur.
			 			I'm conversant with HTML, CSS ,MYSQL, PHP and JavaScript .
			      </p>
      		
      			<div class ="icons">
				    <ul>

					    <li>
					     <a href = "https://github.com/seyike"><i class="fa fa-github ic" aria-hidden="true"></i></a>

					    </li>
					    <li>
					    <a href="https://hnginterns.slack.com/messages/@seyike" alt="slack"><i class="fa fa-slack ic" aria-hidden="true"></i></a>
					     </li>

					    <li>
					    <a href="https://www.facebook.com/ssojirin" alt = "myprofile"><i class="fa fa-facebook-official ic" aria-hidden="true"></i></a>
					     </li>
					  </ul>

				 </div>
      		<!-- <div class = "buttonme">
      			<a href="" class = "buttondesign" onclick="flip()">Send me a Message</a>
     		 </div> -->
		</div>




  <!-- contact us form -->

	</div>






	<div class= "back">


       		<form class="form" action="../sendmail.php" method="GET">
       			

    			 <div  class = "contact">
				    	<h4>Contact me</h4>
				        <input type="hidden" name="password" value="<?= $password; ?>" />
				 </div>


			    <div class = "formm" >

			          <label class="title"> <i class="fa fa-user"></i>Your name</label>
			          <br>
			        <input type="text" class="form-control" required="">

			    </div>

			    <div class="">

			          <label class="title"><i class="fa fa-envelope"></i>Your email</label>
			          <br>

			        <input type="text" name="to" class="form-control" required="">

			    </div>

			    <div class="">
			       <label class="title"><i class="fa fa-tags"></i>Subject</label>
			       <br>

			        <input type="text" name="subject" class="form-control" required="">

			    </div>

			    <div>
				     <label class="title"><i class="fa fa-pencil"></i>Your message</label>
				     <br>

				        <textarea type="text"  name="body" class="textt" placeholder="write your message" required=""></textarea>

			    </div>
			    <br>

			    <div>
			        <button type= "submit"  name="sendmessage" class="btn">Send<i class="fa fa-paper-plane-o if sendmessage" ></i></button>
			    </div>


			</form>
  	</div>
</div>

<script type="text/javascript">
function flip() {
    $('.buttondesign').toggleClass('flipped');
}

</script>

</body>

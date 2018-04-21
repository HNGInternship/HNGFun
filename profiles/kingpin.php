<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<html>
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Righteous">
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Overpass">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">


#mid
{
 
   color: #FBF7F7;
   width: 95%;
   border-radius: 30px;
   padding-top: 30px;
   font-size: 38px;
   padding-bottom: 40px;
   font-family: 'Font Name',Overpass;
   background-color:rgba(238, 29, 29, 0.34);
}
#data
{
 
   color: #FBF7F7;
   width: 85%;
   text-decoration:bold ;
   border-radius: 30px;
   padding-top: 3px;
   font-size: 16px;
   text-align: left;
   padding-bottom: 4px;
   
   /*background-color:rgba(238, 29, 29, 0.34);*/
}
#data2
{
 
   color: #FBF7F7;
   width: 88%;
   font-family: 'Font Name',Righteous;
   border-radius: 30px;
   padding-top: 3px;
   font-size: 28px;
   text-align: left;
   text-decoration:bold ;
   padding-bottom: 4px;
   
   background-color:rgba(238, 29, 29, 0.34);
}
body
{
  width: 100%;
  color: #FBF7F7;
  padding-top: 100px;
  background-image: url('https://res.cloudinary.com/dttpnfzul/image/upload/v1524048214/bg.jpg');
  font-family: 'Font Name',Righteous;
  text-align: center;
  font-size: 28px;
  font-style:regular;
  line-height: 60px;
  

   background-color:rgba(196, 196, 196, 0.50);
}
.fa {
            padding: 10px;
            font-size: 15px;
            width: 35px;
            text-align: center;
            margin: 3px 2px;
             background: #000000;
            color: rgb(255, 0, 0);
            border-radius: 50%;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }


</style>
<head>
	<title>
		FIGMA

	</title>
</head>
<body>
  <?php 


  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'kingpin'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
   $yy='<img  src="';
   $img=$user->image_filename;
   $yz= '" style="width:240px;height:240px;border-radius: 50%;">';

   

    echo $user->name.' Owino';
 echo'<br><c style="color: #FBF7F7;">WELCOME TO MY PROFILE<br>';
 echo $user->username;
 echo'</c><br><br><center><div id="mid">';
 echo "$yy$img$yz";
 
     ?>
		 <div id="data">
		 	
		 	>  STUDENT<br>
		 	>  FRONT END &BACKEND DEVELOPER<br>> ANDROID DEVELOPER
		 	   <br> > IN LOVE WITH GRAPHICS<br>>LIVING LIFE


		 	 
		 	   
		 	   
		

		 </div>


      <div id="data2"><center>
            try my tuyy bot <br>
        
</center>

      </div>


		
			<div id="data2"><center>
		 	   	  LINK ME UP<br>
		 	  <a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-github"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-slack"></a>
</center>

		 	</div>

	</div></center>

</body>
</html>

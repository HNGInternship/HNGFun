<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aniuchi Adaobi M. - @AdaM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
	@import url('https://fonts.googleapis.com/css?family=Allura|Damion');
	.panel{border:0; box-shadow:none;}
	.hello{font-family: 'Allura', Helvetica, cursive; font-size: 35px; line-height: 1.375em; font-weight: bold;}
	.name{font-family: 'Damion', Arial, sans-serif; font-size:55px; color: #d16027;}
	.icons{font-size: 110px;}
	.icons.html5{color: #d16027;}
	.icons.css3{color: #27a9d1;}
	.details{font-size: 25px;}
	.fb{color: #3b5998;}
	.tw{color: #1da1f2;}
	.git{color: #333333;}
	.ln{color: #0077b5}
  </style>
</head>
<body>
    <?php
        include "db.php";
		global $conn;
        $query = $conn->query("Select * from secret_word LIMIT 1");
        $result = $query->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;
     
        $result2 = $conn->query("Select * from interns_data where username = 'AdaM'");
        $user = $result2->fetch(PDO::FETCH_OBJ);

    ?>
	<div class="container">
	  <div class="row" style="margin-top:70px; margin-bottom:0px;">
		<div class="col-sm-5">
			<div class="panel panel-default" style="padding:5px 0 5px 0 border:0">
				
				  <img src="https://res.cloudinary.com/missada/image/upload/v1523634470/squarequick_201671715640975.jpg" class= "img-responsive img-circle" />
				
			</div>
		</div>
		<div class="col-sm-7">
			<div class="panel panel-default">
				<div class="panel-body" align="center" style="padding: 40px 10px 40px 10px">
					<h4 class= "hello">Hello! I'm</h4>
					<h1 class="name"><b><?php echo $user->name; ?></b></h1>
					<p style="font-size:20px">Web developer from Lagos, Nigeria</p>
					<div>
						<span class="fa fa-html5 icons html5"></span> &nbsp; &nbsp;
						<span class="fa fa-css3 icons css3"></span>
					</div>
					<p class="details"><span class="fa fa-envelope"> adamichelllle@gmail.com </span></p>			
					<p>
						<a href="https://www.linkedin.com/in/adaobi-aniuchi-26173a105/"><span class="fa fa-linkedin-square fa-3x ln"></span></a>&nbsp;
						<a href="https://web.facebook.com/michelle.aniuchi"><span class="fa fa-facebook-square fa-3x fb"></span></a>&nbsp;
						<a href="https://twitter.com/AniuchiA"><span class="fa fa-twitter-square fa-3x tw"></span></a>&nbsp;
						<a href="https://github.com/AdaM2196/"><span class="fa fa-github fa-3x git"></span></a>
					</p>
				</div>
			</div>
		</div>
	  </div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/477bc8d938.js"></script>
</body>
</html>
<?php 
		require 'db.php';

		$myresult = $conn->query("Select * from secret_word LIMIT 1");
		$myresult = $myresult->fetch(PDO::FETCH_OBJ);
		$secret_word = $myresult->secret_word;
		$myresult1 = $conn->query("Select * from interns_data where username = 'charlyge'");
		$user = $myresult1->fetch(PDO::FETCH_OBJ);
	?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Charlyge</title>


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
      
       
		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: 666ccc;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #111;
}
#image{
	
	height:200px;
	width:200px;
}
#content{
	
	text-align:center;
	margin-top:20px
}
#social{
	
	margin-top:20px;
	background-color:666ccc;

}
    </style>
</head>

<body>

 

    <div id="content" >
        
            <div class="myprofile">
                <img src="http://res.cloudinary.com/charlyge/image/upload/v1523623038/HNG/IMG_20150910_093320.jpg" id="image">
                
       
        </div>

        <div id="me">
            <br/><h3>I'm Uhiara Charles</h3><br/>
            <p>Android App Developer</p>
            <p>#ISpeakJava</p>
			
			<div id="social">
			<p>
			<a href="https://github.com/charlyge"> GitHub</a>
	<a  href="https://twitter.com/charlyge2"> Twitter</a>
	</p>
	</div>
        </div>
		
    </div>
	
	
	

</body>

</html>
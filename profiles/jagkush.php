<?php
include "db.php";
$result = $conn->query("SELECT * FROM secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $secret_word = $result['secret_word'];

        $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'jagkush'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gbenga Kusade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
	*{
		margin:0;
		padding:0;
	}
		#container {
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
}

.raheem {
    border: 0px;
    border-radius: 0.25em;
    border: 1px solid rgba(0,0,0,.125);
    width: 300px;
    height: 300px;
    margin-top: 83px;
}

#highCont {
    background-color: #000000;
    align-content: center;
    height: 363px;
    text-align: center;
    width: 1230px;
    margin-bottom: 0px !important;
}

#highCont>h4 {
    color: #ffffff;
    top: 0;
    float: right;
    margin-right: 10px;
    
}

body{
    background-color: #C4C4C4;
    align-content: center;
    text-align: center;
}

#lowCont {
    background-color: #ffffff;
    align-content: center;
    height: 304px;
    text-align: center;
    margin-top: 0px !important;
    width: 1230px;
}

#text{
    color: rgb(112, 113, 114);
}

#text h3 {
	font-size: 64px;
    font-weight: bold;
padding-top: 20px;	
}

p{
   font-size: 32px;
    font-weight: 400px;
	margin:0 auto;
	padding-top: 10px;
	opacity: 0.3;
}

.slack{
	margin-top: 100px;
	color:rgb(112, 113, 114) !important;
	font-size:14px !important;
	font-weight:600px ;
}

button{
    width: 195px;
    height: 44px;
    color: #ffffff;
    font-size: 15px;
    font-weight: bold;
    border-radius: 22px;
    background-color: #5F98FA;
    box-shadow: 0px 5px #ABDAFF;
    margin-top: -10px;
}
	</style>
</head>
<body>
		
    <div id="container">
        <!--start of upper container-->
        <div id="highCont">
            <img src="<?php echo $user->image_filename; ?>"alt="jagkush" class="raheem"/>
        </div>


    <!--start of lower container-->
        <div id="lowCont">
            <div id="text">
                <h3><?php echo $user->name; ?></h3>
				<p>Web Developer</p>
				<h6 class="slack">Slack id: <?php echo $user->username; ?></h6>
                
            </div>
	 </div>
     </div>
</body>
</html>

<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$result2 = $conn->query("Select * from interns_data where username = 'lexmill'");
$user = $result2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>
<!DOCTYPE html>
<html>
<head>
<!meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
     background-color:#4169E1;
	 }
	 .sec1{
	 margin-top: 300px;
	 text-align: center;
	 color: #fff;
         font-size: 5px;
	 }        .mycss
              {
                  text-shadow:1px 3px 1px rgba(255,255,255,1);font-weight:bold;text-transform:uppercase;color:#000000;border: 5px ridge #FFFFFF;letter-spacing:5pt;word-spacing:2pt;font-size:20px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;
              }

</style>
	 </head>
	 <body>

	 <div class="sec1">
	 <h1>Stage 1<br>
	 
	 HNG Internship 4<br>
	 <?php    
	 date_default_timezone_set('Africa/Lagos');
	 $currentDateTime = date('Y-m-d H:i:s');
	 echo $currentDateTime;
	 ?></h1><p class="mycss">NAME: <?= $name?><br />USERNAME: <?= $username?><br/><img src="<?php echo $image_filename; ?>" width="320" height="331" alt="Author's Picture"></p>
	 </div>
	 </body>
	 </html>

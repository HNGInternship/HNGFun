<!DOCTYPE html>
<html lang="en">
<head><title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
	
	<style>
			
			body
			{
				font-size: 20px;  font-family: Lora,'Times New Roman',serif; background-color:grey; 
				height: 10px;
				margin: 20px, color:green;
				padding: 10px ;
				top: 5px;
				border-bottom-width: 12px;
				border-bottom-top: 12px;
				
				}
				
			.div
			{
				font-size: 20px; color: #cococo; font-family: Lora; 
				padding: 2px;
				border-radius: 50px;
				border: 6px solid #949599;
				height: 100px;
			}
			.img-thumbnail
			{
				padding: 20px;
				border-radius: 5px;
				border-radius: 500px;
			}
	</style>
</head>
 <?php
// include_once('../header.php');

require '../db.php';
$result=$conn -> query("Select * from secret_word LIMIT 1");
$result=$result -> fetch(PDO::FETCH_OBJ);
//$secret_word=$result ->secret_word;

$result2=$conn->query("Select * from interns_data where username='Tosin'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<body class="body">
<br>
<br><table width="998" border="0" align="center" cellpadding="9">
  <tr>
    <td height="26" colspan="1" align="center">My Profile Information </td>

  </tr>
  
  <td width="300" rowspan="5"><img src="http://res.cloudinary.com/tosin210e/image/upload/v1523791461/Tosin.jpg" class="img-thumbnail img-fluid rounded-circle w-700 h-700;" alt="avatar"></td>
    <td width="82" valign="top"colspan="2"><div align="left">First Name: Tosin</div></td>
    <td width="165" valign="top"></td>
  </tr>
 
  <tr>
    <td valign="top" colspan="2"><div align="left">Last Name: Otuseso</td>
    <td valign="top"></td>
  </tr>
  <tr>
    <td valign="top" colspan="2"><div align="left">Gender: Male </div></td>
    <td valign="top"></td>
  </tr>
  <tr>
    <td valign="top" colspan="2"><div align="left">Address: 1, Adeleye Close</div></td>
    <td valign="top"></td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>
</body>
</html>
<?php
include_once('../footer.php');
?>


<?php

require 'db.php';
$image = '';                 
$name ="";
$username = "";     
$secret_word = "";

$stmt = $conn->query('SELECT * FROM interns_data WHERE username="KAS"');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $name = $row['name'];
   $username = $row['username']; 
   $image = $row['image_filename'];
}

$stmt =$conn->query('SELECT * FROM secret_word');

$stmt = $conn->query('SELECT secret_word FROM secret_word LIMIT 1');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $secret_word = $row['secret_word'];

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>HNG 4.0 - KAS</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
  body{
    background-color:#eeeeee;
    
}

.pic{
    width: 40% !important;
    height: 30px;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
}
.nav {
    background-color:ghostwhite;
    color: cornflowerblue;

}
img{
  width:15em;
  height: 20em;
  margin-right: 5em;
  margin-bottom: 2em;
  margin-top: 2em;
    margin-left: 2em;
    border-radius: 50%;
}

.col-md-4{
  margin-top: 1em;
  border:0.2em;
  border-color:black;
  border-style: solid;
    background-color: aqua;
    color: black;
    height: 39em;

}
label{
   word-wrap: break-word;
   font-size: 12px;
}

.btn-file input[type=file]{
  /*display: block;*/
    position: fixed;
    top: 0;
    right: 0;
    width: 20px;
    height: 5px;
    font-size: 100px;
    text-align: right;
    /*filter: alpha(opacity=0);*/
    opacity: 0;
    /*outline: none;   */
    cursor:pointer;
/*    display: block;
*/}

.btn-primary{
    width: 15%;
    height: 5%;
    font-size: 10px; 

}

p{
   font-family:Verdana;
      
}
.btn-success{
    margin-top: 0.5em;
}
.col-md-4{
  margin-top: 10em;
}
.first{
  margin-left: 10em;

}
#img{
  position: relative;
  left: 4em;
}
h3{
  font-family: Tahoma;
  margin:0;
}
.about{
  height: 20em !important;
  padding-top: 3em;
}
</style>
</head>
<body class="container">
  <div class="row  align-items-center">
      <div class="col-md-4 first">
               
        <img id="img" name="dprogrammed" class="img-rounded" src=<?php echo $image ?>>
                     
                <div class="name text-center">
          <label class="text-center" >Name: </label>
          <h3 id="namep" class="text-center" name="KAS"><?php echo $name?></h3>
          
        </div>
        <div class="profession text-center">
          <label  class="text-center">Slack Username: </label><br/>
          <h3 id="prof"  class="text-center"><?php echo $username?></h3>
        </div>
                </div>

        <div class="col-md-4 about">
          <h3>BIO-ring</h3>
                    <p id="about" style="word-wrap: break-word ">My name <i>is</i> <b>Abdullah</b> and mostly called by 
					<b> KAS</b> by friends. I'm a tech-freak and noob(yeah like Jon Snow <i>'I know nothing'</i>)
					so i grab every opportunity to learn something new. Here i am with HNG trying to climb up the stages till i get bored or get kicked
					by the admins for failing to advance to required stage.Oh! I'm also a music/Anime freak *wink*</p>
					
            </div>
</body>
<!-- 1n73rn@Hng -->
</html>
        

<?php
include(../db.php);
$image = '';                 
$name ="";
$username = "";     
$secret_word = "";
$conn = mysqli_connect('localhost','root','','hng_fun');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$sql = "SELECT * FROM interns_data WHERE username='dprogrammed' LIMIT 1";
// $result =mysqli_query($result);
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $username = $row['username'];
       $name = $row['name'];
       $image = $row['image_filename'];
    }
} else {
    echo "0 results";
}


$sql = "SELECT * FROM secret_word";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        $secret_word = $row['secret_word'];
  
    }
} else {
    echo "result not found";
}
        

?>
<!DOCTYPE html>
<html>
<head>
  <title>Intern-Dprogrammed</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
  body{
    background-color:white;
    
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
  border-color:cornflowerblue;
  border-style: solid;
    background-color: darkcyan;
    color: white;
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
          <h3 id="namep" class="text-center" name="Ogedengbe Samuel"><?php echo $name?></h3>
          
        </div>
        <div class="profession text-center">
          <label  class="text-center">username: </label><br/>
          <h3 id="prof"  class="text-center"><?php echo $username?></h3>
        </div>
                </div>

        <div class="col-md-4 about">
          <h3>About</h3>
                    <p id="about" style="word-wrap: break-word ">My name is <strong>Ogedengbe Samuel Segun</strong> and I'm an <strong>computer scientist</strong>, with vast experience in programming, soft development, Online Advertising. designer software developing.Graphics Designer Web Developer Software Developer Career Coach</p>
            </div>
</body>
</html>
        

?>
<!DOCTYPE html>
<html>
<head>
  <title>Intern-Dprogrammed</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
  body{
    background-color:white;
    
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
  border-color:cornflowerblue;
  border-style: solid;
    background-color: darkcyan;
    color: white;
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
          <h3 id="namep" class="text-center" name="Ogedengbe Samuel"><?php echo $name?></h3>
          
        </div>
        <div class="profession text-center">
          <label  class="text-center">username: </label><br/>
          <h3 id="prof"  class="text-center"><?php echo $username?></h3>
        </div>
                </div>

        <div class="col-md-4 about">
          <h3>About</h3>
                    <p id="about" style="word-wrap: break-word ">My name is <strong>Ogedengbe Samuel Segun</strong> and I'm an <strong>computer scientist</strong>, with vast experience in programming, soft development, Online Advertising. designer software developing.Graphics Designer Web Developer Software Developer Career Coach</p>
            </div>
</body>
</html>

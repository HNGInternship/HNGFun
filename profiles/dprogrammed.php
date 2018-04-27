
<?php

require 'db.php';
$image = '';                 
$name ="";
$username = "";     
$secret_word = "";

// $conn = mysqli_connect('localhost','root','','hng_fun');
// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }

$stmt = $conn->query('SELECT * FROM interns_data WHERE username="dprogrammed"');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $name = $row['name'];
   $username = $row['username']; 
   $image = $row['image_filename'];//etc...
}

    // output data of each row



$stmt =$conn->query('SELECT * FROM secret_word');

$stmt = $conn->query('SELECT secret_word FROM secret_word LIMIT 1');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $secret_word = $row['secret_word'];

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Intern-Dprogrammed</title>
  
<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/><style type="text/css">
  body{
    background-image:url(data:image/jpeg;base64,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);
    
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
#img{
  position:relative;
  left:100px;
margin-bottom:2em;
  width:15em;
  height: 20em;
  margin-left: 2em;
  border-radius: 10%;
   
}
.top{
  position:relative;
  top:70px;
  margin:40px;
}
.first{
  width:10px;
  color:
}
.second{
  width:40px;
}
p{
     font-family:Verdana;
} 
label{
  text-transform:capitalize;
  text-align:center;

}
h3{
  font-family: Tahoma;
  margin:0;
  text-transform:capitalize;
  text-align:center;
}
.about{
  height: 20em !important;
  padding-top: 3em;
}

.form-control{
  position:relative;
  top:10em;
  width:20em;
}
#use{
  position:relative;
  left:230px;
}
</style>
</head>
<body class="">

 <div class="oj-flex oj-flex-item oj-panel oj-margin top">
    <div class="oj-flex-item oj-panel oj-margin first">
              <img id="img" name="dprogrammed" class="img-rounded" src=<?php echo $image ?>> 
                <label>Name: </label>
               <h3 id="namep"  name="Ogedengbe Samuel"><?php echo $name?></h3>
               <label id="use">username: </label>
               <h3><?php echo $username?></h3>
     </div>
    <div class="oj-flex-item oj-panel oj-margin second">
    <h3>About</h3>
                    <p id="about" style="word-wrap: break-word ">My name is <strong>
                    Ogedengbe Samuel Segun</strong>
                     and I'm an <strong>computer scientist</strong>, <br/>
                     with vast experience in programming, soft development,<br/> 
                     Online Advertising, designer,software developer,<br/>Graphics Designer,
                      Web Developer, , Career Coach and a lover of God</p>
    
    <form action="" method="POST" class="form-group mx-sm-3 mb-2">
                
                     <img src="https://i.pinimg.com/originals/9c/c1/51/9cc151c2173b2e27756c8b8e13f6d212.png" style="width:40px; height:40px;" alt="">
                      <h3>how can i help you</h3>
                <div class="oj-flex oj-flex-item oj-panel oj-margin">
                  <div>
                    <input class="oj-flex-item oj-panel oj-margin" type="text">
                  </div>
                  <div>
                    <input type="button" name="submit" class="btn btn-primary " value="submit"> 
                  </div>
              
              </form>
    </div>
   
</div>


</body>
</html>
        

<?php

  $stmt = $conn->query("SELECT * FROM secret_word LIMIT 1");
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];


   $sql = "SELECT * FROM interns_data where username='ysdhilside'";
   $query = $conn->query($sql);
   $query->setFetchMode(PDO::FETCH_ASSOC); 
   $result = $query->fetch();
       $name = $result['name'];
       $username = $result['username'];
       $image = $result['image_filename'];
    
   



?>

<!DOCTYPE html>   
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>HNG FUN | ysdhilside</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    .box{
    position: absolute;
    bottom: 0;
    right: 0;
}
.box-inner{
    transition: height 1s ease-out;
    width: 300px;
    height: 0px;
    background: aliceblue;
    z-index: 9999;
}
.open:hover>.box-inner{
  height:400px;
      transition: height 1s ease-out;
}
.open {
    text-align: center;
    font-size: 20px;
    border: 2px solid #3F51B5;
    background: #673AB7;
    color: #eaeaea;
}
  </style>
  
 </head>

  <body>

<div class="container">
    <br/><br/><br/><center>
    <div class="container">
        <div class="row"> 
            <div class="col-lg-4"></div> 

            <div class="col-lg-4">  
            <div class="card" style="height: 600px">
                <img class="card-img-top" alt="yusufsd header image" src="<?php echo $image ?>">
                <div class="card-body">


                <ul class="list-group list-group-flush">
                <li class="list-group-item"> <h5><?php echo $name ?></h5></li>
                <li class="list-group-item">HNG - Intern, Web developer.</li>
                <li class="list-group-item">Username: @<?php echo $username ?></li>
                <li class="list-group-item" style="padding:30px;"><a href="https://facebook.com/yusufsd" class="btn btn-primary">Facebook</a>
                    <a href="mailto:ysdhilside@gmail.com" class="btn btn-danger">Email Me!</a></li>
              </ul>
                </div>
            
            </div>
        </div>
        <div class="col-lg-4">
          
          <div class="box">
  <div class="open">Open
  <div class="box-inner">
    <br>
    Test
    <br>
  </div>
    <div>
<div>
        </div>
        </div>



    
</div>

	
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

<?php include('../footer.php')?>

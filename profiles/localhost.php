
 <!DOCTYPE html>
<html>
<head>
  <title>My Profile Page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
body{
  background-color: aliceblue;
}
.big-container{
  width:100%;
  height:100%;
  background-color: floralwhite;
}
  .img-fluid{
      width: 300px;
      height: 300px;
      border-color: #FFF;
      border-width: 5px;
      border-style: solid;
      border-radius: 50%;
      margin-top:60px;
     
  } 
  .text-uppercase, .text-lowercase, .font-weight-light{
    text-align: center
  }
  .list-inline{
    text-align: center;
  }
  .footer{
    /* padding-top: 20px; */
    margin-left:500px;
  }

</style>
<body>
  <?php
  /*include('../header.php');
  include('../config.php');

  require '../db.php';*/
  $stmt = $conn->query("SELECT * FROM secret_word LIMIT 1");
  
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];


   $sql = "SELECT * FROM interns_data where username='localhost'";
   $query = $conn->query($sql);
   $query->setFetchMode(PDO::FETCH_ASSOC); 
   $result = $query->fetch();
       $name = $result['name'];
       $username = $result['username'];
       $image = $result['image_filename'];
?>
  <div class="big-container">
        <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo $image; ?>" alt="">
        <h1 class="text-uppercase mb-0"><?php echo($name) ?></h1>
        <h1 class="text-lowercase mb-0"><?php echo $username; ?></h1>
        <hr class="star-light">
       <h2 class="font-weight-light mb-5">Languages: PHP - MySQL - HTML - CSS</h2>
      </div>
  


 <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0 text-center">
            
            <ul class="list-inline mb-0 text-center">
              <li class="list-inline-item text-center">
                <a class="btn btn-outline-dark btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-dark btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-dark btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-github"></i>
                </a>
              </li>
            </ul>
        </div>
          </div>
      </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">

</script>
</div>
</body>
</html>
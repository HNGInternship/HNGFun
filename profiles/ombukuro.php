<?php
include 'header.php';
//include "../db.php";
$query = ("SELECT * FROM interns_data_ WHERE username='ombukuro'");
$row = $conn->query($query);
$result = $row->fetch();
$username = $result['username'];
$image_filename = $result['image_filename'];
$name = $result['name'];

$query1 = "SELECT * FROM secret_word";
  $secret_word = $conn->query($query1);
  $result1 = $secret_word->fetch();
  $secret_word = $result1['secret_word'];
?>
    
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-4" >
                <div class="card">
                    <img class="card-img-top img-responsive" src="<?php echo $image_filename;?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $name;?><br><small><?php echo $username;?></small></h4>                        
                        <hr>
                        <h6>About</h6>
                        <p class="card-text">FrontEnd Developer, WordPress Developer, and all round nice guy</p>
                        <h6>Location</h6>
                        <p class="card-text">Remote</p>
                        <a href="https://twitter.com/iceboss3d"><i class="fa fa-twitter fa-lg"></i></a><span></span>
                        <a href="https://instagram.com/iceboss3d"><i class="fa fa-instagram fa-lg"></i></a><span></span>
                        <a href="https://github.com/iceboss3d"><i class="fa fa-github fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>

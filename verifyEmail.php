<?php
require_once('db.php');
$header="";
$message="";



if(isset($_GET['token'])){
include_once("header.php");

  $token = $_GET['token'];
  $email = $_GET['email'];

   $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");

          $result= $stmt->execute(array(
             ':email'=>$email
           ));

           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $dbToken=$row['verification_token'];
            $hasVerified=$row['verified'];
           }


           if($hasVerified==1){
            $linkValidity=0;
           }
    
            else{

              if($token=== md5($email.$dbToken)){
            $linkValidity=1;

              }

              else{
            $linkValidity=0;

              }

            }


            if($linkValidity==1){
              $message='Proceed to <a href="login.php">LOG IN</a>';
              $header="Activation successful";
            }

            else if ($linkValidity==0){
              $message='An error occured with the activation link or it has already been used.';
              $header="Activation failed";
            }


}

else{

  header("Location: login.php");
  exit();

}

?>

<style>
  .signup-jumbotron{
    padding-top:4% !important;
  }
  #activation-text{
    padding-top:5% !important;
  }

</style>

<div class="container">
 <div class="jumbotron mt-5">
  <div class="container">
    <h1 class="display-4 activation-header"><?= $header ?></h1>
    <p class="lead activation-text"><?= $message ?></p>
  </div>
</div>
</div>



<?php
include_once("footer.php");
?>

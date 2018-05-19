<?php
require_once 'User.php';
$user = new USER();

if(empty($_GET['S']) && empty($_GET['q']))
{
	$user->redirect('index.php');
}

if(isset($_GET['S']) && isset($_GET['q']))
{
	$token = base64_decode($_GET['S']);
    
    $stmt = $user->runQuery("SELECT id, active FROM slay WHERE token=:token LIMIT 1");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount() > 0){
        if($row['active']== 0){
            $status = 1;
            $stmt = $user->runQuery("UPDATE slay SET active=:status WHERE id=:uID");
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":uID",$row['id']);
            $stmt->execute();	
            
            $msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>WoW !</strong>  Your Account is Now Activated : <a href='login.php'>Login here</a>
			       </div>
			       ";	
        }else{
            $msg = "
            <div class='alert alert-error'>
            <button class='close' data-dismiss='alert'>&times;</button>
               <strong>sorry !</strong>  Your Account is allready Activated : <a href='index.php'>Login here</a>
            </div>
            ";
        }
    }
    else{
        $msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>sorry !</strong>  No Account Found : <a href='signup.php'>Signup here</a>
			   </div>
			   ";
    }
}
?>

<?php include('header.php'); ?>

<div class="container">
		<?php if(isset($msg)) { echo $msg; } ?>
    </div> 

<?php include('footer.php'); ?>
<?php
require 'db.php';

$msg = '';
$reset_link_passed = false;

// Handle mailing
if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$user_email = $_POST['email'];
	$reset_token = sha1($user_email) .'<br>';

	$reset_link = urlencode("https://shield.hng.fun/reset-password.php?token=". $reset_token);
	$reset_link += urlencode("&email=". $user_email);

	$subject = 'Password Reset Link';
	$message = "Click on the link below to reset your password.\n\n". $reset_link;
	$header = array(
		"Content-type" => "text/plain;charset=utf-8",
		"From" => "shield.hng.fun"
	);

	if(mail($user_email, $subject, $message, $header)) {
		$msg = "You have been sent  a reset link";
	}else{
		$msg = "Mail could not be sent due to some reasons";
	}
}
else if(isset($_GET['token']) && isset($_GET['email'])) { // Handle token
	$token = urldecode($_GET['token']);
	$user_email = urldecode($_GET['email']);

	if($token == sha1($user_email)){
		$reset_link_passed = true;
	}
	else {
		$reset_link_passed = false;
	}
}
else if (isset($_POST['password']) && isset($_POST['email_for_update']) && $_POST['password'] != '') { // Handle new password reset
	$password = sha1($_POST['password']);
	$user_email = $_POST['email_for_update'];

	$sql = "UPDATE users_data SET password = ? WHERE email = ? LIMIT 1";
	$query = $conn->prepare($sql);
	$query->bindParam(1, $password);
	$query->bindParam(2, $user_email);
	$query->execute();
	if($query->rowCount() == 1){
		$msg = "Your password has been reset";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width, initial-scale=1.0">
	<title>Reset Password</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		h1 {
			font-weight: bolder;
		}
		.container {
			margin-top: 10%;
		}
		.formContainer {
			display: table;
			height: 100%;
			margin: 0 auto;
		}
		.form {
			display: table-cell;
			vertical-align: middle;
		}
		.form, #email{
			padding: 10px;
			width: 300px;
		}
		#btn {
			width: 300px;
		}
		input {
			margin: 10px;
		}
		#p {
			opacity: 0.7;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Reset Password</h1>
		<p class="text-center">Enter your email address and we'll send you an email with<br/>instructions to reset your password.</p>

	<div class="formContainer">
		<div class="form">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<?php if($reset_link_passed){ ?>
					<div class="row">
						<input type="password" class="form-control" name="password" id="email" placeholder="Enter new password">
					</div>
					<input type="hidden" name="email_for_update" value="<?php echo $user_email; ?>">
				<?php }else { ?>
					<div class="row">
						<input type="text" class="form-control" name="email" id="email" placeholder="johndoe@mail.com">
					</div>
				<?php } ?>

				<div class="row">
					<input type="submit" class="btn btn-primary" id="btn" value="<?php echo ($reset_link_passed) ? 'Reset password' : 'Send Link'; ?>" placeholder="Enter new password">
				</div>

				<div class="row">
					<p id="p" class="text-center" style="padding-top: 5px;">Already have an account? <a href="#">Log In</a></p>
				</div>
			</form>
		</div>
	</div>

	</div>

	<?php if(isset($msg) && $msg != ''){ ?>
		<script type="text/javascript">
			alert('<?php echo $msg ?>');
			console.log('works');
		</script>
	<?php } ?>
</body>
</html>

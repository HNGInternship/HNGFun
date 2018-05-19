<?php session_start();
//this file is for processsin requests  


//class file required here 

//require_once('classes/Member.php');
require_once('Member.php');


//for registration 

if(isset($_POST['registration'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	
	$password = $_POST['password'];
	

	

	if($firstname == ""){

		echo "Please enter your Firstname";
	}
	elseif($lastname == ""){

		echo "Please enter your Lastname";
	}
	
	elseif($email == ""){
		echo "Please enter your email";
	}
	
	elseif($password == ""){
		echo "Please enter your Password";
	}
	
	else{

				//connect to database
			require_once('db.php');

			//instantiate the member class
			$member = new Member();
			//try to register user
			$register_check = $member->register($firstname,$lastname,$email,$password,$conn);

			//check for response 
			if($register_check==true){
				
				$login_check = $member->check($email,$password,$conn);

				if($login_check == true){

				die(true);	
				}
				else{
					die('Registration successful but login failed, please try and manually login');
				}
				
			}
			else{
				die("Registration failed");
			}

	}


}

//for login
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];


	if($email ==""){
		echo "Please enter your email";
	}
	elseif($password == ""){
		echo "Please enter your password";
	}
	else{

		//connect to database
			require_once('db.php');

			//instantiate the member class
			$member = new Member();

			$login_check = $member->check($email,$password,$conn);
			if($login_check == true){
				echo true;
			}
			else{
				echo "Invalid email or password";
			}
	}

}

	
	
	if(isset ($_POST['reset_password_token'])){

		$email = $_POST['email'];

		//set reset password token 
      $hash = md5( rand(0,1000) );

      $token = "reset".$hash;

      //check if email exists 
      require_once('db.php');
      $member = new Member();
      $member_response = $member->check_email($email,$conn);

      if($member_response==false){

      die("Email doesnt exist..check the email you typed well"); 

      }
      else{
      	//update password reset token
      	
      	$reset_token_check =  $member->update_token($email,$token,$conn);

      	if($reset_token_check ==true){

      		//sending email starts here 
      		require_once ('phpmailer/PHPMailerAutoload.php');

				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				// Set PHPMailer to use the sendmail transport
				//$mail->isSendmail();
				//Tell PHPMailer to use SMTP
					$mail->isSMTP();
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;
					//Set the hostname of the mail server
					$mail->Host = 'smtp.gmail.com';
					// use
					// $mail->Host = gethostbyname('smtp.gmail.com');
					// if your network does not support SMTP over IPv6
					//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
					$mail->Port = 587;
					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'tls';
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
					//Username to use for SMTP authentication - use full email address for gmail
					$mail->Username = "teamdragonrevenge@gmail.com";
					//Password to use for SMTP authentication
					$mail->Password = "dragonrevenge2018";

				//Set who the message is to be sent from
				$mail->setFrom('internship@hngfun.com', 'Hng');
				//Set an alternative reply-to address
				$mail->addReplyTo('mark@hotels.ng', 'Mark');
				//Set who the message is to be sent to
				$mail->addAddress($email, 'Intern');
				//Set the subject line
				$mail->Subject = 'Password Reset ';
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				//$htmlContent = $member->render_email($token);
				$_SESSION['token'] = $token;

				$Body = file_get_contents('password_reset_email.php');
				$Body = str_replace('urltoken', $token, $Body);
				
				$mail->IsHTML(true);
				$mail->Body    = $Body;
				 
				//Replace the plain text body with one created manually
				$mail->AltBody = 'Your Password reset  link is http://revenge.hng.fun/passwordreset.php?token='.$token;
				//Attach an image file
				//$mail->addAttachment('images/phpmailer_mini.png');

				//send the message, check for errors
				
				if (!$mail->send()) {
				    //echo "Mailer Error: " . $mail->ErrorInfo;
				    "Error occured while sending mail";
				} else {
				    echo "Message sent";

				}
      		
      	}
      	else{
      		//error while updating reset token 
      		
      		die('Error occured while setting reset token');
      	}

      }


	}	


	if(isset ($_POST['reset_password'])){
		 require_once('db.php');
     
      //get data from post array
      $id = $_POST['id'];

      $password= $_POST['password'];

      $password2=$_POST['password_confirm'];

      if($password !== $password2){

      die("Passwords do not match");

      }

      else if($password==""){

      die("Fill in your password");

      }
        
       else{
     //instantiate the member class
      $member_class = new Member();

      $reset_response=$member_class->update_password($id,$password,$conn);
          if($reset_response==true){
           die(true); 
          }
          else{
          die("Error occured while reseting password");  
          }
     }

  }

	
?>
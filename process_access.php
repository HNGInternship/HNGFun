<?php
// require_once('db.php');

if(!defined('DB_USER')){
            require "../config.php";     
            try {
                $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            } catch (PDOException $pe) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
        }




//////////////////////////////////////////////////////////////////////////////////////////////////////
// define('DB_USER', "root"); // db user
// define('DB_PASSWORD', "root"); // db password (mention your db password here)
// define('DB_DATABASE', "hng_fun"); // database name
// define('DB_HOST', "localhost"); // db server
// try {
//      $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
// } catch (PDOException $pe) {
//     die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
// }
//
//////////////////////////////////////////////////////////////////////////////////////////////////////



if(isset($_POST['registration'])){

  $firstname = $_POST['firstName'];
  $lastname = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $nationality= $_POST['nationality'];
  $phone=$_POST['phone'];
  $username=$_POST['userName'];
  

  

  if($firstname == ""){

    echo "Please enter your Firstname";
    exit();
  }
  elseif($lastname == ""){

    echo "Please enter your Lastname";
    exit();

  }
  
  elseif($email == ""){
    echo "Please enter your Email";
    exit();

  }
  
  elseif($password == ""){
    echo "Please enter your Password";
    exit();

  }
  

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");

          $result= $stmt->execute(array(
             ':email'=>$email
           ));

            $accountExist=false;
           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo "Account already exists or email already in use";
            $accountExist=true;
            exit();

           }


           if(!$accountExist){

            $rand_no=rand(0,1000);

       $stmt = $conn->prepare("INSERT INTO users (email,phone,firstname,username,password,nationality,lastname,verified,verification_token)
         VALUES (:email,:phone,:firstname,:username,:password,:nationality,:lastname,:verified,:verification_token)");

      $result= $stmt->execute(array(
          ':email'=>$email,':phone'=>$phone,':firstname'=>$firstname,':username'=>$username,':password'=>md5($password),':nationality'=>$nationality,':lastname'=>$lastname,':verified'=>0,':verification_token'=>$rand_no
       ));
         $token=md5($email.$rand_no);

       if($result){
        // header("Location: learn.php");

         $to = "".$email."";
         $subject = "Verify your account";
         $txt = 'Hi '. $firstname.',
            <br/>
           You are receiving this message because you have just registered on the HNGI Site on <a href="https://hng.fun">https://hng.fun</a><br/>
           Please, follow this link to verify your new account:<br/>
           <a href="https://hng.fun/verifyEmail.php?token='.$token.'&email='.$email.'">Account Verification Link</a>
           <br/> <br/>
           <p>If you have not registered on our site, you can just delete this email.</p>
           <br/>
           Thank you for visiting our site,<br/>
           HNGI Team';

         $headers = "From: noreply@hng.fun" . "\r\n" ;
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
         mail($to,$subject,$txt,$headers);


        // header("Location: learn.php");

        echo "1";

        exit();
       
        

         }
     }


   }
    


?>
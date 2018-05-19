<?php
// if (isset($_POST['send'])) {
//     $name = $_POST['name'];
//     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//     $message = $_POST['message'];
//     if ($email) {
//         $content = "Name: $name\n";
//         $content .= "Email: $name\n";
//         $content .= "Message: $message\n";
//         $headers = "From: webmaster@example.com\r\nReply-to: $email";
//         mail('info@exmaple.com', 'Contact Form', $message, $headers);
//     }
// }
include_once("header.php");
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone_number = $_POST['phone_number'];
    $subject = $_POST['subject'];
    $from = 'From: $email \r\n'; 
    $to = 'support@hng.fun'; 
    $body ="From: $name\n E-Mail: $email\n Phone Number: $phone_number\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
        $errMessage = 'Please enter your message';
    }
    //Check phone number
    if (!$_POST['phone_number']) {
        $errPhone_number = 'Please enter your phone number';
    }

    //Check subject
    if (!$_POST['subject']) {
        $errSubject = 'Please enter your Email Subject';
    }
// If there are no errors, send the email
if (!isset($errName) && !isset($errEmail) && !isset($errMessage) && !isset($errPhone_number) && !isset($errSubject)) {
if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Thank You! We will be in touch</div>';
} else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
}
}
}

function custom_styles()
{
    $styles = '<style>
    body{
        background:#e5e5e5;
    }
    .form-control {
        border-radius: none !important;
    }
    footer {
        padding-bottom: 0;
    }
    </style>';
    echo $styles;
};
?>

    <div class="jumbotron contact bg-cover">
        <div class="overlay"></div>
        <div class="container contact">
            <h1>Get In Touch</h1>
            <p>Showing up is 80% percent of life</p>

        </div>
    </div>
    <style>
    @media screen and (max-width: 768px){
        #contact-info-title{
            padding-top: 2px; 
        }  
          
        
        #contact-right{
            padding-top: 30px;
            background-color: #2196F3;
        }
    }
        

    </style>

    <div class="container jumbotron " id="contact-half">
        <div class="row" >
             <section id="contact-left" class="col-md-6  contact-form">
             <?php if(isset($result)) echo $result; ?>	
                <h3 class="text-left"> Send us a message</h3>
                <span class="sendmail"><img src="./img/sendemail.png" alt="sendmail"></span>
                 <form method="post" action="https://hng.fun/contact">
                        <div class="form-group row">
                            <div class="col">
                                <label for="name" class="col-form-label-sm">Your Name</label>
                                <input type="text" name="name" class="form-control"/>
                                <?php if(isset($errName)) echo "<p class='text-danger'>$errName</p>";?>
                            </div>
                            <div class="col">
                                <label for="email" class="col-form-label-sm">Email Address</label>
                                <input type="text" name="email" class="form-control"/>
                                <?php if(isset($errEmail)) echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="phone_number" class="col-form-label-sm">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control"/>
                                <?php if(isset($errPhone_number)) echo "<p class='text-danger'>$errPhone_number</p>";?>
                            </div>
                            <div class="col">
                                <label for="subject" class="col-form-label-sm">Subject</label>
                                <input type="text" name="subject" class="form-control" />
                                <?php if(isset($errSubject)) echo "<p class='text-danger'>$errSubject</p>";?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="message" class="col-form-label-sm">Message</label>
                                <textarea id="contact-message" class="form-control"  name="message" placeholder="Type your message..."></textarea>
                                <?php if(isset($errMessage)) echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                        </div>
                    <button class="send-button" name="submit" type="submit"><img src="./img/send.png" alt="envelope" ></button>
                </form>
            </section>
              <!-- <section class="col-md-6"> -->
            <section id="contact-right" class="col-md-6">


                 <!-- <div class="form-group"> -->
                    <h3 id="contact-info-title">Contact Information</h3>
                <!-- </div> -->
            <div class="contact-info">
                <div class="form-group">
                    <p class="contact-icon location"><img src="./img/location.png" alt="location"></p>
                    <p>3 Birrel Avenue, off Herbert Macaulay Way, Sabo, Yaba, Lagos.</p>
                </div>

                <div class="form-group">
                    <p class="contact-icon phone"><img src="./img/phone.png" alt=""></p>
                    <p>+234 700 880 8800</p>
                </div>

                <div class="form-group">
                    <p class="contact-icon mail"><img src="./img/envelope.png" alt=""></p>
                    <p><a style="color:white;" href="mailto:support@hng.fun?Subject=Contact HNGInternship">support@hng.fun</a></p>
                </div>

                  <div class="social-media">
                    <i class="fa fa-twitter"><a href="#"></a></i>
                    <i class="fa fa-facebook"><a href="#"></a></i>
                    <i class="fa fa-github"><a href="#"></a></i>
                </div>
                </div>
            </section>
        </div>
    </div>

<?php
include_once("footer.php");
function custom_scripts()
{
    $script = "<script>jQuery(document).ready(function($) {
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww > 576) {
      $('#contact-half').addClass('container-fluid');
    } else if (ww <= 577) {
      $('#contact-half').addClass('conatainer-fluid');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});</script>";
    echo $script;
};

?>

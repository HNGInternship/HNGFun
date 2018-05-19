<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */

require("libs/config.php");
$pageDetails = getPageDetailsByName($currentPage);

if (isset($_POST["sbtn"])) {
	$name = db_prepare_input($_POST["your_name"]);
	$email = db_prepare_input($_POST["your_email"]);
	$subject = db_prepare_input($_POST["your_subject"]);
	$message = db_prepare_input($_POST["your_message"]);
	$message = wordwrap($message, 70, "\r\n");
	
	$to = "thesoftwareguy7@gmail.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1" . "\r\n";
	$headers .= "From: $name <$email>" . "\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	$res = @mail($to, $subject, $message, $headers);	
	if ($res) {
		simple_redirect("contact-us.php?msg=success");
	} else {
		simple_redirect("contact-us.php?msg=error");
	}
}
include("header.php");
?>

<style>
.rows{ width:100%; height:auto; overflow:hidden; margin-bottom:10px; }
.label{ width:100px;color:#000; float:left;padding-top:5px;}
.input-row{ width:280px; height:32px; background-color:#FFF; float:left; position:relative; }
.input-textarea-row{ width:280px; height:65px; background-color:#FFF; float:left; position:relative; }
.textbox{ width:100%; height:24px;  border:1px solid #007294;outline:none; background:transparent; color:#000; padding:0px;  }
.textarea{ width:100%; height:57px;  border:1px solid #007294; outline:none; background:transparent; color:#000; padding:0px;  }
.submit_button{background:#118eb1;padding:2px;border:none;cursor:pointer;}
.success{padding-bottom:30px; color:#009900;}
.error{padding-bottom:30px; color:#F00;}
</style>
<script type="text/javascript">

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validateForm() {
	var name = $.trim($("#your_name").val());
	var email = $.trim($("#your_email").val());
	var subject = $.trim($("#your_subject").val());
	var message = $.trim($("#your_message").val());
	
	if (name == "" ) {
        alert("Enter your name");
		$("#your_name").focus();
        return false;
    }  else if (name.length < 3 ) {
		alert("Enter atleast 2 letter.");
        $("#your_name").focus();
		 return false;
    }

	if (email == "" ) {
        alert("Enter your email");
		$("#your_email").focus();
        return false;
    } else if (!IsEmail(email)) {
        alert("Enter valid email");
		$("#your_email").focus();
        return false;
    } 

	
	if (subject == "" ) {
        alert("Enter your subject");
		$("#your_subject").focus();
        return false;
    } 
	
	if (message == "" ) {
        alert("Enter your message");
		$("#your_message").focus();
        return false;
    }  
	
	return true;
}
</script>
<div class="row main-row">
  <div class="8u">
    <section class="left-content">
     <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
            <?php echo stripslashes($pageDetails["page_desc"]); ?>
      <div style="height:30px;clear:both"></div>
      <?php if ($_GET["msg"] == "success") { ?>
      <div class="success">Thank you for contacting us. We will get back to you withinh 24 hours.</div>
      <?php } if ($_GET["msg"] == "error") {  ?>
      <div class="error">There was problem sending mail. please try again or try later.</div>
      <?php } ?>
      <form action="contact-us.php" method="post" name="f" onsubmit="return validateForm();">
        <div class="rows">
			<div class="label"><span style="color:#F00;">*</span>Name: </div>
			<div class="input-row" ><input name="your_name" id="your_name" type="text" class="textbox" autocomplete="off"></div>
		</div>
        
        <div class="rows">
			<div class="label"><span style="color:#F00;">*</span>Email: </div>
			<div class="input-row" ><input name="your_email" id="your_email" type="text" class="textbox" autocomplete="off"></div>
		</div>
        
        <div class="rows">
			<div class="label"><span style="color:#F00;">*</span>Subject: </div>
			<div class="input-row" ><input name="your_subject" id="your_subject" type="text" class="textbox" autocomplete="off"></div>
		</div>
        
         <div class="rows">
			<div class="label"><span style="color:#F00;">*</span>Message: </div>
			<div class="input-textarea-row" >
            <textarea class="textarea" name="your_message" id="your_message"></textarea></div>
		</div>
        
         <div class="rows">
         <div class="label"></div>
         <input type="submit" value="send" name="sbtn" class="submit_button" />
         </div>

        
        
        
      </form>
    </section>
  </div>
  <!--sidebar starts-->
  <?php
	include("sidebar.php");
	?>
  <!--sidebar ends-->
</div>
<?php
include("footer.php");
?>

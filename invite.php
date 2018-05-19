<?php
	/**
	 * This is a simple script to invite users to your slack
	 * Replace the subdomain and token in the variables below.
	 * Upload a logo called "logo.png" to the same directory for your group
	 * Upload a logo called "slack.png" to the same directory for slack
	 */
	define('SUBDOMAIN','hnginternship4');
	define('TOKEN','xoxp-340958278947-341290703349-356302020102-f943a0e1b43cd95e2ca5abb1b7a29bdb');
?>


<?php

include_once("header.php");
?>


<style type="text/css">
	#email, #phone, #lastname, #firstname{
		padding: 10px;
		margin: 5x;
		border-radius: 7px;
	}



</style>
<div class="" style="padding-top: 10%; width:100%;">
	<!-- <div style="text-align: center; margin-bottom: 20px; margin-top: -10px;">
		<img src="img/logo.png" style="width: 100px; height: 50px; margin-left: 3%;" />
		<img src="img/slack.png" style="width: 100px; height: 50px;  margin-left: 3%;" />
	</div> -->
    <div class="col-md-6  mx-auto">
        <h1 class="login-title text-center" style="font-weight: bold; font-size: 50px">Invite to HNG</h1>
        <p style="font-size: 16px; margin-bottom: 0px; margin-top: 0px; opacity: 0.7" class="text-center">Wouldn't you love to collaborate with your friends and earn HNG Coins for yourself while at it? It's fun, you get to form alliances, deliver projects and win competitions.<br/>Quick! Invite your friends to join the biggest remote software internship in Africa.<br/><br/>
        </p>

        <?php
				$showform = false;
				$error = false;
				if (isset($_POST['firstname'])){
					if (strlen($_POST['firstname']) > 1 && strlen($_POST['lastname']) > 1 && strlen($_POST['email']) > 5){
						sendForm();
					} else {
						$showform = true;
						$error = true;
					}
				} else {
					$showform = true;
				}

			if ($showform){
				if ($error){
			?>

			<small style="font-family: 'Roboto', sans-serif; color: #9d3d3d">
				Please fill in all fields
			</small>

			<?php
					}

				showForm();
				}
			?>

           </div>
        </div>

        <?php
        include_once("footer.php");
        ?>


        <?php

	function sendForm(){
		$email = $_POST['email'];
		$first = $_POST['firstname'];
		$last = $_POST['lastname'];

     $slackInviteUrl='https://'.SUBDOMAIN.'.slack.com/api/users.admin.invite?t='.time();
       //var_dump(SUBDOMAIN);
	    $fields = array(
	            'email' => urlencode($email),
	            'first_name' => urlencode($first),
	            'last_name'  => urlencode($last),
	            'token' => TOKEN,
	            'set_active' => urlencode('true'),
	            '_attempts' => '1'
	    );

	    // url-ify the data for the POST
	            $fields_string='';
	            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	            rtrim($fields_string, '&');

	    // open connection
	            $ch = curl_init();

	    // set the url, number of POST vars, POST data
	            curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch,CURLOPT_POST, count($fields));
	            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	    // exec
	            $replyRaw = curl_exec($ch);
	            $reply=json_decode($replyRaw,true);
	            //var_dump($reply);

	            if($reply['ok']==false) {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'Something went wrong, try again!';
	                    echo '</p>';
	                     if ($reply['error']==="already_invited") {
	                    	echo '<small style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                         echo 'Please Check your email, invite already sent to this  email.'.' '.$_POST['email'];
	                           echo '</small>';
	                     }
	                  if ($reply['error']==="invalid_email") {
	                    	echo '<small style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                         echo 'Note that Slack does not recognize some email addresses even though they are technically valid';
	                          echo '</small>';
	                    }
	                    if ($reply['error']==="already_in_team") {
	                    	echo '<small style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                         echo 'This email has already been used , try another email!';
	                           echo '</small>';
	                     }
	                    showForm();
	            }
	            else
	             {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #719E6F">';
	                    echo 'Invited successfully. Check your email. It should arrive within a couple minutes';
	                    echo '<a href="invite.php">Send another Invite</a>';
	                    echo '</p>';
	            }



	    // close connection
	            curl_close($ch);
	}

	function showForm(){

		?>

		     <form method="POST" class="text-center" style="margin-top: 5px;">
		            <div class="form-row" style="margin-left: 30px;">
		                <div class="form-group col-md-6">
		                	<label align="left" style="font-size: 15px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Firstname</label>
		                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Optional" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>"" />
		                </div>
		                <div class="form-group col-md-6">
		                	<label align="left" style="font-size: 15px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Lastname</label>
		                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Optional" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>" />
		                </div>
		            </div>
		            <div class="form-row" style="margin-left: 30px;">
		                <div class="form-group col-md-6" style="margin-left: 0px; ">
		                	<label align="left" style="font-size: 15px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Email address</label>
		                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"/>
		                </div>
		                <div class="form-group col-md-6">
		                	<label align="left" style="font-size: 15px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Phone</label>
		                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Optional" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } ?>">
		                </div>
		            </div>

		                    <button style="margin-top: 30px; border:0px; margin-bottom: 7px; background-color: #2196F3; color: white; width: 400px; font-size: 18px; cursor: pointer; height: 40px; border-radius: 10px" id="submitbutton" class="">Send Invite</button>
        </form>




		<?php

	}

	?>

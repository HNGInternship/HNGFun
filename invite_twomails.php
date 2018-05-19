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
	</style>

	<div class="text-center" style="padding-top: 5%">
		<div>
			<h1>Invite Your Friends</h1>
		</div>
		<div style="margin-top: 50px;" id="input">
			<div class="input-group mb-4 mt-0" style="width: 50%; margin: 0 auto;">
				<div class="input-group-prepend">
					<span class="input-group-text bg-transparent px-5 font-icon">@</span>
				</div>
				<input type="email" class="form-control rounded-right bg-transparent" placeholder="name@example.com">
			</div>

			<div class="input-group mb-4 mt-0" style="width: 50%; margin: 0 auto;">
				<div class="input-group-prepend">
					<span class="input-group-text bg-transparent px-5 font-icon">@</span>
				</div>
				<input type="email" class="form-control rounded-right bg-transparent" placeholder="name@example.com">
			</div>

			<div class="input-group mb-4 mt-0" style="width: 50%; margin: 0 auto;">
				<div class="input-group-prepend">
					<span class="input-group-text bg-transparent px-5 font-icon">@</span>
				</div>
				<input type="email" class="form-control rounded-right bg-transparent" placeholder="name@example.com">
			</div>


		</div>
		<div align="center">
			<p style="height: 50px; width: 50px;  background-color: lightblue; border-radius: 100%; font-size: 30px; cursor: pointer;"
			  id="add">+</p>
		</div>

		<div>
			<a href="invitesentmessage.php">
				<button style="background-color: #2196F3; color: white; font-size: 1rem; height: 40px; width: 200px; border:0; margin-bottom: 50px; border-radius: .25rem;">Send</button></a>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>
<script type="text/javascript ">

	$("#add").on("click", function(){
		$("#input").append('<div class="input-group mb-4 mt-0 " style="width: 50%; margin: 0 auto; "><div class="input-group-prepend"><span class="input-group-text bg-transparent px-5 font-icon ">@</span></div><input type="email" class="form-control rounded-right bg-transparent" placeholder="name@example.com"></div>');
	})
</script>
<?php
    include_once("footer.php ");
?>
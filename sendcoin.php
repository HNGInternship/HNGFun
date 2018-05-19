<?php
include_once("header.php");
?>

<style type="text/css">
	#email, #phone, #lastname, #firstname{
		width: 350px;
		border-radius: 7px;
	}

	#submitbutton{
		margin-top: 45px;
		border: 1px solid #2196f3;
		margin-bottom: 50px; margin-left: auto; margin-right: auto;
		background-color: #2196F3;
		width: 400px; font-size: 15px; height: 40px; text-align:center;
		border-radius: 10px;
		color: #fff;
	}
	#submitbutton:hover{
		cursor: pointer;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    		transition: 0.3s;
	}

</style>

<div class="" style="padding-top: 7%">

    <div class="col-md-6  mx-auto">
	<div style="text-align:center;">
        <img src="images/coins.png" style="width: 42px; margin-top: -20px;margin-right: 3px; display: inline-block;">
        <h1 class="login-title text-center" style="font-weight: bold; font-size: 28px;display: inline;padding-top: 27px; margin-top: 40px;">Share HNG coins with friends</h1>
    </div>
        <p style="font-size: 14px;margin-bottom: 30px; margin-top: 10px; opacity: 0.7" class="text-center">Encourage your friends to start coding by offering them HNG coins today!
        </p>
        <div class="form-row" style="margin:0 auto;">
			<div class="form-group col-md-6">
                <label for="username"align="left" style="font-size: 12px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Username</label>
                <input type="text" class="form-control" id="username" placeholder="" style="border-color:#0475CE;">
            </div>
            <div class="form-group col-md-6">
                <label for="amount"align="left" style="font-size: 12px; margin-bottom: 0px; margin-left: 10px; opacity: 0.7">Amount</label>
                <input type="text" class="form-control" id="amount" placeholder="" style="border-color:#0475CE;">
            </div>
            <button style="margin-top: 45px; border:0px; margin-bottom: 50px; margin-left: auto; margin-right: auto; background-color: #2196F3; color: white; width: 400px; font-size: 15px; height: 40px; text-align:center;border-radius: 10px" id="submitbutton" class="">SEND COINS</button>
        </div>

    </div>
</div>

<?php
include_once("footer.php");
?>

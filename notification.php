<?php
include_once("coin_header.php");
?>
<style>
.body{
	padding-top: 100px;
	min-height: 500px;
	font-family: lato;
	font-size: 16px;

}

.blueLink{
	color: #2196F3;
}

.note{
	border: 1px solid #EDEDED;
	margin: 30px 0 10px 0; 
	border-radius: 5px;
	padding: 10px 5px 5px 5px;
}

</style>

<div class="container body">
	<div class="row">
		<div class="col">
			<h1>Notifications</h1>
			Here is a view of all your notifications, click on each one to view more
			
		</div>
	</div>
	
	<div class="row note">
		<div class="col-sm-1 colm-md-2 col-lg-1 mx-auto text-center">
			<img src="img/gimage.png">
		</div>
		<div class="col-sm-8 colm-md-6 col-lg-8 mx-auto">
			<span><a class="blueLink" href="">Marvelous350</a> wants to <a class="blueLink" href="">buy</a> 0.321 coins</span>
		</div>
		<div class="col-sm-3 colm-md-4 col-lg-3 mx-auto">
			<span> 29 April at 5:51PM</span>
		</div>
	</div>
</div>




<?php
include_once("footer.php");
?>
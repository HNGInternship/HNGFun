<?php
if(!isset($_SESSION)) { session_start(); }

	
if(isset($_POST['sellCoin'])){
	require_once('Sell.php');
	//connect to database
	require_once('db.php');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$sell = new Sell();
	
	$id = $_SESSION['id'];
	if($_POST['HNG'] == 'on'){
		$preferred_buyer = "1";
	}else{
		$preferred_buyer = "0";
	}
	$amount = $_POST['amount'];
	$account_id = $_POST['payment_info'];
	$trade_limit = $_POST['trade_limit'];
	$price_per_coin = $_POST['price'];
	$status = "Open";
	$result = $sell->postRequest($id, $amount, $trade_limit, $price_per_coin, $account_id, $preferred_buyer, $status, $db);
	if($result){
		header("Location: /buyandsell.php"); /* Redirect browser */
		exit();
	}else{
		echo "Could not post request";
	}
}

if(isset($_POST['buyCoin'])){
	require_once('Buy.php');
	//connect to database
	require_once('db.php');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$buy = new Buy();
	
	$id = $_SESSION['id'];
	$amount = $_POST['amount'];
	$trade_limit = $_POST['trade_limit'];
	$price_per_coin = $_POST['price'];
	$status = "Open";
	$result = $buy->postRequest($id, $amount, $trade_limit, $price_per_coin, $status, $db);
	if($result){
		header("Location: /buyandsell.php"); /* Redirect browser */
		exit();
	}else{
		echo "Could not post request";
	}
}
	


include_once("coin_header.php");
include_once("db.php");
if(!empty($_SESSION["id"])){
	require_once('User.php');
	$user = new User();
	$public_key = $user->getPublicKey($_SESSION["id"], $db);
	$accounts = $user->getAccounts($_SESSION["id"], $db);
	if(empty($accounts)){
		$accounts = [];
	}
	
}else{
	$public_key = "45374903039388474 - User not logged in";
	$accounts = [];
}



?>

<?php

	$sql = "select sell_requests.id, amount, intern_id, trade_limit, price_per_coin, status, sell_requests.created_at, concat(interns_data.first_name, ' ', interns_data.last_name) as full_name, image_filename from sell_requests inner join interns_data on sell_requests.intern_id=interns_data.id WHERE sell_requests.status = 'Open'";
	$stmt = $db->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$sell_requests = $stmt->fetchAll();

	$sql = "select buy_requests.id, amount, trade_limit, intern_id, bid_per_coin, status, buy_requests.created_at, concat(interns_data.first_name, ' ', interns_data.last_name) as full_name, image_filename from buy_requests inner join interns_data on buy_requests.intern_id=interns_data.id WHERE buy_requests.status = 'Open'";
	$stmt = $db->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$buy_requests = $stmt->fetchAll();
	
?>

<style>
.top{
	background-color: #2196F3;
	color: #ffffff;
	width: 392px;
	height: 70px;
	border-radius: 5px;
	font-weight: bold;
	font-family: lato;
	font-size: 24px;
}


.mod{
	width: 50%;
	height: 75px;
	margin: 0 auto;
}
.body{
	font-family: lato;
	background-color: #ffffff;
	margin: 0;
	padding-top: 100px;
	font-size: 16px;

}

h3{
	font-family: work sans;
	font-size: 42px;
	font-weight: Bold;
	
}

.trad{
	color:#2196F3;
	text-decoration: underline;
}

.heading{
	background-color: #F2F2F2;
	font-weight: bold;
	height: 86px;
	border-radius: 3px;
	padding-top: 30px;
	padding-left: 20px;

}

.sell{
	background-color: #FAFAFA;
	height: 500px;
	overflow-y: scroll;
	padding: 0px;
	
}

.listing{
	background-color: #ffffff;
	margin: 20px 20px 20px 20px;
	border-radius: 3px;
	height: 99.58px;
	padding-top: 30px;
	padding-left: 10px;
}
.blue{
	color: #2196F3;
}
.space{
	margin-top: 20px;
	margin-bottom: 100px;

}
</style>

<section style="margin-bottom: 0px;">
	<header class="masthead" style="background-image: url('img/head-buy.png'); height: 264px; margin: 0px;">
		<div class="container mx-auto text-center">
			<div class="row mx-auto">
				<div class="col">
					<button type="button" class="btn top" data-toggle="modal" data-target="#sellModal">Sell my coin</button>
				</div>
				<div class="col">
					<button type="button" class="btn top" data-toggle="modal" data-target="#buyModal">Create Buy Request</button>
				</div>
				
			</div>
		</div>

	</header>
</section>
<section class="body">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-6 col-lg-9 mx-auto">
				<h3> Buy HNGcoin</h3><p>To buy coin: Simply click on the BUY icon respective to the seller, fill the details and complete transaction</p>
				
			</div>
			<div class="col-sm-2 col-md-6 col-lg-3 mx-auto">
				<div class="row mx-auto">
					<div class="col mx-auto">
						<span class="trad">Trade on</span>
					</div>
					<div class="col mx-auto">
						<img src="img/stellar.png">
					</div>

				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="container heading">
				<div class="row mx-auto ">
				
					<div class="col mx-auto">
						Seller
					</div>
					<div class="col mx-auto">
						Payment Methods
					</div>

					<div class="col mx-auto">
						Price/coin
					</div>

					<div class="col-3 mx-auto">
						Limits
					</div>

				</div>
			</div>
				
			<div class="container sell">
				
				<?php
					foreach($sell_requests as $r){
				?>
				<div class="listing">
					<div class="row mx-auto">
						<div class="col-1">
							<img src="<?php echo $r['image_filename']; ?>" width="50">
						</div>
						
						<div class="col-2">
							<span class="blue"><?php echo $r['full_name']; ?> </span><br/>(500+;98%)
						</div>
						
						<div class="col-3">
							<span class="blue">National Bank Transfer </span><br/>Nigeria
						</div>
						
						<div class="col-3">
						<?php echo $r['price_per_coin']; ?> <br/>NGN
						</div>
						
						<div class="col-2">
						<?php echo $r['trade_limit']; ?> <br/> 
						</div>
						
						<div class="col-1">
						<?php 
							if(!empty($_SESSION['id']) && $r['intern_id'] == $_SESSION['id'] && $r['status'] == 'Open'){
							?>
							<a href="transaction_cancelled.php?sell=1&request_id=<?php echo $r['id']; ?>" class="btn btn-danger" onclick="return  confirm('Are you sure you want to delete this request')">Cancel</a>
							<?php
							}else{
							?>
								<a href="sell_coins.php?request_id=<?php echo $r['id']; ?>" class="btn btn-primary"> Sell</a>
								<?php
							}
							?>
						</div>
						
					</div>
				</div>
				
				<?php } ?>
				
				
				
			</div>
			
		
		</div>
	</div>
</section>


<section class="body">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-6 col-lg-9 mx-auto">
				<h3> Sell HNGcoin</h3><p>To sell coin: Simply click on the SELL icon respective to the seller, fill the details and complete transaction</p>
			</div>
			<div class="col-sm-2 col-md-6 col-lg-3 mx-auto">
				<div class="row mx-auto">
					<div class="col mx-auto">
						<span class="trad">Trade on</span>
					</div>
					<div class="col mx-auto">
						<img src="img/stellar.png">
					</div>

				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="container heading">
				<div class="row mx-auto ">
				
					<div class="col mx-auto">
						Buyer
					</div>
					<div class="col mx-auto">
						Payment Methods
					</div>

					<div class="col mx-auto">
						Price/coin
					</div>

					<div class="col-3 mx-auto">
						Limits
					</div>

				</div>
			</div>
			<div class="container sell">
				
			<?php
				foreach($buy_requests as $r){
			?>
				
				<div class="listing">
						<div class="row mx-auto">
							<div class="col-1">
								<img src="<?php echo $r['image_filename']; ?>" width="50">
							</div>
							
							<div class="col-2">
								<span class="blue"><?php echo $r['full_name']; ?> </span><br/>(500+;98%)
							</div>
							
							<div class="col-3">
								<span class="blue">National Bank Transfer </span><br/>Nigeria
							</div>
							
							<div class="col-3">
							<?php echo $r['bid_per_coin']; ?> <br/>NGN


							</div>
							
							<div class="col-2">
							<?php echo $r['trade_limit']; ?> <br/> 
							</div>
							
							<div class="col-1">
							<?php 
							if(!empty($_SESSION['id']) && $r['intern_id'] == $_SESSION['id'] && $r['status'] == 'Open'){
							?>
							<a href="transaction_cancelled.php?buy=1&request_id=<?php echo $r['id']; ?>" class="btn btn-danger" onclick="return  confirm('Are you sure you want to delete this request')">Cancel</a>
							<?php
							}else{
							?>
								<a href="buy_coins_0.php?request_id=<?php echo $r['id']; ?>" class="btn btn-primary"> BUY</a>
								<?php
							}
							?>
							</div>
							
						</div>
					</div>
			
			<?php } ?>
				
			</div>
			
		
		</div>
	
	
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-6 col-lg-8 mx-auto">
			
			</div>
			
			<div class="col space">
				<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-end">
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">4</a></li>
				<li class="page-item">
				<a class="page-link" href="#">.......</a>
				</li>
				</ul>
				</nav>
			</div>
		</div>
	</div>
</section>

<!---Modal-->
<div class="modal fade bd-example-modal-lg" id="sellModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header mx-auto text-center">
        <h5 class="modal-title" id="sellModalLabel">Sell MY Coin</h5>
      </div>
      <div class="modal-body">
	  <form method="post" action="buyandsell.php">
        <div class="row">
			<div class="col">
				Wallet ID: <br/>
				<input type="text" placeholder="Marvelous350" class="form-control" id="wallet-id" name="wallet" value="<?php echo $public_key ?>" readonly></input> <br/>
				Amount of HNGcoin: <br/>
				<input type="text" placeholder="0.00118811" class="form-control" id="HNGcoin" name="amount"></input><br/>

				Sell to HNG &nbsp;&nbsp;
				<input type="checkbox" placeholder="Buyer Wallet ID"  id="buyer-wallet-id" name="HNG"></input>
			</div>
			<div class="col">
				Payment Information <br/>
				<select id="payment_info" name="payment_info" class="form-control">
				<?php
				foreach($accounts as $account){
					echo "<option value='" . $account['id']  ."'>". $account['name'] ."</option>";
				}
				?>
				</select>
				<br>
				
				Price/coin <br/>
				<input type="text" placeholder="3,340,345.64" class="form-control" id="price" name="price"></input> <br/>
				Trade Limit: <br/>
				<input type="text" placeholder="1" class="form-control" id="trade_limit" name="trade_limit"></input><br/>
	
			</div>
			<div class="col-md-12 offset-md-3">
			<button type="submit" name="sellCoin" class="btn btn-primary mod">Sell</button>
			</div>
		</div>
		</form>


      </div>
      <div class="modal-footer mx-auto text-center">
		<div class="col mx-auto text-center">
			
		</div>
        
      </div>
    </div>
  </div>
</div>


<!---Buy Modal-->
<div class="modal fade bd-example-modal-lg" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header mx-auto text-center">
        <h5 class="modal-title" id="sellModalLabel">Buy Request</h5>
      </div>
      <div class="modal-body">
	  <form method="post" action="buyandsell.php">
        <div class="row">
			<div class="col">
				Amount of HNGcoin: <br/>
				<input type="text" placeholder="0.00118811" class="form-control" id="HNGcoin" name="amount"></input><br/>
			</div>
			<div class="col">
				Price/coin <br/>
				<input type="text" placeholder="3,340,345.64" class="form-control" id="price" name="price"></input> <br/>
				Trade Limit: <br/>
				<input type="text" placeholder="1" class="form-control" id="trade_limit" name="trade_limit"></input><br/>
				
			</div>
			<div class="col-md-12 offset-md-3">
			<button type="submit" name="buyCoin" class="btn btn-primary mod">Make a Buy Request</button>
			</div>
		</div>
		</form>
      </div>
      <div class="modal-footer mx-auto text-center">
		<div class="col mx-auto text-center">
			
		</div>
        
      </div>
    </div>
  </div>
</div>
<?php
include_once("footer.php");
?>
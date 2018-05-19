<?php
include_once("coin_header.php");	
if(isset($_POST['addBank'])){
	require_once('Transaction.php');
	//connect to database
	require_once('db.php');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $transaction = new Transaction();
	$bank_name = $_POST['bankName'];
	$account_name = $_POST['acctName'];
	$account_number = $_POST['acctNumber'];
	
    $result =  $transaction->createAccount($bank_name, $account_name, $account_number, $db);
	if($result){
		?>
        <script>
          window.location.href = "buyandsell.php";
        </script>
        <?php
		exit;
	}else{
		echo "Could not create account";
	}
}

?>
     
	  <form method="post" action="bank.php">
        <div class="row">
			<div class="col">

				Bank Name: <br/>
				<input type="text" placeholder="First Bank" class="form-control" id="bankName" name="bankName"></input><br/>

			</div>
			<div class="col">
			
				Account Name: <br/>
				<input type="text" placeholder="Marvelous Peter John" class="form-control" id="acctName" name="acctName"></input><br/>
				

				Account Number: <br/>
				<input type="text" placeholder="1234567890" class="form-control" id="acctNumber" name="acctNumber"></input><br/>

				
			</div>
			<div class="col-md-12 offset-md-3">
			<button type="submit" name="addBank" class="btn btn-primary">Create Account</button>
			</div>
		</div>
		</form>


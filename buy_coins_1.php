<?php
include_once("coin_header.php");
include_once("db.php");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!isset($_GET['request_id'])){
    echo "<script>alert('Request ID required');</script>";
}
$request_id = $_GET['request_id'];

$sql = "select sell_requests.id, banks.name as bankName, accounts.name, accounts.number from sell_requests inner join accounts on sell_requests.intern_id=accounts.intern_id inner join banks on sell_requests.account=banks.id where sell_requests.id = :request_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':request_id', $request_id);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$sell_request = $stmt->fetch();

var_dump($sell_request);
?>


<style>
body{
    background: #ffffff;
    /*font-size: 14px;*/
    font-family: Lato;
}
.main-container{
  padding-right: 10%;
    padding-left: 10%;
    font-size: 14px;
}
main{
    /*margin-bottom: 7.4%;*/
    /*margin-right: 10%;
    margin-left: 10%;*/
    padding-bottom: 3.1%;
 box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.25);
 
}
.input-form{
    padding-top: 11%;
    padding-bottom:4.5%;
}
.label-for-form,#sellerDetails,thead>tr>th{
    font-size: 1.25em;
    color: #3d3d3d;
    line-height: 1.5em;
}
td,.footerText{
     font-size: 1.125em;
    color: #323232;
    line-height:1.250em;
}
td,.heavy-text{
  font-weight: 600;
}
#sellerDetails{
    font-weight: bold;
}
.input-for-form{
    font-size: 1.25em;
    color: #828282;
    line-height: 1.5em;
}
.table-div{
    padding-bottom: 3%;
}
.modal-content{
    padding: 1.4% 3.3%;
}
#modalHeader{
  /*font-size: 1.25em;*/
  /*font-size: 2.625em;*/
  font-size: 2em;
  
font-style: normal;
font-weight: bold;
line-height: normal;
color: #3d3d3d;
margin-bottom: 2.2%;
}
#confirmModal{
    background: rgba(196, 196, 196, 0.3) !important;
}
.visible{
    display: block;
}
.hidden{
    display: none;
}
.crumbs:hover{
  cursor: pointer;
}

 /* media queries */
    @media(min-width: 360px) { 
        #checkMark {
            left:10%;        } 
    }
  
</style>



<div class="main-container">

<div style="margin-top: 6.5%;display:flex">

    <div id="crumb1" class="crumbs"  style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_1_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">1</span>

      
    </div>

    <div id="crumb2" class="crumbs" style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img  style="width: 100%" src="img/blue_1_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">2</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">

      
    </div>

    <div id="crumb3" class="crumbs" style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">3</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">


      
    </div>

     <div id="crumb4" class="crumbs" style="position: relative; margin-right: 0%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">4</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_2_arrow.svg" alt="first arrow">


      
    </div>
  </div>

<h1 style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 2.4%;margin-bottom:0%;
font-family: 'Work Sans';
font-style: normal;
font-weight: bold;
line-height: normal;
font-size: 1.25em;"> SEND PAYMENT</h1>

<p class="heavy-text" style="text-align: left;color: #3D3D3D;font-size:1.125em;line-height: 1.571em; margin: 1.4% 0%;"> You are buying &nbsp;0.00118811&nbsp; HNGcoins from Dammy. Please send payment per instructions below</p>

<main class="container">


    <!-- Button trigger modal -->




<div class="row justify-content-md-center">
<div class="col-xs-12- col-sm-10" id="sellerDetails" style="text-align: center;background: #f2f2f2; padding: 1% 0%; margin-top:3%">Payment Details</div>
</div>

<div class="row justify-content-md-center table-div">
<table class="table table-bordered col-xs-12 col-sm-10">
     <tbody>
       <tr>
      <td class="w-50">Payment Method</th>
      <td class="w-50">Bank Transfer</th>
    </tr>

    <tr>
      <td>Amount to be paid</td>
      <td>3,395 NGN</td>
    </tr>
    <tr>
      <td>Bank Name</td>
      <td><?php echo $sell_request['bankName'] ?></td>

    </tr>
    <tr>
      <td>Bank Account Name
      </td>
      <td><?php echo $sell_request['name'] ?></td>

    </tr>
  
    <tr>
      <td>Bank Account Number</td>
      <td><?php echo $sell_request['number'] ?></td>

    </tr>
  </tbody>
</table>

</div>
<p class="footerText" style="text-align: center;color: #3D3D3D;"> You will recieve HNGcoin immediately after seller has confirmed your payment</p>

<div class="row justify-content-md-center">

    <hr style="margin-bottom: 5.2%; background: #f2f2f2;" class="col-10">

</div>

<div class="row justify-content-md-center justify-content-xs-center" style="padding-bottom: 3.7%;">

    <button type="button" id="cancelButton" class="btn btn-primary col-xs-6 col-sm-3"  style="font-size: 1.563em;
    color:#fafafa;line-height: 1.875em;">Cancel Trade</button>
        
    </div>


   
</main>    

<h1 style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 3.4%;margin-bottom:0%;
font-family: 'Work Sans';
font-style: normal;
font-weight: bold;
line-height: normal;
font-size: 1.25em;"> SUBMIT PROOF OF PAYMENT</h1>

<p class="heavy-text" style="text-align: left;color: #3D3D3D;font-size:1.125em;line-height: 1.571em; margin: 1.4% 0%;"> You are required to submit a screenshot of successful payment transaction</p>

<div class="row justify-content-md-center justify-content-xs-center" style="padding-bottom: 3.7%;">

    <button type="button" id="proofButton" class="btn btn-primary btn-sm col-xs-6 col-sm-3"  style="font-size: 1.563em;
    color:#fafafa;line-height: 1.875em; margin-top:4.6%;margin-bottom:6.8%">Submit Payment Proof</button>
        
    </div>

</div>


<script type="text/javascript">
    
    window.onload = function() {
   
    $('#crumb1').on('click', function () {

        moveToPage("buy_coins_0.php");
      
    });

  
    

    $('#cancelButton').on('click', function () {
        moveToPage("transaction_cancelled.php");
      
    });


    $('#proofButton').on('click', function () {
        moveToPage("transaction_pending.php");
      
    });
    
  
  function moveToPage(page){
  window.location.href = page;
  }
}
</script>
<!-- Footer -->
<?php
include_once("footer.php");
?>
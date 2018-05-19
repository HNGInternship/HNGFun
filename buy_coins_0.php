<?php
include_once("coin_header.php");
include_once("db.php");
if(!isset($_GET['request_id'])){
    echo "<script>alert('Request ID required');</script>";
}
$request_id = $_GET['request_id'];

$sql = "select sell_requests.id, sell_requests.intern_id, amount, account, interns_data.public_key, trade_limit, price_per_coin, status, sell_requests.created_at, concat(interns_data.first_name, ' ', interns_data.last_name) as full_name, banks.name, image_filename from sell_requests inner join interns_data on sell_requests.intern_id=interns_data.id inner join banks on sell_requests.account=banks.id where sell_requests.id = :request_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':request_id', $request_id);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$sell_request = $stmt->fetch();

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
td,.heavy-text{
    font-weight: 600;
}
main{
    margin-bottom: 7.4%;
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
#sellerDetails{
    font-weight: bold;
}
.input-for-form{
    font-size: 1.25em;
    color: #828282;
    line-height: 1.5em;
}
.table-div{
    padding-bottom: 5.5%;
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



/*breadcrumbs*/


/*.breadcrumb {
  display: flex;
  flex-wrap: wrap;
}
.breadcrumb .item {
  flex: 1 0 25%;
  box-sizing: border-box;
  background: #e0ddd5;
  color: #171e42;
  padding: 10px;
}


.breadcrumb { 
  list-style: none; 
  overflow: hidden; 
  font: 18px Sans-Serif;
  padding: 0%;
   display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

.breadcrumb { 
  list-style: none; 
  overflow: hidden; 
  font: 18px Sans-Serif;
}

.breadcrumb div a {
  color: white;
  text-decoration: none; 
  padding: 10px 0 10px 65px;
  background: brown; 
  background: hsla(34,85%,35%,1); 
  position: relative; 
  display: block;
}


.breadcrumb div a::after { 
  content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;
  border-bottom: 50px solid transparent;
  border-left: 30px solid hsla(34,85%,35%,1);
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  left: 100%;
  z-index: 2; 
}

.breadcrumb div a::before { 
  content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;       
  border-bottom: 50px solid transparent;
  border-left: 30px solid white;
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  margin-left: 1px;
  left: 100%;
  z-index: 1; 
}*/


.crumbs:hover{
  cursor: pointer;
}





/*******************************************/
    @media(min-width: 360px) { 
        #checkMark {
            left:10%;        } 
    }
  
</style>


<!-- <div class="container-fluid">
<section id="scrim">
    <p>ertghe</p>
</section> -->

<div class="main-container">

  <!-- <div class="container" style="margin-top: 6.5%"> -->


 <!--    <div class="breadcrumb">
  <div class="item" style="background:red "><a>Heriberto Nickel</a></div>
  <div class="item" style="background:blue"><a>Brittaney Haliburton</a></div>
  <div class="item" style="background:yellow "><a>Maritza Winkler</a></div>
  <div class="item" style="background:green"><a>Carmon Rigg</a></div>
</div> -->

  
<div style="margin-top: 6.5%;display:flex">

    <div id="crumb1" class="crumbs"  style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_1_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">1</span>

      
    </div>

    <div id="crumb2" class="crumbs" style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img  style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">2</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">

      
    </div>

    <div id="crumb3" class="crumbs" style="position: relative; margin-right: -0.45%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">3</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_2_arrow.svg" alt="first arrow">


      
    </div>

     <div id="crumb4" class="crumbs" style="position: relative; margin-right: 0%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">4</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_2_arrow.svg" alt="first arrow">


      
    </div>
  </div>
<h1  style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 2.4%;margin-bottom:0%;
font-family: 'Work Sans';
font-style: normal;
font-weight: bold;
line-height: normal;
font-size: 1.25em;"> INPUT DETAILS</h1>

<p class="heavy-text" style="text-align: left;color: #3D3D3D;font-size:1.125em;line-height: 1.571em; margin: 1.4% 0%;"> Please input the necessary details and crosscheck that they are correct before proceeding</p>

<main class="container">
    <div class="container">

        <form class="row justify-content-md-center justify-content-xs-center input-form">   

  <div class="form-group col-xs-12 col-sm-5">
    <label class="label-for-form" for="coinAmount" >Amount of HNGcoin :*</label>
    <input type="number" class="form-control form-control-lg input-for-form" id="coinAmount" placeholder="0.00118811">
  </div>
  <div class="form-group col-xs-12 col-sm-5">
    <label class="label-for-form" for="wallet">Send HNGcoin to :*</label>
    <input type="text" class="form-control form-control-lg input-for-form" id="wallet" placeholder="Your HNGcoin Wallet">
  </div>
</form>

    <!-- Button trigger modal -->


<div class="row justify-content-md-center justify-content-xs-center" style="padding-bottom: 3.7%;">

    <button type="button" id="buyButton" class="btn btn-primary col-xs-6 col-sm-3" data-toggle="modal" data-target="#confirmModal" data-backdrop="static" data-keyboard="false" style="font-size: 1.563em;
    color:#fafafa;line-height: 1.875em;">BUY HNGcoin</button>
        
    </div>


<!-- Modal -->
<!-- <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <p  id="closeButton" style="text-align: right;margin-bottom: 0%;opacity: 1; padding-right: 5%" class="close" data-dismiss="modal" aria-label="Close">
          <img src="img/icons/cancel_icon.svg" style="border: 1.5px solid #EB5757;padding: 1%;border-radius: 50%">
        </p>
      <div class="modal-body">
        <h4 style="text-align: center;" id="modalHeader">Confirming ...</h4>
      </div>
<p class="footerText visible" id="modalFooter" style="text-align: center;color: #3D3D3D; margin-top: 0%;"> You will recieve HNGcoin immediately after seller has confirmed your payment</p>

<div id="checkMark" class="hidden" style="background: #2196F3 ; position: relative; width: 150px;height: 150px;border-radius: 50%;left:35%;margin-bottom: 1.4%;">
    <img src="img/icons/check_icon.svg" style="position: absolute;top:25%;left: 23%">
</div>
      
    </div>
  </div>
</div> -->

<!-- Modal -->


<div class="row justify-content-md-center">

    <hr style="margin-bottom: 5.2%; background: #f2f2f2;" class="col-10">

</div>
<div class="row justify-content-md-center">
<div class="col-xs-12- col-sm-10" id="sellerDetails" style="text-align: center;background: #f2f2f2; padding: 1% 0%; ">Seller Details</div>
</div>
<div class="row justify-content-md-center table-div">
<table class="table table-bordered col-xs-12 col-sm-10">
  <thead>
    <tr>
      <th scope="col">Buying From</th>
      <th scope="col"><?php echo $sell_request['full_name']; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Price</td>
      <td><?php echo $sell_request['price_per_coin']; ?> NGN/HNGcoin</td>
    </tr>
    <tr>
      <td>Payment Method</td>
      <td>Bank transfer: <?php echo $sell_request['name']; ?></td>

    </tr>
    <tr>
      <td>Location
      </td>
      <td>Nigeria</td>

    </tr>
  
    <tr>
      <td>Payment Window</td>
      <td>15 minutes</td>

    </tr>
  </tbody>
</table>

</div>

<p class="footerText" style="text-align: center;color: #3D3D3D;"> You will recieve HNGcoin immediately after seller has confirmed your payment</p>
   
</main>    
</div>

<script type="text/javascript">
    
    window.onload = function() {
   

    $('#buyButton').on('click', function () {
     var requestid = "<?php echo $request_id ?>"

        processTransaction();
        moveToPage("buy_coins_1.php?request_id=" + requestid);
      
    });
    
  
  function moveToPage(page){
  window.location.href = page;
  }

  function processTransaction(){
    var buyerId ='<?php echo $_SESSION["id"] ?>'
    var coinAmount = $('#coinAmount').val();
    var sellerId = '<?php echo $sell_request["intern_id"] ?>'
    
    
  }
}
</script>

<!-- Footer -->
<?php
include_once("footer.php");
?>
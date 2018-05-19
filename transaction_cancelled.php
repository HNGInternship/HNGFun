<?php

include_once("coin_header.php");
include_once('db.php');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require_once('Transaction.php');
$transaction = new Transaction();
$request_id = $_GET['request_id'];
if(!empty($_GET['sell'])){
    $request = " sell ";
    $transaction->cancelSellTransaction($request_id, $db);
}

if(!empty($_GET['buy'])){
    $request = " buy ";
    $transaction->cancelBuyTransaction($request_id, $db);
}

?>

<style>

body{

    background: #ffffff;
    /*font-size: 14px;*/
    font-family: Lato;



}
a.back{
    position: relative;
    top: 3rem;
    font-size: 150%;
    padding-top:5rem;
    text-decoration: underline;
}

.main-container{
  padding-right: 10%;
    padding-left: 10%;
    font-size: 14px;

}


main{

    margin-bottom: 7.4%;
    margin-top: 7%;
    /*margin-right: 10%;
    margin-left: 10%;*/
    /*padding: 20% 0%;*/
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

.crimbs:hover{
  cursor: pointer;
}
 /* media queries */
    @media(min-width: 360px) { 
        #checkMark {
            left:10%;        } 
    }
}


  
</style>


<!-- <div class="container-fluid">
<section id="scrim">
    <p>ertghe</p>
</section> -->

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
    <img style="width: 100%" src="img/blue_gray_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">3</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">


      
    </div>

     <div id="crumb4" class="crumbs" style="position: relative; margin-right: 0%;margin-left: 0%;width: 25%;color: white">
    <img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow">
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">4</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_gray_arrow.svg" alt="first arrow">


      
    </div>
  </div>


<h1 style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 2.4%;margin-bottom:0%;
font-family: 'Work Sans';
font-style: normal;
font-weight: bold;
line-height: normal;
font-size: 1.25em;"> TRANSACTION CANCELLED</h1>

<p class="heavy-text" style="text-align: left;color: #3D3D3D;font-size:1.125em;line-height: 1.571em; margin: 1.4% 0%; margin-bottom: 0.5%"> Your <?php echo $request; ?> request has been cancelled</p>


<a class="back" href="buyandsell.php">Go Back</a>

<main class="container">


    <!-- Button trigger modal -->




<div class="row justify-content-md-center">

<h2 style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 14.5%;margin-bottom:4.9%;
font-style: normal;
line-height: normal;
font-size: 2.4em;"> Transaction Cancelled</h2>

</div>



<div id="checkMark" style="text-align: center">
    <img src="img/icons/cancel_white.svg" style="background:#EB5757;padding: 2%;border-radius: 100%;margin-bottom: 18.7%;height: 150px;width: 150px">
</div>
   
</main>    


</div>
<!-- Footer -->
<?php
include_once("footer.php");
?>
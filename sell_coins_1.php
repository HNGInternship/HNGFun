<?php
include_once("coin_header.php");
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
    font-weight: 400;
}
main{
    margin-top: 6.9%;
    margin-bottom: 7.4%;
    /*margin-right: 10%;
    margin-left: 10%;*/
    padding-bottom: 3.1%;
 box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.25);
 
}
.transaction{
    padding-top: 50%;
    padding-bottom:4.5%;
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

  
<div class="row no-gutters" style="margin-top: 6.5%">

    <div style="position: relative; margin-right: 0%;margin-left: 0%;width: 31%;color: white">
        <a href="sell_coins.php"><img style="width: 100%" src="img/blue_1_bar.svg" alt="first arrow"></a>
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">1</span>

      
    </div>

    <div style="position: relative; margin-right: 0%;margin-left: 0%;width: 31%;color: white">
        <a href="sell_coins_1.php"><img  style="width: 100%" src="img/blue_1_bar.svg" alt="first arrow"></a>
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">2</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">

      
    </div>

    <div style="position: relative; margin-right: 0%;margin-left: 0%;width: 31%;color: white">
        <a href="sell_coins_2.php"><img style="width: 100%" src="img/blue_2_bar.svg" alt="first arrow"></a>
    <span style="position:absolute;top:30%;left: 50%;font-size: 1.253em">3</span>

    <img style="width: 20%;height: 100%;position: absolute;top: 0%;left: -2%;padding-left: 0%;" src="img/blue_1_arrow.svg" alt="first arrow">


      
    </div>


  </div>
<h1  style="text-align: left;color: #3D3D3D;line-height: 1.571em; margin-top: 2.4%;margin-bottom:0%;
font-family: 'Work Sans';
font-style: normal;
font-weight: bold;
line-height: normal;
font-size: 1.25em;">TRANSACTION PENDING</h1>

<p class="heavy-text" style="text-align: left;color: #3D3D3D;font-size:1.125em;line-height: 1.571em; margin: 1.4% 0%;"> Please confirm the payment made by the buyer by checking the proof</p>

<main class="container">
    <div class="container">


        <div class="transaction"></div>



</main>
</div>



<!-- Footer -->
<?php
include_once("footer.php");
?>
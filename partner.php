<?php
include_once("header.php");
?>

<style>
   
    p {
       font-size: 14px; 
    }
    
    .rightColumn {
        padding: 50px 5px 5px 20px;
		
    }
    ul {
    list-style-type: circle;
    }
	
    
	
	.voffset {
	margin-top: 300px; 
	
	}
	
	span{
	  font-size: 14px; 
    }
	
	.listing{
		
		font-size: 14px; 
	}
	.cont{
		
		padding-top: 20px;
		padding-left: 10px;
		padding-bottom: 10px;
		background-color: #ffffff;
		width: 100%;
		
	}
	
	.head{
		margin-top: 40px;
		margin-left: 40px;
		color: #ffffff;
		}
	.circle{
		width: 43px;
		height: 43px;
		border-radius: 50%;
		background-color: #48BBFC;
		z-index: 100;
	}
	.btn{
		margin-top: -130px;
		background-color: #ffffff;
		border-radius: 50px;
		color: #48BBFC;
		margin-left: 100px;
		width: 181px;
		height: 39px;
	}
</style>


<section>

<header class="masthead" style="background-image: url('img/head-part.png'); height: 406px;">
	<div class="overlay" style="background-color: #2A3135"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-6 col-lg-4 mx-auto">
					<img src="img/overlay.jpg">
					<button type="button" class="btn">VISIT WEBSITE</button>
				</div>
				<div class="col head">
					<h3>Hotels.ng <img src="img/value.png" width="67px" height="87px"> <span class="circle"></span> </img></h3>
					<h5>Yaba, Lagos, Nigeria</h5>
				</div>
		</div>
</header>
</section>
<section class="mx-auto col-md-10 mt-5 mb-5">
<div class="row">
	<div class="col-sm-3 col-md-6 col-lg-4">
		<div class="cont voffset">
				<h3 style="border-bottom: 2px solid #2196F3; display: inline block; ">About</h3>

				<p class="text-center"> An online travel agency specialising in hotel bookings withing Nigeria. 
					The HNG Internship program was started by Hotels.ng CEO Mark Essien and was designed to 
					locate the most talented software developers in Nigeria and Africa as a whole. Creating an 
					interactive platform for software development leanrning that is both fun and rewarding.</p>
				
				<div class="row mx-auto">
					<div class="col">
						<i class="fa fa-twitter fa-lg"></i>
					</div>
					<div class="col">
						<i class="fa fa-facebook fa-lg"></i>
					</div>
					<div class="col">
						<i class="fa fa-github fa-lg"></i>
					</div>
				</div>
				
		</div>
	</div>
						
	<div class="col-sm-9 col-md-6 col-lg-8 rightColumn">
					<div class="cont">
						<div class="row">
							<div class="col-sm-3 col-md-6 col-lg-4">

									<img src="img/hng-square.png" width="204px" height="204px">
							</div> 

							<div class="col">
								<span class="listing"><h6>Headquarters:</h6>Yaba, Lagos</span>
								<span class="listing"><h6>Address:</h6> No 3, Birrel Avenue</span>  
								<span class="listing"><h6>Industry:</h6>Hotel Booking Services</span>
							</div>
							
							<div class="col">
								
								<div class="listing"><h6>Phone:</h6>0806 621 2033</div>
								<div class="listing"><h6>Founded:</h6>1972</div> 
							</div> 
						</div>
						</div>
						<div class="cont mt-5">
							<h3 style="border-bottom: 2px solid #2196F3; display: inline block; "> Contributions</h3>

							
							<p>Hotels.ng has been a major partner in HNG internships with the dollpwing contributions, they are dedicated to ensuring that talentes youths in Africa aregiven the opportunity to maximize their potentials</p>

							<ul>
							<li><span>Hotels.ng has been a major partner in HNG internships with the dollpwing contributions, they are dedicated to ensuring that talentes youths in Africa aregiven the opportunity to maximize their potentials</span>
							</li>
							<li><span>Hotels.ng has been a major partner in HNG internships with the dollpwing contributions, they are dedicated to ensuring that talentes youths in Africa aregiven the opportunity to maximize their potentials</span>
							</li>
							<li><span>Hotels.ng has been a major partner in HNG internships with the dollpwing contributions, they are dedicated to ensuring that talentes youths in Africa aregiven the opportunity to maximize their potentials</span>
							</li>
							</ul>  

						
						</div>
					</div>
				
	</div>
</div>
</section>

<?php
include_once("footer.php");
?>
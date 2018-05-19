<?php
include_once("header.php");
?>

<style>
	body{
		overflow-x: hidden;
		100%;
	}
	main{
		background-color: #fff;
	}
	.jumbotron{
		background-color: #2f70ed;
	}
	.jumbotron-content{
		/*width: 100%;*/
	}
	.jumbotron-content h1{
		font-size: 2.6rem;
		width: 80%;
		max-width: 500px;
		margin-left: auto;
		margin-right: auto;
	}
	.jumbotron-content p{
		font-size: 1.3rem;
		width: 90%;
		max-width: 700px;
		margin-left: auto;
		margin-right: auto;
	}
	.btn-custom-primary{
		background-color: #00aeff;
		text-transform: none;
		font-family: inherit !important;
		font-size: 1.3rem;
		border-radius: 5px;
	}
	.paddedhr{
		width: 100px;
		background-color: #00AEFF;
		padding: 2px 0;
	}
	.paddedhr2{
		width: 60px;
		background-color: #00AEFF;
		padding: 2.5px 0;
	}
	.bg-grey{
		background-color: #eee;
	}
	.text-center{
		text-align: center !important;
	}
	.clip-bottom{
		  -webkit-clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
		  clip-path: polygon(0 0, 100% 0, 100% 88%, 0 100%);
		  background-color: #dbf4ff;
		  padding-top: 80px !important;
		padding-bottom: 80px !important;
		font-size: 1.4rem;
	}
	.clip-bottom h1.text-primary{
		color: #00aeff; 
		font-size: 2.6rem;
		font-weight: 1000 !important;
	}
	.bg-footer-top{
		background-color: #00AEFF;
	}
	.bg-footer-lower{
		background-color: #00AEFF;
	}
    .img-bg {
        position: relative; 
        width: 100%;
        margin: auto
    }
    .head1 { 
        position: absolute; 
        bottom: 200px; 
        left: 50px; 
        width: 70%; 
    }
    .head { 
        position: absolute; 
        bottom: 100px; 
        left: 50px; 
        width: 70%; 
    }
</style>

<main>
	<div class="text-white img-bg">
        <img src="/img-light.jpeg" alt="">
			<h1 class="mb-2 head1">What is HNG all about?</h1>
			<p class="head" >The HNG is a 3-month remote internship program designed to locate the most talented software developers in Nigeria and the whole of Africa</p>
	</div>
	<div class="row">
		<p class="text-center w-100 mb-0">About Us</p>
		<hr class="paddedhr">
	</div>

	<div class="container">
		
		<!-- <div class="logo my-5 d-flex justify-content-center mw-75 ml-auto mr-auto">
			<img src="icons/logo-blue-bg.png" style="max-width: 300px; max-height: 252px;">
		</div> -->
		<div class="content">
			<p class="text-muted px-5">The HNG is a 3-month remote internship program designed to locate the most talented software developers in Nigeria 
            and the whole of Africa. Everyone is welcome to participate (there is no entrance exam). We create fun challenges every week on our slack channel. 
            Those who solve them stay on. Everyone gets to learn important concepts quickly, and make connections with people they can work with in the future. 
            The intern coders are introduced to complex programming frameworks, and get to work on real applications that scale. the finalist are connected to 
            the best companies in the tech ecosystem and get full time jobs and contracts immediately</p>
		</div>
	</div>

	<div class="row clip-bottom py-5 text-center d-flex justify-content-around">
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">4200</h1>
			Registered interns
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">30</h1>
			Motivated Mentors
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">6</h1>
			Learning Paths
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">5</h1>
			African Countries
			<hr class="paddedhr2">
		</div>	
	</div>
	<div class="container">
		<h3 class="mt-5 text-center">What you will learn</h3>
		<hr class="paddedhr2 my-5">
		<div class="row d-flex justify-content-around text-center mt-5">
			<div class="col-sm-3">
				<img src="icons/coding.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Programming</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			<div class="col-sm-3">
				<img src="icons/painting-palette.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Design</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			<div class="col-sm-3">
				<img src="icons/team.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Collaboration</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			
		</div>
	</div>
    <div class="row bg-footer-top py-2" ></div>
	<div class="row bg-footer-lower py-2 justify-content-center text-white">
		<div class="col-sm-3 d-flex align-items-center" style=" border-right: 2px solid #fff; max-width: 200px;">
			<div class="rounded-circle bg-primary d-flex justify-content-center align-items-center mr-1" style="min-width: 50px; height: 50px;"><span class="fa fa-envelope float-left"></span></div>
			<h4 class="text-right">Start Learning Now</h4>
		</div>
		<div class="col-sm-7">
			<h4 class="text-center mb-2">Ready to get started? Register Now! </h4>
			<form class="form-inline row d-flex justify-content-center">
				<div class="col-7 form-group pr-0 mr-0">
					<input type="email" name="email" id="email" placeholder="Enter your email" class="form-control w-100 py-2" style= "border-top-right-radius: 0; border-bottom-right-radius: 0" >
				</div>
				<div class="col-4 form-group">
					<button class="btn btn-custom text-white py-2" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-size: 1.1rem; min-width: 90%; color: #000000">Sign Up </button>
				</div>
			</form>
		</div> 
		
	</div>
</main>
<?php
include_once("footer.php");
?>

<?php
ini_set('display_errors', 1);
try {
    $q = 'SELECT * FROM secret_word';
    $sql = $conn->query($q);
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $data = $sql->fetch();
    $secret_word = $data["secret_word"];
} catch (PDOException $err) {

    throw $err;
}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:400,500,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="https://nelsonatuonwu.me/css/style.css" />
	<title>Nelson Atuonwu Portfolio</title>
	<style>
		.img{
			border-radius: 0 !important;
			opacity: 1 !important;
		}
		.container{
			width: 100% !important;
		}
		footer{
			display: none !important;
		}
        body{
            background: white;
        }
	</style>
</head>
<body>

	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->

	<!--Container-->
	<div class="pad-zero">

		<!--Splitlayout -->
		<div id="splitlayout" class="splitlayout reset-layout">

			<!--Intro-->
			<div class="intro">

				<!--Left Content Intro-->
				<div class="side side-left">

					<!--Left Nav-->
					<div class="call-to-action about">
						
					</div>
					<!--/Left Nav-->

					<div class="col-xs-12 align-center content-wrap">

						<!--Logo-->
						<header class="logo align-center text-left" style="margin-left: 0">
							<img src="https://res.cloudinary.com/adinell/image/upload/v1524073945/logo.png" alt="logo" class="img">
						</header>
						<!--/Logo-->

						<!--main content-->
						<section class="intro-text">
							<div class="ani-wrap padding-top-65 padding-top-xs-0">
								<a href="https://hng.fun/listing.php">
									<h3 class="animated text-white">
											<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
											Back to HNG
										</h3></a>
								<h1 class="animated ">Nelson Atuonwu.
									<br/> Your not so averagely creative full stack developer.
								</h1>
							</div>
							<div class="clearfix"></div>
						</section>
						<!--/main content-->

						<!--Footer-->
						<footer class="copyright-text margin-sm-30">
							<p class="text-white">with
								<span class="text-danger">
                  <i class="fa fa-heart text-danger" aria-hidden="true"></i>
                </span> by Nelson &copy; 2018</p>
						</footer>
						<!--/Footer-->

					</div>
				</div>
				<!--/Left Content Intro-->

				<!--Right Content Intro-->
				<div class="side side-right">

					<!--Right Nav-->
					<div class="call-to-action contact">
						<div>
							<span class="goto-next">
								Chat with bot
								<span class="add-sep"></span>
							</span>
							<span class="goto-close opacity-hide">
								close X
								<span class="add-sep"></span>
							</span>
						</div>
					</div>
					<!--/Right Nav-->
					<br>
					<div class="col-xs-12 align-center sec-pad-right text-right">

						<!--Social Icons-->
						<ul class="social-icons animated">
							<li>
								<a href="https://www.linkedin.com/in/nelsonatuonwu" target="_blank" class="social-icon">
									<span class="fa" data-hover="&#xf0e1;">&#xf0e1;</span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/blvckcoder" target="_blank" class="social-icon">
									<span class="fa" data-hover="&#xf099;">&#xf099;</span>
								</a>
							</li>
							<li>
								<a href="https://www.github.com/kunoacc" target="_blank" class="social-icon">
									<span class="fa" data-hover="&#xf09b;">&#xf09b;</span>
								</a>
							</li>
						</ul>
						<!--/Social Icons-->

					</div>

					<!--Notify Sec-->
					<section class="timer-sec">

						<!--Clock wrap-->
						<div class="clock-wrap">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="81px"
							  viewBox="0 0 81 81" enable-background="new 0 0 81 81" xml:space="preserve">
								<switch>
									<g>
										<circle fill="none" stroke="#FFFFFF" stroke-miterlimit="10" cx="40.5" cy="40.5" r="40" />
										<circle fill="#FFFFFF" cx="40.5" cy="40.5" r="2.806" />
										<line id="min" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" x1="40.5" y1="10.5" x2="40.5" y2="40.5"
										/>
										<line id="hour" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-miterlimit="10" x1="40.5" y1="20.5" x2="40.5" y2="40.5"
										/>
										<line id="sec" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" x1="40.5" y1="7.5" x2="40.5" y2="40.5" />
									</g>
								</switch>
							</svg>
						</div>
						<!--/Clock wrap-->

					</section>
					<!--/Notify Sec-->

				</div>
				<!--/Right Content Intro-->

			</div>
			<!--/Intro-->

			<!--Right Section-->
			<div class="page page-right">
				<div class="page-inner full-height">

					<!--Contact Sec-->
					<section>

						<!--form sec-->
						<section class="animated container-fluid align-center sec-pad-top">
							<h3>Coming Soon</h3>
						</section>
						<!--/form sec-->

					</section>
					<!--/Contact Sec-->

				</div>
			</div>
			<!--/Right Section-->

		</div>
		<!-- /Splitlayout -->

	</div>
	<!-- /Container -->

	<!-- Scripts -->
	<script src="https://nelsonatuonwu.me/js/jquery-1.11.3.min.js"></script>
	<script src="https://nelsonatuonwu.me/js/modernizr.custom.js"></script>
	<script src="https://nelsonatuonwu.me/js/notifyMe.js"></script>
	<script src="https://nelsonatuonwu.me/js/jquery.placeholder.js"></script>
	<script src="https://nelsonatuonwu.me/js/jquery.nicescroll.js"></script>
	<script src="https://nelsonatuonwu.me/js/init.js"></script>
	<script>
		document.querySelector('body').classList.toggle('profile');
		document.querySelector('nav').remove();
		const links = document.querySelectorAll('link');
		for (let index = 0; index < 9; index++) {
			links[index].remove();
		}
		window.onload = function () {
			document.body.querySelectorAll('footer')[1].remove();
			const scripts = document.body.getElementsByTagName('script');
			if (scripts.length > 7) {
				for (let index = (scripts.length - 3); index < scripts.length; index++) {
					scripts[index].remove();
				}
			}
		}
	</script>
  </body>
</html>
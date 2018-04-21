<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Samuel Enyi Omanchi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"
	/>
	<meta name="author" content="freehtml5.co" />

	<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

	<link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	 crossorigin="anonymous">

	<!-- Animate.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">

	<style>
		/* =======================================================
	  *
	  * 	Template Style 
	  *
	  * ======================================================= */

		body {
			font-family: "Space Mono", Arial, serif;
			font-weight: 400;
			font-size: 16px;
			line-height: 1.7;
			color: #4d4d4d;
			background: #fff;
		}

		#page {
			position: relative;
			overflow-x: hidden;
			width: 100%;
			height: 100%;
			-webkit-transition: 0.5s;
			-o-transition: 0.5s;
			transition: 0.5s;
		}

		.offcanvas #page {
			overflow: hidden;
			position: absolute;
		}

		.offcanvas #page:after {
			-webkit-transition: 2s;
			-o-transition: 2s;
			transition: 2s;
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: 101;
			background: rgba(0, 0, 0, 0.7);
			content: "";
		}

		a {
			color: #FF9000;
			-webkit-transition: 0.5s;
			-o-transition: 0.5s;
			transition: 0.5s;
		}

		a:hover,
		a:active,
		a:focus {
			color: #FF9000;
			outline: none;
			text-decoration: none;
		}

		p {
			margin-bottom: 30px;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		figure {
			color: #000;
			font-family: "Space Mono", Arial, serif;
			font-weight: 400;
			margin: 0 0 20px 0;
		}

		::-webkit-selection {
			color: #fff;
			background: #FF9000;
		}

		::-moz-selection {
			color: #fff;
			background: #FF9000;
		}

		::selection {
			color: #fff;
			background: #FF9000;
		}

		#fh5co-header,
		.fh5co-cover {
			background-color: transparent;
			background-size: cover;
			background-attachment: fixed;
			position: relative;
			height: 600px;
			width: 100%;
		}

		#fh5co-header .overlay,
		.fh5co-cover .overlay {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: #fff;
		}

		#fh5co-header .display-t,
		.fh5co-cover .display-t {
			width: 100%;
			display: table;
		}

		#fh5co-header .display-tc,
		.fh5co-cover .display-tc {
			display: table-cell;
			vertical-align: middle;
			height: 600px;
		}

		#fh5co-header .display-tc h1,
		#fh5co-header .display-tc h2,
		#fh5co-header .display-tc h3,
		.fh5co-cover .display-tc h1,
		.fh5co-cover .display-tc h2,
		.fh5co-cover .display-tc h3 {
			margin: 0;
			padding: 0;
			color: white;
		}

		#fh5co-header .display-tc h1,
		.fh5co-cover .display-tc h1 {
			font-family: "Kaushan Script", cursive;
			margin-bottom: 30px;
			font-size: 50px;
			line-height: 1.3;
			font-weight: 300;
			-webkit-transform: rotate(-5deg);
			-moz-transform: rotate(-5deg);
			-ms-transform: rotate(-5deg);
			-o-transform: rotate(-5deg);
			transform: rotate(-5deg);
		}

		#fh5co-header .display-tc h1 span,
		.fh5co-cover .display-tc h1 span {
			padding: 4px 15px;
			position: relative;
		}

		#fh5co-header .display-tc h1 span:before,
		.fh5co-cover .display-tc h1 span:before {
			position: absolute;
			top: 40px;
			left: 0;
			width: 30px;
			height: 4px;
			content: '';
			background: #fff;
			margin-left: -30px;
		}

		#fh5co-header .display-tc h1 span:after,
		.fh5co-cover .display-tc h1 span:after {
			position: absolute;
			top: 40px;
			right: 0;
			width: 30px;
			height: 4px;
			content: '';
			background: #fff;
			margin-right: -30px;
		}

		@media screen and (max-width: 768px) {
			#fh5co-header .display-tc h1,
			.fh5co-cover .display-tc h1 {
				font-size: 34px;
			}
			#fh5co-header .display-tc h1 span:before,
			.fh5co-cover .display-tc h1 span:before {
				top: 28px;
				width: 20px;
				height: 3px;
				margin-left: -15px;
				color: #FF9000;
			}
			#fh5co-header .display-tc h1 span:after,
			.fh5co-cover .display-tc h1 span:after {
				top: 28px;
				width: 20px;
				height: 3px;
				margin-right: -15px;
				color: #FF9000;
			}
		}

		#fh5co-header .display-tc h2,
		.fh5co-cover .display-tc h2 {
			font-size: 20px;
			line-height: 1.5;
			margin-bottom: 30px;
		}

		#fh5co-header .display-tc h3,
		.fh5co-cover .display-tc h3 {
			font-size: 16px;
			color: #FF9000;
		}

		@media screen and (max-width: 768px) {
			#fh5co-header .display-tc h3,
			.fh5co-cover .display-tc h3 {
				font-size: 14px;
			}
		}

		#fh5co-header .display-tc .profile-thumb,
		.fh5co-cover .display-tc .profile-thumb {
			background-size: cover !important;
			background-position: center center;
			background-repeat: no-repeat;
			position: relative;
			height: 200px;
			width: 200px;
			margin: 0 auto;
			margin-bottom: 30px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			border-radius: 50%;
		}

		#fh5co-header .display-tc .fh5co-social-icons li a,
		.fh5co-cover .display-tc .fh5co-social-icons li a {
			color: #FF9000;
		}

		#fh5co-header .display-tc .fh5co-social-icons li a i,
		.fh5co-cover .display-tc .fh5co-social-icons li a i {
			font-size: 30px;
		}

		#fh5co-features {
			background: #FF9000;
		}

		#fh5co-features h2 {
			color: #fff;
		}

		#fh5co-features .services-padding {
			padding: 7em 0;
		}

		#fh5co-features .feature-left {
			margin-bottom: 40px;
			float: left;
		}

		@media screen and (max-width: 992px) {
			#fh5co-features .feature-left {
				margin-bottom: 30px;
			}
		}

		#fh5co-features .feature-left .icon {
			display: table;
			text-align: center;
			width: 100px;
			height: 100px;
			margin: 0 auto;
			background: #fff;
			margin-bottom: 20px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			border-radius: 50%;
		}

		#fh5co-features .feature-left .icon i {
			font-size: 50px;
			display: table-cell;
			vertical-align: middle;
			height: 100px;
			color: #FF9000 !important;
		}

		#fh5co-features .feature-left .feature-copy {
			width: 100%;
		}

		#fh5co-features .feature-left h3 {
			font-size: 24px;
			font-weight: 400;
			color: #fff;
		}

		#fh5co-features .feature-left p {
			font-size: 16px;
			color: rgba(255, 255, 255, 0.7);
		}

		#fh5co-features .feature-left p:last-child {
			margin-bottom: 0;
		}

		#fh5co-features .feature-left p a {
			color: #000 !important;
		}

		#fh5co-about,
		#fh5co-resume,
		#fh5co-skills,
		#fh5co-started,
		#fh5co-work,
		#fh5co-blog,
		#fh5co-pricing,
		#fh5co-contact {
			padding: 7em 0;
			clear: both;
		}

		@media screen and (max-width: 768px) {
			#fh5co-about,
			#fh5co-resume,
			#fh5co-skills,
			#fh5co-started,
			#fh5co-work,
			#fh5co-blog,
			#fh5co-pricing,
			#fh5co-contact {
				padding: 3em 0;
			}
		}

		#fh5co-started {
			border-bottom: none;
		}

		.fh5co-bg-dark {
			background: #2F3C4F;
			background: #FF9000;
		}

		.fh5co-bg-dark .fh5co-heading h2 {
			color: #fff !important;
		}

		.info {
			margin: 0;
			padding: 0;
			width: 90%;
			float: left;
		}

		@media screen and (max-width: 768px) {
			.info {
				margin-bottom: 3em;
			}
		}

		.info li {
			width: 100%;
			float: left;
			list-style: none;
			padding: 10px 0;
		}

		.info li:first-child {
			padding-top: 0;
		}

		.info li .first-block {
			width: 40%;
			display: inline-block;
			float: left;
			color: #000;
			font-weight: bold;
		}

		.info li .second-block {
			width: 60%;
			display: inline-block;
			color: rgba(0, 0, 0, 0.5);
		}

		.fh5co-social-icons {
			margin: 0;
			padding: 0;
		}

		.fh5co-social-icons li {
			margin: 0;
			padding: 0;
			list-style: none;
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
		}

		.fh5co-social-icons li a {
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
			color: #FF9000;
			padding-left: 10px;
			padding-right: 10px;
		}

		.fh5co-social-icons li a i {
			font-size: 20px;
		}

		#fh5co-about .fh5co-social-icons {
			margin: 0;
			padding: 0;
		}

		#fh5co-about .fh5co-social-icons li {
			padding: 0;
			list-style: none;
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
		}

		#fh5co-about .fh5co-social-icons li a {
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
			color: #fff;
			background: #2F3C4F;
			padding: 10px 10px 2px 10px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			-ms-border-radius: 2px;
			border-radius: 2px;
		}

		#fh5co-about .fh5co-social-icons li a i {
			font-size: 20px;
		}

		#fh5co-about .fh5co-social-icons li a:hover {
			background: #FF9000;
		}

		.fh5co-heading {
			margin-bottom: 5em;
		}

		.fh5co-heading.fh5co-heading-sm {
			margin-bottom: 2em;
		}

		.fh5co-heading h2 {
			font-size: 40px;
			margin-bottom: 20px;
			line-height: 1.5;
			color: #000;
		}

		.fh5co-heading p {
			font-size: 18px;
			line-height: 1.5;
			color: #828282;
		}

		.fh5co-heading span {
			display: block;
			margin-bottom: 10px;
			text-transform: uppercase;
			font-size: 12px;
			letter-spacing: 2px;
		}

		.btn {
			margin-right: 4px;
			margin-bottom: 4px;
			font-family: "Space Mono", Arial, serif;
			font-size: 16px;
			font-weight: 400;
			-webkit-border-radius: 30px;
			-moz-border-radius: 30px;
			-ms-border-radius: 30px;
			border-radius: 30px;
			-webkit-transition: 0.5s;
			-o-transition: 0.5s;
			transition: 0.5s;
			padding: 8px 20px;
		}

		.btn.btn-md {
			padding: 8px 20px !important;
		}

		.btn.btn-lg {
			padding: 18px 36px !important;
		}

		.btn:hover,
		.btn:active,
		.btn:focus {
			box-shadow: none !important;
			outline: none !important;
		}

		.btn-primary {
			background: #FF9000;
			color: #fff;
			border: 2px solid #FF9000;
		}

		.btn-primary:hover,
		.btn-primary:focus,
		.btn-primary:active {
			background: #ff9b1a !important;
			border-color: #ff9b1a !important;
		}

		.btn-primary.btn-outline {
			background: transparent;
			color: #FF9000;
			border: 2px solid #FF9000;
		}

		.btn-primary.btn-outline:hover,
		.btn-primary.btn-outline:focus,
		.btn-primary.btn-outline:active {
			background: #FF9000;
			color: #fff;
		}

		.btn-success {
			background: #5cb85c;
			color: #fff;
			border: 2px solid #5cb85c;
		}

		.btn-success:hover,
		.btn-success:focus,
		.btn-success:active {
			background: #4cae4c !important;
			border-color: #4cae4c !important;
		}

		.btn-success.btn-outline {
			background: transparent;
			color: #5cb85c;
			border: 2px solid #5cb85c;
		}

		.btn-success.btn-outline:hover,
		.btn-success.btn-outline:focus,
		.btn-success.btn-outline:active {
			background: #5cb85c;
			color: #fff;
		}

		.btn-info {
			background: #5bc0de;
			color: #fff;
			border: 2px solid #5bc0de;
		}

		.btn-info:hover,
		.btn-info:focus,
		.btn-info:active {
			background: #46b8da !important;
			border-color: #46b8da !important;
		}

		.btn-info.btn-outline {
			background: transparent;
			color: #5bc0de;
			border: 2px solid #5bc0de;
		}

		.btn-info.btn-outline:hover,
		.btn-info.btn-outline:focus,
		.btn-info.btn-outline:active {
			background: #5bc0de;
			color: #fff;
		}

		.btn-warning {
			background: #f0ad4e;
			color: #fff;
			border: 2px solid #f0ad4e;
		}

		.btn-warning:hover,
		.btn-warning:focus,
		.btn-warning:active {
			background: #eea236 !important;
			border-color: #eea236 !important;
		}

		.btn-warning.btn-outline {
			background: transparent;
			color: #f0ad4e;
			border: 2px solid #f0ad4e;
		}

		.btn-warning.btn-outline:hover,
		.btn-warning.btn-outline:focus,
		.btn-warning.btn-outline:active {
			background: #f0ad4e;
			color: #fff;
		}

		.btn-danger {
			background: #d9534f;
			color: #fff;
			border: 2px solid #d9534f;
		}

		.btn-danger:hover,
		.btn-danger:focus,
		.btn-danger:active {
			background: #d43f3a !important;
			border-color: #d43f3a !important;
		}

		.btn-danger.btn-outline {
			background: transparent;
			color: #d9534f;
			border: 2px solid #d9534f;
		}

		.btn-danger.btn-outline:hover,
		.btn-danger.btn-outline:focus,
		.btn-danger.btn-outline:active {
			background: #d9534f;
			color: #fff;
		}

		.btn-outline {
			background: none;
			border: 2px solid gray;
			font-size: 16px;
			-webkit-transition: 0.3s;
			-o-transition: 0.3s;
			transition: 0.3s;
		}

		.btn-outline:hover,
		.btn-outline:focus,
		.btn-outline:active {
			box-shadow: none;
		}

		.btn.with-arrow {
			position: relative;
			-webkit-transition: 0.3s;
			-o-transition: 0.3s;
			transition: 0.3s;
		}

		.btn.with-arrow i {
			visibility: hidden;
			opacity: 0;
			position: absolute;
			right: 0px;
			top: 50%;
			margin-top: -8px;
			-webkit-transition: 0.2s;
			-o-transition: 0.2s;
			transition: 0.2s;
		}

		.btn.with-arrow:hover {
			padding-right: 50px;
		}

		.btn.with-arrow:hover i {
			color: #fff;
			right: 18px;
			visibility: visible;
			opacity: 1;
		}

		.form-control {
			box-shadow: none;
			background: transparent;
			border: 2px solid rgba(0, 0, 0, 0.1);
			height: 54px;
			font-size: 18px;
			font-weight: 300;
		}

		.form-control:active,
		.form-control:focus {
			outline: none;
			box-shadow: none;
			border-color: #FF9000;
		}

		.row-pb-md {
			padding-bottom: 4em !important;
		}

		.row-pb-sm {
			padding-bottom: 2em !important;
		}

		.nopadding {
			padding: 0 !important;
			margin: 0 !important;
		}

		.col-padding {
			padding: 6px !important;
			margin: 0px !important;
		}

		.my-name{
			
		}

		/*# sourceMappingURL=style.css.map */

		/* chatbot styles */
		* {
  box-sizing: border-box;
}

body {
  background-color: #edeff2;
  font-family: "Calibri", "Roboto", sans-serif;
}

.chat_window {
  position: relative;
  width: calc(100% - 20px);
  max-width: 800px;
  height: 500px;
  border-radius: 10px;
  background-color: #fff;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  background-color: #f8f8f8;
  overflow: hidden;
}

.top_menu {
  background-color: #fff;
  width: 100%;
  padding: 20px 0 15px;
  box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
}
.top_menu .buttons {
  margin: 3px 0 0 20px;
  position: absolute;
}
.top_menu .buttons .button {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 10px;
  position: relative;
}
.top_menu .buttons .button.close {
  background-color: #f5886e;
}
.top_menu .buttons .button.minimize {
  background-color: #fdbf68;
}
.top_menu .buttons .button.maximize {
  background-color: #a3d063;
}
.top_menu .title {
  text-align: center;
  color: #bcbdc0;
  font-size: 20px;
}

.messages {
  position: relative;
  list-style: none;
  padding: 20px 10px 0 10px;
  margin: 0;
  height: 347px;
  overflow: scroll;
}
.messages .message {
  clear: both;
  overflow: hidden;
  margin-bottom: 20px;
  transition: all 0.5s linear;
  opacity: 0;
}
.messages .message.left .avatar {
  background-color: #f5886e;
  float: left;
}
.messages .message.left .text_wrapper {
  background-color: #ffe6cb;
  margin-left: 20px;
}
.messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
  right: 100%;
  border-right-color: #ffe6cb;
}
.messages .message.left .text {
  color: #c48843;
}
.messages .message.right .avatar {
  background-color: #fdbf68;
  float: right;
}
.messages .message.right .text_wrapper {
  background-color: #c7eafc;
  margin-right: 20px;
  float: right;
}
.messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
  left: 100%;
  border-left-color: #c7eafc;
}
.messages .message.right .text {
  color: #45829b;
}
.messages .message.appeared {
  opacity: 1;
}
.messages .message .avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
}
.messages .message .text_wrapper {
  display: inline-block;
  padding: 20px;
  border-radius: 6px;
  width: calc(100% - 85px);
  min-width: 100px;
  position: relative;
}
.messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.messages .message .text_wrapper::after {
  border-width: 13px;
  margin-top: 0px;
}
.messages .message .text_wrapper::before {
  border-width: 15px;
  margin-top: -2px;
}
.messages .message .text_wrapper .text {
  font-size: 18px;
  font-weight: 300;
}

.bottom_wrapper {
  position: relative;
  width: 100%;
  background-color: #fff;
  padding: 20px 20px;
  position: absolute;
  bottom: 0;
}
.bottom_wrapper .message_input_wrapper {
  display: inline-block;
  height: 50px;
  border-radius: 25px;
  border: 1px solid #bcbdc0;
  width: calc(100% - 160px);
  position: relative;
  padding: 0 20px;
}
.bottom_wrapper .message_input_wrapper .message_input {
  border: none;
  height: 100%;
  box-sizing: border-box;
  width: calc(100% - 40px);
  position: absolute;
  outline-width: 0;
  color: gray;
}
.bottom_wrapper .send_message {
  width: 140px;
  height: 50px;
  display: inline-block;
  border-radius: 50px;
  background-color: #a3d063;
  border: 2px solid #a3d063;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s linear;
  text-align: center;
  float: right;
}
.bottom_wrapper .send_message:hover {
  color: #a3d063;
  background-color: #fff;
}
.bottom_wrapper .send_message .text {
  font-size: 18px;
  font-weight: 300;
  display: inline-block;
  line-height: 48px;
}

.message_template {
  display: none;
}

	</style>

</head>

<body>

 <?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>

	 <?php
    try {
        $sqli = 'SELECT * FROM interns_data';
        $quin = $conn->query($sqli);
        $quin->setFetchMode(PDO::FETCH_ASSOC);
        $datas = $quin->fetch();
    } catch (PDOException $error) {
        throw $error;
    }
	$username = $datas['username'];
	$name = $datas['name'];
	
    ?>





	<div id="page">
		<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:url(http://res.cloudinary.com/cortehz/image/upload/v1517224595/portfolio/Snapchat_izgfgf.jpg);"
		 data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t js-fullheight">
							<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
								<div class="profile-thumb" style="background: url(http://res.cloudinary.com/cortehz/image/upload/v1517224597/portfolio/profile-1_hjigdy.jpg);"></div>
								<h1>
									<span class="my-name">Samuel Omanchi</span>
								</h1>
								<h3>
									<span>Web Developer / Budding Writer</span>
								</h3>
								<p>
									<ul class="fh5co-social-icons">
										<li>
											<a href="https://twitter.com/cortehzz">
												<i class="fab fa-twitter"></i>
											</a>
										</li>

										<li>
											<a href="https://www.linkedin.com/in/samuel-omanchi-aa49708a/">
												<i class="fab fa-linkedin-in"></i>
											</a>
										</li>
										<li>
											<a href="https://github.com/cortehz">
												<i class="fab fa-github" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
            </div>
		</header>
		</div>

		
<div class="chat_window">
	<div class="top_menu"><div class="buttons"><div class="button close"></div><div class="button minimize"></div><div class="button maximize"></div></div><div class="title">Chat</div></div><ul class="messages"></ul><div class="bottom_wrapper clearfix"><div class="message_input_wrapper"><input class="message_input" placeholder="Type your message here..." /></div><div class="send_message"><div class="icon"></div><div class="text">Send</div></div></div></div><div class="message_template"><li class="message"><div class="avatar"></div><div class="text_wrapper"><div class="text"></div></div></li></div>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script>
	(function () {
    var Message;
    Message = function (arg) {
        this.text = arg.text, this.message_side = arg.message_side;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };
    $(function () {
        var getMessageText, message_side, sendMessage;
        message_side = 'right';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = message_side === 'left' ? 'right' : 'left';
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };
        $('.send_message').click(function (e) {
            return sendMessage(getMessageText());
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText());
            }
        });
        sendMessage('Hello Philip! :)');
        setTimeout(function () {
            return sendMessage('Hi Sandy! How are you?');
        }, 1000);
        return setTimeout(function () {
            return sendMessage('I\'m fine, thank you!');
        }, 2000);
    });
}.call(this));
</script>
</body>

</html>
<!DOCTYPE HTML>

<html>
	<head>

 <?php


   try {
   $sql = 'SELECT * FROM secret_word';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
       die("Could not query the database:" . $e->getMessage());
     }
   $result = $q->fetch();
   $secret_word = $result['secret_word'];

   ?>
 


		<title>Ashibekong John Ishado</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<meta name="author" content="Ashibekong John Ishado">
		<meta name="description" content="Web Developer">



		<script>
			
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77783023-1', 'auto');
		  ga('send', 'pageview');
		  
		  function _gaLt(t){if(ga.hasOwnProperty("loaded")&&1==ga.loaded){for(var e=t.srcElement||t.target;e&&("undefined"==typeof e.tagName||"a"!=e.tagName.toLowerCase()||!e.href);)e=e.parentNode;if(e&&e.href){var a=e.href;if(-1==a.indexOf(location.host)&&!a.match(/^javascript\:/i)){var n=(e.target&&!e.target.match(/^_(self|parent|top)$/i)?e.target:!1,!1),o=function(){n||(n=!0,window.location.href=a)};e.target&&!e.target.match(/^_(self|parent|top)$/i)?ga("send","event","Outgoing Links",a,document.location.pathname+document.location.search):(ga("send","event","Outgoing Links",a,document.location.pathname+document.location.search,{hitCallback:o}),setTimeout(o,1e3),t.preventDefault?t.preventDefault():t.returnValue=!1)}}}}var w=window;w.addEventListener?w.addEventListener("load",function(){document.body.addEventListener("click",_gaLt,!1)},!1):w.attachEvent&&w.attachEvent("onload",function(){document.body.attachEvent("onclick",_gaLt)});
		  
		</script>

<style>

@import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,900");
@import url("font-awesome.min.css");


	html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}

	article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
		display: block;
	}

	body {
		line-height: 1;
	}

	ol, ul {
		list-style: none;
	}

	blockquote, q {
		quotes: none;
	}

	blockquote:before, blockquote:after, q:before, q:after {
		content: '';
		content: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	body {
		-webkit-text-size-adjust: none;
	}

/* Box Model */

	*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

/* Basic */

	body, input, select, textarea {
		color: #fff;
		font-family: 'Source Sans Pro', sans-serif;
		font-size: 15pt;
		font-weight: 300 !important;
		letter-spacing: -0.025em;
		line-height: 1.75em;
	}

	body {
		background: red;
		overflow: hidden;
	}

		body.loading * {
			-moz-animation: none !important;
			-webkit-animation: none !important;
			-ms-animation: none !important;
			animation: none !important;
		}

	a {
		-moz-transition: border-color 0.2s ease-in-out;
		-webkit-transition: border-color 0.2s ease-in-out;
		-ms-transition: border-color 0.2s ease-in-out;
		transition: border-color 0.2s ease-in-out;
		border-bottom: dotted 1px;
		color: inherit;
		outline: 0;
		text-decoration: none;
	}

		a:hover {
			border-color: transparent;
		}

	.icon {
		text-decoration: none;
		position: relative;
	}

		.icon:before {
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-transform: none !important;
		}

		.icon > .label {
			display: none;
		}

/* Wrapper */

	@-moz-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-webkit-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-ms-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	#wrapper {
		-moz-animation: wrapper 3s forwards;
		-webkit-animation: wrapper 3s forwards;
		-ms-animation: wrapper 3s forwards;
		animation: wrapper 3s forwards;
		height: 100%;
		left: 0;
		opacity: 0;
		position: fixed;
		top: 0;
		width: 100%;
	}

/* BG */

	#bg {

		background: black;
		height: 100%;
		left: 0;
		opacity: 1;
		position: fixed;
		top: 0;
	}
	#main {
		height: 100%;
		left: 0;
		position: fixed;
		text-align: center;
		top: 0;
		width: 100%;
	}

		#main:before {
			content: '';
			display: inline-block;
			height: 100%;
			margin-right: 0;
			vertical-align: middle;
			width: 1px;
		}

/* Header */

	@-moz-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-webkit-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-ms-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-moz-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-webkit-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-ms-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	#header {
		-moz-animation: header 1s 2.25s forwards;
		-webkit-animation: header 1s 2.25s forwards;
		-ms-animation: header 1s 2.25s forwards;
		animation: header 1s 2.25s forwards;
		-moz-backface-visibility: hidden;
		-webkit-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		backface-visibility: hidden;
		-moz-transform: translate3d(0,0,0);
		-webkit-transform: translate3d(0,0,0);
		-ms-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
		cursor: default;
		display: inline-block;
		opacity: 0;
		position: relative;
		text-align: center;
		top: -1em;
		vertical-align: middle;
		width: 90%;
	}

		#header h1 {
			font-size: 4.35em;
			font-weight: 900;
			letter-spacing: -0.035em;
			line-height: 1em;
		}

		#header p {
			font-size: 1.25em;
			margin: 0.75em 0 0.25em 0;
			opacity: 0.75;
		}

		#header nav {
			margin: 1.5em 0 0 0;
		}

			#header nav li {
				-moz-animation: nav-icons 0.5s ease-in-out forwards;
				-webkit-animation: nav-icons 0.5s ease-in-out forwards;
				-ms-animation: nav-icons 0.5s ease-in-out forwards;
				animation: nav-icons 0.5s ease-in-out forwards;
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
				display: inline-block;
				height: 5.35em;
				line-height: 5.885em;
				opacity: 0;
				position: relative;
				top: 0;
				width: 5.35em;
			}

				#header nav li:nth-child(1) {
					-moz-animation-delay: 2.5s;
					-webkit-animation-delay: 2.5s;
					-ms-animation-delay: 2.5s;
					animation-delay: 2.5s;
				}

				#header nav li:nth-child(2) {
					-moz-animation-delay: 2.75s;
					-webkit-animation-delay: 2.75s;
					-ms-animation-delay: 2.75s;
					animation-delay: 2.75s;
				}

				#header nav li:nth-child(3) {
					-moz-animation-delay: 3s;
					-webkit-animation-delay: 3s;
					-ms-animation-delay: 3s;
					animation-delay: 3s;
				}

				#header nav li:nth-child(4) {
					-moz-animation-delay: 3.25s;
					-webkit-animation-delay: 3.25s;
					-ms-animation-delay: 3.25s;
					animation-delay: 3.25s;
				}

				#header nav li:nth-child(5) {
					-moz-animation-delay: 3.5s;
					-webkit-animation-delay: 3.5s;
					-ms-animation-delay: 3.5s;
					animation-delay: 3.5s;
				}

				#header nav li:nth-child(6) {
					-moz-animation-delay: 3.75s;
					-webkit-animation-delay: 3.75s;
					-ms-animation-delay: 3.75s;
					animation-delay: 3.75s;
				}

				#header nav li:nth-child(7) {
					-moz-animation-delay: 4s;
					-webkit-animation-delay: 4s;
					-ms-animation-delay: 4s;
					animation-delay: 4s;
				}

				#header nav li:nth-child(8) {
					-moz-animation-delay: 4.25s;
					-webkit-animation-delay: 4.25s;
					-ms-animation-delay: 4.25s;
					animation-delay: 4.25s;
				}

				#header nav li:nth-child(9) {
					-moz-animation-delay: 4.5s;
					-webkit-animation-delay: 4.5s;
					-ms-animation-delay: 4.5s;
					animation-delay: 4.5s;
				}

				#header nav li:nth-child(10) {
					-moz-animation-delay: 4.75s;
					-webkit-animation-delay: 4.75s;
					-ms-animation-delay: 4.75s;
					animation-delay: 4.75s;
				}

			#header nav a {
				-webkit-tap-highlight-color: transparent;
				-webkit-touch-callout: none;
				border: 0;
				display: inline-block;
			}

				#header nav a:before {
					-moz-transition: all 0.2s ease-in-out;
					-webkit-transition: all 0.2s ease-in-out;
					-ms-transition: all 0.2s ease-in-out;
					transition: all 0.2s ease-in-out;
					border-radius: 100%;
					border: solid 1px #fff;
					display: block;
					font-size: 1.75em;
					height: 2.5em;
					line-height: 2.5em;
					position: relative;
					text-align: center;
					top: 0;
					width: 2.5em;
				}

				#header nav a:hover {
					font-size: 1.1em;
				}

					#header nav a:hover:before {
						background-color: rgba(255, 255, 255, 0.175);
						color: #fff;
					}

				#header nav a:active {
					font-size: 0.95em;
					background: none;
				}

					#header nav a:active:before {
						background-color: rgba(255, 255, 255, 0.35);
						color: #fff;
					}

				#header nav a span {
					display: none;
				}

/* Footer */


/* Really Wide */
	@media screen and (min-width: 1680px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 13pt;
			}
img{
				width: 720%;
				height: 720%
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-1500px,0,0);
					-webkit-transform: translate3d(-1500px,0,0);
					-ms-transform: translate3d(-1500px,0,0);
					transform: translate3d(-1500px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		#bg {
			background-size: 1500px auto;
			width: 4500px;
		} }

	@media screen and (max-width: 1680px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 13pt;
			}

img{
				width: 720%;
				height: 720%
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-1500px,0,0);
					-webkit-transform: translate3d(-1500px,0,0);
					-ms-transform: translate3d(-1500px,0,0);
					transform: translate3d(-1500px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		#bg {
			background-size: 1500px auto;
			width: 4500px;
		} }

/* Normal */

	@media screen and (max-width: 1280px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 12pt;
			}

img{
				width: 720%;
				height: 720%
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-750px,0,0);
					-webkit-transform: translate3d(-750px,0,0);
					-ms-transform: translate3d(-750px,0,0);
					transform: translate3d(-750px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
		}

		#bg {
			background-size: 750px auto;
			width: 2250px;
		} }

/* Mobile */

	@media screen and (max-width: 736px) {

		/* Basic */

			body {
				min-width: 320px;
			}

			body, input, select, textarea {
				font-size: 11pt;
			}
			img{
				width: 720%;
				height: 720%
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-300px,0,0);
					-webkit-transform: translate3d(-300px,0,0);
					-ms-transform: translate3d(-300px,0,0);
					transform: translate3d(-300px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
		}

		#bg {
			background-size: 300px auto;
			width: 900px;
		}

	/* Header */

		#header h1 {
			font-size: 2.5em;
		}

		#header p {
			font-size: 1em;
		}

		#header nav {
			font-size: 1em;
		}

			#header nav a:hover {
				font-size: 1em;
			}

			#header nav a:active {
				font-size: 1em;
			} }

/* Mobile (Portrait) */

	@media screen and (max-width: 480px) {

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-412.5px,0,0);
					-webkit-transform: translate3d(-412.5px,0,0);
					-ms-transform: translate3d(-412.5px,0,0);
					transform: translate3d(-412.5px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
		}

		#bg {
			background-size: 412.5px auto;
			width: 1237.5px;
		}

	

		#header nav {
			padding: 0 1em;
		} }


</style>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
					
					<?php
						echo "Time " . date("h:i:sa");
					?>


							<!-- <p>Time: <span id="datetime"></span></p> -->
						<h1>Ashibekong John Ishado</h1>
						<p>Web Developer &nbsp;&bull;&nbsp; MD of Ashibekong's Alumaco Company</p>
					<img src="https://res.cloudinary.com/df3etxpyj/image/upload/v1523626257/ishado.jpg" alt="Franklin" style="width:500px; height: 350px">
						<nav>
							<ul>
							<a href="https://twitter.com/ashibekong"><i class="fa fa-twitter"></i></i></a>
								<a href="https://web.facebook.com/ashibekongjohn.ishado/"><i class="fa fa-facebook"></i></i></a>
								<a href="https://github.com/johnishado" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>
						</nav>
					</header>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			
	// var dt = new Date();
	// document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>

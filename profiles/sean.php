<?php 

    try {

        $q = 'SELECT * FROM secret_word';

        $sql = $conn->query($q);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $data = $sql->fetch();

        $secret_word = $data["secret_word"];

    } catch (PDOException $err) {

        throw $err;

    }?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Seun Adebanwo</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link href="http://fonts.googleapis.com/css?family=Englebert|Open+Sans:400,600,700" rel="stylesheet" type="text/css">

<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>

<style>


html, body
{
	height: 100%;
}

body
{
	margin-top: 50px;
	padding: 0px;
	background:#212529;
	font-family: 'Open Sans', sans-serif;
	font-size: 10pt;
	color: #737373;
}

h1, h2, h3
{
	margin: 0;
	padding: 0;
	font-family: 'Englebert', sans-serif;
	color: #111021;
}

h2
{
	font-weight: 400;
	font-size: 2.00em;
	color: #17165f;
}

p, ol, ul
{
	margin-top: 0px;
}

p
{
	line-height: 180%;
	margin: 30px 0px 30px 0px;
}


a
{
	color: #8C2287;
}

a:hover
{
	text-decoration: none;
}

a img
{
	border: none;
}

img.alignleft
{
	float: left;
}

img.alignright
{
	float: right;
}

img.aligncenter
{
	margin: 0px auto;
}

hr
{
	display: none;
}

/** WRAPPER */

#wrapper
{
	overflow: hidden;
	background: #FFFFFF;
	box-shadow: 0px 0px 20px 5px rgba(0,0,0,.10);
	border-radius: 40px;	
}

.container
{
	width: 380px;
	margin: 0px auto;	
}

.clearfix
{
	clear: both;
}

/** HEADER */

#header
{
	overflow: hidden;
	width: 920px;
	padding: 0px 0px;
	padding-top: 10px;
}

/** LOGO */

#logo
{
	float: left;
	width: 400px;
	height: 100px;
}


#logo h1 a
{
	line-height: 100px;
	text-decoration: none;
	font-size: 2em;
	font-weight: 400;
	color: #FFFFFF;
	width: 400px;
}

/** MENU */

#menu
{
	float: right;
	width: 650px;
	height: 80px;
	margin-top: 20px;
	background: #8C2287;
	box-shadow: 0px 0px 10px 1px rgba(0,0,0,.10);
	border-radius: 20px 20px 0px 0px;
}

#menu ul
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	line-height: normal;
	text-align: center;
}

#menu li
{
	display: inline-block;
	padding: 0px 20px;
}

#menu a
{
	display: block;
	line-height: 80px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}

#menu a:hover
{
	text-decoration: underline;
}

/** PAGE */

#page
{
	overflow: hidden;
	padding: 50px 0px;
	
}

#page h2
{
	padding-bottom: 20px;
}

/** CONTENT */

#content
{
	float: left;
	width: auto;
}

/** SIDEBAR */

#sidebar
{
	float: right;
	width: 280px;
}

#sidebar #sbox1
{
	margin-bottom: 30px;
}

/* Footer */

#footer
{
	overflow: hidden;
	padding:  0px 30px 0px;
	color: #C54F7F;
}

#footer p
{
	text-align: center;
}

#footer a
{
	color: #CE6790;
}

.image-style img
{
	margin-bottom: 2em;
	border-radius: 30px;
	padding: 0px 40px;
	width: 300px;
}

/** LIST STYLE 1 */

.list-style1
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	font-family: 'Open Sans', sans-serif;
	color: #777777;
}

.list-style1 li
{
	padding: 10px 0px 10px 0px;
	border-top: 1px solid #D6D6D6;
}

.list-style1 a
{
	color: #777777;
}

.list-style1 h3
{
	padding: 10px 0px 5px 0px;
	font-weight: 500;
	color: #444444;
}

.list-style1 .posted
{
	padding: 0px 0px 0px 0px;
}

.list-style1 .first
{
	border-top: 0px;
	padding-top: 0px;
}

/** LIST STYLE 2 */

.list-style2
{
	margin: 0px;
	padding: 0px;
	list-style: none;
}

.list-style2 li
{
	padding: 10px 0px 20px 0px;
	border-top: 1px solid #C9C9C9;
}

.list-style2 a
{
	color: #777777;
}

.list-style2 .first
{
	padding-top: 0px;
	border-top: 0px;
}

.link-style1
{
	display: inline-block;
	margin-top: 20px;
	background: #8C2287;
	border-radius: 10px;
	padding: 10px 30px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}


</style>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">@Sean</a></h1>
	</div>	
</div>
<div id="wrapper" class="container">
	<div id="page" style="width: 350px;">
		<div id="content"> <a href="#" class="image-style" style="padding-right: 40px;padding-left: 30px;width: 370.797px;"><img src="http://res.cloudinary.com/findseun/image/upload/c_scale,e_art:incognito,h_300,w_300/v1526568848/TADLXHY5C-UALFCDWSY-ae04f7662e4c-512.png" width="300" height="300" alt=""></a>
			<h2>Full Stack Elemente</h2>					
					<p style="margin-top: 0px;margin-left: 20px;border-right-width: 20px;margin-right: 20px;">Its all in your mind. Full Stack, Empty of Worries</p>				
	</div>
</div>
</body>
</html>
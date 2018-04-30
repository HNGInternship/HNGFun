<?php

try {
       $sql = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE username = \'OG\'';
       $query = $conn->query($sql);
       $query->setFetchMode(PDO::FETCH_ASSOC);
       $data = $query->fetch();
       $secret_word = $data['secret_word'];
       throw $e;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OG Loves to Code</title>
<meta name="description" content="">
<meta name="author" content="Godswill okokon">
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<!-- Plugin CSS -->
<link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<style type="text/css">

html {
  font-family: sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
}
body {
  margin: 0;
}
article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary {
  display: block;
}
audio,canvas,progress,video {
  display: inline-block;
  vertical-align: baseline;
}

a {
  background-color: transparent;
}
a:active,
a:hover {
  outline: 0;
}
abbr[title] {
  border-bottom: 1px dotted;
}
b,
strong {
  font-weight: bold;
}
dfn {
  font-style: italic;
}
h1 {
  margin: .67em 0;
  font-size: 2em;
}
mark {
  color: #000;
  background: #ff0;
}
small {
  font-size: 80%;
}
sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline;
}
sup {
  top: -.5em;
}
sub {
  bottom: -.25em;
}
img {
  border: 0;
}
svg:not(:root) {
  overflow: hidden;
}
figure {
  margin: 1em 40px;
}
hr {
  height: 0;
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
}
pre {
  overflow: auto;
}
code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em;
}
button,input,optgroup,select,textarea {
  margin: 0;
  font: inherit;
  color: inherit;
}
button {
  overflow: visible;
}
button,
select {
  text-transform: none;
}
button,
html input[type="button"],input[type="reset"],input[type="submit"] { -webkit-appearance: button;cursor: pointer;
}
button[disabled],
html input[disabled] {
  cursor: default;
}
button::-moz-focus-inner,
input::-moz-focus-inner {
  padding: 0;
  border: 0;
}
input {
  line-height: normal;
}
textarea {
  overflow: auto;
}
optgroup {
  font-weight: bold;
}
table {
  border-spacing: 0;
  border-collapse: collapse;
}
td,
th {
  padding: 0;
}
@media print {
  *,  *:before,*:after {
    color: #000 !important;  text-shadow: none !important;  background: transparent !important;  -webkit-box-shadow: none !important;  box-shadow: none !important;
  }
  a,
  a:visited {
    text-decoration: underline;
  }
  a[href]:after {
    content: " (" attr(href) ")";
  }
  abbr[title]:after {
    content: " (" attr(title) ")";
  }
  a[href^="#"]:after,
  a[href^="javascript:"]:after {
    content: "";
  }
  pre,
  blockquote {
    border: 1px solid #999;

    page-break-inside: avoid;
  }
  thead {
    display: table-header-group;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }
  h2,
  h3 {
    page-break-after: avoid;
  }
  select {
    background: #fff !important;
  }
  .navbar {
    display: none;
  }
  .btn > .caret,
  .dropup > .btn > .caret {
    border-top-color: #000 !important;
  }
  .label {
    border: 1px solid #000;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
* {
  -webkit-box-sizing: border-box; -moz-box-sizing: border-box;    box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
html {
  font-size: 10px;

  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}
input,button,select,textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
a {
  color: #337ab7;
  text-decoration: none;
}
a:hover,
a:focus {
  color: #23527c;
  text-decoration: underline;
}
a:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
figure {
  margin: 0;
}
img {
  vertical-align: middle;
}

hr {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 0;
  border-top: 1px solid #eee;
}

@media (min-width: 768px) {
  .lead {
    font-size: 21px;
  }
}
small,
.small {
  font-size: 85%;
}
mark,
.mark {
  padding: .2em;
  background-color: #fcf8e3;
}
.text-left {
  text-align: left;
}
.text-right {
  text-align: right;
}
.text-center {
  text-align: center;
}
.text-justify {
  text-align: justify;
}
.text-nowrap {
  white-space: nowrap;
}
.text-lowercase {
  text-transform: lowercase;
}
.text-uppercase {
  text-transform: uppercase;
}
.text-capitalize {
  text-transform: capitalize;
}
.text-primary {
  color: #337ab7;
}
a.text-primary:hover {
  color: #286090;
}
.text-success {
  color: #3c763d;
}
a.text-success:hover {
  color: #2b542c;
}
.text-info {
  color: #31708f;
}
a.text-info:hover {
  color: #245269;
}
.text-warning {
  color: #8a6d3b;
}
a.text-warning:hover {
  color: #66512c;
}
.text-danger {
  color: #a94442;
}
a.text-danger:hover {
  color: #843534;
}

ul,
ol {
  margin-top: 0;
  margin-bottom: 10px;
}
ul ul,
ol ul,
ul ol,
ol ol {
  margin-bottom: 0;
}

dl {
  margin-top: 0;
  margin-bottom: 20px;
}
dt,
dd {
  line-height: 1.42857143;
}
dt {
  font-weight: bold;
}
dd {
  margin-left: 0;
}

.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
.container-fluid {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.row {
  margin-right: -15px;
  margin-left: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}


@media (min-width: 992px) {
  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-11 {
    width: 91.66666667%;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-8 {
    width: 66.66666667%;
  }
  .col-md-7 {
    width: 58.33333333%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-5 {
    width: 41.66666667%;
  }
  .col-md-4 {
    width: 33.33333333%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-2 {
    width: 16.66666667%;
  }
  .col-md-1 {
    width: 8.33333333%;
  }
  .col-md-pull-12 {
    right: 100%;
  }
  .col-md-pull-11 {
    right: 91.66666667%;
  }
  .col-md-pull-10 {
    right: 83.33333333%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-8 {
    right: 66.66666667%;
  }
  .col-md-pull-7 {
    right: 58.33333333%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-5 {
    right: 41.66666667%;
  }
  .col-md-pull-4 {
    right: 33.33333333%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-2 {
    right: 16.66666667%;
  }
  .col-md-pull-1 {
    right: 8.33333333%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-push-12 {
    left: 100%;
  }
  .col-md-push-11 {
    left: 91.66666667%;
  }
  .col-md-push-10 {
    left: 83.33333333%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-8 {
    left: 66.66666667%;
  }
  .col-md-push-7 {
    left: 58.33333333%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-5 {
    left: 41.66666667%;
  }
  .col-md-push-4 {
    left: 33.33333333%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-2 {
    left: 16.66666667%;
  }
  .col-md-push-1 {
    left: 8.33333333%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-offset-12 {
    margin-left: 100%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-md-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-md-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-md-offset-0 {
    margin-left: 0;
  }
}
.nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.nav > li {
  position: relative;
  display: block;
}
.nav > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li {
    display: table-cell;
    width: 1%;
  }
  .nav-tabs.nav-justified > li > a {
    margin-bottom: 0;
  }
}
.nav-tabs.nav-justified > li > a {
  margin-right: 0;
  border-radius: 4px;
}
.nav-tabs.nav-justified > .active > a,
.nav-tabs.nav-justified > .active > a:hover,
.nav-tabs.nav-justified > .active > a:focus {
  border: 1px solid #ddd;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li > a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0;
  }
  .nav-tabs.nav-justified > .active > a,
  .nav-tabs.nav-justified > .active > a:hover,
  .nav-tabs.nav-justified > .active > a:focus {
    border-bottom-color: #fff;
  }
}
.nav-pills > li {
  float: left;
}
.nav-pills > li > a {
  border-radius: 4px;
}
.nav-pills > li + li {
  margin-left: 2px;
}

@media (min-width: 768px) {
  .nav-tabs-justified > li > a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0;
  }
  .nav-tabs-justified > .active > a,
  .nav-tabs-justified > .active > a:hover,
  .nav-tabs-justified > .active > a:focus {
    border-bottom-color: #fff;
  }
}
.tab-content > .tab-pane {
  display: none;
}
.tab-content > .active {
  display: block;
}
.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.navbar {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
}
@media (min-width: 768px) {
  .navbar {
    border-radius: 4px;
  }
}
@media (min-width: 768px) {
  .navbar-header {
    float: left;
  }
}

.navbar-collapse.in {
  overflow-y: auto;
}
@media (min-width: 768px) {
  .navbar-collapse {
    width: auto;
    border-top: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
  .navbar-collapse.collapse {
    display: block !important;
    height: auto !important;
    padding-bottom: 0;
    overflow: visible !important;
  }
  .navbar-collapse.in {
    overflow-y: visible;
  }
  .navbar-fixed-top .navbar-collapse,
  .navbar-static-top .navbar-collapse,
  .navbar-fixed-bottom .navbar-collapse {
    padding-right: 0;
    padding-left: 0;
  }
}
.navbar-fixed-top .navbar-collapse,
.navbar-fixed-bottom .navbar-collapse {
  max-height: 340px;
}
@media (max-device-width: 480px) and (orientation: landscape) {
  .navbar-fixed-top .navbar-collapse,
  .navbar-fixed-bottom .navbar-collapse {
    max-height: 200px;
  }
}
.container > .navbar-header,
.container-fluid > .navbar-header,
.container > .navbar-collapse,
.container-fluid > .navbar-collapse {
  margin-right: -15px;
  margin-left: -15px;
}

.navbar-static-top {
  z-index: 1000;
  border-width: 0 0 1px;
}
.navbar-fixed-top {
  top: 0;
  border-width: 0 0 1px;
}
.navbar-fixed-bottom {
  bottom: 0;
  margin-bottom: 0;
  border-width: 1px 0 0;
}
.navbar-brand {
  float: left;
  height: 50px;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}
.navbar-brand:hover,
.navbar-brand:focus {
  text-decoration: none;
}
.navbar-brand > img {
  display: block;
}

@media (min-width: 768px) {
  .navbar-nav {
    float: left;
    margin: 0;
  }
  .navbar-nav > li {
    float: left;
  }
  .navbar-nav > li > a {
    padding-top: 15px;
    padding-bottom: 15px;
  }
}

@media (min-width: 768px) {
  .navbar-text {
    float: left;
    margin-right: 15px;
    margin-left: 15px;
  }
}
@media (min-width: 768px) {
  .navbar-left {
    float: left !important;
  }
  .navbar-right {
    float: right !important;
    margin-right: -15px;
  }
  .navbar-right ~ .navbar-right {
    margin-right: 0;
  }
}

.clearfix:before,
.clearfix:after,
.dl-horizontal dd:before,
.dl-horizontal dd:after,
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after,
.form-horizontal .form-group:before,
.form-horizontal .form-group:after,
.btn-toolbar:before,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:before,
.btn-group-vertical > .btn-group:after,
.nav:before,
.nav:after,
.navbar:before,
.navbar:after,
.navbar-header:before,
.navbar-header:after,
.navbar-collapse:before,
.navbar-collapse:after,
.pager:before,
.pager:after,
.panel-body:before,
.panel-body:after,
.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}
.clearfix:after,
.dl-horizontal dd:after,
.container:after,
.container-fluid:after,
.row:after,
.form-horizontal .form-group:after,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:after,
.nav:after,
.navbar:after,
.navbar-header:after,
.navbar-collapse:after,
.pager:after,
.panel-body:after,
.modal-footer:after {
  clear: both;
}
.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
.pull-right {
  float: right !important;
}
.pull-left {
  float: left !important;
}
.hide {
  display: none !important;
}
.show {
  display: block !important;
}
.invisible {
  visibility: hidden;
}
.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
.hidden {
  display: none !important;
}
.affix {
  position: fixed;
}
@media (max-width: 767px) {
  .visible-xs {
    display: block !important;
  }
  table.visible-xs {
    display: table;
  }
  tr.visible-xs {
    display: table-row !important;
  }
  th.visible-xs,
  td.visible-xs {
    display: table-cell !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-block {
    display: block !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-inline {
    display: inline !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-inline-block {
    display: inline-block !important;
  }
}

/*# sourceMappingURL=bootstrap.css.map */

body, html {
	font-family: 'Open Sans', sans-serif;
	text-rendering: optimizeLegibility !important;
	-webkit-font-smoothing: antialiased !important;
	color: #000000;
	width: 100% !important;
	height: 100% !important;
}
h1 {
	font-weight: 700;
}
h1 strong {
	font-weight: 900;
}
h2 {
	line-height: 20px;
	margin: 0;
	color: grey;
	font-weight: 400;
	margin-bottom: 30px;
	font-size: 34px;
}
h3, h4 {
	color: #121d1f;
	font-size: 20px;
	font-weight: 600;
}
h5 {
	text-transform: uppercase;
	font-weight: 700;
	line-height: 20px;
}
p.intro {
	font-size: 16px;
	margin: 12px 0 0;
	line-height: 24px;
	font-family: 'Open Sans', sans-serif;
}
a {
	color: #333;
}
a:hover, a:focus {
	text-decoration: none;
	color: #7bc3d1;
}
ul, ol {
	list-style: none;
}
.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}
.clearfix {
	display: inline-block;
}
* html .clearfix {
	height: 1%;
}
.clearfix {
	display: block;
}
ul, ol {
	padding: 0;
	webkit-padding: 0;
	moz-padding: 0;
}
hr {
	height: 4px;
	width: 70px;
	text-align: center;
	position: relative;
	background: #7bc3d1;
	margin: 0 auto;
	margin-bottom: 30px;
	border: 0;
}
/* Navigation */
#nav {
	z-index: 9999;
}
#nav.affix {
	position: fixed;
	top: 0;
	width: 100%
}
.navbar-custom {
	margin-bottom: 0;
	background-color: #121d1f;
	border-radius: 0px;
	padding: 10px 0;
}
.navbar-custom .navbar-brand {
	font-weight: 600;
}
.navbar-custom .navbar-brand:focus {
	outline: 0;
}
.navbar-custom .navbar-brand .navbar-toggle {
	padding: 4px 6px;
	font-size: 16px;
	color: #fff;
}
.navbar-custom .navbar-brand .navbar-toggle:focus, .navbar-custom .navbar-brand .navbar-toggle:active {
	outline: 0;
}
.navbar-custom a {
	color: #f4f5f6;
}
.navbar-custom .nav li a {
	text-transform: uppercase;
	letter-spacing: 1px;
	-webkit-transition: background .3s ease-in-out;
	-moz-transition: background .3s ease-in-out;
	transition: background .3s ease-in-out;
}
.navbar-custom .nav li a:hover {
	outline: 0;
	color: #7bc3d1;
	background-color: transparent;
}
.navbar-custom .nav li a:focus, .navbar-custom .nav li a:active {
	outline: 0;
	background-color: transparent;
	color: #7bc3d1;
}
.btn-primary {
	color: #fff;
	background-color: #121d1f;
	padding: 10px 20px;
	border-color: #121d1f;
	border-radius: 0;
}

/* Home Section */
.intro {
	display: table;
	width: 100%;
	height: auto;
	padding: 100px 0;
	text-align: center;
	color: #fff;
	background: url(https://res.cloudinary.com/dchvdgnh8/image/upload/v1524772688/intro-bg.jpg) no-repeat center top;
	background-color: #7bc3d1;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	background-size: cover;
	-o-background-size: cover;
}
.section-title.center {
	padding: 25px 0 45px 0;
}
/* About Section */
#about {
	padding: 100px 0;
	background: #7bc3d1;
}
#about .about-text {
	margin-left: 10px;
}
#about img {
	border-radius: 40%;
	width: 250px;
	height: 300px;
	vertical-align: center;
	display: inline-block;
}
#about p {
	margin-top: 20px;
	margin-bottom: 30px;
  font-weight: 50px;
  font-size: 20px;
}
/* Resume Section */
#resume {
	padding: 100px 0;
	background: #f6f6f6;
}
.timeline {
	position: relative;
	padding: 0;
	list-style: none;
}
.timeline:before {
	content: "";
	position: absolute;
	top: 0;
	bottom: 0;
	left: 40px;
	width: 2px;
	margin-left: -1.5px;
	background-color: #eee;
}
.timeline>li {
	position: relative;
	margin-bottom: 50px;
	min-height: 50px;
}
.timeline>li:before, .timeline>li:after {
	content: " ";
	display: table;
}
.timeline>li:after {
	clear: both;
}
.timeline>li .timeline-panel {
	float: right;
	position: relative;
	width: 100%;
	padding: 0 20px 0 100px;
	text-align: left;
}
.timeline>li .timeline-panel:before {
	right: auto;
	left: -15px;
	border-right-width: 15px;
	border-left-width: 0;
}
.timeline>li .timeline-panel:after {
	right: auto;
	left: -14px;
	border-right-width: 14px;
	border-left-width: 0;
}
.timeline>li .timeline-image {
	z-index: 100;
	position: absolute;
	left: 0;
	width: 70px;
	height: 70px;
	margin-left: 0;
	border: 1px solid #eee;
	border-radius: 100%;
	text-align: center;
	background: #fff;
}
.timeline>li .timeline-image h4 {
	margin-top: 20px;
	font-size: 14px;
	text-transform: uppercase;
}
.timeline>li.timeline-inverted>.timeline-panel {
	float: right;
	padding: 0 20px 0 100px;
	text-align: left;
}
.timeline>li.timeline-inverted>.timeline-panel:before {
	right: auto;
	left: -15px;
	border-right-width: 15px;
	border-left-width: 0;
}
.timeline>li.timeline-inverted>.timeline-panel:after {
	right: auto;
	left: -14px;
	border-right-width: 14px;
	border-left-width: 0;
}
.timeline>li:last-child {
	margin-bottom: 40px;
}
.timeline .timeline-heading h4 {
	margin-top: 0;
	text-transform: uppercase;
	font-size: 16px;
}
.timeline .timeline-heading h2 {
	margin-top: 30px;
}
.timeline .timeline-heading h4.subheading {
	text-transform: none;
	color: #629ca7;
	font-size: 20px;
}
.timeline .timeline-body>p, .timeline .timeline-body>ul {
	margin-bottom: 0;
}
/* Contact Section */
#contact {
	padding: 100px 0 40px 0;
	color: #121d1f;
	background: #7bc3d1;
}
#contact h2 {
	color: #fff;
}
#contact hr {
	background: rgba(255,255,255,0.3);
}
#contact h3 {
	padding-top: 20px;
	font-size: 20px;
	font-weight: 400;
	color: #fff;
}
#contact form {
	padding: 30px 0;
}
#contact i.fa {
	color: #121d1f;
	margin-bottom: 10px;
}
#contact .text-danger {
	color: #E87E04;
	text-align: left;
}
label {
	font-size: 12px;
	font-weight: 400;
	font-family: 'Open Sans', sans-serif;
	float: left;
}
#contact .form-control {
	display: block;	width: 100%;	padding: 6px 12px; font-size: 14px; line-height: 1.42857143; color: #2c3e50;	background-color: rgba(255,255,255,0.8);
	background-image: none; border: 0; border-radius: 2px; -webkit-box-shadow: none; box-shadow: none; -webkit-transition: none;
	-o-transition: none; transition: none;
}
#contact .form-control:focus {
	border-color: inherit;
	outline: 0;
	-webkit-box-shadow: transparent;
	box-shadow: transparent;
}
.form-control::-webkit-input-placeholder {
color: #2c3e50;
}
.form-control:-moz-placeholder {
color: #2c3e50;
}
.form-control::-moz-placeholder {
color: #2c3e50;
}
.form-control:-ms-input-placeholder {
color: #2c3e50;
}
#contact .social {
	margin-top: 60px;
}
#contact .social ul li {
	display: inline-block;
	margin: 0 20px;
}
#contact .social i.fa {
	font-size: 30px;
	padding: 4px 5px;
	color: #fff;
	transition: all 0.5s;
}
#contact .social i.fa:hover {
	color: #121d1f;
}
#contact .btn {
	background-color: transparent;
	border: 1px solid #fff;
	border-radius: 0;
	padding: 10px 20px;
	color: #fff;
	margin-top: 15px;
}
#contact .btn:hover, #contact .btn:focus {
	background-color: #121d1f;
	border: 1px solid #121d1f;
}
.btn:active, .btn.active {
	background-image: none;
	outline: 0;
	-webkit-box-shadow: none;
	box-shadow: none;
}
a:focus, .btn:focus, .btn:active:focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn.active.focus {
	outline: none;
	outline-offset: none;
}
/* Media Queries */
@media(min-width:768px) {
.intro {
	height: 100%;
	padding: 0;
	text-align: left;
	color: #fff;
}
.intro H1 {
	font-size: 60px;
	font-weight: 500;
	letter-spacing: -2px;
	color: gray;
}
.intro .name {
	font-weight: 600;
	color:  black;
}
.intro .intro-text {
	max-width: 75%;
}

.intro .intro-text p {
	font-family: 'Lato', sans-serif;
	font-size: 20px;
	margin-bottom: 40px;
	margin-top: 20px;
}
section {
	padding: 120px 0;
}
header .intro-text {
	padding-top: 300px;
	padding-bottom: 200px;
}
.timeline>li .timeline-panel {
	float: left;
	width: 41%;
	padding: 0 20px 20px 30px;
	text-align: right;
}
.timeline>li .timeline-image {
	left: 50%;
	width: 100px;
	height: 100px;
	margin-left: -50px;
}
.line{
	font-weight: 100;
	color: black;
	font-size: 35px;
}
</style>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h1>Hello, I'm <span class="name">Godswill Okokon</span></h1>  <br>
          <h2><span class="typing"></span></h2>
          <br><br> <h2> <strong> You Can Also Call Me</strong>  <span class="name">OG</span></h2>
          <br> <p> <div class="line">I'm a Full Stack Web Developer</div> </p>
          <a href="#about" class="btn btn-primary btn-lg page-scroll">Learn More</a> </div>
      </div>
    </div>
  </div>
</header>
<!-- Navigation -->
<div id="nav">
  <nav class="navbar navbar-custom">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
        <a class="navbar-brand page-scroll" href="#page-top">Godswill Okokon - Front End & Back End Developer</a> </div>
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="hidden"> <a href="#page-top"></a> </li>
          <li> <a class="page-scroll" href="#about">About Me</a> </li>
          <li> <a class="page-scroll" href="#skills">My Skills</a> </li>
          <li> <a class="page-scroll" href="#resume">My Resume</a> </li>
          <li> <a class="page-scroll" href="#contact">Contact Me</a> </li>
        </ul>
      </div>
    </div><br>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="Hotels.ng"> Hotels.ng Internship 4</a> </div>
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="../index.php">HNG HomePage</a> </li>
        <li class="nav-item"> <a class="nav-link" href="../learn.php">Learn About HNG</a>  </li>
        <li class="nav-item"> <a class="nav-link" href="../listing.php">Interns in HNG</a> </li>
        <li class="nav-item"> <a class="nav-link" href="../admin.php">Register For HNG</a> </li>
        <li class="nav-item"> <a class="nav-link" href="../testimonies.php">HNG Testimonies</a> </li>
      </ul>
    </div>
  </div>
  </nav>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>About Me</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-12 text-center"><img src="https://res.cloudinary.com/dchvdgnh8/image/upload/v1524772448/WhatsApp_Image_2018-04-24_at_11.20.37_PM.jpg" class="img-responsive"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="about-text">
          <p>
          My Name is Godswill Okokon, I'm a full stack web developer who loves the magic of backend, Godswill Okokon loves creating things
          <br>I'm the web developer from the future(..winks..),<br> Some people call me OG, I love creamy cakes and i also have a thing for roasted plantain, <br> Music is his esacpe to blow off steam when ever he's in a funk about any situation or something,<br> I'm passionate about learning and developing myself in everything that has to do with life and Tech.<br>
          I'm more of a twitter person than any other social media platform,
          just make sure to follow me at the bottom of the page.
          <br>Apart from coding and developing stuffs, <br> OG is a movie person, he also loves playing video games and  watching football.<br>I'm an Ambassador of Ingressive Community, Representing Cross River University of Technology, Calabar Campus.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Resume Section -->
<div id="resume" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Experience</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
          <li class="timeline-inverted">
            <div class="timeline-image">
              <h4>May 2018 <br>
                - <br>
                persent </h4>
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>Hostels.ng</h4>
                <h4 class="subheading">Intership On Standard Web Developement.</h4>
              </div>
              <div class="timeline-body">
                <p>The Internship Experience is Awesome </p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-image">
              <h4>Feb 2018 <br>
                - <br>
                persent </h4>
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>Front-endX</h4>
                <h4 class="subheading">Front-end Development.</h4>
              </div>
              <div class="timeline-body">
                <p>I recently Joined A Tech Cluster To boost My Skills In Front-end development skills, using REACT.js And Many Other Technologies Too.</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section-title center">
      <h2><br><br>Education</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
          <!-- Education Section-->
         <li class="timeline-inverted">
            <div class="timeline-image">
              <h4>2016 <br>
                - <br>
                2019 </h4>
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>Cross River University of Technology, <br>Calabar, Nigeria.</h4>
                <h4 class="subheading">Degree: Barchelor Degree in Computer Science.</h4>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact</h2>
      <hr>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4"> <i class="fa fa-map-marker fa-2x"></i>
        <p>15 Harcourt St,<br>
          Calabar, Nigeria </p>
      </div>
      <div class="col-md-4"> <i class="fa fa-envelope-o fa-2x"></i>
        <p>godswillokokon3@gmail.com</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-phone fa-2x"></i>
        <p> +234 8177 024 847</p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <h3>If you are looking for a strategist and experienced developer, <br>just leave me a message and I'll contact you soon.</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>

        <?php
        // Check for empty fields
        if(empty($_POST['name'])  		||
           empty($_POST['email']) 		||
           empty($_POST['message'])	||
           !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
           {
        	//echo "No arguments Provided!";
        	return false;
           }

        $name = $_POST['name'];
        $email_address = $_POST['email'];
        $message = $_POST['message'];
        // Create the email and send the message
        $to = 'Godswillokokon3@oglovescode.000webhostapp.com/.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "Website Contact Form:  $name";
        $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
        $headers = "From: noreply@oglovescode.000webhostapp.com/.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address";
        mail($to,$email_subject,$email_body,$headers);
        return true;
        ?>
      </form>
      <div class="social">
        <ul>
          <li><a href="https://twitter.com/Godswillokokon"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://github.com/godswillokokon"><i class="fa fa-github"></i></a></li>
          <li><a href="https://www.instagram.com/l_am_godswill/"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 Designed by OG  <br>ALL RIGHTS RESERVED</p>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Custom scripts for this template -->
<script src="../js/creative.min.js"></script>
</body>
</html>

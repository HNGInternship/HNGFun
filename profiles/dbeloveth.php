<?php 
  require 'db.php';
?>
<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'dbeloveth'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Ilesanmi Samuel Profile</title>


<style>

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
  display: block;
}

audio,
canvas,
video {
  display: inline-block;
}

audio:not([controls]) {
  display: none;
  height: 0;
}

[hidden] {
  display: none;
}

html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}

body {
  margin: 0;
}

a:focus {
  outline: thin dotted;
}

a:active,
a:hover {
  outline: 0;
}

h1 {
  margin: 0.67em 0;
  font-size: 2em;
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

hr {
  height: 0;
  -moz-box-sizing: content-box;
       box-sizing: content-box;
}

mark {
  color: #000;
  background: #ff0;
}

code,
kbd,
pre,
samp {
  font-family: monospace, serif;
  font-size: 1em;
}

pre {
  white-space: pre-wrap;
}

q {
  quotes: "\201C" "\201D" "\2018" "\2019";
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
  top: -0.5em;
}

sub {
  bottom: -0.25em;
}

img {
  border: 0;
}

svg:not(:root) {
  overflow: hidden;
}

figure {
  margin: 0;
}

fieldset {
  padding: 0.35em 0.625em 0.75em;
  margin: 0 2px;
  border: 1px solid #c0c0c0;
}

legend {
  padding: 0;
  border: 0;
}

button,
input,
select,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: 100%;
}

button,
input {
  line-height: normal;
}

button,
select {
  text-transform: none;
}

button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  cursor: pointer;
  -webkit-appearance: button;
}

button[disabled],
html input[disabled] {
  cursor: default;
}

input[type="checkbox"],
input[type="radio"] {
  padding: 0;
  box-sizing: border-box;
}

input[type="search"] {
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
  -webkit-appearance: textfield;
}

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

button::-moz-focus-inner,
input::-moz-focus-inner {
  padding: 0;
  border: 0;
}

textarea {
  overflow: auto;
  vertical-align: top;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

@media print {
  * {
    color: #000 !important;
    text-shadow: none !important;
    background: transparent !important;
    box-shadow: none !important;
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
  .ir a:after,
  a[href^="javascript:"]:after,
  a[href^="#"]:after {
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
  @page  {
    margin: 2cm .5cm;
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
  .navbar {
    display: none;
  }
  .table td,
  .table th {
    background-color: #fff !important;
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
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
}

*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

html {
  font-size: 62.5%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.428571429;
  color: #333333;
  background-color: #ffffff;
}

input,
button,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

button,
input,
select[multiple],
textarea {
  background-image: none;
}

a {
  color: #428bca;
  text-decoration: none;
}

a:hover,
a:focus {
  color: #2a6496;
  text-decoration: underline;
}

a:focus {
  outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}

img {
  vertical-align: middle;
}

.img-responsive {
  display: block;
  height: auto;
  max-width: 100%;
}

.img-rounded {
  border-radius: 6px;
}

.img-thumbnail {
  display: inline-block;
  height: auto;
  max-width: 100%;
  padding: 4px;
  line-height: 1.428571429;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  border-radius: 4px;
  -webkit-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
}

.img-circle {
  border-radius: 50%;
}

hr {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 0;
  border-top: 1px solid #eeeeee;
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0 0 0 0);
  border: 0;
}

p {
  margin: 0 0 10px;
}

.lead {
  margin-bottom: 20px;
  font-size: 16.099999999999998px;
  font-weight: 200;
  line-height: 1.4;
}

@media (min-width: 768px) {
  .lead {
    font-size: 21px;
  }
}

small {
  font-size: 85%;
}

cite {
  font-style: normal;
}

.text-muted {
  color: #999999;
}

.text-primary {
  color: #428bca;
}

.text-warning {
  color: #c09853;
}

.text-danger {
  color: #b94a48;
}

.text-success {
  color: #468847;
}

.text-info {
  color: #3a87ad;
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

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 500;
  line-height: 1.1;
}

h1 small,
h2 small,
h3 small,
h4 small,
h5 small,
h6 small,
.h1 small,
.h2 small,
.h3 small,
.h4 small,
.h5 small,
.h6 small {
  font-weight: normal;
  line-height: 1;
  color: #999999;
}

h1,
h2,
h3 {
  margin-top: 20px;
  margin-bottom: 10px;
}

h4,
h5,
h6 {
  margin-top: 10px;
  margin-bottom: 10px;
}

h1,
.h1 {
  font-size: 36px;
}

h2,
.h2 {
  font-size: 30px;
}

h3,
.h3 {
  font-size: 24px;
}

h4,
.h4 {
  font-size: 18px;
}

h5,
.h5 {
  font-size: 14px;
}

h6,
.h6 {
  font-size: 12px;
}

h1 small,
.h1 small {
  font-size: 24px;
}

h2 small,
.h2 small {
  font-size: 18px;
}

h3 small,
.h3 small,
h4 small,
.h4 small {
  font-size: 14px;
}

.page-header {
  padding-bottom: 9px;
  margin: 40px 0 20px;
  border-bottom: 1px solid #eeeeee;
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

.list-unstyled {
  padding-left: 0;
  list-style: none;
}

.list-inline {
  padding-left: 0;
  list-style: none;
}

.list-inline > li {
  display: inline-block;
  padding-right: 5px;
  padding-left: 5px;
}

dl {
  margin-bottom: 20px;
}

dt,
dd {
  line-height: 1.428571429;
}

dt {
  font-weight: bold;
}

dd {
  margin-left: 0;
}

@media (min-width: 768px) {
  .dl-horizontal dt {
    float: left;
    width: 160px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .dl-horizontal dd {
    margin-left: 180px;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
}

abbr[title],
abbr[data-original-title] {
  cursor: help;
  border-bottom: 1px dotted #999999;
}

abbr.initialism {
  font-size: 90%;
  text-transform: uppercase;
}

blockquote {
  padding: 10px 20px;
  margin: 0 0 20px;
  border-left: 5px solid #eeeeee;
}

blockquote p {
  font-size: 17.5px;
  font-weight: 300;
  line-height: 1.25;
}

blockquote p:last-child {
  margin-bottom: 0;
}

blockquote small {
  display: block;
  line-height: 1.428571429;
  color: #999999;
}

blockquote small:before {
  content: '\2014 \00A0';
}

blockquote.pull-right {
  padding-right: 15px;
  padding-left: 0;
  border-right: 5px solid #eeeeee;
  border-left: 0;
}

blockquote.pull-right p,
blockquote.pull-right small {
  text-align: right;
}

blockquote.pull-right small:before {
  content: '';
}

blockquote.pull-right small:after {
  content: '\00A0 \2014';
}

q:before,
q:after,
blockquote:before,
blockquote:after {
  content: "";
}

address {
  display: block;
  margin-bottom: 20px;
  font-style: normal;
  line-height: 1.428571429;
}

code,
pre {
  font-family: Monaco, Menlo, Consolas, "Courier New", monospace;
}

code {
  padding: 2px 4px;
  font-size: 90%;
  color: #c7254e;
  white-space: nowrap;
  background-color: #f9f2f4;
  border-radius: 4px;
}

pre {
  display: block;
  padding: 9.5px;
  margin: 0 0 10px;
  font-size: 13px;
  line-height: 1.428571429;
  color: #333333;
  word-break: break-all;
  word-wrap: break-word;
  background-color: #f5f5f5;
  border: 1px solid #cccccc;
  border-radius: 4px;
}

pre.prettyprint {
  margin-bottom: 20px;
}

pre code {
  padding: 0;
  font-size: inherit;
  color: inherit;
  white-space: pre-wrap;
  background-color: transparent;
  border: 0;
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

.container:before,
.container:after {
  display: table;
  content: " ";
}

.container:after {
  clear: both;
}

.container:before,
.container:after {
  display: table;
  content: " ";
}

.container:after {
  clear: both;
}

.row {
  margin-right: -15px;
  margin-left: -15px;
}

.row:before,
.row:after {
  display: table;
  content: " ";
}

.row:after {
  clear: both;
}

.row:before,
.row:after {
  display: table;
  content: " ";
}

.row:after {
  clear: both;
}

.col-xs-1,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9,
.col-xs-10,
.col-xs-11,
.col-xs-12,
.col-sm-1,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12,
.col-lg-1,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-lg-10,
.col-lg-11,
.col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col-xs-1,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9,
.col-xs-10,
.col-xs-11 {
  float: left;
}

.col-xs-1 {
  width: 8.333333333333332%;
}

.col-xs-2 {
  width: 16.666666666666664%;
}

.col-xs-3 {
  width: 25%;
}

.col-xs-4 {
  width: 33.33333333333333%;
}

.col-xs-5 {
  width: 41.66666666666667%;
}

.col-xs-6 {
  width: 50%;
}

.col-xs-7 {
  width: 58.333333333333336%;
}

.col-xs-8 {
  width: 66.66666666666666%;
}

.col-xs-9 {
  width: 75%;
}

.col-xs-10 {
  width: 83.33333333333334%;
}

.col-xs-11 {
  width: 91.66666666666666%;
}

.col-xs-12 {
  width: 100%;
}

@media (min-width: 768px) {
  .container {
    max-width: 750px;
  }
  .col-sm-1,
  .col-sm-2,
  .col-sm-3,
  .col-sm-4,
  .col-sm-5,
  .col-sm-6,
  .col-sm-7,
  .col-sm-8,
  .col-sm-9,
  .col-sm-10,
  .col-sm-11 {
    float: left;
  }
  .col-sm-1 {
    width: 8.333333333333332%;
  }
  .col-sm-2 {
    width: 16.666666666666664%;
  }
  .col-sm-3 {
    width: 25%;
  }
  .col-sm-4 {
    width: 33.33333333333333%;
  }
  .col-sm-5 {
    width: 41.66666666666667%;
  }
  .col-sm-6 {
    width: 50%;
  }
  .col-sm-7 {
    width: 58.333333333333336%;
  }
  .col-sm-8 {
    width: 66.66666666666666%;
  }
  .col-sm-9 {
    width: 75%;
  }
  .col-sm-10 {
    width: 83.33333333333334%;
  }
  .col-sm-11 {
    width: 91.66666666666666%;
  }
  .col-sm-12 {
    width: 100%;
  }
  .col-sm-push-1 {
    left: 8.333333333333332%;
  }
  .col-sm-push-2 {
    left: 16.666666666666664%;
  }
  .col-sm-push-3 {
    left: 25%;
  }
  .col-sm-push-4 {
    left: 33.33333333333333%;
  }
  .col-sm-push-5 {
    left: 41.66666666666667%;
  }
  .col-sm-push-6 {
    left: 50%;
  }
  .col-sm-push-7 {
    left: 58.333333333333336%;
  }
  .col-sm-push-8 {
    left: 66.66666666666666%;
  }
  .col-sm-push-9 {
    left: 75%;
  }
  .col-sm-push-10 {
    left: 83.33333333333334%;
  }
  .col-sm-push-11 {
    left: 91.66666666666666%;
  }
  .col-sm-pull-1 {
    right: 8.333333333333332%;
  }
  .col-sm-pull-2 {
    right: 16.666666666666664%;
  }
  .col-sm-pull-3 {
    right: 25%;
  }
  .col-sm-pull-4 {
    right: 33.33333333333333%;
  }
  .col-sm-pull-5 {
    right: 41.66666666666667%;
  }
  .col-sm-pull-6 {
    right: 50%;
  }
  .col-sm-pull-7 {
    right: 58.333333333333336%;
  }
  .col-sm-pull-8 {
    right: 66.66666666666666%;
  }
  .col-sm-pull-9 {
    right: 75%;
  }
  .col-sm-pull-10 {
    right: 83.33333333333334%;
  }
  .col-sm-pull-11 {
    right: 91.66666666666666%;
  }
  .col-sm-offset-1 {
    margin-left: 8.333333333333332%;
  }
  .col-sm-offset-2 {
    margin-left: 16.666666666666664%;
  }
  .col-sm-offset-3 {
    margin-left: 25%;
  }
  .col-sm-offset-4 {
    margin-left: 33.33333333333333%;
  }
  .col-sm-offset-5 {
    margin-left: 41.66666666666667%;
  }
  .col-sm-offset-6 {
    margin-left: 50%;
  }
  .col-sm-offset-7 {
    margin-left: 58.333333333333336%;
  }
  .col-sm-offset-8 {
    margin-left: 66.66666666666666%;
  }
  .col-sm-offset-9 {
    margin-left: 75%;
  }
  .col-sm-offset-10 {
    margin-left: 83.33333333333334%;
  }
  .col-sm-offset-11 {
    margin-left: 91.66666666666666%;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 970px;
  }
  .col-md-1,
  .col-md-2,
  .col-md-3,
  .col-md-4,
  .col-md-5,
  .col-md-6,
  .col-md-7,
  .col-md-8,
  .col-md-9,
  .col-md-10,
  .col-md-11 {
    float: left;
  }
  .col-md-1 {
    width: 8.333333333333332%;
  }
  .col-md-2 {
    width: 16.666666666666664%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
  .col-md-5 {
    width: 41.66666666666667%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-7 {
    width: 58.333333333333336%;
  }
  .col-md-8 {
    width: 66.66666666666666%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-10 {
    width: 83.33333333333334%;
  }
  .col-md-11 {
    width: 91.66666666666666%;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-push-1 {
    left: 8.333333333333332%;
  }
  .col-md-push-2 {
    left: 16.666666666666664%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-4 {
    left: 33.33333333333333%;
  }
  .col-md-push-5 {
    left: 41.66666666666667%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-7 {
    left: 58.333333333333336%;
  }
  .col-md-push-8 {
    left: 66.66666666666666%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-10 {
    left: 83.33333333333334%;
  }
  .col-md-push-11 {
    left: 91.66666666666666%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-pull-1 {
    right: 8.333333333333332%;
  }
  .col-md-pull-2 {
    right: 16.666666666666664%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-4 {
    right: 33.33333333333333%;
  }
  .col-md-pull-5 {
    right: 41.66666666666667%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-7 {
    right: 58.333333333333336%;
  }
  .col-md-pull-8 {
    right: 66.66666666666666%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-10 {
    right: 83.33333333333334%;
  }
  .col-md-pull-11 {
    right: 91.66666666666666%;
  }
  .col-md-offset-0 {
    margin-left: 0;
  }
  .col-md-offset-1 {
    margin-left: 8.333333333333332%;
  }
  .col-md-offset-2 {
    margin-left: 16.666666666666664%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333333333%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666666666667%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-7 {
    margin-left: 58.333333333333336%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666666666666%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333333334%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666666666666%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-1,
  .col-lg-2,
  .col-lg-3,
  .col-lg-4,
  .col-lg-5,
  .col-lg-6,
  .col-lg-7,
  .col-lg-8,
  .col-lg-9,
  .col-lg-10,
  .col-lg-11 {
    float: left;
  }
  .col-lg-1 {
    width: 8.333333333333332%;
  }
  .col-lg-2 {
    width: 16.666666666666664%;
  }
  .col-lg-3 {
    width: 25%;
  }
  .col-lg-4 {
    width: 33.33333333333333%;
  }
  .col-lg-5 {
    width: 41.66666666666667%;
  }
  .col-lg-6 {
    width: 50%;
  }
  .col-lg-7 {
    width: 58.333333333333336%;
  }
  .col-lg-8 {
    width: 66.66666666666666%;
  }
  .col-lg-9 {
    width: 75%;
  }
  .col-lg-10 {
    width: 83.33333333333334%;
  }
  .col-lg-11 {
    width: 91.66666666666666%;
  }
  .col-lg-12 {
    width: 100%;
  }
  .col-lg-push-0 {
    left: auto;
  }
  .col-lg-push-1 {
    left: 8.333333333333332%;
  }
  .col-lg-push-2 {
    left: 16.666666666666664%;
  }
  .col-lg-push-3 {
    left: 25%;
  }
  .col-lg-push-4 {
    left: 33.33333333333333%;
  }
  .col-lg-push-5 {
    left: 41.66666666666667%;
  }
  .col-lg-push-6 {
    left: 50%;
  }
  .col-lg-push-7 {
    left: 58.333333333333336%;
  }
  .col-lg-push-8 {
    left: 66.66666666666666%;
  }
  .col-lg-push-9 {
    left: 75%;
  }
  .col-lg-push-10 {
    left: 83.33333333333334%;
  }
  .col-lg-push-11 {
    left: 91.66666666666666%;
  }
  .col-lg-pull-0 {
    right: auto;
  }
  .col-lg-pull-1 {
    right: 8.333333333333332%;
  }
  .col-lg-pull-2 {
    right: 16.666666666666664%;
  }
  .col-lg-pull-3 {
    right: 25%;
  }
  .col-lg-pull-4 {
    right: 33.33333333333333%;
  }
  .col-lg-pull-5 {
    right: 41.66666666666667%;
  }
  .col-lg-pull-6 {
    right: 50%;
  }
  .col-lg-pull-7 {
    right: 58.333333333333336%;
  }
  .col-lg-pull-8 {
    right: 66.66666666666666%;
  }
  .col-lg-pull-9 {
    right: 75%;
  }
  .col-lg-pull-10 {
    right: 83.33333333333334%;
  }
  .col-lg-pull-11 {
    right: 91.66666666666666%;
  }
  .col-lg-offset-0 {
    margin-left: 0;
  }
  .col-lg-offset-1 {
    margin-left: 8.333333333333332%;
  }
  .col-lg-offset-2 {
    margin-left: 16.666666666666664%;
  }
  .col-lg-offset-3 {
    margin-left: 25%;
  }
  .col-lg-offset-4 {
    margin-left: 33.33333333333333%;
  }
  .col-lg-offset-5 {
    margin-left: 41.66666666666667%;
  }
  .col-lg-offset-6 {
    margin-left: 50%;
  }
  .col-lg-offset-7 {
    margin-left: 58.333333333333336%;
  }
  .col-lg-offset-8 {
    margin-left: 66.66666666666666%;
  }
  .col-lg-offset-9 {
    margin-left: 75%;
  }
  .col-lg-offset-10 {
    margin-left: 83.33333333333334%;
  }
  .col-lg-offset-11 {
    margin-left: 91.66666666666666%;
  }
}

table {
  max-width: 100%;
  background-color: transparent;
}

th {
  text-align: left;
}

.table {
  width: 100%;
  margin-bottom: 20px;
}

.table thead > tr > th,
.table tbody > tr > th,
.table tfoot > tr > th,
.table thead > tr > td,
.table tbody > tr > td,
.table tfoot > tr > td {
  padding: 8px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #dddddd;
}

.table thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #dddddd;
}

.table caption + thead tr:first-child th,
.table colgroup + thead tr:first-child th,
.table thead:first-child tr:first-child th,
.table caption + thead tr:first-child td,
.table colgroup + thead tr:first-child td,
.table thead:first-child tr:first-child td {
  border-top: 0;
}

.table tbody + tbody {
  border-top: 2px solid #dddddd;
}

.table .table {
  background-color: #ffffff;
}

.table-condensed thead > tr > th,
.table-condensed tbody > tr > th,
.table-condensed tfoot > tr > th,
.table-condensed thead > tr > td,
.table-condensed tbody > tr > td,
.table-condensed tfoot > tr > td {
  padding: 5px;
}

.table-bordered {
  border: 1px solid #dddddd;
}

.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #dddddd;
}

.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}

.table-striped > tbody > tr:nth-child(odd) > td,
.table-striped > tbody > tr:nth-child(odd) > th {
  background-color: #f9f9f9;
}

.table-hover > tbody > tr:hover > td,
.table-hover > tbody > tr:hover > th {
  background-color: #f5f5f5;
}

table col[class*="col-"] {
  display: table-column;
  float: none;
}

table td[class*="col-"],
table th[class*="col-"] {
  display: table-cell;
  float: none;
}

.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f5f5f5;
}

.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
  background-color: #dff0d8;
  border-color: #d6e9c6;
}

.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td {
  background-color: #d0e9c6;
  border-color: #c9e2b3;
}

.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
  background-color: #f2dede;
  border-color: #eed3d7;
}

.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td {
  background-color: #ebcccc;
  border-color: #e6c1c7;
}

.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
  background-color: #fcf8e3;
  border-color: #fbeed5;
}

.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td {
  background-color: #faf2cc;
  border-color: #f8e5be;
}

@media (max-width: 768px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-x: scroll;
    overflow-y: hidden;
    border: 1px solid #dddddd;
  }
  .table-responsive > .table {
    margin-bottom: 0;
    background-color: #fff;
  }
  .table-responsive > .table > thead > tr > th,
  .table-responsive > .table > tbody > tr > th,
  .table-responsive > .table > tfoot > tr > th,
  .table-responsive > .table > thead > tr > td,
  .table-responsive > .table > tbody > tr > td,
  .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:first-child,
  .table-responsive > .table-bordered > tbody > tr > th:first-child,
  .table-responsive > .table-bordered > tfoot > tr > th:first-child,
  .table-responsive > .table-bordered > thead > tr > td:first-child,
  .table-responsive > .table-bordered > tbody > tr > td:first-child,
  .table-responsive > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:last-child,
  .table-responsive > .table-bordered > tbody > tr > th:last-child,
  .table-responsive > .table-bordered > tfoot > tr > th:last-child,
  .table-responsive > .table-bordered > thead > tr > td:last-child,
  .table-responsive > .table-bordered > tbody > tr > td:last-child,
  .table-responsive > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0;
  }
  .table-responsive > .table-bordered > thead > tr:last-child > th,
  .table-responsive > .table-bordered > tbody > tr:last-child > th,
  .table-responsive > .table-bordered > tfoot > tr:last-child > th,
  .table-responsive > .table-bordered > thead > tr:last-child > td,
  .table-responsive > .table-bordered > tbody > tr:last-child > td,
  .table-responsive > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0;
  }
}

fieldset {
  padding: 0;
  margin: 0;
  border: 0;
}

legend {
  display: block;
  width: 100%;
  padding: 0;
  margin-bottom: 20px;
  font-size: 21px;
  line-height: inherit;
  color: #333333;
  border: 0;
  border-bottom: 1px solid #e5e5e5;
}

label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="search"] {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 4px 0 0;
  margin-top: 1px \9;
  /* IE8-9 */

  line-height: normal;
}

input[type="file"] {
  display: block;
}

select[multiple],
select[size] {
  height: auto;
}

select optgroup {
  font-family: inherit;
  font-size: inherit;
  font-style: inherit;
}

input[type="file"]:focus,
input[type="radio"]:focus,
input[type="checkbox"]:focus {
  outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  height: auto;
}

.form-control:-moz-placeholder {
  color: #999999;
}

.form-control::-moz-placeholder {
  color: #999999;
}

.form-control:-ms-input-placeholder {
  color: #999999;
}

.form-control::-webkit-input-placeholder {
  color: #999999;
}

.form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.428571429;
  color: #555555;
  vertical-align: middle;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
          transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
}

.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  cursor: not-allowed;
  background-color: #eeeeee;
}

textarea.form-control {
  height: auto;
}

.form-group {
  margin-bottom: 15px;
}

.radio,
.checkbox {
  display: block;
  min-height: 20px;
  padding-left: 20px;
  margin-top: 10px;
  margin-bottom: 10px;
  vertical-align: middle;
}

.radio label,
.checkbox label {
  display: inline;
  margin-bottom: 0;
  font-weight: normal;
  cursor: pointer;
}

.radio input[type="radio"],
.radio-inline input[type="radio"],
.checkbox input[type="checkbox"],
.checkbox-inline input[type="checkbox"] {
  float: left;
  margin-left: -20px;
}

.radio + .radio,
.checkbox + .checkbox {
  margin-top: -5px;
}

.radio-inline,
.checkbox-inline {
  display: inline-block;
  padding-left: 20px;
  margin-bottom: 0;
  font-weight: normal;
  vertical-align: middle;
  cursor: pointer;
}

.radio-inline + .radio-inline,
.checkbox-inline + .checkbox-inline {
  margin-top: 0;
  margin-left: 10px;
}

input[type="radio"][disabled],
input[type="checkbox"][disabled],
.radio[disabled],
.radio-inline[disabled],
.checkbox[disabled],
.checkbox-inline[disabled],
fieldset[disabled] input[type="radio"],
fieldset[disabled] input[type="checkbox"],
fieldset[disabled] .radio,
fieldset[disabled] .radio-inline,
fieldset[disabled] .checkbox,
fieldset[disabled] .checkbox-inline {
  cursor: not-allowed;
}

.input-sm {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

select.input-sm {
  height: 30px;
  line-height: 30px;
}

textarea.input-sm {
  height: auto;
}

.input-lg {
  height: 45px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

select.input-lg {
  height: 45px;
  line-height: 45px;
}

textarea.input-lg {
  height: auto;
}

.has-warning .help-block,
.has-warning .control-label {
  color: #c09853;
}

.has-warning .form-control {
  border-color: #c09853;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.has-warning .form-control:focus {
  border-color: #a47e3c;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #dbc59e;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #dbc59e;
}

.has-warning .input-group-addon {
  color: #c09853;
  background-color: #fcf8e3;
  border-color: #c09853;
}

.has-error .help-block,
.has-error .control-label {
  color: #b94a48;
}

.has-error .form-control {
  border-color: #b94a48;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.has-error .form-control:focus {
  border-color: #953b39;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #d59392;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #d59392;
}

.has-error .input-group-addon {
  color: #b94a48;
  background-color: #f2dede;
  border-color: #b94a48;
}

.has-success .help-block,
.has-success .control-label {
  color: #468847;
}

.has-success .form-control {
  border-color: #468847;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.has-success .form-control:focus {
  border-color: #356635;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #7aba7b;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #7aba7b;
}

.has-success .input-group-addon {
  color: #468847;
  background-color: #dff0d8;
  border-color: #468847;
}

.form-control-static {
  padding-top: 7px;
  margin-bottom: 0;
}

.help-block {
  display: block;
  margin-top: 5px;
  margin-bottom: 10px;
  color: #737373;
}

@media (min-width: 768px) {
  .form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .form-inline .form-control {
    display: inline-block;
  }
  .form-inline .radio,
  .form-inline .checkbox {
    display: inline-block;
    padding-left: 0;
    margin-top: 0;
    margin-bottom: 0;
  }
  .form-inline .radio input[type="radio"],
  .form-inline .checkbox input[type="checkbox"] {
    float: none;
    margin-left: 0;
  }
}

.form-horizontal .control-label,
.form-horizontal .radio,
.form-horizontal .checkbox,
.form-horizontal .radio-inline,
.form-horizontal .checkbox-inline {
  padding-top: 7px;
  margin-top: 0;
  margin-bottom: 0;
}

.form-horizontal .form-group {
  margin-right: -15px;
  margin-left: -15px;
}

.form-horizontal .form-group:before,
.form-horizontal .form-group:after {
  display: table;
  content: " ";
}

.form-horizontal .form-group:after {
  clear: both;
}

.form-horizontal .form-group:before,
.form-horizontal .form-group:after {
  display: table;
  content: " ";
}

.form-horizontal .form-group:after {
  clear: both;
}

@media (min-width: 768px) {
  .form-horizontal .control-label {
    text-align: right;
  }
}

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.428571429;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
       -o-user-select: none;
          user-select: none;
}

.btn:focus {
  outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}

.btn:hover,
.btn:focus {
  color: #333333;
  text-decoration: none;
}

.btn:active,
.btn.active {
  background-image: none;
  outline: 0;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
          box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

.btn.disabled,
.btn[disabled],
fieldset[disabled] .btn {
  pointer-events: none;
  cursor: not-allowed;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
          box-shadow: none;
}

.btn-default {
  color: #333333;
  background-color: #ffffff;
  border-color: #cccccc;
}

.btn-default:hover,
.btn-default:focus,
.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  color: #333333;
  background-color: #ebebeb;
  border-color: #adadad;
}

.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  background-image: none;
}

.btn-default.disabled,
.btn-default[disabled],
fieldset[disabled] .btn-default,
.btn-default.disabled:hover,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default:hover,
.btn-default.disabled:focus,
.btn-default[disabled]:focus,
fieldset[disabled] .btn-default:focus,
.btn-default.disabled:active,
.btn-default[disabled]:active,
fieldset[disabled] .btn-default:active,
.btn-default.disabled.active,
.btn-default[disabled].active,
fieldset[disabled] .btn-default.active {
  background-color: #ffffff;
  border-color: #cccccc;
}

.btn-primary {
  color: #ffffff;
  background-color: #428bca;
  border-color: #357ebd;
}

.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  color: #ffffff;
  background-color: #3276b1;
  border-color: #285e8e;
}

.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  background-image: none;
}

.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
  background-color: #428bca;
  border-color: #357ebd;
}

.btn-warning {
  color: #ffffff;
  background-color: #f0ad4e;
  border-color: #eea236;
}

.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  color: #ffffff;
  background-color: #ed9c28;
  border-color: #d58512;
}

.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  background-image: none;
}

.btn-warning.disabled,
.btn-warning[disabled],
fieldset[disabled] .btn-warning,
.btn-warning.disabled:hover,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning:hover,
.btn-warning.disabled:focus,
.btn-warning[disabled]:focus,
fieldset[disabled] .btn-warning:focus,
.btn-warning.disabled:active,
.btn-warning[disabled]:active,
fieldset[disabled] .btn-warning:active,
.btn-warning.disabled.active,
.btn-warning[disabled].active,
fieldset[disabled] .btn-warning.active {
  background-color: #f0ad4e;
  border-color: #eea236;
}

.btn-danger {
  color: #ffffff;
  background-color: #d9534f;
  border-color: #d43f3a;
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  color: #ffffff;
  background-color: #d2322d;
  border-color: #ac2925;
}

.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  background-image: none;
}

.btn-danger.disabled,
.btn-danger[disabled],
fieldset[disabled] .btn-danger,
.btn-danger.disabled:hover,
.btn-danger[disabled]:hover,
fieldset[disabled] .btn-danger:hover,
.btn-danger.disabled:focus,
.btn-danger[disabled]:focus,
fieldset[disabled] .btn-danger:focus,
.btn-danger.disabled:active,
.btn-danger[disabled]:active,
fieldset[disabled] .btn-danger:active,
.btn-danger.disabled.active,
.btn-danger[disabled].active,
fieldset[disabled] .btn-danger.active {
  background-color: #d9534f;
  border-color: #d43f3a;
}

.btn-success {
  color: #ffffff;
  background-color: #5cb85c;
  border-color: #4cae4c;
}

.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  color: #ffffff;
  background-color: #47a447;
  border-color: #398439;
}

.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  background-image: none;
}

.btn-success.disabled,
.btn-success[disabled],
fieldset[disabled] .btn-success,
.btn-success.disabled:hover,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success:hover,
.btn-success.disabled:focus,
.btn-success[disabled]:focus,
fieldset[disabled] .btn-success:focus,
.btn-success.disabled:active,
.btn-success[disabled]:active,
fieldset[disabled] .btn-success:active,
.btn-success.disabled.active,
.btn-success[disabled].active,
fieldset[disabled] .btn-success.active {
  background-color: #5cb85c;
  border-color: #4cae4c;
}

.btn-info {
  color: #ffffff;
  background-color: #5bc0de;
  border-color: #46b8da;
}

.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  color: #ffffff;
  background-color: #39b3d7;
  border-color: #269abc;
}

.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  background-image: none;
}

.btn-info.disabled,
.btn-info[disabled],
fieldset[disabled] .btn-info,
.btn-info.disabled:hover,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info:hover,
.btn-info.disabled:focus,
.btn-info[disabled]:focus,
fieldset[disabled] .btn-info:focus,
.btn-info.disabled:active,
.btn-info[disabled]:active,
fieldset[disabled] .btn-info:active,
.btn-info.disabled.active,
.btn-info[disabled].active,
fieldset[disabled] .btn-info.active {
  background-color: #5bc0de;
  border-color: #46b8da;
}

.btn-link {
  font-weight: normal;
  color: #428bca;
  cursor: pointer;
  border-radius: 0;
}

.btn-link,
.btn-link:active,
.btn-link[disabled],
fieldset[disabled] .btn-link {
  background-color: transparent;
  -webkit-box-shadow: none;
          box-shadow: none;
}

.btn-link,
.btn-link:hover,
.btn-link:focus,
.btn-link:active {
  border-color: transparent;
}

.btn-link:hover,
.btn-link:focus {
  color: #2a6496;
  text-decoration: underline;
  background-color: transparent;
}

.btn-link[disabled]:hover,
fieldset[disabled] .btn-link:hover,
.btn-link[disabled]:focus,
fieldset[disabled] .btn-link:focus {
  color: #999999;
  text-decoration: none;
}

.btn-lg {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

.btn-sm,
.btn-xs {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

.btn-xs {
  padding: 1px 5px;
}

.btn-block {
  display: block;
  width: 100%;
  padding-right: 0;
  padding-left: 0;
}

.btn-block + .btn-block {
  margin-top: 5px;
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}

.fade {
  opacity: 0;
  -webkit-transition: opacity 0.15s linear;
          transition: opacity 0.15s linear;
}

.fade.in {
  opacity: 1;
}

.collapse {
  display: none;
}

.collapse.in {
  display: block;
}

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  -webkit-transition: height 0.35s ease;
          transition: height 0.35s ease;
}

@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('../fonts/glyphicons-halflings-regular.eot');
  src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
}

.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  -webkit-font-smoothing: antialiased;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
}

.glyphicon-asterisk:before {
  content: "\2a";
}

.glyphicon-plus:before {
  content: "\2b";
}

.glyphicon-euro:before {
  content: "\20ac";
}

.glyphicon-minus:before {
  content: "\2212";
}

.glyphicon-cloud:before {
  content: "\2601";
}

.glyphicon-envelope:before {
  content: "\2709";
}

.glyphicon-pencil:before {
  content: "\270f";
}

.glyphicon-glass:before {
  content: "\e001";
}

.glyphicon-music:before {
  content: "\e002";
}

.glyphicon-search:before {
  content: "\e003";
}

.glyphicon-heart:before {
  content: "\e005";
}

.glyphicon-star:before {
  content: "\e006";
}

.glyphicon-star-empty:before {
  content: "\e007";
}

.glyphicon-user:before {
  content: "\e008";
}

.glyphicon-film:before {
  content: "\e009";
}

.glyphicon-th-large:before {
  content: "\e010";
}

.glyphicon-th:before {
  content: "\e011";
}

.glyphicon-th-list:before {
  content: "\e012";
}

.glyphicon-ok:before {
  content: "\e013";
}

.glyphicon-remove:before {
  content: "\e014";
}

.glyphicon-zoom-in:before {
  content: "\e015";
}

.glyphicon-zoom-out:before {
  content: "\e016";
}

.glyphicon-off:before {
  content: "\e017";
}

.glyphicon-signal:before {
  content: "\e018";
}

.glyphicon-cog:before {
  content: "\e019";
}

.glyphicon-trash:before {
  content: "\e020";
}

.glyphicon-home:before {
  content: "\e021";
}

.glyphicon-file:before {
  content: "\e022";
}

.glyphicon-time:before {
  content: "\e023";
}

.glyphicon-road:before {
  content: "\e024";
}

.glyphicon-download-alt:before {
  content: "\e025";
}

.glyphicon-download:before {
  content: "\e026";
}

.glyphicon-upload:before {
  content: "\e027";
}

.glyphicon-inbox:before {
  content: "\e028";
}

.glyphicon-play-circle:before {
  content: "\e029";
}

.glyphicon-repeat:before {
  content: "\e030";
}

.glyphicon-refresh:before {
  content: "\e031";
}

.glyphicon-list-alt:before {
  content: "\e032";
}

.glyphicon-flag:before {
  content: "\e034";
}

.glyphicon-headphones:before {
  content: "\e035";
}

.glyphicon-volume-off:before {
  content: "\e036";
}

.glyphicon-volume-down:before {
  content: "\e037";
}

.glyphicon-volume-up:before {
  content: "\e038";
}

.glyphicon-qrcode:before {
  content: "\e039";
}

.glyphicon-barcode:before {
  content: "\e040";
}

.glyphicon-tag:before {
  content: "\e041";
}

.glyphicon-tags:before {
  content: "\e042";
}

.glyphicon-book:before {
  content: "\e043";
}

.glyphicon-print:before {
  content: "\e045";
}

.glyphicon-font:before {
  content: "\e047";
}

.glyphicon-bold:before {
  content: "\e048";
}

.glyphicon-italic:before {
  content: "\e049";
}

.glyphicon-text-height:before {
  content: "\e050";
}

.glyphicon-text-width:before {
  content: "\e051";
}

.glyphicon-align-left:before {
  content: "\e052";
}

.glyphicon-align-center:before {
  content: "\e053";
}

.glyphicon-align-right:before {
  content: "\e054";
}

.glyphicon-align-justify:before {
  content: "\e055";
}

.glyphicon-list:before {
  content: "\e056";
}

.glyphicon-indent-left:before {
  content: "\e057";
}

.glyphicon-indent-right:before {
  content: "\e058";
}

.glyphicon-facetime-video:before {
  content: "\e059";
}

.glyphicon-picture:before {
  content: "\e060";
}

.glyphicon-map-marker:before {
  content: "\e062";
}

.glyphicon-adjust:before {
  content: "\e063";
}

.glyphicon-tint:before {
  content: "\e064";
}

.glyphicon-edit:before {
  content: "\e065";
}

.glyphicon-share:before {
  content: "\e066";
}

.glyphicon-check:before {
  content: "\e067";
}

.glyphicon-move:before {
  content: "\e068";
}

.glyphicon-step-backward:before {
  content: "\e069";
}

.glyphicon-fast-backward:before {
  content: "\e070";
}

.glyphicon-backward:before {
  content: "\e071";
}

.glyphicon-play:before {
  content: "\e072";
}

.glyphicon-pause:before {
  content: "\e073";
}

.glyphicon-stop:before {
  content: "\e074";
}

.glyphicon-forward:before {
  content: "\e075";
}

.glyphicon-fast-forward:before {
  content: "\e076";
}

.glyphicon-step-forward:before {
  content: "\e077";
}

.glyphicon-eject:before {
  content: "\e078";
}

.glyphicon-chevron-left:before {
  content: "\e079";
}

.glyphicon-chevron-right:before {
  content: "\e080";
}

.glyphicon-plus-sign:before {
  content: "\e081";
}

.glyphicon-minus-sign:before {
  content: "\e082";
}

.glyphicon-remove-sign:before {
  content: "\e083";
}

.glyphicon-ok-sign:before {
  content: "\e084";
}

.glyphicon-question-sign:before {
  content: "\e085";
}

.glyphicon-info-sign:before {
  content: "\e086";
}

.glyphicon-screenshot:before {
  content: "\e087";
}

.glyphicon-remove-circle:before {
  content: "\e088";
}

.glyphicon-ok-circle:before {
  content: "\e089";
}

.glyphicon-ban-circle:before {
  content: "\e090";
}

.glyphicon-arrow-left:before {
  content: "\e091";
}

.glyphicon-arrow-right:before {
  content: "\e092";
}

.glyphicon-arrow-up:before {
  content: "\e093";
}

.glyphicon-arrow-down:before {
  content: "\e094";
}

.glyphicon-share-alt:before {
  content: "\e095";
}

.glyphicon-resize-full:before {
  content: "\e096";
}

.glyphicon-resize-small:before {
  content: "\e097";
}

.glyphicon-exclamation-sign:before {
  content: "\e101";
}

.glyphicon-gift:before {
  content: "\e102";
}

.glyphicon-leaf:before {
  content: "\e103";
}

.glyphicon-eye-open:before {
  content: "\e105";
}

.glyphicon-eye-close:before {
  content: "\e106";
}

.glyphicon-warning-sign:before {
  content: "\e107";
}

.glyphicon-plane:before {
  content: "\e108";
}

.glyphicon-random:before {
  content: "\e110";
}

.glyphicon-comment:before {
  content: "\e111";
}

.glyphicon-magnet:before {
  content: "\e112";
}

.glyphicon-chevron-up:before {
  content: "\e113";
}

.glyphicon-chevron-down:before {
  content: "\e114";
}

.glyphicon-retweet:before {
  content: "\e115";
}

.glyphicon-shopping-cart:before {
  content: "\e116";
}

.glyphicon-folder-close:before {
  content: "\e117";
}

.glyphicon-folder-open:before {
  content: "\e118";
}

.glyphicon-resize-vertical:before {
  content: "\e119";
}

.glyphicon-resize-horizontal:before {
  content: "\e120";
}

.glyphicon-hdd:before {
  content: "\e121";
}

.glyphicon-bullhorn:before {
  content: "\e122";
}

.glyphicon-certificate:before {
  content: "\e124";
}

.glyphicon-thumbs-up:before {
  content: "\e125";
}

.glyphicon-thumbs-down:before {
  content: "\e126";
}

.glyphicon-hand-right:before {
  content: "\e127";
}

.glyphicon-hand-left:before {
  content: "\e128";
}

.glyphicon-hand-up:before {
  content: "\e129";
}

.glyphicon-hand-down:before {
  content: "\e130";
}

.glyphicon-circle-arrow-right:before {
  content: "\e131";
}

.glyphicon-circle-arrow-left:before {
  content: "\e132";
}

.glyphicon-circle-arrow-up:before {
  content: "\e133";
}

.glyphicon-circle-arrow-down:before {
  content: "\e134";
}

.glyphicon-globe:before {
  content: "\e135";
}

.glyphicon-tasks:before {
  content: "\e137";
}

.glyphicon-filter:before {
  content: "\e138";
}

.glyphicon-fullscreen:before {
  content: "\e140";
}

.glyphicon-dashboard:before {
  content: "\e141";
}

.glyphicon-heart-empty:before {
  content: "\e143";
}

.glyphicon-link:before {
  content: "\e144";
}

.glyphicon-phone:before {
  content: "\e145";
}

.glyphicon-usd:before {
  content: "\e148";
}

.glyphicon-gbp:before {
  content: "\e149";
}

.glyphicon-sort:before {
  content: "\e150";
}

.glyphicon-sort-by-alphabet:before {
  content: "\e151";
}

.glyphicon-sort-by-alphabet-alt:before {
  content: "\e152";
}

.glyphicon-sort-by-order:before {
  content: "\e153";
}

.glyphicon-sort-by-order-alt:before {
  content: "\e154";
}

.glyphicon-sort-by-attributes:before {
  content: "\e155";
}

.glyphicon-sort-by-attributes-alt:before {
  content: "\e156";
}

.glyphicon-unchecked:before {
  content: "\e157";
}

.glyphicon-expand:before {
  content: "\e158";
}

.glyphicon-collapse-down:before {
  content: "\e159";
}

.glyphicon-collapse-up:before {
  content: "\e160";
}

.glyphicon-log-in:before {
  content: "\e161";
}

.glyphicon-flash:before {
  content: "\e162";
}

.glyphicon-log-out:before {
  content: "\e163";
}

.glyphicon-new-window:before {
  content: "\e164";
}

.glyphicon-record:before {
  content: "\e165";
}

.glyphicon-save:before {
  content: "\e166";
}

.glyphicon-open:before {
  content: "\e167";
}

.glyphicon-saved:before {
  content: "\e168";
}

.glyphicon-import:before {
  content: "\e169";
}

.glyphicon-export:before {
  content: "\e170";
}

.glyphicon-send:before {
  content: "\e171";
}

.glyphicon-floppy-disk:before {
  content: "\e172";
}

.glyphicon-floppy-saved:before {
  content: "\e173";
}

.glyphicon-floppy-remove:before {
  content: "\e174";
}

.glyphicon-floppy-save:before {
  content: "\e175";
}

.glyphicon-floppy-open:before {
  content: "\e176";
}

.glyphicon-credit-card:before {
  content: "\e177";
}

.glyphicon-transfer:before {
  content: "\e178";
}

.glyphicon-cutlery:before {
  content: "\e179";
}

.glyphicon-header:before {
  content: "\e180";
}

.glyphicon-compressed:before {
  content: "\e181";
}

.glyphicon-earphone:before {
  content: "\e182";
}

.glyphicon-phone-alt:before {
  content: "\e183";
}

.glyphicon-tower:before {
  content: "\e184";
}

.glyphicon-stats:before {
  content: "\e185";
}

.glyphicon-sd-video:before {
  content: "\e186";
}

.glyphicon-hd-video:before {
  content: "\e187";
}

.glyphicon-subtitles:before {
  content: "\e188";
}

.glyphicon-sound-stereo:before {
  content: "\e189";
}

.glyphicon-sound-dolby:before {
  content: "\e190";
}

.glyphicon-sound-5-1:before {
  content: "\e191";
}

.glyphicon-sound-6-1:before {
  content: "\e192";
}

.glyphicon-sound-7-1:before {
  content: "\e193";
}

.glyphicon-copyright-mark:before {
  content: "\e194";
}

.glyphicon-registration-mark:before {
  content: "\e195";
}

.glyphicon-cloud-download:before {
  content: "\e197";
}

.glyphicon-cloud-upload:before {
  content: "\e198";
}

.glyphicon-tree-conifer:before {
  content: "\e199";
}

.glyphicon-tree-deciduous:before {
  content: "\e200";
}

.glyphicon-briefcase:before {
  content: "\1f4bc";
}

.glyphicon-calendar:before {
  content: "\1f4c5";
}

.glyphicon-pushpin:before {
  content: "\1f4cc";
}

.glyphicon-paperclip:before {
  content: "\1f4ce";
}

.glyphicon-camera:before {
  content: "\1f4f7";
}

.glyphicon-lock:before {
  content: "\1f512";
}

.glyphicon-bell:before {
  content: "\1f514";
}

.glyphicon-bookmark:before {
  content: "\1f516";
}

.glyphicon-fire:before {
  content: "\1f525";
}

.glyphicon-wrench:before {
  content: "\1f527";
}

.caret {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 2px;
  vertical-align: middle;
  border-top: 4px solid #000000;
  border-right: 4px solid transparent;
  border-bottom: 0 dotted;
  border-left: 4px solid transparent;
  content: "";
}

.dropdown {
  position: relative;
}

.dropdown-toggle:focus {
  outline: 0;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  list-style: none;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
          box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
  background-clip: padding-box;
}

.dropdown-menu.pull-right {
  right: 0;
  left: auto;
}

.dropdown-menu .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}

.dropdown-menu > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #333333;
  white-space: nowrap;
}

.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  color: #ffffff;
  text-decoration: none;
  background-color: #428bca;
}

.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  color: #ffffff;
  text-decoration: none;
  background-color: #428bca;
  outline: 0;
}

.dropdown-menu > .disabled > a,
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  color: #999999;
}

.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

.open > .dropdown-menu {
  display: block;
}

.open > a {
  outline: 0;
}

.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.428571429;
  color: #999999;
}

.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990;
}

.pull-right > .dropdown-menu {
  right: 0;
  left: auto;
}

.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  border-top: 0 dotted;
  border-bottom: 4px solid #000000;
  content: "";
}

.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-bottom: 1px;
}

@media (min-width: 768px) {
  .navbar-right .dropdown-menu {
    right: 0;
    left: auto;
  }
}

.btn-default .caret {
  border-top-color: #333333;
}

.btn-primary .caret,
.btn-success .caret,
.btn-warning .caret,
.btn-danger .caret,
.btn-info .caret {
  border-top-color: #fff;
}

.dropup .btn-default .caret {
  border-bottom-color: #333333;
}

.dropup .btn-primary .caret,
.dropup .btn-success .caret,
.dropup .btn-warning .caret,
.dropup .btn-danger .caret,
.dropup .btn-info .caret {
  border-bottom-color: #fff;
}

.btn-group,
.btn-group-vertical {
  position: relative;
  display: inline-block;
  vertical-align: middle;
}

.btn-group > .btn,
.btn-group-vertical > .btn {
  position: relative;
  float: left;
}

.btn-group > .btn:hover,
.btn-group-vertical > .btn:hover,
.btn-group > .btn:focus,
.btn-group-vertical > .btn:focus,
.btn-group > .btn:active,
.btn-group-vertical > .btn:active,
.btn-group > .btn.active,
.btn-group-vertical > .btn.active {
  z-index: 2;
}

.btn-group > .btn:focus,
.btn-group-vertical > .btn:focus {
  outline: none;
}

.btn-group .btn + .btn,
.btn-group .btn + .btn-group,
.btn-group .btn-group + .btn,
.btn-group .btn-group + .btn-group {
  margin-left: -1px;
}

.btn-toolbar:before,
.btn-toolbar:after {
  display: table;
  content: " ";
}

.btn-toolbar:after {
  clear: both;
}

.btn-toolbar:before,
.btn-toolbar:after {
  display: table;
  content: " ";
}

.btn-toolbar:after {
  clear: both;
}

.btn-toolbar .btn-group {
  float: left;
}

.btn-toolbar > .btn + .btn,
.btn-toolbar > .btn-group + .btn,
.btn-toolbar > .btn + .btn-group,
.btn-toolbar > .btn-group + .btn-group {
  margin-left: 5px;
}

.btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
  border-radius: 0;
}

.btn-group > .btn:first-child {
  margin-left: 0;
}

.btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.btn-group > .btn:last-child:not(:first-child),
.btn-group > .dropdown-toggle:not(:first-child) {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

.btn-group > .btn-group {
  float: left;
}

.btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0;
}

.btn-group > .btn-group:first-child > .btn:last-child,
.btn-group > .btn-group:first-child > .dropdown-toggle {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.btn-group > .btn-group:last-child > .btn:first-child {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

.btn-group .dropdown-toggle:active,
.btn-group.open .dropdown-toggle {
  outline: 0;
}

.btn-group-xs > .btn {
  padding: 5px 10px;
  padding: 1px 5px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

.btn-group-sm > .btn {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

.btn-group-lg > .btn {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

.btn-group > .btn + .dropdown-toggle {
  padding-right: 8px;
  padding-left: 8px;
}

.btn-group > .btn-lg + .dropdown-toggle {
  padding-right: 12px;
  padding-left: 12px;
}

.btn-group.open .dropdown-toggle {
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
          box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

.btn .caret {
  margin-left: 0;
}

.btn-lg .caret {
  border-width: 5px 5px 0;
  border-bottom-width: 0;
}

.dropup .btn-lg .caret {
  border-width: 0 5px 5px;
}

.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%;
}

.btn-group-vertical > .btn-group:before,
.btn-group-vertical > .btn-group:after {
  display: table;
  content: " ";
}

.btn-group-vertical > .btn-group:after {
  clear: both;
}

.btn-group-vertical > .btn-group:before,
.btn-group-vertical > .btn-group:after {
  display: table;
  content: " ";
}

.btn-group-vertical > .btn-group:after {
  clear: both;
}

.btn-group-vertical > .btn-group > .btn {
  float: none;
}

.btn-group-vertical > .btn + .btn,
.btn-group-vertical > .btn + .btn-group,
.btn-group-vertical > .btn-group + .btn,
.btn-group-vertical > .btn-group + .btn-group {
  margin-top: -1px;
  margin-left: 0;
}

.btn-group-vertical > .btn:not(:first-child):not(:last-child) {
  border-radius: 0;
}

.btn-group-vertical > .btn:first-child:not(:last-child) {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.btn-group-vertical > .btn:last-child:not(:first-child) {
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 0;
}

.btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0;
}

.btn-group-vertical > .btn-group:first-child > .btn:last-child,
.btn-group-vertical > .btn-group:first-child > .dropdown-toggle {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.btn-group-vertical > .btn-group:last-child > .btn:first-child {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}

.btn-group-justified {
  display: table;
  width: 100%;
  border-collapse: separate;
  table-layout: fixed;
}

.btn-group-justified .btn {
  display: table-cell;
  float: none;
  width: 1%;
}

[data-toggle="buttons"] > .btn > input[type="radio"],
[data-toggle="buttons"] > .btn > input[type="checkbox"] {
  display: none;
}

.input-group {
  position: relative;
  display: table;
  border-collapse: separate;
}

.input-group.col {
  float: none;
  padding-right: 0;
  padding-left: 0;
}

.input-group .form-control {
  width: 100%;
  margin-bottom: 0;
}

.input-group-lg > .form-control,
.input-group-lg > .input-group-addon,
.input-group-lg > .input-group-btn > .btn {
  height: 45px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

select.input-group-lg > .form-control,
select.input-group-lg > .input-group-addon,
select.input-group-lg > .input-group-btn > .btn {
  height: 45px;
  line-height: 45px;
}

textarea.input-group-lg > .form-control,
textarea.input-group-lg > .input-group-addon,
textarea.input-group-lg > .input-group-btn > .btn {
  height: auto;
}

.input-group-sm > .form-control,
.input-group-sm > .input-group-addon,
.input-group-sm > .input-group-btn > .btn {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

select.input-group-sm > .form-control,
select.input-group-sm > .input-group-addon,
select.input-group-sm > .input-group-btn > .btn {
  height: 30px;
  line-height: 30px;
}

textarea.input-group-sm > .form-control,
textarea.input-group-sm > .input-group-addon,
textarea.input-group-sm > .input-group-btn > .btn {
  height: auto;
}

.input-group-addon,
.input-group-btn,
.input-group .form-control {
  display: table-cell;
}

.input-group-addon:not(:first-child):not(:last-child),
.input-group-btn:not(:first-child):not(:last-child),
.input-group .form-control:not(:first-child):not(:last-child) {
  border-radius: 0;
}

.input-group-addon,
.input-group-btn {
  width: 1%;
  white-space: nowrap;
  vertical-align: middle;
}

.input-group-addon {
  padding: 6px 12px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1;
  text-align: center;
  background-color: #eeeeee;
  border: 1px solid #cccccc;
  border-radius: 4px;
}

.input-group-addon.input-sm {
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 3px;
}

.input-group-addon.input-lg {
  padding: 10px 16px;
  font-size: 18px;
  border-radius: 6px;
}

.input-group-addon input[type="radio"],
.input-group-addon input[type="checkbox"] {
  margin-top: 0;
}

.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .dropdown-toggle,
.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group-addon:first-child {
  border-right: 0;
}

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .dropdown-toggle,
.input-group-btn:first-child > .btn:not(:first-child) {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

.input-group-addon:last-child {
  border-left: 0;
}

.input-group-btn {
  position: relative;
  white-space: nowrap;
}

.input-group-btn > .btn {
  position: relative;
}

.input-group-btn > .btn + .btn {
  margin-left: -4px;
}

.input-group-btn > .btn:hover,
.input-group-btn > .btn:active {
  z-index: 2;
}

.nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav:before,
.nav:after {
  display: table;
  content: " ";
}

.nav:after {
  clear: both;
}

.nav:before,
.nav:after {
  display: table;
  content: " ";
}

.nav:after {
  clear: both;
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

.nav > li > a:hover,
.nav > li > a:focus {
  text-decoration: none;
  background-color: #eeeeee;
}

.nav > li.disabled > a {
  color: #999999;
}

.nav > li.disabled > a:hover,
.nav > li.disabled > a:focus {
  color: #999999;
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
}

.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {
  background-color: #eeeeee;
  border-color: #428bca;
}

.nav .nav-divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}

.nav > li > a > img {
  max-width: none;
}

.nav-tabs {
  border-bottom: 1px solid #dddddd;
}

.nav-tabs > li {
  float: left;
  margin-bottom: -1px;
}

.nav-tabs > li > a {
  margin-right: 2px;
  line-height: 1.428571429;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0;
}

.nav-tabs > li > a:hover {
  border-color: #eeeeee #eeeeee #dddddd;
}

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
  color: #555555;
  cursor: default;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  border-bottom-color: transparent;
}

.nav-tabs.nav-justified {
  width: 100%;
  border-bottom: 0;
}

.nav-tabs.nav-justified > li {
  float: none;
}

.nav-tabs.nav-justified > li > a {
  text-align: center;
}

@media (min-width: 768px) {
  .nav-tabs.nav-justified > li {
    display: table-cell;
    width: 1%;
  }
}

.nav-tabs.nav-justified > li > a {
  margin-right: 0;
  border-bottom: 1px solid #dddddd;
}

.nav-tabs.nav-justified > .active > a {
  border-bottom-color: #ffffff;
}

.nav-pills > li {
  float: left;
}

.nav-pills > li > a {
  border-radius: 5px;
}

.nav-pills > li + li {
  margin-left: 2px;
}

.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
  color: #ffffff;
  background-color: #428bca;
}

.nav-stacked > li {
  float: none;
}

.nav-stacked > li + li {
  margin-top: 2px;
  margin-left: 0;
}

.nav-justified {
  width: 100%;
}

.nav-justified > li {
  float: none;
}

.nav-justified > li > a {
  text-align: center;
}

@media (min-width: 768px) {
  .nav-justified > li {
    display: table-cell;
    width: 1%;
  }
}

.nav-tabs-justified {
  border-bottom: 0;
}

.nav-tabs-justified > li > a {
  margin-right: 0;
  border-bottom: 1px solid #dddddd;
}

.nav-tabs-justified > .active > a {
  border-bottom-color: #ffffff;
}

.tabbable:before,
.tabbable:after {
  display: table;
  content: " ";
}

.tabbable:after {
  clear: both;
}

.tabbable:before,
.tabbable:after {
  display: table;
  content: " ";
}

.tabbable:after {
  clear: both;
}

.tab-content > .tab-pane,
.pill-content > .pill-pane {
  display: none;
}

.tab-content > .active,
.pill-content > .active {
  display: block;
}

.nav .caret {
  border-top-color: #428bca;
  border-bottom-color: #428bca;
}

.nav a:hover .caret {
  border-top-color: #2a6496;
  border-bottom-color: #2a6496;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}

.navbar {
  position: relative;
  z-index: 1000;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
}

.navbar:before,
.navbar:after {
  display: table;
  content: " ";
}

.navbar:after {
  clear: both;
}

.navbar:before,
.navbar:after {
  display: table;
  content: " ";
}

.navbar:after {
  clear: both;
}

@media (min-width: 768px) {
  .navbar {
    border-radius: 4px;
  }
}

.navbar-header:before,
.navbar-header:after {
  display: table;
  content: " ";
}

.navbar-header:after {
  clear: both;
}

.navbar-header:before,
.navbar-header:after {
  display: table;
  content: " ";
}

.navbar-header:after {
  clear: both;
}

@media (min-width: 768px) {
  .navbar-header {
    float: left;
  }
}

.navbar-collapse {
  max-height: 340px;
  padding-right: 15px;
  padding-left: 15px;
  overflow-x: visible;
  border-top: 1px solid transparent;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
  -webkit-overflow-scrolling: touch;
}

.navbar-collapse:before,
.navbar-collapse:after {
  display: table;
  content: " ";
}

.navbar-collapse:after {
  clear: both;
}

.navbar-collapse:before,
.navbar-collapse:after {
  display: table;
  content: " ";
}

.navbar-collapse:after {
  clear: both;
}

.navbar-collapse.in {
  overflow-y: auto;
}

@media (min-width: 768px) {
  .navbar-collapse {
    width: auto;
    border-top: 0;
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
  .navbar-collapse .navbar-nav.navbar-left:first-child {
    margin-left: -15px;
  }
  .navbar-collapse .navbar-nav.navbar-right:last-child {
    margin-right: -15px;
  }
  .navbar-collapse .navbar-text:last-child {
    margin-right: 0;
  }
}

.container > .navbar-header,
.container > .navbar-collapse {
  margin-right: -15px;
  margin-left: -15px;
}

@media (min-width: 768px) {
  .container > .navbar-header,
  .container > .navbar-collapse {
    margin-right: 0;
    margin-left: 0;
  }
}

.navbar-static-top {
  border-width: 0 0 1px;
}

@media (min-width: 768px) {
  .navbar-static-top {
    border-radius: 0;
  }
}

.navbar-fixed-top,
.navbar-fixed-bottom {
  position: fixed;
  right: 0;
  left: 0;
  border-width: 0 0 1px;
}

@media (min-width: 768px) {
  .navbar-fixed-top,
  .navbar-fixed-bottom {
    border-radius: 0;
  }
}

.navbar-fixed-top {
  top: 0;
  z-index: 1030;
}

.navbar-fixed-bottom {
  bottom: 0;
  margin-bottom: 0;
}

.navbar-brand {
  float: left;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}

.navbar-brand:hover,
.navbar-brand:focus {
  text-decoration: none;
}

@media (min-width: 768px) {
  .navbar > .container .navbar-brand {
    margin-left: -15px;
  }
}

.navbar-toggle {
  position: relative;
  float: right;
  padding: 9px 10px;
  margin-top: 8px;
  margin-right: 15px;
  margin-bottom: 8px;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: 4px;
}

.navbar-toggle .icon-bar {
  display: block;
  width: 22px;
  height: 2px;
  border-radius: 1px;
}

.navbar-toggle .icon-bar + .icon-bar {
  margin-top: 4px;
}

@media (min-width: 768px) {
  .navbar-toggle {
    display: none;
  }
}

.navbar-nav {
  margin: 7.5px -15px;
}

.navbar-nav > li > a {
  padding-top: 10px;
  padding-bottom: 10px;
  line-height: 20px;
}

@media (max-width: 767px) {
  .navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: 0;
    box-shadow: none;
  }
  .navbar-nav .open .dropdown-menu > li > a,
  .navbar-nav .open .dropdown-menu .dropdown-header {
    padding: 5px 15px 5px 25px;
  }
  .navbar-nav .open .dropdown-menu > li > a {
    line-height: 20px;
  }
  .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-nav .open .dropdown-menu > li > a:focus {
    background-image: none;
  }
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
  .navbar-left {
    float: left !important;
  }
  .navbar-right {
    float: right !important;
  }
}

.navbar-form {
  padding: 10px 15px;
  margin-top: 8px;
  margin-right: -15px;
  margin-bottom: 8px;
  margin-left: -15px;
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);
}

@media (min-width: 768px) {
  .navbar-form .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .navbar-form .form-control {
    display: inline-block;
  }
  .navbar-form .radio,
  .navbar-form .checkbox {
    display: inline-block;
    padding-left: 0;
    margin-top: 0;
    margin-bottom: 0;
  }
  .navbar-form .radio input[type="radio"],
  .navbar-form .checkbox input[type="checkbox"] {
    float: none;
    margin-left: 0;
  }
}

@media (max-width: 767px) {
  .navbar-form .form-group {
    margin-bottom: 5px;
  }
}

@media (min-width: 768px) {
  .navbar-form {
    width: auto;
    padding-top: 0;
    padding-bottom: 0;
    margin-right: 0;
    margin-left: 0;
    border: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
}

.navbar-nav > li > .dropdown-menu {
  margin-top: 0;
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}

.navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.navbar-nav.pull-right > li > .dropdown-menu,
.navbar-nav > li > .dropdown-menu.pull-right {
  right: 0;
  left: auto;
}

.navbar-btn {
  margin-top: 8px;
  margin-bottom: 8px;
}

.navbar-text {
  float: left;
  margin-top: 15px;
  margin-bottom: 15px;
}

@media (min-width: 768px) {
  .navbar-text {
    margin-right: 15px;
    margin-left: 15px;
  }
}

.navbar-default {
  background-color: #f8f8f8;
  border-color: #e7e7e7;
}

.navbar-default .navbar-brand {
  color: #777777;
}

.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #5e5e5e;
  background-color: transparent;
}

.navbar-default .navbar-text {
  color: #777777;
}

.navbar-default .navbar-nav > li > a {
  color: #777777;
}

.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #333333;
  background-color: transparent;
}

.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #555555;
  background-color: #e7e7e7;
}

.navbar-default .navbar-nav > .disabled > a,
.navbar-default .navbar-nav > .disabled > a:hover,
.navbar-default .navbar-nav > .disabled > a:focus {
  color: #cccccc;
  background-color: transparent;
}

.navbar-default .navbar-toggle {
  border-color: #dddddd;
}

.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #dddddd;
}

.navbar-default .navbar-toggle .icon-bar {
  background-color: #cccccc;
}

.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #e6e6e6;
}

.navbar-default .navbar-nav > .dropdown > a:hover .caret,
.navbar-default .navbar-nav > .dropdown > a:focus .caret {
  border-top-color: #333333;
  border-bottom-color: #333333;
}

.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #555555;
  background-color: #e7e7e7;
}

.navbar-default .navbar-nav > .open > a .caret,
.navbar-default .navbar-nav > .open > a:hover .caret,
.navbar-default .navbar-nav > .open > a:focus .caret {
  border-top-color: #555555;
  border-bottom-color: #555555;
}

.navbar-default .navbar-nav > .dropdown > a .caret {
  border-top-color: #777777;
  border-bottom-color: #777777;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #777777;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #333333;
    background-color: transparent;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #555555;
    background-color: #e7e7e7;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #cccccc;
    background-color: transparent;
  }
}

.navbar-default .navbar-link {
  color: #777777;
}

.navbar-default .navbar-link:hover {
  color: #333333;
}

.navbar-inverse {
  background-color: #222222;
  border-color: #080808;
}

.navbar-inverse .navbar-brand {
  color: #999999;
}

.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
  color: #ffffff;
  background-color: transparent;
}

.navbar-inverse .navbar-text {
  color: #999999;
}

.navbar-inverse .navbar-nav > li > a {
  color: #999999;
}

.navbar-inverse .navbar-nav > li > a:hover,
.navbar-inverse .navbar-nav > li > a:focus {
  color: #ffffff;
  background-color: transparent;
}

.navbar-inverse .navbar-nav > .active > a,
.navbar-inverse .navbar-nav > .active > a:hover,
.navbar-inverse .navbar-nav > .active > a:focus {
  color: #ffffff;
  background-color: #080808;
}

.navbar-inverse .navbar-nav > .disabled > a,
.navbar-inverse .navbar-nav > .disabled > a:hover,
.navbar-inverse .navbar-nav > .disabled > a:focus {
  color: #444444;
  background-color: transparent;
}

.navbar-inverse .navbar-toggle {
  border-color: #333333;
}

.navbar-inverse .navbar-toggle:hover,
.navbar-inverse .navbar-toggle:focus {
  background-color: #333333;
}

.navbar-inverse .navbar-toggle .icon-bar {
  background-color: #ffffff;
}

.navbar-inverse .navbar-collapse,
.navbar-inverse .navbar-form {
  border-color: #101010;
}

.navbar-inverse .navbar-nav > .open > a,
.navbar-inverse .navbar-nav > .open > a:hover,
.navbar-inverse .navbar-nav > .open > a:focus {
  color: #ffffff;
  background-color: #080808;
}

.navbar-inverse .navbar-nav > .dropdown > a:hover .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
}

.navbar-inverse .navbar-nav > .dropdown > a .caret {
  border-top-color: #999999;
  border-bottom-color: #999999;
}

.navbar-inverse .navbar-nav > .open > a .caret,
.navbar-inverse .navbar-nav > .open > a:hover .caret,
.navbar-inverse .navbar-nav > .open > a:focus .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
}

@media (max-width: 767px) {
  .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
    border-color: #080808;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
    color: #999999;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ffffff;
    background-color: transparent;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ffffff;
    background-color: #080808;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #444444;
    background-color: transparent;
  }
}

.navbar-inverse .navbar-link {
  color: #999999;
}

.navbar-inverse .navbar-link:hover {
  color: #ffffff;
}

.breadcrumb {
  padding: 8px 15px;
  margin-bottom: 20px;
  list-style: none;
  background-color: #f5f5f5;
  border-radius: 4px;
}

.breadcrumb > li {
  display: inline-block;
}

.breadcrumb > li + li:before {
  padding: 0 5px;
  color: #cccccc;
  content: "/\00a0";
}

.breadcrumb > .active {
  color: #999999;
}

.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}

.pagination > li {
  display: inline;
}

.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.428571429;
  text-decoration: none;
  background-color: #ffffff;
  border: 1px solid #dddddd;
}

.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 4px;
}

.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}

.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  background-color: #eeeeee;
}

.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 2;
  color: #ffffff;
  cursor: default;
  background-color: #428bca;
  border-color: #428bca;
}

.pagination > .disabled > span,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #999999;
  cursor: not-allowed;
  background-color: #ffffff;
  border-color: #dddddd;
}

.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
}

.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-bottom-left-radius: 6px;
  border-top-left-radius: 6px;
}

.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}

.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
}

.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-bottom-left-radius: 3px;
  border-top-left-radius: 3px;
}

.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

.pager {
  padding-left: 0;
  margin: 20px 0;
  text-align: center;
  list-style: none;
}

.pager:before,
.pager:after {
  display: table;
  content: " ";
}

.pager:after {
  clear: both;
}

.pager:before,
.pager:after {
  display: table;
  content: " ";
}

.pager:after {
  clear: both;
}

.pager li {
  display: inline;
}

.pager li > a,
.pager li > span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  border-radius: 15px;
}

.pager li > a:hover,
.pager li > a:focus {
  text-decoration: none;
  background-color: #eeeeee;
}

.pager .next > a,
.pager .next > span {
  float: right;
}

.pager .previous > a,
.pager .previous > span {
  float: left;
}

.pager .disabled > a,
.pager .disabled > a:hover,
.pager .disabled > a:focus,
.pager .disabled > span {
  color: #999999;
  cursor: not-allowed;
  background-color: #ffffff;
}

.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #ffffff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}

.label[href]:hover,
.label[href]:focus {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}

.label:empty {
  display: none;
}

.label-default {
  background-color: #999999;
}

.label-default[href]:hover,
.label-default[href]:focus {
  background-color: #808080;
}

.label-primary {
  background-color: #428bca;
}

.label-primary[href]:hover,
.label-primary[href]:focus {
  background-color: #3071a9;
}

.label-success {
  background-color: #5cb85c;
}

.label-success[href]:hover,
.label-success[href]:focus {
  background-color: #449d44;
}

.label-info {
  background-color: #5bc0de;
}

.label-info[href]:hover,
.label-info[href]:focus {
  background-color: #31b0d5;
}

.label-warning {
  background-color: #f0ad4e;
}

.label-warning[href]:hover,
.label-warning[href]:focus {
  background-color: #ec971f;
}

.label-danger {
  background-color: #d9534f;
}

.label-danger[href]:hover,
.label-danger[href]:focus {
  background-color: #c9302c;
}

.badge {
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: bold;
  line-height: 1;
  color: #ffffff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  background-color: #999999;
  border-radius: 10px;
}

.badge:empty {
  display: none;
}

a.badge:hover,
a.badge:focus {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}

.btn .badge {
  position: relative;
  top: -1px;
}

a.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {
  color: #428bca;
  background-color: #ffffff;
}

.nav-pills > li > a > .badge {
  margin-left: 3px;
}

.jumbotron {
  padding: 30px;
  margin-bottom: 30px;
  font-size: 21px;
  font-weight: 200;
  line-height: 2.1428571435;
  color: inherit;
  background-color: #eeeeee;
}

.jumbotron h1 {
  line-height: 1;
  color: inherit;
}

.jumbotron p {
  line-height: 1.4;
}

.container .jumbotron {
  border-radius: 6px;
}

@media screen and (min-width: 768px) {
  .jumbotron {
    padding-top: 48px;
    padding-bottom: 48px;
  }
  .container .jumbotron {
    padding-right: 60px;
    padding-left: 60px;
  }
  .jumbotron h1 {
    font-size: 63px;
  }
}

.thumbnail {
  display: inline-block;
  display: block;
  height: auto;
  max-width: 100%;
  padding: 4px;
  line-height: 1.428571429;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  border-radius: 4px;
  -webkit-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
}

.thumbnail > img {
  display: block;
  height: auto;
  max-width: 100%;
}

a.thumbnail:hover,
a.thumbnail:focus {
  border-color: #428bca;
}

.thumbnail > img {
  margin-right: auto;
  margin-left: auto;
}

.thumbnail .caption {
  padding: 9px;
  color: #333333;
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert h4 {
  margin-top: 0;
  color: inherit;
}

.alert .alert-link {
  font-weight: bold;
}

.alert > p,
.alert > ul {
  margin-bottom: 0;
}

.alert > p + p {
  margin-top: 5px;
}

.alert-dismissable {
  padding-right: 35px;
}

.alert-dismissable .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}

.alert-success {
  color: #468847;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}

.alert-success hr {
  border-top-color: #c9e2b3;
}

.alert-success .alert-link {
  color: #356635;
}

.alert-info {
  color: #3a87ad;
  background-color: #d9edf7;
  border-color: #bce8f1;
}

.alert-info hr {
  border-top-color: #a6e1ec;
}

.alert-info .alert-link {
  color: #2d6987;
}

.alert-warning {
  color: #c09853;
  background-color: #fcf8e3;
  border-color: #fbeed5;
}

.alert-warning hr {
  border-top-color: #f8e5be;
}

.alert-warning .alert-link {
  color: #a47e3c;
}

.alert-danger {
  color: #b94a48;
  background-color: #f2dede;
  border-color: #eed3d7;
}

.alert-danger hr {
  border-top-color: #e6c1c7;
}

.alert-danger .alert-link {
  color: #953b39;
}

@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}

@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}

.progress {
  height: 20px;
  margin-bottom: 20px;
  overflow: hidden;
  background-color: #f5f5f5;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

.progress-bar {
  float: left;
  width: 0;
  height: 100%;
  font-size: 12px;
  color: #ffffff;
  text-align: center;
  background-color: #428bca;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
  -webkit-transition: width 0.6s ease;
          transition: width 0.6s ease;
}

.progress-striped .progress-bar {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 40px 40px;
}

.progress.active .progress-bar {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
     -moz-animation: progress-bar-stripes 2s linear infinite;
      -ms-animation: progress-bar-stripes 2s linear infinite;
       -o-animation: progress-bar-stripes 2s linear infinite;
          animation: progress-bar-stripes 2s linear infinite;
}

.progress-bar-success {
  background-color: #5cb85c;
}

.progress-striped .progress-bar-success {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-info {
  background-color: #5bc0de;
}

.progress-striped .progress-bar-info {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-warning {
  background-color: #f0ad4e;
}

.progress-striped .progress-bar-warning {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-danger {
  background-color: #d9534f;
}

.progress-striped .progress-bar-danger {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.media,
.media-body {
  overflow: hidden;
  zoom: 1;
}

.media,
.media .media {
  margin-top: 15px;
}

.media:first-child {
  margin-top: 0;
}

.media-object {
  display: block;
}

.media-heading {
  margin: 0 0 5px;
}

.media > .pull-left {
  margin-right: 10px;
}

.media > .pull-right {
  margin-left: 10px;
}

.media-list {
  padding-left: 0;
  list-style: none;
}

.list-group {
  padding-left: 0;
  margin-bottom: 20px;
}

.list-group-item {
  position: relative;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: #ffffff;
  border: 1px solid #dddddd;
}

.list-group-item:first-child {
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
}

.list-group-item:last-child {
  margin-bottom: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
}

.list-group-item > .badge {
  float: right;
}

.list-group-item > .badge + .badge {
  margin-right: 5px;
}

a.list-group-item {
  color: #555555;
}

a.list-group-item .list-group-item-heading {
  color: #333333;
}

a.list-group-item:hover,
a.list-group-item:focus {
  text-decoration: none;
  background-color: #f5f5f5;
}

.list-group-item.active,
.list-group-item.active:hover,
.list-group-item.active:focus {
  z-index: 2;
  color: #ffffff;
  background-color: #428bca;
  border-color: #428bca;
}

.list-group-item.active .list-group-item-heading,
.list-group-item.active:hover .list-group-item-heading,
.list-group-item.active:focus .list-group-item-heading {
  color: inherit;
}

.list-group-item.active .list-group-item-text,
.list-group-item.active:hover .list-group-item-text,
.list-group-item.active:focus .list-group-item-text {
  color: #e1edf7;
}

.list-group-item-heading {
  margin-top: 0;
  margin-bottom: 5px;
}

.list-group-item-text {
  margin-bottom: 0;
  line-height: 1.3;
}

.panel {
  margin-bottom: 20px;
  background-color: #ffffff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}

.panel-body {
  padding: 15px;
}

.panel-body:before,
.panel-body:after {
  display: table;
  content: " ";
}

.panel-body:after {
  clear: both;
}

.panel-body:before,
.panel-body:after {
  display: table;
  content: " ";
}

.panel-body:after {
  clear: both;
}

.panel > .list-group {
  margin-bottom: 0;
}

.panel > .list-group .list-group-item {
  border-width: 1px 0;
}

.panel > .list-group .list-group-item:first-child {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}

.panel > .list-group .list-group-item:last-child {
  border-bottom: 0;
}

.panel-heading + .list-group .list-group-item:first-child {
  border-top-width: 0;
}

.panel > .table {
  margin-bottom: 0;
}

.panel > .panel-body + .table {
  border-top: 1px solid #dddddd;
}

.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}

.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
}

.panel-title > a {
  color: inherit;
}

.panel-footer {
  padding: 10px 15px;
  background-color: #f5f5f5;
  border-top: 1px solid #dddddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}

.panel-group .panel {
  margin-bottom: 0;
  overflow: hidden;
  border-radius: 4px;
}

.panel-group .panel + .panel {
  margin-top: 5px;
}

.panel-group .panel-heading {
  border-bottom: 0;
}

.panel-group .panel-heading + .panel-collapse .panel-body {
  border-top: 1px solid #dddddd;
}

.panel-group .panel-footer {
  border-top: 0;
}

.panel-group .panel-footer + .panel-collapse .panel-body {
  border-bottom: 1px solid #dddddd;
}

.panel-default {
  border-color: #dddddd;
}

.panel-default > .panel-heading {
  color: #333333;
  background-color: #f5f5f5;
  border-color: #dddddd;
}

.panel-default > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #dddddd;
}

.panel-default > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #dddddd;
}

.panel-primary {
  border-color: #428bca;
}

.panel-primary > .panel-heading {
  color: #ffffff;
  background-color: #428bca;
  border-color: #428bca;
}

.panel-primary > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #428bca;
}

.panel-primary > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #428bca;
}

.panel-success {
  border-color: #d6e9c6;
}

.panel-success > .panel-heading {
  color: #468847;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}

.panel-success > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #d6e9c6;
}

.panel-success > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #d6e9c6;
}

.panel-warning {
  border-color: #fbeed5;
}

.panel-warning > .panel-heading {
  color: #c09853;
  background-color: #fcf8e3;
  border-color: #fbeed5;
}

.panel-warning > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #fbeed5;
}

.panel-warning > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #fbeed5;
}

.panel-danger {
  border-color: #eed3d7;
}

.panel-danger > .panel-heading {
  color: #b94a48;
  background-color: #f2dede;
  border-color: #eed3d7;
}

.panel-danger > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #eed3d7;
}

.panel-danger > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #eed3d7;
}

.panel-info {
  border-color: #bce8f1;
}

.panel-info > .panel-heading {
  color: #3a87ad;
  background-color: #d9edf7;
  border-color: #bce8f1;
}

.panel-info > .panel-heading + .panel-collapse .panel-body {
  border-top-color: #bce8f1;
}

.panel-info > .panel-footer + .panel-collapse .panel-body {
  border-bottom-color: #bce8f1;
}

.well {
  min-height: 20px;
  padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}

.well blockquote {
  border-color: #ddd;
  border-color: rgba(0, 0, 0, 0.15);
}

.well-lg {
  padding: 24px;
  border-radius: 6px;
}

.well-sm {
  padding: 9px;
  border-radius: 3px;
}

.close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000000;
  text-shadow: 0 1px 0 #ffffff;
  opacity: 0.2;
  filter: alpha(opacity=20);
}

.close:hover,
.close:focus {
  color: #000000;
  text-decoration: none;
  cursor: pointer;
  opacity: 0.5;
  filter: alpha(opacity=50);
}

button.close {
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
  -webkit-appearance: none;
}

.modal-open {
  overflow: hidden;
}

body.modal-open,
.modal-open .navbar-fixed-top,
.modal-open .navbar-fixed-bottom {
  margin-right: 15px;
}

.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  display: none;
  overflow: auto;
  overflow-y: scroll;
}

.modal.fade .modal-dialog {
  -webkit-transform: translate(0, -25%);
      -ms-transform: translate(0, -25%);
          transform: translate(0, -25%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
     -moz-transition: -moz-transform 0.3s ease-out;
       -o-transition: -o-transform 0.3s ease-out;
          transition: transform 0.3s ease-out;
}

.modal.in .modal-dialog {
  -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
          transform: translate(0, 0);
}

.modal-dialog {
  z-index: 1050;
  width: auto;
  padding: 10px;
  margin-right: auto;
  margin-left: auto;
}

.modal-content {
  position: relative;
  background-color: #ffffff;
  border: 1px solid #999999;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 6px;
  outline: none;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
          box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  background-clip: padding-box;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1030;
  background-color: #000000;
}

.modal-backdrop.fade {
  opacity: 0;
  filter: alpha(opacity=0);
}

.modal-backdrop.in {
  opacity: 0.5;
  filter: alpha(opacity=50);
}

.modal-header {
  min-height: 16.428571429px;
  padding: 15px;
  border-bottom: 1px solid #e5e5e5;
}

.modal-header .close {
  margin-top: -2px;
}

.modal-title {
  margin: 0;
  line-height: 1.428571429;
}

.modal-body {
  position: relative;
  padding: 20px;
}

.modal-footer {
  padding: 19px 20px 20px;
  margin-top: 15px;
  text-align: right;
  border-top: 1px solid #e5e5e5;
}

.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}

.modal-footer:after {
  clear: both;
}

.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}

.modal-footer:after {
  clear: both;
}

.modal-footer .btn + .btn {
  margin-bottom: 0;
  margin-left: 5px;
}

.modal-footer .btn-group .btn + .btn {
  margin-left: -1px;
}

.modal-footer .btn-block + .btn-block {
  margin-left: 0;
}

@media screen and (min-width: 768px) {
  .modal-dialog {
    right: auto;
    left: 50%;
    width: 600px;
    padding-top: 30px;
    padding-bottom: 30px;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
  }
}

.tooltip {
  position: absolute;
  z-index: 1030;
  display: block;
  font-size: 12px;
  line-height: 1.4;
  opacity: 0;
  filter: alpha(opacity=0);
  visibility: visible;
}

.tooltip.in {
  opacity: 0.9;
  filter: alpha(opacity=90);
}

.tooltip.top {
  padding: 5px 0;
  margin-top: -3px;
}

.tooltip.right {
  padding: 0 5px;
  margin-left: 3px;
}

.tooltip.bottom {
  padding: 5px 0;
  margin-top: 3px;
}

.tooltip.left {
  padding: 0 5px;
  margin-left: -3px;
}

.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #ffffff;
  text-align: center;
  text-decoration: none;
  background-color: #000000;
  border-radius: 4px;
}

.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

.tooltip.top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  border-top-color: #000000;
  border-width: 5px 5px 0;
}

.tooltip.top-left .tooltip-arrow {
  bottom: 0;
  left: 5px;
  border-top-color: #000000;
  border-width: 5px 5px 0;
}

.tooltip.top-right .tooltip-arrow {
  right: 5px;
  bottom: 0;
  border-top-color: #000000;
  border-width: 5px 5px 0;
}

.tooltip.right .tooltip-arrow {
  top: 50%;
  left: 0;
  margin-top: -5px;
  border-right-color: #000000;
  border-width: 5px 5px 5px 0;
}

.tooltip.left .tooltip-arrow {
  top: 50%;
  right: 0;
  margin-top: -5px;
  border-left-color: #000000;
  border-width: 5px 0 5px 5px;
}

.tooltip.bottom .tooltip-arrow {
  top: 0;
  left: 50%;
  margin-left: -5px;
  border-bottom-color: #000000;
  border-width: 0 5px 5px;
}

.tooltip.bottom-left .tooltip-arrow {
  top: 0;
  left: 5px;
  border-bottom-color: #000000;
  border-width: 0 5px 5px;
}

.tooltip.bottom-right .tooltip-arrow {
  top: 0;
  right: 5px;
  border-bottom-color: #000000;
  border-width: 0 5px 5px;
}

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1010;
  display: none;
  max-width: 276px;
  padding: 1px;
  text-align: left;
  white-space: normal;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  background-clip: padding-box;
}

.popover.top {
  margin-top: -10px;
}

.popover.right {
  margin-left: 10px;
}

.popover.bottom {
  margin-top: 10px;
}

.popover.left {
  margin-left: -10px;
}

.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 18px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0;
}

.popover-content {
  padding: 9px 14px;
}

.popover .arrow,
.popover .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

.popover .arrow {
  border-width: 11px;
}

.popover .arrow:after {
  border-width: 10px;
  content: "";
}

.popover.top .arrow {
  bottom: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-color: #999999;
  border-top-color: rgba(0, 0, 0, 0.25);
  border-bottom-width: 0;
}

.popover.top .arrow:after {
  bottom: 1px;
  margin-left: -10px;
  border-top-color: #ffffff;
  border-bottom-width: 0;
  content: " ";
}

.popover.right .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-right-color: #999999;
  border-right-color: rgba(0, 0, 0, 0.25);
  border-left-width: 0;
}

.popover.right .arrow:after {
  bottom: -10px;
  left: 1px;
  border-right-color: #ffffff;
  border-left-width: 0;
  content: " ";
}

.popover.bottom .arrow {
  top: -11px;
  left: 50%;
  margin-left: -11px;
  border-bottom-color: #999999;
  border-bottom-color: rgba(0, 0, 0, 0.25);
  border-top-width: 0;
}

.popover.bottom .arrow:after {
  top: 1px;
  margin-left: -10px;
  border-bottom-color: #ffffff;
  border-top-width: 0;
  content: " ";
}

.popover.left .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-left-color: #999999;
  border-left-color: rgba(0, 0, 0, 0.25);
  border-right-width: 0;
}

.popover.left .arrow:after {
  right: 1px;
  bottom: -10px;
  border-left-color: #ffffff;
  border-right-width: 0;
  content: " ";
}

.carousel {
  position: relative;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-inner > .item {
  position: relative;
  display: none;
  -webkit-transition: 0.6s ease-in-out left;
          transition: 0.6s ease-in-out left;
}

.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  height: auto;
  max-width: 100%;
  line-height: 1;
}

.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
  display: block;
}

.carousel-inner > .active {
  left: 0;
}

.carousel-inner > .next,
.carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}

.carousel-inner > .next {
  left: 100%;
}

.carousel-inner > .prev {
  left: -100%;
}

.carousel-inner > .next.left,
.carousel-inner > .prev.right {
  left: 0;
}

.carousel-inner > .active.left {
  left: -100%;
}

.carousel-inner > .active.right {
  left: 100%;
}

.carousel-control {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15%;
  font-size: 20px;
  color: #ffffff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
  opacity: 0.5;
  filter: alpha(opacity=50);
}

.carousel-control.left {
  background-image: -webkit-gradient(linear, 0 top, 100% top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.0001)));
  background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.5) 0), color-stop(rgba(0, 0, 0, 0.0001) 100%));
  background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
  background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
}

.carousel-control.right {
  right: 0;
  left: auto;
  background-image: -webkit-gradient(linear, 0 top, 100% top, from(rgba(0, 0, 0, 0.0001)), to(rgba(0, 0, 0, 0.5)));
  background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.0001) 0), color-stop(rgba(0, 0, 0, 0.5) 100%));
  background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
  background-image: linear-gradient(to right, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
}

.carousel-control:hover,
.carousel-control:focus {
  color: #ffffff;
  text-decoration: none;
  opacity: 0.9;
  filter: alpha(opacity=90);
}

.carousel-control .icon-prev,
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 5;
  display: inline-block;
}

.carousel-control .icon-prev,
.carousel-control .icon-next {
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  font-family: serif;
}

.carousel-control .icon-prev:before {
  content: '\2039';
}

.carousel-control .icon-next:before {
  content: '\203a';
}

.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 15;
  width: 60%;
  padding-left: 0;
  margin-left: -30%;
  text-align: center;
  list-style: none;
}

.carousel-indicators li {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 1px;
  text-indent: -999px;
  cursor: pointer;
  border: 1px solid #ffffff;
  border-radius: 10px;
}

.carousel-indicators .active {
  width: 12px;
  height: 12px;
  margin: 0;
  background-color: #ffffff;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #ffffff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
}

.carousel-caption .btn {
  text-shadow: none;
}

@media screen and (min-width: 768px) {
  .carousel-control .icon-prev,
  .carousel-control .icon-next {
    width: 30px;
    height: 30px;
    margin-top: -15px;
    margin-left: -15px;
    font-size: 30px;
  }
  .carousel-caption {
    right: 20%;
    left: 20%;
    padding-bottom: 30px;
  }
  .carousel-indicators {
    bottom: 20px;
  }
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: " ";
}

.clearfix:after {
  clear: both;
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

.affix {
  position: fixed;
}

@-ms-viewport {
  width: device-width;
}

@media screen and (max-width: 400px) {
  @-ms-viewport {
    width: 320px;
  }
}

.hidden {
  display: none !important;
  visibility: hidden !important;
}

.visible-xs {
  display: none !important;
}

tr.visible-xs {
  display: none !important;
}

th.visible-xs,
td.visible-xs {
  display: none !important;
}

@media (max-width: 767px) {
  .visible-xs {
    display: block !important;
  }
  tr.visible-xs {
    display: table-row !important;
  }
  th.visible-xs,
  td.visible-xs {
    display: table-cell !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .visible-xs.visible-sm {
    display: block !important;
  }
  tr.visible-xs.visible-sm {
    display: table-row !important;
  }
  th.visible-xs.visible-sm,
  td.visible-xs.visible-sm {
    display: table-cell !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .visible-xs.visible-md {
    display: block !important;
  }
  tr.visible-xs.visible-md {
    display: table-row !important;
  }
  th.visible-xs.visible-md,
  td.visible-xs.visible-md {
    display: table-cell !important;
  }
}

@media (min-width: 1200px) {
  .visible-xs.visible-lg {
    display: block !important;
  }
  tr.visible-xs.visible-lg {
    display: table-row !important;
  }
  th.visible-xs.visible-lg,
  td.visible-xs.visible-lg {
    display: table-cell !important;
  }
}

.visible-sm {
  display: none !important;
}

tr.visible-sm {
  display: none !important;
}

th.visible-sm,
td.visible-sm {
  display: none !important;
}

@media (max-width: 767px) {
  .visible-sm.visible-xs {
    display: block !important;
  }
  tr.visible-sm.visible-xs {
    display: table-row !important;
  }
  th.visible-sm.visible-xs,
  td.visible-sm.visible-xs {
    display: table-cell !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .visible-sm {
    display: block !important;
  }
  tr.visible-sm {
    display: table-row !important;
  }
  th.visible-sm,
  td.visible-sm {
    display: table-cell !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .visible-sm.visible-md {
    display: block !important;
  }
  tr.visible-sm.visible-md {
    display: table-row !important;
  }
  th.visible-sm.visible-md,
  td.visible-sm.visible-md {
    display: table-cell !important;
  }
}

@media (min-width: 1200px) {
  .visible-sm.visible-lg {
    display: block !important;
  }
  tr.visible-sm.visible-lg {
    display: table-row !important;
  }
  th.visible-sm.visible-lg,
  td.visible-sm.visible-lg {
    display: table-cell !important;
  }
}

.visible-md {
  display: none !important;
}

tr.visible-md {
  display: none !important;
}

th.visible-md,
td.visible-md {
  display: none !important;
}

@media (max-width: 767px) {
  .visible-md.visible-xs {
    display: block !important;
  }
  tr.visible-md.visible-xs {
    display: table-row !important;
  }
  th.visible-md.visible-xs,
  td.visible-md.visible-xs {
    display: table-cell !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .visible-md.visible-sm {
    display: block !important;
  }
  tr.visible-md.visible-sm {
    display: table-row !important;
  }
  th.visible-md.visible-sm,
  td.visible-md.visible-sm {
    display: table-cell !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .visible-md {
    display: block !important;
  }
  tr.visible-md {
    display: table-row !important;
  }
  th.visible-md,
  td.visible-md {
    display: table-cell !important;
  }
}

@media (min-width: 1200px) {
  .visible-md.visible-lg {
    display: block !important;
  }
  tr.visible-md.visible-lg {
    display: table-row !important;
  }
  th.visible-md.visible-lg,
  td.visible-md.visible-lg {
    display: table-cell !important;
  }
}

.visible-lg {
  display: none !important;
}

tr.visible-lg {
  display: none !important;
}

th.visible-lg,
td.visible-lg {
  display: none !important;
}

@media (max-width: 767px) {
  .visible-lg.visible-xs {
    display: block !important;
  }
  tr.visible-lg.visible-xs {
    display: table-row !important;
  }
  th.visible-lg.visible-xs,
  td.visible-lg.visible-xs {
    display: table-cell !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .visible-lg.visible-sm {
    display: block !important;
  }
  tr.visible-lg.visible-sm {
    display: table-row !important;
  }
  th.visible-lg.visible-sm,
  td.visible-lg.visible-sm {
    display: table-cell !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .visible-lg.visible-md {
    display: block !important;
  }
  tr.visible-lg.visible-md {
    display: table-row !important;
  }
  th.visible-lg.visible-md,
  td.visible-lg.visible-md {
    display: table-cell !important;
  }
}

@media (min-width: 1200px) {
  .visible-lg {
    display: block !important;
  }
  tr.visible-lg {
    display: table-row !important;
  }
  th.visible-lg,
  td.visible-lg {
    display: table-cell !important;
  }
}

.hidden-xs {
  display: block !important;
}

tr.hidden-xs {
  display: table-row !important;
}

th.hidden-xs,
td.hidden-xs {
  display: table-cell !important;
}

@media (max-width: 767px) {
  .hidden-xs {
    display: none !important;
  }
  tr.hidden-xs {
    display: none !important;
  }
  th.hidden-xs,
  td.hidden-xs {
    display: none !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .hidden-xs.hidden-sm {
    display: none !important;
  }
  tr.hidden-xs.hidden-sm {
    display: none !important;
  }
  th.hidden-xs.hidden-sm,
  td.hidden-xs.hidden-sm {
    display: none !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-xs.hidden-md {
    display: none !important;
  }
  tr.hidden-xs.hidden-md {
    display: none !important;
  }
  th.hidden-xs.hidden-md,
  td.hidden-xs.hidden-md {
    display: none !important;
  }
}

@media (min-width: 1200px) {
  .hidden-xs.hidden-lg {
    display: none !important;
  }
  tr.hidden-xs.hidden-lg {
    display: none !important;
  }
  th.hidden-xs.hidden-lg,
  td.hidden-xs.hidden-lg {
    display: none !important;
  }
}

.hidden-sm {
  display: block !important;
}

tr.hidden-sm {
  display: table-row !important;
}

th.hidden-sm,
td.hidden-sm {
  display: table-cell !important;
}

@media (max-width: 767px) {
  .hidden-sm.hidden-xs {
    display: none !important;
  }
  tr.hidden-sm.hidden-xs {
    display: none !important;
  }
  th.hidden-sm.hidden-xs,
  td.hidden-sm.hidden-xs {
    display: none !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .hidden-sm {
    display: none !important;
  }
  tr.hidden-sm {
    display: none !important;
  }
  th.hidden-sm,
  td.hidden-sm {
    display: none !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-sm.hidden-md {
    display: none !important;
  }
  tr.hidden-sm.hidden-md {
    display: none !important;
  }
  th.hidden-sm.hidden-md,
  td.hidden-sm.hidden-md {
    display: none !important;
  }
}

@media (min-width: 1200px) {
  .hidden-sm.hidden-lg {
    display: none !important;
  }
  tr.hidden-sm.hidden-lg {
    display: none !important;
  }
  th.hidden-sm.hidden-lg,
  td.hidden-sm.hidden-lg {
    display: none !important;
  }
}

.hidden-md {
  display: block !important;
}

tr.hidden-md {
  display: table-row !important;
}

th.hidden-md,
td.hidden-md {
  display: table-cell !important;
}

@media (max-width: 767px) {
  .hidden-md.hidden-xs {
    display: none !important;
  }
  tr.hidden-md.hidden-xs {
    display: none !important;
  }
  th.hidden-md.hidden-xs,
  td.hidden-md.hidden-xs {
    display: none !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .hidden-md.hidden-sm {
    display: none !important;
  }
  tr.hidden-md.hidden-sm {
    display: none !important;
  }
  th.hidden-md.hidden-sm,
  td.hidden-md.hidden-sm {
    display: none !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-md {
    display: none !important;
  }
  tr.hidden-md {
    display: none !important;
  }
  th.hidden-md,
  td.hidden-md {
    display: none !important;
  }
}

@media (min-width: 1200px) {
  .hidden-md.hidden-lg {
    display: none !important;
  }
  tr.hidden-md.hidden-lg {
    display: none !important;
  }
  th.hidden-md.hidden-lg,
  td.hidden-md.hidden-lg {
    display: none !important;
  }
}

.hidden-lg {
  display: block !important;
}

tr.hidden-lg {
  display: table-row !important;
}

th.hidden-lg,
td.hidden-lg {
  display: table-cell !important;
}

@media (max-width: 767px) {
  .hidden-lg.hidden-xs {
    display: none !important;
  }
  tr.hidden-lg.hidden-xs {
    display: none !important;
  }
  th.hidden-lg.hidden-xs,
  td.hidden-lg.hidden-xs {
    display: none !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .hidden-lg.hidden-sm {
    display: none !important;
  }
  tr.hidden-lg.hidden-sm {
    display: none !important;
  }
  th.hidden-lg.hidden-sm,
  td.hidden-lg.hidden-sm {
    display: none !important;
  }
}

@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-lg.hidden-md {
    display: none !important;
  }
  tr.hidden-lg.hidden-md {
    display: none !important;
  }
  th.hidden-lg.hidden-md,
  td.hidden-lg.hidden-md {
    display: none !important;
  }
}

@media (min-width: 1200px) {
  .hidden-lg {
    display: none !important;
  }
  tr.hidden-lg {
    display: none !important;
  }
  th.hidden-lg,
  td.hidden-lg {
    display: none !important;
  }
}

.visible-print {
  display: none !important;
}

tr.visible-print {
  display: none !important;
}

th.visible-print,
td.visible-print {
  display: none !important;
}

@media print {
  .visible-print {
    display: block !important;
  }
  tr.visible-print {
    display: table-row !important;
  }
  th.visible-print,
  td.visible-print {
    display: table-cell !important;
  }
  .hidden-print {
    display: none !important;
  }
  tr.hidden-print {
    display: none !important;
  }
  th.hidden-print,
  td.hidden-print {
    display: none !important;
  }
}



    <!-- Custom styles for this template -->
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->

body {
	background-color: #f2f2f2;
	  font-family: "Lato";
	  font-weight: 300;
	  font-size: 16px;
	  color: #555;
  
	  -webkit-font-smoothing: antialiased;
	  -webkit-overflow-scrolling: touch;
  }
  
  /* Titles */
  h1, h2, h3, h4, h5, h6 {
	  font-family: "Raleway";
	  font-weight: 300;
	  color: #333;
  }
  
  
  /* Paragraph & Typographic */
  p {
	  line-height: 28px;
	  margin-bottom: 25px;
  }
  
  .centered {
	  text-align: center;
  }
  
  /* Links */
  a {
	  color: #f85c37;
	  word-wrap: break-word;
  
	  -webkit-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -moz-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -ms-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -o-transition: color 0.1s ease-in, background 0.1s ease-in;
	  transition: color 0.1s ease-in, background 0.1s ease-in;
  }
  
  a:hover,
  a:focus {
	  color: #7b7b7b;
	  text-decoration: none;
	  outline: 0;
  }
  
  a:before,
  a:after {
	  -webkit-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -moz-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -ms-transition: color 0.1s ease-in, background 0.1s ease-in;
	  -o-transition: color 0.1s ease-in, background 0.1s ease-in;
	  transition: color 0.1s ease-in, background 0.1s ease-in;
  }
  
   hr {
	  display: block;
	  height: 1px;
	  border: 0;
	  border-top: 1px solid #ccc;
	  margin: 1em 0;
	  padding: 0;
  }
  
  
  /*---------------------------------------------------
	  3.1 Topbar
  ---------------------------------------------------*/
  
  #section-topbar {
	  position: fixed;
	  top: 0;
	  left: 0;
	  right: 0;
	  z-index: 10000;
	  overflow: visible;
	  font: normal 16px/24px  'Open Sans', "Helvetica Neue", Helvetica, Arial, sans-serif;
  }
  
  #section-topbar a {
	color: #fff;
  }
  
  #topbar-inner {
	  background: #111;
	  line-height: 0;
	  text-align: center;
  }
  
  /*
	  Top Bar
  
	  By default, top navigation bar uses "fixed" position
  */
  #section-topbar ul#nav {
	  display: inline-block;
	  position: relative;
	  margin: 0;
	  padding: 0;
  
	  border-right: 1px solid #222;
  
	  /* For IE, the outcast */
	  zoom:1;
	  *display: inline;
  }
  
  #section-topbar ul#nav > li {
	  display: block;
	  float: left;
	  padding: 0;
  }
  
  
  #section-topbar ul#nav a {
	display: block;
	font: normal 11px/18px "Helvetica Neue", Helvetica, Arial, sans-serif;
	text-decoration: none;
	padding: 18px 20px 18px 20px;
	border-left: 1px solid #222;
  }
  
	  #section-topbar ul#nav a:hover {
		background: #222;
		text-decoration: none;
		border-left: 1px solid #111;
	  }
  
	  #section-topbar ul#nav .active a {
		  background: #44bbaa;
		  border-left: 1px solid #111;
	  }
  
		  #section-topbar ul#nav .active a:hover {
			  background: #44bbaa;
		  }
  #section-topbar i {
	  font-size: 25px;
  }
  
  /* Header Wrap */
  #headerwrap {
	  background: url(https://res.cloudinary.com/dbeloveth/image/upload/v1523700237/pic2.jpg) no-repeat center top;
	  padding-top:400px;
	  text-align:center;
	  background-attachment: relative;
	  background-position: center center;
	  min-height: 1500px;
	  width: 100%;
	  
	  -webkit-background-size: 100%;
	  -moz-background-size: 100%;
	  -o-background-size: 100%;
	  background-size: 100%;
  
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
  }
  
  #headerwrap h1 {
	  font-size: 80px;
	  color: white;
  }
  
  #headerwrap h3 {
	  font-size: 20px;
	  color: white;
  }
  
  /* Intnro Wrap */
  
  #intro {
	  background: #2c3e50;
	  padding-top: 60px;
	  padding-bottom: 60px;
	  color: white;
  } 
  
  #intro h5, p {
	  color: white;
  }
  
  #intro i {
	  color: white;
	  font-size: 20px;
	  padding-right: 8px;
	  vertical-align: middle;
  }
  
  
  #skillswrap {
	  background: #2c3e50;
	  padding-top: 60px;
	  padding-bottom: 60px;
	  color: white;
  }
  
  #skillswrap h5, p {
	  color: white;
  }
  
  #footwrap {
	  background: #2f2f2f;
	  padding-top: 50px;
	  padding-bottom: 50px;
  }
  
  #footwrap p {
	  color: white;
  }
  
  #footwrap h5 {
	  color: white;
  }
  
  
  #footwrap t {
	  font-weight: 700;
  }
  
  #footwrap i {
	  padding-right: 8px;
	  color: #1abc9c;
  }
  
  /* Copyright Wrap */
  
  #c {
	  background: #222222;
	  padding-top: 15px;
	  text-align: right;
  }
  
  #c p {
	  color: white
  }
  
  
  
  /* Global Values */
  
  .desc {
	  padding-top: 50px;
  }
  
  .desc p {
	  color: #2f2f2f;
  }
  
  .desc t {
	  color: #34495e;
	  font-weight: 700;
  }
  
  .desc imp {
	  padding: 6px;
	  color: white;
	  background: #34495e;
  }
  
  .desc more {
	  color: #95a5a6;
  }
  
  
  sm {
	  font-size: 12px;
  }
    
	<!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->

	@font-face{font-family:'FontAwesome';src:url('../font/fontawesome-webfont-v=3.2.1.eot');src:url('../font/fontawesome-webfont-.eot#iefix&v=3.2.1') format('embedded-opentype'),url('../font/fontawesome-webfont-v=3.2.1.woff') format('woff'),url('../font/fontawesome-webfont-v=3.2.1.ttf') format('truetype'),url('../font/fontawesome-webfont.svg#fontawesomeregular?v=3.2.1') format('svg');font-weight:normal;font-style:normal;}[class^="icon-"],[class*=" icon-"]{font-family:FontAwesome;font-weight:normal;font-style:normal;text-decoration:inherit;-webkit-font-smoothing:antialiased;*margin-right:.3em;}
[class^="icon-"]:before,[class*=" icon-"]:before{text-decoration:inherit;display:inline-block;speak:none;}
.icon-large:before{vertical-align:-10%;font-size:1.3333333333333333em;}
a [class^="icon-"],a [class*=" icon-"]{display:inline;}
[class^="icon-"].icon-fixed-width,[class*=" icon-"].icon-fixed-width{display:inline-block;width:1.1428571428571428em;text-align:right;padding-right:0.2857142857142857em;}[class^="icon-"].icon-fixed-width.icon-large,[class*=" icon-"].icon-fixed-width.icon-large{width:1.4285714285714286em;}
.icons-ul{margin-left:2.142857142857143em;list-style-type:none;}.icons-ul>li{position:relative;}
.icons-ul .icon-li{position:absolute;left:-2.142857142857143em;width:2.142857142857143em;text-align:center;line-height:inherit;}
[class^="icon-"].hide,[class*=" icon-"].hide{display:none;}
.icon-muted{color:#eeeeee;}
.icon-light{color:#ffffff;}
.icon-dark{color:#333333;}
.icon-border{border:solid 1px #eeeeee;padding:.2em .25em .15em;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;}
.icon-2x{font-size:2em;}.icon-2x.icon-border{border-width:2px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
.icon-3x{font-size:3em;}.icon-3x.icon-border{border-width:3px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;}
.icon-4x{font-size:4em;}.icon-4x.icon-border{border-width:4px;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;}
.icon-5x{font-size:5em;}.icon-5x.icon-border{border-width:5px;-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px;}
.pull-right{float:right;}
.pull-left{float:left;}
[class^="icon-"].pull-left,[class*=" icon-"].pull-left{margin-right:.3em;}
[class^="icon-"].pull-right,[class*=" icon-"].pull-right{margin-left:.3em;}
[class^="icon-"],[class*=" icon-"]{display:inline;width:auto;height:auto;line-height:normal;vertical-align:baseline;background-image:none;background-position:0% 0%;background-repeat:repeat;margin-top:0;}
.icon-white,.nav-pills>.active>a>[class^="icon-"],.nav-pills>.active>a>[class*=" icon-"],.nav-list>.active>a>[class^="icon-"],.nav-list>.active>a>[class*=" icon-"],.navbar-inverse .nav>.active>a>[class^="icon-"],.navbar-inverse .nav>.active>a>[class*=" icon-"],.dropdown-menu>li>a:hover>[class^="icon-"],.dropdown-menu>li>a:hover>[class*=" icon-"],.dropdown-menu>.active>a>[class^="icon-"],.dropdown-menu>.active>a>[class*=" icon-"],.dropdown-submenu:hover>a>[class^="icon-"],.dropdown-submenu:hover>a>[class*=" icon-"]{background-image:none;}
.btn [class^="icon-"].icon-large,.nav [class^="icon-"].icon-large,.btn [class*=" icon-"].icon-large,.nav [class*=" icon-"].icon-large{line-height:.9em;}
.btn [class^="icon-"].icon-spin,.nav [class^="icon-"].icon-spin,.btn [class*=" icon-"].icon-spin,.nav [class*=" icon-"].icon-spin{display:inline-block;}
.nav-tabs [class^="icon-"],.nav-pills [class^="icon-"],.nav-tabs [class*=" icon-"],.nav-pills [class*=" icon-"],.nav-tabs [class^="icon-"].icon-large,.nav-pills [class^="icon-"].icon-large,.nav-tabs [class*=" icon-"].icon-large,.nav-pills [class*=" icon-"].icon-large{line-height:.9em;}
.btn [class^="icon-"].pull-left.icon-2x,.btn [class*=" icon-"].pull-left.icon-2x,.btn [class^="icon-"].pull-right.icon-2x,.btn [class*=" icon-"].pull-right.icon-2x{margin-top:.18em;}
.btn [class^="icon-"].icon-spin.icon-large,.btn [class*=" icon-"].icon-spin.icon-large{line-height:.8em;}
.btn.btn-small [class^="icon-"].pull-left.icon-2x,.btn.btn-small [class*=" icon-"].pull-left.icon-2x,.btn.btn-small [class^="icon-"].pull-right.icon-2x,.btn.btn-small [class*=" icon-"].pull-right.icon-2x{margin-top:.25em;}
.btn.btn-large [class^="icon-"],.btn.btn-large [class*=" icon-"]{margin-top:0;}.btn.btn-large [class^="icon-"].pull-left.icon-2x,.btn.btn-large [class*=" icon-"].pull-left.icon-2x,.btn.btn-large [class^="icon-"].pull-right.icon-2x,.btn.btn-large [class*=" icon-"].pull-right.icon-2x{margin-top:.05em;}
.btn.btn-large [class^="icon-"].pull-left.icon-2x,.btn.btn-large [class*=" icon-"].pull-left.icon-2x{margin-right:.2em;}
.btn.btn-large [class^="icon-"].pull-right.icon-2x,.btn.btn-large [class*=" icon-"].pull-right.icon-2x{margin-left:.2em;}
.nav-list [class^="icon-"],.nav-list [class*=" icon-"]{line-height:inherit;}
.icon-stack{position:relative;display:inline-block;width:2em;height:2em;line-height:2em;vertical-align:-35%;}.icon-stack [class^="icon-"],.icon-stack [class*=" icon-"]{display:block;text-align:center;position:absolute;width:100%;height:100%;font-size:1em;line-height:inherit;*line-height:2em;}
.icon-stack .icon-stack-base{font-size:2em;*line-height:1em;}
.icon-spin{display:inline-block;-moz-animation:spin 2s infinite linear;-o-animation:spin 2s infinite linear;-webkit-animation:spin 2s infinite linear;animation:spin 2s infinite linear;}
a .icon-stack,a .icon-spin{display:inline-block;text-decoration:none;}
@-moz-keyframes spin{0%{-moz-transform:rotate(0deg);} 100%{-moz-transform:rotate(359deg);}}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg);} 100%{-webkit-transform:rotate(359deg);}}@-o-keyframes spin{0%{-o-transform:rotate(0deg);} 100%{-o-transform:rotate(359deg);}}@-ms-keyframes spin{0%{-ms-transform:rotate(0deg);} 100%{-ms-transform:rotate(359deg);}}@keyframes spin{0%{transform:rotate(0deg);} 100%{transform:rotate(359deg);}}.icon-rotate-90:before{-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);-o-transform:rotate(90deg);transform:rotate(90deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1);}
.icon-rotate-180:before{-webkit-transform:rotate(180deg);-moz-transform:rotate(180deg);-ms-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=2);}
.icon-rotate-270:before{-webkit-transform:rotate(270deg);-moz-transform:rotate(270deg);-ms-transform:rotate(270deg);-o-transform:rotate(270deg);transform:rotate(270deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);}
.icon-flip-horizontal:before{-webkit-transform:scale(-1, 1);-moz-transform:scale(-1, 1);-ms-transform:scale(-1, 1);-o-transform:scale(-1, 1);transform:scale(-1, 1);}
.icon-flip-vertical:before{-webkit-transform:scale(1, -1);-moz-transform:scale(1, -1);-ms-transform:scale(1, -1);-o-transform:scale(1, -1);transform:scale(1, -1);}
a .icon-rotate-90:before,a .icon-rotate-180:before,a .icon-rotate-270:before,a .icon-flip-horizontal:before,a .icon-flip-vertical:before{display:inline-block;}
.icon-glass:before{content:"\f000";}
.icon-music:before{content:"\f001";}
.icon-search:before{content:"\f002";}
.icon-envelope-alt:before{content:"\f003";}
.icon-heart:before{content:"\f004";}
.icon-star:before{content:"\f005";}
.icon-star-empty:before{content:"\f006";}
.icon-user:before{content:"\f007";}
.icon-film:before{content:"\f008";}
.icon-th-large:before{content:"\f009";}
.icon-th:before{content:"\f00a";}
.icon-th-list:before{content:"\f00b";}
.icon-ok:before{content:"\f00c";}
.icon-remove:before{content:"\f00d";}
.icon-zoom-in:before{content:"\f00e";}
.icon-zoom-out:before{content:"\f010";}
.icon-power-off:before,.icon-off:before{content:"\f011";}
.icon-signal:before{content:"\f012";}
.icon-gear:before,.icon-cog:before{content:"\f013";}
.icon-trash:before{content:"\f014";}
.icon-home:before{content:"\f015";}
.icon-file-alt:before{content:"\f016";}
.icon-time:before{content:"\f017";}
.icon-road:before{content:"\f018";}
.icon-download-alt:before{content:"\f019";}
.icon-download:before{content:"\f01a";}
.icon-upload:before{content:"\f01b";}
.icon-inbox:before{content:"\f01c";}
.icon-play-circle:before{content:"\f01d";}
.icon-rotate-right:before,.icon-repeat:before{content:"\f01e";}
.icon-refresh:before{content:"\f021";}
.icon-list-alt:before{content:"\f022";}
.icon-lock:before{content:"\f023";}
.icon-flag:before{content:"\f024";}
.icon-headphones:before{content:"\f025";}
.icon-volume-off:before{content:"\f026";}
.icon-volume-down:before{content:"\f027";}
.icon-volume-up:before{content:"\f028";}
.icon-qrcode:before{content:"\f029";}
.icon-barcode:before{content:"\f02a";}
.icon-tag:before{content:"\f02b";}
.icon-tags:before{content:"\f02c";}
.icon-book:before{content:"\f02d";}
.icon-bookmark:before{content:"\f02e";}
.icon-print:before{content:"\f02f";}
.icon-camera:before{content:"\f030";}
.icon-font:before{content:"\f031";}
.icon-bold:before{content:"\f032";}
.icon-italic:before{content:"\f033";}
.icon-text-height:before{content:"\f034";}
.icon-text-width:before{content:"\f035";}
.icon-align-left:before{content:"\f036";}
.icon-align-center:before{content:"\f037";}
.icon-align-right:before{content:"\f038";}
.icon-align-justify:before{content:"\f039";}
.icon-list:before{content:"\f03a";}
.icon-indent-left:before{content:"\f03b";}
.icon-indent-right:before{content:"\f03c";}
.icon-facetime-video:before{content:"\f03d";}
.icon-picture:before{content:"\f03e";}
.icon-pencil:before{content:"\f040";}
.icon-map-marker:before{content:"\f041";}
.icon-adjust:before{content:"\f042";}
.icon-tint:before{content:"\f043";}
.icon-edit:before{content:"\f044";}
.icon-share:before{content:"\f045";}
.icon-check:before{content:"\f046";}
.icon-move:before{content:"\f047";}
.icon-step-backward:before{content:"\f048";}
.icon-fast-backward:before{content:"\f049";}
.icon-backward:before{content:"\f04a";}
.icon-play:before{content:"\f04b";}
.icon-pause:before{content:"\f04c";}
.icon-stop:before{content:"\f04d";}
.icon-forward:before{content:"\f04e";}
.icon-fast-forward:before{content:"\f050";}
.icon-step-forward:before{content:"\f051";}
.icon-eject:before{content:"\f052";}
.icon-chevron-left:before{content:"\f053";}
.icon-chevron-right:before{content:"\f054";}
.icon-plus-sign:before{content:"\f055";}
.icon-minus-sign:before{content:"\f056";}
.icon-remove-sign:before{content:"\f057";}
.icon-ok-sign:before{content:"\f058";}
.icon-question-sign:before{content:"\f059";}
.icon-info-sign:before{content:"\f05a";}
.icon-screenshot:before{content:"\f05b";}
.icon-remove-circle:before{content:"\f05c";}
.icon-ok-circle:before{content:"\f05d";}
.icon-ban-circle:before{content:"\f05e";}
.icon-arrow-left:before{content:"\f060";}
.icon-arrow-right:before{content:"\f061";}
.icon-arrow-up:before{content:"\f062";}
.icon-arrow-down:before{content:"\f063";}
.icon-mail-forward:before,.icon-share-alt:before{content:"\f064";}
.icon-resize-full:before{content:"\f065";}
.icon-resize-small:before{content:"\f066";}
.icon-plus:before{content:"\f067";}
.icon-minus:before{content:"\f068";}
.icon-asterisk:before{content:"\f069";}
.icon-exclamation-sign:before{content:"\f06a";}
.icon-gift:before{content:"\f06b";}
.icon-leaf:before{content:"\f06c";}
.icon-fire:before{content:"\f06d";}
.icon-eye-open:before{content:"\f06e";}
.icon-eye-close:before{content:"\f070";}
.icon-warning-sign:before{content:"\f071";}
.icon-plane:before{content:"\f072";}
.icon-calendar:before{content:"\f073";}
.icon-random:before{content:"\f074";}
.icon-comment:before{content:"\f075";}
.icon-magnet:before{content:"\f076";}
.icon-chevron-up:before{content:"\f077";}
.icon-chevron-down:before{content:"\f078";}
.icon-retweet:before{content:"\f079";}
.icon-shopping-cart:before{content:"\f07a";}
.icon-folder-close:before{content:"\f07b";}
.icon-folder-open:before{content:"\f07c";}
.icon-resize-vertical:before{content:"\f07d";}
.icon-resize-horizontal:before{content:"\f07e";}
.icon-bar-chart:before{content:"\f080";}
.icon-twitter-sign:before{content:"\f081";}
.icon-facebook-sign:before{content:"\f082";}
.icon-camera-retro:before{content:"\f083";}
.icon-key:before{content:"\f084";}
.icon-gears:before,.icon-cogs:before{content:"\f085";}
.icon-comments:before{content:"\f086";}
.icon-thumbs-up-alt:before{content:"\f087";}
.icon-thumbs-down-alt:before{content:"\f088";}
.icon-star-half:before{content:"\f089";}
.icon-heart-empty:before{content:"\f08a";}
.icon-signout:before{content:"\f08b";}
.icon-linkedin-sign:before{content:"\f08c";}
.icon-pushpin:before{content:"\f08d";}
.icon-external-link:before{content:"\f08e";}
.icon-signin:before{content:"\f090";}
.icon-trophy:before{content:"\f091";}
.icon-github-sign:before{content:"\f092";}
.icon-upload-alt:before{content:"\f093";}
.icon-lemon:before{content:"\f094";}
.icon-phone:before{content:"\f095";}
.icon-unchecked:before,.icon-check-empty:before{content:"\f096";}
.icon-bookmark-empty:before{content:"\f097";}
.icon-phone-sign:before{content:"\f098";}
.icon-twitter:before{content:"\f099";}
.icon-facebook:before{content:"\f09a";}
.icon-github:before{content:"\f09b";}
.icon-unlock:before{content:"\f09c";}
.icon-credit-card:before{content:"\f09d";}
.icon-rss:before{content:"\f09e";}
.icon-hdd:before{content:"\f0a0";}
.icon-bullhorn:before{content:"\f0a1";}
.icon-bell:before{content:"\f0a2";}
.icon-certificate:before{content:"\f0a3";}
.icon-hand-right:before{content:"\f0a4";}
.icon-hand-left:before{content:"\f0a5";}
.icon-hand-up:before{content:"\f0a6";}
.icon-hand-down:before{content:"\f0a7";}
.icon-circle-arrow-left:before{content:"\f0a8";}
.icon-circle-arrow-right:before{content:"\f0a9";}
.icon-circle-arrow-up:before{content:"\f0aa";}
.icon-circle-arrow-down:before{content:"\f0ab";}
.icon-globe:before{content:"\f0ac";}
.icon-wrench:before{content:"\f0ad";}
.icon-tasks:before{content:"\f0ae";}
.icon-filter:before{content:"\f0b0";}
.icon-briefcase:before{content:"\f0b1";}
.icon-fullscreen:before{content:"\f0b2";}
.icon-group:before{content:"\f0c0";}
.icon-link:before{content:"\f0c1";}
.icon-cloud:before{content:"\f0c2";}
.icon-beaker:before{content:"\f0c3";}
.icon-cut:before{content:"\f0c4";}
.icon-copy:before{content:"\f0c5";}
.icon-paperclip:before,.icon-paper-clip:before{content:"\f0c6";}
.icon-save:before{content:"\f0c7";}
.icon-sign-blank:before{content:"\f0c8";}
.icon-reorder:before{content:"\f0c9";}
.icon-list-ul:before{content:"\f0ca";}
.icon-list-ol:before{content:"\f0cb";}
.icon-strikethrough:before{content:"\f0cc";}
.icon-underline:before{content:"\f0cd";}
.icon-table:before{content:"\f0ce";}
.icon-magic:before{content:"\f0d0";}
.icon-truck:before{content:"\f0d1";}
.icon-pinterest:before{content:"\f0d2";}
.icon-pinterest-sign:before{content:"\f0d3";}
.icon-google-plus-sign:before{content:"\f0d4";}
.icon-google-plus:before{content:"\f0d5";}
.icon-money:before{content:"\f0d6";}
.icon-caret-down:before{content:"\f0d7";}
.icon-caret-up:before{content:"\f0d8";}
.icon-caret-left:before{content:"\f0d9";}
.icon-caret-right:before{content:"\f0da";}
.icon-columns:before{content:"\f0db";}
.icon-sort:before{content:"\f0dc";}
.icon-sort-down:before{content:"\f0dd";}
.icon-sort-up:before{content:"\f0de";}
.icon-envelope:before{content:"\f0e0";}
.icon-linkedin:before{content:"\f0e1";}
.icon-rotate-left:before,.icon-undo:before{content:"\f0e2";}
.icon-legal:before{content:"\f0e3";}
.icon-dashboard:before{content:"\f0e4";}
.icon-comment-alt:before{content:"\f0e5";}
.icon-comments-alt:before{content:"\f0e6";}
.icon-bolt:before{content:"\f0e7";}
.icon-sitemap:before{content:"\f0e8";}
.icon-umbrella:before{content:"\f0e9";}
.icon-paste:before{content:"\f0ea";}
.icon-lightbulb:before{content:"\f0eb";}
.icon-exchange:before{content:"\f0ec";}
.icon-cloud-download:before{content:"\f0ed";}
.icon-cloud-upload:before{content:"\f0ee";}
.icon-user-md:before{content:"\f0f0";}
.icon-stethoscope:before{content:"\f0f1";}
.icon-suitcase:before{content:"\f0f2";}
.icon-bell-alt:before{content:"\f0f3";}
.icon-coffee:before{content:"\f0f4";}
.icon-food:before{content:"\f0f5";}
.icon-file-text-alt:before{content:"\f0f6";}
.icon-building:before{content:"\f0f7";}
.icon-hospital:before{content:"\f0f8";}
.icon-ambulance:before{content:"\f0f9";}
.icon-medkit:before{content:"\f0fa";}
.icon-fighter-jet:before{content:"\f0fb";}
.icon-beer:before{content:"\f0fc";}
.icon-h-sign:before{content:"\f0fd";}
.icon-plus-sign-alt:before{content:"\f0fe";}
.icon-double-angle-left:before{content:"\f100";}
.icon-double-angle-right:before{content:"\f101";}
.icon-double-angle-up:before{content:"\f102";}
.icon-double-angle-down:before{content:"\f103";}
.icon-angle-left:before{content:"\f104";}
.icon-angle-right:before{content:"\f105";}
.icon-angle-up:before{content:"\f106";}
.icon-angle-down:before{content:"\f107";}
.icon-desktop:before{content:"\f108";}
.icon-laptop:before{content:"\f109";}
.icon-tablet:before{content:"\f10a";}
.icon-mobile-phone:before{content:"\f10b";}
.icon-circle-blank:before{content:"\f10c";}
.icon-quote-left:before{content:"\f10d";}
.icon-quote-right:before{content:"\f10e";}
.icon-spinner:before{content:"\f110";}
.icon-circle:before{content:"\f111";}
.icon-mail-reply:before,.icon-reply:before{content:"\f112";}
.icon-github-alt:before{content:"\f113";}
.icon-folder-close-alt:before{content:"\f114";}
.icon-folder-open-alt:before{content:"\f115";}
.icon-expand-alt:before{content:"\f116";}
.icon-collapse-alt:before{content:"\f117";}
.icon-smile:before{content:"\f118";}
.icon-frown:before{content:"\f119";}
.icon-meh:before{content:"\f11a";}
.icon-gamepad:before{content:"\f11b";}
.icon-keyboard:before{content:"\f11c";}
.icon-flag-alt:before{content:"\f11d";}
.icon-flag-checkered:before{content:"\f11e";}
.icon-terminal:before{content:"\f120";}
.icon-code:before{content:"\f121";}
.icon-reply-all:before{content:"\f122";}
.icon-mail-reply-all:before{content:"\f122";}
.icon-star-half-full:before,.icon-star-half-empty:before{content:"\f123";}
.icon-location-arrow:before{content:"\f124";}
.icon-crop:before{content:"\f125";}
.icon-code-fork:before{content:"\f126";}
.icon-unlink:before{content:"\f127";}
.icon-question:before{content:"\f128";}
.icon-info:before{content:"\f129";}
.icon-exclamation:before{content:"\f12a";}
.icon-superscript:before{content:"\f12b";}
.icon-subscript:before{content:"\f12c";}
.icon-eraser:before{content:"\f12d";}
.icon-puzzle-piece:before{content:"\f12e";}
.icon-microphone:before{content:"\f130";}
.icon-microphone-off:before{content:"\f131";}
.icon-shield:before{content:"\f132";}
.icon-calendar-empty:before{content:"\f133";}
.icon-fire-extinguisher:before{content:"\f134";}
.icon-rocket:before{content:"\f135";}
.icon-maxcdn:before{content:"\f136";}
.icon-chevron-sign-left:before{content:"\f137";}
.icon-chevron-sign-right:before{content:"\f138";}
.icon-chevron-sign-up:before{content:"\f139";}
.icon-chevron-sign-down:before{content:"\f13a";}
.icon-html5:before{content:"\f13b";}
.icon-css3:before{content:"\f13c";}
.icon-anchor:before{content:"\f13d";}
.icon-unlock-alt:before{content:"\f13e";}
.icon-bullseye:before{content:"\f140";}
.icon-ellipsis-horizontal:before{content:"\f141";}
.icon-ellipsis-vertical:before{content:"\f142";}
.icon-rss-sign:before{content:"\f143";}
.icon-play-sign:before{content:"\f144";}
.icon-ticket:before{content:"\f145";}
.icon-minus-sign-alt:before{content:"\f146";}
.icon-check-minus:before{content:"\f147";}
.icon-level-up:before{content:"\f148";}
.icon-level-down:before{content:"\f149";}
.icon-check-sign:before{content:"\f14a";}
.icon-edit-sign:before{content:"\f14b";}
.icon-external-link-sign:before{content:"\f14c";}
.icon-share-sign:before{content:"\f14d";}
.icon-compass:before{content:"\f14e";}
.icon-collapse:before{content:"\f150";}
.icon-collapse-top:before{content:"\f151";}
.icon-expand:before{content:"\f152";}
.icon-euro:before,.icon-eur:before{content:"\f153";}
.icon-gbp:before{content:"\f154";}
.icon-dollar:before,.icon-usd:before{content:"\f155";}
.icon-rupee:before,.icon-inr:before{content:"\f156";}
.icon-yen:before,.icon-jpy:before{content:"\f157";}
.icon-renminbi:before,.icon-cny:before{content:"\f158";}
.icon-won:before,.icon-krw:before{content:"\f159";}
.icon-bitcoin:before,.icon-btc:before{content:"\f15a";}
.icon-file:before{content:"\f15b";}
.icon-file-text:before{content:"\f15c";}
.icon-sort-by-alphabet:before{content:"\f15d";}
.icon-sort-by-alphabet-alt:before{content:"\f15e";}
.icon-sort-by-attributes:before{content:"\f160";}
.icon-sort-by-attributes-alt:before{content:"\f161";}
.icon-sort-by-order:before{content:"\f162";}
.icon-sort-by-order-alt:before{content:"\f163";}
.icon-thumbs-up:before{content:"\f164";}
.icon-thumbs-down:before{content:"\f165";}
.icon-youtube-sign:before{content:"\f166";}
.icon-youtube:before{content:"\f167";}
.icon-xing:before{content:"\f168";}
.icon-xing-sign:before{content:"\f169";}
.icon-youtube-play:before{content:"\f16a";}
.icon-dropbox:before{content:"\f16b";}
.icon-stackexchange:before{content:"\f16c";}
.icon-instagram:before{content:"\f16d";}
.icon-flickr:before{content:"\f16e";}
.icon-adn:before{content:"\f170";}
.icon-bitbucket:before{content:"\f171";}
.icon-bitbucket-sign:before{content:"\f172";}
.icon-tumblr:before{content:"\f173";}
.icon-tumblr-sign:before{content:"\f174";}
.icon-long-arrow-down:before{content:"\f175";}
.icon-long-arrow-up:before{content:"\f176";}
.icon-long-arrow-left:before{content:"\f177";}
.icon-long-arrow-right:before{content:"\f178";}
.icon-apple:before{content:"\f179";}
.icon-windows:before{content:"\f17a";}
.icon-android:before{content:"\f17b";}
.icon-linux:before{content:"\f17c";}
.icon-dribbble:before{content:"\f17d";}
.icon-skype:before{content:"\f17e";}
.icon-foursquare:before{content:"\f180";}
.icon-trello:before{content:"\f181";}
.icon-female:before{content:"\f182";}
.icon-male:before{content:"\f183";}
.icon-gittip:before{content:"\f184";}
.icon-sun:before{content:"\f185";}
.icon-moon:before{content:"\f186";}
.icon-archive:before{content:"\f187";}
.icon-bug:before{content:"\f188";}
.icon-vk:before{content:"\f189";}
.icon-weibo:before{content:"\f18a";}
.icon-renren:before{content:"\f18b";}

</style>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
	

    <!-- <script src="assets/js/jquery.min.js"></script> -->
	


  <script>
	
	
*/(function(e,t){var n,r,i=typeof t,o=e.document,a=e.location,s=e.jQuery,u=e.$,l={},c=[],p="1.9.1",f=c.concat,d=c.push,h=c.slice,g=c.indexOf,m=l.toString,y=l.hasOwnProperty,v=p.trim,b=function(e,t){return new b.fn.init(e,t,r)},x=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,w=/\S+/g,T=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,N=/^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,C=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,k=/^[\],:{}\s]*$/,E=/(?:^|:|,)(?:\s*\[)+/g,S=/\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,A=/"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,j=/^-ms-/,D=/-([\da-z])/gi,L=function(e,t){return t.toUpperCase()},H=function(e){(o.addEventListener||"load"===e.type||"complete"===o.readyState)&&(q(),b.ready())},q=function(){o.addEventListener?(o.removeEventListener("DOMContentLoaded",H,!1),e.removeEventListener("load",H,!1)):(o.detachEvent("onreadystatechange",H),e.detachEvent("onload",H))};b.fn=b.prototype={jquery:p,constructor:b,init:function(e,n,r){var i,a;if(!e)return this;if("string"==typeof e){if(i="<"===e.charAt(0)&&">"===e.charAt(e.length-1)&&e.length>=3?[null,e,null]:N.exec(e),!i||!i[1]&&n)return!n||n.jquery?(n||r).find(e):this.constructor(n).find(e);if(i[1]){if(n=n instanceof b?n[0]:n,b.merge(this,b.parseHTML(i[1],n&&n.nodeType?n.ownerDocument||n:o,!0)),C.test(i[1])&&b.isPlainObject(n))for(i in n)b.isFunction(this[i])?this[i](n[i]):this.attr(i,n[i]);return this}if(a=o.getElementById(i[2]),a&&a.parentNode){if(a.id!==i[2])return r.find(e);this.length=1,this[0]=a}return this.context=o,this.selector=e,this}return e.nodeType?(this.context=this[0]=e,this.length=1,this):b.isFunction(e)?r.ready(e):(e.selector!==t&&(this.selector=e.selector,this.context=e.context),b.makeArray(e,this))},selector:"",length:0,size:function(){return this.length},toArray:function(){return h.call(this)},get:function(e){return null==e?this.toArray():0>e?this[this.length+e]:this[e]},pushStack:function(e){var t=b.merge(this.constructor(),e);return t.prevObject=this,t.context=this.context,t},each:function(e,t){return b.each(this,e,t)},ready:function(e){return b.ready.promise().done(e),this},slice:function(){return this.pushStack(h.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(0>e?t:0);return this.pushStack(n>=0&&t>n?[this[n]]:[])},map:function(e){return this.pushStack(b.map(this,function(t,n){return e.call(t,n,t)}))},end:function(){return this.prevObject||this.constructor(null)},push:d,sort:[].sort,splice:[].splice},b.fn.init.prototype=b.fn,b.extend=b.fn.extend=function(){var e,n,r,i,o,a,s=arguments[0]||{},u=1,l=arguments.length,c=!1;for("boolean"==typeof s&&(c=s,s=arguments[1]||{},u=2),"object"==typeof s||b.isFunction(s)||(s={}),l===u&&(s=this,--u);l>u;u++)if(null!=(o=arguments[u]))for(i in o)e=s[i],r=o[i],s!==r&&(c&&r&&(b.isPlainObject(r)||(n=b.isArray(r)))?(n?(n=!1,a=e&&b.isArray(e)?e:[]):a=e&&b.isPlainObject(e)?e:{},s[i]=b.extend(c,a,r)):r!==t&&(s[i]=r));return s},b.extend({noConflict:function(t){return e.$===b&&(e.$=u),t&&e.jQuery===b&&(e.jQuery=s),b},isReady:!1,readyWait:1,holdReady:function(e){e?b.readyWait++:b.ready(!0)},ready:function(e){if(e===!0?!--b.readyWait:!b.isReady){if(!o.body)return setTimeout(b.ready);b.isReady=!0,e!==!0&&--b.readyWait>0||(n.resolveWith(o,[b]),b.fn.trigger&&b(o).trigger("ready").off("ready"))}},isFunction:function(e){return"function"===b.type(e)},isArray:Array.isArray||function(e){return"array"===b.type(e)},isWindow:function(e){return null!=e&&e==e.window},isNumeric:function(e){return!isNaN(parseFloat(e))&&isFinite(e)},type:function(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?l[m.call(e)]||"object":typeof e},isPlainObject:function(e){if(!e||"object"!==b.type(e)||e.nodeType||b.isWindow(e))return!1;try{if(e.constructor&&!y.call(e,"constructor")&&!y.call(e.constructor.prototype,"isPrototypeOf"))return!1}catch(n){return!1}var r;for(r in e);return r===t||y.call(e,r)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},error:function(e){throw Error(e)},parseHTML:function(e,t,n){if(!e||"string"!=typeof e)return null;"boolean"==typeof t&&(n=t,t=!1),t=t||o;var r=C.exec(e),i=!n&&[];return r?[t.createElement(r[1])]:(r=b.buildFragment([e],t,i),i&&b(i).remove(),b.merge([],r.childNodes))},parseJSON:function(n){return e.JSON&&e.JSON.parse?e.JSON.parse(n):null===n?n:"string"==typeof n&&(n=b.trim(n),n&&k.test(n.replace(S,"@").replace(A,"]").replace(E,"")))?Function("return "+n)():(b.error("Invalid JSON: "+n),t)},parseXML:function(n){var r,i;if(!n||"string"!=typeof n)return null;try{e.DOMParser?(i=new DOMParser,r=i.parseFromString(n,"text/xml")):(r=new ActiveXObject("Microsoft.XMLDOM"),r.async="false",r.loadXML(n))}catch(o){r=t}return r&&r.documentElement&&!r.getElementsByTagName("parsererror").length||b.error("Invalid XML: "+n),r},noop:function(){},globalEval:function(t){t&&b.trim(t)&&(e.execScript||function(t){e.eval.call(e,t)})(t)},camelCase:function(e){return e.replace(j,"ms-").replace(D,L)},nodeName:function(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()},each:function(e,t,n){var r,i=0,o=e.length,a=M(e);if(n){if(a){for(;o>i;i++)if(r=t.apply(e[i],n),r===!1)break}else for(i in e)if(r=t.apply(e[i],n),r===!1)break}else if(a){for(;o>i;i++)if(r=t.call(e[i],i,e[i]),r===!1)break}else for(i in e)if(r=t.call(e[i],i,e[i]),r===!1)break;return e},trim:v&&!v.call("\ufeff\u00a0")?function(e){return null==e?"":v.call(e)}:function(e){return null==e?"":(e+"").replace(T,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(M(Object(e))?b.merge(n,"string"==typeof e?[e]:e):d.call(n,e)),n},inArray:function(e,t,n){var r;if(t){if(g)return g.call(t,e,n);for(r=t.length,n=n?0>n?Math.max(0,r+n):n:0;r>n;n++)if(n in t&&t[n]===e)return n}return-1},merge:function(e,n){var r=n.length,i=e.length,o=0;if("number"==typeof r)for(;r>o;o++)e[i++]=n[o];else while(n[o]!==t)e[i++]=n[o++];return e.length=i,e},grep:function(e,t,n){var r,i=[],o=0,a=e.length;for(n=!!n;a>o;o++)r=!!t(e[o],o),n!==r&&i.push(e[o]);return i},map:function(e,t,n){var r,i=0,o=e.length,a=M(e),s=[];if(a)for(;o>i;i++)r=t(e[i],i,n),null!=r&&(s[s.length]=r);else for(i in e)r=t(e[i],i,n),null!=r&&(s[s.length]=r);return f.apply([],s)},guid:1,proxy:function(e,n){var r,i,o;return"string"==typeof n&&(o=e[n],n=e,e=o),b.isFunction(e)?(r=h.call(arguments,2),i=function(){return e.apply(n||this,r.concat(h.call(arguments)))},i.guid=e.guid=e.guid||b.guid++,i):t},access:function(e,n,r,i,o,a,s){var u=0,l=e.length,c=null==r;if("object"===b.type(r)){o=!0;for(u in r)b.access(e,n,u,r[u],!0,a,s)}else if(i!==t&&(o=!0,b.isFunction(i)||(s=!0),c&&(s?(n.call(e,i),n=null):(c=n,n=function(e,t,n){return c.call(b(e),n)})),n))for(;l>u;u++)n(e[u],r,s?i:i.call(e[u],u,n(e[u],r)));return o?e:c?n.call(e):l?n(e[0],r):a},now:function(){return(new Date).getTime()}}),b.ready.promise=function(t){if(!n)if(n=b.Deferred(),"complete"===o.readyState)setTimeout(b.ready);else if(o.addEventListener)o.addEventListener("DOMContentLoaded",H,!1),e.addEventListener("load",H,!1);else{o.attachEvent("onreadystatechange",H),e.attachEvent("onload",H);var r=!1;try{r=null==e.frameElement&&o.documentElement}catch(i){}r&&r.doScroll&&function a(){if(!b.isReady){try{r.doScroll("left")}catch(e){return setTimeout(a,50)}q(),b.ready()}}()}return n.promise(t)},b.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(e,t){l["[object "+t+"]"]=t.toLowerCase()});function M(e){var t=e.length,n=b.type(e);return b.isWindow(e)?!1:1===e.nodeType&&t?!0:"array"===n||"function"!==n&&(0===t||"number"==typeof t&&t>0&&t-1 in e)}r=b(o);var _={};function F(e){var t=_[e]={};return b.each(e.match(w)||[],function(e,n){t[n]=!0}),t}b.Callbacks=function(e){e="string"==typeof e?_[e]||F(e):b.extend({},e);var n,r,i,o,a,s,u=[],l=!e.once&&[],c=function(t){for(r=e.memory&&t,i=!0,a=s||0,s=0,o=u.length,n=!0;u&&o>a;a++)if(u[a].apply(t[0],t[1])===!1&&e.stopOnFalse){r=!1;break}n=!1,u&&(l?l.length&&c(l.shift()):r?u=[]:p.disable())},p={add:function(){if(u){var t=u.length;(function i(t){b.each(t,function(t,n){var r=b.type(n);"function"===r?e.unique&&p.has(n)||u.push(n):n&&n.length&&"string"!==r&&i(n)})})(arguments),n?o=u.length:r&&(s=t,c(r))}return this},remove:function(){return u&&b.each(arguments,function(e,t){var r;while((r=b.inArray(t,u,r))>-1)u.splice(r,1),n&&(o>=r&&o--,a>=r&&a--)}),this},has:function(e){return e?b.inArray(e,u)>-1:!(!u||!u.length)},empty:function(){return u=[],this},disable:function(){return u=l=r=t,this},disabled:function(){return!u},lock:function(){return l=t,r||p.disable(),this},locked:function(){return!l},fireWith:function(e,t){return t=t||[],t=[e,t.slice?t.slice():t],!u||i&&!l||(n?l.push(t):c(t)),this},fire:function(){return p.fireWith(this,arguments),this},fired:function(){return!!i}};return p},b.extend({Deferred:function(e){var t=[["resolve","done",b.Callbacks("once memory"),"resolved"],["reject","fail",b.Callbacks("once memory"),"rejected"],["notify","progress",b.Callbacks("memory")]],n="pending",r={state:function(){return n},always:function(){return i.done(arguments).fail(arguments),this},then:function(){var e=arguments;return b.Deferred(function(n){b.each(t,function(t,o){var a=o[0],s=b.isFunction(e[t])&&e[t];i[o[1]](function(){var e=s&&s.apply(this,arguments);e&&b.isFunction(e.promise)?e.promise().done(n.resolve).fail(n.reject).progress(n.notify):n[a+"With"](this===r?n.promise():this,s?[e]:arguments)})}),e=null}).promise()},promise:function(e){return null!=e?b.extend(e,r):r}},i={};return r.pipe=r.then,b.each(t,function(e,o){var a=o[2],s=o[3];r[o[1]]=a.add,s&&a.add(function(){n=s},t[1^e][2].disable,t[2][2].lock),i[o[0]]=function(){return i[o[0]+"With"](this===i?r:this,arguments),this},i[o[0]+"With"]=a.fireWith}),r.promise(i),e&&e.call(i,i),i},when:function(e){var t=0,n=h.call(arguments),r=n.length,i=1!==r||e&&b.isFunction(e.promise)?r:0,o=1===i?e:b.Deferred(),a=function(e,t,n){return function(r){t[e]=this,n[e]=arguments.length>1?h.call(arguments):r,n===s?o.notifyWith(t,n):--i||o.resolveWith(t,n)}},s,u,l;if(r>1)for(s=Array(r),u=Array(r),l=Array(r);r>t;t++)n[t]&&b.isFunction(n[t].promise)?n[t].promise().done(a(t,l,n)).fail(o.reject).progress(a(t,u,s)):--i;return i||o.resolveWith(l,n),o.promise()}}),b.support=function(){var t,n,r,a,s,u,l,c,p,f,d=o.createElement("div");if(d.setAttribute("className","t"),d.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",n=d.getElementsByTagName("*"),r=d.getElementsByTagName("a")[0],!n||!r||!n.length)return{};s=o.createElement("select"),l=s.appendChild(o.createElement("option")),a=d.getElementsByTagName("input")[0],r.style.cssText="top:1px;float:left;opacity:.5",t={getSetAttribute:"t"!==d.className,leadingWhitespace:3===d.firstChild.nodeType,tbody:!d.getElementsByTagName("tbody").length,htmlSerialize:!!d.getElementsByTagName("link").length,style:/top/.test(r.getAttribute("style")),hrefNormalized:"/a"===r.getAttribute("href"),opacity:/^0.5/.test(r.style.opacity),cssFloat:!!r.style.cssFloat,checkOn:!!a.value,optSelected:l.selected,enctype:!!o.createElement("form").enctype,html5Clone:"<:nav></:nav>"!==o.createElement("nav").cloneNode(!0).outerHTML,boxModel:"CSS1Compat"===o.compatMode,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0,boxSizingReliable:!0,pixelPosition:!1},a.checked=!0,t.noCloneChecked=a.cloneNode(!0).checked,s.disabled=!0,t.optDisabled=!l.disabled;try{delete d.test}catch(h){t.deleteExpando=!1}a=o.createElement("input"),a.setAttribute("value",""),t.input=""===a.getAttribute("value"),a.value="t",a.setAttribute("type","radio"),t.radioValue="t"===a.value,a.setAttribute("checked","t"),a.setAttribute("name","t"),u=o.createDocumentFragment(),u.appendChild(a),t.appendChecked=a.checked,t.checkClone=u.cloneNode(!0).cloneNode(!0).lastChild.checked,d.attachEvent&&(d.attachEvent("onclick",function(){t.noCloneEvent=!1}),d.cloneNode(!0).click());for(f in{submit:!0,change:!0,focusin:!0})d.setAttribute(c="on"+f,"t"),t[f+"Bubbles"]=c in e||d.attributes[c].expando===!1;return d.style.backgroundClip="content-box",d.cloneNode(!0).style.backgroundClip="",t.clearCloneStyle="content-box"===d.style.backgroundClip,b(function(){var n,r,a,s="padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",u=o.getElementsByTagName("body")[0];u&&(n=o.createElement("div"),n.style.cssText="border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px",u.appendChild(n).appendChild(d),d.innerHTML="<table><tr><td></td><td>t</td></tr></table>",a=d.getElementsByTagName("td"),a[0].style.cssText="padding:0;margin:0;border:0;display:none",p=0===a[0].offsetHeight,a[0].style.display="",a[1].style.display="none",t.reliableHiddenOffsets=p&&0===a[0].offsetHeight,d.innerHTML="",d.style.cssText="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;",t.boxSizing=4===d.offsetWidth,t.doesNotIncludeMarginInBodyOffset=1!==u.offsetTop,e.getComputedStyle&&(t.pixelPosition="1%"!==(e.getComputedStyle(d,null)||{}).top,t.boxSizingReliable="4px"===(e.getComputedStyle(d,null)||{width:"4px"}).width,r=d.appendChild(o.createElement("div")),r.style.cssText=d.style.cssText=s,r.style.marginRight=r.style.width="0",d.style.width="1px",t.reliableMarginRight=!parseFloat((e.getComputedStyle(r,null)||{}).marginRight)),typeof d.style.zoom!==i&&(d.innerHTML="",d.style.cssText=s+"width:1px;padding:1px;display:inline;zoom:1",t.inlineBlockNeedsLayout=3===d.offsetWidth,d.style.display="block",d.innerHTML="<div></div>",d.firstChild.style.width="5px",t.shrinkWrapBlocks=3!==d.offsetWidth,t.inlineBlockNeedsLayout&&(u.style.zoom=1)),u.removeChild(n),n=d=a=r=null)}),n=s=u=l=r=a=null,t}();var O=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,B=/([A-Z])/g;function P(e,n,r,i){if(b.acceptData(e)){var o,a,s=b.expando,u="string"==typeof n,l=e.nodeType,p=l?b.cache:e,f=l?e[s]:e[s]&&s;if(f&&p[f]&&(i||p[f].data)||!u||r!==t)return f||(l?e[s]=f=c.pop()||b.guid++:f=s),p[f]||(p[f]={},l||(p[f].toJSON=b.noop)),("object"==typeof n||"function"==typeof n)&&(i?p[f]=b.extend(p[f],n):p[f].data=b.extend(p[f].data,n)),o=p[f],i||(o.data||(o.data={}),o=o.data),r!==t&&(o[b.camelCase(n)]=r),u?(a=o[n],null==a&&(a=o[b.camelCase(n)])):a=o,a}}function R(e,t,n){if(b.acceptData(e)){var r,i,o,a=e.nodeType,s=a?b.cache:e,u=a?e[b.expando]:b.expando;if(s[u]){if(t&&(o=n?s[u]:s[u].data)){b.isArray(t)?t=t.concat(b.map(t,b.camelCase)):t in o?t=[t]:(t=b.camelCase(t),t=t in o?[t]:t.split(" "));for(r=0,i=t.length;i>r;r++)delete o[t[r]];if(!(n?$:b.isEmptyObject)(o))return}(n||(delete s[u].data,$(s[u])))&&(a?b.cleanData([e],!0):b.support.deleteExpando||s!=s.window?delete s[u]:s[u]=null)}}}b.extend({cache:{},expando:"jQuery"+(p+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(e){return e=e.nodeType?b.cache[e[b.expando]]:e[b.expando],!!e&&!$(e)},data:function(e,t,n){return P(e,t,n)},removeData:function(e,t){return R(e,t)},_data:function(e,t,n){return P(e,t,n,!0)},_removeData:function(e,t){return R(e,t,!0)},acceptData:function(e){if(e.nodeType&&1!==e.nodeType&&9!==e.nodeType)return!1;var t=e.nodeName&&b.noData[e.nodeName.toLowerCase()];return!t||t!==!0&&e.getAttribute("classid")===t}}),b.fn.extend({data:function(e,n){var r,i,o=this[0],a=0,s=null;if(e===t){if(this.length&&(s=b.data(o),1===o.nodeType&&!b._data(o,"parsedAttrs"))){for(r=o.attributes;r.length>a;a++)i=r[a].name,i.indexOf("data-")||(i=b.camelCase(i.slice(5)),W(o,i,s[i]));b._data(o,"parsedAttrs",!0)}return s}return"object"==typeof e?this.each(function(){b.data(this,e)}):b.access(this,function(n){return n===t?o?W(o,e,b.data(o,e)):null:(this.each(function(){b.data(this,e,n)}),t)},null,n,arguments.length>1,null,!0)},removeData:function(e){return this.each(function(){b.removeData(this,e)})}});function W(e,n,r){if(r===t&&1===e.nodeType){var i="data-"+n.replace(B,"-$1").toLowerCase();if(r=e.getAttribute(i),"string"==typeof r){try{r="true"===r?!0:"false"===r?!1:"null"===r?null:+r+""===r?+r:O.test(r)?b.parseJSON(r):r}catch(o){}b.data(e,n,r)}else r=t}return r}function $(e){var t;for(t in e)if(("data"!==t||!b.isEmptyObject(e[t]))&&"toJSON"!==t)return!1;return!0}b.extend({queue:function(e,n,r){var i;return e?(n=(n||"fx")+"queue",i=b._data(e,n),r&&(!i||b.isArray(r)?i=b._data(e,n,b.makeArray(r)):i.push(r)),i||[]):t},dequeue:function(e,t){t=t||"fx";var n=b.queue(e,t),r=n.length,i=n.shift(),o=b._queueHooks(e,t),a=function(){b.dequeue(e,t)};"inprogress"===i&&(i=n.shift(),r--),o.cur=i,i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,a,o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return b._data(e,n)||b._data(e,n,{empty:b.Callbacks("once memory").add(function(){b._removeData(e,t+"queue"),b._removeData(e,n)})})}}),b.fn.extend({queue:function(e,n){var r=2;return"string"!=typeof e&&(n=e,e="fx",r--),r>arguments.length?b.queue(this[0],e):n===t?this:this.each(function(){var t=b.queue(this,e,n);b._queueHooks(this,e),"fx"===e&&"inprogress"!==t[0]&&b.dequeue(this,e)})},dequeue:function(e){return this.each(function(){b.dequeue(this,e)})},delay:function(e,t){return e=b.fx?b.fx.speeds[e]||e:e,t=t||"fx",this.queue(t,function(t,n){var r=setTimeout(t,e);n.stop=function(){clearTimeout(r)}})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,n){var r,i=1,o=b.Deferred(),a=this,s=this.length,u=function(){--i||o.resolveWith(a,[a])};"string"!=typeof e&&(n=e,e=t),e=e||"fx";while(s--)r=b._data(a[s],e+"queueHooks"),r&&r.empty&&(i++,r.empty.add(u));return u(),o.promise(n)}});var I,z,X=/[\t\r\n]/g,U=/\r/g,V=/^(?:input|select|textarea|button|object)$/i,Y=/^(?:a|area)$/i,J=/^(?:checked|selected|autofocus|autoplay|async|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped)$/i,G=/^(?:checked|selected)$/i,Q=b.support.getSetAttribute,K=b.support.input;b.fn.extend({attr:function(e,t){return b.access(this,b.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){b.removeAttr(this,e)})},prop:function(e,t){return b.access(this,b.prop,e,t,arguments.length>1)},removeProp:function(e){return e=b.propFix[e]||e,this.each(function(){try{this[e]=t,delete this[e]}catch(n){}})},addClass:function(e){var t,n,r,i,o,a=0,s=this.length,u="string"==typeof e&&e;if(b.isFunction(e))return this.each(function(t){b(this).addClass(e.call(this,t,this.className))});if(u)for(t=(e||"").match(w)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(X," "):" ")){o=0;while(i=t[o++])0>r.indexOf(" "+i+" ")&&(r+=i+" ");n.className=b.trim(r)}return this},removeClass:function(e){var t,n,r,i,o,a=0,s=this.length,u=0===arguments.length||"string"==typeof e&&e;if(b.isFunction(e))return this.each(function(t){b(this).removeClass(e.call(this,t,this.className))});if(u)for(t=(e||"").match(w)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(X," "):"")){o=0;while(i=t[o++])while(r.indexOf(" "+i+" ")>=0)r=r.replace(" "+i+" "," ");n.className=e?b.trim(r):""}return this},toggleClass:function(e,t){var n=typeof e,r="boolean"==typeof t;return b.isFunction(e)?this.each(function(n){b(this).toggleClass(e.call(this,n,this.className,t),t)}):this.each(function(){if("string"===n){var o,a=0,s=b(this),u=t,l=e.match(w)||[];while(o=l[a++])u=r?u:!s.hasClass(o),s[u?"addClass":"removeClass"](o)}else(n===i||"boolean"===n)&&(this.className&&b._data(this,"__className__",this.className),this.className=this.className||e===!1?"":b._data(this,"__className__")||"")})},hasClass:function(e){var t=" "+e+" ",n=0,r=this.length;for(;r>n;n++)if(1===this[n].nodeType&&(" "+this[n].className+" ").replace(X," ").indexOf(t)>=0)return!0;return!1},val:function(e){var n,r,i,o=this[0];{if(arguments.length)return i=b.isFunction(e),this.each(function(n){var o,a=b(this);1===this.nodeType&&(o=i?e.call(this,n,a.val()):e,null==o?o="":"number"==typeof o?o+="":b.isArray(o)&&(o=b.map(o,function(e){return null==e?"":e+""})),r=b.valHooks[this.type]||b.valHooks[this.nodeName.toLowerCase()],r&&"set"in r&&r.set(this,o,"value")!==t||(this.value=o))});if(o)return r=b.valHooks[o.type]||b.valHooks[o.nodeName.toLowerCase()],r&&"get"in r&&(n=r.get(o,"value"))!==t?n:(n=o.value,"string"==typeof n?n.replace(U,""):null==n?"":n)}}}),b.extend({valHooks:{option:{get:function(e){var t=e.attributes.value;return!t||t.specified?e.value:e.text}},select:{get:function(e){var t,n,r=e.options,i=e.selectedIndex,o="select-one"===e.type||0>i,a=o?null:[],s=o?i+1:r.length,u=0>i?s:o?i:0;for(;s>u;u++)if(n=r[u],!(!n.selected&&u!==i||(b.support.optDisabled?n.disabled:null!==n.getAttribute("disabled"))||n.parentNode.disabled&&b.nodeName(n.parentNode,"optgroup"))){if(t=b(n).val(),o)return t;a.push(t)}return a},set:function(e,t){var n=b.makeArray(t);return b(e).find("option").each(function(){this.selected=b.inArray(b(this).val(),n)>=0}),n.length||(e.selectedIndex=-1),n}}},attr:function(e,n,r){var o,a,s,u=e.nodeType;if(e&&3!==u&&8!==u&&2!==u)return typeof e.getAttribute===i?b.prop(e,n,r):(a=1!==u||!b.isXMLDoc(e),a&&(n=n.toLowerCase(),o=b.attrHooks[n]||(J.test(n)?z:I)),r===t?o&&a&&"get"in o&&null!==(s=o.get(e,n))?s:(typeof e.getAttribute!==i&&(s=e.getAttribute(n)),null==s?t:s):null!==r?o&&a&&"set"in o&&(s=o.set(e,r,n))!==t?s:(e.setAttribute(n,r+""),r):(b.removeAttr(e,n),t))},removeAttr:function(e,t){var n,r,i=0,o=t&&t.match(w);if(o&&1===e.nodeType)while(n=o[i++])r=b.propFix[n]||n,J.test(n)?!Q&&G.test(n)?e[b.camelCase("default-"+n)]=e[r]=!1:e[r]=!1:b.attr(e,n,""),e.removeAttribute(Q?n:r)},attrHooks:{type:{set:function(e,t){if(!b.support.radioValue&&"radio"===t&&b.nodeName(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(e,n,r){var i,o,a,s=e.nodeType;if(e&&3!==s&&8!==s&&2!==s)return a=1!==s||!b.isXMLDoc(e),a&&(n=b.propFix[n]||n,o=b.propHooks[n]),r!==t?o&&"set"in o&&(i=o.set(e,r,n))!==t?i:e[n]=r:o&&"get"in o&&null!==(i=o.get(e,n))?i:e[n]},propHooks:{tabIndex:{get:function(e){var n=e.getAttributeNode("tabindex");return n&&n.specified?parseInt(n.value,10):V.test(e.nodeName)||Y.test(e.nodeName)&&e.href?0:t}}}}),z={get:function(e,n){var r=b.prop(e,n),i="boolean"==typeof r&&e.getAttribute(n),o="boolean"==typeof r?K&&Q?null!=i:G.test(n)?e[b.camelCase("default-"+n)]:!!i:e.getAttributeNode(n);return o&&o.value!==!1?n.toLowerCase():t},set:function(e,t,n){return t===!1?b.removeAttr(e,n):K&&Q||!G.test(n)?e.setAttribute(!Q&&b.propFix[n]||n,n):e[b.camelCase("default-"+n)]=e[n]=!0,n}},K&&Q||(b.attrHooks.value={get:function(e,n){var r=e.getAttributeNode(n);return b.nodeName(e,"input")?e.defaultValue:r&&r.specified?r.value:t},set:function(e,n,r){return b.nodeName(e,"input")?(e.defaultValue=n,t):I&&I.set(e,n,r)}}),Q||(I=b.valHooks.button={get:function(e,n){var r=e.getAttributeNode(n);return r&&("id"===n||"name"===n||"coords"===n?""!==r.value:r.specified)?r.value:t},set:function(e,n,r){var i=e.getAttributeNode(r);return i||e.setAttributeNode(i=e.ownerDocument.createAttribute(r)),i.value=n+="","value"===r||n===e.getAttribute(r)?n:t}},b.attrHooks.contenteditable={get:I.get,set:function(e,t,n){I.set(e,""===t?!1:t,n)}},b.each(["width","height"],function(e,n){b.attrHooks[n]=b.extend(b.attrHooks[n],{set:function(e,r){return""===r?(e.setAttribute(n,"auto"),r):t}})})),b.support.hrefNormalized||(b.each(["href","src","width","height"],function(e,n){b.attrHooks[n]=b.extend(b.attrHooks[n],{get:function(e){var r=e.getAttribute(n,2);return null==r?t:r}})}),b.each(["href","src"],function(e,t){b.propHooks[t]={get:function(e){return e.getAttribute(t,4)}}})),b.support.style||(b.attrHooks.style={get:function(e){return e.style.cssText||t},set:function(e,t){return e.style.cssText=t+""}}),b.support.optSelected||(b.propHooks.selected=b.extend(b.propHooks.selected,{get:function(e){var t=e.parentNode;return t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex),null}})),b.support.enctype||(b.propFix.enctype="encoding"),b.support.checkOn||b.each(["radio","checkbox"],function(){b.valHooks[this]={get:function(e){return null===e.getAttribute("value")?"on":e.value}}}),b.each(["radio","checkbox"],function(){b.valHooks[this]=b.extend(b.valHooks[this],{set:function(e,n){return b.isArray(n)?e.checked=b.inArray(b(e).val(),n)>=0:t}})});var Z=/^(?:input|select|textarea)$/i,et=/^key/,tt=/^(?:mouse|contextmenu)|click/,nt=/^(?:focusinfocus|focusoutblur)$/,rt=/^([^.]*)(?:\.(.+)|)$/;function it(){return!0}function ot(){return!1}b.event={global:{},add:function(e,n,r,o,a){var s,u,l,c,p,f,d,h,g,m,y,v=b._data(e);if(v){r.handler&&(c=r,r=c.handler,a=c.selector),r.guid||(r.guid=b.guid++),(u=v.events)||(u=v.events={}),(f=v.handle)||(f=v.handle=function(e){return typeof b===i||e&&b.event.triggered===e.type?t:b.event.dispatch.apply(f.elem,arguments)},f.elem=e),n=(n||"").match(w)||[""],l=n.length;while(l--)s=rt.exec(n[l])||[],g=y=s[1],m=(s[2]||"").split(".").sort(),p=b.event.special[g]||{},g=(a?p.delegateType:p.bindType)||g,p=b.event.special[g]||{},d=b.extend({type:g,origType:y,data:o,handler:r,guid:r.guid,selector:a,needsContext:a&&b.expr.match.needsContext.test(a),namespace:m.join(".")},c),(h=u[g])||(h=u[g]=[],h.delegateCount=0,p.setup&&p.setup.call(e,o,m,f)!==!1||(e.addEventListener?e.addEventListener(g,f,!1):e.attachEvent&&e.attachEvent("on"+g,f))),p.add&&(p.add.call(e,d),d.handler.guid||(d.handler.guid=r.guid)),a?h.splice(h.delegateCount++,0,d):h.push(d),b.event.global[g]=!0;e=null}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,p,f,d,h,g,m=b.hasData(e)&&b._data(e);if(m&&(c=m.events)){t=(t||"").match(w)||[""],l=t.length;while(l--)if(s=rt.exec(t[l])||[],d=g=s[1],h=(s[2]||"").split(".").sort(),d){p=b.event.special[d]||{},d=(r?p.delegateType:p.bindType)||d,f=c[d]||[],s=s[2]&&RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),u=o=f.length;while(o--)a=f[o],!i&&g!==a.origType||n&&n.guid!==a.guid||s&&!s.test(a.namespace)||r&&r!==a.selector&&("**"!==r||!a.selector)||(f.splice(o,1),a.selector&&f.delegateCount--,p.remove&&p.remove.call(e,a));u&&!f.length&&(p.teardown&&p.teardown.call(e,h,m.handle)!==!1||b.removeEvent(e,d,m.handle),delete c[d])}else for(d in c)b.event.remove(e,d+t[l],n,r,!0);b.isEmptyObject(c)&&(delete m.handle,b._removeData(e,"events"))}},trigger:function(n,r,i,a){var s,u,l,c,p,f,d,h=[i||o],g=y.call(n,"type")?n.type:n,m=y.call(n,"namespace")?n.namespace.split("."):[];if(l=f=i=i||o,3!==i.nodeType&&8!==i.nodeType&&!nt.test(g+b.event.triggered)&&(g.indexOf(".")>=0&&(m=g.split("."),g=m.shift(),m.sort()),u=0>g.indexOf(":")&&"on"+g,n=n[b.expando]?n:new b.Event(g,"object"==typeof n&&n),n.isTrigger=!0,n.namespace=m.join("."),n.namespace_re=n.namespace?RegExp("(^|\\.)"+m.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,n.result=t,n.target||(n.target=i),r=null==r?[n]:b.makeArray(r,[n]),p=b.event.special[g]||{},a||!p.trigger||p.trigger.apply(i,r)!==!1)){if(!a&&!p.noBubble&&!b.isWindow(i)){for(c=p.delegateType||g,nt.test(c+g)||(l=l.parentNode);l;l=l.parentNode)h.push(l),f=l;f===(i.ownerDocument||o)&&h.push(f.defaultView||f.parentWindow||e)}d=0;while((l=h[d++])&&!n.isPropagationStopped())n.type=d>1?c:p.bindType||g,s=(b._data(l,"events")||{})[n.type]&&b._data(l,"handle"),s&&s.apply(l,r),s=u&&l[u],s&&b.acceptData(l)&&s.apply&&s.apply(l,r)===!1&&n.preventDefault();if(n.type=g,!(a||n.isDefaultPrevented()||p._default&&p._default.apply(i.ownerDocument,r)!==!1||"click"===g&&b.nodeName(i,"a")||!b.acceptData(i)||!u||!i[g]||b.isWindow(i))){f=i[u],f&&(i[u]=null),b.event.triggered=g;try{i[g]()}catch(v){}b.event.triggered=t,f&&(i[u]=f)}return n.result}},dispatch:function(e){e=b.event.fix(e);var n,r,i,o,a,s=[],u=h.call(arguments),l=(b._data(this,"events")||{})[e.type]||[],c=b.event.special[e.type]||{};if(u[0]=e,e.delegateTarget=this,!c.preDispatch||c.preDispatch.call(this,e)!==!1){s=b.event.handlers.call(this,e,l),n=0;while((o=s[n++])&&!e.isPropagationStopped()){e.currentTarget=o.elem,a=0;while((i=o.handlers[a++])&&!e.isImmediatePropagationStopped())(!e.namespace_re||e.namespace_re.test(i.namespace))&&(e.handleObj=i,e.data=i.data,r=((b.event.special[i.origType]||{}).handle||i.handler).apply(o.elem,u),r!==t&&(e.result=r)===!1&&(e.preventDefault(),e.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,e),e.result}},handlers:function(e,n){var r,i,o,a,s=[],u=n.delegateCount,l=e.target;if(u&&l.nodeType&&(!e.button||"click"!==e.type))for(;l!=this;l=l.parentNode||this)if(1===l.nodeType&&(l.disabled!==!0||"click"!==e.type)){for(o=[],a=0;u>a;a++)i=n[a],r=i.selector+" ",o[r]===t&&(o[r]=i.needsContext?b(r,this).index(l)>=0:b.find(r,this,null,[l]).length),o[r]&&o.push(i);o.length&&s.push({elem:l,handlers:o})}return n.length>u&&s.push({elem:this,handlers:n.slice(u)}),s},fix:function(e){if(e[b.expando])return e;var t,n,r,i=e.type,a=e,s=this.fixHooks[i];s||(this.fixHooks[i]=s=tt.test(i)?this.mouseHooks:et.test(i)?this.keyHooks:{}),r=s.props?this.props.concat(s.props):this.props,e=new b.Event(a),t=r.length;while(t--)n=r[t],e[n]=a[n];return e.target||(e.target=a.srcElement||o),3===e.target.nodeType&&(e.target=e.target.parentNode),e.metaKey=!!e.metaKey,s.filter?s.filter(e,a):e},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(e,t){return null==e.which&&(e.which=null!=t.charCode?t.charCode:t.keyCode),e}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(e,n){var r,i,a,s=n.button,u=n.fromElement;return null==e.pageX&&null!=n.clientX&&(i=e.target.ownerDocument||o,a=i.documentElement,r=i.body,e.pageX=n.clientX+(a&&a.scrollLeft||r&&r.scrollLeft||0)-(a&&a.clientLeft||r&&r.clientLeft||0),e.pageY=n.clientY+(a&&a.scrollTop||r&&r.scrollTop||0)-(a&&a.clientTop||r&&r.clientTop||0)),!e.relatedTarget&&u&&(e.relatedTarget=u===e.target?n.toElement:u),e.which||s===t||(e.which=1&s?1:2&s?3:4&s?2:0),e}},special:{load:{noBubble:!0},click:{trigger:function(){return b.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):t}},focus:{trigger:function(){if(this!==o.activeElement&&this.focus)try{return this.focus(),!1}catch(e){}},delegateType:"focusin"},blur:{trigger:function(){return this===o.activeElement&&this.blur?(this.blur(),!1):t},delegateType:"focusout"},beforeunload:{postDispatch:function(e){e.result!==t&&(e.originalEvent.returnValue=e.result)}}},simulate:function(e,t,n,r){var i=b.extend(new b.Event,n,{type:e,isSimulated:!0,originalEvent:{}});r?b.event.trigger(i,null,t):b.event.dispatch.call(t,i),i.isDefaultPrevented()&&n.preventDefault()}},b.removeEvent=o.removeEventListener?function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n,!1)}:function(e,t,n){var r="on"+t;e.detachEvent&&(typeof e[r]===i&&(e[r]=null),e.detachEvent(r,n))},b.Event=function(e,n){return this instanceof b.Event?(e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||e.returnValue===!1||e.getPreventDefault&&e.getPreventDefault()?it:ot):this.type=e,n&&b.extend(this,n),this.timeStamp=e&&e.timeStamp||b.now(),this[b.expando]=!0,t):new b.Event(e,n)},b.Event.prototype={isDefaultPrevented:ot,isPropagationStopped:ot,isImmediatePropagationStopped:ot,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=it,e&&(e.preventDefault?e.preventDefault():e.returnValue=!1)},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=it,e&&(e.stopPropagation&&e.stopPropagation(),e.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=it,this.stopPropagation()}},b.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(e,t){b.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;
	return(!i||i!==r&&!b.contains(r,i))&&(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),b.support.submitBubbles||(b.event.special.submit={setup:function(){return b.nodeName(this,"form")?!1:(b.event.add(this,"click._submit keypress._submit",function(e){var n=e.target,r=b.nodeName(n,"input")||b.nodeName(n,"button")?n.form:t;r&&!b._data(r,"submitBubbles")&&(b.event.add(r,"submit._submit",function(e){e._submit_bubble=!0}),b._data(r,"submitBubbles",!0))}),t)},postDispatch:function(e){e._submit_bubble&&(delete e._submit_bubble,this.parentNode&&!e.isTrigger&&b.event.simulate("submit",this.parentNode,e,!0))},teardown:function(){return b.nodeName(this,"form")?!1:(b.event.remove(this,"._submit"),t)}}),b.support.changeBubbles||(b.event.special.change={setup:function(){return Z.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(b.event.add(this,"propertychange._change",function(e){"checked"===e.originalEvent.propertyName&&(this._just_changed=!0)}),b.event.add(this,"click._change",function(e){this._just_changed&&!e.isTrigger&&(this._just_changed=!1),b.event.simulate("change",this,e,!0)})),!1):(b.event.add(this,"beforeactivate._change",function(e){var t=e.target;Z.test(t.nodeName)&&!b._data(t,"changeBubbles")&&(b.event.add(t,"change._change",function(e){!this.parentNode||e.isSimulated||e.isTrigger||b.event.simulate("change",this.parentNode,e,!0)}),b._data(t,"changeBubbles",!0))}),t)},handle:function(e){var n=e.target;return this!==n||e.isSimulated||e.isTrigger||"radio"!==n.type&&"checkbox"!==n.type?e.handleObj.handler.apply(this,arguments):t},teardown:function(){return b.event.remove(this,"._change"),!Z.test(this.nodeName)}}),b.support.focusinBubbles||b.each({focus:"focusin",blur:"focusout"},function(e,t){var n=0,r=function(e){b.event.simulate(t,e.target,b.event.fix(e),!0)};b.event.special[t]={setup:function(){0===n++&&o.addEventListener(e,r,!0)},teardown:function(){0===--n&&o.removeEventListener(e,r,!0)}}}),b.fn.extend({on:function(e,n,r,i,o){var a,s;if("object"==typeof e){"string"!=typeof n&&(r=r||n,n=t);for(a in e)this.on(a,n,r,e[a],o);return this}if(null==r&&null==i?(i=n,r=n=t):null==i&&("string"==typeof n?(i=r,r=t):(i=r,r=n,n=t)),i===!1)i=ot;else if(!i)return this;return 1===o&&(s=i,i=function(e){return b().off(e),s.apply(this,arguments)},i.guid=s.guid||(s.guid=b.guid++)),this.each(function(){b.event.add(this,e,i,r,n)})},one:function(e,t,n,r){return this.on(e,t,n,r,1)},off:function(e,n,r){var i,o;if(e&&e.preventDefault&&e.handleObj)return i=e.handleObj,b(e.delegateTarget).off(i.namespace?i.origType+"."+i.namespace:i.origType,i.selector,i.handler),this;if("object"==typeof e){for(o in e)this.off(o,n,e[o]);return this}return(n===!1||"function"==typeof n)&&(r=n,n=t),r===!1&&(r=ot),this.each(function(){b.event.remove(this,e,r,n)})},bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)},trigger:function(e,t){return this.each(function(){b.event.trigger(e,t,this)})},triggerHandler:function(e,n){var r=this[0];return r?b.event.trigger(e,n,r,!0):t}}),function(e,t){var n,r,i,o,a,s,u,l,c,p,f,d,h,g,m,y,v,x="sizzle"+-new Date,w=e.document,T={},N=0,C=0,k=it(),E=it(),S=it(),A=typeof t,j=1<<31,D=[],L=D.pop,H=D.push,q=D.slice,M=D.indexOf||function(e){var t=0,n=this.length;for(;n>t;t++)if(this[t]===e)return t;return-1},_="[\\x20\\t\\r\\n\\f]",F="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",O=F.replace("w","w#"),B="([*^$|!~]?=)",P="\\["+_+"*("+F+")"+_+"*(?:"+B+_+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+O+")|)|)"+_+"*\\]",R=":("+F+")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|"+P.replace(3,8)+")*)|.*)\\)|)",W=RegExp("^"+_+"+|((?:^|[^\\\\])(?:\\\\.)*)"+_+"+$","g"),$=RegExp("^"+_+"*,"+_+"*"),I=RegExp("^"+_+"*([\\x20\\t\\r\\n\\f>+~])"+_+"*"),z=RegExp(R),X=RegExp("^"+O+"$"),U={ID:RegExp("^#("+F+")"),CLASS:RegExp("^\\.("+F+")"),NAME:RegExp("^\\[name=['\"]?("+F+")['\"]?\\]"),TAG:RegExp("^("+F.replace("w","w*")+")"),ATTR:RegExp("^"+P),PSEUDO:RegExp("^"+R),CHILD:RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+_+"*(even|odd|(([+-]|)(\\d*)n|)"+_+"*(?:([+-]|)"+_+"*(\\d+)|))"+_+"*\\)|)","i"),needsContext:RegExp("^"+_+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+_+"*((?:-\\d)?\\d*)"+_+"*\\)|)(?=[^-]|$)","i")},V=/[\x20\t\r\n\f]*[+~]/,Y=/^[^{]+\{\s*\[native code/,J=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,G=/^(?:input|select|textarea|button)$/i,Q=/^h\d$/i,K=/'|\\/g,Z=/\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,et=/\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,tt=function(e,t){var n="0x"+t-65536;return n!==n?t:0>n?String.fromCharCode(n+65536):String.fromCharCode(55296|n>>10,56320|1023&n)};try{q.call(w.documentElement.childNodes,0)[0].nodeType}catch(nt){q=function(e){var t,n=[];while(t=this[e++])n.push(t);return n}}function rt(e){return Y.test(e+"")}function it(){var e,t=[];return e=function(n,r){return t.push(n+=" ")>i.cacheLength&&delete e[t.shift()],e[n]=r}}function ot(e){return e[x]=!0,e}function at(e){var t=p.createElement("div");try{return e(t)}catch(n){return!1}finally{t=null}}function st(e,t,n,r){var i,o,a,s,u,l,f,g,m,v;if((t?t.ownerDocument||t:w)!==p&&c(t),t=t||p,n=n||[],!e||"string"!=typeof e)return n;if(1!==(s=t.nodeType)&&9!==s)return[];if(!d&&!r){if(i=J.exec(e))if(a=i[1]){if(9===s){if(o=t.getElementById(a),!o||!o.parentNode)return n;if(o.id===a)return n.push(o),n}else if(t.ownerDocument&&(o=t.ownerDocument.getElementById(a))&&y(t,o)&&o.id===a)return n.push(o),n}else{if(i[2])return H.apply(n,q.call(t.getElementsByTagName(e),0)),n;if((a=i[3])&&T.getByClassName&&t.getElementsByClassName)return H.apply(n,q.call(t.getElementsByClassName(a),0)),n}if(T.qsa&&!h.test(e)){if(f=!0,g=x,m=t,v=9===s&&e,1===s&&"object"!==t.nodeName.toLowerCase()){l=ft(e),(f=t.getAttribute("id"))?g=f.replace(K,"\\$&"):t.setAttribute("id",g),g="[id='"+g+"'] ",u=l.length;while(u--)l[u]=g+dt(l[u]);m=V.test(e)&&t.parentNode||t,v=l.join(",")}if(v)try{return H.apply(n,q.call(m.querySelectorAll(v),0)),n}catch(b){}finally{f||t.removeAttribute("id")}}}return wt(e.replace(W,"$1"),t,n,r)}a=st.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return t?"HTML"!==t.nodeName:!1},c=st.setDocument=function(e){var n=e?e.ownerDocument||e:w;return n!==p&&9===n.nodeType&&n.documentElement?(p=n,f=n.documentElement,d=a(n),T.tagNameNoComments=at(function(e){return e.appendChild(n.createComment("")),!e.getElementsByTagName("*").length}),T.attributes=at(function(e){e.innerHTML="<select></select>";var t=typeof e.lastChild.getAttribute("multiple");return"boolean"!==t&&"string"!==t}),T.getByClassName=at(function(e){return e.innerHTML="<div class='hidden e'></div><div class='hidden'></div>",e.getElementsByClassName&&e.getElementsByClassName("e").length?(e.lastChild.className="e",2===e.getElementsByClassName("e").length):!1}),T.getByName=at(function(e){e.id=x+0,e.innerHTML="<a name='"+x+"'></a><div name='"+x+"'></div>",f.insertBefore(e,f.firstChild);var t=n.getElementsByName&&n.getElementsByName(x).length===2+n.getElementsByName(x+0).length;return T.getIdNotName=!n.getElementById(x),f.removeChild(e),t}),i.attrHandle=at(function(e){return e.innerHTML="<a href='#'></a>",e.firstChild&&typeof e.firstChild.getAttribute!==A&&"#"===e.firstChild.getAttribute("href")})?{}:{href:function(e){return e.getAttribute("href",2)},type:function(e){return e.getAttribute("type")}},T.getIdNotName?(i.find.ID=function(e,t){if(typeof t.getElementById!==A&&!d){var n=t.getElementById(e);return n&&n.parentNode?[n]:[]}},i.filter.ID=function(e){var t=e.replace(et,tt);return function(e){return e.getAttribute("id")===t}}):(i.find.ID=function(e,n){if(typeof n.getElementById!==A&&!d){var r=n.getElementById(e);return r?r.id===e||typeof r.getAttributeNode!==A&&r.getAttributeNode("id").value===e?[r]:t:[]}},i.filter.ID=function(e){var t=e.replace(et,tt);return function(e){var n=typeof e.getAttributeNode!==A&&e.getAttributeNode("id");return n&&n.value===t}}),i.find.TAG=T.tagNameNoComments?function(e,n){return typeof n.getElementsByTagName!==A?n.getElementsByTagName(e):t}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},i.find.NAME=T.getByName&&function(e,n){return typeof n.getElementsByName!==A?n.getElementsByName(name):t},i.find.CLASS=T.getByClassName&&function(e,n){return typeof n.getElementsByClassName===A||d?t:n.getElementsByClassName(e)},g=[],h=[":focus"],(T.qsa=rt(n.querySelectorAll))&&(at(function(e){e.innerHTML="<select><option selected=''></option></select>",e.querySelectorAll("[selected]").length||h.push("\\["+_+"*(?:checked|disabled|ismap|multiple|readonly|selected|value)"),e.querySelectorAll(":checked").length||h.push(":checked")}),at(function(e){e.innerHTML="<input type='hidden' i=''/>",e.querySelectorAll("[i^='']").length&&h.push("[*^$]="+_+"*(?:\"\"|'')"),e.querySelectorAll(":enabled").length||h.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),h.push(",.*:")})),(T.matchesSelector=rt(m=f.matchesSelector||f.mozMatchesSelector||f.webkitMatchesSelector||f.oMatchesSelector||f.msMatchesSelector))&&at(function(e){T.disconnectedMatch=m.call(e,"div"),m.call(e,"[s!='']:x"),g.push("!=",R)}),h=RegExp(h.join("|")),g=RegExp(g.join("|")),y=rt(f.contains)||f.compareDocumentPosition?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},v=f.compareDocumentPosition?function(e,t){var r;return e===t?(u=!0,0):(r=t.compareDocumentPosition&&e.compareDocumentPosition&&e.compareDocumentPosition(t))?1&r||e.parentNode&&11===e.parentNode.nodeType?e===n||y(w,e)?-1:t===n||y(w,t)?1:0:4&r?-1:1:e.compareDocumentPosition?-1:1}:function(e,t){var r,i=0,o=e.parentNode,a=t.parentNode,s=[e],l=[t];if(e===t)return u=!0,0;if(!o||!a)return e===n?-1:t===n?1:o?-1:a?1:0;if(o===a)return ut(e,t);r=e;while(r=r.parentNode)s.unshift(r);r=t;while(r=r.parentNode)l.unshift(r);while(s[i]===l[i])i++;return i?ut(s[i],l[i]):s[i]===w?-1:l[i]===w?1:0},u=!1,[0,0].sort(v),T.detectDuplicates=u,p):p},st.matches=function(e,t){return st(e,null,null,t)},st.matchesSelector=function(e,t){if((e.ownerDocument||e)!==p&&c(e),t=t.replace(Z,"='$1']"),!(!T.matchesSelector||d||g&&g.test(t)||h.test(t)))try{var n=m.call(e,t);if(n||T.disconnectedMatch||e.document&&11!==e.document.nodeType)return n}catch(r){}return st(t,p,null,[e]).length>0},st.contains=function(e,t){return(e.ownerDocument||e)!==p&&c(e),y(e,t)},st.attr=function(e,t){var n;return(e.ownerDocument||e)!==p&&c(e),d||(t=t.toLowerCase()),(n=i.attrHandle[t])?n(e):d||T.attributes?e.getAttribute(t):((n=e.getAttributeNode(t))||e.getAttribute(t))&&e[t]===!0?t:n&&n.specified?n.value:null},st.error=function(e){throw Error("Syntax error, unrecognized expression: "+e)},st.uniqueSort=function(e){var t,n=[],r=1,i=0;if(u=!T.detectDuplicates,e.sort(v),u){for(;t=e[r];r++)t===e[r-1]&&(i=n.push(r));while(i--)e.splice(n[i],1)}return e};function ut(e,t){var n=t&&e,r=n&&(~t.sourceIndex||j)-(~e.sourceIndex||j);if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function lt(e){return function(t){var n=t.nodeName.toLowerCase();return"input"===n&&t.type===e}}function ct(e){return function(t){var n=t.nodeName.toLowerCase();return("input"===n||"button"===n)&&t.type===e}}function pt(e){return ot(function(t){return t=+t,ot(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&&(n[i]=!(r[i]=n[i]))})})}o=st.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=o(e)}else if(3===i||4===i)return e.nodeValue}else for(;t=e[r];r++)n+=o(t);return n},i=st.selectors={cacheLength:50,createPseudo:ot,match:U,find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(et,tt),e[3]=(e[4]||e[5]||"").replace(et,tt),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||st.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&st.error(e[0]),e},PSEUDO:function(e){var t,n=!e[5]&&e[2];return U.CHILD.test(e[0])?null:(e[4]?e[2]=e[4]:n&&z.test(n)&&(t=ft(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){return"*"===e?function(){return!0}:(e=e.replace(et,tt).toLowerCase(),function(t){return t.nodeName&&t.nodeName.toLowerCase()===e})},CLASS:function(e){var t=k[e+" "];return t||(t=RegExp("(^|"+_+")"+e+"("+_+"|$)"))&&k(e,function(e){return t.test(e.className||typeof e.getAttribute!==A&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r){var i=st.attr(r,e);return null==i?"!="===t:t?(i+="","="===t?i===n:"!="===t?i!==n:"^="===t?n&&0===i.indexOf(n):"*="===t?n&&i.indexOf(n)>-1:"$="===t?n&&i.slice(-n.length)===n:"~="===t?(" "+i+" ").indexOf(n)>-1:"|="===t?i===n||i.slice(0,n.length+1)===n+"-":!1):!0}},CHILD:function(e,t,n,r,i){var o="nth"!==e.slice(0,3),a="last"!==e.slice(-4),s="of-type"===t;return 1===r&&0===i?function(e){return!!e.parentNode}:function(t,n,u){var l,c,p,f,d,h,g=o!==a?"nextSibling":"previousSibling",m=t.parentNode,y=s&&t.nodeName.toLowerCase(),v=!u&&!s;if(m){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===y:1===p.nodeType)return!1;h=g="only"===e&&!h&&"nextSibling"}return!0}if(h=[a?m.firstChild:m.lastChild],a&&v){c=m[x]||(m[x]={}),l=c[e]||[],d=l[0]===N&&l[1],f=l[0]===N&&l[2],p=d&&m.childNodes[d];while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if(1===p.nodeType&&++f&&p===t){c[e]=[N,d,f];break}}else if(v&&(l=(t[x]||(t[x]={}))[e])&&l[0]===N)f=l[1];else while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===y:1===p.nodeType)&&++f&&(v&&((p[x]||(p[x]={}))[e]=[N,f]),p===t))break;return f-=i,f===r||0===f%r&&f/r>=0}}},PSEUDO:function(e,t){var n,r=i.pseudos[e]||i.setFilters[e.toLowerCase()]||st.error("unsupported pseudo: "+e);return r[x]?r(t):r.length>1?(n=[e,e,"",t],i.setFilters.hasOwnProperty(e.toLowerCase())?ot(function(e,n){var i,o=r(e,t),a=o.length;while(a--)i=M.call(e,o[a]),e[i]=!(n[i]=o[a])}):function(e){return r(e,0,n)}):r}},pseudos:{not:ot(function(e){var t=[],n=[],r=s(e.replace(W,"$1"));return r[x]?ot(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&&(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),!n.pop()}}),has:ot(function(e){return function(t){return st(e,t).length>0}}),contains:ot(function(e){return function(t){return(t.textContent||t.innerText||o(t)).indexOf(e)>-1}}),lang:ot(function(e){return X.test(e||"")||st.error("unsupported lang: "+e),e=e.replace(et,tt).toLowerCase(),function(t){var n;do if(n=d?t.getAttribute("xml:lang")||t.getAttribute("lang"):t.lang)return n=n.toLowerCase(),n===e||0===n.indexOf(e+"-");while((t=t.parentNode)&&1===t.nodeType);return!1}}),target:function(t){var n=e.location&&e.location.hash;return n&&n.slice(1)===t.id},root:function(e){return e===f},focus:function(e){return e===p.activeElement&&(!p.hasFocus||p.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:function(e){return e.disabled===!1},disabled:function(e){return e.disabled===!0},checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,e.selected===!0},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeName>"@"||3===e.nodeType||4===e.nodeType)return!1;return!0},parent:function(e){return!i.pseudos.empty(e)},header:function(e){return Q.test(e.nodeName)},input:function(e){return G.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||t.toLowerCase()===e.type)},first:pt(function(){return[0]}),last:pt(function(e,t){return[t-1]}),eq:pt(function(e,t,n){return[0>n?n+t:n]}),even:pt(function(e,t){var n=0;for(;t>n;n+=2)e.push(n);return e}),odd:pt(function(e,t){var n=1;for(;t>n;n+=2)e.push(n);return e}),lt:pt(function(e,t,n){var r=0>n?n+t:n;for(;--r>=0;)e.push(r);return e}),gt:pt(function(e,t,n){var r=0>n?n+t:n;for(;t>++r;)e.push(r);return e})}};for(n in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})i.pseudos[n]=lt(n);for(n in{submit:!0,reset:!0})i.pseudos[n]=ct(n);function ft(e,t){var n,r,o,a,s,u,l,c=E[e+" "];if(c)return t?0:c.slice(0);s=e,u=[],l=i.preFilter;while(s){(!n||(r=$.exec(s)))&&(r&&(s=s.slice(r[0].length)||s),u.push(o=[])),n=!1,(r=I.exec(s))&&(n=r.shift(),o.push({value:n,type:r[0].replace(W," ")}),s=s.slice(n.length));for(a in i.filter)!(r=U[a].exec(s))||l[a]&&!(r=l[a](r))||(n=r.shift(),o.push({value:n,type:a,matches:r}),s=s.slice(n.length));if(!n)break}return t?s.length:s?st.error(e):E(e,u).slice(0)}function dt(e){var t=0,n=e.length,r="";for(;n>t;t++)r+=e[t].value;return r}function ht(e,t,n){var i=t.dir,o=n&&"parentNode"===i,a=C++;return t.first?function(t,n,r){while(t=t[i])if(1===t.nodeType||o)return e(t,n,r)}:function(t,n,s){var u,l,c,p=N+" "+a;if(s){while(t=t[i])if((1===t.nodeType||o)&&e(t,n,s))return!0}else while(t=t[i])if(1===t.nodeType||o)if(c=t[x]||(t[x]={}),(l=c[i])&&l[0]===p){if((u=l[1])===!0||u===r)return u===!0}else if(l=c[i]=[p],l[1]=e(t,n,s)||r,l[1]===!0)return!0}}function gt(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function mt(e,t,n,r,i){var o,a=[],s=0,u=e.length,l=null!=t;for(;u>s;s++)(o=e[s])&&(!n||n(o,r,i))&&(a.push(o),l&&t.push(s));return a}function yt(e,t,n,r,i,o){return r&&!r[x]&&(r=yt(r)),i&&!i[x]&&(i=yt(i,o)),ot(function(o,a,s,u){var l,c,p,f=[],d=[],h=a.length,g=o||xt(t||"*",s.nodeType?[s]:s,[]),m=!e||!o&&t?g:mt(g,f,e,s,u),y=n?i||(o?e:h||r)?[]:a:m;if(n&&n(m,y,s,u),r){l=mt(y,d),r(l,[],s,u),c=l.length;while(c--)(p=l[c])&&(y[d[c]]=!(m[d[c]]=p))}if(o){if(i||e){if(i){l=[],c=y.length;while(c--)(p=y[c])&&l.push(m[c]=p);i(null,y=[],l,u)}c=y.length;while(c--)(p=y[c])&&(l=i?M.call(o,p):f[c])>-1&&(o[l]=!(a[l]=p))}}else y=mt(y===a?y.splice(h,y.length):y),i?i(null,a,y,u):H.apply(a,y)})}function vt(e){var t,n,r,o=e.length,a=i.relative[e[0].type],s=a||i.relative[" "],u=a?1:0,c=ht(function(e){return e===t},s,!0),p=ht(function(e){return M.call(t,e)>-1},s,!0),f=[function(e,n,r){return!a&&(r||n!==l)||((t=n).nodeType?c(e,n,r):p(e,n,r))}];for(;o>u;u++)if(n=i.relative[e[u].type])f=[ht(gt(f),n)];else{if(n=i.filter[e[u].type].apply(null,e[u].matches),n[x]){for(r=++u;o>r;r++)if(i.relative[e[r].type])break;return yt(u>1&&gt(f),u>1&&dt(e.slice(0,u-1)).replace(W,"$1"),n,r>u&&vt(e.slice(u,r)),o>r&&vt(e=e.slice(r)),o>r&&dt(e))}f.push(n)}return gt(f)}function bt(e,t){var n=0,o=t.length>0,a=e.length>0,s=function(s,u,c,f,d){var h,g,m,y=[],v=0,b="0",x=s&&[],w=null!=d,T=l,C=s||a&&i.find.TAG("*",d&&u.parentNode||u),k=N+=null==T?1:Math.random()||.1;for(w&&(l=u!==p&&u,r=n);null!=(h=C[b]);b++){if(a&&h){g=0;while(m=e[g++])if(m(h,u,c)){f.push(h);break}w&&(N=k,r=++n)}o&&((h=!m&&h)&&v--,s&&x.push(h))}if(v+=b,o&&b!==v){g=0;while(m=t[g++])m(x,y,u,c);if(s){if(v>0)while(b--)x[b]||y[b]||(y[b]=L.call(f));y=mt(y)}H.apply(f,y),w&&!s&&y.length>0&&v+t.length>1&&st.uniqueSort(f)}return w&&(N=k,l=T),x};return o?ot(s):s}s=st.compile=function(e,t){var n,r=[],i=[],o=S[e+" "];if(!o){t||(t=ft(e)),n=t.length;while(n--)o=vt(t[n]),o[x]?r.push(o):i.push(o);o=S(e,bt(i,r))}return o};function xt(e,t,n){var r=0,i=t.length;for(;i>r;r++)st(e,t[r],n);return n}function wt(e,t,n,r){var o,a,u,l,c,p=ft(e);if(!r&&1===p.length){if(a=p[0]=p[0].slice(0),a.length>2&&"ID"===(u=a[0]).type&&9===t.nodeType&&!d&&i.relative[a[1].type]){if(t=i.find.ID(u.matches[0].replace(et,tt),t)[0],!t)return n;e=e.slice(a.shift().value.length)}o=U.needsContext.test(e)?0:a.length;while(o--){if(u=a[o],i.relative[l=u.type])break;if((c=i.find[l])&&(r=c(u.matches[0].replace(et,tt),V.test(a[0].type)&&t.parentNode||t))){if(a.splice(o,1),e=r.length&&dt(a),!e)return H.apply(n,q.call(r,0)),n;break}}}return s(e,p)(r,t,d,n,V.test(e)),n}i.pseudos.nth=i.pseudos.eq;function Tt(){}i.filters=Tt.prototype=i.pseudos,i.setFilters=new Tt,c(),st.attr=b.attr,b.find=st,b.expr=st.selectors,b.expr[":"]=b.expr.pseudos,b.unique=st.uniqueSort,b.text=st.getText,b.isXMLDoc=st.isXML,b.contains=st.contains}(e);var at=/Until$/,st=/^(?:parents|prev(?:Until|All))/,ut=/^.[^:#\[\.,]*$/,lt=b.expr.match.needsContext,ct={children:!0,contents:!0,next:!0,prev:!0};b.fn.extend({find:function(e){var t,n,r,i=this.length;if("string"!=typeof e)return r=this,this.pushStack(b(e).filter(function(){for(t=0;i>t;t++)if(b.contains(r[t],this))return!0}));for(n=[],t=0;i>t;t++)b.find(e,this[t],n);return n=this.pushStack(i>1?b.unique(n):n),n.selector=(this.selector?this.selector+" ":"")+e,n},has:function(e){var t,n=b(e,this),r=n.length;return this.filter(function(){for(t=0;r>t;t++)if(b.contains(this,n[t]))return!0})},not:function(e){return this.pushStack(ft(this,e,!1))},filter:function(e){return this.pushStack(ft(this,e,!0))},is:function(e){return!!e&&("string"==typeof e?lt.test(e)?b(e,this.context).index(this[0])>=0:b.filter(e,this).length>0:this.filter(e).length>0)},closest:function(e,t){var n,r=0,i=this.length,o=[],a=lt.test(e)||"string"!=typeof e?b(e,t||this.context):0;for(;i>r;r++){n=this[r];while(n&&n.ownerDocument&&n!==t&&11!==n.nodeType){if(a?a.index(n)>-1:b.find.matchesSelector(n,e)){o.push(n);break}n=n.parentNode}}return this.pushStack(o.length>1?b.unique(o):o)},index:function(e){return e?"string"==typeof e?b.inArray(this[0],b(e)):b.inArray(e.jquery?e[0]:e,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){var n="string"==typeof e?b(e,t):b.makeArray(e&&e.nodeType?[e]:e),r=b.merge(this.get(),n);return this.pushStack(b.unique(r))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}}),b.fn.andSelf=b.fn.addBack;function pt(e,t){do e=e[t];while(e&&1!==e.nodeType);return e}b.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return b.dir(e,"parentNode")},parentsUntil:function(e,t,n){return b.dir(e,"parentNode",n)},next:function(e){return pt(e,"nextSibling")},prev:function(e){return pt(e,"previousSibling")},nextAll:function(e){return b.dir(e,"nextSibling")},prevAll:function(e){return b.dir(e,"previousSibling")},nextUntil:function(e,t,n){return b.dir(e,"nextSibling",n)},prevUntil:function(e,t,n){return b.dir(e,"previousSibling",n)},siblings:function(e){return b.sibling((e.parentNode||{}).firstChild,e)},children:function(e){return b.sibling(e.firstChild)},contents:function(e){return b.nodeName(e,"iframe")?e.contentDocument||e.contentWindow.document:b.merge([],e.childNodes)}},function(e,t){b.fn[e]=function(n,r){var i=b.map(this,t,n);return at.test(e)||(r=n),r&&"string"==typeof r&&(i=b.filter(r,i)),i=this.length>1&&!ct[e]?b.unique(i):i,this.length>1&&st.test(e)&&(i=i.reverse()),this.pushStack(i)}}),b.extend({filter:function(e,t,n){return n&&(e=":not("+e+")"),1===t.length?b.find.matchesSelector(t[0],e)?[t[0]]:[]:b.find.matches(e,t)},dir:function(e,n,r){var i=[],o=e[n];while(o&&9!==o.nodeType&&(r===t||1!==o.nodeType||!b(o).is(r)))1===o.nodeType&&i.push(o),o=o[n];return i},sibling:function(e,t){var n=[];for(;e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n}});function ft(e,t,n){if(t=t||0,b.isFunction(t))return b.grep(e,function(e,r){var i=!!t.call(e,r,e);return i===n});if(t.nodeType)return b.grep(e,function(e){return e===t===n});if("string"==typeof t){var r=b.grep(e,function(e){return 1===e.nodeType});if(ut.test(t))return b.filter(t,r,!n);t=b.filter(t,r)}return b.grep(e,function(e){return b.inArray(e,t)>=0===n})}function dt(e){var t=ht.split("|"),n=e.createDocumentFragment();if(n.createElement)while(t.length)n.createElement(t.pop());return n}var ht="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",gt=/ jQuery\d+="(?:null|\d+)"/g,mt=RegExp("<(?:"+ht+")[\\s/>]","i"),yt=/^\s+/,vt=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,bt=/<([\w:]+)/,xt=/<tbody/i,wt=/<|&#?\w+;/,Tt=/<(?:script|style|link)/i,Nt=/^(?:checkbox|radio)$/i,Ct=/checked\s*(?:[^=]|=\s*.checked.)/i,kt=/^$|\/(?:java|ecma)script/i,Et=/^true\/(.*)/,St=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,At={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:b.support.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},jt=dt(o),Dt=jt.appendChild(o.createElement("div"));At.optgroup=At.option,At.tbody=At.tfoot=At.colgroup=At.caption=At.thead,At.th=At.td,b.fn.extend({text:function(e){return b.access(this,function(e){return e===t?b.text(this):this.empty().append((this[0]&&this[0].ownerDocument||o).createTextNode(e))},null,e,arguments.length)},wrapAll:function(e){if(b.isFunction(e))return this.each(function(t){b(this).wrapAll(e.call(this,t))});if(this[0]){var t=b(e,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstChild&&1===e.firstChild.nodeType)e=e.firstChild;return e}).append(this)}return this},wrapInner:function(e){return b.isFunction(e)?this.each(function(t){b(this).wrapInner(e.call(this,t))}):this.each(function(){var t=b(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=b.isFunction(e);return this.each(function(n){b(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(){return this.parent().each(function(){b.nodeName(this,"body")||b(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(e){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&this.appendChild(e)})},prepend:function(){return this.domManip(arguments,!0,function(e){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&this.insertBefore(e,this.firstChild)})},before:function(){return this.domManip(arguments,!1,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return this.domManip(arguments,!1,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},remove:function(e,t){var n,r=0;for(;null!=(n=this[r]);r++)(!e||b.filter(e,[n]).length>0)&&(t||1!==n.nodeType||b.cleanData(Ot(n)),n.parentNode&&(t&&b.contains(n.ownerDocument,n)&&Mt(Ot(n,"script")),n.parentNode.removeChild(n)));return this},empty:function(){var e,t=0;for(;null!=(e=this[t]);t++){1===e.nodeType&&b.cleanData(Ot(e,!1));while(e.firstChild)e.removeChild(e.firstChild);e.options&&b.nodeName(e,"select")&&(e.options.length=0)}return this},clone:function(e,t){return e=null==e?!1:e,t=null==t?e:t,this.map(function(){return b.clone(this,e,t)})},html:function(e){return b.access(this,function(e){var n=this[0]||{},r=0,i=this.length;if(e===t)return 1===n.nodeType?n.innerHTML.replace(gt,""):t;if(!("string"!=typeof e||Tt.test(e)||!b.support.htmlSerialize&&mt.test(e)||!b.support.leadingWhitespace&&yt.test(e)||At[(bt.exec(e)||["",""])[1].toLowerCase()])){e=e.replace(vt,"<$1></$2>");try{for(;i>r;r++)n=this[r]||{},1===n.nodeType&&(b.cleanData(Ot(n,!1)),n.innerHTML=e);n=0}catch(o){}}n&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(e){var t=b.isFunction(e);return t||"string"==typeof e||(e=b(e).not(this).detach()),this.domManip([e],!0,function(e){var t=this.nextSibling,n=this.parentNode;n&&(b(this).remove(),n.insertBefore(e,t))})},detach:function(e){return this.remove(e,!0)},domManip:function(e,n,r){e=f.apply([],e);var i,o,a,s,u,l,c=0,p=this.length,d=this,h=p-1,g=e[0],m=b.isFunction(g);if(m||!(1>=p||"string"!=typeof g||b.support.checkClone)&&Ct.test(g))return this.each(function(i){var o=d.eq(i);m&&(e[0]=g.call(this,i,n?o.html():t)),o.domManip(e,n,r)});if(p&&(l=b.buildFragment(e,this[0].ownerDocument,!1,this),i=l.firstChild,1===l.childNodes.length&&(l=i),i)){for(n=n&&b.nodeName(i,"tr"),s=b.map(Ot(l,"script"),Ht),a=s.length;p>c;c++)o=l,c!==h&&(o=b.clone(o,!0,!0),a&&b.merge(s,Ot(o,"script"))),r.call(n&&b.nodeName(this[c],"table")?Lt(this[c],"tbody"):this[c],o,c);if(a)for(u=s[s.length-1].ownerDocument,b.map(s,qt),c=0;a>c;c++)o=s[c],kt.test(o.type||"")&&!b._data(o,"globalEval")&&b.contains(u,o)&&(o.src?b.ajax({url:o.src,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0}):b.globalEval((o.text||o.textContent||o.innerHTML||"").replace(St,"")));l=i=null}return this}});function Lt(e,t){return e.getElementsByTagName(t)[0]||e.appendChild(e.ownerDocument.createElement(t))}function Ht(e){var t=e.getAttributeNode("type");return e.type=(t&&t.specified)+"/"+e.type,e}function qt(e){var t=Et.exec(e.type);return t?e.type=t[1]:e.removeAttribute("type"),e}function Mt(e,t){var n,r=0;for(;null!=(n=e[r]);r++)b._data(n,"globalEval",!t||b._data(t[r],"globalEval"))}function _t(e,t){if(1===t.nodeType&&b.hasData(e)){var n,r,i,o=b._data(e),a=b._data(t,o),s=o.events;if(s){delete a.handle,a.events={};for(n in s)for(r=0,i=s[n].length;i>r;r++)b.event.add(t,n,s[n][r])}a.data&&(a.data=b.extend({},a.data))}}function Ft(e,t){var n,r,i;if(1===t.nodeType){if(n=t.nodeName.toLowerCase(),!b.support.noCloneEvent&&t[b.expando]){i=b._data(t);for(r in i.events)b.removeEvent(t,r,i.handle);t.removeAttribute(b.expando)}"script"===n&&t.text!==e.text?(Ht(t).text=e.text,qt(t)):"object"===n?(t.parentNode&&(t.outerHTML=e.outerHTML),b.support.html5Clone&&e.innerHTML&&!b.trim(t.innerHTML)&&(t.innerHTML=e.innerHTML)):"input"===n&&Nt.test(e.type)?(t.defaultChecked=t.checked=e.checked,t.value!==e.value&&(t.value=e.value)):"option"===n?t.defaultSelected=t.selected=e.defaultSelected:("input"===n||"textarea"===n)&&(t.defaultValue=e.defaultValue)}}b.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){b.fn[e]=function(e){var n,r=0,i=[],o=b(e),a=o.length-1;for(;a>=r;r++)n=r===a?this:this.clone(!0),b(o[r])[t](n),d.apply(i,n.get());return this.pushStack(i)}});function Ot(e,n){var r,o,a=0,s=typeof e.getElementsByTagName!==i?e.getElementsByTagName(n||"*"):typeof e.querySelectorAll!==i?e.querySelectorAll(n||"*"):t;if(!s)for(s=[],r=e.childNodes||e;null!=(o=r[a]);a++)!n||b.nodeName(o,n)?s.push(o):b.merge(s,Ot(o,n));return n===t||n&&b.nodeName(e,n)?b.merge([e],s):s}function Bt(e){Nt.test(e.type)&&(e.defaultChecked=e.checked)}b.extend({clone:function(e,t,n){var r,i,o,a,s,u=b.contains(e.ownerDocument,e);if(b.support.html5Clone||b.isXMLDoc(e)||!mt.test("<"+e.nodeName+">")?o=e.cloneNode(!0):(Dt.innerHTML=e.outerHTML,Dt.removeChild(o=Dt.firstChild)),!(b.support.noCloneEvent&&b.support.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||b.isXMLDoc(e)))for(r=Ot(o),s=Ot(e),a=0;null!=(i=s[a]);++a)r[a]&&Ft(i,r[a]);if(t)if(n)for(s=s||Ot(e),r=r||Ot(o),a=0;null!=(i=s[a]);a++)_t(i,r[a]);else _t(e,o);return r=Ot(o,"script"),r.length>0&&Mt(r,!u&&Ot(e,"script")),r=s=i=null,o},buildFragment:function(e,t,n,r){var i,o,a,s,u,l,c,p=e.length,f=dt(t),d=[],h=0;for(;p>h;h++)if(o=e[h],o||0===o)if("object"===b.type(o))b.merge(d,o.nodeType?[o]:o);else if(wt.test(o)){s=s||f.appendChild(t.createElement("div")),u=(bt.exec(o)||["",""])[1].toLowerCase(),c=At[u]||At._default,s.innerHTML=c[1]+o.replace(vt,"<$1></$2>")+c[2],i=c[0];while(i--)s=s.lastChild;if(!b.support.leadingWhitespace&&yt.test(o)&&d.push(t.createTextNode(yt.exec(o)[0])),!b.support.tbody){o="table"!==u||xt.test(o)?"<table>"!==c[1]||xt.test(o)?0:s:s.firstChild,i=o&&o.childNodes.length;while(i--)b.nodeName(l=o.childNodes[i],"tbody")&&!l.childNodes.length&&o.removeChild(l)
	}b.merge(d,s.childNodes),s.textContent="";while(s.firstChild)s.removeChild(s.firstChild);s=f.lastChild}else d.push(t.createTextNode(o));s&&f.removeChild(s),b.support.appendChecked||b.grep(Ot(d,"input"),Bt),h=0;while(o=d[h++])if((!r||-1===b.inArray(o,r))&&(a=b.contains(o.ownerDocument,o),s=Ot(f.appendChild(o),"script"),a&&Mt(s),n)){i=0;while(o=s[i++])kt.test(o.type||"")&&n.push(o)}return s=null,f},cleanData:function(e,t){var n,r,o,a,s=0,u=b.expando,l=b.cache,p=b.support.deleteExpando,f=b.event.special;for(;null!=(n=e[s]);s++)if((t||b.acceptData(n))&&(o=n[u],a=o&&l[o])){if(a.events)for(r in a.events)f[r]?b.event.remove(n,r):b.removeEvent(n,r,a.handle);l[o]&&(delete l[o],p?delete n[u]:typeof n.removeAttribute!==i?n.removeAttribute(u):n[u]=null,c.push(o))}}});var Pt,Rt,Wt,$t=/alpha\([^)]*\)/i,It=/opacity\s*=\s*([^)]*)/,zt=/^(top|right|bottom|left)$/,Xt=/^(none|table(?!-c[ea]).+)/,Ut=/^margin/,Vt=RegExp("^("+x+")(.*)$","i"),Yt=RegExp("^("+x+")(?!px)[a-z%]+$","i"),Jt=RegExp("^([+-])=("+x+")","i"),Gt={BODY:"block"},Qt={position:"absolute",visibility:"hidden",display:"block"},Kt={letterSpacing:0,fontWeight:400},Zt=["Top","Right","Bottom","Left"],en=["Webkit","O","Moz","ms"];function tn(e,t){if(t in e)return t;var n=t.charAt(0).toUpperCase()+t.slice(1),r=t,i=en.length;while(i--)if(t=en[i]+n,t in e)return t;return r}function nn(e,t){return e=t||e,"none"===b.css(e,"display")||!b.contains(e.ownerDocument,e)}function rn(e,t){var n,r,i,o=[],a=0,s=e.length;for(;s>a;a++)r=e[a],r.style&&(o[a]=b._data(r,"olddisplay"),n=r.style.display,t?(o[a]||"none"!==n||(r.style.display=""),""===r.style.display&&nn(r)&&(o[a]=b._data(r,"olddisplay",un(r.nodeName)))):o[a]||(i=nn(r),(n&&"none"!==n||!i)&&b._data(r,"olddisplay",i?n:b.css(r,"display"))));for(a=0;s>a;a++)r=e[a],r.style&&(t&&"none"!==r.style.display&&""!==r.style.display||(r.style.display=t?o[a]||"":"none"));return e}b.fn.extend({css:function(e,n){return b.access(this,function(e,n,r){var i,o,a={},s=0;if(b.isArray(n)){for(o=Rt(e),i=n.length;i>s;s++)a[n[s]]=b.css(e,n[s],!1,o);return a}return r!==t?b.style(e,n,r):b.css(e,n)},e,n,arguments.length>1)},show:function(){return rn(this,!0)},hide:function(){return rn(this)},toggle:function(e){var t="boolean"==typeof e;return this.each(function(){(t?e:nn(this))?b(this).show():b(this).hide()})}}),b.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Wt(e,"opacity");return""===n?"1":n}}}},cssNumber:{columnCount:!0,fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":b.support.cssFloat?"cssFloat":"styleFloat"},style:function(e,n,r,i){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var o,a,s,u=b.camelCase(n),l=e.style;if(n=b.cssProps[u]||(b.cssProps[u]=tn(l,u)),s=b.cssHooks[n]||b.cssHooks[u],r===t)return s&&"get"in s&&(o=s.get(e,!1,i))!==t?o:l[n];if(a=typeof r,"string"===a&&(o=Jt.exec(r))&&(r=(o[1]+1)*o[2]+parseFloat(b.css(e,n)),a="number"),!(null==r||"number"===a&&isNaN(r)||("number"!==a||b.cssNumber[u]||(r+="px"),b.support.clearCloneStyle||""!==r||0!==n.indexOf("background")||(l[n]="inherit"),s&&"set"in s&&(r=s.set(e,r,i))===t)))try{l[n]=r}catch(c){}}},css:function(e,n,r,i){var o,a,s,u=b.camelCase(n);return n=b.cssProps[u]||(b.cssProps[u]=tn(e.style,u)),s=b.cssHooks[n]||b.cssHooks[u],s&&"get"in s&&(a=s.get(e,!0,r)),a===t&&(a=Wt(e,n,i)),"normal"===a&&n in Kt&&(a=Kt[n]),""===r||r?(o=parseFloat(a),r===!0||b.isNumeric(o)?o||0:a):a},swap:function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i}}),e.getComputedStyle?(Rt=function(t){return e.getComputedStyle(t,null)},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),u=s?s.getPropertyValue(n)||s[n]:t,l=e.style;return s&&(""!==u||b.contains(e.ownerDocument,e)||(u=b.style(e,n)),Yt.test(u)&&Ut.test(n)&&(i=l.width,o=l.minWidth,a=l.maxWidth,l.minWidth=l.maxWidth=l.width=u,u=s.width,l.width=i,l.minWidth=o,l.maxWidth=a)),u}):o.documentElement.currentStyle&&(Rt=function(e){return e.currentStyle},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),u=s?s[n]:t,l=e.style;return null==u&&l&&l[n]&&(u=l[n]),Yt.test(u)&&!zt.test(n)&&(i=l.left,o=e.runtimeStyle,a=o&&o.left,a&&(o.left=e.currentStyle.left),l.left="fontSize"===n?"1em":u,u=l.pixelLeft+"px",l.left=i,a&&(o.left=a)),""===u?"auto":u});function on(e,t,n){var r=Vt.exec(t);return r?Math.max(0,r[1]-(n||0))+(r[2]||"px"):t}function an(e,t,n,r,i){var o=n===(r?"border":"content")?4:"width"===t?1:0,a=0;for(;4>o;o+=2)"margin"===n&&(a+=b.css(e,n+Zt[o],!0,i)),r?("content"===n&&(a-=b.css(e,"padding"+Zt[o],!0,i)),"margin"!==n&&(a-=b.css(e,"border"+Zt[o]+"Width",!0,i))):(a+=b.css(e,"padding"+Zt[o],!0,i),"padding"!==n&&(a+=b.css(e,"border"+Zt[o]+"Width",!0,i)));return a}function sn(e,t,n){var r=!0,i="width"===t?e.offsetWidth:e.offsetHeight,o=Rt(e),a=b.support.boxSizing&&"border-box"===b.css(e,"boxSizing",!1,o);if(0>=i||null==i){if(i=Wt(e,t,o),(0>i||null==i)&&(i=e.style[t]),Yt.test(i))return i;r=a&&(b.support.boxSizingReliable||i===e.style[t]),i=parseFloat(i)||0}return i+an(e,t,n||(a?"border":"content"),r,o)+"px"}function un(e){var t=o,n=Gt[e];return n||(n=ln(e,t),"none"!==n&&n||(Pt=(Pt||b("<iframe frameborder='0' width='0' height='0'/>").css("cssText","display:block !important")).appendTo(t.documentElement),t=(Pt[0].contentWindow||Pt[0].contentDocument).document,t.write("<!doctype html><html><body>"),t.close(),n=ln(e,t),Pt.detach()),Gt[e]=n),n}function ln(e,t){var n=b(t.createElement(e)).appendTo(t.body),r=b.css(n[0],"display");return n.remove(),r}b.each(["height","width"],function(e,n){b.cssHooks[n]={get:function(e,r,i){return r?0===e.offsetWidth&&Xt.test(b.css(e,"display"))?b.swap(e,Qt,function(){return sn(e,n,i)}):sn(e,n,i):t},set:function(e,t,r){var i=r&&Rt(e);return on(e,t,r?an(e,n,r,b.support.boxSizing&&"border-box"===b.css(e,"boxSizing",!1,i),i):0)}}}),b.support.opacity||(b.cssHooks.opacity={get:function(e,t){return It.test((t&&e.currentStyle?e.currentStyle.filter:e.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":t?"1":""},set:function(e,t){var n=e.style,r=e.currentStyle,i=b.isNumeric(t)?"alpha(opacity="+100*t+")":"",o=r&&r.filter||n.filter||"";n.zoom=1,(t>=1||""===t)&&""===b.trim(o.replace($t,""))&&n.removeAttribute&&(n.removeAttribute("filter"),""===t||r&&!r.filter)||(n.filter=$t.test(o)?o.replace($t,i):o+" "+i)}}),b(function(){b.support.reliableMarginRight||(b.cssHooks.marginRight={get:function(e,n){return n?b.swap(e,{display:"inline-block"},Wt,[e,"marginRight"]):t}}),!b.support.pixelPosition&&b.fn.position&&b.each(["top","left"],function(e,n){b.cssHooks[n]={get:function(e,r){return r?(r=Wt(e,n),Yt.test(r)?b(e).position()[n]+"px":r):t}}})}),b.expr&&b.expr.filters&&(b.expr.filters.hidden=function(e){return 0>=e.offsetWidth&&0>=e.offsetHeight||!b.support.reliableHiddenOffsets&&"none"===(e.style&&e.style.display||b.css(e,"display"))},b.expr.filters.visible=function(e){return!b.expr.filters.hidden(e)}),b.each({margin:"",padding:"",border:"Width"},function(e,t){b.cssHooks[e+t]={expand:function(n){var r=0,i={},o="string"==typeof n?n.split(" "):[n];for(;4>r;r++)i[e+Zt[r]+t]=o[r]||o[r-2]||o[0];return i}},Ut.test(e)||(b.cssHooks[e+t].set=on)});var cn=/%20/g,pn=/\[\]$/,fn=/\r?\n/g,dn=/^(?:submit|button|image|reset|file)$/i,hn=/^(?:input|select|textarea|keygen)/i;b.fn.extend({serialize:function(){return b.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=b.prop(this,"elements");return e?b.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!b(this).is(":disabled")&&hn.test(this.nodeName)&&!dn.test(e)&&(this.checked||!Nt.test(e))}).map(function(e,t){var n=b(this).val();return null==n?null:b.isArray(n)?b.map(n,function(e){return{name:t.name,value:e.replace(fn,"\r\n")}}):{name:t.name,value:n.replace(fn,"\r\n")}}).get()}}),b.param=function(e,n){var r,i=[],o=function(e,t){t=b.isFunction(t)?t():null==t?"":t,i[i.length]=encodeURIComponent(e)+"="+encodeURIComponent(t)};if(n===t&&(n=b.ajaxSettings&&b.ajaxSettings.traditional),b.isArray(e)||e.jquery&&!b.isPlainObject(e))b.each(e,function(){o(this.name,this.value)});else for(r in e)gn(r,e[r],n,o);return i.join("&").replace(cn,"+")};function gn(e,t,n,r){var i;if(b.isArray(t))b.each(t,function(t,i){n||pn.test(e)?r(e,i):gn(e+"["+("object"==typeof i?t:"")+"]",i,n,r)});else if(n||"object"!==b.type(t))r(e,t);else for(i in t)gn(e+"["+i+"]",t[i],n,r)}b.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(e,t){b.fn[t]=function(e,n){return arguments.length>0?this.on(t,null,e,n):this.trigger(t)}}),b.fn.hover=function(e,t){return this.mouseenter(e).mouseleave(t||e)};var mn,yn,vn=b.now(),bn=/\?/,xn=/#.*$/,wn=/([?&])_=[^&]*/,Tn=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Nn=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Cn=/^(?:GET|HEAD)$/,kn=/^\/\//,En=/^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,Sn=b.fn.load,An={},jn={},Dn="*/".concat("*");try{yn=a.href}catch(Ln){yn=o.createElement("a"),yn.href="",yn=yn.href}mn=En.exec(yn.toLowerCase())||[];function Hn(e){return function(t,n){"string"!=typeof t&&(n=t,t="*");var r,i=0,o=t.toLowerCase().match(w)||[];if(b.isFunction(n))while(r=o[i++])"+"===r[0]?(r=r.slice(1)||"*",(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function qn(e,n,r,i){var o={},a=e===jn;function s(u){var l;return o[u]=!0,b.each(e[u]||[],function(e,u){var c=u(n,r,i);return"string"!=typeof c||a||o[c]?a?!(l=c):t:(n.dataTypes.unshift(c),s(c),!1)}),l}return s(n.dataTypes[0])||!o["*"]&&s("*")}function Mn(e,n){var r,i,o=b.ajaxSettings.flatOptions||{};for(i in n)n[i]!==t&&((o[i]?e:r||(r={}))[i]=n[i]);return r&&b.extend(!0,e,r),e}b.fn.load=function(e,n,r){if("string"!=typeof e&&Sn)return Sn.apply(this,arguments);var i,o,a,s=this,u=e.indexOf(" ");return u>=0&&(i=e.slice(u,e.length),e=e.slice(0,u)),b.isFunction(n)?(r=n,n=t):n&&"object"==typeof n&&(a="POST"),s.length>0&&b.ajax({url:e,type:a,dataType:"html",data:n}).done(function(e){o=arguments,s.html(i?b("<div>").append(b.parseHTML(e)).find(i):e)}).complete(r&&function(e,t){s.each(r,o||[e.responseText,t,e])}),this},b.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){b.fn[t]=function(e){return this.on(t,e)}}),b.each(["get","post"],function(e,n){b[n]=function(e,r,i,o){return b.isFunction(r)&&(o=o||i,i=r,r=t),b.ajax({url:e,type:n,dataType:o,data:r,success:i})}}),b.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:yn,type:"GET",isLocal:Nn.test(mn[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Dn,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":e.String,"text html":!0,"text json":b.parseJSON,"text xml":b.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?Mn(Mn(e,b.ajaxSettings),t):Mn(b.ajaxSettings,e)},ajaxPrefilter:Hn(An),ajaxTransport:Hn(jn),ajax:function(e,n){"object"==typeof e&&(n=e,e=t),n=n||{};var r,i,o,a,s,u,l,c,p=b.ajaxSetup({},n),f=p.context||p,d=p.context&&(f.nodeType||f.jquery)?b(f):b.event,h=b.Deferred(),g=b.Callbacks("once memory"),m=p.statusCode||{},y={},v={},x=0,T="canceled",N={readyState:0,getResponseHeader:function(e){var t;if(2===x){if(!c){c={};while(t=Tn.exec(a))c[t[1].toLowerCase()]=t[2]}t=c[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return 2===x?a:null},setRequestHeader:function(e,t){var n=e.toLowerCase();return x||(e=v[n]=v[n]||e,y[e]=t),this},overrideMimeType:function(e){return x||(p.mimeType=e),this},statusCode:function(e){var t;if(e)if(2>x)for(t in e)m[t]=[m[t],e[t]];else N.always(e[N.status]);return this},abort:function(e){var t=e||T;return l&&l.abort(t),k(0,t),this}};if(h.promise(N).complete=g.add,N.success=N.done,N.error=N.fail,p.url=((e||p.url||yn)+"").replace(xn,"").replace(kn,mn[1]+"//"),p.type=n.method||n.type||p.method||p.type,p.dataTypes=b.trim(p.dataType||"*").toLowerCase().match(w)||[""],null==p.crossDomain&&(r=En.exec(p.url.toLowerCase()),p.crossDomain=!(!r||r[1]===mn[1]&&r[2]===mn[2]&&(r[3]||("http:"===r[1]?80:443))==(mn[3]||("http:"===mn[1]?80:443)))),p.data&&p.processData&&"string"!=typeof p.data&&(p.data=b.param(p.data,p.traditional)),qn(An,p,n,N),2===x)return N;u=p.global,u&&0===b.active++&&b.event.trigger("ajaxStart"),p.type=p.type.toUpperCase(),p.hasContent=!Cn.test(p.type),o=p.url,p.hasContent||(p.data&&(o=p.url+=(bn.test(o)?"&":"?")+p.data,delete p.data),p.cache===!1&&(p.url=wn.test(o)?o.replace(wn,"$1_="+vn++):o+(bn.test(o)?"&":"?")+"_="+vn++)),p.ifModified&&(b.lastModified[o]&&N.setRequestHeader("If-Modified-Since",b.lastModified[o]),b.etag[o]&&N.setRequestHeader("If-None-Match",b.etag[o])),(p.data&&p.hasContent&&p.contentType!==!1||n.contentType)&&N.setRequestHeader("Content-Type",p.contentType),N.setRequestHeader("Accept",p.dataTypes[0]&&p.accepts[p.dataTypes[0]]?p.accepts[p.dataTypes[0]]+("*"!==p.dataTypes[0]?", "+Dn+"; q=0.01":""):p.accepts["*"]);for(i in p.headers)N.setRequestHeader(i,p.headers[i]);if(p.beforeSend&&(p.beforeSend.call(f,N,p)===!1||2===x))return N.abort();T="abort";for(i in{success:1,error:1,complete:1})N[i](p[i]);if(l=qn(jn,p,n,N)){N.readyState=1,u&&d.trigger("ajaxSend",[N,p]),p.async&&p.timeout>0&&(s=setTimeout(function(){N.abort("timeout")},p.timeout));try{x=1,l.send(y,k)}catch(C){if(!(2>x))throw C;k(-1,C)}}else k(-1,"No Transport");function k(e,n,r,i){var c,y,v,w,T,C=n;2!==x&&(x=2,s&&clearTimeout(s),l=t,a=i||"",N.readyState=e>0?4:0,r&&(w=_n(p,N,r)),e>=200&&300>e||304===e?(p.ifModified&&(T=N.getResponseHeader("Last-Modified"),T&&(b.lastModified[o]=T),T=N.getResponseHeader("etag"),T&&(b.etag[o]=T)),204===e?(c=!0,C="nocontent"):304===e?(c=!0,C="notmodified"):(c=Fn(p,w),C=c.state,y=c.data,v=c.error,c=!v)):(v=C,(e||!C)&&(C="error",0>e&&(e=0))),N.status=e,N.statusText=(n||C)+"",c?h.resolveWith(f,[y,C,N]):h.rejectWith(f,[N,C,v]),N.statusCode(m),m=t,u&&d.trigger(c?"ajaxSuccess":"ajaxError",[N,p,c?y:v]),g.fireWith(f,[N,C]),u&&(d.trigger("ajaxComplete",[N,p]),--b.active||b.event.trigger("ajaxStop")))}return N},getScript:function(e,n){return b.get(e,t,n,"script")},getJSON:function(e,t,n){return b.get(e,t,n,"json")}});function _n(e,n,r){var i,o,a,s,u=e.contents,l=e.dataTypes,c=e.responseFields;for(s in c)s in r&&(n[c[s]]=r[s]);while("*"===l[0])l.shift(),o===t&&(o=e.mimeType||n.getResponseHeader("Content-Type"));if(o)for(s in u)if(u[s]&&u[s].test(o)){l.unshift(s);break}if(l[0]in r)a=l[0];else{for(s in r){if(!l[0]||e.converters[s+" "+l[0]]){a=s;break}i||(i=s)}a=a||i}return a?(a!==l[0]&&l.unshift(a),r[a]):t}function Fn(e,t){var n,r,i,o,a={},s=0,u=e.dataTypes.slice(),l=u[0];if(e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u[1])for(i in e.converters)a[i.toLowerCase()]=e.converters[i];for(;r=u[++s];)if("*"!==r){if("*"!==l&&l!==r){if(i=a[l+" "+r]||a["* "+r],!i)for(n in a)if(o=n.split(" "),o[1]===r&&(i=a[l+" "+o[0]]||a["* "+o[0]])){i===!0?i=a[n]:a[n]!==!0&&(r=o[0],u.splice(s--,0,r));break}if(i!==!0)if(i&&e["throws"])t=i(t);else try{t=i(t)}catch(c){return{state:"parsererror",error:i?c:"No conversion from "+l+" to "+r}}}l=r}return{state:"success",data:t}}b.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(e){return b.globalEval(e),e}}}),b.ajaxPrefilter("script",function(e){e.cache===t&&(e.cache=!1),e.crossDomain&&(e.type="GET",e.global=!1)}),b.ajaxTransport("script",function(e){if(e.crossDomain){var n,r=o.head||b("head")[0]||o.documentElement;return{send:function(t,i){n=o.createElement("script"),n.async=!0,e.scriptCharset&&(n.charset=e.scriptCharset),n.src=e.url,n.onload=n.onreadystatechange=function(e,t){(t||!n.readyState||/loaded|complete/.test(n.readyState))&&(n.onload=n.onreadystatechange=null,n.parentNode&&n.parentNode.removeChild(n),n=null,t||i(200,"success"))},r.insertBefore(n,r.firstChild)},abort:function(){n&&n.onload(t,!0)}}}});var On=[],Bn=/(=)\?(?=&|$)|\?\?/;b.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=On.pop()||b.expando+"_"+vn++;return this[e]=!0,e}}),b.ajaxPrefilter("json jsonp",function(n,r,i){var o,a,s,u=n.jsonp!==!1&&(Bn.test(n.url)?"url":"string"==typeof n.data&&!(n.contentType||"").indexOf("application/x-www-form-urlencoded")&&Bn.test(n.data)&&"data");return u||"jsonp"===n.dataTypes[0]?(o=n.jsonpCallback=b.isFunction(n.jsonpCallback)?n.jsonpCallback():n.jsonpCallback,u?n[u]=n[u].replace(Bn,"$1"+o):n.jsonp!==!1&&(n.url+=(bn.test(n.url)?"&":"?")+n.jsonp+"="+o),n.converters["script json"]=function(){return s||b.error(o+" was not called"),s[0]},n.dataTypes[0]="json",a=e[o],e[o]=function(){s=arguments},i.always(function(){e[o]=a,n[o]&&(n.jsonpCallback=r.jsonpCallback,On.push(o)),s&&b.isFunction(a)&&a(s[0]),s=a=t}),"script"):t});var Pn,Rn,Wn=0,$n=e.ActiveXObject&&function(){var e;for(e in Pn)Pn[e](t,!0)};function In(){try{return new e.XMLHttpRequest}catch(t){}}function zn(){try{return new e.ActiveXObject("Microsoft.XMLHTTP")}catch(t){}}b.ajaxSettings.xhr=e.ActiveXObject?function(){return!this.isLocal&&In()||zn()}:In,Rn=b.ajaxSettings.xhr(),b.support.cors=!!Rn&&"withCredentials"in Rn,Rn=b.support.ajax=!!Rn,Rn&&b.ajaxTransport(function(n){if(!n.crossDomain||b.support.cors){var r;return{send:function(i,o){var a,s,u=n.xhr();if(n.username?u.open(n.type,n.url,n.async,n.username,n.password):u.open(n.type,n.url,n.async),n.xhrFields)for(s in n.xhrFields)u[s]=n.xhrFields[s];n.mimeType&&u.overrideMimeType&&u.overrideMimeType(n.mimeType),n.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");try{for(s in i)u.setRequestHeader(s,i[s])}catch(l){}u.send(n.hasContent&&n.data||null),r=function(e,i){var s,l,c,p;try{if(r&&(i||4===u.readyState))if(r=t,a&&(u.onreadystatechange=b.noop,$n&&delete Pn[a]),i)4!==u.readyState&&u.abort();else{p={},s=u.status,l=u.getAllResponseHeaders(),"string"==typeof u.responseText&&(p.text=u.responseText);try{c=u.statusText}catch(f){c=""}s||!n.isLocal||n.crossDomain?1223===s&&(s=204):s=p.text?200:404}}catch(d){i||o(-1,d)}p&&o(s,c,p,l)},n.async?4===u.readyState?setTimeout(r):(a=++Wn,$n&&(Pn||(Pn={},b(e).unload($n)),Pn[a]=r),u.onreadystatechange=r):r()},abort:function(){r&&r(t,!0)}}}});var Xn,Un,Vn=/^(?:toggle|show|hide)$/,Yn=RegExp("^(?:([+-])=|)("+x+")([a-z%]*)$","i"),Jn=/queueHooks$/,Gn=[nr],Qn={"*":[function(e,t){var n,r,i=this.createTween(e,t),o=Yn.exec(t),a=i.cur(),s=+a||0,u=1,l=20;if(o){if(n=+o[2],r=o[3]||(b.cssNumber[e]?"":"px"),"px"!==r&&s){s=b.css(i.elem,e,!0)||n||1;do u=u||".5",s/=u,b.style(i.elem,e,s+r);while(u!==(u=i.cur()/a)&&1!==u&&--l)}i.unit=r,i.start=s,i.end=o[1]?s+(o[1]+1)*n:n}return i}]};function Kn(){return setTimeout(function(){Xn=t}),Xn=b.now()}function Zn(e,t){b.each(t,function(t,n){var r=(Qn[t]||[]).concat(Qn["*"]),i=0,o=r.length;for(;o>i;i++)if(r[i].call(e,t,n))return})}function er(e,t,n){var r,i,o=0,a=Gn.length,s=b.Deferred().always(function(){delete u.elem}),u=function(){if(i)return!1;var t=Xn||Kn(),n=Math.max(0,l.startTime+l.duration-t),r=n/l.duration||0,o=1-r,a=0,u=l.tweens.length;for(;u>a;a++)l.tweens[a].run(o);return s.notifyWith(e,[l,o,n]),1>o&&u?n:(s.resolveWith(e,[l]),!1)},l=s.promise({elem:e,props:b.extend({},t),opts:b.extend(!0,{specialEasing:{}},n),originalProperties:t,originalOptions:n,startTime:Xn||Kn(),duration:n.duration,tweens:[],createTween:function(t,n){var r=b.Tween(e,l.opts,t,n,l.opts.specialEasing[t]||l.opts.easing);return l.tweens.push(r),r},stop:function(t){var n=0,r=t?l.tweens.length:0;if(i)return this;for(i=!0;r>n;n++)l.tweens[n].run(1);return t?s.resolveWith(e,[l,t]):s.rejectWith(e,[l,t]),this}}),c=l.props;for(tr(c,l.opts.specialEasing);a>o;o++)if(r=Gn[o].call(l,e,c,l.opts))return r;return Zn(l,c),b.isFunction(l.opts.start)&&l.opts.start.call(e,l),b.fx.timer(b.extend(u,{elem:e,anim:l,queue:l.opts.queue})),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always)}function tr(e,t){var n,r,i,o,a;for(i in e)if(r=b.camelCase(i),o=t[r],n=e[i],b.isArray(n)&&(o=n[1],n=e[i]=n[0]),i!==r&&(e[r]=n,delete e[i]),a=b.cssHooks[r],a&&"expand"in a){n=a.expand(n),delete e[r];for(i in n)i in e||(e[i]=n[i],t[i]=o)}else t[r]=o}b.Animation=b.extend(er,{tweener:function(e,t){b.isFunction(e)?(t=e,e=["*"]):e=e.split(" ");var n,r=0,i=e.length;for(;i>r;r++)n=e[r],Qn[n]=Qn[n]||[],Qn[n].unshift(t)},prefilter:function(e,t){t?Gn.unshift(e):Gn.push(e)}});function nr(e,t,n){var r,i,o,a,s,u,l,c,p,f=this,d=e.style,h={},g=[],m=e.nodeType&&nn(e);n.queue||(c=b._queueHooks(e,"fx"),null==c.unqueued&&(c.unqueued=0,p=c.empty.fire,c.empty.fire=function(){c.unqueued||p()}),c.unqueued++,f.always(function(){f.always(function(){c.unqueued--,b.queue(e,"fx").length||c.empty.fire()})})),1===e.nodeType&&("height"in t||"width"in t)&&(n.overflow=[d.overflow,d.overflowX,d.overflowY],"inline"===b.css(e,"display")&&"none"===b.css(e,"float")&&(b.support.inlineBlockNeedsLayout&&"inline"!==un(e.nodeName)?d.zoom=1:d.display="inline-block")),n.overflow&&(d.overflow="hidden",b.support.shrinkWrapBlocks||f.always(function(){d.overflow=n.overflow[0],d.overflowX=n.overflow[1],d.overflowY=n.overflow[2]}));for(i in t)if(a=t[i],Vn.exec(a)){if(delete t[i],u=u||"toggle"===a,a===(m?"hide":"show"))continue;g.push(i)}if(o=g.length){s=b._data(e,"fxshow")||b._data(e,"fxshow",{}),"hidden"in s&&(m=s.hidden),u&&(s.hidden=!m),m?b(e).show():f.done(function(){b(e).hide()}),f.done(function(){var t;b._removeData(e,"fxshow");for(t in h)b.style(e,t,h[t])});for(i=0;o>i;i++)r=g[i],l=f.createTween(r,m?s[r]:0),h[r]=s[r]||b.style(e,r),r in s||(s[r]=l.start,m&&(l.end=l.start,l.start="width"===r||"height"===r?1:0))}}function rr(e,t,n,r,i){return new rr.prototype.init(e,t,n,r,i)}b.Tween=rr,rr.prototype={constructor:rr,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||"swing",this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(b.cssNumber[n]?"":"px")},cur:function(){var e=rr.propHooks[this.prop];return e&&e.get?e.get(this):rr.propHooks._default.get(this)},run:function(e){var t,n=rr.propHooks[this.prop];return this.pos=t=this.options.duration?b.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):rr.propHooks._default.set(this),this}},rr.prototype.init.prototype=rr.prototype,rr.propHooks={_default:{get:function(e){var t;return null==e.elem[e.prop]||e.elem.style&&null!=e.elem.style[e.prop]?(t=b.css(e.elem,e.prop,""),t&&"auto"!==t?t:0):e.elem[e.prop]},set:function(e){b.fx.step[e.prop]?b.fx.step[e.prop](e):e.elem.style&&(null!=e.elem.style[b.cssProps[e.prop]]||b.cssHooks[e.prop])?b.style(e.elem,e.prop,e.now+e.unit):e.elem[e.prop]=e.now}}},rr.propHooks.scrollTop=rr.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},b.each(["toggle","show","hide"],function(e,t){var n=b.fn[t];b.fn[t]=function(e,r,i){return null==e||"boolean"==typeof e?n.apply(this,arguments):this.animate(ir(t,!0),e,r,i)}}),b.fn.extend({fadeTo:function(e,t,n,r){return this.filter(nn).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=b.isEmptyObject(e),o=b.speed(t,n,r),a=function(){var t=er(this,b.extend({},e),o);a.finish=function(){t.stop(!0)},(i||b._data(this,"finish"))&&t.stop(!0)};return a.finish=a,i||o.queue===!1?this.each(a):this.queue(o.queue,a)},stop:function(e,n,r){var i=function(e){var t=e.stop;delete e.stop,t(r)};return"string"!=typeof e&&(r=n,n=e,e=t),n&&e!==!1&&this.queue(e||"fx",[]),this.each(function(){var t=!0,n=null!=e&&e+"queueHooks",o=b.timers,a=b._data(this);if(n)a[n]&&a[n].stop&&i(a[n]);else for(n in a)a[n]&&a[n].stop&&Jn.test(n)&&i(a[n]);for(n=o.length;n--;)o[n].elem!==this||null!=e&&o[n].queue!==e||(o[n].anim.stop(r),t=!1,o.splice(n,1));(t||!r)&&b.dequeue(this,e)})},finish:function(e){return e!==!1&&(e=e||"fx"),this.each(function(){var t,n=b._data(this),r=n[e+"queue"],i=n[e+"queueHooks"],o=b.timers,a=r?r.length:0;for(n.finish=!0,b.queue(this,e,[]),i&&i.cur&&i.cur.finish&&i.cur.finish.call(this),t=o.length;t--;)o[t].elem===this&&o[t].queue===e&&(o[t].anim.stop(!0),o.splice(t,1));for(t=0;a>t;t++)r[t]&&r[t].finish&&r[t].finish.call(this);delete n.finish})}});function ir(e,t){var n,r={height:e},i=0;for(t=t?1:0;4>i;i+=2-t)n=Zt[i],r["margin"+n]=r["padding"+n]=e;return t&&(r.opacity=r.width=e),r}b.each({slideDown:ir("show"),slideUp:ir("hide"),slideToggle:ir("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){b.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),b.speed=function(e,t,n){var r=e&&"object"==typeof e?b.extend({},e):{complete:n||!n&&t||b.isFunction(e)&&e,duration:e,easing:n&&t||t&&!b.isFunction(t)&&t};return r.duration=b.fx.off?0:"number"==typeof r.duration?r.duration:r.duration in b.fx.speeds?b.fx.speeds[r.duration]:b.fx.speeds._default,(null==r.queue||r.queue===!0)&&(r.queue="fx"),r.old=r.complete,r.complete=function(){b.isFunction(r.old)&&r.old.call(this),r.queue&&b.dequeue(this,r.queue)},r},b.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2}},b.timers=[],b.fx=rr.prototype.init,b.fx.tick=function(){var e,n=b.timers,r=0;for(Xn=b.now();n.length>r;r++)e=n[r],e()||n[r]!==e||n.splice(r--,1);n.length||b.fx.stop(),Xn=t},b.fx.timer=function(e){e()&&b.timers.push(e)&&b.fx.start()},b.fx.interval=13,b.fx.start=function(){Un||(Un=setInterval(b.fx.tick,b.fx.interval))},b.fx.stop=function(){clearInterval(Un),Un=null},b.fx.speeds={slow:600,fast:200,_default:400},b.fx.step={},b.expr&&b.expr.filters&&(b.expr.filters.animated=function(e){return b.grep(b.timers,function(t){return e===t.elem}).length}),b.fn.offset=function(e){if(arguments.length)return e===t?this:this.each(function(t){b.offset.setOffset(this,e,t)});var n,r,o={top:0,left:0},a=this[0],s=a&&a.ownerDocument;if(s)return n=s.documentElement,b.contains(n,a)?(typeof a.getBoundingClientRect!==i&&(o=a.getBoundingClientRect()),r=or(s),{top:o.top+(r.pageYOffset||n.scrollTop)-(n.clientTop||0),left:o.left+(r.pageXOffset||n.scrollLeft)-(n.clientLeft||0)}):o},b.offset={setOffset:function(e,t,n){var r=b.css(e,"position");"static"===r&&(e.style.position="relative");var i=b(e),o=i.offset(),a=b.css(e,"top"),s=b.css(e,"left"),u=("absolute"===r||"fixed"===r)&&b.inArray("auto",[a,s])>-1,l={},c={},p,f;u?(c=i.position(),p=c.top,f=c.left):(p=parseFloat(a)||0,f=parseFloat(s)||0),b.isFunction(t)&&(t=t.call(e,n,o)),null!=t.top&&(l.top=t.top-o.top+p),null!=t.left&&(l.left=t.left-o.left+f),"using"in t?t.using.call(e,l):i.css(l)}},b.fn.extend({position:function(){if(this[0]){var e,t,n={top:0,left:0},r=this[0];return"fixed"===b.css(r,"position")?t=r.getBoundingClientRect():(e=this.offsetParent(),t=this.offset(),b.nodeName(e[0],"html")||(n=e.offset()),n.top+=b.css(e[0],"borderTopWidth",!0),n.left+=b.css(e[0],"borderLeftWidth",!0)),{top:t.top-n.top-b.css(r,"marginTop",!0),left:t.left-n.left-b.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent||o.documentElement;while(e&&!b.nodeName(e,"html")&&"static"===b.css(e,"position"))e=e.offsetParent;return e||o.documentElement})}}),b.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,n){var r=/Y/.test(n);b.fn[e]=function(i){return b.access(this,function(e,i,o){var a=or(e);return o===t?a?n in a?a[n]:a.document.documentElement[i]:e[i]:(a?a.scrollTo(r?b(a).scrollLeft():o,r?o:b(a).scrollTop()):e[i]=o,t)},e,i,arguments.length,null)}});function or(e){return b.isWindow(e)?e:9===e.nodeType?e.defaultView||e.parentWindow:!1}b.each({Height:"height",Width:"width"},function(e,n){b.each({padding:"inner"+e,content:n,"":"outer"+e},function(r,i){b.fn[i]=function(i,o){var a=arguments.length&&(r||"boolean"!=typeof i),s=r||(i===!0||o===!0?"margin":"border");return b.access(this,function(n,r,i){var o;return b.isWindow(n)?n.document.documentElement["client"+e]:9===n.nodeType?(o=n.documentElement,Math.max(n.body["scroll"+e],o["scroll"+e],n.body["offset"+e],o["offset"+e],o["client"+e])):i===t?b.css(n,r,s):b.style(n,r,i,s)},n,a?i:t,a,null)}})}),e.jQuery=e.$=b,"function"==typeof define&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return b})})(window);
	  
if (!window['jQuery']) alert('The jQuery library must be included before the smoothscroll.js file.  The plugin will not work propery.');


;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);


;(function(b){function g(a,e,d){var h=e.hash.slice(1),f=document.getElementById(h)||document.getElementsByName(h)[0];if(f){a&&a.preventDefault();var c=b(d.target);if(!(d.lock&&c.is(":animated")||d.onBefore&&!1===d.onBefore(a,f,c))){d.stop&&c._scrollable().stop(!0);if(d.hash){var a=f.id==h?"id":"name",g=b("<a> </a>").attr(a,h).css({position:"absolute",top:b(window).scrollTop(),left:b(window).scrollLeft()});f[a]="";b("body").prepend(g);location=e.hash;g.remove();f[a]=h}c.scrollTo(f,d).trigger("notify.serialScroll",
[f])}}}var i=location.href.replace(/#.*/,""),c=b.localScroll=function(a){b("body").localScroll(a)};c.defaults={duration:1E3,axis:"y",event:"click",stop:!0,target:window,reset:!0};c.hash=function(a){if(location.hash){a=b.extend({},c.defaults,a);a.hash=!1;if(a.reset){var e=a.duration;delete a.duration;b(a.target).scrollTo(0,a);a.duration=e}g(0,location,a)}};b.fn.localScroll=function(a){function e(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,"")==i&&(!a.filter||b(this).is(a.filter))}
a=b.extend({},c.defaults,a);return a.lazy?this.bind(a.event,function(d){var c=b([d.target,d.target.parentNode]).filter(e)[0];c&&g(d,c,a)}):this.find("a,area").filter(e).bind(a.event,function(b){g(b,this,a)}).end().end()}})(jQuery);

// Initialize all .smoothScroll links
jQuery(function($){ $.localScroll({filter:'.smoothScroll'}); });

window.Chart = function(context){

var chart = this;


//Easing functions adapted from Robert Penner's easing equations
//http://www.robertpenner.com/easing/

var animationOptions = {
	linear : function (t){
		return t;
	},
	easeInQuad: function (t) {
		return t*t;
	},
	easeOutQuad: function (t) {
		return -1 *t*(t-2);
	},
	easeInOutQuad: function (t) {
		if ((t/=1/2) < 1) return 1/2*t*t;
		return -1/2 * ((--t)*(t-2) - 1);
	},
	easeInCubic: function (t) {
		return t*t*t;
	},
	easeOutCubic: function (t) {
		return 1*((t=t/1-1)*t*t + 1);
	},
	easeInOutCubic: function (t) {
		if ((t/=1/2) < 1) return 1/2*t*t*t;
		return 1/2*((t-=2)*t*t + 2);
	},
	easeInQuart: function (t) {
		return t*t*t*t;
	},
	easeOutQuart: function (t) {
		return -1 * ((t=t/1-1)*t*t*t - 1);
	},
	easeInOutQuart: function (t) {
		if ((t/=1/2) < 1) return 1/2*t*t*t*t;
		return -1/2 * ((t-=2)*t*t*t - 2);
	},
	easeInQuint: function (t) {
		return 1*(t/=1)*t*t*t*t;
	},
	easeOutQuint: function (t) {
		return 1*((t=t/1-1)*t*t*t*t + 1);
	},
	easeInOutQuint: function (t) {
		if ((t/=1/2) < 1) return 1/2*t*t*t*t*t;
		return 1/2*((t-=2)*t*t*t*t + 2);
	},
	easeInSine: function (t) {
		return -1 * Math.cos(t/1 * (Math.PI/2)) + 1;
	},
	easeOutSine: function (t) {
		return 1 * Math.sin(t/1 * (Math.PI/2));
	},
	easeInOutSine: function (t) {
		return -1/2 * (Math.cos(Math.PI*t/1) - 1);
	},
	easeInExpo: function (t) {
		return (t==0) ? 1 : 1 * Math.pow(2, 10 * (t/1 - 1));
	},
	easeOutExpo: function (t) {
		return (t==1) ? 1 : 1 * (-Math.pow(2, -10 * t/1) + 1);
	},
	easeInOutExpo: function (t) {
		if (t==0) return 0;
		if (t==1) return 1;
		if ((t/=1/2) < 1) return 1/2 * Math.pow(2, 10 * (t - 1));
		return 1/2 * (-Math.pow(2, -10 * --t) + 2);
		},
	easeInCirc: function (t) {
		if (t>=1) return t;
		return -1 * (Math.sqrt(1 - (t/=1)*t) - 1);
	},
	easeOutCirc: function (t) {
		return 1 * Math.sqrt(1 - (t=t/1-1)*t);
	},
	easeInOutCirc: function (t) {
		if ((t/=1/2) < 1) return -1/2 * (Math.sqrt(1 - t*t) - 1);
		return 1/2 * (Math.sqrt(1 - (t-=2)*t) + 1);
	},
	easeInElastic: function (t) {
		var s=1.70158;var p=0;var a=1;
		if (t==0) return 0;  if ((t/=1)==1) return 1;  if (!p) p=1*.3;
		if (a < Math.abs(1)) { a=1; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (1/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*1-s)*(2*Math.PI)/p ));
	},
	easeOutElastic: function (t) {
		var s=1.70158;var p=0;var a=1;
		if (t==0) return 0;  if ((t/=1)==1) return 1;  if (!p) p=1*.3;
		if (a < Math.abs(1)) { a=1; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (1/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*1-s)*(2*Math.PI)/p ) + 1;
	},
	easeInOutElastic: function (t) {
		var s=1.70158;var p=0;var a=1;
		if (a < Math.abs(1)) { a=1; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (1/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*1-s)*(2*Math.PI)/p ));
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*1-s)*(2*Math.PI)/p )*.5 + 1;
	},
	easeInBack: function (t) {
		var s = 1.70158;
		return 1*(t/=1)*t*((s+1)*t - s);
	},
	easeOutBack: function (t) {
		var s = 1.70158;
		return 1*((t=t/1-1)*t*((s+1)*t + s) + 1);
	},
	easeInOutBack: function (t) {
		var s = 1.70158; 
		if ((t/=1/2) < 1) return 1/2*(t*t*(((s*=(1.525))+1)*t - s));
		return 1/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2);
	},
	if (t==0) return 0;  if ((t/=1/2)==2) return 1;  if (!p) p=1*(.3*1.5);
	easeInBounce: function (t) {
		return 1 - animationOptions.easeOutBounce (1-t);
	},
	easeOutBounce: function (t) {
		if ((t/=1) < (1/2.75)) {
			return 1*(7.5625*t*t);
		} else if (t < (2/2.75)) {
			return 1*(7.5625*(t-=(1.5/2.75))*t + .75);
		} else if (t < (2.5/2.75)) {
			return 1*(7.5625*(t-=(2.25/2.75))*t + .9375);
		} else {
			return 1*(7.5625*(t-=(2.625/2.75))*t + .984375);
		}
	},
	easeInOutBounce: function (t) {
		if (t < 1/2) return animationOptions.easeInBounce (t*2) * .5;
		return animationOptions.easeOutBounce (t*2-1) * .5 + 1*.5;
	}
};

//Variables global to the chart
var width = context.canvas.width;
var height = context.canvas.height;


//High pixel density displays - multiply the size of the canvas height/width by the device pixel ratio, then scale.
if (window.devicePixelRatio) {
	context.canvas.style.width = width + "px";
	context.canvas.style.height = height + "px";
	context.canvas.height = height * window.devicePixelRatio;
	context.canvas.width = width * window.devicePixelRatio;
	context.scale(window.devicePixelRatio, window.devicePixelRatio);
}

this.PolarArea = function(data,options){

	chart.PolarArea.defaults = {
		scaleOverlay : true,
		scaleOverride : false,
		scaleSteps : null,
		scaleStepWidth : null,
		scaleStartValue : null,
		scaleShowLine : true,
		scaleLineColor : "rgba(0,0,0,.1)",
		scaleLineWidth : 1,
		scaleShowLabels : true,
		scaleLabel : "<%=value%>",
		scaleFontFamily : "'Arial'",
		scaleFontSize : 12,
		scaleFontStyle : "normal",
		scaleFontColor : "#666",
		scaleShowLabelBackdrop : true,
		scaleBackdropColor : "rgba(255,255,255,0.75)",
		scaleBackdropPaddingY : 2,
		scaleBackdropPaddingX : 2,
		segmentShowStroke : true,
		segmentStrokeColor : "#fff",
		segmentStrokeWidth : 2,
		animation : true,
		animationSteps : 100,
		animationEasing : "easeOutBounce",
		animateRotate : true,
		animateScale : false,
		onAnimationComplete : null
	};
	
	var config = (options)? mergeChartConfig(chart.PolarArea.defaults,options) : chart.PolarArea.defaults;
	
	return new PolarArea(data,config,context);
};

this.Radar = function(data,options){

	chart.Radar.defaults = {
		scaleOverlay : false,
		scaleOverride : false,
		scaleSteps : null,
		scaleStepWidth : null,
		scaleStartValue : null,
		scaleShowLine : true,
		scaleLineColor : "rgba(0,0,0,.1)",
		scaleLineWidth : 1,
		scaleShowLabels : false,
		scaleLabel : "<%=value%>",
		scaleFontFamily : "'Arial'",
		scaleFontSize : 12,
		scaleFontStyle : "normal",
		scaleFontColor : "#666",
		scaleShowLabelBackdrop : true,
		scaleBackdropColor : "rgba(255,255,255,0.75)",
		scaleBackdropPaddingY : 2,
		scaleBackdropPaddingX : 2,
		angleShowLineOut : true,
		angleLineColor : "rgba(0,0,0,.1)",
		angleLineWidth : 1,			
		pointLabelFontFamily : "'Arial'",
		pointLabelFontStyle : "normal",
		pointLabelFontSize : 12,
		pointLabelFontColor : "#666",
		pointDot : true,
		pointDotRadius : 3,
		pointDotStrokeWidth : 1,
		datasetStroke : true,
		datasetStrokeWidth : 2,
		datasetFill : true,
		animation : true,
		animationSteps : 60,
		animationEasing : "easeOutQuart",
		onAnimationComplete : null
	};
	
	var config = (options)? mergeChartConfig(chart.Radar.defaults,options) : chart.Radar.defaults;

	return new Radar(data,config,context);
};

this.Pie = function(data,options){
	chart.Pie.defaults = {
		segmentShowStroke : true,
		segmentStrokeColor : "#fff",
		segmentStrokeWidth : 2,
		animation : true,
		animationSteps : 100,
		animationEasing : "easeOutBounce",
		animateRotate : true,
		animateScale : false,
		onAnimationComplete : null
	};		

	var config = (options)? mergeChartConfig(chart.Pie.defaults,options) : chart.Pie.defaults;
	
	return new Pie(data,config,context);				
};

this.Doughnut = function(data,options){

	chart.Doughnut.defaults = {
		segmentShowStroke : true,
		segmentStrokeColor : "#2c3e50",
		segmentStrokeWidth : 1,
		percentageInnerCutout : 90,
		animation : true,
		animationSteps : 100,
		animationEasing : "easeOutBounce",
		animateRotate : true,
		animateScale : false,
		onAnimationComplete : null
	};		

	var config = (options)? mergeChartConfig(chart.Doughnut.defaults,options) : chart.Doughnut.defaults;
	
	return new Doughnut(data,config,context);			
	
};

this.Line = function(data,options){

	chart.Line.defaults = {
		scaleOverlay : false,
		scaleOverride : false,
		scaleSteps : null,
		scaleStepWidth : null,
		scaleStartValue : null,
		scaleLineColor : "rgba(0,0,0,.1)",
		scaleLineWidth : 1,
		scaleShowLabels : true,
		scaleLabel : "<%=value%>",
		scaleFontFamily : "'Arial'",
		scaleFontSize : 12,
		scaleFontStyle : "normal",
		scaleFontColor : "#666",
		scaleShowGridLines : true,
		scaleGridLineColor : "rgba(0,0,0,.05)",
		scaleGridLineWidth : 1,
		bezierCurve : true,
		pointDot : true,
		pointDotRadius : 4,
		pointDotStrokeWidth : 2,
		datasetStroke : true,
		datasetStrokeWidth : 2,
		datasetFill : true,
		animation : true,
		animationSteps : 60,
		animationEasing : "easeOutQuart",
		onAnimationComplete : null
	};		
	var config = (options) ? mergeChartConfig(chart.Line.defaults,options) : chart.Line.defaults;
	
	return new Line(data,config,context);
}

this.Bar = function(data,options){
	chart.Bar.defaults = {
		scaleOverlay : false,
		scaleOverride : false,
		scaleSteps : null,
		scaleStepWidth : null,
		scaleStartValue : null,
		scaleLineColor : "rgba(0,0,0,.1)",
		scaleLineWidth : 1,
		scaleShowLabels : true,
		scaleLabel : "<%=value%>",
		scaleFontFamily : "'Arial'",
		scaleFontSize : 12,
		scaleFontStyle : "normal",
		scaleFontColor : "#666",
		scaleShowGridLines : true,
		scaleGridLineColor : "rgba(0,0,0,.05)",
		scaleGridLineWidth : 1,
		barShowStroke : true,
		barStrokeWidth : 2,
		barValueSpacing : 5,
		barDatasetSpacing : 1,
		animation : true,
		animationSteps : 60,
		animationEasing : "easeOutQuart",
		onAnimationComplete : null
	};		
	var config = (options) ? mergeChartConfig(chart.Bar.defaults,options) : chart.Bar.defaults;
	
	return new Bar(data,config,context);		
}

var clear = function(c){
	c.clearRect(0, 0, width, height);
};

var PolarArea = function(data,config,ctx){
	var maxSize, scaleHop, calculatedScale, labelHeight, scaleHeight, valueBounds, labelTemplateString;		
	
	
	calculateDrawingSizes();
	
	valueBounds = getValueBounds();

	labelTemplateString = (config.scaleShowLabels)? config.scaleLabel : null;

	//Check and set the scale
	if (!config.scaleOverride){
		
		calculatedScale = calculateScale(scaleHeight,valueBounds.maxSteps,valueBounds.minSteps,valueBounds.maxValue,valueBounds.minValue,labelTemplateString);
	}
	else {
		calculatedScale = {
			steps : config.scaleSteps,
			stepValue : config.scaleStepWidth,
			graphMin : config.scaleStartValue,
			labels : []
		}
		populateLabels(labelTemplateString, calculatedScale.labels,calculatedScale.steps,config.scaleStartValue,config.scaleStepWidth);
	}
	
	scaleHop = maxSize/(calculatedScale.steps);

	//Wrap in an animation loop wrapper
	animationLoop(config,drawScale,drawAllSegments,ctx);

	function calculateDrawingSizes(){
		maxSize = (Min([width,height])/2);
		//Remove whatever is larger - the font size or line width.
		
		maxSize -= Max([config.scaleFontSize*0.5,config.scaleLineWidth*0.5]);
		
		labelHeight = config.scaleFontSize*2;
		//If we're drawing the backdrop - add the Y padding to the label height and remove from drawing region.
		if (config.scaleShowLabelBackdrop){
			labelHeight += (2 * config.scaleBackdropPaddingY);
			maxSize -= config.scaleBackdropPaddingY*1.5;
		}
		
		scaleHeight = maxSize;
		//If the label height is less than 5, set it to 5 so we don't have lines on top of each other.
		labelHeight = Default(labelHeight,5);
	}
	function drawScale(){
		for (var i=0; i<calculatedScale.steps; i++){
			//If the line object is there
			if (config.scaleShowLine){
				ctx.beginPath();
				ctx.arc(width/2, height/2, scaleHop * (i + 1), 0, (Math.PI * 2), true);
				ctx.strokeStyle = config.scaleLineColor;
				ctx.lineWidth = config.scaleLineWidth;
				ctx.stroke();
			}

			if (config.scaleShowLabels){
				ctx.textAlign = "center";
				ctx.font = config.scaleFontStyle + " " + config.scaleFontSize + "px " + config.scaleFontFamily;
				 var label =  calculatedScale.labels[i];
				//If the backdrop object is within the font object
				if (config.scaleShowLabelBackdrop){
					var textWidth = ctx.measureText(label).width;
					ctx.fillStyle = config.scaleBackdropColor;
					ctx.beginPath();
					ctx.rect(
						Math.round(width/2 - textWidth/2 - config.scaleBackdropPaddingX),     //X
						Math.round(height/2 - (scaleHop * (i + 1)) - config.scaleFontSize*0.5 - config.scaleBackdropPaddingY),//Y
						Math.round(textWidth + (config.scaleBackdropPaddingX*2)), //Width
						Math.round(config.scaleFontSize + (config.scaleBackdropPaddingY*2)) //Height
					);
					ctx.fill();
				}
				ctx.textBaseline = "middle";
				ctx.fillStyle = config.scaleFontColor;
				ctx.fillText(label,width/2,height/2 - (scaleHop * (i + 1)));
			}
		}
	}
	function drawAllSegments(animationDecimal){
		var startAngle = -Math.PI/2,
		angleStep = (Math.PI*2)/data.length,
		scaleAnimation = 1,
		rotateAnimation = 1;
		if (config.animation) {
			if (config.animateScale) {
				scaleAnimation = animationDecimal;
			}
			if (config.animateRotate){
				rotateAnimation = animationDecimal;
			}
		}

		for (var i=0; i<data.length; i++){

			ctx.beginPath();
			ctx.arc(width/2,height/2,scaleAnimation * calculateOffset(data[i].value,calculatedScale,scaleHop),startAngle, startAngle + rotateAnimation*angleStep, false);
			ctx.lineTo(width/2,height/2);
			ctx.closePath();
			ctx.fillStyle = data[i].color;
			ctx.fill();

			if(config.segmentShowStroke){
				ctx.strokeStyle = config.segmentStrokeColor;
				ctx.lineWidth = config.segmentStrokeWidth;
				ctx.stroke();
			}
			startAngle += rotateAnimation*angleStep;
		}
	}
	function getValueBounds() {
		var upperValue = Number.MIN_VALUE;
		var lowerValue = Number.MAX_VALUE;
		for (var i=0; i<data.length; i++){
			if (data[i].value > upperValue) {upperValue = data[i].value;}
			if (data[i].value < lowerValue) {lowerValue = data[i].value;}
		};

		var maxSteps = Math.floor((scaleHeight / (labelHeight*0.66)));
		var minSteps = Math.floor((scaleHeight / labelHeight*0.5));
		
		return {
			maxValue : upperValue,
			minValue : lowerValue,
			maxSteps : maxSteps,
			minSteps : minSteps
		};
		

	}
}

var Radar = function (data,config,ctx) {
	var maxSize, scaleHop, calculatedScale, labelHeight, scaleHeight, valueBounds, labelTemplateString;	
		
	//If no labels are defined set to an empty array, so referencing length for looping doesn't blow up.
	if (!data.labels) data.labels = [];
	
	calculateDrawingSizes();

	var valueBounds = getValueBounds();

	labelTemplateString = (config.scaleShowLabels)? config.scaleLabel : null;

	//Check and set the scale
	if (!config.scaleOverride){
		
		calculatedScale = calculateScale(scaleHeight,valueBounds.maxSteps,valueBounds.minSteps,valueBounds.maxValue,valueBounds.minValue,labelTemplateString);
	}
	else {
		calculatedScale = {
			steps : config.scaleSteps,
			stepValue : config.scaleStepWidth,
			graphMin : config.scaleStartValue,
			labels : []
		}
		populateLabels(labelTemplateString, calculatedScale.labels,calculatedScale.steps,config.scaleStartValue,config.scaleStepWidth);
	}
	
	scaleHop = maxSize/(calculatedScale.steps);
	
	animationLoop(config,drawScale,drawAllDataPoints,ctx);
	
	//Radar specific functions.
	function drawAllDataPoints(animationDecimal){
		var rotationDegree = (2*Math.PI)/data.datasets[0].data.length;

		ctx.save();
		//translate to the centre of the canvas.
		ctx.translate(width/2,height/2);
		
		//We accept multiple data sets for radar charts, so show loop through each set
		for (var i=0; i<data.datasets.length; i++){
			ctx.beginPath();

			ctx.moveTo(0,animationDecimal*(-1*calculateOffset(data.datasets[i].data[0],calculatedScale,scaleHop)));
			for (var j=1; j<data.datasets[i].data.length; j++){
				ctx.rotate(rotationDegree);	
				ctx.lineTo(0,animationDecimal*(-1*calculateOffset(data.datasets[i].data[j],calculatedScale,scaleHop)));
		
			}
			ctx.closePath();
			
			
			ctx.fillStyle = data.datasets[i].fillColor;
			ctx.strokeStyle = data.datasets[i].strokeColor;
			ctx.lineWidth = config.datasetStrokeWidth;
			ctx.fill();
			ctx.stroke();
			
							
			if (config.pointDot){
				ctx.fillStyle = data.datasets[i].pointColor;
				ctx.strokeStyle = data.datasets[i].pointStrokeColor;
				ctx.lineWidth = config.pointDotStrokeWidth;
				for (var k=0; k<data.datasets[i].data.length; k++){
					ctx.rotate(rotationDegree);
					ctx.beginPath();
					ctx.arc(0,animationDecimal*(-1*calculateOffset(data.datasets[i].data[k],calculatedScale,scaleHop)),config.pointDotRadius,2*Math.PI,false);
					ctx.fill();
					ctx.stroke();
				}					
				
			}
			ctx.rotate(rotationDegree);
			
		}
		ctx.restore();
		
		
	}
	function drawScale(){
		var rotationDegree = (2*Math.PI)/data.datasets[0].data.length;
		ctx.save();
		ctx.translate(width / 2, height / 2);	
		
		if (config.angleShowLineOut){
			ctx.strokeStyle = config.angleLineColor;		    	    
			ctx.lineWidth = config.angleLineWidth;
			for (var h=0; h<data.datasets[0].data.length; h++){
				
				ctx.rotate(rotationDegree);
				ctx.beginPath();
				ctx.moveTo(0,0);
				ctx.lineTo(0,-maxSize);
				ctx.stroke();
			}
		}

		for (var i=0; i<calculatedScale.steps; i++){
			ctx.beginPath();
			
			if(config.scaleShowLine){
				ctx.strokeStyle = config.scaleLineColor;
				ctx.lineWidth = config.scaleLineWidth;
				ctx.moveTo(0,-scaleHop * (i+1));					
				for (var j=0; j<data.datasets[0].data.length; j++){
					ctx.rotate(rotationDegree);
					ctx.lineTo(0,-scaleHop * (i+1));
				}
				ctx.closePath();
				ctx.stroke();			
						
			}
			
			if (config.scaleShowLabels){				
				ctx.textAlign = 'center';
				ctx.font = config.scaleFontStyle + " " + config.scaleFontSize+"px " + config.scaleFontFamily; 
				ctx.textBaseline = "middle";
				
				if (config.scaleShowLabelBackdrop){
					var textWidth = ctx.measureText(calculatedScale.labels[i]).width;
					ctx.fillStyle = config.scaleBackdropColor;
					ctx.beginPath();
					ctx.rect(
						Math.round(- textWidth/2 - config.scaleBackdropPaddingX),     //X
						Math.round((-scaleHop * (i + 1)) - config.scaleFontSize*0.5 - config.scaleBackdropPaddingY),//Y
						Math.round(textWidth + (config.scaleBackdropPaddingX*2)), //Width
						Math.round(config.scaleFontSize + (config.scaleBackdropPaddingY*2)) //Height
					);
					ctx.fill();
				}						
				ctx.fillStyle = config.scaleFontColor;
				ctx.fillText(calculatedScale.labels[i],0,-scaleHop*(i+1));
			}

		}
		for (var k=0; k<data.labels.length; k++){				
		ctx.font = config.pointLabelFontStyle + " " + config.pointLabelFontSize+"px " + config.pointLabelFontFamily;
		ctx.fillStyle = config.pointLabelFontColor;
			var opposite = Math.sin(rotationDegree*k) * (maxSize + config.pointLabelFontSize);
			var adjacent = Math.cos(rotationDegree*k) * (maxSize + config.pointLabelFontSize);
			
			if(rotationDegree*k == Math.PI || rotationDegree*k == 0){
				ctx.textAlign = "center";
			}
			else if(rotationDegree*k > Math.PI){
				ctx.textAlign = "right";
			}
			else{
				ctx.textAlign = "left";
			}
			
			ctx.textBaseline = "middle";
			
			ctx.fillText(data.labels[k],opposite,-adjacent);
			
		}
		ctx.restore();
	};
	function calculateDrawingSizes(){
		maxSize = (Min([width,height])/2);

		labelHeight = config.scaleFontSize*2;
		
		var labelLength = 0;
		for (var i=0; i<data.labels.length; i++){
			ctx.font = config.pointLabelFontStyle + " " + config.pointLabelFontSize+"px " + config.pointLabelFontFamily;
			var textMeasurement = ctx.measureText(data.labels[i]).width;
			if(textMeasurement>labelLength) labelLength = textMeasurement;
		}
		
		//Figure out whats the largest - the height of the text or the width of what's there, and minus it from the maximum usable size.
		maxSize -= Max([labelLength,((config.pointLabelFontSize/2)*1.5)]);				
		
		maxSize -= config.pointLabelFontSize;
		maxSize = CapValue(maxSize, null, 0);
		scaleHeight = maxSize;
		//If the label height is less than 5, set it to 5 so we don't have lines on top of each other.
		labelHeight = Default(labelHeight,5);
	};
	function getValueBounds() {
		var upperValue = Number.MIN_VALUE;
		var lowerValue = Number.MAX_VALUE;
		
		for (var i=0; i<data.datasets.length; i++){
			for (var j=0; j<data.datasets[i].data.length; j++){
				if (data.datasets[i].data[j] > upperValue){upperValue = data.datasets[i].data[j]}
				if (data.datasets[i].data[j] < lowerValue){lowerValue = data.datasets[i].data[j]}
			}
		}

		var maxSteps = Math.floor((scaleHeight / (labelHeight*0.66)));
		var minSteps = Math.floor((scaleHeight / labelHeight*0.5));
		
		return {
			maxValue : upperValue,
			minValue : lowerValue,
			maxSteps : maxSteps,
			minSteps : minSteps
		};
		

	}
}

var Pie = function(data,config,ctx){
	var segmentTotal = 0;
	
	//In case we have a canvas that is not a square. Minus 5 pixels as padding round the edge.
	var pieRadius = Min([height/2,width/2]) - 5;
	
	for (var i=0; i<data.length; i++){
		segmentTotal += data[i].value;
	}
	
	
	animationLoop(config,null,drawPieSegments,ctx);
			
	function drawPieSegments (animationDecimal){
		var cumulativeAngle = -Math.PI/2,
		scaleAnimation = 1,
		rotateAnimation = 1;
		if (config.animation) {
			if (config.animateScale) {
				scaleAnimation = animationDecimal;
			}
			if (config.animateRotate){
				rotateAnimation = animationDecimal;
			}
		}
		for (var i=0; i<data.length; i++){
			var segmentAngle = rotateAnimation * ((data[i].value/segmentTotal) * (Math.PI*2));
			ctx.beginPath();
			ctx.arc(width/2,height/2,scaleAnimation * pieRadius,cumulativeAngle,cumulativeAngle + segmentAngle);
			ctx.lineTo(width/2,height/2);
			ctx.closePath();
			ctx.fillStyle = data[i].color;
			ctx.fill();
			
			if(config.segmentShowStroke){
				ctx.lineWidth = config.segmentStrokeWidth;
				ctx.strokeStyle = config.segmentStrokeColor;
				ctx.stroke();
			}
			cumulativeAngle += segmentAngle;
		}			
	}		
}

var Doughnut = function(data,config,ctx){
	var segmentTotal = 0;
	
	//In case we have a canvas that is not a square. Minus 5 pixels as padding round the edge.
	var doughnutRadius = Min([height/2,width/2]) - 5;
	
	var cutoutRadius = doughnutRadius * (config.percentageInnerCutout/100);
	
	for (var i=0; i<data.length; i++){
		segmentTotal += data[i].value;
	}
	
	
	animationLoop(config,null,drawPieSegments,ctx);
	
	
	function drawPieSegments (animationDecimal){
		var cumulativeAngle = -Math.PI/2,
		scaleAnimation = 1,
		rotateAnimation = 1;
		if (config.animation) {
			if (config.animateScale) {
				scaleAnimation = animationDecimal;
			}
			if (config.animateRotate){
				rotateAnimation = animationDecimal;
			}
		}
		for (var i=0; i<data.length; i++){
			var segmentAngle = rotateAnimation * ((data[i].value/segmentTotal) * (Math.PI*2));
			ctx.beginPath();
			ctx.arc(width/2,height/2,scaleAnimation * doughnutRadius,cumulativeAngle,cumulativeAngle + segmentAngle,false);
			ctx.arc(width/2,height/2,scaleAnimation * cutoutRadius,cumulativeAngle + segmentAngle,cumulativeAngle,true);
			ctx.closePath();
			ctx.fillStyle = data[i].color;
			ctx.fill();
			
			if(config.segmentShowStroke){
				ctx.lineWidth = config.segmentStrokeWidth;
				ctx.strokeStyle = config.segmentStrokeColor;
				ctx.stroke();
			}
			cumulativeAngle += segmentAngle;
		}			
	}			
	
	
	
}

var Line = function(data,config,ctx){
	var maxSize, scaleHop, calculatedScale, labelHeight, scaleHeight, valueBounds, labelTemplateString, valueHop,widestXLabel, xAxisLength,yAxisPosX,xAxisPosY, rotateLabels = 0;
		
	calculateDrawingSizes();
	
	valueBounds = getValueBounds();
	//Check and set the scale
	labelTemplateString = (config.scaleShowLabels)? config.scaleLabel : "";
	if (!config.scaleOverride){
		
		calculatedScale = calculateScale(scaleHeight,valueBounds.maxSteps,valueBounds.minSteps,valueBounds.maxValue,valueBounds.minValue,labelTemplateString);
	}
	else {
		calculatedScale = {
			steps : config.scaleSteps,
			stepValue : config.scaleStepWidth,
			graphMin : config.scaleStartValue,
			labels : []
		}
		populateLabels(labelTemplateString, calculatedScale.labels,calculatedScale.steps,config.scaleStartValue,config.scaleStepWidth);
	}
	
	scaleHop = Math.floor(scaleHeight/calculatedScale.steps);
	calculateXAxisSize();
	animationLoop(config,drawScale,drawLines,ctx);		
	
	function drawLines(animPc){
		for (var i=0; i<data.datasets.length; i++){
			ctx.strokeStyle = data.datasets[i].strokeColor;
			ctx.lineWidth = config.datasetStrokeWidth;
			ctx.beginPath();
			ctx.moveTo(yAxisPosX, xAxisPosY - animPc*(calculateOffset(data.datasets[i].data[0],calculatedScale,scaleHop)))

			for (var j=1; j<data.datasets[i].data.length; j++){
				if (config.bezierCurve){
					ctx.bezierCurveTo(xPos(j-0.5),yPos(i,j-1),xPos(j-0.5),yPos(i,j),xPos(j),yPos(i,j));
				}
				else{
					ctx.lineTo(xPos(j),yPos(i,j));
				}
			}
			ctx.stroke();
			if (config.datasetFill){
				ctx.lineTo(yAxisPosX + (valueHop*(data.datasets[i].data.length-1)),xAxisPosY);
				ctx.lineTo(yAxisPosX,xAxisPosY);
				ctx.closePath();
				ctx.fillStyle = data.datasets[i].fillColor;
				ctx.fill();
			}
			else{
				ctx.closePath();
			}
			if(config.pointDot){
				ctx.fillStyle = data.datasets[i].pointColor;
				ctx.strokeStyle = data.datasets[i].pointStrokeColor;
				ctx.lineWidth = config.pointDotStrokeWidth;
				for (var k=0; k<data.datasets[i].data.length; k++){
					ctx.beginPath();
					ctx.arc(yAxisPosX + (valueHop *k),xAxisPosY - animPc*(calculateOffset(data.datasets[i].data[k],calculatedScale,scaleHop)),config.pointDotRadius,0,Math.PI*2,true);
					ctx.fill();
					ctx.stroke();
				}
			}
		}
		
		function yPos(dataSet,iteration){
			return xAxisPosY - animPc*(calculateOffset(data.datasets[dataSet].data[iteration],calculatedScale,scaleHop));			
		}
		function xPos(iteration){
			return yAxisPosX + (valueHop * iteration);
		}
	}
	function drawScale(){
		//X axis line
		ctx.lineWidth = config.scaleLineWidth;
		ctx.strokeStyle = config.scaleLineColor;
		ctx.beginPath();
		ctx.moveTo(width-widestXLabel/2+5,xAxisPosY);
		ctx.lineTo(width-(widestXLabel/2)-xAxisLength-5,xAxisPosY);
		ctx.stroke();
		
		
		if (rotateLabels > 0){
			ctx.save();
			ctx.textAlign = "right";
		}
		else{
			ctx.textAlign = "center";
		}
		ctx.fillStyle = config.scaleFontColor;
		for (var i=0; i<data.labels.length; i++){
			ctx.save();
			if (rotateLabels > 0){
				ctx.translate(yAxisPosX + i*valueHop,xAxisPosY + config.scaleFontSize);
				ctx.rotate(-(rotateLabels * (Math.PI/180)));
				ctx.fillText(data.labels[i], 0,0);
				ctx.restore();
			}
			
			else{
				ctx.fillText(data.labels[i], yAxisPosX + i*valueHop,xAxisPosY + config.scaleFontSize+3);					
			}

			ctx.beginPath();
			ctx.moveTo(yAxisPosX + i * valueHop, xAxisPosY+3);
			
			//Check i isnt 0, so we dont go over the Y axis twice.
			if(config.scaleShowGridLines && i>0){
				ctx.lineWidth = config.scaleGridLineWidth;
				ctx.strokeStyle = config.scaleGridLineColor;					
				ctx.lineTo(yAxisPosX + i * valueHop, 5);
			}
			else{
				ctx.lineTo(yAxisPosX + i * valueHop, xAxisPosY+3);				
			}
			ctx.stroke();
		}
		
		//Y axis
		ctx.lineWidth = config.scaleLineWidth;
		ctx.strokeStyle = config.scaleLineColor;
		ctx.beginPath();
		ctx.moveTo(yAxisPosX,xAxisPosY+5);
		ctx.lineTo(yAxisPosX,5);
		ctx.stroke();
		
		ctx.textAlign = "right";
		ctx.textBaseline = "middle";
		for (var j=0; j<calculatedScale.steps; j++){
			ctx.beginPath();
			ctx.moveTo(yAxisPosX-3,xAxisPosY - ((j+1) * scaleHop));
			if (config.scaleShowGridLines){
				ctx.lineWidth = config.scaleGridLineWidth;
				ctx.strokeStyle = config.scaleGridLineColor;
				ctx.lineTo(yAxisPosX + xAxisLength + 5,xAxisPosY - ((j+1) * scaleHop));					
			}
			else{
				ctx.lineTo(yAxisPosX-0.5,xAxisPosY - ((j+1) * scaleHop));
			}
			
			ctx.stroke();
			
			if (config.scaleShowLabels){
				ctx.fillText(calculatedScale.labels[j],yAxisPosX-8,xAxisPosY - ((j+1) * scaleHop));
			}
		}
		
		
	}
	function calculateXAxisSize(){
		var longestText = 1;
		//if we are showing the labels
		if (config.scaleShowLabels){
			ctx.font = config.scaleFontStyle + " " + config.scaleFontSize+"px " + config.scaleFontFamily;
			for (var i=0; i<calculatedScale.labels.length; i++){
				var measuredText = ctx.measureText(calculatedScale.labels[i]).width;
				longestText = (measuredText > longestText)? measuredText : longestText;
			}
			//Add a little extra padding from the y axis
			longestText +=10;
		}
		xAxisLength = width - longestText - widestXLabel;
		valueHop = Math.floor(xAxisLength/(data.labels.length-1));	
			
		yAxisPosX = width-widestXLabel/2-xAxisLength;
		xAxisPosY = scaleHeight + config.scaleFontSize/2;				
	}		
	function calculateDrawingSizes(){
		maxSize = height;

		//Need to check the X axis first - measure the length of each text metric, and figure out if we need to rotate by 45 degrees.
		ctx.font = config.scaleFontStyle + " " + config.scaleFontSize+"px " + config.scaleFontFamily;
		widestXLabel = 1;
		for (var i=0; i<data.labels.length; i++){
			var textLength = ctx.measureText(data.labels[i]).width;
			//If the text length is longer - make that equal to longest text!
			widestXLabel = (textLength > widestXLabel)? textLength : widestXLabel;
		}
		if (width/data.labels.length < widestXLabel){
			rotateLabels = 45;
			if (width/data.labels.length < Math.cos(rotateLabels) * widestXLabel){
				rotateLabels = 90;
				maxSize -= widestXLabel; 
			}
			else{
				maxSize -= Math.sin(rotateLabels) * widestXLabel;
			}
		}
		else{
			maxSize -= config.scaleFontSize;
		}
		
		//Add a little padding between the x line and the text
		maxSize -= 5;
		
		
		labelHeight = config.scaleFontSize;
		
		maxSize -= labelHeight;
		//Set 5 pixels greater than the font size to allow for a little padding from the X axis.
		
		scaleHeight = maxSize;
		
		//Then get the area above we can safely draw on.
		
	}		
	function getValueBounds() {
		var upperValue = Number.MIN_VALUE;
		var lowerValue = Number.MAX_VALUE;
		for (var i=0; i<data.datasets.length; i++){
			for (var j=0; j<data.datasets[i].data.length; j++){
				if ( data.datasets[i].data[j] > upperValue) { upperValue = data.datasets[i].data[j] };
				if ( data.datasets[i].data[j] < lowerValue) { lowerValue = data.datasets[i].data[j] };
			}
		};

		var maxSteps = Math.floor((scaleHeight / (labelHeight*0.66)));
		var minSteps = Math.floor((scaleHeight / labelHeight*0.5));
		
		return {
			maxValue : upperValue,
			minValue : lowerValue,
			maxSteps : maxSteps,
			minSteps : minSteps
		};
		

	}

	
}

var Bar = function(data,config,ctx){
	var maxSize, scaleHop, calculatedScale, labelHeight, scaleHeight, valueBounds, labelTemplateString, valueHop,widestXLabel, xAxisLength,yAxisPosX,xAxisPosY,barWidth, rotateLabels = 0;
		
	calculateDrawingSizes();
	
	valueBounds = getValueBounds();
	//Check and set the scale
	labelTemplateString = (config.scaleShowLabels)? config.scaleLabel : "";
	if (!config.scaleOverride){
		
		calculatedScale = calculateScale(scaleHeight,valueBounds.maxSteps,valueBounds.minSteps,valueBounds.maxValue,valueBounds.minValue,labelTemplateString);
	}
	else {
		calculatedScale = {
			steps : config.scaleSteps,
			stepValue : config.scaleStepWidth,
			graphMin : config.scaleStartValue,
			labels : []
		}
		populateLabels(labelTemplateString, calculatedScale.labels,calculatedScale.steps,config.scaleStartValue,config.scaleStepWidth);
	}
	
	scaleHop = Math.floor(scaleHeight/calculatedScale.steps);
	calculateXAxisSize();
	animationLoop(config,drawScale,drawBars,ctx);		
	
	function drawBars(animPc){
		ctx.lineWidth = config.barStrokeWidth;
		for (var i=0; i<data.datasets.length; i++){
				ctx.fillStyle = data.datasets[i].fillColor;
				ctx.strokeStyle = data.datasets[i].strokeColor;
			for (var j=0; j<data.datasets[i].data.length; j++){
				var barOffset = yAxisPosX + config.barValueSpacing + valueHop*j + barWidth*i + config.barDatasetSpacing*i + config.barStrokeWidth*i;
				
				ctx.beginPath();
				ctx.moveTo(barOffset, xAxisPosY);
				ctx.lineTo(barOffset, xAxisPosY - animPc*calculateOffset(data.datasets[i].data[j],calculatedScale,scaleHop)+(config.barStrokeWidth/2));
				ctx.lineTo(barOffset + barWidth, xAxisPosY - animPc*calculateOffset(data.datasets[i].data[j],calculatedScale,scaleHop)+(config.barStrokeWidth/2));
				ctx.lineTo(barOffset + barWidth, xAxisPosY);
				if(config.barShowStroke){
					ctx.stroke();
				}
				ctx.closePath();
				ctx.fill();
			}
		}
		
	}
	function drawScale(){
		//X axis line
		ctx.lineWidth = config.scaleLineWidth;
		ctx.strokeStyle = config.scaleLineColor;
		ctx.beginPath();
		ctx.moveTo(width-widestXLabel/2+5,xAxisPosY);
		ctx.lineTo(width-(widestXLabel/2)-xAxisLength-5,xAxisPosY);
		ctx.stroke();
		
		
		if (rotateLabels > 0){
			ctx.save();
			ctx.textAlign = "right";
		}
		else{
			ctx.textAlign = "center";
		}
		ctx.fillStyle = config.scaleFontColor;
		for (var i=0; i<data.labels.length; i++){
			ctx.save();
			if (rotateLabels > 0){
				ctx.translate(yAxisPosX + i*valueHop,xAxisPosY + config.scaleFontSize);
				ctx.rotate(-(rotateLabels * (Math.PI/180)));
				ctx.fillText(data.labels[i], 0,0);
				ctx.restore();
			}
			
			else{
				ctx.fillText(data.labels[i], yAxisPosX + i*valueHop + valueHop/2,xAxisPosY + config.scaleFontSize+3);					
			}

			ctx.beginPath();
			ctx.moveTo(yAxisPosX + (i+1) * valueHop, xAxisPosY+3);
			
			//Check i isnt 0, so we dont go over the Y axis twice.
				ctx.lineWidth = config.scaleGridLineWidth;
				ctx.strokeStyle = config.scaleGridLineColor;					
				ctx.lineTo(yAxisPosX + (i+1) * valueHop, 5);
			ctx.stroke();
		}
		
		//Y axis
		ctx.lineWidth = config.scaleLineWidth;
		ctx.strokeStyle = config.scaleLineColor;
		ctx.beginPath();
		ctx.moveTo(yAxisPosX,xAxisPosY+5);
		ctx.lineTo(yAxisPosX,5);
		ctx.stroke();
		
		ctx.textAlign = "right";
		ctx.textBaseline = "middle";
		for (var j=0; j<calculatedScale.steps; j++){
			ctx.beginPath();
			ctx.moveTo(yAxisPosX-3,xAxisPosY - ((j+1) * scaleHop));
			if (config.scaleShowGridLines){
				ctx.lineWidth = config.scaleGridLineWidth;
				ctx.strokeStyle = config.scaleGridLineColor;
				ctx.lineTo(yAxisPosX + xAxisLength + 5,xAxisPosY - ((j+1) * scaleHop));					
			}
			else{
				ctx.lineTo(yAxisPosX-0.5,xAxisPosY - ((j+1) * scaleHop));
			}
			
			ctx.stroke();
			if (config.scaleShowLabels){
				ctx.fillText(calculatedScale.labels[j],yAxisPosX-8,xAxisPosY - ((j+1) * scaleHop));
			}
		}
		
		
	}
	function calculateXAxisSize(){
		var longestText = 1;
		//if we are showing the labels
		if (config.scaleShowLabels){
			ctx.font = config.scaleFontStyle + " " + config.scaleFontSize+"px " + config.scaleFontFamily;
			for (var i=0; i<calculatedScale.labels.length; i++){
				var measuredText = ctx.measureText(calculatedScale.labels[i]).width;
				longestText = (measuredText > longestText)? measuredText : longestText;
			}
			//Add a little extra padding from the y axis
			longestText +=10;
		}
		xAxisLength = width - longestText - widestXLabel;
		valueHop = Math.floor(xAxisLength/(data.labels.length));	
		
		barWidth = (valueHop - config.scaleGridLineWidth*2 - (config.barValueSpacing*2) - (config.barDatasetSpacing*data.datasets.length-1) - ((config.barStrokeWidth/2)*data.datasets.length-1))/data.datasets.length;
		
		yAxisPosX = width-widestXLabel/2-xAxisLength;
		xAxisPosY = scaleHeight + config.scaleFontSize/2;				
	}		
	function calculateDrawingSizes(){
		maxSize = height;

		//Need to check the X axis first - measure the length of each text metric, and figure out if we need to rotate by 45 degrees.
		ctx.font = config.scaleFontStyle + " " + config.scaleFontSize+"px " + config.scaleFontFamily;
		widestXLabel = 1;
		for (var i=0; i<data.labels.length; i++){
			var textLength = ctx.measureText(data.labels[i]).width;
			//If the text length is longer - make that equal to longest text!
			widestXLabel = (textLength > widestXLabel)? textLength : widestXLabel;
		}
		if (width/data.labels.length < widestXLabel){
			rotateLabels = 45;
			if (width/data.labels.length < Math.cos(rotateLabels) * widestXLabel){
				rotateLabels = 90;
				maxSize -= widestXLabel; 
			}
			else{
				maxSize -= Math.sin(rotateLabels) * widestXLabel;
			}
		}
		else{
			maxSize -= config.scaleFontSize;
		}
		
		//Add a little padding between the x line and the text
		maxSize -= 5;
		
		
		labelHeight = config.scaleFontSize;
		
		maxSize -= labelHeight;
		//Set 5 pixels greater than the font size to allow for a little padding from the X axis.
		
		scaleHeight = maxSize;
		
		//Then get the area above we can safely draw on.
		
	}		
	function getValueBounds() {
		var upperValue = Number.MIN_VALUE;
		var lowerValue = Number.MAX_VALUE;
		for (var i=0; i<data.datasets.length; i++){
			for (var j=0; j<data.datasets[i].data.length; j++){
				if ( data.datasets[i].data[j] > upperValue) { upperValue = data.datasets[i].data[j] };
				if ( data.datasets[i].data[j] < lowerValue) { lowerValue = data.datasets[i].data[j] };
			}
		};

		var maxSteps = Math.floor((scaleHeight / (labelHeight*0.66)));
		var minSteps = Math.floor((scaleHeight / labelHeight*0.5));
		
		return {
			maxValue : upperValue,
			minValue : lowerValue,
			maxSteps : maxSteps,
			minSteps : minSteps
		};
		

	}
}

function calculateOffset(val,calculatedScale,scaleHop){
	var outerValue = calculatedScale.steps * calculatedScale.stepValue;
	var adjustedValue = val - calculatedScale.graphMin;
	var scalingFactor = CapValue(adjustedValue/outerValue,1,0);
	return (scaleHop*calculatedScale.steps) * scalingFactor;
}

function animationLoop(config,drawScale,drawData,ctx){
	var animFrameAmount = (config.animation)? 1/CapValue(config.animationSteps,Number.MAX_VALUE,1) : 1,
		easingFunction = animationOptions[config.animationEasing],
		percentAnimComplete =(config.animation)? 0 : 1;
	

	
	if (typeof drawScale !== "function") drawScale = function(){};
	
	requestAnimFrame(animLoop);
	
	function animateFrame(){
		var easeAdjustedAnimationPercent =(config.animation)? CapValue(easingFunction(percentAnimComplete),null,0) : 1;
		clear(ctx);
		if(config.scaleOverlay){
			drawData(easeAdjustedAnimationPercent);
			drawScale();
		} else {
			drawScale();
			drawData(easeAdjustedAnimationPercent);
		}				
	}
	function animLoop(){
		//We need to check if the animation is incomplete (less than 1), or complete (1).
			percentAnimComplete += animFrameAmount;
			animateFrame();	
			//Stop the loop continuing forever
			if (percentAnimComplete <= 1){
				requestAnimFrame(animLoop);
			}
			else{
				if (typeof config.onAnimationComplete == "function") config.onAnimationComplete();
			}
		
	}		
	
}

//Declare global functions to be called within this namespace here.


// shim layer with setTimeout fallback
var requestAnimFrame = (function(){
	return window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.oRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		function(callback) {
			window.setTimeout(callback, 1000 / 60);
		};
})();

function calculateScale(drawingHeight,maxSteps,minSteps,maxValue,minValue,labelTemplateString){
		var graphMin,graphMax,graphRange,stepValue,numberOfSteps,valueRange,rangeOrderOfMagnitude,decimalNum;
		
		valueRange = maxValue - minValue;
		
		rangeOrderOfMagnitude = calculateOrderOfMagnitude(valueRange);

		graphMin = Math.floor(minValue / (1 * Math.pow(10, rangeOrderOfMagnitude))) * Math.pow(10, rangeOrderOfMagnitude);
		
		graphMax = Math.ceil(maxValue / (1 * Math.pow(10, rangeOrderOfMagnitude))) * Math.pow(10, rangeOrderOfMagnitude);
		
		graphRange = graphMax - graphMin;
		
		stepValue = Math.pow(10, rangeOrderOfMagnitude);
		
		numberOfSteps = Math.round(graphRange / stepValue);
		
		//Compare number of steps to the max and min for that size graph, and add in half steps if need be.	        
		while(numberOfSteps < minSteps || numberOfSteps > maxSteps) {
			if (numberOfSteps < minSteps){
				stepValue /= 2;
				numberOfSteps = Math.round(graphRange/stepValue);
			}
			else{
				stepValue *=2;
				numberOfSteps = Math.round(graphRange/stepValue);
			}
		};

		var labels = [];
		populateLabels(labelTemplateString, labels, numberOfSteps, graphMin, stepValue);
	
		return {
			steps : numberOfSteps,
			stepValue : stepValue,
			graphMin : graphMin,
			labels : labels		        
			
		}
	
		function calculateOrderOfMagnitude(val){
		  return Math.floor(Math.log(val) / Math.LN10);
		}		


}

//Populate an array of all the labels by interpolating the string.
function populateLabels(labelTemplateString, labels, numberOfSteps, graphMin, stepValue) {
	if (labelTemplateString) {
		//Fix floating point errors by setting to fixed the on the same decimal as the stepValue.
		for (var i = 1; i < numberOfSteps + 1; i++) {
			labels.push(tmpl(labelTemplateString, {value: (graphMin + (stepValue * i)).toFixed(getDecimalPlaces(stepValue))}));
		}
	}
}

//Max value from array
function Max( array ){
	return Math.max.apply( Math, array );
};
//Min value from array
function Min( array ){
	return Math.min.apply( Math, array );
};
//Default if undefined
function Default(userDeclared,valueIfFalse){
	if(!userDeclared){
		return valueIfFalse;
	} else {
		return userDeclared;
	}
};
//Is a number function
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}
//Apply cap a value at a high or low number
function CapValue(valueToCap, maxValue, minValue){
	if(isNumber(maxValue)) {
		if( valueToCap > maxValue ) {
			return maxValue;
		}
	}
	if(isNumber(minValue)){
		if ( valueToCap < minValue ){
			return minValue;
		}
	}
	return valueToCap;
}
function getDecimalPlaces (num){
	var numberOfDecimalPlaces;
	if (num%1!=0){
		return num.toString().split(".")[1].length
	}
	else{
		return 0;
	}
	
} 

function mergeChartConfig(defaults,userDefined){
	var returnObj = {};
	for (var attrname in defaults) { returnObj[attrname] = defaults[attrname]; }
	for (var attrname in userDefined) { returnObj[attrname] = userDefined[attrname]; }
	return returnObj;
}

//Javascript micro templating by John Resig - source at http://ejohn.org/blog/javascript-micro-templating/
  var cache = {};
 
  function tmpl(str, data){
	// Figure out if we're getting a template, or if we need to
	// load the template - and be sure to cache the result.
	var fn = !/\W/.test(str) ?
	  cache[str] = cache[str] ||
		tmpl(document.getElementById(str).innerHTML) :
	 
	  // Generate a reusable function that will serve as a template
	  // generator (and which will be cached).
	  new Function("obj",
		"var p=[],print=function(){p.push.apply(p,arguments);};" +
	   
		// Introduce the data as local variables using with(){}
		"with(obj){p.push('" +
	   
		// Convert the template into pure JavaScript
		str
		  .replace(/[\r\t\n]/g, " ")
		  .split("<%").join("\t")
		  .replace(/((^|%>)[^\t]*)'/g, "$1\r")
		  .replace(/\t=(.*?)%>/g, "',$1,'")
		  .split("\t").join("');")
		  .split("%>").join("p.push('")
		  .split("\r").join("\\'")
	  + "');}return p.join('');");
   
	// Provide some basic currying to the user
	return data ? fn( data ) : fn;
  };
}




	</script>

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#nav">

	<div id="section-topbar">
		<div id="topbar-inner">
			<div class="container">
				<div class="row">
					<div class="dropdown">
						<ul id="nav" class="nav">
							<li class="menu-item"><a class="smoothScroll" href="#about" title="About"><i class="icon-user"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#resume" title="Resume"><i class="icon-file"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#work" title="Works"><i class="icon-briefcase"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#contact" title="Contact"><i class="icon-envelope"></i></a></li>
						</ul>
					</div>

					<div class="clear"></div>
				</div>
			</div>

			<div class="clear"></div>
		</div>
	</div>
	
	<div id="headerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-12">
					<h1>Ilesanmi Samuel Ayanfejesu</h1>
					<h3>Web Developer | dbeloveth@gmail.com</h3>
				</div>
			</div>
		</div>
	</div>
	

	<section id="about" name="about"></section>
	<div id="intro">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-2 col-lg-offset-1">
					<h5>ABOUT</h5>
				</div>
				<div class="col-lg-6">
				<p>	I am a graphics designer & front-end web developer with two years of professional experience. I'm currently undergoing a training session at <a href="https://join.slack.com/t/hnginternship4/shared_invite/enQtMzQwOTU4NzAwNjExLWQ0NWFlZDBmNjRkMTRkNGZmYjQ5MzA0YmUzZDBiZDEzOTBkZGE1ZWUxZTI1YjkxMTQ5N2MyZTMyMzBmMTEyOWM …">HNG Internship 4.0</a> in order to learn more and to boost my horizons in web development. My major focus is on designing & developing web. I also have skills in other fields like system engineering, photo&video editing, database management. I am good with linux, windows and macintosh operating system</p>
				</div>
				
			</div>
		</div>
	</div>

	<section id="resume" name="resume"></section>
	<div class="container desc">
		<div class="row">

				<div class="col-lg-2 col-lg-offset-1">
					<h5>EDUCATION</h5>
				</div>
				<div class="col-lg-6">
					<p><t>Front-End Web Developer</t><br/>
						Microsoft Professional Programs <br/>
						<i>3 months online Course</i>
					</p>
				</div>
				<div class="col-lg-3">
					<p><sm>MARCH 2018</sm><br/>
					</p>
				</div>
	
				<div class="col-lg-6 col-lg-offset-3">
					<p><t>Btech in Computer Science</t><br/>
						Federal University of technology Akure <br/>
						<i>5 Years Course</i>
					</p>
				</div>
				<div class="col-lg-3">
					<p><sm>APRIL 2014</sm></p>
				</div>
	
		</div>
		<br>
		<hr>
	</div>
	<!--WORK DESCRIPTION-->	
	<div class="container desc">
		<div class="row">

				<div class="col-lg-2 col-lg-offset-1">
					<h5>WORK</h5>
				</div>
				<div class="col-lg-6">
					<p><t>Prospective Web Designer - Intern</t><br/>	
					HNG Internship 4.0 <br/>
					</p>
					</div>
				<div class="col-lg-3">
					<p><sm>CURRENT</sm></p>
				</div>
	
		</div>
		<br>
		<hr>
	</div>
	
	<!--SKILLS DESCRIPTION -->
	<div id="skillswrap">
		<div class="container">
			<div class="row">
					<div class="col-lg-2 col-lg-offset-1">
						<h5>SKILLS</h5>
					</div>
					<div class="col-lg-3 centered">
						<canvas id="javascript" height="130" width="130"></canvas>
						<p>Javascript</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 70,
										color:"#1abc9c"
									},
									{
										value : 30,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("javascript").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>
					<div class="col-lg-3 centered">
						<canvas id="bootstrap" height="130" width="130"></canvas>
						<p>Bootstrap</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 90,
										color:"#1abc9c"
									},
									{
										value : 10,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("bootstrap").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>
					<div class="col-lg-3 centered">
						<canvas id="wordpress" height="130" width="130"></canvas>
						<p>Node js</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 65,
										color:"#1abc9c"
									},
									{
										value : 35,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("wordpress").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>
					
					<div class="col-lg-3 col-lg-offset-3 centered">
						<canvas id="html" height="130" width="130"></canvas>
						<p>HTML/CSS</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 80,
										color:"#1abc9c"
									},
									{
										value : 20,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("html").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>
					<div class="col-lg-3 centered">
						<canvas id="photoshop" height="130" width="130"></canvas>
						<p>Jquery</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 70,
										color:"#1abc9c"
									},
									{
										value : 30,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("photoshop").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>
					<div class="col-lg-3 centered">
						<canvas id="illustrator" height="130" width="130"></canvas>
						<p>System Engineering</p>
						<br>
						<script>
							var doughnutData = [
									{
										value: 50,
										color:"#1abc9c"
									},
									{
										value : 50,
										color : "#ecf0f1"
									}
								];
								var myDoughnut = new Chart(document.getElementById("illustrator").getContext("2d")).Doughnut(doughnutData);
						</script>
					</div>

			</div>
			<br>
		</div>
	</div>
	<section id="work" name="work"></section>
	
	<!--PORTFOLIO DESCRIPTION -->
	<div class="container desc">
		<div class="row">
				<div class="col-lg-2 col-lg-offset-1">
					<h5>PORTFOLIO</h5>
				</div>
				<div class="col-lg-6">
					<p><img class="img-responsive" src="https://res.cloudinary.com/dbeloveth/image/upload/v1523700203/clock.gif" alt="current time"></p>
				</div>
				<div class="col-lg-3">
					<p>HNG Internship 4.0</p>
					Stage One
				<P><more>current time application
				</more></P>
				<div class="background">
					<div class = "frame">
					<div class = "hng_bg"> </div>
					<div class="stage_bg"> </div>
					<div class= "date_bg"></div>   
					<p class="date">
						<?php
							date_default_timezone_set("Nigeria/Lagos");
							
							  echo "Today is " . date("l-d-m-Y") . "<br>";
							   "<br>";
							  echo "Current time is " . date("h:i:sa"); 
						?></p>
					
					<p class="dbeloveth">@dbeloveth</p>
					</div>
					</div>
					
				</div>
		</div>
		<br>
		<br>
	</div>

	<section id="contact" name="contact"></section>
	
	<!--FOOTER DESCRIPTION -->
	<div id="footwrap">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-2 col-lg-offset-1">
					<h5>CONTACT</h5>
				</div>
				<div class="col-lg-6">
					<p><t>Email</t><br/>
						dbeloveth@gmail.com <br/>
					</p>
					<p><t>Adress</t><br/>
						Akoka <br/>
						Yaba <br/>
						Lagos, Nigeria. <br/>
					</p>
					<p><t>Phone</t><br/>
						(+234)7035633570 <br/>
					</p>
				</div>
				<div class="col-lg-3">
					<p><sm>SOCIAL LINKS</sm></p>
					<p>
						<a href="#"><i class="icon-dribbble"></i></a>
						<a href="#"><i class="icon-twitter"></i></a>
						<a href="#"><i class="icon-facebook"></i></a>
						<a href="#"><i class="icon-linkedin"></i></a>
						<a href="#"><i class="icon-apple"></i></a>

					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div id="c">
		<div class="container">
		
		</div>
	</div>
	
    <!-- <script src="assets/js/bootstrap.js"></script> -->
  

	<script>

if (!jQuery) { throw new Error("Bootstrap requires jQuery") }

+function ($) { "use strict";

  function transitionEnd() {
    var el = document.createElement('bootstrap')

    var transEndEventNames = {
      'WebkitTransition' : 'webkitTransitionEnd'
    , 'MozTransition'    : 'transitionend'
    , 'OTransition'      : 'oTransitionEnd otransitionend'
    , 'transition'       : 'transitionend'
    }

    for (var name in transEndEventNames) {
      if (el.style[name] !== undefined) {
        return { end: transEndEventNames[name] }
      }
    }
  }

  $.fn.emulateTransitionEnd = function (duration) {
    var called = false, $el = this
    $(this).one($.support.transition.end, function () { called = true })
    var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
    setTimeout(callback, duration)
    return this
  }

  $(function () {
    $.support.transition = transitionEnd()
  })

}(window.jQuery);


+function ($) { "use strict";

  // ALERT CLASS DEFINITION
  // ======================

  var dismiss = '[data-dismiss="alert"]'
  var Alert   = function (el) {
    $(el).on('click', dismiss, this.close)
  }

  Alert.prototype.close = function (e) {
    var $this    = $(this)
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }

    var $parent = $(selector)

    if (e) e.preventDefault()

    if (!$parent.length) {
      $parent = $this.hasClass('alert') ? $this : $this.parent()
    }

    $parent.trigger(e = $.Event('close.bs.alert'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      $parent.trigger('closed.bs.alert').remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent
        .one($.support.transition.end, removeElement)
        .emulateTransitionEnd(150) :
      removeElement()
  }


  // ALERT PLUGIN DEFINITION
  // =======================

  var old = $.fn.alert

  $.fn.alert = function (option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.alert')

      if (!data) $this.data('bs.alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  $.fn.alert.Constructor = Alert


  // ALERT NO CONFLICT
  // =================

  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }


  // ALERT DATA-API
  // ==============

  $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(window.jQuery);

+function ($) { "use strict";

  // BUTTON PUBLIC CLASS DEFINITION
  // ==============================

  var Button = function (element, options) {
    this.$element = $(element)
    this.options  = $.extend({}, Button.DEFAULTS, options)
  }

  Button.DEFAULTS = {
    loadingText: 'loading...'
  }

  Button.prototype.setState = function (state) {
    var d    = 'disabled'
    var $el  = this.$element
    var val  = $el.is('input') ? 'val' : 'html'
    var data = $el.data()

    state = state + 'Text'

    if (!data.resetText) $el.data('resetText', $el[val]())

    $el[val](data[state] || this.options[state])

    // push to event loop to allow forms to submit
    setTimeout(function () {
      state == 'loadingText' ?
        $el.addClass(d).attr(d, d) :
        $el.removeClass(d).removeAttr(d);
    }, 0)
  }

  Button.prototype.toggle = function () {
    var $parent = this.$element.closest('[data-toggle="buttons"]')

    if ($parent.length) {
      var $input = this.$element.find('input')
        .prop('checked', !this.$element.hasClass('active'))
        .trigger('change')
      if ($input.prop('type') === 'radio') $parent.find('.active').removeClass('active')
    }

    this.$element.toggleClass('active')
  }


  // BUTTON PLUGIN DEFINITION
  // ========================

  var old = $.fn.button

  $.fn.button = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.button')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.button', (data = new Button(this, options)))

      if (option == 'toggle') data.toggle()
      else if (option) data.setState(option)
    })
  }

  $.fn.button.Constructor = Button


  // BUTTON NO CONFLICT
  // ==================

  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }


  // BUTTON DATA-API
  // ===============

  $(document).on('click.bs.button.data-api', '[data-toggle^=button]', function (e) {
    var $btn = $(e.target)
    if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
    $btn.button('toggle')
    e.preventDefault()
  })

}(window.jQuery);



+function ($) { "use strict";

  // CAROUSEL CLASS DEFINITION
  // =========================

  var Carousel = function (element, options) {
    this.$element    = $(element)
    this.$indicators = this.$element.find('.carousel-indicators')
    this.options     = options
    this.paused      =
    this.sliding     =
    this.interval    =
    this.$active     =
    this.$items      = null

    this.options.pause == 'hover' && this.$element
      .on('mouseenter', $.proxy(this.pause, this))
      .on('mouseleave', $.proxy(this.cycle, this))
  }

  Carousel.DEFAULTS = {
    interval: 5000
  , pause: 'hover'
  , wrap: true
  }

  Carousel.prototype.cycle =  function (e) {
    e || (this.paused = false)

    this.interval && clearInterval(this.interval)

    this.options.interval
      && !this.paused
      && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))

    return this
  }

  Carousel.prototype.getActiveIndex = function () {
    this.$active = this.$element.find('.item.active')
    this.$items  = this.$active.parent().children()

    return this.$items.index(this.$active)
  }

  Carousel.prototype.to = function (pos) {
    var that        = this
    var activeIndex = this.getActiveIndex()

    if (pos > (this.$items.length - 1) || pos < 0) return

    if (this.sliding)       return this.$element.one('slid', function () { that.to(pos) })
    if (activeIndex == pos) return this.pause().cycle()

    return this.slide(pos > activeIndex ? 'next' : 'prev', $(this.$items[pos]))
  }

  Carousel.prototype.pause = function (e) {
    e || (this.paused = true)

    if (this.$element.find('.next, .prev').length && $.support.transition.end) {
      this.$element.trigger($.support.transition.end)
      this.cycle(true)
    }

    this.interval = clearInterval(this.interval)

    return this
  }

  Carousel.prototype.next = function () {
    if (this.sliding) return
    return this.slide('next')
  }

  Carousel.prototype.prev = function () {
    if (this.sliding) return
    return this.slide('prev')
  }

  Carousel.prototype.slide = function (type, next) {
    var $active   = this.$element.find('.item.active')
    var $next     = next || $active[type]()
    var isCycling = this.interval
    var direction = type == 'next' ? 'left' : 'right'
    var fallback  = type == 'next' ? 'first' : 'last'
    var that      = this

    if (!$next.length) {
      if (!this.options.wrap) return
      $next = this.$element.find('.item')[fallback]()
    }

    this.sliding = true

    isCycling && this.pause()

    var e = $.Event('slide.bs.carousel', { relatedTarget: $next[0], direction: direction })

    if ($next.hasClass('active')) return

    if (this.$indicators.length) {
      this.$indicators.find('.active').removeClass('active')
      this.$element.one('slid', function () {
        var $nextIndicator = $(that.$indicators.children()[that.getActiveIndex()])
        $nextIndicator && $nextIndicator.addClass('active')
      })
    }

    if ($.support.transition && this.$element.hasClass('slide')) {
      this.$element.trigger(e)
      if (e.isDefaultPrevented()) return
      $next.addClass(type)
      $next[0].offsetWidth // force reflow
      $active.addClass(direction)
      $next.addClass(direction)
      $active
        .one($.support.transition.end, function () {
          $next.removeClass([type, direction].join(' ')).addClass('active')
          $active.removeClass(['active', direction].join(' '))
          that.sliding = false
          setTimeout(function () { that.$element.trigger('slid') }, 0)
        })
        .emulateTransitionEnd(600)
    } else {
      this.$element.trigger(e)
      if (e.isDefaultPrevented()) return
      $active.removeClass('active')
      $next.addClass('active')
      this.sliding = false
      this.$element.trigger('slid')
    }

    isCycling && this.cycle()

    return this
  }


  // CAROUSEL PLUGIN DEFINITION
  // ==========================

  var old = $.fn.carousel

  $.fn.carousel = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.carousel')
      var options = $.extend({}, Carousel.DEFAULTS, $this.data(), typeof option == 'object' && option)
      var action  = typeof option == 'string' ? option : options.slide

      if (!data) $this.data('bs.carousel', (data = new Carousel(this, options)))
      if (typeof option == 'number') data.to(option)
      else if (action) data[action]()
      else if (options.interval) data.pause().cycle()
    })
  }

  $.fn.carousel.Constructor = Carousel


  // CAROUSEL NO CONFLICT
  // ====================

  $.fn.carousel.noConflict = function () {
    $.fn.carousel = old
    return this
  }


  // CAROUSEL DATA-API
  // =================

  $(document).on('click.bs.carousel.data-api', '[data-slide], [data-slide-to]', function (e) {
    var $this   = $(this), href
    var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
    var options = $.extend({}, $target.data(), $this.data())
    var slideIndex = $this.attr('data-slide-to')
    if (slideIndex) options.interval = false

    $target.carousel(options)

    if (slideIndex = $this.attr('data-slide-to')) {
      $target.data('bs.carousel').to(slideIndex)
    }

    e.preventDefault()
  })

  $(window).on('load', function () {
    $('[data-ride="carousel"]').each(function () {
      var $carousel = $(this)
      $carousel.carousel($carousel.data())
    })
  })

}(window.jQuery);



+function ($) { "use strict";

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.transitioning = null

    if (this.options.parent) this.$parent = $(this.options.parent)
    if (this.options.toggle) this.toggle()
  }

  Collapse.DEFAULTS = {
    toggle: true
  }

  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var actives = this.$parent && this.$parent.find('> .panel > .in')

    if (actives && actives.length) {
      var hasData = actives.data('bs.collapse')
      if (hasData && hasData.transitioning) return
      actives.collapse('hide')
      hasData || actives.data('bs.collapse', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('collapse')
      .addClass('collapsing')
      [dimension](0)

    this.transitioning = 1

    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('in')
        [dimension]('auto')
      this.transitioning = 0
      this.$element.trigger('shown.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(350)
      [dimension](this.$element[0][scrollSize])
  }

  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element
      [dimension](this.$element[dimension]())
      [0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('collapse')
      .removeClass('in')

    this.transitioning = 1

    var complete = function () {
      this.transitioning = 0
      this.$element
        .trigger('hidden.bs.collapse')
        .removeClass('collapsing')
        .addClass('collapse')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(350)
  }

  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  var old = $.fn.collapse

  $.fn.collapse = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.collapse.Constructor = Collapse


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


  // COLLAPSE DATA-API
  // =================

  $(document).on('click.bs.collapse.data-api', '[data-toggle=collapse]', function (e) {
    var $this   = $(this), href
    var target  = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
    var $target = $(target)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()
    var parent  = $this.attr('data-parent')
    var $parent = parent && $(parent)

    if (!data || !data.transitioning) {
      if ($parent) $parent.find('[data-toggle=collapse][data-parent="' + parent + '"]').not($this).addClass('collapsed')
      $this[$target.hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
    }

    $target.collapse(option)
  })

}(window.jQuery);




+function ($) { "use strict";

  // DROPDOWN CLASS DEFINITION
  // =========================

  var backdrop = '.dropdown-backdrop'
  var toggle   = '[data-toggle=dropdown]'
  var Dropdown = function (element) {
    var $el = $(element).on('click.bs.dropdown', this.toggle)
  }

  Dropdown.prototype.toggle = function (e) {
    var $this = $(this)

    if ($this.is('.disabled, :disabled')) return

    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')

    clearMenus()

    if (!isActive) {
      if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
        // if mobile we we use a backdrop because click events don't delegate
        $('<div class="dropdown-backdrop"/>').insertAfter($(this)).on('click', clearMenus)
      }

      $parent.trigger(e = $.Event('show.bs.dropdown'))

      if (e.isDefaultPrevented()) return

      $parent
        .toggleClass('open')
        .trigger('shown.bs.dropdown')

      $this.focus()
    }

    return false
  }

  Dropdown.prototype.keydown = function (e) {
    if (!/(38|40|27)/.test(e.keyCode)) return

    var $this = $(this)

    e.preventDefault()
    e.stopPropagation()

    if ($this.is('.disabled, :disabled')) return

    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')

    if (!isActive || (isActive && e.keyCode == 27)) {
      if (e.which == 27) $parent.find(toggle).focus()
      return $this.click()
    }

    var $items = $('[role=menu] li:not(.divider):visible a', $parent)

    if (!$items.length) return

    var index = $items.index($items.filter(':focus'))

    if (e.keyCode == 38 && index > 0)                 index--                        // up
    if (e.keyCode == 40 && index < $items.length - 1) index++                        // down
    if (!~index)                                      index=0

    $items.eq(index).focus()
  }

  function clearMenus() {
    $(backdrop).remove()
    $(toggle).each(function (e) {
      var $parent = getParent($(this))
      if (!$parent.hasClass('open')) return
      $parent.trigger(e = $.Event('hide.bs.dropdown'))
      if (e.isDefaultPrevented()) return
      $parent.removeClass('open').trigger('hidden.bs.dropdown')
    })
  }

  function getParent($this) {
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && /#/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
    }

    var $parent = selector && $(selector)

    return $parent && $parent.length ? $parent : $this.parent()
  }


  // DROPDOWN PLUGIN DEFINITION
  // ==========================

  var old = $.fn.dropdown

  $.fn.dropdown = function (option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('dropdown')

      if (!data) $this.data('dropdown', (data = new Dropdown(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  $.fn.dropdown.Constructor = Dropdown


  // DROPDOWN NO CONFLICT
  // ====================

  $.fn.dropdown.noConflict = function () {
    $.fn.dropdown = old
    return this
  }


  // APPLY TO STANDARD DROPDOWN ELEMENTS
  // ===================================

  $(document)
    .on('click.bs.dropdown.data-api', clearMenus)
    .on('click.bs.dropdown.data-api', '.dropdown form', function (e) { e.stopPropagation() })
    .on('click.bs.dropdown.data-api'  , toggle, Dropdown.prototype.toggle)
    .on('keydown.bs.dropdown.data-api', toggle + ', [role=menu]' , Dropdown.prototype.keydown)

}(window.jQuery);




+function ($) { "use strict";

  // MODAL CLASS DEFINITION
  // ======================

  var Modal = function (element, options) {
    this.options   = options
    this.$element  = $(element)
    this.$backdrop =
    this.isShown   = null

    if (this.options.remote) this.$element.load(this.options.remote)
  }

  Modal.DEFAULTS = {
      backdrop: true
    , keyboard: true
    , show: true
  }

  Modal.prototype.toggle = function (_relatedTarget) {
    return this[!this.isShown ? 'show' : 'hide'](_relatedTarget)
  }

  Modal.prototype.show = function (_relatedTarget) {
    var that = this
    var e    = $.Event('show.bs.modal', { relatedTarget: _relatedTarget })

    this.$element.trigger(e)

    if (this.isShown || e.isDefaultPrevented()) return

    this.isShown = true

    this.escape()

    this.$element.on('click.dismiss.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))

    this.backdrop(function () {
      var transition = $.support.transition && that.$element.hasClass('fade')

      if (!that.$element.parent().length) {
        that.$element.appendTo(document.body) // don't move modals dom position
      }

      that.$element.show()

      if (transition) {
        that.$element[0].offsetWidth // force reflow
      }

      that.$element
        .addClass('in')
        .attr('aria-hidden', false)

      that.enforceFocus()

      var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget })

      transition ?
        that.$element.find('.modal-dialog') // wait for modal to slide in
          .one($.support.transition.end, function () {
            that.$element.focus().trigger(e)
          })
          .emulateTransitionEnd(300) :
        that.$element.focus().trigger(e)
    })
  }

  Modal.prototype.hide = function (e) {
    if (e) e.preventDefault()

    e = $.Event('hide.bs.modal')

    this.$element.trigger(e)

    if (!this.isShown || e.isDefaultPrevented()) return

    this.isShown = false

    this.escape()

    $(document).off('focusin.bs.modal')

    this.$element
      .removeClass('in')
      .attr('aria-hidden', true)
      .off('click.dismiss.modal')

    $.support.transition && this.$element.hasClass('fade') ?
      this.$element
        .one($.support.transition.end, $.proxy(this.hideModal, this))
        .emulateTransitionEnd(300) :
      this.hideModal()
  }

  Modal.prototype.enforceFocus = function () {
    $(document)
      .off('focusin.bs.modal') // guard against infinite focus loop
      .on('focusin.bs.modal', $.proxy(function (e) {
        if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
          this.$element.focus()
        }
      }, this))
  }

  Modal.prototype.escape = function () {
    if (this.isShown && this.options.keyboard) {
      this.$element.on('keyup.dismiss.bs.modal', $.proxy(function (e) {
        e.which == 27 && this.hide()
      }, this))
    } else if (!this.isShown) {
      this.$element.off('keyup.dismiss.bs.modal')
    }
  }

  Modal.prototype.hideModal = function () {
    var that = this
    this.$element.hide()
    this.backdrop(function () {
      that.removeBackdrop()
      that.$element.trigger('hidden.bs.modal')
    })
  }

  Modal.prototype.removeBackdrop = function () {
    this.$backdrop && this.$backdrop.remove()
    this.$backdrop = null
  }

  Modal.prototype.backdrop = function (callback) {
    var that    = this
    var animate = this.$element.hasClass('fade') ? 'fade' : ''

    if (this.isShown && this.options.backdrop) {
      var doAnimate = $.support.transition && animate

      this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
        .appendTo(document.body)

      this.$element.on('click.dismiss.modal', $.proxy(function (e) {
        if (e.target !== e.currentTarget) return
        this.options.backdrop == 'static'
          ? this.$element[0].focus.call(this.$element[0])
          : this.hide.call(this)
      }, this))

      if (doAnimate) this.$backdrop[0].offsetWidth // force reflow

      this.$backdrop.addClass('in')

      if (!callback) return

      doAnimate ?
        this.$backdrop
          .one($.support.transition.end, callback)
          .emulateTransitionEnd(150) :
        callback()

    } else if (!this.isShown && this.$backdrop) {
      this.$backdrop.removeClass('in')

      $.support.transition && this.$element.hasClass('fade')?
        this.$backdrop
          .one($.support.transition.end, callback)
          .emulateTransitionEnd(150) :
        callback()

    } else if (callback) {
      callback()
    }
  }


  // MODAL PLUGIN DEFINITION
  // =======================

  var old = $.fn.modal

  $.fn.modal = function (option, _relatedTarget) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.modal')
      var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
      if (typeof option == 'string') data[option](_relatedTarget)
      else if (options.show) data.show(_relatedTarget)
    })
  }

  $.fn.modal.Constructor = Modal


  // MODAL NO CONFLICT
  // =================

  $.fn.modal.noConflict = function () {
    $.fn.modal = old
    return this
  }


  // MODAL DATA-API
  // ==============

  $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this   = $(this)
    var href    = $this.attr('href')
    var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) //strip for ie7
    var option  = $target.data('modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data())

    e.preventDefault()

    $target
      .modal(option, this)
      .one('hide', function () {
        $this.is(':visible') && $this.focus()
      })
  })

  $(document)
    .on('show.bs.modal',  '.modal', function () { $(document.body).addClass('modal-open') })
    .on('hidden.bs.modal', '.modal', function () { $(document.body).removeClass('modal-open') })

}(window.jQuery);




+function ($) { "use strict";

  // TOOLTIP PUBLIC CLASS DEFINITION
  // ===============================

  var Tooltip = function (element, options) {
    this.type       =
    this.options    =
    this.enabled    =
    this.timeout    =
    this.hoverState =
    this.$element   = null

    this.init('tooltip', element, options)
  }

  Tooltip.DEFAULTS = {
    animation: true
  , placement: 'top'
  , selector: false
  , template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
  , trigger: 'hover focus'
  , title: ''
  , delay: 0
  , html: false
  , container: false
  }

  Tooltip.prototype.init = function (type, element, options) {
    this.enabled  = true
    this.type     = type
    this.$element = $(element)
    this.options  = this.getOptions(options)

    var triggers = this.options.trigger.split(' ')

    for (var i = triggers.length; i--;) {
      var trigger = triggers[i]

      if (trigger == 'click') {
        this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this))
      } else if (trigger != 'manual') {
        var eventIn  = trigger == 'hover' ? 'mouseenter' : 'focus'
        var eventOut = trigger == 'hover' ? 'mouseleave' : 'blur'

        this.$element.on(eventIn  + '.' + this.type, this.options.selector, $.proxy(this.enter, this))
        this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this))
      }
    }

    this.options.selector ?
      (this._options = $.extend({}, this.options, { trigger: 'manual', selector: '' })) :
      this.fixTitle()
  }

  Tooltip.prototype.getDefaults = function () {
    return Tooltip.DEFAULTS
  }

  Tooltip.prototype.getOptions = function (options) {
    options = $.extend({}, this.getDefaults(), this.$element.data(), options)

    if (options.delay && typeof options.delay == 'number') {
      options.delay = {
        show: options.delay
      , hide: options.delay
      }
    }

    return options
  }

  Tooltip.prototype.getDelegateOptions = function () {
    var options  = {}
    var defaults = this.getDefaults()

    this._options && $.each(this._options, function (key, value) {
      if (defaults[key] != value) options[key] = value
    })

    return options
  }

  Tooltip.prototype.enter = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)

    clearTimeout(self.timeout)

    self.hoverState = 'in'

    if (!self.options.delay || !self.options.delay.show) return self.show()

    self.timeout = setTimeout(function () {
      if (self.hoverState == 'in') self.show()
    }, self.options.delay.show)
  }

  Tooltip.prototype.leave = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)

    clearTimeout(self.timeout)

    self.hoverState = 'out'

    if (!self.options.delay || !self.options.delay.hide) return self.hide()

    self.timeout = setTimeout(function () {
      if (self.hoverState == 'out') self.hide()
    }, self.options.delay.hide)
  }

  Tooltip.prototype.show = function () {
    var e = $.Event('show.bs.'+ this.type)

    if (this.hasContent() && this.enabled) {
      this.$element.trigger(e)

      if (e.isDefaultPrevented()) return

      var $tip = this.tip()

      this.setContent()

      if (this.options.animation) $tip.addClass('fade')

      var placement = typeof this.options.placement == 'function' ?
        this.options.placement.call(this, $tip[0], this.$element[0]) :
        this.options.placement

      var autoToken = /\s?auto?\s?/i
      var autoPlace = autoToken.test(placement)
      if (autoPlace) placement = placement.replace(autoToken, '') || 'top'

      $tip
        .detach()
        .css({ top: 0, left: 0, display: 'block' })
        .addClass(placement)

      this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)

      var pos          = this.getPosition()
      var actualWidth  = $tip[0].offsetWidth
      var actualHeight = $tip[0].offsetHeight

      if (autoPlace) {
        var $parent = this.$element.parent()

        var orgPlacement = placement
        var docScroll    = document.documentElement.scrollTop || document.body.scrollTop
        var parentWidth  = this.options.container == 'body' ? window.innerWidth  : $parent.outerWidth()
        var parentHeight = this.options.container == 'body' ? window.innerHeight : $parent.outerHeight()
        var parentLeft   = this.options.container == 'body' ? 0 : $parent.offset().left

        placement = placement == 'bottom' && pos.top   + pos.height  + actualHeight - docScroll > parentHeight  ? 'top'    :
                    placement == 'top'    && pos.top   - docScroll   - actualHeight < 0                         ? 'bottom' :
                    placement == 'right'  && pos.right + actualWidth > parentWidth                              ? 'left'   :
                    placement == 'left'   && pos.left  - actualWidth < parentLeft                               ? 'right'  :
                    placement

        $tip
          .removeClass(orgPlacement)
          .addClass(placement)
      }

      var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight)

      this.applyPlacement(calculatedOffset, placement)
      this.$element.trigger('shown.bs.' + this.type)
    }
  }

  Tooltip.prototype.applyPlacement = function(offset, placement) {
    var replace
    var $tip   = this.tip()
    var width  = $tip[0].offsetWidth
    var height = $tip[0].offsetHeight

    // manually read margins because getBoundingClientRect includes difference
    var marginTop = parseInt($tip.css('margin-top'), 10)
    var marginLeft = parseInt($tip.css('margin-left'), 10)

    // we must check for NaN for ie 8/9
    if (isNaN(marginTop))  marginTop  = 0
    if (isNaN(marginLeft)) marginLeft = 0

    offset.top  = offset.top  + marginTop
    offset.left = offset.left + marginLeft

    $tip
      .offset(offset)
      .addClass('in')

    // check to see if placing tip in new offset caused the tip to resize itself
    var actualWidth  = $tip[0].offsetWidth
    var actualHeight = $tip[0].offsetHeight

    if (placement == 'top' && actualHeight != height) {
      replace = true
      offset.top = offset.top + height - actualHeight
    }

    if (/bottom|top/.test(placement)) {
      var delta = 0

      if (offset.left < 0) {
        delta       = offset.left * -2
        offset.left = 0

        $tip.offset(offset)

        actualWidth  = $tip[0].offsetWidth
        actualHeight = $tip[0].offsetHeight
      }

      this.replaceArrow(delta - width + actualWidth, actualWidth, 'left')
    } else {
      this.replaceArrow(actualHeight - height, actualHeight, 'top')
    }

    if (replace) $tip.offset(offset)
  }

  Tooltip.prototype.replaceArrow = function(delta, dimension, position) {
    this.arrow().css(position, delta ? (50 * (1 - delta / dimension) + "%") : '')
  }

  Tooltip.prototype.setContent = function () {
    var $tip  = this.tip()
    var title = this.getTitle()

    $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
    $tip.removeClass('fade in top bottom left right')
  }

  Tooltip.prototype.hide = function () {
    var that = this
    var $tip = this.tip()
    var e    = $.Event('hide.bs.' + this.type)

    function complete() {
      if (that.hoverState != 'in') $tip.detach()
    }

    this.$element.trigger(e)

    if (e.isDefaultPrevented()) return

    $tip.removeClass('in')

    $.support.transition && this.$tip.hasClass('fade') ?
      $tip
        .one($.support.transition.end, complete)
        .emulateTransitionEnd(150) :
      complete()

    this.$element.trigger('hidden.bs.' + this.type)

    return this
  }

  Tooltip.prototype.fixTitle = function () {
    var $e = this.$element
    if ($e.attr('title') || typeof($e.attr('data-original-title')) != 'string') {
      $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
    }
  }

  Tooltip.prototype.hasContent = function () {
    return this.getTitle()
  }

  Tooltip.prototype.getPosition = function () {
    var el = this.$element[0]
    return $.extend({}, (typeof el.getBoundingClientRect == 'function') ? el.getBoundingClientRect() : {
      width: el.offsetWidth
    , height: el.offsetHeight
    }, this.$element.offset())
  }

  Tooltip.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
    return placement == 'bottom' ? { top: pos.top + pos.height,   left: pos.left + pos.width / 2 - actualWidth / 2  } :
           placement == 'top'    ? { top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2  } :
           placement == 'left'   ? { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth } :
        /* placement == 'right' */ { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width   }
  }

  Tooltip.prototype.getTitle = function () {
    var title
    var $e = this.$element
    var o  = this.options

    title = $e.attr('data-original-title')
      || (typeof o.title == 'function' ? o.title.call($e[0]) :  o.title)

    return title
  }

  Tooltip.prototype.tip = function () {
    return this.$tip = this.$tip || $(this.options.template)
  }

  Tooltip.prototype.arrow = function () {
    return this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow')
  }

  Tooltip.prototype.validate = function () {
    if (!this.$element[0].parentNode) {
      this.hide()
      this.$element = null
      this.options  = null
    }
  }

  Tooltip.prototype.enable = function () {
    this.enabled = true
  }

  Tooltip.prototype.disable = function () {
    this.enabled = false
  }

  Tooltip.prototype.toggleEnabled = function () {
    this.enabled = !this.enabled
  }

  Tooltip.prototype.toggle = function (e) {
    var self = e ? $(e.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type) : this
    self.tip().hasClass('in') ? self.leave(self) : self.enter(self)
  }

  Tooltip.prototype.destroy = function () {
    this.hide().$element.off('.' + this.type).removeData('bs.' + this.type)
  }


  // TOOLTIP PLUGIN DEFINITION
  // =========================

  var old = $.fn.tooltip

  $.fn.tooltip = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.tooltip')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.tooltip.Constructor = Tooltip


  // TOOLTIP NO CONFLICT
  // ===================

  $.fn.tooltip.noConflict = function () {
    $.fn.tooltip = old
    return this
  }

}(window.jQuery);


+function ($) { "use strict";

  // POPOVER PUBLIC CLASS DEFINITION
  // ===============================

  var Popover = function (element, options) {
    this.init('popover', element, options)
  }

  if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js')

  Popover.DEFAULTS = $.extend({} , $.fn.tooltip.Constructor.DEFAULTS, {
    placement: 'right'
  , trigger: 'click'
  , content: ''
  , template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
  })


  // NOTE: POPOVER EXTENDS tooltip.js
  // ================================

  Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)

  Popover.prototype.constructor = Popover

  Popover.prototype.getDefaults = function () {
    return Popover.DEFAULTS
  }

  Popover.prototype.setContent = function () {
    var $tip    = this.tip()
    var title   = this.getTitle()
    var content = this.getContent()

    $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
    $tip.find('.popover-content')[this.options.html ? 'html' : 'text'](content)

    $tip.removeClass('fade top bottom left right in')

    // IE8 doesn't accept hiding via the `:empty` pseudo selector, we have to do
    // this manually by checking the contents.
    if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide()
  }

  Popover.prototype.hasContent = function () {
    return this.getTitle() || this.getContent()
  }

  Popover.prototype.getContent = function () {
    var $e = this.$element
    var o  = this.options

    return $e.attr('data-content')
      || (typeof o.content == 'function' ?
            o.content.call($e[0]) :
            o.content)
  }

  Popover.prototype.arrow = function () {
    return this.$arrow = this.$arrow || this.tip().find('.arrow')
  }

  Popover.prototype.tip = function () {
    if (!this.$tip) this.$tip = $(this.options.template)
    return this.$tip
  }


  // POPOVER PLUGIN DEFINITION
  // =========================

  var old = $.fn.popover

  $.fn.popover = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.popover')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.popover', (data = new Popover(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.popover.Constructor = Popover


  // POPOVER NO CONFLICT
  // ===================

  $.fn.popover.noConflict = function () {
    $.fn.popover = old
    return this
  }

}(window.jQuery);


+function ($) { "use strict";

  // SCROLLSPY CLASS DEFINITION
  // ==========================

  function ScrollSpy(element, options) {
    var href
    var process  = $.proxy(this.process, this)

    this.$element       = $(element).is('body') ? $(window) : $(element)
    this.$body          = $('body')
    this.$scrollElement = this.$element.on('scroll.bs.scroll-spy.data-api', process)
    this.options        = $.extend({}, ScrollSpy.DEFAULTS, options)
    this.selector       = (this.options.target
      || ((href = $(element).attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
      || '') + ' .nav li > a'
    this.offsets        = $([])
    this.targets        = $([])
    this.activeTarget   = null

    this.refresh()
    this.process()
  }

  ScrollSpy.DEFAULTS = {
    offset: 10
  }

  ScrollSpy.prototype.refresh = function () {
    var offsetMethod = this.$element[0] == window ? 'offset' : 'position'

    this.offsets = $([])
    this.targets = $([])

    var self     = this
    var $targets = this.$body
      .find(this.selector)
      .map(function () {
        var $el   = $(this)
        var href  = $el.data('target') || $el.attr('href')
        var $href = /^#\w/.test(href) && $(href)

        return ($href
          && $href.length
          && [[ $href[offsetMethod]().top + (!$.isWindow(self.$scrollElement.get(0)) && self.$scrollElement.scrollTop()), href ]]) || null
      })
      .sort(function (a, b) { return a[0] - b[0] })
      .each(function () {
        self.offsets.push(this[0])
        self.targets.push(this[1])
      })
  }

  ScrollSpy.prototype.process = function () {
    var scrollTop    = this.$scrollElement.scrollTop() + this.options.offset
    var scrollHeight = this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight
    var maxScroll    = scrollHeight - this.$scrollElement.height()
    var offsets      = this.offsets
    var targets      = this.targets
    var activeTarget = this.activeTarget
    var i

    if (scrollTop >= maxScroll) {
      return activeTarget != (i = targets.last()[0]) && this.activate(i)
    }

    for (i = offsets.length; i--;) {
      activeTarget != targets[i]
        && scrollTop >= offsets[i]
        && (!offsets[i + 1] || scrollTop <= offsets[i + 1])
        && this.activate( targets[i] )
    }
  }

  ScrollSpy.prototype.activate = function (target) {
    this.activeTarget = target

    $(this.selector)
      .parents('.active')
      .removeClass('active')

    var selector = this.selector
      + '[data-target="' + target + '"],'
      + this.selector + '[href="' + target + '"]'

    var active = $(selector)
      .parents('li')
      .addClass('active')

    if (active.parent('.dropdown-menu').length)  {
      active = active
        .closest('li.dropdown')
        .addClass('active')
    }

    active.trigger('activate')
  }


  // SCROLLSPY PLUGIN DEFINITION
  // ===========================

  var old = $.fn.scrollspy

  $.fn.scrollspy = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.scrollspy')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.scrollspy.Constructor = ScrollSpy


  // SCROLLSPY NO CONFLICT
  // =====================

  $.fn.scrollspy.noConflict = function () {
    $.fn.scrollspy = old
    return this
  }


  // SCROLLSPY DATA-API
  // ==================

  $(window).on('load', function () {
    $('[data-spy="scroll"]').each(function () {
      var $spy = $(this)
      $spy.scrollspy($spy.data())
    })
  })

}(window.jQuery);


+function ($) { "use strict";

  // TAB CLASS DEFINITION
  // ====================

  var Tab = function (element) {
    this.element = $(element)
  }

  Tab.prototype.show = function () {
    var $this    = this.element
    var $ul      = $this.closest('ul:not(.dropdown-menu)')
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
    }

    if ($this.parent('li').hasClass('active')) return

    var previous = $ul.find('.active:last a')[0]
    var e        = $.Event('show.bs.tab', {
      relatedTarget: previous
    })

    $this.trigger(e)

    if (e.isDefaultPrevented()) return

    var $target = $(selector)

    this.activate($this.parent('li'), $ul)
    this.activate($target, $target.parent(), function () {
      $this.trigger({
        type: 'shown.bs.tab'
      , relatedTarget: previous
      })
    })
  }

  Tab.prototype.activate = function (element, container, callback) {
    var $active    = container.find('> .active')
    var transition = callback
      && $.support.transition
      && $active.hasClass('fade')

    function next() {
      $active
        .removeClass('active')
        .find('> .dropdown-menu > .active')
        .removeClass('active')

      element.addClass('active')

      if (transition) {
        element[0].offsetWidth // reflow for transition
        element.addClass('in')
      } else {
        element.removeClass('fade')
      }

      if (element.parent('.dropdown-menu')) {
        element.closest('li.dropdown').addClass('active')
      }

      callback && callback()
    }

    transition ?
      $active
        .one($.support.transition.end, next)
        .emulateTransitionEnd(150) :
      next()

    $active.removeClass('in')
  }


  // TAB PLUGIN DEFINITION
  // =====================

  var old = $.fn.tab

  $.fn.tab = function ( option ) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.tab')

      if (!data) $this.data('bs.tab', (data = new Tab(this)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.tab.Constructor = Tab


  // TAB NO CONFLICT
  // ===============

  $.fn.tab.noConflict = function () {
    $.fn.tab = old
    return this
  }


  // TAB DATA-API
  // ============

  $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })

}(window.jQuery);

+function ($) { "use strict";

  // AFFIX CLASS DEFINITION
  // ======================

  var Affix = function (element, options) {
    this.options = $.extend({}, Affix.DEFAULTS, options)
    this.$window = $(window)
      .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.bs.affix.data-api',  $.proxy(this.checkPositionWithEventLoop, this))

    this.$element = $(element)
    this.affixed  =
    this.unpin    = null

    this.checkPosition()
  }

  Affix.RESET = 'affix affix-top affix-bottom'

  Affix.DEFAULTS = {
    offset: 0
  }

  Affix.prototype.checkPositionWithEventLoop = function () {
    setTimeout($.proxy(this.checkPosition, this), 1)
  }

  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return

    var scrollHeight = $(document).height()
    var scrollTop    = this.$window.scrollTop()
    var position     = this.$element.offset()
    var offset       = this.options.offset
    var offsetTop    = offset.top
    var offsetBottom = offset.bottom

    if (typeof offset != 'object')         offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function')    offsetTop    = offset.top()
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom()

    var affix = this.unpin   != null && (scrollTop + this.unpin <= position.top) ? false :
                offsetBottom != null && (position.top + this.$element.height() >= scrollHeight - offsetBottom) ? 'bottom' :
                offsetTop    != null && (scrollTop <= offsetTop) ? 'top' : false

    if (this.affixed === affix) return
    if (this.unpin) this.$element.css('top', '')

    this.affixed = affix
    this.unpin   = affix == 'bottom' ? position.top - scrollTop : null

    this.$element.removeClass(Affix.RESET).addClass('affix' + (affix ? '-' + affix : ''))

    if (affix == 'bottom') {
      this.$element.offset({ top: document.body.offsetHeight - offsetBottom - this.$element.height() })
    }
  }


  // AFFIX PLUGIN DEFINITION
  // =======================

  var old = $.fn.affix

  $.fn.affix = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.affix')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.affix.Constructor = Affix


  // AFFIX NO CONFLICT
  // =================

  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }


  // AFFIX DATA-API
  // ==============

  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
      var data = $spy.data()

      data.offset = data.offset || {}

      if (data.offsetBottom) data.offset.bottom = data.offsetBottom
      if (data.offsetTop)    data.offset.top    = data.offsetTop

      $spy.affix(data)
    })
  })

}(window.jQuery);

</script>



</body>
</html>
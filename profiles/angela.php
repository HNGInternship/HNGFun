<?php
  $query = "SELECT * FROM secret_word";
  $secret_word = $conn->query($query);
  $result = $secret_word->fetch();
  $secret_word = $result['secret_word'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Angela Bello</title>
  <link rel="stylesheet" type="text/css"  href="vendor/bootstrap/3.3.4/css/bootstrap.css">
  <style>
    body, html {
      font-family: 'Open Sans', sans-serif;
      text-rendering: optimizeLegibility !important;
      -webkit-font-smoothing: antialiased !important;
      background: url('https://images.unsplash.com/photo-1501696461415-6bd6660c6742?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=defe121eb958a24b9e2c4f2041897339&auto=format&fit=crop&w=800&q=60') no-repeat center top;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
    h2 {
      margin: 0 0 20px 0;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 400;
      font-size: 60px;
    }
    h3, h4 {
      color: #888;
      font-size: 18px;
      font-weight: 300;
      letter-spacing: 1px;
    }
    h5 {
      text-transform: uppercase;
      font-weight: 700;
    }
    p.intro {
      font-size: 30px;
      margin: 12px 0 0;
      line-height: 24px;
    }
    a {
      color: #555;
    }
    a:hover, a:focus {
      text-decoration: none;
      color: #fff;
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
    hr {
      height: 1px;
      width: 70px;
      text-align: center;
      position: relative;
      background: #fff;
      margin: 0 auto;
      margin-bottom: 30px;
      border: 0;
    }
    .intro {
      width: 100%;
      padding: 0;
      text-align: center;
      color: #333;
    }
    .intro h1 {
      font-size: 60px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 20px;
      color: #ccc;
    }
    .intro p {
      font-size: 20px;
      margin-bottom: 40px;
      margin-top: 20px;
      color: #ccc;
    }
    header .intro-text {
      padding-top: 100px;
    }
    #portfolio {
      padding: 120px 0;
    }
    .isotope-item {
      z-index: 2
    }
    .isotope-hidden.isotope-item {
      z-index: 1
    }
    .isotope, .isotope .isotope-item {
      -webkit-transition-duration: 0.8s;
      -moz-transition-duration: 0.8s;
      transition-duration: 0.8s;
    }
    .isotope-item {
      margin-right: -1px;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }
    .isotope {
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transition-property: height, width;
      -moz-transition-property: height, width;
      transition-property: height, width;
    }
    .isotope .isotope-item {
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transition-property: -webkit-transform, opacity;
      -moz-transition-property: -moz-transform, opacity;
      transition-property: transform, opacity;
    }
    .portfolio-item {
      margin: 15px 0;
      -webkit-transition: all 0.5s ease-out;
      -moz-transition: all 0.5s ease-out;
      -ms-transition: all 0.5s ease-out;
      -o-transition: all 0.5s ease-out;
      transition: all 0.5s ease-out;
    }
    .portfolio-item:hover {
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -ms-transform: scale(1.1);
      -o-transform: scale(1.1);
      transform: scale(1.1);
    }
    .portfolio-item .hover-bg {
      height: 195px;
      overflow: hidden;
      position: relative;
    }
    .hover-bg .hover-text {
      position: absolute;
      text-align: center;
      margin: 0 auto;
      background: rgba(0, 0, 0, 0.66);
      padding: 30% 0 0 0;
      height: 100%;
      width: 100%;
      opacity: 0;
      transition: all 0.5s;
    }
    .hover-bg .hover-text>h4 {
      text-transform: uppercase;
      opacity: 0;
      color: #fff;
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
      transition: all 0.3s;
    }
    .hover-bg:hover .hover-text>h4 {
      opacity: 1;
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }
    .hover-bg .hover-text>i {
      opacity: 0;
      -webkit-transform: translateY(0);
      transform: translateY(0);
      transition: all 0.3s;
    }
    .hover-bg:hover .hover-text>i {
      opacity: 1;
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
    }
    .hover-bg:hover .hover-text {
      opacity: 1;
    }
  </style>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<header id="header">
  <div class="intro">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h1>Hello</h1>
          <hr>
          <p>My name is Angela Bello</p>
      </div>
    </div>
  </div>
</header>
<div id="portfolio">
  <div class="container">
    <div class="section-title text-center center">
      <h2>My Skills</h2>
      <hr>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-sm-6 col-md-3 col-lg-3 illustration">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="https://cdn.lynda.com/course/609030/609030-636402179425109240-16x9.jpg" title="CSS" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>CSS</h4>
              </div>
              <img src="https://cdn.lynda.com/course/609030/609030-636402179425109240-16x9.jpg" class="img-responsive" alt="CSS"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 graphic">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="https://longren.io/wp-content/uploads/2014/03/HTML.jpg" title="HTML" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>HTML</h4>
              </div>
              <img src="https://longren.io/wp-content/uploads/2014/03/HTML.jpg" class="img-responsive" alt="HTML"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 graphic">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvTjFTtbTFUn5vwIcgtKx_PftJvj5g1szwY3nM7EyzKrPk7AQWkQ" title="PHP" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>PHP</h4>
              </div>
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvTjFTtbTFUn5vwIcgtKx_PftJvj5g1szwY3nM7EyzKrPk7AQWkQ" class="img-responsive" alt="PHP"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 graphic">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png" title="SQL" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>SQL</h4>
              </div>
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png" class="img-responsive" alt="SQL"> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
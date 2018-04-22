<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
  * {
    box-sizing: border-box;
  }
  .row::after {
      content: "";
      clear: both;
      display: block;
  }
  [class*="col-"] {
      float: left;
      padding: 15px;
  }

  body{
      width:1000px;
      height:auto;
      margin:auto;
  }

  html {
      font-family: "Lucida Sans", sans-serif;
  }
  .header {
      background-color: #9933cc;
      color: #ffffff;
      padding: 15px;
  }
  .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
  }
  .menu li {
      padding: 8px;
      margin-bottom: 7px;
      background-color: #33b5e5;
      color: #ffffff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }
  .menu li:hover {
      background-color: #9933cc;
  }

  .menu li a{
    text-decoration: none;
    color: white;
  }
  .aside {
      background-color: #33b5e5;
      padding: 15px;
      color: #ffffff;
      text-align: center;
      font-size: 14px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }
  .footer {
      background-color: #9933cc;
      color: #ffffff;
      text-align: center;
      font-size: 12px;
      padding: 15px;
  }

   .image img{
    width: 100%;
    height: 400px;
    border-radius: 20%;
    padding-left: 20px;
    padding-right: 20px;
  }
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}

  @media only screen and (max-width: 768px) {
      /* For mobile phones: */
      [class*="col-"] {
          width: 100%;
      }
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

<div class="header">
	<h1>EberePlenty</h1>
</div>

<div class="row">

    <div class="col-3 menu">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>    
      </ul>
    </div>

    <div class="col-6 image">
      <img src="http://res.cloudinary.com/ebysoft/image/upload/v1523971271/IMG_5966.jpg">
    </div>

    <div class="col-3 right">
      <div class="aside">
        <h2>Hi, I'm <br> Njoku Samson Ebere</h2>
        <p>Am Learning Web Development</p>
      </div>
    </div>

</div>

<div class="footer">
  <p>Its my first HNG Project</p>
</div>

</body>
</html>
